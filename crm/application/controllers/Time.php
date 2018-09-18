<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("time_model");
		$this->load->model("projects_model");
		$this->load->model("team_model");

		if(!$this->user->loggedin) $this->template->error(lang("error_1"));

		// If the user does not have premium. 
		// -1 means they have unlimited premium
		if($this->settings->info->global_premium && 
			($this->user->info->premium_time != -1 && 
				$this->user->info->premium_time < time()) ) {
			$this->session->set_flashdata("globalmsg", lang("success_29"));
			redirect(site_url("funds/plans"));
		}
		$seg = $this->uri->segment(2);

		if(!$this->common->has_permissions(array("admin", "project_admin",
		 "time_manage", "time_worker"), 
			$this->user)) 
		{
			if($seg == "stop_timer_ajax" || $seg == "add_timer_ajax") {
				$this->template->jsonError(lang("error_71"));
			} else {
				$this->template->error(lang("error_71"));
			}
		}
	}

	public function index($projectid = 0, $page = 0) 
	{
		$this->template->loadExternal(
			'<script src="'.base_url().'/scripts/libraries/jquery.flip.min.js">
			</script>'
		);
		$this->template->loadData("activeLink", 
			array("time" => array("general" => 1)));

		$page = intval($page);
		$projectid = intval($projectid);

		if($projectid == 0) {
			$projectid = $this->user->info->active_projectid;
		}

		// If user is Admin, Project-Admin or Time manager let them
		// view all projects
		if($this->common->has_permissions(
			array("admin", "project_admin", "time_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.time = 1)");
		}

		
		$timers = $this->time_model->get_user_timers($this->user->info->ID, 
			$projectid, $page);

		// * Pagination *//
		$this->load->library('pagination');
		$config['base_url'] = site_url("time/index/" . $projectid);
		$config['total_rows'] = $this->time_model
			->get_user_timers_count($this->user->info->ID, $projectid);
		$config['per_page'] = 15;
		$config['uri_segment'] = 4;
		include (APPPATH . "/config/page_config.php");
		$this->pagination->initialize($config);
		

		$this->template->loadContent("time/index.php", array(
				"projects" => $projects,
				"timers" => $timers,
				"projectid" => $projectid,
				"page" => "index"
				)
			);
	}

	public function all($projectid =0, $page=0) 
	{
		$this->template->loadExternal(
			'<script src="'.base_url().'/scripts/libraries/jquery.flip.min.js">
			</script>'
		);
		$this->common->check_permissions(
			"View All Timers", 
			array("admin", "project_admin", "time_manage"), // User Roles
			array(),
			0 
		);

		$this->template->loadData("activeLink", 
			array("time" => array("all" => 1)));

		$page = intval($page);
		$projectid = intval($projectid);

		$projects = $this->projects_model->get_all_active_projects();
		
		$timers = $this->time_model->get_all_timers($projectid, $page);

		// * Pagination *//
		$this->load->library('pagination');
		$config['base_url'] = site_url("time/all/" . $projectid);
		$config['total_rows'] = $this->time_model
			->get_all_timers_count($projectid);
		$config['per_page'] = 15;
		$config['uri_segment'] = 4;
		include (APPPATH . "/config/page_config.php");
		$this->pagination->initialize($config);

		$this->template->loadContent("time/index.php", array(
			"projects" => $projects,
			"timers" => $timers,
			"page" => "all"
			)
		);
	}

	public function search($userid = 0, $projectid = 0, $page = 0) 
	{
		$this->template->loadExternal(
			'<script src="'.base_url().'/scripts/libraries/jquery.flip.min.js">
			</script>'
		);
		$this->common->check_permissions(
			"Search Timers", 
			array("admin", "project_admin", "time_manage"), // User Roles
			array(),
			0 
		);
		$this->template->loadData("activeLink", 
			array("time" => array("all" => 1)));
		$projectid = intval($projectid);
		$page = intval($page);
		$userid = intval($userid);

		$search = $this->common->nohtml($this->input->post("search"));

		if($projectid == 0) {
			$projectid = intval($this->input->post("projectid"));
		}

		// Search for user
		if(!empty($search)) {
			$user = $this->user_model->get_user_by_username($search);
			if($user->num_rows() == 0) {
				$this->template->error(lang("error_138"));
			}
			$user = $user->row();
			$userid = $user->ID;
		} elseif($userid > 0) {
			$user = $this->user_model->get_user($userid);
			if($user->num_rows() == 0) {
				$this->template->error(lang("error_138"));
			}
			$user = $user->row();
			$userid = $user->ID;
		} else {
			$userid = 0;
		}

		// If user is Admin, Project-Admin or File manager let them
		// view all projects
		$projects = $this->projects_model->get_all_active_projects();
		

		if($projectid > 0) {
			$project = $this->projects_model->get_project($projectid);
			if($project->num_rows() == 0) {
				$this->template->error(lang("error_216"));
			}
		}

		$timers = $this->time_model->get_all_timers_search(array(
			"userid" => $userid,
			"projectid" => $projectid
			),
			 $page);

		// * Pagination *//
		$this->load->library('pagination');
		$config['base_url'] = site_url("time/search/" . $userid . "/". $projectid . "/");
		$config['total_rows'] = $this->time_model
			->get_all_timers_search_count(array(
			"userid" => $userid,
			"projectid" => $projectid
			));
		$config['per_page'] = 10;
		$config['uri_segment'] = 5;
		include (APPPATH . "/config/page_config.php");
		$this->pagination->initialize($config);

		$this->template->loadContent("time/index.php", array(
			"projects" => $projects,
			"timers" => $timers,
			"search" => $search,
			"projectid" => $projectid,
			"page" => "all"
			)
		);
	}

	public function add_timer() 
	{
		if(!isset($_GET['timer_get'])) {
			$note = $this->common->nohtml($this->input->post("note"));
			$projectid = intval($this->input->post("projectid"));
			$taskid = intval($this->input->post("taskid"));
			$rate = $this->input->post("rate");
		} else {
			$note = $this->common->nohtml($this->input->get("note"));
			$projectid = intval($this->input->get("projectid"));
			$taskid = intval($this->input->get("taskid"));
			$rate = $this->input->get("rate");
			if($_GET['hash'] != $this->security->get_csrf_hash()) {
				$this->template->error(lang("error_6"));
			}
		}

		if(!is_numeric($rate)) $this->template->error(lang("error_217"));

		// Get project 
		if($projectid > 0) {
			$project = $this->projects_model->get_project($projectid);
			if($project->num_rows() == 0) {
				$this->template->error(lang("error_72"));
			}
			$project = $project->row();

			$this->common->check_permissions(
				lang("error_218"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin", "time"),
				$projectid  // Team Roles
			);

			$this->load->model("task_model");
			if($taskid > 0) {
				$task = $this->task_model->get_task($taskid);
				if($task->num_rows() == 0) {
					$this->template->error(lang("error_166"));
				}
				$task = $task->row();
				if($task->projectid != $projectid) 
				{
					$this->template->error(lang("error_219"));
				}
			}
		}

		$this->time_model->add_timer(array(
			"userid" => $this->user->info->ID,
			"projectid" => $projectid,
			"rate" => $rate,
			"start_time" => time(),
			"added" => time(),
			"note" => $note,
			"date_stamp" => date("Y-m-d"),
			"taskid" => $taskid
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1099") . " <b>".$note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $projectid,
			"taskid" => $taskid,
			"url" => "time"
			)
		);

		$this->user_model
			->increment_field($this->user->info->ID, "timer_count", 1);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_113"));

		if(!isset($_GET['timer_get'])) {
			redirect(site_url("time"));
		} else {
			redirect(site_url("tasks/view/" . $taskid));
		}
	}


	public function add_timer_ajax() 
	{
		$note = date("l") . " " . lang("ctn_1100");
		$projectid = intval($this->user->info->active_projectid);

		// Default
		$rate = $this->user->info->time_rate;

		// Get project 
		if($projectid > 0) {
			$project = $this->projects_model->get_project($projectid);
			if($project->num_rows() == 0) {
				$this->template->jsonError(lang("error_72"));
			}
			$project = $project->row();

			$this->common->check_permissions(
				lang("error_218"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin", "time"),
				$projectid  // Team Roles
			);
		}

		$this->time_model->add_timer(array(
			"userid" => $this->user->info->ID,
			"projectid" => $projectid,
			"rate" => $rate,
			"start_time" => time(),
			"added" => time(),
			"note" => $note,
			"date_stamp" => date("Y-m-d")
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1099") . " <b>".$note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $projectid,
			"url" => "time"
			)
		);

		$this->user_model
			->increment_field($this->user->info->ID, "timer_count", 1);

		// Redirect
		echo json_encode(array(
			"error" => 0, 
			"success" => 1, 
			"msg" => "Successfully added new timer"
			)
		);
		exit();
	}

	public function stop_timer_ajax($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->jsonError(lang("error_6"));
		}
		$id = intval($id);
		$timer = $this->time_model->get_timer($id);
		if($timer->num_rows() == 0) {
			$this->template->jsonError(lang("error_220"));
		}
		$timer = $timer->row();
		if($timer->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_221"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin"), // Team Roles
				$timer->projectid,
				"", // Custom error message
				"jsonError" // Custom error function
			);
		}

		$this->time_model->update_timer($id, array(
			"end_time" => time()
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1101"). " <b>".$timer->note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $timer->projectid,
			"url" => "time"
			)
		);

		$this->user_model
			->decrement_field($this->user->info->ID, "timer_count", 1);

		// Redirect
		echo json_encode(array(
			"error" => 0, 
			"success" => 1, 
			"msg" => "Successfully stopeed the timer"
			)
		);
		exit();
	}

	public function stop_timer($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$timer = $this->time_model->get_timer($id);
		if($timer->num_rows() == 0) {
			$this->template->error(lang("error_220"));
		}
		$timer = $timer->row();
		if($timer->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_221"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin"),
				$timer->projectid  // Team Roles
			);
		}

		$this->time_model->update_timer($id, array(
			"end_time" => time()
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1101") . " <b>".$timer->note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $timer->projectid,
			"url" => "time"
			)
		);

		$this->user_model
			->decrement_field($this->user->info->ID, "timer_count", 1);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_114"));
		redirect(site_url("time"));
	}

	public function start_timer($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$timer = $this->time_model->get_timer($id);
		if($timer->num_rows() == 0) {
			$this->template->error(lang("error_220"));
		}
		$timer = $timer->row();
		if($timer->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_222"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin"),
				$timer->projectid  // Team Roles
			);
		}

		$new_time = $timer->end_time - $timer->start_time;
		$new_time = time() - $new_time;
		$this->time_model->update_timer($id, array(
			"end_time" => 0,
			"start_time" => $new_time
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1102") . " <b>".$timer->note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $timer->projectid,
			"url" => "time"
			)
		);

		$this->user_model
			->increment_field($this->user->info->ID, "timer_count", 1);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_114"));
		redirect(site_url("time"));
	}

	public function delete_timer($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$timer = $this->time_model->get_timer($id);
		if($timer->num_rows() == 0) {
			$this->template->error(lang("error_220"));
		}
		$timer = $timer->row();
		if($timer->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_223"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin"),
				$timer->projectid  // Team Roles
			);
		}

		$this->time_model->delete_timer($id);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1103") . " <b>".$timer->note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $timer->projectid,
			"url" => "time"
			)
		);

		if($timer->end_time == 0) {
		$this->user_model
			->decrement_field($this->user->info->ID, "timer_count", 1);
		}

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_115"));
		redirect(site_url("time"));

	}

	public function edit_timer($id) 
	{
		$this->template->loadData("activeLink", 
			array("time" => array("general" => 1)));
		$id = intval($id);
		$timer = $this->time_model->get_timer($id);
		if($timer->num_rows() == 0) {
			$this->template->error(lang("error_220"));
		}
		$timer = $timer->row();
		if($timer->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_224"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin"),
				$timer->projectid  // Team Roles
			);
		}

		// If user is Admin, Project-Admin or File manager let them
		// view all projects
		if($this->common->has_permissions(
			array("admin", "project_admin", "time_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.task = 1)");
		}

		// Get tasks for this project
		$this->load->model("task_model");
		$tasks = $this->task_model->get_all_tasks_for_project($timer->projectid);

		$this->template->loadContent("time/edit.php", array(
			"projects" => $projects,
			"tasks" => $tasks,
			"timer" => $timer
			)
		);
	}

	public function edit_timer_pro($id) 
	{
		$id = intval($id);
		$timer = $this->time_model->get_timer($id);
		if($timer->num_rows() == 0) {
			$this->template->error(lang("error_220"));
		}
		$timer = $timer->row();
		if($timer->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_224"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin"),
				$timer->projectid  // Team Roles
			);
		}

		$note = $this->common->nohtml($this->input->post("note"));
		$projectid = intval($this->input->post("projectid"));
		$rate = $this->input->post("rate");
		$time_passed = intval($this->input->post("time_passed"));
		$taskid = intval($this->input->post("taskid"));

		if(!is_numeric($rate)) $this->template->error(lang("error_217"));

		// Get project 
		if($projectid > 0) {
			$project = $this->projects_model->get_project($projectid);
			if($project->num_rows() == 0) {
				$this->template->error(lang("error_72"));
			}
			$project = $project->row();

			$this->common->check_permissions(
				lang("error_224"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin", "time"),
				$projectid  // Team Roles
			);

			$this->load->model("task_model");
			if($taskid > 0) {
				$task = $this->task_model->get_task($taskid);
				if($task->num_rows() == 0) {
					$this->template->error(lang("error_166"));
				}
				$task = $task->row();
				if($task->projectid != $projectid) 
				{
					$this->template->error(lang("error_219"));
				}
			}
		}

		$new_timer = time()-$time_passed;

		$this->time_model->update_timer($id, array(
			"projectid" => $projectid,
			"rate" => $rate,
			"start_time" => $new_timer,
			"end_time" => time(),
			"note" => $note,
			"taskid" => $taskid
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1104") . " <b>".$note.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $projectid,
			"url" => "time"
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_116"));
		redirect(site_url("time"));


	}

	public function stats($type=0, $month ="", $year="") 
	{
		if(empty($year)) {
			$year = date("Y");
		} else {
			$year = intval($year);
		}
		$this->template->loadData("activeLink", 
			array("time" => array("stats" => 1)));
		$this->template->loadExternal(
			'<script type="text/javascript" src="'
			.base_url().'scripts/libraries/Chart.min.js" /></script>');

		$type = intval($type);
		if($type == 0) {
			$days = 6;
			$string = "days ago";
		} elseif($type == 1) {
			$days = 29;
			$string = "days ago";
		} elseif($type == 2) {
			$days = 89;
			$string = "days ago";
		} elseif($type == 3) {
			$month = $this->common->nohtml($month);
			$string = $month ." ". $year;
			if($month == "April" || $month == "June" || $month == "September" || $month == "November") {
				$days = 30;
			} elseif($month == "February") {
				if(date("L") == 0) {
					$days = 28;
				} else {
					$days = 29;
				}
			} else {
				$days = 31;
			}
		}

		// Get days
		$last_dates = array();
		$total_hours = 0;
		$total_earnt = 0;
		$total_timers = 0;
		$projects = array();

		if($type != 3) {
			for ($i=$days; $i>-1; $i--) {
				$date = date("Y-m-d", strtotime($i." ".$string));
				$time = $this->time_model->count_hours_date($date, $this->user->info->ID);
				if($time->num_rows() > 0) {
					$hours = 0;
					foreach($time->result() as $r) {
						$hour = ($r->time/3600);
						$hours += $hour;

						if(isset($projects[$r->projectid])) {
							$projects[$r->projectid]['times'] += 1;
							$projects[$r->projectid]['hours'] += $hour;
						} else {
							if(!isset($r->name)) {
								$r->name = lang("ctn_1105");
							}
							$projects[$r->projectid]['title'] = $r->name;
							$projects[$r->projectid]['times'] = 1;
							$projects[$r->projectid]['hours'] = $hour;
						}
						$earnt = $hour * $r->rate;
						$total_hours += $hour;
						$total_earnt += $earnt;
						$total_timers++;
					}

					$hours = round($hours, 2);

					$hour = array(
						"date" => $date,
						"hours" => $hours
					);
				    $last_dates[] = $hour;
				} else {
					$hour = array(
						"date" => $date,
						"hours" => 0
					);
				    $last_dates[] = $hour;
				}
			}
		} else {
			for ($i=1; $i<=$days; $i++) {
				$date = date("Y-m-d", strtotime($i." ".$string));
				$time = $this->time_model->count_hours_date($date, $this->user->info->ID);
				if($time->num_rows() > 0) {
					$hours = 0;
					foreach($time->result() as $r) {
						$hour = ($r->time/3600);
						$hours += $hour;

						if(isset($projects[$r->projectid])) {
							$projects[$r->projectid]['times'] += 1;
							$projects[$r->projectid]['hours'] += $hour;
						} else {
							if(!isset($r->name)) {
								$r->name = lang("ctn_1105");
							}
							$projects[$r->projectid]['title'] = $r->name;
							$projects[$r->projectid]['times'] = 1;
							$projects[$r->projectid]['hours'] = $hour;
						}
						$earnt = $hour * $r->rate;
						$total_hours += $hour;
						$total_earnt += $earnt;
						$total_timers++;
					}

					$hours = round($hours, 2);

					$hour = array(
						"date" => $date,
						"hours" => $hours
					);
				    $last_dates[] = $hour;
				} else {
					$hour = array(
						"date" => $date,
						"hours" => 0
					);
				    $last_dates[] = $hour;
				}
			}
		}


		$this->template->loadContent("time/stats.php", array(
			"last_dates" => $last_dates,
			"total_hours" => $total_hours,
			"total_earnt" => $total_earnt,
			"total_timers" => $total_timers,
			"projects" => $projects,
			"type" => $type,
			"month" => $month
			)
		);
	}


	public function get_tasks_for_project() 
	{
		$projectid = intval($this->input->get("projectid"));
		if($projectid > 0) {
			$project = $this->projects_model->get_project($projectid);
			if($project->num_rows() == 0) {
				$this->template->errori(lang("error_72"));
			}
			$project = $project->row();
		} else {
			$projectid = 0;
		}

		$this->common->check_permissions(
				lang("error_225"), 
				array("admin", "project_admin", "time_manage"), // User Roles
				array("admin", "time"),
				$projectid  // Team Roles
			);

		// Get tasks for this project
		$this->load->model("task_model");
		$tasks = $this->task_model->get_all_tasks_for_project($projectid);
		$this->template->loadAjax("time/get_tasks_for_project.php", array(
			"tasks" => $tasks
			), 0
		);
	}

}

?>