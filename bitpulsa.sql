-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2015 at 05:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitpulsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `photo`, `email`) VALUES
(1, 'admin ', '21232f297a57a5a743894a0e4a801fc3', 'avatar5.png', 'hariyansah.es@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
`id_operator` int(20) NOT NULL,
  `nama_operator` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nama_operator`) VALUES
(2, 'indosat'),
(4, 'telkomsel'),
(5, 'three'),
(6, 'axis'),
(7, 'esia'),
(8, 'smartfren'),
(9, 'xl'),
(10, 'ceria');

-- --------------------------------------------------------

--
-- Table structure for table `operator_paket`
--

CREATE TABLE IF NOT EXISTS `operator_paket` (
`id_operator_paket` int(20) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `id_operator` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator_paket`
--

INSERT INTO `operator_paket` (`id_operator_paket`, `nominal`, `harga`, `id_operator`) VALUES
(1, '5000', '0.5', 2),
(2, '20000', '2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(20) NOT NULL,
  `transaksi_code` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nomor` varchar(25) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_paket` int(20) NOT NULL,
  `total` int(30) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `hash` varchar(70) NOT NULL,
  `log` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `transaksi_code`, `status`, `nomor`, `id_user`, `id_paket`, `total`, `tanggal`, `hash`, `log`) VALUES
(4, 'VVRDGQV5', 'completed', '08985622347', '1', 2, 41670, '06-03-2015', '519e3992502efb15cb26dcfd554e50b8ec24f89a0e2bd5a70c41ea5305c7c01b', 'Array\n(\n    [order] => Array\n        (\n            [id] => VVRDGQV5\n            [created_at] => 2015-02-24T19:33:26-08:00\n            [status] => completed\n            [event] => Array\n                (\n                    [type] => completed\n                )\n\n            [total_btc] => Array\n                (\n                    [cents] => 41670\n                    [currency_iso] => BTC\n                )\n\n            [total_native] => Array\n                (\n                    [cents] => 10\n                    [currency_iso] => USD\n                )\n\n            [total_payout] => Array\n                (\n                    [cents] => 0\n                    [currency_iso] => USD\n                )\n\n            [custom] => 08985622347_3_1\n            [receive_address] => 1CMcESZSL1HCZwYRekdJkkR2qQQkVQnkrr\n            [button] => Array\n                (\n                    [type] => buy_now\n                    [subscription] => \n                    [repeat] => \n                    [name] => Pulsa\n                    [description] => \n                    [id] => 7366971f3e064e89a8a33d958409b7ab\n                )\n\n            [refund_address] => 15ikqaZZVSZ9U65EBk4nGjatfqVL6wqV9Y\n            [transaction] => Array\n                (\n                    [id] => 54ed42c1bee40b3b39000011\n                    [hash] => 519e3992502efb15cb26dcfd554e50b8ec24f89a0e2bd5a70c41ea5305c7c01b\n                    [confirmations] => 0\n                )\n\n        )\n\n)\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(20) NOT NULL,
  `nama` tinytext NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `photo`, `email`) VALUES
(1, 'darth vader', 'darth', '2db1850a4fe292bd2706ffd78dbe44b9', 'avatar5.png', 'darth.vader@dark.com'),
(2, 'arinda gita', 'arinda', 'c7e4144eb0746638c11eb28dd0c988a9', 'a.jpg', 'arinda@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
 ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `operator_paket`
--
ALTER TABLE `operator_paket`
 ADD PRIMARY KEY (`id_operator_paket`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
MODIFY `id_operator` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `operator_paket`
--
ALTER TABLE `operator_paket`
MODIFY `id_operator_paket` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
