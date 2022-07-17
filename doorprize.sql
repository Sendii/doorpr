-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jul 2022 pada 10.37
-- Versi server: 5.7.24
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doorprize`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemenang`
--

CREATE TABLE `data_pemenang` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `pemenang_ke` int(11) NOT NULL,
  `tanggal_jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pemenang`
--

INSERT INTO `data_pemenang` (`id`, `id_peserta`, `pemenang_ke`, `tanggal_jam`) VALUES
(1, 2149, 1, '2022-07-17 10:36:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `pemenang_keberapa` int(11) DEFAULT NULL,
  `first_name` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`,`pemenang_keberapa`, `first_name`) VALUES
(1, NULL, 'Puji Andriani'),
(2, NULL, 'Mayang Riza Andini'),
(3, NULL, 'Ulva Mayasari'),
(4, NULL, 'Zarah Mann'),
(5, NULL, 'Slamet Putra'),
(6, NULL, 'Sakti Mansur'),
(7, NULL, 'Johan Hutapea'),
(8, NULL, 'Karen Puspasari'),
(9, NULL, 'Warji Adriansyah'),
(10, NULL, 'Yusuf Hidayat'),
(11, 1, 'Farhan Ramadhan'),
(12, NULL, 'Eka Septiasa Putri'),
(13, NULL, 'Mahesa Putra Alfian'),
(14, NULL, 'Reza Saputra Andika'),
(15, NULL, 'Felry Firmansyah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pemenang`
--
ALTER TABLE `data_pemenang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemenang_ke` (`pemenang_ke`),
  ADD UNIQUE KEY `id_peserta` (`id_peserta`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pemenang`
--
ALTER TABLE `data_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
