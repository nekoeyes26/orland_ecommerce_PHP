-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306:3306
-- Generation Time: Dec 19, 2022 at 03:24 PM
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
-- Database: `orland_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `link_terkait` varchar(100) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `keterangan`, `link_terkait`, `gambar`) VALUES
(1, 'Logitech Gaming Mouse', 'Logitech G membuat gaming mouse wireless dan berkabel pemenang penghargaan. Selalu berinovasi mulai dari sensor hingga bentuk, temukan mouse yang tepat untukmu. ', 'detail_produk.php?id=16', 'img/banner/RE3ciDg.png'),
(2, 'Fantech MAXFIT67 Keyboard', 'Telah Hadir Keyboard terbaru dari Fantech. MAXFIT67! Karya hasil kolaborasi dengan Komunitas keyboard yang siap menjawab segala kebutuhan lo, karena keyboard ini lahir dari komunitas - untuk komunitas!', 'detail_produk.php?id=17', 'img/banner/1269df1b.png');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `harga_checkout` double NOT NULL,
  `ongkir` double NOT NULL,
  `kurir` varchar(30) NOT NULL,
  `tujuan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `email`, `jumlah_item`, `harga_checkout`, `ongkir`, `kurir`, `tujuan`) VALUES
(4, 'admin@admin', 1, 469000, 39000, 'jne', 'Jambi Kerinci');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `email` varchar(30) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_dibeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`email`, `id_pembelian`, `id_produk`, `jumlah_dibeli`) VALUES
('dex@mail', 2, 6, 2),
('dex@mail', 2, 13, 1),
('dex@mail', 2, 14, 1),
('naynay@mail', 3, 13, 1),
('flux@mail', 4, 16, 1),
('flux@mail', 4, 17, 1),
('flux@mail', 4, 15, 2),
('nawaf@mail', 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id`, `nama_lengkap`, `jenis_kelamin`, `no_telp`, `alamat`, `email`) VALUES
(1, 'admin coyyyyy', 'L', '0', '', 'admin@admin'),
(2, 'dex', 'L', '089777321234', 'Jl. Kolong II', 'dex@mail'),
(3, '', '', '0', '', 'nawaf@mail'),
(4, 'Nayi', 'P', '081733212323', 'Jl. Diponegoro ', 'naynay@mail'),
(5, '', '', '0', '', 'flux@mail'),
(6, 'reionics', 'L', '089123234233', 'Chikyuu', 'rei@mail');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `kode_jk` varchar(5) NOT NULL,
  `keterangan_jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `kode_jk`, `keterangan_jk`) VALUES
