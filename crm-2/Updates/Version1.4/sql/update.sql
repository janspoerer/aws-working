ALTER TABLE `site_settings` ADD `layout` VARCHAR(500) NOT NULL DEFAULT 'layout/themes/titan_layout.php' AFTER `enable_services`;

ALTER TABLE `site_settings` ADD `cache_time` INT(11) NOT NULL DEFAULT '3600' AFTER `layout`;

ALTER TABLE `site_settings` ADD `imap_ticket_string` VARCHAR(500) NOT NULL DEFAULT '## Ticket ID:' AFTER `cache_time`, ADD `imap_reply_string` VARCHAR(500) NOT NULL DEFAULT '## - REPLY ABOVE THIS LINE - ##' AFTER `imap_ticket_string`;

ALTER TABLE `invoices` ADD `paying_accountid` INT(11) NOT NULL AFTER `guest_email`;

ALTER TABLE `invoice_settings` DROP `address_1`, DROP `address_2`, DROP `city`, DROP `state`, DROP `zipcode`, DROP `country`, DROP `first_name`, DROP `last_name`, DROP `stripe_secret_key`, DROP `stripe_publish_key`, DROP `checkout2_accountno`, DROP `checkout2_secret`, DROP `paypal_email`;

ALTER TABLE `users` DROP `paypal_email`, DROP `stripe_secret_key`, DROP `stripe_publish_key`, DROP `checkout2_accountno`, DROP `checkout2_secret`;

ALTER TABLE `project_tasks` ADD `archived` INT(11) NOT NULL AFTER `complete_sync`;

ALTER TABLE `site_settings` ADD `profile_comments` INT(11) NOT NULL AFTER `imap_reply_string`;

ALTER TABLE `users` ADD `profile_comments` INT(11) NOT NULL DEFAULT '1' AFTER `activate_code`;

ALTER TABLE `users` ADD `profile_views` INT(11) NOT NULL AFTER `profile_comments`;

ALTER TABLE `site_settings` CHANGE `enable_quotes` `enable_leads` INT(11) NOT NULL;

ALTER TABLE `user_roles` CHANGE `quote_manage` `lead_manage` INT(11) NOT NULL;

ALTER TABLE `site_settings` ADD `client_user_role` INT(11) NOT NULL AFTER `profile_comments`;

ALTER TABLE `user_roles` ADD `live_chat` INT(11) NOT NULL AFTER `services_manage`;

ALTER TABLE `site_settings` ADD `enable_chat` INT(11) NOT NULL DEFAULT '1' AFTER `client_user_role`, ADD `chat_update` INT(11) NOT NULL DEFAULT '5000' AFTER `enable_chat`;

DROP TABLE `email_templates`;

CREATE TABLE `email_templates` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `hook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `email_templates` (`ID`, `title`, `message`, `hook`, `language`) VALUES
(1, 'Forgot Your Password', '<p>Dear [NAME],<br />\r\n<br />\r\nSomeone (hopefully you) requested a password reset at [SITE_URL].<br />\r\n<br />\r\nTo reset your password, please follow the following link: [EMAIL_LINK]<br />\r\n<br />\r\nIf you did not reset your password, please kindly ignore this email.<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n', 'forgot_password', 'english'),
(2, 'Email Activation', '<p>Dear [NAME],<br />\r\n<br />\r\nSomeone (hopefully you) has registered an account on [SITE_NAME] using this email address.<br />\r\n<br />\r\nPlease activate the account by following this link: [EMAIL_LINK]<br />\r\n<br />\r\nIf you did not register an account, please kindly ignore this email.<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n', 'email_activation', 'english'),
(3, 'Support Ticket Reply', '<p>## - REPLY ABOVE THIS LINE - ##<br />\r\n<br />\r\nDear [NAME],<br />\r\n<br />\r\nA new reply was posted on your ticket:<br />\r\n<br />\r\n[TICKET_BODY]<br />\r\n<br />\r\nTicket was generated here: [SITE_URL]<br />\r\n<br />\r\n## Ticket ID: [TICKET_ID] ##<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n', 'ticket_reply', 'english'),
(4, 'Support Ticket Creation', '<p>## - REPLY ABOVE THIS LINE - ##<br />\r\n<br />\r\nDear [NAME],<br />\r\n<br />\r\nThanks for creating a ticket at our site: [SITE_URL]<br />\r\n<br />\r\nYour message:<br />\r\n<br />\r\n[TICKET_BODY]<br />\r\n<br />\r\nWe&#39;ll be in touch shortly.<br />\r\n<br />\r\n## Ticket ID: [TICKET_ID] ##<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n', 'ticket_creation', 'english'),
(5, 'Ordered Service', '<p>Dear [NAME],<br />\r\n<br />\r\nThank you for ordering our service. Before we can complete it for you, please make sure you have paid the invoice. You can view the invoice at: <a href="[INVOICE_URL]">[INVOICE_URL]</a>.<br />\r\n<br />\r\nOnce the Invoice has been paid, we will contact you via email to let you know when the service has been completed.<br />\r\n<br />\r\nThank you,<br />\r\n[SITE_NAME]</p>\r\n', 'ordered_service', 'english');

ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `email_templates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

CREATE TABLE `site_layouts` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layout_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `site_layouts` (`ID`, `name`, `layout_path`) VALUES
(1, 'Basic', 'layout/themes/layout.php'),
(2, 'Titan', 'layout/themes/titan_layout.php'),
(3, 'Dark Fire', 'layout/themes/dark_fire_layout.php'),
(4, 'Light Blue', 'layout/themes/light_blue_layout.php');

