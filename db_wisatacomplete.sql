-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2024 at 06:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisatacomplete`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id_alternative` bigint(20) UNSIGNED NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `code_wisata` varchar(255) NOT NULL,
  `jenis_wisata` varchar(255) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `img_wisata` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id_alternative`, `nama_wisata`, `alamat`, `code_wisata`, `jenis_wisata`, `latitude`, `longitude`, `img_wisata`, `created_at`, `updated_at`) VALUES
(16, 'Museum Airlangga', 'Jl. Lingkar Maskumambang, Pojok, Kec. Mojoroto, Kota Kediri, Jawa Timur 64115', 'A1', 'Wisata Budaya', '-7.8070924', '111.9726563', '1721519068_Museum-Airlangga-Kediri.jpg', '2024-07-20 16:44:28', '2024-07-21 09:12:49'),
(17, 'Goa Selomangleng', 'Jl. Selomangleng, Pojok, Kec. Mojoroto, Kota Kediri, Jawa Timur 64115', 'A2', 'Wisata Budaya', '-7.8071774', '111.9726563', '1721519128_goa-selomangleng-jawa-timur.jpg', '2024-07-20 16:45:28', '2024-07-21 09:08:10'),
(18, 'Sumber Cakarwesi', 'Jl. Cakarwesi Raya No.50, Tosaren, Kec. Pesantren, Kabupaten Kediri, Jawa Timur 64133', 'A3', 'Wisata Alam', '-7.8577357', '112.0362293', '1721519175_sumber cakarwasi.jpg', '2024-07-20 16:46:15', '2024-07-20 16:46:15'),
(19, 'Sumber Jiput', 'Jl. Sumber, Rejomulyo, Kec. Kota, Kota Kediri, Jawa Timur 64129', 'A4', 'Wisata Alam', '-7.8536911', '112.0186208', '1721519258_sumber jiput.jpg', '2024-07-20 16:47:38', '2024-07-20 16:47:54'),
(20, 'Sumber Banteng', 'Tempurejo, Pesantren, Kediri, East Java 64138', 'A5', 'Wisata Alam', '-7.8463375', '112.0790781', '1721519318_sumber banteng.jpg', '2024-07-20 16:48:38', '2024-07-20 16:48:38'),
(21, 'Tirtayasa Park Kediri', 'Jl. Ahmad Yani No.123, Sukorejo, Kec. Ngasem, Kabupaten Kediri, Jawa Timur 64129', 'A6', 'Wisata Minat Khusus', '-7.8154324', '112.0287704', '1721519404_pemandian tirtayasa.jpg', '2024-07-20 16:50:04', '2024-07-20 16:50:04'),
(22, 'Taman Air Pagora Kediri', 'Banjaran, Kec. Kota, Kabupaten Kediri, Jawa Timur 64129', 'A7', 'Wisata Minat Khusus', '-7.8165262', '112.0317243', '1721519497_pemandian pagora.jpg', '2024-07-20 16:51:37', '2024-07-20 16:51:37'),
(23, 'Taman Sekartaji', 'Jl. Veteran, Mojoroto, Kec. Mojoroto, Kota Kediri, Jawa Timur 64112', 'A8', 'Wisata Minat Khusus', '-7.8107051', '112.0041194', '1721519545_taman sekartaji.jpg', '2024-07-20 16:52:26', '2024-07-20 16:52:26'),
(24, 'Makam Syekh Al Wasil Syamsudin', 'Setono Gedong, Kec. Kota, Kota Kediri, Jawa Timur 64129', 'A9', 'Wisata Religi', '-7.8161502', '112.0114816', '1721519596_Makam Syekh Alwasil.jpg', '2024-07-20 16:53:16', '2024-07-20 16:53:16'),
(25, 'Masjid Agung Kota Kediri', 'Jl. Panglima Sudirman No.160, Kp. Dalem, Kec. Kota, Kota Kediri, Jawa Timur 64126', 'A10', 'Wisata Religi', '-7.8268300', '112.0100684', '1721519642_Masjid_Agung_Kota_Kediri.jpg', '2024-07-20 16:54:02', '2024-07-20 16:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calculations`
--

