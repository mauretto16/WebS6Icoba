-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 12.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `213_mekanik`
--

CREATE TABLE `213_mekanik` (
  `id_mekanik` int(5) UNSIGNED NOT NULL,
  `nama_mekanik` varchar(50) DEFAULT NULL,
  `umur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `213_mekanik`
--

INSERT INTO `213_mekanik` (`id_mekanik`, `nama_mekanik`, `umur`) VALUES
(12, 'Muhammad Luthfi', 31),
(13, 'Surya Hermawan', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `213_pelanggan`
--

CREATE TABLE `213_pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `nopol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `213_pelanggan`
--

INSERT INTO `213_pelanggan` (`id_pelanggan`, `nama`, `jk`, `alamat`, `tgl`, `telp`, `jenis`, `nopol`) VALUES
(15, 'Surya Hermawan', 'Laki Laki', 'Jln Haji Abdul Ghani 1 ', '2023/06/28', '081934144506', 'Matic', 'B 3232 TWJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `213_pembelian`
--

CREATE TABLE `213_pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `id_mekanik` int(5) DEFAULT NULL,
  `id_sparepart` int(5) DEFAULT NULL,
  `id_pelanggan` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `harga_jasa` varchar(10) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `213_pembelian`
--

INSERT INTO `213_pembelian` (`id_pembelian`, `id_mekanik`, `id_sparepart`, `id_pelanggan`, `qty`, `harga_jasa`, `tgl_beli`) VALUES
(8, 1, 1, 5, 1, '30000', '2020-05-01'),
(9, 1, 14, 7, 1, '20000', '2020-05-01'),
(13, 3, 27, 10, 1, '5000', '2020-05-02'),
(25, 3, 2, 5, 1, '3500', '2020-05-03'),
(27, 1, 1, 7, 1, '35000', '2020-05-04'),
(28, 3, 6, 0, 1, '35000', '2020-05-05'),
(30, 3, 18, 0, 2, '10000', '2020-05-07'),
(31, 4, 11, 0, 1, '35000', '2020-05-08'),
(33, 3, 2, 0, 2, '20000', '2020-05-09'),
(34, 2, 2, 7, 5, '700000', '2020-05-10'),
(44, 5, 14, 5, 1, '10000', '2020-05-15'),
(45, 2, 12, 5, 1, '10000', '2020-06-24'),
(46, 4, 19, 10, 1, '10000', '2020-06-24'),
(47, 2, 2, 5, 1, '10000', '2021-07-14'),
(48, 6, 19, 10, 1, '10000', '2021-07-14'),
(49, 9, 13, 10, 1, '10000', '2021-07-14'),
(50, 10, 30, 12, 1, '10000', '2021-07-14'),
(51, 11, 31, 13, 1, '50000', '2023-06-28'),
(52, 11, 32, 14, 2, '50000', '2023-06-28'),
(53, 12, 31, 15, 3, '50000', '2023-06-28'),
(54, 12, 33, 15, 2, '50000', '2023-06-28');

--
-- Trigger `213_pembelian`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `213_pembelian` FOR EACH ROW BEGIN
UPDATE 213_sparepart SET stock=stock-NEW.qty
WHERE id_sparepart=NEW.id_sparepart;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `213_pengguna`
--

CREATE TABLE `213_pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `213_pengguna`
--

INSERT INTO `213_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`) VALUES
(3, 'surya', 'admin', 'admin2'),
(4, 'Surya Hermawan', '202043502236', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `213_sparepart`
--

CREATE TABLE `213_sparepart` (
  `id_sparepart` int(5) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `213_sparepart`
--

INSERT INTO `213_sparepart` (`id_sparepart`, `sparepart`, `stock`, `kategori`, `harga`) VALUES
(31, 'Piston', '196', 'Motor Bebek', '200000'),
(32, 'Spion', '19', 'Spion', '200000'),
(33, 'Stang Jepit', '18', 'Sparepart', '50000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `213_mekanik`
--
ALTER TABLE `213_mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indeks untuk tabel `213_pelanggan`
--
ALTER TABLE `213_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `213_pembelian`
--
ALTER TABLE `213_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `213_pengguna`
--
ALTER TABLE `213_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `213_sparepart`
--
ALTER TABLE `213_sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `213_mekanik`
--
ALTER TABLE `213_mekanik`
  MODIFY `id_mekanik` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `213_pelanggan`
--
ALTER TABLE `213_pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `213_pembelian`
--
ALTER TABLE `213_pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `213_pengguna`
--
ALTER TABLE `213_pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `213_sparepart`
--
ALTER TABLE `213_sparepart`
  MODIFY `id_sparepart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
