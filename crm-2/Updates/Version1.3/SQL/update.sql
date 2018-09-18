ALTER TABLE `user_roles` ADD `project_client` INT(11) NOT NULL AFTER `reports_worker`, ADD `task_client` INT(11) NOT NULL AFTER `project_client`;

ALTER TABLE `project_roles` ADD `client` INT(11) NOT NULL AFTER `reports`;

ALTER TABLE `invoices` ADD `checkout2_hash` VARCHAR(500) NOT NULL AFTER `time_date_paid`;

ALTER TABLE `invoice_settings` ADD `checkout2_accountno` VARCHAR(500) NOT NULL AFTER `stripe_publish_key`, ADD `checkout2_secret` VARCHAR(500) NOT NULL AFTER `checkout2_accountno`;

ALTER TABLE `users` ADD `checkout2_accountno` VARCHAR(500) NOT NULL AFTER `stripe_publish_key`, ADD `checkout2_secret` VARCHAR(500) NOT NULL AFTER `checkout2_accountno`;

ALTER TABLE `invoices` ADD `checkout2` INT(11) NOT NULL AFTER `checkout2_hash`;

ALTER TABLE `invoice_settings` ADD `enable_paypal` INT(11) NOT NULL DEFAULT '1' AFTER `checkout2_secret`, ADD `enable_stripe` INT(11) NOT NULL AFTER `enable_paypal`, ADD `enable_checkout2` INT(11) NOT NULL AFTER `enable_stripe`;

ALTER TABLE `site_settings` ADD `enable_services` INT(11) NOT NULL AFTER `logo_option`;

ALTER TABLE `user_roles` ADD `services_manage` INT(11) NOT NULL AFTER `task_client`;

ALTER TABLE `invoice_settings` ADD `paypal_email` VARCHAR(500) NOT NULL AFTER `enable_checkout2`;

ALTER TABLE `invoices` ADD `paypal` INT(11) NOT NULL AFTER `checkout2`;

CREATE TABLE `service_forms` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `welcome` text COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `invoice` int(11) NOT NULL,
  `currencyid` int(11) NOT NULL,
  `invoice_message` text COLLATE utf8_unicode_ci NOT NULL,
  `require_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `service_forms`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `service_forms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `service_form_fields` (
  `ID` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `options` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `service_form_fields`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `service_form_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `user_services` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user_services`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `user_services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `user_service_fields` (
  `ID` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `answer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user_service_fields`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `user_service_fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoices` ADD `serviceid` INT(11) NOT NULL AFTER `paypal`;

INSERT INTO `email_templates` (`ID`, `title`, `message`) VALUES (NULL, 'Ordered Service', 'Dear [NAME],

Thank you for ordering our service. Before we can complete it for you, please make sure you have paid the invoice. You can view the invoice at: [INVOICE_URL].

Once the Invoice has been paid, we will contact you via email to let you know when the service has been completed.

Thank you,
[SITE_NAME]');

ALTER TABLE `invoices` ADD `guest_name` VARCHAR(255) NOT NULL AFTER `serviceid`;

ALTER TABLE `invoices` ADD `guest_email` VARCHAR(500) NOT NULL AFTER `guest_name`;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

ALTER TABLE ci_sessions ADD PRIMARY KEY (id);