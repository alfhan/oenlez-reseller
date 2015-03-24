-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2015 at 11:14 PM
-- Server version: 5.5.33-MariaDB
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alfhanco_katalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `kode_barcode`, `nama`, `jenis_barang_id`, `qty`, `harga_jual`, `harga_beli`, `foto`, `created_date`, `modified_date`, `created_by`, `modified_by`, `keterangan`) VALUES
(1, 'T0008', 'T0008', 'MicroSD Class 10 8GB', 4, 17, '85000.00', '70000.00', '706f8197321f629bb4eddc320c911397.jpg', NULL, NULL, 0, 0, 'MicroSD 8GB Class 10 Sandisk'),
(5, 'T0007', 'T0007', 'Kamera MiniDV', 1, 9, '125000.00', '100000.00', '654f440c110bcc3a24e51c721d8a31d7.gif', NULL, NULL, NULL, NULL, 'In standy by position, simply press the ON / OFF once, then Taff Mini DV Camera 5MP started recording and a position indicator light is red light. Press the ON / OFF button again, then the red light goes out and the video recording is saved.'),
(9, 'T0006', 'T0006', 'MicroSD Toshiba 8GB', 4, 10, '70000.00', '53000.00', '573a20d7e5de63a4bf9477e28e8ad682.jpg', NULL, NULL, NULL, NULL, 'MicroSD Toshiba Class 10 8GB'),
(10, 'T0005', 'T0005', 'MicroSD Toshiba 16GB', 4, 18, '100000.00', '73000.00', '99fcd49ebf89e4b1d0205c1eed2a86f7.jpg', NULL, NULL, NULL, NULL, 'MicroSD Toshiba Class 10 Toshiba'),
(11, 'T0004', 'T0004', 'Flashdisk Sandisk 8GB', 3, 6, '65000.00', '43000.00', 'aaa45d58cb05b0f1a2aebf63ed7d3049.jpg', NULL, NULL, NULL, NULL, ''),
(12, 'T0003', 'T0003', 'Melilea Susu Kedelai', 7, 6, '60000.00', '55000.00', 'ee6588466f03445b8ec4bf241b10c773.jpg', NULL, NULL, NULL, NULL, ''),
(13, 'T0002', 'T0002', 'MicroDuo 16GB', 3, 13, '125000.00', '105000.00', 'dfab9be491e5122724ea8d29d26f1738.jpg', NULL, NULL, NULL, NULL, 'MicroDuo Kingstone SanDisk 16 GB\nOTG USB Flash Drive for Smartphones & Tablets,\n\nhanya tablet dan smartphone yang support OTG, tetap bisa digunakan seperti FlashDisk pada umumnya di laptop/komputer'),
(14, 'OMSK13BK', 'OMSK13BK', 'Bluetooth Headset', 2, 5, '100000.00', '83000.00', '3059ce09297e4b22f318e7a825e3dc93.gif', NULL, NULL, NULL, NULL, 'Bluetooth Wireless Headset T820 gives you the freedom to stay connected to your world, whenever and wherever you are. The T820 is product of easy series. Easy to pair with your phone, easy to use, and with high quality sound to make it easier to hear and be heared.'),
(15, 'T0001', 'T001', 'Flashdisk Sandsik 4GB', 3, 9, '60000.00', '42000.00', '7e612294e543e0a69b9efbea040953db.jpg', NULL, NULL, NULL, NULL, ''),
(16, 'VZAN01BK', 'VZAN01BK', 'Notebook Security Lock', 1, 10, '30000.00', '22500.00', '5dc86234f6ac751b0ec27be12212f92f.jpg', NULL, NULL, NULL, NULL, 'Notebook Digital Security Lock - Black\nVZTEC NOTEBOOK Computer Cryptogrammic LOCK 1.8M works on nearly all notebook computers manufactured, and protects your notebook computer from theft. Effective, convenient and fast security in any office, hotel, home or car!'),
(17, 'ETBT03BK', 'ETBT03BK', 'UPS 650V 390W', 1, 20, '550000.00', '510000.00', '4d27a13883dc62dcedccef4890dd5224.JPG', NULL, NULL, NULL, NULL, 'UPS berguna sebagai power supply darurat untuk alat elektronik. Dengan UPS, perangkat elektronik Anda dapat menyala hingga beberapa menit saat listrik PLN mati.\n\nTipe Baterai : 1 x 12V7AH 390W 650Va\nCapacity : 15 - 20 Backup time\nInput Voltage : 165-275V / 82-138V\nOutput Voltage : 220V/230V/240V/110V/120V \nDimension : 280(L) x 185(W) x 95(H) mm'),
(18, 'KIMC0BXX', 'KIMC0BXX', 'Kingstone 16GB Class4', 4, 16, '100000.00', '86000.00', '8e18ab3d2bfab56d5499e6c4c54da507.jpg', NULL, NULL, NULL, NULL, 'Capacity : 16GB\nTransfer Rate : 10MB/sec minimum data transfer rate (Class 10)\nDimension : 0.43" x 0.59" x 0.039" (11mm x 15mm x 1mm)\nOthers\nCompatible : with microSDHC/SDXC host devices only\nOperating Temperatures: 13 F to 185 F (-25 C to 85 C)\nStorage Temperatures: 40 F to 185 F (-40 C to 85 C)'),
(19, 'T0009', 'T0009', 'MicroSD Sandsik 16GB', 4, 1, '120000.00', '105000.00', 'c278d2cc841b4a13914bff84949cbfd3.jpg', NULL, NULL, NULL, NULL, 'MicroSD Class 10 Sandisk 16GB'),
(20, 'SSMC0BXX', 'SSMC0BXX', 'Samsung Class 10 16GB', 4, 10, '115000.00', '99000.00', 'ea98eaca096325d49ba010ed405076cc.gif', NULL, NULL, NULL, NULL, 'Technical Specifications of Samsung MicroSDHC EVO Class 10 (48MB/s) 16GB - MB-MP16D\nCapacity : 16GB\nTransfer Rate : Class 10, Interface USH-I, Up to 48MB/s\nDimension : 0.59" x 0.43" x 0.04"'),
(21, 'dr01283', '329809247', 'Simply Dress & Pasmina', 9, 5, '90000.00', '80000.00', 'a44f4bdc8c2923b1c36eecdbaf4120a4.jpg', NULL, NULL, NULL, NULL, 'bahan spandek rayon super original, fi XL panjang 140cm, kancing bukaan bisa untuk ibu menyusui. Original by AV\n'),
(22, 'spt0486', '846478470', 'Flat shoes model', 9, 14, '35000.00', '25000.00', '1cb30ec757e4191857b994f61c09b6d4.jpg', NULL, NULL, NULL, NULL, 'Sepatu flat yang trendy & modis cocok untuk segala acara, bebas pilih warna dan ukuran. harga murah bahan bagus, nyaman di pakai'),
(23, 'dr3437', '9379', 'Naria maron bergo', 9, 3, '135000.00', '125000.00', '3d99de581e7baf84b7f009214274ce4b.jpg', NULL, NULL, NULL, NULL, '2173 NARIA MARON Bergo MAXI jersey BUSUI sleting+BERGOpadding. detail renda mewah,pjg 140cm fit XL, bag.bawah blkg NO renda'),
(24, 'dr2173', '85037', '2173 Naria Tosca Bergo ', 9, 4, '135000.00', '125000.00', 'bc31d074a9135eed03294beb375801d3.jpg', NULL, NULL, NULL, NULL, '2173 NARIA TOsca Bergo  ,MAXI jersey BUSUI sleting+BERGOpadding. detail renda mewah,pjg 140cm fit XL, bag.bawah blkg NO renda'),
(25, 'ai124', '121456', 'AIrin Bergo pink', 9, 2, '130000.00', '120000.00', '45bbfff0cb5dac21389e9b4c233cc389.jpg', NULL, NULL, NULL, NULL, 'Airin pink + bergo bahan jersey fit XL'),
(26, 'br248', '39720', 'Bergo Syar''i LV + pet', 9, 12, '60000.00', '50000.00', '7dadd99b917f4e464b9b1f21881c90ac.jpg', NULL, NULL, NULL, NULL, 'bergo syar''i lv + pet mat ceruty lapis uk jumbo'),
(27, 'ct115', '150473', 'Dress Citata Ori', 9, 6, '135000.00', '115000.00', 'b14b8ebb35c7a388fd4a929a7b1abc1b.jpg', NULL, NULL, NULL, NULL, 'Citata  maxi dengan detail prada silver mewah bahan spandek jersey sutra'),
(28, 'kh2590', '2509867', 'Khimar 2 layer bros pita', 9, 12, '60000.00', '50000.00', 'e1ec801bc94d377c701cede5ea81068e.jpg', NULL, NULL, NULL, NULL, 'khimar 2 layer bros pita mat ceruty premium bebas pilih warna'),
(29, 'LV538', '45389', 'LV green purple', 9, 6, '135000.00', '116000.00', '724dc54df5b92eba26ddbdf2b4cd95d2.jpg', NULL, NULL, NULL, NULL, 'lv syar''i green purple + bergo bahan jersey mix renda import fit Xl bisa untuk ibu menyusui sleting dpn'),
(30, 'lv1157', '482901-28', 'Lyra Virna ', 9, 4, '140000.00', '115000.00', '2bc6c8690a65a6ec38b742847140caee.jpg', NULL, NULL, NULL, NULL, 'LYra virna  jersey super mix renda bunga seperti pict import high quality fti XL pjg 140'),
(31, 'mx123', '2-48946', 'Maxi Mentari', 9, 2, '95000.00', '89000.00', 'f8130dfd2faed9a4ba5d11e608773028.jpg', NULL, NULL, NULL, NULL, 'maxi mentari  mat wedges import tebal warna navy tua'),
(32, 'po0837', '0787439', 'LV Fira PO', 9, 6, '145000.00', '120000.00', '16e2e2b80ad292ed39f47237e5f8c03f.jpg', NULL, NULL, NULL, NULL, 'PO LV Fira set  bahan jerey kombinasi hycont fit to XL warna hiaju muda'),
(33, 'Sy0197', '2024478', 'Syar''i Jumbo Bilqis', 9, 6, '65000.00', '57000.00', 'da6b15af5955c5102e7a6e5ffebea403.jpg', NULL, NULL, NULL, NULL, 'syar''i jumbo bilqis bahan jersey '),
(34, 'dr368', '08675', 'Dres Syar''i', 9, 1, '140000.00', '120000.00', '5dc44fb0f8e9d99b06cf4ab6958160f8.jpg', NULL, NULL, NULL, NULL, 'Bahan Jersey fit L besar'),
(35, 'dr123', '123dr', 'Bergo Syar''i Qila', 9, 12, '65000.00', '55000.00', '380670ade4e4f0c1dc0e005bce0537a6.jpg', NULL, NULL, NULL, NULL, 'Bahan jersey bebas pilih warna '),
(36, 'lv123', '123LV', 'LV syar''i Black', 9, 1, '135000.00', '120000.00', 'b1bf580d7b0d8ec056d3d39f2733ce36.jpg', NULL, NULL, NULL, NULL, 'bahan jersey super mix list renda fit/muat sampai XL , bergo tanpa Pad, ready 2 mingguan'),
(37, 'ky12', '3864', 'Kayla Syar''i', 1, 2, '140000.00', '120000.00', '0a3b90a61722b01cbe1a8799c69ef22f.jpg', NULL, NULL, NULL, NULL, 'bahan jersey serena halus'),
(38, 'jb01', '012', 'segi4 bolak balik', 9, 1, '50000.00', '45000.00', '4bdd032bdea3207b1f0d2f864b251429.jpg', NULL, NULL, NULL, NULL, 'bhan bagus pengiriman dari malang');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `qty_awal` tinyint(4) DEFAULT NULL,
  `qty_masuk` tinyint(4) DEFAULT NULL,
  `qty_akhir` tinyint(4) DEFAULT NULL,
  `harga_jual_awal` decimal(10,2) DEFAULT NULL,
  `harga_jual_akhir` decimal(10,2) DEFAULT NULL,
  `harga_beli_awal` decimal(10,2) DEFAULT NULL,
  `harga_beli_akhir` decimal(10,2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `keterangan` text,
  `dari` varchar(50) DEFAULT NULL,
  `no_nota` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `barang_id`, `tanggal`, `qty_awal`, `qty_masuk`, `qty_akhir`, `harga_jual_awal`, `harga_jual_akhir`, `harga_beli_awal`, `harga_beli_akhir`, `created_date`, `created_by`, `modified_date`, `modified_by`, `keterangan`, `dari`, `no_nota`) VALUES
