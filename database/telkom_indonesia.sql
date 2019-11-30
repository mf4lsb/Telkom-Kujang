-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 02:01 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkom_indonesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alpro`
--

CREATE TABLE `tb_alpro` (
  `id_alpro` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `cluster` varchar(10000) NOT NULL,
  `alamat_odp` varchar(10000) NOT NULL,
  `kelurahan` varchar(250) NOT NULL,
  `odc_id` int(11) NOT NULL,
  `nama_odp` varchar(250) NOT NULL,
  `port_odp` int(11) NOT NULL,
  `used_odp` int(11) NOT NULL,
  `date_live` date NOT NULL,
  `modul` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `power` varchar(128) NOT NULL,
  `karakter_odp` varchar(10000) NOT NULL,
  `competitor_id` varchar(250) NOT NULL,
  `tikor` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alpro`
--

INSERT INTO `tb_alpro` (`id_alpro`, `sto_id`, `nama`, `cluster`, `alamat_odp`, `kelurahan`, `odc_id`, `nama_odp`, `port_odp`, `used_odp`, `date_live`, `modul`, `type`, `power`, `karakter_odp`, `competitor_id`, `tikor`) VALUES
(6, 5, '', '', '', '', 29, '03', 8, 3, '1970-01-01', '', '', '', '', '9', ''),
(8, 5, 'TES', 'BAYU NIRWANA', 'bogor nirwana residance', 'tes', 3, '03', 8, 8, '1970-01-01', '', 'Menengah-Atas', 'Tinggi', '', '1', '-6.605778,106.770028');

-- --------------------------------------------------------

--
-- Table structure for table `tb_competitor`
--

