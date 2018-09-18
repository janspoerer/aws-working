<?php

class Notes_Model extends CI_Model 
{

	public function add_note($data) 
	{
		$this->db->insert("notes", $data);
	}

	public function get_note($id) 
	{
		return $this->db->where("notes.ID" , $id)
			->select("notes.ID, notes.title, notes.body,
			notes.userid, notes.timestamp, notes.last_updated_timestamp,
			notes.last_updated_userid, notes.projectid,
			users.username, users.avatar, users.online_timestamp,
			projects.name as projectname")
			->join("users", "users.ID = notes.userid")
			->join("projects", "projects.ID = notes.projectid")
			->get("notes");
	}

	public function update_note($id, $data) 
	{
		$this->db->where("ID", $id)->update("notes", $data);
	}

	public function delete_note($id) 
	{
		$this->db->where("ID", $id)->delete("notes");
	}

	public function get_all_notes($projectid, $datatable) 
	{
		if($projectid > 0) {
			$this->db->where("notes.projectid", $projectid);
		}

		$datatable->db_order();

		$datatable->db_search(array(
			"users.username",
			"notes.title",
			"projects.name"
			)
		);

		return $this->db->select("notes.ID, notes.title, notes.body,
			notes.userid, notes.timestamp, notes.last_updated_timestamp,
			notes.last_updated_userid, notes.projectid,
			users.username, users.avatar, users.online_timestamp,
			projects.name as projectname")
			->join("users", "users.ID = notes.userid")
			->join("projects", "projects.ID = notes.projectid")
			->where("projects.status", 0)
			->limit($datatable->length, $datatable->start)
			->get("notes");
	}

	public function get_all_notes_total($projectid) 
	{
		if($projectid > 0) {
			$this->db->where("notes.projectid", $projectid);
		}
		$s = $this->db->select("COUNT(*) as num")->get("notes");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_all_notes_project($userid, $projectid, $datatable) 
	{
		$datatable->db_order();

		$datatable->db_search(array(
			"users.username",
			"notes.title",
			"projects.name"
			)
		);

		if($projectid > 0) {
			$this->db->where("notes.projectid", $projectid);
		}

		$this->db->select("notes.ID, notes.title, notes.body,
			notes.userid, notes.timestamp, notes.last_updated_timestamp,
			notes.last_updated_userid, notes.projectid,
			users.username, users.avatar, users.online_timestamp,
			projects.name as projectname")
			->join("users", "users.ID = notes.userid")
			->join("projects", "projects.ID = notes.projectid")
			->join("project_members as pm2", "pm2.projectid = notes.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->group_start()
			->where("(pm2.userid", $userid)
			->where("projects.status", 0)
			->where("(pr2.admin = 1 OR pr2.notes = 1))")
			->group_end()
			->order_by("notes.ID", "DESC")
			->limit($datatable->length, $datatable->start);
		return $this->db->get("notes");
	}

	public function get_all_notes_project_total($userid, $projectid) 
	{
		if($projectid > 0) {
			$this->db->where("notes.projectid", $projectid);
		}

		$s = $this->db->select("COUNT(*) as num")
			->join("users", "users.ID = notes.userid")
			->join("projects", "projects.ID = notes.projectid")
			->join("project_members as pm2", "pm2.projectid = notes.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->group_start()
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.notes = 1)")
			->group_end()
			->get("notes");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

}

?>