(1, 1, '2015-01-01', 2, 21, 23, '80000.00', '85000.00', '75000.00', '70000.00', NULL, NULL, NULL, NULL, NULL, 'CV ANIKA UTAMA', '9238'),
(2, 5, '2015-03-01', -2, 10, 8, '10000.00', '10000.00', '8000.00', '8000.00', NULL, NULL, NULL, NULL, NULL, 'CV Mulia Abadi', '433928'),
(3, 19, '2015-12-01', 2, 1, 3, '500.00', '3500000.00', '350.00', '3000000.00', NULL, NULL, NULL, NULL, NULL, 'Lenovo Indonesia', '#829128'),
(4, 18, '2015-12-01', 20, 1, 21, '450000.00', '3500000.00', '150000.00', '3000000.00', NULL, NULL, NULL, NULL, NULL, 'Acer Indonesia', '#98210'),
(5, 17, '2015-12-01', 20, 1, 21, '110000.00', '3700000.00', '80000.00', '3200000.00', NULL, NULL, NULL, NULL, NULL, 'Asus Indonesia', '#42129'),
(6, 16, '2015-12-01', 2, 5, 7, '125000.00', '5400000.00', '100000.00', '5000000.00', NULL, NULL, NULL, NULL, NULL, 'Asus Indonesia', '#82171'),
(7, 14, '2015-12-01', 2, 1, 3, '150000.00', '3500000.00', '130000.00', '3000000.00', NULL, NULL, NULL, NULL, NULL, 'Acer Indonesia', '#43213'),
(8, 15, '1970-01-01', 8, 1, 9, '60000.00', '60000.00', '48000.00', '42000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(9, 13, '1970-01-01', 10, 1, 11, '145000.00', '65000.00', '125000.00', '43000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(10, 12, '1970-01-01', 5, 1, 6, '60000.00', '60000.00', '55000.00', '55000.00', NULL, NULL, NULL, NULL, NULL, 'Novi', '#123'),
(11, 11, '1970-01-01', 5, 1, 6, '35000.00', '65000.00', '20000.00', '43000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(12, 13, '1970-01-01', 11, 1, 12, '65000.00', '105000.00', '43000.00', '125000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(13, 10, '1970-01-01', 17, 1, 18, '45000.00', '100000.00', '20000.00', '73000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(14, 9, '1970-01-01', 9, 1, 10, '35000.00', '70000.00', '17000.00', '53000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(15, 5, '1970-01-01', 8, 1, 9, '10000.00', '125000.00', '8000.00', '100000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(16, 19, '1970-01-01', 1, 1, 2, '3500000.00', '120000.00', '3000000.00', '105000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(17, 13, '1970-01-01', 12, 1, 13, '105000.00', '125000.00', '125000.00', '105000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(18, 18, '2015-02-02', 15, 1, 16, '3500000.00', '100000.00', '3000000.00', '86000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#213'),
(19, 17, '2015-02-02', 19, 1, 20, '3700000.00', '550000.00', '3200000.00', '510000.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#123'),
(20, 16, '2015-02-02', 7, 3, 10, '5400000.00', '30000.00', '5000000.00', '22500.00', NULL, NULL, NULL, NULL, NULL, 'Jaknot', '#241'),
(21, 14, '2015-02-02', 3, 2, 5, '3500000.00', '100000.00', '3000000.00', '83000.00', NULL, NULL, NULL, NULL, NULL, 'jaknot', '#uwe'),
(22, 22, '2015-02-02', 12, 2, 14, '25000.00', '35000.00', '35000.00', '25000.00', NULL, NULL, NULL, NULL, NULL, 't-code', 'wqehk'),
(23, 21, '2015-02-02', 3, 2, 5, '80000.00', '90000.00', '90000.00', '80000.00', NULL, NULL, NULL, NULL, NULL, 'adjk', 'ljflefj');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `nama`) VALUES
(1, 'Laptop'),
(2, 'Smart Phone'),
(3, 'Flashdisk'),
(4, 'MicroSD'),
(7, 'Makanan & Minuman'),
(9, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE IF NOT EXISTS `kategori_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama`) VALUES
(1, 'Kategori 1'),
(2, 'Kategori 2'),
(3, 'Kategori 3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_umum`
--

CREATE TABLE IF NOT EXISTS `kategori_umum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `golongan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kategori_umum`
--

INSERT INTO `kategori_umum` (`id`, `nama`, `golongan`) VALUES
(1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` varchar(40) NOT NULL,
  `no_trx` varchar(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` decimal(11,0) NOT NULL,
  `grand_total` decimal(11,0) NOT NULL,
  `kembali` decimal(11,0) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_trx`, `total`, `tanggal`, `bayar`, `grand_total`, `kembali`, `keterangan`) VALUES
('07938953-55ac-4d71-af5e-2a920678c3e4', '73V50', '300000.00', '2015-01-03', '0', '0', '0', ''),
('2c7af863-042a-49f4-8456-c9b2daf40c46', 'VUZDF', '3620000.00', '2015-02-01', '4000000', '3620000', '380000', ''),
('32f85abf-5562-4a8c-a842-a35c2a1e981a', '69SXY', '3500000.00', '2015-01-14', '0', '0', '0', ''),
('36364907-1248-4e61-ba97-aa10d5425855', 'Q8P7D', '190000.00', '2015-03-06', '200000', '190000', '10000', ''),
('37392d22-8d61-46e4-91a5-c4d23211bc41', 'X8EGO', '445000.00', '2015-01-03', '0', '0', '0', ''),
('616b8430-ec5a-4bd5-ab8f-5b3c5dd50996', 'G0L5D', '3500000.00', '2015-02-01', '4000000', '3500000', '500000', ''),
('80c50928-76e5-4808-8ff6-0a1310c54809', 'JNO7W', '190000.00', '2015-02-05', '200000', '190000', '10000', ''),
('96e25ddb-7ba4-4d52-8dfa-b3c9d4524518', '2FS0G', '3620000.00', '2015-02-01', '4000000', '3620000', '380000', ''),
('a25f552d-540b-4a57-ac30-cc8cc7eaf229', 'EMC40', '3620000.00', '2015-01-14', '0', '0', '0', ''),
('a853a52c-ee33-4bea-af7f-a5269f6e5416', '6S2AJ', '3500000.00', '2015-01-14', '0', '0', '0', ''),
('bbfe479d-f17b-45b4-b026-780ae60eae34', 'X269N', '50000.00', '2015-02-11', '50000', '50000', '0', ''),
('cec555de-9111-4b42-b51f-d153987d5818', 'W95ZH', '10900000.00', '2015-01-19', '10900000', '10900000', '0', ''),
('d7eb163a-faa7-400c-840b-06f757f4b0af', 'T9NXA', '3500000.00', '2015-02-01', '3500000', '3500000', '0', ''),
('dd63f188-2bc2-43b6-ba73-65890be37d2b', 'AUQ27', '100000.00', '2015-02-13', '100000', '100000', '0', ''),
('faa0168b-4eca-4d3b-9cf8-af7378cc8bfa', 'KPQUW', '3500000.00', '2015-01-12', '0', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_id` varchar(40) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `barang_id`, `qty`, `harga`) VALUES
(3, '07938953-55ac-4d71-af5e-2a920678c3e4', 1, 3, '85000.00'),
(4, '07938953-55ac-4d71-af5e-2a920678c3e4', 10, 1, '45000.00'),
(5, '37392d22-8d61-46e4-91a5-c4d23211bc41', 11, 2, '35000.00'),
(6, '37392d22-8d61-46e4-91a5-c4d23211bc41', 10, 1, '45000.00'),
(7, '37392d22-8d61-46e4-91a5-c4d23211bc41', 9, 1, '35000.00'),
(8, '37392d22-8d61-46e4-91a5-c4d23211bc41', 5, 4, '10000.00'),
(9, '37392d22-8d61-46e4-91a5-c4d23211bc41', 1, 3, '85000.00'),
(16, 'faa0168b-4eca-4d3b-9cf8-af7378cc8bfa', 19, 1, '3500000.00'),
(18, 'a853a52c-ee33-4bea-af7f-a5269f6e5416', 19, 1, '3500000.00'),
(19, '32f85abf-5562-4a8c-a842-a35c2a1e981a', 18, 1, '3500000.00'),
(20, 'a25f552d-540b-4a57-ac30-cc8cc7eaf229', 18, 1, '3500000.00'),
(21, 'a25f552d-540b-4a57-ac30-cc8cc7eaf229', 15, 2, '60000.00'),
(22, 'cec555de-9111-4b42-b51f-d153987d5818', 17, 2, '3700000.00'),
(23, 'cec555de-9111-4b42-b51f-d153987d5818', 18, 1, '3500000.00'),
(24, '2c7af863-042a-49f4-8456-c9b2daf40c46', 19, 1, '120000.00'),
(25, '96e25ddb-7ba4-4d52-8dfa-b3c9d4524518', 19, 1, '120000.00'),
(26, '96e25ddb-7ba4-4d52-8dfa-b3c9d4524518', 18, 1, '3500000.00'),
(27, '2c7af863-042a-49f4-8456-c9b2daf40c46', 18, 1, '3500000.00'),
(28, '616b8430-ec5a-4bd5-ab8f-5b3c5dd50996', 18, 1, '3500000.00'),
(29, 'd7eb163a-faa7-400c-840b-06f757f4b0af', 18, 1, '3500000.00'),
(30, '80c50928-76e5-4808-8ff6-0a1310c54809', 38, 1, '50000.00'),
(31, '80c50928-76e5-4808-8ff6-0a1310c54809', 37, 1, '140000.00'),
(32, 'bbfe479d-f17b-45b4-b026-780ae60eae34', 38, 1, '50000.00'),
(33, 'dd63f188-2bc2-43b6-ba73-65890be37d2b', 38, 2, '50000.00'),
(34, '36364907-1248-4e61-ba97-aa10d5425855', 38, 1, '50000.00'),
(35, '36364907-1248-4e61-ba97-aa10d5425855', 37, 1, '140000.00');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` tinyint(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `website` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `alamat`, `telp`, `website`, `foto`) VALUES
(1, 'Usaha Anda', 'Jl. Semolowaru Indah II N-14', '08993484898', 'www.ashalta.com', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `saldo_awal`
--

CREATE TABLE IF NOT EXISTS `saldo_awal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `sys_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `saldo_awal`
--

INSERT INTO `saldo_awal` (`id`, `tanggal`, `nominal`, `sys_user_id`) VALUES
(1, '2015-01-19', '200000', 1),
(2, '2015-02-01', '400000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_group`
--

CREATE TABLE IF NOT EXISTS `sys_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sys_group`
--

INSERT INTO `sys_group` (`id`, `nama`) VALUES
(1, 'ADMIN'),
(2, 'KASIR'),
(3, 'BARANG');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE IF NOT EXISTS `sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `nama` varchar(35) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `urutan` tinyint(3) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `parent_id`, `nama`, `url`, `icon`, `urutan`, `level`) VALUES
(1, 0, 'Master', '#', 'fa fa-th', 1, 1),
(2, 1, 'Jenis Barang', 'jenis_barang', NULL, 1, 2),
(3, 1, 'Kategori Barang', 'kategori_barang', NULL, 2, 2),
(4, 1, 'Pengguna Aplikasi', 'usermanagement', NULL, 3, 2),
(5, 0, 'Transaski', '#', 'fa fa-laptop', 2, 1),
(6, 5, 'Barang Masuk', 'barang_masuk', NULL, 2, 2),
(7, 1, 'Barang Baru', 'barang', NULL, 4, 2),
(8, 5, 'Penjualan', 'penjualan', NULL, 3, 2),
(9, 0, 'Laporan', '#', 'fa fa-table', 3, 1),
(10, 9, 'Rekap Transaksi', 'laporan_keuangan', NULL, 1, 2),
(11, 9, 'Cetak Nota/Transaksi', 'laporan_penjualan', NULL, 2, 2),
(12, 9, 'Laporan Data Barang', 'laporan_stock_barang', NULL, 3, 2),
(13, 1, 'Profil Usaha', 'profil', NULL, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE IF NOT EXISTS `sys_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `pegawai_id` varchar(40) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `id` (`id`),
  KEY `pegawai_id` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`id`, `username`, `password`, `nama`, `group_id`, `email`, `telp`, `hp`, `pegawai_id`, `foto`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrator', 1, 'alfhan@yahoo.co.id', '', '08993484898', NULL, '369a36b7a9506a57f0aab2c8910d873e.jpg'),
(2, 'kasir', '21232f297a57a5a743894a0e4a801fc3', 'Kasir 1', 2, NULL, NULL, NULL, NULL, NULL),
(4, 'riyanti', 'fe4851a308daf8705b0fdc130a34dc07', 'Riyanti Ahmad', 3, '', '', '', NULL, '60bd6c447c8e38229bab9b55f68a428b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_group`
--

CREATE TABLE IF NOT EXISTS `sys_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sys_user_group`
--

INSERT INTO `sys_user_group` (`id`, `menu_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, NULL),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 5, 2),
(13, 8, 2),
(14, 9, 2),
(15, 11, 2),
(16, 5, 3),
(17, 6, 3),
(18, 7, 3),
(19, 12, 1),
(20, 12, 3),
(21, 10, 1),
(22, 11, 1),
(23, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_penjualan`
--

CREATE TABLE IF NOT EXISTS `temp_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_session_id` varchar(100) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `temp_penjualan`
--

INSERT INTO `temp_penjualan` (`id`, `data_session_id`, `barang_id`, `qty`, `harga`, `tanggal`) VALUES
(19, '50bd4a69c38c7d600311a118ab3c3b6a', 19, 1, '3500000.00', '2015-01-12'),
(20, '13ed85fbf140fca2781bcbba8acb80a2', 19, 1, '3500000.00', '2015-01-12'),
(23, 'e9726cc914e64df9fb5ed2ec3d8d7b4b', 38, 1, '50000.00', '2015-03-06'),
(24, 'e9726cc914e64df9fb5ed2ec3d8d7b4b', 37, 1, '140000.00', '2015-03-06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
