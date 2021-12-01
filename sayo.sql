-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 03:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sayo`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(10) NOT NULL,
  `detail_custom` text NOT NULL,
  `id_user` int(20) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `lengan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `id_detil_trans` int(10) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_trans` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_custom`
--

CREATE TABLE `file_custom` (
  `id_fcustom` int(10) NOT NULL,
  `f_custom` text NOT NULL,
  `loc_fcustom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_fprod` int(10) NOT NULL,
  `file_prod` text NOT NULL,
  `loc_pfile` text NOT NULL,
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id_fprod`, `file_prod`, `loc_pfile`, `id_produk`) VALUES
(9, 'ASTRO GUITAR-BLACK.jpg', 'uploads/produk/20200104191443/', 11),
(10, 'ASTRO GUITAR-NAVY.jpg', 'uploads/produk/20200104191443/', 11),
(11, 'FULL ASTRO-NAVY.jpg', 'uploads/produk/20200105144229/', 12),
(12, 'FULL ASTRO-BL.jpg', 'uploads/produk/20200105144229/', 12),
(13, 'SHARK-BL.jpg', 'uploads/produk/20200105155515/', 13),
(14, 'SHARK-NAVY.jpg', 'uploads/produk/20200105155515/', 13),
(15, 'SURF-BL.jpg', 'uploads/produk/20200105155834/', 14),
(17, 'CIRCLE OWL-NAVY.jpg', 'uploads/produk/20200105171525/', 15),
(18, 'CIRCLE OWL-BL.jpg', 'uploads/produk/20200105171525/', 15),
(19, 'SURF-NAVY.jpg', 'uploads/produk/20200105193738/', 14),
(20, 'WOLF DISCO-NAVY.jpg', 'uploads/produk/20200105234534/', 16),
(21, 'WOLF DISCO-BL.jpg', 'uploads/produk/20200105234534/', 16);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  `sex_cat` enum('men','women','unisex') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`, `sex_cat`) VALUES
(1, 'Kaos', 'men'),
(2, 'Polo Shirt', 'men'),
(3, 'Kemeja', 'men'),
(4, 'Celana Panjang', 'men'),
(5, 'Celana Pendek', 'men'),
(6, 'Jeans', 'men'),
(7, 'Atasan', 'women'),
(8, 'Dress', 'women'),
(9, 'Rok', 'women'),
(10, 'Celana Pendek', 'women'),
(11, 'Celana & Legging', 'women'),
(12, 'Jeans', 'women'),
(13, 'Hoodies & Sweatshirts', 'women'),
(14, 'Jaket', 'men'),
(15, 'Jaket', 'women');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(10) NOT NULL,
  `komen` text NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `id_toko` int(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `desc_produk` text NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` int(16) NOT NULL,
  `slug_produk` text NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `tgl_buat` date NOT NULL,
  `dilihat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_toko`, `nama_produk`, `desc_produk`, `stok`, `harga`, `slug_produk`, `id_kategori`, `tgl_buat`, `dilihat`) VALUES
(11, 17, 'Kaos Astro Guitar', 'Stairways & Co', 12, 100000, 'kaos-astro-guitar', 1, '2020-01-04', 0),
(12, 1, 'Kaos Hello Astronaut Full', 'SAYo!\r\nWarna : Black & Navy\r\nSize : M & L', 24, 120000, 'kaos-hello-astronaut-full', 1, '2020-01-05', 0),
(13, 1, 'Kaos Shark Bikers Full', 'SAYo!\r\nWarna : Black & Navy\r\nSize : M & L', 12, 120000, 'kaos-shark-bikers-full', 1, '2020-01-05', 0),
(14, 1, 'Kaos Astronaut Surfing', 'SAYo!\r\nSize : M dan L\r\nColor : Black and Navy', 12, 90000, 'kaos-astronaut-surfing', 1, '2020-01-05', 0),
(15, 1, 'Kaos Owl Circle', 'SAYo!', 12, 90000, 'kaos-owl-circle', 1, '2020-01-05', 0),
(16, 17, 'Kaos Disco Wolf', 'Stairways & Co', 12, 85000, 'kaos-disco-wolf', 1, '2020-01-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_produk`
--

CREATE TABLE `review_produk` (
  `id_review` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `review` text NOT NULL,
  `rating` int(3) NOT NULL,
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tas`
--

CREATE TABLE `tas` (
  `id_tas` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jml_prod` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tas`
--

INSERT INTO `tas` (`id_tas`, `id_user`, `id_produk`, `jml_prod`) VALUES
(1, 1, 12, 2),
(2, 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `desc_toko` text NOT NULL,
  `foto_toko` text NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('official','unofficial') NOT NULL DEFAULT 'unofficial'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `id_user`, `nama_toko`, `desc_toko`, `foto_toko`, `alamat`, `status`) VALUES
(1, 1, 'SAYo', 'SAYo merupakan brand lokal Indonesia', 'uploads/toko/avatar/1/sayo.jpg', 'Jl. Raya Jatiwaringin', 'official'),
(17, 4, 'Stairways & Co', 'Stairways & Co. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'uploads/toko/avatar/2020-01-02 211645/8568803_20160328095550.jpg', 'Ciracas', 'official');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jml_transaksi` int(5) NOT NULL,
  `hrg_transaksi` double NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status` enum('New','Dibayar','Sampai Tujuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `fname`, `lname`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'Administrator', 'SAYo'),
(3, 'rheadavin', '12345678', 'rheadavin13@gmail.com', 'Rhea', 'Adhiskara'),
(4, 'johndoe', '12345678', 'johndoe@gmail.com', 'John', 'Doe'),
(5, 'ahmadrizky', '12345678', 'ahmadrizky@gmail.com', 'Ahmad', 'Rizky'),
(7, 'rheadavin13', '12345678', 'rheadavin@yahoo.co.id', 'Rhea', 'Davin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_produk`) VALUES
(1, 1, 15),
(2, 3, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`id_detil_trans`);

--
-- Indexes for table `file_custom`
--
ALTER TABLE `file_custom`
  ADD PRIMARY KEY (`id_fcustom`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_fprod`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `review_produk`
--
ALTER TABLE `review_produk`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `tas`
--
ALTER TABLE `tas`
  ADD PRIMARY KEY (`id_tas`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `id_detil_trans` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_custom`
--
ALTER TABLE `file_custom`
  MODIFY `id_fcustom` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_fprod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review_produk`
--
ALTER TABLE `review_produk`
  MODIFY `id_review` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tas`
--
ALTER TABLE `tas`
  MODIFY `id_tas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
