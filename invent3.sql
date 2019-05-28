-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 06:01 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invent3`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` enum('Baik','Tidak Baik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_id` int(10) UNSIGNED NOT NULL,
  `ruang_id` int(10) UNSIGNED NOT NULL,
  `petugas_id` int(10) UNSIGNED NOT NULL,
  `kd_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `barang`, `kondisi`, `keterangan`, `jumlah`, `jenis_id`, `ruang_id`, `petugas_id`, `kd_barang`, `created_at`, `updated_at`) VALUES
(1, 'Printer Epson', 'Baik', 'printer', 5, 1, 1, 1, 'BR-1', '2019-04-02 21:23:53', '2019-04-02 21:23:53'),
(3, 'Sapu', 'Baik', 'sapu', 45, 3, 3, 1, 'BR-2', '2019-04-02 21:27:19', '2019-04-02 21:27:19'),
(4, 'Laptop', 'Baik', 'laptop', 22, 1, 1, 1, 'BR-3', '2019-04-03 21:10:09', '2019-04-05 03:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('Oke','Belum','Tolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `barang_id`, `pegawai_id`, `tujuan`, `jumlah`, `tgl_pinjam`, `tgl_kembali`, `status`, `created_at`, `updated_at`) VALUES
(11, 3, 3, 'lkjkl', 5, '2019-04-05', '2019-04-06', 'Oke', '2019-04-05 09:42:49', '2019-04-06 04:33:34'),
(12, 4, 9, 'asdf', 2, '2019-04-06', '2019-04-10', 'Oke', '2019-04-06 04:36:53', '2019-04-11 19:06:08'),
(13, 3, 9, 'asdf', 5, '2019-04-06', '2019-04-10', 'Oke', '2019-04-06 04:37:22', '2019-04-11 19:08:49'),
(14, 3, 1, 'asdf', 3, '2019-04-06', '2019-04-13', 'Oke', '2019-04-06 06:52:08', '2019-04-26 21:03:12'),
(16, 4, 1, 'UTS', 10, '2019-04-12', '2019-04-16', 'Belum', '2019-04-11 19:12:18', '2019-04-11 19:12:18'),
(17, 3, 1, 'jumsih', 5, '2019-04-27', '2019-04-30', 'Belum', '2019-04-26 21:09:31', '2019-04-26 21:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `kd_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', 'JN-1', 'elektronik', '2019-04-02 19:00:13', '2019-04-02 22:29:58'),
(3, 'Kebersihan', 'JN-2', 'kebersihan', '2019-04-02 21:25:03', '2019-04-02 22:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `barang_id`, `pegawai_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 2, '2019-04-03 11:31:55', '2019-04-03 11:31:55'),
(17, 3, 3, 3, '2019-04-03 19:53:47', '2019-04-03 19:53:47'),
(19, 1, 3, 3, '2019-04-03 20:32:25', '2019-04-03 20:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_03_012705_jenis', 2),
(4, '2019_04_03_023016_ruang', 3),
(5, '2019_04_03_031331_pegawai', 4),
(6, '2019_04_03_033216_barang', 5),
(7, '2019_04_03_092408_keranjang', 6),
(9, '2019_04_04_034539_booking', 7),
(12, '2019_04_04_195000_peminjaman', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `name`, `nip`, `alamat`, `username`, `password`) VALUES
(1, 'Raflyansyah Adi Pratama', '11706309', 'Bogor', 'rafly', 'rafly123'),
(2, 'Rizky Ramon', '11706342', 'Bogor', 'rizky', 'rizky123'),
(3, 'Dandung Janitra Nugroho', '11706004', 'Bogor', 'dandung', 'dandung123'),
(4, 'Shankara Argatira Bima', '11706365', 'Bogor', 'shankara', 'shankara123'),
(5, 'Joshua Natanael Wijaya', '11706098', 'Bogor', 'joshua', 'joshua123'),
(6, 'Akbar Kartiko', '11705948', 'Bogor', 'akbar', 'akbar123'),
(7, 'Ahmad Maulana Yusuf', '11705945', 'Bogor', 'ahmad', 'ahmad123'),
(8, 'Syahdan Al Fikri', '11706403', 'Bogor', 'syahdan', 'syahdan123'),
(9, 'Rizal Awaludin', '11706340', 'Bogor', 'rizal', 'rizal123');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
UPDATE barang
set jumlah=barang.jumlah-new.jumlah
WHERE barang.id=new.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam_delete` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
update barang 
set jumlah=barang.jumlah+OLD.jumlah
WHERE barang.id=OLD.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_barang`
-- (See below for the actual view)
--
CREATE TABLE `q_barang` (
`id` int(10) unsigned
,`barang` varchar(191)
,`kondisi` enum('Baik','Tidak Baik')
,`keterangan` varchar(191)
,`jumlah` int(11)
,`jenis_id` int(10) unsigned
,`ruang_id` int(10) unsigned
,`petugas_id` int(10) unsigned
,`kd_barang` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
,`jenis` varchar(191)
,`ruang` varchar(191)
,`name` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_booking`
-- (See below for the actual view)
--
CREATE TABLE `q_booking` (
`id` int(10) unsigned
,`barang_id` int(10) unsigned
,`pegawai_id` int(10) unsigned
,`tujuan` varchar(191)
,`jumlah` int(11)
,`tgl_pinjam` date
,`tgl_kembali` date
,`status` enum('Oke','Belum','Tolak')
,`created_at` timestamp
,`updated_at` timestamp
,`barang` varchar(191)
,`name` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_keranjang`
-- (See below for the actual view)
--
CREATE TABLE `q_keranjang` (
`id` int(10) unsigned
,`barang_id` int(10) unsigned
,`pegawai_id` int(10) unsigned
,`jumlah` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`barang` varchar(191)
,`name` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_peminjaman`
-- (See below for the actual view)
--
CREATE TABLE `q_peminjaman` (
`id` int(10) unsigned
,`barang_id` int(10) unsigned
,`pegawai_id` int(10) unsigned
,`jumlah` int(11)
,`tujuan` varchar(191)
,`tgl_kembali` date
,`created_at` timestamp
,`updated_at` timestamp
,`barang` varchar(191)
,`name` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `ruang`, `kd_ruang`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Lab', 'RNG-1', 'laboratorium test', '2019-04-02 20:08:28', '2019-04-02 20:09:18'),
(3, 'Gudang', 'RNG-2', 'gudang', '2019-04-02 21:25:26', '2019-04-02 21:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rifky', 'rifkywikrama.s@gmail.com', 'rifky', '$2y$10$KC2CtkdNcnHTJ6eu4LkF7uTlJqkSGgSnkTUoLBGImRGPpiZiu2fHO', 'Administrator', 'ZUz8FlOlHuvim0ekYO4ShN7NtxjsIZqKfQjkTON8UhnGh7mUBJKJSpQJkhsl', '2019-04-02 18:10:44', '2019-04-11 19:17:23'),
(3, 'Sumeji', 'sumeji@gmail.com', 'sumeji', '$2y$10$SZ0wZlPOpShxgaCY/1rGe.zQn95/0O3zG6kV62KuROZIMr0CwGAaq', 'Petugas', 'DtNiR4Q1urwrfm81Als4UlUyDaqGN4dGuk25YdTJK8rbtYHLp3IYdQ2VquGn', '2019-04-02 23:40:51', '2019-04-02 23:40:51');

-- --------------------------------------------------------

--
-- Structure for view `q_barang`
--
DROP TABLE IF EXISTS `q_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_barang`  AS  select `barang`.`id` AS `id`,`barang`.`barang` AS `barang`,`barang`.`kondisi` AS `kondisi`,`barang`.`keterangan` AS `keterangan`,`barang`.`jumlah` AS `jumlah`,`barang`.`jenis_id` AS `jenis_id`,`barang`.`ruang_id` AS `ruang_id`,`barang`.`petugas_id` AS `petugas_id`,`barang`.`kd_barang` AS `kd_barang`,`barang`.`created_at` AS `created_at`,`barang`.`updated_at` AS `updated_at`,`jenis`.`jenis` AS `jenis`,`ruang`.`ruang` AS `ruang`,`users`.`name` AS `name` from (((`barang` join `jenis` on((`barang`.`jenis_id` = `jenis`.`id`))) join `ruang` on((`barang`.`ruang_id` = `ruang`.`id`))) join `users` on((`barang`.`petugas_id` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `q_booking`
--
DROP TABLE IF EXISTS `q_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_booking`  AS  select `booking`.`id` AS `id`,`booking`.`barang_id` AS `barang_id`,`booking`.`pegawai_id` AS `pegawai_id`,`booking`.`tujuan` AS `tujuan`,`booking`.`jumlah` AS `jumlah`,`booking`.`tgl_pinjam` AS `tgl_pinjam`,`booking`.`tgl_kembali` AS `tgl_kembali`,`booking`.`status` AS `status`,`booking`.`created_at` AS `created_at`,`booking`.`updated_at` AS `updated_at`,`barang`.`barang` AS `barang`,`pegawai`.`name` AS `name` from ((`booking` join `barang` on((`booking`.`barang_id` = `barang`.`id`))) join `pegawai` on((`booking`.`pegawai_id` = `pegawai`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `q_keranjang`
--
DROP TABLE IF EXISTS `q_keranjang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_keranjang`  AS  select `keranjang`.`id` AS `id`,`keranjang`.`barang_id` AS `barang_id`,`keranjang`.`pegawai_id` AS `pegawai_id`,`keranjang`.`jumlah` AS `jumlah`,`keranjang`.`created_at` AS `created_at`,`keranjang`.`updated_at` AS `updated_at`,`barang`.`barang` AS `barang`,`pegawai`.`name` AS `name` from ((`keranjang` join `barang` on((`keranjang`.`barang_id` = `barang`.`id`))) join `pegawai` on((`keranjang`.`pegawai_id` = `pegawai`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `q_peminjaman`
--
DROP TABLE IF EXISTS `q_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_peminjaman`  AS  select `peminjaman`.`id` AS `id`,`peminjaman`.`barang_id` AS `barang_id`,`peminjaman`.`pegawai_id` AS `pegawai_id`,`peminjaman`.`jumlah` AS `jumlah`,`peminjaman`.`tujuan` AS `tujuan`,`peminjaman`.`tgl_kembali` AS `tgl_kembali`,`peminjaman`.`created_at` AS `created_at`,`peminjaman`.`updated_at` AS `updated_at`,`barang`.`barang` AS `barang`,`pegawai`.`name` AS `name` from ((`peminjaman` join `barang` on((`peminjaman`.`barang_id` = `barang`.`id`))) join `pegawai` on((`peminjaman`.`pegawai_id` = `pegawai`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_jenis_id_foreign` (`jenis_id`),
  ADD KEY `barang_ruang_id_foreign` (`ruang_id`),
  ADD KEY `barang_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_barang_id_foreign` (`barang_id`),
  ADD KEY `booking_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_barang_id_foreign` (`barang_id`),
  ADD KEY `keranjang_pegawai_id_foreign` (`pegawai_id`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_nip_unique` (`nip`),
  ADD UNIQUE KEY `pegawai_username_unique` (`username`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_barang_id_foreign` (`barang_id`),
  ADD KEY `peminjaman_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
