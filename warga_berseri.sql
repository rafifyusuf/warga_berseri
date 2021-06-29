-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 19.47
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

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

DELIMITER $$
--
-- Fungsi
--
CREATE FUNCTION `cek_iuran` (`bulan` VARCHAR(20), `tahun` YEAR) RETURNS BIGINT(20) NO SQL
BEGIN
                 DECLARE hasil INT DEFAULT 0;
                 SELECT SUM(nominal) INTO hasil FROM data_iuran_warga
                 WHERE data_iuran_warga.bulan_iuran = bulan AND data_iuran_warga.tahun_iuran = tahun AND data_iuran_warga.status_iuran = 'Lunas' ;
                  RETURN hasil;
              END$$

CREATE FUNCTION `cek_pemasukan` (`bulan` VARCHAR(20), `tahun` INT) RETURNS BIGINT(20) BEGIN
                 DECLARE hasil INT DEFAULT 0;
                 SELECT SUM(jumlah_pemasukan) INTO hasil FROM data_pemasukan_iuran
                 WHERE data_pemasukan_iuran.bulan_pemasukan = bulan AND data_pemasukan_iuran.tahun_pemasukan = tahun;
                  RETURN hasil;
              END$$

CREATE FUNCTION `cek_pengeluaran` (`bulan` VARCHAR(20), `tahun` INT) RETURNS BIGINT(20) BEGIN
                     DECLARE hasil INT DEFAULT 0;
                     SELECT SUM(jumlah_pengeluaran) INTO hasil FROM data_penggunaan_iuran
                     WHERE data_penggunaan_iuran.bulan_penggunaan = bulan AND data_penggunaan_iuran.tahun_penggunaan = tahun;
                      RETURN hasil;
                  END$$

CREATE FUNCTION `cek_tagihan` (`bulan` VARCHAR(20), `tahun` YEAR) RETURNS BIGINT(20) NO SQL
BEGIN
                 DECLARE hasil INT DEFAULT 0;
                 SELECT SUM(nominal) INTO hasil FROM data_iuran_warga
                 WHERE data_iuran_warga.bulan_iuran = bulan AND data_iuran_warga.tahun_iuran = tahun AND data_iuran_warga.status_iuran = 'Belum Lunas' ;
                  RETURN hasil;
              END$$

CREATE FUNCTION `friwayat_pembayaran_iuran` (`tagihan` INT) RETURNS INT(11) NO SQL
BEGIN
DECLARE status VARCHAR(255);
DECLARE hasil VARCHAR(255);
SELECT IF(tanggal_diterima IS NOT NULL, 'Benar', 'Salah') INTO status FROM riwayat_pembayaran_iuran WHERE no_tagihan=tagihan;
IF status = 'Benar' THEN
SET hasil = 'Sudah Bayar Iuran';
ELSE 
SET hasil = 'Belum Bayar Iuran';
END IF;
RETURN(hasil);
END$$

CREATE FUNCTION `ftotal_warga` () RETURNS VARCHAR(100) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NO SQL
BEGIN
DECLARE total VARCHAR(100);
SELECT COUNT(id_warga) INTO total FROM pendataan_warga;
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id` int(10) UNSIGNED NOT NULL,
  `agama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_aspirasi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspirasi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kirim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--
-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(10) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `content`
--
-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `side_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dashboard`
--

