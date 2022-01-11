-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2021 at 04:35 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_testcbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ciri`
--

CREATE TABLE IF NOT EXISTS `tb_ciri` (
  `id_ciri` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ciri` text NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`id_ciri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tb_ciri`
--

INSERT INTO `tb_ciri` (`id_ciri`, `nama_ciri`, `bobot`) VALUES
(1, 'Bersin', 3),
(2, 'Demam', 4),
(3, 'Nafsu Makan Berkurang', 5),
(4, 'Lesu', 4),
(5, 'Batuk', 5),
(6, 'Mata Merah dan Berair', 4),
(7, 'Pembengkakan Hidung', 4),
(8, 'Nyeri Lambung', 3),
(9, 'Mencret', 2),
(10, 'Pilek', 2),
(16, 'Muntah-muntah', 3),
(17, 'Suara Nafas Berat', 2),
(18, 'Pengelupasan Kulit disekitar wajah dan Kepala', 1),
(19, 'Gangguan Syaraf dan Mata', 1),
(20, 'Sesak Nafas', 3),
(21, 'Dipinggir telinga terdapat kerak berwarna putih', 4),
(22, 'Sering Menggaruk-garuk', 5),
(23, 'Bulu Rontok dan Gatal disekitar telinga', 3),
(24, 'Mencakar Telinga', 5),
(25, 'Menggosok telinga pada dinding', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `id_jenis` varchar(5) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `detail_jenis` text NOT NULL,
  `solusi_jenis` text NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`, `detail_jenis`, `solusi_jenis`) VALUES
('A01', 'Feline Rhinotrhacheicis', 'Feline rhinotracheitis (FHV) adalah gangguan umum pada kucing dan anak kucing, dan bersama dengan feline calcivirus (FCV) dapat menyebabkan "flu kucing".\r\nSindrom ini menimbulkan infeksi mata (konjungtivitis, keluaran) dan/atau keluaran hidung dan/atau peradangan dan ulkus mulut. Hal ini mungkin karena agen patogen yang berbeda: termasuk herpesvirus dan calicivirus tetapi juga bakteri (chlamydophila).', 'Begitu hasil diagnosanya positif, pasien dapat menjalani pengobatan untuk merawatnya. Namun obat-obatan yang diberikan tak bisa menyembuhkannya, sebab hanya dapat mencegah gejalanya saja.'),
('A02', 'Feline Infectious Perintonitis', 'uatu penyakit pada kucing berakibat kematian yang sering mempengaruhi lapisan dada dan perut yang dapat menular dan disebabkan oleh Feline Coronavirus (FCoV)', 'Lakukan pengobatan dan rutin minum obat'),
('A03', 'Feline Chlmydiosis', 'Chlamydophila felis adalah jenis bakteri yang menyebabkan konjungtivitis pada kucing dan anak kucing.', 'Lakukan Pengobatan'),
('A04', 'Jamur Cryptococcus', 'Cryptococcus neoformans adalah jamur patogen oportunistik penyebab kriptokokosis, yaitu mikosis yang berpotensi mematikan pada manusia.', 'Lakukan pengobatan dan cek ke dokter kucing terdekat.'),
('A05', 'Cat Panleucopeni', 'Cat Panleucopeni adalah infeksi virus yang menyerang kucing, baik kucing liar maupun peliharaan. Penyakit ini disebabkan oleh parvovirus kucing yang merupakan kerabat dekat parvovirus anjing tipe 2 dan enteritis cerpelai.', 'Lakukan pengecekan ke dokter paru paru dan lakukan pengobatan yang rutin.'),
('A06', 'Asma', 'Asma', 'Berobat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE IF NOT EXISTS `tb_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` varchar(5) NOT NULL,
  `id_ciri` int(11) NOT NULL,
  PRIMARY KEY (`id_klasifikasi`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_ciri` (`id_ciri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id_klasifikasi`, `id_jenis`, `id_ciri`) VALUES
(1, 'A01', 1),
(2, 'A01', 3),
(3, 'A01', 5),
(5, 'A02', 1),
(6, 'A02', 2),
(7, 'A02', 8),
(8, 'A03', 1),
(10, 'A03', 5),
(11, 'A03', 6),
(18, 'A01', 2),
(19, 'A02', 4),
(21, 'A03', 8),
(23, 'A04', 4),
(24, 'A04', 6),
(26, 'A05', 3),
(27, 'A05', 5),
(30, 'A04', 3),
(31, 'A04', 5),
(32, 'A05', 8),
(33, 'A05', 9),
(35, 'A04', 9),
(36, 'A06', 3),
(37, 'A06', 16),
(38, 'A06', 7),
(39, 'A06', 9);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD CONSTRAINT `a` FOREIGN KEY (`id_ciri`) REFERENCES `tb_ciri` (`id_ciri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `b` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
