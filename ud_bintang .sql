-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 06:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ud_bintang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `tgl_masuk_barang` varchar(30) NOT NULL,
  `stok_barang` int(5) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `id_kategori_barang` varchar(10) NOT NULL,
  `id_suplier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `tgl_masuk_barang`, `stok_barang`, `gambar`, `id_kategori_barang`, `id_suplier`) VALUES
('B01', 'Pupuk Urea', 25000, '20-02-2019', 5, 'pupuk.png', 'K01', 'S01'),
('B02', 'Pupuk Kompos', 15000, '22-09-2020', 18, 'pupuk.png', 'K02', 'S01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `nama`, `alamat`, `kode_pos`, `no_hp`, `email`, `username`, `password`) VALUES
(10, 'Fahrizal', 'Banyuwangi', '68463', '08782728929', 'jiwanrizal5@gmail.com', 'jiwan', '12345'),
(11, 'Ega Kustian', 'Jember', '68463', '1234321', 'jiwanrizal5@gmail.com', 'Ega', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori_brg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori_brg`) VALUES
('K01', 'Pupuk Kandang'),
('K02', 'Pupuk Kompos');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pemesanan`
--

CREATE TABLE `konfirmasi_pemesanan` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_cus` varchar(5) NOT NULL,
  `tanggal_checkout` varchar(30) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `bank` varchar(20) NOT NULL,
  `id_trans` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_pemesanan`
--

INSERT INTO `konfirmasi_pemesanan` (`id_konfirmasi`, `id_cus`, `tanggal_checkout`, `total_bayar`, `status_pembayaran`, `bukti_transfer`, `alamat_pengiriman`, `bank`, `id_trans`) VALUES
(11, '10', 'Jumat, 24 Juli 2020', 80000, 'Belum Dikonfirmasi', '0918194620X310.jpg', 'Bwi Bws', 'BRI', '44ce80db7e9fe0194bc3611f036c8f'),
(12, '10', 'Jumat, 24 Juli 2020', 30000, 'Belum Dikonfirmasi', '0918194620X310.jpg', 'Bws Jember', 'BRI', 'e52d2ff1f379904b085967ddb619f9');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_pembelian` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `tanggal_pembelian` varchar(30) NOT NULL,
  `jumlah_pembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_cus` varchar(5) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `tgl_pemesanan` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_trans` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_cus`, `id_barang`, `jumlah_barang`, `sub_total`, `tgl_pemesanan`, `status`, `id_trans`) VALUES
(40, '10', 'B02', 2, 30000, 'Jumat, 24 Juli 2020', 'Sudah Checkout', '44ce80db7e9fe0194bc3611f036c8f'),
(41, '10', 'B01', 2, 50000, 'Jumat, 24 Juli 2020', 'Sudah Checkout', '44ce80db7e9fe0194bc3611f036c8f'),
(42, '10', 'B02', 2, 30000, 'Jumat, 24 Juli 2020', 'Sudah Checkout', 'e52d2ff1f379904b085967ddb619f9');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk1` (`id_kategori_barang`),
  ADD KEY `fk2` (`id_suplier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi_pemesanan`
--
ALTER TABLE `konfirmasi_pemesanan`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `fk1` (`id_cus`) USING BTREE;

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfirmasi_pemesanan`
--
ALTER TABLE `konfirmasi_pemesanan`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
