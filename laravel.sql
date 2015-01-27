-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 14 Septembre 2014 à 21:14
-- Version du serveur: 5.5.38-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `size` float(8,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `type`, `path`, `status`, `size`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'Lacrim - La Rue A Ses Dits Ban [Clip HQ].mp3', 'audio/mp3', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/8f14e45fceea167a5a36dedd4bea2543/Lacrim - La Rue A Ses Dits Ban [Clip HQ].mp3', '1', 1.12, 7, '2014-09-12 13:56:13', '2014-09-12 13:56:13'),
(19, 'moi1.jpg', 'image/jpeg', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/8f14e45fceea167a5a36dedd4bea2543/moi1.jpg', '', 0.06, 7, '2014-09-12 21:03:13', '2014-09-12 21:03:13'),
(20, 'sublime_text', 'application/octet-stream', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/8f14e45fceea167a5a36dedd4bea2543/sublime_text', '1', 8.26, 7, '2014-09-12 21:04:46', '2014-09-13 10:49:25'),
(21, 'daemon.conf', 'application/octet-stream', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/8f14e45fceea167a5a36dedd4bea2543/daemon.conf', '', 0.00, 7, '2014-09-12 21:05:21', '2014-09-12 21:05:21'),
(23, 'pastille.jpg', 'image/jpeg', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/8f14e45fceea167a5a36dedd4bea2543/pastille.jpg', '', 0.00, 7, '2014-09-13 13:13:19', '2014-09-13 13:13:19'),
(24, 'sublime_text', 'application/octet-stream', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/c4ca4238a0b923820dcc509a6f75849b/sublime_text', '', 8.26, 1, '2014-09-13 14:05:56', '2014-09-13 14:05:56'),
(25, 'capture.png', 'image/png', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/8f14e45fceea167a5a36dedd4bea2543/Capture du 2014-06-20 09:45:16.png', '', 0.22, 7, '2014-09-14 11:07:26', '2014-09-14 11:14:20'),
(26, 'Capture du 2014-06-18 14:36:00.png', 'image/png', '/var/www/html/Piscine_MVC_Cloud_Wac/cloud/public/uploads/3c59dc048e8850243be8079a5c74d079/Capture du 2014-06-18 14:36:00.png', '', 0.13, 21, '2014-09-14 18:35:38', '2014-09-14 18:35:38');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_08_121021_CreateUserTable', 1),
('2014_09_08_155843_create_roles_table', 2),
('2014_09_10_113548_files', 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'utilisateur'),
(2, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role_id` int(11) NOT NULL,
  `remember_token` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `birthday`, `created_at`, `updated_at`, `role_id`, `remember_token`) VALUES
(1, 'admin', '$2y$10$ug8YtH6PBr4MGK7bDko9duKueBJmDlejWqhMnoJXfPceCeZWDYT4m', 'admin_AT_exemple.fr', '', '', '0000-00-00', '2014-09-08 20:39:32', '2014-09-14 18:32:19', 1, 0),
(3, 'Martin', '$2y$10$nuHFPvXUWGU5rjM1ZoFwD.4SnwTGbXYtKiX3jq/KzXIRcRxj1y/S2', 'martin_AT_exemple.fr', '', '', '0000-00-00', '2014-09-08 20:39:32', '2014-09-08 20:39:32', 1, 0),
(4, 'Lefevre', '$2y$10$t0/N9S3q58d5S766GMGoDuY25k8yh.SsamadyLd9elJaTjb/VODiW', 'lefevre_AT_exemple.fr', '', '', '0000-00-00', '2014-09-08 20:39:32', '2014-09-08 20:39:32', 1, 0),
(5, 'Dupond', '$2y$10$zEz5zk0Z38nenwPCHKydouiaEeWIlZU07FJqVD3YtBPa59wLWOILy', 'dupond_AT_exemple.fr', '', '', '0000-00-00', '2014-09-08 20:39:32', '2014-09-08 20:39:32', 1, 0),
(6, 'user1', 'user1', 'user1@user.fr', 'user', 'user', '2014-09-24', '2014-09-03 22:00:00', '2014-09-03 22:00:00', 1, 0),
(7, 'root', '$2y$10$IGdc1hBGWC/nmzdCgJRwqOxKAi8L3QPX7SSaKaE4fWyB3df6gb70W', 'root@root.fr', 'Robin', 'Chalas', '1994-03-27', '2014-09-09 08:25:13', '2014-09-14 19:13:44', 2, 0),
(20, 'adminnn', '$2y$10$Vq.U46fvbY8DA9jvxsvgpeRxQSOKxJUVsz0GBbPy/UUufowOCN2oq', 'adminnn_AT_exemple.fr', '', '', '0000-00-00', '2014-09-10 09:45:06', '2014-09-10 09:45:06', 1, 0),
(21, 'roubz', '$2y$10$UhlnNmh/ZZ/SDyLlcTzxSu0axCiEjj5nU8SE7Bx6l.gHMZSPC5KW6', 'robin.chalas@epitech.eu', 'Robin', 'Chalas', '1994-04-27', '2014-09-11 20:13:54', '2014-09-14 19:13:48', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
