-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2021 pada 17.19
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

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('ADM001', 'Ersa', 'ersaersa', 'ersaersa');

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
  `id_detail_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_warga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Kepala Keluarga','Anggota Keluarga') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` enum('Belum Sekolah','TK','SD','SMP','SMA','Diploma','S1','S2','S3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` enum('Wiraswasta','Buruh Harian Lepas','Pegawai Negeri','Pegawai Swasta','Guru','Petani','Mahasiswa','Tidak Bekerja','Ibu Rumah Tangga') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan_keluarga` enum('Anak','Istri','Suami','Kerabat','Adik','Kaka','Orang Tua') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin','Janda','Duda') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_hunian` enum('KTP lengkong tinggal di Lengkong','KTP luar tinggal di Lengkong','KTP lengkong tinggal di luar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ktp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` tinyint(4) NOT NULL COMMENT '1 = Belum Terverif, 2 = Terverif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_warga`
--

INSERT INTO `detail_warga` (`id_detail_warga`, `id_warga`, `nama_warga`, `nik`, `status`, `no_hp`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `pekerjaan`, `hubungan_keluarga`, `status_perkawinan`, `status_hunian`, `foto_profile`, `file_ktp`, `status_verifikasi`) VALUES
('W-001', 'W-PBB-001', 'RAFIF YUSUF AVANDY', '12345678901234567890', 'Kepala Keluarga', '0821189710199', 'Laki-laki', 'islam', 'Bandung', '2021-04-27', 'Belum Sekolah', 'Ibu Rumah Tangga', 'Istri', 'Janda', 'KTP luar tinggal di Lengkong', '', '2_21.jpg', 2),
('W-002', 'W-PBB-002', 'Ersa Nur', '12133545', 'Anggota Keluarga', '082118971019912', 'Laki-laki', 'Islam', 'Bandung', '2021-04-09', 'TK', 'Ibu Rumah Tangga', 'Kerabat', 'Janda', 'KTP lengkong tinggal di Lengkong', '', 'Screenshot_2020-11-10_092332.jpg', 2),
('W-003', 'W-PBB-002', 'Rama Dede', '12411131212', 'Anggota Keluarga', '082116097045', 'Laki-laki', 'Islam', 'Bandung', '2016-05-11', 'SD', 'Mahasiswa', 'Anak', 'Belum Kawin', 'KTP lengkong tinggal di Lengkong', '', 'Ditanda_tangani_.png', 2),
('W-004', 'W-PBB-001', 'Ashiap Ata H', '124111312121', 'Anggota Keluarga', '082116097046', 'Laki-laki', 'Islam', 'Bandung', '2021-04-11', 'SMA', 'Petani', 'Suami', 'Kawin', 'KTP lengkong tinggal di Lengkong', '', 'Quiz_1.jpeg', 2),
('W-005', 'W-PBB-001', 'Ashiap Aurel H', '124111312121211', 'Anggota Keluarga', '082116097047', 'Laki-laki', 'Islam', 'Bandung', '2021-05-04', 'TK', 'Guru', 'Istri', 'Belum Kawin', 'KTP lengkong tinggal di Lengkong', '', 'Screenshot_(1).png', 2),
('W-006', 'W-PBB-002', 'Papam', '1234567890123456', 'Anggota Keluarga', '0821322127897', 'Perempuan', 'Hindu', 'Bandung', '2021-04-27', 'SMP', 'Mahasiswa', 'Kaka', 'Janda', 'KTP luar tinggal di Lengkong', '', 'contoh_23.jpg', 2);

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
  `id_kendaraan` varchar(15) NOT NULL,
  `id_warga` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kendaraan` enum('Roda Dua','Roda Tiga','Roda Empat','Lebih dari Roda Empat') NOT NULL,
  `merk_kendaraan` varchar(50) NOT NULL,
  `nama_stnk` varchar(50) NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `foto_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `id_warga`, `tipe_kendaraan`, `merk_kendaraan`, `nama_stnk`, `no_polisi`, `foto_kendaraan`) VALUES
('K-PBB-001', 'W-PBB-001', 'Roda Empat', 'Avanza', 'Ersa Nur Maulana', 'D 3405 LEVI', '2_22.jpg'),
('K-PBB-002', 'W-PBB-002', 'Roda Empat', 'Avanza', 'Ersa Nur Maulana', '1', 'Contoh_1.jpg'),
('K-PBB-003', 'W-PBB-001', 'Roda Dua', 'Xabre', 'Ersa Nur Maulana', 'D 1211 LEVI', 'Screenshot_2020-11-10_0923321.jpg'),
('K-PBB-004', 'W-PBB-001', 'Roda Empat', 'MiniCooper', 'Ersa Nur Maulana', 'D 11 LEVI', '1_3.jpg');

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
(14, '2020_11_17_172831_create_penguruses_table', 1);

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
  `kode_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` int(2) DEFAULT NULL,
  `rw` int(2) DEFAULT NULL,
  `status_verifikasi` enum('Disetujui','Diproses') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id_pengajuan_surat`, `id_detail_warga`, `pengajuan`, `tanggal_pengajuan`, `tanggal_disetujui`, `kode_surat`, `no_surat`, `rt`, `rw`, `status_verifikasi`) VALUES
('SURAT-001', 'W-002', 'Halo gais', '2021-04-10', '2021-04-10', '091201212', '121 / 213 / 5541XII', 2, 16, 'Disetujui'),
('SURAT-002', 'W-002', 'Membuat Surat Nikah', '2021-04-10', '2021-04-10', '091201212', '121 / 213 / 5541XII', 2, 16, 'Disetujui'),
('SURAT-003', 'W-001', 'Surat Pindahan', '2021-04-10', '2021-04-10', '091201212', '121 / 213 / 5541XII', 12, 16, 'Disetujui'),
('SURAT-004', 'W-005', 'Untuk Pengobatan', '2021-04-11', NULL, NULL, NULL, NULL, NULL, 'Diproses');

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
  `id_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_surat` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `id_admin`, `judul`, `file_surat`, `keterangan_surat`) VALUES
('S-PBB-001', 'ADM001', 'Arisan RT 06', 'NOTULENSI_LH_X_KESEHATAN_18_Maret_20215.docx', 'Wajib Hadir Semuanya Karena Ada DoorPrize'),
('S-PBB-002', 'ADM001', 'Arisan RT 09', 'Final_Test_-_4_March_2021.pdf', 'Wajib Hadir Semuanya Karena Ada DoorPrize GAIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rumah` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  `status_rumah` enum('Rumah Usaha','Rumah Tinggal','Rumah Kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_kk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id_warga`, `no_rumah`, `no_kk`, `alamat`, `jumlah_keluarga`, `status_rumah`, `rt`, `rw`, `file_kk`) VALUES
('W-PBB-001', 'H-7', '12345', 'komplek Bojong soang asri 4', 3, 'Rumah Kosong', '12', '16', '633547.jpg'),
('W-PBB-002', 'B-15', '123123', 'Thailand', 3, 'Rumah Usaha', '2', '16', '2_3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
  ADD KEY `surat_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `surat_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
