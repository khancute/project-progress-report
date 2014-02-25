# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.41
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2013-07-28 00:19:59
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for db_pow_sow
DROP DATABASE IF EXISTS `db_pow_sow`;
CREATE DATABASE IF NOT EXISTS `db_pow_sow` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `db_pow_sow`;


# Dumping structure for table db_pow_sow.tbl_pow_sow
DROP TABLE IF EXISTS `tbl_pow_sow`;
CREATE TABLE IF NOT EXISTS `tbl_pow_sow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL DEFAULT '0',
  `project_code` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `site_id_ne` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `site_name_ne` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `site_id_fe` varchar(10) COLLATE latin1_general_ci DEFAULT 'N/A',
  `site_name_fe` varchar(255) COLLATE latin1_general_ci DEFAULT 'N/A',
  `ne_fe` varchar(50) COLLATE latin1_general_ci DEFAULT 'N/A',
  `sow` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `po_detail_sow` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `po_number_released` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `po_received_date` date DEFAULT NULL,
  `po_description` text COLLATE latin1_general_ci,
  `deleted` int(11) DEFAULT '1',
  `mos_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `mos_date` date DEFAULT NULL,
  `mos_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `install_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `install_date` date DEFAULT NULL,
  `install_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `oa_rfs_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `oa_rfs_date` date DEFAULT NULL,
  `oa_rfs_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `crossconnect_status` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `cross_connect_enginerr` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `swap_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `swap_date` date DEFAULT NULL,
  `swap_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `bbu_quantity` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `antenna_hybrid_installation` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `dismantle_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dismantle_date` date DEFAULT NULL,
  `dismantle_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `return_back_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `return_back_date` date DEFAULT NULL,
  `return_back_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `survey_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `survey_date` date DEFAULT NULL,
  `survey_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `lmd_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `lmd_date` date DEFAULT NULL,
  `lmd_team` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `esar_1_submit_date` date DEFAULT NULL,
  `esar_1_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `esar_1_sent_to_hq` date DEFAULT NULL,
  `esar_2_submit_date` date DEFAULT NULL,
  `esar_2_status` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `esar_2_sent_to_hq` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id_project_code` (`client_id`,`project_code`),
  KEY `site_id_ne_site_name_ne` (`site_id_ne`,`site_name_ne`),
  KEY `site_id_fe_site_name_fe` (`site_id_fe`,`site_name_fe`),
  KEY `sow` (`sow`),
  KEY `po_number_released` (`po_number_released`),
  KEY `deleted` (`deleted`),
  KEY `po_received_date` (`po_received_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

# Dumping data for table db_pow_sow.tbl_pow_sow: 0 rows
/*!40000 ALTER TABLE `tbl_pow_sow` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pow_sow` ENABLE KEYS */;


