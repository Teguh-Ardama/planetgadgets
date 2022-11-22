-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 06:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planetgadgets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_addres_his`
--

CREATE TABLE `tb_addres_his` (
  `ah_userid` varchar(200) NOT NULL,
  `ah_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_addres_his`
--

INSERT INTO `tb_addres_his` (`ah_userid`, `ah_alamat`) VALUES
('23094', 'Perumahan Bukit Nirwana Jln Raya Gunung Tugel No 11'),
('23094', 'Jalan Tanah Abang IV No.49, Rt.8/Rw.4, Petojo Selatan, Gambir, Kecamatan Gambir, Kota Jakarta Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_nama` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_sandi` text NOT NULL,
  `admin_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_sandi`, `admin_foto`) VALUES
('47a7f2c033801a8185243e6ca8df5fae', 'Planet Gadgets', 'admin@planetgadgets.com', '$2y$10$flHAaj0BqODX/xa5W2fVjOlZvkkw81oCv43OtrMG461jjTANR2S5C', '53af4775da8bfbe50c728b2b6d7d29ee.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_api`
--

CREATE TABLE `tb_api` (
  `api_id` int(11) NOT NULL,
  `api_ongkir` varchar(100) NOT NULL,
  `api_mid_client` varchar(100) NOT NULL,
  `api_mid_server` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_api`
--

INSERT INTO `tb_api` (`api_id`, `api_ongkir`, `api_mid_client`, `api_mid_server`) VALUES
(1, '8b97be6a4cac4a5b2762e7483afe4202', 'SB-Mid-client-2Ea56CW4EbJfr8ot', 'SB-Mid-server-Fc_5m5zFxa2oag5NjugaG_nz');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `blog_id` varchar(200) NOT NULL,
  `blog_judul` varchar(90) NOT NULL,
  `blog_url` text NOT NULL,
  `blog_tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `blog_isi` text NOT NULL,
  `blog_gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`blog_id`, `blog_judul`, `blog_url`, `blog_tgl`, `blog_isi`, `blog_gambar`) VALUES
('18d53c7b50f445c2d826101d9a6754c3', 'Promo Juli 2022: Daftar Di Planet Gadgets PASTI Dapat Diskon 7%!', 'promo-juli-2022-daftar-di-planet-gadgets-pasti-dapat-diskon-7-1658221172.html', '2022-07-19 11:08:56', '<p>Kode Voucher : <strong>JUL22 </strong>untuk mendapatkan diskon sebanyak 7%</p>\r\n\r\n<p>Promo berlaku sampai dengan 31 Juli 2022</p>\r\n', '8e9f3c3cfe352adae5eb44b2a84b4596.jpg'),
('2077dc004452e1dbd5c28850979cc1cb', '5 Tips Tokopedia Biar Persiapan Mudik Lebih Maksimal', '5-tips-tokopedia-biar-persiapan-mudik-lebih-maksimal-1657876653.html', '2021-11-18 13:22:40', '<p>Jakarta, 27 April 2022 -&nbsp;Mudik sudah menjadi tradisi masyarakat Indonesia menjelang Lebaran untuk bersilaturahmi dengan kerabat. Tokopedia melalui&nbsp;VP of Marketplace Tokopedia, Yudhiaji Kusuma,&nbsp;pun membagikan tips agar persiapan mudik lebih matang.</p>\r\n\r\n<ol>\r\n	<li>Pastikan Saldo E-Money Cukup -&nbsp;Sebelum melakukan perjalanan mudik dengan mobil, pastikan saldo uang elektronik (<em>e-money</em>) cukup agar tidak menghambat perjalanan pengendara lainnya.<br />\r\n	<br />\r\n	&ldquo;Masyarakat bisa dengan mudah mengisi saldo&nbsp;<em>e-money&nbsp;</em>melalui fitur&nbsp;<a href=\"https://www.tokopedia.com/top-up/etoll/\">Top Up Uang Elektronik</a>&nbsp;di Tokopedia kapan dan di mana pun. Setelah pembayaran sudah terverifikasi, jangan lupa update saldo&nbsp;<em>e-money</em>&nbsp;dari aplikasi Tokopedia, ATM atau gerai retail terdekat,&rdquo; ujar Yudhiaji.</li>\r\n</ol>\r\n', 'e23a4307e4a024ca20a8448252165544.PNG'),
('4bece2203526fc609f7e2669ddc6e602', 'Promo Agustus 2022: Daftar Di Planet Gadgets PASTI Dapat Diskon 5%!', 'promo-agustus-2022-daftar-di-planet-gadgets-pasti-dapat-diskon-5-1658221163.html', '2022-07-19 11:24:31', '<p>Kode Voucher : <strong>AGSCERIA </strong>untuk mendapatkan diskon 5%</p>\r\n\r\n<p>Berlaku sampai dengan 31 Agustus 2022</p>\r\n', '95f01258cda8426cf24d0f2b9a0116ef.jpg'),
('b2f4a34b8bfdf6ce3a4c2264e012a204', 'Kisah Dakara Indonesia: Penjualan', 'kisah-dakara-indonesia-penjualan-1657876638.html', '2022-06-26 23:39:53', '<p>Bertepatan dengan HUT DKI Jakarta yang ke-495, Tokopedia kali ini ingin membagikan kisah menarik dari salah satu penjual lokal Tokopedia asal kota metropolitan, Jakarta.&nbsp;<a href=\"https://www.tokopedia.com/dakaraindonesia\">Dakara Indonesia</a>, sebuah bisnis fesyen milik Ayu Purnamasari ini berkofus pada busana etnik yang modern. Berbahan dasar tenun, Dakara ingin mengajak lebih banyak masyarakat Indonesia untuk lebih mencintai budaya Indonesia melalui fesyen.</p>\r\n\r\n<p>Walau mengambil konsep tradisional, Dakara hadir dengan desain etnik yang modern dan terus berkomitmen untuk turut serta melestarikan warisan budaya tanah air. Produk yang dihasilkan Dakara pun bervariasi, mulai dari&nbsp;<em>outerwear,&nbsp;</em>kimono, jaket, gaun, celana, kemeja, tunik, dan masih banyak lagi. Pemilihan corak dan desain pada setiap produk Dakara juga menjadi identitas tersendiri yang mudah dikenali.</p>\r\n', '8ffbea16bad4b2d53c6a43abd542f1ee.jpg'),
('e32b0125c4fe671bbe2f1b3c4db10305', 'Hari Pajak Nasional: Nilai Transaksi Pembayaran Pajak Di Tokopedia Naik Hampir 3 Kali Lipa', 'hari-pajak-nasional-nilai-transaksi-pembayaran-pajak-di-tokopedia-naik-hampir-3-kali-lipat-di-semester-pertama-2022-1657876620.html', '2022-07-15 16:17:00', '<p><strong>Jakarta, 13 Juli 2022 -&nbsp;</strong>Kolaborasi Tokopedia dengan berbagai mitra strategis, termasuk Direktorat Jenderal Pajak Kementerian Keuangan RI, mendorong peningkatan transaksi pembayaran pajak melalui Tokopedia. Pada semester I 2022, nilai transaksi pembayaran pajak di Tokopedia naik hampir 3 kali lipat dibanding periode yang sama di 2021.</p>\r\n\r\n<p><strong>Direktur Jenderal Pajak Kementerian Keuangan RI, Suryo Utomo</strong>, mengatakan, &ldquo;Kami memfasilitasi masyarakat agar dapat menunaikan kewajiban perpajakan negara melalui berbagai lembaga termasuk&nbsp;<em>e-commerce</em>. Hal ini dapat membantu meningkatkan kepatuhan masyarakat sekaligus mendorong penerimaan negara demi pemulihan ekonomi nasional.&rdquo;</p>\r\n\r\n<p>Di sisi lain,&nbsp;<strong>Direktur Kebijakan Publik dan Hubungan Pemerintah Tokopedia, Astri Wahyuni,&nbsp;</strong>menyatakan, &ldquo;Sinergi bersama pemerintah diharapkan dapat terus meningkatkan animo masyarakat dalam berkontribusi pada penerimaan negara demi pemulihan ekonomi nasional. Kami juga akan terus berinovasi dalam menghadirkan lebih banyak kemudahan pembayaran pajak bagi masyarakat.&rdquo;</p>\r\n\r\n<p>Sejauh ini, kolaborasi Tokopedia dengan berbagai mitra strategis, termasuk Direktorat Jenderal Pajak Kementerian Keuangan RI, untuk mempermudah masyarakat memenuhi kewajiban perpajakan, diwujudkan melalui kehadiran berbagai fitur, antara lain&nbsp;<a href=\"https://www.tokopedia.com/pajak/samsat\">E-Samsat</a>,&nbsp;<a href=\"https://www.tokopedia.com/pajak/pbb/\">Pajak Bumi dan Bangunan (PBB)</a>&nbsp;serta&nbsp;<a href=\"https://www.tokopedia.com/mpn/\">Modul Penerimaan Negara</a>.</p>\r\n\r\n<p><strong>Layanan Pembayaran E-Samsat</strong></p>\r\n\r\n<p>Selama semester pertama 2022, jumlah dan nilai transaksi E-Samsat melalui Tokopedia masing-masing meningkat hampir 1,5 kali lipat jika dibandingkan dengan periode yang sama tahun lalu. Selain itu, Kutai Kartanegara, Medan, Trenggalek, Balikpapan dan Makassar menjadi beberapa daerah dengan lonjakan jumlah transaksi paling tinggi pada fitur E-Samsat dibandingkan periode yang sama di tahun 2021.</p>\r\n\r\n<p><strong>Layanan Pembayaran PBB Online</strong></p>\r\n\r\n<p>Melalui kolaborasi dengan Badan Pendapatan Daerah (Bapenda), kemudahan dari fitur pembayaran PBB Online<strong>&nbsp;</strong>di Tokopedia menghasilkan kenaikan transaksi hampir 2 kali lipat pada semester pertama 2022 dibandingkan periode yang sama tahun 2021.</p>\r\n\r\n<p>Palembang, Kediri, Samarinda, Makassar dan Sragen menjadi beberapa daerah dengan peningkatan jumlah transaksi paling tinggi pada fitur PBB dibandingkan periode yang sama tahun 2021. Fitur PBB Online sendiri telah tersedia di lebih dari 160 kota/kabupaten di Indonesia.</p>\r\n\r\n<p><strong>Layanan Pembayaran Modul Penerimaan Negara (MPN)</strong></p>\r\n\r\n<p>Lonjakan transaksi juga terjadi pada layanan MPN lewat Tokopedia, yakni mencapai hingga lebih dari 2 kali lipat pada semester pertama 2022 dibandingkan periode yang sama di 2021. Sedangkan jumlah pengguna Modul Penerimaan Negara mencapai hampir 3 kali lipat.</p>\r\n\r\n<p>Wilayah Sidenreng Rappang, Lampung Selatan, Purbalingga, Singkawang hingga Situbondo mengalami peningkatan jumlah transaksi paling tinggi pada fitur Modul Penerimaan Negara di Tokopedia selama semester pertama 2022. Lewat MPN, masyarakat bisa membayar Pajak Penghasilan, Bea Cukai, Biaya Perpanjang Paspor hingga SIM, Biaya KUA dan masih banyak lainnya.</p>\r\n', '789fbc32c08c10330b34854a4cd46a24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_rowid` varchar(80) NOT NULL,
  `cart_name` text NOT NULL,
  `cart_price` varchar(8) NOT NULL,
  `cart_image` varchar(80) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_weight` varchar(7) NOT NULL,
  `cart_stok` int(11) NOT NULL,
  `cart_userid` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`cart_id`, `cart_rowid`, `cart_name`, `cart_price`, `cart_image`, `cart_qty`, `cart_weight`, `cart_stok`, `cart_userid`, `cart_total`) VALUES
(2056, '61fa8a5ce6425bf77c6f61ed0e3a5094', 'Star Guardian', '50000', '8.jpg', 4, '1', 10, 11454, 200000),
(2977, '31b94e43c0bd5ab1eee514065920a389', 'T-shirt Black', '60000', '1.jpg', 3, '1', 20, 11454, 180000),
(12742, '3ce3f94b9ab20ef4a2e56ca9dc015e5a', 'Black Hodie', '200000', '3.jpg', 1, '1', 6, 11454, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `d_transaksi_id` varchar(200) NOT NULL,
  `d_transaksi_item` varchar(200) NOT NULL,
  `d_transaksi_qty` smallint(4) NOT NULL,
  `d_transaksi_biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`d_transaksi_id`, `d_transaksi_item`, `d_transaksi_qty`, `d_transaksi_biaya`) VALUES
