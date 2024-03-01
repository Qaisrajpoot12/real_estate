-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2024 at 10:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(12, 'listing_images/2N46UNRZ7W9GpOi2Mk0J1BSgBzSv6amHgcBOuc0I.png', '13', 'App\\Models\\Listing', '2024-02-28 12:12:54', '2024-02-28 12:12:54'),
(13, 'listing_images/wEd265WwpO7bFeuzj8IGrJCskmzQIUBvWhZRWbiC.png', '14', 'App\\Models\\Listing', '2024-02-28 15:46:10', '2024-02-28 15:46:10'),
(14, 'listing_images/LOc0g0k7aqSekhUpLoJvOSrp3c2d1oX618z9CrXl.png', '15', 'App\\Models\\Listing', '2024-02-28 15:47:24', '2024-02-28 15:47:24'),
(15, 'listing_images/mR1FYmP3L6tk6oOzoHmcQDcVaVApWmChcYY8PCxY.png', '16', 'App\\Models\\Listing', '2024-02-28 15:47:50', '2024-02-28 15:47:50'),
(16, 'listing_images/b4dwk5kEI1y9gcIaJMV6fnURANnzYtmdjUMwp9HQ.png', '17', 'App\\Models\\Listing', '2024-02-28 15:50:17', '2024-02-28 15:50:17'),
(17, 'listing_images/LP8r6tEGW6FHxRgQDp0nOMSTOdq3G7RCbbT0WMr4.png', '18', 'App\\Models\\Listing', '2024-02-28 15:51:28', '2024-02-28 15:51:28'),
(18, 'listing_images/cO4mzjb9weHmF8GwkbCAZF73P8DlhBfFZQiDU5af.png', '19', 'App\\Models\\Listing', '2024-02-28 15:51:35', '2024-02-28 15:51:35'),
(19, 'listing_images/7AZREegGIA9pMuT40xlyS5Su7YuUa5SjhTDrcZud.png', '20', 'App\\Models\\Listing', '2024-02-28 15:51:43', '2024-02-28 15:51:43'),
(20, 'listing_images/fqFPKBnKqZbXdTYro4BRBQntmE5aiEVnns9ypfC4.png', '21', 'App\\Models\\Listing', '2024-02-28 15:52:30', '2024-02-28 15:52:30'),
(21, 'listing_images/2vzzYOi78rCpj6miz3YZpXMKsE3qae9NCw1s7ZFe.png', '22', 'App\\Models\\Listing', '2024-02-28 15:52:39', '2024-02-28 15:52:39'),
(22, 'listing_images/KisxUzDxL9K62ZIR47achiPauPRh17J8Z5plIB1b.png', '23', 'App\\Models\\Listing', '2024-02-28 15:53:00', '2024-02-28 15:53:00'),
(23, 'listing_images/faQY6KsK5kGgB4AEXTYSaE1F2ZHE2E4XWjpaRa5Z.png', '24', 'App\\Models\\Listing', '2024-02-28 15:53:17', '2024-02-28 15:53:17'),
(24, 'listing_images/wfUageKUG7OHA4SRauEHQoruvSnV9DdxKaydIdPJ.png', '25', 'App\\Models\\Listing', '2024-02-28 15:53:26', '2024-02-28 15:53:26'),
(25, 'listing_images/1V6QM8qJsyQz7CfnQeRJbUtSckN4JK6FTAnhRb3r.png', '26', 'App\\Models\\Listing', '2024-02-28 15:53:59', '2024-02-28 15:53:59'),
(26, 'listing_images/UUEwxqNfBQxcLFYK9iqCQYMDMTxVzfu0K6qlY90Q.png', '27', 'App\\Models\\Listing', '2024-02-28 15:54:09', '2024-02-28 15:54:09'),
(27, 'listing_images/2bN2Ok8r3idsNQ91iXFnLiTsScyfLfvHiXrw2uC5.png', '28', 'App\\Models\\Listing', '2024-02-28 15:54:23', '2024-02-28 15:54:23'),
(28, 'listing_images/FiD5qK6HoiFN2NzUq80eWm8tZiWKw88aRKKxgQR4.png', '29', 'App\\Models\\Listing', '2024-02-28 15:54:34', '2024-02-28 15:54:34'),
(29, 'listing_images/xTN4DM5yd6e94nCMBpAHhV9cG9llt7y5v8vUDWwJ.png', '30', 'App\\Models\\Listing', '2024-02-28 15:55:06', '2024-02-28 15:55:06'),
(30, 'listing_images/fsx4AvRVlO9NSjnHRcMUcgzD4dX7yf52RuaktpKL.png', '31', 'App\\Models\\Listing', '2024-02-28 15:55:16', '2024-02-28 15:55:16'),
(31, 'listing_images/yWJVi56kxipJOlopo6KMMLFWBK24P7ovqp6GUHoW.png', '32', 'App\\Models\\Listing', '2024-02-28 15:55:22', '2024-02-28 15:55:22'),
(32, 'listing_images/CappG5itnlbWKYYezxNQORGUnMtojNmuZDojKBsA.png', '33', 'App\\Models\\Listing', '2024-02-28 15:56:46', '2024-02-28 15:56:46'),
(33, 'listing_images/TmTCNLVtf7CfdQ9Jvmp0sPhn7y8tPUry507ti6mQ.png', '34', 'App\\Models\\Listing', '2024-02-28 16:09:47', '2024-02-28 16:09:47'),
(34, 'listing_images/60gHzkR9s7rC1ms1FYdoXAYffLfiZgRUxMfJxPo5.png', '35', 'App\\Models\\Listing', '2024-02-28 16:11:18', '2024-02-28 16:11:18'),
(38, 'listing_images/sdwvDuRfVml88y4KOq2SkMH0A2phGj9as9V2q7dS.png', '37', 'App\\Models\\Listing', '2024-02-29 05:46:06', '2024-02-29 05:46:06'),
(39, 'listing_images/hTK6MIxq7JI4g4mfQpO8EcEcpFV7oLg2pNLd6edN.png', '38', 'App\\Models\\Listing', '2024-02-29 06:03:34', '2024-02-29 06:03:34'),
(46, 'listing_images/hoM8T4ZUGZLXDajRSPI8AQkZIMEfxTOJlHLQny2O.png', '36', 'App\\Models\\Listing', '2024-02-29 09:38:32', '2024-02-29 09:38:32'),
(47, 'listing_images/vDW8MZdHH31DdLvlwmY5IDWCMM5urD7MBfc8BKZH.png', '40', 'App\\Models\\Listing', '2024-02-29 09:39:30', '2024-02-29 09:39:30'),
(48, 'listing_images/2JnOpC2tiKUX41lLJBonyRp3i5GNRipeuu7JnKDP.png', '39', 'App\\Models\\Listing', '2024-02-29 09:49:52', '2024-02-29 09:49:52'),
(49, 'listing_images/rMlbnjD4zVoFQe90F9UlP3FTQsXBLeTTap3prsPd.png', '41', 'App\\Models\\Listing', '2024-02-29 10:05:44', '2024-02-29 10:05:44'),
(52, 'listing_images/6LZ31Sc6wzcVrPih1WsepanFGYvxjFE3OfAJE1Ie.png', '41', 'App\\Models\\Listing', '2024-02-29 12:18:38', '2024-02-29 12:18:38'),
(53, 'listing_images/WWJRshsmdFuP9wzdgZLGHkbuIDM4bfjHriwwvNJF.png', '41', 'App\\Models\\Listing', '2024-02-29 12:18:38', '2024-02-29 12:18:38'),
(56, 'listing_images/fWjJmERntXomNXLV2WbzvD70MDE7puukj5cB1zYu.png', '41', 'App\\Models\\Listing', '2024-02-29 12:19:34', '2024-02-29 12:19:34'),
(57, 'listing_images/23h0pxe0sTqrfdXyhM725PTGCLnzndOwGhKRcHDM.png', '41', 'App\\Models\\Listing', '2024-02-29 12:19:34', '2024-02-29 12:19:34'),
(58, 'listing_images/EoJ8nQWjoBPpRW4cl7zcDg1hcqFYuHx0PjPnidiC.png', '42', 'App\\Models\\Listing', '2024-02-29 12:20:49', '2024-02-29 12:20:49'),
(61, 'listing_images/poELLsHjgz64DbIGtqReWOgWkZlOMbYKiGJXT6LR.png', '42', 'App\\Models\\Listing', '2024-02-29 12:21:13', '2024-02-29 12:21:13'),
(62, 'listing_images/5GEcyGR27GSpocobBN78FQsAKOdH09F2wB19bCgz.png', '42', 'App\\Models\\Listing', '2024-02-29 12:21:13', '2024-02-29 12:21:13'),
(63, 'listing_images/RgKVxqY93XuWoRQUVMoNqNVgC4mpCti0j87gJUwg.png', '43', 'App\\Models\\Listing', '2024-02-29 12:31:17', '2024-02-29 12:31:17'),
(64, 'listing_images/hbIbFiKTYSHOd2jTUh4PQcaxhSSVl14fHk3sBHC0.png', '43', 'App\\Models\\Listing', '2024-02-29 12:31:17', '2024-02-29 12:31:17'),
(65, 'listing_images/lCwn4ji2g92n1QImVN5mmfCnC7EncSdz5LEjgp2P.png', '43', 'App\\Models\\Listing', '2024-02-29 12:31:17', '2024-02-29 12:31:17'),
(66, 'listing_images/a0QID7Z0M60DMyrHyINccGXv8W3fB6jGrZl5pQw9.png', '40', 'App\\Models\\Listing', '2024-02-29 14:26:44', '2024-02-29 14:26:44'),
(67, 'listing_images/FA3de3aMx098YXVBysbteEPKKeFfssN87YzYQIBY.png', '40', 'App\\Models\\Listing', '2024-02-29 14:26:44', '2024-02-29 14:26:44'),
(70, 'listing_images/WLvfiB349t3TsKHppRVIGQszlCKx2VG22x0j7BaF.png', '4', 'App\\Models\\User', '2024-02-29 15:25:56', '2024-02-29 15:25:56'),
(72, 'listing_images/aJdkGtEEn4SeKPAghb4p7zi2UHZb9O44g18cMEtp.png', '44', 'App\\Models\\Listing', '2024-03-01 01:52:12', '2024-03-01 01:52:12'),
(73, 'listing_images/D7iJhPF1PsxedRrTVdeuMqvWXsEQAPpXBJ5fA8lp.png', '44', 'App\\Models\\Listing', '2024-03-01 01:52:12', '2024-03-01 01:52:12'),
(74, 'profile_image/a5mKjO1TzK4VKAYsCi2r0UpDpyoUogq8skgjo9bT.png', '1', 'App\\Models\\User', '2024-03-01 04:12:41', '2024-03-01 04:12:41'),
(75, 'listing_images/1l7rXkmFbTCudpMUtueJNMPZ4VgguG9X4gi9kgJ1.png', '45', 'App\\Models\\Listing', '2024-03-01 04:18:30', '2024-03-01 04:18:30'),
(76, 'listing_images/w3nuTCxIBJivNHrH55SiTYCMCOu8MDFN5xdyoM8s.png', '45', 'App\\Models\\Listing', '2024-03-01 04:21:46', '2024-03-01 04:21:46'),
(77, 'listing_images/lnSGOsizaJD7E1SW8yhHaNOiJp0s53aTXIJnpi8g.png', '45', 'App\\Models\\Listing', '2024-03-01 04:32:08', '2024-03-01 04:32:08'),
(78, 'listing_images/sIfRuAsff8hqNkBhF6r8erLa7VHUiKD4ejs42L6A.png', '45', 'App\\Models\\Listing', '2024-03-01 04:32:30', '2024-03-01 04:32:30'),
(79, 'listing_images/HnVZ2h9yGJ96K0byN1y39LDaCHcXZuRudctrppoQ.png', '45', 'App\\Models\\Listing', '2024-03-01 04:33:00', '2024-03-01 04:33:00'),
(80, 'listing_images/arzVOlaM7HCQUXUEO98b60eIgv9xzq8kKOzzLS3t.png', '45', 'App\\Models\\Listing', '2024-03-01 04:33:00', '2024-03-01 04:33:00'),
(81, 'listing_images/w1u8bVPRKm0bf9xvu4hHdN6stsEtuptLJzAWQJVG.png', '45', 'App\\Models\\Listing', '2024-03-01 04:40:59', '2024-03-01 04:40:59'),
(82, 'listing_images/8yupLWAP9II3KGyoxNDo1dlosmrEj3AZu0iDvgQS.png', '46', 'App\\Models\\Listing', '2024-03-01 04:42:34', '2024-03-01 04:42:34'),
(83, 'listing_images/yXyLaJvyk7KPS4f1GQYP5bjcnjw0dGzVz15KwGwc.png', '46', 'App\\Models\\Listing', '2024-03-01 04:42:34', '2024-03-01 04:42:34'),
(84, 'listing_images/0XzACH4j6f3M8oRi69VmP8KOHk9cwPFSzXl6QTqP.png', '46', 'App\\Models\\Listing', '2024-03-01 04:42:34', '2024-03-01 04:42:34'),
(85, 'listing_images/Cai4WxBGNJvLQ2PiOasMuSGdibEpzMKFDAMnRHuz.png', '46', 'App\\Models\\Listing', '2024-03-01 04:42:53', '2024-03-01 04:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `description`, `user_id`, `featured`, `created_at`, `updated_at`) VALUES
(43, 'not featured', 'test', 4, 1, '2024-02-29 12:31:17', '2024-02-29 15:39:24'),
(46, 'sdsdsdsd', 'sdsdsdsds', 1, 1, '2024-03-01 04:42:34', '2024-03-01 04:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loggable_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `loggable_id`, `loggable_type`, `created_at`, `updated_at`) VALUES
(148, 1, 'update', '1', 'App\\Models\\User', '2024-03-01 04:40:33', '2024-03-01 04:40:33'),
(149, 1, 'update', '1', 'App\\Models\\User', '2024-03-01 04:40:59', '2024-03-01 04:40:59'),
(150, 1, 'delete', '1', 'App\\Models\\User', '2024-03-01 04:42:11', '2024-03-01 04:42:11'),
(151, 1, 'create', '1', 'App\\Models\\User', '2024-03-01 04:42:34', '2024-03-01 04:42:34'),
(152, 1, 'update', '1', 'App\\Models\\User', '2024-03-01 04:42:53', '2024-03-01 04:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_02_28_120757_create_listings_table', 1),
(18, '2024_02_28_120802_create_images_table', 1),
(19, '2024_02_28_120817_create_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(42, 'App\\Models\\User', 4, 'authToken', '079a9c58406acb561e597e66980385770795eb8c0373e0d906833a5d489ef786', '[\"*\"]', '2024-02-29 09:32:19', NULL, '2024-02-29 08:03:17', '2024-02-29 09:32:19'),
(43, 'App\\Models\\User', 4, 'authToken', 'ce6c85672da9576465f68859de6fc0eec33ff1030d2e0da71553d32b027e1c07', '[\"*\"]', '2024-02-29 16:43:00', NULL, '2024-02-29 09:02:02', '2024-02-29 16:43:00'),
(46, 'App\\Models\\User', 1, 'authToken', '1d6d9286a2ef014bdcaa214c527f9cefdaf14a72c628cdb92617a2917759ee5a', '[\"*\"]', '2024-03-01 04:49:54', NULL, '2024-03-01 02:38:18', '2024-03-01 04:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'rajpoot', '121@gmail.com', '$2y$12$Rid39.CORm83RrVqpqPceebYGi3xZX8PR6WdfAG7T8.FvliE9xx26', 'agent', '2024-02-28 08:42:54', '2024-03-01 02:38:08'),
(2, 'Qais', 'admin@ticketsio.com', '$2y$12$3OhleijcvKGjke8nq0o/a.eMaVTPeChTFXBSgZjo9QWAz2r/aeBVq', 'agent', '2024-02-29 00:31:07', '2024-02-29 00:31:07'),
(3, 'Qais', 'qaisrajpoot2022@gmail.com', '$2y$12$UT775WpMb3hEs3Wqf04lO.Eucoa0rwHVKfq.wu.38/z5sj4NUHGju', 'agent', '2024-02-29 00:32:05', '2024-02-29 00:32:05'),
(4, 'Qais rajpoot', 'ak1472512@gmail.com', '$2y$12$D52V3FXLZKX5kGtKYULipOg4NmyvYB9zCBMMLwBe4unGsF55eTZ12', 'agent', '2024-02-29 00:49:20', '2024-02-29 15:26:16'),
(5, 'Qais', 'qaisrajpoot20@gmail.com', '$2y$12$IJSp/5k7pUByOcPXZOWhF.t/1FLvP.ARR1nVEzIu0cpGeplf7DpG6', 'agent', '2024-02-29 01:00:26', '2024-02-29 01:00:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_user_id_foreign` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
