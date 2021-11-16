-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 10:46 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esurat-fti`
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
-- Table structure for table `jenis_surats`
--

CREATE TABLE `jenis_surats` (
  `id_jenis_surat` int(10) UNSIGNED NOT NULL,
  `name_jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis_surats` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_surats`
--

INSERT INTO `jenis_surats` (`id_jenis_surat`, `name_jenis_surat`, `kode_jenis_surats`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'surat personalia & SK', 'A', '2021-11-17 17:00:00', NULL, NULL),
(2, 'surat kegiatan mahasiswa', 'B', '2021-11-15 17:00:00', NULL, NULL),
(3, 'surat undangan', 'C', '2021-11-15 17:00:00', NULL, NULL),
(4, 'surat tugas', 'D', '2021-11-15 17:00:00', NULL, NULL),
(5, 'Berita Acara Kegiatan', 'E', '2021-11-15 17:00:00', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_15_223117_create_jenis_surats_table', 2),
(6, '2021_11_15_223118_create_surats_table', 3),
(7, '2021_11_15_231246_create_jenis_surats_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_jenis_surats` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `nama_mitra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_surat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penutup_surat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_surat` enum('masuk','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('diterima','ditolak','diproses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surats`
--

INSERT INTO `surats` (`id`, `id_user`, `id_jenis_surats`, `nama_jenis_surat`, `prihal`, `tgl_pelaksanaan`, `nama_mitra`, `lokasi`, `keterangan`, `isi_surat`, `penutup_surat`, `tipe_surat`, `status`, `pesan_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 1, 'D', 'Surat Tugas', 'Studi Banding', '2021-11-13', 'asa', 'asas', 'asas', NULL, NULL, 'keluar', 'diproses', NULL, '2021-11-15 20:13:53', '2021-11-15 20:13:53', NULL),
(23, 1, 'D', 'Surat Tugas', 'Kegiatan Masyarakat', '2021-11-19', 'Amigo Group', 'JL. Ahmad Yani', 'Ini membuatuhkan', NULL, NULL, 'keluar', 'diproses', NULL, '2021-11-16 00:43:28', '2021-11-16 00:43:28', NULL),
(25, 1, 'D', 'Surat Tugas', 'Kunjungan Penelitian', '2021-11-20', 'PT.Adijaya', 'JL. Tamrin City, Jakarta Pusat', 'Belajar', NULL, NULL, 'keluar', 'diproses', NULL, '2021-11-16 01:55:18', '2021-11-16 01:55:18', NULL),
(26, 1, 'B', 'Surat kegiatan Mahasiswa', 'Baru mencoba', '2021-11-12', 'Amikom', 'JL. Ahmad Yani', '1234567', NULL, NULL, 'keluar', 'diproses', NULL, '2021-11-16 02:04:33', '2021-11-16 02:04:33', NULL),
(27, 2, 'B', 'Baru', 'Baru mencoba', '2021-11-12', 'Amikom', 'JL. Ahmad Yani', '1234567', NULL, NULL, 'keluar', 'diproses', NULL, '2021-11-16 02:04:33', '2021-11-16 02:04:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user`, `name`, `no_tlp`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '72190343', 'reggy charles', '082132937910', 3, 'mahasiswa@si.ukdw.ac.id', NULL, '$2y$10$K9Yn6OPoEZtKbIPbGiUC6.RAGbAazOgYo3gyMM0Fxxx57clNvzy2a', NULL, '2021-11-12 20:31:22', '2021-11-12 20:31:22'),
(2, '123456789', 'dosen', '081238791012', 2, 'dosen@dosen.ukdw.ac.id', NULL, '$2y$10$TIBZq2JxRI8iZGEx4ncEoOtk0Tt5HQV/NweOJ4VexQoxqaoN0Dliq', NULL, '2021-11-12 20:34:22', '2021-11-12 20:34:22'),
(3, '876626924264', 'admin', '087652467891', 1, 'admin@staff.ukdw.ac.id', NULL, '$2y$10$C6UWV61EaykxMvH6y3bL/uYVz.0LDRQ/YA3TAJhHaKuSPChB8bFPK', NULL, '2021-11-12 20:35:11', '2021-11-12 20:35:11');

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
-- Indexes for table `jenis_surats`
--
ALTER TABLE `jenis_surats`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_surats`
--
ALTER TABLE `jenis_surats`
  MODIFY `id_jenis_surat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surats`
--
ALTER TABLE `surats`
  ADD CONSTRAINT `surats_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
