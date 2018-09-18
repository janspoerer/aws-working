<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
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
	}

	public function index($catid=0) 
	{
		$_SESSION['p_page'] = "index";
		$this->template->loadExternal(
			'<script src="'.base_url().
			'scripts/libraries/jscolor.min.js"></script>'
		);
		$this->template->loadData("activeLink", 
			array("projects" => array("general" => 1)));

		$catid = intval($catid);

		$categories = $this->projects_model->get_project_categories();


		$this->template->loadContent("projects/index.php", array(
			"categories" => $categories,
			"catid" => $catid,
			"page" => "index"
			)
		);
	}

	public function gantt_chart($id) 
	{
		$this->template->loadData("activeLink", 
			array("projects" => array("general" => 1)));
		$this->load->model("task_model");
		$team_member = null;
		// Get user permission
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
			$team_member = $this->team_model
				->get_member_of_project($this->user->info->ID, $id);
			if($team_member->num_rows() == 0) {
					$this->template->error(lang("error_71"));
			}
			$team_member = $team_member->row();
		}

		$project = $this->projects_model->get_project($id);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		// Get all Tasks
		$tasks = $this->task_model->get_all_tasks_no_pagination($id,0,0);
		if($tasks->num_rows() == 0) {
			$this->template->error(lang("error_267"));
		}

		// Find Date Range
		$start_date_range = 0;
		$end_date_range = 0;
		foreach($tasks->result() as $r) {
			if($start_date_range == 0) {
				$start_date_range = $r->start_date;
			}
			if($r->start_date <= $start_date_range) {
				$start_date_range = $r->start_date;
			}

			if($end_date_range == 0) {
				$end_date_range = $r->due_date;
			}

			if($r->due_date > $end_date_range) {
				$end_date_range = $r->due_date;
			}
		}

		$range1 = date($this->settings->info->date_picker_format, 
			$start_date_range);
		$range2 = date($this->settings->info->date_picker_format,
			$end_date_range);

		// Get all dates
		$dates = $this->common->getDatesFromRange($range1, $range2, 
			$this->settings->info->date_picker_format, "Y-m-d");

		// Now find all months and days in month
		$dates_months = array();
		$current_month = 0;
		$days_count = 0;
		$current_year = 0;
		foreach($dates as $date) {
			$current_year = date("Y", $date['timestamp']);

			if($current_month == 0) {
				$current_month = date("m", $date['timestamp']);
				$current_month_d = date("F", $date['timestamp']);
			}

			if($current_month != date("m", $date['timestamp'])) {
				$dates_months[] = array(
					"month" => $current_month, 
					"days" => $days_count,
					"year" => $current_year,
					"display" => $current_month_d
				);
				$current_month = date("m", $date['timestamp']);
				$current_month_d = date("F", $date['timestamp']);
				$days_count = 0;
			}
			$days_count++;
		}

		$dates_months[] = array(
			"month" => $current_month, 
			"days" => $days_count,
			"year" => $current_year,
			"display" => $current_month_d
		);


		$this->template->loadContent("projects/gantt.php", array(
			"start_date_range" => $start_date_range,
			"end_date_range" => $end_date_range,
			"project" => $project,
			"dates" => $dates,
			"tasks" => $tasks,
			"months" => $dates_months
			)
		);
	}

	public function projects_page($page = "index", $catid) 
	{
		$catid = intval($catid);

		$this->load->library("datatables");

		$this->datatables->set_default_order("projects.ID", "desc");

		// Set page ordering options that can be used
		$this->datatables->ordering(
			array(
				 1 => array(
				 	"projects.name" => 0
				 ),
				 2 => array(
				 	"projects.catid" => 0
				 ),
				 4 => array(
				 	"projects.complete" => 0
				 ),
			)
		);

		if($page == "index") {
			$this->datatables->set_total_rows(
				$this->projects_model
				->get_total_projects_user_all_count($catid, $this->user->info->ID)
			);
			$projects = $this->projects_model->get_projects_user_all($catid, 
			$this->user->info->ID, $this->datatables);
		} elseif($page == "all") {
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
				$this->template->error(lang("error_71"));
			}
			$this->datatables->set_total_rows(
				$this->projects_model
					->get_total_projects_count($catid)
			);
			$projects = $this->projects_model
				->get_projects($catid, $this->datatables);
		}

		foreach($projects->result() as $r) {

			$project_name = $r->name;
			if($r->ID == $this->user->info->active_projectid) {
				$project_name .= '<label class="label label-success">'.lang("ctn_787").'</label>';
			}
			if($r->status == 1) {
				$project_name .= '<label class="label label-default">'.lang("ctn_778").'</label>';
			}

			$member_string = '';
			$members = $this->team_model->get_members_for_project($r->ID);
    		$our_user = new STDclass; // For the current user 
    		foreach($members->result() as $member) {
    			if($member->userid == $this->user->info->ID) $our_user = $member;
    			$member_string .= '<div class="projects-team-members-simple">
    			'.$this->common->get_user_display(array("username" => $member->username, "avatar" => $member->avatar, "online_timestamp" => $member->online_timestamp)).'</div>';
    		}

    		$options = '<a href="'.site_url("projects/make_active/" . $r->ID).'" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="'.lang("ctn_788").'"><span class="glyphicon glyphicon-pushpin"></span></a> <a href="'.site_url("projects/view/" . $r->ID).'" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="bottom" title="'.lang("ctn_555").'">'.lang("ctn_555").'</a> ';
        	if( $this->common->has_permissions(array("admin", "project_admin"), $this->user) || ($this->common->has_team_permissions(array("admin"), $our_user)) ) {
        		$options .= '<a href="'.site_url("projects/edit_project/" . $r->ID).'" class="btn btn-warning btn-xs" title="'.lang("ctn_55").'" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-cog"></span></a> <a href="'.site_url("projects/delete_project/" . $r->ID . "/" . $this->security->get_csrf_hash()).'" class="btn btn-danger btn-xs" onclick="return confirm(\''.lang("ctn_789").'\')" title="'.lang("ctn_57").'"  data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></a>';
        	}

			$this->datatables->data[] = array(
				'<img src="'.base_url().'/'.$this->settings->info->upload_path_relative.'/'. $r->image.'" width="40" class="user-icon">',
				$project_name,
				'<span class="label label-default" style="background: #'.$r->cat_color.';">'.$r->catname.'</span>',
				$member_string,
				'<div class="progress" style="height: 15px;">
				  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'.$r->complete .'" aria-valuemin="0" aria-valuemax="100" style="width: '.$r->complete.'%" title="'.$r->complete.'%" data-toggle="tooltip" data-placement="bottom">
				    <span class="sr-only">'.$r->complete.'% '.lang("ctn_790").'</span>
				  </div>
				</div>',
				$options
			);
		}

		echo json_encode($this->datatables->process());
	}

	public function all($catid=0) 
	{
		$_SESSION['p_page'] = "all";
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$this->template->loadExternal(
			'<script src="'.base_url().
			'scripts/libraries/jscolor.min.js"></script>'
		);
		$this->template->loadData("activeLink", 
			array("projects" => array("all" => 1)));

		$catid = intval($catid);

		$categories = $this->projects_model->get_project_categories();


		$this->template->loadContent("projects/index.php", array(
			"categories" => $categories,
			"catid" => $catid,
			"page" => "all"
			)
		);
	}

	public function view($id, $page=0) 
	{
		$this->template->loadData("activeLink", 
			array("projects" => array("general" => 1)));

		$this->load->model("task_model");
		$this->load->model("file_model");
		$id = intval($id);
		$page = intval($page);

		$team_member = null;
		// Get user permission
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
			$team_member = $this->team_model
				->get_member_of_project($this->user->info->ID, $id);
			if($team_member->num_rows() == 0) {
					$this->template->error(lang("error_71"));
			}
			$team_member = $team_member->row();
		}

		$project = $this->projects_model->get_project($id);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		$members = $this->team_model->get_members_for_project($id);

		$activity = $this->team_model->get_project_log($id, 0, 5);

		$messages = $this->projects_model->get_messages($id, $page);

		$tasks_total = $this->task_model->get_all_tasks_total($id, 0);

		$files = $this->file_model->get_recent_files_by_project($id);

		// * Pagination *//
		$this->load->library('pagination');
		$config['base_url'] = site_url("projects/view/" . $id);
		$config['total_rows'] = $this->projects_model
			->get_total_messages($id);
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
		include (APPPATH . "/config/page_config.php");
		$this->pagination->initialize($config);

		$this->template->loadContent("projects/view.php", array(
			"project" => $project,
			"team_member" => $team_member,
			"members" => $members,
			"activity" => $activity,
			"messages" => $messages,
			"tasks_total" => $tasks_total,
			"files" => $files
			)
		);

	}

	public function delete_message($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error("Invalid Hash!");
		}
		$id = intval($id);
		$message = $this->projects_model->get_message($id);
		if($message->num_rows() == 0) {
			$this->template->error("Invalid Message");
		}
		$message = $message->row();
		if($message->userid != $this->user->info->ID) {
			$this->common->check_permissions(
				lang("error_2"), 
				array("admin", "project_admin"), // User Roles
				array("admin"),  // Team Roles
				$message->projectid
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1408"),
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $id,
			"url" => "projects/view/" . $id
			)
		);

		$this->projects_model->delete_message($id);
		$this->session->set_flashdata("globalmsg", lang("success_131"));
		redirect(site_url("projects/view/" . $message->projectid));
	}

	public function add_message($id) 
	{
		$id = intval($id);

		$team_member = null;
		// Get user permission
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
			$team_member = $this->team_model
				->get_member_of_project($this->user->info->ID, $id);
			if($team_member->num_rows() == 0) {
					$this->template->error(lang("error_71"));
			}
			$team_member = $team_member->row();
		}

		$project = $this->projects_model->get_project($id);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		$message = $this->lib_filter->go($this->input->post("message"));
		if(empty($message)) {
			$this->template->error(lang("error_187"));
		}

		// Add
		$this->projects_model->add_message(array(
			"userid" => $this->user->info->ID,
			"message" => $message,
			"projectid" => $id,
			"timestamp" => time()
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1409"),
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $id,
			"url" => "projects/view/" . $id
			)
		);

		$this->session->set_flashdata("globalmsg", lang("success_92"));
		redirect(site_url("projects/view/" . $id));
	}

	public function cats() 
	{
		$this->template->loadExternal(
			'<script src="'.base_url().
			'scripts/libraries/jscolor.min.js"></script>'
		);
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$this->template->loadData("activeLink", 
			array("projects" => array("cats" => 1)));
		$cats = $this->projects_model->get_project_categories();
		$this->template->loadContent("projects/cats.php", array(
			"cats" => $cats
			)
		);
	}

	public function add_category() 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$name = $this->common->nohtml($this->input->post("name"));
		$color = $this->common->nohtml($this->input->post("color"));
		if(strlen($color) > 6) {
			$this->template->error(lang("error_148"));
		}
		if(empty($name)) $this->template->error(lang("error_112"));

		// Add
		$this->projects_model->add_category(array(
			"name" => $name,
			"color" => $color
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1042") ." <b>".$name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "projects/cats"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_51"));
		redirect(site_url("projects/cats"));
	}

	public function edit_cat($id) 
	{
		$this->template->loadExternal(
			'<script src="'.base_url().
			'scripts/libraries/jscolor.min.js"></script>'
		);
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$id = intval($id);
		$cat = $this->projects_model->get_category($id);
		if($cat->num_rows() == 0) {
			$this->template->error(lang("error_149"));
		}
		$cat = $cat->row();
		$this->template->loadContent("projects/edit_cat.php", array(
			"cat" => $cat
			)
		);
	}

	public function edit_cat_pro($id) 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$id = intval($id);
		$cat = $this->projects_model->get_category($id);
		if($cat->num_rows() == 0) {
			$this->template->error(lang("error_149"));
		}
		$cat = $cat->row();

		$name = $this->common->nohtml($this->input->post("name"));
		$color = $this->common->nohtml($this->input->post("color"));
		if(strlen($color) > 6) {
			$this->template->error(lang("error_148"));
		}
		if(empty($name)) $this->template->error(lang("error_112"));

		// Add
		$this->projects_model->update_category($id, array(
			"name" => $name,
			"color" => $color
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1043") . " <b>".$name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "projects/cats"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_53"));
		redirect(site_url("projects/cats"));
	}

	public function delete_cat($id, $hash) 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$cat = $this->projects_model->get_category($id);
		if($cat->num_rows() == 0) {
			$this->template->error(lang("error_149"));
		}
		$cat = $cat->row();

		$this->projects_model->delete_category($id);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1044") . " <b>".$cat->name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "projects/cats"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_52"));
		redirect(site_url("projects/cats"));
	}

	public function add_project() 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"project_worker"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$name = $this->common->nohtml($this->input->post("name"));
		$description = $this->lib_filter->go($this->input->post("description"));
		$catid = intval($this->input->post("catid"));
		$calendar_id = $this->common->nohtml($this->input->post("calendar_id"));
		$calendar_color = $this->common->nohtml($this->input->post("calendar_color"));

		$complete = intval($this->input->post("complete"));
		$complete_sync = intval($this->input->post("complete_sync"));

		if(empty($name)) $this->template->error(lang("error_150"));

		$cat = $this->projects_model->get_category($catid);
		if($cat->num_rows() == 0) {
			$this->template->error(lang("error_149"));
		}

		$this->load->library("upload");

		if ($_FILES['userfile']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "max_filename" => 300,
		       "encrypt_name" => TRUE,
		       "remove_spaces" => TRUE,
		       "allowed_types" => $this->settings->info->file_types,
		       "max_size" => $this->settings->info->file_size,
		       "max_width" => 150,
		       "max_height" => 150
		    ));

		    if (!$this->upload->do_upload()) {
		    	$this->template->error(lang("error_21")
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $image = $data['file_name'];
		} else {
			$image= "default.png";
		}

		// Add Project
		$projectid = $this->projects_model->add_project(array(
			"name" => $name,
			"description" => $description,
			"catid" => $catid,
			"userid" => $this->user->info->ID,
			"timestamp" => time(),
			"image" => $image,
			"calendar_id" => $calendar_id,
			"calendar_color" => $calendar_color,
			"complete" => $complete,
			"complete_sync" => $complete_sync
			)
		);

		// Add Team Members
		$this->team_model->add_member(array(
			"projectid" => $projectid,
			"userid" => $this->user->info->ID,
			"roleid" => 1
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1045"). " <b>".$name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $projectid,
			"url" => "projects"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_67"));
		redirect(site_url("projects"));
	}

	public function delete_project($id, $hash) 
	{
		// Get user permission
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
			$team_member = $this->team_model
				->get_member_of_project($this->user->info->ID, $id);
			if($team_member->num_rows() == 0) {
					$this->template->error(lang("error_71"));
			} else {
				$team = $team_member->row();
				if(!$this->common->has_team_permissions(array("admin"), $team)) {
					$this->template->error(lang("error_151"));
				}
			}
		}
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$project = $this->projects_model->get_project($id);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		// Delete
		$this->projects_model->delete_project($id);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1046") . " <b>".$project->name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $project->ID,
			"url" => "projects"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_68"));
		if(isset($_SESSION['p_page'])) {
			$page = $this->common->nohtml($_SESSION['p_page']);
		} else {
			$page = "index";
		}
		redirect(site_url("projects/" . $page));
	}

	public function edit_project($id) 
	{
		// Get user permission
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
			$team_member = $this->team_model
				->get_member_of_project($this->user->info->ID, $id);
			if($team_member->num_rows() == 0) {
					$this->template->error(lang("error_71"));
			} else {
				$team = $team_member->row();
				if(!$this->common->has_team_permissions(array("admin"), $team)) {
					$this->template->error(lang("error_151"));
				}
			}
		}
		$this->template->loadExternal(
			'<script src="'.base_url().
			'scripts/libraries/jscolor.min.js"></script>'
		);
		$id = intval($id);
		$project = $this->projects_model->get_project($id);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}

		$cats = $this->projects_model->get_project_categories();
		$this->template->loadContent("projects/edit.php", array(
			"categories" => $cats,
			"project" => $project->row()
			)
		);
	}

	public function edit_project_pro($id) 
	{
		// Get user permission
		if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
			$team_member = $this->team_model
				->get_member_of_project($this->user->info->ID, $id);
			if($team_member->num_rows() == 0) {
					$this->template->error(lang("error_71"));
			} else {
				$team = $team_member->row();
				if(!$this->common->has_team_permissions(array("admin"), $team)) {
					$this->template->error(lang("error_151"));
				}
			}
		}
		$id = intval($id);
		$project = $this->projects_model->get_project($id);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		$name = $this->common->nohtml($this->input->post("name"));
		$description = $this->lib_filter->go($this->input->post("description"));
		$catid = intval($this->input->post("catid"));
		$status = intval($this->input->post("status"));
		$calendar_id = $this->common->nohtml($this->input->post("calendar_id"));
		$calendar_color = $this->common->nohtml($this->input->post("calendar_color"));

		$complete = intval($this->input->post("complete"));
		$complete_sync = intval($this->input->post("complete_sync"));

		if($status != 0 && $status != 1) {
			$this->template->error(lang("error_152"));
		}

		if(empty($name)) $this->template->error(lang("error_150"));

		$cat = $this->projects_model->get_category($catid);
		if($cat->num_rows() == 0) {
			$this->template->error(lang("error_149"));
		}

		$this->load->library("upload");

		if ($_FILES['userfile']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "max_filename" => 300,
		       "encrypt_name" => TRUE,
		       "remove_spaces" => TRUE,
		       "allowed_types" => $this->settings->info->file_types,
		       "max_size" => $this->settings->info->file_size,
		       "max_width" => 150,
		       "max_height" => 150
		    ));

		    if (!$this->upload->do_upload()) {
		    	$this->template->error(lang("error_21")
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $image = $data['file_name'];
		} else {
			$image= $project->image;
		}

		if($complete_sync) {
			// Get all tasks
			$this->load->model("task_model");
			$tasks = $this->task_model->get_all_project_tasks($project->ID);
			$total = $tasks->num_rows() * 100;
			$complete = 0;
			foreach($tasks->result() as $r) {
				$complete += $r->complete;
			}

			$complete = @intval(($complete/$total) * 100);
		}

		// Update Project
		$this->projects_model->update_project($project->ID, array(
			"name" => $name,
			"description" => $description,
			"catid" => $catid,
			"userid" => $this->user->info->ID,
			"timestamp" => time(),
			"image" => $image,
			"status" => $status,
			"calendar_id" => $calendar_id,
			"calendar_color" => $calendar_color,
			"complete" => $complete,
			"complete_sync" => $complete_sync
			)
		);


		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1047") . " <b>".$name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $project->ID,
			"url" => "projects"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_69"));
		if(isset($_SESSION['p_page'])) {
			$page = $this->common->nohtml($_SESSION['p_page']);
		} else {
			$page = "index";
		}
		redirect(site_url("projects/" . $page));
	}

	public function make_active($id) 
	{
		$id = intval($id);
		if($id > 0) {
			$project = $this->projects_model->get_project($id);
			if($project->num_rows() == 0) {
				$this->template->error(lang("error_72"));
			}
			$project = $project->row();

			// Active if user is admin only or a member of the project
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
				$this->user)) {
				// Check if user is a member
				$member = $this->team_model
					->get_member_of_project($this->user->info->ID, $project->ID);
				if($member->num_rows() == 0) {
					$this->template->error(lang("error_153"));
				}
			}

			$this->user_model->update_user($this->user->info->ID, array(
				"active_projectid" => $project->ID
				)
			);
			$msg = lang("success_70");
		} else {
			$msg = lang("success_71");
			$this->user_model->update_user($this->user->info->ID, array(
				"active_projectid" => 0
				)
			);
		}

		$this->session->set_flashdata("globalmsg", $msg);
		if(isset($_SESSION['p_page'])) {
			$page = $this->common->nohtml($_SESSION['p_page']);
		} else {
			$page = "index";
		}
		redirect(site_url("projects/" . $page));
	}

}

?>