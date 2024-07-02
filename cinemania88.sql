-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 02 juil. 2024 à 09:33
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinemania88`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Autre...', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(2, 'Alain Delon', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(3, 'George Clooney', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(4, 'Jean-Paul Belmondo', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(5, 'Harison Ford', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(6, 'All Pacino', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(7, 'Hill & Spencer', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(8, 'Jean-Claude Van Damme', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(9, 'Arnold Scharzenegger', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(10, 'Jason Statham', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(11, 'Silvester Stallone', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(12, 'Julia Roberts', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(13, 'Brad Pitt', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(14, 'Kevin costner', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(15, 'Léonardo DiCaprio', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(16, 'Bruce Willis', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(17, 'Johnny Depp', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(18, 'Charles Bronson', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(19, 'Johnny Hallyday', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(20, 'Christopher Lee', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(21, 'Louis De Funès ', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(22, 'Clint Eastwood', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(23, 'Lino Ventura', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(24, 'Eddie Murphy', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(25, 'Marilyn Monroe', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(26, 'Will Smith', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(27, 'Vincent Cassel', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(28, 'Tom Hanks', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(29, 'Tom Cruise', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(30, 'Steve McQueen', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(31, 'Sophie Marceau', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(32, 'Sean Connery', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(33, 'Rommy Schneider', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(34, 'Robert De Niro', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(35, 'Mel Gibson', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(36, 'Mr. Ulises Jakubowski', '2024-06-26 17:27:39', '2024-06-26 17:27:39'),
(37, 'Christopher Schiller', '2024-06-26 17:27:39', '2024-06-26 17:27:39'),
(38, 'Brandy Jakubowski II', '2024-06-27 06:12:38', '2024-06-27 06:12:38'),
(39, 'Brady Mohr', '2024-06-28 07:30:40', '2024-06-28 07:30:40'),
(40, 'Norris Kozey', '2024-06-28 07:30:43', '2024-06-28 07:30:43'),
(41, 'Sophie Hickle', '2024-06-28 10:16:43', '2024-06-28 10:16:43'),
(42, 'Ashly Kerluke', '2024-06-28 10:38:10', '2024-06-28 10:38:10'),
(43, 'Braden Windler', '2024-06-28 10:39:06', '2024-06-28 10:39:06'),
(44, 'Sarai Hermann', '2024-06-28 10:39:06', '2024-06-28 10:39:06'),
(45, 'Aubrey Fahey DVM', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(46, 'Ella O\'Hara', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(47, 'Ms. Althea Bernier DVM', '2024-06-28 10:42:09', '2024-06-28 10:42:09'),
(48, 'Rosa Lakin', '2024-06-28 10:42:09', '2024-06-28 10:42:09'),
(49, 'Chris Gibson', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(50, 'Dr. Wyatt Hoppe', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(51, 'Prof. Jamarcus Gottlieb Jr.', '2024-06-28 11:05:39', '2024-06-28 11:05:39'),
(52, 'Madisen Kemmer II', '2024-06-28 11:05:39', '2024-06-28 11:05:39');

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrateurs_username_unique` (`username`),
  UNIQUE KEY `administrateurs_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SF_GRAPH', 'sf.graph@outlook.com', NULL, '$2y$10$/dvWVzbXyPWnv4SL.ApDP.1X9U8Ixxkc45oCh29A60Bumj3UWbiEW', 'superadmin', NULL, '2024-06-26 15:37:28', '2024-06-26 15:37:28');

-- --------------------------------------------------------

--
-- Structure de la table `archived_orders`
--

DROP TABLE IF EXISTS `archived_orders`;
CREATE TABLE IF NOT EXISTS `archived_orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `canceled_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archived_orders`
--

