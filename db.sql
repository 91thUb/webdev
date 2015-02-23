/*
SQLyog Community v11.31 (32 bit)
MySQL - 5.1.41 : Database - webdev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webdev` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webdev`;

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `p_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

/*Data for the table `module` */

insert  into `module`(`id`,`name`,`description`,`url`,`p_id`) values (42,'Module','-','module',45),(43,'User','-','user',45),(45,'Web Management','-','-',0),(66,'User Level','-','userLevel',45),(131,'Master Data','Master Dataasd','-',0),(134,'Incoming Order','Incoming Order','appUser/index',0),(137,'Outgoing Order','Outgoing Order','appUser/index',0),(140,'Report','Report','appUser/index',0),(145,'Utilities','Utilities','-',0),(146,'Master Data Shooter','Master Data Shooter','masterDataShooter',145),(147,'Excel Template','Excel Template','masterDataShooter/template',145),(148,'Data Barang','-','dataBarang',131);

/*Table structure for table `module_privilage` */

DROP TABLE IF EXISTS `module_privilage`;

CREATE TABLE `module_privilage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_module_privilage_to_user_level` (`user_level_id`),
  KEY `FK_module_privilage_to_module` (`module_id`),
  CONSTRAINT `FK_module_privilage_to_module` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_module_privilage_to_user_level` FOREIGN KEY (`user_level_id`) REFERENCES `user_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

/*Data for the table `module_privilage` */

insert  into `module_privilage`(`id`,`module_id`,`user_level_id`) values (38,42,2),(53,43,2),(117,66,2),(118,66,25),(119,66,28),(120,66,26),(155,146,2),(156,147,2),(157,148,2),(158,148,16),(159,148,25),(160,148,28),(161,148,26),(162,148,30);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_passwd` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `register_by` int(11) DEFAULT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_ip_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user` (`user_level_id`),
  CONSTRAINT `FK_user` FOREIGN KEY (`user_level_id`) REFERENCES `user_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`user_name`,`user_passwd`,`email`,`register_date`,`register_by`,`user_level_id`,`last_login_date`,`last_ip_address`) values (234,'Asep Rahmat Ginanjar','admin','21232f297a57a5a743894a0e4a801fc3','anjar@local.com',NULL,NULL,2,'2015-02-23 11:40:50','::1'),(251,'Anjar','anjar','21232f297a57a5a743894a0e4a801fc3','anjar@gmail.com','2013-06-16 20:18:01',NULL,16,'2014-05-13 08:45:58','::1'),(252,'Staff','staff','21232f297a57a5a743894a0e4a801fc3','','2013-06-27 16:04:23',NULL,2,NULL,NULL);

/*Table structure for table `user_level` */

DROP TABLE IF EXISTS `user_level`;

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `p_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `user_level` */

insert  into `user_level`(`id`,`name`,`description`,`p_id`) values (2,'Administrator','Administrator',0),(16,'Staff','General Staff',0),(25,'Sub Staff 2','Sub Staff 2',16),(26,'Sub Sub Staff 1','Sub Sub Staff 1',28),(28,'Sub Staff 1','Sub Staff 1',16),(30,'Other staff','Other staff',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
