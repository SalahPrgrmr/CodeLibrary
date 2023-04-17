/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - codelibrary
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codelibrary` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `codelibrary`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_img` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_status` int(1) DEFAULT 1,
  `cat_created` datetime DEFAULT current_timestamp(),
  `user_id` int(3) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`cat_name`,`cat_desc`,`cat_img`,`cat_status`,`cat_created`,`user_id`) values 
(1,'عـــــام-General','قسم الدروس التفنية بشكل عام.','images/img/1505889233.jpg',1,'2021-11-18 18:49:03',1),
(2,'بدون_تصنيف_No_Category','مجموعة دروس غير مصنفة للاغراض العامة','images/img/1674122127.jpg',1,'2021-11-18 18:49:03',1),
(3,'اوركل-Oracle','قسم دروس اوركل','images/img/907949943.png',1,'2021-11-18 18:57:43',1);

/*Table structure for table `lessons` */

DROP TABLE IF EXISTS `lessons`;

CREATE TABLE `lessons` (
  `cat_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lson_auth` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_subject` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_date` datetime DEFAULT NULL,
  `lson_short_text` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_full_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_notes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_icon` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_img1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_img2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_img3` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_link1` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_link2` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_link3` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_video1` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_video2` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_video3` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_audio1` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_audio2` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_audio3` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_youtube_video1` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_youtube_video2` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_youtube_video3` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_resource1` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_resource2` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_resource3` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lson_status` int(1) DEFAULT 1,
  `user_id` int(3) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `lessons` */

/*Table structure for table `user_perms` */

DROP TABLE IF EXISTS `user_perms`;

CREATE TABLE `user_perms` (
  `user_id` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perm_name` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`page_name`,`perm_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_perms` */

insert  into `user_perms`(`user_id`,`page_name`,`perm_name`) values 
(1,'','ADMIN'),
(1,'categories','ADMIN'),
(1,'categories','DELETE'),
(1,'categories','INSERT'),
(1,'categories','SELECT'),
(1,'categories','UPDATE'),
(1,'lessons','ADMIN'),
(1,'lessons','DELETE'),
(1,'lessons','INSERT'),
(1,'lessons','SELECT'),
(1,'lessons','UPDATE'),
(2,'','SELECT'),
(2,'categories','SELECT'),
(2,'lessons','SELECT'),
(3,'','ADMIN'),
(3,'categories','ADMIN'),
(3,'lessons','ADMIN');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Token for user account verification or user password reset.',
  `user_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = OK, 1 = Account verification required, 2 = Password reset requested.',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_name`,`user_password`,`user_email`,`user_token`,`user_status`) values 
(1,'','2cb26f0109c429cb3d754a8fe110dbd0','admin@admin.com',NULL,0),
(2,'','fb7143c7836870bd7236aec96a61fc79','hamza@admin.com',NULL,0),
(3,'','2cb26f0109c429cb3d754a8fe110dbd0','salah@admin.com',NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
