-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 09:14 PM
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
  `password` varchar(30) NOT NULL,
  `kas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `kas`) VALUES
(1, 'admin', 'admin', 180000);

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `no_reff` varchar(30) NOT NULL,
  `nama_reff` varchar(30) NOT NULL,
  `keterangan_reff` text NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `id_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`no_reff`, `nama_reff`, `keterangan_reff`, `id_admin`, `id_jenis`) VALUES
('r1', 'Beban Produk', 'Membeli pupuk ke suplier', '1', '2'),
('r2', 'Pendapatan', 'Pendapatan dari penjualan pupuk', '1', '1'),
('r3', 'Piutang', 'Piutang pembelian pupuk', '1', '1'),
('r4', 'Kas', 'Kas dari pemasukan penjualan pupuk', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `tgl_masuk_barang` varchar(30) NOT NULL,
  `stok_barang` int(5) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `id_kategori_barang` varchar(10) NOT NULL,
  `id_suplier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `harga_beli`, `tgl_masuk_barang`, `stok_barang`, `gambar`, `keterangan`, `id_kategori_barang`, `id_suplier`) VALUES
('AP0004', 'Pupuk Apalah', 20000, 2000, 'Jumat, 3 Januari 2020', 3, 'cerita-pendek.jpg', 'ASik', 'KG0002', '3'),
('AP0005', 'Pupuk Sultan', 15000, 2000, 'Kamis, 2 Januari 2020', 3, '0918194620X310.jpg', 'Ahhay', 'KG0001', '2'),
('AP0006', 'Pupuk Murah', 25000, 10000, 'Kamis, 2 Januari 2020', 9, 'banyuwangi.png', 'AHhay', 'KG0001', '2'),
('AP0007', 'Pupuk Mungil', 2500, 2000, 'Rabu, 1 Januari 2020', 10, 'book.png', 'Ahasn', 'KG0001', '2');

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
-- Table structure for table `jenis_saldo`
--

CREATE TABLE `jenis_saldo` (
  `id_jenis` int(11) NOT NULL,
  `nama_saldo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_saldo`
--

INSERT INTO `jenis_saldo` (`id_jenis`, `nama_saldo`) VALUES
(1, 'Debit'),
(2, 'Kredit');

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
('KG0001', 'Pupuk Urea'),
('KG0002', 'Pupuk Kompos');

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
(22, '10', 'Minggu, 2 Agustus 2020', 135000, 'Sudah Bayar', '0918194620X310.jpg', 'Banyuwangi aja', 'BRI', '2f3b395e88bbf9968dc99abae41aca');

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
(61, '10', 'AP0006', 3, 75000, 'Minggu, 2 Agustus 2020', 'Sudah Bayar', '2f3b395e88bbf9968dc99abae41aca'),
(62, '10', 'AP0004', 3, 60000, 'Minggu, 2 Agustus 2020', 'Sudah Bayar', '2f3b395e88bbf9968dc99abae41aca');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`) VALUES
(2, 'CV.Merdeka'),
(3, 'PT Pupuk');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `no_reff` varchar(30) NOT NULL,
  `tgl_input` varchar(30) NOT NULL,
  `tgl_transaksi` varchar(50) NOT NULL,
  `jenis_saldo` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_admin`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`) VALUES
(7, '', 'r2', '02-08-2020 03:22:55', '2019-01-02', 1, 150000),
(8, '', 'r2', '02-08-2020 03:23:18', '2020-08-02', 1, 50000),
(9, '', 'r1', '02-08-2020 03:20:22', '2020-08-02', 2, 50000),
(11, '', 'r2', '02-08-2020 04:37:14', '2020-07-02', 1, 150000),
(12, '', 'r1', '02-08-2020 04:58:04', '2020-07-02', 2, 120000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`);

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
-- Indexes for table `jenis_saldo`
--
ALTER TABLE `jenis_saldo`
  ADD PRIMARY KEY (`id_jenis`);

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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_saldo`
--
ALTER TABLE `jenis_saldo`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfirmasi_pemesanan`
--
ALTER TABLE `konfirmasi_pemesanan`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