CREATE TABLE `calculations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calculations`
--

INSERT INTO `calculations` (`id`, `lokasi`, `harga`, `fasilitas`, `jenis`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, '3', '3', '3', 'Wisata Alam', '-6.3827709', '106.8212441', '2024-07-19 11:53:21', '2024-07-19 11:53:21'),
(2, '5', '5', '5', 'Wisata Religi', '-7.8333300', '111.9851245', '2024-07-20 23:38:11', '2024-07-20 23:38:11'),
(3, '1', '5', '1', NULL, '-8.0994033', '112.1358873', '2024-07-21 06:28:50', '2024-07-21 06:28:50'),
(4, '5', '3', '2', NULL, '-8.0994033', '112.1358873', '2024-07-21 06:29:34', '2024-07-21 06:29:34'),
(5, '5', '5', '5', NULL, '-8.0993983', '112.1358926', '2024-07-21 09:25:39', '2024-07-21 09:25:39'),
(6, '1', '1', '1', NULL, '-8.0993983', '112.1358926', '2024-07-21 09:26:29', '2024-07-21 09:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `category_wisata` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_kategori`, `category_wisata`, `created_at`, `updated_at`) VALUES
(1, 'Wisata Budaya', '2024-07-16 13:57:40', '2024-07-16 13:57:40'),
(2, 'Wisata Alam', '2024-07-16 13:58:57', '2024-07-16 13:58:57'),
(3, 'Wisata Minat Khusus', '2024-07-16 13:59:47', '2024-07-16 13:59:47'),
(4, 'Wisata Religi', '2024-07-16 13:59:57', '2024-07-16 13:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id_criteria` bigint(20) UNSIGNED NOT NULL,
  `kode_atribut` varchar(255) NOT NULL,
  `nama_atribut` varchar(255) NOT NULL,
  `atribut` int(11) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id_criteria`, `kode_atribut`, `nama_atribut`, `atribut`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Lokasi', 40, 'Benefit', '2024-05-05 12:49:23', NULL),
(2, 'C2', 'Jarak', 30, 'Benefit', '2024-05-05 12:49:23', NULL),
(3, 'C3', 'Biaya', 20, 'Cost', '2024-05-05 12:49:23', NULL),
(4, 'C4', 'Fasilitas', 10, 'Benefit', '2024-05-05 12:49:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1),
(10, '2024_04_07_191534_create_alternatives_table', 1),
(11, '2024_04_07_191545_create_weights_table', 1),
(12, '2024_04_07_191555_create_criterias_table', 1),
(13, '2024_07_08_085714_add_column_to_alternatives', 2),
(14, '2024_07_13_110025_create_categories_table', 2),
(22, '2024_07_16_162315_create_calculations_table', 3),
(23, '2024_07_17_200108_create_results_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_wisata` varchar(255) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `hasil` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `code_wisata`, `nama_wisata`, `hasil`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Puncak', '0.2712140', '2024-07-19 11:53:35', '2024-07-19 11:53:35'),
(2, 'A2', 'Taman Safari', '0.2712324', '2024-07-19 11:53:35', '2024-07-19 11:53:35'),
(3, 'A5', 'Simpang Lima Gumul', '0.2295343', '2024-07-19 11:53:35', '2024-07-19 11:53:35'),
(4, 'A9', 'Candi Tegowangi', '0.2280193', '2024-07-19 11:53:35', '2024-07-19 11:53:35'),
(5, 'A1', 'Museum Airlangga', '0.1673713', '2024-07-20 16:54:15', '2024-07-20 16:54:15'),
(6, 'A2', 'Goa Selomangleng', '0.1673889', '2024-07-20 16:54:15', '2024-07-20 16:54:15'),
(7, 'A3', 'Sumber Cakarwesi', '0.1663189', '2024-07-20 16:54:15', '2024-07-20 16:54:15'),
(8, 'A4', 'Sumber Jiput', '0.1665827', '2024-07-20 16:54:15', '2024-07-20 16:54:15'),
(9, 'A5', 'Sumber Banteng', '0.1657481', '2024-07-20 16:54:15', '2024-07-20 16:54:15'),
(10, 'A6', 'Tirtayasa Park Kediri', '0.1665900', '2024-07-20 16:54:15', '2024-07-20 16:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('N3mPlLeZtszlAruG0k4rIxxHqvUd2zD51YVACGQ8', 2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWmpuUTRCNUZkSVVNcUpyTzJja3Y5V2NuY01Ha3VwZGdJeEh6blFTOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93ZWlnaHQiO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjIyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1721579416);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-05-03 01:05:17', '$2y$12$2qy/dx08aIqxhYqmm5Z3MOJYq1K3ZPv1YnYYdAcUyaRVsQ34by9PS', NULL, 'wxl8JPWEqi', '2024-05-03 01:05:17', '2024-05-03 01:05:17'),
(2, 'aslikh', 'aslikh@gmail.com', NULL, '$2y$12$7IMRvEHqu6c1QuI1cTXdL.xi8VVht3iqQN8ad01WmkAtP022VMRwi', 'administrator', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id_weight` bigint(20) UNSIGNED NOT NULL,
  `id_criteria` int(11) NOT NULL,
  `nama_bobot` text NOT NULL,
  `bobot` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id_weight`, `id_criteria`, `nama_bobot`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sangat Strategis', '5', '2024-05-05 12:50:55', '2024-07-21 08:43:27'),
(2, 1, 'Strategis', '4', '2024-05-05 12:50:55', NULL),
(3, 1, 'Cukup Strategis', '3', '2024-05-05 12:50:55', NULL),
(4, 1, 'Kurang Strategis', '2', '2024-05-05 12:50:55', NULL),
(5, 1, 'Tidak Strategis', '1', '2024-05-05 12:50:55', NULL),
(6, 2, 'Sangat Dekat', '5', '2024-05-05 12:50:55', NULL),
(7, 2, 'Dekat', '4', '2024-05-05 12:50:55', NULL),
(8, 2, 'Sedang', '3', '2024-05-05 12:50:55', NULL),
(9, 2, 'Jauh', '2', '2024-05-05 12:50:55', NULL),
(10, 2, 'Sangat Jauh', '1', '2024-05-05 12:50:55', NULL),
(11, 3, 'Sangat Mahal', '5', '2024-05-05 12:50:55', NULL),
(12, 3, 'Mahal', '4', '2024-05-05 12:50:55', NULL),
(13, 3, 'Sedang', '3', '2024-05-05 12:50:55', NULL),
(14, 3, 'Murah', '2', '2024-05-05 12:50:55', NULL),
(15, 3, 'Free', '1', '2024-05-05 12:50:55', NULL),
(16, 4, '5 Fasilitas: Tempat parkir; Wahana bermain anak; Toilet;\r\n            Tempat Ibadah, Kantin', '5', '2024-05-05 12:50:55', NULL),
(17, 4, '4 Fasilitas: Tempat parkir; Kantin; Toilet; Tempat Ibadah', '4', '2024-05-05 12:50:55', NULL),
(18, 4, '3 Fasilitas: Tempat parkir; Tempat Istirahat; Toilet', '3', '2024-05-05 12:50:55', NULL),
(19, 4, '2 Fasilitas: Tempat parkir; Toilet', '2', '2024-05-05 12:50:55', NULL),
(20, 4, '1 Fasilitas: Tempat parkir', '1', '2024-05-05 12:50:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id_alternative`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id_criteria`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id_weight`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id_alternative` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id_criteria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id_weight` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
