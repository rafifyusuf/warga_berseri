-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2021 pada 05.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warga_berseri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id_aspirasi` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_aspirasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_aspirasi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_aspirasi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspirasi_keluhan`
--

CREATE TABLE `aspirasi_keluhan` (
  `id_aspirasi_keluhan` bigint(20) NOT NULL,
  `id_keluhan` bigint(20) NOT NULL,
  `id_aspirasi` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_warga`
--

CREATE TABLE `detail_warga` (
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_warga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Kepala Keluarga','Anggota Keluarga') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` enum('Belum Sekolah','TK','SD','SMP','SMA','Diploma','S1','S2','S3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` enum('Tidak Bekerja','Wiraswasta','Buruh Harian Lepas','Pegawai Negeri','Pegawai Swasta','Guru','Petani','Mahasiswa','Ibu Rumah Tangga') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hubungan_keluarga` enum('Anak','Istri','Suami','Kerabat','Adik','Kaka','Orang Tua') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin','Janda','Duda') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_hunian` enum('KTP lengkong tinggal di Lengkong','KTP luar tinggal di Lengkong','KTP lengkong tinggal di luar') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ktp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_verifikasi` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 = Belum Terverif, 2 = Terverif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_warga`
--

INSERT INTO `detail_warga` (`id_warga`, `id_detail_warga`, `nama_warga`, `nik`, `status`, `no_hp`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `pekerjaan`, `hubungan_keluarga`, `status_perkawinan`, `status_hunian`, `foto_profile`, `file_ktp`, `status_verifikasi`) VALUES
('W-PBB-001', 'W-001', 'Indah Mayangsari', NULL, 'Kepala Keluarga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2'),
('W-PBB-001', 'W-002', 'Muahamad Ridwan', '123456789012341', 'Anggota Keluarga', '082116097045', 'Laki-laki', 'Islam', 'Bandung', '2000-06-28', 'S2', 'Buruh Harian Lepas', 'Orang Tua', 'Kawin', 'KTP luar tinggal di Lengkong', NULL, 'ipung.jpg', '2'),
('W-PBB-002', 'W-003', 'Papam', NULL, 'Kepala Keluarga', '081322127897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1'),
('W-PBB-003', 'W-004', 'Tian', NULL, 'Kepala Keluarga', '0813221278123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_fasilitas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan_fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_fasilitas` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_keluhan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_keluhan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kendaraan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kendaraan` enum('Roda Dua','Roda Tiga','Roda Empat','Lebih dari Roda Empat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_kendaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_stnk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_polisi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kendaraan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
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
(1, '2020_10_17_131249_create_wargas_table', 1),
(2, '2020_11_17_131045_create_detail_wargas_table', 1),
(3, '2020_11_17_131056_create_admins_table', 1),
(4, '2020_11_17_131066_create_keluhans_table', 1),
(5, '2020_11_17_131067_create_aspirasis_table', 1),
(6, '2020_11_17_131068_create_aspirasi_keluhans_table', 1),
(7, '2020_11_17_131108_create_pembayaran_iurans_table', 1),
(8, '2020_11_17_131124_create_pendataan_fasilitas_table', 1),
(9, '2020_11_17_131153_create_penggunaan_iurans_table', 1),
(10, '2020_11_17_131210_create_pengumumen_table', 1),
(11, '2020_11_17_131223_create_peraturans_table', 1),
(12, '2020_11_17_131238_create_surats_table', 1),
(13, '2020_11_17_144353_create_pengajuan_surats_table', 1),
(14, '2020_11_17_172831_create_penguruses_table', 1),
(15, '2020_11_17_172832_create_kendaraans_table', 1),
(16, '2020_11_17_172833_create_user_roles_table', 1),
(17, '2020_11_17_172834_create_users_table', 1),
(18, '2020_11_17_172835_create_agamas_table', 1),
(19, '2020_11_17_172836_create_tokens_table', 1),
(20, '2020_11_17_172837_create_user_akses_menus_table', 1),
(21, '2020_11_17_172838_create_menus_table', 1),
(22, '2020_11_17_172839_create_user_sub_menus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_iuran`
--

CREATE TABLE `pembayaran_iuran` (
  `no_tagihan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id_pengajuan_surat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengajuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `kode_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rt` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rw` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_rt` enum('Disetujui','Diproses') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_rw` enum('Disetujui','Diproses') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id_pengajuan_surat`, `id_detail_warga`, `pengajuan`, `tanggal_pengajuan`, `tanggal_disetujui`, `kode_surat`, `no_surat`, `rt`, `rw`, `nama_rt`, `nama_rw`, `verifikasi_rt`, `verifikasi_rw`) VALUES
('SURAT-001', 'W-002', 'Membuat SKCK', '2021-04-21', '2021-04-21', '091201212', '121 / 213 / 5541XII', '1', '2', 'Ersa', 'RAFIF YUSUF AVANDY', 'Disetujui', 'Disetujui'),
('SURAT-002', 'W-001', 'Membuat Surat Pindah', '2021-04-21', '2021-04-22', '091201212', '121 / 213 / 5541XII', '1', '2', NULL, 'RAFIF YUSUF AVANDY', 'Diproses', 'Disetujui'),
('SURAT-003', 'W-003', 'Membuat Surat Pindah Halaman', '2021-04-21', NULL, '', '', '', '', NULL, NULL, 'Diproses', 'Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_iuran`
--

CREATE TABLE `penggunaan_iuran` (
  `id_penggunaan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kebutuhan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` double NOT NULL,
  `tanggal_penggunaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_pengumuman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pengumuman` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengumuman` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengurus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_pengurus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pengurus` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` bigint(20) NOT NULL,
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_peraturan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_peraturan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_peraturan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_surat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `id_user`, `judul`, `keterangan_surat`, `file_surat`) VALUES
('S-PBB-001', 1, 'Arisan RT 06', 'Wajib Hadir Semuanya Karena Ada DoorPrize', 'Daftar_Hadir_Pemateri_dan_Panitia-6_April_2021_Sesi_2.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone_number` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion_id` int(11) NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `gender`, `place_of_birth`, `birthday`, `phone_number`, `address`, `religion_id`, `image`, `role_id`, `is_active`, `date_created`, `rt`, `rw`) VALUES
(1, 'RAFIF YUSUF AVANDY', 'rafifyusuf', 'rafifyusuf@gmail.com', '$2y$10$jzPhvP0r2r70zVPGkzX7E.GYoCiJ2aki8ztuqAVDXdLei5b8FPWKu', 'Laki-laki', '122121', '2021-04-20', '082116097045', 'Komplek Bsa Blok H No.7\r\nBojongsoang', 1, 'default.svg', 7, 1, '0000-00-00', NULL, 2),
(2, 'Ersa', 'admin', 'ersanurzz@mail.com', '$2y$10$AUVE4Guxhfqf/SPDtPmx0OITJTmJJbSWKR2EWrMP9hWJYcV5p7ILC', 'Perempuan', '122121', '2021-05-06', '082116097045', 'Komplek Bsa Blok H No.7\r\nBojongsoang', 2, 'default.svg', 6, 1, '0000-00-00', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 2, 2),
(11, 2, 9),
(12, 1, 9),
(13, 1, 10),
(14, 1, 11),
(15, 3, 1),
(16, 3, 2),
(17, 3, 9),
(18, 4, 1),
(19, 4, 2),
(20, 4, 9),
(21, 5, 1),
(22, 5, 2),
(23, 5, 9),
(24, 2, 4),
(25, 3, 5),
(26, 4, 6),
(27, 5, 7),
(28, 1, 12),
(29, 2, 12),
(30, 3, 12),
(31, 4, 12),
(32, 5, 12),
(33, 6, 2),
(34, 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`, `active`) VALUES
(1, 'Admin', 'fe-users', 1),
(2, 'User', 'fe-user', 1),
(3, 'Menu', 'fe-menu', 1),
(4, 'Admin Kebersihan', 'fe-trash-2', 1),
(5, 'Admin Keamanan', 'fe-shield', 1),
(6, 'Admin Fasilitas', 'fe-home', 1),
(7, 'Admin Olahraga', 'fe-globe', 1),
(8, 'DataMaster', 'fe-database', 1),
(9, 'Lainnya', 'fe-more-vertical-', 1),
(10, 'Data', 'fe-book-open', 0),
(11, 'Dashboard', 'fe-book', 0),
(12, 'KeluhanAspirasi', 'fe-people', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'admin kebersihan'),
(3, 'admin keamanan'),
(4, 'admin fasilitas'),
(5, 'admin olahraga'),
(6, 'rt'),
(7, 'rw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'admin/user/', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'admin/user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'admin/menu/', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'admin/menu/subMenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role Management', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'admin/user/changePassword', 'fas fa-fw fa-key', 1),
(8, 1, 'Data User', 'admin/dataUser/', 'fas fa-fw fa-user-tie', 1),
(9, 4, 'Data Keluhan dan Aspirasi', 'admin/KeluhanAspirasi/kebersihan', 'fas fa-fw fa-broom', 1),
(10, 8, 'Data Master', 'admin/DataMaster/', 'fas fa-fw fa-database', 1),
(11, 5, 'Data Keluhan dan Aspirasi', 'admin/KeluhanAspirasi/keamanan', 'fas fa-fw fa-handshake', 1),
(12, 1, 'Struktur Organisasi', 'Admin/strukturOrganisasi', 'fas fa-fw fa-sitemap', 1),
(13, 1, 'Pengumuman', 'Admin/pengumuman', 'fas fa-fw fa-bullhorn', 1),
(14, 6, 'Data Keluhan dan Aspirasi', 'admin/KeluhanAspirasi/fasilitas', 'fas fa-fw fa-building', 1),
(15, 7, 'Data Keluhan dan Aspirasi', 'admin/KeluhanAspirasi/olahraga', 'fas fa-fw fa-basketball-ball', 1),
(16, 1, 'Riwayat Verifikasi', 'admin/Dashboard/riwayat_verifikasi', 'fas fa-fw fa-history', 1),
(17, 8, 'Data Warga', 'admin/Dashboard/data_warga', 'fas fa-fw fa-users', 1),
(18, 8, 'Data Kendaraan', 'admin/Dashboard/data_kendaraan', 'fas fa-fw fa-car', 1),
(19, 8, 'Data Fasilitas', 'admin/Dashboard/fasilitas', 'fas fa-fw fa-couch', 1),
(20, 1, 'Keluhan dan Aspirasi', 'admin/KeluhanAspirasi/', 'fas fa-fw fa-people-carry', 1),
(21, 8, 'Data Agama', 'admin/DataMaster/agama/', 'fas fa-fw fa-pray', 1),
(22, 8, 'Data Dashboard', 'admin/DataMaster/dashboard/', 'fas fa-fw fa-edit', 1),
(23, 8, 'Data Konten', 'admin/DataMaster/konten', 'far fa-fw fa-newspaper', 1),
(24, 9, 'Tentang Aplikasi', 'admin/Lainnya/tentang', 'fas fa-fw fa-address-card', 1),
(25, 9, 'Pengaturan', 'admin/Lainnya/pengaturan', 'fas fa-fw fa-wrench', 1),
(26, 9, 'Hubungi Kami', 'Lainnya/hubungi', 'fas fa-fw fa-address-book', 1),
(27, 9, 'Bantuan', 'Lainnya/bantuan', 'far fa-fw fa-question-circle', 1),
(28, 9, 'FAQ', 'Lainnya/faq', 'fas fa-fw fa-question', 1),
(32, 1, 'Berita', 'admin/berita', 'fas fa-fw fa-newspaper', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(0, 'rafifyusuf@gmail.com', 'cjO7SnWLWfD4ng7khW5RjH32nQzG74yjByiFisrU41c=', 1618900071);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rumah` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  `status_rumah` enum('Rumah Usaha','Rumah Tinggal','Rumah Kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_kk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id_warga`, `no_rumah`, `no_kk`, `alamat`, `jumlah_keluarga`, `status_rumah`, `rt`, `rw`, `file_kk`) VALUES
('W-PBB-001', 'H-7', '1234567890123456', 'Komplek PBB 1', 2, 'Rumah Usaha', '1', '2', 'ipung2.jpg'),
('W-PBB-002', 'C-1', '1234567890123456', 'Pbb 1', 3, 'Rumah Tinggal', '2', '1', 'uskes_ipung.jpg'),
('W-PBB-003', 'E-1', '1234567890123456', 'Komplek PBB Ceria', 2, 'Rumah Usaha', '1', '1', '633547.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `aspirasi_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `aspirasi_keluhan`
--
ALTER TABLE `aspirasi_keluhan`
  ADD PRIMARY KEY (`id_aspirasi_keluhan`),
  ADD KEY `aspirasi_keluhan_id_keluhan_foreign` (`id_keluhan`),
  ADD KEY `aspirasi_keluhan_id_aspirasi_foreign` (`id_aspirasi`),
  ADD KEY `aspirasi_keluhan_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  ADD PRIMARY KEY (`id_detail_warga`),
  ADD KEY `detail_warga_id_warga_foreign` (`id_warga`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `fasilitas_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `keluhan_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `kendaraan_id_warga_foreign` (`id_warga`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_iuran`
--
ALTER TABLE `pembayaran_iuran`
  ADD PRIMARY KEY (`no_tagihan`),
  ADD KEY `pembayaran_iuran_id_detail_warga_foreign` (`id_detail_warga`);

--
-- Indeks untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id_pengajuan_surat`),
  ADD KEY `pengajuan_surat_id_detail_warga_foreign` (`id_detail_warga`);

--
-- Indeks untuk tabel `penggunaan_iuran`
--
ALTER TABLE `penggunaan_iuran`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `penggunaan_iuran_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `pengumuman_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `pengurus_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`),
  ADD KEY `peraturan_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `surat_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `aspirasi_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `aspirasi_keluhan`
--
ALTER TABLE `aspirasi_keluhan`
  ADD CONSTRAINT `aspirasi_keluhan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `aspirasi_keluhan_id_aspirasi_foreign` FOREIGN KEY (`id_aspirasi`) REFERENCES `aspirasi` (`id_aspirasi`),
  ADD CONSTRAINT `aspirasi_keluhan_id_keluhan_foreign` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`);

--
-- Ketidakleluasaan untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  ADD CONSTRAINT `detail_warga_id_warga_foreign` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`);

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_id_warga_foreign` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`);

--
-- Ketidakleluasaan untuk tabel `pembayaran_iuran`
--
ALTER TABLE `pembayaran_iuran`
  ADD CONSTRAINT `pembayaran_iuran_id_detail_warga_foreign` FOREIGN KEY (`id_detail_warga`) REFERENCES `detail_warga` (`id_detail_warga`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD CONSTRAINT `pengajuan_surat_id_detail_warga_foreign` FOREIGN KEY (`id_detail_warga`) REFERENCES `detail_warga` (`id_detail_warga`);

--
-- Ketidakleluasaan untuk tabel `penggunaan_iuran`
--
ALTER TABLE `penggunaan_iuran`
  ADD CONSTRAINT `penggunaan_iuran_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `peraturan`
--
ALTER TABLE `peraturan`
  ADD CONSTRAINT `peraturan_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
