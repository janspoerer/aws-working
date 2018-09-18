<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoices extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("invoices_model");
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
	}

	public function index() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("general" => 1)));

		$this->template->loadContent("invoices/index.php", array(
			"page" => "index"
			)
		);
	}

	public function invoice_page($page="index") 
	{
		$this->load->library("datatables");

		$this->datatables->set_default_order("invoices.ID", "desc");

		// Set page ordering options that can be used
		$this->datatables->ordering(
			array(
				 0 => array(
				 	"invoices.ID" => 0
				 ),
				 1 => array(
				 	"invoices.invoice_id" => 0
				 ),
				 2 => array(
				 	"invoices.title" => 0
				 ),
				 5 => array(
				 	"invoices.status" => 0
				 ),
				 6 => array(
				 	"invoices.due_date" => 0
				 ),
				 7 => array(
				 	"invoices.total" => 0
				 )
			)
		);

		if($page == "index") {
			$this->common->check_permissions(
				lang("error_114"), 
				array("admin", "project_admin", "invoice_manage"), // User Roles
				array(), // Team Roles
				0  
			);
			$this->datatables->set_total_rows(
				$this->invoices_model->get_invoices_total()
			);

			$invoices = $this->invoices_model->get_invoices($this->datatables);
		} elseif($page == "templates") {
			$this->common->check_permissions(
				lang("error_114"), 
				array("admin", "project_admin", "invoice_manage"), // User Roles
				array(), // Team Roles
				0  
			);
			$invoices = $this->invoices_model->get_invoice_templates($this->datatables);
			$this->datatables->set_total_rows(
				$invoices->num_rows()
			);
		} elseif($page == "client") {
			$invoices = $this->invoices_model->get_invoices_client(
				$this->user->info->ID, $this->datatables);

			$this->datatables->set_total_rows(
				$this->invoices_model
					->get_invoices_client_total($this->user->info->ID)
			);
		}


		foreach($invoices->result() as $r) {
			if($r->status == 1) {
				$status = "<label class='label label-danger'>".lang("ctn_595")."</label>";
			} elseif($r->status == 2) {
				$status = "<label class='label label-success'>".lang("ctn_596")."</label>";
			} elseif($r->status == 3) {
				$status = "<label class='label label-default'>".lang("ctn_597")."</label>";
			}

			$options = '';
			if($page != "templates") {
				$options .= '<a href="'.site_url("invoices/view/" . $r->ID . "/" . $r->hash).'" class="btn btn-primary btn-xs">'.lang("ctn_665").'</a> <a href="'.site_url("invoices/get_pdf/" . $r->ID . "/" . $r->hash).'" class="btn btn-info btn-xs" title="'.lang("ctn_666").'" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-save"></span></a> ';
			}
			if($this->common->has_permissions(array("admin", "project_admin", "invoice_manage"), $this->user)) {
				$options .= '<a href="'.site_url("invoices/edit_invoice/" . $r->ID).'" class="btn btn-warning btn-xs" title="'.lang("ctn_55").'"  data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-cog"></span></a> <a href="'.site_url("invoices/delete_invoice/" . $r->ID . "/" . $this->security->get_csrf_hash()).'" class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" onclick="return confirm(\''.lang("ctn_317").'\')" title="'.lang("ctn_57").'"><span class="glyphicon glyphicon-trash"></span></a>';
			}

			$this->datatables->data[] = array(
				$r->ID,
				$r->invoice_id,
				$r->title,
				$this->common->get_user_display(array("username" => $r->client_username, "avatar" => $r->client_avatar, "online_timestamp" => $r->client_online_timestamp)),
				$r->projectname,
				$status,
				date($this->settings->info->date_format, $r->due_date),
				$r->symbol . number_format($r->total,2),
				$options

			);
		}
		echo json_encode($this->datatables->process());
	}

	public function reoccuring() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("reoccuring" => 1)));

		$templates = $this->invoices_model->get_invoice_templates_all();
	
		$this->template->loadContent("invoices/reoccuring.php", array(
			"templates" => $templates
			)
		);
	}

	public function reoccuring_page() 
	{
		$this->load->library("datatables");

		$this->datatables->set_default_order("invoice_reoccur.ID", "desc");

		// Set page ordering options that can be used
		$this->datatables->ordering(
			array(
				 0 => array(
				 	"invoices.title" => 0
				 ),
				 2 => array(
				 	"invoice_reoccur.status" => 0
				 ),
				 3 => array(
				 	"invoice_reoccur.amount_time" => 0, 
				 	"invoice_reoccur.amount" => "desc"
				 ),
				 4 => array(
				 	"invoice_reoccur.last_occurence" => 0
				 ),
				 5 => array(
				 	"invoice_reoccur.next_occurence" => 0
				 )
			)
		);

		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		
		$this->datatables->set_total_rows(
			$this->invoices_model->get_reoccuring_invoices_total()
		);

		$invoices = $this->invoices_model
			->get_reoccuring_invoices($this->datatables);

		foreach($invoices->result() as $r) {
			if($r->status == 0) {
			  $status = "<label class='label label-warning'>".lang("ctn_647")."</label>";
			} elseif($r->status == 1) {
			  $status = "<label class='label label-success'>".lang("ctn_648")."</label>";
			} elseif($r->status == 2) {
			  $status = "<label class='label label-info'>".lang("ctn_649")."</label>";
			}

			if($r->amount > 1) {
				if($r->amount_time == 0) {
				  $amount_time = lang("ctn_667");
				} elseif($r->amount_time == 1) {
				  $amount_time = lang("ctn_668");
				} elseif($r->amount_time == 2) {
				  $amount_time = lang("ctn_669");
				} elseif($r->amount_time == 3) {
				  $amount_time = lang("ctn_670");
				}
			} else {
			 	if($r->amount_time == 0) {
				  $amount_time = lang("ctn_640");
				} elseif($r->amount_time == 1) {
				  $amount_time = lang("ctn_641");
				} elseif($r->amount_time == 2) {
				  $amount_time = lang("ctn_671");
				} elseif($r->amount_time == 3) {
				  $amount_time = lang("ctn_643");
				}
			}

			if($r->last_occurence > 0) {
				$last_occurence = date($this->settings->info->date_format, $r->last_occurence);
			} else {
				$last_occurence = lang("ctn_672");
			}
			if($r->next_occurence > 0) {
				$next_occurence = date($this->settings->info->date_format, $r->next_occurence);
			} else {
				$next_occurence = lang("ctn_672");
			}


			$this->datatables->data[] = array(
				$r->title,
				$this->common->get_user_display(array("username" => $r->username, "avatar" => $r->avatar, "online_timestamp" => $r->online_timestamp)),
				$status,
				$r->amount . " " . $amount_time,
				$last_occurence,
				$next_occurence,
				'<a href="'.site_url("invoices/edit_reoccur_invoice/" . $r->ID).'" class="btn btn-warning btn-xs"  data-toggle="tooltip" data-placement="bottom" title="'.lang("ctn_55").'"><span class="glyphicon glyphicon-cog"></span></a> <a href="'.site_url("invoices/delete_reoccur_invoice/" . $r->ID . "/" . $this->security->get_csrf_hash()).'" class="btn btn-danger btn-xs" onclick="return confirm(\''.lang("ctn_317").'\')" title="'.lang("ctn_57").'" data-toggle="tooltip" data-placement="bottom"><span class="glyphicon glyphicon-trash"></span></a>'
			);
		}
		echo json_encode($this->datatables->process());
	}

	public function add_reoccuring_invoice() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("reoccuring" => 1)));
		$client_username = $this->common->nohtml($this->input->post("client_username"));
		$templateid = intval($this->input->post("templateid"));
		$amount = intval($this->input->post("amount"));
		$amount_time = intval($this->input->post("amount_time"));
		$start_date = $this->common->nohtml($this->input->post("start_date"));
		$end_date = $this->common->nohtml($this->input->post("end_date"));
		$status = intval($this->input->post("status"));

		$userid = 0;
		if(!empty($client_username)) {
			$user = $this->user_model->get_user_by_username($client_username);
			if($user->num_rows() == 0) {
				$this->template->error(lang("error_115"));
			}
			$user = $user->row();
			$userid = $user->ID;
		}

		$template = $this->invoices_model->get_invoice($templateid);
		if($template->num_rows() == 0) {
			$this->template->error(lang("error_116"));
		}
		$template = $template->row();
		if(!$template->template) {
			$this->template->error(lang("error_117"));
		}

		if($userid == 0) {
			if($template->clientid == 0) {
				$this->template->error(lang("error_118"));
			}
			$userid = $template->clientid;
		}

		if($amount ==0) {
			$this->template->error(lang("error_119"));
		}
		if($amount_time < 0 || $amount_time > 3) {
			$this->template->error(lang("error_120"));
		}

		if(!empty($start_date)) {
			$sd = DateTime::createFromFormat($this->settings->info->date_picker_format, $start_date);
			$sd_timestamp = $sd->getTimestamp();
		} else {
			$this->template->error(lang("error_121"));
		}

		if(!empty($end_date)) {
			$ed = DateTime::createFromFormat($this->settings->info->date_picker_format, $end_date);
			$ed_timestamp = $ed->getTimestamp();
		} else {
			$ed_timestamp = 0;
		}

		if($status < 0 || $status > 2) {
			$this->template->error(lang("error_122"));
		}

		$this->invoices_model->add_reoccuring_invoice(array(
			"clientid" => $userid,
			"templateid" => $templateid,
			"amount" => $amount,
			"amount_time" => $amount_time,
			"start_date" => $sd_timestamp,
			"end_date" => $ed_timestamp,
			"status" => $status,
			"userid" => $this->user->info->ID,
			"timestamp" => time()
			)
		);

		$this->session->set_flashdata("globalmsg", lang("success_54"));
		redirect(site_url("invoices/reoccuring"));
	}

	public function edit_reoccur_invoice($id) 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("reoccuring" => 1)));

		$id = intval($id);
		$invoice = $this->invoices_model->get_reoccuring_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_123"));
		}
		$invoice = $invoice->row();

		$templates = $this->invoices_model->get_invoice_templates_all();

		$this->template->loadContent("invoices/edit_reoccuring.php", array(
			"templates" => $templates,
			"invoice" => $invoice
			)
		);
	}

	public function edit_reoccur_invoice_pro($id) 
	{
		$this->common->check_permissions(
			"View Invoice Section", 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("reoccuring" => 1)));

		$id = intval($id);
		$invoice = $this->invoices_model->get_reoccuring_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_123"));
		}
		$invoice = $invoice->row();

		$client_username = $this->common->nohtml($this->input->post("client_username"));
		$templateid = intval($this->input->post("templateid"));
		$amount = intval($this->input->post("amount"));
		$amount_time = intval($this->input->post("amount_time"));
		$start_date = $this->common->nohtml($this->input->post("start_date"));
		$end_date = $this->common->nohtml($this->input->post("end_date"));
		$status = intval($this->input->post("status"));

		$userid = 0;
		if(!empty($client_username)) {
			$user = $this->user_model->get_user_by_username($client_username);
			if($user->num_rows() == 0) {
				$this->template->error(lang("error_115"));
			}
			$user = $user->row();
			$userid = $user->ID;
		}

		$template = $this->invoices_model->get_invoice($templateid);
		if($template->num_rows() == 0) {
			$this->template->error(lang("error_116"));
		}
		$template = $template->row();
		if(!$template->template) {
			$this->template->error(lang("error_117"));
		}

		if($userid == 0) {
			if($template->userid == 0) {
				$this->template->error(lang("error_118"));
			}
			$userid = $template->userid;
		}

		if($amount ==0) {
			$this->template->error(lang("error_119"));
		}
		if($amount_time < 0 || $amount_time > 3) {
			$this->template->error(lang("error_120"));
		}

		if(!empty($start_date)) {
			$sd = DateTime::createFromFormat($this->settings->info->date_picker_format, $start_date);
			$sd_timestamp = $sd->getTimestamp();
		} else {
			$this->template->error(lang("error_121"));
		}

		if(!empty($end_date)) {
			$ed = DateTime::createFromFormat($this->settings->info->date_picker_format, $end_date);
			$ed_timestamp = $ed->getTimestamp();
		} else {
			$ed_timestamp = 0;
		}

		if($status < 0 || $status > 2) {
			$this->template->error(lang("error_122"));
		}

		// Calculate next occurence
		$current_date = DateTime::createFromFormat("m/d/Y h:i:s", 
			date("m/d/Y", $invoice->last_occurence) . " 00:00:00");
		$amount = $amount;
		$amount_time = $amount_time;
		$day = 3600*24;
		$week = ((3600*24) *7);
		$month = ((3600*24) * 30);
		$year = ((3600*24) * 365);
		if($amount_time == 0) {
			// Days 
			$next = $current_date->getTimestamp() + ( $day * $amount );
		} elseif($amount_time == 1) {
			// Weeks
			$next = $current_date->getTimestamp() + ( $week * $amount );
		} elseif($amount_time == 2) {
			// Months
			$next = $current_date->getTimestamp() + ( $month * $amount);
		} elseif($amount_time == 3) {
			// Year
			$next = $current_date->getTimestamp() + ( $year * $amount);
		}

		if($ed_timestamp > 0) {
			// Check to make sure end date isn't exceeded
			$end_date = DateTime::createFromFormat("m/d/Y h:i:s", 
				date("m/d/Y", $ed->getTimestamp()) . " 00:00:00");

			if($end_date->getTimestamp() < $next) {
				$next = 0;
			}
		}

		$this->invoices_model->update_reoccuring_invoice($id, array(
			"clientid" => $userid,
			"templateid" => $templateid,
			"amount" => $amount,
			"amount_time" => $amount_time,
			"start_date" => $sd_timestamp,
			"end_date" => $ed_timestamp,
			"status" => $status,
			"next_occurence" => $next
			)
		);

		$this->session->set_flashdata("globalmsg", lang("success_55"));
		redirect(site_url("invoices/reoccuring"));
	}

	public function delete_reoccur_invoice($id, $hash) 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("reoccuring" => 1)));
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$invoice = $this->invoices_model->get_reoccuring_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_123"));
		}

		// Delete
		$this->invoices_model->delete_reoccuring_invoice($id);
		$this->session->set_flashdata("globalmsg", lang("success_56"));
		redirect(site_url("invoices/reoccuring"));
	}

	public function templates() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("templates" => 1)));

		$this->template->loadContent("invoices/index.php", array(
			"page" => "templates"
			)
		);
	}

	public function add() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("general" => 1)));
		$this->template->loadExternal(
			'<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js">
			</script><script src="' . base_url() . 'scripts/custom/invoice.js">
			</script>'
		);
		$projects = $this->projects_model->get_all_active_projects();

		$currencies = $this->invoices_model->get_currencies();

		$last_invoice = $this->invoices_model
			->get_last_invoice();
		if ($last_invoice->num_rows() == 0) {
			$invoice_tmp_id = "invoice_0001";
		} else {
			$inv = $last_invoice->row();
			$invoice_tmp_id = $inv->invoice_id;
			// Get last 4 digits
			if (preg_match('#(\d+)$#', $invoice_tmp_id, $matches)) {
				$num = intval($matches[1]);
				$pad = strlen($matches[1]);
				$num++;
				$num = str_pad($num, $pad, '0', STR_PAD_LEFT);
				$invoice_tmp_id = 
					substr($invoice_tmp_id, 0, strlen($invoice_tmp_id)-$pad);
				$invoice_tmp_id = $invoice_tmp_id . $num;
			} else {
				$invoice_tmp_id = $invoice_tmp_id . "_0001";
			}
		}

		$settings = $this->invoices_model->get_invoice_settings();
		$settings = $settings->row();

		$this->template->loadContent("invoices/add.php", array(
			"projects" => $projects,
			"currencies" => $currencies,
			"invoice_id" => $invoice_tmp_id,
			"settings" => $settings
			)
		);
	}

	public function add_pro() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$invoice_id = $this->common->nohtml($this->input->post("invoice_id"));
		$title = $this->common->nohtml($this->input->post("title"));
		$notes = $this->lib_filter->go($this->input->post("notes"));
		$client_username = $this->common->nohtml($this->input->post("client_username"));
		$projectid = intval($this->input->post("projectid"));
		$status = intval($this->input->post("status"));
		$currencyid = intval($this->input->post("currencyid"));
		$due_date = $this->common->nohtml($this->input->post("due_date"));
		$paypal_email = $this->common->nohtml($this->input->post("paypal_email"));

		$address_1 = $this->common->nohtml($this->input->post("address_1"));
		$address_2 = $this->common->nohtml($this->input->post("address_2"));
		$city = $this->common->nohtml($this->input->post("city"));
		$state = $this->common->nohtml($this->input->post("state"));
		$zipcode = $this->common->nohtml($this->input->post("zipcode"));
		$country = $this->common->nohtml($this->input->post("country"));
		$first_name = $this->common->nohtml($this->input->post("first_name"));
		$last_name = $this->common->nohtml($this->input->post("last_name"));

		$stripe = intval($this->input->post("stripe"));

		$template = intval($this->input->post("template"));

		if(empty($invoice_id)) {
			$this->template->error(lang("error_124"));
		}
		if(empty($title)) {
			$this->template->error(lang("error_106"));
		}

		$userid = 0;
		if(!empty($client_username)) {
			$user = $this->user_model->get_user_by_username($client_username);
			if($user->num_rows() == 0) {
				$this->template->error(lang("error_125"));
			}
			$user = $user->row();
			$userid = $user->ID;
		}

		// Project
		$project = $this->projects_model->get_project($projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();
		

		$this->common->check_permissions(
			"Add Invoice", 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(),  // Team Roles
			0
		);

		if($status < 1 || $status > 3) {
			$this->template->error(lang("error_122"));
		}

		$currency = $this->invoices_model->get_currency($currencyid);
		if($currency->num_rows() == 0) {
			$this->template->error(lang("error_126"));
		}

		if(!empty($due_date)) {
			$dd = DateTime::createFromFormat($this->settings->info->date_picker_format, $due_date);
			$dd_timestamp = $dd->getTimestamp();
		} else {
			$dd_timestamp = 0;
		}


		$items = intval($this->input->post("items"));
		if($items == 0) {
			$this->template->error(lang("error_127"));
		}
		$sub_total=0;
		for ($i=1;$i<=$items;$i++) {
			$quantity = floatval($this->input->post("quantity_" . $i));
			if ($quantity < 0) $this->template->error(lang("error_128"));
			$amount = floatval($this->input->post("amount_" . $i));
			if ($amount < 0) $this->template->error(lang("error_129"));
			$name = $this->common->nohtml($this->input->post("desc_" . $i));
			if(empty($name) && ($amount > 0 || $quantity > 0) ) {
				$this->template->error(lang("error_130"));
			}
			$sub_total += $amount*$quantity;
		}
		$total = $sub_total;

		$tax_name_1 = $this->common->nohtml($this->input->post("tax_name_1"));
		$tax_rate_1 = floatval($this->input->post("tax_rate_1"));
		$tax_name_2 = $this->common->nohtml($this->input->post("tax_name_2"));
		$tax_rate_2 = floatval($this->input->post("tax_rate_2"));

		if($tax_rate_1>0) {
			$extra = floatval($sub_total/100*$tax_rate_1);
			$total = $total + $extra;
		}
		if($tax_rate_2>0) {
			$extra = floatval($sub_total/100*$tax_rate_2);
			$total = $total + $extra;
		}
		$hash = sha1(rand(1,100000) . $title);

		if($status == 2) {
			$time_date_paid = date("Y-m-d");
		} else {
			$time_date_paid = "";
		}

		$invoiceid = $this->invoices_model->add_invoice(array(
			"invoice_id" => $invoice_id,
			"title" => $title,
			"notes" => $notes,
			"userid" => $this->user->info->ID,
			"status" => $status,
			"clientid" => $userid,
			"projectid" => $projectid,
			"currencyid" => $currencyid,
			"timestamp" => time(),
			"due_date" => $dd_timestamp,
			"tax_name_1" => $tax_name_1,
			"tax_rate_1" => $tax_rate_1,
			"tax_name_2" => $tax_name_2,
			"tax_rate_2" => $tax_rate_2,
			"total" => $total,
			"hash" => $hash,
			"paypal_email" => $paypal_email,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"address_1" => $address_1,
			"address_2" => $address_2,
			"city" => $city,
			"state" => $state,
			"zipcode" => $zipcode,
			"country" => $country,
			"template" => $template,
			"stripe" => $stripe,
			"time_date" => date("Y-m-d"),
			"time_date_paid" => $time_date_paid
			)
		);

		for ($i=1;$i<=$items;$i++) {
			$quantity = floatval($this->input->post("quantity_" . $i));
			if ($quantity < 0) $this->template->error(lang("error_128"));
			$amount = floatval($this->input->post("amount_" . $i));
			if ($amount < 0) $this->template->error(lang("error_129"));
			$name = $this->common->nohtml($this->input->post("desc_" . $i));
			if(empty($name) && ($amount > 0 || $quantity > 0) ) {
				$this->template->error(lang("error_130"));
			}

			if(!empty($name) && $amount >0 && $quantity >0) {
				$this->invoices_model->add_invoice_item(array(
					"invoiceid" => $invoiceid,
					"name" => $name,
					"quantity" => $quantity,
					"amount" => $amount
					)
				);
			}
		}

		if($userid > 0) {
			// Send notification
			$this->user_model->increment_field($user->ID, "noti_count", 1);
			$this->user_model->add_notification(array(
				"userid" => $user->ID,
				"url" => "invoices/view/" . $invoiceid . "/" . $hash,
				"timestamp" => time(),
				"message" => lang("ctn_1035"),
				"status" => 0,
				"fromid" => $this->user->info->ID,
				"email" => $user->email,
				"username" => $user->username,
				"email_notification" => $user->email_notification
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1036") ,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "invoices/view/" . $invoiceid . "/" . $hash
			)
		);

		$this->session->set_flashdata("globalmsg", lang("success_57"));
		redirect(site_url("invoices"));


	}

	public function edit_invoice($id) 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$id = intval($id);
		$invoice = $this->invoices_model->get_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_131"));
		}

		$invoice = $invoice->row();

		$this->template->loadData("activeLink", 
			array("invoice" => array("general" => 1)));
		$this->template->loadExternal(
			'<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js">
			</script><script src="' . base_url() . 'scripts/custom/invoice.js">
			</script>'
		);
		$projects = $this->projects_model->get_all_active_projects();

		$currencies = $this->invoices_model->get_currencies();

		$items = $this->invoices_model->get_invoice_items($invoice->ID);

		$settings = $this->invoices_model->get_invoice_settings();
		$settings = $settings->row();

		$this->template->loadContent("invoices/edit.php", array(
			"projects" => $projects,
			"currencies" => $currencies,
			"invoice" => $invoice,
			"items" => $items,
			"settings" => $settings
			)
		);
	}

	public function edit_invoice_pro($id) 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		$id = intval($id);
		$invoice = $this->invoices_model->get_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_131"));
		}

		$invoice = $invoice->row();

		$invoice_id = $this->common->nohtml($this->input->post("invoice_id"));
		$title = $this->common->nohtml($this->input->post("title"));
		$notes = $this->lib_filter->go($this->input->post("notes"));
		$client_username = $this->common->nohtml($this->input->post("client_username"));
		$projectid = intval($this->input->post("projectid"));
		$status = intval($this->input->post("status"));
		$currencyid = intval($this->input->post("currencyid"));
		$due_date = $this->common->nohtml($this->input->post("due_date"));
		$paypal_email = $this->common->nohtml($this->input->post("paypal_email"));
		$remind = intval($this->input->post("remind"));

		$address_1 = $this->common->nohtml($this->input->post("address_1"));
		$address_2 = $this->common->nohtml($this->input->post("address_2"));
		$city = $this->common->nohtml($this->input->post("city"));
		$state = $this->common->nohtml($this->input->post("state"));
		$zipcode = $this->common->nohtml($this->input->post("zipcode"));
		$country = $this->common->nohtml($this->input->post("country"));
		$first_name = $this->common->nohtml($this->input->post("first_name"));
		$last_name = $this->common->nohtml($this->input->post("last_name"));

		$template = intval($this->input->post("template"));

		$stripe = intval($this->input->post("stripe"));

		if(empty($invoice_id)) {
			$this->template->error(lang("error_124"));
		}
		if(empty($title)) {
			$this->template->error(lang("error_106"));
		}

		$userid = 0;
		if(!empty($client_username)) {
			$user = $this->user_model->get_user_by_username($client_username);
			if($user->num_rows() == 0) {
				$this->template->error(lang("error_125"));
			}
			$user = $user->row();
			$userid = $user->ID;
		}

		// Project
		$project = $this->projects_model->get_project($projectid);
		if($project->num_rows() == 0) {
			$this->template->error(lang("error_72"));
		}
		$project = $project->row();
		

		$this->common->check_permissions(
			"Add Invoice", 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(),  // Team Roles
			0
		);

		if($status < 1 || $status > 3) {
			$this->template->error(lang("error_122"));
		}

		$currency = $this->invoices_model->get_currency($currencyid);
		if($currency->num_rows() == 0) {
			$this->template->error(lang("error_126"));
		}

		if(!empty($due_date)) {
			$dd = DateTime::createFromFormat($this->settings->info->date_picker_format, $due_date);
			$dd_timestamp = $dd->getTimestamp();
		} else {
			$dd_timestamp = 0;
		}


		$items = intval($this->input->post("items"));
		if($items == 0) {
			$this->template->error(lang("error_127"));
		}
		$sub_total=0;
		for ($i=1;$i<=$items;$i++) {
			$quantity = floatval($this->input->post("quantity_" . $i));
			if ($quantity < 0) $this->template->error(lang("error_128"));
			$amount = floatval($this->input->post("amount_" . $i));
			if ($amount < 0) $this->template->error(lang("error_129"));
			$name = $this->common->nohtml($this->input->post("desc_" . $i));
			if(empty($name) && ($amount > 0 || $quantity > 0) ) {
				$this->template->error(lang("error_130"));
			}
			$sub_total += $amount*$quantity;
		}
		$total = $sub_total;

		$tax_name_1 = $this->common->nohtml($this->input->post("tax_name_1"));
		$tax_rate_1 = floatval($this->input->post("tax_rate_1"));
		$tax_name_2 = $this->common->nohtml($this->input->post("tax_name_2"));
		$tax_rate_2 = floatval($this->input->post("tax_rate_2"));

		if($tax_rate_1>0) {
			$extra = floatval($sub_total/100*$tax_rate_1);
			$total = $total + $extra;
		}
		if($tax_rate_2>0) {
			$extra = floatval($sub_total/100*$tax_rate_2);
			$total = $total + $extra;
		}

		$this->invoices_model->delete_invoice_items($id);

		$invoiceid = $id;

		if($status == 2 && $invoice->status != 2) {
			$time_date_paid = date("Y-m-d");
		} else {
			$time_date_paid = "";
		}

		$this->invoices_model->update_invoice($id, array(
			"invoice_id" => $invoice_id,
			"title" => $title,
			"notes" => $notes,
			"status" => $status,
			"clientid" => $userid,
			"projectid" => $projectid,
			"currencyid" => $currencyid,
			"due_date" => $dd_timestamp,
			"tax_name_1" => $tax_name_1,
			"tax_rate_1" => $tax_rate_1,
			"tax_name_2" => $tax_name_2,
			"tax_rate_2" => $tax_rate_2,
			"total" => $total,
			"paypal_email" => $paypal_email,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"address_1" => $address_1,
			"address_2" => $address_2,
			"city" => $city,
			"state" => $state,
			"zipcode" => $zipcode,
			"country" => $country,
			"template" => $template,
			"stripe" => $stripe,
			"time_date_paid" => $time_date_paid
			)
		);

		for ($i=1;$i<=$items;$i++) {
			$quantity = floatval($this->input->post("quantity_" . $i));
			if ($quantity < 0) $this->template->error(lang("error_128"));
			$amount = floatval($this->input->post("amount_" . $i));
			if ($amount < 0) $this->template->error(lang("error_129"));
			$name = $this->common->nohtml($this->input->post("desc_" . $i));
			if(empty($name) && ($amount > 0 || $quantity > 0) ) {
				$this->template->error(lang("error_130"));
			}

			if(!empty($name) && $amount >0 && $quantity >0) {
				$this->invoices_model->add_invoice_item(array(
					"invoiceid" => $invoiceid,
					"name" => $name,
					"quantity" => $quantity,
					"amount" => $amount
					)
				);
			}
		}

		if($remind == 1 && $userid > 0) {
			// Send notification
			$this->user_model->increment_field($user->ID, "noti_count", 1);
			$this->user_model->add_notification(array(
				"userid" => $user->ID,
				"url" => "invoices/view/" . $invoiceid . "/" . $invoice->hash,
				"timestamp" => time(),
				"message" => lang("ctn_1037"),
				"status" => 0,
				"fromid" => $this->user->info->ID,
				"email" => $user->email,
				"username" => $user->username,
				"email_notification" => $user->email_notification
				)
			);
		}

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1038") ,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "invoices/view/" . $invoiceid . "/" . $invoice->hash
			)
		);

		$this->session->set_flashdata("globalmsg", lang("success_58"));
		redirect(site_url("invoices"));
	}


	public function delete_invoice($id, $hash) 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage"), // User Roles
			array(), // Team Roles
			0  
		);
		if($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_6"));
		}
		$id = intval($id);
		$invoice = $this->invoices_model->get_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_131"));
		}

		$this->invoices_model->delete_invoice($id);

		// Log
		$this->user_model->add_user_log(array(
			"userid" => $this->user->info->ID,
			"message" => lang("ctn_1039") ,
			"timestamp" => time(),
			"IP" => $_SERVER['REMOTE_ADDR'],
			"projectid" => 0,
			"url" => "invoices"
			)
		);
		$this->session->set_flashdata("globalmsg", lang("success_59"));
		redirect(site_url("invoices"));
	}

	public function view($id, $hash) 
	{
		$id = intval($id);
		$invoice = $this->invoices_model->get_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_131"));
		}

		$invoice = $invoice->row();

		if($invoice->hash != $hash) {
			$this->template->error(lang("error_6"));
		}

		$items = $this->invoices_model->get_invoice_items($id);
		$settings = $this->invoices_model->get_invoice_settings();
		$settings = $settings->row();

		if($invoice->stripe == 0) {
			if(!empty($settings->stripe_secret_key) && !empty($settings->stripe_publish_key)) {
				// Stripe
				require_once(APPPATH . 'third_party/stripe/init.php');

				$stripe = array(
				  "secret_key"      => $settings->stripe_secret_key,
				  "publishable_key" => $settings->stripe_publish_key
				);

				\Stripe\Stripe::setApiKey($stripe['secret_key']);
			} else {
				$stripe = null;
			}
		} else {
			if(!empty($invoice->stripe_secret_key) && !empty($invoice->stripe_publish_key)) {
				// Stripe
				require_once(APPPATH . 'third_party/stripe/init.php');

				$stripe = array(
				  "secret_key"      => $invoice->stripe_secret_key,
				  "publishable_key" => $invoice->stripe_publish_key
				);

				\Stripe\Stripe::setApiKey($stripe['secret_key']);
			} else {
				$stripe = null;
			}
		}

		$this->template->loadAjax("invoices/view.php", array(
			"invoice" => $invoice,
			"items" => $items,
			"settings" => $settings,
			"stripe" => $stripe,
			), 1
		);
	}

	public function get_pdf($id, $hash) 
	{
		$id = intval($id);
		$hash = $this->common->nohtml($hash);
		$invoice = $this->invoices_model->get_invoice($id);
		if($invoice->num_rows() == 0) {
			$this->template->error(lang("error_131"));
		}

		$invoice = $invoice->row();

		if($invoice->hash != $hash) {
			$this->template->error(lang("error_6"));
		}

		$items = $this->invoices_model->get_invoice_items($id);

		$settings = $this->invoices_model->get_invoice_settings();
		$settings = $settings->row();

		ob_start();
		$this->template->loadAjax("invoices/pdf.php", array(
			"invoice" => $invoice,
			"items" => $items,
			"settings" => $settings
			)
		);
		$out = ob_get_contents();
		ob_end_clean();
		require_once APPPATH . 'third_party/mpdf60/mpdf.php';
		$mpdf=new mPDF('c','','','opensans');
		$mpdf->debug = false;
		$mpdf->useActiveForms = true;
		$stylesheet = file_get_contents('styles/invoice2.css');
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($out);
		$mpdf->Output();
	}

	public function client() 
	{
		$this->common->check_permissions(
			lang("error_114"), 
			array("admin", "project_admin", "invoice_manage", "invoice_client"), // User Roles
			array(), // Team Roles
			0  
		);
		$this->template->loadData("activeLink", 
			array("invoice" => array("client" => 1)));

		$this->template->loadContent("invoices/index.php", array(
			"page" => "client"
			)
		);
	}

}

?>