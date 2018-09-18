<?php

class Task_Model extends CI_Model 
{

	public function add_task($data) 
	{
		$this->db->insert("project_tasks", $data);
		return $this->db->insert_id();
	}

	public function get_tasks() 
	{
		return $this->db
			->select("project_tasks.name, project_tasks.ID, 
				project_tasks.projectid, project_tasks.status, 
				project_tasks.due_date, project_tasks.start_date, 
				project_tasks.description, project_tasks.complete,
				projects.name as project_name")
			->join("projects", "projects.ID = project_tasks.projectid")
			->get("project_tasks");
	}

	public function get_all_project_tasks($projectid) 
	{
		return $this->db
			->where("projectid", $projectid)
			->select("project_tasks.name, project_tasks.ID, 
				project_tasks.projectid, project_tasks.status, 
				project_tasks.due_date, project_tasks.start_date, 
				project_tasks.description, project_tasks.complete, 
				project_tasks.complete_sync,
				projects.name as project_name")
			->join("projects", "projects.ID = project_tasks.projectid")
			->get("project_tasks");
	}

	public function get_project_tasks($projectid, $status, $userid, $datatable) 
	{
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}

		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}

		$datatable->db_order();

		$datatable->db_search(array(
			"project_tasks.name"
			)
		);

		return $this->db
			->select("project_tasks.name, project_tasks.ID, 
				project_tasks.projectid, project_tasks.status, 
				project_tasks.due_date, project_tasks.start_date, 
				project_tasks.description, project_tasks.complete,
				projects.name as project_name")
			->join("projects", "projects.ID = project_tasks.projectid")
			->join("project_members as pm2", "pm2.projectid = project_tasks.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->group_start()
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.task = 1 OR pr2.client)")
			->where("projects.status", 0)
			->group_end()
			->order_by("project_tasks.ID", "DESC")
			->limit($datatable->length, $datatable->start)
			->get("project_tasks");
	}

	public function get_project_tasks_total($projectid, $status, $userid) 
	{
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}
		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}
		$s = $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_tasks.projectid")
			->join("project_members as pm2", "pm2.projectid = project_tasks.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->where("pm2.userid", $userid)
			->where("projects.status", 0)
			->where("(pr2.admin = 1 OR pr2.task = 1 OR pr2.client)")
			->get("project_tasks");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_all_tasks($projectid, $status, $datatable) 
	{
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}

		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}

		$datatable->db_order();

		$datatable->db_search(array(
			"project_tasks.name"
			)
		);

		return $this->db
			->select("project_tasks.name, project_tasks.ID, 
				project_tasks.projectid, project_tasks.status, 
				project_tasks.due_date, project_tasks.start_date, 
				project_tasks.description,project_tasks.complete,
				projects.name as project_name")
			->join("projects", "projects.ID = project_tasks.projectid")
			->order_by("project_tasks.ID", "DESC")
			->where("projects.status", 0)
			->limit($datatable->length, $datatable->start)
			->get("project_tasks");
	}


