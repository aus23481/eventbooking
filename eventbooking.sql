/*
SQLyog Ultimate v9.20 
MySQL - 5.6.17 : Database - eventbooking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eventbooking` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `eventbooking`;

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `eventId` int(10) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventStartDate` datetime NOT NULL,
  `eventEndDate` datetime NOT NULL,
  `eventAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventContactMail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventPhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventSponsoredBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventOrganizedBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventLocationLat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventLocationLong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seatsQuantity` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `events` */

insert  into `events`(`eventId`,`eventName`,`eventStartDate`,`eventEndDate`,`eventAddress`,`eventContactMail`,`eventPhone`,`eventSponsoredBy`,`eventOrganizedBy`,`eventLocationLat`,`eventLocationLong`,`seatsQuantity`,`remember_token`,`created_at`,`updated_at`) values (2,'ITC Asia Fair','2016-08-15 02:34:42','2016-08-18 02:34:42','BB International Convention Center','xHqvzzXHox@gmail.com','M3GEXRx52A','BB Int.','CB Care Ltd.','23.768913','90.382450',10,NULL,NULL,NULL),(3,'Soft Expo2016','2016-08-15 02:34:42','2016-08-18 02:34:42','BBI Novo Theatre','QgSwpbde7q@gmail.com','uHANWnCR8K','BB Int.','CB Care Ltd.','23.763719','90.387503',109,NULL,NULL,NULL),(4,'BCIC Fair','2016-08-15 02:34:42','2016-08-18 02:34:42','Bashundhara City Shopping Complex,7th Floor','jBJ1sdE5jv@gmail.com','BoFK59J1cB','BB Int.','CB Care Ltd.','23.751169','90.390700',10,NULL,NULL,NULL),(5,'MobGame Expo','2016-08-15 02:34:42','2016-08-18 02:34:42','Panpacific Sonargaon Hotel,BallRoom','3NdflCO3b1@gmail.com','CRQXX75oxN','BB Int.','CB Care Ltd.','23.749530','90.394547',10,NULL,NULL,NULL),(6,'Robotics Expo','2016-08-15 02:34:42','2016-08-18 02:34:42','Hotel Intercontinental,SouthB Room','l3hDVSlCOT@gmail.com','x1drCsWTsi','BB Int.','CB Care Ltd.','23.740980','90.396473',12,NULL,NULL,NULL);

/*Table structure for table `exhibitors` */

DROP TABLE IF EXISTS `exhibitors`;

CREATE TABLE `exhibitors` (
  `exhibitorID` int(11) NOT NULL AUTO_INCREMENT,
  `exhibitorName` varchar(40) NOT NULL,
  `exhibitorAddress` varchar(100) DEFAULT NULL,
  `exhibitorWeb` varchar(60) DEFAULT NULL,
  `exhibitorEmail` varchar(40) DEFAULT NULL,
  `exhibitorContact` varchar(20) DEFAULT NULL,
  `eventId` int(11) NOT NULL,
  `registeredDate` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `deleted` char(1) DEFAULT '0',
  `exhibitorLogo` varchar(200) DEFAULT NULL,
  `exhibitorMarketingDoc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`exhibitorID`),
  UNIQUE KEY `NewIndex1` (`exhibitorName`,`eventId`),
  KEY `FK_exhibitors` (`eventId`),
  CONSTRAINT `FK_exhibitors` FOREIGN KEY (`eventId`) REFERENCES `events` (`eventId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `exhibitors` */

insert  into `exhibitors`(`exhibitorID`,`exhibitorName`,`exhibitorAddress`,`exhibitorWeb`,`exhibitorEmail`,`exhibitorContact`,`eventId`,`registeredDate`,`status`,`deleted`,`exhibitorLogo`,`exhibitorMarketingDoc`) values (18,'DBZ',NULL,'http://dbz.com','info@dbz.com','111',4,'2016-08-16 15:58:48','1','0','baby3.jpeg','baby1.jpg'),(19,'Saht',NULL,'http://www.yahoo.com','aa@dfd.com','dfdfd',4,'2016-08-16 18:11:23','1','0','baby2.jpg','05.jpg'),(20,'yfg fgfgdsf',NULL,'http://www.yahoo.com','afd@dfdf.ccom','sdfsdfds',6,'2016-08-16 20:10:21','1','0','baby4.jpg','baby2.jpg'),(23,'Miles',NULL,NULL,NULL,NULL,4,NULL,'1','0',NULL,NULL),(24,'Abbas Test',NULL,'http://abc.com','fdfdfdf@dfdf.com','33333',4,'2016-08-16 21:29:32','1','0','all-generation.jpg','baby2.jpg'),(25,'Microsoft',NULL,'http://www.ms.com','ms@sm.com','3354545454',4,'2016-08-16 21:31:31','1','0','baby4.jpg','fvh15.jpg'),(26,'Ttesfdf ',NULL,'http://www.yahoo.com','adf@dfdf.com','333333',3,'2016-08-18 09:24:03','1','0','05.jpg','baby2.jpg'),(27,'Kfd dfdf`',NULL,'http://www.yahoo.com','ad2@dff.com','333333',3,'2016-08-19 01:27:32','1','0','baby1.jpg','baby18.jpg'),(28,'Kaod dodf',NULL,'http://www.yahoo.com','adfi@dfkdf.com','3434343',6,'2016-08-19 02:30:57','1','0','all-generation.png','baby3.jpeg'),(29,'Sun System',NULL,'http://www.sun.com','info@sun.com','333333',3,'2016-08-24 11:42:59','1','0','baby2.jpg','baby3.jpeg');

/*Table structure for table `expositionstands` */

DROP TABLE IF EXISTS `expositionstands`;

CREATE TABLE `expositionstands` (
  `expositonStandId` int(11) NOT NULL AUTO_INCREMENT,
  `exhibitorId` int(11) DEFAULT NULL,
  `eventId` int(11) NOT NULL,
  `standName` varchar(40) NOT NULL,
  `standStatus` char(1) DEFAULT '0',
  `standPrice` double DEFAULT NULL,
  `standType` varchar(10) DEFAULT NULL,
  `standPic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`expositonStandId`),
  KEY `FK_expositionstands` (`eventId`),
  KEY `FK_expositionstands2` (`exhibitorId`),
  CONSTRAINT `FK_expositionstands` FOREIGN KEY (`eventId`) REFERENCES `events` (`eventId`) ON DELETE CASCADE,
  CONSTRAINT `FK_expositionstands2` FOREIGN KEY (`exhibitorId`) REFERENCES `exhibitors` (`exhibitorID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `expositionstands` */

insert  into `expositionstands`(`expositonStandId`,`exhibitorId`,`eventId`,`standName`,`standStatus`,`standPrice`,`standType`,`standPic`) values (3,18,4,'5','1',NULL,'Single',NULL),(4,19,4,'4','1',NULL,'Single',NULL),(5,20,6,'3','1',NULL,'Single',NULL),(6,24,4,'3','1',NULL,'Single',NULL),(7,25,4,'8','1',NULL,'Single',NULL),(8,26,3,'3','1',NULL,'Single',NULL),(9,27,3,'4','1',NULL,'Single',NULL),(10,28,6,'4','1',NULL,'Single',NULL),(11,29,3,'7','1',NULL,'Single',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
