ALTER TABLE `login` ADD `forum_name` VARCHAR ( 30 ) NOT NULL DEFAULT 'null'
ALTER TABLE `login` ADD `forum_code` INT ( 20 ) NOT NULL DEFAULT '0'
ALTER TABLE `login` ADD `forum_status` boolean