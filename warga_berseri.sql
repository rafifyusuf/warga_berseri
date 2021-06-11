-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2021 pada 15.13
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
CREATE DEFINER=`root`@`localhost` FUNCTION `cek_pemasukan` (`bulan` VARCHAR(20), `tahun` INT) RETURNS INT(11) BEGIN
                 DECLARE hasil INT DEFAULT 0;
                 SELECT jumlah_pemasukan INTO hasil FROM data_pemasukan_iuran
                 WHERE data_pemasukan_iuran.bulan_pemasukan = bulan AND data_pemasukan_iuran.tahun_pemasukan = tahun;
                  RETURN hasil;
              END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cek_pengeluaran` (`bulan` VARCHAR(20), `tahun` INT) RETURNS INT(11) BEGIN
                     DECLARE hasil INT DEFAULT 0;
                     SELECT jumlah_pengeluaran INTO hasil FROM data_penggunaan_iuran
                     WHERE data_penggunaan_iuran.bulan_penggunaan = bulan AND data_penggunaan_iuran.tahun_penggunaan = tahun;
                      RETURN hasil;
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

--
-- Dumping data untuk tabel `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `nama`, `email`, `no_wa`, `jenis_aspirasi`, `aspirasi`, `status`, `bukti`, `waktu_kirim`) VALUES
(1, 'Ersaah', '', '08443423243264', 'kebersihan', 'Ayoooo bersih', 'Belum diproses', 'rajekwesi.JPG', '2021-06-09 15:54:55');

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

