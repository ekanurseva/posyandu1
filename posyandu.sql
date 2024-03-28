-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2024 pada 14.32
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
(2, 1, 3, 'Guntur Subagja', 'Rendy Alfiansyah', '32342423423424', 'Indramayu', '2021-12-14 00:00:00', 'Laki-Laki'),
(3, 2, 3, 'Hallo', 'Tukimin', '12312312413', 'Kuningan', '2023-11-16 00:00:00', 'Laki-Laki'),
(5, 4, 6, 'Sanita', 'Alia Asyidiq', '320918680920117', 'Cirebon', '2023-12-05 00:00:00', 'Perempuan'),
(6, 4, 3, 'Sanita', 'Ali Asyidiqiansyah', '3209182509000000', 'Cirebon', '2023-09-25 00:00:00', 'Laki-Laki');

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
(1, 2, 7, 'Polio'),
(2, 2, 6, 'Hib (Haemophilus influenzae type b)'),
(4, 5, 8, 'DPT (Difteri, Pertusis, Tetanus)'),
(5, 3, 7, 'Bacillus Calmette-Guerin (BCG)');

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
(1, 1, '2024-02-03 08:00:00'),
(2, 2, '2024-02-06 09:00:00'),
(3, 2, '2024-02-05 20:04:00'),
(4, 1, '2023-02-10 08:00:00'),
(6, 3, '2024-02-15 20:37:00'),
(7, 3, '2024-02-24 20:38:00'),
(8, 6, '2024-02-12 08:00:00');

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
(1, 2, 2),
(2, 6, 5),
(3, 6, 6);

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
(1, 2, 7, '1234', '123', 'Bagus', 123, 123),
(3, 5, 8, '10', '80', 'Baik', 10, 10);

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
(2, 2, 'Telur'),
(4, 8, 'Telur'),
(5, 7, 'Bronis Kurus');

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
(1, 'Mekar', 'RT 01 RW 01'),
(2, 'Kuntum', 'RT 03 RW 01'),
(3, 'Dahlia', 'RT 06 RW 02'),
(6, 'Cempaka', 'wi8ehqwhebqw');

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
(1, 'siti', '$2y$10$32Nb23bPVrg2xGiLr2gMkurdv601VTzhGijPgpTLm.A8aW6LsWHAe', 'Siti Zubaedah', 'Jl Teratai', '089274381639', 'ortu'),
(2, 'admin', '$2y$10$9RfRutXK.06fssRcDghHJOStzZ8CoRFToBFGjgLzBhSLagnkDfan.', 'Admin', 'asdasdasd', '089274381638', 'kader'),
(4, 'saniah', '$2y$10$rMKNehLj5hvvVGDgFpZwpORJiXbz3nq5Xes4y6UTQpnpAwDcCui7u', 'Saniah Suharyati', 'Pesanggrahan', '08938123131', 'ortu'),
(5, 'eka', '$2y$10$yD2D9Yd1/WujueowEue8M.R7AlZLuIo/kg2N8O8rRdicbPoJVDLre', 'Eka Nurseva Saniyah', 'Pesanggrahan', '08938123136', 'kader'),
(6, 'diyah', '$2y$10$NZpgceYRXJmlltLA41Fo5eV0hmFhzv3dH9Ttn343z5SqA7b0v1x6.', 'Halimatus Sa&#039;diyah', 'Sumber', '08765346712', 'kader');

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
(1, 2, 7, 'Vitamin C'),
(3, 2, 6, 'Vitamin C'),
(4, 5, 8, 'Vitamin A');

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
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jdw_posyandu`
--
ALTER TABLE `jdw_posyandu`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kader`
--
ALTER TABLE `kader`
  MODIFY `id_kader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penimbangan`
--
ALTER TABLE `penimbangan`
  MODIFY `id_timbang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pmt`
--
ALTER TABLE `pmt`
  MODIFY `idpmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `posyandu`
--
ALTER TABLE `posyandu`
  MODIFY `id_posyandu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `vitamin`
--
ALTER TABLE `vitamin`
  MODIFY `id_vitamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
