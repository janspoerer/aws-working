<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
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
		if(!$this->common->has_permissions(array("admin", "project_admin",
		 "team_manage", "team_worker"), 
			$this->user)) 
		{
			$this->template->error(lang("error_71"));
		}
	}

	public function index($projectid = 0) 
	{
		$this->load->model("projects_model");
		$this->template->loadData("activeLink", 
			array("team" => array("general" => 1)));

		$projectid = intval($projectid);
		if($projectid == 0) {
			$projectid = $this->user->info->active_projectid;
		}

		
		if($this->common->has_permissions(
			array("admin", "project_admin", "team_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.team = 1)");
		}

		$roles = $this->team_model->get_team_roles();

		$this->template->loadContent("team/index.php", array(
			"roles" => $roles,
			"projects" => $projects,
			"projectid" => $projectid,
			"page" => "index"
			)
		);
	}

	public function team_page($page = "index", $projectid = 0) 
	{
		$projectid = intval($projectid);

		$this->load->library("datatables");

		$this->datatables->set_default_order("project.name", "asc");

		// Set page ordering options that can be used
		$this->datatables->ordering(
			array(
				 0 => array(
				 	"users.username" => 0
				 ),
				 1 => array(
				 	"project_roles.name" => 0
				 ),
				 2 => array(
				 	"projects.name" => 0
				 ),
				 3 => array(
				 	"users.online_timestamp" => 0
				 )
			)
		);

		
		if($page == "index") {
			$this->datatables->set_total_rows(
				$this->team_model
					->get_members_all_user_count($projectid, $this->user->info->ID)
			);

			$members = $this->team_model->get_members_all_user($projectid, 
				$this->user->info->ID, $this->datatables);
		} elseif($page == "all") {
			if(!$this->common->has_permissions(array("admin", "project_admin", 
				"team_manage"), 
				$this->user)) {
				$this->template->error(lang("error_71"));
			}
			$this->datatables->set_total_rows(
				$this->team_model->get_members_all_count($projectid)
			);

			$members = $this->team_model->get_members_all($projectid, $this->datatables);
		}


		foreach($members->result() as $r) {

			$options = '';
			if( $this->common->has_permissions(array("admin", "project_admin", "team_manage"), $this->user)) {
				$options .= '<a href="'.site_url("team/user_log/" . $r->userid).'" class="btn btn-info btn-xs">'.lang("ctn_918").'</a> ';
			}
			$options .='<a href="'.site_url("team/edit_member/" . $r->ID).'" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="right" title="'.lang("ctn_55").'"><span class="glyphicon glyphicon-cog"></span></a> <a href="'.site_url("team/remove_member/" . $r->ID . "/" . $this->security->get_csrf_hash()).'" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" onclick="return confirm(\''.lang("ctn_508").'\')" title="'.lang("ctn_57").'"><span class="glyphicon glyphicon-trash"></span></a>';
			$this->datatables->data[] = array(
				$this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp, "first_name" => $r->first_name, "last_name" => $r->last_name)),
				$r->team_role_name,
				$r->project_name,
				$this->common->get_time_string_simple($this->common->convert_simple_time($r->online_timestamp)),
				$options
			);
		}
		echo json_encode($this->datatables->process());
	}

	public function all($projectid = 0) 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"team_manage"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$this->load->model("projects_model");
		$this->template->loadData("activeLink", 
			array("team" => array("all" => 1)));

		$projectid = intval($projectid);


		$projects = $this->projects_model
			->get_all_active_projects();

		$roles = $this->team_model->get_team_roles();

		$this->template->loadContent("team/index.php", array(
			"roles" => $roles,
			"projects" => $projects,
			"projectid" => $projectid,
			"page" => "all"
			)
		);
	}

	public function roles() 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"team_manage"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}

		$this->template->loadData("activeLink", 
			array("team" => array("roles" => 1)));

		$roles = $this->team_model->get_team_roles();
		$this->template->loadContent("team/roles.php", array(
			"roles" => $roles
			)
		);
	}

	public function add_team_member() 
	{
		$this->load->model("projects_model");
		$username = $this->common->nohtml($this->input->post("username"));
		$projectid = intval($this->input->post("projectid"));
		$roleid = intval($this->input->post("roleid"));

		// First check to see if user has permission to do this
		$user = $this->user_model->get_user_by_username($username);
		if($user->num_rows() == 0) {
			$this->template->error(lang("error_190"));
		}
		$user = $user->row();

		// Get project
		$project = $this->projects_model->get_project($projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		// Check role
		$role = $this->team_model->get_role($roleid);
		if($role->num_rows() == 0) {
			$this->template->error(lang("error_191"));
		}
		$role = $role->row();

		// Get user permission
		$team_member = $this->team_model
			->get_member_of_project($this->user->info->ID, $projectid);
		if($team_member->num_rows() == 0) {
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) 
			{
				$this->template->error(lang("error_192"));
			}
		} else {
			// Check permission (team manager[team], admin[team], admin, project_admin)
			$team = $team_member->row();
			if(!$this->common->has_team_permissions(array("admin", "team"), $team)) {
				if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
					$this->template->error(lang("error_193"));
				}
			}
		}

		// Check member isn't already a member of this project
		$user_d = $this->team_model->get_member_of_project($user->ID, $projectid);
		if($user_d->num_rows() > 0) {
			$this->template->error(lang("error_194"));
		}

		// Add member
		$this->team_model->add_member(array(
			"userid" => $user->ID,
			"projectid" => $project->ID,
			"roleid" => $role->ID
			)
		);

		// Send notification of being added to the project
		$this->user_model->add_notification(array(
			"userid" => $user->ID,
			"url" => "projects",
			"timestamp" => time(),
			"message" => lang("ctn_1072") . $project->name,
			"status" => 0,
			"fromid" => $this->user->info->ID,
			"email" => $user->email,
			"username" => $user->username,
			"email_notification" => $user->email_notification
			)
		);

		$this->user_model->increment_field($user->ID, "noti_count", 1);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1073") . " <b>".$user->username.
			"</b> " . lang("ctn_1074"),
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $project->ID,
			"url" => "team"
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_94"));
		redirect(site_url("team/index/" . $project->ID));

	}

	public function add_role() 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"team_manage"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$name = $this->common->nohtml($this->input->post("name"));
		$admin = intval($this->input->post("admin"));
		$team = intval($this->input->post("team"));
		$time = intval($this->input->post("time"));
		$file = intval($this->input->post("file"));
		$task = intval($this->input->post("task"));
		$calendar = intval($this->input->post("calendar"));
		$finance = intval($this->input->post("finance"));
		$notes = intval($this->input->post("notes"));
		$reports = intval($this->input->post("reports"));
		$client = intval($this->input->post("client"));


		if(empty($name)) $this->template->error(lang("error_195"));

		$this->team_model->add_role(array(
			"name" => $name,
			"admin" => $admin,
			"team" => $team,
			"time" => $time,
			"file" => $file,
			"task" => $task,
			"calendar" => $calendar,
			"finance" => $finance,
			"notes" => $notes,
			"reports" => $reports,
			"client" => $client
			)
		);


		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1075") . " <b>".$name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "team/roles"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_95"));
		redirect(site_url("team/roles"));
	}

	public function edit_role($id) 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"team_manage"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}

		$this->template->loadData("activeLink", 
			array("team" => array("general" => 1)));
		$id = intval($id);
		$role = $this->team_model->get_role($id);
		if($role->num_rows() == 0) $this->template->error(lang("error_191"));

		$this->template->loadContent("team/edit_role.php", array(
			"role" => $role->row()
			)
		);
	}

	public function edit_role_pro($id) 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"team_manage"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		$id = intval($id);
		$role = $this->team_model->get_role($id);
		if($role->num_rows() == 0) $this->template->error(lang("error_191"));

		$name = $this->common->nohtml($this->input->post("name"));
		$admin = intval($this->input->post("admin"));
		$team = intval($this->input->post("team"));
		$time = intval($this->input->post("time"));
		$file = intval($this->input->post("file"));
		$task = intval($this->input->post("task"));
		$calendar = intval($this->input->post("calendar"));
		$finance = intval($this->input->post("finance"));
		$notes = intval($this->input->post("notes"));
		$reports = intval($this->input->post("reports"));
		$client = intval($this->input->post("client"));

		if(empty($name)) $this->template->error(lang("error_195"));

		$this->team_model->update_role($id, array(
			"name" => $name,
			"admin" => $admin,
			"team" => $team,
			"time" => $time,
			"task" => $task,
			"calendar" => $calendar,
			"finance" => $finance,
			"notes" => $notes,
			"reports" => $reports,
			"client" => $client
			)
		);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1076") . " <b>".$name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "team/roles"
			)
		);

		$this->session->set_flashdata("globalmsg", 
			lang("success_96"));
		redirect(site_url("team/roles"));
	}

	public function delete_role($id, $hash) 
	{
		if(!$this->common->has_permissions(array("admin", "project_admin", 
			"team_manage"), 
			$this->user)) {
			$this->template->error(lang("error_71"));
		}
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$role = $this->team_model->get_role($id);
		if($role->num_rows() == 0) $this->template->error(lang("error_191"));

		// Check for members
		$members = $this->team_model->get_members_with_role($id);
		if($members->num_rows() > 0) {
			$this->template->error(lang("error_196"));
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1077") . " <b>".$role->name.
			"</b>.",
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "team/roles"
			)
		);

		// Delete
		$this->team_model->delete_role($id);
		$this->session->set_flashdata("globalmsg", 
			lang("success_97"));
		redirect(site_url("team/roles"));
	}

	public function edit_member($id) 
	{
		$this->template->loadData("activeLink", 
			array("team" => array("general" => 1)));
		$this->load->model("projects_model");
		$id = intval($id);
		$team = $this->team_model->get_team_member($id);
		if($team->num_rows() == 0) 
		{
			$this->template->error(lang("error_197"));
		}
		$team = $team->row();

		// Get user permission
		$team_member = $this->team_model
			->get_member_of_project($this->user->info->ID, $team->projectid);
		if($team_member->num_rows() == 0) {
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) 
			{
				$this->template->error(lang("error_192"));
			}
		} else {
			// Check permission (team manager[team], admin[team], admin, project_admin)
			$team_member = $team_member->row();
			if(!$this->common->has_team_permissions(array("admin", "team"), $team_member)) {
				if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
					$this->template->error(lang("error_193"));
				}
			}
		}

		// If user is Admin, Project-Admin or Finance manager let them
		// view all projects
		if($this->common->has_permissions(
			array("admin", "project_admin", "team_manage"), $this->user
			)
		) {
			$projects = $this->projects_model->get_all_active_projects();
		} else {
			$projects = $this->projects_model
				->get_projects_user_all_no_pagination($this->user->info->ID, 
					"(pr2.admin = 1 OR pr2.team = 1)");
		}

		$roles = $this->team_model->get_team_roles();

		$this->template->loadContent("team/edit_member.php", array(
			"team" => $team,
			"roles" => $roles,
			"projects" => $projects
			)
		);
	}

	public function edit_member_pro($id) 
	{
		$this->load->model("projects_model");
		$id = intval($id);
		$team = $this->team_model->get_team_member($id);
		if($team->num_rows() == 0) 
		{
			$this->template->error(lang("error_197"));
		}
		$team = $team->row();

		// Check permission
		// Get user permission
		$team_member = $this->team_model
			->get_member_of_project($this->user->info->ID, $team->projectid);
		if($team_member->num_rows() == 0) {
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) 
			{
				$this->template->error(lang("error_192"));
			}
		} else {
			// Check permission (team manager[team], admin[team], admin, project_admin)
			$team_member = $team_member->row();
			if(!$this->common->has_team_permissions(array("admin", "team"), $team_member)) {
				if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
					$this->template->error(lang("error_193"));
				}
			}
		}

		// Check new data
		$projectid = intval($this->input->post("projectid"));
		$roleid = intval($this->input->post("roleid"));

		// Get project
		$project = $this->projects_model->get_project($projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();

		// Check role
		$role = $this->team_model->get_role($roleid);
		if($role->num_rows() == 0) {
			$this->template->error(lang("error_191"));
		}
		$role = $role->row();

		// Get user permission
		$team_member = $this->team_model
			->get_member_of_project($this->user->info->ID, $projectid);
		if($team_member->num_rows() == 0) {
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) 
			{
				$this->template->error(lang("error_192"));
			}
		} else {
			// Check permission (team manager[team], admin[team], admin, project_admin)
			$team_r = $team_member->row();
			if(!$this->common->has_team_permissions(array("admin", "team"), $team_r)) {
				if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
					$this->template->error(lang("error_193"));
				}
			}
		}

		if($projectid != $team->projectid) {
			// Check member isn't already a member of this project
			$user_d = $this->team_model->get_member_of_project($team->userid, $projectid);
			if($user_d->num_rows() > 0) {
				$this->template->error(lang("error_194"));
			}
		}

		// update member
		$this->team_model->update_team_member($id, array(
			"projectid" => $project->ID,
			"roleid" => $role->ID
			)
		);

		if($projectid != $team->projectid) {
			// Send notification of being added to the project
			$this->user_model->add_notification(array(
				"userid" => $team->userid,
				"url" => "projects",
				"timestamp" => time(),
				"message" => lang("ctn_1072") 
					. $project->name . lang("ctn_1078") . $team->name,
				"status" => 0,
				"fromid" => $this->user->info->ID,
				"email" => $team->email,
				"username" => $team->username,
				"email_notification" => $team->email_notification
				)
			);

			$this->user_model->increment_field($team->userid, "noti_count", 1);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1079") . " <b>".$team->username.
			"</b> " . lang("ctn_1080"),
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $project->ID,
			"url" => "team"
			)
		);

		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_98"));
		redirect(site_url("team"));
	}

	public function remove_member($id, $hash) 
	{
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$this->load->model("projects_model");
		$id = intval($id);
		$team = $this->team_model->get_team_member($id);
		if($team->num_rows() == 0) 
		{
			$this->template->error(lang("error_197"));
		}
		$team = $team->row();

		// Check permission
		// Get user permission
		$team_member = $this->team_model
			->get_member_of_project($this->user->info->ID, $team->projectid);
		if($team_member->num_rows() == 0) {
			if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) 
			{
				$this->template->error(lang("error_198"));
			}
		} else {
			// Check permission (team manager[team], admin[team], admin, project_admin)
			$team_member = $team_member->row();
			if(!$this->common->has_team_permissions(array("admin", "team"), $team_member)) {
				if(!$this->common->has_permissions(array("admin", "project_admin"), 
			$this->user)) {
					$this->template->error(lang("error_199"));
				}
			}
		}

		// Remove
		$this->team_model->delete_member($id);

		// Send notification
		$this->user_model->add_notification(array(
			"userid" => $team->userid,
			"url" => "projects",
			"timestamp" => time(),
			"message" => lang("ctn_1081") . $team->name,
			"status" => 0,
			"fromid" => $this->user->info->ID,
			"email" => $team->email,
			"username" => $team->username,
			"email_notification" => $team->email_notification
			)
		);

		$this->user_model->increment_field($team->userid, "noti_count", 1);


		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1082") . " <b>".$team->username.
			"</b> " . lang("ctn_1080"),
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => $team->projectid,
			"url" => "team"
			)
		);


		// Redirect
		$this->session->set_flashdata("globalmsg", 
			lang("success_99"));
		redirect(site_url("team"));

	}

	public function user_log($userid) 
	{
		$this->template->loadData("activeLink", 
			array("team" => array("general" => 1)));

		$this->common->check_permissions(
			lang("error_200"), 
			array("admin", "project_admin", "team_manage"), // User Roles
			array(), // Team Roles
			0  
		);

		$userid = intval($userid);

		$this->template->loadContent("team/user_log.php", array(
			"userid" => $userid
			)
		);
	}

	public function user_log_page($userid) 
	{
		$userid = intval($userid);

		$this->load->library("datatables");

		$this->datatables->set_default_order("user_action_log.timestamp", "asc");

		// Set page ordering options that can be used
		$this->datatables->ordering(
			array(
				 2 => array(
				 	"projects.name" => 0
				 ),
				 4 => array(
				 	"user_action_log.timestamp" => 0
				 )
			)
		);

		$this->datatables->set_total_rows(
			$this->team_model->get_total_user_log_count($userid)
		);
		$logs = $this->team_model->get_user_log($userid, $this->datatables);


		foreach($logs->result() as $r) {

			$this->datatables->data[] = array(
				$this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp, "first_name" => $r->first_name, "last_name" => $r->last_name)),
				$r->message,
				$r->name,
				$r->IP,
				date($this->settings->info->date_format, $r->timestamp)
			);
		}
		echo json_encode($this->datatables->process());
	}

}

?>