-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 05:31 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `for_snack`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` tinyint(1) NOT NULL DEFAULT '1',
  `kategori_artikel_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `foto`, `user_id`, `tanggal`, `updated_at`, `is_aktif`, `kategori_artikel_id`) VALUES
(1, 'Pay To', '<h3><b>Daftar Transfer</b></h3><b>Bank Mandiri</b><br>1440010025887 Taufik Ute Alfan<br><br><b>Bank BCA</b><br>1440010025887 Taufik Ute Alfan<br><br>', '', 1, '2015-07-07', '2015-07-10 21:30:52', 1, 1),
(2, 'About Us', '<div><b>About Us</b></div><span><blockquote><div>Singkong merupakan salah satu komoditi yang ditanam di Indonesia. Singkong dapat diolah menjadi olahan setengah jadi dan olahan jadi yang siap dikonsumsi. Salah satu olahan jadi dari singkong adalah keripik singkong. Keripik singkong merupakan snack yang paling disukai oleh masyarakat Indonesia. Penggemarnya mulai dari anak-anak sampai dewasa, dari yang tinggal di desa sampai di kota. Namun dengan perkembangan jaman keripik singkong diolah dengan berbagai macam rasa. <br>Keripik singkong "Oenlez" merupakan inovasi keripik singkong yang cocok dinikmati untuk segala suasana, karena keripik singkong oenlez mempunyai taste yang oenak dan lezat. Keripik singkong oenlez diolah dari bahan-bahan yang alami dan berkualitas premium. Bumbu yang digunakan dari bahan yang alami (bukan flavour) seperti yang ada pada ingredient. Keripik singkong oenlez dibuat tidak menggunakan bahan pengawet, bahan tambahan pewarna dan perasa, MSG dan tidak mengandung gluten.</div></blockquote><div><br>Keripik singkong "Oenlez" mempunyai 4 varian rasa, yaitu :</div><ol><li>Palm soy</li>Rasa gurih manis dari perpaduan gula aren dan soya sehingga menghasilkan rasa sweet classic.<br><br><li>Cheezy<br></li>Rasa gurih keju yang membuat kita tidak bisa berhenti ngemil, karena rasa real cheese yang beda dari yang lainnya.<br><br><li>Crazy chilli</li>Rasa unique spicy dari rasa pedas yang menggigit dipadu dengan aroma jeruk purut yang segar sehingga membuat kita tergila-gila dan tak terlupakan.<br><br><li>BBQ</li>Keripik singkong yang dimix dengan keripik tales diberi bumbu bbq ditambah aroma blackpapper yang menggoda membuat kita sulit melupakan.<br></ol></span>', '558bfd9c3e8e1.jpg', 1, '2015-06-25', '2015-07-26 04:25:39', 1, 1),
(3, 'Contact Us', '<p><b>Oenlez (O Enak Lezat).</b></p><p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p><p>Surabaya - Jawa Timur, Indonesia</p><p>Mobile 1:&nbsp;087881596699</p><p>Mobile 2:&nbsp;085770896699<br></p><p>Mobile 3:&nbsp;082311856699<br></p><p>Email: oenlezsnack@gmail.com</p>', '', 1, '2015-06-25', '2015-07-26 04:10:55', 1, 1),
(4, 'FAQ''s', '<h3><b>Berikut ini adalah dafar pertanyaan yang mungkin sering muncul</b></h3><ul><li>Apakah bebas MSG</li><ul><li>Ya</li></ul><li>Apakah saya perlu login dan register untuk berbelanja disini</li><ul><li>Ya</li></ul><li>Apakah bisa mentransfer dari bank lain?</li><ul><li>Bisa, asalkan bank tujuannya adalah bank kami</li></ul><li>Kapan barang akan dikirim?</li><ul><li>Setelah konfirmasi pembayaran dan check, kami akan melakukan pengemasan barang yang dilanjutkan dengan mengirim ke bagian pengiriman</li></ul><li>Kemana saja barang akan dikirim</li><ul><li>Kemana saja asal sesuai dengan data kami dan jasa kurir kami</li></ul><li>Berapa lama akan sampai di tempat?</li><ul><li>Kami menyediakan beberapa paket pegiriman, sesuaikan dengan kebutuhan anda. lama pengiriman tergantung jasa kurir yang anda gunakan</li></ul></ul>', '', 1, '2015-06-25', '2015-07-10 21:29:22', 1, 1),
(5, 'Term Of Use', '', '', 1, '2015-06-25', '2015-06-25 13:27:59', 1, 1),
(6, 'Aturan & Cara Pembelian', '<ol><li>Pilih produk yang anda suka</li><li>Minimum pembelian tertera di setiap item produk</li><li>Klik add to cart untuk mulai membeli</li><li>Update keranjang belanja jika ingin mengubah quantity pembelian, dan klik belanja lagi jika ingin belanja produk lain</li><li>Klik Checkout untuk menyelesaikan belanja dan isi data pengiriman belanja</li><li>Anda akan mendapatkan notifikasi email sesuai dengan username&nbsp;</li><li>Silahkan transfer sesuai dengan daftar transfer</li><li>Login ke akun anda dan lakukan konfirmasi pembayaran terhadap barang yang anda beli di my account &gt; history belanja</li><li>Klik detail invoice yang anda transfer, kemudian klik konfirmasi dan isi konfirmasi tentang transfer Contoh: Taufik Ute Alfan# Bank Mandiri# 125.000# 11 Juli 2015# No Invoice #NSA021</li></ol>', '', 1, '2015-06-25', '2015-07-10 21:23:05', 1, 1),
(7, 'Company Information', '', '', 1, '2015-06-25', '2015-06-25 13:30:45', 1, 9),
(8, 'GIRLS PINK T SHIRT ARRIVED IN STORE', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p><br><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p><br><p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p><br><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>', '558e2ce8d70ea.jpg', 1, '2015-06-27', '2015-06-27 04:56:09', 1, 1),
(9, 'EXTJS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '558e37288a090.jpg', 1, '2015-06-27', '2015-06-27 05:40:34', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`id` int(11) NOT NULL,
  `is_aktif` tinyint(4) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posisi` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `is_aktif`, `foto`, `updated_at`, `posisi`) VALUES
(1, 1, '558da9873989e.jpg', '2015-06-27 03:54:52', 1),
(2, 0, '558daa8de095d.jpg', '2015-07-10 09:40:48', 0),
(3, 0, '558daa5532318.jpg', '2015-06-27 03:53:31', 0),
(4, 1, '558da866b89fc.jpg', '2015-07-10 09:40:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori_barang_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `harga_jual` float NOT NULL,
  `harga_beli` float NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `recomended_item` tinyint(4) NOT NULL,
  `ready_stock` tinyint(4) NOT NULL,
  `berat` decimal(10,0) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  `min_pembelian` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `kode_barcode`, `nama`, `kategori_barang_id`, `qty`, `harga_jual`, `harga_beli`, `foto`, `created_date`, `modified_date`, `created_by`, `modified_by`, `keterangan`, `recomended_item`, `ready_stock`, `berat`, `foto2`, `min_pembelian`) VALUES
(10, 'B0004', 'T0005', 'Mix', 2, 18, 4500, 5000, '559a87fc245e7.jpg', NULL, NULL, NULL, NULL, '<b>Barbeque </b>With Black Papper<br>Cassataro Chips <b>Gluten FreeMSG<br></b><br><b>Komposisi :</b><br>Singkong, Talas, Tomat, Paprika,<br>Bawang Bombay, Bawang Putih, Kedelai,<br>Merica Hitam, Gula, Garam,<br>Minyak Kelapa Sawit', 1, 1, '80', '', 12),
(11, 'B0003', 'T0004', 'Cheezy', 1, 6, 4600, 5500, '559a8792651cd.jpg', NULL, NULL, NULL, NULL, '<b>Cheese,&nbsp;</b>Real Cheese Flavour<br>Cassava Chips <b>Gluten Free MSG<br><br>Komposisi:<br></b>Singkong, Keju Cheddar, Susu,&nbsp;<br>Bawang Putih, Tepung Mocaf, Gula,<br>Garam, Minyak Kelapa Sawit', 1, 1, '80', '', 12),
(12, 'B0002', 'T0003', 'Palm Soy', 1, 6, 7800, 9000, '559a8756c62b0.jpg', NULL, NULL, NULL, NULL, '<b>Palm Soy&nbsp;</b>Classic Sweet Flavour<br>Cassava Chips <b>Gluten Free MSG<br><br>Komposisi:<br></b>Singkong, Gula Aren Organik, Kedelai,<br>Susu, Bawang Putih, Garam, Tepung<br>Mocaf, Minyak Kelapa Sawit', 1, 1, '80', '', 12),
(13, 'B0001', 'T0002', 'Crazy Chili', 1, 13, 7600, 9500, '559a86de53129.jpg', NULL, NULL, NULL, NULL, 'Keripik Singkon<b>&nbsp;Gluten Free MSG,&nbsp;</b><br><b>Crazy Chili </b>Unique Spicy Flavour.<br><br><b>Komposisi:<br></b>Singkong, Paprika, Cabai, <br>Bawang Putih, Lada, Kedelai, <br>Tepung Mocaf, Gula, Garam, <br>Minyak Kelapa Sawit, Daun Jeruk Purut<b><br></b>', 1, 1, '12', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
`id` int(11) NOT NULL,
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
  `no_nota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
-- Table structure for table `email_setting`
--

CREATE TABLE IF NOT EXISTS `email_setting` (
  `id` int(11) NOT NULL,
  `protocol` varchar(100) NOT NULL,
  `host` varchar(100) NOT NULL,
  `port` int(11) NOT NULL DEFAULT '465',
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `mailtype` varchar(100) NOT NULL DEFAULT 'html',
  `charset` varchar(100) NOT NULL DEFAULT 'utf-8',
  `newline` varchar(100) NOT NULL DEFAULT '\\r\\n',
  `wordwrap` tinyint(1) NOT NULL,
  `mailfrom` varchar(100) NOT NULL,
  `fromnamer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `protocol`, `host`, `port`, `user`, `pass`, `mailtype`, `charset`, `newline`, `wordwrap`, `mailfrom`, `fromnamer`) VALUES
(1, 'smtp', 'ssl://smtp.gmail.com', 465, 'alfhanz@gmail.com', '010988alfhan', 'html', 'utf-8', '\\r\\n', 1, 'oenlez@gmail.com', 'OEnakLezat');

-- --------------------------------------------------------

--
-- Table structure for table `harga_kurir`
--

CREATE TABLE IF NOT EXISTS `harga_kurir` (
`id` int(11) NOT NULL,
  `kabkota_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL DEFAULT '0',
  `berat` tinyint(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `kurir_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `est` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_kurir`
--

INSERT INTO `harga_kurir` (`id`, `kabkota_id`, `kecamatan_id`, `berat`, `harga`, `kurir_id`, `provinsi_id`, `est`) VALUES
(1, 783, 0, 1, 5000, 1, 15, '1'),
(2, 803, 0, 1, 5000, 1, 15, '1'),
(3, 780, 0, 1, 6000, 1, 15, '1'),
(4, 783, 4, 1, 5000, 4, 15, '1-3'),
(5, 783, 10, 1, 5000, 4, 15, '1-3'),
(6, 783, 10, 1, 10000, 5, 15, '1'),
(7, 783, 11, 1, 5000, 4, 15, '1-3'),
(8, 783, 4, 1, 10000, 5, 15, '1'),
(9, 783, 11, 1, 10000, 5, 15, '1'),
(10, 545, 0, 1, 50000, 1, 1, '3-4'),
(11, 700, 0, 1, 26500, 1, 12, '1-2'),
(12, 717, 0, 1, 26500, 1, 12, '1-2'),
(13, 701, 0, 1, 26500, 1, 12, '1-2'),
(14, 702, 0, 1, 26500, 1, 12, '1-2'),
(15, 770, 0, 1, 5000, 1, 15, '1-2'),
(16, 771, 0, 1, 10000, 1, 15, '1-2'),
(17, 772, 0, 1, 8000, 1, 15, '1-2'),
(18, 773, 0, 1, 6000, 1, 15, '1-2'),
(19, 774, 0, 1, 6000, 1, 15, '1-2'),
(20, 789, 23, 1, 12500, 1, 15, '1-2'),
(21, 909, 0, 1, 27500, 1, 23, '1-2'),
(22, 670, 0, 1, 32000, 1, 8, '2-3'),
(23, 884, 0, 1, 32000, 1, 21, '2-3'),
(24, 885, 0, 1, 25500, 1, 21, '2-3'),
(25, 687, 0, 1, 42500, 1, 10, '3-4'),
(26, 595, 0, 1, 43000, 1, 3, '3-4'),
(27, 585, 0, 1, 43000, 1, 3, '3-4'),
(28, 586, 0, 1, 43000, 1, 3, '3-4'),
(29, 587, 0, 1, 43000, 1, 3, '3-4'),
(30, 1015, 0, 1, 72500, 1, 32, '3-4'),
(31, 825, 0, 1, 40000, 1, 18, '2-3'),
(32, 833, 0, 1, 40000, 1, 18, '2-3'),
(33, 703, 0, 1, 26500, 1, 12, '1-2'),
(34, 910, 0, 1, 40000, 1, 23, '2-3'),
(35, 634, 0, 1, 40000, 1, 6, '2-3'),
(36, 705, 0, 1, 29500, 1, 12, '1-2'),
(37, 706, 0, 1, 29500, 1, 12, '1-2'),
(38, 722, 0, 1, 29500, 1, 12, '1-2'),
(39, 823, 0, 1, 20000, 1, 17, '1'),
(40, 723, 0, 1, 23000, 1, 12, '1-2'),
(41, 619, 0, 1, 55000, 1, 5, '2-3');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
-- Table structure for table `kabkota`
--

CREATE TABLE IF NOT EXISTS `kabkota` (
`id` int(11) NOT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1056 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`id`, `provinsi_id`, `nama`) VALUES
(528, 1, 'Kabupaten Aceh Barat'),
(529, 1, 'Kabupaten Aceh Barat Daya'),
(530, 1, 'Kabupaten Aceh Besar'),
(531, 1, 'Kabupaten Aceh Jaya'),
(532, 1, 'Kabupaten Aceh Selatan'),
(533, 1, 'Kabupaten Aceh Singkil'),
(534, 1, 'Kabupaten Aceh Tamiang'),
(535, 1, 'Kabupaten Aceh Tengah'),
(536, 1, 'Kabupaten Aceh Tenggara'),
(537, 1, 'Kabupaten Aceh Timur'),
(538, 1, 'Kabupaten Aceh Utara'),
(539, 1, 'Kabupaten Bireuen'),
(540, 1, 'Kabupaten Gayo Lues'),
(541, 1, 'Kabupaten Nagan Raya'),
(542, 1, 'Kabupaten Pidie'),
(543, 1, 'Kabupaten Pidie Jaya'),
(544, 1, 'Kabupaten Simeulue'),
(545, 1, 'Kota Banda Aceh'),
(546, 1, 'Kota Langsa'),
(547, 1, 'Kota Lhokseumawe'),
(548, 1, 'Kota Sabang'),
(549, 1, 'Kota Subulussalam'),
(550, 1, 'Propinsi Aceh'),
(551, 2, 'Kabupaten Asahan'),
(552, 2, 'Kabupaten Batu Bara'),
(553, 2, 'Kabupaten Dairi'),
(554, 2, 'Kabupaten Deli Serdang'),
(555, 2, 'Kabupaten Humbang Haundutan'),
(556, 2, 'Kabupaten Karo'),
(557, 2, 'Kabupaten Labuhanbatu'),
(558, 2, 'Kabupaten Labuhanbatu Selatan'),
(559, 2, 'Kabupaten Labuhanbatu Utara'),
(560, 2, 'Kabupaten Langkat'),
(561, 2, 'Kabupaten Mandailing Natal'),
(562, 2, 'Kabupaten Nias'),
(563, 2, 'Kabupaten Nias Barat'),
(564, 2, 'Kabupaten Nias Selatan'),
(565, 2, 'Kabupaten Nias Utara'),
(566, 2, 'Kabupaten Padang Lawas'),
(567, 2, 'Kabupaten Padang Lawas Utara'),
(568, 2, 'Kabupaten Pakpak Bharat'),
(569, 2, 'Kabupaten Samosir'),
(570, 2, 'Kabupaten Serdang Bedagai'),
(571, 2, 'Kabupaten Simalungun'),
(572, 2, 'Kabupaten Tapanuli Selatan'),
(573, 2, 'Kabupaten Tapanuli Tengah'),
(574, 2, 'Kabupaten Tapanuli Utara'),
(575, 2, 'Kabupaten Toba Samosir'),
(576, 2, 'Kota Binjai'),
(577, 2, 'Kota Gunung Sitoli'),
(578, 2, 'Kota Medan'),
(579, 2, 'Kota Padang Sidempuan'),
(580, 2, 'Kota Pematangsiantar'),
(581, 2, 'Kota Sibolga'),
(582, 2, 'Kota Tanjung Balai'),
(583, 2, 'Kota Tebing Tinggi'),
(584, 2, 'Propinsi Sumatera Utara'),
(585, 3, 'Kabupaten Bengkulu Selatan'),
(586, 3, 'Kabupaten Bengkulu Tengah'),
(587, 3, 'Kabupaten Bengkulu Utara'),
(588, 3, 'Kabupaten Benteng'),
(589, 3, 'Kabupaten Kaur'),
(590, 3, 'Kabupaten Kepahiang'),
(591, 3, 'Kabupaten Lebong'),
(592, 3, 'Kabupaten Mukomuko'),
(593, 3, 'Kabupaten Rejang Lebong'),
(594, 3, 'Kabupaten Seluma'),
(595, 3, 'Kabupaten Bengkulu'),
(597, 4, 'Kabupaten Batang Hari'),
(598, 4, 'Kabupaten Bungo'),
(599, 4, 'Kabupaten Kerinci'),
(600, 4, 'Kabupaten Merangin'),
(601, 4, 'Kabupaten Muaro Jambi'),
(602, 4, 'Kabupaten Sarolangun'),
(603, 4, 'Kabupaten Tanjung Jabung Barat'),
(604, 4, 'Kabupaten Tanjung Jabung Timur'),
(605, 4, 'Kabupaten Tebo'),
(606, 4, 'Kabupaten Jambi'),
(607, 4, 'Kabupaten Sungai Penuh'),
(608, 4, 'Propinsi Jambi'),
(609, 5, 'Kabupaten Bengkalis'),
(610, 5, 'Kabupaten Indragiri Hilir'),
(611, 5, 'Kabupaten Indragiri Hulu'),
(612, 5, 'Kabupaten Kampar'),
(613, 5, 'Kabupaten Kuantan Singingi '),
(614, 5, 'Kabupaten Pelalawan'),
(615, 5, 'Kabupaten Rokan Hilir'),
(616, 5, 'Kabupaten Rokan Hulu'),
(617, 5, 'Kabupaten Siak'),
(618, 5, 'Kota Pekanbaru'),
(619, 5, 'Kota Dumai'),
(620, 5, 'Kabupaten Kepulauan Meranti'),
(621, 5, 'Propinsi Riau'),
(622, 6, 'Kabupaten Agam'),
(623, 6, 'Kabupaten Dharmasraya'),
(624, 6, 'Kabupaten Kepulauan Mentawai'),
(625, 6, 'Kabupaten Lima Puluh Kota'),
(626, 6, 'Kabupaten Padang Pariaman'),
(627, 6, 'Kabupaten Pasaman'),
(628, 6, 'Kabupaten Pasaman Barat'),
(629, 6, 'Kabupaten Pesisir Selatan'),
(630, 6, 'Kabupaten Sijunjung'),
(631, 6, 'Kabupaten Solok'),
(632, 6, 'Kabupaten Solok Selatan'),
(633, 6, 'Kabupaten Tanah Datar'),
(634, 6, 'Kabupaten Bukittinggi'),
(635, 6, 'Kota Padang'),
(636, 6, 'Kota padangpanjang'),
(637, 6, 'Kota Pariaman'),
(638, 6, 'Kota Payakumbuh'),
(639, 6, 'Kota Sawahlunto'),
(640, 6, 'Kota solok'),
(641, 6, 'Propinsi Sumatera Barat'),
(642, 7, 'Kabupaten Banyuasin'),
(643, 7, 'Kabupaten Empat Lawang'),
(644, 7, 'Kabupaten Lahat'),
(645, 7, 'Kabupaten Muara Enim'),
(646, 7, 'Kabupaten Musi Banyuasin'),
(647, 7, 'Kabupaten Musi Rawas'),
(648, 7, 'Kabupaten Ogan llir'),
(649, 7, 'Kabupaten Ogan Komering llir'),
(650, 7, 'Kabupaten Komering Ulu'),
(651, 7, 'Kabupaten Ogan Komering Ulu Selatan'),
(652, 7, 'Kabupaten Ogan Komering Ulu Timur'),
(653, 7, 'Kota Lubuklinggau'),
(654, 7, 'Kota Pagar Alam'),
(655, 7, 'Kota Palembang'),
(656, 7, 'Kota Prabumulih'),
(657, 7, 'Propinsi Sumatera Selatan'),
(658, 8, 'Kabupaten Lampung Barat'),
(659, 8, 'Kabupaten Lampung Selatan'),
(660, 8, 'Kabupaten Lampung Tengah'),
(661, 8, 'Kabupaten Lampung Timur'),
(662, 8, 'Kabupaten Lampung Utara'),
(663, 8, 'Kabupaten Mesuji'),
(664, 8, 'Kabupaten Pesawaran'),
(665, 8, 'Kabupaten Pringsewu'),
(666, 8, 'Kabupaten Tanggamus'),
(667, 8, 'Kabupaten Tulang Bawang'),
(668, 8, 'Kabupaten Tulang Bawang Barat'),
(669, 8, 'Kabupaten Way Kanan'),
(670, 8, 'Kota Bandar Lampung'),
(671, 8, 'Kota Metro'),
(672, 8, 'Kabupaten Pesisir Barat'),
(673, 8, 'Propinsi Lampung'),
(674, 9, 'Kabupaten Bangka'),
(675, 9, 'Kabupaten Bangka Barat'),
(676, 9, 'Kabupaten Bangka Selatan'),
(677, 9, 'Kabupaten Bangka Tengah'),
(678, 9, 'Kabupaten Belitung'),
(679, 9, 'Kabupaten Belitung Timur'),
(680, 9, 'Kota Pangkal Pinang'),
(681, 9, 'Propinsi Kepulauan Bangka Belitung'),
(682, 10, 'Kabupaten Bintan'),
(683, 10, 'Kabupaten Karimun'),
(684, 10, 'Kabupaten Kepulauan Anambas'),
(685, 10, 'Kabupaten Lingga'),
(686, 10, 'Kabupaten Natuna'),
(687, 10, 'Kota Batam'),
(688, 10, 'Kota Tanjung Pinang'),
(689, 10, 'Propinsi Kepulauan Riau'),
(690, 11, 'Kabupaten Lebak'),
(691, 11, 'Kabupaten Pandeglang'),
(692, 11, 'Kabupaten Serang'),
(693, 11, 'Kabupaten Tangerang'),
(694, 11, 'Kota Cilegon'),
(695, 11, 'Kabupaten Serang'),
(696, 11, 'Kabupaten Tangerang'),
(697, 11, 'Kota Tangerang'),
(698, 11, 'Kota Tangerang Selatan'),
(699, 11, 'Propinsi Banten'),
(700, 12, 'Kabupaten Bandung'),
(701, 12, 'Kabupaten Bandung Barat'),
(702, 12, 'Kabupaten Bekasi'),
(703, 12, 'Kabupaten Bogor'),
(704, 12, 'Kabupaten Ciamis'),
(705, 12, 'Kabupaten Cianjur'),
(706, 12, 'Kabupaten Cirebon'),
(707, 12, 'Kabupaten Garut'),
(708, 12, 'Kabupaten Indramayu'),
(709, 12, 'Kabupaten Karawang'),
(710, 12, 'Kabupaten Kuningan'),
(711, 12, 'Kabupaten Majalengka'),
(712, 12, 'Kabupaten Purwakarta'),
(713, 12, 'Kabupaten Subang'),
(714, 12, 'Kabupaten Sukabumi'),
(715, 12, 'Kabupaten Sumedang'),
(716, 12, 'Kabupaten Tasikmalaya'),
(717, 12, 'Kota Bandung'),
(718, 12, 'Kota Banjar'),
(719, 12, 'Kota Bekasi'),
(720, 12, 'Kota Bogor'),
(721, 12, 'Kota Cimahi'),
(722, 12, 'Kota Cirebon'),
(723, 12, 'Kota Depok'),
(724, 12, 'Kota Sukabumi'),
(725, 12, 'Kota Tasikmalaya'),
(726, 12, 'Propinsi Jawa Barat'),
(727, 13, 'Kabupaten Administrasi Kepulauan Seribu'),
(728, 13, 'Kota Administrasi Jakarta Barat'),
(729, 13, 'Kota Administrasi Jakarta Pusat'),
(730, 13, 'Kota Administrasi Jakarta Selatan'),
(731, 13, 'Kota Administrasi Jakarta Timur'),
(732, 13, 'Kota Administrasi Jakarta Utara'),
(733, 13, 'Propinsi 13'),
(734, 14, 'Kabupaten Banjarnegara'),
(735, 14, 'Kabupaten Banyumas'),
(736, 14, 'Kabupaten Batang'),
(737, 14, 'Kabupaten Blora'),
(738, 14, 'Kabupaten Boyolali'),
(739, 14, 'Kabupaten Brebes'),
(740, 14, 'Kabupaten Cilacap'),
(741, 14, 'Kabupaten Demak'),
(742, 14, 'Kabupaten Grobogan'),
(743, 14, 'Kabupaten Jepara'),
(744, 14, 'Kabupaten Karanganyar'),
(745, 14, 'Kabupaten Kebumen'),
(746, 14, 'Kabupaten Kedal'),
(747, 14, 'Kabupaten Klaten'),
(748, 14, 'Kabupaten Kudus'),
(749, 14, 'Kabupaten Magelang'),
(750, 14, 'Kabupaten Pati'),
(751, 14, 'Kabupaten Pekalongan'),
(752, 14, 'Kabupaten Pemalang'),
(753, 14, 'Kabupaten Purbalingga'),
(754, 14, 'Kabupaten Purworejo'),
(755, 14, 'Kabupaten Rembang'),
(756, 14, 'Kabupaten Semarang'),
(757, 14, 'Kabupaten Sragen'),
(758, 14, 'Kabupaten Sukoharjo'),
(759, 14, 'Kabupaten Tegal'),
(760, 14, 'Kabupaten Temanggung'),
(761, 14, 'Kabupaten Wonogiri'),
(762, 14, 'Kabupaten Wonosobo'),
(763, 14, 'Kota Magelang'),
(764, 14, 'Kota Pekalongan'),
(765, 14, 'Kota Salatiga'),
(766, 14, 'Kota Semarang'),
(767, 14, 'Kota Surakarta'),
(768, 14, 'Kota Tegal'),
(769, 14, 'Propinsi Jawa Tengah'),
(770, 15, 'Kabupaten Bangkalan'),
(771, 15, 'Kabupaten Banyuwangi'),
(772, 15, 'Kabupaten Blitar'),
(773, 15, 'Kabupaten Bojonegoro'),
(774, 15, 'Kabupaten Bondowoso'),
(775, 15, 'Kabupaten Gresik'),
(776, 15, 'Kabupaten Jember'),
(777, 15, 'Kabupaten Jombang'),
(778, 15, 'Kabupaten Kediri'),
(779, 15, 'Kabupaten Lamongan'),
(780, 15, 'Kabupaten Lumajang'),
(781, 15, 'Kabupaten Madiun'),
(782, 15, 'Kabupaten Magetan'),
(783, 15, 'Kabupaten Malang'),
(784, 15, 'Kabupaten Mojokerto'),
(785, 15, 'Kabupaten Nganjuk'),
(786, 15, 'Kabupaten Ngawi'),
(787, 15, 'Kabupaten Pacitan'),
(788, 15, 'Kabupaten Pemekasan'),
(789, 15, 'Kabupaten Pasuruan'),
(790, 15, 'Kabupaten Ponorogo'),
(791, 15, 'Kabupaten Probolinggo'),
(792, 15, 'Kabupaten Sampang'),
(793, 15, 'Kabupaten Sidoarjo'),
(794, 15, 'Kabupaten Situbondo'),
(795, 15, 'Kabupaten Sumenep'),
(796, 15, 'Kabupaten Trenggalek'),
(797, 15, 'Kabupaten Tuban'),
(798, 15, 'Kabupaten Tulungagung'),
(799, 15, 'Kota Batu'),
(800, 15, 'Kota Blitar'),
(801, 15, 'Kota Kediri'),
(802, 15, 'Kota Madiun'),
(803, 15, 'Kota Malang'),
(804, 15, 'Kota Mojokerto'),
(805, 15, 'Kota Pasuruan'),
(806, 15, 'Kota Probolinggo'),
(807, 15, 'Kota Surabaya'),
(809, 16, 'Kabupaten Bantul'),
(810, 16, 'Kabupaten Gunung Kidul'),
(811, 16, 'Kabupaten Kulon Progo'),
(812, 16, 'Kabupaten Sleman'),
(813, 16, 'Kota Yogyakarta'),
(814, 16, 'Propinsi D.I.Yogyakarta'),
(815, 17, 'Kabupaten Badung'),
(816, 17, 'Kabupaten Bangli'),
(817, 17, 'Kabupaten Buleleng'),
(818, 17, 'Kabupaten Gianyar'),
(819, 17, 'Kabupaten Jembrana'),
(820, 17, 'Kabupaten Karangasem'),
(821, 17, 'Kabupaten Klungkung'),
(822, 17, 'Kabupaten Tabanan'),
(823, 17, 'Kota Denpasar'),
(824, 17, 'Propinsi Bali'),
(825, 18, 'Kabupaten Bima'),
(826, 18, 'Kabupaten Dompu'),
(827, 18, 'Kabupaten Lombok Barat'),
(828, 18, 'Kabupaten Lombok Tengah'),
(829, 18, 'Kabupaten Lombok Timur'),
(830, 18, 'Kabupaten Lombok Utara'),
(831, 18, 'Kabupaten Sumbawa'),
(832, 18, 'Kabupaten Sumbawa Barat'),
(833, 18, 'Kota Bima'),
(834, 18, 'Kota Mataram'),
(835, 18, 'Propinsi Nusa Tenggara Barat'),
(836, 19, 'Kabupaten Kupang'),
(837, 19, 'Kabupaten Timor Tengah Selatan'),
(838, 19, 'Kabupaten Timor Tengah Utara'),
(839, 19, 'Kabupaten Belu'),
(840, 19, 'Kabupaten Alor'),
(841, 19, 'Kabupaten Flores Timur'),
(842, 19, 'Kabupaten Sikka'),
(843, 19, 'Kabupaten Ende'),
(844, 19, 'Kabupaten Ngada'),
(845, 19, 'Kabupaten Manggarai'),
(846, 19, 'Kabupaten Sumba Timur'),
(847, 19, 'Kabupaten Sumba Barat'),
(848, 19, 'Kabupaten Lembata'),
(849, 19, 'Kabupaten Rote Ndao'),
(850, 19, 'Kabupaten Manggarai Barat'),
(851, 19, 'Kabupaten Nagekeo'),
(852, 19, 'Kabupaten Sumba Tengah'),
(853, 19, 'Kabupaten Sumba Barat Daya'),
(854, 19, 'Kabupaten Manggarai Timur'),
(855, 19, 'Kabupaten Sabu Raijua'),
(856, 19, 'Kota Kupang'),
(857, 19, 'Propinsi Nusa Tenggara Timur'),
(858, 20, 'Kabupaten Bengkayang'),
(859, 20, 'Kabupaten Kapuas Hulu'),
(860, 20, 'Kabupaten Kayong Utara'),
(861, 20, 'Kabupaten Ketepang'),
(862, 20, 'Kabupaten Kubu Raya'),
(863, 20, 'Kabupaten Landak'),
(864, 20, 'Kabupaten Melawi'),
(865, 20, 'Kabupaten Pontianak'),
(866, 20, 'Kabupaten Sambas'),
(867, 20, 'Kabupaten Sanggau'),
(868, 20, 'Kabupaten Sekadau'),
(869, 20, 'Kabupaten Sintang'),
(870, 20, 'Kota Pontianak'),
(871, 20, 'Kota Singkawang'),
(872, 20, 'Propinsi Kalimantan Barat'),
(873, 21, 'Kabupaten Balangan'),
(874, 21, 'Kabupaten Banjar'),
(875, 21, 'Kabupaten Barito Kuala'),
(876, 21, 'Kabupaten Hulu Sungai Selatan'),
(877, 21, 'Kabupaten Hulu Sungai Tengah'),
(878, 21, 'Kabupaten Hulu Sungai Utara'),
(879, 21, 'Kabupaten Kotabaru'),
(880, 21, 'Kabupaten Tabalong'),
(881, 21, 'Kabupaten Tanah Bumbu'),
(882, 21, 'Kabupaten Tanah Laut'),
(883, 21, 'Kabupaten Tapin'),
(884, 21, 'Kota Banjarbaru'),
(885, 21, 'Kota Banjarmasin'),
(886, 21, 'Propinsi Kalimantan Selatan'),
(887, 22, 'Kabupaten Barito Selatan'),
(888, 22, 'Kabupaten Barito Timur'),
(889, 22, 'Kabupaten Barito Utara'),
(890, 22, 'Kabupaten Gunung Mas'),
(891, 22, 'Kabupaten Kapuas'),
(892, 22, 'Kabupaten Katingan'),
(893, 22, 'Kabupaten Kotawaringin Barat'),
(894, 22, 'Kabupaten Kotawaringin Timur'),
(895, 22, 'Kabupaten Lamandau'),
(896, 22, 'Kabupaten Murung Raya'),
(897, 22, 'Kabupaten Pulang Pisau'),
(898, 22, 'Kabupaten Sukamara'),
(899, 22, 'Kabupaten Seruyan'),
(900, 22, 'Kota Palangka Raya'),
(901, 22, 'Propinsi kalimantan Tengah'),
(902, 23, 'Kabupaten Berau'),
(903, 23, 'Kabupaten Kutai Barat'),
(904, 23, 'Kabupaten Kutai Kartanegara'),
(905, 23, 'Kabupaten Kutai Timur'),
(906, 23, 'Kabupaten Mahakam Ulu'),
(907, 23, 'Kabupaten Paser'),
(908, 23, 'Kabupaten Penajam Paser Utara'),
(909, 23, 'Kota Balikpapan'),
(910, 23, 'Kota Bontang'),
(911, 23, 'Kota Samarinda'),
(912, 23, 'Propinsi Kalimantan Timur'),
(913, 24, 'Kabupaten Boalemo'),
(914, 24, 'Kabupaten Bone Bolango'),
(915, 24, 'Kabupaten Gorontalo'),
(916, 24, 'Kabupaten Gorontalo Utara'),
(917, 24, 'Kabupaten Pohuwato'),
(918, 24, 'Kota Gorontalo'),
(919, 24, 'Propinsi Gorontalo'),
(920, 25, 'Kabupaten Bantaeng'),
(921, 25, 'Kabupaten Barru'),
(922, 25, 'Kabupaten Bone'),
(923, 25, 'Kabupaten Bulukumba'),
(924, 25, 'Kabupaten Enrekang'),
(925, 25, 'Kabupaten Gowa'),
(926, 25, 'Kabupaten Jeneponto'),
(927, 25, 'Kabupaten Jepulauan Selayar'),
(928, 25, 'Kabupaten Luwu'),
(929, 25, 'Kabupaten Luwu Timur'),
(930, 25, 'Kabupaten Luwu Utara'),
(931, 25, 'Kabupaten Maros'),
(932, 25, 'Kabupaten Pangkajene dan Kepulauan'),
(933, 25, 'Kabupaten Pinrang'),
(934, 25, 'Kabupaten Sindenreng Rappang'),
(935, 25, 'Kabupaten Sinjai'),
(936, 25, 'Kabupaten Soppeng'),
(937, 25, 'Kabupaten Takalar'),
(938, 25, 'Kabupaten Tana Toraja'),
(939, 25, 'Kabupaten Toraja Utara'),
(940, 25, 'Kabupaten Wajo'),
(941, 25, 'Kota Makasar'),
(942, 25, 'Kota Palopo'),
(943, 25, 'Kota Parepare'),
(944, 25, 'Propinsi Sulawesi Selatan'),
(945, 26, 'Kabupaten Bombana'),
(946, 26, 'Kabupaten Buton'),
(947, 26, 'Kabupaten Buton Utara'),
(948, 26, 'Kabupaten Kolaka'),
(949, 26, 'Kabupaten Kolaka Utara'),
(950, 26, 'Kabupaten Konawe'),
(951, 26, 'Kabupaten Konawe Selatan'),
(952, 26, 'Kabupaten Konawe Utara'),
(953, 26, 'Kabupaten Muna'),
(954, 26, 'Kabupaten Wakatobi'),
(955, 26, 'Kota Bau-Bau'),
(956, 26, 'Kota Kendari'),
(957, 26, 'Propinsi Sulawesi Tenggara'),
(958, 27, 'Kabupaten Banggai'),
(959, 27, 'Kabupaten Banggai Kepulauan'),
(960, 27, 'Kabupaten Buol'),
(961, 27, 'Kabupaten Donggala'),
(962, 27, 'Kabupaten Morowali'),
(963, 27, 'Kabupaten Parigi Moutong'),
(964, 27, 'Kabupaten Poso'),
(965, 27, 'Kabupaten Tojo Una-Una'),
(966, 27, 'Kabupaten Toli-Toli'),
(967, 27, 'Kabupaten Sigi'),
(968, 27, 'Kota Palu'),
(969, 27, 'Propinsi Sulawesi Tengah'),
(970, 28, 'Kabupaten Bolaang Mongondow'),
(971, 28, 'Kabupaten Bolaang Mongondow Selatan'),
(972, 28, 'Kabupaten Bolaang Mongondow Timur'),
(973, 28, 'Kabupaten Bolaang Mongondow Utara'),
(974, 28, 'Kabupaten Kepulauan Sangihe'),
(975, 28, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(976, 28, 'Kabupaten Kepulauan Talaud'),
(977, 28, 'Kabupaten Minahasa'),
(978, 28, 'Kabupaten Minahasa Selatan'),
(979, 28, 'Kabupaten Minahasa Tenggara'),
(980, 28, 'Kabupaten Minahasa Utara'),
(981, 28, 'Kota Bitung'),
(982, 28, 'Kota Kotomobagu'),
(983, 28, 'Kota Manado'),
(984, 28, 'Kota Tomohon'),
(985, 28, 'Propinsi Sulawesi Utara'),
(986, 29, 'Kabupaten Majene'),
(987, 29, 'Kabupaten Mamasa'),
(988, 29, 'Kabupaten Mamuju'),
(989, 29, 'Kabupaten Mamuju Utara'),
(990, 29, 'Kabupaten Polewali Mandar'),
(991, 29, 'Propinsi Sulawesi Barat'),
(992, 30, 'Kabupaten Baru'),
(993, 30, 'Kabupaten Baru Selatan'),
(994, 30, 'Kabupaten Kepulauan Aru'),
(995, 30, 'Kabupaten Maluku Barat Daya'),
(996, 30, 'Kabupaten Maluku Tengah'),
(997, 30, 'Kabupaten Maluku Tenggara'),
(998, 30, 'Kabupaten Maluku Tenggara Barat'),
(999, 30, 'Kabupaten Serem Bagian Barat'),
(1000, 30, 'Kabupaten Serem Bagian Timur'),
(1001, 30, 'Kota Ambon'),
(1002, 30, 'Kota Tual'),
(1003, 30, 'Propinsi Maluku'),
(1004, 31, 'Kabupaten Halmahera Barat'),
(1005, 31, 'Kabupaten Halmahera Tengah'),
(1006, 31, 'Kabupaten Halmahera Utara'),
(1007, 31, 'Kabupaten Halmahera Selatan'),
(1008, 31, 'Kabupaten Kepulauan Sula'),
(1009, 31, 'Kabupaten Halmahera Timur'),
(1010, 31, 'Kabupaten Pulau Morotai'),
(1011, 31, 'Kota Ternate'),
(1012, 31, 'Kota Tidore Kepulauan'),
(1013, 31, 'Propinsi Maluku Utara'),
(1014, 32, 'Kabupaten Asmat'),
(1015, 32, 'Kabupaten Biak Numfor'),
(1016, 32, 'Kabupaten Boven Digoel'),
(1017, 32, 'Kabupaten Deiyai'),
(1018, 32, 'Kabupaten Dogiyai'),
(1019, 32, 'Kabupaten Intan Jaya'),
(1020, 32, 'Kabupaten Jayapura'),
(1021, 32, 'Kabupaten Jayawijaya'),
(1022, 32, 'Kabupaten Keerom'),
(1023, 32, 'Kabupaten Kepulauan Yapen'),
(1024, 32, 'Kabupaten Lanny Jaya'),
(1025, 32, 'Kabupaten Mamberamo Raya'),
(1026, 32, 'Kabupaten Mamberamo Tengah'),
(1027, 32, 'Kabupaten Mappi'),
(1028, 32, 'Kabupaten Merauke'),
(1029, 32, 'Kabupaten Mimika'),
(1030, 32, 'Kabupaten Nabire'),
(1031, 32, 'Kabupaten Nduga'),
(1032, 32, 'Kabupaten Paniai'),
(1033, 32, 'Kabupaten Pegunungan Bintang'),
(1034, 32, 'Kabupaten Puncak'),
(1035, 32, 'Kabupaten Puncak Jaya'),
(1036, 32, 'Kabupaten Sarmi'),
(1037, 32, 'Kabupaten Supiori'),
(1038, 32, 'Kabupaten Talikara'),
(1039, 32, 'Kabupaten Waropen'),
(1040, 32, 'Kabupaten Yahukimo'),
(1041, 32, 'Kabupaten Yalimo'),
(1042, 32, 'Propinsi Papua'),
(1043, 33, 'Kabupaten Fakfak'),
(1044, 33, 'Kabupaten Kaimana'),
(1045, 33, 'Kabupaten Manokwari'),
(1046, 33, 'Kabupaten Maybrat'),
(1047, 33, 'Kabupaten Raja Ampat'),
(1048, 33, 'Kabupaten Sorong'),
(1049, 33, 'Kabupaten Sorong Selatan'),
(1050, 33, 'Kabupaten Tambrauw'),
(1051, 33, 'Kabupaten Teluk Bintuni'),
(1052, 33, 'Kabupaten Teluk Wondama'),
(1053, 33, 'Kota Sorong'),
(1054, 33, 'Propinsi Papua Barat'),
(1055, 1, 'Kabupaten Bener Meriah');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama`) VALUES
(1, 'Berita'),
(3, 'Kesehatan'),
(9, 'Profil Web');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE IF NOT EXISTS `kategori_barang` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama`) VALUES
(1, 'Cassava Chips'),
(2, 'Casstaro Chips');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_umum`
--

CREATE TABLE IF NOT EXISTS `kategori_umum` (
`id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `golongan` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_umum`
--

INSERT INTO `kategori_umum` (`id`, `nama`, `golongan`) VALUES
(1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
`id` int(11) NOT NULL,
  `kabkota_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `provinsi_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kabkota_id`, `nama`, `updated_at`, `provinsi_id`) VALUES
(3, 702, 'Tambun', '2015-07-02 13:35:47', 12),
(4, 783, 'Blimbing', '2015-07-23 17:48:29', 15),
(5, 803, 'Klojen', '2015-07-02 21:21:17', 15),
(10, 783, 'Klojen', '2015-07-23 17:48:18', 15),
(11, 783, 'Sukun', '2015-07-23 17:48:47', 15),
(12, 702, 'Kranji', '2015-07-03 12:46:44', 12),
(13, 807, 'Sukolilo', '2015-07-03 12:47:00', 15),
(14, 807, 'Benowo', '2015-07-03 12:47:05', 15),
(15, 793, 'Tanggulangin', '2015-07-03 12:47:54', 15),
(16, 793, 'Porong', '2015-07-03 12:47:58', 15),
(17, 791, 'Kraksaan', '2015-07-03 12:49:26', 15),
(18, 791, 'Prasi', '2015-07-03 12:50:06', 15),
(19, 791, 'Leces', '2015-07-03 12:50:24', 15),
(20, 791, 'Pajarakan', '2015-07-03 12:50:31', 15),
(21, 791, 'Paiton', '2015-07-03 12:50:36', 15),
(22, 791, 'Maron', '2015-07-03 12:50:40', 15),
(23, 789, 'Bangil', '2015-07-26 08:07:07', 15);

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE IF NOT EXISTS `kurir` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `keterangan`) VALUES
(1, 'Pandu Logistic -  Over Night Service', ''),
(2, 'Pandu Logistic - Same Day Service', ''),
(3, 'Pandu Logistic - Regular', ''),
(4, 'Wahana - Service Normal', ''),
(5, 'Wahana - Service Express', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id` int(11) NOT NULL,
  `no_pelanggan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kab_kota` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `no_pelanggan`, `nama`, `alamat`, `kab_kota`, `kode_pos`, `hp`, `updated_at`, `aktif`, `username`, `password`, `foto`, `is_new`) VALUES
(11, 'CUST-001', 'Taufik Ute Alfan', 'Jl. Semolowaru Indah II N-14', 'Surabaya', 610928, '08993484898', '2015-07-25 02:39:42', 0, 'alfhanz@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '55b2f6eac8a9e.jpg', 1),
(12, 'CUST-TOMG', 'inneke', '', '', 0, '', '2015-07-11 12:15:40', 0, 'kusumaningrum.inneke@gmail.com', '5e8e5e91c1bc68d05ad079b9b3632a9e6641c64a', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `waktu` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` tinyint(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `kabkota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `alamat`, `telp`, `email`, `foto`, `fb`, `twitter`, `kabkota`) VALUES
(1, 'Oenlez', 'Jl. Semolowaru Indah II N-14', '087881596699', 'oenlezsnack@gmail.com', 'logo.jpg', '', '', 'Surabaya, Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
`id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Bengkulu'),
(4, 'Jambi'),
(5, 'Riau'),
(6, 'Sumatera Barat'),
(7, 'Sumatera Selatan'),
(8, 'Lampung'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Kepulauan Riau'),
(11, 'Banten'),
(12, 'Jawa Barat'),
(13, 'DKI Jakarta'),
(14, 'Jawa Tengah'),
(15, 'Jawa Timur'),
(16, 'Derah Istimewa Yogyakarta'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Selatan'),
(22, 'Kalimantan Tengah'),
(23, 'Kalimantan Timur'),
(24, 'Gorontalo'),
(25, 'Sulawesi Selatan'),
(26, 'Sulawesi Tenggara'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Utara'),
(29, 'Sulawesi Barat'),
(30, 'Maluku'),
(31, 'Maluku Utara'),
(32, 'Papua'),
(33, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `barang_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` char(36) NOT NULL,
  `tanggal` date NOT NULL,
  `no_invoice` varchar(10) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kabkota_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `harga_kirim_id` int(11) NOT NULL,
  `harga_kirim` decimal(10,0) NOT NULL,
  `total` int(11) NOT NULL COMMENT 'total tanpa harga_kirim',
  `pelanggan_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop_detail`
--

CREATE TABLE IF NOT EXISTS `shop_detail` (
  `id` char(36) NOT NULL,
  `shop_id` char(36) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slide_show`
--

CREATE TABLE IF NOT EXISTS `slide_show` (
`id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_show`
--

INSERT INTO `slide_show` (`id`, `foto`, `keterangan`, `updated_at`, `judul`) VALUES
(1, '559a195700622.jpg', '<b>OENLEZ&nbsp;</b>is the Abreviation og Oenal Lezat which means the food has an incridible&nbsp;<b>DELICIOUS&nbsp;</b>taste.', '2015-07-06 06:17:04', 'What is oenlez?'),
(2, '559a1929af29e.jpg', 'No Artificial Flavour,&nbsp;No Artificial Colour,&nbsp;No MSG added,&nbsp;No Preservatives,&nbsp;No Gluten', '2015-07-06 06:18:10', 'Fresh From Nature'),
(3, '559a1a78ae4ac.jpg', '<b>What Is Oenlez? OENLEZ&nbsp;</b>is the Abreviation og Oenal Lezat which means the food has an incridible <b>DELICIOUS </b>taste.', '2015-07-06 06:12:44', 'Gluten Free MSG');

-- --------------------------------------------------------

--
-- Table structure for table `sys_group`
--

CREATE TABLE IF NOT EXISTS `sys_group` (
`id` int(11) NOT NULL,
  `nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_group`
--

INSERT INTO `sys_group` (`id`, `nama`) VALUES
(1, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE IF NOT EXISTS `sys_menu` (
`id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `nama` varchar(35) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `urutan` tinyint(3) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `parent_id`, `nama`, `url`, `icon`, `urutan`, `level`) VALUES
(1, 0, 'Main', '#', 'fa fa-th', 1, 1),
(2, 1, 'Jenis Barang', 'jenis_barang', NULL, 1, 2),
(3, 1, 'Kategori Produk', 'kategori_barang', NULL, 2, 2),
(4, 1, 'Pengguna Aplikasi', 'usermanagement', NULL, 1, 2),
(5, 0, 'Sales Management', '#', 'fa fa-shopping-cart', 2, 1),
(6, 5, 'Daftar Pelanggan', 'daftar_pelanggan', NULL, 1, 2),
(7, 1, 'Daftar Produk', 'barang', NULL, 4, 2),
(8, 5, 'Daftar Penjualan', 'daftar_penjualan', NULL, 2, 2),
(9, 0, 'Article Management', '#', 'fa fa-file-o', 3, 1),
(10, 5, 'Rekap Penjualan', 'rekap', NULL, 3, 2),
(11, 5, 'Notifikasi', 'notifikasi', NULL, 4, 2),
(12, 9, 'Kategori Artikel', 'kategori_artikel', NULL, 1, 2),
(13, 1, 'Profil Usaha', 'profil', NULL, 2, 2),
(14, 9, 'Daftar Artikel', 'daftar_artikel', NULL, 2, 2),
(15, 1, 'Menu Management', 'menu_management', NULL, 5, 2),
(16, 9, 'Slide Show', 'slide_show', NULL, 3, 2),
(17, 0, 'Other', '#', 'fa fa-th', 4, 1),
(18, 17, 'Banner', 'banner_management', NULL, 1, 2),
(19, 17, 'Shipping Payment', 'wilayah', NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE IF NOT EXISTS `sys_user` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(16) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `pegawai_id` varchar(40) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`id`, `username`, `password`, `nama`, `group_id`, `email`, `telp`, `hp`, `pegawai_id`, `foto`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrator', 1, 'alfhan@yahoo.co.id', '', '08993484898', NULL, '8b3fa3bfbc79f7cc1a626a7a68e612a8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_group`
--

CREATE TABLE IF NOT EXISTS `sys_user_group` (
`id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_group`
--

INSERT INTO `sys_user_group` (`id`, `menu_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, NULL),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 14, 1),
(13, 15, NULL),
(14, 16, 1),
(15, 17, 1),
(16, 18, 1),
(17, 19, 1),
(18, 7, 3),
(19, 12, 1),
(20, 12, 3),
(21, 10, NULL),
(22, 11, 1),
(23, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_jual`
--

CREATE TABLE IF NOT EXISTS `temp_jual` (
`id` int(11) NOT NULL,
  `sesi_id` varchar(100) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `harga` float NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal` date NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_jual`
--

INSERT INTO `temp_jual` (`id`, `sesi_id`, `barang_id`, `qty`, `harga`, `pelanggan_id`, `updated_at`, `tanggal`, `berat`) VALUES
(5, '9ce5a821234b1ab782670896f08c294c', 10, 12, 4500, 3, '2015-07-09 12:38:50', '2015-07-09', 80),
(6, '9c76f0e2d27ee0748e5c0205d2f500d6', 13, 12, 7600, 11, '2015-07-24 20:28:38', '2015-07-25', 12),
(7, '9c76f0e2d27ee0748e5c0205d2f500d6', 10, 12, 4500, 11, '2015-07-24 20:28:53', '2015-07-25', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_setting`
--
ALTER TABLE `email_setting`
 ADD PRIMARY KEY (`user`);

--
-- Indexes for table `harga_kurir`
--
ALTER TABLE `harga_kurir`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_umum`
--
ALTER TABLE `kategori_umum`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_detail`
--
ALTER TABLE `shop_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_show`
--
ALTER TABLE `slide_show`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_group`
--
ALTER TABLE `sys_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
 ADD PRIMARY KEY (`username`), ADD KEY `id` (`id`), ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `sys_user_group`
--
ALTER TABLE `sys_user_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_jual`
--
ALTER TABLE `temp_jual`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `harga_kurir`
--
ALTER TABLE `harga_kurir`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kabkota`
--
ALTER TABLE `kabkota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1056;
--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_umum`
--
ALTER TABLE `kategori_umum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide_show`
--
ALTER TABLE `slide_show`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sys_group`
--
ALTER TABLE `sys_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys_user_group`
--
ALTER TABLE `sys_user_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `temp_jual`
--
ALTER TABLE `temp_jual`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
