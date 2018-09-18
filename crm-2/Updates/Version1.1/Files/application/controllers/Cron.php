<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller 
{
	var $debug;

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("admin_model");
		$this->load->model("user_model");
		$this->load->model("invoices_model");
	}

	public function invoices() 
	{
		$current_date = DateTime::createFromFormat("m/d/Y h:i:s", date("m/d/Y") . " 00:00:00");
		$debug = "";
		$invoices = $this->invoices_model->get_reoccuring_invoices_all();
		foreach($invoices->result() as $r) {
			if($r->last_occurence > 0) {
				$start_date = DateTime::createFromFormat("m/d/Y h:i:s", date("m/d/Y", $r->next_occurence) . " 00:00:00");
				if($start_date->getTimestamp() == $current_date->getTimestamp()) {
					// Create new invoice.
					if(!$this->new_invoice($r)) {
						continue;
					}
				}
			} else {
				// Check start date is today
				$start_date = DateTime::createFromFormat("m/d/Y h:i:s", date("m/d/Y", $r->start_date) . " 00:00:00");
				if($start_date->getTimestamp() == $current_date->getTimestamp()) {
					// Create new invoice.
					if(!$this->new_invoice($r)) {
						continue;
					}
				}
			}
		}
		echo $this->debug;
		exit();
	}

	private function new_invoice($r) 
	{
		$user = $this->user_model->get_user_by_id($r->clientid);
		if($user->num_rows() == 0) {
			$this->debug .="This invoice has an invalid client assigned: " . $r->ID . "<br />";
			return null;
		}
		$user = $user->row();

		// Get invoice template
		$invoice = $this->invoices_model->get_invoice($r->templateid);
		if($invoice->num_rows() == 0) {
			$this->debug .= "This invoice doesn't have a valid template: " . $r->ID . "<br />";
			return null;
		}
		$invoice = $invoice->row();

		// Get invoice items
		$items = $this->invoices_model->get_invoice_items($r->templateid);
		$sub_total=0;
		foreach($items->result() as $item) {
			$quantity = $item->quantity;
			$amount = $item->amount;
			
			$sub_total += $amount*$quantity;
		}
		$total = $sub_total;

		// Tax
		$tax_name_1 = $invoice->tax_name_1;
		$tax_rate_1 = $invoice->tax_rate_1;
		$tax_name_2 = $invoice->tax_name_2;
		$tax_rate_2 = $invoice->tax_rate_2;

		if($tax_rate_1>0) {
			$extra = floatval($sub_total/100*$tax_rate_1);
			$total = $total + $extra;
		}
		if($tax_rate_2>0) {
			$extra = floatval($sub_total/100*$tax_rate_2);
			$total = $total + $extra;
		}

		// Invoice hash
		$hash = sha1(rand(1,100000) . $invoice->title . time());

		// Invoice ID
		$invoice_tmp_id = $invoice->invoice_id;
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

		// Process
		$invoiceid = $this->invoices_model->add_invoice(array(
			"invoice_id" => $invoice_tmp_id,
			"title" => $invoice->title,
			"notes" => $invoice->notes,
			"userid" => $r->userid, // Person who made the occuring invoice
			"status" => $invoice->status,
			"clientid" => $user->ID,
			"projectid" => $invoice->projectid,
			"currencyid" => $invoice->currencyid,
			"timestamp" => time(),
			"due_date" => time(),
			"tax_name_1" => $invoice->tax_name_1,
			"tax_rate_1" => $invoice->tax_rate_1,
			"tax_name_2" => $invoice->tax_name_2,
			"tax_rate_2" => $invoice->tax_rate_2,
			"total" => $total,
			"hash" => $hash,
			"paypal_email" => $invoice->paypal_email,
			"first_name" => $invoice->first_name,
			"last_name" => $invoice->last_name,
			"address_1" => $invoice->address_1,
			"address_2" => $invoice->address_2,
			"city" => $invoice->city,
			"state" => $invoice->state,
			"zipcode" => $invoice->zipcode,
			"country" => $invoice->country,
			"stripe" => $invoice->stripe
			)
		);

		// Add invoice items
		foreach($items->result() as $item) {
			$quantity = $item->quantity;
			$amount = $item->amount;
			$name = $item->name;
			
			$this->invoices_model->add_invoice_item(array(
				"invoiceid" => $invoiceid,
				"name" => $name,
				"quantity" => $quantity,
				"amount" => $amount
				)
			);
			
		}

		// Send notification
		$this->user_model->increment_field($user->ID, "noti_count", 1);
		$this->user_model->add_notification(array(
			"userid" => $user->ID,
			"url" => "invoices/view/" . $invoiceid . "/" . $hash,
			"timestamp" => time(),
			"message" => lang("ctn_1019"),
			"status" => 0,
			"fromid" => $r->userid,
			"email" => $user->email,
			"username" => $user->username,
			"email_notification" => $user->email_notification
			)
		);

		// Calculate next occurence
		$current_date = DateTime::createFromFormat("m/d/Y h:i:s", date("m/d/Y") . " 00:00:00");
		$amount = $r->amount;
		$amount_time = $r->amount_time;
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

		if($r->end_date > 0) {
			// Check to make sure end date isn't exceeded
			$end_date = DateTime::createFromFormat("m/d/Y h:i:s", date("m/d/Y", $r->end_date) . " 00:00:00");

			if($end_date->getTimestamp() < $next) {
				$next = 0;
			}
		}

		// Update Reoccur Invoice
		$this->invoices_model->update_reoccuring_invoice($r->ID, array(
			"last_occurence" => time(),
			"next_occurence" => $next
			)
		);

		// Update invoice id so we know to increment it next time
		$this->invoices_model->update_invoice($r->templateid, array(
			"invoice_id" => $invoice_tmp_id
			)
		);

		$this->debug .= "Invoice was created";
	}

	public function ticket_replies() 
	{
		$this->load->model("tickets_model");
		include(APPPATH . "/libraries/IMap.php");

		$imapPath = $this->settings->info->protocol_path;
		$username = $this->settings->info->protocol_email;
		$password = $this->settings->info->protocol_password;

		if($this->settings->info->protocol ==1) {
			$protocol = "imap";
		} elseif($this->settings->info->protocol == 2) {
			$protocol = "pop3";
		}
		if($this->settings->info->protocol_ssl) {
			$ssl = "/ssl";
		} else {
			$ssl = "";
		}

		$host = $this->settings->info->protocol_path . "/" . $protocol . $ssl;

		$imap = new IMap("{" .$host. "}INBOX", $username, $password);
		$emails = $imap->search(array(
			"subject" => $this->settings->info->ticket_title . " [ID:",
			"unseen" => 1
			)
		);

		if($emails) {
			echo "Count: " . count($emails);
			foreach($emails as $mail) {
				$header = $imap->get_header_info($mail);
				$message = $imap->getmsg($mail);
				if(isset($message['htmlmsg']) && !empty($message['htmlmsg'])) {
					$body = $message['htmlmsg'];
				} elseif(isset($message['plainmsg']) && !empty($message['plainmsg'])) {
					$body = $message['plainmsg'];
				} else {
					$body = "";
				}

				// Now we need to extract ticket id.
				$pos = strpos($body,"## Ticket ID: ");
				if($pos === false) {
					// Bad email
					echo "Unable to find ticket id.";
					// Mark as read
					$imap->mark_as_read($mail);
					continue;
				} else {
					$ticket = trim(strstr($body, "## Ticket ID: "));
					$ticket = strstr($ticket, " ##", true);
					$ticketid = intval(substr($ticket, strlen($ticket)-2,2));
				}

				// Strip old text from body
				$body = strstr($body, "## - REPLY ABOVE THIS LINE - ##", true);
				$body = $this->lib_filter->go($body);

				// Look up a ticket in our system
				$ticket = $this->tickets_model->get_ticket($ticketid);
				if($ticket->num_rows() == 0) {
					echo "NO Ticket";
					// Mark as read
					$imap->mark_as_read($mail);
					continue;
				}
				$ticket = $ticket->row();
				if(strcasecmp($ticket->client_email, $header->from) == 0) {
					// Match
					// Post ticket reply
					// Add
					$replyid = $this->tickets_model->add_ticket_reply(array(
						"ticketid" => $ticketid,
						"userid" => $ticket->userid,
						"body" => $body,
						"timestamp" => time(),
						)
					);

					// Update last reply
					$this->tickets_model->update_ticket($ticket->ID, array(
						"last_reply_userid" => $ticket->userid,
						"last_reply_timestamp" => time()
						)
					);
					echo "Message added";
					$imap->mark_as_read($mail);

					// Notification
					// Alert assigned user of new reply
					$this->user_model->increment_field($ticket->assignedid, "noti_count", 1);
					$this->user_model->add_notification(array(
						"userid" => $ticket->assignedid,
						"url" => "tickets/view/" . $ticket->ID,
						"timestamp" => time(),
						"message" => lang("ctn_1020"),
						"status" => 0,
						"fromid" => $ticket->userid,
						"username" => $ticket->assigned_username,
						"email" => $ticket->assigned_email,
						"email_notification" => $ticket->assigned_email_notification
						)
					);
				} else {
					echo "From email does not match ticket db.";
					// Mark as read
					$imap->mark_as_read($mail);
					continue;
				}
			}
		}

		exit();
	}

}