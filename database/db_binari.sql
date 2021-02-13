-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 09:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_binari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'Yola', 'yola', 'yola yosanta');

-- --------------------------------------------------------

--
-- Table structure for table `foto_product`
--

CREATE TABLE `foto_product` (
  `id_fo` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `n_fo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_product`
--

INSERT INTO `foto_product` (`id_fo`, `id_pro`, `n_fo`) VALUES
(1, 8, 'Aneka Buku gambar.jpg'),
(2, 8, 'buku_gambar_A4_dodo3.jpg'),
(3, 8, 'cimg0962_640x480.jpg'),
(9, 0, '20201213091155buku_gambar_A4_dodo3.jpg'),
(13, 9, 'buku_gambar_A4_dodo3.jpg'),
(14, 9, 'Aneka Buku gambar.jpg'),
(15, 9, 'cimg0962_640x480.jpg'),
(17, 10, 'faber castle.jpg'),
(18, 11, 'joyko.jpg'),
(19, 12, 'jangka pensil.jpg'),
(20, 13, 'Tipex Kertas.jpg'),
(21, 14, 'tipex.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(5) NOT NULL,
  `n_kat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `n_kat`) VALUES
(1, 'Alat Tulis'),
(2, 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(150) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_plg` int(11) NOT NULL,
  `e_plg` varchar(100) NOT NULL,
  `pass_plg` varchar(50) NOT NULL,
  `n_plg` varchar(50) NOT NULL,
  `telp_plg` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_plg`, `e_plg`, `pass_plg`, `n_plg`, `telp_plg`, `alamat`) VALUES
(1, 'yolasayang@gmail.com', 'yola', 'yola sayang', '085780781987', ''),
(2, 'holidin37@gmail.com', 'holid', 'Evans', '08578968745', ''),
(3, 'yolacatik@gmail.com', '1234', 'Yola Cantik', '08798545663145', 'Kp. Faris'),
(4, 'evansseven77@gmail.com', '1234', 'Evans', '085780781987', 'Kp. Pasir Sereh');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_byr` int(11) NOT NULL,
  `id_pem` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_byr`, `id_pem`, `nama`, `bank`, `jumlah`, `tgl`, `bukti`) VALUES
(1, 2, 'Yola Cantik', 'BCA', 14000, '2020-12-12', '20201212025442IMG_20201002_100156.jpg'),
(2, 4, 'Yola Sayang', 'BRI', 16000, '2020-12-12', '2020121207015514474429_309665892729288_2172374602682990592_n.jpg'),
(3, 3, 'Yola Cantik', 'CIMB NIAGA', 3000, '2020-12-12', '2020121209483314474429_309665892729288_2172374602682990592_n.jpg'),
(4, 1, 'Holid', 'BRI', 5000, '2020-12-17', '20201217013602BCA-2016-04-10-01-BUDI UTOMO.jpg'),
(5, 3, 'Holid', 'BCA', 9000, '2020-12-17', '20201217094145Screenshot_20201127_195819.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pem` int(11) NOT NULL,
  `id_plg` int(11) NOT NULL,
  `tgl_pem` date NOT NULL,
  `to_pem` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `resi` varchar(50) NOT NULL,
  `tberat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pem`, `id_plg`, `tgl_pem`, `to_pem`, `alamat`, `status`, `resi`, `tberat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(1, 2, '2020-12-17', 5000, 'kp. pasir sereh', 'barang dikirm', 'AGHJHW1452452', 200, 'Jawa Barat', 'Bogor', 'Kabupaten', '16911', 'tiki', '', 0, ''),
(2, 1, '2020-12-17', 2000, 'Kp. Pasir sereh', 'pending', '', 100, 'Jawa Barat', 'Bogor', 'Kabupaten', '16911', 'jne', '', 0, ''),
(3, 1, '2020-12-17', 9000, 'Kp. pasir sereh', 'lunas', 'AGHJHW1452452', 400, 'Jawa Barat', 'Bogor', 'Kabupaten', '16911', 'jne', '', 0, ''),
(4, 2, '2020-12-17', 10000, 'Kp. Pasir sereh', 'pending', '', 500, 'Jawa Barat', 'Bogor', 'Kabupaten', '16911', 'pos', '', 0, ''),
(5, 4, '2020-12-17', 10000, 'Kp. Pasir sereh', 'pending', '', 600, 'Jawa Barat', 'Bogor', 'Kabupaten', '16911', 'jne', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pem_product`
--

CREATE TABLE `pem_product` (
  `id_pem_pro` int(11) NOT NULL,
  `id_pem` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `sub_brt` int(11) NOT NULL,
  `sub_hrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pem_product`
--

INSERT INTO `pem_product` (`id_pem_pro`, `id_pem`, `id_pro`, `jumlah`, `nama`, `harga`, `berat`, `sub_brt`, `sub_hrg`) VALUES
(1, 0, 3, 2, 'Pensil Gambar', 12000, 500, 1000, 24000),
(2, 0, 1, 2, 'Pulpen', 2000, 100, 200, 4000),
(3, 0, 4, 1, 'Lakban Hitam', 5000, 300, 300, 5000),
(4, 2, 3, 1, 'Pensil Gambar', 12000, 500, 500, 12000),
(5, 3, 1, 1, 'Pulpen', 2000, 100, 100, 2000),
(6, 4, 3, 1, 'Pensil Gambar', 12000, 500, 500, 12000),
(7, 4, 1, 1, 'Pulpen', 2000, 100, 100, 2000),
(8, 0, 1, 1, 'Pulpen', 2000, 100, 100, 2000),
(9, 0, 3, 1, 'Pensil Gambar', 12000, 500, 500, 12000),
(10, 0, 4, 2, 'Lakban Hitam', 5000, 300, 600, 10000),
(11, 0, 1, 1, 'Pulpen', 2000, 100, 100, 2000),
(12, 0, 1, 2, 'Pulpen', 2000, 100, 200, 4000),
(13, 0, 7, 1, 'Pulpen Warna', 2000, 100, 100, 2000),
(14, 0, 4, 1, 'Lakban Hitam', 5000, 300, 300, 5000),
(15, 1, 9, 1, 'Buku Gambar', 5000, 200, 200, 5000),
(16, 2, 1, 1, 'Pulpen', 2000, 100, 100, 2000),
(17, 3, 7, 2, 'Pulpen Warna', 2000, 100, 200, 4000),
(18, 3, 9, 1, 'Buku Gambar', 5000, 200, 200, 5000),
(19, 4, 7, 5, 'Pulpen Warna', 2000, 100, 500, 10000),
(20, 5, 14, 1, 'Tipex Joyko', 5000, 300, 300, 5000),
(21, 5, 13, 1, 'Tipex Kertas', 5000, 300, 300, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `id_kat` int(5) NOT NULL,
  `n_pro` varchar(100) NOT NULL,
  `hrg_pro` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `f_pro` varchar(100) NOT NULL,
  `des_pro` text NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_pro`, `id_kat`, `n_pro`, `hrg_pro`, `berat`, `f_pro`, `des_pro`, `stock`) VALUES
(3, 1, 'Pensil Gambar', 12000, 500, 'pensil gambar.jpg', 'Pensil adalah ala Dapat dilihat bahwa web browser menampilkan tabel sesuai dengan panjang data yang terdapat pada baris terpanjang, dan jika anda mencoba mengecilkan jendela web browser, tampilan tabel akan bergeser menyesuaikan dengan lebar web browser. Inilah tampilan default dari tabel HTML.', 0),
(4, 1, 'Lakban Hitam', 5000, 300, 'lakban hitam.jpg', '', 0),
(7, 1, 'Pulpen Warna', 2000, 100, 'pulpen warna.jpg', 'Pulpen warna', 20),
(10, 1, 'Pensil Faber Castle', 3000, 100, 'faber castle.jpg', 'Barang Bagus', 12),
(11, 1, 'Pensil Joyko', 2500, 100, 'joyko.jpg', 'Pensil Bagus', 0),
(12, 1, 'Jangka Pensil', 5000, 300, 'jangka pensil.jpg', 'Jangka pensil Bagus', 12),
(13, 1, 'Tipex Kertas', 5000, 300, 'Tipex Kertas.jpg', 'Tipex Kertas Bagus', 12),
(14, 1, 'Tipex Joyko', 5000, 300, 'tipex.jpg', 'Tipex Joyko Bagus', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `foto_product`
--
ALTER TABLE `foto_product`
  ADD PRIMARY KEY (`id_fo`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_plg`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_byr`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pem`);

--
-- Indexes for table `pem_product`
--
ALTER TABLE `pem_product`
  ADD PRIMARY KEY (`id_pem_pro`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_product`
--
ALTER TABLE `foto_product`
  MODIFY `id_fo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_plg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_byr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pem_product`
--
ALTER TABLE `pem_product`
  MODIFY `id_pem_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
