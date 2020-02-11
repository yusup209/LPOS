-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 08:53 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp_posss`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_bahans`
--

CREATE TABLE `master_bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tipe_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_kategoris`
--

CREATE TABLE `master_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_kategoris`
--

INSERT INTO `master_kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(2, 'Minuman', '2020-02-09 23:08:26', '2020-02-09 23:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `master_kurs`
--

CREATE TABLE `master_kurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kurs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_kurs`
--

INSERT INTO `master_kurs` (`id`, `kurs`, `created_at`, `updated_at`) VALUES
(1, 'IDR', '2020-02-09 22:57:35', '2020-02-09 22:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `master_persen_juals`
--

CREATE TABLE `master_persen_juals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `persen_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_persen_juals`
--

INSERT INTO `master_persen_juals` (`id`, `persen_jual`, `created_at`, `updated_at`) VALUES
(1, 10, '2020-02-09 23:19:05', '2020-02-09 23:19:05'),
(2, 5, '2020-02-09 23:19:08', '2020-02-09 23:19:08'),
(3, 15, '2020-02-09 23:19:10', '2020-02-09 23:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `master_ppns`
--

CREATE TABLE `master_ppns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ppn` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_ppns`
--

INSERT INTO `master_ppns` (`id`, `ppn`, `created_at`, `updated_at`) VALUES
(1, 10, '2020-02-09 23:28:42', '2020-02-09 23:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `master_produks`
--

CREATE TABLE `master_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_jual` double(8,2) NOT NULL,
  `harga_beli` double(8,2) NOT NULL,
  `diskon` int(11) NOT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ganti_harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `untung` double(8,2) NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_produks`
--

INSERT INTO `master_produks` (`id`, `nama`, `id_unit`, `id_kurs`, `id_kategori`, `harga_jual`, `harga_beli`, `diskon`, `stok`, `barcode`, `status`, `expired`, `print_label`, `ganti_harga`, `keterangan`, `untung`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Coca cola', 1, 1, 2, 6000.00, 5000.00, 0, '15', '4715731586', 'Tersedia', '2020-11-18', 'Coca cola', NULL, 'Coca cola, koka kola', 1000.00, 'cocacola.jpg', '2020-02-10 00:36:18', '2020-02-10 00:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `master_produk_ins`
--

CREATE TABLE `master_produk_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_koperasi` int(11) NOT NULL,
  `tipe_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_produk_outs`
--

CREATE TABLE `master_produk_outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_koperasi` int(11) NOT NULL,
  `tipe_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `sub_harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_report_kasirs`
--

CREATE TABLE `master_report_kasirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_stoks`
--

CREATE TABLE `master_stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_minimum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_stoks`
--

INSERT INTO `master_stoks` (`id`, `stok_minimum`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-09 23:28:36', '2020-02-09 23:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `master_units`
--

CREATE TABLE `master_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_units`
--

INSERT INTO `master_units` (`id`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Buah', '2020-02-09 23:12:33', '2020-02-09 23:12:33'),
(3, 'Biji', '2020-02-09 23:12:45', '2020-02-09 23:12:45'),
(4, 'Botol', '2020-02-10 00:33:12', '2020-02-10 00:33:12');

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
(3, '2020_02_10_024204_create_master_bahans_table', 1),
(4, '2020_02_10_024210_create_master_kurs_table', 1),
(5, '2020_02_10_024216_create_master_units_table', 1),
(6, '2020_02_10_024223_create_master_ppns_table', 1),
(7, '2020_02_10_024232_create_master_kategoris_table', 1),
(8, '2020_02_10_024239_create_master_persen_juals_table', 1),
(9, '2020_02_10_024257_create_master_stoks_table', 1),
(10, '2020_02_10_024304_create_master_report_kasirs_table', 1),
(11, '2020_02_10_024315_create_master_data_table', 1),
(12, '2020_02_10_024327_create_master_produk_ins_table', 1),
(13, '2020_02_10_024332_create_master_produk_outs_table', 1),
(14, '2020_02_10_024339_create_master_produks_table', 1),
(15, '2020_02_10_024352_create_profils_table', 1),
(16, '2020_02_10_024400_create_transaksi_sementaras_table', 1),
(17, '2020_02_10_024407_create_transaksi_headers_table', 1),
(18, '2020_02_10_024413_create_transaksi_details_table', 1),
(19, '2020_02_10_024423_create_report_bahans_table', 1),
(20, '2020_02_10_024457_create_report_voids_table', 1),
(21, '2020_02_10_025150_create_units_table', 1);

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
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_koperasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_koperasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profils`
--

INSERT INTO `profils` (`id`, `nama_koperasi`, `alamat_koperasi`, `keterangan`, `no_telp`, `foto`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 'Koperasi SMKN 10.', 'Jl. Mayjend Soetoyo', 'koperasi smkn 10 jkt', '0212121231', 'images (4).jpg', 13630, '2020-02-09 23:57:18', '2020-02-09 23:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `report_bahans`
--

CREATE TABLE `report_bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_voids`
--

CREATE TABLE `report_voids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_headers`
--

CREATE TABLE `transaksi_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `tipe_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sementaras`
--

CREATE TABLE `transaksi_sementaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_koperasi` int(11) NOT NULL DEFAULT 1,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `kontak`, `alamat`, `username`, `password`, `id_koperasi`, `foto`, `hak_akses`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '081312312312', 'Jl. SMEA 6', 'superadmin', '$2y$10$G6ynWbatzNlRzwSfUQldh.hjXepqqDEVNC5GsM/Bsp1szA89fXsMC', 1, 'superadmin.png', 'superadmin', NULL, '2020-02-09 20:13:57', '2020-02-09 20:13:57'),
(2, 'Bu Aminah', '08123012312', '', 'aminah', '$2y$10$Cjnv2uBQH3CLhIyfPg4sMuGXoyLMhA6BzgqGQG7FAiTrYqpgFwciO', 1, 'Bu_Aminah.jpg', 'admin_gudang', NULL, '2020-02-09 21:40:24', '2020-02-09 21:40:24'),
(3, 'Agung Mubarok', '08961231992', '', 'agungmubarok', '$2y$10$tvXhz.oY1RjTJEJLJmNklO20IBNfY.fkOp0BUc9yY2n4D5lOQCPOK', 1, 'ade.png', 'kasir', NULL, '2020-02-10 00:01:08', '2020-02-10 00:01:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_bahans`
--
ALTER TABLE `master_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kategoris`
--
ALTER TABLE `master_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kurs`
--
ALTER TABLE `master_kurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_persen_juals`
--
ALTER TABLE `master_persen_juals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_ppns`
--
ALTER TABLE `master_ppns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_produks`
--
ALTER TABLE `master_produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_produk_ins`
--
ALTER TABLE `master_produk_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_produk_outs`
--
ALTER TABLE `master_produk_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_report_kasirs`
--
ALTER TABLE `master_report_kasirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_stoks`
--
ALTER TABLE `master_stoks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_units`
--
ALTER TABLE `master_units`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_bahans`
--
ALTER TABLE `report_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_voids`
--
ALTER TABLE `report_voids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_headers`
--
ALTER TABLE `transaksi_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_sementaras`
--
ALTER TABLE `transaksi_sementaras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_bahans`
--
ALTER TABLE `master_bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_kategoris`
--
ALTER TABLE `master_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_kurs`
--
ALTER TABLE `master_kurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_persen_juals`
--
ALTER TABLE `master_persen_juals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_ppns`
--
ALTER TABLE `master_ppns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_produks`
--
ALTER TABLE `master_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_produk_ins`
--
ALTER TABLE `master_produk_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_produk_outs`
--
ALTER TABLE `master_produk_outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_report_kasirs`
--
ALTER TABLE `master_report_kasirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_stoks`
--
ALTER TABLE `master_stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_units`
--
ALTER TABLE `master_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report_bahans`
--
ALTER TABLE `report_bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_voids`
--
ALTER TABLE `report_voids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_headers`
--
ALTER TABLE `transaksi_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_sementaras`
--
ALTER TABLE `transaksi_sementaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
