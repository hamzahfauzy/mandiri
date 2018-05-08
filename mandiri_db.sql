-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2018 at 11:56 PM
-- Server version: 5.5.59-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mandiri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `gejalaID` int(11) NOT NULL AUTO_INCREMENT,
  `penyakitID` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `kategori_bagian` int(11) NOT NULL,
  PRIMARY KEY (`gejalaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`gejalaID`, `penyakitID`, `nama_gejala`, `kategori_bagian`) VALUES
(1, 4, 'Kepala Puyeng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `obatID` int(11) NOT NULL AUTO_INCREMENT,
  `penyakitID` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `usia` varchar(100) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`obatID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`obatID`, `penyakitID`, `nama_obat`, `deskripsi`, `usia`, `harga`, `stok`, `gambar`) VALUES
(1, 4, 'Oskadon', 'obat sakit kepala', '3', '4000', 45, 'oskadon.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `pelangganID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`pelangganID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelangganID`, `username`, `nama_lengkap`, `alamat`, `jenis_kelamin`, `no_telepon`) VALUES
(1, 'fauzy', 'Hamzah Fauzy', 'Kisaran', 'Laki-laki', '08123456789'),
(2, 'a', 'a', 'a', 'Laki-laki', '123');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `penyakitID` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penyakit` varchar(100) NOT NULL,
  `kategori_bagian` varchar(100) NOT NULL,
  PRIMARY KEY (`penyakitID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`penyakitID`, `nama_penyakit`, `kategori_bagian`) VALUES
(1, 'Batuk', '6'),
(2, 'Gatal', '2'),
(3, 'Gigi Berlubang', '7'),
(4, 'Pusing Kepala', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksiID` int(11) NOT NULL AUTO_INCREMENT,
  `obatID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaksiID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksiID`, `obatID`, `username`, `jumlah`, `status`, `tanggal`) VALUES
(8, 1, 'a', 3, 2, '2018-02-21 16:47:49'),
(9, 1, 'a', 5, 2, '2018-02-21 16:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`) VALUES
('a', '0cc175b9c0f1b6a831c399e269772661', 2),
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('fauzy', '6172de70289f996b192e1b2f5a932ace', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
