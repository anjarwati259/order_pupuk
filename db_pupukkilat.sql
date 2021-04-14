-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 11:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pupukkilat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `kode_transaksi` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `total_item` int(10) DEFAULT NULL,
  `total_transaksi` int(10) DEFAULT NULL,
  `expedisi` varchar(20) DEFAULT NULL,
  `ongkir` int(10) DEFAULT NULL,
  `total_bayar` int(10) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `metode_pembayaran` int(1) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `no_resi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_komoditi`
--

CREATE TABLE `tb_komoditi` (
  `id_komoditi` varchar(20) NOT NULL,
  `nama_komoditi` varchar(50) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komoditi`
--

INSERT INTO `tb_komoditi` (`id_komoditi`, `nama_komoditi`, `tanggal_update`) VALUES
('KOM01', 'Jagung', '2021-04-12'),
('KOM02', 'Jeruk', '2021-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(20) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `jml_beli` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `id_komoditi` varchar(50) NOT NULL,
  `id_user` int(8) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `pembelian_awal` int(8) NOT NULL,
  `alamat` text NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `jenis_pelanggan` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `id_komoditi`, `id_user`, `nama_pelanggan`, `no_hp`, `pembelian_awal`, `alamat`, `wilayah`, `provinsi`, `jenis_pelanggan`, `tanggal_daftar`) VALUES
('CUS001', 'KOM01', 1, 'Aris', '0812226656', 23, 'jember', 'jember', 'Jawa Timur', 'Customer', '2021-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_customer` int(7) NOT NULL,
  `harga_mitra` int(7) NOT NULL,
  `harga_distributor` int(7) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tb_komoditi`
--
ALTER TABLE `tb_komoditi`
  ADD PRIMARY KEY (`id_komoditi`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