INSERT INTO `archived_orders` (`id`, `user_id`, `status`, `total`, `created_at`, `updated_at`, `completed_at`, `canceled_at`) VALUES
(5, 9, 'shipped', '130.00', '2024-05-22 10:42:06', '2024-05-24 11:39:34', '2024-05-24 11:39:34', NULL),
(6, 10, 'shipped', '130.00', '2024-05-26 10:42:09', '2024-05-28 14:25:48', '2024-05-28 14:25:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `archived_order_addresses`
--

DROP TABLE IF EXISTS `archived_order_addresses`;
CREATE TABLE IF NOT EXISTS `archived_order_addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `archived_order_id` bigint UNSIGNED NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archived_order_id` (`archived_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archived_order_addresses`
--

INSERT INTO `archived_order_addresses` (`id`, `archived_order_id`, `address_type`, `address`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 5, 'billing', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(2, 5, 'shipping', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(3, 6, 'billing', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 10:42:09', '2024-06-28 10:42:09'),
(4, 6, 'shipping', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 10:42:09', '2024-06-28 10:42:09');

-- --------------------------------------------------------

--
-- Structure de la table `archived_order_items`
--

DROP TABLE IF EXISTS `archived_order_items`;
CREATE TABLE IF NOT EXISTS `archived_order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `archived_order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archived_order_id` (`archived_order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_user_id_foreign` (`user_id`),
  KEY `cart_items_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Affiches', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(2, 'Goodies', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(3, 'Photos', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(4, 'presse', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(5, 'Musique', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(6, 'DVD', '2024-06-26 15:37:29', '2024-06-26 15:37:29'),
(7, 'Blu-Ray', '2024-06-26 15:37:29', '2024-06-26 15:37:29'),
(8, 'Diapositives', '2024-06-26 15:37:29', '2024-06-26 15:37:29');

-- --------------------------------------------------------

--
-- Structure de la table `directors`
--

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `directors`
--

INSERT INTO `directors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Autre...', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(2, 'Dario Argento', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(3, 'Tim Burton', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(4, 'John Carpenter', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(5, 'Francis Ford Coppola', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(6, 'David Cronenberg', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(7, 'Brian De Palma', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(8, 'William Friedkin', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(9, 'Alfred Hitchcock', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(10, 'Pedro Almodovar', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(11, 'Wes Anderson', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(12, 'Luc Besson', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(13, 'Joel & Ethan Coen', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(14, 'Joe Dante', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(15, 'Federico Fellini', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(16, 'Lucio Fulci', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(17, 'Jean-Luc Godard', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(18, 'Stanley Kubrick', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(19, 'Akira Kurosawa', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(20, 'Sergio Leone', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(21, 'David Lynch', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(22, 'Russ Meyer', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(23, 'Hayao Miyazaki', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(24, 'Gaspar Noe', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(25, 'George Romero', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(26, 'Martin Scorsese', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(27, 'Steven Spielberg', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(28, 'Quentin Tarantino', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(29, 'François Truffaut', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(30, 'Crystal Gulgowski', '2024-06-26 17:27:39', '2024-06-26 17:27:39'),
(31, 'Alene Huel', '2024-06-26 17:27:39', '2024-06-26 17:27:39'),
(32, 'Nels Bahringer', '2024-06-27 06:12:38', '2024-06-27 06:12:38'),
(33, 'Mr. Madyson Eichmann PhD', '2024-06-28 07:30:40', '2024-06-28 07:30:40'),
(34, 'Adele Hoeger', '2024-06-28 07:30:43', '2024-06-28 07:30:43'),
(35, 'Roosevelt Lemke II', '2024-06-28 10:16:43', '2024-06-28 10:16:43'),
(36, 'Felipa Goldner V', '2024-06-28 10:38:10', '2024-06-28 10:38:10'),
(37, 'Greg Bahringer', '2024-06-28 10:39:06', '2024-06-28 10:39:06'),
(38, 'Hermann Rutherford', '2024-06-28 10:39:06', '2024-06-28 10:39:06'),
(39, 'Eric Kihn Jr.', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(40, 'Mr. Marley Schmitt', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(41, 'Clementine Turcotte', '2024-06-28 10:42:09', '2024-06-28 10:42:09'),
(42, 'Florida Schiller', '2024-06-28 10:42:09', '2024-06-28 10:42:09'),
(43, 'Kian Ritchie', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(44, 'Prof. Ari O\'Hara V', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(45, 'Alessia Gerlach', '2024-06-28 11:05:39', '2024-06-28 11:05:39'),
(46, 'Mekhi Tremblay', '2024-06-28 11:05:39', '2024-06-28 11:05:39');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Autre...', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(2, 'Walt Disney', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(3, 'Hommage / Retrospective', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(4, 'Ressortie / Classique', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(5, 'Musique / Concert', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(6, 'Film action', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(7, 'Sport', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(8, 'Comédie', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(9, 'Art Martiaux', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(10, 'Black exploitation', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(11, 'Policier / Thrillers', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(12, 'Cinéma Italien', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(13, 'Comédie musicale', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(14, 'Film animation', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(15, 'Erotique', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(16, 'Cinéma Asiatique', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(17, 'Horreur', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(18, 'Science fiction', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(19, 'Manga', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(20, 'Western', '2024-06-26 15:37:28', '2024-06-26 15:37:28');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_072555_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_06_13_072821_create_categories_table', 1),
(7, '2024_06_13_184720_create_administrateurs_table', 1),
(8, '2024_06_13_185407_create_events_table', 1),
(9, '2024_06_15_200204_create_sessions_table', 1),
(10, '2024_06_19_072859_create_genres_table', 1),
(11, '2024_06_19_072913_create_actors_table', 1),
(12, '2024_06_19_072927_create_directors_table', 1),
(13, '2024_06_19_072938_create_sagas_table', 1),
(14, '2024_06_19_072940_create_products_table', 1),
(15, '2024_06_19_072942_create_cart_items_table', 1),
(16, '2024_06_19_072947_create_orders_table', 1),
(17, '2024_06_19_072955_create_order_items_table', 1),
(18, '2024_06_19_073003_create_order_addresses_table', 1),
(19, '2024_06_19_073013_create_return_products_table', 1),
(20, '2024_06_19_073021_create_refund_products_table', 1),
(21, '2024_06_24_164417_create_order_cancellations_table', 1),
(22, '2024_06_25_171031_create_return_product_items_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total`, `created_at`, `updated_at`) VALUES
(10, 11, 'received', '130.00', '2024-06-28 10:42:12', '2024-06-28 17:17:08'),
(11, 12, 'received', '130.00', '2024-06-28 11:05:39', '2024-06-28 11:05:39');

-- --------------------------------------------------------

--
-- Structure de la table `order_addresses`
--

DROP TABLE IF EXISTS `order_addresses`;
CREATE TABLE IF NOT EXISTS `order_addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `archived_order_id` bigint UNSIGNED DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_addresses_order_id_foreign` (`order_id`),
  KEY `order_addresses_archived_order_id_foreign` (`archived_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `order_id`, `archived_order_id`, `address_type`, `address`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(9, 10, NULL, 'billing', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(10, 10, NULL, 'shipping', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(11, 11, NULL, 'billing', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 11:05:39', '2024-06-28 11:05:39'),
(12, 11, NULL, 'shipping', '123 Main St', 'Anytown', 'Anystate', '12345', 'USA', '2024-06-28 11:05:39', '2024-06-28 11:05:39');

-- --------------------------------------------------------

--
-- Structure de la table `order_cancellations`
--

DROP TABLE IF EXISTS `order_cancellations`;
CREATE TABLE IF NOT EXISTS `order_cancellations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_cancellations_order_id_foreign` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `archived_order_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_archived_order_id_foreign` (`archived_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` bigint UNSIGNED NOT NULL,
  `genres_id` bigint UNSIGNED NOT NULL,
  `actors_id` bigint UNSIGNED NOT NULL,
  `directors_id` bigint UNSIGNED NOT NULL,
  `sagas_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categories_id_foreign` (`categories_id`),
  KEY `products_genres_id_foreign` (`genres_id`),
  KEY `products_actors_id_foreign` (`actors_id`),
  KEY `products_directors_id_foreign` (`directors_id`),
  KEY `products_sagas_id_foreign` (`sagas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image_path`, `categories_id`, `genres_id`, `actors_id`, `directors_id`, `sagas_id`, `created_at`, `updated_at`) VALUES
(18, 'Affiche Le seigneur des anneaux', 'affiche', '19.90', 2, 'images/1719773754_s-l1600 (11).jpg', 1, 1, 1, 1, 7, '2024-06-30 16:55:54', '2024-07-01 17:16:03'),
(19, 'Affiche Cars 2', 'affiche cars', '29.90', 1, 'images/1719774776_s-l1600 (10).jpg', 1, 2, 1, 1, 1, '2024-06-30 17:12:56', '2024-07-01 13:48:56'),
(20, 'diapositive', 'diapositive louis de funès', '17.90', 1, 'images/1719818609_s-l1600 (15-2).png', 8, 8, 21, 1, 1, '2024-07-01 05:23:29', '2024-07-01 05:23:29');

-- --------------------------------------------------------

--
-- Structure de la table `refund_products`
--

DROP TABLE IF EXISTS `refund_products`;
CREATE TABLE IF NOT EXISTS `refund_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_product_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refund_products_return_product_id_foreign` (`return_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `return_products`
--

DROP TABLE IF EXISTS `return_products`;
CREATE TABLE IF NOT EXISTS `return_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_products_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `return_product_items`
--

DROP TABLE IF EXISTS `return_product_items`;
CREATE TABLE IF NOT EXISTS `return_product_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `return_product_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_product_items_return_product_id_foreign` (`return_product_id`),
  KEY `return_product_items_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sagas`
--

DROP TABLE IF EXISTS `sagas`;
CREATE TABLE IF NOT EXISTS `sagas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sagas`
--

INSERT INTO `sagas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Autre...', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(2, 'Indiana Jones', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(3, 'Batman', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(4, 'Alien', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(5, 'Dents de la mer', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(6, 'Harry Potter', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(7, 'Seigneur des anneaux', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(8, 'Star Wars', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(9, 'Marvel', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(10, 'Jurassic Park', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(11, 'Sos Fantome', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(12, 'Robocop', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(13, 'Tarzan', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(14, 'Zorro', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(15, 'Terminator', '2024-06-26 15:37:28', '2024-06-26 15:37:28'),
(16, 'James Bond', '2024-06-26 15:37:28', '2024-06-26 15:37:28');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GhEXBAluort5t5Stb5inPcKn0sssRbaLcmP6ty07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSFRjQkN3WXYwOVVkaHFxSW1oR3cxSnVUT0VxZW01Yk5wbGoyY25BMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9jaW5lbWFuaWE4OC9wcm9kdWN0cy8xOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1719862059),
('k5wx9uDZiIZvq6Dm9OFOgiNW5WjUf3giEMIHSuFv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFI5SEhxTklWQ0IwR3NSbEVvTHl0WFVtV3pIV1I4TVpHVG5oRnZOOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9jaW5lbWFuaWE4OCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719854189),
('NsLAQ0qZy7h1qg8Pq6X4SX52qjPK678IUbyKqLCO', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWw2TFYwbXY3QWxKRHpjWjk2OXM4Yk9SWjU4VjFtejg2V2d6TVRPZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9jaW5lbWFuaWE4OCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719907516),
('W67gcnxlhaQFEWXLBgXSQhzQBxFbWlTODLRdWT7m', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2xMRWd3Rk1oZnlCVVpkRGFPUU1YQUNYd0tkNlBjVGJRbGY0RFZjNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9jaW5lbWFuaWE4OCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719854300);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Dr. Juliana Donnelly DVM', 'stephanefernez@gmail.com', '2024-06-28 10:42:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'V7oN2TCJrP', '2024-06-28 10:42:06', '2024-06-28 10:42:06'),
(10, 'Dangelo Kuhic', 'stephanefernez.graph@gmail.com', '2024-06-28 10:42:09', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'YhhEp4EPPA', '2024-06-28 10:42:09', '2024-06-28 10:42:09'),
(11, 'Jake Robel', 'cinemania88.chistophe@gmail.com', '2024-06-28 10:42:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'FRzbETNBJF', '2024-06-28 10:42:12', '2024-06-28 10:42:12'),
(12, 'Kenna Hagenes', 'herminio.anderson@example.com', '2024-06-28 11:05:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ugb2Ey19KR', '2024-06-28 11:05:39', '2024-06-28 11:05:39');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `archived_orders`
--
ALTER TABLE `archived_orders`
  ADD CONSTRAINT `archived_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `archived_order_addresses`
--
ALTER TABLE `archived_order_addresses`
  ADD CONSTRAINT `archived_order_addresses_ibfk_1` FOREIGN KEY (`archived_order_id`) REFERENCES `archived_orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `archived_order_items`
--
ALTER TABLE `archived_order_items`
  ADD CONSTRAINT `archived_order_items_ibfk_1` FOREIGN KEY (`archived_order_id`) REFERENCES `archived_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archived_order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD CONSTRAINT `order_addresses_archived_order_id_foreign` FOREIGN KEY (`archived_order_id`) REFERENCES `archived_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order_cancellations`
--
ALTER TABLE `order_cancellations`
  ADD CONSTRAINT `order_cancellations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_archived_order_id_foreign` FOREIGN KEY (`archived_order_id`) REFERENCES `archived_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_actors_id_foreign` FOREIGN KEY (`actors_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_directors_id_foreign` FOREIGN KEY (`directors_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_genres_id_foreign` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sagas_id_foreign` FOREIGN KEY (`sagas_id`) REFERENCES `sagas` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `refund_products`
--
ALTER TABLE `refund_products`
  ADD CONSTRAINT `refund_products_return_product_id_foreign` FOREIGN KEY (`return_product_id`) REFERENCES `return_products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `return_products`
--
ALTER TABLE `return_products`
  ADD CONSTRAINT `return_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `return_product_items`
--
ALTER TABLE `return_product_items`
  ADD CONSTRAINT `return_product_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_product_items_return_product_id_foreign` FOREIGN KEY (`return_product_id`) REFERENCES `return_products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
