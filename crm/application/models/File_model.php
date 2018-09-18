<?php

class File_Model extends CI_Model 
{

	public function get_files($projectid, $folder_parent,$userid, $datatable) 
	{
		$this->db->order_by("project_files.folder_flag", "DESC");
		$datatable->db_order();

		$datatable->db_search(array(
			"project_files.file_name",
			"project_files.file_type",
			"users.username"
			)
		);

		return $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name,
				project_files.file_url,
				project_files.folder_parent,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,
				pr2.admin, pr2.file")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->join("project_members as pm2", "pm2.projectid = project_files.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->group_start()
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.file = 1)")
			->where("project_files.folder_parent", $folder_parent)
			->where("project_files.projectid", $projectid)
			->group_end()
			->order_by("project_files.ID", "DESC")
			->limit($datatable->length, $datatable->start)
			->get("project_files");
	}

	public function get_files_total($projectid, $folder_parent, $userid) 
	{
		$s = $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_files.projectid")
			->join("project_members as pm2", "pm2.projectid = project_files.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->where("pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.file = 1)")
			->where("project_files.folder_parent", $folder_parent)
			->where("project_files.projectid", $projectid)
			->get("project_files");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_files_user_projects($userid, $folder_parent, $datatable) 
	{
		$this->db->order_by("project_files.folder_flag", "DESC");
		$datatable->db_order();

		$datatable->db_search(array(
			"project_files.file_name",
			"project_files.file_type",
			"users.username"
			)
		);
		$s = $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name, 
				project_files.file_url,
				project_files.folder_parent,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,
				pr2.admin, pr2.file")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->join("project_members as pm2", "pm2.projectid = project_files.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->group_start()
			->group_start()
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->where("(project_files.folder_parent", $folder_parent)
			->where("(pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.file = 1)))")
			->group_end()
			->or_group_start()
			->or_where("project_files.projectid", 0)
			->where("project_files.folder_parent", $folder_parent)
			->where("project_files.userid", $userid)
			->group_end()
			->group_end()
			->order_by("project_files.ID", "DESC")
			->limit($datatable->length, $datatable->start)
			->get("project_files");
		
		return $s;
	}

	public function get_files_user_noproject($userid, $folder_parent, $datatable) 
	{
		$this->db->where("project_files.projectid", 0);
		$this->db->order_by("project_files.folder_flag", "DESC");

		$datatable->db_order();

		$datatable->db_search(array(
			"project_files.file_name",
			"project_files.file_type",
			"users.username"
			)
		);
		
		return $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name,
				project_files.file_url,
				project_files.folder_parent,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->group_start()
			->where("project_files.userid", $userid)
			->where("project_files.folder_parent", $folder_parent)
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->group_end()
			->order_by("project_files.ID", "DESC")
			->limit($datatable->length, $datatable->start)
			->get("project_files");
	}

	public function get_files_user_noproject_total($userid, $folder_parent) 
	{
		$this->db->where("project_files.projectid", 0);
		
		$s = $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->where("project_files.userid", $userid)
			->where("project_files.folder_parent", $folder_parent)
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->get("project_files");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_files_user_projects_total($userid, $folder_parent) 
	{
		$s = $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->join("project_members as pm2", "pm2.projectid = project_files.projectid", "left outer")
			->join("project_roles as pr2", "pr2.ID = pm2.roleid", "left outer")
			->group_start()
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->where("(project_files.folder_parent", $folder_parent)
			->where("(pm2.userid", $userid)
			->where("(pr2.admin = 1 OR pr2.file = 1)))")
			->group_end()
			->or_group_start()
			->or_where("project_files.projectid", 0)
			->where("project_files.folder_parent", $folder_parent)
			->where("project_files.userid", $userid)
			->group_end()
			->get("project_files");
		
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}


	public function get_all_files($folder_parent, $projectid, $datatable) 
	{
		if($projectid != -1) {
			$this->db->where("project_files.projectid", $projectid);
		}
		$this->db->order_by("project_files.folder_flag", "DESC");

		$datatable->db_order();

		$datatable->db_search(array(
			"project_files.file_name",
			"project_files.file_type",
			"users.username"
			)
		);
		return $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name,
				project_files.file_url,
				project_files.folder_parent,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->group_start()
			->where("project_files.folder_parent", $folder_parent)
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->group_end()
			->order_by("project_files.ID", "DESC")
			->limit($datatable->length, $datatable->start)
			->get("project_files");
	}

	public function get_all_files_total($folder_parent, $projectid) 
	{
		if($projectid != -1) {
			$this->db->where("project_files.projectid", $projectid);
		}

		$s = $this->db
			->select("COUNT(*) as num")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->where("project_files.folder_parent", $folder_parent)
			->where("(projects.status = 0 OR projects.status IS NULL)")
			->get("project_files");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

	public function get_file($id) 
	{
		return $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name, project_files.timestamp,
				project_files.folder_parent, project_files.projectid,
				project_files.file_url,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,,
				folder.ID as folderid, folder.folder_name as parent_folder_name")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->join("project_files as folder", "folder.ID = project_files.folder_parent", "left outer")
			->where("project_files.ID", $id)
			->get("project_files");
	}

	public function get_files_by_project($projectid, $filename) 
	{
		return $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name, project_files.timestamp,
				project_files.folder_parent, project_files.projectid,
				project_files.file_url,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,,
				folder.ID as folderid, folder.folder_name as parent_folder_name")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->join("project_files as folder", "folder.ID = project_files.folder_parent", "left outer")
			->where("(project_files.projectid", $projectid)
			->or_where("project_files.projectid = 0)")
			->where("project_files.folder_flag", 0)
			->like("project_files.file_name", $filename)
			->get("project_files");
	}

	public function get_folder($folderid) 
	{
		return $this->db
			->where("ID", $folderid)->where("folder_flag", 1)
			->get("project_files");
	}

	public function get_folders($projectid) 
	{
		return $this->db->where("projectid", $projectid)
			->where("folder_flag", 1)
			->get("project_files");
	}

	public function add_file($data) 
	{
		$this->db->insert("project_files", $data);
		return $this->db->insert_id();
	}

	public function update_file($id, $data) 
	{
		$this->db->where("ID", $id)->update("project_files", $data);
	}

	public function delete_file($id) 
	{
		$this->db->where("ID", $id)->delete("project_files");
	}

	public function get_file_notes($fileid) 
	{
		return $this->db
			->where("project_file_notes.fileid", $fileid)
			->select("project_file_notes.ID, project_file_notes.note,
				project_file_notes.timestamp,
				users.ID as userid, users.username, users.avatar,
				users.online_timestamp")
			->join("users", "users.ID = project_file_notes.userid")
			->get("project_file_notes");
	}

	public function get_file_note($id) 
	{
		return $this->db->where("ID", $id)->get("project_file_notes");
	}

	public function delete_file_note($id) 
	{
		$this->db->where("ID", $id)->delete("project_file_notes");
	}

	public function add_file_note($data) 
	{
		$this->db->insert("project_file_notes", $data);
	}

	public function get_recent_files_by_project($projectid) 
	{
		return $this->db
			->select("project_files.ID, project_files.userid, 
				project_files.folder_flag, project_files.file_name, 
				project_files.extension, project_files.file_size,
				project_files.file_type, project_files.folder_name,
				project_files.upload_file_name, project_files.timestamp,
				project_files.folder_parent, project_files.projectid,
				project_files.file_url,
				projects.name as project_name,
				users.username, users.avatar, users.online_timestamp,,
				folder.ID as folderid, folder.folder_name as parent_folder_name")
			->join("projects", "projects.ID = project_files.projectid", "left outer")
			->join("users", "users.ID = project_files.userid")
			->join("project_files as folder", "folder.ID = project_files.folder_parent", "left outer")
			->where("(project_files.projectid", $projectid)
			->or_where("project_files.projectid = 0)")
			->where("project_files.folder_flag", 0)
			->limit(5)
			->order_by("project_files.ID", "DESC")
			->get("project_files");
	}

}


?>