CREATE TABLE `tb_competitor` (
  `id` int(11) NOT NULL,
  `competitor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_competitor`
--

INSERT INTO `tb_competitor` (`id`, `competitor`) VALUES
(1, 'First Media'),
(2, 'Biznet'),
(3, 'MyRepublic'),
(4, 'Transdata'),
(5, 'XLcom'),
(6, 'MNC'),
(7, 'Iconplus'),
(9, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datel`
--

CREATE TABLE `tb_datel` (
  `id` int(11) NOT NULL,
  `nama_datel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datel`
--

INSERT INTO `tb_datel` (`id`, `nama_datel`) VALUES
(1, 'Kujang'),
(2, 'Cibinong'),
(3, 'Sentul'),
(4, 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_odc`
--

CREATE TABLE `tb_odc` (
  `id_odc` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL,
  `kode_odc` varchar(250) NOT NULL,
  `alamat` varchar(10000) NOT NULL,
  `demands` int(11) NOT NULL,
  `total_odp` int(11) NOT NULL,
  `port` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `rsv` int(11) NOT NULL,
  `area` varchar(128) NOT NULL,
  `karakter` varchar(10000) NOT NULL,
  `tipe_rumah` varchar(128) NOT NULL,
  `huni` varchar(128) NOT NULL,
  `daya_beli` varchar(128) NOT NULL,
  `tikor` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_odc`
--

INSERT INTO `tb_odc` (`id_odc`, `sto_id`, `kode_odc`, `alamat`, `demands`, `total_odp`, `port`, `used`, `available`, `rsv`, `area`, `karakter`, `tipe_rumah`, `huni`, `daya_beli`, `tikor`, `img`) VALUES
(2, 5, 'FAD', 'Perumahan Taman Yasmin Sektor 6, Jl. Pinang Perak 4', 20, 2, 32, 20, 3, 2, 'Cluster', 'ODC TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.555430,106.767487', 'default.jpg'),
(3, 5, 'FAE', 'Jl. Pahlawan', 837, 68, 704, 338, 364, 2, 'Scatter', 'Berada di seberang bank BRI, disekitarnya terdapat banyak toko-toko bangunan', 'Menengah', 'Tinggi', 'Sedang', '-6.616090,106.804430', 'FAE.PNG'),
(4, 5, 'FAH', 'Jl. Bogor Baru', 486, 19, 184, 158, 16, 4, 'Scatter', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.5918, 106.81189', 'default.jpg'),
(5, 5, 'FAL', 'Jl. Layungsari III', 1107, 90, 968, 293, 673, 2, 'Scatter', 'Berada dekat dengan pemukiman warga dan juga kantor pos', 'Menengah', 'Tinggi', 'Sedang', '-6.612313,106.800366', 'FAL.PNG'),
(6, 5, 'FAN', 'Jl. Kapten Yusuf', 0, 73, 920, 193, 721, 6, 'Scatter', 'Disekitarnya banyak ruko, terdapat perumahan Muara Asri di seberangnya', 'Menengah', 'Tinggi', 'Sedang', '-6.611342,106.792142', 'FAN.PNG'),
(7, 5, 'FBG', 'Perumahan Taman Yasmin, Jl. Wijaya Kusuma Raya', 759, 67, 616, 458, 125, 1, 'Cluster', 'ODC mencatu daerah cluster dan okupansi cukup besar (banyak yang sudah menggunakan Indihome).', 'Mewah', 'Tinggi', 'Tinggi', '-6.566767,106.771517', 'Screenshot_1.png'),
(8, 5, 'FAP', 'Komplek DPRD, Jl. Perkasa Komp. DPRD', 0, 6, 48, 44, 1, 0, 'Cluster', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.526293, 106.799408', 'default.jpg'),
(9, 5, 'FBH', 'Jl. Cilendek', 1363, 127, 1248, 498, 575, 3, 'Scatter', 'Disekitarnya terdapat banyak ruko ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.576303,106.772009', 'photo6181665808757926089.jpg'),
(10, 5, 'FAQ', 'Jl. Pulo Empang', 546, 46, 444, 67, 372, 5, 'Scatter', 'Terletak di pinggir jalan raya, disekitarnya terdapat pemukiman warga', 'Menengah', 'Tinggi', 'Rendah', '-6.606400,106.793236', 'FAQ.PNG'),
(11, 5, 'FAS', 'Jl. Ir. H. Juanda', 356, 94, 1032, 742, 285, 5, 'Scatter', 'Terletak di pinggir jalan raya, disekitarnya terdapat restoran dan banyak perkantoran', 'Menengah', 'Tinggi', 'Sedang', '-6.601097,106.795004', 'FAS.PNG'),
(12, 5, 'FBJ', 'Gg. Mesjid, Cilendek Timur', 759, 75, 912, 199, 698, 2, 'Cluster', 'terletak di bagian gerbang belakang cluster Bumi Menteng Asri,dan pemukiman warga diluar cluster', 'Mewah', 'Tinggi', 'Tinggi', '-6.575665,106.775466', 'photo6183975225557887136.jpg'),
(13, 5, 'FBK', 'Jl. Kelor Raya', 1671, 91, 944, 184, 760, 0, 'Scatter', 'Berada dikawasan padat penduduk.', 'Menengah', 'Tinggi', 'Sedang', '-6.578756,106.774066', 'photo6181665808757926090.jpg'),
(14, 5, 'FBL', 'Jl. Dr. Semeru', 150, 0, 0, 0, 0, 0, 'Scatter', 'ODC Terletak di pinggir jalan raya, namun terdapat cluster Dinas dan sebuah instansi.', 'Menengah', 'Tinggi', 'Rendah', '-6.577353,106.772856', 'photo6181311619984894247.jpg'),
(15, 5, 'FAT', 'Jalan Jembatan Merah', 1519, 15, 240, 41, 198, 1, 'Scatter', ' Suasana daerahnya ramai kendaraan, terdapat banyak toko-toko, dan ada sekolah.', 'Sederhana', 'Tinggi', 'Rendah', '-6.595631,106.786649', 'FAT.PNG'),
(16, 5, 'FBM', 'Jl. Manunggal', 466, 124, 1248, 312, 932, 4, 'Scatter', 'Berada dekat dengan kawasan penduduk dan banyak toko.', 'Menengah', 'Tinggi', 'Sedang', '-6.586442,106.783235', 'photo6181665808757926091.jpg'),
(17, 5, 'FAU', 'Jalan Jembatan Merah', 1519, 72, 728, 262, 464, 2, 'Scatter', 'Suasana daerahnya ramai kendaraan,terdapat banyak toko-toko dan ada sekolah.', 'Sederhana', 'Tinggi', 'Rendah', '-6.595631,106.786649', 'FAU.PNG'),
(18, 5, 'FAV', 'Jalan Jembatan Merah', 1513, 61, 744, 194, 548, 2, 'Scatter', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.595333,106.786687', 'FAV.PNG'),
(19, 5, 'FBN', 'Jl. Merdeka', 918, 95, 896, 373, 520, 3, 'Scatter', 'Berada di kawasan penduduk dan banyak toko disekitarnya.', 'Menengah', 'Tinggi', 'Sedang', '-6.588226,106.787844', 'Screenshot_2.png'),
(20, 5, 'FAW', 'Jl. Paledang', 763, 79, 640, 449, 184, 7, 'Scatter', 'TIDAK DITEMUKAN', 'Sederhana', 'Tinggi', 'Rendah', '-6.587864,106.788998', 'default.jpg'),
(21, 5, 'FBP', 'Perumahan Taman Yasmin Sektor 3, Jl. Culan Raya', 446, 115, 968, 276, 690, 2, 'Cluster', 'Disekitarnya banyak hunian namun tidak ramai.', 'Menengah', 'Tinggi', 'Sedang', '-6.561618,106.775012', 'default.jpg'),
(22, 5, 'FAX', 'Jl. Ciwaringin, Gg. Sukarna', 683, 79, 760, 285, 472, 3, 'Scatter', 'Disekitarnya terdapat banyak toko-toko dan ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.587864,106.788998', 'FAX.PNG'),
(23, 5, 'FBQ', 'Perumahan Taman Cimanggu, Jl. Taman Cimanggu Tengah', 1035, 138, 1104, 226, 834, 4, 'Cluster', 'ODC terletak dekat dengan sport area dan tempat ibadah,daerah juga berpotensi untuk penjualan', 'Menengah', 'Tinggi', 'Tinggi', '-6.562902,106.779115', 'photo6181665808757926092.jpg'),
(24, 5, 'FAY', 'Jl. Poras', 1757, 150, 1448, 671, 767, 10, 'Scatter', ' Suasana daerahnya ramai karena ada pemukiman warga, ruko dan sekolah.', 'Sederhana', 'Tinggi', 'Sedang', '-6.583016,106.769292', 'FAY.PNG'),
(25, 5, 'FBS', 'Jl. Taman Cimanggu Utara, Kedung Waringin', 1225, 104, 864, 401, 460, 3, 'Cluster', 'ODC mencatu cluster, dekat dengan puskesmas dan ada restoran', 'Menengah', 'Tinggi', 'Tinggi', '-6.561755,106.780447', 'Screenshot_11.png'),
(26, 5, 'FAZ', 'Jl. Meranti I', 0, 70, 696, 445, 247, 4, 'Scatter', 'Disekitarnya terdapat supermarket dan beberapa toko,ODC terletak di pinggir jalan raya', 'Menengah', 'Tinggi', 'Sedang', '-6.600424,106.779570', 'FAZ.PNG'),
(27, 5, 'FCF', 'Jl. Ks. Tubun', 612, 0, 0, 0, 0, 0, 'Scatter', 'ODC terletak berada di pinggir jalan dekat dengan kawasan pemukiman warga dan toko-toko.', 'Menengah', 'Tinggi', 'Sedang', '-6.564324,106.810324', 'fcf.PNG'),
(28, 5, 'FBT', 'Perumahan Cimanggu Center Point, Jl. Cimanggu Boulevard', 517, 107, 936, 279, 635, 4, 'Cluster', 'ODC mencatu cluster, dekat dengan supermarket', 'Menengah', 'Tinggi', 'Tinggi', '-6.565605,106.783040', 'Screenshot_3.png'),
(29, 5, 'FB', 'Jl.Tentara Pelajar 3, Gg. Mantri Guru', 564, 21, 168, 81, 85, 2, 'Scatter', 'DIsekitarnya terdapat toko-toko,dan diseberangnya ada SPBU, namun penamaan ODC keliru pada data yg diberi sebelumnya (awalnya fbu)', 'Menengah', 'Tinggi', 'Sedang', '-6.573767,106.788063', 'FB.PNG'),
(30, 5, 'FBU', 'Jl. Tentara Pelajar', 650, 68, 832, 241, 635, 4, 'Scatter', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Tinggi', '-6.573702,106.787963', 'default.jpg'),
(31, 5, 'FBB', 'Jl. Aria Surialaga', 0, 83, 944, 383, 556, 5, 'Scatter', 'ODC terletak di pinggir jalan raya, disekitarnya ada pemukiman warga', 'Menengah', 'Tinggi', 'Rendah', '-6.601176,106.780246', 'FBB.PNG'),
(32, 5, 'FBV', 'Jl. Tentara Pelajar', 1138, 87, 952, 264, 6685, 3, '', 'ODC terletak dekat dengan cluster yang banyak huniannya, dan terdapat gedung perkantoran.', 'Menengah', 'Tinggi', 'Sedang', '-6.575615,106.788000', 'photo6181607873944070418.jpg'),
(33, 5, 'FCG', 'Jl. Ceremai Ujung', 564, 0, 0, 0, 0, 0, 'Scatter', 'daerah pemukiman warga, dekat dengan perumahan My Residence, banyak huni', 'Menengah-Atas', 'Tinggi', 'Sedang', '-6.574103,106.805454', 'default.jpg'),
(34, 5, 'FBC', 'Jl. Raya Dramaga Bogor', 770, 57, 568, 203, 358, 7, 'Scatter', 'Terletak dekat pasar, kondisi disekitarnya ramai kendaraan', 'Sederhana', 'Tinggi', 'Rendah', '-6.594243,106.777902', 'FBC.PNG'),
(35, 5, 'FBW', 'Jl. Kb. Pedes 25-27, Kb. Pedes', 1694, 103, 1000, 375, 621, 4, 'Scatter', 'ODC terletak dekat kantor Kecamatan Sareal, terdapat banyak Sekolah Dasar, dan ruko.', 'Menengah', 'Tinggi', 'Sedang', '-6.568560,106.799703', 'photo6181311619984894248.jpg'),
(36, 5, 'FBD', 'Perumahan Taman Yasmin 5, Jl. Palem Putri 1', 2753, 151, 1680, 550, 973, 8, 'Cluster', 'ODC mencatu daerah perumahan Taman Yasmin dengan potensi penjualan yang bagus.', 'Mewah', 'Tinggi', 'Tinggi', '-6.560759,106.767103', 'FBD.PNG'),
(37, 5, 'FCH', 'Jl. Achmad Adnawijaya,Bantarjati', 1649, 0, 0, 0, 0, 0, 'Scatter', 'DIsekitarnya terdapat ruko-ruko,dan pemukiman warga', 'Menengah', 'Tinggi', 'Sedang', '-6.569452,106.811147', 'default.jpg'),
(38, 5, 'FBX', 'Jl. Merak', 1096, 129, 1192, 583, 604, 5, 'Scatter', 'Disekitarnya terdapat gedung perkantoran, toko-toko, banyak hunian.', 'Menengah', 'Tinggi', 'Sedang', '-6.573324,106.802111', 'photo6181607873944070419.jpg'),
(39, 5, 'FBE', 'Jl. Brigjen Saptadji Hadiprawira', 1671, 53, 576, 155, 338, 1, 'Scatter', 'ODC terletak dipinggir jalan dengan kondisi ramai disekitarnya ada toko-toko dan supermarket.', 'Menengah', 'Tinggi', 'Sedang', '-6.568965,106.766086', 'FBE.PNG'),
(40, 5, 'FBY', 'Jl. A. Yani', 1369, 78, 632, 220, 410, 2, 'Scatter', 'Disekitarnya ramai hunian karena terdapat gedung perkantoran, berada di pinggir jalan', 'Menengah', 'Tinggi', 'Sedang', '-6.573309,106.802267', 'photo6181665808757926093.jpg'),
(41, 5, 'FBZ', 'Jl. Re. Martadinata 9, Cibogor', 1207, 130, 1176, 404, 768, 4, 'Scatter', 'Terletak dekat Rel Kereta, disekitarnya merupakan daerah pemukiman warga dan ada toko bangunan', 'Menengah', 'Tinggi', 'Rendah', '-6.574793,106.793167', 'photo6181607873944070420.jpg'),
(42, 5, 'FBF', 'Perumahan Taman Yasmin, Jl. Wijaya Kusuma 2', 1082, 96, 832, 340, 351, 0, 'Cluster', 'ODC mencatu daerah cluster, dengan potensi cukup besar', 'Mewah', 'Tinggi', 'Tinggi', '-6.569616,106.768108', 'FBF.PNG'),
(43, 5, 'FC', 'Jl. Lawang Gintung', 215, 0, 0, 0, 0, 0, 'Scatter', 'ODC berada di pinggir jalan raya, dan digunakan sebagai tempat berjualan', 'Menengah', 'Tinggi', 'Sedang', '-6.620412, 106.814108', 'IMG20190702103055.jpg'),
(44, 5, 'FCJ', 'Perumahan Bantar Jati, Jl. Villa Bukit Raya', 2548, 0, 0, 0, 0, 0, 'Cluster', 'Terletak di depan SMA 7 Bogor, dekat cluster dan pemukiman warga.', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.578723, 106.814223', 'default.jpg'),
(45, 5, 'FCA', 'Jl. Jend. Sudirman', 790, 54, 456, 225, 196, 5, 'Scatter', 'Daerah ODC merupakan kawasan toko-toko dan suasananya sepi.', 'Menengah', 'Tinggi', 'Sedang', '-6.587339,106.797117', 'Screenshot_45.png'),
(46, 5, 'FCB', 'Jl. Jendral Sudirman, taman Peranginan', 539, 129, 1152, 1062, 83, 7, 'Scatter', 'Terletak di pinggir jalan raya, disekitarnya terdapat ruko-ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.587139,106.797040', 'photo6181311619984894249.jpg'),
(47, 5, 'FCC', 'Perumahan Sinbad Agung Residence, Jl. Desa Sukaramai', 0, 70, 560, 157, 398, 5, 'Cluster', 'ODC mencatu perumahan mewah dengan ramai huni potensi penjualan besar', 'Mewah', 'Tinggi', 'Tinggi', '-6.630494,106.819387', 'photo6181607873944070421.jpg'),
(48, 5, 'FCK', 'Perumahan Dalurung Raya, Jl. Dalurung Raya', 2964, 0, 0, 0, 0, 0, 'Cluster', '', 'Menengah', 'Tinggi', 'Tinggi', '-6.579755, 106.809142', 'default.jpg'),
(49, 5, 'FCD', 'Jl. Nasional 11, Kedung Badak', 1227, 50, 400, 287, 111, 2, 'Scatter', 'Disekitar ODC terdapat banyak restoran/cafe.', 'Menengah', 'Tinggi', 'Sedang', '-6.562438,106.795090', 'Screenshot_5.png'),
(50, 5, 'FCE', 'Gg. Mesjid, Jl. Sholeh Iskandar', 0, 95, 760, 249, 508, 3, 'Scatter', 'Disekitar ODC banyak pemukiman wwarga namun jarang dihuni.', 'Menengah', 'Tinggi', 'Rendah', '-6.561247,106.805051', 'photo6181607873944070422.jpg'),
(51, 5, 'FCL', 'Jl. Papandayan (samping kantor WITEL Pajajaran)', 1121, 0, 0, 0, 0, 0, 'Scatter', 'Kondisi dekat ODC banyak yang berjualan, terdapat perumahan dan beberapa gedung perkantoran.', 'Menengah', 'Tinggi', 'Tinggi', '-6.586982, 106.805415', 'FCL.PNG'),
(52, 5, 'FCM', 'Jl. Sempur Kaler', 418, 0, 0, 0, 0, 0, 'Cluster', 'ODC terletak strategis dekat dengan sekolah, tempat ibadah dan didalam cluster.', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.588834,106.799717', 'FCM.PNG'),
(53, 5, 'FCN', 'Perumahan Haji Kota Bogor, Jl. Tumenggung Wiradiredja', 2883, 0, 0, 0, 0, 0, 'Cluster', 'ODC mencatu perumahan kelas menengah, banyak hunian, suasana ramai, daya beli tinggi sehingga berpotensi untuk penjualan', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.589348,106.826568', 'default.jpg'),
(54, 5, 'FCP', 'Jl. Achmad Adnawijaya,Bantarjati', 2656, 0, 0, 0, 0, 0, 'Scatter', 'Disekitar ODC hanya terdapat banyak caffe dan ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.590969,106.816828', 'FCP.jpg'),
(55, 5, 'FCQ', 'Jl. Achmad Adnawijaya, Tanah Baru', 2363, 0, 0, 0, 0, 0, 'Scatter', 'Disekitar ODC hanya terdapat banyak caffe dan ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.591026,106.816797', 'FCQ.PNG'),
(56, 5, 'FCS', 'Perumahan Bogor Baru', 2471, 0, 0, 0, 0, 0, 'Cluster', 'ODC mencatu cluster dan disekitarnya terdapat supermarket, tempat-tempat makan  dan banyak kost-kostan', 'Menengah', 'Tinggi', 'Tinggi', '-6.591709,106.810231', 'FCS.jpg'),
(57, 5, 'FCT', 'Jl. Lodaya 1,Babakan,Bogor Tengah', 691, 0, 0, 0, 0, 0, 'Scatter', 'terletak disamping Burger King dan terdapat gedung-gedung perkantoran', 'Menengah', 'Tinggi', 'Sedang', '-6.592209,106.804906', 'default.jpg'),
(58, 5, 'FCU', 'Jl. Raya Bogor-Sukabumi', 1343, 0, 0, 0, 0, 0, 'Scatter', 'terletak pinggir jalan raya, terdapat hotel dan beberapa toko', 'Menengah', 'Tinggi', 'Tinggi', '-6.607873,106.810021', 'default.jpg'),
(59, 5, 'FCV', 'Jl. Otto Iskandardinata, paledang', 344, 0, 0, 0, 0, 0, 'Scatter', 'Terletak di depan sekolah dasar dekat dengan tugu kujang,dan kebun raya bogor. ', 'Menengah', 'Tinggi', 'Tinggi', '-6.601648,106.804413', 'FCV.PNG'),
(60, 5, 'FCW', 'Perumahan Bogor Riverside, Blk. C', 451, 0, 0, 0, 0, 0, 'Cluster', 'terletak dalam cluster dan berpotensi.', 'Menengah', 'Tinggi', 'Tinggi', '-6.630289,106.828075', 'FCW_Odc.jpg'),
(61, 5, 'FCX', 'Perumahan Durian Raya, Jl. Cempedak Raya', 1516, 0, 0, 0, 0, 0, 'Cluster', 'ODC terletak pinggir jalan raya mencatu cluster, dan terdapat beberapa toko', 'Menengah', 'Tinggi', 'Sedang', '-6.618371, 106.819527', 'default.jpg'),
(62, 5, 'FCY', 'Perumahan Pajajaran Indah, Jl. Raya Pajajaran', 872, 0, 0, 0, 0, 0, 'Cluster', 'Terletak di pinggir jalan raya dan di depan SPBU', 'Mewah', 'Tinggi', 'Tinggi', '-6.612597,106.813156', 'default.jpg'),
(63, 5, 'FCZ', 'Perumahan Baranangsiang Indah, Arcadomas', 0, 0, 0, 0, 0, 0, 'Cluster', 'Terletak di dalam perumahan baranangsiang indah berpotensi untuk penjualan.', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.611168, 106.820988', 'FCZ.PNG'),
(64, 5, 'FDA', 'Perumahan Baranangsiang Indah, Jl. Baranangsiang Indah', 0, 0, 0, 0, 0, 0, 'Cluster', 'ODC terletak di belakang perumahan berpotensi untuk penjualan.', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.612685,106.828019', 'default.jpg'),
(65, 5, 'FDB', 'Jl. Raya Tajur', 1994, 0, 0, 0, 0, 0, 'Scatter', 'Posisi ODC terletak disamping pertigaan jalan, disekitarnya terdapat toko-toko dan supermarket.', 'Menengah', 'Tinggi', 'Sedang', '-6.637701,106.831117', 'default.jpg'),
(66, 5, 'FDC', 'Komplek Pakuan, Jl. Wijaya Kusuma Raya', 3412, 67, 568, 297, 268, 3, 'Cluster', 'Suasana di cluster ramai berpotensi untuk penjualan.', 'Mewah', 'Tinggi', 'Tinggi', '-6.630494,106.819387', 'default.jpg'),
(67, 5, 'FDE', 'Jl. Raya Pajajaran', 747, 59, 664, 433, 230, 1, 'Scatter', 'dekat tempat berjualan, terdapat beberapa gedung perkantoran, supermarket, dan toko-toko', 'Menengah', 'Tinggi', 'Tinggi', '-6.620902,106.816452', 'default.jpg'),
(68, 5, 'FDF', 'Jl. Siliwangi', 324, 39, 408, 178, 229, 1, 'Scatter', 'terletak di pinggir jalan raya, disekitarnya banyak yang berjualan dan terdapat beberapa toko.', 'Menengah', 'Tinggi', 'Sedang', '-6.617883,106.811929', 'default.jpg'),
(69, 5, 'FDG', 'Jl. Siliwangi', 649, 13, 120, 84, 35, 1, 'Scatter', 'Terletak dipinggir jalan raya, banyak yang berjualan dan terdapat beberapa toko, bersampingan dengan ODC FDF', 'Menengah', 'Tinggi', 'Sedang', '-6.617883,106.811929', 'default.jpg'),
(70, 5, 'FDH', 'Perumahan Budi Agung', 325, 20, 224, 72, 149, 3, 'Cluster', 'ODC terletak di dalam cluster namun belum dipasang, kondisi cluster ramai huni dan berpotensi untuk penjualan', 'Menengah', 'Tinggi', 'Tinggi', '-6.55625, 106.79161', 'default.jpg'),
(71, 5, 'FDJ', 'Jl. Lawang Gintung', 1360, 91, 960, 417, 538, 5, 'Scatter', 'Terletak di pinggir jalan raya,disekitarnya digunakan sebagai tempat untuk berjualan', 'Menengah', 'Tinggi', 'Sedang', '-6.620412, 106.814108', 'default.jpg'),
(72, 5, 'FDP', 'Komplek DPRD, Jl. Perkasa Komp. DPRD', 2799, 95, 864, 211, 647, 6, 'Cluster', 'ODC terletak di dalam cluster namun suasananya sepi jadi kurang berpotensi untuk melakukan penjualan ditempat ini.', 'Menengah', 'Tinggi', 'Sedang', '-6.633175,106.812895', 'FDP.PNG'),
(73, 5, 'FDK', 'Jl. Siliwangi', 1501, 105, 1200, 511, 687, 2, 'Scatter', 'Terletak di pinggir jalan raya, disekitarnya digunakan sebagai tempat untuk ibadah', 'Menengah', 'Tinggi', 'Sedang', '-6.612777,106.807412', 'FDK_Odc.jpg'),
(74, 5, 'FDL', 'Jl. Warung Bandrek, Gg. Aut No. 15', 839, 38, 352, 172, 178, 2, 'Scatter', 'Terletak di daerah pasar, Di sekitarnya terdapat banyak toko-toko.', 'Menengah', 'Tinggi', 'Sedang', '-6.610216,106.804279', 'default.jpg'),
(75, 5, 'FDQ', 'Komplek DPRD, Jl. Perkasa Komp. DPRD', 1284, 48, 528, 179, 345, 4, 'Cluster', 'ODC terletak di dalam cluster namun suasananya sepi jadi kurang berpotensi untuk melakukan penjualan ditempat ini.', 'Menengah', 'Tinggi', 'Sedang', '-6.633175,106.812895', 'FDQ.PNG'),
(76, 5, 'FDM', 'Jl.Otto Iskandardinata', 1375, 142, 1560, 954, 601, 5, 'Scatter', 'tedapat banyak toko-toko, pasar, pemukiman warga, terletak di pinggir jalan raya', 'Menengah', 'Tinggi', 'Sedang', '-6.603064,106.799318', 'default.jpg'),
(77, 5, 'FDS', 'Jl. Batutulis', 2029, 110, 1240, 620, 613, 7, 'Scatter', 'Terletak dipinggir jalan dengan suasana ramai kendaraan dan agak jauh dari pemukiman', 'Menengah', 'Tinggi', 'Sedang', '-6.618847, 106.806967', 'FDS.PNG'),
(78, 5, 'FDT', 'Jl. Batutulis', 891, 79, 816, 393, 422, 1, 'Scatter', 'Terletak dipinggir jalan dengan suasana ramai kendaraan dan agak jauh dari pemukiman. Bersebrangan dengan ODC-BOO-FDS', 'Menengah', 'Tinggi', 'Sedang', '-6.618931, 106.806896', 'FDT.PNG'),
(79, 5, 'FFA', 'Perumahan Danau Bogor Raya, Jl. Danau Bogor Raya', 465, 46, 392, 241, 142, 9, 'Cluster', 'dekat dengan sport club danau bogor raya dengan tipe perumahan mewah', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.598126,106.830025', 'FFA_Odc.jpg'),
(80, 5, 'FDU', 'Jl. Alun', 1013, 91, 1008, 348, 651, 9, 'Scatter', 'terdapat toko-toko berada di daerah pasar dengan daya beli sedang', 'Menengah', 'Tinggi', 'Sedang', '-6.607901,106.795181', 'FDU.PNG'),
(81, 5, 'FDV', 'Jl. Aria Surialaga', 0, 35, 472, 90, 379, 3, 'Scatter', 'pinggir jalan raya dekat dengan pemukiman warga', 'Menengah', 'Tinggi', 'Rendah', '-6.606929,106.788816', 'FDV.PNG'),
(82, 5, 'FDN', 'Jl. Pahlawan', 2468, 145, 1608, 1005, 590, 13, 'Scatter', 'terletak dipinggir jalan raya,disekitarnya banyak supermarket dan ruko-ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.609303,106.797562', 'default.jpg'),
(83, 5, 'FEA', 'Jl. Malabar 1', 713, 2, 16, 12, 0, 4, 'Scatter', 'terdapat gedung perkantoran, sekolah dan supermarket, suasana ramai, daya beli sedang', 'Menengah', 'Tinggi', 'Rendah', '-6.595082,106.805988', 'FEA.PNG'),
(84, 5, 'FEB', 'Bogor Raya Residence, Jl. Pangeran Sangjang', 0, 28, 224, 40, 183, 1, 'Cluster', 'perumahan kelas menengah-atas, banyak hunian, suasana ramai, daya beli tinggi', 'Sederhana', 'Tinggi', 'Tinggi', '-6.587522,106.833283', 'FEB.PNG'),
(85, 5, 'FFB', 'berada di pinggir jalan raya lokasi dekat dengan perempatan lampu merah dan terdapat ruko', 465, 32, 256, 161, 94, 1, '', 'berada di pinggir jalan raya lokasi dekat dengan perempatan lampu merah dan terdapat ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.581011, 106.806866', 'WhatsApp_Image_2019-07-26_at_14_42_41.jpg'),
(86, 5, 'FEC', 'Perumahan Giraha Pajajaran, Jl. Raya Parung Banteng', 0, 30, 240, 138, 96, 6, 'Cluster', 'berada di pinggir jalan dekat dengan toko bangunan berada di ketinggian yang berbeda dengan jalan', 'Menengah', 'Sedang', 'Sedang', '-6.619516,106.832406', 'FEC.PNG'),
(87, 5, 'FG', 'Perumahan Taman Seruni, Jl. Taman Seruni Raya', 1670, 31, 368, 178, 164, 6, 'Cluster', 'di dalam perumahan dengan tipe perumahan menengah keatas, dekat dengan pos satpam taman seruni', 'Menengah', 'Tinggi', 'Sedang', '-6.574014,106.823710', 'WhatsApp_Image_2019-07-26_at_14_48_57.jpg'),
(88, 5, 'FEE', 'Perumahan Griya Bogor Raya, Jl. Venus', 628, 57, 500, 218, 278, 4, 'Cluster', 'dekat dengan pos satpam berada di dalam perumahan kelas menengah yang memiliki banyak hunian', 'Menengah', 'Tinggi', 'Sedang', '-6.617382,106.825203', 'FEE.PNG'),
(89, 5, 'FEF', 'Perumahan Pajajaran Regency, Jl. Pajajaran Regency Raya', 0, 31, 248, 89, 157, 2, 'Cluster', 'berada di dalam perumahan kelas menengah-atas yang memiliki banyak hunian', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.611757, 106.826871', 'FEF.PNG'),
(90, 5, 'FEG', 'Jl. Lawang Gintung', 839, 11, 96, 75, 19, 2, 'Scatter', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.620375,106.814177', 'default.jpg'),
(91, 5, 'FEJ', 'Perumahan Taman Yasmin Sektor 7, Jl. Bambu Raya', 0, 74, 592, 380, 210, 2, 'Cluster', 'berada di dalam perumahan kelas menengah-atas dengan kemungkinan daya beli tinggi dan banyak rumah yang sudah di huni', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.571523,106.778466', 'default.jpg'),
(92, 5, 'FEK', 'Pasar Anyar, Jl. Sawo Jajar', 1061, 8, 64, 51, 13, 0, 'Scatter', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Rendah', '-6.58863, 106.7942', 'default.jpg'),
(93, 5, 'FGD', 'Perumahan Bogor Nirwana Residence', 0, 44, 424, 137, 279, 8, 'Cluster', 'TIDAK DITEMUKAN', 'Mewah', 'Tinggi', 'Tinggi', '-6.621037,106.796850', 'default.jpg'),
(94, 5, 'FEL', 'Perumahan Bogor Nirwana Residence', 0, 88, 704, 238, 459, 7, 'Cluster', 'di dalam perumahan BNR tepatnya di cluster Arga Padma Nirwana yang memiliki tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.630057,106.795008', 'FEL.PNG'),
(95, 5, 'FEM', 'Perumahan Bogor Nirwana Residence, Jalan Pabuaran Lendeh', 0, 29, 232, 50, 182, 0, 'Cluster', 'di dalam perumahan BNR tepatnya di cluster The Fusion yang memiliki tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.637240,106.796374', 'FEM.PNG'),
(96, 5, 'FEN', 'Perumahan Bogor Nirwana Residence', 0, 55, 464, 150, 311, 3, 'Cluster', 'di dalam perumahan BNR tepatnya di cluster Nirwana yang memiliki tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.628495,106.797033', 'FEN.PNG'),
(97, 5, 'FEQ', 'Villa Duta, Jl. Mustika', 337, 32, 256, 183, 70, 3, 'Cluster', 'di dalam perumahan Villa Duta dengan tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.607259,106.815618', 'FEQ.PNG'),
(98, 5, 'FH', 'Jl. A. Yani', 382, 12, 96, 59, 36, 1, 'Scatter', 'terdapat gedung perkantoran lokasi berada di pinggir jalan dekat dengan ODC-BOO-FBY dan FBX', 'Menengah', 'Tinggi', 'Sedang', '-6.573309,106.802267', 'fh-min.JPG'),
(99, 5, 'FES', 'Villa Duta, Jl. Permata', 1689, 48, 488, 303, 183, 2, 'Cluster', 'di dalam perumahan Villa Duta dengan tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.605324,106.816391', 'FES.PNG'),
(100, 5, 'FET', 'Jl. A. Yani', 430, 19, 152, 68, 84, 0, 'Scatter', 'TIDAK DITEMUKAN', 'Sederhana', 'Tinggi', 'Sedang', '-6.57795, 106.7988', 'default.jpg'),
(101, 5, 'FEW', 'Apartment Zarindah Mansion, Jl. Bangbarung Raya', 667, 9, 88, 23, 65, 0, 'Cluster', 'ODC berada di dalam apartment ', 'Mewah', 'Tinggi', 'Tinggi', '-6.584265, 106.815157', 'FEW.PNG'),
(102, 5, 'FZ', 'Perumahan Pakuan 2,', 1367, 31, 496, 83, 412, 0, 'Cluster', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.630481,106.820969', 'default.jpg'),
(103, 5, 'FJ', 'Nusa Indah Regency, Jl. Pangeran Sogiri', 786, 16, 152, 71, 71, 10, 'Cluster', 'di depan perumahan nusa indah dengan tipe perumahan menengah keatas', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.573585,106.822330', 'WhatsApp_Image_2019-07-26_at_15_52_25.jpg'),
(104, 5, 'FY', 'Jl. Raya Bogor-Sukabumi', 1432, 4, 36, 14, 22, 0, 'Scatter', 'TIDAK DITEMUKAN', 'Menengah', 'Tinggi', 'Sedang', '-6.601698,106.804668', 'default.jpg'),
(105, 5, 'FJA', 'Perumahan Bogor Nirwana Residence, Jl. Bogor Nirwana Residence', 0, 9, 72, 19, 53, 0, 'Cluster', 'dekat pintu masuk gerbang utama BNR dekat cluster Invinite Residence dengan tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.617925,106.798260', 'fja.jpg'),
(106, 5, 'FX', 'Jl. Achmad Sobana', 380, 8, 64, 50, 14, 0, 'Scatter', 'berada di pinggir jalan raya lokasi dekat dengan perempatan lampu merah dan terdapat ruko', 'Menengah', 'Tinggi', 'Sedang', '-6.580825, 106.807113', 'FX.PNG'),
(107, 5, 'FJB', 'Perumahan Bogor Nirwana Residence', 0, 26, 208, 112, 95, 1, 'Cluster', 'di dalam perumahan BNR dengan tipe perumahan mewah', 'Mewah', 'Tinggi', 'Tinggi', '-6.623086,106.798033', 'fjb.jpg'),
(108, 5, 'FW', 'Jl. Papandayan (samping kantor WITEL Pajajaran)', 1121, 27, 296, 199, 22, 70, 'Scatter', 'di sekitarnya banyak yang berjualan terdapat perumahan dan beberapa gedung perkantoran', 'Mewah', 'Tinggi', 'Tinggi', '-6.586996, 106.805419', 'FW.PNG'),
(109, 5, 'FJC', 'Perumahan Bogor Nirwana Residence', 0, 19, 152, 81, 68, 3, 'Cluster', 'di dalam perumahan BNR dengan tipe perumahan mewah berada di pinggir jalan', 'Mewah', 'Tinggi', 'Tinggi', '-6.621037,106.796850', 'fjc.jpg'),
(110, 5, 'FV', 'Perumahan Indraprasta Townhouse, Jl. Gatot Kaca Raya', 500, 5, 40, 25, 13, 0, 'Cluster', 'perumahan kelas menengah-atas (town house) (ODC ada namun tidak ada nama)', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.567542,106.811735', 'FV.PNG'),
(111, 5, 'FK', 'Jl. Achmad Adnawijaya,Bantarjati', 700, 13, 112, 52, 33, 0, 'Scatter', 'Di sekitarnya terdapat ruko-ruko, dan pemukiman warga', 'Menengah', 'Tinggi', 'Sedang', '-6.569653,106.811112', 'FK.jpg'),
(112, 5, 'FU', 'Perumahan Villa Tajur, Jl. Satriamaya', 0, 32, 256, 112, 119, 5, 'Cluster', 'kondisi cluster ramai penghuni sehingga memungkinkan untuk melakukan penjualan', 'Mewah', 'Tinggi', 'Tinggi', '-6.635973,106.835223', 'FU.PNG'),
(113, 5, 'FL', 'Perumahan Cimanggu Hejo, Jl. Perikanan Darat', 650, 20, 168, 85, 83, 0, 'Cluster', 'terdapat di dalam perumahan Cimanggu Hejo dekat gerbang utama pojok kiri', 'Menengah', 'Tinggi', 'Sedang', '-6.569777,106.784611', 'FL.jpg'),
(114, 5, 'FM', 'Perumahan Danau Bogor Raya, Jl. Golf Estate Bogor Raya', 0, 45, 360, 169, 182, 9, 'Cluster', 'suasana disekitar ODC ramai berpotensi untuk melakukan penjualan', 'Mewah', 'Tinggi', 'Tinggi', '-6.604552,106.836917', 'fm.jpg'),
(115, 5, 'FP', 'Komplek Pakuan, Jl. Pakuan Hill Raya, cluster Latania', 1367, 20, 288, 85, 201, 2, '', 'cluster berada di dalam perumahan suasana cluster disetiap rumah nampak banyak penghuni namun dari data banyak yang sudah menggunakan Indihome.', 'Menengah-Atas', 'Tinggi', 'Tinggi', '-6.635785,106.818785', 'fp.jpg'),
(116, 5, 'FQ', 'Perumahan Cirua Asri, Jl. Anyelir', 0, 33, 280, 249, 29, 2, 'Cluster', 'ODC mencatu cluster namun tidak perlu melakukan penjualan karena pengguna indihome sudah banyak', 'Menengah', 'Tinggi', 'Sedang', '-6.555789,106.826886', 'fq-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sto`
--

CREATE TABLE `tb_sto` (
  `id` int(11) NOT NULL,
  `nama_sto` varchar(128) NOT NULL,
  `kode_sto` varchar(128) NOT NULL,
  `datel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sto`
--

INSERT INTO `tb_sto` (`id`, `nama_sto`, `kode_sto`, `datel_id`) VALUES
(1, 'Leuwiliang', 'LWL', 1),
(2, 'Semplak', 'SPL', 1),
(3, 'Parung', 'PAR', 1),
(4, 'Pagelaran', 'PAG', 1),
(5, 'Bogor', 'BOO', 1),
(6, 'Cigudeg', 'CGD', 1),
(7, 'Jasinga', 'JSA', 1),
(8, 'Lebak Wangi', 'LBI', 1),
(9, 'Ciapus', 'CPS', 1),
(10, 'Dramaga', 'DMG', 1),
(11, 'Ciseeng', 'CSE', 1),
(12, 'Cijeruk', 'CJU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_access`
--

CREATE TABLE `tb_user_access` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_access`
--

INSERT INTO `tb_user_access` (`id`, `user_id`, `sto_id`) VALUES
(1, 8, 1),
(3, 6, 1),
(4, 6, 2),
(5, 6, 3),
(6, 6, 4),
(7, 6, 12),
(8, 6, 11),
(9, 6, 10),
(10, 6, 9),
(11, 6, 8),
(12, 6, 7),
(13, 6, 6),
(14, 6, 5),
(15, 25, 4),
(16, 24, 5),
(17, 25, 9),
(18, 25, 12),
(19, 23, 1),
(20, 23, 10),
(21, 23, 7),
(22, 27, 5),
(23, 26, 5),
(24, 23, 5),
(25, 28, 5),
(26, 25, 5),
(27, 29, 5),
(28, 9, 5),
(29, 9, 6),
(30, 30, 5),
(31, 30, 1),
(32, 30, 2),
(33, 30, 3),
(34, 30, 4),
(35, 30, 6),
(36, 30, 12),
(37, 30, 11),
(38, 30, 10),
(39, 30, 9),
(40, 30, 8),
(41, 30, 7),
(42, 31, 1),
(43, 31, 2),
(44, 31, 3),
(45, 31, 4),
(46, 31, 5),
(47, 31, 6),
(48, 31, 7),
(49, 31, 8),
(50, 31, 9),
(51, 31, 10),
(52, 31, 11),
(53, 31, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role_id`, `is_active`, `date_created`, `image`) VALUES
(6, 'Muhamad Naufal Syaiful Bahri', 'mnsbahri', '$2y$10$IpsO.OJapjM9R.9ASpfXqOusfrVp23bsu4ewoLz7g7bDnLenAEqo.', 1, 1, 1562554707, 'alarm.jpg'),
(8, 'Budi Sarudi', 'budisarudi', '$2y$10$2Y3jguj1yKYStP4x8vCN0ODxJT/flh/OprH5mP1alkhMFvT0Awz3C', 3, 1, 1562628957, 'default.png'),
(9, 'Udin Sarudin', 'udinsarudin123', '$2y$10$Rh4zS1ebPKJgt3.vdGqPQucfNvWeUL9fmxkxzkqnIsLoAFgFQyHPK', 6, 1, 1562935737, 'default.png'),
(13, 'Betutut Ciluk', 'betutut123', '$2y$10$h5kL1sbkANfViUwbSL6CwutADZX6joNc7NRhMiOljj6BYBBBna5O.', 5, 1, 1562946862, 'default.png'),
(24, 'caaacaaa', 'caaacaaa', '$2y$10$7B.AEr74yuWQUAkcyXgju.s96JiIIEKxUsng.1b6rtyl5dzg4h78K', 2, 1, 1563873166, 'default.png'),
(25, 'SYARIEF ADAM HIBATULLAH', 'adamsyaaar_', '$2y$10$/UaVbNHb8MAMMshtGdgjZuQ4mokV6dKUliRfiYyo9tX.VaxQ/n9mW', 2, 1, 1563935942, 'default.png'),
(26, 'Shalahuddin Fikri Haekal', 'haekalLW', '$2y$10$8BGtqzZUMR3iSnCTh.6lx.v43ayA6A1OeaZUQ9o9h3hzb3rfCUTpO', 2, 1, 1563936060, 'default.png'),
(27, 'Annisa Ditia', 'Ditiannisa1204', '$2y$10$zmZdHcrzcFxR8THXO.UOXOm5WlQ.SDI6HXp8gE/ALz1vvANt/nzqm', 2, 1, 1563936119, 'default.png'),
(28, 'Muhammad Elsandrie Rakatama', 'RRQellemon', '$2y$10$U3Dsp8GktTVQHvhzqaBUSO1Qm.6PsKHkaZRY2BpAmFBOJd2sAtFnW', 3, 1, 1563959724, 'download.jpg'),
(29, 'Fauzan Dizki Alif Azmi Siregar', 'alifsiregar', '$2y$10$ullxEts9.4ri5hXYq0z.j.gHh6zHC/202U99bR4VVIR0aVR/TdrJS', 2, 1, 1564125638, 'default.png'),
(30, 'edi sumarsono', 'edisumarsono', '$2y$10$prEjl7jx5yIAHeCf/pk.qO5mWPqQkA2PDWbV0I9qIMBEoJqXp8n7C', 2, 1, 1564391776, 'fotoku_.jpg'),
(31, 'NOVI ARDITA', 'noviardita', '$2y$10$.LBZ0uJ13ICvJ7c0RtlxauDRO8t8YnmfBvYo8VqEhN7vNh31FK6IG', 2, 1, 1564393213, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 3),
(7, 1, 4),
(8, 5, 3),
(9, 5, 2),
(11, 6, 3),
(12, 2, 1),
(13, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Asman Sales & Cust. Care'),
(3, 'Kepala Usaha dan Bisnis'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Asman Sales & Cust. Care'),
(3, 'KAUBIS'),
(4, 'NONE (Default)'),
(5, 'Kakandatel'),
(6, 'KSTO');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 0),
(2, 3, 'My Profile', 'user/profile', 'fas fa-fw fa-user-circle', 0),
(3, 1, 'Access Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(4, 1, 'Total User', 'admin', 'fas fa-fw fa-users', 0),
(5, 1, 'Activity Log', 'admin', 'fas fa-fw fa-list-alt', 0),
(6, 2, 'Role Kaubis', 'user', 'fab fa-fw fa-black-tie', 0),
(7, 3, 'Pengelolaan Demands Kujang', 'user/alpro', 'fas fa-fw fa-tools', 1),
(8, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 0),
(9, 4, 'Sub Menu Management', 'menu/submenu', 'fas fa-folder-open', 1),
(10, 1, 'Role User', 'admin/roleuser', 'fab fa-fw fa-black-tie', 1),
(11, 2, 'Datel', 'asman/datel', 'fas fa-fw fa-building', 0),
(12, 2, 'STO', 'asman/sto', 'fas fa-fw fa-satellite-dish', 1),
(13, 2, 'ODC', 'asman/odc', 'fas fa-fw fa-globe', 1),
(14, 1, 'Role A&K', 'admin/roleak', 'fas fa-fw fa-male', 0),
(15, 1, 'Competitor', 'admin/competitor', 'fas fa-fw fa-burn', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alpro`
--
ALTER TABLE `tb_alpro`
  ADD PRIMARY KEY (`id_alpro`);

--
-- Indexes for table `tb_competitor`
--
ALTER TABLE `tb_competitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_datel`
--
ALTER TABLE `tb_datel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_odc`
--
ALTER TABLE `tb_odc`
  ADD PRIMARY KEY (`id_odc`);

--
-- Indexes for table `tb_sto`
--
ALTER TABLE `tb_sto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_access`
--
ALTER TABLE `tb_user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alpro`
--
ALTER TABLE `tb_alpro`
  MODIFY `id_alpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_competitor`
--
ALTER TABLE `tb_competitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_datel`
--
ALTER TABLE `tb_datel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_odc`
--
ALTER TABLE `tb_odc`
  MODIFY `id_odc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tb_sto`
--
ALTER TABLE `tb_sto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user_access`
--
ALTER TABLE `tb_user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
