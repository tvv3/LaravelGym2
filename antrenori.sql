-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: ian. 19, 2020 la 07:51 PM
-- Versiune server: 5.7.26
-- Versiune PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `antrenori`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

DROP TABLE IF EXISTS `angajati`;
CREATE TABLE IF NOT EXISTS `angajati` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `descriere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salariu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `angajati_user_id_unique` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `angajati`
--

INSERT INTO `angajati` (`id`, `user_id`, `descriere`, `salariu`, `created_at`, `updated_at`) VALUES
(2, 6, 'fitness', 1234, '2019-12-15 06:42:58', '2019-12-15 06:42:58');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `antrenori`
--

DROP TABLE IF EXISTS `antrenori`;
CREATE TABLE IF NOT EXISTS `antrenori` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `descriere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salariu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `antrenori_user_id_unique` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti`
--

DROP TABLE IF EXISTS `clienti`;
CREATE TABLE IF NOT EXISTS `clienti` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `descriere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abonament` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inceput` datetime NOT NULL,
  `data_sfarsit` datetime NOT NULL,
  `pret` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clienti_user_id_unique` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `clienti`
--

INSERT INTO `clienti` (`id`, `user_id`, `descriere`, `abonament`, `data_inceput`, `data_sfarsit`, `pret`, `created_at`, `updated_at`) VALUES
(1, 2, 'fitness', 'lunar', '2021-01-01 00:00:00', '2021-01-02 00:00:00', 100, '2019-12-26 14:43:55', '2019-12-26 17:10:12');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_08_153457_create_antrenors_table', 1),
(5, '2019_12_08_153711_create_clients_table', 1),
(6, '2019_12_14_191653_create_angajats_table', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role2` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `role2`) VALUES
(1, 'test', 'test@test.com', NULL, '$2y$10$ExX3W8JXB2es.6uS.cyZBerQ9.wG7v1iX9Mc882W9bQM9h4UxaiZ.', NULL, '2019-12-14 17:52:27', '2019-12-14 17:52:27', 'admin', 'admin'),
(2, 'client', 'client@test.com', NULL, '$2y$10$aV50bKGWrX8HBMU26IBgH.hv4ZD4CtLOuhSlKGZ/vou/j2.MNnQim', NULL, '2019-12-14 17:53:16', '2019-12-14 17:53:16', 'client', 'user'),
(3, 'client2', 'client2@test.com', NULL, '$2y$10$MRViHVVxNCXJQgD0b8iJNebqweiyE3Jhj0YS3ogjHmbnTRE6bJkk.', NULL, '2019-12-14 17:54:29', '2019-12-14 17:54:29', 'client', 'user'),
(4, 'antrenor', 'antrenor@test.com', NULL, '$2y$10$RUI58PSNvyaHCKttAHxYvuG1X.m6bRrPBRFqwNS42d8iXxWJyu68C', NULL, '2019-12-14 17:56:17', '2019-12-14 17:56:17', 'antrenor', 'user'),
(5, 'manager', 'manager@test.com', NULL, '$2y$10$JFQPqYITntQaiBGFYFqryudVYolBh0LpmFdIQXJROpgsUYkCND83i', NULL, '2019-12-14 17:57:19', '2019-12-14 17:57:19', 'antrenor', 'user'),
(6, 'angajat', 'angajat@test.com', NULL, '$2y$10$mE6eeeTRUPvWrSnqnDLJguSQdXbYgW8DXvKQZd/AGgFsc9YWiXo1m', NULL, '2019-12-14 19:40:59', '2019-12-14 19:40:59', 'antrenor', 'user'),
(7, 'angajat2', 'angajat2@test.com', NULL, '$2y$10$Il.C2KFKRpeSaGEO23tSp.8B6yU.M6XUmX2SQGfvxZeS1w8MnbWRu', NULL, '2019-12-14 19:56:49', '2019-12-14 19:56:49', 'antrenor', 'user'),
(8, 'angajat3', 'angajat3@test.com', NULL, '$2y$10$3xD/eHMW.VcIX3LEaoHix.lvbrCXe4yqRWCmTewgL1V0kVhWGbM/e', NULL, '2019-12-14 20:00:32', '2019-12-14 20:00:32', 'antrenor', 'user'),
(9, 'angajat4', 'angajat4@test.com', NULL, '$2y$10$Vfi1gjR4xBnIY9/m.uAvZel/g.kju5GdQA2TgiUThRArhywPg9.Q6', NULL, '2019-12-14 20:10:00', '2019-12-14 20:10:00', 'antrenor', 'user'),
(10, 'manager2', 'manager2@test.com', NULL, '$2y$10$b1LvwVeloys6a8p3sXZLJ.otPQzlJKtODrq.EcAZCnU6Djm4OSRSq', NULL, '2019-12-17 13:57:06', '2019-12-17 13:57:06', 'manager', 'user'),
(11, 'agentvz', 'agentvz@test.com', NULL, '$2y$10$UFz7d0FyeXEhWa6BozpYqe5BDwUzj41r.IaIVmQieSEOm/m2xiuAS', NULL, '2019-12-17 14:00:08', '2019-12-17 14:00:08', 'agentvz', 'user'),
(12, 'anna', 'anna@test.com', NULL, '$2y$10$MkBkE65n1SwqNOCHX/ifheuggoTzOB7wjfcb9RgTBXuX9PJlvWije', NULL, '2020-01-17 15:23:58', '2020-01-17 15:23:58', 'client', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
