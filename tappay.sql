-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2021 at 04:58 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tappay`
--

-- --------------------------------------------------------

--
-- Table structure for table `berlangganan`
--

CREATE TABLE `berlangganan` (
  `id` int UNSIGNED NOT NULL,
  `id_mitra` int UNSIGNED NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `id_paket` int NOT NULL,
  `kode_undangan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berlangganan`
--

INSERT INTO `berlangganan` (`id`, `id_mitra`, `id_pelanggan`, `id_paket`, `kode_undangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'USR00001', 'Aktif', '2021-04-15 11:19:20', '2021-04-15 11:20:56'),
(2, 1, 1, 2, 'USR00002', 'Aktif', '2021-04-15 11:19:54', '2021-04-15 11:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_25_060957_create_mitra', 1),
(10, '2021_03_25_061236_create_pelanggan', 1),
(11, '2021_03_25_141105_create_paket', 1),
(12, '2021_03_25_141345_create_tagihan_pelanggan', 1),
(13, '2021_03_25_142911_create_pembayaran', 1),
(14, '2021_03_29_141057_create_berlangganan', 1),
(15, '2021_03_29_141449_create_notifikasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int UNSIGNED NOT NULL,
  `id_akun` int UNSIGNED NOT NULL,
  `nama_usaha` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Banned','Suspend') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `id_akun`, `nama_usaha`, `alamat`, `telepon`, `info`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'TV Kabel OKE', 'Jl. YOS Sudarso', '08983368286', 'Nomor Rekening', 'Aktif', '2021-03-30 18:20:04', '2021-03-30 18:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int NOT NULL,
  `pengirim` int UNSIGNED NOT NULL,
  `penerima` int UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('029e8cdf31ab2965edbf01d47f6bf714eb33412a9ffdda55e0cb1e74e82f6e313a4bc348eaf3ec42', 1, 1, 'nApp', '[]', 0, '2021-03-30 17:37:35', '2021-03-30 17:37:35', '2022-03-31 00:37:35'),
('0e09af033de4ca3911d468f12dcf605331a3e802f05e7c9b79b8d6e9f968458634057f6dff30e999', 3, 1, 'nApp', '[]', 0, '2021-04-15 06:47:20', '2021-04-15 06:47:20', '2022-04-15 13:47:20'),
('121dfcedd99d0182032292d62a7c4ec11bf4131ded9551fddd085480862f13c09ce96b0e2dd10ff9', 4, 1, 'nApp', '[]', 0, '2021-04-21 07:54:54', '2021-04-21 07:54:54', '2022-04-21 14:54:54'),
('15f44435361042bcd6e3be106b9b5160acfe3fc71d6196ca4d0ac9e4a187e23fb0fdb95507f50453', 1, 1, 'nApp', '[]', 0, '2021-03-30 17:40:00', '2021-03-30 17:40:00', '2022-03-31 00:40:00'),
('2192d7e141623d0af13cc0b4814887595674b469bdebe33c2740fd861061a1742e28ae42d15eccdb', 3, 1, 'nApp', '[]', 0, '2021-04-21 07:47:49', '2021-04-21 07:47:49', '2022-04-21 14:47:49'),
('319d3fd4f04473073c08e12e3df3461d6f054f602de5b9ede7d43f590418d1cb66c3d0d56b226ce5', 1, 1, 'nApp', '[]', 0, '2021-04-15 06:59:54', '2021-04-15 06:59:54', '2022-04-15 13:59:54'),
('50ca0077a82c13378a408ab687716cbea4a4c3230e65f45c83b24ecc21ede3bd4be701c21597430e', 3, 1, 'nApp', '[]', 0, '2021-04-15 10:02:46', '2021-04-15 10:02:46', '2022-04-15 17:02:46'),
('6fdb18b4e1619e439999ab2db75b9fd0ffa00fd8be9a997d207ba0a50209ee3df8d3e3c30d829117', 3, 1, 'nApp', '[]', 0, '2021-04-14 10:53:54', '2021-04-14 10:53:54', '2022-04-14 17:53:54'),
('7e5fbf6551a79c1f005db08cf4c38e8a7b414e9c23872279a9890cbdd2b8742c59684f0a3c4e3351', 3, 1, 'nApp', '[]', 0, '2021-04-28 11:01:17', '2021-04-28 11:01:17', '2022-04-28 18:01:17'),
('b2fbde76b0b319583fea2b5181932ea8f6cecd06ef4cf7b8dede3f505a06d61539ea1b64086ef5b0', 3, 1, 'nApp', '[]', 0, '2021-04-15 11:26:48', '2021-04-15 11:26:48', '2022-04-15 18:26:48'),
('b768a79054d43b986081fb4d2a77cba7101612eef02736214629fe46a609307035b7b8f76fcd7648', 4, 1, 'nApp', '[]', 0, '2021-04-15 11:20:44', '2021-04-15 11:20:44', '2022-04-15 18:20:44'),
('cdfc7132bb7e9e7716c8c004ae3699766a06624b8b7cab0203c8e9bea7fdfeb849bce1631d7f33c0', 3, 1, 'nApp', '[]', 0, '2021-04-21 07:41:49', '2021-04-21 07:41:49', '2022-04-21 14:41:49'),
('d349ed7d4aad4d9c14b4383cbae9ec23492484272f40174b9b0994b6196dbcab2d5b98d15dbf93bf', 4, 1, 'nApp', '[]', 0, '2021-04-21 07:54:25', '2021-04-21 07:54:25', '2022-04-21 14:54:25'),
('ea883c9d2ec39b5b1fe9ac6a18f724d235dc7c91bcb50d886b43a642020f4ff362bd3b627924223c', 3, 1, 'nApp', '[]', 0, '2021-04-21 07:48:27', '2021-04-21 07:48:27', '2022-04-21 14:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'RzUgYHjkDfxargDcEAdPsRDMlAWBp0zQgyjI3eZj', NULL, 'http://localhost', 1, 0, 0, '2021-03-30 17:37:14', '2021-03-30 17:37:14'),
(2, NULL, 'Laravel Password Grant Client', 'C7mwTk0qOZt4Pcunwz3RiYWMRlxhKF6F1VXrS2om', 'users', 'http://localhost', 0, 1, 0, '2021-03-30 17:37:14', '2021-03-30 17:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-30 17:37:14', '2021-03-30 17:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int UNSIGNED NOT NULL,
  `id_mitra` int UNSIGNED NOT NULL,
  `nama_paket` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_paket` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int NOT NULL,
  `status` enum('Aktif','Banned') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `id_mitra`, `nama_paket`, `kode_paket`, `tarif`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Paket 2', 'PKT002', 10000, 'Aktif', '2021-04-15 11:07:22', '2021-04-15 11:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int UNSIGNED NOT NULL,
  `id_akun` int UNSIGNED NOT NULL,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Banned','Suspend') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_akun`, `nama`, `alamat`, `telepon`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'I Wayan Guedhe', 'Jl. YOS Sudarso', '08983368289', 'Aktif', '2021-03-30 18:26:06', '2021-03-30 18:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int UNSIGNED NOT NULL,
  `id_tagihan` int UNSIGNED NOT NULL,
  `jumlah_tagihan` int NOT NULL,
  `bukti_pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` enum('Pending','Ditolak','Diterima') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int UNSIGNED NOT NULL,
  `collector` int UNSIGNED NOT NULL,
  `payer` int UNSIGNED NOT NULL,
  `jumlah_tagihan` int NOT NULL,
  `tagihan_bulan` date NOT NULL,
  `status_tagihan` enum('Masuk','Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `collector`, `payer`, `jumlah_tagihan`, `tagihan_bulan`, `status_tagihan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10000, '2021-04-15', 'Masuk', '2021-04-15 11:34:58', '2021-04-15 11:34:58'),
(2, 1, 1, 10000, '2021-05-15', 'Masuk', '2021-04-15 11:34:58', '2021-04-15 11:34:58'),
(3, 1, 1, 10000, '2021-06-15', 'Masuk', '2021-04-15 11:34:58', '2021-04-15 11:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Mitra','Pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Banned') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `status`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@tappay.id', 'Admin', 'Aktif', '$2y$10$ZGchfsHHliXvkGzI1MApyuVwk.hN5WlLWZVZbJ11eX5Riax4e0TL6', '2021-03-30 17:16:53', '2021-03-30 17:16:53'),
(3, 'mitra@tappay.id', 'Mitra', 'Aktif', '$2y$10$J58gfo6DnV74Nu3Oe3RrVONRrbwpCRxbOllwLbYr0YcM24HDLqx26', '2021-03-30 18:20:03', '2021-03-30 18:20:03'),
(4, 'pelanggan@tappay.id', 'Pelanggan', 'Aktif', '$2y$10$CoFW3AoJHB7GiVqclSufyu/SVGFdqK1gyvosd6aQT.lN1ClPqMKru', '2021-03-30 18:26:06', '2021-03-30 18:26:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berlangganan`
--
ALTER TABLE `berlangganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitra_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_id_mitra_foreign` (`id_mitra`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_id_tagihan_foreign` (`id_tagihan`),
  ADD KEY `pembayaran_created_by_foreign` (`created_by`),
  ADD KEY `pembayaran_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihan_collector_foreign` (`collector`),
  ADD KEY `tagihan_payer_foreign` (`payer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berlangganan`
--
ALTER TABLE `berlangganan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `users` (`id`);

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_id_mitra_foreign` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `users` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pembayaran_id_tagihan_foreign` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id`),
  ADD CONSTRAINT `pembayaran_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_collector_foreign` FOREIGN KEY (`collector`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tagihan_payer_foreign` FOREIGN KEY (`payer`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