INSERT INTO `berita` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Ever too late to lose weight?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-22 00:00:00', '2021-03-31 00:00:00', 'post6.jpg'),
(2, 'Make your fitness Boost with us', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-30 00:00:00', '2021-03-31 00:00:00', 'post1.jpg'),
(3, 'Ethernity beauty health diet plan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-25 00:00:00', '2021-03-25 00:00:00', 'post2.jpg'),
(4, 'Ever too late to lose weight?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-08 00:00:00', '2021-03-31 00:00:00', 'post3.jpg'),
(5, 'Make your fitness Boost with us', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-27 00:00:00', '2021-03-18 00:00:00', 'post4.jpg'),
(6, 'Ethernity beauty health diet plan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-19 00:00:00', '2021-03-31 00:00:00', 'post5.jpg'),
(7, 'Berita <br>Hari Ini <span class=\"text-color\">COVID19</span>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.</p>', 'Muhammad Haitsam', '2021-03-20 21:43:37', '2021-03-20 21:47:25', 'covid.jpg');

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

INSERT INTO `content` (`id`, `header`, `content`, `footer`, `last_updated`) VALUES
(1, 'Illustration', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:54'),
(2, 'Development Approach', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:49:49'),
(3, 'Illustration', '<p>Add some quality, svg illustrations to your project courtesy of <a\r\n                                            target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">unDraw</a>, a\r\n                                        constantly updated collection of beautiful svg images that you can use\r\n                                        completely free and without attribution!</p>\r\n                                    <a target=\"_blank\" rel=\"nofollow\" href=\"https://undraw.co/\">Browse Illustrations on\r\n                                        unDraw &rarr;</a>', '', '2021-03-05 03:51:44'),
(4, 'Development Approach', '<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce\r\n                                        CSS bloat and poor page performance. Custom CSS classes are used to create\r\n                                        custom components and custom utility classes.</p>\r\n                                    <p class=\"mb-0\">Before working with this theme, you should become familiar with the\r\n                                        Bootstrap framework, especially the utility classes.</p>', '', '2021-03-05 03:52:18');

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

INSERT INTO `data_fasilitas` (`no`, `nama_lokasi`, `fasilitas_lokasi`, `alamat_lokasi`, `foto_lokasi`, `lat`, `long`) VALUES
(14, 'Area Jogging', 'Jalan untuk jogging', 'Blk. C-G 11 Lengkong, Kec. Bojongsoang, Bandung, Jawa Barat 40287', 'warga_berseri/uploads/foto_lokasi/75_-Manfaat-jogging-untuk-kesehatan-anda.jpg', '-6.9717489', '107.6384383');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_iuran_warga`
--

CREATE TABLE `data_iuran_warga` (
  `no_tagihan` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan_iuran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_iuran` year(4) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_iuran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Lunas',
  `nominal` int(11) DEFAULT NULL,
  `id_warga` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_iuran_warga`
--

INSERT INTO `data_iuran_warga` (`no_tagihan`, `jenis`, `bulan_iuran`, `tahun_iuran`, `nama`, `tanggal_pembayaran`, `bukti_pembayaran`, `status_iuran`, `nominal`, `id_warga`) VALUES
(2106033547, 'wajib', 'Jun', 2021, 'Indah Mayangsari', NULL, NULL, 'Belum Lunas', 200000, 'W-PBB-001'),
(2106033548, 'wajib', 'Jun', 2021, 'Papam', NULL, NULL, 'Belum Lunas', 100000, 'W-PBB-002'),
(2106033549, 'wajib', 'Jun', 2021, 'Tian', NULL, NULL, 'Belum Lunas', 200000, 'W-PBB-003'),
(2106033550, 'wajib', 'Jun', 2021, 'siti aminah', NULL, NULL, 'Belum Lunas', 100000, 'W-PBB-004'),
(2106034047, 'tambahan', 'Jun', 2021, 'Indah Mayangsari', NULL, NULL, 'Belum Lunas', 125, 'W-PBB-001'),
(2106034050, 'tambahan', 'Jun', 2021, 'Papam', NULL, NULL, 'Belum Lunas', 125, 'W-PBB-002'),
(2106034051, 'tambahan', 'Jun', 2021, 'Tian', NULL, NULL, 'Belum Lunas', 125, 'W-PBB-003'),
(2106034052, 'tambahan', 'Jun', 2021, 'siti aminah', NULL, NULL, 'Belum Lunas', 125, 'W-PBB-004');

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
  `saldo` bigint(20) NOT NULL,
  `pemasukan` bigint(20) NOT NULL,
  `total_saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_keuangan_iuran`
--

INSERT INTO `data_keuangan_iuran` (`id_data_keuangan`, `bulan`, `tahun`, `jumlah_warga`, `jumlah_sudah_bayar`, `jumlah_belum_bayar`, `saldo`, `pemasukan`, `total_saldo`) VALUES
(5, 'Mar', 2021, 2, 2, 0, 200000, 0, 120000),
(6, 'Apr', 2021, 2, 1, 1, 100000, 0, 120000),
(7, '', 0000, 0, 0, 0, 0, 0, 120000),
(8, 'Jun', 2021, 6, 0, 6, 0, 0, 0);

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
  `tanggal_pemasukan` date NOT NULL,
  `bukti_pemasukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pemasukan_iuran`
--

INSERT INTO `data_pemasukan_iuran` (`id_pemasukan`, `nama_pemasukan`, `jumlah_pemasukan`, `bulan_pemasukan`, `tahun_pemasukan`, `tanggal_pemasukan`, `bukti_pemasukan`, `keterangan`, `kategori`, `id_admin`) VALUES
(1, 'uang pkk', 20000, 'Apr', 2021, '2021-04-07', '/admin/bukti_pemasukan/Screen_Shot_2021-04-05_at_10_59_35.png', 'dari pemerintah', 'SDM', 1);

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
  `tanggal_penggunaan` date NOT NULL,
  `bukti_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_penggunaan_iuran`
--

INSERT INTO `data_penggunaan_iuran` (`id_penggunaan`, `nama_kebutuhan`, `jumlah_pengeluaran`, `bulan_penggunaan`, `tahun_penggunaan`, `tanggal_penggunaan`, `bukti_pengeluaran`, `keterangan`, `kategori`, `id_admin`) VALUES
(1, 'Pembayaran Uang Kebersihan', 90000, 'Mar', 2021, '2021-03-08', '/admin/bukti_pengeluaran_penggunaan/adidas1.jpg', 'bayar uang kebersihan', 'kebersihan', 1),
(14, 'beli sapu', 10000, 'Apr', 2021, '2021-04-03', '/admin/bukti_pengeluaran_penggunaan/Screen_Shot_2021-04-05_at_10_59_3511.png', 'pembelian satu buah sapu', 'Kebersihan', 1);

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
('W-PBB-001', 'W-001', 'Indah Mayangsari', NULL, 'Kepala Keluarga', NULL, NULL, NULL, NULL, NULL, 'SMP', NULL, NULL, NULL, 'KTP luar tinggal di Lengkong', NULL, NULL, '2'),
('W-PBB-002', 'W-003', 'Papam', '1234567890123456', 'Kepala Keluarga', '081322127897', 'Laki-laki', 'Katolik', 'Bandung', '2000-06-28', 'SMP', 'Pegawai Negeri', 'Istri', 'Janda', 'KTP lengkong tinggal di luar', NULL, NULL, '1'),
('W-PBB-003', 'W-004', 'Tian', NULL, 'Kepala Keluarga', '0813221278123', NULL, NULL, NULL, NULL, 'SMA', NULL, NULL, NULL, 'KTP lengkong tinggal di luar', NULL, NULL, '1'),
('W-PBB-004', 'W-005', 'siti aminah', '12345678901234567890', 'Kepala Keluarga', '089650161537', 'Laki-laki', 'Kristen', 'Bandung', '2021-06-09', 'S3', 'Mahasiswa', 'Istri', 'Duda', 'KTP lengkong tinggal di Lengkong', 'create_event.jpg', 'video_call.jpg', '2'),
('W-PBB-004', 'W-006', 'asep jumroni', '3204082343215002', 'Anggota Keluarga', '082314523890', 'Laki-laki', 'Islam', 'Bandung', '2021-04-13', 'SMA', 'Wiraswasta', 'Suami', 'Kawin', 'KTP lengkong tinggal di Lengkong', 'video_call.jpg', 'ipung.jpg', '2'),
('W-PBB-002', 'W-007', 'januar', '1234567890123456', 'Anggota Keluarga', '081322128491', 'Laki-laki', 'Islam', 'Bandung', '2021-06-13', 'SD', 'Wiraswasta', 'Istri', 'Belum Kawin', 'KTP lengkong tinggal di Lengkong', NULL, 'video_call1.jpg', '1'),
('W-PBB-005', 'W-008', 'Coba Test', NULL, 'Kepala Keluarga', '123456789012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2');

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

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`id`, `nama`, `no_wa`, `email`, `jenis_keluhan`, `keluhan`, `status`, `bukti`, `waktu_kirim`) VALUES
(1, 'Ersaaa', '08454524363', '', 'kebersihan', 'Ayoo ngeluh', 'Belum diproses', 'logo_jp2.png', '2021-06-09 15:56:48');

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

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_warga`, `id_kendaraan`, `tipe_kendaraan`, `merk_kendaraan`, `nama_stnk`, `no_polisi`, `foto_kendaraan`) VALUES
('W-PBB-002', 'K-PBB-002', 'Roda Tiga', 'Avanza', 'Ersa Nur Maulana', 'D 3405 LEVI', 'mojodeso.jpg'),
('W-PBB-002', 'K-PBB-003', 'Roda Dua', 'Supra', 'Ersa Nur Maulana', 'D 3333 AW', 'mojodeso.jpg');

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
(1, '2020_10_17_131248_create_users_table', 1),
(2, '2020_10_17_131249_create_wargas_table', 1),
(3, '2020_11_17_131045_create_detail_wargas_table', 1),
(4, '2020_11_17_131238_create_surats_table', 1),
(5, '2020_11_17_144353_create_pengajuan_surats_table', 1),
(6, '2020_11_17_172832_create_kendaraans_table', 1),
(7, '2021_11_17_131066_create_keluhans_table', 1),
(8, '2021_11_17_131067_create_aspirasis_table', 1),
(9, '2021_11_17_131068_create_beritas_table', 1),
(10, '2021_11_17_131069_create_contents_table', 1),
(11, '2021_11_17_131070_create_dashboards_table', 1),
(12, '2021_11_17_131210_create_pengumumen_table', 1),
(13, '2021_11_17_172831_create_penguruses_table', 1),
(14, '2021_11_17_172833_create_user_roles_table', 1),
(15, '2021_11_17_172835_create_agamas_table', 1),
(16, '2021_11_17_172836_create_tokens_table', 1),
(17, '2021_11_17_172837_create_user_akses_menus_table', 1),
(18, '2021_11_17_172838_create_menus_table', 1),
(19, '2021_11_17_172839_create_aspirasi_table', 1),
(20, '2021_11_17_172839_create_fasilitas_table', 1),
(21, '2021_11_17_172839_create_keamanan_table', 1),
(22, '2021_11_17_172839_create_musrembang_table', 1),
(23, '2021_11_17_172839_create_notulansi_table', 1),
(24, '2021_11_17_172839_create_peraturan_table', 1),
(25, '2021_11_17_172839_create_user_sub_menus_table', 1),
(26, '2022_11_17_131108_create_pembayaran_iurans_table', 1),
(27, '2022_11_17_131124_create_keuangans_table', 1),
(28, '2022_11_17_131125_create_pemasukans_table', 1),
(29, '2022_11_17_131153_create_penggunaan_iurans_table', 1);

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

INSERT INTO `musrembang` (`id`, `program`, `kegiatan`, `sasaran`, `volume_lokasi`, `pengusul`, `keterangan`, `status`) VALUES
(1, 'Peningkatan Infrastruktur', 'Pengecoran Jalan', 'Kelancaran Lalu Lintas', 'Volume: 125 m\r\nLokasi: Rw.01\r\nKelurahan Gemolong\r\n-Sragen', 'Musyawarah RT di RW.01\r\nTanggal: 2020-11-01', 'Saat ini kondisi Jalan sudah tidak dapat dilalui oleh kendaraan karena terdapat lobang-lobang yang sangat besar dan dalam', 'Sudah diusulkan'),
(2, 'Peningkatan Kebersihan Lingkungan Hidup', 'Kerja Bakti', 'Perumah Permata Buah Batu', '100', 'Semua Warga', 'Kerja Bakti dilaksanakan jam 10 pagi', 'Diusulkan');

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

INSERT INTO `notulensi` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Rapat Paripurna', 'Tidak boleh makan di Toilet.', 'Januarizqi Dwi Mileniantoro', '2021-06-09 17:28:24', '2021-06-09 17:28:24', 'pbb.jpg');

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

INSERT INTO `pengajuan_surat` (`id_pengajuan_surat`, `id_detail_warga`, `pengajuan`, `tanggal_pengajuan`, `tanggal_disetujui`, `kode_surat`, `no_surat`, `rt`, `rw`, `nama_rt`, `nama_rw`, `verifikasi_rt`, `verifikasi_rw`) VALUES
('SURAT-002', 'W-001', 'Membuat Surat Pindah', '2021-04-21', '2021-04-22', '091201212', '121 / 213 / 5541XII', '1', '2', NULL, 'RAFIF YUSUF AVANDY', 'Diproses', 'Disetujui'),
('SURAT-004', 'W-006', 'na', '2021-04-22', '2021-04-22', '091201212', '121 / 213 / 5541XII', '1', '16', 'Ersa', 'Rafif Yusuf Avandy', 'Disetujui', 'Disetujui'),
('SURAT-005', 'W-003', 'Mau Papam Pindahan', '2021-06-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Diproses', 'Diproses'),
('SURAT-006', 'W-007', 'Pindahan', '2021-06-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Diproses', 'Diproses'),
('SURAT-007', 'W-005', 'as', '2021-06-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Diproses', 'Diproses');

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

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Anggota Eksekutif Baru', 'namanya Sam', 'Januarizqi Dwi Mileniantoro', '2021-03-18 09:17:28', '2021-03-20 20:49:58', 'bg-5.jpg'),
(2, 'dicoba', 'coba', 'Ersa Nur Maulana', '2021-03-19 05:48:04', '2021-03-19 05:48:04', 'bg-7 revisi.jpg'),
(3, 'Ever too late to lose weight?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post6.jpg'),
(4, 'Make your fitness Boost with us', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post1.jpg'),
(5, 'Ethernity beauty health diet plan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post2.jpg'),
(6, 'Ever too late to lose weight?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.', 'john stain', '2021-03-30 00:00:00', '2021-03-30 00:00:00', 'post3.jpg'),
(9, 'Pengumuman <br>Pengajian <span class=\"text-color\">Bulanan</span>', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.', 'Muhammad Haitsam', '2021-03-20 21:54:41', '2021-03-20 21:54:41', 'bg-7.jpeg'),
(10, 'Arisan RT 06', 'Yuu arisan gais', 'Januarizqi', '2021-06-10 22:37:59', '2021-06-10 22:37:59', 'teksas.jpg'),
(11, 'kritikasasasasasasas', 'mantap', 'Januarizqi', '2021-06-10 22:40:14', '2021-06-11 16:13:18', 'doctor-011.jpg');

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

INSERT INTO `peraturan` (`id`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Peraturan Perumahan Permata Buah Batu', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.', 'Januarizqi Dwi Mileniantoro', '2021-06-09 15:31:56', '2021-06-09 15:31:56', '605818c4adc061.jpg');

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

INSERT INTO `petugas_keamanan` (`id`, `nama`, `jabatan`, `foto`, `parent_id`) VALUES
(1, 'Akib Dahlan', 'Kepala Keamanan', 'akib.jpg', '0'),
(4, 'Olga Paurenta Simanihuruk', 'Anggota Keamanan', 'christopher-campbell-rDEOVtE7vOs-unsplash2.jpg', '1');

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

INSERT INTO `struktur` (`id`, `nama`, `jabatan`, `foto`, `parent_id`) VALUES
(1, 'Ersa Nur Maulana', 'Ketua RT', 'Ersa_Nur_Maulana-min.JPG', NULL),
(2, 'Januarizqi Dwi Mileniantoro', 'Sie. Keamanan', 'Januarizqi_Dwi_M_-min1.JPG', '1'),
(3, 'Alya Putri Maharani', 'Sie. Kebersihan', '4-min.JPG', '1'),
(6, 'Nurul Fadhilah', 'Sie. PKK', '6-min.JPG', '1'),
(12, 'Olga Paurenta Simanihuruk', 'Bendahara', '2019-06-05_11_59_30_1-min_(1).jpg', '1'),
(13, 'sofwan f', 'Atasan', 'mojodeso.jpg', '1');

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

INSERT INTO `surat` (`id_surat`, `id_admin`, `judul`, `keterangan_surat`, `file_surat`) VALUES
('S-PBB-001', 2, 'Arisan RT 06', 'Wajib Hadir Semuanya Karena Ada DoorPrize', 'Bagaimana_cara_memebuat_border_pada_table_menggunakan_styling_CSS_dibawah_ini.docx');

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
(1, 'Rafif Yusuf Avandy', 'rafifyusuf', 'rafifyusuf@gmail.com', '$2y$10$jzPhvP0r2r70zVPGkzX7E.GYoCiJ2aki8ztuqAVDXdLei5b8FPWKu', 'Laki-laki', '122121', '2021-04-20', '082116097045', 'Komplek Bsa Blok H No.7\r\nBojongsoang', 1, 'default.svg', 7, 1, '2021-05-12', NULL, '16'),
(2, 'Ersa', 'admin', 'ersanurzz@mail.com', '$2y$10$AUVE4Guxhfqf/SPDtPmx0OITJTmJJbSWKR2EWrMP9hWJYcV5p7ILC', 'Perempuan', '122121', '2021-05-06', '082116097045', 'Komplek Bsa Blok H No.7\r\nBojongsoang', 2, 'default.svg', 6, 1, '2021-05-12', '1', NULL),
(3, 'Januarizqi', 'janu', 'januarrizqi5@gmail.com', '$2y$10$54Ajl0R.ArBF45hyXCsJZOnTdLzoegtv9nJbBRs3ICk1QBv1kS5yW', 'Laki-laki', 'Kediri', '2021-05-12', '085717295156', 'Kediri', 1, 'Januarizqi_Dwi_M_-min1.JPG', 1, 1, '2021-05-26', NULL, NULL),
(4, 'Rafif Yusuf Avandy', 'rafifyusufa', 'rafifyusuaf@gmail.com', '$2y$10$hOhneBpI74Ut53fFx72OxeQf6kHggvxpd/LiumdMCG4apejlbiJyu', 'Laki-laki', 'bandua', '2021-06-04', '082116097045', 'Komplek Bojongsoang Asri 1 Blok H.No7 Rt 01 Rw 16 ,Kecamatan Bojongsoang Kabupaten Badung', 2, 'default.svg', 5, 0, '0000-00-00', NULL, NULL);

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

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'haitsam03@gmail.com', 'iscmRCWne+lTCfqz/25n5R8VUX5MUkaN02Bhum3gVsU=', 1609930420),
(5, 'haitsam03@gmail.com', 'n5QKD1D9vUL9QiROw9MO4pgD/fbbdFGYrGd8znIJWe4=', 1609932048),
(6, 'haitsam03@gmail.com', 'wPG+3htmGqTKAArzVlpS/b0eoqor9TKqG16H5cDvMqA=', 1609932054),
(7, 'aa@aa.a', 'oIK0LUztcU02aYAE6HG86eh7Fq5/TcK17wF7B/To+/k=', 1609941391),
(8, 'wahyuhidayat@gmail.com', 'h5OYZb29deEXYS/1Bc69GOaWseVwGEhhSXVKert9Oog=', 1610019862),
(9, 'pramuko@gmail.com', 'ijlFNaUwBrUcqEbANwlEml1FluVkgWAOvEPf3VtE9H4=', 1610019892),
(10, 'elyrosely@gmail.com', 'zLt8OC5aT9LrQaCipRl09/n95aUTUUjwCiVtKM150uA=', 1610019940),
(11, 'inne@gmail.com', '6kl2FFh6027PAQ51K03uIlFz8f3+e59snpxLo3jAOBE=', 1610019985),
(12, 'wawa@gmail.com', '/g7m4I60ysY6Ljs6xsHhye5zWPyA0eR/4qwv7r7czlo=', 1610020015),
(13, 'fasaldo1999@gmail.com', 'fOSWX9UdFnoi7ejSOIkhye7te1tVdT+cXmd1hh0YZCQ=', 1610023446),
(15, 'muhammadbarja@gmail.com', 'VpatS/tgTK/bfTZLlDDoVX9aaD6Kb3YoeS2/ozJOhXI=', 1610280453),
(16, 'januarizqi5@gmail.com', '8QKHOpK1ROQrW679QbREt1fb2wdgcsffl5PLahNGPws=', 1610507816),
(17, 'suryatiningsih@gmail.com', 'IvVR3KjJpnh+lnQgeWOmpht3w235j9Vax2GkkDCzUBE=', 1610509684),
(18, 'ersanum@gmail.com', 'Tst2ygGt8n2wUa+RsqvtHguZMn1KPTaiNE63D4wwehQ=', 1610529882),
(19, 'haitsamhaitsam18@yahoo.com', '06vONmPAIi0hj/xgLH72Ck6FSDDyqs96P9pxA5bOU54=', 1610556667),
(20, 'shibghotul7@gmail.com', 'zLT3U4RCMM6pc1pVBCI3SodKzlAVJmG13PbfY8ijFnU=', 1610556792),
(21, 'haitsam03@gmail.com', 'oVyGSYjGv4lTvFvUKawPJ96cj42FYlkQW8QcyPDghSQ=', 1611588824),
(22, 'akibdahlan20@gmail.com', 'Q5sF4roomYzNnHkIS0zKCHKteza6KwrK5GYaHqlJr8w=', 1614472096),
(23, 'akibdahlan21@gmail.com', 'M23yBdkPPwctLera1YG1Eccpx5PFhn1vNyKEeEqVpT0=', 1614472317),
(24, 'wakwaw@gmail.com', 'iOURcncfWdC6WJhj6FEhYRCWPFMmfu25d+RbC4txFL8=', 1617169234),
(25, 'rafifyusuf@gmail.com', 'T9eglMPMhiWbZ/imQdn7pR1TvieId+Q+R9AG580MMyY=', 1618821536),
(26, 'rafifyusuf@gmail.com', 'xvzV1SheLdbdR9+DavEAHB6illoNnnn8Po3sQp3NsnY=', 1618895004),
(27, 'rafifyusuaf@gmail.com', 'tWAPCcwf+qZVQTa2fguSfGUIaBAoiHMTfCoRzMFPwlk=', 1623338757);

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

INSERT INTO `warga` (`id_warga`, `no_rumah`, `no_kk`, `alamat`, `jumlah_keluarga`, `status_rumah`, `status_rumah_tangga`, `rt`, `rw`, `file_kk`) VALUES
('W-PBB-001', 'H-7', '1234567890123456', 'Komplek PBB 1', 2, 'Rumah Usaha', NULL, '1', '2', 'ipung2.jpg'),
('W-PBB-002', 'C-10', '1234567890123456', 'Komplek Pbb', 3, 'Rumah Usaha', 'KIS, RASKIN', '1', '1', 'kk_1622601649.jpg'),
('W-PBB-003', 'E-1', '1234567890123456', 'Komplek PBB Ceria', 2, 'Rumah Usaha', NULL, '1', '1', '633547.jpg'),
('W-PBB-004', '22-B', '3204082302800004', 'gg.pa edo ', 3, 'Rumah Tinggal', NULL, '1', '16', 'kk_1622615590.jpg'),
('W-PBB-005', 'B-151', '1234567890123456', 'asasasas', 3, 'Rumah Usaha', 'KIS, RASKIN, KIP', '1', '2', 'kayangan_api4.jpg');

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
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_iuran_warga`
--
ALTER TABLE `data_iuran_warga`
  MODIFY `no_tagihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2106034053;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
