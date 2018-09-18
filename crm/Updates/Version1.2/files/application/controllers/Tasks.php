<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("task_model");
		$this->load->model("team_model");
		$this->load->model("projects_model");

		if(!$this->user->loggedin) $this->template->error(lang("error_1"));

		// If the user does not have premium. 
		// -1 means they have unlimited premium
		if($this->settings->info->global_premium && 
			($this->user->info->premium_time != -1 && 
				$this->user->info->premium_time < time()) ) {
			$this->session->set_flashdata("globalmsg", lang("success_29"));
			redirect(site_url("funds/plans"));
		}
		if(!$this->common->has_permissions(array("admin", "project_admin",
		 "task_manage", "task_worker"), 
			$this->user)) 
		{
			$this->template->error(lang("error_71"));
		}
	}

	public function index($projectid = 0, $status=0) 
	{
		$this->template->loadData("activeLink", 
			array("task" => array("general" => 1)));

		$projectid = intval($projectid);
		$status = intval($status);

		// if no project, set active
		if($projectid == 0) {
			if($this->user->info->active_projectid > 0) {
				$projectid = $this->user->info->active_projectid;
			}
		}

		if($this->common->has_permissions(
			array("admin", "project_admin", "task_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.task = 1)");
		}
		
		$this->template->loadContent("tasks/index.php", array(
			"u_status" => $status,
			"projectid" => $projectid,
			"projects" => $projects,
			"page" => "index"
			)
		);

	}

	public function tasks_page($page = "index", $projectid=0, $u_status =0) 
	{
		$projectid = intval($projectid);
		$u_status = intval($u_status);

		// if no project, set active
		if($projectid == 0) {
			if($this->user->info->active_projectid > 0) {
				$projectid = $this->user->info->active_projectid;
			}
		}

		$this->load->library("datatables");

		$this->datatables->set_default_order("project_tasks.due_date", "asc");

		// Set page ordering options that can be used
		$this->datatables->ordering(
			array(
				 0 => array(
				 	"project_tasks.name" => 0
				 ),
				 1 => array(
				 	"project_tasks.status" => 0
				 ),
				 2 => array(
				 	"projects.name" => 0
				 ),
				 3 => array(
				 	"project_tasks.complete" => 0
				 ),
				 4 => array(
				 	"project_tasks.due_date" => 0
				 )
			)
		);

		if($page == "index") {

			$this->datatables->set_total_rows(
				$this->task_model
					->get_project_tasks_total($projectid, $u_status, $this->user->info->ID)
			);

			$tasks = $this->task_model->get_project_tasks($projectid, $u_status,
				$this->user->info->ID, $this->datatables);
		} elseif($page == "assigned") {
			$this->datatables->set_total_rows(
				$this->task_model
				->get_user_assigned_tasks_total($projectid, $u_status, $this->user->info->ID)
			);
			$tasks = $this->task_model->get_user_assigned_tasks($projectid, $u_status,
				$this->user->info->ID, $this->datatables);
		} elseif($page == "all") {
			$this->common->check_permissions(
				lang("error_162"), 
				array("admin", "project_admin", "task_manage"), // User Roles
				array(),
				0  // Team Roles
			);
			$this->datatables->set_total_rows(
				$this->task_model
				->get_all_tasks_total($projectid, $u_status)
			);

			$tasks = $this->task_model->get_all_tasks($projectid, $u_status, $this->datatables);
		}

		foreach($tasks->result() as $r) {
			if($r->status == 1) {
				$status = "<label class='label label-info'>".lang("ctn_830")."</label>";
			} elseif($r->status == 2) {
				$status = "<label class='label label-primary'>".lang("ctn_831")."</label>";
			} elseif($r->status == 3) {
				$status = "<label class='label label-success'>".lang("ctn_832")."</label>";
			} elseif($r->status == 4) {
				$status = "<label class='label label-warning'>".lang("ctn_833")."</label>";
			} elseif($r->status == 5) {
				$status = "<label class='label label-danger'>".lang("ctn_834")."</label>";
			}
			$this->datatables->data[] = array(
				$r->name,
				$status,
				'<a href="'.site_url("tasks/".$page."/" . $r->projectid . "/" . $u_status).'">'.$r->project_name.'</a>',
				'<div class="progress" style="height: 15px;">
					  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'.$r->complete.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$r->complete.'%" title="'.$r->complete .'%" data-toggle="tooltip" data-placement="bottom">
					    <span class="sr-only">'.$r->complete.'% '.lang("ctn_790").'</span>
					  </div>
				</div>',
				date($this->settings->info->date_format, $r->due_date),
				'<a href="'.site_url("tasks/view/" . $r->ID) .'" class="btn btn-info btn-xs">'.lang("ctn_886").'</a> <a href="'.site_url("tasks/edit_task/" . $r->ID) .'" class="btn btn-warning btn-xs" title="'.lang("ctn_55").'" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-cog"></span></a> <a href="'.site_url("tasks/delete_task/" . $r->ID . "/" . $this->security->get_csrf_hash()).'" class="btn btn-danger btn-xs" onclick="return confirm(\''.lang("ctn_508").'\')" title="'.lang("ctn_57").'" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></a>'

			);
		}

		echo json_encode($this->datatables->process());

	}

	public function assigned($projectid =0, $status=0) 
	{
		$this->template->loadData("activeLink", 
			array("task" => array("your" => 1)));

		$status = intval($status);
		$projectid = intval($projectid);

		// if no project, set active
		if($projectid == 0) {
			if($this->user->info->active_projectid > 0) {
				$projectid = $this->user->info->active_projectid;
			}
		}

		if($this->common->has_permissions(
			array("admin", "project_admin", "task_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.task = 1)");
		}
		
		$this->template->loadContent("tasks/index.php", array(
			"u_status" => $status,
			"projectid" => $projectid,
			"projects" => $projects,
			"page" => "assigned"
			)
		);
	}

	public function all($projectid=0, $status=0, $page =0) 
	{
		$this->template->loadData("activeLink", 
			array("task" => array("all" => 1)));

		$this->common->check_permissions(
			lang("error_162"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array(),
			0  // Team Roles
		);

		$page = intval($page);
		$status = intval($status);
		$projectid = intval($projectid);

		// if no project, set active
		if($projectid == 0) {
			if($this->user->info->active_projectid > 0) {
				$projectid = $this->user->info->active_projectid;
			}
		}

		if($this->common->has_permissions(
			array("admin", "project_admin", "task_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.task = 1)");
		}
		
		$this->template->loadContent("tasks/index.php", array(
			"projectid" => $projectid,
			"projects" => $projects,
			"u_status" => $status,
			"page" => "all"
			)
		);
	}

	public function add() 
	{
		$this->template->loadExternal(
			'<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js">
			</script>'
		);
		$this->template->loadData("activeLink", 
			array("task" => array("general" => 1)));


		// If user is Admin, Project-Admin or File manager let them
		// view all projects
		if($this->common->has_permissions(
			array("admin", "project_admin", "task_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.task = 1)");
		}

		$this->template->loadContent("tasks/add.php", array(
			"projects" => $projects
			)
		);
	}

	public function add_task_process() 
	{
		$name = $this->common->nohtml($this->input->post("name"));
		$desc = $this->lib_filter->go($this->input->post("description"));
		$projectid = intval($this->input->post("projectid"));
		$start_date = $this->common->nohtml($this->input->post("start_date"));
		$due_date = $this->common->nohtml($this->input->post("due_date"));
		$status = intval($this->input->post("status"));
		$assign = intval($this->input->post("assign"));

		if(empty($name)) {
			$this->template->error(lang("error_163"));
		}

		if($status < 1 || $status > 5) {
			$this->template->error(lang("error_164"));
		}

		$project = $this->projects_model->get_project($projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();
		

		$this->common->check_permissions(
			lang("error_165"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$projectid
		);

		if(!empty($start_date)) {
			$sd = DateTime::createFromFormat($this->settings->info->date_picker_format, $start_date);
			$sd_timestamp = $sd->getTimestamp();
		} else {
			$sd_timestamp = time();
		}

		if(!empty($due_date)) {
			$dd = DateTime::createFromFormat($this->settings->info->date_picker_format, $due_date);
			$dd_timestamp = $dd->getTimestamp();
		} else {
			$dd_timestamp = 0;
		}

		$taskid = $this->task_model->add_task(array(
			"name" => $name,
			"description" => $desc,
			"projectid" => $projectid,
			"start_date" => $sd_timestamp,
			"due_date" => $dd_timestamp,
			"status" => $status,
			"userid" => $this->user->info->ID
			)
		);

		if($assign) {
			// Add member
			$this->task_model->add_task_member(array(
				"taskid" => $taskid,
				"userid" => $this->user->info->ID
				)
			);
		}

		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1050") . $name . lang("ctn_1051") . $project->name,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $projectid,
			"url" => "tasks/view_task/" . $taskid,
			"taskid" => $taskid
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_81"));
		redirect(site_url("tasks"));
	}

	public function delete_task($taskid, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		if($task->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_167"), 
				array("admin", "project_admin", "task_manage"), // User Roles
				array("admin"),  // Team Roles
				$task->projectid
			);
		}

		$project = $this->projects_model->get_project($task->projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		$this->task_model->delete_task($taskid);

		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1052") .  $task->name,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks",
			"taskid" => $task->ID
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_82"));
		redirect(site_url("tasks"));
	}

	public function edit_task($taskid) 
	{
		$this->template->loadData("activeLink", 
			array("task" => array("general" => 1)));
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		if($task->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("ctn_1053"), 
				array("admin", "project_admin", "task_manage"), // User Roles
				array("admin"),  // Team Roles
				$task->projectid
			);
		}

		$this->template->loadExternal(
			'<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js">
			</script>'
		);
		$this->template->loadData("activeLink", 
			array("task" => array("general" => 1)));


		// If user is Admin, Project-Admin or File manager let them
		// view all projects
		if($this->common->has_permissions(
			array("admin", "project_admin", "task_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.task = 1)");
		}

		$this->template->loadContent("tasks/edit_task.php", array(
			"task" => $task,
			"projects" => $projects
			)
		);
	}

	public function edit_task_pro($taskid) 
	{
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		if($task->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("ctn_1053"), 
				array("admin", "project_admin", "task_manage"), // User Roles
				array("admin"),  // Team Roles
				$task->projectid
			);
		}

		$name = $this->common->nohtml($this->input->post("name"));
		$desc = $this->lib_filter->go($this->input->post("description"));
		$projectid = intval($this->input->post("projectid"));
		$start_date = $this->common->nohtml($this->input->post("start_date"));
		$due_date = $this->common->nohtml($this->input->post("due_date"));
		$status = intval($this->input->post("status"));

		if(empty($name)) {
			$this->template->error(lang("error_163"));
		}

		if($status < 1 || $status > 5) {
			$this->template->error(lang("error_164"));
		}

		$project = $this->projects_model->get_project($projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();
		

		$this->common->check_permissions(
			lang("ctn_1053"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$projectid
		);

		if(!empty($start_date)) {
			$sd = DateTime::createFromFormat($this->settings->info->date_picker_format, $start_date);
			$sd_timestamp = $sd->getTimestamp();
		} else {
			$sd_timestamp = time();
		}

		if(!empty($due_date)) {
			$dd = DateTime::createFromFormat($this->settings->info->date_picker_format, $due_date);
			$dd_timestamp = $dd->getTimestamp();
		} else {
			$dd_timestamp = 0;
		}

		$this->task_model->update_task($taskid, array(
			"name" => $name,
			"description" => $desc,
			"projectid" => $projectid,
			"start_date" => $sd_timestamp,
			"due_date" => $dd_timestamp,
			"status" => $status
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1054") . $name . lang("ctn_1051") .$project->name,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $projectid,
			"url" => "tasks/view_task/" . $taskid,
			"taskid" => $taskid
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_83"));
		redirect(site_url("tasks"));
	}

	public function view($taskid, $page=0) 
	{
		$this->template->loadData("activeLink", 
			array("task" => array("general" => 1)));
		$this->template->loadExternal(
			'<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js">
			</script>
			<script type="text/javascript" src="'
			.base_url().'scripts/libraries/Chart.min.js" /></script>
			<script src="'.base_url().'scripts/custom/tasks.js">
			</script>'
		);
		$taskid = intval($taskid);
		$page = intval($page);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_168"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$members = $this->team_model->get_members_for_project($task->projectid);
		$task_members = $this->task_model->get_task_members($taskid);
		$objectives = $this->task_model->get_task_objectives($taskid);
		$files = $this->task_model->get_attached_files($taskid);
		$messages = $this->task_model->get_task_messages($taskid, $page);
		$actions = $this->task_model->get_activity_log($taskid);

		// * Pagination *//
		$this->load->library('pagination');
		$config['base_url'] = site_url("tasks/view/" . $taskid);
		$config['total_rows'] = $this->task_model
			->get_task_messages_total($taskid);
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		include (APPPATH . "/config/page_config.php");
		$this->pagination->initialize($config);


		// Time stats
		$this->load->model("time_model");
		// Get days
		$last_dates = array();
		$total_hours = 0;
		$total_earnt = 0;
		$total_timers = 0;
		$projects = array();
		$days = 6;

		for ($i=$days; $i>-1; $i--) {
			$date = date("Y-m-d", strtotime($i." days ago"));
			$time = $this->time_model->count_hours_date_task($date, $taskid);
			if($time->num_rows() > 0) {
				$hours = 0;
				foreach($time->result() as $r) {
					$hour = ($r->time/3600);
					$hours += $hour;

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

		$this->template->loadContent("tasks/view_task.php", array(
			"task" => $task,
			"members" => $members,
			"task_members" => $task_members,
			"objectives" => $objectives,
			"files" => $files,
			"messages" => $messages,
			"actions" => $actions,
			"last_dates" => $last_dates
			)
		);
		
	}

	public function update_details() 
	{
		$taskid = intval($this->input->get("taskid"));
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->jsonError(lang("error_166"));
		}
		$task = $task->row();

		$project = $this->projects_model->get_project($task->projectid);
		if($project->num_rows() == 0) {
			$this->template->jsonError(lang("error_72"));
		}
		$project = $project->row();

		// Permissions
		$this->common->check_permissions(
			lang("ctn_168"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid,
			"",
			"jsonError"
		);

		$start_date = $this->common->nohtml($this->input->get("start_date"));
		$due_date = $this->common->nohtml($this->input->get("due_date"));

		$complete = intval($this->input->get("complete"));
		$sync = intval($this->input->get("sync"));

		if($complete < 0 || $complete > 100) $complete = 0;
		if($sync < 0 || $sync > 1) $sync = 1;

		if(!empty($start_date)) {
			$sd = DateTime::createFromFormat($this->settings->info->date_picker_format, $start_date);
			$sd_timestamp = $sd->getTimestamp();
		} else {
			$sd_timestamp = time();
		}

		if(!empty($due_date)) {
			$dd = DateTime::createFromFormat($this->settings->info->date_picker_format, $due_date);
			$dd_timestamp = $dd->getTimestamp();
		} else {
			$dd_timestamp = 0;
		}

		if($sync) {
			// Count total objectives complete
			$objectives = $this->task_model->get_task_objectives($taskid);
			$complete =0;
			$total = $objectives->num_rows();
			if($total > 0) {
				foreach($objectives->result() as $r) {
					if($r->complete)
					{
						$complete++;
					}
				}
				// Get percentage
				$complete = @intval(($complete/$total) * 100);
			} 
		}

		if($complete >= 100) {
			$status = 3;
		} else {
			if($task->status == 3) {
				$status = 2;
			} else {
				$status = $task->status;
			}
		}

		$this->task_model->update_task($taskid, array(
			"start_date" => $sd_timestamp,
			"due_date" => $dd_timestamp,
			"complete" => $complete,
			"complete_sync" => $sync,
			"status" => $status
			)
		);
		$complete_a = $complete;
		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" =>  lang("ctn_1054") .$task->name. lang("ctn_1051") .$project->name,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view/" . $taskid,
			"taskid" => $taskid
			)
		);

		echo json_encode(array("success" => 1, "complete" => $complete_a));
		exit();
	}

	public function change_status() 
	{
		$taskid = intval($this->input->get("taskid"));
		$status = intval($this->input->get("status"));

		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->jsonError(lang("error_166"));
		}
		$task = $task->row();

		if($status < 1 || $status > 5) {
			$this->template->jsonError(lang("error_164"));
		}

		// Permissions
		$this->common->check_permissions(
			lang("error_168"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid,
			"",
			"jsonError"
		);

		$this->task_model->update_task($taskid, array(
			"status" => $status
			)
		);

		echo json_encode(array("success" => 1));
		exit();
	}

	public function remind_user() 
	{
		$id = intval($this->input->get("id"));
		if($_GET['hash'] != $this->security->get_csrf_hash()) {
			$this->template->jsonError(lang("error_6"));
		}

		// Get task member
		$member = $this->task_model->get_task_member_id($id);
		if($member->num_rows() == 0) {
			$this->template->jsonError(lang("error_169"));
		}
		$member = $member->row();

		// Check permission
		// Permissions
		$this->common->check_permissions(
			lang("error_168"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$member->projectid,
			"",
			"jsonError"
		);

		// Good
		// Send notification of being added to the task
		$this->user_model->increment_field($member->userid, "noti_count", 1);
		$this->user_model->add_notification(array(
			"userid" => $member->userid,
			"url" => "tasks/view/" . $member->taskid,
			"timestamp" => time(),
			"message" => lang("ctn_1055") . $member->name,
			"status" => 0,
			"fromid" => $this->user->info->ID,
			"taskid" => $member->taskid,
			"email" => $member->email,
			"username" => $member->username,
			"email_notification" => $member->email_notification
			)
		);

		echo json_encode(array("success" => 1));
		exit();
	}

	public function add_task_member($taskid) 
	{
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_170"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$userid = intval($this->input->post("userid"));

		// Check user is member of team
		$member = $this->team_model->get_member_of_project($userid, $task->projectid);
		if($member->num_rows() == 0) {
			$this->template->error(lang("error_171"));
		}
		$member = $member->row();

		// Check they're not already a member
		$taskmember = $this->task_model->get_task_member($userid, $taskid);
		if($taskmember->num_rows() > 0) {
			$this->template->error(lang("error_172"));
		}

		// Add member
		$this->task_model->add_task_member(array(
			"taskid" => $taskid,
			"userid" => $userid
			)
		);

		// Send notification of being added to the task
		$this->user_model->increment_field($userid, "noti_count", 1);
		$this->user_model->add_notification(array(
			"userid" => $userid,
			"url" => "tasks/view/" . $taskid,
			"timestamp" => time(),
			"message" => lang("ctn_1056"). $task->name,
			"status" => 0,
			"fromid" => $this->user->info->ID,
			"email" => $member->email,
			"username" => $member->username,
			"email_notification" => $member->email_notification
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1057") . " <b>".$member->username.
			"</b> ".lang("ctn_1058")." <a href='".site_url("tasks/view/" . $task->ID)."'>" 
			. $task->name . "</a>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view/" . $task->ID,
			"taskid" => $task->ID
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_84"));
		redirect(site_url("tasks/view/" . $taskid));
	}

	public function remove_member($userid, $taskid, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$taskid = intval($taskid);
		$userid = intval($userid);

		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_173"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		// Check they're not already a member
		$taskmember = $this->task_model->get_task_member($userid, $taskid);
		if($taskmember->num_rows() == 0) {
			$this->template->error(lang("error_174"));
		}
		$taskmember = $taskmember->row();

		// Remove Member
		$this->task_model->remove_member($userid, $taskid);

		// Send notification of being added to the task
		$this->user_model->increment_field($userid, "noti_count", 1);
		$this->user_model->add_notification(array(
			"userid" => $userid,
			"url" => "tasks/view/" . $taskid,
			"timestamp" => time(),
			"message" => lang("ctn_1059") . $task->name,
			"status" => 0,
			"fromid" => $this->user->info->ID,
			"email" => $taskmember->email,
			"username" => $taskmember->username,
			"email_notification" => $taskmember->email_notification
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1060") . " <b>".$member->username.
			"</b> ".lang("ctn_1061")." <a href='".site_url("tasks/view/" . $task->ID)."'>" 
			. $task->name . "</a>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view/" . $task->ID,
			"taskid" => $task->ID
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_85"));
		redirect(site_url("tasks/view/" . $taskid));
	}

	public function add_task_objective($taskid) 
	{
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		$project = $this->projects_model->get_project($task->projectid);
		if($project->num_rows() == 0) {
			$this->template->jsonError(lang("error_72"));
		}
		$project = $project->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_175"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$title = $this->common->nohtml($this->input->post("title"));
		$desc = $this->lib_filter->go($this->input->post("description"));

		if(empty($title)) {
			$this->template->error(lang("error_176"));
		}

		$objectiveid = $this->task_model->add_objective(array(
			"title" => $title,
			"description" => $desc,
			"userid" => $this->user->info->ID,
			"timestamp" => time(),
			"taskid" => $taskid
			)
		);

		// Get userr
		$task_members = $this->task_model->get_task_members($taskid);
		foreach($task_members->result() as $r) {
			if(isset($_POST['user_' . $r->ID])) {
				// Add user to objective
				$this->task_model->add_objective_member($objectiveid, $r->userid);

				// Notify
				// Send notification of being added to the task
				$this->user_model->increment_field($r->userid, "noti_count", 1);
				$this->user_model->add_notification(array(
					"userid" => $r->userid,
					"url" => "tasks/view/" . $taskid,
					"timestamp" => time(),
					"message" =>  lang("ctn_1062") . $title,
					"status" => 0,
					"fromid" => $this->user->info->ID,
					"email" => $r->email,
					"username" => $r->username,
					"email_notification" => $r->email_notification
					)
				);
			}
		}

		if($task->complete_sync) {
			// Count total objectives complete
			$objectives = $this->task_model->get_task_objectives($taskid);
			$complete =0;
			$total = $objectives->num_rows();
			if($total > 0) {
				foreach($objectives->result() as $r) {
					if($r->complete)
					{
						$complete++;
					}
				}
				// Get percentage
				$complete = @intval(($complete/$total) * 100);
			}

			if($complete >= 100) {
				$status = 3;
			} else {
				if($task->status == 3) {
					$status = 2;
				} else {
					$status = $task->status;
				}
			}
			$this->task_model->update_task($taskid, array(
				"complete" => $complete,
				"status" => $status
				)
			);
		}

		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1063") . " <b>".$title.
			"</b> ".lang("ctn_1058")." <a href='".site_url("tasks/view/" . $task->ID)."'>" 
			. $task->name . "</a>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view/" . $task->ID,
			"taskid" => $task->ID
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_86"));
		redirect(site_url("tasks/view/" . $taskid));

	}

	public function complete_objective($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$objective = $this->task_model->get_task_objective($id);
		if($objective->num_rows() == 0) {
			$this->template->error(lang("error_177"));
		}
		$objective = $objective->row();

		$project = $this->projects_model->get_project($objective->projectid);
		if($project->num_rows() == 0) {
			$this->template->jsonError(lang("error_72"));
		}
		$project = $project->row();

		// Check
		// Permissions
		$this->common->check_permissions(
			lang("error_178"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$objective->projectid
		);

		$this->task_model->update_objective($id, array(
			"complete" => 1
			)
		);

		if($objective->complete_sync) {
			// Count total objectives complete
			$objectives = $this->task_model->get_task_objectives($objective->taskid);
			$complete =0;
			$total = $objectives->num_rows();
			if($total > 0) {
				foreach($objectives->result() as $r) {
					if($r->complete)
					{
						$complete++;
					}
				}
				// Get percentage
				$complete = @intval(($complete/$total) * 100);
			}
			if($complete >= 100) {
				$status = 3;
			} else {
				if($objective->status == 3) {
					$status = 2;
				} else {
					$status = $objective->status;
				}
			}
			$this->task_model->update_task($objective->taskid, array(
				"complete" => $complete,
				"status" => $status
				)
			);
		}

		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1064") . " <b>".$objective->title.
			"</b>" . lang("ctn_1065"),
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $objective->projectid,
			"url" => "tasks/view/" . $objective->taskid,
			"taskid" => $objective->taskid
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_87"));
		redirect(site_url("tasks/view/" . $objective->taskid));
	}

	public function delete_objective($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$objective = $this->task_model->get_task_objective($id);
		if($objective->num_rows() == 0) {
			$this->template->error(lang("error_177"));
		}
		$objective = $objective->row();

		$project = $this->projects_model->get_project($objective->projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		// Check
		// Permissions
		$this->common->check_permissions(
			lang("error_179"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$objective->projectid
		);

		$this->task_model->delete_objective($id);
		$this->task_model->delete_objective_members($id);

		if($objective->complete_sync) {
			// Count total objectives complete
			$objectives = $this->task_model->get_task_objectives($objective->taskid);
			$complete =0;
			$total = $objectives->num_rows();
			if($total > 0) {
				foreach($objectives->result() as $r) {
					if($r->complete)
					{
						$complete++;
					}
				}
				// Get percentage
				$complete = @intval(($complete/$total) * 100);
			}
			if($complete >= 100) {
				$status = 3;
			} else {
				if($objective->status == 3) {
					$status = 2;
				} else {
					$status = $objective->status;
				}
			}
			$this->task_model->update_task($objective->taskid, array(
				"complete" => $complete,
				"status" => $status
				)
			);
		}

		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1066") . " <b>".$objective->title.
			"</b>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $objective->projectid,
			"url" => "tasks/view/" . $objective->taskid,
			"taskid" => $objective->taskid
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_88"));
		redirect(site_url("tasks/view/" . $objective->taskid));
	}

	public function edit_objective($id) 
	{
		$id = intval($id);
		$objective = $this->task_model->get_task_objective($id);
		if($objective->num_rows() == 0) {
			$this->template->error(lang("error_177"));
		}
		$objective = $objective->row();

		// Check
		// Permissions
		$this->common->check_permissions(
			lang("error_180"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$objective->projectid
		);

		$task_members = $this->task_model->get_task_members($objective->taskid);

		$objective_members = $this->task_model->get_task_objective_members($id);

		$objective_members_ids = array();
		foreach($objective_members->result() as $r) {
			$objective_members_ids[] = $r->userid;
		}

		$this->template->loadAjax("tasks/edit_objective.php", array(
			"objective" => $objective,
			"task_members" => $task_members,
			"objective_members_ids" => $objective_members_ids
			),1
		);

	}

	public function edit_objective_pro($id) 
	{
		$id = intval($id);
		$objective = $this->task_model->get_task_objective($id);
		if($objective->num_rows() == 0) {
			$this->template->error(lang("error_177"));
		}
		$objective = $objective->row();

		$project = $this->projects_model->get_project($objective->projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		// Check
		// Permissions
		$this->common->check_permissions(
			lang("error_180"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$objective->projectid
		);

		$title = $this->common->nohtml($this->input->post("title"));
		$desc = $this->lib_filter->go($this->input->post("description"));
		$complete = intval($this->input->post("complete"));

		if(empty($title)) {
			$this->template->error(lang("error_176"));
		}

		$this->task_model->update_objective($id, array(
			"title" => $title,
			"description" => $desc,
			"complete" => $complete
			)
		);

		$this->task_model->delete_objective_members($id);

		// Get userr
		$task_members = $this->task_model->get_task_members($objective->taskid);
		foreach($task_members->result() as $r) {
			if(isset($_POST['user_' . $r->ID])) {
				// Add user to objective
				$this->task_model->add_objective_member($id, $r->userid);
			}
		}

		if($objective->complete_sync) {
			// Count total objectives complete
			$objectives = $this->task_model->get_task_objectives($objective->taskid);
			$complete =0;
			$total = $objectives->num_rows();
			if($total > 0) {
				foreach($objectives->result() as $r) {
					if($r->complete)
					{
						$complete++;
					}
				}
				// Get percentage
				$complete = @intval(($complete/$total) * 100);
			}
			if($complete >= 100) {
				$status = 3;
			} else {
				if($objective->status == 3) {
					$status = 2;
				} else {
					$status = $objective->status;
				}
			}
			$this->task_model->update_task($objective->taskid, array(
				"complete" => $complete,
				"status" => $status
				)
			);
		}

		if($project->complete_sync) {
			// Get all tasks
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
			$this->projects_model->update_project($project->ID, array(
				"complete" => $complete
				)
			);
		}


		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1067") . " <b>".$title.
			"</b>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $objective->projectid,
			"url" => "tasks/view/" . $objective->taskid,
			"taskid" => $objective->taskid
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_89"));
		redirect(site_url("tasks/view/" . $objective->taskid));
	}

	public function get_files($taskid) 
	{
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_168"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$query = $this->common->nohtml($this->input->get("query"));

		// Look up files in the file manager for this project + no project

		if(!empty($query)) {
			$this->load->model("file_model");
			$files = $this->file_model->get_files_by_project($task->projectid, $query);
			if($files->num_rows() == 0) {
				echo json_encode(array());
			} else {
				$array = array();
				foreach($files->result() as $r) {
					$array[] = array("label" => $r->file_name . $r->extension, "value" => $r->ID);
				}
				echo json_encode($array);
				exit();
			}
		} else {
			echo json_encode(array());
			exit();
		}
	}

	public function add_file($taskid) 
	{
		$this->load->model("file_model");
		$taskid = intval($taskid);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("ctn_168"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$fileid = intval($this->input->post("file_search_id"));
		$file = $this->file_model->get_file($fileid);
		if($file->num_rows() == 0) {
			$this->template->error(lang("error_95"));
		}
		$file = $file->row();

		if($file->projectid > 0) {
			if($file->projectid != $task->projectid) {
				$this->template->error(lang("error_181"));
			}
		}

		if($file->folder_flag != 0) {
			$this->template->error(lang("error_182"));
		}

		// Check it's not already attached
		$attached = $this->task_model->get_attached_file($fileid, $taskid);
		if($attached->num_rows() > 0) {
			$this->template->error(lang("error_183"));
		}

		// Attach
		$this->task_model->add_file(array(
			"fileid" => $fileid,
			"taskid" => $taskid
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1068"). " <b>".$file->file_name.
			"</b> ".lang("ctn_1058")." <a href='".site_url("tasks/view/" . $task->ID)."'>" 
			. $task->name . "</a>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view/" . $task->ID,
			"taskid" => $task->ID
			)
		);


		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_90"));
		redirect(site_url("tasks/view/" . $taskid));

	}

	public function remove_file($taskid, $id) 
	{
		$this->load->model("file_model");
		$taskid = intval($taskid);
		$id = intval($id);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_184"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$file = $this->task_model->get_attached_file_id($id, $taskid);
		if($file->num_rows() == 0) {
			$this->template->error(lang("error_185"));
		}
		$file  = $file->row();

		$this->task_model->delete_file($id);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1069") . " <b>".$file->file_name.
			"</b> ".lang("ctn_1061")." <a href='".site_url("tasks/view/" . $task->ID)."'>" 
			. $task->name . "</a>",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view/" . $task->ID,
			"taskid" => $task->ID
			)
		);


		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_91"));
		redirect(site_url("tasks/view/" . $taskid));
	}

	public function add_message($taskid) 
	{
		$taskid = intval($taskid);
		$id = intval($id);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		// Permissions
		$this->common->check_permissions(
			lang("error_186"), 
			array("admin", "project_admin", "task_manage"), // User Roles
			array("admin", "task"),  // Team Roles
			$task->projectid
		);

		$message = $this->lib_filter->go($this->input->post("message"));
		if(empty($message)) {
			$this->template->error(lang("error_187"));
		}

		$this->task_model->add_message(array(
			"userid" => $this->user->info->ID,
			"message" => $message,
			"timestamp" => time(),
			"taskid" => $taskid
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1070"). " {$task->name}",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view_task/" . $taskid,
			"taskid" => $taskid
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_92"));
		redirect(site_url("tasks/view/" . $taskid));
	}

	public function delete_message($taskid, $id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$taskid = intval($taskid);
		$id = intval($id);
		$task = $this->task_model->get_task($taskid);
		if($task->num_rows() == 0) {
			$this->template->error(lang("error_166"));
		}
		$task = $task->row();

		$message = $this->task_model->get_message($id, $taskid);
		if($message->num_rows() == 0) {
			$this->template->error(lang("error_188"));
		}

		$this->task_model->delete_message($id);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1071") . " {$task->name}",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $task->projectid,
			"url" => "tasks/view_task/" . $taskid,
			"taskid" => $taskid
			)
		);
		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_93"));
		redirect(site_url("tasks/view/" . $taskid));
	}

	public function view_activity($taskid, $page=0) 
	{
		$taskid = intval($taskid);
		$page = intval($page);

		$activity = $this->task_model->get_task_activity($taskid, $page);
		if($activity->num_rows() == 0) {
			$this->template->error(lang("error_189"));
		}

		// * Pagination *//
		$this->load->library('pagination');
		$config['base_url'] = site_url("tasks/view_activity/" . $taskid);
		$config['total_rows'] = $this->task_model
			->get_task_activity_total($taskid);
		$config['per_page'] = 15;
		$config['uri_segment'] = 4;
		include (APPPATH . "/config/page_config.php");
		$this->pagination->initialize($config);

		$this->template->loadContent("tasks/view_task_activity.php", array(
			"actions" => $activity
			)
		);
	}


}

?>