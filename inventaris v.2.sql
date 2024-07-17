-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 06:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='id_barang' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`) VALUES
(2, 'laptop'),
(3, 'kipas'),
(7, 'printer'),
(8, 'komputer'),
(9, 'UPS'),
(12, 'earphone'),
(14, 'laptop notebook');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `id_barang`, `tgl_keluar`, `jml_keluar`, `lokasi`, `penerima`) VALUES
(1, 2, '2019-03-28', 1, 'lab mm', 'bidin'),
(2, 14, '2019-04-05', 5, 'lab PM', 'ihfa'),
(3, 8, '2019-04-05', 2, 'GB Mart', 'aldy');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `min_stock` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE
	stock
SET
	sisa_stok = sisa_stok - new.jml_keluar
WHERE
	id_barang=new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `spesifikasi` text NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `jml_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `id_suplier`, `tgl_masuk`, `spesifikasi`, `lokasi`, `kondisi`, `sumber_dana`, `jml_masuk`) VALUES
(3, 2, 1, '2019-02-28', 'asus i5', 'lab ak', 'bekas', 'dana sumbangan', 5),
(14, 7, 1, '2019-03-01', 'printer epson 220', 'lab rpl', 'baru', 'dana sumbangan', 1),
(15, 3, 2, '2019-03-01', 'kipas angin vika', 'lab akuntansi', 'bekas', 'dana bos', 2),
(18, 8, 2, '2019-03-01', 'komputer asus ram 4gb i5', 'lab mm', 'baru', 'dana sponsor', 20),
(19, 3, 2, '2019-03-03', 'kipas isekai 3000', 'lab bdp', 'baru', 'dana sponsor sinar terang', 2),
(24, 12, 1, '2019-03-07', 'earphone untuk komputer', 'lab rpl', 'baru', 'dana bos', 10),
(25, 7, 1, '2019-03-21', 'printer 3pson L220', 'lab rpl', 'baik', 'dana bos', 2),
(26, 2, 1, '2019-03-27', 'charger for asus', 'lab rpl', 'baru', 'dana bos', 20),
(28, 2, 2, '2019-03-28', 'laptop ROG type 1', 'lab mm', 'bekas', 'dana bos', 11),
(29, 9, 1, '2019-04-04', 'ups for komputer', 'lab RPL', 'baru', 'dana bos', 5),
(30, 12, 1, '2019-04-04', 'earphone untuk komputer', 'lab RPL', 'baru', 'dana bos', 10),
(31, 14, 2, '2019-04-05', 'notebook asus', 'lab RPL', 'baru', 'data bos', 20);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `add_stock` BEFORE INSERT ON `barang_masuk` FOR EACH ROW INSERT INTO
	stock (id_barang,sisa_stok)
VALUES
	(new.id_barang, new.jml_masuk)
ON DUPLICATE KEY UPDATE sisa_stok = sisa_stok + new.jml_masuk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `keluar`
--
CREATE TABLE `keluar` (
`id_barang` int(11)
,`nama_barang` varchar(255)
,`jml_keluar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `masuk`
--
CREATE TABLE `masuk` (
`id_barang` int(11)
,`nama_barang` varchar(255)
,`jml_masuk` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pinjam`
--
CREATE TABLE `pinjam` (
`id_barang` int(11)
,`nama_barang` varchar(255)
,`jml_pinjam` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_pinjam` int(11) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_pinjam`, `peminjam`, `tgl_pinjam`, `id_barang`, `jml_barang`, `tgl_kembali`, `kondisi`) VALUES
(3, 'peminjam1', '2019-03-28', 7, 1, '2019-03-31', 'baru'),
(4, 'peminjam1', '2019-03-29', 2, 1, '2019-03-31', 'baik'),
(6, 'peminjam2', '2019-04-04', 2, 1, '2019-04-11', 'baik');

--
-- Triggers `pinjam_barang`
--
DELIMITER $$
CREATE TRIGGER `mines_stock` BEFORE INSERT ON `pinjam_barang` FOR EACH ROW UPDATE
	stock
SET
	sisa_stok = sisa_stok - new.jml_barang
WHERE
	id_barang=new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_barang` int(11) NOT NULL,
  `sisa_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `stok`
--
CREATE TABLE `stok` (
`id_barang` int(11)
,`nama_barang` varchar(255)
,`jml_masuk` decimal(32,0)
,`jml_keluar` decimal(32,0)
,`jml_pinjam` decimal(32,0)
,`sisa_stok` decimal(34,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `alamat_suplier` text NOT NULL,
  `telp_suplier` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat_suplier`, `telp_suplier`) VALUES
(1, 'computer media utama', 'jalan tambak ujung', '082251607577'),
(2, 'tukarjual.com', 'jl. tambak permai', '0456456906'),
(3, 'sumber abadi', 'jln. empat serangkai', '082251607522');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` char(100) NOT NULL,
  `password` char(250) NOT NULL,
  `level` enum('administrator','manajemen','peminjam','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(5, 'Peminjam 1', 'peminjam1', 'd192e8083fb41156babcab75c345cccf', 'peminjam'),
(6, 'peminjam 2', 'peminjam2', '53c00c96141e24cfff921a36ce962dd6', 'peminjam'),
(7, 'manajemen', 'manajemen', '19b51f1cbb6146adcacbce46d5bdc3f2', 'manajemen'),
(8, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Structure for view `keluar`
--
DROP TABLE IF EXISTS `keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `keluar`  AS  select `barang`.`id_barang` AS `id_barang`,`barang`.`nama_barang` AS `nama_barang`,sum(coalesce(`barang_keluar`.`jml_keluar`,0)) AS `jml_keluar` from (`barang` left join `barang_keluar` on((`barang`.`id_barang` = `barang_keluar`.`id_barang`))) group by `barang`.`id_barang` ;

-- --------------------------------------------------------

--
-- Structure for view `masuk`
--
DROP TABLE IF EXISTS `masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `masuk`  AS  select `barang`.`id_barang` AS `id_barang`,`barang`.`nama_barang` AS `nama_barang`,sum(coalesce(`barang_masuk`.`jml_masuk`,0)) AS `jml_masuk` from (`barang` left join `barang_masuk` on((`barang`.`id_barang` = `barang_masuk`.`id_barang`))) group by `barang`.`id_barang` ;

-- --------------------------------------------------------

--
-- Structure for view `pinjam`
--
DROP TABLE IF EXISTS `pinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pinjam`  AS  select `barang`.`id_barang` AS `id_barang`,`barang`.`nama_barang` AS `nama_barang`,sum(coalesce(`pinjam_barang`.`jml_barang`,0)) AS `jml_pinjam` from (`barang` left join `pinjam_barang` on((`barang`.`id_barang` = `pinjam_barang`.`id_barang`))) group by `barang`.`id_barang` ;

-- --------------------------------------------------------

--
-- Structure for view `stok`
--
DROP TABLE IF EXISTS `stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok`  AS  select `masuk`.`id_barang` AS `id_barang`,`masuk`.`nama_barang` AS `nama_barang`,`masuk`.`jml_masuk` AS `jml_masuk`,`keluar`.`jml_keluar` AS `jml_keluar`,`pinjam`.`jml_pinjam` AS `jml_pinjam`,((`masuk`.`jml_masuk` - `keluar`.`jml_keluar`) - `pinjam`.`jml_pinjam`) AS `sisa_stok` from ((`masuk` join `keluar` on((`masuk`.`id_barang` = `keluar`.`id_barang`))) join `pinjam` on((`masuk`.`id_barang` = `pinjam`.`id_barang`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`,`id_suplier`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_4` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