ALTER TABLE `site_layouts`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `site_layouts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

CREATE TABLE `ticket_category_groups` (
  `ID` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `ticket_category_groups`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `ticket_category_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


  CREATE TABLE `profile_comments` (
  `ID` int(11) NOT NULL,
  `profileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `profile_comments`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `profile_comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `user_role_permissions` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `classname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hook` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `user_role_permissions` (`ID`, `name`, `description`, `classname`, `hook`) VALUES
(1, 'ctn_308', 'ctn_308', 'admin', 'admin'),
(2, 'ctn_309', 'ctn_309', 'admin', 'admin_settings'),
(3, 'ctn_310', 'ctn_310', 'admin', 'admin_members'),
(4, 'ctn_311', 'ctn_311', 'admin', 'admin_payment'),
(5, 'ctn_33', 'ctn_33', 'banned', 'banned'),
(6, 'ctn_362', 'ctn_384', 'project', 'project_admin'),
(7, 'ctn_367', 'ctn_385', 'project', 'project_worker'),
(8, 'ctn_364', 'ctn_387', 'project', 'time_manage'),
(9, 'ctn_365', 'ctn_388', 'project', 'team_worker'),
(10, 'ctn_366', 'ctn_389', 'project', 'time_worker'),
(11, 'ctn_369', 'ctn_390', 'project', 'file_worker'),
(12, 'ctn_368', 'ctn_391', 'project', 'file_manage'),
(13, 'ctn_371', 'ctn_392', 'project', 'task_worker'),
(14, 'ctn_370', 'ctn_393', 'project', 'task_manage'),
(15, 'ctn_1189', 'ctn_1190', 'project', 'services_manage'),
(16, 'ctn_372', 'ctn_394', 'project', 'calendar_manage'),
(17, 'ctn_373', 'ctn_395', 'project', 'calendar_worker'),
(18, 'ctn_374', 'ctn_396', 'project', 'ticket_manage'),
(19, 'ctn_375', 'ctn_397', 'project', 'ticket_worker'),
(20, 'ctn_376', 'ctn_398', 'project', 'finance_manage'),
(21, 'ctn_377', 'ctn_399', 'project', 'finance_worker'),
(22, 'ctn_378', 'ctn_400', 'project', 'invoice_manage'),
(23, 'ctn_379', 'ctn_401', 'project', 'invoice_client'),
(24, 'ctn_380', 'ctn_402', 'project', 'ticket_client'),
(25, 'ctn_1185', 'ctn_1186', 'project', 'project_client'),
(26, 'ctn_1187', 'ctn_1188', 'project', 'task_client'),
(27, 'ctn_381', 'ctn_403', 'project', 'notes_manage'),
(28, 'ctn_382', 'ctn_404', 'project', 'notes_worker'),
(29, 'ctn_383', 'ctn_405', 'project', 'lead_manage'),
(30, 'ctn_1142', 'ctn_1143', 'project', 'reports_manage'),
(31, 'ctn_1144', 'ctn_1145', 'project', 'reports_worker'),
(32, 'ctn_363', 'ctn_386', 'project', 'team_manage'),
(33, 'ctn_1265', 'ctn_1266', 'project', 'live_chat');


ALTER TABLE `user_role_permissions`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user_role_permissions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

  CREATE TABLE `paying_accounts` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_publishable_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkout2_account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkout2_secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `paying_accounts`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `paying_accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `project_chat` (
  `ID` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `project_chat`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `project_chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;


  CREATE TABLE `custom_fields` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `options` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  `profile` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `help_text` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `register` int(11) NOT NULL,
  `leads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `custom_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `user_custom_fields` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user_custom_fields`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `user_custom_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `twitter` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `user_leads` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `notes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_added` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `sourceid` int(11) NOT NULL,
  `assignedid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user_leads`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `user_leads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `user_lead_fields` (
  `ID` int(11) NOT NULL,
  `leadid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `answer` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user_lead_fields`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user_lead_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `lead_forms` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `welcome` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `assignedid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `collect_user` int(11) NOT NULL,
  `default_statusid` int(11) NOT NULL,
  `default_sourceid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `lead_forms`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `lead_forms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `lead_form_fields` (
  `ID` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `options` varchar(2500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `lead_form_fields`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `lead_form_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `user_lead_custom_fields` (
  `ID` int(11) NOT NULL,
  `leadid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user_lead_custom_fields`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user_lead_custom_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `lead_statuses` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `lead_statuses` (`ID`, `name`) VALUES
(1, 'New'),
(3, 'Updated');


ALTER TABLE `lead_statuses`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `lead_statuses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

  CREATE TABLE `lead_sources` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `lead_sources` (`ID`, `name`) VALUES
(2, 'Facebook'),
(3, 'Twitter');


ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `lead_sources`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE TABLE `lead_notes` (
  `ID` int(11) NOT NULL,
  `leadid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `lead_notes`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `lead_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `live_chat` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `live_chat`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `live_chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `live_chat_messages` (
  `ID` int(11) NOT NULL,
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `live_chat_messages`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `live_chat_messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `live_chat_users` (
  `ID` int(11) NOT NULL,
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `unread` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `live_chat_users`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `live_chat_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `service_forms` ADD `paying_accountid` INT(11) NOT NULL AFTER `require_login`;