INSERT INTO `dashboard` (`id`, `header`, `title`, `content`, `footer`, `icon`, `side_logo`, `logo`) VALUES
(1, 'About Application', 'Warga Berseri', 'SELAMAT DATANG DI APLIKASI PERUMAHAN PERMATA BUAH BATU', 'Editor: Januarizqi Dwi Mileniantoro', '', 'PBB', 'pbb.png'),
(2, '<h2 class=\"text-white text-capitalize\"></i>Warga<span class=\"text-color\"> Berseri</span></h2>', 'Warga Berseri', '<span class=\"h6 d-inline-block mb-4 subhead text-uppercase\">Warga Berseri</span>\r\n					<h1 class=\"text-uppercase text-white mb-5\">Perumahan <span class=\"text-color\">Permata</span><br>Buah Batu</h1>', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_aspirasi_warga`
--

CREATE TABLE `data_aspirasi_warga` (
  `no_tiket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_aspirasi` date DEFAULT NULL,
  `jenis_aspirasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspirasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aspirasi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respon_aspirasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_admin` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fasilitas`
--

CREATE TABLE `data_fasilitas` (
  `no` int(10) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_lokasi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lokasi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_fasilitas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_iuran_warga`
--

CREATE TABLE `data_iuran_warga` (
  `no_tagihan` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan_iuran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_iuran` year(4) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_iuran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Lunas',
  `nominal` int(11) DEFAULT NULL,
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_iuran_warga`
--
-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keuangan_iuran`
--

CREATE TABLE `data_keuangan_iuran` (
  `id_data_keuangan` int(10) UNSIGNED NOT NULL,
  `bulan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_warga` int(11) NOT NULL,
  `jumlah_sudah_bayar` int(11) NOT NULL,
  `jumlah_belum_bayar` int(11) NOT NULL,
  `total_saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_keuangan_iuran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemasukan_iuran`
--

CREATE TABLE `data_pemasukan_iuran` (
  `id_pemasukan` int(10) UNSIGNED NOT NULL,
  `nama_pemasukan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pemasukan` int(11) NOT NULL,
  `bulan_pemasukan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pemasukan` year(4) NOT NULL,
  `tanggal_pemasukan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pemasukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pemasukan_iuran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penggunaan_iuran`
--

CREATE TABLE `data_penggunaan_iuran` (
  `id_penggunaan` int(10) UNSIGNED NOT NULL,
  `nama_kebutuhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `bulan_penggunaan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_penggunaan` year(4) NOT NULL,
  `tanggal_penggunaan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_penggunaan_iuran`
--

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
-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_keluhan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kirim` datetime NOT NULL
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
  `foto_kendaraan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Belum Terverif, 2 = Terverfikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `musrembang`
--

CREATE TABLE `musrembang` (
  `id` int(10) UNSIGNED NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sasaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengusul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `musrembang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `notulensi`
--

CREATE TABLE `notulensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notulensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id_pengajuan_surat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detail_warga` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengajuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanggal_disetujui` date DEFAULT NULL,
  `kode_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_rt` enum('Disetujui','Diproses') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_rw` enum('Disetujui','Diproses') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan`
--

CREATE TABLE `peraturan` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_post` datetime NOT NULL,
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peraturan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas_keamanan`
--

CREATE TABLE `petugas_keamanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas_keamanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `struktur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_surat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `date_created` date DEFAULT NULL,
  `rt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `gender`, `place_of_birth`, `birthday`, `phone_number`, `address`, `religion_id`, `image`, `role_id`, `is_active`, `date_created`, `rt`, `rw`) VALUES
(1, 'Januarizqi', 'janu', 'januarrizqi5@gmail.com', '$2y$10$54Ajl0R.ArBF45hyXCsJZOnTdLzoegtv9nJbBRs3ICk1QBv1kS5yW', 'Laki-laki', 'Kediri', '2021-05-12', '085717295156', 'Kediri', 1, 'default.svg', 1, 1, '2021-05-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(33, 1, 13),
(34, 1, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`, `active`) VALUES
(1, 'Admin', 'fe-users', 1),
(2, 'User', 'fe-user', 1),
(3, 'Set Up', 'fe-menu', 1),
(4, 'Admin Kebersihan', 'fe-trash-2', 1),
(5, 'Admin Keamanan', 'fe-shield', 1),
(6, 'Admin Fasilitas', 'fe-home', 1),
(7, 'Admin Olahraga', 'fe-globe', 1),
(8, 'DataMaster', 'fe-database', 1),
(9, 'Lainnya', 'fe-more-vertical-', 1),
(10, 'Data', 'fe-book-open', 0),
(11, 'Dashboard', 'fe-book', 0),
(12, 'KeluhanAspirasi', 'fe-people', 0),
(13, 'menu', 'fe-menu', 0),
(14, 'Struktur Organisasi', 'fas fa-fw fa-sitemap', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user/', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu/', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1),
(6, 3, 'Role Management', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
(8, 1, 'Data User', 'admin/dataUser/', 'fas fa-fw fa-user-tie', 1),
(9, 4, 'Data Keluhan dan Aspirasi', 'KeluhanAspirasi/kebersihan', 'fas fa-fw fa-broom', 1),
(10, 8, 'Data Master', 'DataMaster/', 'fas fa-fw fa-database', 1),
(11, 5, 'Data Keluhan dan Aspirasi', 'KeluhanAspirasi/keamanan', 'fas fa-fw fa-handshake', 1),
(13, 1, 'Pengumuman', 'Admin/pengumuman', 'fas fa-fw fa-bullhorn', 1),
(14, 6, 'Data Keluhan dan Aspirasi', 'KeluhanAspirasi/fasilitas', 'fas fa-fw fa-building', 1),
(15, 7, 'Data Keluhan dan Aspirasi', 'KeluhanAspirasi/olahraga', 'fas fa-fw fa-basketball-ball', 1),
(17, 8, 'Data Warga', 'Dashboard/data_warga', 'fas fa-fw fa-users', 1),
(18, 8, 'Data Kendaraan', 'Dashboard/data_kendaraan', 'fas fa-fw fa-car', 1),
(19, 8, 'Data Fasilitas', 'Dashboard/fasilitas', 'fas fa-fw fa-couch', 1),
(20, 1, 'Keluhan dan Aspirasi', 'KeluhanAspirasi/', 'fas fa-fw fa-people-carry', 1),
(21, 3, 'Data Agama', 'DataMaster/agama/', 'fas fa-fw fa-pray', 1),
(22, 3, 'Edit Dashboard Admin', 'DataMaster/dashboard/', 'fas fa-fw fa-edit', 1),
(23, 8, 'Data Konten', 'DataMaster/konten', 'far fa-fw fa-newspaper', 1),
(24, 9, 'Tentang Aplikasi', 'Lainnya/tentang', 'fas fa-fw fa-address-card', 1),
(25, 9, 'Pengaturan', 'Lainnya/pengaturan', 'fas fa-fw fa-wrench', 1),
(26, 9, 'Hubungi Kami', 'Lainnya/hubungi', 'fas fa-fw fa-address-book', 1),
(27, 9, 'Bantuan', 'Lainnya/bantuan', 'far fa-fw fa-question-circle', 1),
(28, 9, 'FAQ', 'Lainnya/faq', 'fas fa-fw fa-question', 1),
(32, 1, 'Berita', 'admin/berita', 'fas fa-fw fa-newspaper', 1),
(33, 1, 'Notulensi', 'admin/notulensi', 'far fa-fw fa-clipboard', 1),
(34, 3, 'Edit Dashboard User', 'DataMaster/dashboardUser/', 'far fa-fw fa-edit', 1),
(35, 1, 'Musrembang', 'Admin/musrembang', 'fas fa-fw fa-book-open', 1),
(36, 14, 'Petugas RT', 'Admin/strukturOrganisasi', 'fas fa-fw fa-sitemap', 1),
(38, 1, 'Peraturan', 'Admin/peraturan', 'fas fa-book', 1),
(39, 14, 'Petugas Keamanan', 'Admin/strukturOrganisasiPetugasKeamanan', 'fas fa-fw fa-sitemap', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_token`
--

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
  `status_rumah_tangga` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_kk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warga`
--


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_aspirasi_warga`
--
ALTER TABLE `data_aspirasi_warga`
  ADD PRIMARY KEY (`no_tiket`),
  ADD KEY `data_aspirasi_warga_id_detail_warga_foreign` (`id_detail_warga`),
  ADD KEY `data_aspirasi_warga_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `data_fasilitas`
--
ALTER TABLE `data_fasilitas`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `data_iuran_warga`
--
ALTER TABLE `data_iuran_warga`
  ADD PRIMARY KEY (`no_tagihan`),
  ADD KEY `data_iuran_warga_id_warga_foreign` (`id_warga`);

--
-- Indeks untuk tabel `data_keuangan_iuran`
--
ALTER TABLE `data_keuangan_iuran`
  ADD PRIMARY KEY (`id_data_keuangan`);

--
-- Indeks untuk tabel `data_pemasukan_iuran`
--
ALTER TABLE `data_pemasukan_iuran`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `data_pemasukan_iuran_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `data_penggunaan_iuran`
--
ALTER TABLE `data_penggunaan_iuran`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `data_penggunaan_iuran_id_admin_foreign` (`id_admin`);

--
-- Indeks untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  ADD PRIMARY KEY (`id_detail_warga`),
  ADD KEY `detail_warga_id_warga_foreign` (`id_warga`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `kendaraan_id_warga_foreign` (`id_warga`);

--
-- Indeks untuk tabel `migrations`
--
--
-- Indeks untuk tabel `musrembang`
--
ALTER TABLE `musrembang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notulensi`
--
ALTER TABLE `notulensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id_pengajuan_surat`),
  ADD KEY `pengajuan_surat_id_detail_warga_foreign` (`id_detail_warga`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas_keamanan`
--
ALTER TABLE `petugas_keamanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `surat_id_admin_foreign` (`id_admin`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_fasilitas`
--
ALTER TABLE `data_fasilitas`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `data_iuran_warga`
--
ALTER TABLE `data_iuran_warga`
  MODIFY `no_tagihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2106095432;

--
-- AUTO_INCREMENT untuk tabel `data_keuangan_iuran`
--
ALTER TABLE `data_keuangan_iuran`
  MODIFY `id_data_keuangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_pemasukan_iuran`
--
ALTER TABLE `data_pemasukan_iuran`
  MODIFY `id_pemasukan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_penggunaan_iuran`
--
ALTER TABLE `data_penggunaan_iuran`
  MODIFY `id_penggunaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--

--
-- AUTO_INCREMENT untuk tabel `musrembang`
--
ALTER TABLE `musrembang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `notulensi`
--
ALTER TABLE `notulensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas_keamanan`
--
ALTER TABLE `petugas_keamanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_aspirasi_warga`
--
ALTER TABLE `data_aspirasi_warga`
  ADD CONSTRAINT `data_aspirasi_warga_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_aspirasi_warga_id_detail_warga_foreign` FOREIGN KEY (`id_detail_warga`) REFERENCES `detail_warga` (`id_detail_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_iuran_warga`
--
ALTER TABLE `data_iuran_warga`
  ADD CONSTRAINT `data_iuran_warga_id_warga_foreign` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_pemasukan_iuran`
--
ALTER TABLE `data_pemasukan_iuran`
  ADD CONSTRAINT `data_pemasukan_iuran_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_penggunaan_iuran`
--
ALTER TABLE `data_penggunaan_iuran`
  ADD CONSTRAINT `data_penggunaan_iuran_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_warga`
--
ALTER TABLE `detail_warga`
  ADD CONSTRAINT `detail_warga_id_warga_foreign` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_id_warga_foreign` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD CONSTRAINT `pengajuan_surat_id_detail_warga_foreign` FOREIGN KEY (`id_detail_warga`) REFERENCES `detail_warga` (`id_detail_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