# Dumping structure for table db_pow_sow.tbl_ref_client
DROP TABLE IF EXISTS `tbl_ref_client`;
CREATE TABLE IF NOT EXISTS `tbl_ref_client` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT '1' COMMENT '0=>yes; 1=>no',
  PRIMARY KEY (`id`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

# Dumping data for table db_pow_sow.tbl_ref_client: 3 rows
/*!40000 ALTER TABLE `tbl_ref_client` DISABLE KEYS */;
INSERT INTO `tbl_ref_client` (`id`, `name`, `deleted`) VALUES
	(1, 'Telkomsel', 1),
	(2, 'Indosat', 1),
	(3, 'Axis', 1);
/*!40000 ALTER TABLE `tbl_ref_client` ENABLE KEYS */;


# Dumping structure for table db_pow_sow.tbl_ref_group
DROP TABLE IF EXISTS `tbl_ref_group`;
CREATE TABLE IF NOT EXISTS `tbl_ref_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `order` int(10) DEFAULT '0',
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `scenario` text COLLATE latin1_general_ci,
  `deleted` int(10) DEFAULT '1' COMMENT '0=>yes; 1=>no',
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `name` (`name`),
  KEY `item_id` (`item_id`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

# Dumping data for table db_pow_sow.tbl_ref_group: 10 rows
/*!40000 ALTER TABLE `tbl_ref_group` DISABLE KEYS */;
INSERT INTO `tbl_ref_group` (`id`, `item_id`, `order`, `name`, `scenario`, `deleted`) VALUES
	(1, 'L3.1', 1, 'Survey', NULL, 1),
	(2, 'L3.1', 2, 'New', NULL, 1),
	(3, 'L3.1', 3, 'Colo SRAN', 'add new NE under Single RAN model, include necessary dismantlement&packing.', 1),
	(4, 'L3.1', 4, 'Codeploy with MW', 'Scenario for BTS/NobeB codeploy with MW, need to used together with "Codeploy with BTS/NobeB in MW BOQ.', 1),
	(5, 'L3.1', 5, 'SWAP', 'exclude dismantlement&packing', 1),
	(6, 'L3.1', 6, 'Redeploy', 'exclude dismantlement&packing.\nONLY for 3rd party equipment redeploy; for Huawei equipment redeploy use 02 New\n', 1),
	(7, 'L3.1', 7, 'Expansion', NULL, 1),
	(8, 'L3.1', 8, 'Dismantlement&Packing', NULL, 1),
	(9, 'L3.1', 9, 'E1 cross-connection', NULL, 1),
	(10, 'L3.1', 10, 'Optional', NULL, 1);
/*!40000 ALTER TABLE `tbl_ref_group` ENABLE KEYS */;


# Dumping structure for table db_pow_sow.tbl_ref_item
DROP TABLE IF EXISTS `tbl_ref_item`;
CREATE TABLE IF NOT EXISTS `tbl_ref_item` (
  `id` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT '1' COMMENT '0=>yes; 1=>no',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

# Dumping data for table db_pow_sow.tbl_ref_item: 4 rows
/*!40000 ALTER TABLE `tbl_ref_item` DISABLE KEYS */;
INSERT INTO `tbl_ref_item` (`id`, `name`, `deleted`) VALUES
	('L3.1', 'BTS Baseline', 1),
	('L3.2', 'MW Baseline', 1),
	('L3.3', 'Core Baseline', 1),
	('L3.4', 'Mini CME Baseline', 1);
/*!40000 ALTER TABLE `tbl_ref_item` ENABLE KEYS */;


# Dumping structure for table db_pow_sow.tbl_ref_subitem
DROP TABLE IF EXISTS `tbl_ref_subitem`;
CREATE TABLE IF NOT EXISTS `tbl_ref_subitem` (
  `id` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ref_item_id` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `group` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `unit` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `scenario` text COLLATE latin1_general_ci,
  `deleted` int(11) DEFAULT '1' COMMENT '0=>yes; 1=>no',
  PRIMARY KEY (`id`),
  KEY `ref_item_id_group` (`ref_item_id`,`group`),
  KEY `name` (`name`),
  KEY `unit` (`unit`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

# Dumping data for table db_pow_sow.tbl_ref_subitem: 6 rows
/*!40000 ALTER TABLE `tbl_ref_subitem` DISABLE KEYS */;
INSERT INTO `tbl_ref_subitem` (`id`, `ref_item_id`, `group`, `name`, `unit`, `scenario`, `deleted`) VALUES
	('BTS0101', 'L3.1', 1, 'BTS or BTS&MW Engineering Survey + Report X', 'Site', 'BTS or BTS&MW co-engineering survey(with report), include RF survey', 1),
	('BTS0102', 'L3.1', 1, 'BTS or BTS&MW Engineering Survey + Simple Report', 'Site', 'BTS or BTS&MW co-engineering survey(with simple report), include RF survey, including summary and layout only, without TSSR.\r\n', 1),
	('BTS0201', 'L3.1', 2, 'BTS/NodeB (1 system) + Power System + Antenna&Feeder', 'Site', 'complete new site, with power system, with antenna&feeder\ncan be used for Macro BTS, Micro BTS, DBS RRU not on tower\r\n', 1),
	('BTS0202', 'L3.1', 2, 'BTS/NodeB (1 system) + Power System + No Antenna&Feeder', 'Site', 'IBC site, with power system\r\n', 1),
	('BTS0203', 'L3.1', 2, 'BTS/NodeB (1 system) + No Power System + Antenna&Feeder', 'Site', 'new site, without power system;\ncan be used for Macro BTS, Micro BTS, DBS RRU not on tower\r\n', 1),
	('BTS0204', 'L3.1', 2, 'BTS/NodeB (1 system) + No Power System + No Antenna&Feeder', 'Site', 'IBC site, without power system\r\n', 1);
/*!40000 ALTER TABLE `tbl_ref_subitem` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
