ALTER TABLE `payment_logs` ADD `processor` VARCHAR(255) NOT NULL AFTER `invoiceid`;

ALTER TABLE `invoice_settings` ADD `stripe_secret_key` VARCHAR(1000) NOT NULL AFTER `last_name`, ADD `stripe_publish_key` VARCHAR(1000) NOT NULL AFTER `stripe_secret_key`;

ALTER TABLE `users` ADD `stripe_secret_key` VARCHAR(1000) NOT NULL AFTER `activate_code`, ADD `stripe_publish_key` VARCHAR(1000) NOT NULL AFTER `stripe_secret_key`;

ALTER TABLE `invoices` ADD `stripe` INT(11) NOT NULL AFTER `template`;
ALTER TABLE `user_roles` ADD `banned` INT(11) NOT NULL AFTER `quote_manage`;

ALTER TABLE `site_settings` ADD `secure_login` INT(11) NOT NULL DEFAULT '1' AFTER `install`;