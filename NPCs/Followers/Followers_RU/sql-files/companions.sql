create table if not exists `companion_rand_missions` (
`mission_id` INT(10) NOT NULL AUTO_INCREMENT,
`mission_name` VARCHAR(100) NOT NULL DEFAULT 'rand_mission',
`mission_level` INT(10) NOT NULL DEFAULT '0',
`mission_item_level` INT(10) NOT NULL DEFAULT '0',
`mission_count` INT(10) NOT NULL DEFAULT '2',
`mission_job1` INT(10) NOT NULL DEFAULT '0',
`mission_job2` INT(10) NOT NULL DEFAULT '0',
`mission_job3` INT(10) NOT NULL DEFAULT '0',
`mission_instance` INT(10) NOT NULL DEFAULT '0',
`mission_quest` INT(10) NOT NULL DEFAULT '0',
PRIMARY KEY (`mission_id`)
);