('a7aa7a192c5a2ced74d0bfabb6a466c2', '12248dac5e2c26b1aeb8e265d7086ee8', 1, 211460),
('5f19b99dc87124a9675b9659ee696c45', '80f41935fac2483f5c932ae58902cf95', 1, 10000000),
('5f19b99dc87124a9675b9659ee696c45', '12248dac5e2c26b1aeb8e265d7086ee8', 1, 211460),
('f49a9bfab57a20d4f90c3993dccf02f7', '2daacabf8297ebf209eb9ad56a7c863b', 1, 450000),
('4fa222ef3753e1a01e98b0a1f522383a', '12248dac5e2c26b1aeb8e265d7086ee8', 1, 211460),
('878810532220944c0ab19347439f39cd', 'c8ce8a37c6f66962cc4fc9277766a9d1', 1, 3699000),
('d0d01edf520c7a3e0666d6cd77dc90d7', '2daacabf8297ebf209eb9ad56a7c863b', 1, 450000),
('f2edacbcc15bde1376bc0bca49769a3a', '48bde8eb0b4aece12fead57ec827c659', 1, 10496650),
('835e11effec678091b3f3d19ca36db16', '2daacabf8297ebf209eb9ad56a7c863b', 1, 450000),
('835e11effec678091b3f3d19ca36db16', '80f41935fac2483f5c932ae58902cf95', 3, 30000000),
('d12e4c5df7f5ef36d44eb58d00ed6eb5', '12248dac5e2c26b1aeb8e265d7086ee8', 1, 211460),
('2f9dca1f09371d6177cfe9d45c7ee040', 'b0f6fbbd8082b5f95f04191d2bbbc5f5', 1, 159000),
('ab1a3fbf35f0cddc4f279e8fa91b2abf', '48bde8eb0b4aece12fead57ec827c659', 1, 10496650),
('ccf64dbf35eeb9e331b571244523441f', '80941f31ffef45399ca9aeff79fe7755', 1, 13199000),
('099809a1000b4614b840bf3bcc76e796', '2daacabf8297ebf209eb9ad56a7c863b', 1, 450000),
('b609d3551a66ab99c597aea2ba1d4299', '48bde8eb0b4aece12fead57ec827c659', 1, 10496650),
('b4f9af377f172d85a90d6aa15b72a9ec', 'c8ce8a37c6f66962cc4fc9277766a9d1', 1, 3699000),
('8bd402d448ec573c227d8be258d53a9e', '80f41935fac2483f5c932ae58902cf95', 1, 10000000),
('6052891f3697526b60ad72d465aaaff9', '2daacabf8297ebf209eb9ad56a7c863b', 1, 450000),
('956af528ddab6546a8ac8e45b150b562', '80941f31ffef45399ca9aeff79fe7755', 1, 13199000),
('87f3f3ea70a955c2b97c25f71e704f85', '80f41935fac2483f5c932ae58902cf95', 1, 10000000),
('e9417a144975ea20fc216b1483940592', '0e68da19eba361c70790eeb6a284ffb7', 1, 2500000),
('583f5c5e4c58e685ab28afc1ab04b862', '73ebd1b68aaf38831dc5f9241f2c1074', 1, 6300000),
('c45be1c3d91468d2facccbbc2e82358f', '12248dac5e2c26b1aeb8e265d7086ee8', 1, 211460),
('c45be1c3d91468d2facccbbc2e82358f', 'c8ce8a37c6f66962cc4fc9277766a9d1', 1, 3699000),
('a7cf179a4e8f359083cb22bcdfd298a4', '80941f31ffef45399ca9aeff79fe7755', 1, 13199000),
('507fff6954f9eb4f2aacb2bb9229e79c', '80941f31ffef45399ca9aeff79fe7755', 1, 13199000),
('507fff6954f9eb4f2aacb2bb9229e79c', '76dbd0f898054ae8630aa64bf6ba8bfe', 1, 3114000),
('8efb7e7ce0d2e7495034cde04ee8b927', '48bde8eb0b4aece12fead57ec827c659', 1, 10496650);

-- --------------------------------------------------------

--
-- Table structure for table `tb_email`
--

