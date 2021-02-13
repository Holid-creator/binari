-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2020 pada 14.14
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
-- Database: `db_binari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'Yola', 'yola', 'yola yosanta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_plg` int(11) NOT NULL,
  `e_plg` varchar(100) NOT NULL,
  `pass_plg` varchar(50) NOT NULL,
  `n_plg` varchar(50) NOT NULL,
  `telp_plg` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_plg`, `e_plg`, `pass_plg`, `n_plg`, `telp_plg`) VALUES
(1, 'yolasayang@gmail.com', 'yola', 'yola sayang', '085780781987'),
(2, 'holidin37@gmail.com', 'holid', 'Evans', '08578968745');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pem` int(11) NOT NULL,
  `id_plg` int(11) NOT NULL,
  `tgl_pem` date NOT NULL,
  `to_pem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pem`, `id_plg`, `tgl_pem`, `to_pem`) VALUES
(1, 1, '2020-12-08', 100000),
(2, 2, '2020-12-08', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pem_product`
--

CREATE TABLE `pem_product` (
  `id_pem_pro` int(11) NOT NULL,
  `id_pem` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pem_product`
--

INSERT INTO `pem_product` (`id_pem_pro`, `id_pem`, `id_pro`, `jumlah`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `n_pro` varchar(100) NOT NULL,
  `hrg_pro` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `f_pro` varchar(100) NOT NULL,
  `des_pro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_pro`, `n_pro`, `hrg_pro`, `berat`, `f_pro`, `des_pro`) VALUES
(1, 'Pulpen', 2000, 100, 'pencil-freshly-1976489_960_720.jpg', 'gfwgerh'),
(3, 'Pensil Gambar', 12000, 500, 'pensil gambar.jpg', 'Pensil adalah alat tulis dan lukis yang awalnya terbuat dari grafit murni. Penulisan dilakukan dengan menggoreskan grafit tersebut ke atas media. Namun grafit murni cenderung mudah patah, terlalu lembut, memberikan efek kotor saat media bergesekan dengan tangan, dan mengotori tangan saat dipegang.'),
(4, 'Lakban Hitam', 5000, 300, 'lakban hitam.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_plg`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pem`);

--
-- Indeks untuk tabel `pem_product`
--
ALTER TABLE `pem_product`
  ADD PRIMARY KEY (`id_pem_pro`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_plg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pem_product`
--
ALTER TABLE `pem_product`
  MODIFY `id_pem_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
