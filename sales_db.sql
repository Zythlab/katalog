-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2016 at 01:14 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_isi` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran_tabung` int(11) NOT NULL,
  `jenis_produk` int(1) NOT NULL,
  `tanggal_edit` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_isi`, `jumlah`, `ukuran_tabung`, `jenis_produk`, `tanggal_edit`, `tanggal_masuk`, `ket`) VALUES
(1, 'Refill 10 KG CO2', 'CO2', 70, 10, 1, '2016-05-24', '0000-00-00', ''),
(2, 'New 10 KG O2', 'O2', 33, 10, 2, '0000-00-00', '0000-00-00', ''),
(3, 'NEW REFILL', 'Co2', 6, 10, 1, '2016-05-24', '2016-05-24', ''),
(4, 'Onderdil', '', 10, 0, 3, '2016-05-29', '2016-05-29', 'redi stok\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_perusahaan`, `id_pembeli`, `id_order`, `tgl_invoice`, `tgl_kirim`, `keterangan`) VALUES
(1, 2, 4, 1, '2016-05-23', '2016-05-16', 'apa aja deh'),
(2, 2, 4, 2, '2016-05-25', '2016-05-16', 'sdasdad'),
(3, 2, 5, 3, '2016-05-27', '2016-06-13', 'sippp'),
(4, 2, 6, 4, '2016-05-29', '2016-05-31', 'yo'),
(5, 2, 7, 5, '2016-05-29', '2016-06-07', 'ok'),
(6, 2, 8, 6, '2016-05-29', '2016-06-15', 'siap'),
(7, 2, 9, 7, '2016-05-29', '2016-05-31', 'ready'),
(8, 2, 10, 8, '2016-05-29', '2016-06-09', 'siap ndan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_isi` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_isi`) VALUES
(1, 'Co2'),
(2, 'O2');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_invoice`, `nama_barang`, `qty`, `harga_satuan`, `diskon`) VALUES
(1, 1, 'COBA', 8, 8000, 8),
(1, 1, 'REFILL AJA\n', 10, 15000, 0),
(2, 2, 'Apaan', 3, 23232, 13),
(2, 2, 'GANTI', 21, 29999, 0),
(3, 3, '2', 2, 20000, 2),
(3, 3, '3', 1, 10000, 1),
(3, 3, '4', 4, 40000, 5),
(3, 3, 'ANAK', 1, 13000, 1),
(4, 4, '1', 7, 50000, 45),
(4, 4, '2', 3, 30000, 54),
(4, 4, '3', 3, 43500, 7),
(4, 4, '4', 3, 6000, 4),
(5, 5, '3', 6, 6000, 4),
(6, 6, '2', 4, 45000, 60),
(6, 6, '4', 4, 30000, 50),
(7, 7, '2', 4, 4000, 30),
(7, 7, '3', 10, 10000, 19),
(8, 8, '1', 12, 12000, 12),
(8, 8, '3', 5, 5000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `termin` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `kontak`, `termin`) VALUES
(1, 'Tan Varian', 'Blimbing Malang', '085000000001', '2 minggu'),
(2, 'Ibnu Adzakir', 'Padang Murah', '081000000002', '3 minggu'),
(3, 'PT Sejahtera', 'singosari', '08723564524', '1 minggu'),
(4, 'asdasd', 'asdasd', 'asdasd', '2 hari'),
(5, 'PT sempol raya', 'jalan jalan', '08547565', '2 minggu'),
(6, 'PT PT an', 'jakarta', '08512367462', '3 minggu'),
(7, 'PT Sukses', 'bandung', '089384748', '4 minggu'),
(8, 'PT Alright', 'okee', '08173647364', '6 minggu'),
(9, 'PT Terlalu', 'bogor', '0828475845', '2 minggu'),
(10, 'PT Sukses', 'semarang', '0883476736', '1 minggu');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `kontak`) VALUES
(2, 'Sempol Factory', 'Malang ae gan', '085873956720');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'robi', 'tulung', 2),
(2, 'bayu', 'soni', 2),
(3, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`,`id_invoice`,`nama_barang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
