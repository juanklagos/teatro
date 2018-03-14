/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.19 : Database - teatro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`teatro` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `teatro`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(16,'2014_10_12_000000_create_users_table',1),
(17,'2014_10_12_100000_create_password_resets_table',1),
(18,'2018_03_13_091329_create_usuarios_table',1),
(19,'2018_03_13_091401_create_reserva_table',1),
(20,'2018_03_13_091716_create_reserva_detalle_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `reserva` */

DROP TABLE IF EXISTS `reserva`;

CREATE TABLE `reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `numero_personas` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reserva_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `reserva_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reserva` */

insert  into `reserva`(`id`,`usuario_id`,`numero_personas`,`fecha_reserva`,`created_at`,`updated_at`) values 
(2,1,2,'2018-03-31','2018-03-13 22:29:46','2018-03-14 07:25:43'),
(3,1,1,'2018-03-08','2018-03-14 07:33:00','2018-03-14 07:33:00'),
(4,1,1,'2018-03-08','2018-03-14 07:35:14','2018-03-14 07:35:14'),
(5,1,1,'2018-03-17','2018-03-14 07:35:47','2018-03-14 07:35:47'),
(6,1,1,'2018-03-10','2018-03-14 07:37:08','2018-03-14 07:37:08'),
(7,1,1,'2018-03-08','2018-03-14 07:37:49','2018-03-14 07:37:49'),
(8,1,1,'2018-03-09','2018-03-14 07:38:46','2018-03-14 07:38:46');

/*Table structure for table `reserva_detalle` */

DROP TABLE IF EXISTS `reserva_detalle`;

CREATE TABLE `reserva_detalle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reserva_id` int(10) unsigned NOT NULL,
  `butaca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reserva_detalle_reserva_id_foreign` (`reserva_id`),
  CONSTRAINT `reserva_detalle_reserva_id_foreign` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reserva_detalle` */

insert  into `reserva_detalle`(`id`,`reserva_id`,`butaca`,`created_at`,`updated_at`) values 
(15,2,'A8','2018-03-14 07:25:43','2018-03-14 07:25:43'),
(16,2,'A1','2018-03-14 07:25:43','2018-03-14 07:25:43'),
(17,3,'B4','2018-03-14 07:33:00','2018-03-14 07:33:00'),
(18,4,'B4','2018-03-14 07:35:14','2018-03-14 07:35:14'),
(19,5,'B5','2018-03-14 07:35:47','2018-03-14 07:35:47'),
(20,6,'B9','2018-03-14 07:37:08','2018-03-14 07:37:08'),
(21,7,'A1','2018-03-14 07:37:49','2018-03-14 07:37:49'),
(22,8,'A1','2018-03-14 07:38:46','2018-03-14 07:38:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'juan','JUAN@CORREO.COM','$2y$10$7LV80MaXOI6mNQVOK3GERevVFa8SmSACfJN7FtcqL7XqqdO8ga6Jy','JEq9UtW3s2ywZZddbcENLw4URpuMKyqktvIUwk9F2pWgXtBG6xpbQx9zxjaM','2018-03-13 22:18:57','2018-03-13 22:18:57');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_documento` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_numero_documento_unique` (`numero_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`numero_documento`,`nombre`,`apellidos`,`created_at`,`updated_at`) values 
(1,1092943113,'JUAN','ALVAREZ','2018-03-13 22:19:10','2018-03-13 22:19:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