(1, 'L', 'Laki-Laki'),
(2, 'P', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(1, 1, 'Mouse'),
(2, 2, 'Keyboard'),
(3, 3, 'Headset'),
(4, 4, 'Earphone'),
(5, 5, 'Accessories'),
(6, 6, 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `email`, `id_produk`, `jumlah`) VALUES
(3, 'rei@mail', 14, 5),
(5, 'rei@mail', 13, 3),
(20, 'nawaf@mail', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `harga_pembelian` double NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `ongkir` double NOT NULL,
  `kurir` varchar(30) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `nama_penerima` varchar(60) NOT NULL,
  `no_telp_penerima` varchar(30) NOT NULL,
  `email_penerima` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `email`, `jumlah_item`, `harga_pembelian`, `tanggal_pembelian`, `ongkir`, `kurir`, `tujuan`, `nama_penerima`, `no_telp_penerima`, `email_penerima`) VALUES
(2, 'dex@mail', 3, 2062000, '2022-12-16 18:58:56', 10000, 'jne', 'Jawa Tengah Pati, Jl. Kolong II', 'dex', '089777321234', 'dex@mail'),
(3, 'naynay@mail', 1, 229000, '2022-12-16 19:20:52', 13000, 'jne', 'DKI Jakarta Jakarta Selatan, Jl. Diponegoro  Gang Rambutan', 'Nayi', '081733212323', 'naynay@mail'),
(4, 'flux@mail', 3, 4775000, '2022-12-18 09:40:17', 8000, 'jne', 'DI Yogyakarta Bantul, Jl. Aqua', 'Flx', '081988323764', 'flux@mail'),
(5, 'nawaf@mail', 1, 0, '2022-12-18 17:55:53', 10000, 'jne', 'Jawa Tengah Demak, Jl. Mepet Kuburan', 'Nawaf A', '082733293761', 'nawaf@mail');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `detail_produk` varchar(5000) NOT NULL,
  `harga_diskon_produk` double NOT NULL,
  `harga_asli_produk` double NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar_produk1` varchar(300) NOT NULL,
  `gambar_produk2` varchar(300) NOT NULL,
  `gambar_produk3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kode_kategori`, `detail_produk`, `harga_diskon_produk`, `harga_asli_produk`, `stok_produk`, `gambar_produk1`, `gambar_produk2`, `gambar_produk3`) VALUES
(2, 'Nawaf', 1, 'Nawaf Nawaf', 10000, 50000, 1, 'img_produk/WhatsApp Image 2022-12-04 at 20.31.45.jpeg', 'img_produk/WhatsApp Image 2022-12-04 at 20.31.45.png', 'img_produk/t-rex_1f996.png'),
(4, 'Fantech ARIA XD7', 1, 'Fantech ARIA XD7', 899000, 1499000, 100, 'img_produk/xd7_02.webp', 'img_produk/xd7_02_1.webp', 'img_produk/65efefabddee0da774a40e7262067661.jpg'),
(5, 'Fantech Blake X17', 1, 'Fantech Blake X17', 199000, 499000, 100, 'img_produk/blakex17.png', 'img_produk/mouse_gaming_blake_x17_-_fantech_-_1_2.webp', 'img_produk/mouse_gaming_blake_x17_-_fantech_-_3_2.webp'),
(6, 'Fantech HELIOS XD3', 1, 'Fantech HELIOS XD3', 599000, 1199000, 100, 'img_produk/xd3_v2_3.webp', 'img_produk/xd3_v2_2.webp', 'img_produk/xd3_v2_4.webp'),
(7, 'HyperX Cloud Alpha', 3, 'HyperX Cloud Alpha', 1090000, 1300000, 100, 'img_produk/a7de35fb6469c94cb0266de720b33f1e.jpg', 'img_produk/hyperx_hyperx_cloud_alpha_gaming_headset_-_red_full05_rgoe5gg9.webp', 'img_produk/HyperX-Headset-Cloud-Alpha-S1.jpg'),
(8, 'Keychron K2 V2', 2, 'Keychron K2 V2', 1325000, 1700000, 100, 'img_produk/Keychron-K2-CXH-BO-V2-Keyboard-Mekanik-Nirkabel-Nordic-ISO-Layout-RGB-Backlit-Gateron-Hot-Swappable.webp', 'img_produk/1d3ace88-2bd2-4f77-8b6e-83e4634ab765.__CR0,0,2000,2000_PT0_SX300_V1___.jpg', 'img_produk/634ea5ff0bf7f869d7473114-keychron-k2-wireless-bluetooth-5-1-wired.jpg'),
(9, 'Logitech G304', 1, 'Logitech G304', 599000, 699000, 100, 'img_produk/G304-a.jpg', 'img_produk/910-005284_product_47722893_20200811154322_01_1200.jpg', 'img_produk/logitech-g304-lightspeed-wireless-gaming-mouse.webp'),
(10, 'Logitech G502', 1, 'Logitech G502', 749000, 999000, 100, 'img_produk/c0d835f0cb0a74f977e15b9f10228258.jpg', 'img_produk/5c63d7619518c.jpg', 'img_produk/5c63d761b61af.jpg'),
(11, 'Steel Series Arctis 7', 3, 'Steel Series Arctis 7', 2199000, 2499000, 100, 'img_produk/11e364cd98564345ba14540e64dca185.png', 'img_produk/imgbuy_arctis_7_black_3.png__1850x800_crop-scale_optimize_subsampling-2.png', 'img_produk/imgbuy_arctis_7_black_5.png__1850x800_crop-scale_optimize_subsampling-2.png'),
(12, 'Razer Blackshark V2 X', 3, 'Razer Blackshark V2 X', 699000, 999000, 100, 'img_produk/BLACKSHARK-V2-X.jpg', 'img_produk/razer_razer_gaming_headset_blackshark_v2_x_full03_fgi17g7d.webp', 'img_produk/Headset-Razer-BlackShark-V2-X-3.jpg'),
(13, 'KZ DQ6s', 4, 'KZ DQ6s', 256000, 399000, 34, 'img_produk/71pddlthO7L._AC_SX569_.jpg', 'img_produk/67b8a152ab650aaf7af9ec1a7650979c.jpg', 'img_produk/2_0dc79d71-64cb-4dca-a9f8-63ff67ef715f.webp'),
(14, 'Fantech MAXFIT61 FROST Wireless Mechanical RGB Keyboard', 2, 'FANTECH MAXFIT61 Frost Wireless\r\nHidup produktif dengan keyboard beragam koneksi!\r\nTidak hanya satu, tapi 3 mode konektivitas telah disediakan oleh MAXFIT61 Frost Wireless! Keyboard siap dibawa kemanapun untuk temani segala kegiatan mulai dari bermain game sampai menyelesaikan pekerjaan.\r\nMemiliki visual aesthetic dengan case transparan seperti es yang lagi tren banget saat ini!', 599000, 1299000, 62, 'img_produk/mk857_frost_wireless_white-1.webp', 'img_produk/mk857_frost_wireless_black-1.webp', 'img_produk/71353afc61ddf2a9453afe7cedd0f79e.jpg'),
(15, 'Logitech G Pro', 1, 'PRO Gaming Mouse dibuat dengan satu tujuan yaitu membantumu sukses di lingkungan esports yang sangat kompetitif dan bergerak cepat. Ditingkatkan dengan sensor HERO untuk kecepatan dan presisi luar biasa yang kamu perlukan untuk menang.', 639000, 999900, 20, 'img_produk/plasma-hero-carbon-gallery-4.webp', 'img_produk/plasma-hero-carbon-gallery-3.webp', 'img_produk/plasma-hero-carbon-gallery-1.webp'),
(16, 'Logitech G502 X Lightspeed Wireless Gaming Mouse', 1, 'G502 X LIGHTSPEED adalah tambahan terbaru pada jajaran produk G502 yang legendaris. Dilengkapi switch optik-mechanical hibrida LIGHTFORCE kami yang pertama dan protokol LIGHTSPEED wireless yang diperbarui dengan response rate 68% lebih cepat dibandingkan generasi sebelumnya.', 2190000, 2599000, 20, 'img_produk/g502x-lightspeed-gallery-2-black.webp', 'img_produk/g502x-lightspeed-gallery-1-black.webp', 'img_produk/RE3ciDg.png'),
(17, 'Fantech MAXFIT67 Keyboard Modular Mechanical Putih', 2, '65% Exploded Layout\r\n Southfacing PCB\r\n Universal hotswap, 3 atau 5 pin\r\n Stabiliser POM + PA12 Pre-lubed\r\n Switch Gateron Yellow Cap Milky / Kailh Box White\r\n Tiga konektivitas: wireless 2.4Ghz, Bluetooth (3 device) dan kabel (detachable USB-C)\r\n PBT Dye-sub Keycaps Cherry Profile\r\n Extra keycap untuk MacOS dan aksen\r\n Sound dampener – plate foam dan case foam\r\n Aluminium media knob\r\n Baterai 4000 mAh\r\n “Fantech Core” software\r\n Dynamic RGB Modes\r\n Adjustable kick out feet dan 5 rubber feet', 1299000, 1999999, 86, 'img_produk/maxfit67_putih_1_.webp', 'img_produk/1269df1b.webp', 'img_produk/61KqwVreQ2L.jpg'),
(18, 'Steelseries Rival 3', 1, 'Engineered with hyper-durable materials\r\nGuaranteed 60 million click mechanical switches\r\nLightweight ergonomic design for comfort\r\nBrilliant Prism lighting with 3 zones of 16.8 million beautifully crisp colors\r\nTrueMove Core optical gaming sensor with true 1-to-1 tracking', 469000, 499000, 0, 'img_produk/11008526_7647db40-121a-4153-8232-3e83cccfdb0b_1850_1850.jpg', 'img_produk/steelseries_steelseries_rival_3_gaming_mouse_full01_ut70gxx0.webp', 'img_produk/299ea9d955705caff903fbb82a8dc318.jpg'),
(19, 'Razer Basilisk V3 Pro - White', 1, 'Customizable Wireless Gaming Mouse with Razer HyperScroll Tilt Wheel', 2679000, 3199000, 30, 'img_produk/https___hybrismediaprod.blob.core.windows.net_sys-master-phoenix-images-container_h22_h08_9447199080478_basilisk-v3-pro-white-500x500.png', 'img_produk/9446067077150_221015-basilisk-v3-pro-white-1500x1000-1.jpg', 'img_produk/9446066978846_221015-basilisk-v3-pro-white-1500x1000-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tes_tanggal`
--

CREATE TABLE `tes_tanggal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalwaktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes_tanggal`
--

INSERT INTO `tes_tanggal` (`id`, `tanggal`, `tanggalwaktu`) VALUES
(2, '2022-12-15', '2022-12-15 18:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `akses_id` int(11) NOT NULL,
  `header` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `akses_id`, `header`) VALUES
(1, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'dex', 'dex@mail', 'f83815aedaa1b6bf4211e85910e6bc82', 2, 2),
(3, 'nawaf', 'nawaf@mail', '618858f156ab13ea583ff5469aac6143', 2, 2),
(4, 'naynay', 'naynay@mail', '1bcaaa73cfa8f8b3c8b0197a9f05ec4f', 2, 2),
(5, 'flux', 'flux@mail', 'ab18b3e58a3b1bb5106ced208a8bd460', 2, 2),
(7, 'rei', 'rei@mail', 'bea0184aac2ef216c834b3e24a88c38e', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `kode_voucher` varchar(30) NOT NULL,
  `potongan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `kode_voucher`, `potongan`) VALUES
(1, 'GRATISONGKIR', 40000),
(2, 'ADMINCAPEK', 1000),
(3, 'ORLANDR', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `email`, `id_produk`) VALUES
(1, 'dex@mail', 6),
(2, 'dex@mail', 5),
(3, 'dex@mail', 8),
(4, 'dex@mail', 13),
(6, 'dex@mail', 12),
(7, 'naynay@mail', 14),
(8, 'naynay@mail', 8),
(9, 'rei@mail', 8),
(10, 'rei@mail', 12),
(15, 'naynay@mail', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tes_tanggal`
--
ALTER TABLE `tes_tanggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tes_tanggal`
--
ALTER TABLE `tes_tanggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