CREATE TABLE `tb_email` (
  `email_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_email`
--

INSERT INTO `tb_email` (`email_id`, `email`, `email_password`) VALUES
(1, 'noreply@dazzlestore.com', '[{dpv0OZ).x_');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto_rel`
--

CREATE TABLE `tb_foto_rel` (
  `fr_proid` varchar(200) NOT NULL,
  `fr_nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foto_rel`
--

INSERT INTO `tb_foto_rel` (`fr_proid`, `fr_nama`) VALUES
('18318da7dae61a542729d9da994161be', 'd154cc843c69bb0a29e2850bb484ce75.jpg'),
('18318da7dae61a542729d9da994161be', '9cfbe29e062daac6221c874bd5e42aec.jpg'),
('18318da7dae61a542729d9da994161be', 'e7dd870221699779807818dbbf68cdef.jpg'),
('18318da7dae61a542729d9da994161be', '6d25d591edc29b60775a9c2815087d9c.jpg'),
('18318da7dae61a542729d9da994161be', '72fc184c411a4d1427afc0d71a077322.jpg'),
('b1c1c06fcf57d6662cfd019a7030ac29', 'b5c29117d750d9901d4853dc777f582d.jpg'),
('b1c1c06fcf57d6662cfd019a7030ac29', '1863dd394f04eded7afb364a4cd2c488.jpg'),
('faf1d034707d68a5195aa492187355f5', 'e70d265662ded0b5b601137d0840c40f.jpg'),
('faf1d034707d68a5195aa492187355f5', 'e94d6bfafb42c66f094a74a1241a0b7b.jpg'),
('faf1d034707d68a5195aa492187355f5', 'eb4551b512ed11f7dbffe5186f3a8ddb.jpg'),
('faf1d034707d68a5195aa492187355f5', 'f99f6f61b3539bd8a522c1563e9946b6.png'),
('b1c1c06fcf57d6662cfd019a7030ac29', '570b06520a640e8bf0f8a7137da4ed17.png'),
('b0f6fbbd8082b5f95f04191d2bbbc5f5', 'c24fede152cfcf6ea8ec350897476c89.jpg'),
('b0f6fbbd8082b5f95f04191d2bbbc5f5', '5240729cf536aca018c273e7e724a155.jpg'),
('b0f6fbbd8082b5f95f04191d2bbbc5f5', '28a9bb1a953d34f3d549148aa71285ff.jpg'),
('ddd2408d2649077fc0c4d68dbc0c1bf3', 'dde5a48fc4b5225aaec50cfa6f964444.jpg'),
('b0f6fbbd8082b5f95f04191d2bbbc5f5', '8952e623196908c23128bea6028a605e.jpg'),
('2daacabf8297ebf209eb9ad56a7c863b', '20d4ec91cb061551ae64700337bd13c3.jpg'),
('80941f31ffef45399ca9aeff79fe7755', '375a1bfee14907ce937ed40b1fcceca9.jpg'),
('7c2094fa92578439322574ae4d0e6423', '7aaffcb1d70b6095bae07fb8bb776035.jpg'),
('0e68da19eba361c70790eeb6a284ffb7', 'c8c00405bffa45a95d7ba0f82e6cee64.jpg'),
('0e68da19eba361c70790eeb6a284ffb7', 'f5b61bd884eb1b7551e16683342c7ab6.jpg'),
('49277a6d59455a0a2f51ab2ae3819b4b', '57e4de0cc63782c91a0c01520299fa5d.jpg'),
('49277a6d59455a0a2f51ab2ae3819b4b', '199b1dd8afce30c8334e6ce145cb944b.jpg'),
('49277a6d59455a0a2f51ab2ae3819b4b', '020c110c1672f6b53266a954ea4f27f3.jpg'),
('80f41935fac2483f5c932ae58902cf95', '4c5f1cfeba9da51497e3093a3fef4a6f.jpg'),
('80f41935fac2483f5c932ae58902cf95', '865793728bce8f434c3163532776be91.jpg'),
('12248dac5e2c26b1aeb8e265d7086ee8', '18d83151df5deb088465762916f5a01b.jpg'),
('12248dac5e2c26b1aeb8e265d7086ee8', 'c20b904f52c0281570c0b2e10654755b.jpg'),
('c8ce8a37c6f66962cc4fc9277766a9d1', '4dc8d14b27b28fcb63e1c84865e3cd89.jpg'),
('c8ce8a37c6f66962cc4fc9277766a9d1', 'da635027c7d991e76ed537a5c10c2330.jpg'),
('c8ce8a37c6f66962cc4fc9277766a9d1', '5ee36367887795b84cdefd3fa574a6a6.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', '96a066be0bac4b43342e3365a012a5a0.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', 'ac3595022af4becfffc591b91ac550a4.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', 'a61588a4f3730d0ac08c45b116a182c8.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', 'e44aea17e8d2b0e57b11339b60c94106.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', '0276b941f6b7a7383dbb0bc946da2256.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', '4a06bff4e6aa88a728a7c9348f89a352.jpg'),
('76dbd0f898054ae8630aa64bf6ba8bfe', '2bf5e720071c6dcd1905a3b52e2c3d86.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `kat_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `url`, `kat_image`) VALUES
(103690157, 'Samsung', 'samsung', '0d8a45489ed2a7c8adc01a6dc8327316.png'),
(116740125, 'Xiaomi', 'xiaomi', '018d498d381997891194c8304b343f40.png'),
(309754519, 'Huawei', 'huawei', '1b427adce63a51ff7b0ce6d943818345.png'),
(368153154, 'Hp', 'hp', 'fde516392093c5ccdbbdb671f2efdb0b.png'),
(442692375, 'Lenovo', 'lenovo', '4efd1b614ea641a826d8e2cf7b005d30.png'),
(492758410, 'LG', 'lg', '02045122f7dc5c5b744bb5572e6856d5.png'),
(871107957, 'Nokia', 'nokia', '9b44dc3157ae093f01a82fb997ec52fc.png'),
(1522095227, 'Apple', 'apple', '710c6fc40034a60bc5af6444f7289c11.png'),
(1627401156, 'Sony', 'sony', '8219bcff31bca81758b0fff07b9151df.png'),
(1703491112, 'Canon', 'canon', '3ea9cabd4e0b2f971dd3a022e36caa9c.png'),
(1868507850, 'Oppo', 'oppo', '5f2f62dcf7c67c4af32289cd28e6da34.png'),
(1930411826, 'Nikon', 'nikon', 'c541c5da3f102b542638d938700bdc9a.png'),
(1948984456, 'Vivo', 'vivo', 'd51922ffcfea368aa3a41f6097d4224c.png'),
(2003473233, 'Asus', 'asus', '23857ae8ecbd65ce3be51da9148cb4fb.png'),
(2097946476, 'Dell', 'dell', 'f628e92535535ce387d3e933508edce3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `komentar_id` varchar(50) NOT NULL,
  `komentar_proid` int(11) NOT NULL,
  `komentar_userid` int(11) NOT NULL,
  `komentar_tgl` datetime NOT NULL,
  `komentar_isi` text NOT NULL,
  `komentar_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lock`
--

CREATE TABLE `tb_lock` (
  `lock_id` int(11) NOT NULL,
  `lock_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lock`
--

INSERT INTO `tb_lock` (`lock_id`, `lock_status`) VALUES
(1, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `lok_id` int(11) NOT NULL,
  `lok_id_prov` int(11) NOT NULL,
  `lok_prov` varchar(50) NOT NULL,
  `lok_id_kota` int(11) NOT NULL,
  `lok_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`lok_id`, `lok_id_prov`, `lok_prov`, `lok_id_kota`, `lok_kota`) VALUES
(1, 9, 'Jawa Barat', 54, 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `notif_id` varchar(200) NOT NULL,
  `notif_perihal` varchar(200) NOT NULL,
  `notif_userid` varchar(200) NOT NULL,
  `notif_time` datetime NOT NULL DEFAULT current_timestamp(),
  `notif_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`notif_id`, `notif_perihal`, `notif_userid`, `notif_time`, `notif_status`) VALUES
('001b581ad94ee0fb8abf06cefc35e329', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-27 12:57:22', 1),
('0381e41fc469e5553453640ae8af82a9', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '886671d17bb216cf4ecb3598df7a80ab', '2022-07-15 16:08:52', 2),
('06f9642361d5213c0c5eff9dec960cff', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', '5fc34ed307aac159a30d81181c99847e', '2021-11-19 13:25:23', 1),
('072e0bc89e43e4a49e11fa710405be23', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-11 11:57:29', 1),
('08fb5451691e353b951f78cb11e8f889', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-16 10:11:24', 1),
('1208c42a005c2b38e3a61ef426cbb565', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-08-05 14:44:30', 1),
('154998c5f53662d421c6e40c2d4dbcb9', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '4b6f507f8b814852adf62406ce86a338', '2022-07-18 13:31:10', 1),
('1681aa78ce05ed25719427a3bc4a6b28', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 23:20:22', 1),
('17d9b02dbd0aad6d9e6b28606cd15ef4', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '5fc34ed307aac159a30d81181c99847e', '2021-11-19 13:19:15', 1),
('196a19c6771e4e792c6aa21014bde076', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 23:21:32', 2),
('1a9167c295ee9fe056be312b01fb52d2', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:37:34', 1),
('1d7acc2245d851342967b83774e66b10', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-08 10:59:17', 1),
('2089428e02d6b3a7a0a9d45ae0743638', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 22:04:26', 1),
('29d4967d9168ca223b04d8fb224f135f', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:33:48', 1),
('2b99c625152f37bbd1506ec7c8d52692', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:44:49', 1),
('2ec65bddebb8fa97eb8c297590a3ec20', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-01 22:56:47', 1),
('36308c3bd7a79169988a62286d43bea2', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 21:30:46', 1),
('4268d1930f4dbaa400d87a15863d2e63', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-01 22:57:49', 1),
('45100c4d00befddf84f0c943314a5993', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 21:30:02', 1),
('464946426122b7adae8b410551cd9fed', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 23:17:04', 1),
('46734e92014788e67a39eece65426dfb', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '0a78874550e582afe688001c35d13243', '2022-07-26 16:00:22', 1),
('4c59ce4c5dd9759b3babe5a54bc773ae', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 19:38:18', 1),
('4d0ef2734190f33dfa864e1cb442a863', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-27 12:55:44', 1),
('52c52d7a5f568bf4ea31884444cd44ef', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:47:38', 1),
('5508b719bee2d7ff6a70b7608045b438', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:21:28', 1),
('5706ad92add3996adf210d287b7dcfda', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-15 15:38:55', 1),
('5d3fb07afd8c25ba267ce6a7838335cf', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-27 12:57:02', 1),
('5fdd4e419cbb6dcd528070d01cf7d92f', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:39:47', 1),
('673b978f1550e17c2e8fbf83449730a2', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', '4b6f507f8b814852adf62406ce86a338', '2022-07-18 13:37:23', 1),
('6ac880d954b5f536cb4ec1fc372a46cf', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '8d373a5f49b37b82596aaaadb567e6ff', '2021-11-19 10:40:07', 1),
('6b8fd66b99ab4c67c6f939e4849c0629', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '0a78874550e582afe688001c35d13243', '2022-07-26 15:35:57', 1),
('6bcba0d63f47acfe2e1dbc69ef9bccdb', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-08 11:00:32', 1),
('6c0034ce7ea9d54732dddc8a9737918b', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'be1b4073ff13b72ffc35bb9a2b71bd7d', '2021-11-18 10:42:15', 2),
('6d4888f8c282b53bda56b640581ce6dd', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-26 23:38:26', 1),
('6daa6b58172320726728a48827e4d6ed', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '4b6f507f8b814852adf62406ce86a338', '2022-07-18 12:43:09', 1),
('758bc872e79cb3a4357c52bda20e7574', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '8d373a5f49b37b82596aaaadb567e6ff', '2021-11-19 10:40:25', 1),
('76c5d6e15bdee50058c3ab3243aae751', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-27 12:58:56', 2),
('78346d5598a278d200e0e387a12ff139', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-11 10:45:49', 1),
('79b276889cdb3dce16195dc61099ff10', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 23:20:58', 1),
('80df42192fb9e2d8b829839840ecb5c4', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', '0a78874550e582afe688001c35d13243', '2022-07-26 15:58:58', 1),
('82e4004d8ef30ec258c3f5b7c9b7e932', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 21:26:14', 1),
('885e987079f14f05bfcb794e62492f42', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-26 16:14:41', 1),
('89681ebc00cdbc71e6d7dfad51fbca60', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 21:29:53', 1),
('8fce25e77a052924e1d77c76b18af9d3', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-11 11:55:48', 1),
('9240ac29af04678f27e750378994acb8', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-15 15:47:11', 1),
('95278a01a37e5390cd74a29b067d5bf9', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-15 16:05:56', 1),
('970ef88a30305ffdf862260c3cbd7d89', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:40:16', 1),
('a102dbd95b724f7fed138106cdd10942', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:43:28', 1),
('a12c84bb4335ef2ae1363a20fe1c576c', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 11:09:29', 1),
('a28c478f9176977e87291f1e9f5e58a9', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '5fc34ed307aac159a30d81181c99847e', '2021-11-19 13:19:26', 1),
('a2a71f5499cb28f346883bd4e12e3716', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 21:33:55', 1),
('a5516af7c5bab8b3713965a349238f0e', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 22:12:55', 1),
('a780f3b76b39b7c8977d0084973f33ac', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:48:36', 1),
('ae05c0d548f64f4b4c59b654223d1d64', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:20:44', 1),
('af6283ac14b23fbcd682614c5a8af943', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-15 16:06:55', 1),
('b3735dae51d9ffc92e38b8f69ec2f8da', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:22:55', 1),
('b6306560c70fcd9e5622aed628d76323', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 17:12:10', 1),
('b80d39ff193f91f118e0c7d25ed35440', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 22:54:19', 1),
('b9c9b235c28026fd6037181261c1bae2', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 23:21:48', 2),
('ba358f3fe7a8d46b394a23afe65656ee', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'be1b4073ff13b72ffc35bb9a2b71bd7d', '2021-11-18 11:14:35', 2),
('bae22842cbca90acc43d3d6998d3ff7a', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:22:50', 1),
('baf3bfdca0cc6aa69fe7388fa6314fd9', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 11:09:58', 1),
('c17ec16974dabf5388251e5a604bd689', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-26 23:38:42', 1),
('c2aeb7542a329f1f5b664847ec959d85', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 21:31:11', 1),
('ca41adaa1456a94ceb713122824ce748', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:19:43', 1),
('cb91c102579b86e60e9d92470e7e6b26', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', '0a78874550e582afe688001c35d13243', '2022-07-18 20:25:23', 1),
('cc6894843f1e246e6bd2a15471b23b4d', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'be1b4073ff13b72ffc35bb9a2b71bd7d', '2021-11-18 10:42:00', 2),
('cf3e0ee6c1f201e1241bd0f2d951f4fd', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-15 15:48:25', 2),
('cfa10aa0a5cb9d3fe3353e491767bae3', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '4b6f507f8b814852adf62406ce86a338', '2022-07-18 13:27:24', 1),
('d215b215a9d6c023bf948b8935097007', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '0a78874550e582afe688001c35d13243', '2022-07-26 15:38:24', 1),
('d774fa1cdee327cb201cf4bbda724bad', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-15 15:47:29', 2),
('dbfeac2b8704ce950c5a6b2ff057914f', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '0a78874550e582afe688001c35d13243', '2022-07-26 16:00:32', 1),
('dcadba105c68f4df606267df9078f834', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 22:50:14', 1),
('e1d76c6716715359c37a168a04d5a016', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:38:34', 1),
('e63ee217aef1c2defe9f815f6a870cdb', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-15 16:05:41', 1),
('e6d12175aa2288a81b21e0790f1d2057', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-17 23:34:15', 2),
('e7060515954f3c6bcac93a4b763af167', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:38:44', 1),
('efd327f0fa1c31c39f544d9e37a4ad1a', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '886671d17bb216cf4ecb3598df7a80ab', '2022-07-15 16:08:44', 2),
('f0f46dd6b102c088720f1f4d3fae4591', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 11:10:29', 1),
('f53212119e8f87ccefc68f9f39b25c8a', 'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih', '0a78874550e582afe688001c35d13243', '2022-07-18 20:25:05', 1),
('f64304b4ba27a55e49f3287565e35d76', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-17 21:29:16', 1),
('f9f14d05a44dda20668a6fc48b62420f', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-16 10:10:17', 1),
('fa9e1c76c6f87071bf8d9f2d291b1b8a', 'Transaksi berhasil, silahkan pilih metode pembayaran anda', '0a78874550e582afe688001c35d13243', '2022-07-18 20:24:57', 1),
('fd380a016e809a6185330bf548625806', 'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.', '4b6f507f8b814852adf62406ce86a338', '2022-07-18 13:11:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif_sistem`
--

CREATE TABLE `tb_notif_sistem` (
  `ns_id` varchar(200) NOT NULL,
  `ns_time` datetime NOT NULL DEFAULT current_timestamp(),
  `ns_dari` varchar(200) NOT NULL,
  `ns_perihal` varchar(200) NOT NULL,
  `ns_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notif_sistem`
--

INSERT INTO `tb_notif_sistem` (`ns_id`, `ns_time`, `ns_dari`, `ns_perihal`, `ns_status`) VALUES
('01064f1de9dfcd9d77b14d11beefefd4', '2021-11-19 13:04:25', '5fc34ed307aac159a30d81181c99847e', 'Member baru', 0),
('04825029c4263e89d60f846214c55922', '2022-07-17 23:34:15', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('09530c88efff883004851ebc0ce9f842', '2022-08-05 21:30:39', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('11f88f3f1bdda5af34a3ac459c85909f', '2022-07-18 20:25:15', '0a78874550e582afe688001c35d13243', 'Baru saja mengirimkan bukti pembayaran', 0),
('132f0a6d9f910057244bce6d0645765b', '2022-08-05 13:38:34', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('158acd417dc3aae44728969aa58f18ad', '2022-07-16 10:11:20', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('1c2c9a9a03f65f946aefcb0a2ecd9511', '2022-07-18 20:24:57', '0a78874550e582afe688001c35d13243', 'Baru saja melakukan transaksi', 0),
('1cacfd7f3b954c8b1abdca34dc22a152', '2022-07-16 10:21:05', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('1e045f16ee79c0de3ce3c5ff90319e61', '2022-06-26 23:38:26', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('203b867a9c7fbdfc0f0c42c591294d65', '2022-07-17 23:21:43', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('2baf736e761b19eaaa4b6c232a7e37e3', '2022-07-11 10:45:12', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('2f4988b7d251d7c683bbf7cc038a53e0', '2022-07-17 17:12:10', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('39a640307a4c86b258458f148b66b468', '2022-07-18 13:10:57', '4b6f507f8b814852adf62406ce86a338', 'Baru saja mengirimkan bukti pembayaran', 0),
('3a7a042b18d0d588d12be47a9c967977', '2022-07-08 11:00:32', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('3fc2015c5c2fa6111e4e2123de8e62b1', '2022-06-26 23:39:10', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('40304ed368d894887e6323404be6397b', '2022-07-16 10:19:43', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('40ca2f347088e5f69ad7ca3b741cb305', '2022-07-17 21:26:14', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('424f265fee588084eaf01ec3843b678c', '2022-07-16 10:39:27', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('45bcf84a8e9d736a1f612b9110f61978', '2022-08-05 13:37:30', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('46208d2103cd68d472e030b1311f0c42', '2022-07-16 10:22:50', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('4c393b4c250ca23892ba88885ed4e0c7', '2022-08-05 14:44:17', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('566a3fbecf433b70ca87fdddf971b58b', '2022-07-15 15:47:44', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('602d1305678a8d5fdb372271e980da6a', '2021-11-19 10:40:07', '8d373a5f49b37b82596aaaadb567e6ff', 'Baru saja melakukan transaksi', 1),
('6623bc0841bae6ee41bff44608a093a5', '2022-07-15 15:47:11', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('67bd43a67b70463119c5a7116bd6bed8', '2022-07-16 10:10:17', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('691007aaf107430be25dbb1cc1f70dad', '2022-07-26 16:00:22', '0a78874550e582afe688001c35d13243', 'Baru saja melakukan transaksi', 0),
('69a0a48f90cb6c4bcf79500417610c80', '2022-07-17 23:17:04', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('6aa505276895f5a8b7e593981437cec3', '2022-07-01 22:56:47', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('6ce87352cb3f7049b35819642a99d460', '2022-07-18 13:27:24', '4b6f507f8b814852adf62406ce86a338', 'Baru saja melakukan transaksi', 0),
('6e62f05e6f1dc653c65b2e14e552ff59', '2022-07-11 11:55:48', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('7278daeb866e8089ed5b91d649509afd', '2022-07-17 21:33:49', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('7597d1999f66ed1621ea9e6801f0cb0e', '2022-06-27 12:57:49', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('7a6c57c223ebc56d2f9757528a47fac9', '2022-07-18 13:36:48', '4b6f507f8b814852adf62406ce86a338', 'Baru saja mengirimkan bukti pembayaran', 0),
('855c6ad4969320dac00807fcdc5f85ed', '2022-07-17 23:20:00', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('93ecfd116d0c3b080c29031de3e8b3fa', '2022-07-17 22:12:51', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('9421404fb065f6c3d6515e30586e8e0d', '2022-08-05 11:09:29', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('98cfef025fc88f2a572ddabc239be74f', '2022-07-17 22:04:26', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('991675ef521cb2089cccd6a852f72cac', '2021-11-19 13:19:15', '5fc34ed307aac159a30d81181c99847e', 'Baru saja melakukan transaksi', 0),
('9a57c4b5872ce9a408faaf8110e6b45d', '2022-07-26 16:14:12', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('9b20a760ddaf516a906a876033fc65a3', '2022-08-05 11:10:18', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('9dd165cd05f655e2918338743d5ec11c', '2022-07-17 21:29:53', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('9f3ecd9909e5c4a18b6e1d6c4723e39f', '2022-07-26 15:35:57', '0a78874550e582afe688001c35d13243', 'Baru saja melakukan transaksi', 0),
('a9c3955f15f5c6730a022fd48109eb22', '2022-06-27 12:57:02', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('aabb0fc5f2ef7614c75d7ec3e15dfec1', '2022-07-26 15:51:14', '0a78874550e582afe688001c35d13243', 'Baru saja mengirimkan bukti pembayaran', 0),
('ae7db8072b302b690f58995aa11e0020', '2022-07-15 16:06:07', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('b0c41804b556a60c00fe361d4cae4e1f', '2022-08-05 21:31:11', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('b640f276a6f67ec9f8ca450af031d2c8', '2022-07-16 10:40:16', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('b758d33a611d77c46ebdff577da2182c', '2022-07-11 13:11:16', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('c6e9a2690b8a609b7776609b2ceaea3d', '2022-07-17 21:28:56', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('cfec17b63fcd38e15cb5a96485fabe69', '2022-07-17 22:50:14', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja melakukan transaksi', 0),
('d25049baf22a75489a77fc015d71193a', '2022-07-15 16:05:41', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('d2a9b3b728a520e903df4ed844c0eab6', '2022-07-17 23:20:58', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('e12b06fe3954e3d7a5a466914fb99e2e', '2022-07-15 16:08:44', '886671d17bb216cf4ecb3598df7a80ab', 'Baru saja melakukan transaksi', 0),
('e938714a94228c829be00dd41013aa31', '2022-07-17 22:54:13', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('eac896dc80acfc00929659a736eeb151', '2022-07-18 12:43:09', '4b6f507f8b814852adf62406ce86a338', 'Baru saja melakukan transaksi', 0),
('ecff39da5e90596bcfb18f2474cf0218', '2022-07-01 22:58:57', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Baru saja mengirimkan bukti pembayaran', 0),
('ed9eb0e17f50c86a478c357e7243dac7', '2021-11-19 10:07:42', '8d373a5f49b37b82596aaaadb567e6ff', 'Member baru', 1),
('ef26428e05998b4615393e8f804dd70d', '2022-08-05 13:33:48', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('ef6ab99fa4a5350466729e1706a6232e', '2022-08-05 13:44:46', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0),
('ef7cd9c4e808d55127903f646681c50a', '2021-11-19 13:24:33', '5fc34ed307aac159a30d81181c99847e', 'Baru saja mengirimkan bukti pembayaran', 0),
('ef879bce955abb8eb1b5a28a19a2a02e', '2022-08-05 13:47:38', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja melakukan transaksi', 0),
('f722688d18f714dea77d5ee2d0dbc3c0', '2022-07-17 19:38:05', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Baru saja mengirimkan bukti pembayaran', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `pesan_id` varchar(100) NOT NULL,
  `pesan_nama` varchar(50) NOT NULL,
  `pesan_email` varchar(50) NOT NULL,
  `pesan_tgl` datetime NOT NULL,
  `pesan_subjek` varchar(50) NOT NULL,
  `pesan_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` varchar(200) NOT NULL,
  `produk_url` text NOT NULL,
  `produk_name` varchar(200) NOT NULL,
  `produk_weight` int(11) NOT NULL,
  `produk_tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `produk_stok` int(11) DEFAULT NULL,
  `produk_diskon` int(11) DEFAULT NULL,
  `produk_price_diskon` int(11) NOT NULL,
  `produk_price` int(11) NOT NULL,
  `produk_description` text NOT NULL,
  `produk_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_url`, `produk_name`, `produk_weight`, `produk_tgl`, `produk_stok`, `produk_diskon`, `produk_price_diskon`, `produk_price`, `produk_description`, `produk_image`) VALUES
('0e68da19eba361c70790eeb6a284ffb7', 'camera-kamera-dslr-nikon-d3200-1657820349.html', 'Camera Kamera DSLR Nikon D3200', 3000, '2022-07-15 00:39:09', 5, 0, 2500000, 2500000, '<p>Camera Nikon D3200 Plus Lensa 18-55 mm<br />\r\nkondisi<br />\r\n-lcd no vignet<br />\r\n-lensa no jamur<br />\r\n-fungsi normal semua<br />\r\nkaret kenceng mantaap semua ga ada yg melar.. semua tombol empuk hehehehehe..jaminan mutu<br />\r\nRealpict y gan<br />\r\n<br />\r\nKelengkapan<br />\r\n- Body<br />\r\n- Lensa 18-55<br />\r\n- Baterai<br />\r\n- Charger<br />\r\n- Strap</p>\r\n', '6f9ccab6a9ce8daea33096718a4fabcb.jpg'),
('12248dac5e2c26b1aeb8e265d7086ee8', 'xiaomi-mifa-x5-tws-1657874206.html', 'Xiaomi MiFa X5 TWS', 500, '2022-07-15 15:36:46', 1, 3, 211460, 218000, '<p>Tersedia : Hitam dan Putih<br />\r\ncantumkan warna saaat melakukan pemesanan, jikalau tdk ada cantumkan warna , maka kami akan mengirim secara random<br />\r\n<br />\r\n*PRODUCT PARAMETERS:<br />\r\nDriver?6mm moving coil driver<br />\r\nStructure?in-ear<br />\r\nMagnet type?NdFeB<br />\r\nFrequency response?20Hz~ 20KHz<br />\r\nImpedance?32 &Omega;<br />\r\nMaximum output?5mW<br />\r\nBluetooth version?5.0<br />\r\nBluetooth frequency?2.4-2.48GHZ<br />\r\nBluetooth distance?10 meters<br />\r\nBluetooth protocol?HSP/HFP/A2DP/AVRCP<br />\r\nSupport audio formatsbc?aac<br />\r\nOmni directional microphone<br />\r\nMicrophone sensitivity?-42&plusmn;2dB<br />\r\n<br />\r\n*Packing list:<br />\r\n- Charging box<br />\r\n- Left &amp; right earbud<br />\r\n- S&amp;M&amp;L eartips<br />\r\n- USB charging cable<br />\r\n- User manual<br />\r\n<br />\r\nDESKRIPSI:<br />\r\n<br />\r\n- Connect secara otomatis saat mengeluarkan earbud dari kotak pengisian daya:<br />\r\nKedua earbud akan menyala dan dipasangkan secara otomatis dengan membuka kotak pengisian daya dan mengeluarkannya.<br />\r\n<br />\r\n- Sentuh earbus sedikit untuk bisa digunakan:<br />\r\nSetiap earbud memiliki fungsi kontrol sentuh,<br />\r\nmudah diisi pergi ke lagu berikutnya atau sebelumnya, putar, jeda,<br />\r\njawab dan tolak panggilan dengan menyentuh<br />\r\n<br />\r\n- Mendengarkan musik 6 jam sehari. Setelah diisi penuh, dapat bertahan selama 4 hari:<br />\r\nKotak pengisian daya dengan kontak magnet, masukkan<br />\r\nearbud di kotak pengisian, itu akan mengisi secara otomatis.<br />\r\nSetelah terisi penuh, daya baterai dapat mengisi daya earbud<br />\r\n4 kali.<br />\r\n<br />\r\n- Transmisi cepat, latensi rendah:<br />\r\nDengan solusi Bluetooth 5.0, transmisi nirkabel berkecepatan tinggi, anti-interferensi,<br />\r\nsinyal latensi rendah, definisi tinggi, respons sensitif untuk mendapatkan pengalaman yang luar biasa dalam bermain game</p>\r\n', '4c4733aa169340fd5dfd56aa14946be7.jpg'),
('2daacabf8297ebf209eb9ad56a7c863b', 'nokia-3310-reborn-1657817196.html', 'Nokia 3310 Reborn', 300, '2022-07-14 23:46:36', 6, 10, 450000, 500000, '<p>Kelengkapan<br />\r\n-Hp<br />\r\n-Charger<br />\r\n-Baterai<br />\r\n<br />\r\nNormal No Minus<br />\r\n<br />\r\nSpesifikasi Nokia 3310<br />\r\nKapasitas Baterai1000mAh<br />\r\nStandby260h<br />\r\nFITUR<br />\r\nFM Radio Ya<br />\r\nGPS Tidak<br />\r\nLampu Senter Tidak<br />\r\nKAMERA<br />\r\nBuilt-in Kamera Tidak<br />\r\nFlash Tidak<br />\r\nDESAIN<br />\r\nDimensi (W x H x D)113 x 48 x 22mm<br />\r\nBerat 133g<br />\r\nBody Material Tidak Diketahui<br />\r\nJARINGAN<br />\r\nSIM Card Mini-SIM<br />\r\nPORTS &amp; INTERFACES<br />\r\nUSB Tidak<br />\r\n3.5mm Jack Tidak</p>\r\n', 'a05197ea8885e9982e24c6e20fa891ee.jpg'),
('48bde8eb0b4aece12fead57ec827c659', 'apple-iphone-12-128gb-purple-1657819888.html', 'APPLE IPHONE 12 128GB Purple', 1000, '2022-07-15 00:31:28', 50, 15, 10496650, 12349000, '<p>APPLE IPHONE 12 128GB PURPLE GRS RESMI IBOX INDONESIA<br />\r\n<br />\r\nNOTE : APPLE IPHONE 12 PRODUKSI YANG TERBARU (NEW PACKING) SUDAH TIDAK MENDAPAT KEPALA CHARGER DAN HEADSET.<br />\r\n<br />\r\n100 % ORIGINAL BARU DAN SEGEL GREENPEEL (ASLI APPLE)<br />\r\nIMEI TERDAFTAR RESMI DI KEMENPERIN<br />\r\n<br />\r\nSILAHKAN TANYA STOCK WARNA YANG READY SEBELUM ORDER !!! SEMUA PESANAN MASUK LANGSUNG DIPROSES DAN DIPACKING AMAN MENGGUNAKAN BUBBLE WRAP FREE, THX<br />\r\n<br />\r\nBODY<br />\r\nDimensions 146.7 x 71.5 x 7.4 mm (5.78 x 2.81 x 0.29 in)<br />\r\nWeight 164 g (5.78 oz)<br />\r\nBuild Glass front (Gorilla Glass), glass back (Gorilla Glass), aluminum frame<br />\r\nSIM Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China<br />\r\nIP68 dust/water resistant (up to 6m for 30 mins)<br />\r\nApple Pay (Visa, MasterCard, AMEX certified)<br />\r\nDISPLAY<br />\r\nType Super Retina XDR OLED, HDR10, 625 nits (typ), 1200 nits (peak)<br />\r\nSize 6.1 inches, 90.2 cm2 (~86.0% screen-to-body ratio)<br />\r\nResolution 1170 x 2532 pixels, 19.5:9 ratio (~460 ppi density)<br />\r\nProtection Scratch-resistant ceramic glass, oleophobic coating<br />\r\nDolby Vision<br />\r\nWide color gamut<br />\r\nTrue-tone<br />\r\nPLATFORM<br />\r\nOS iOS 14.1, upgradable to iOS 14.2<br />\r\nChipset Apple A14 Bionic (5 nm)<br />\r\nCPU Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)<br />\r\nGPU Apple GPU (4-core graphics)<br />\r\nMEMORY<br />\r\nCard slot No<br />\r\nInternal 128GB 4GB RAM<br />\r\nNVMe<br />\r\nMAIN CAMERA<br />\r\nDual 12 MP, f/1.6, 26mm (wide), 1.4&micro;m, dual pixel PDAF, OIS<br />\r\n&nbsp;</p>\r\n', '4cb79a9b366646b9184e1ec4006fcdd6.jpg'),
('73ebd1b68aaf38831dc5f9241f2c1074', 'monitor-led-gaming-asus-rog-strix-xg258-xg258q-25-1658205062.html', 'Monitor LED Gaming Asus ROG Strix XG258 XG258Q 25', 12000, '2022-07-19 11:31:02', 15, 0, 6300000, 6300000, '<p>Brand Type : XG258Q<br />\r\nPanel Size(Inch) : 25&quot; ( 24.5&quot; )<br />\r\nPanel Type : TN<br />\r\nPanel Resolution : 1920x1080<br />\r\nAspect Ratio : 16 : 9<br />\r\n<br />\r\nBrightness (cd/?) : 400<br />\r\nRefresh Rate(hz) : 240<br />\r\nResponse Time (ms) : 1<br />\r\nSync : G-Sync compatible<br />\r\nFree Sync Technology<br />\r\n<br />\r\nConnectivity : HDMI + Display Port<br />\r\nAudio port : Audio Out 1 x 3.5mm<br />\r\nBuild in Speaker : No<br />\r\nVESA mounting (mm) : 100x100<br />\r\nErgonomic Stand : Yes<br />\r\nUSB Ports : -<br />\r\n<br />\r\nPanel bit : 8 bits (6 bits + FRC)<br />\r\nHDR : -<br />\r\nNTSC (%) : 72<br />\r\nSRGB (%) : -<br />\r\nAdobe RGB : -<br />\r\nDCI-P3 (%) : -<br />\r\n<br />\r\nPower Cons (watt) : 30 (AVERAGE)<br />\r\nProduct Weight (nw/kg) : 3<br />\r\nBox Dimension (cm) : 66 x 44 x 24<br />\r\nVolume Weight (kg) : 12<br />\r\n<br />\r\nInclude :<br />\r\nHDMI Cable<br />\r\nPower Cable<br />\r\nDisplay Port Cable</p>\r\n', 'd51c5ed5b1781b65f36922507366f588.jpg'),
('76dbd0f898054ae8630aa64bf6ba8bfe', 'apple-watch-series-3-1658238229.html', 'Apple Watch Series 3', 1000, '2022-07-19 20:43:49', 10, 0, 3114000, 3114000, '<p>Stok Ready<br />\r\n<br />\r\nOriginal 100%<br />\r\n<br />\r\n* BNIB<br />\r\n* Garansi Apple International 1 tahun<br />\r\n* Garansi Toko 2x24 jam (wajib menyertakan video unboxing)<br />\r\n* Garansi International 1 Tahun (bisa kami bantu claim)<br />\r\n<br />\r\nCompatible with iOS 14/ iPhone 6s above<br />\r\n<br />\r\nIn The Box:<br />\r\nMagnetic Cable<br />\r\nExtra Strap *Series 3 keluaran terakhir sudah tidak mendapatkan kepala charger/ adaptor*<br />\r\n<br />\r\nPengiriman Ekspedisi, maksimal order jam 16.50 dan Pengiriman Instant, maksimal order jam 14.00 dikirim pada hari yang sama</p>\r\n', '7b37db2a34ef75d1164f884678d73c66.jpg'),
('7c2094fa92578439322574ae4d0e6423', 'xiaomi-mi-10t-8128gb-1657816877.html', 'XIAOMI MI 10T 8/128GB', 500, '2022-07-14 23:41:17', 40, 0, 5999000, 5999000, '<p>Xiaomi Official Store Garansi Resmi, IMEI Resmi<br />\r\n<br />\r\nXiaomi Mi 10T merupakan flagship 5G tingkat berikutnya dilengkapi dengan 64MP triple kamera AI, 144Hz tampilan AdaptiveSync dengan TrueColor, prosesor Qualcomm&reg; Snapdragon&trade; 865 dengan 5G<br />\r\n<br />\r\nXiaomi Mi 10T dilengkapi dengan kamera utama 64MP, memiliki kamera ultra-wide angle FoV hingga 123&deg;. Dengan kamera flagship 108MP ultra jenih menghasilkan karya foto menakjubkan<br />\r\n<br />\r\nXiaomi Mi 10T memiliki tampilan ultra lancar, menampilkan layar flagship dengan standar yang lebih tinggi. Menampilkan frame rate layar tertinggi Xiaomi sejauh ini dengan frame rate layar ultra-tin<br />\r\n<br />\r\nXiaomi Mi 10T memiliki layar 6.67&rdquo; FHD+ Dot Display tampilan detail dan jelas, sejelas dunia nyata.<br />\r\n<br />\r\nXiaomi Mi 10T menggunakan prosesor yang kuat dan cepat yaitu Qualcomm&reg; Snapdragon&trade; 865 dengan 5G, chipset 5G terbaik tahun 2020.<br />\r\n<br />\r\nXiaomi Mi 10T memiliki baterai berkapasitas besar 5000mAh, lebih stabil dan efisien serta dapat melakukan pengisian daya cepat 33W. Menggabungkan teknologi MMT yang inovatif dan teknologi Mi Fast Charge. Mengisi daya 100% hanya dalam 59 menit.<br />\r\n<br />\r\nSpesifikasi:<br />\r\n<br />\r\nDimensi: Tinggi: 165.1mm | Lebar: 76.4mm | Tebal: 9.33mm<br />\r\nBerat: 216g<br />\r\nProsesor: Qualcomm&reg; Snapdragon&trade; 865 dengan 5G | CPU Octa-core, hingga 2,84 GHz<br />\r\nPenyimpanan &amp; RAM: 6GB + 128 GB | 8GB + 128GB<br />\r\nKamera Belakang: 64MP + 13MP + 5MP, 64MP + 13MP + 5MP,<br />\r\nResolusi: 2400 x 1080 FHD +<br />\r\nBaterai dan Pengisian: 5000mAh (typ) * / 4900mAh | 33W kabel pengisian cepat<br />\r\nJaringan dan Konektivitas: Dual kartu nano-SIM | Mendukung 5G / 4G + / 4G / 3G / 2G<br />\r\nNFC: Multifunctional NFC<br />\r\nKeamanan: Sensor sidik jari, AI face lock<br />\r\nAudio: MP3, FLAC, APE, AAC, OGG , WAV, WMA, AMR, AWB<br />\r\nVideo: MP4 ? M4V ? MKV ? AVI ? WMV ? WEBM ? 3GP ? 3G2 ? ASF<br />\r\nSensor: Proximity sensor | Ambient light sensor | Accelerometer | Gyro<br />\r\n<br />\r\nIsi Paket Pembelian:<br />\r\n<br />\r\nMi 10T<br />\r\nAdaptor daya<br />\r\nKabel USB-C<br />\r\nAlat pelepas SIM<br />\r\nPanduan pengguna<br />\r\nKartu garansi<br />\r\nCasing anti bakteri ion perak<br />\r\nPelindung layar anti bakteri</p>\r\n', 'dcbf9b55995bde592d510e3468af4045.jpg'),
('80941f31ffef45399ca9aeff79fe7755', 'hp-pavilion-gaming-ec2010ax-1657818626.html', 'HP Pavilion Gaming EC2010AX', 8000, '2022-07-15 00:10:26', 20, 0, 13199000, 13199000, '<p>Prosesor<br />\r\nAMD Ryzen&trade; 5 5600H (up to 4.2 GHz max boost clock, 16 MB L3 cache, 6 cores, 12 threads)<br />\r\n<br />\r\nChipset<br />\r\nAMD Integrated SoC<br />\r\n<br />\r\nMemory<br />\r\n16 GB DDR4-3200 MHz RAM (2 x 8 GB)<br />\r\n<br />\r\nMemory Slots<br />\r\n2 SODIMM memory slots<br />\r\n<br />\r\nMemory Note<br />\r\nTransfer rates up to 3200 MT/s.<br />\r\n<br />\r\nInternal Storage<br />\r\n512 GB PCIe&reg; NVMe&trade; M.2 SSD<br />\r\n<br />\r\nOptical Drive<br />\r\nOptical drive not included<br />\r\n<br />\r\nDisplay<br />\r\n15.6&quot; diagonal, FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC<br />\r\n<br />\r\nGraphics<br />\r\nNVIDIA&reg; GeForce RTX&trade; 3050 Laptop GPU (4 GB GDDR6 dedicated)<br />\r\n<br />\r\nPorts<br />\r\n1 SuperSpeed USB Type-C&reg; 5Gbps signaling rate<br />\r\n1 SuperSpeed USB Type-A 5Gbps signaling rate<br />\r\n1 USB 2.0 Type-A (HP Sleep and Charge)<br />\r\n1 HDMI 2.0<br />\r\n1 RJ-45<br />\r\n1 AC smart pin<br />\r\n1 headphone/microphone combo<br />\r\n<br />\r\nExpansion Slots<br />\r\n1 multi-format SD media card reader<br />\r\n<br />\r\nAudio Features<br />\r\nAudio by B&amp;O; Dual speakers; HP Audio Boost<br />\r\n<br />\r\nWebcam<br />\r\nHP True Vision 720p HD camera with integrated dual array digital microphones<br />\r\n<br />\r\nKeyboard<br />\r\nFull-size, acid green backlit, shadow black keyboard with numeric keypad<br />\r\n<br />\r\nWireless<br />\r\nRealtek Wi-Fi CERTIFIED 6&trade; (2x2) and Bluetooth&reg; 5.2 combo (Supporting Gigabit data rate)<br />\r\n<br />\r\nPackage Dimensions (W X D X H)<br />\r\n6.9 x 52 x 30.5 cm<br />\r\n<br />\r\nBerat<br />\r\nStarting at 1.98 kg<br />\r\n<br />\r\nOperating System<br />\r\nWindows 11 Home Single Language 64<br />\r\n<br />\r\n=======================================================================<br />\r\n<br />\r\n- Free Office Home Student LIFETIME<br />\r\n- Garansi Resmi HP 2 Tahun + ADP<br />\r\n- Garansi Toko 3 Hari*<br />\r\n<br />\r\nFREE BUBBLEWRAP<br />\r\n<br />\r\n*S&amp;K Berlaku, harap cek Catatan Toko</p>\r\n', '836dbc0433c812bd4d8ebd03585d9715.jpg'),
('80f41935fac2483f5c932ae58902cf95', 'lenovo-ideapad-gaming-3-1657873994.html', 'LENOVO IDEAPAD GAMING 3', 4000, '2022-07-15 15:33:14', 20, 0, 10000000, 9550000, '<p>Processor : Intel Core i5-11300H<br />\r\nRAM : 8GB SO-DIMM DDR4-3200<br />\r\nHDD / SSD : 512GB SSD M.2 2242 PCIe 3.0x4 NVMe<br />\r\nDisplay : 15.6&quot; FHD IPS 300nits Anti-glare, 165Hz, 100% sRGB, DC dimmer<br />\r\nGraphic Card : NVIDIA GeForce RTX 3050 4GB GDDR6<br />\r\nOS : Windows 10 PRO 64, + OHS 2019<br />\r\nWarranty : 1 Year Local Official Distributor Warranty<br />\r\nBarang Di Jamin Baru Dan Mulus Dan Original 100%<br />\r\n&nbsp;</p>\r\n', '335744dcbe442b30a7ad2b15b09ab8ab.jpg'),
('b0f6fbbd8082b5f95f04191d2bbbc5f5', 'samsung-protective-cover-for-galaxy-s20-plus-black-1657813899.html', 'Samsung Protective Cover For Galaxy S20 Plus - Black', 500, '2022-07-14 22:51:39', 5, 0, 159000, 159000, '<p><strong>Original Samsung 100%</strong><br />\r\n<br />\r\nMilitary-grade protection<br />\r\nBuilt in Kickstand<br />\r\nMaterial : Polycarbonate dan thermoplastic<br />\r\n<br />\r\nSamsung Protective Standing Sangat aman dari benturan dan goresan dengan penutup yang sangat protektif. Sudah drop test dan menawarkan pertahanan yang kokoh dari kerusakan sambil tetap memberi Anda tampilan Infinity Display yang luar biasa.<br />\r\n<br />\r\nMilitary-grade protection<br />\r\nYakinlah bahwa Galaxy S20+ Anda yang baru sepenuhnya dipertahankan terhadap tetes dan jatuh. Protective Standing Cover telah diuji coba dan mendapatkan peringkat kelas militer. Lindungi telepon Anda terhadap tetes dan guncangan dengan Cover Perlindungan Diri - disertifikasi dengan perlindungan MIL-STD 810G *. Sekarang Anda bisa membawa ponsel Anda ke semua petualangan Anda dengan tenang.<br />\r\n<br />\r\nWatch in Comfort<br />\r\nDesainnya menawarkan perlindungan heavy-duty sambil tetap membiarkan Anda melihat keseluruhan Infinity Display. Dan kickstand built-in mengangkat telepon Anda pada sudut pandang optimal untuk film atau video. Saksikan video favorit Anda di sudut yang nyaman dengan built-in kickstand.</p>\r\n', '26a15bc2dda9c2957b923d384259c256.jpg'),
('c8ce8a37c6f66962cc4fc9277766a9d1', 'sony-wh-1000xm4-1657875112.html', 'Sony WH 1000XM4', 1200, '2022-07-15 15:51:52', 5, 4, 3699000, 3500000, '<p>Fitur Umum:<br />\r\nJenis Headphone Dinamis, tertutup<br />\r\nUnit Driver 40 mm, tipe dome (koil CCAW Voice)<br />\r\nMagnet Neodymium<br />\r\nDiafragma LCP berlapis aluminum<br />\r\nRespons Frekuensi: 4Hz-40.000Hz<br />\r\nTipe Kabel: Satu sisi (dapat dilepas)<br />\r\nKabel headphone (sekitar 1,2m, untaian OFC, konektor mini stereo berlapis emas)<br />\r\nKonektor mini stereo berbentuk L, berlapis emas<br />\r\nNFC:Ya<br />\r\nDSEE EXTREME: Ya<br />\r\nOperasi Pasif: Ya<br />\r\nWaktu Pengisian Daya Baterai: Sekitar 3 Jam (Terisi penuh)<br />\r\nMetode Pengisian Daya Baterai: USB<br />\r\nMASA PAKAI BATERAI (WAKTU TUNGGU): Maks. 30 jam(NC ON), Maks. 200 jam(NC OFF)<br />\r\n<br />\r\nBluetooth Versi 5.0<br />\r\nRENTANG EFEKTIF:Batas pandangan sekitar 30 ft (10 m)<br />\r\nPROFIL:A2DP, AVRCP, HFP, HSP<br />\r\nFORMAT AUDIO YANG DIDUKUNG: SBC, AAC, LDAC<br />\r\nPERLINDUNGAN KONTEN YANG DIDUKUNG:SCMS-T<br />\r\nKontrol Volume:Sensor Sentuh<br />\r\nINPUT:Jack Mini Stereo<br />\r\n<br />\r\nYang ada dalam kotak :<br />\r\n-1 Unit WH-1000XM4 , Pilihan warna :<br />\r\nBlack (Hitam)<br />\r\nPlatinum Silver (Silver)<br />\r\nMidNight Blue (Navy/Biru tua)<br />\r\nSilent White (Putih) kosong<br />\r\n<br />\r\n-Carrying Case<br />\r\n-Adaptor Steker untuk Penggunaan di Pesawat<br />\r\n-Kabel Headphone (sekitar 1,2m)<br />\r\n-Kabel USB: Type-CTM (sekitar 20 cm)<br />\r\n-Petunjuk Pemakaian<br />\r\n&nbsp;</p>\r\n', '533a358eb3722cccd5d2e11a7ca7e501.jpg'),
('ddd2408d2649077fc0c4d68dbc0c1bf3', 'oppo-a15s-ram-464gb-biru-1657815941.html', 'OPPO A15S RAM 4/64GB - Biru', 500, '2022-07-14 23:25:41', 50, 0, 2099000, 2099000, '<p>OPPO A15S 4GB/64GB Spesification<br />\r\n<br />\r\nDimensions/Weight<br />\r\nHeight: 164.0 mm<br />\r\nWidth: 75.4 mm<br />\r\nThickness: 7.9 mm<br />\r\nWeight: Approximately 175 g (With Battery)<br />\r\n<br />\r\nBasic Parameters<br />\r\nColor: Dynamic Black, Mystery Blue<br />\r\nOperating System: ColorOS 7.2 based on Android 10<br />\r\nCPU: MediaTek Helio P35<br />\r\nCPU Frequency: 4*1.8GHz+4*2.3GHz<br />\r\nGPU: IMG GE8320@680 MHz 10.2 fps<br />\r\nBattery: 4100/4230mAh (Min/Typ)<br />\r\nRAM: 4GB<br />\r\nStorage: 64GB<br />\r\nExternal Memory: Supported 256GB<br />\r\nOTG: Supported<br />\r\nFingerprint: Rear fingerprint<br />\r\nFace Recognition: Yes<br />\r\n<br />\r\nDisplay<br />\r\nSize: 16.55 cm (6.52&#39;&#39;)<br />\r\nTouchscreen: Multi-touch, Capacitive Screen<br />\r\nResolution: 1600 x 720 pixels (HD+)<br />\r\nColors: 16 million colors<br />\r\nScreen Ratio: 88.7%<br />\r\nRefresh Rate: 60Hz<br />\r\nGlass type of touch panel : Corning Gorilla Glass 3<br />\r\nNo stroboscopic eye protection: Supported<br />\r\nSplit screen: Supported<br />\r\nPicture in picture: Supported<br />\r\n<br />\r\nCamera<br />\r\nFront Sensor: 5MP Waterdrop notch<br />\r\nFlash: Screen lighting supplementary<br />\r\n<br />\r\nRear Camera: 13MP Main Camera + 2MP Mono + 2MP Macro<br />\r\nZoom: 5x Digital Zoom<br />\r\nFlash: Single color temperature<br />\r\n<br />\r\nVideo format: MP4<br />\r\n<br />\r\nAperture:<br />\r\nFront: f/2.4<br />\r\nRear: f/2.2 + f/2.4<br />\r\n<br />\r\nMode:<br />\r\nPhoto, video, professional mode, panorama, portrait, time-lapse photography, AR stickers<br />\r\n<br />\r\n<br />\r\nIn The Box<br />\r\n<br />\r\nOPPO A15S*1<br />\r\nAdapter*1<br />\r\nMicro USB Cable*1<br />\r\nImportant Info. Booklet with Warranty Card *1<br />\r\nQuick Start Guide *1<br />\r\nSIM Card Tool *1<br />\r\nCase *1</p>\r\n', '69c0d207ff34df043a1777f499208f11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `profil_id` int(11) NOT NULL,
  `profil_nama` varchar(50) NOT NULL,
  `profil_email` varchar(80) NOT NULL,
  `profil_telp` varchar(14) NOT NULL,
  `profil_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`profil_id`, `profil_nama`, `profil_email`, `profil_telp`, `profil_alamat`) VALUES
(1, 'Dazzle Store', 'info@dazzlestore.com', '081296278960', 'Gramapuri Taman Sari Cibitung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promo`
--

CREATE TABLE `tb_promo` (
  `promo_id` varchar(200) NOT NULL,
  `promo_kode` varchar(200) NOT NULL,
  `promo_masa` date NOT NULL,
  `promo_judul` varchar(200) NOT NULL,
  `promo_persen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_promo`
--

INSERT INTO `tb_promo` (`promo_id`, `promo_kode`, `promo_masa`, `promo_judul`, `promo_persen`) VALUES
('fbfe09ef251ad45dc509c7b26134e0f3', 'JUL22', '2022-07-31', 'Juli Ceria', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_reviews`
--

CREATE TABLE `tb_reviews` (
  `re_id` varchar(200) NOT NULL,
  `re_userid` varchar(200) NOT NULL,
  `re_produkid` varchar(200) NOT NULL,
  `re_time` datetime NOT NULL DEFAULT current_timestamp(),
  `re_bintang` int(11) NOT NULL,
  `re_isi` varchar(200) NOT NULL,
  `re_transaksi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reviews`
--

INSERT INTO `tb_reviews` (`re_id`, `re_userid`, `re_produkid`, `re_time`, `re_bintang`, `re_isi`, `re_transaksi`) VALUES
('079b672955a3731a81c90cc51e9e203d', 'f3c3ea6cf1eae68973e0f7da84d822ae', '80f41935fac2483f5c932ae58902cf95', '2022-07-15 16:06:23', 5, 'Laptopnya kenceng, sesuai yang diharapkan', '5f19b99dc87124a9675b9659ee696c45'),
('45111c919135d44f9cf3861e0373dd69', 'cbdc5cfe98aa9497feb6d3c399b76954', '12248dac5e2c26b1aeb8e265d7086ee8', '2022-07-15 15:48:15', 5, 'Nyaman dipakai, suaranya merdu', 'a7aa7a192c5a2ced74d0bfabb6a466c2'),
('7ce214d04573ee3be3e2089c863bdebe', '4b6f507f8b814852adf62406ce86a338', '2daacabf8297ebf209eb9ad56a7c863b', '2022-07-18 13:39:20', 4, 'Keren HPnya Jadul Banget', '6052891f3697526b60ad72d465aaaff9'),
('8769c53b16f0688f5bd4cc4d58bb6e4a', 'cbdc5cfe98aa9497feb6d3c399b76954', '2daacabf8297ebf209eb9ad56a7c863b', '2022-07-16 10:45:09', 5, 'Handphonenya gaming banget gesya', 'd0d01edf520c7a3e0666d6cd77dc90d7'),
('ec407a17ba256657fc2c7a844c2e4fd4', 'f3c3ea6cf1eae68973e0f7da84d822ae', '12248dac5e2c26b1aeb8e265d7086ee8', '2022-07-15 16:06:44', 4, 'Boxnya agak penyok', '5f19b99dc87124a9675b9659ee696c45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rkategori`
--

CREATE TABLE `tb_rkategori` (
  `id_item` varchar(200) NOT NULL,
  `id_kategori_r` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rkategori`
--

INSERT INTO `tb_rkategori` (`id_item`, `id_kategori_r`) VALUES
('b0f6fbbd8082b5f95f04191d2bbbc5f5', 103690157),
('ddd2408d2649077fc0c4d68dbc0c1bf3', 1868507850),
('2daacabf8297ebf209eb9ad56a7c863b', 871107957),
('80941f31ffef45399ca9aeff79fe7755', 368153154),
('48bde8eb0b4aece12fead57ec827c659', 1522095227),
('7c2094fa92578439322574ae4d0e6423', 116740125),
('0e68da19eba361c70790eeb6a284ffb7', 1930411826),
('12248dac5e2c26b1aeb8e265d7086ee8', 116740125),
('c8ce8a37c6f66962cc4fc9277766a9d1', 1627401156),
('80f41935fac2483f5c932ae58902cf95', 442692375),
('73ebd1b68aaf38831dc5f9241f2c1074', 2003473233),
('76dbd0f898054ae8630aa64bf6ba8bfe', 1522095227);

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_text_1` varchar(30) NOT NULL,
  `slider_text_2` varchar(30) NOT NULL,
  `slider_text_3` varchar(30) NOT NULL,
  `slider_urutan` int(11) NOT NULL,
  `slider_gambar` varchar(200) NOT NULL,
  `slider_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`slider_id`, `slider_text_1`, `slider_text_2`, `slider_text_3`, `slider_urutan`, `slider_gambar`, `slider_link`) VALUES
(1, '7% Off', 'July Collection', 'Best Product And Collections', 1, '380b702a1923675d189e74402c25c2b1.jpg', '/dazzlestore/blog/promo-juli-2022-daftar-di-planet-gadgets-pasti-dapat-diskon-7-1658221172.html'),
(2, '2% Off', 'Kategori Pria', 'Celana Panjang Jeans Pria', 4, 'cba5467f544e7e91672cf344241ba53a.jpg', '#'),
(3, '5% Off', 'Agustus Ceria', 'Semua Kategori', 2, 'c6b2a07b54a6cd5e9b3c04280fae2a78.jpg', '/dazzlestore/blog/promo-agustus-2022-daftar-di-planet-gadgets-pasti-dapat-diskon-5-1658221163.html'),
(4, 'YUK SKRIPSI', 'PASTI KELAR', 'BISA YOK BISA!!', 3, 'c15af559f71eaa5ec3b89f9263f71245.jpg', '/dazzlestore/p/c8ce8a37c6f66962cc4fc9277766a9d1/sony/sony-wh-1000xm4-1657875112.html');

-- --------------------------------------------------------

--
-- Table structure for table `tb_token`
--

CREATE TABLE `tb_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` text NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_token`
--

INSERT INTO `tb_token` (`id`, `email`, `token`, `created`) VALUES
(1, 'teguhardama75@gmail.com', 'ERz2dLTdt7SsMsVgifMm1kzdc48ZbUx4sYn7zIvEstU=', 1656260917),
(2, 'shafiradenza22@gmail.com', 'd5KGyY9w+ZBztH09w+a28gY0fOPmt6Ca39TBeca5g/o=', 1656260991),
(3, 'teguhardama75@gmail.com', 'Glv4bb3k9JAo5ygwnxOuoyWegV13LuvUXIGhcap+w8A=', 1657875697),
(4, 'teguhardama75@gmail.com', '3VHVU1fgxjI0rBCBRnJFrJMHYG69SFdBo1P1QqmpR7c=', 1657875849),
(5, 'teguhardama74@gmail.com', '9iNughoyBbMW6g/gELeMRTTrb/ZGKLhVaZCZ4Qa1CxM=', 1657876065),
(6, 'dazzle@gmail.com', 'ZkmTrt3jD+YVIqXObganYxcndODaoRxnfZ/5J/r3STY=', 1658075800),
(7, 'udinsedunia@gmail.com', 'kwh53XwnaXeadDKGB1ELT9xxa9b+pNtJCGgi7nw3G/A=', 1658126506);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` varchar(200) NOT NULL,
  `transaksi_userid` varchar(200) NOT NULL,
  `transaksi_penerima` varchar(200) NOT NULL,
  `transaksi_telp` varchar(15) DEFAULT NULL,
  `transaksi_total` int(11) NOT NULL,
  `transaksi_tujuan` varchar(255) NOT NULL,
  `transaksi_pos` int(5) NOT NULL,
  `transaksi_prov` varchar(80) NOT NULL,
  `transaksi_kota` varchar(25) NOT NULL,
  `transaksi_kurir` varchar(5) NOT NULL,
  `transaksi_service` varchar(50) NOT NULL,
  `transaksi_tgl_pesan` date NOT NULL,
  `transaksi_bts_bayar` date NOT NULL,
  `transaksi_status` enum('belum','diproses','dibayar') NOT NULL,
  `transaksi_note` text NOT NULL,
  `transaksi_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaksi_tgl` date NOT NULL,
  `transaksi_urut` int(11) NOT NULL,
  `transaksi_kode` varchar(200) NOT NULL,
  `transaksi_ongkir` int(11) NOT NULL,
  `transaksi_bukti` varchar(200) DEFAULT NULL,
  `transaksi_kode_promo` varchar(200) DEFAULT NULL,
  `transaksi_persen_promo` int(11) DEFAULT NULL,
  `transaksi_total_potongan` int(11) DEFAULT NULL,
  `transaksi_resi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_userid`, `transaksi_penerima`, `transaksi_telp`, `transaksi_total`, `transaksi_tujuan`, `transaksi_pos`, `transaksi_prov`, `transaksi_kota`, `transaksi_kurir`, `transaksi_service`, `transaksi_tgl_pesan`, `transaksi_bts_bayar`, `transaksi_status`, `transaksi_note`, `transaksi_time`, `transaksi_tgl`, `transaksi_urut`, `transaksi_kode`, `transaksi_ongkir`, `transaksi_bukti`, `transaksi_kode_promo`, `transaksi_persen_promo`, `transaksi_total_potongan`, `transaksi_resi`) VALUES
('099809a1000b4614b840bf3bcc76e796', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278960', 483500, 'Perumahan Regensi 2 Bekasi', 17520, 'Kalimantan Utara', 'Bulungan (Bulongan)', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-17', '2022-07-20', 'dibayar', '', '2022-07-17 16:17:04', '2022-07-17', 13, '2022070013', 65000, '1996e62697a093d14b39d0b80eaaa542.png', 'JUL22', 7, 31500, NULL),
('2f9dca1f09371d6177cfe9d45c7ee040', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278960', 169000, 'Perumahan Regensi 2 Bekasi', 17520, 'Banten', 'Cilegon', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-17', '2022-07-20', 'dibayar', '', '2022-07-17 14:29:53', '2022-07-17', 10, '2022070010', 10000, '9cb5a02481179309fe0cd31bedbe7d32.jpg', NULL, NULL, NULL, NULL),
('4fa222ef3753e1a01e98b0a1f522383a', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 223460, 'Regensi 2 Bekasi', 17520, 'Banten', 'Lebak', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-07-16', '2022-07-19', 'dibayar', '', '2022-07-16 03:10:17', '2022-07-16', 4, '2022070004', 12000, 'b33e99b77c8c63cb0b84c0ab76f0cbc6.jpg', NULL, NULL, NULL, ''),
('507fff6954f9eb4f2aacb2bb9229e79c', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 15387090, 'Perumahan Regensi 2 Bekasi', 17520, 'Jawa Barat', 'Bandung', 'jne', 'YES(Yakin Esok Sampai)', '2022-08-05', '2022-08-08', 'dibayar', '', '2022-08-05 06:47:38', '2022-08-05', 24, '2022080024', 216000, '77af22481b4b18d44b1282ceec01d875.PNG', 'JUL22', 7, 1141910, NULL),
('583f5c5e4c58e685ab28afc1ab04b862', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 6552000, 'sdfg', 12345, 'Bali', 'Badung', 'pos', 'Pos Ekonomi(Pos Ekonomi)', '2022-08-05', '2022-08-08', 'dibayar', 'fgjfgfgj', '2022-08-05 04:09:29', '2022-08-05', 21, '2022080021', 252000, 'f1a17fb1a21e7126a7a680fa8f5dd488.JPG', NULL, NULL, NULL, NULL),
('5f19b99dc87124a9675b9659ee696c45', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 10261460, 'Regensi 2 Bekasi', 17520, 'Jawa Barat', 'Bandung', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-07-15', '2022-07-18', 'diproses', 'Double Wrapping', '2022-07-15 09:05:41', '2022-07-15', 2, '2022070002', 50000, 'a46f2e30a4d3cad0359ee27b25554e99.jpg', NULL, NULL, NULL, ''),
('6052891f3697526b60ad72d465aaaff9', '4b6f507f8b814852adf62406ce86a338', 'Dazzle', '081296278960', 460500, 'Perumahan Regensi 2 Bekasi', 17520, 'Bengkulu', 'Bengkulu Selatan', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-18', '2022-07-21', 'diproses', '', '2022-07-18 06:27:24', '2022-07-18', 17, '2022070017', 42000, 'eae66bba003117ef497c94a9a6f42a04.jpg', 'JUL22', 7, 31500, 'JNAP-0061460333'),
('835e11effec678091b3f3d19ca36db16', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 29098500, 'Perumahan Regensi 2 Bekasi', 17520, 'Gorontalo', 'Boalemo', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-07-17', '2022-07-20', 'dibayar', 'Tolong dibuat tambahan bubble wrap', '2022-07-17 10:12:10', '2022-07-17', 8, '2022070008', 780000, '51414884a17b420b4913200b21cc85e7.jpg', 'JUL22', 7, 2131500, 'ASD1125'),
('878810532220944c0ab19347439f39cd', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278961', 3715000, 'Gramapuri Taman Sari', 17520, 'Jawa Tengah', 'Cilacap', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-16', '2022-07-19', 'dibayar', '', '2022-07-16 03:19:43', '2022-07-16', 5, '2022070005', 16000, 'd5086e6623fb3b31f74ec9e39153728a.jpg', NULL, NULL, NULL, ''),
('87f3f3ea70a955c2b97c25f71e704f85', '0a78874550e582afe688001c35d13243', 'Udin', '081246723478', 10120000, 'Perumahan Regensi 2 Bekasi', 17520, 'Bangka Belitung', 'Bangka', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-26', '2022-07-29', 'diproses', '', '2022-07-26 08:35:57', '2022-07-26', 19, '2022070019', 120000, 'ca1cf87cb1bdce2327d44cd0cf46d519.PNG', NULL, NULL, NULL, NULL),
('8bd402d448ec573c227d8be258d53a9e', '4b6f507f8b814852adf62406ce86a338', 'Dazzle', '081296278960', 9476000, 'Perumahan Regensi 2 Bekasi', 17520, 'Sumatera Barat', 'Solok Selatan', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-18', '2022-07-21', 'diproses', '', '2022-07-18 05:43:09', '2022-07-18', 16, '2022070016', 176000, 'e30d4f517c8fe2c0c73f723a660c368c.jpg', 'JUL22', 7, 700000, 'JNAP-0061460488'),
('8efb7e7ce0d2e7495034cde04ee8b927', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 10538650, 'Perumahan Regensi 2 Bekasi', 17520, 'Bengkulu', 'Bengkulu Selatan', 'pos', 'Pos Reguler(Pos Reguler)', '2022-08-05', '2022-08-08', 'belum', '', '2022-08-05 14:31:11', '2022-08-05', 25, '2022080025', 42000, NULL, NULL, NULL, NULL, NULL),
('956af528ddab6546a8ac8e45b150b562', '0a78874550e582afe688001c35d13243', 'Udin', '081296278960', 13439000, 'Perumahan Regensi 2 Bekasi', 17520, 'Bangka Belitung', 'Bangka', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-18', '2022-07-21', 'dibayar', '', '2022-07-18 13:24:57', '2022-07-18', 18, '2022070018', 240000, '71c03149b9d85e2dc418e8ef8b25b4c7.jpg', NULL, NULL, NULL, NULL),
('a7aa7a192c5a2ced74d0bfabb6a466c2', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278961', 219460, 'Gramapuri Taman Sari', 17520, 'Jawa Barat', 'Bogor', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-07-15', '2022-07-18', 'dibayar', '', '2022-07-15 08:47:11', '2022-07-15', 1, '2022070001', 8000, '84f76bbb92b3f4a7d61ed9f76f195d32.jpg', NULL, NULL, NULL, ''),
('a7cf179a4e8f359083cb22bcdfd298a4', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 12523070, 'Perumahan Regensi 2 Bekasi', 17520, 'Bali', 'Buleleng', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-08-05', '2022-08-08', 'dibayar', '', '2022-08-05 06:38:34', '2022-08-05', 23, '2022080023', 248000, 'e7674afa1546601a1441f86d267a87a9.png', 'JUL22', 7, 923930, NULL),
('ab1a3fbf35f0cddc4f279e8fa91b2abf', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278960', 9801885, 'Perumahan Regensi 2 Bekasi', 17520, 'Kalimantan Tengah', 'Palangka Raya', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-17', '2022-07-20', 'dibayar', '', '2022-07-17 15:04:26', '2022-07-17', 11, '2022070011', 40000, '5b879afa9e42a7b8a76993150a52e6ee.png', 'JUL22', 7, 734766, NULL),
('b4f9af377f172d85a90d6aa15b72a9ec', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 3729000, 'Perumahan Regensi 2 Bekasi', 17520, 'Bangka Belitung', 'Bangka', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-17', '2022-07-20', 'dibayar', 'gsdgdsfsdf', '2022-07-17 16:34:15', '2022-07-17', 15, '2022070015', 30000, '6dbd3f16a75a950d78ce9271c8a03aac.png', NULL, NULL, NULL, NULL),
('b609d3551a66ab99c597aea2ba1d4299', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 10529650, 'Perumahan Regensi 2 Bekasi', 17520, 'Bangka Belitung', 'Bangka Barat', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-17', '2022-07-20', 'dibayar', '', '2022-07-17 16:20:58', '2022-07-17', 14, '2022070014', 33000, '9a3839a1f9651c2d19588b2483765630.JPG', NULL, NULL, NULL, NULL),
('c45be1c3d91468d2facccbbc2e82358f', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 3650728, 'Perumahan Regensi 2 Bekasi', 17520, 'Jawa Barat', 'Depok', 'pos', 'Pos Reguler(Pos Reguler)', '2022-08-05', '2022-08-08', 'dibayar', '', '2022-08-05 06:33:48', '2022-08-05', 22, '2022080022', 14000, 'db667d2238ce4ab4e99175ed994dee90.jpg', 'JUL22', 7, 273732, NULL),
('ccf64dbf35eeb9e331b571244523441f', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278960', 13295000, 'Perumahan Regensi 2 Bekasi', 17520, 'Banten', 'Lebak', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-17', '2022-07-20', 'dibayar', '', '2022-07-17 15:50:14', '2022-07-17', 12, '2022070012', 96000, '698f0c76fc12505a8cd002cdaa941039.PNG', NULL, NULL, NULL, NULL),
('d0d01edf520c7a3e0666d6cd77dc90d7', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278961', 495000, 'ASDASDA', 17520, 'Kalimantan Barat', 'Kapuas Hulu', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-07-16', '2022-07-19', 'diproses', '', '2022-07-16 03:22:50', '2022-07-16', 6, '2022070006', 45000, '49ff68b474b98fdf82298d9fc5242f0f.png', NULL, NULL, NULL, ''),
('d12e4c5df7f5ef36d44eb58d00ed6eb5', 'f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', '081296278960', 204658, 'Kp. buwek rawa Rt 004/020 desa sumber jaya, Sumberjaya, Kec. Tambun Sel., Kabupaten Bekasi, Jawa Barat 17510', 17510, 'Jawa Barat', 'Depok', 'jne', 'OKE(Ongkos Kirim Ekonomis)', '2022-07-17', '2022-07-20', 'dibayar', '', '2022-07-17 14:26:14', '2022-07-17', 9, '2022070009', 8000, 'add40f88094175db736c90fe79bf23c8.png', 'JUL22', 7, 14802, NULL),
('e9417a144975ea20fc216b1483940592', '0a78874550e582afe688001c35d13243', 'Udin', '081246723478', 2590000, 'Perumahan Regensi 2 Bekasi', 17520, 'Bangka Belitung', 'Bangka', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2022-07-26', '2022-07-29', 'belum', '', '2022-07-26 09:00:22', '2022-07-26', 20, '2022070020', 90000, NULL, NULL, NULL, NULL, NULL),
('f2edacbcc15bde1376bc0bca49769a3a', 'cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', '081296278961', 10520650, 'ASDASD', 12315, 'Lampung', 'Lampung Barat', 'tiki', 'ECO(Economy Service)', '2022-07-16', '2022-07-19', 'dibayar', '', '2022-07-16 03:40:16', '2022-07-16', 7, '2022070007', 24000, 'f129340aa56fca437a9990e8894de337.jpg', NULL, NULL, NULL, ''),
('f49a9bfab57a20d4f90c3993dccf02f7', '886671d17bb216cf4ecb3598df7a80ab', 'Ardama', '081296278911', 477000, 'asdasd', 12315, 'Bali', 'Jembrana', 'tiki', 'ECO(Economy Service)', '2022-07-15', '2022-07-18', 'belum', '', '2022-07-15 09:08:44', '2022-07-15', 3, '2022070003', 27000, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` varchar(200) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_telp` varchar(15) NOT NULL,
  `user_alamat` text DEFAULT NULL,
  `user_kpos` int(5) DEFAULT NULL,
  `user_sandi` text NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_nama`, `user_email`, `user_telp`, `user_alamat`, `user_kpos`, `user_sandi`, `user_status`, `user_created`, `user_foto`) VALUES
('0a78874550e582afe688001c35d13243', 'Udin', 'udinsedunia@gmail.com', '081246723478', 'Perumahan Regensi 2 Bekasi', 17520, '$2y$10$w5aw7ooLHW7ua.BwSwsKruQRBOxpSeLQHI.KR0TwnSy9MKwOSpHkO', 1, '2022-07-18 06:41:46', '1bca449f95a729619832ce84a53b7217.jpg'),
('4b6f507f8b814852adf62406ce86a338', 'Dazzle', 'dazzle@gmail.com', '081296278333', NULL, NULL, '$2y$10$iIcGPFOUB4/Qp9XD3ZNIwOq3zPiLC7Smmx84CvnxQudeBPbQLq7b.', 1, '2022-07-17 16:36:40', 'image4.jpg'),
('886671d17bb216cf4ecb3598df7a80ab', 'Ardama', 'teguhardama74@gmail.com', '081296278911', NULL, NULL, '$2y$10$QIdo50ZI2taSdeoFha9NwOpSwpS5SccblGzgDIPd3HHF.4Tq3Q7DC', 2, '2022-07-15 09:07:45', 'image4.jpg'),
('cbdc5cfe98aa9497feb6d3c399b76954', 'Shafira Denza', 'shafiradenza22@gmail.com', '081296278961', NULL, NULL, '$2y$10$AWFLDpMp4O11nVRIDaZULeoJAOF4mq//7x4d3ffmfEP0vlElmoTSa', 1, '2022-06-26 16:29:51', 'b78ae5d36a5d56d12c2091240813ac43.jpeg'),
('f3c3ea6cf1eae68973e0f7da84d822ae', 'Teguh Ardama', 'teguhardama75@gmail.com', '081296278960', 'Perumahan Regensi 2 Bekasi', 17520, '$2y$10$962HDskta4pkSAt1m41oF.Mr2lYhkpstvuUadTFebO7t./qXB6AQ.', 1, '2022-07-15 09:04:09', '5a56b15c6efdb502ae688184ac02e26d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `list_id` varchar(200) NOT NULL,
  `list_proid` varchar(200) NOT NULL,
  `list_userid` varchar(200) NOT NULL,
  `list_tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`list_id`, `list_proid`, `list_userid`, `list_tgl`) VALUES
('169eb4b92b0e5b564c0d38513c1c96f2', '80f41935fac2483f5c932ae58902cf95', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-15 15:53:14'),
('244ee695d83506fb386b88c2411cac6b', 'c8ce8a37c6f66962cc4fc9277766a9d1', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:49:33'),
('2c601fa60265e691e28a503df7ece511', '8b8a47bb6400c05639e1d28400891613', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-06-27 13:03:52'),
('3a693df7facbf837e8b30fa26ca57bdb', '2daacabf8297ebf209eb9ad56a7c863b', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:49:29'),
('7adc2accbfaa50a6534d019f9a532081', '80f41935fac2483f5c932ae58902cf95', '0a78874550e582afe688001c35d13243', '2022-07-19 18:21:44'),
('9482528e04cdcb55fef458e946a0c73b', '12248dac5e2c26b1aeb8e265d7086ee8', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-16 10:54:49'),
('a1a9dbcdf6707eb4296c9e92951abed2', '80941f31ffef45399ca9aeff79fe7755', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-07-19 18:27:09'),
('ae0b0d4ba28f640cdb38875a4c67d06b', 'b0f6fbbd8082b5f95f04191d2bbbc5f5', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:49:16'),
('b87a3d4a92adad3a83cd7547f085b5b6', 'beddf554eb637cbe8c079b879c79c29b', '23094', '2021-11-18 08:15:35'),
('c2d51740f3cca849a026a61a4ef06a1f', 'faf1d034707d68a5195aa492187355f5', 'cbdc5cfe98aa9497feb6d3c399b76954', '2022-07-14 13:23:55'),
('d1b04aac786e5e020c410c0e25126e9e', 'aace49c7d80767cffec0e513ae886df0', '23094', '2021-11-18 08:04:03'),
('e69d9b47a1af23fcecdfb1cdc0f40ead', '12248dac5e2c26b1aeb8e265d7086ee8', 'f3c3ea6cf1eae68973e0f7da84d822ae', '2022-08-05 13:49:05'),
('ec69a74d7357c92d1ae426eb412b128c', '12248dac5e2c26b1aeb8e265d7086ee8', '0a78874550e582afe688001c35d13243', '2022-07-19 18:22:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_addres_his`
--
ALTER TABLE `tb_addres_his`
  ADD KEY `ah_userid` (`ah_userid`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_api`
--
ALTER TABLE `tb_api`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD KEY `d_transaksi_id` (`d_transaksi_id`),
  ADD KEY `d_transaksi_item` (`d_transaksi_item`);

--
-- Indexes for table `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tb_foto_rel`
--
ALTER TABLE `tb_foto_rel`
  ADD KEY `fr_proid` (`fr_proid`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `tb_lock`
--
ALTER TABLE `tb_lock`
  ADD PRIMARY KEY (`lock_id`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`lok_id`);

--
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `tb_notif_sistem`
--
ALTER TABLE `tb_notif_sistem`
  ADD PRIMARY KEY (`ns_id`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`profil_id`);

--
-- Indexes for table `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `re_userid` (`re_userid`),
  ADD KEY `re_produkid` (`re_produkid`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `list_proid` (`list_proid`),
  ADD KEY `list_userid` (`list_userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
