-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 03:12 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerse_cofeeresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'Handayani', '111', '111', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `id_toko`, `file`) VALUES
(3, '16', '20210731020403padi.jpg'),
(4, '16', '20210731020435kwitasni.jpg'),
(5, '16', '20210731020439kochenk.jpg'),
(6, '66', '20210812084544Capture.PNG'),
(7, '66', '20210812084609padi.jpg'),
(8, '13', '20210820042617padi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `id_toko` varchar(10) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `alamat_karyawan` varchar(200) NOT NULL,
  `nohp_karyawan` varchar(13) NOT NULL,
  `jabatan_karyawan` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_toko`, `nama_karyawan`, `alamat_karyawan`, `nohp_karyawan`, `jabatan_karyawan`, `username`, `password`) VALUES
(4, '4', 'Udin penyok', 'maransi city', '1234567890', 'marketing ex', '', ''),
(5, '16', 'asdas', 'asdas', 'asdas', 'asdas', '', ''),
(6, '2', 'asdas', 'asdas', 'asdas', 'asdas', '', ''),
(7, '4', 'giga', 'solok', '123565867345', 'mhs', '', ''),
(9, '1', 'ascasascas', 'sacascsa', 'sacasc', 'sacas', '', ''),
(11, '16', 'Si A', 'disana', '08121212', 'IT', '000', '000'),
(12, '66', 'sdvndsjn', 'nkwdvndfkjn', 'knsdkjvndfkjn', 'jskdnkjdfenbv', '00', '00'),
(13, '42', 'Fitri', 'disana', '081212121212', 'Helper', 'qq', 'qq'),
(14, '42', 'Hamid ', 'disana', '0812121', 'IT', 'pp', 'pp');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Bungus Teluk Kabung'),
(2, 'Koto Tangah'),
(3, 'Kuranji'),
(4, 'Lubuk Begalung'),
(5, 'Lubuk Kilangan'),
(8, 'Nanggalo'),
(9, 'Padang Barat'),
(10, 'Padang Selatan'),
(11, 'Padang Timur'),
(12, 'Padang Utara'),
(13, 'Pauh'),
(14, 'Maransi');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `id_domisili` varchar(20) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `id_toko` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_domisili`, `ongkir`, `id_toko`) VALUES
(15, '1', 4000, '16'),
(16, '2', 3000, '16'),
(17, '3', 6500, '16'),
(18, '4', 0, '16'),
(19, '5', 7000, '16'),
(20, '6', 0, '16'),
(21, '7', 0, '16'),
(22, '1', 5000, '66'),
(23, '2', 5000, '66'),
(24, '3', 7000, '66'),
(25, '4', 3000, '66'),
(26, '5', 7000, '66'),
(27, '6', 6000, '66'),
(28, '7', 8000, '66'),
(29, '1', 4000, '13'),
(30, '2', 0, '13'),
(31, '3', 0, '13'),
(32, '4', 0, '13'),
(33, '5', 0, '13'),
(34, '8', 0, '13'),
(35, '9', 0, '13'),
(36, '10', 0, '13'),
(37, '11', 0, '13'),
(38, '12', 0, '13'),
(39, '13', 0, '13'),
(40, '14', 0, '13');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `id_domisili` varchar(5) NOT NULL,
  `nohp_pelanggan` varchar(16) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `id_domisili`, `nohp_pelanggan`, `username`, `password`) VALUES
(1, 'heru', 'pasar baru', '', '0854346578', 'mail@mail', '123'),
(2, 'Hamid Septian', 'Maransi City', '', '081212121212', '123', '123'),
(3, 'dsfwe', 'trhdfh', '', 'gdfhfd', '111', '111'),
(4, 'Hamid Septian', 'Maransi', '1', '081212121212', '11', '11'),
(5, 'Jemmy', 'disana', '3', '0821213', 'ee', 'ee'),
(6, 'Udin penyok', 'disana', '1', '0182121', '22', '22'),
(7, 'Firei', 'disana', '3', '133453453', 'dd', 'dd'),
(8, 'Fitri Handayani', 'Jalan Maransi Air Pacah', '2', '081254432332', 'ww', 'ww');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `jumlah_pesanan` int(4) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `id_toko` varchar(20) NOT NULL,
  `tanggal_pesan` varchar(25) NOT NULL,
  `status_pesanan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_produk`, `jumlah_pesanan`, `id_pelanggan`, `id_toko`, `tanggal_pesan`, `status_pesanan`) VALUES
