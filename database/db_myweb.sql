-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Nov 2018 pada 05.54
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_myweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','operator','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`kode_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Rizki Hariyanto', 'Laki-laki', 'Jl. Masjid Darusalam Rt 13/11 Ciputat', 'admin'),
(3, 'pandu', '8acf7115033fa7bbfebe4b9b726ab374', 'Pandu Andhika', 'Laki-laki', 'BSD, Tangerang Selatan', 'user'),
(5, 'operator', '4b583376b2767b923c3e1da60d10de59', 'Rifqy Abrory', 'Laki-laki', 'Reni jaya, Pamulang', 'operator'),
(6, 'kharilkhuda', '439ced71514dfed95dd18e49bd1e1aa0', 'Khairil Khuda', 'Laki-laki', 'Nusa Indah, Pamulang', 'user'),
(7, 'panjul', '5d94f87882682ed36cfefe6efdda937c', 'Ade Irfan', 'Laki-laki', 'Jl. Pondok Cabe I No. 75', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `kode_mobil` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`kode_mobil`, `merk`, `type`, `warna`, `harga`, `gambar`) VALUES
('M-001', 'Honda', 'Jazz', 'Putih', '220000000', 'jazz putih.jpg'),
('M-002', 'Honda', 'Civic Keren', 'Hitam', '220000000', 'civic hitam.jpg'),
('M-003', 'Toyota', 'Yaris', 'Hitam', '180000000', 'yaris hitam.jpg'),
('M-004', 'Daihatsu', 'Xenia', 'Silver', '100000000', 'xenia silver.jpg'),
('M-005', 'Honda', 'Jazz', 'Merah', '250000000', 'jazz merah.jpg'),
('M-006', 'Honda', 'Jazz Bagus', 'Merah', '300000000', 'jazz merah.jpg'),
('M-007', 'BMW', 'BMW Hitam', 'Hitam', '1200000000', 'bmw hitam.jpg'),
('M-008', 'BMW', 'BMW Putih', 'Putih', '1300000000', 'bmw putih.jpg'),
('M-009', 'BMW', 'BMW Biru', 'Biru', '1100000000', 'bmw biru.jpg'),
('M-010', 'BMW', 'BMW Merah', 'Merah', '1350000000', 'bmw merah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `no_identitas` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`no_identitas`, `nama_lengkap`, `alamat`, `jenis_kelamin`, `no_telp`) VALUES
(220123, 'Feri Irawan', ' Jl. Kenangan. BSD', 'L', '98098098'),
(42353564, 'Adriyan Saputra', 'Parung ', 'L', '43543645657'),
(75837857, 'Pandu Andhika', 'BSD ', 'L', '546657657'),
(345345324, 'Ade Irfan', 'Pondok Cabe ', 'L', '78754674'),
(763765876, 'Khairil Khuda', 'Serua Indah Permai ', 'L', '534534654'),
(2147483647, 'Maulidiansyah', 'Jl. Rawa lele. Jombang ', 'L', '8593895835');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`kode_mobil`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`no_identitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
