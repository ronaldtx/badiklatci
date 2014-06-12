-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2014 at 11:57 AM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tpdk`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_par_aksi`
--

CREATE TABLE IF NOT EXISTS `t_par_aksi` (
  `kd_aksi` varchar(2) CHARACTER SET utf8 NOT NULL,
  `nama_aksi` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`kd_aksi`),
  UNIQUE KEY `nama_aksi` (`nama_aksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_par_aksi`
--

INSERT INTO `t_par_aksi` (`kd_aksi`, `nama_aksi`) VALUES
('09', 'Buat resume'),
('04', 'Dibahas bersama dengan Kabadiklat'),
('05', 'Dibahas dalam rapat pimpinan'),
('07', 'Siapkan jawaban'),
('10', 'Simpan(File)'),
('08', 'Supaya menghadap'),
('03', 'Tanggapan dan saran'),
('06', 'Untuk dijadwalkan'),
('01', 'Untuk diketahui sebagai informasi'),
('02', 'Untuk diselesaikan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
