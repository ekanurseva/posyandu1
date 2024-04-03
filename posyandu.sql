-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2024 pada 11.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `balita`
--

CREATE TABLE `balita` (
  `id_balita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `idposyandu` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `nik_balita` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `balita`
--

INSERT INTO `balita` (`id_balita`, `id_user`, `idposyandu`, `nama_ayah`, `nama_balita`, `nik_balita`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(11, 15, 3, 'Dani', 'M. Rahandika', '09999999999999', 'Cirebon', '2023-09-26 00:00:00', 'Laki-Laki'),
(12, 16, 3, 'Ade saputra', 'raffa Izam Saputra', '320914050720003', 'Cirebon', '2020-07-08 00:00:00', 'Laki-Laki'),
(13, 18, 3, 'Muhammad Nuryaman', 'Muhammad Nurcakra Alam', '3209140305190001', 'Cirebon', '2019-05-03 00:00:00', 'Laki-Laki'),
(14, 19, 3, 'Muktar Kusuma Atmaja', 'Qianna Arsyila Kusuma Ningrum', '3209146312190002', 'Cirebon', '2019-12-23 00:00:00', 'Perempuan'),
(15, 25, 3, 'pulung', 'Dafarel J.', '099999999999999', 'cirebon', '2019-03-27 00:00:00', 'Laki-Laki'),
(16, 15, 3, 'Dani', 'M.Gibran shaka', '3209141104210003', 'cirebon', '2018-04-02 00:00:00', 'Laki-Laki'),
(17, 27, 3, '-', 'Raden Yumna Hasna Rania', '3209146304210001', 'Cirebon', '2019-02-23 00:00:00', 'Perempuan'),
(18, 30, 10, 'Eko', 'Arumi Nasha Sabie', '09999999999999', 'Cirebon', '2024-01-02 00:00:00', 'Perempuan'),
(19, 31, 10, 'Febi', 'Nasya', '099999999999999', 'Cirebon', '2023-10-19 00:00:00', 'Perempuan'),
(20, 39, 10, 'Rahmat', 'Haikal', '099999999999999', 'Cirebon', '2019-03-31 00:00:00', 'Laki-Laki'),
(21, 40, 3, 'Dedi', 'Yuka Maheswari', '3209145909220001', 'Cirebon', '2022-09-09 00:00:00', 'Perempuan'),
(22, 41, 3, 'Ridwan', 'Amira Kamala', '3209144608210001', 'cirebon', '2021-08-06 00:00:00', 'Perempuan'),
(26, 18, 3, 'fakhri', 'faeyza', '0999999999999', 'cirebon', '2021-02-12 00:00:00', 'Laki-Laki'),
(27, 14, 10, 'Bobo', 'Cina', '10291', 'Cirebon', '2023-06-13 00:00:00', 'Laki-Laki'),
(28, 19, 3, 'Bobo', 'Gugun', '134', 'Cirebon', '2024-01-01 00:00:00', 'Laki-Laki'),
(29, 19, 9, 'Bobo', 'Tasya', '3019', 'Cirebon', '2024-01-23 00:00:00', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imunisasi` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `jenis_imunisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `imunisasi`
--

INSERT INTO `imunisasi` (`id_imunisasi`, `id_balita`, `idjadwal`, `jenis_imunisasi`) VALUES
(7, 11, 7, 'Bacillus Calmette-Guerin (BCG)'),
(8, 18, 9, ' HBO (Hepatitis BO)'),
(9, 14, 35, 'Bacillus Calmette-Guerin (BCG)'),
(11, 21, 7, 'Bacillus Calmette-Guerin (BCG)'),
(14, 16, 7, 'Polio'),
(15, 22, 35, 'Bacillus Calmette-Guerin (BCG)'),
(16, 26, 35, 'Bacillus Calmette-Guerin (BCG)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jdw_posyandu`
--

CREATE TABLE `jdw_posyandu` (
  `idjadwal` int(11) NOT NULL,
  `idposyandu` int(11) NOT NULL,
  `jadwal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jdw_posyandu`
--

INSERT INTO `jdw_posyandu` (`idjadwal`, `idposyandu`, `jadwal`) VALUES
(6, 3, '2024-02-15 20:37:00'),
(7, 3, '2024-03-12 08:00:00'),
(9, 10, '2024-03-06 07:00:00'),
(10, 11, '2024-03-05 08:00:00'),
(11, 11, '2024-04-02 08:00:00'),
(12, 11, '2024-05-07 08:00:00'),
(13, 11, '2024-06-04 08:00:00'),
(14, 11, '2024-07-09 08:00:00'),
(15, 11, '2024-08-06 08:00:00'),
(16, 11, '2024-09-03 08:00:00'),
(17, 11, '2024-10-08 08:00:00'),
(18, 11, '2024-11-05 08:00:00'),
(19, 11, '2024-12-03 08:00:00'),
(20, 10, '2024-04-03 08:00:00'),
(21, 10, '2024-05-08 08:00:00'),
(22, 10, '2024-06-05 08:00:00'),
(23, 10, '2024-07-10 08:00:00'),
(24, 10, '2024-08-07 08:00:00'),
(25, 10, '2024-09-04 08:00:00'),
(26, 10, '2024-10-09 08:00:00'),
(27, 10, '2024-11-06 08:00:00'),
(28, 10, '2024-12-04 08:00:00'),
(29, 9, '2024-03-13 08:00:00'),
(30, 9, '2024-04-17 08:00:00'),
(31, 9, '2024-05-15 08:00:00'),
(32, 9, '2024-07-17 08:00:00'),
(33, 9, '2024-08-14 08:00:00'),
(34, 9, '2024-09-11 08:00:00'),
(35, 3, '2024-04-16 08:00:00'),
(36, 3, '2024-05-14 08:00:00'),
(37, 3, '2024-06-11 08:00:00'),
(38, 3, '2024-07-16 08:00:00'),
(39, 3, '2024-08-13 08:00:00'),
(40, 3, '2024-09-10 08:00:00'),
(41, 3, '2024-10-15 08:00:00'),
(42, 3, '2024-11-12 08:00:00'),
(43, 3, '2024-12-10 08:00:00'),
(44, 9, '2024-10-16 08:00:00'),
(45, 9, '2024-11-13 08:00:00'),
(46, 9, '2024-12-11 08:00:00'),
(47, 9, '2024-06-12 08:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kader`
--

CREATE TABLE `kader` (
  `id_kader` int(11) NOT NULL,
  `id_posyandu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kader`
--

INSERT INTO `kader` (`id_kader`, `id_posyandu`, `id_user`) VALUES
(5, 3, 14),
(6, 10, 21),
(7, 9, 20),
(8, 11, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penimbangan`
--

CREATE TABLE `penimbangan` (
  `id_timbang` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `berat_badan` varchar(50) NOT NULL,
  `tinggi_badan` varchar(50) NOT NULL,
  `status_gizi` varchar(50) NOT NULL,
  `lila` double NOT NULL,
  `lika` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penimbangan`
--

INSERT INTO `penimbangan` (`id_timbang`, `id_balita`, `idjadwal`, `berat_badan`, `tinggi_badan`, `status_gizi`, `lila`, `lika`) VALUES
(4, 11, 7, '5.5', '60', 'gizi baik', 13, 40),
(5, 22, 7, '10', '84.5', 'gizi baik', 13, 47.5),
(6, 21, 7, '10.15', '77.5', 'gizi baik', 15, 46.5),
(7, 12, 7, '11.7', '90', 'gizi baik', 15, 48),
(8, 13, 7, '15.50', '10.2', 'gizi baik', 17.2, 49.3),
(9, 14, 7, '14.75', '103.5', 'gizi baik', 16, 48.7),
(10, 15, 7, '6.59', '69', 'gizi baik', 12.5, 42),
(11, 17, 7, '11.6', '87.3', 'gizi baik', 15, 48),
(12, 16, 7, '5.5', '60', 'gizi baik', 13, 40),
(14, 26, 35, '2.5', '90', 'baik', 2, 3),
(15, 14, 35, '15', '100', 'Gizi Baik', 121, 121),
(16, 14, 36, '15.4', '100', 'Gizi Baik', 121, 121),
(17, 14, 37, '15.8', '120', 'Gizi Baik', 121, 121),
(18, 28, 35, '1.2', '80', 'Gizi Buruk', 123, 123),
(19, 28, 36, '2', '100', 'Gizi Buruk', 121, 121),
(20, 28, 37, '2.4', '123', 'Gizi Buruk', 123, 123),
(21, 29, 30, '1.2', '100', 'Gizi Buruk', 123, 123),
(22, 29, 31, '2', '120', 'Gizi Buruk', 121, 121),
(23, 29, 47, '2.8', '123', 'Gizi Kurang', 121, 121);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pmt`
--

CREATE TABLE `pmt` (
  `idpmt` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `jenis_pmt` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pmt`
--

INSERT INTO `pmt` (`idpmt`, `idjadwal`, `jenis_pmt`) VALUES
(6, 9, 'Puding Buah'),
(7, 10, 'Puding Buah'),
(8, 7, 'Puding Buah'),
(9, 29, 'Puding Buah'),
(10, 11, 'Bronis Kukus'),
(11, 20, 'Bronis Kukus'),
(12, 35, 'Bronis Kukus'),
(13, 30, 'Bronis Kukus'),
(14, 12, 'Susu'),
(15, 21, 'Susu'),
(16, 36, 'Susu'),
(17, 31, 'Susu'),
(18, 13, 'Telur Puyuh'),
(19, 22, 'Telur Puyuh'),
(20, 37, 'Telur Puyuh'),
(21, 14, 'Sosis'),
(23, 23, 'Sosis'),
(24, 38, 'Sosis'),
(25, 32, 'Sosis'),
(26, 15, 'Bubur Kacang'),
(27, 24, 'Bubur Kacang'),
(28, 39, 'Bubur Kacang'),
(29, 33, 'Bubur Kacang'),
(30, 16, 'Telur'),
(31, 25, 'Telur'),
(32, 40, 'Telur'),
(33, 34, 'Telur'),
(34, 17, 'Buras'),
(35, 26, 'Buras'),
(36, 41, 'Buras'),
(37, 44, 'Buras'),
(38, 18, 'Puding Buah'),
(39, 27, 'Puding Buah'),
(40, 19, 'Susu'),
(41, 42, 'Telur'),
(43, 45, 'Telur'),
(44, 47, 'Telur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandu`
--

CREATE TABLE `posyandu` (
  `id_posyandu` int(11) NOT NULL,
  `nama_posyandu` varchar(50) NOT NULL,
  `alamat_posyandu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posyandu`
--

INSERT INTO `posyandu` (`id_posyandu`, `nama_posyandu`, `alamat_posyandu`) VALUES
(3, 'Dahlia', ' RW II (RT 05, 06, 07)'),
(9, 'Arya Salingsingan', 'RW III ( RT 08,09,10)'),
(10, 'Kuntum Mekar', 'RW I (RT 03, 04) '),
(11, 'Mekar Wangi', 'RW I (RT 01,02)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_gizi`
--

CREATE TABLE `status_gizi` (
  `id` int(11) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `batas_bawah` double NOT NULL,
  `batas_atas` double NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_gizi`
--

INSERT INTO `status_gizi` (`id`, `jk`, `umur`, `batas_bawah`, `batas_atas`, `keterangan`) VALUES
(1, 'Laki-Laki', 0, 0, 1.9, 'Gizi Buruk'),
(2, 'Laki-Laki', 0, 2, 2.3, 'Gizi Kurang'),
(3, 'Laki-Laki', 0, 2.4, 4.2, 'Gizi Baik'),
(4, 'Laki-Laki', 0, 4.3, 1000, 'Gizi Lebih'),
(5, 'Laki-Laki', 1, 0, 2.1, 'Gizi Buruk'),
(6, 'Laki-Laki', 1, 2.2, 2.8, 'Gizi Kurang'),
(7, 'Laki-Laki', 1, 2.9, 5.5, 'Gizi Baik'),
(8, 'Laki-Laki', 1, 5.6, 1000, 'Gizi Lebih'),
(9, 'Laki-Laki', 2, 0, 2.5, 'Gizi Buruk'),
(10, 'Laki-Laki', 2, 2.6, 3.4, 'Gizi Kurang'),
(11, 'Laki-Laki', 2, 3.5, 6.7, 'Gizi Baik'),
(12, 'Laki-Laki', 2, 6.8, 1000, 'Gizi Lebih'),
(13, 'Laki-Laki', 3, 0, 3, 'Gizi Buruk'),
(14, 'Laki-Laki', 3, 3.1, 4, 'Gizi Kurang'),
(15, 'Laki-Laki', 3, 4.1, 7.6, 'Gizi Baik'),
(16, 'Laki-Laki', 3, 7.7, 1000, 'Gizi Lebih'),
(17, 'Laki-Laki', 4, 0, 3.6, 'Gizi Buruk'),
(18, 'Laki-Laki', 4, 3.7, 4.6, 'Gizi Kurang'),
(19, 'Laki-Laki', 4, 4.7, 8.4, 'Gizi Baik'),
(20, 'Laki-Laki', 4, 8.5, 1000, 'Gizi Lebih'),
(21, 'Laki-Laki', 5, 0, 4.2, 'Gizi Buruk'),
(22, 'Laki-Laki', 5, 4.3, 5.2, 'Gizi Kurang'),
(23, 'Laki-Laki', 5, 5.3, 9.1, 'Gizi Baik'),
(24, 'Laki-Laki', 5, 9.2, 1000, 'Gizi Lebih'),
(25, 'Laki-Laki', 6, 0, 4.8, 'Gizi Buruk'),
(26, 'Laki-Laki', 6, 4.9, 5.8, 'Gizi Kurang'),
(27, 'Laki-Laki', 6, 5.9, 9.7, 'Gizi Baik'),
(28, 'Laki-Laki', 6, 9.8, 1000, 'Gizi Lebih'),
(29, 'Laki-Laki', 7, 0, 5.3, 'Gizi Buruk'),
(30, 'Laki-Laki', 7, 5.4, 6.3, 'Gizi Kurang'),
(31, 'Laki-Laki', 7, 6.4, 10.2, 'Gizi Baik'),
(32, 'Laki-Laki', 7, 10.3, 1000, 'Gizi Lebih'),
(33, 'Laki-Laki', 8, 0, 5.8, 'Gizi Buruk'),
(34, 'Laki-Laki', 8, 5.9, 6.8, 'Gizi Kurang'),
(35, 'Laki-Laki', 8, 6.9, 10.7, 'Gizi Baik'),
(36, 'Laki-Laki', 8, 10.8, 1000, 'Gizi Lebih'),
(37, 'Laki-Laki', 9, 0, 6.2, 'Gizi Buruk'),
(38, 'Laki-Laki', 9, 6.3, 7.1, 'Gizi Kurang'),
(39, 'Laki-Laki', 9, 7.2, 11.2, 'Gizi Baik'),
(40, 'Laki-Laki', 9, 11.3, 1000, 'Gizi Lebih'),
(41, 'Laki-Laki', 10, 0, 6.5, 'Gizi Buruk'),
(42, 'Laki-Laki', 10, 6.6, 7.5, 'Gizi Kurang'),
(43, 'Laki-Laki', 10, 7.6, 11.6, 'Gizi Baik'),
(44, 'Laki-Laki', 10, 11.7, 1000, 'Gizi Lebih'),
(45, 'Laki-Laki', 11, 0, 6.8, 'Gizi Buruk'),
(46, 'Laki-Laki', 11, 6.9, 7.8, 'Gizi Kurang'),
(47, 'Laki-Laki', 11, 7.9, 11.9, 'Gizi Baik'),
(48, 'Laki-Laki', 11, 12, 1000, 'Gizi Lebih'),
(49, 'Laki-Laki', 12, 0, 7, 'Gizi Buruk'),
(50, 'Laki-Laki', 12, 7.1, 8, 'Gizi Kurang'),
(51, 'Laki-Laki', 12, 8.1, 12.3, 'Gizi Baik'),
(52, 'Laki-Laki', 12, 12.4, 1000, 'Gizi Lebih'),
(53, 'Laki-Laki', 13, 0, 7.2, 'Gizi Buruk'),
(54, 'Laki-Laki', 13, 7.3, 8.2, 'Gizi Kurang'),
(55, 'Laki-Laki', 13, 8.3, 12.6, 'Gizi Baik'),
(56, 'Laki-Laki', 13, 12.7, 1000, 'Gizi Lebih'),
(57, 'Laki-Laki', 14, 0, 7.4, 'Gizi Buruk'),
(58, 'Laki-Laki', 14, 7.5, 8.4, 'Gizi Kurang'),
(59, 'Laki-Laki', 14, 8.5, 12.9, 'Gizi Baik'),
(60, 'Laki-Laki', 14, 13, 1000, 'Gizi Lebih'),
(61, 'Laki-Laki', 15, 0, 7.5, 'Gizi Buruk'),
(62, 'Laki-Laki', 15, 7.6, 8.6, 'Gizi Kurang'),
(63, 'Laki-Laki', 15, 8.7, 13.1, 'Gizi Baik'),
(64, 'Laki-Laki', 15, 13.2, 1000, 'Gizi Lebih'),
(65, 'Laki-Laki', 16, 0, 7.6, 'Gizi Buruk'),
(66, 'Laki-Laki', 16, 7.7, 8.7, 'Gizi Kurang'),
(67, 'Laki-Laki', 16, 8.8, 13.4, 'Gizi Baik'),
(68, 'Laki-Laki', 16, 13.5, 1000, 'Gizi Lebih'),
(69, 'Laki-Laki', 17, 0, 7.7, 'Gizi Buruk'),
(70, 'Laki-Laki', 17, 7.8, 8.9, 'Gizi Kurang'),
(71, 'Laki-Laki', 17, 9, 13.6, 'Gizi Baik'),
(72, 'Laki-Laki', 17, 13.7, 1000, 'Gizi Lebih'),
(73, 'Laki-Laki', 18, 0, 7.8, 'Gizi Buruk'),
(74, 'Laki-Laki', 18, 7.9, 9, 'Gizi Kurang'),
(75, 'Laki-Laki', 18, 9.1, 13.8, 'Gizi Baik'),
(76, 'Laki-Laki', 18, 13.9, 1000, 'Gizi Lebih'),
(77, 'Laki-Laki', 19, 0, 7.9, 'Gizi Buruk'),
(78, 'Laki-Laki', 19, 8, 9.1, 'Gizi Kurang'),
(79, 'Laki-Laki', 19, 9.2, 14, 'Gizi Baik'),
(80, 'Laki-Laki', 19, 14.1, 1000, 'Gizi Lebih'),
(81, 'Laki-Laki', 20, 0, 8, 'Gizi Buruk'),
(82, 'Laki-Laki', 20, 8.1, 9.3, 'Gizi Kurang'),
(83, 'Laki-Laki', 20, 9.4, 14.3, 'Gizi Baik'),
(84, 'Laki-Laki', 20, 14.4, 1000, 'Gizi Lebih'),
(85, 'Laki-Laki', 21, 0, 8.2, 'Gizi Buruk'),
(86, 'Laki-Laki', 21, 9.3, 9.4, 'Gizi Kurang'),
(87, 'Laki-Laki', 21, 9.5, 14.5, 'Gizi Baik'),
(88, 'Laki-Laki', 21, 14.6, 1000, 'Gizi Lebih'),
(89, 'Laki-Laki', 22, 0, 8.3, 'Gizi Buruk'),
(90, 'Laki-Laki', 22, 8.4, 9.6, 'Gizi Kurang'),
(91, 'Laki-Laki', 22, 9.7, 14.7, 'Gizi Baik'),
(92, 'Laki-Laki', 22, 14.8, 1000, 'Gizi Lebih'),
(93, 'Laki-Laki', 23, 0, 8.4, 'Gizi Buruk'),
(94, 'Laki-Laki', 23, 8.5, 9.7, 'Gizi Kurang'),
(95, 'Laki-Laki', 23, 9.8, 14.9, 'Gizi Baik'),
(96, 'Laki-Laki', 23, 15, 1000, 'Gizi Lebih'),
(97, 'Laki-Laki', 24, 0, 8.9, 'Gizi Buruk'),
(98, 'Laki-Laki', 24, 9, 10, 'Gizi Kurang'),
(99, 'Laki-Laki', 24, 10.1, 15.6, 'Gizi Baik'),
(100, 'Laki-Laki', 24, 15.7, 1000, 'Gizi Lebih'),
(101, 'Laki-Laki', 25, 0, 8.9, 'Gizi Buruk'),
(102, 'Laki-Laki', 25, 9, 10.1, 'Gizi Kurang'),
(103, 'Laki-Laki', 25, 10.2, 15.8, 'Gizi Baik'),
(104, 'Laki-Laki', 25, 15.9, 1000, 'Gizi Lebih'),
(105, 'Laki-Laki', 26, 0, 9, 'Gizi Buruk'),
(106, 'Laki-Laki', 26, 9.1, 10.2, 'Gizi Kurang'),
(107, 'Laki-Laki', 26, 10.3, 16, 'Gizi Baik'),
(108, 'Laki-Laki', 26, 16.1, 1000, 'Gizi Lebih'),
(109, 'Laki-Laki', 27, 0, 9, 'Gizi Buruk'),
(110, 'Laki-Laki', 27, 9.1, 10.3, 'Gizi Kurang'),
(111, 'Laki-Laki', 27, 10.4, 16.2, 'Gizi Baik'),
(112, 'Laki-Laki', 27, 16.3, 1000, 'Gizi Lebih'),
(113, 'Laki-Laki', 28, 0, 9.1, 'Gizi Buruk'),
(114, 'Laki-Laki', 28, 9.2, 10.4, 'Gizi Kurang'),
(115, 'Laki-Laki', 28, 10.5, 16.5, 'Gizi Baik'),
(116, 'Laki-Laki', 28, 16.6, 1000, 'Gizi Lebih'),
(117, 'Laki-Laki', 29, 0, 9.2, 'Gizi Buruk'),
(118, 'Laki-Laki', 29, 9.3, 10.5, 'Gizi Kurang'),
(119, 'Laki-Laki', 29, 10.6, 16.7, 'Gizi Baik'),
(120, 'Laki-Laki', 29, 16.8, 1000, 'Gizi Lebih'),
(121, 'Laki-Laki', 30, 0, 9.3, 'Gizi Buruk'),
(122, 'Laki-Laki', 30, 9.4, 10.6, 'Gizi Kurang'),
(123, 'Laki-Laki', 30, 10.7, 16.9, 'Gizi Baik'),
(124, 'Laki-Laki', 30, 17, 1000, 'Gizi Lebih'),
(125, 'Laki-Laki', 31, 0, 9.3, 'Gizi Buruk'),
(126, 'Laki-Laki', 31, 9.4, 10.8, 'Gizi Kurang'),
(127, 'Laki-Laki', 31, 10.9, 17.1, 'Gizi Baik'),
(128, 'Laki-Laki', 31, 17.2, 1000, 'Gizi Lebih'),
(129, 'Laki-Laki', 32, 0, 9.4, 'Gizi Buruk'),
(130, 'Laki-Laki', 32, 9.5, 10.9, 'Gizi Kurang'),
(131, 'Laki-Laki', 32, 11, 17.3, 'Gizi Baik'),
(132, 'Laki-Laki', 32, 17.4, 1000, 'Gizi Lebih'),
(133, 'Laki-Laki', 33, 0, 9.5, 'Gizi Buruk'),
(134, 'Laki-Laki', 33, 9.6, 11, 'Gizi Kurang'),
(135, 'Laki-Laki', 33, 11.1, 17.5, 'Gizi Baik'),
(136, 'Laki-Laki', 33, 17.6, 1000, 'Gizi Lebih'),
(141, 'Laki-Laki', 34, 0, 9.6, 'Gizi Buruk'),
(142, 'Laki-Laki', 34, 9.7, 11.1, 'Gizi Kurang'),
(143, 'Laki-Laki', 34, 11.2, 17.7, 'Gizi Baik'),
(144, 'Laki-Laki', 34, 17.8, 1000, 'Gizi Lebih'),
(145, 'Laki-Laki', 35, 0, 9.6, 'Gizi Buruk'),
(146, 'Laki-Laki', 35, 9.7, 11.2, 'Gizi Kurang'),
(147, 'Laki-Laki', 35, 11.3, 17.9, 'Gizi Baik'),
(148, 'Laki-Laki', 35, 18, 1000, 'Gizi Lebih'),
(149, 'Laki-Laki', 36, 0, 9.7, 'Gizi Buruk'),
(150, 'Laki-Laki', 36, 9.8, 11.3, 'Gizi Kurang'),
(151, 'Laki-Laki', 36, 11.4, 18.2, 'Gizi Baik'),
(152, 'Laki-Laki', 36, 18.3, 1000, 'Gizi Lebih'),
(153, 'Laki-Laki', 37, 0, 9.8, 'Gizi Buruk'),
(154, 'Laki-Laki', 37, 9.9, 11.4, 'Gizi Kurang'),
(155, 'Laki-Laki', 37, 11.5, 18.4, 'Gizi Baik'),
(156, 'Laki-Laki', 37, 18.5, 1000, 'Gizi Lebih'),
(157, 'Laki-Laki', 38, 0, 9.9, 'Gizi Buruk'),
(158, 'Laki-Laki', 38, 10, 11.6, 'Gizi Kurang'),
(159, 'Laki-Laki', 38, 11.7, 18.6, 'Gizi Baik'),
(160, 'Laki-Laki', 38, 18.7, 1000, 'Gizi Lebih'),
(161, 'Laki-Laki', 39, 0, 10, 'Gizi Buruk'),
(162, 'Laki-Laki', 39, 10.1, 11.7, 'Gizi Kurang'),
(163, 'Laki-Laki', 39, 11.8, 18.8, 'Gizi Baik'),
(164, 'Laki-Laki', 39, 18.9, 1000, 'Gizi Lebih'),
(165, 'Laki-Laki', 40, 0, 10.1, 'Gizi Buruk'),
(166, 'Laki-Laki', 40, 10.2, 11.8, 'Gizi Kurang'),
(167, 'Laki-Laki', 40, 11.9, 19.1, 'Gizi Baik'),
(168, 'Laki-Laki', 40, 19.2, 1000, 'Gizi Lebih'),
(169, 'Laki-Laki', 41, 0, 10.2, 'Gizi Buruk'),
(170, 'Laki-Laki', 41, 10.3, 11.9, 'Gizi Kurang'),
(171, 'Laki-Laki', 41, 12, 19.2, 'Gizi Baik'),
(172, 'Laki-Laki', 41, 19.3, 1000, 'Gizi Lebih'),
(173, 'Laki-Laki', 42, 0, 10.3, 'Gizi Buruk'),
(174, 'Laki-Laki', 42, 10.4, 12, 'Gizi Kurang'),
(175, 'Laki-Laki', 42, 12.1, 19.4, 'Gizi Baik'),
(176, 'Laki-Laki', 42, 19.5, 1000, 'Gizi Lebih'),
(177, 'Laki-Laki', 43, 0, 10.4, 'Gizi Buruk'),
(178, 'Laki-Laki', 43, 10.5, 12.2, 'Gizi Kurang'),
(179, 'Laki-Laki', 43, 12.3, 19.6, 'Gizi Baik'),
(180, 'Laki-Laki', 43, 19.7, 1000, 'Gizi Lebih'),
(181, 'Laki-Laki', 44, 0, 10.5, 'Gizi Buruk'),
(182, 'Laki-Laki', 44, 10.6, 12.3, 'Gizi Kurang'),
(183, 'Laki-Laki', 44, 12.4, 19.8, 'Gizi Baik'),
(184, 'Laki-Laki', 44, 19.9, 1000, 'Gizi Lebih'),
(185, 'Laki-Laki', 45, 0, 10.6, 'Gizi Buruk'),
(186, 'Laki-Laki', 45, 10.7, 12.4, 'Gizi Kurang'),
(187, 'Laki-Laki', 45, 12.5, 20, 'Gizi Baik'),
(188, 'Laki-Laki', 45, 20.1, 1000, 'Gizi Lebih'),
(189, 'Laki-Laki', 46, 0, 10.7, 'Gizi Buruk'),
(190, 'Laki-Laki', 46, 10.8, 12.5, 'Gizi Kurang'),
(191, 'Laki-Laki', 46, 12.6, 20.3, 'Gizi Baik'),
(192, 'Laki-Laki', 46, 20.4, 1000, 'Gizi Lebih'),
(193, 'Laki-Laki', 47, 0, 10.8, 'Gizi Buruk'),
(194, 'Laki-Laki', 47, 10.9, 12.7, 'Gizi Kurang'),
(195, 'Laki-Laki', 47, 12.8, 20.5, 'Gizi Baik'),
(196, 'Laki-Laki', 47, 20.6, 1000, 'Gizi Lebih'),
(197, 'Laki-Laki', 48, 0, 10.9, 'Gizi Buruk'),
(198, 'Laki-Laki', 48, 11, 12.8, 'Gizi Kurang'),
(199, 'Laki-Laki', 48, 12.9, 20.7, 'Gizi Baik'),
(200, 'Laki-Laki', 48, 20.8, 1000, 'Gizi Lebih'),
(201, 'Laki-Laki', 49, 0, 11, 'Gizi Buruk'),
(202, 'Laki-Laki', 49, 11.1, 12.9, 'Gizi Kurang'),
(203, 'Laki-Laki', 49, 13, 20.9, 'Gizi Baik'),
(204, 'Laki-Laki', 49, 21, 1000, 'Gizi Lebih'),
(205, 'Laki-Laki', 50, 0, 11.1, 'Gizi Buruk'),
(206, 'Laki-Laki', 50, 11.2, 13, 'Gizi Kurang'),
(207, 'Laki-Laki', 50, 13.1, 21.1, 'Gizi Baik'),
(208, 'Laki-Laki', 50, 21.2, 1000, 'Gizi Lebih'),
(209, 'Laki-Laki', 51, 0, 11.2, 'Gizi Buruk'),
(210, 'Laki-Laki', 51, 11.3, 13.2, 'Gizi Kurang'),
(211, 'Laki-Laki', 51, 13.3, 21.3, 'Gizi Baik'),
(212, 'Laki-Laki', 51, 21.4, 1000, 'Gizi Lebih'),
(213, 'Laki-Laki', 52, 0, 11.3, 'Gizi Buruk'),
(214, 'Laki-Laki', 52, 11.4, 13.3, 'Gizi Kurang'),
(215, 'Laki-Laki', 52, 13.4, 21.6, 'Gizi Baik'),
(216, 'Laki-Laki', 52, 21.7, 1000, 'Gizi Lebih'),
(217, 'Laki-Laki', 53, 0, 11.4, 'Gizi Buruk'),
(218, 'Laki-Laki', 53, 11.5, 13.4, 'Gizi Kurang'),
(219, 'Laki-Laki', 53, 13.5, 21.8, 'Gizi Baik'),
(220, 'Laki-Laki', 53, 21.9, 1000, 'Gizi Lebih'),
(221, 'Laki-Laki', 54, 0, 11.5, 'Gizi Buruk'),
(222, 'Laki-Laki', 54, 11.6, 13.6, 'Gizi Kurang'),
(223, 'Laki-Laki', 54, 13.7, 22, 'Gizi Baik'),
(224, 'Laki-Laki', 54, 22.1, 1000, 'Gizi Lebih'),
(225, 'Laki-Laki', 55, 0, 11.7, 'Gizi Buruk'),
(226, 'Laki-Laki', 55, 11.8, 13.7, 'Gizi Kurang'),
(227, 'Laki-Laki', 55, 13.8, 22.2, 'Gizi Baik'),
(228, 'Laki-Laki', 55, 22.3, 1000, 'Gizi Lebih'),
(229, 'Laki-Laki', 56, 0, 11.8, 'Gizi Buruk'),
(230, 'Laki-Laki', 56, 11.9, 13.8, 'Gizi Kurang'),
(231, 'Laki-Laki', 56, 13.9, 22.5, 'Gizi Baik'),
(232, 'Laki-Laki', 56, 22.6, 1000, 'Gizi Lebih'),
(233, 'Laki-Laki', 57, 0, 11.9, 'Gizi Buruk'),
(234, 'Laki-Laki', 57, 12, 14, 'Gizi Kurang'),
(235, 'Laki-Laki', 57, 14.1, 22.7, 'Gizi Baik'),
(236, 'Laki-Laki', 57, 22.8, 1000, 'Gizi Lebih'),
(237, 'Laki-Laki', 58, 0, 12, 'Gizi Buruk'),
(238, 'Laki-Laki', 58, 12.1, 14.1, 'Gizi Kurang'),
(239, 'Laki-Laki', 58, 14.2, 22.9, 'Gizi Baik'),
(240, 'Laki-Laki', 58, 23, 1000, 'Gizi Lebih'),
(241, 'Laki-Laki', 59, 0, 12.1, 'Gizi Buruk'),
(242, 'Laki-Laki', 59, 12.2, 14.2, 'Gizi Kurang'),
(243, 'Laki-Laki', 59, 14.3, 23.2, 'Gizi Baik'),
(244, 'Laki-Laki', 59, 23.3, 1000, 'Gizi Lebih'),
(245, 'Perempuan', 0, 0, 1.7, 'Gizi Buruk'),
(246, 'Perempuan', 0, 1.8, 2.1, 'Gizi Kurang'),
(247, 'Perempuan', 0, 2.2, 3.9, 'Gizi Baik'),
(248, 'Perempuan', 0, 4, 1000, 'Gizi Lebih'),
(249, 'Perempuan', 1, 0, 2.1, 'Gizi Buruk'),
(250, 'Perempuan', 1, 2.2, 2.7, 'Gizi Kurang'),
(251, 'Perempuan', 1, 2.8, 5, 'Gizi Baik'),
(252, 'Perempuan', 1, 5.1, 1000, 'Gizi Lebih'),
(253, 'Perempuan', 2, 0, 2.6, 'Gizi Buruk'),
(254, 'Perempuan', 2, 2.7, 3.2, 'Gizi Kurang'),
(255, 'Perempuan', 2, 3.3, 6, 'Gizi Baik'),
(256, 'Perempuan', 2, 6.1, 1000, 'Gizi Lebih'),
(257, 'Perempuan', 3, 0, 3.1, 'Gizi Buruk'),
(258, 'Perempuan', 3, 3.2, 3.8, 'Gizi Kurang'),
(259, 'Perempuan', 3, 3.9, 6.9, 'Gizi Baik'),
(260, 'Perempuan', 3, 7, 1000, 'Gizi Lebih'),
(261, 'Perempuan', 4, 0, 3.6, 'Gizi Buruk'),
(262, 'Perempuan', 4, 3.7, 4.4, 'Gizi Kurang'),
(263, 'Perempuan', 4, 4.5, 7.6, 'Gizi Baik'),
(264, 'Perempuan', 4, 7.7, 1000, 'Gizi Lebih'),
(265, 'Perempuan', 5, 0, 4.1, 'Gizi Buruk'),
(266, 'Perempuan', 5, 4.9, 5, 'Gizi Kurang'),
(267, 'Perempuan', 5, 8.3, 8.4, 'Gizi Baik'),
(268, 'Perempuan', 5, 0, 1000, 'Gizi Lebih'),
(269, 'Perempuan', 6, 0, 4.5, 'Gizi Buruk'),
(270, 'Perempuan', 6, 4.6, 5.4, 'Gizi Kurang'),
(271, 'Perempuan', 6, 5.5, 8.9, 'Gizi Baik'),
(272, 'Perempuan', 6, 9, 1000, 'Gizi Lebih'),
(273, 'Perempuan', 7, 0, 4.9, 'Gizi Buruk'),
(274, 'Perempuan', 7, 5, 5.8, 'Gizi Kurang'),
(275, 'Perempuan', 7, 5.9, 9.5, 'Gizi Baik'),
(276, 'Perempuan', 7, 9.6, 1000, 'Gizi Lebih'),
(277, 'Perempuan', 8, 0, 5.3, 'Gizi Buruk'),
(278, 'Perempuan', 8, 5.4, 6.2, 'Gizi Kurang'),
(279, 'Perempuan', 8, 6.3, 10, 'Gizi Baik'),
(280, 'Perempuan', 8, 10.1, 1000, 'Gizi Lebih'),
(281, 'Perempuan', 10, 0, 5.8, 'Gizi Buruk'),
(282, 'Perempuan', 10, 5.9, 6.8, 'Gizi Kurang'),
(283, 'Perempuan', 10, 6.9, 10.8, 'Gizi Baik'),
(284, 'Perempuan', 10, 10.9, 1000, 'Gizi Lebih'),
(285, 'Perempuan', 11, 0, 6.1, 'Gizi Buruk'),
(286, 'Perempuan', 11, 6.2, 7.1, 'Gizi Kurang'),
(287, 'Perempuan', 11, 7.2, 11.2, 'Gizi Baik'),
(288, 'Perempuan', 11, 11.3, 1000, 'Gizi Lebih'),
(289, 'Perempuan', 12, 0, 6.3, 'Gizi Buruk'),
(290, 'Perempuan', 12, 6.4, 7.3, 'Gizi Kurang'),
(291, 'Perempuan', 12, 7.4, 11.5, 'Gizi Baik'),
(292, 'Perempuan', 12, 11.6, 1000, 'Gizi Lebih'),
(293, 'Perempuan', 13, 0, 6.5, 'Gizi Buruk'),
(294, 'Perempuan', 13, 6.6, 7.5, 'Gizi Kurang'),
(295, 'Perempuan', 13, 7.6, 11.8, 'Gizi Baik'),
(296, 'Perempuan', 13, 11.9, 1000, 'Gizi Lebih'),
(297, 'Perempuan', 14, 0, 6.6, 'Gizi Buruk'),
(298, 'Perempuan', 14, 6.7, 7.7, 'Gizi Kurang'),
(299, 'Perempuan', 14, 7.8, 12.1, 'Gizi Baik'),
(300, 'Perempuan', 14, 12.2, 1000, 'Gizi Lebih'),
(301, 'Perempuan', 15, 0, 6.8, 'Gizi Buruk'),
(302, 'Perempuan', 15, 6.9, 7.9, 'Gizi Kurang'),
(303, 'Perempuan', 15, 8, 12.3, 'Gizi Baik'),
(304, 'Perempuan', 15, 12.4, 1000, 'Gizi Lebih'),
(305, 'Perempuan', 16, 0, 6.9, 'Gizi Buruk'),
(306, 'Perempuan', 16, 7, 8.1, 'Gizi Kurang'),
(307, 'Perempuan', 16, 8.2, 12.5, 'Gizi Baik'),
(308, 'Perempuan', 16, 12.6, 1000, 'Gizi Lebih'),
(309, 'Perempuan', 17, 0, 7.1, 'Gizi Buruk'),
(310, 'Perempuan', 17, 7.2, 8.2, 'Gizi Kurang'),
(311, 'Perempuan', 17, 8.3, 12.8, 'Gizi Baik'),
(312, 'Perempuan', 17, 12.9, 1000, 'Gizi Lebih'),
(313, 'Perempuan', 18, 0, 7.2, 'Gizi Buruk'),
(314, 'Perempuan', 18, 7.3, 8.4, 'Gizi Kurang'),
(315, 'Perempuan', 18, 8.5, 13, 'Gizi Baik'),
(316, 'Perempuan', 18, 13.1, 1000, 'Gizi Lebih'),
(317, 'Perempuan', 19, 0, 7.4, 'Gizi Buruk'),
(318, 'Perempuan', 19, 7.5, 8.5, 'Gizi Kurang'),
(319, 'Perempuan', 19, 8.6, 13.2, 'Gizi Baik'),
(320, 'Perempuan', 19, 13.3, 1000, 'Gizi Lebih'),
(321, 'Perempuan', 20, 0, 7.5, 'Gizi Buruk'),
(322, 'Perempuan', 20, 7.6, 8.7, 'Gizi Kurang'),
(323, 'Perempuan', 20, 8.8, 13.4, 'Gizi Baik'),
(324, 'Perempuan', 20, 13.5, 1000, 'Gizi Lebih'),
(325, 'Perempuan', 21, 0, 7.6, 'Gizi Buruk'),
(326, 'Perempuan', 21, 7.7, 8.9, 'Gizi Kurang'),
(327, 'Perempuan', 21, 9, 13.7, 'Gizi Baik'),
(328, 'Perempuan', 21, 13.8, 1000, 'Gizi Lebih'),
(329, 'Perempuan', 22, 0, 7.8, 'Gizi Buruk'),
(330, 'Perempuan', 22, 7.9, 9, 'Gizi Kurang'),
(331, 'Perempuan', 22, 9.1, 13.9, 'Gizi Baik'),
(332, 'Perempuan', 22, 14, 1000, 'Gizi Lebih'),
(333, 'Perempuan', 23, 0, 8, 'Gizi Buruk'),
(334, 'Perempuan', 23, 8.1, 9.2, 'Gizi Kurang'),
(335, 'Perempuan', 23, 9.3, 14.1, 'Gizi Baik'),
(336, 'Perempuan', 23, 14.2, 1000, 'Gizi Lebih'),
(337, 'Perempuan', 24, 0, 8.2, 'Gizi Buruk'),
(338, 'Perempuan', 24, 8.3, 9.3, 'Gizi Kurang'),
(339, 'Perempuan', 24, 9.4, 14.5, 'Gizi Baik'),
(340, 'Perempuan', 24, 14.6, 1000, 'Gizi Lebih'),
(341, 'Perempuan', 25, 0, 8.3, 'Gizi Buruk'),
(342, 'Perempuan', 25, 8.4, 9.5, 'Gizi Kurang'),
(343, 'Perempuan', 25, 9.6, 14.8, 'Gizi Baik'),
(344, 'Perempuan', 25, 14.9, 1000, 'Gizi Lebih'),
(345, 'Perempuan', 26, 0, 8.4, 'Gizi Buruk'),
(346, 'Perempuan', 26, 8.5, 9.7, 'Gizi Kurang'),
(347, 'Perempuan', 26, 9.8, 15.1, 'Gizi Baik'),
(348, 'Perempuan', 26, 15.2, 1000, 'Gizi Lebih'),
(349, 'Perempuan', 27, 0, 8.6, 'Gizi Buruk'),
(350, 'Perempuan', 27, 8.7, 9.8, 'Gizi Kurang'),
(351, 'Perempuan', 27, 9.9, 15.5, 'Gizi Baik'),
(352, 'Perempuan', 27, 15.6, 1000, 'Gizi Lebih'),
(353, 'Perempuan', 28, 0, 8.7, 'Gizi Buruk'),
(354, 'Perempuan', 28, 8.8, 10, 'Gizi Kurang'),
(355, 'Perempuan', 28, 10.1, 15.8, 'Gizi Baik'),
(356, 'Perempuan', 28, 15.9, 1000, 'Gizi Lebih'),
(357, 'Perempuan', 29, 0, 8.8, 'Gizi Buruk'),
(358, 'Perempuan', 29, 8.9, 10.1, 'Gizi Kurang'),
(359, 'Perempuan', 29, 10.2, 16, 'Gizi Baik'),
(360, 'Perempuan', 29, 16.1, 1000, 'Gizi Lebih'),
(361, 'Perempuan', 30, 0, 8.9, 'Gizi Buruk'),
(362, 'Perempuan', 30, 9, 10.2, 'Gizi Kurang'),
(363, 'Perempuan', 30, 10.3, 16.3, 'Gizi Baik'),
(364, 'Perempuan', 30, 16.4, 1000, 'Gizi Lebih'),
(365, 'Perempuan', 31, 0, 9, 'Gizi Buruk'),
(366, 'Perempuan', 31, 9.1, 10.4, 'Gizi Kurang'),
(367, 'Perempuan', 31, 10.5, 16.6, 'Gizi Baik'),
(368, 'Perempuan', 31, 16.7, 1000, 'Gizi Lebih'),
(369, 'Perempuan', 32, 0, 9.1, 'Gizi Buruk'),
(370, 'Perempuan', 32, 9.2, 10.5, 'Gizi Kurang'),
(371, 'Perempuan', 32, 10.6, 16.9, 'Gizi Baik'),
(372, 'Perempuan', 32, 17, 1000, 'Gizi Lebih'),
(373, 'Perempuan', 33, 0, 9.3, 'Gizi Buruk'),
(374, 'Perempuan', 33, 9.4, 10.7, 'Gizi Kurang'),
(375, 'Perempuan', 33, 10.8, 17.1, 'Gizi Baik'),
(376, 'Perempuan', 33, 17.2, 1000, 'Gizi Lebih'),
(377, 'Perempuan', 34, 0, 9.4, 'Gizi Buruk'),
(378, 'Perempuan', 34, 9.5, 10.8, 'Gizi Kurang'),
(379, 'Perempuan', 34, 10.9, 17.4, 'Gizi Baik'),
(380, 'Perempuan', 34, 17.5, 1000, 'Gizi Lebih'),
(381, 'Perempuan', 35, 0, 9.5, 'Gizi Buruk'),
(382, 'Perempuan', 35, 9.6, 10.9, 'Gizi Kurang'),
(383, 'Perempuan', 35, 11, 17.7, 'Gizi Baik'),
(384, 'Perempuan', 35, 17.8, 1000, 'Gizi Lebih'),
(385, 'Perempuan', 36, 0, 9.6, 'Gizi Buruk'),
(386, 'Perempuan', 36, 9.7, 11.1, 'Gizi Kurang'),
(387, 'Perempuan', 36, 11.2, 17.9, 'Gizi Baik'),
(388, 'Perempuan', 36, 18, 1000, 'Gizi Lebih'),
(389, 'Perempuan', 37, 0, 9.7, 'Gizi Buruk'),
(390, 'Perempuan', 37, 9.8, 11.2, 'Gizi Kurang'),
(391, 'Perempuan', 37, 11.3, 18.2, 'Gizi Baik'),
(392, 'Perempuan', 37, 18.3, 1000, 'Gizi Lebih'),
(393, 'Perempuan', 38, 0, 9.8, 'Gizi Buruk'),
(394, 'Perempuan', 38, 9.9, 11.3, 'Gizi Kurang'),
(395, 'Perempuan', 38, 11.4, 18.4, 'Gizi Baik'),
(396, 'Perempuan', 38, 18.5, 1000, 'Gizi Lebih'),
(397, 'Perempuan', 39, 0, 9.9, 'Gizi Buruk'),
(398, 'Perempuan', 39, 10, 11.4, 'Gizi Kurang'),
(399, 'Perempuan', 39, 11.5, 18.6, 'Gizi Baik'),
(400, 'Perempuan', 39, 18.7, 1000, 'Gizi Lebih'),
(401, 'Perempuan', 40, 0, 10, 'Gizi Buruk'),
(402, 'Perempuan', 40, 10.1, 11.5, 'Gizi Kurang'),
(403, 'Perempuan', 40, 11.6, 18.9, 'Gizi Baik'),
(404, 'Perempuan', 40, 19, 1000, 'Gizi Lebih'),
(405, 'Perempuan', 41, 0, 10.1, 'Gizi Buruk'),
(406, 'Perempuan', 41, 10.2, 11.7, 'Gizi Kurang'),
(407, 'Perempuan', 41, 11.8, 19.1, 'Gizi Baik'),
(408, 'Perempuan', 41, 19.2, 1000, 'Gizi Lebih'),
(409, 'Perempuan', 42, 0, 10.2, 'Gizi Buruk'),
(410, 'Perempuan', 42, 10.3, 11.8, 'Gizi Kurang'),
(411, 'Perempuan', 42, 11.9, 19.3, 'Gizi Baik'),
(412, 'Perempuan', 42, 19.4, 1000, 'Gizi Lebih'),
(413, 'Perempuan', 43, 0, 10.3, 'Gizi Buruk'),
(414, 'Perempuan', 43, 10.4, 11.9, 'Gizi Kurang'),
(415, 'Perempuan', 43, 12, 19.5, 'Gizi Baik'),
(416, 'Perempuan', 43, 19.6, 1000, 'Gizi Lebih'),
(417, 'Perempuan', 44, 0, 10.4, 'Gizi Buruk'),
(418, 'Perempuan', 44, 10.5, 12, 'Gizi Kurang'),
(419, 'Perempuan', 44, 12.1, 19.7, 'Gizi Baik'),
(420, 'Perempuan', 44, 19.8, 1000, 'Gizi Lebih'),
(421, 'Perempuan', 45, 0, 10.5, 'Gizi Buruk'),
(422, 'Perempuan', 45, 10.6, 12.1, 'Gizi Kurang'),
(423, 'Perempuan', 45, 12.2, 20, 'Gizi Baik'),
(424, 'Perempuan', 45, 20.1, 1000, 'Gizi Lebih'),
(425, 'Perempuan', 46, 0, 10.6, 'Gizi Buruk'),
(426, 'Perempuan', 46, 10.7, 12.2, 'Gizi Kurang'),
(427, 'Perempuan', 46, 12.3, 20.2, 'Gizi Baik'),
(428, 'Perempuan', 46, 20.3, 1000, 'Gizi Lebih'),
(429, 'Perempuan', 47, 0, 10.7, 'Gizi Buruk'),
(430, 'Perempuan', 47, 10.8, 12.4, 'Gizi Kurang'),
(431, 'Perempuan', 47, 12.5, 20.4, 'Gizi Baik'),
(432, 'Perempuan', 47, 20.5, 1000, 'Gizi Lebih'),
(433, 'Perempuan', 48, 0, 10.8, 'Gizi Buruk'),
(434, 'Perempuan', 48, 10.9, 12.5, 'Gizi Kurang'),
(435, 'Perempuan', 48, 12.6, 20.6, 'Gizi Baik'),
(436, 'Perempuan', 48, 20.7, 1000, 'Gizi Lebih'),
(437, 'Perempuan', 49, 0, 10.8, 'Gizi Buruk'),
(438, 'Perempuan', 49, 10.9, 12.6, 'Gizi Kurang'),
(439, 'Perempuan', 49, 12.7, 20.8, 'Gizi Baik'),
(440, 'Perempuan', 49, 20.9, 1000, 'Gizi Lebih'),
(441, 'Perempuan', 50, 0, 10.9, 'Gizi Buruk'),
(442, 'Perempuan', 50, 11, 12.7, 'Gizi Kurang'),
(443, 'Perempuan', 50, 12.8, 21, 'Gizi Baik'),
(444, 'Perempuan', 50, 21.1, 1000, 'Gizi Lebih'),
(445, 'Perempuan', 51, 0, 11, 'Gizi Buruk'),
(446, 'Perempuan', 51, 11.1, 12.8, 'Gizi Kurang'),
(447, 'Perempuan', 51, 12.9, 21.2, 'Gizi Baik'),
(448, 'Perempuan', 51, 21.3, 1000, 'Gizi Lebih'),
(449, 'Perempuan', 52, 0, 11.1, 'Gizi Buruk'),
(450, 'Perempuan', 52, 11.2, 12.9, 'Gizi Kurang'),
(451, 'Perempuan', 52, 13, 21.4, 'Gizi Baik'),
(452, 'Perempuan', 52, 21.5, 1000, 'Gizi Lebih'),
(453, 'Perempuan', 53, 0, 11.2, 'Gizi Buruk'),
(454, 'Perempuan', 53, 11.3, 13, 'Gizi Kurang'),
(455, 'Perempuan', 53, 13.1, 21.6, 'Gizi Baik'),
(456, 'Perempuan', 53, 21.7, 1000, 'Gizi Lebih'),
(457, 'Perempuan', 54, 0, 11.3, 'Gizi Buruk'),
(458, 'Perempuan', 54, 11.4, 13.1, 'Gizi Kurang'),
(459, 'Perempuan', 54, 13.2, 21.8, 'Gizi Baik'),
(460, 'Perempuan', 54, 21.9, 1000, 'Gizi Lebih'),
(461, 'Perempuan', 55, 0, 11.4, 'Gizi Buruk'),
(462, 'Perempuan', 55, 11.5, 13.2, 'Gizi Kurang'),
(463, 'Perempuan', 55, 13.3, 22.1, 'Gizi Baik'),
(464, 'Perempuan', 55, 22.2, 1000, 'Gizi Lebih'),
(465, 'Perempuan', 56, 0, 11.4, 'Gizi Buruk'),
(466, 'Perempuan', 56, 11.5, 13.3, 'Gizi Kurang'),
(467, 'Perempuan', 56, 13.4, 22.3, 'Gizi Baik'),
(468, 'Perempuan', 56, 22.4, 1000, 'Gizi Lebih'),
(469, 'Perempuan', 57, 0, 11.5, 'Gizi Buruk'),
(470, 'Perempuan', 57, 11.6, 13.4, 'Gizi Kurang'),
(471, 'Perempuan', 57, 13.5, 22.5, 'Gizi Baik'),
(472, 'Perempuan', 57, 22.6, 1000, 'Gizi Lebih'),
(473, 'Perempuan', 58, 0, 11.6, 'Gizi Buruk'),
(474, 'Perempuan', 58, 11.7, 13.5, 'Gizi Kurang'),
(475, 'Perempuan', 58, 13.6, 22.7, 'Gizi Baik'),
(476, 'Perempuan', 58, 22.8, 1000, 'Gizi Lebih'),
(477, 'Perempuan', 59, 0, 11.7, 'Gizi Buruk'),
(478, 'Perempuan', 59, 11.8, 13.6, 'Gizi Kurang'),
(479, 'Perempuan', 59, 13.7, 22.9, 'Gizi Baik'),
(480, 'Perempuan', 59, 23, 1000, 'Gizi Lebih'),
(481, 'Perempuan', 9, 0, 5.6, 'Gizi Buruk'),
(482, 'Perempuan', 9, 5.7, 6.5, 'Gizi Kurang'),
(483, 'Perempuan', 9, 6.6, 10.4, 'Gizi Baik'),
(484, 'Perempuan', 9, 10.5, 1000, 'Gizi Lebih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `noTelp`, `role`) VALUES
(14, 'nana12', '$2y$10$BSp91qnlRTpAUeHk./xZCOsXfx8er2ElMRq4I4r6zbJV/GSXtyZqG', 'nana', 'RW 02 RT 06 Desa Sarwadadi Cirebon ', '081222102889', 'ortu'),
(15, 'vinna13', '$2y$10$pQ7I9TwBcVsEmxnQfFM2WuX0epBmrmMXFf6CHsvPr7NEJEH5Xrdty', 'vinna', 'RT 05,06,07 ', '089664875057', 'ortu'),
(16, 'syaroh24', '$2y$10$p.4Jf8SYBdVWDE63sT07cebhleCTF0RKDVhih60G1V9zdAOh/ogkO', 'Syaroh', 'RW II ( RT 05, 06,07)', '082211199683', 'ortu'),
(18, 'desi23', '$2y$10$buiSQF1vqIWw8X6HGWSLK.4VqxYTR/ohlMHiMsQkcYq0A45v.VRTu', 'Desi Nurrohmah', 'RT 002 RW 005', '-', 'ortu'),
(19, 'ros26', '$2y$10$AKZAuYpe25Vv.IWWQxqbauOIyDLrWt8wTgc9Jtc0jvjxpXkj8HTZS', 'Ros Nia Ningrum', 'RT/RW 005/002 Desa sarwadadi ', '-', 'ortu'),
(20, 'yayah', '$2y$10$R8dyAL3UuBPSCEXTTak6TekHZK.HukJcVF0R2.AVh4W3EEof/oItm', 'yayah', 'RW III (RT 08,09,10)', '085313207039', 'kader'),
(21, 'oom', '$2y$10$YT3F5PTupz5KuiVFDMziKOmwR9245DiuCZE0XsvFz5aEvgfi6ZcjO', 'oom sari', 'RW I (RT 03,04)', '082219129486', 'kader'),
(22, 'aam', '$2y$10$2FBtaPH2EPMqZ3G5cUe38.D45m1Sy4wxYJOIhym7/JBWnt303pjTC', 'Aam', 'RW I (RT 01,02)', '083141471752', 'kader'),
(23, 'dea', '$2y$10$vzMneq2NSJ4L4K.TQw0Y.OBr9APJIKmFbYWS6TlKguLge9eVp2YFS', 'Dea', 'RW II (RT 05,06,07)', '082217138626', 'ortu'),
(24, 'rusma', '$2y$10$VHGEFrNKpXgqAvxXcfIqUOtGbFK2DIoJl7usKIpzaNYbrq4XWJlkO', 'Rusmayanti', 'RW II (RT 05,06,07)', '083830939565', 'ortu'),
(25, 'nani', '$2y$10$KHy0c3yER/jXFa4MTXAQWeyZ2QJ0/Kp9PaLI5g8dqr0nWZst8MEn.', 'Nani', 'RW II (RT 05,06,07)', '083838471482', 'ortu'),
(26, 'tika', '$2y$10$40lTGTcDdOjue8jSnp1NgOE3/OvMBCZhlV1Ic3Sq0Z8twQwG64dg.', 'Tika', 'RW II (RT 05,06,07)', '082217642213', 'ortu'),
(27, 'r. wulan', '$2y$10$LzYkaYHufSMTL2eIHWEoYud1b7XNt/dIOalq2PE9I7xlRBR4BDF86', 'R. Wulan', 'RW II ( RT 05,06,07)', '085224773288', 'ortu'),
(28, 'iin', '$2y$10$S4krHtCh/6AKQT1IrC9/YuyRI0/6lOAn84Cl9yr0zXGFncG8orDvm', 'iin', 'RW II (RT 05,06,07)', '087884227993', 'ortu'),
(29, 'nurjanah', '$2y$10$cnPcnuEGFCg.F9r1W7CiX.6sRTatNcul7H/dpiAnsyTZdmCr5.cby', 'Nurjanah', 'RW II (RT 05,06,07)', '083804387248', 'ortu'),
(30, 'nanang', '$2y$10$gwBCi2HPamtuy0WZ8gTXjuKsz3gXk4s1ofj6J/MDTHLM5LN5DHi3.', 'Nanang', 'RW I ( RT 03,04)', '082219129486', 'ortu'),
(31, 'yuli', '$2y$10$VcC9vYCYwbGyNV0bmDsJmepMPPQMUi39KBDiwEp5Va.8SFmeyHMle', 'Yuli', 'Rw I ( RT 03, 04)', '082219129486', 'ortu'),
(32, 'razan', '$2y$10$gOMp7sY8Eku0QJzuSHED0OZNArTlyfqlcAm8WNPU60UBkAXluNN0e', 'Razan', 'RW I (RT 03, 04)', '082219129486', 'ortu'),
(33, 'nurul', '$2y$10$8wxkYHSeOYcg1tWOZx8WgeHoONgnYk4sQnJcxbBs2ZpYkqNcY6oty', 'Nurul', 'RW I ( RT 03,04)', '082219129486', 'ortu'),
(34, 'afin', '$2y$10$soRf9tjShlSbagVAi7p5RuvZdxqwhfAlrasD1Q/Vc8tYWu48fJ6b.', 'Afin', 'RW I ( RT 03, 04)', '082219129486', 'ortu'),
(35, 'yoyoh', '$2y$10$RFC7HY8ZenT766Fj3fD58eLlqsD1z/ig6T5krCnRfubInGwCFw54e', 'yoyoh', 'RW I ( RT 03, 04)', '082219129486', 'ortu'),
(36, 'dedah', '$2y$10$FQDBD9m/XYljgSXP8R0PCeaL.t4k2o0G09YWFQTrMksMV06u.zUcS', 'Dedah', 'RW III ( RT 08, 09, 10)', '085313207039', 'ortu'),
(37, 'nia', '$2y$10$ai0W8DKrvSmZjXksiB/RXuDQSyOhecG6rZ.N3C1qZ0661TZXniuf2', 'Nia', 'RW I ( RT 01, 02)', '083141471752', 'ortu'),
(38, 'indah', '$2y$10$IYB2QgKTAAWBIVx0C4a75euIqYjdRUWeX4IA9Qnf2omOSKnkUTVQK', 'Indah', 'RT I ( RW 01, 02)', '083141471752', 'ortu'),
(39, 'kiki', '$2y$10$gSVIM1kbF1eC6VIV5xOV1eTOnDrsv/l43h37obtYT3ZWsYxeqwUaW', 'Kiki', 'RW I ( RT 03,04)', '082219129486', 'ortu'),
(40, 'eli', '$2y$10$6PJaPKrCpWJM/Mip5WfRxedgKIB/a7PzFfxj.T.lFZNReDu7LlwSu', 'Eli', 'RW II ( RT 06, 07)', '087837754333', 'ortu'),
(41, 'esih', '$2y$10$8WPsaZqDne3Z6soG0gJa2OrLDdPJvuyZLjI384rWFflHzfrDyMXlq', 'Esih', 'RW II ( RT 05, 06, 07)', '083120878288', 'ortu'),
(42, 'winda', '$2y$10$JNjrcoyqzIroYv5CRKChL.TE6MWnl.8Rcx3p1AqiZnHuzw1dTcfR2', 'winda', 'RW II ( RT 05, 06, 07)', '081222102886', 'ortu'),
(43, 'ita', '$2y$10$gx.26EYOnZcQJUkzidLMDOFIkEKzkwafRH2yGJ.yhpl0iruCfCeF6', 'ita', 'RT 04', '082121410581', 'ortu'),
(44, 'ita12', '$2y$10$1uIx9E/P7LR9JBCRo1miaOHt4RPYPkQoEGF/rWWe9/WN.eGFE6k3i', 'Ita', 'RT 04 Desa Sarwadadi', '082121410518', 'kader'),
(45, 'ida23', '$2y$10$Hn5qGYI9ArEiEY18oc6zHeKrrDidSilm3G9wfXn82.J4kBIZl5RSy', 'ida', 'RW 3', '085313207039', 'ortu'),
(46, 'susi12', '$2y$10$Xu/3vECZT0/kE4dNs4EK7e7ac3/mJ5QeUK1DPYxpONVCWT0cDV392', 'susi', 'RW 01 Desa sarwadadi', '083141471752', 'ortu'),
(47, 'diana', '$2y$10$Y6zR/TiqRXZoI.tHOGH54epSMyXOumI2dcwYqyiYPXOA.9m8YYPRq', 'Diana', 'RW I Desa sarwadadi', '083141471752', 'ortu'),
(48, 'atus28', '$2y$10$g3r6M0Z4i8W6ViPQObwyOumXYCiGLpqzkq5R2rSXQKqnMHwUhbo6y', 'atus', 'RT 04 Desa sarwadadi', '081349778840', 'ortu'),
(50, 'ensa', '$2y$10$buzeMgbfCaptDdFT7M5em.z7H.1BjxyAFZYXfCrgj/DEHrRxJbesu', 'Saniah', 'Plumbon, Cirebon', '08976574567', 'kader'),
(51, 'diyah', '$2y$10$J6LXjDJ3kiKl.5e0sUa.9.CW8Dm8uJgklXMtBfzRX0bzIRHSeUNY2', 'Halimatus Sadiyah', 'Talun', '082351468809', 'kader'),
(52, 'susi', '$2y$10$3doNGHHnoeBLxIgWgRbLVOxiKa1eNkHWL4loqk4K3HclEOwm60V0y', 'susi', 'talun', '0823514890', 'ortu'),
(55, 'nia12', '$2y$10$k6RZutYJjEtzFG.GrQhQXuQeQRKbGTYwgbm0E4xUMTKw0VmvjDP6i', 'nia', 'desa sarwaddai', '081351388371', 'ortu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vitamin`
--

CREATE TABLE `vitamin` (
  `id_vitamin` int(11) NOT NULL,
  `id_balita` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `jenis_vitamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vitamin`
--

INSERT INTO `vitamin` (`id_vitamin`, `id_balita`, `idjadwal`, `jenis_vitamin`) VALUES
(6, 11, 39, 'Vitamin A'),
(7, 16, 39, 'Vitamin A'),
(8, 12, 39, 'Vitamin A'),
(9, 13, 39, 'Vitamin A'),
(10, 14, 39, 'Vitamin A'),
(14, 15, 35, 'Vitamin A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD PRIMARY KEY (`id_balita`),
  ADD KEY `balita_ibfk_1` (`id_user`),
  ADD KEY `idposyandu` (`idposyandu`);

--
-- Indeks untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`),
  ADD KEY `idjadwal` (`idjadwal`),
  ADD KEY `imunisasi_ibfk_1` (`id_balita`);

--
-- Indeks untuk tabel `jdw_posyandu`
--
ALTER TABLE `jdw_posyandu`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `idposyandu` (`idposyandu`);

--
-- Indeks untuk tabel `kader`
--
ALTER TABLE `kader`
  ADD PRIMARY KEY (`id_kader`),
  ADD KEY `id_posyandu` (`id_posyandu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD PRIMARY KEY (`id_timbang`),
  ADD KEY `id_balita` (`id_balita`),
  ADD KEY `penimbangan_ibfk_2` (`idjadwal`);

--
-- Indeks untuk tabel `pmt`
--
ALTER TABLE `pmt`
  ADD PRIMARY KEY (`idpmt`),
  ADD KEY `id_timbang` (`idjadwal`);

--
-- Indeks untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  ADD PRIMARY KEY (`id_posyandu`);

--
-- Indeks untuk tabel `status_gizi`
--
ALTER TABLE `status_gizi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vitamin`
--
ALTER TABLE `vitamin`
  ADD PRIMARY KEY (`id_vitamin`),
  ADD KEY `vitamin_ibfk_2` (`idjadwal`),
  ADD KEY `vitamin_ibfk_1` (`id_balita`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `balita`
--
ALTER TABLE `balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jdw_posyandu`
--
ALTER TABLE `jdw_posyandu`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `kader`
--
ALTER TABLE `kader`
  MODIFY `id_kader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `id_timbang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pmt`
--
ALTER TABLE `pmt`
  MODIFY `idpmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id_posyandu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `status_gizi`
--
ALTER TABLE `status_gizi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `vitamin`
--
ALTER TABLE `vitamin`
  MODIFY `id_vitamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD CONSTRAINT `balita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `balita_ibfk_2` FOREIGN KEY (`idposyandu`) REFERENCES `posyandu` (`id_posyandu`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD CONSTRAINT `imunisasi_ibfk_1` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON UPDATE CASCADE,
  ADD CONSTRAINT `imunisasi_ibfk_2` FOREIGN KEY (`idjadwal`) REFERENCES `jdw_posyandu` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jdw_posyandu`
--
ALTER TABLE `jdw_posyandu`
  ADD CONSTRAINT `jdw_posyandu_ibfk_1` FOREIGN KEY (`idposyandu`) REFERENCES `posyandu` (`id_posyandu`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kader`
--
ALTER TABLE `kader`
  ADD CONSTRAINT `kader_ibfk_1` FOREIGN KEY (`id_posyandu`) REFERENCES `posyandu` (`id_posyandu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kader_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  ADD CONSTRAINT `penimbangan_ibfk_1` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON UPDATE CASCADE,
  ADD CONSTRAINT `penimbangan_ibfk_2` FOREIGN KEY (`idjadwal`) REFERENCES `jdw_posyandu` (`idjadwal`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pmt`
--
ALTER TABLE `pmt`
  ADD CONSTRAINT `pmt_ibfk_1` FOREIGN KEY (`idjadwal`) REFERENCES `jdw_posyandu` (`idjadwal`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vitamin`
--
ALTER TABLE `vitamin`
  ADD CONSTRAINT `vitamin_ibfk_1` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vitamin_ibfk_2` FOREIGN KEY (`idjadwal`) REFERENCES `jdw_posyandu` (`idjadwal`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
