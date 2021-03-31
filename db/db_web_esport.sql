-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2021 pada 21.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_esport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `created_at`, `updated_at`, `title`, `content`, `gambar`) VALUES
(1, '2021-03-07 18:11:15', '2021-03-07 18:11:15', 'ccc', 'adfsfsf', '1615140675_595.JPG'),
(2, '2021-03-28 20:37:15', '2021-03-28 20:37:15', 'ffdg', 'gdgdfgfd', '1616963835_883.png'),
(3, '2021-03-28 20:39:40', '2021-03-28 20:39:40', 'ffdg', 'hghj', '1616963980_424.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2021_03_03_133117_create_table_berita', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `nick_name` varchar(50) NOT NULL,
  `id_game` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `id_tim` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_anggota`
--

INSERT INTO `t_anggota` (`id_anggota`, `nama_peserta`, `nick_name`, `id_game`, `keterangan`, `foto`, `no_hp`, `id_tim`, `created_at`, `updated_at`) VALUES
(1, 'Enma', 'ENMA', 'ENMA', 'Ketua', 'Ena.JPG', '087654321121', 1, '2021-02-16 15:13:33', '2021-02-16 15:13:33'),
(2, 'Norman', 'NORMAN', 'NORMAN', 'Angota', 'Norman.JPG', '', 1, '2021-02-16 15:13:33', '2021-02-16 15:13:33'),
(3, 'Rey', 'REY', 'REY', 'Anggota', 'Rey.JPG', '087654321121', 1, '2021-02-16 15:14:04', '2021-02-16 15:14:04'),
(4, 'Senku', 'SENKU', 'SENKU', 'Ketua', 'Senku.JPG', '085676432223', 2, '2021-02-16 15:14:04', '2021-02-16 15:14:04'),
(5, 'Chrome', 'CHROME', 'CHROME', 'Anggota', 'Chrome.JPG', '087890987665', 2, '2021-02-16 15:16:28', '2021-02-16 15:16:28'),
(6, 'Kohaku', 'KOHAKU', 'KOHAKU', 'Angota', 'Kohaku.JPG', '085432232454', 2, '2021-02-16 15:16:28', '2021-02-16 15:16:28'),
(27, 'dazai', 'dazaii', 'dazai123', '-', '1617138062_304.jpg', '', 20, '2021-03-30 21:01:02', '2021-03-30 21:01:02'),
(28, 'deku', 'dekuu', 'deku_q', '-', '-', '', 20, '2021-03-30 21:01:02', '2021-03-30 21:01:02'),
(29, 'kachan', 'kachann', 'kachan123', '-', '1617138062_448.jpg', '', 20, '2021-03-30 21:01:02', '2021-03-30 21:01:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `no_invoice` varchar(15) NOT NULL,
  `bank_asal` varchar(100) NOT NULL,
  `atas_nama_asal` varchar(100) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `nominal` int(10) NOT NULL,
  `bank_tujuan` varchar(100) DEFAULT NULL,
  `atas_nama_tujuan` varchar(100) DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `status_pembayaran` varchar(35) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`id_pembayaran`, `no_invoice`, `bank_asal`, `atas_nama_asal`, `bukti_bayar`, `nominal`, `bank_tujuan`, `atas_nama_tujuan`, `tgl_bayar`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(4, 'INVC-2021031020', 'BCA', 'pinkyy', 'INVC-2021031020.png', 50000, NULL, NULL, '2021-03-31', 'Sudah Dikonfirmasi', '2021-03-31 18:03:05', '2021-03-31 18:03:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pendaftaran`
--

CREATE TABLE `t_pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL,
  `id_turnamen` int(10) NOT NULL,
  `id_tim` int(10) NOT NULL,
  `no_invoice` varchar(15) NOT NULL,
  `biaya_pendaftaran` int(15) NOT NULL,
  `status_pendaftaran` varchar(35) NOT NULL DEFAULT 'on process',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pendaftaran`
--

INSERT INTO `t_pendaftaran` (`id_pendaftaran`, `id_turnamen`, `id_tim`, `no_invoice`, `biaya_pendaftaran`, `status_pendaftaran`, `created_at`, `updated_at`) VALUES
(5, 10, 20, 'INVC-2021031020', 50000, 'Berhasil', '2021-03-30 21:01:02', '2021-03-30 21:01:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pertandingan`
--

CREATE TABLE `t_pertandingan` (
  `id_pertandingan` int(10) NOT NULL,
  `id_tim` int(10) NOT NULL,
  `lawan` varchar(100) NOT NULL,
  `skor` int(10) NOT NULL DEFAULT 0,
  `total_skor` int(10) NOT NULL DEFAULT 0,
  `status` varchar(50) DEFAULT NULL,
  `waktu_pertandingan` datetime NOT NULL,
  `grup` varchar(10) NOT NULL,
  `created_bt` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tim`
--

CREATE TABLE `t_tim` (
  `id_tim` int(10) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `logo_tim` text NOT NULL,
  `jml_anggota` int(1) NOT NULL,
  `verifikasi_status` int(1) DEFAULT NULL,
  `verifikasi_by` varchar(50) DEFAULT NULL,
  `verifikasi_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_tim`
--

INSERT INTO `t_tim` (`id_tim`, `nama_tim`, `logo_tim`, `jml_anggota`, `verifikasi_status`, `verifikasi_by`, `verifikasi_at`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'REA TIM', 'LOGO REA.JPG', 3, 1, 'operator', '2021-02-16 15:10:58', 3, '2021-02-16 15:10:58', '2021-02-16 15:10:58'),
(2, 'REO TIM', 'REO TIM.JPG', 3, 1, 'operator', '2021-02-16 15:10:58', 4, '2021-02-16 15:10:58', '2021-02-16 15:10:58'),
(20, 'Butterfly', '1617138062_500.jpg', 3, NULL, NULL, '2021-03-30 21:01:02', 61, '2021-03-30 21:01:02', '2021-03-30 21:01:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_turnamen`
--

CREATE TABLE `t_turnamen` (
  `id_turnamen` int(10) NOT NULL,
  `nama_turnamen` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `maksimum_slot` int(3) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `file_gambar` text NOT NULL,
  `hadiah` text NOT NULL,
  `tempat` text NOT NULL,
  `waktu` datetime NOT NULL,
  `peraturan` text NOT NULL,
  `biaya_turnamen` int(10) NOT NULL,
  `berkas` text DEFAULT NULL,
  `sistem_turnamen` varchar(50) NOT NULL,
  `turnamen_status` varchar(10) NOT NULL DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_turnamen`
--

INSERT INTO `t_turnamen` (`id_turnamen`, `nama_turnamen`, `deskripsi`, `kategori`, `maksimum_slot`, `penyelenggara`, `file_gambar`, `hadiah`, `tempat`, `waktu`, `peraturan`, `biaya_turnamen`, `berkas`, `sistem_turnamen`, `turnamen_status`, `created_at`, `updated_at`) VALUES
(1, 'JAVA ESPORT TOURNAMENT', 'turnamen ini .................................................................', 'SMP', 16, 'Mobile Legend Indonesia', 'poster1.JPG', 'Juara 1 : 15.0000.0000,-Juara 2 :  7,500.000,-', 'Graha Surabaya', '1970-01-01 07:00:00', 'Berikut Peraturan Lomba : ...\r\n............\r\n........\r\n.........\r\n.....', 50000, 'berkas1.JPG', 'Sistem Turnament', 'Close', '2021-02-16 15:19:13', '2021-03-29 02:35:14'),
(9, 'turnamen musim semi', 'oke', 'UMUM', 12, 'eet', 'dsgds_1616965540_211.jpg', '2424', 'efsdsf', '1970-01-01 07:00:00', 'egdg', 232, NULL, '3', 'Open', '2021-03-28 21:05:40', '2021-03-29 01:29:02'),
(10, 'Loop Turnamen', 'Khusu SMA', 'SMA', 12, 'Telkomsel', '1616985439_124.jpg', '5000000', 'Loop Station', '2021-03-01 07:01:00', 'sssfh', 50000, NULL, '2', 'Open', '2021-03-29 02:37:20', '2021-03-29 02:44:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `level_user` int(11) NOT NULL,
  `verifikasi_status` int(1) DEFAULT 1,
  `verifikasi_date` timestamp NULL DEFAULT NULL,
  `profil_check` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `email`, `level_user`, `verifikasi_status`, `verifikasi_date`, `profil_check`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$VrWjzhHFgxe4RTBZtJCqc.imJkwPMW2uat.hqWPlfswUEzdmFp7Nm', 'admin@gmail.com', 1, 1, NULL, 0, '2021-02-16 15:06:29', '2021-02-16 15:06:29'),
(2, 'operator', '$2y$10$VrWjzhHFgxe4RTBZtJCqc.imJkwPMW2uat.hqWPlfswUEzdmFp7Nm', 'operator@gmail.com', 2, 1, NULL, 0, '2021-02-16 15:06:29', '2021-02-16 15:06:29'),
(3, 'reatim', 'reatim', 'reatim@gmail.com', 3, 1, '2021-02-16 15:06:40', 0, '2021-02-16 15:07:42', '2021-02-16 15:07:42'),
(4, 'reotim', 'reotim', 'reotim@gmail.com', 3, 1, '2021-02-16 15:06:40', 0, '2021-02-16 15:07:42', '2021-02-16 15:07:42'),
(61, 'pinkykyubby@gmail.com', '$2y$10$2SDm3YxEWWdAtRq2I2qiRO6X1T0g5l08BskteXwyA4iXcZBL/mH6m', 'pinkykyubby@gmail.com', 3, 1, NULL, 0, '2021-03-30 21:01:02', '2021-03-30 21:01:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_tim_2` (`id_tim`);

--
-- Indeks untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `no_invoice` (`no_invoice`);

--
-- Indeks untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `no_invoice` (`no_invoice`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_turnamen` (`id_turnamen`),
  ADD KEY `id_turnamen_2` (`id_turnamen`);

--
-- Indeks untuk tabel `t_pertandingan`
--
ALTER TABLE `t_pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `id_tim` (`id_tim`);

--
-- Indeks untuk tabel `t_tim`
--
ALTER TABLE `t_tim`
  ADD PRIMARY KEY (`id_tim`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `t_turnamen`
--
ALTER TABLE `t_turnamen`
  ADD PRIMARY KEY (`id_turnamen`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_pertandingan`
--
ALTER TABLE `t_pertandingan`
  MODIFY `id_pertandingan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_tim`
--
ALTER TABLE `t_tim`
  MODIFY `id_tim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `t_turnamen`
--
ALTER TABLE `t_turnamen`
  MODIFY `id_turnamen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD CONSTRAINT `t_anggota_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `t_tim` (`id_tim`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
  ADD CONSTRAINT `t_pendaftaran_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `t_tim` (`id_tim`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_pendaftaran_ibfk_2` FOREIGN KEY (`id_turnamen`) REFERENCES `t_turnamen` (`id_turnamen`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pertandingan`
--
ALTER TABLE `t_pertandingan`
  ADD CONSTRAINT `t_pertandingan_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `t_tim` (`id_tim`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_tim`
--
ALTER TABLE `t_tim`
  ADD CONSTRAINT `t_tim_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
