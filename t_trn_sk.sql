CREATE TABLE `t_trn_sk` (
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nomor_parent` int(11) NOT NULL DEFAULT '0',
  `tahun` varchar(4) NOT NULL DEFAULT '',
  `no_unitorg` varchar(4) NOT NULL DEFAULT '',
  `kd_jenis_sd` char(1) NOT NULL DEFAULT '',
  `kd_jenis_sk` char(2) NOT NULL DEFAULT '',
  `no_konsep_sk` varchar(30) NOT NULL DEFAULT '',
  `tgl_konsep_sk` datetime DEFAULT NULL,
  `no_terkait` varchar(30) DEFAULT NULL,
  `konseptor` varchar(100) DEFAULT NULL,
  `no_surat_keluar` varchar(50) DEFAULT '',
  `tgl_surat_keluar` datetime DEFAULT NULL,
  `sifat_sk` char(2) DEFAULT NULL,
  `ditujukan` varchar(255) DEFAULT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `tentang` varchar(255) DEFAULT NULL,
  `membaca` mediumtext,
  `menimbang` mediumtext,
  `mengingat` mediumtext,
  `memperhatikan` mediumtext,
  `isi_suratkeluar` longtext,
  `ditetapkan_di` varchar(60) DEFAULT NULL,
  `tgl_ditetapkan` datetime DEFAULT NULL,
  `an_pejabat` varchar(100) DEFAULT NULL,
  `jabatan_ttd` varchar(100) DEFAULT NULL,
  `pejabat_ttd` varchar(60) DEFAULT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `jabatan_ttd1` varchar(100) DEFAULT NULL,
  `pejabat_ttd1` varchar(60) DEFAULT NULL,
  `NIP1` varchar(20) DEFAULT NULL,
  `tembusan` mediumtext,
  `keterangan` varchar(100) DEFAULT NULL,
  `lampiran` mediumtext,
  `status_sk` char(2) DEFAULT NULL,
  `no_kirim` varchar(50) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `file_dokumen` varchar(100) DEFAULT NULL,
  `sp_tgl` mediumtext,
  `sp_jml` varchar(100) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `kantor_1` varchar(100) DEFAULT NULL,
  `alamat_1` varchar(100) DEFAULT NULL,
  `kantor_2` varchar(100) DEFAULT NULL,
  `alamat_2` varchar(100) DEFAULT NULL,
  `mengetahui` varchar(30) DEFAULT NULL,
  `kepada` mediumtext,
  `batas_sd` smallint(6) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `no_terkait2` varchar(30) DEFAULT NULL,
  `flag_sk` tinyint(1) DEFAULT '3',
  PRIMARY KEY (`nomor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;