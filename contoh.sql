-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2017 at 12:49 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_butik`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(10) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jabatan`, `status`, `username`, `password`) VALUES
('20150001', 'Sheilla Rosysonya M.', 'Jember', '1997-07-12', 'Jl.Rengganis 51 Rambipuji', '0822577150', 'Manager', 'Tetap', 'sheilla', 'sheilla12'),
('20150002', 'Reksi Maulana ', 'Jember', '1992-05-19', 'Jl.Mawar Sumbersari ', '0856737876', 'Leader', 'Kontrak', 'reksi', 'reksi567'),
('20150003', 'Putri Yuni Ariska', 'Banyuwangi', '1996-06-08', 'Banyuwangi', '0865437823', 'Supervisor', 'Kontrak', 'riska', 'riska789'),
('20150004', 'Resi Arisandi', 'Bondowoso', '1995-02-02', 'Bondowoso', '0857345267', 'Supervisor', 'Tetap', 'resi', 'ressi234'),
('20150005', 'Melinda Puspita', 'Brebes', '1995-07-11', 'Patrang Jember', '0856765435', 'Leader', 'Tetap', 'melinda', 'meng123'),
('20150006', 'Rizqiyatul Auliyah', 'Pasuruan', '1990-02-14', 'Jl.Layur 87 Gempeng', '0856747837', 'Supervisor', 'Kontrak', 'auli', 'auli567'),
('20150007', 'Nurul Yaqin', 'Jember', '1996-08-13', 'Jl.Anggur 12 Rambipuji', '0987631237', 'Supervisor', 'Tetap', 'yaqin', 'babeh'),
('20150008', 'Bastian Adi Nugroho', 'Jember', '1995-06-09', 'Jl.Fatah 3 Kaliwates', '0856747646', 'Supervisor', 'Outsourcing', 'tianadi', 'tianyuhu'),
('20150009', 'Ahmad Rio Ubaidillah', 'Jember', '1993-07-19', 'Jl.Argopuro 59 Rambipuji', '0856747483', 'Operator', 'Outsourcing', 'ubaidilah', 'rio43'),
('20150010', 'Kinanti Rusiqin', 'Surabaya', '1992-02-08', 'Jl.Rumpi 16 Surabaya', '0987656789', 'Leader', 'Kontrak', 'nanti', 'nantiaja');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `nik` varchar(20) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nik`, `nama_karyawan`, `username`, `password`, `level`) VALUES
('20150001', 'Sheilla Rosysonya', 'sheilla', 'sheilla12', '1'),
('20150002', 'Reksi Maulana ', 'reksi', 'reksi567', '2'),
('20150003', 'Putri Yuni Ariska', 'riska', 'riska789', '2'),
('20150004', 'Resi Arisandi', 'resi', 'ressi234', '1'),
('20150005', 'Melinda Puspita', 'melinda', 'meng123', '1'),
('20150006', 'Rizqiyatul Auliyah', 'auli', 'auli567', '2'),
('20150007', 'Nurul Yaqin', 'yaqin', 'babeh', '1'),
('20150008', 'Bastian Adi Nugroho', 'tianadi', 'tianyuhu', '3'),
('20150009', 'Ahmad Rio Ubaidillah', 'ubaidilah', 'rio43', '3'),
('20150010', 'Kinanti Rusiqin', 'nanti', 'nantiaja', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