	public function get_all_tasks_total($projectid, $status) 
	{
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}

		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}

		$s = $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_tasks.projectid")
			->where("projects.status", 0)
			->get("project_tasks");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}


	public function get_user_assigned_tasks($projectid, $status, $userid, $datatable) 
	{
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}

		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}

		$datatable->db_order();

		$datatable->db_search(array(
			"project_tasks.name"
			)
		);

		return $this->db
			->select("project_tasks.name, project_tasks.ID, 
				project_tasks.projectid, project_tasks.status, 
				project_tasks.due_date, project_tasks.start_date, 
				project_tasks.description, project_tasks.complete,
				projects.name as project_name, projects.image")
			->join("projects", "projects.ID = project_tasks.projectid")
			->join("project_members as pm2", "pm2.projectid = project_tasks.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->join("project_task_members", "project_task_members.taskid=project_tasks.ID")
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.task = 1)")
			->where("project_task_members.userid", $userid)
			->where("projects.status", 0)
			->order_by("project_tasks.ID", "DESC")
			->limit($datatable->length, $datatable->start)
			->get("project_tasks");
	}

	public function get_user_assigned_tasks_total($projectid, $status, $userid) 
	{
		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}

		$s= $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_tasks.projectid")
			->join("project_members as pm2", "pm2.projectid = project_tasks.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->join("project_task_members", "project_task_members.taskid=project_tasks.ID")
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.task = 1)")
			->where("project_task_members.userid", $userid)
			->where("projects.status", 0)
			->get("project_tasks");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_task($taskid) 
	{
		return $this->db->where("ID", $taskid)->get("project_tasks");
	}

	public function delete_task($taskid) 
	{
		$this->db->where("ID", $taskid)->delete("project_tasks");
	}

	public function update_task($id, $data) 
	{
		$this->db->where("ID", $id)->update("project_tasks", $data);
	}

	public function get_task_member($userid, $taskid) 
	{
		return $this->db->select("project_task_members.ID, 
			project_task_members.userid, project_task_members.taskid,
			users.email, users.username, users.email_notification")
			->where("project_task_members.taskid", $taskid)
			->where("project_task_members.userid", $userid)
			->join("users", "users.ID = project_task_members.userid")
			->get("project_task_members");
	}

	public function add_task_member($data) 
	{
		$this->db->insert("project_task_members", $data);
	}

	public function get_task_members($taskid) 
	{
		return $this->db->where("project_task_members.taskid", $taskid)
			->select("users.ID as userid, users.username, users.avatar, 
				users.email, users.email_notification, users.online_timestamp,
				project_task_members.ID")
			->join("users", "users.ID = project_task_members.userid")
			->get("project_task_members");
	}

	public function remove_member($userid, $taskid) 
	{
		$this->db->where("userid", $userid)->where("taskid", $taskid)
			->delete("project_task_members");
	}

	public function get_task_member_id($id) 
	{
		return $this->db->where("project_task_members.ID", $id)
			->select("project_tasks.ID as taskid, project_task_members.userid,
				project_tasks.projectid, project_tasks.name,
				users.email, users.username, users.email_notification")
			->join("project_tasks", "project_tasks.ID = project_task_members.taskid")
			->join("users", "users.ID = project_task_members.userid")
			->get("project_task_members");
	}

	public function add_objective($data) 
	{
		$this->db->insert("project_task_objectives", $data);
		return $this->db->insert_id();
	}

	public function add_objective_member($objectiveid, $userid) 
	{
		$this->db->insert("project_task_objective_members", array(
			"objectiveid" => $objectiveid,
			"userid" => $userid
			)
		);
	}

	public function get_task_objectives($taskid) 
	{
		return $this->db
			->where("taskid", $taskid)
			->get("project_task_objectives");
	}

	public function get_task_objective_members($objectiveid) 
	{
		return $this->db
			->where("project_task_objective_members.objectiveid", $objectiveid)
			->select("users.ID as userid, users.username, users.avatar,
				users.online_timestamp")
			->join("users", "users.ID = project_task_objective_members.userid")
			->get("project_task_objective_members");
	}

	public function get_task_objective($id) 
	{
		return $this->db
			->where("project_task_objectives.ID", $id)
			->select("project_task_objectives.complete, project_task_objectives.ID,
				project_task_objectives.title, project_task_objectives.description,
				project_task_objectives.complete,
				project_tasks.ID as taskid, project_tasks.projectid, project_tasks.name,
				project_tasks.complete_sync, project_tasks.status")
			->join("project_tasks", "project_tasks.ID = project_task_objectives.taskid")
			->get("project_task_objectives");
	}

	public function update_objective($id, $data) 
	{
		$this->db->where("ID", $id)->update("project_task_objectives", $data);
	}

	public function delete_objective($id) 
	{
		$this->db->where("ID", $id)->delete("project_task_objectives");
	}

	public function delete_objective_members($id) 
	{
		$this->db->where("objectiveid", $id)->delete("project_task_objective_members");
	}

	public function get_attached_file($fileid, $taskid) 
	{
		return $this->db
			->where("fileid", $fileid)
			->where("taskid", $taskid)
			->get("project_task_files");
	}

	public function get_attached_file_id($id, $taskid) 
	{
		return $this->db
			->where("ID", $id)
			->where("taskid", $taskid)
			->get("project_task_files");
	}

	public function add_file($data) 
	{
		$this->db->insert("project_task_files", $data);
	}

	public function delete_file($id) 
	{
		$this->db->where("ID", $id)->delete("project_task_files");
	}

	public function get_attached_files($taskid) 
	{
		return $this->db->where("project_task_files.taskid", $taskid)
			->select("project_files.ID as fileid, project_files.file_name,
				project_files.extension, project_files.upload_file_name,
				project_files.file_size, project_files.file_url,
				project_files.file_type,
				project_task_files.ID, project_task_files.taskid")
			->join("project_files", "project_files.ID = project_task_files.fileid")
			->get("project_task_files");
	}

	public function add_message($data) 
	{
		$this->db->insert("project_task_messages", $data);
	}

	public function get_task_messages($taskid, $page)
	{
		return $this->db
				->where("project_task_messages.taskid", $taskid)
				->select("project_task_messages.ID, project_task_messages.message,
					project_task_messages.timestamp, project_task_messages.userid,
					project_task_messages.taskid,
					users.username, users.avatar, users.online_timestamp")
				->join("users", "users.ID = project_task_messages.userid")
				->limit(5, $page)
				->order_by("project_task_messages.ID", "DESC")
				->get("project_task_messages");
	}

	public function get_task_messages_total($taskid) 
	{
		$s = $this->db
				->where("project_task_messages.taskid", $taskid)
				->select("COUNT(*) as num")
				->join("users", "users.ID = project_task_messages.userid")
				->get("project_task_messages");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_message($id, $taskid) 
	{
		return $this->db->where("ID", $id)->where("taskid", $taskid)
			->get("project_task_messages");
	}

	public function delete_message($id) 
	{
		$this->db->where("ID", $id)->delete("project_task_messages");
	}

	public function get_activity_log($taskid) 
	{
		return $this->db->where("user_action_log.taskid", $taskid)
			->select("user_action_log.timestamp, user_action_log.ID,
				user_action_log.message, user_action_log.url,
				users.ID as userid, users.username, users.avatar,
				users.online_timestamp")
			->join("users", "users.ID = user_action_log.userid")
			->limit(5)
			->order_by("user_action_log.ID", "DESC")
			->get("user_action_log");
	}

	public function get_task_activity($taskid, $page) 
	{
		return $this->db->where("user_action_log.taskid", $taskid)
			->select("user_action_log.timestamp, user_action_log.ID,
				user_action_log.message, user_action_log.url,
				users.ID as userid, users.username, users.avatar")
			->join("users", "users.ID = user_action_log.userid")
			->limit(15, $page)
			->order_by("user_action_log.ID", "DESC")
			->get("user_action_log");
	}

	public function get_task_activity_total($taskid) 
	{
		$s = $this->db->where("user_action_log.taskid", $taskid)
			->select("COUNT(*) as num")
			->join("users", "users.ID = user_action_log.userid")
			->order_by("user_action_log.ID", "DESC")
			->get("user_action_log");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_all_tasks_for_project($projectid) 
	{
		return $this->db
			->where("projectid", $projectid)
			->get("project_tasks");
	}

	public function get_user_assigned_tasks_fp($projectid, $status, $userid, $start, $max) 
	{
		if($projectid > 0) {
			$this->db->where("project_tasks.projectid", $projectid);
		}

		if($status > 0) {
			$this->db->where("project_tasks.status", $status);
		}

		return $this->db
			->select("project_tasks.name, project_tasks.ID, 
				project_tasks.projectid, project_tasks.status, 
				project_tasks.due_date, project_tasks.start_date, 
				project_tasks.description, project_tasks.complete,
				projects.name as project_name, projects.image")
			->join("projects", "projects.ID = project_tasks.projectid")
			->join("project_members as pm2", "pm2.projectid = project_tasks.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->join("project_task_members", "project_task_members.taskid=project_tasks.ID")
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.task = 1)")
			->where("project_task_members.userid", $userid)
			->where("projects.status", 0)
			->order_by("project_tasks.ID", "DESC")
			->limit($max, $start)
			->get("project_tasks");
	}

}

?>