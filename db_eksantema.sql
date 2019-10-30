-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2015 at 04:18 PM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_eksantema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`, `phone`, `email`) VALUES
(1, 'admin', 'admin', 'Wawan', '+6281947472218', 'wawan22@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` int(3) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` text NOT NULL,
  `bobot` int(3) NOT NULL,
  PRIMARY KEY (`id_gejala`),
  UNIQUE KEY `kode_gejala` (`kode_gejala`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`, `bobot`) VALUES
(1, 'G1', 'Batuk', 1),
(2, 'G2', 'Koriza (Pilek)', 1),
(3, 'G3', 'Nyeri Otot', 1),
(4, 'G4', 'Erupsi Kulit ', 1),
(5, 'G5', 'Edema / Sembab di lengan dan kaki', 1),
(6, 'G6', 'Malaise / Lesu', 1),
(7, 'G7', 'Konjugtivitis Ringan', 1),
(8, 'G8', 'Bercak Koplik', 1),
(9, 'G9', 'Konjugtivitis', 3),
(10, 'G10', 'Nyeri Kepala', 3),
(11, 'G11', 'Nyeri Perut', 3),
(12, 'G12', 'Demam Subfebris', 3),
(13, 'G13', 'Anoreksia / Tidak nafsu makan', 3),
(14, 'G14', 'Timbul ruam halus di pipi dan dahi', 3),
(15, 'G15', 'Infeksi Nasofaring Ringan (Daerah tenggorokan bagian atas di belakang hidung)', 3),
(16, 'G16', 'Diare', 3),
(17, 'G17', 'Krusta (Luka nanah, darah yang mengering)', 3),
(18, 'G18', 'Lesi pada bokong (Sejenis Ruam)', 3),
(19, 'G19', 'Gatal di bagian Ruam', 3),
(20, 'G20', 'Demam Tinggi', 5),
(21, 'G21', 'Limfadenopati / pembengkakan kelenjar limfa', 5),
(22, 'G22', 'Muntah', 5),
(23, 'G23', 'Menggigil', 5),
(24, 'G24', 'Bakteriemia tanpa Sepsi (Bakteri dalam darah)', 5),
(25, 'G25', 'Meningitis (Radang selaput otak)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_konsultasi`
--

CREATE TABLE IF NOT EXISTS `hasil_konsultasi` (
  `id_konsultasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `konsultasi` int(10) NOT NULL,
  `id_gejala` int(3) NOT NULL,
  `bobot` int(3) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_konsultasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `hasil_konsultasi`
--

INSERT INTO `hasil_konsultasi` (`id_konsultasi`, `id_user`, `konsultasi`, `id_gejala`, `bobot`, `waktu`) VALUES
(32, 4, 4, 2, 1, '2015-12-13 15:56:42'),
(31, 4, 4, 1, 1, '2015-12-13 15:56:42'),
(30, 3, 3, 25, 5, '2015-12-13 11:51:43'),
(29, 3, 3, 23, 5, '2015-12-13 11:51:43'),
(28, 3, 3, 21, 5, '2015-12-13 11:51:43'),
(27, 3, 3, 19, 3, '2015-12-13 11:51:43'),
(26, 3, 3, 16, 3, '2015-12-13 11:51:43'),
(25, 3, 3, 14, 3, '2015-12-13 11:51:43'),
(24, 3, 3, 8, 1, '2015-12-13 11:51:43'),
(10, 1, 2, 1, 1, '2015-12-11 18:08:46'),
(11, 1, 2, 5, 1, '2015-12-11 18:08:46'),
(12, 1, 2, 7, 1, '2015-12-11 18:08:46'),
(13, 1, 2, 9, 3, '2015-12-11 18:08:46'),
(14, 1, 2, 11, 3, '2015-12-11 18:08:46'),
(15, 1, 2, 12, 3, '2015-12-11 18:08:46'),
(16, 1, 2, 13, 3, '2015-12-11 18:08:46'),
(33, 4, 4, 4, 1, '2015-12-13 15:56:42'),
(34, 4, 4, 5, 1, '2015-12-13 15:56:42'),
(35, 4, 4, 11, 3, '2015-12-13 15:56:42'),
(36, 4, 4, 13, 3, '2015-12-13 15:56:42'),
(37, 4, 4, 16, 3, '2015-12-13 15:56:42'),
(38, 4, 4, 20, 5, '2015-12-13 15:56:42'),
(39, 4, 4, 22, 5, '2015-12-13 15:56:42'),
(40, 5, 5, 1, 1, '2015-12-13 16:06:27'),
(41, 5, 5, 2, 1, '2015-12-13 16:06:27'),
(42, 5, 5, 4, 1, '2015-12-13 16:06:27'),
(43, 5, 5, 5, 1, '2015-12-13 16:06:27'),
(44, 5, 5, 11, 3, '2015-12-13 16:06:27'),
(45, 5, 5, 13, 3, '2015-12-13 16:06:27'),
(46, 5, 5, 16, 3, '2015-12-13 16:06:27'),
(47, 5, 5, 20, 5, '2015-12-13 16:06:27'),
(48, 5, 5, 22, 5, '2015-12-13 16:06:27'),
(49, 6, 6, 1, 1, '2015-12-13 16:09:40'),
(50, 6, 6, 2, 1, '2015-12-13 16:09:40'),
(51, 6, 6, 4, 1, '2015-12-13 16:09:40'),
(52, 6, 6, 5, 1, '2015-12-13 16:09:40'),
(53, 6, 6, 11, 3, '2015-12-13 16:09:40'),
(54, 6, 6, 13, 3, '2015-12-13 16:09:40'),
(55, 6, 6, 16, 3, '2015-12-13 16:09:40'),
(56, 6, 6, 20, 5, '2015-12-13 16:09:40'),
(57, 6, 6, 22, 5, '2015-12-13 16:09:40'),
(58, 6, 7, 1, 1, '2015-12-13 16:13:07'),
(59, 6, 7, 2, 1, '2015-12-13 16:13:07'),
(60, 6, 7, 3, 1, '2015-12-13 16:13:07'),
(61, 6, 7, 8, 1, '2015-12-13 16:13:07'),
(62, 6, 7, 9, 3, '2015-12-13 16:13:07'),
(63, 6, 7, 11, 3, '2015-12-13 16:13:07'),
(64, 6, 7, 20, 5, '2015-12-13 16:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(10) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(4) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul`, `isi`, `tgl`, `ket`) VALUES
(7, 'Virus Eksantema', 'Eksantema adalah erupsi kulit yang sejenis, luas, atau generalisata, dengan perkembangan yang dinamis. Penyakit Eksantema biasanya berhubungan dengan virus atau bakteri, toksin, dan proses imun, tapi juga dapat disebabkan oleh paparan obat. Penyebab tersering dari penyakit eksantema adalah infeksi virus\r\n\r\nVirus Eksantema adalah erupsi kulit yang timbul sebagai tanda dari sebuah infeksi akut yang disebabkan oleh virus.Terdapat beberapa patogen dominan yang paling sering menyebabkan penyakit eksantema. Virus eksantema pada umumnya berkaitan dengan penyakit yang dapat sembuh dengan sendirinya. Meskipun demikian, pada beberapa kasus diagnosis dari sebuah eksantema dapat menjadi sangat penting untuk pasien dan kontak mereka dengan orang disekitar mereka', '2015-12-12', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE IF NOT EXISTS `keterangan` (
  `id_keterangan` int(10) NOT NULL AUTO_INCREMENT,
  `id_konsultasi` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` double NOT NULL,
  `kode_penyakit` varchar(3) NOT NULL,
  `tgl_konsultasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keterangan`),
  UNIQUE KEY `id_konsultasi` (`id_konsultasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `id_konsultasi`, `nama`, `nilai`, `kode_penyakit`, `tgl_konsultasi`) VALUES
(2, 2, 'sdsd', 0.17241379310345, 'P01', '2015-12-11 18:08:47'),
(4, 3, 'wawan', 0.64705882352941, 'P04', '2015-12-13 11:51:45'),
(5, 4, 'Ferri Achmad', 0.61538461538462, 'P05', '2015-12-13 15:56:45'),
(6, 5, 'hj', 0.58823529411765, 'P04', '2015-12-13 16:06:29'),
(7, 6, 'wawan', 0.58823529411765, 'P04', '2015-12-13 16:09:42'),
(8, 7, 'wawan', 0.55, 'P02', '2015-12-13 16:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`kode_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `ket`, `solusi`) VALUES
('P04', 'Campak Atipik', 'Campak Atipik adalah proses imunisasi dari vaksin campak yang diinaktivasi kemudian terpapar oleh virus campak alamiah, dapat mengalami sindroma yang disebut campak atipik. Prosedur inaktivasi yang digunakan dalam produksi vaksin akan merusak imunogenisitas protein F virus. walaupun vaksin mengembangkan respon antibody yang baik terhadap protein H, tanpa adanya infeksi antibody F dapat dimulai dan virus dapat menyebar dari sel ke sel melalui penyatuan. Keadaan ini akan cocok untuk reaksi patologik imun yang dapat memperantarai campak atipik', 'Lakukan Imunisasi Virus Campak atau vaksinasi campak.'),
('P02', 'Campak', 'Penyakit campak  adalah infeksi yang disebabkan oleh virus. Campak, bisa menjadi penyakit yang berbaya, bahkan fatal, bagi anak-anak dibawah usia 5 tahun. Gejala campak terlihat setelah 7 sampai degan 14 hari terinfeksi virus. Penyakit ini ditularkan dari orang ke orang melalui percikan liur (droplet) yang terhirup', '<br>\r\n1.Pemberian Vitamin A 2x200.000 IU dengan interval 24 jam\r\n<br>\r\n2.Vaksinasi MMR / Rubela & Mumps\r\n'),
('P03', 'Rubela', 'Rubela atau campak Jerman umumnya menyerang anak-anak dan remaja. Penyakit ini disebabkan oleh virus rubella dan dapat menyebar dengan sangat mudah.\r\nPenularan utamanya dapat melalui titik-titik air di udara yang berasal dari batuk atau bersin penderita. Berbagi makanan atau minuman dengan penderita juga dapat menularkan rubella. Sama halnya jika Anda menyentuh mata, hidung, atau mulut Anda setelah memegang benda yang terkontaminasi virus rubella\r\n', 'Lakukan Vaksinasi Rubela & Mumps (MMR) di Rumah Sakit'),
('P01', 'Scarlet Fever', 'Scarlet fever merupakan sejenis infeksi yang disebabkan oleh bakteri streptococcus. Bakteri ini akan mengganggu kesehatan anak dengan menyebarkan virus atau racun yang menyebabkan munculnya ruam-ruam kemerahan di sekujur tubuh penderita. Tidak semua bakteri sejenis streptococcus dapat menyebarkan virusnya karena tidak semua anak-anak lemah dan senstitif terhadapnya. Gejala yang ditunjukkan oleh anak yang sedang terjangkit bakteri ini biasanya akan dimulai dengan sakit tenggorokan yang bisa diatasi dengan pemberian antibiotik. Setelah tenggorokan sakit, kulit sehat anak juga akan mulai berubah warna seperti efek dari paparan sinar matahari.', 'Berikan antibiotik Penisilin per oral/IV dan antibiotik eritromisin.'),
('P05', 'Meningococcemia', 'Meningococcemia adalah adanya meningococcus dalam aliran darah. Meningococcus, bakteri Neisseria meningitidis secara resmi disebut, dapat menjadi salah satu penyakit menular yang paling dramatis dan cepat fatal semua', 'Lakukan Terapi di rumah sakit dengan Antibiotik Ampisilin dan kloramfenikol, setelah hasil kultur positif maka berikan penisilin G 250.000-300.000 U/Kg/Hari dalam 6 kali pemberian. Jika Alergi terhadap penisilin berikan kloramfenikol 100 Mg/Hari'),
('P06', 'Hand-Foot-Mouth Disease (HFMD)', '\r\nPenyakit Hand, Foot, and Mouth Disease (HFMD) merupakan virus RNA yang termasuk dalam genus Entero virus, famili Picornaviridae , memiliki ukuran partikel 27nm, virion RNA messenger : 31% . RNA di virion bersifat stabil dalam pH asam (pH 3,0- 5,0) selama 1-3 jam? komposisi RNA: A=30%, U=24%, G=23%, C=23%? serta hidup di dalam sel inang dengan mengadakan replikasi RNA-nya. HFMD merupakan penyakit yang sangat menular, terutama pada musim panas. Penularannya melalui jalur fekal-pral (pencernaan) dan saluran pernafasan.', 'Lakukan terapi Simptomatis dirumah sakit');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_gejala`
--

CREATE TABLE IF NOT EXISTS `penyakit_gejala` (
  `id_pg` int(3) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(10) NOT NULL,
  `id_gejala` int(3) NOT NULL,
  PRIMARY KEY (`id_pg`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `penyakit_gejala`
--

INSERT INTO `penyakit_gejala` (`id_pg`, `kode_penyakit`, `id_gejala`) VALUES
(75, 'P04', 23),
(74, 'P04', 22),
(68, 'P03', 21),
(56, 'P01', 20),
(55, 'P01', 11),
(54, 'P01', 10),
(53, 'P01', 5),
(52, 'P01', 4),
(51, 'P01', 3),
(67, 'P03', 13),
(61, 'P02', 20),
(60, 'P02', 9),
(59, 'P02', 8),
(58, 'P02', 2),
(57, 'P02', 1),
(66, 'P03', 12),
(65, 'P03', 7),
(64, 'P03', 6),
(63, 'P03', 2),
(62, 'P03', 1),
(73, 'P04', 20),
(72, 'P04', 19),
(71, 'P04', 14),
(70, 'P04', 10),
(69, 'P04', 6),
(88, 'P05', 25),
(87, 'P05', 24),
(86, 'P05', 15),
(85, 'P06', 18),
(84, 'P06', 17),
(83, 'P06', 13),
(82, 'P06', 12),
(81, 'P06', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `tgl_konsultasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `umur`, `tgl_konsultasi`) VALUES
(1, 'sdsd', '21', '2015-12-11 18:07:57'),
(2, 'Ferri Achmad', '22', '2015-12-13 11:48:19'),
(3, 'wawan', '22', '2015-12-13 11:51:27'),
(4, 'Ferri Achmad', '22', '2015-12-13 15:55:39'),
(5, 'hj', '22', '2015-12-13 16:03:10'),
(6, 'wawan', '22', '2015-12-13 16:08:20');
