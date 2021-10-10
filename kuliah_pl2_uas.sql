-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2021 pada 22.15
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
-- Database: `kuliah_pl2_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `jk_anggota` varchar(20) NOT NULL,
  `notelp_anggota` varchar(20) NOT NULL,
  `alamat_anggota` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jk_anggota`, `notelp_anggota`, `alamat_anggota`, `username`, `password`) VALUES
(1, 'Genta', 'Laki-laki', '088219689244', 'Bogor Barat', 'genta', ''),
(2, 'Anggota Haetami', 'Perempuan', '088219689241', 'Bogor Timur', 'haetami', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(3, 'Anggota Putra', 'Laki-laki', '088219689242', 'Bogor Selatan', 'putra', '2455629fbb15de7cf0ab5ab914f0a0f327092d84'),
(7, 'Genta Putra', 'Laki-laki', '088219689246', 'Bogor Selatan', 'gentaputra', '3f80a966563ffc848895dab5d182969b3f64d10e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(3) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penulis_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`) VALUES
(1, '001', 'Sirah Nabawiyah', 'Al Munawari', 'Al Gofar'),
(3, '002', 'Apakah ada alien di luar angkasa?', 'Kok Bisa', 'Kok Bisa'),
(4, '003', 'Kamu Engga Sendirian', 'Muhammad Syarif', 'Syarif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(3) NOT NULL,
  `id_buku` int(3) NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `tanggal_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `tanggal_peminjaman`) VALUES
(2, 4, 3, '2021-10-28'),
(3, 3, 1, '2021-10-27'),
(4, 1, 1, '2021-10-25'),
(6, 4, 6, '2021-10-10'),
(7, 3, 6, '2021-10-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(3) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `notelp_petugas` varchar(20) NOT NULL,
  `alamat_petugas` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Petugas','Kepala') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `notelp_petugas`, `alamat_petugas`, `username`, `password`, `level`) VALUES
(1, 'Petugas Genta', '088219689244', 'Bogor Barat', 'genta', 'e01721035c4856a59f5bcb368d87aef7de0529ae', 'Petugas'),
(2, 'Petugas Haetami', '088219689241', 'Bogor Timur', 'haetami', 'fcb5ec9b54384312480e014c6f50b1f8c15bab14', 'Petugas'),
(3, 'Petugas Putra', '088219689242', 'Bogor Utara', 'putra', '2455629fbb15de7cf0ab5ab914f0a0f327092d84', 'Petugas'),
(5, 'Kepala Genta', '088219689245', 'Bogor Tengah', 'kepalagenta', 'c3448874732f6c49c47f1e6ed5df702f4faf519f', 'Kepala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(3) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `tanggal_hadir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama_tamu`, `tanggal_hadir`) VALUES
(1, 'Tamu Genta', '2021-10-10 09:04:09'),
(2, 'Tamu Haetami', '2021-10-10 09:12:27'),
(3, 'Tamu Putra', '2021-10-10 09:14:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
