/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.46-0+deb7u1-log : Database - ragnarok
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`ragnarok` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ragnarok`;

/*Table structure for table `companion_list` */

DROP TABLE IF EXISTS `companion_list`;

CREATE TABLE `companion_list` (
  `companion_name` varchar(300) DEFAULT NULL,
  `companion_unique_id` bigint(100) DEFAULT NULL,
  `companion_class` smallint(2) DEFAULT NULL,
  `companion_count_all` int(5) DEFAULT NULL,
  `companion_desc` varchar(765) DEFAULT NULL,
  `companion_cutin` varchar(300) DEFAULT NULL,
  `companion_sound` varchar(300) DEFAULT NULL,
  `getting_by` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `companion_missions` */

DROP TABLE IF EXISTS `companion_missions`;

CREATE TABLE `companion_missions` (
  `id` int(10) DEFAULT NULL,
  `char_id` int(10) DEFAULT NULL,
  `companion_id` int(10) DEFAULT NULL,
  `mission_id` int(10) DEFAULT NULL,
  `mission_state` int(3) DEFAULT NULL,
  `mission_time` int(50) DEFAULT NULL,
  `mission_jobreq` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

/*Table structure for table `garrison_companions` */

DROP TABLE IF EXISTS `garrison_companions`;

CREATE TABLE `garrison_companions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `char_id` int(20) DEFAULT NULL,
  `map` varchar(180) DEFAULT NULL,
  `companion_name1` varchar(180) DEFAULT NULL,
  `companion_job1` int(20) DEFAULT NULL,
  `companion_baselevel1` int(3) DEFAULT '1',
  `companion_joblevel1` int(3) DEFAULT '1',
  `companion_baseexp1` int(50) NOT NULL DEFAULT '0',
  `companion_jobexp1` int(50) NOT NULL DEFAULT '0',
  `companion_id1` int(5) DEFAULT '0',
  `companion_missionid1` int(5) DEFAULT '0',
  `companion_missionname1` varchar(450) DEFAULT 'No mission',
  `companion_available` int(1) DEFAULT NULL,
  `companion_equiplv` int(50) DEFAULT '0',
  `companion_weaponid` int(50) DEFAULT '0',
  `companion_weaponlv` int(50) DEFAULT '0',
  `companion_armorid` int(50) DEFAULT '0',
  `companion_armorlv` int(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Table structure for table `garrison_missions` */

DROP TABLE IF EXISTS `garrison_missions`;

CREATE TABLE `garrison_missions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mission_id` int(10) DEFAULT NULL,
  `mission_name` varchar(150) COLLATE utf16_bin DEFAULT NULL,
  `mission_type` char(3) COLLATE utf16_bin DEFAULT NULL,
  `mission_desc` blob,
  `mission_time` int(30) DEFAULT NULL,
  `mission_reward1` smallint(5) DEFAULT NULL,
  `mission_rewardval1` smallint(10) DEFAULT NULL,
  `mission_reward2` smallint(5) DEFAULT NULL,
  `mission_rewardval2` smallint(10) DEFAULT NULL,
  `mission_reward3` smallint(5) DEFAULT NULL,
  `mission_rewardval3` smallint(10) DEFAULT NULL,
  `mission_charbaseexp` int(50) DEFAULT NULL,
  `mission_charjobexp` int(50) DEFAULT NULL,
  `mission_compbaseexp` int(50) DEFAULT NULL,
  `mission_compjobexp` int(50) DEFAULT NULL,
  `zeny_reward` int(50) DEFAULT NULL,
  `mission_reqlevel` int(10) DEFAULT NULL,
  `mission_jobreq` int(10) DEFAULT NULL,
  `mission_equiplv` int(50) DEFAULT NULL,
  `special_mission` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

/*Table structure for table `garrisons` */

DROP TABLE IF EXISTS `garrisons`;

CREATE TABLE `garrisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `loc` varchar(30) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `companions_count` int(10) DEFAULT NULL,
  `garrison_exp` int(50) DEFAULT NULL,
  `garrison_resources` int(100) DEFAULT NULL,
  `garrison_level` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