(35, '32', 2, '6', '16', '2021-08-01 08:50:10', 'Selesai'),
(36, '34', 2, '6', '16', '2021-08-01 08:57:38', 'Order'),
(37, '8', 3, '6', '66', '2021-08-01 08:57:38', 'Order'),
(38, '3', 3, '4', '66', '2021-08-01 10:23:27', 'Proses'),
(39, '33', 2, '4', '16', '2021-08-01 10:23:27', 'Di batalkan'),
(40, '37', 3, '4', '16', '2021-08-01 10:23:27', 'Di batalkan'),
(41, '41', 1, '4', '16', '2021-08-01 10:23:27', 'Di batalkan'),
(42, '3', 2, '4', '66', '2021-08-01 10:24:02', 'Order'),
(43, '47', 2, '4', '42', '2021-08-12 19:44:16', 'Selesai'),
(44, '49', 2, '4', '42', '2021-08-12 19:44:16', 'Selesai'),
(45, '50', 2, '4', '42', '2021-08-12 19:44:16', 'Selesai'),
(46, '4', 3, '7', '66', '2021-08-12 20:33:25', 'Selesai'),
(47, '7', 6, '7', '66', '2021-08-12 20:33:25', 'Selesai'),
(49, '4', 4, '7', '66', '2021-07-12 20:34:46', 'Selesai'),
(50, '25', 3, '7', '50', '2021-08-12 20:34:46', 'Order'),
(51, '49', 4, '7', '42', '2021-08-12 20:34:46', 'Proses'),
(52, '47', 2, '4', '42', '2021-08-16 08:06:52', 'Selesai'),
(53, '52', 3, '4', '42', '2021-08-16 08:06:52', 'Selesai'),
(54, '53', 5, '4', '42', '2021-08-16 08:06:52', 'Selesai'),
(55, '61', 2, '4', '42', '2021-08-16 08:06:52', 'Selesai'),
(56, '50', 2, '4', '42', '2021-08-16 08:06:52', 'Selesai'),
(57, '47', 1, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(58, '48', 1, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(59, '49', 3, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(60, '51', 2, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(61, '52', 2, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(62, '55', 4, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(63, '54', 3, '8', '42', '2021-08-16 08:18:22', 'Selesai'),
(64, '59', 2, '8', '42', '2021-08-16 08:18:22', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_toko` varchar(25) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_toko`, `nama_produk`, `harga`, `gambar_produk`) VALUES
(3, '66', 'Gubuk coffee milk', 16000, ''),
(4, '66', 'Coffee chocolate', 17000, ''),
(5, '66', 'Long black', 15000, ''),
(6, '66', 'Coffee latte', 15000, ''),
(7, '66', 'Vanilla latte', 16000, ''),
(8, '66', 'Vietnam drip ori', 14000, ''),
(9, '66', 'Vietnam drip milk', 15000, ''),
(10, '66', 'Coffee beer', 15000, ''),
(11, '66', 'Avocado coffee', 17000, ''),
(12, '66', 'Kentang goreng', 10000, ''),
(13, '66', 'Nugget', 12000, ''),
(14, '66', 'Chicken wings', 20000, ''),
(15, '66', 'Kebab', 18000, ''),
(16, '66', 'Mie rebus/goreng', 15000, ''),
(17, '66', 'Spaghetti', 14000, ''),
(18, '66', 'Beef barbeque', 20000, ''),
(19, '66', 'Beef spicy', 20000, ''),
(20, '66', 'Siomay goreng', 15000, ''),
(21, '50', 'Espresso', 12000, ''),
(22, '50', 'Macchiato', 14000, ''),
(23, '50', 'Minilatte', 14000, ''),
(24, '50', 'Bleck kopi', 13000, ''),
(25, '50', 'Cappuccino', 15000, ''),
(26, '50', 'Kopilatte', 15000, ''),
(27, '50', 'Kopimoka', 17000, ''),
(28, '50', 'Nteh latte', 12000, ''),
(29, '50', 'Nteh choco', 15000, ''),
(30, '50', 'Cokelat', 15000, ''),
(31, '50', 'Taro', 15000, ''),
(32, '16', 'Nila goreng', 11500, ''),
(33, '16', 'Gurame goreng', 13800, ''),
(34, '16', 'Kakap putih bakar', 14950, ''),
(35, '16', 'Kakap merah bakar', 16100, ''),
(36, '16', 'Paket kampoeng 1(nasi,ayam penyet,lalapan,sambal)', 15000, ''),
(37, '16', 'Paket kampoeng 2(nasi,ayam kremes,lalapan,sambal)', 18000, ''),
(38, '16', 'Paket kampoeng 3(nasi,ayam bakar,lalapan,sambal)', 18000, ''),
(39, '16', 'Paket mix pak tristo 1(kerang pelangi,kerang bumbu', 40000, ''),
(40, '16', 'Paket mix pak tristo 2(kerang pelangi,kerang bumbu', 65000, ''),
(41, '16', 'Paket mix pak tristo 3(kerang pelangi,kerang bumbu', 65000, ''),
(42, '16', 'Juice mangga', 14000, ''),
(43, '16', 'Juice alpukat', 13000, ''),
(44, '16', 'Juice nanas', 13000, ''),
(45, '16', 'Juice melon', 12000, ''),
(46, '16', 'Juice semangka', 10000, ''),
(47, '42', 'otak - otak', 6000, ''),
(48, '42', 'Lupis', 9000, ''),
(49, '42', 'Ketoprak', 16000, ''),
(50, '42', 'Lontong sayur', 15000, ''),
(51, '42', 'Lontong pical', 16000, ''),
(52, '42', 'Dimsum siomay', 16000, ''),
(53, '42', 'Dimsum lumpia', 15000, ''),
(54, '42', 'Bubur ayam', 18000, ''),
(55, '42', 'Bubur polos', 15000, ''),
(57, '42', 'Bihun ayam', 20000, ''),
(58, '42', 'Bihun goreng', 20000, ''),
(59, '42', 'Bihun karie', 22000, ''),
(60, '42', 'Kwetiaw kuah', 25000, ''),
(61, '42', 'Nasi rawon', 28000, ''),
(62, '42', 'Nasi Sup buntut', 45000, ''),
(64, '66', 'es durian', 30000, '20210812084512kochenk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(200) NOT NULL,
  `pemilik_toko` varchar(25) NOT NULL,
  `jenis_toko` varchar(25) NOT NULL,
  `keterangan_toko` text NOT NULL,
  `alamat_toko` text NOT NULL,
  `id_domisili` varchar(5) NOT NULL,
  `nohp_toko` varchar(16) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `iframe` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `pemilik_toko`, `jenis_toko`, `keterangan_toko`, `alamat_toko`, `id_domisili`, `nohp_toko`, `username`, `password`, `iframe`, `status`) VALUES
(1, 'Ampera Lusi se', 'Acok Baba', 'Coffee shop', 'ccccccc', 'disana', '', '08125324', '12', '123', '', '1'),
(2, 'Ante Dendeng Badaruak', '', 'Restoran', '', '', '', '', '', '', '', '1'),
(3, 'Aroma Kitchen Resto', '', 'Restoran', '', '', '', '', '', '', '', '4'),
(4, 'Ayam Rica Rica Mas Bagus', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(5, 'Bakso Lapangan Tembak', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(6, 'Bernama', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(7, 'Boboy Holand', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(8, 'Caf? Mega 2000', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(9, 'Golden Resto', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(10, 'Haus Tea', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(11, 'HD Resto', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(13, 'Hoya', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(14, 'Iko Gantinyo', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(15, 'J.CO Donat dan Cafe', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(16, 'Kampoeng Seafood', 'Udin', 'Restoran', 'Menjual ini dan itu', 'Jl. Samudera No.109, Olo, Kec. Padang Bar., Kota Padang, Sumatera Barat', '5', '082377517751', '11', '11', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.213944375759!2d100.34022064782364!3d-0.9204484177858534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4736c16a4eebce16!2sKPU%20Provinsi%20Sumatra%20Barat!5e0!3m2!1sen!2sid!4v1627713598591!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>                  	                                                                                          ', '1'),
(17, 'Keluarga', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(18, 'KFC', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(19, 'KFC Veteran', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(20, 'Kinol Bistro & Pool', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(21, 'Kuali Nyonya', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(22, 'Kubang Hayuda', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(23, 'Mandy?s Sweet Both', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(24, 'McDonald?s', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(25, 'Palanta Roemah Kajoe', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(26, 'Pizza Hut', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(27, 'Pondok Ikan Bakar', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(28, 'Pondok Ikan Bakar By Pass', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(29, 'Pondok Ikan Bakar By Pass Simp. Transito', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(30, 'Restoran Lamun Ombak', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(31, 'RM Apolio', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(32, 'RM Rajawali', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(33, 'RM Sari Raso', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(34, 'RM Sederhana', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(35, 'Rumah Makan Silungkang', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(36, 'Safari Caf? dan Resto', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(37, 'Safari Garden', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(38, 'Sate Manangkabau', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(39, 'Seafood Mama Hoky', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(40, 'Soerabi Bandung Enha', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(41, 'Soto Garuda', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(42, 'Warung Cokro', 'Sandri Adnin', 'Restoran', '', 'Jl. Nipah No.2e, Berok Nipah, Kec. Padang Bar., Kota Padang, Sumatera Barat', '(0751', '(0751) 32185', '22', '22', '', '1'),
(43, 'Warung Kito', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(44, 'Warung Kopi Nan Yo', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(45, 'Warung Kopi Nanyo Baru', '', 'Restoran', '', '', '', '', '', '', '', '0'),
(46, 'Bacarito Kopi', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(47, 'Bagan resto  coffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(48, 'Black coffee Padang', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(49, 'Bandrol Milk Shake & Coffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(50, 'Bengras Kopi', '', 'Coffee shop', '', '', '', '', '33', '33', '', '0'),
(51, 'Black Coffee On Dhim Dhim', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(52, 'Caf? Puci Chaniago', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(53, 'Central Coffee Solok Cab Padang', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(55, 'Coffee Rost', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(56, 'Coffee Theory', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(57, 'Coffee Toffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(58, 'Daun Pisang', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(59, 'De Vitos Coffee and Tea', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(60, 'Diva Coffee Padang', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(61, 'Dua Pintu Coffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(62, 'EI?s Coffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(63, 'El-Nino Coffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(65, 'Garade?A Coffee Shop', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(66, 'Gubuk Coffee', 'Si Dia', 'Coffee shop', 'Gubuk Coffee berada di jalan Samudera, Purus, Kecamatan Padang Barat Kota Padang Sumatera Barat. Perusahaan ini berdiri  pada  tanggal 22 Januari 2007. Pemilik  Gubuk Coffee ini bernama Riski Dinata. Gubuk kopi menyediakan minuman berbahan kopi dan makanan yang enak. Gubuk coffee juga menyediakan tempat duduk yang nyaman berkumpul dengan keluarga.', 'disini', '1', 'disana', '44', '44', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.384747418202!2d100.38347965!3d-0.88145015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4c76e1718aa8b%3A0x4c36ee611ff5c364!2sUniversitas%20Bung%20Hatta!5e0!3m2!1sen!2sid!4v1628775782767!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '1'),
(67, 'Gubuk Coffee Batang Kuranji', '', 'Coffee shop', 'Gubuk Coffee berada di jalan Samudera, Purus, Kecamatan Padang Barat Kota Padang Sumatera Barat. Perusahaan ini berdiri  pada  tanggal 22 Januari 2007. Pemilik  Gubuk Coffee ini bernama Riski Dinata. Gubuk kopi menyediakan minuman berbahan kopi dan makanan yang enak. Gubuk coffee juga menyediakan tempat duduk yang nyaman berkumpul dengan keluarga.', '', '', '', '55', '55', '', '0'),
(68, 'Happy Coffee Padang', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(69, 'Hau Bofet dan warung kopi', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(70, 'Hot Coffee And Chicken', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(71, 'Imagine coffee shop ', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(72, 'Kadai Kopi Gunung Padang', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(73, 'Kadai Kopi Hasmizal (ujang)', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(74, 'Kedai Kopi Ebony', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(75, 'Kedai Kopi Ebony2', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(76, 'Kedai Kopi Linggom ', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(77, 'Kedai Kopi Om Bin', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(78, 'Kedai Kopi Opa Mahmud', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(79, 'Kedai Kopi Syafni ', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(80, 'Kong Djie Coffee', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(81, 'Kopi Awak', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(82, 'Kopi batigo caf? 100% gayo', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(83, 'Kopi Dynamic Padang Stokes', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(84, 'Kopi Janji Jiwa', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(85, 'Kopi Luwak Indo', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(86, 'Kopi Ongga', '', 'Coffee shop', '', '', '', '', '', '', '', '0'),
(87, 'Warung Buk Ida', '', 'Coffee shop', 'ini dan itu', 'padang', '', '123', '12345', '123', '', '1'),
(88, 'Warung Buk Ida', '', 'Coffee shop', 'ini dan itu', 'padang', '', '123', '123456', '123', '', '0'),
(89, 'Toko ini dan itu', '', 'Coffee shop', 'menjual ini dan itu', 'disana', '1', '08121212', 'zz', 'zz', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.213944375759!2d100.34022064782364!3d-0.9204484177858534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4736c16a4eebce16!2sKPU%20Provinsi%20Sumatra%20Barat!5e0!3m2!1sen!2sid!4v1627713598591!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '0'),
(90, 'Warung Buk Ida sE', '', 'Coffee shop', 'menjual ini dan itu', 'disana', '4', '081212121212', 'ii', 'ii', '', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
