ALTER TABLE `user_roles` ADD `reports_manage` INT(11) NOT NULL AFTER `banned`, ADD `reports_worker` INT(11) NOT NULL AFTER `reports_manage`;

ALTER TABLE `project_roles` ADD `reports` INT(11) NOT NULL AFTER `notes`;

ALTER TABLE `site_settings` ADD `enable_reports` INT(11) NOT NULL DEFAULT '1' AFTER `secure_login`;

ALTER TABLE `tickets` ADD `ticket_date` VARCHAR(255) NOT NULL AFTER `message_id_hash`, ADD `close_ticket_date` VARCHAR(255) NOT NULL AFTER `ticket_date`;

ALTER TABLE `site_settings` ADD `date_picker_format` VARCHAR(100) NOT NULL DEFAULT 'd/m/Y' AFTER `enable_reports`;

ALTER TABLE `site_settings` ADD `calendar_picker_format` VARCHAR(100) NOT NULL DEFAULT 'Y/m/d H:i' AFTER `date_picker_format`;

ALTER TABLE `finance` ADD `time_date` VARCHAR(100) NOT NULL AFTER `year`;

ALTER TABLE `invoices` ADD `time_date` VARCHAR(100) NOT NULL AFTER `stripe`;

ALTER TABLE `invoices` ADD `time_date_paid` VARCHAR(100) NOT NULL AFTER `time_date`;

ALTER TABLE `site_settings` ADD `google_recaptcha_secret` VARCHAR(255) NOT NULL AFTER `calendar_picker_format`, ADD `google_recaptcha_key` VARCHAR(255) NOT NULL AFTER `google_recaptcha_secret`;

ALTER TABLE `site_settings` ADD `google_recaptcha` INT(11) NOT NULL AFTER `google_recaptcha_key`;

ALTER TABLE `site_settings` ADD `logo_option` INT(11) NOT NULL AFTER `google_recaptcha`;