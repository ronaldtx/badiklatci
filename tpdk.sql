-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 02:15 PM
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
-- Table structure for table `t_trn_sm`
--

CREATE TABLE IF NOT EXISTS `t_trn_sm` (
  `id` int(10) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `tahun` varchar(4) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `kd_jenis_sm` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `no_agenda` varchar(25) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `tgl_agenda` datetime DEFAULT NULL,
  `kd_unitorg` varchar(6) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `no_agendatu` varchar(25) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `tgl_agendatu` datetime DEFAULT NULL,
  `no_surat` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `tgl_surat` datetime DEFAULT NULL,
  `perihal` mediumtext CHARACTER SET latin1,
  `instansi_asal` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ditujukan` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `diteruskan` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `disposisi` mediumtext CHARACTER SET latin1,
  `batas_selesai_disp` smallint(6) DEFAULT NULL,
  `keterangan` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `file_dokumen` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `kd_status_sm` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `user_posting` varchar(100) CHARACTER SET latin1 DEFAULT 'SYSTEM',
  `kd_sumber` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `no_terkait` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `no_terkait2` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_undangan` date NOT NULL,
  `waktu` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama_pj` varchar(40) CHARACTER SET latin1 NOT NULL,
  `disposisi_undangan` varchar(30) CHARACTER SET latin1 NOT NULL,
  `odner1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `odner2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `odner3` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tindak_lanjut` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tempat` varchar(80) CHARACTER SET latin1 NOT NULL,
  `kegiatan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `agenda` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lampiran` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `kd_sifat_sm` varchar(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


--
-- Table structure for table `t_trn_sm_detail`
--

CREATE TABLE IF NOT EXISTS `t_trn_sm_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsm` int(10) NOT NULL,
  `kd_aksi` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
