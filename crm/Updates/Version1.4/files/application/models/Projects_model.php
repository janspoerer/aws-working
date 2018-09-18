<?php

class Projects_Model extends CI_Model 
{

	public function get_project_categories() 
	{
		return $this->db->get("project_categories");
	}

	public function add_category($data) 
	{
		$this->db->insert("project_categories", $data);
	}

	public function get_category($id) 
	{
		return $this->db->where("ID", $id)->get("project_categories");
	}

	public function delete_category($id) 
	{
		$this->db->where("ID", $id)->delete("project_categories");
	}

	public function update_category($id, $data) 
	{
		$this->db->where("ID", $id)->update("project_categories", $data);
	}

	public function add_project($data) 
	{
		$this->db->insert("projects", $data);
		return $this->db->insert_id();
	}

	public function get_projects($catid, $datatable) 
	{
		if($catid > 0) {
			$this->db->where("projects.catid", $catid);
		}
		$datatable->db_order();

		$datatable->db_search(array(
			"projects.name"
			)
		);
		return $this->db
			->select("projects.name, projects.ID, projects.description, 
				projects.timestamp, projects.image, projects.userid,
				projects.catid, projects.status, projects.complete,
				projects.complete_sync,
				project_categories.name as catname,
				project_categories.color as cat_color")
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->limit($datatable->length, $datatable->start)
			->get("projects");
	}


	public function get_projects_user($userid) 
	{
		return $this->db
			->select("projects.name, projects.ID, projects.description, 
				projects.timestamp, projects.image, projects.userid,
				projects.catid, projects.status, projects.complete,
				projects.complete_sync,
				project_categories.name as catname,
				project_categories.color as cat_color")
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->join("project_members as pm2", "pm2.projectid = projects.ID")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid")
			->where("pm2.userid", $userid)
			->limit(5)
			->order_by("projects.ID", "DESC")
			->get("projects");
	}

	public function get_projects_user_all_no_pagination($userid, $permissions="") 
	{
		if($permissions) {
			$this->db->where($permissions);
		}

		return $this->db
			->select("projects.name, projects.ID, projects.description, 
				projects.timestamp, projects.image, projects.userid,
				projects.catid, projects.status, projects.calendar_id,
				projects.calendar_color, projects.complete,
				projects.complete_sync,
				project_categories.name as catname,
				project_categories.color as cat_color")
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->join("project_members as pm2", "pm2.projectid = projects.ID")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid")
			->where("pm2.userid", $userid)
			->where("projects.status", 0)
			->order_by("projects.ID", "DESC")
			->get("projects");
	}

	public function get_projects_user_all($catid, $userid, $datatable) 
	{
		if($catid > 0) {
			$this->db->where("projects.catid", $catid);
		}

		$datatable->db_order();

		$datatable->db_search(array(
			"projects.name"
			)
		);

		return $this->db
			->select("projects.name, projects.ID, projects.description, 
				projects.timestamp, projects.image, projects.userid,
				projects.catid, projects.status, projects.complete,
				projects.complete_sync,
				project_categories.name as catname,
				project_categories.color as cat_color")
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->join("project_members as pm2", "pm2.projectid = projects.ID")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid")
			->where("pm2.userid", $userid)
			->limit($datatable->length, $datatable->start)
			->get("projects");
	}

	public function get_total_projects_user_all_count($catid, $userid) 
	{
		if($catid > 0) {
			$this->db->where("projects.catid", $catid);
		}
		
		$s = $this->db
			->select("COUNT(*) as num")
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->join("project_members as pm2", "pm2.projectid = projects.ID")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid")
			->where("pm2.userid", $userid)
			->order_by("projects.ID", "DESC")
			->get("projects");
		$r = $s->row();
		if(isset($r)) return $r->num;
		return 0;
	}

	public function get_total_projects_count($catid) 
	{
		if($catid > 0) {
			$this->db->where("projects.catid", $catid);
		}
		$s= $this->db
			->select("COUNT(*) as num")
			->get("projects");
		$r = $s->row();
		if(isset($r)) return $r->num;
		return 0;
	}

	public function get_project($id) 
	{
		return $this->db
			->select("projects.name, projects.ID, projects.description, 
				projects.timestamp, projects.image, projects.userid,
				projects.catid, projects.status, projects.complete,
				projects.complete_sync,
				projects.calendar_id, projects.calendar_color,
				project_categories.name as catname,
				project_categories.color as cat_color")
			->where("projects.ID", $id)
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->get("projects");
	}

	public function get_project_calendarid($id) 
	{
		return $this->db
			->select("projects.name, projects.ID, projects.description, 
				projects.timestamp, projects.image, projects.userid,
				projects.catid, projects.status,
				projects.calendar_id, projects.calendar_color,
				project_categories.name as catname,
				project_categories.color as cat_color")
			->where("projects.calendar_id", $id)
			->join("project_categories", 
					"project_categories.ID = projects.catid", "left outer")
			->get("projects");
	}

	public function get_all_active_projects() 
	{
		return $this->db->where("status", 0)->get("projects");
	}

	public function delete_project($id) 
	{
		$this->db->where("ID", $id)->delete("projects");
	}

	public function update_project($id, $data) 
	{
		$this->db->where("ID", $id)->update("projects", $data);
	}

	public function get_messages($id, $page) 
	{
		return $this->db
			->where("project_chat.projectid", $id)
			->select("project_chat.ID, project_chat.message, project_chat.timestamp,
				project_chat.userid, project_chat.projectid,
				users.ID as userid, users.username, users.avatar, users.online_timestamp,
				users.first_name, users.last_name")
			->join("users", "users.ID = project_chat.userid")
			->order_by("project_chat.ID", "DESC")
			->limit(5, $page)
			->get("project_chat");
	}

	public function get_total_messages($id) 
	{
		$s = $this->db
			->select("COUNT(*) as num")
			->where("projectid", $id)
			->get("project_chat");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function add_message($data) 
	{
		$this->db->insert("project_chat", $data);
	}

	public function get_message($id) 
	{
		return $this->db->where("ID", $id)->get("project_chat");
	}

	public function delete_message($id) 
	{
		$this->db->where("ID", $id)->delete("project_chat");
	}


}

?>