-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 02:56 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_validasi`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `kodedatelotomatis` (`nomer` INT) RETURNS VARCHAR(5) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("D", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kodeodpotomatis` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("ODP", LPAD(urut, 5, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kodeoltotomatis` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 NO SQL
BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("OLT", LPAD(urut, 5, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kodepegawaiotomatis` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("P", LPAD(urut, 7, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `koderegionalotomatis` (`nomer` INT) RETURNS VARCHAR(5) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("R", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kodespecotomatis` (`nomer` INT) RETURNS VARCHAR(6) CHARSET latin1 NO SQL
BEGIN
DECLARE kodebaru CHAR(6);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("Spec", LPAD(urut, 2, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kodestootomatis` (`nomer` INT) RETURNS VARCHAR(5) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("S", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `kodewitelotomatis` (`nomer` INT) RETURNS VARCHAR(5) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(5);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("W", LPAD(urut, 4, 0));
 
RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `datel`
--

CREATE TABLE `datel` (
  `idDatel` varchar(5) NOT NULL,
  `namaDatel` varchar(20) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `idWitel` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datel`
--

INSERT INTO `datel` (`idDatel`, `namaDatel`, `keterangan`, `idWitel`) VALUES
('D0001', 'Kendal', '', 'W0001'),
('D0002', 'Semarang Kota', NULL, 'W0001'),
('D0003', 'Ungaran', NULL, 'W0001');

--
-- Triggers `datel`
--
DELIMITER $$
CREATE TRIGGER `datelotomatis` BEFORE INSERT ON `datel` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idDatel,2,5) AS Nomer
FROM datel ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodedatelotomatis(i));
 
IF(NEW.idDatel IS NULL OR NEW.idDatel = '')
 THEN SET NEW.idDatel =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `merek_olt`
--

CREATE TABLE `merek_olt` (
  `idMerek` varchar(6) NOT NULL,
  `namaMerek` varchar(20) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek_olt`
--

INSERT INTO `merek_olt` (`idMerek`, `namaMerek`, `keterangan`) VALUES
('merk1', 'ZTE', NULL),
('merk2', 'Huawei', NULL),
('merk3', 'ALU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` varchar(8) NOT NULL,
  `namaPegawai` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namaPegawai`, `username`, `password`, `status`) VALUES
('P0000001', 'Sekar Rini Abidin', 'admin1', 'admin1', 'Admin'),
('P0000002', 'Nahdatin Hasanah B Jumala', 'admin2', 'admin2', 'Admin'),
('P0000003', 'Darto', 'daman1', 'daman1', 'Daman'),
('P0000004', 'Riky Hargiarto', 'daman2', 'daman2', 'Daman'),
('P0000005', 'Abid Irfan Nuhaa', 'hddaman1', 'hddaman1', 'HD Daman'),
('P0000006', 'Ardiant Yosa Hastaka', 'hddaman2', 'hddaman2', 'HD Daman'),
('P0000007', 'Arga Wisnu Nugroho', 'hddaman3', 'hddaman3', 'HD Daman'),
('P0000008', 'Dhimas Dharu Widyatama', 'hddaman4', 'hddaman4', 'HD Daman'),
('P0000009', 'Erwin Noor Ardiansyah', 'hddaman5', 'hddaman5', 'HD Daman'),
('P0000010', 'Faiz Hammam', 'hddaman6', 'hddaman6', 'HD Daman'),
('P0000011', 'Haris Nur Abdul Azis', 'hddaman7', 'hddaman7', 'HD Daman'),
('P0000012', 'Himawan Kuncoro', 'hddaman8', 'hddaman8', 'HD Daman'),
('P0000013', 'Ony Kurnia Jusuf Tehupuring', 'hddaman9', 'hddaman9', 'HD Daman'),
('P0000014', 'Riyo Dirgantoro', 'hddaman10', 'hddaman10', 'HD Daman'),
('P0000015', 'Eko Murdiyanto', 'hddaman11', 'hddaman11', 'HD Daman'),
('P0000016', 'M Farhan Ramadhan', 'hddaman12', 'hddaman12', 'HD Daman'),
('P0000017', 'Alvian Sandi Pratama', 'amija1', 'amija1', 'Ondesk'),
('P0000018', 'Herwindra Wicaksana', 'amija2', 'amija2', 'Ondesk'),
('P0000019', 'M Ginanjar Bagus Faizal', 'amija3', 'amija3', 'Ondesk'),
('P0000020', 'Wahyu Septiawan', 'amija4', 'amija4', 'Ondesk'),
('P0000021', 'Bayu Iryanto', 'amija5', 'amija5', 'Onsite'),
('P0000022', 'Slamet Riyanto', 'amija6', 'amija6', 'Onsite'),
('P0000023', 'Novan Ardhiansyah', 'amija7', 'amija7', 'Onsite'),
('P0000024', 'Dava', 'dava123', 'dava123', 'Dava'),
('P0000025', 'SDI', 'sdi123', 'sdi123', 'SDI'),
('P0000026', 'admin', 'admin', 'admin', 'Admin'),
('P0000027', 'ondesk', 'ondesk', 'ondesk', 'Ondesk'),
('P0000028', 'onsite', 'onsite', 'onsite', 'Onsite'),
('P0000029', 'dava', 'dava', 'dava ', 'Dava'),
('P0000030', 'hddaman', 'hddaman', 'hddaman', 'HD Daman'),
('P0000031', 'daman', 'daman', 'daman', 'Daman'),
('P0000032', 'sdi', 'sdi', 'sdi', 'SDI');

--
-- Triggers `pegawai`
--
DELIMITER $$
CREATE TRIGGER `Pegawai` BEFORE INSERT ON `pegawai` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idPegawai,2,7) AS Nomer
FROM pegawai ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodepegawaiotomatis(i));
 
IF(NEW.idPegawai IS NULL OR NEW.idPegawai = '')
 THEN SET NEW.idPegawai =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `regional`
--

CREATE TABLE `regional` (
  `idRegional` varchar(5) NOT NULL,
  `namaRegional` varchar(20) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regional`
--

INSERT INTO `regional` (`idRegional`, `namaRegional`, `keterangan`) VALUES
('R0001', 'Semarang', '');

--
-- Triggers `regional`
--
DELIMITER $$
CREATE TRIGGER `regionalotomatis` BEFORE INSERT ON `regional` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idRegional,2,5) AS Nomer
FROM regional ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT koderegionalotomatis(i));
 
IF(NEW.idRegional IS NULL OR NEW.idRegional = '')
 THEN SET NEW.idRegional =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_data_odp`
--

CREATE TABLE `rekap_data_odp` (
  `idODP` varchar(8) NOT NULL,
  `idNOSS` varchar(20) NOT NULL,
  `indexODP` varchar(20) NOT NULL,
  `namaODP` varchar(20) NOT NULL,
  `ftp` varchar(8) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `clusterName` varchar(75) DEFAULT NULL,
  `clusterStatus` varchar(20) DEFAULT NULL,
  `avai` varchar(4) NOT NULL,
  `used` varchar(4) NOT NULL,
  `rsv` varchar(4) NOT NULL,
  `rsk` varchar(4) NOT NULL,
  `total` varchar(4) NOT NULL,
  `idSTO` varchar(5) DEFAULT NULL,
  `infoODP` varchar(50) DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `rekap_data_odp`
--
DELIMITER $$
CREATE TRIGGER `odpotomatis` BEFORE INSERT ON `rekap_data_odp` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idODP,4,8) AS Nomer
FROM rekap_data_odp ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodeodpotomatis(i));
 
IF(NEW.idODP IS NULL OR NEW.idODP = '')
 THEN SET NEW.idODP =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_data_olt`
--

CREATE TABLE `rekap_data_olt` (
  `idOLT` varchar(8) NOT NULL,
  `hostname` varchar(16) NOT NULL,
  `ipOLT` varchar(15) DEFAULT NULL,
  `idLogicalDevice` varchar(20) NOT NULL,
  `idSTO` varchar(5) DEFAULT NULL,
  `idSpecOLT` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_data_olt`
--

INSERT INTO `rekap_data_olt` (`idOLT`, `hostname`, `ipOLT`, `idLogicalDevice`, `idSTO`, `idSpecOLT`) VALUES
('OLT00001', 'GPON00-D4-ABR-3', '172.22.203.46', '14550154', 'S0001', 'Spec01'),
('OLT00002', 'GPON01-D4-ABR-5', '172.29.237.132', '14625112', 'S0001', 'Spec02'),
('OLT00003', 'GPON00-D4-BDN-3', '172.22.203.45', '14625126', 'S0002', 'Spec01'),
('OLT00004', 'GPON00-D4-BWE-3', '172.22.203.37', '14550153', 'S0005', 'Spec01'),
('OLT00005', 'GPON01-D4-BWE-5', '172.29.237.139', '14625114', 'S0005', 'Spec02'),
('OLT00006', 'GPON00-D4-BOJ-3', '172.22.160.40', '15525008', 'S0004', 'Spec01'),
('OLT00007', 'GPON00-D4-KDL-3', '172.22.203.18', '14775007', 'S0008', 'Spec03'),
('OLT00008', 'GPON01-D4-KDL-5', '172.29.236.21', '14025012', 'S0008', 'Spec02'),
('OLT00009', 'GPON02-D4-KDL-3', '172.22.162.121', '28425038', 'S0008', 'Spec01'),
('OLT00010', 'GPON00-D4-MJE-3', '172.22.160.42', '73200339', 'S0009', 'Spec01'),
('OLT00011', 'GPON00-D4-WNJ-3', '172.22.203.12', '28200031', 'S0018', 'Spec03'),
('OLT00012', 'GPON00-D4-BMK-3', '172.22.203.15', '12975109', 'S0003', 'Spec03'),
('OLT00013', 'GPON01-D4-BMK-3', '172.22.203.201', '12975107', 'S0003', 'Spec01'),
('OLT00014', 'GPON02-D4-BMK-5', '172.29.236.17', '14025011', 'S0003', 'Spec02'),
('OLT00015', 'GPON03-D4-BMK-5', '172.29.237.138', '13950008', 'S0003', 'Spec02'),
('OLT00016', 'GPON04-D4-BMK-3', '172.22.162.110', '25200047', 'S0003', 'Spec01'),
('OLT00017', 'GPON05-D4-BMK-3', '172.29.237.199', '114075169', 'S0003', 'Spec01'),
('OLT00018', 'GPON06-D4-BMK-3', '172.22.161.208', '133425163', 'S0003', 'Spec01'),
('OLT00019', 'GPON00-D4-SMC-3', '172.22.203.16', '14550039', 'S0013', 'Spec03'),
('OLT00020', 'GPON01-D4-SMC-3', '172.22.203.34', '14400008', 'S0013', 'Spec01'),
('OLT00021', 'GPON02-D4-SMC-3', '172.29.236.40', '14475029', 'S0013', 'Spec01'),
('OLT00022', 'GPON03-D4-SMC-3', '172.29.236.44', '132375161', 'S0013', 'Spec07'),
('OLT00023', 'GPON04-D4-SMC-3', '172.29.236.45', '117375162', 'S0013', 'Spec01'),
('OLT00024', 'GPON00-D4-GNK-3', '172.22.203.22', '13125019', 'S0006', 'Spec03'),
('OLT00025', 'GPON01-D4-GNK-3', '172.22.162.107', '25125065', 'S0006', 'Spec01'),
('OLT00026', 'GPON02-D4-GNK-3', '172.29.236.47', '117375160', 'S0006', 'Spec01'),
('OLT00027', 'GPON00-D4-JHR-3', '172.22.203.23', '14550047', 'S0007', 'Spec03'),
('OLT00028', 'GPON01-D4-JHR-2', '172.22.203.49', '12975102', 'S0007', 'Spec05'),
('OLT00029', 'GPON02-D4-JHR-2', '172.22.203.50', '12975092', 'S0007', 'Spec05'),
('OLT00030', 'GPON03-D4-JHR-2', '172.22.203.51', '12975093', 'S0007', 'Spec05'),
('OLT00031', 'GPON04-D4-JHR-2', '172.22.203.52', '12975090', 'S0007', 'Spec05'),
('OLT00032', 'GPON05-D4-JHR-2', '172.22.203.53', '12975100', 'S0007', 'Spec05'),
('OLT00033', 'GPON06-D4-JHR-2', '172.22.203.54', '12975089', 'S0007', 'Spec05'),
('OLT00034', 'GPON07-D4-JHR-3', '172.22.203.202', '12975110', 'S0007', 'Spec01'),
('OLT00035', 'GPON08-D4-JHR-2', '172.29.236.36', '12975095', 'S0007', 'Spec05'),
('OLT00036', 'GPON09-D4-JHR-2', '172.29.236.35', '12975103', 'S0007', 'Spec05'),
('OLT00037', 'GPON10-D4-JHR-3', '172.29.236.38', '12975087', 'S0007', 'Spec01'),
('OLT00038', 'GPON11-D4-JHR-2', '172.29.236.41', '12975097', 'S0007', 'Spec05'),
('OLT00039', 'GPON00-D4-MJP-3', '172.22.203.24', '14475007', 'S0010', 'Spec03'),
('OLT00040', 'GPON01-D4-MJP-3', '172.22.203.35', '12975111', 'S0010', 'Spec01'),
('OLT00041', 'GPON02-D4-MJP-5', '172.29.236.9', '14025006', 'S0010', 'Spec02'),
('OLT00042', 'GPON03-D4-MJP-3', '172.29.236.39', '14400007', 'S0010', 'Spec01'),
('OLT00043', 'GPON04-D4-MJP-5', '', '14025010', 'S0010', 'Spec02'),
('OLT00044', 'GPON05-D4-MJP-3', '172.22.162.101', '25125064', 'S0010', 'Spec01'),
('OLT00045', 'GPON06-D4-MJP-3', '172.22.160.43', '73725066', 'S0010', 'Spec01'),
('OLT00046', 'GPON07-D4-MJP-3', '172.29.236.43', '129300162', 'S0010', 'Spec07'),
('OLT00047', 'GPON08-D4-MJP-3', '172.29.236.46', '147150163', 'S0010', 'Spec01'),
('OLT00048', 'GPON09-D4-MJP-3', '172.22.161.209.', '133425161', 'S0010', 'Spec01'),
('OLT00049', 'GPON00-D4-MKG-3', '172.22.203.20', '12975108', 'S0011', 'Spec03'),
('OLT00050', 'GPON01-D4-MKG-5', '172.29.236.19', '13950007', 'S0011', 'Spec02'),
('OLT00051', 'GPON02-D4-MKG-3', '172.22.162.111', 'tidak ditemukan', 'S0011', 'Spec02'),
('OLT00052', 'GPON00-D4-SSL-3', '172.22.203.17', '14625167', 'S0015', 'Spec03'),
('OLT00053', 'GPON01-D4-SSL-3', '172.22.203.29', '14700010', 'S0015', 'Spec03'),
('OLT00054', 'GPON02-D4-SSL-5', '172.29.236.8', '15000006', 'S0015', 'Spec02'),
('OLT00055', 'GPON03-D4-SSL-3', '172.29.236.30', '14700033', 'S0015', 'Spec01'),
('OLT00056', 'GPON04-D4-SSL-3', '172.29.236.236', '50550035', 'S0015', 'Spec01'),
('OLT00057', 'GPON00-D4-SMT-3', '172.22.203.21', '13125018', 'S0014', 'Spec03'),
('OLT00058', 'GPON01-D4-SMT-3', '172.22.203.36', '12975088', 'S0014', 'Spec01'),
('OLT00059', 'GPON02-D4-SMT-2', '172.22.203.57', '12975099', 'S0014', 'Spec05'),
('OLT00060', 'GPON03-D4-SMT-2', '172.22.203.58', '12975106', 'S0014', 'Spec05'),
('OLT00061', 'GPON04-D4-SMT-2', '172.22.203.59', '12975094', 'S0014', 'Spec05'),
('OLT00062', 'GPON05-D4-SMT-2', '172.22.203.60', '12975104', 'S0014', 'Spec05'),
('OLT00063', 'GPON06-D4-SMT-2', '172.22.203.61', '12975105', 'S0014', 'Spec05'),
('OLT00064', 'GPON07-D4-SMT-2', '172.22.203.62', '12975098', 'S0014', 'Spec05'),
('OLT00065', 'GPON08-D4-SMT-2', '172.22.203.55', '12975101', 'S0014', 'Spec05'),
('OLT00066', 'GPON09-D4-SMT-2', '172.22.203.56', '12975091', 'S0014', 'Spec05'),
('OLT00067', 'GPON10-D4-SMT-2', '172.29.236.42', '12975096', 'S0014', 'Spec05'),
('OLT00068', 'GPON11-D4-SMT-2', '172.29.237.229', '105150163', 'S0014', 'Spec06'),
('OLT00069', 'GPON12-D4-SMT-2', '172.22.161.202', '153975164', 'S0014', 'Spec06'),
('OLT00070', 'GPON00-D4-SKR-5', '172.29.236.7', '14025009', 'S0012', 'Spec02'),
('OLT00071', 'GPON01-D4-SKR-3', '', 'tidak ditemukan', 'S0012', 'Spec02'),
('OLT00072', 'GPON00-D4-UNR-3', '172.22.203.14', '14550151', 'S0016', 'Spec03'),
('OLT00073', 'GPON01-D4-UNR-3', '172.22.203.204', '14550152', 'S0016', 'Spec01'),
('OLT00074', 'GPON02-D4-UNR-3', '172.22.162.112', '22050053', 'S0016', 'Spec01'),
('OLT00075', 'GPON03-D4-UNR-3', '172.29.236.253', '117900174', 'S0016', 'Spec07'),
('OLT00076', 'GPON04-D4-UNR-3', '172.29.236.245', '133425162', 'S0016', 'Spec01'),
('OLT00077', 'GPON00-D4-WLR-3', '172.22.203.205', '13125020', 'S0017', 'Spec01'),
('OLT00078', 'GPON02-D4-WLR-5', '172.29.236.18', '14025007', 'S0017', 'Spec02');

--
-- Triggers `rekap_data_olt`
--
DELIMITER $$
CREATE TRIGGER `oltotomatis` BEFORE INSERT ON `rekap_data_olt` FOR EACH ROW BEGIN
DECLARE s VARCHAR(8);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idOLT,4,8) AS Nomer
FROM rekap_data_olt ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodeoltotomatis(i));
 
IF(NEW.idOLT IS NULL OR NEW.idOLT = '')
 THEN SET NEW.idOLT =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rekap_data_validasi`
--

CREATE TABLE `rekap_data_validasi` (
  `id` int(11) NOT NULL,
  `tanggalPelurusan` date NOT NULL,
  `ondesk` varchar(40) NOT NULL,
  `onsite` varchar(80) NOT NULL,
  `namaODP` varchar(40) NOT NULL,
  `noteODP` varchar(100) DEFAULT NULL,
  `QRODP` varchar(16) DEFAULT NULL,
  `koordinatODP` varchar(35) DEFAULT NULL,
  `hostname` varchar(16) NOT NULL,
  `portOLT` varchar(12) DEFAULT NULL,
  `totalIN` varchar(2) DEFAULT NULL,
  `kapasitasODP` varchar(16) DEFAULT NULL,
  `portOutSplitter` varchar(10) DEFAULT NULL,
  `QRPortOutSplitter` varchar(16) DEFAULT NULL,
  `portODP` varchar(10) DEFAULT NULL,
  `statusPortODP` varchar(35) DEFAULT NULL,
  `ONU` varchar(30) DEFAULT NULL,
  `serialNumber` varchar(55) DEFAULT NULL,
  `serviceNumber` varchar(55) DEFAULT NULL,
  `QRDropCore` varchar(40) DEFAULT NULL,
  `noteUrut` varchar(100) DEFAULT NULL,
  `flagOLTPort` varchar(40) DEFAULT NULL,
  `ODPtoOLT` varchar(40) DEFAULT NULL,
  `ODPtoONT` varchar(40) DEFAULT NULL,
  `RFS` varchar(40) DEFAULT NULL,
  `noteHDDaman` varchar(100) DEFAULT NULL,
  `updateDateUIM` date DEFAULT NULL,
  `updaterUIM` varchar(40) DEFAULT 'NULL',
  `noteQRODP` varchar(45) DEFAULT NULL,
  `noteQROutSplitter` varchar(45) DEFAULT NULL,
  `noteQRDropCore` varchar(45) DEFAULT NULL,
  `updaterDava` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specification_olt`
--

CREATE TABLE `specification_olt` (
  `idSpecOLT` varchar(6) NOT NULL,
  `namaSpecOLT` varchar(50) NOT NULL,
  `merekOLT` varchar(6) NOT NULL,
  `typeOLT` varchar(10) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification_olt`
--

INSERT INTO `specification_olt` (`idSpecOLT`, `namaSpecOLT`, `merekOLT`, `typeOLT`, `keterangan`) VALUES
('Spec01', 'ZTE ZXA10 C300 Logical Device', 'ZTE', 'C300', NULL),
('Spec02', 'Alcatel-Lucent 7360 FX-16 Logical Device', 'ALU', '', NULL),
('Spec03', 'ZTE ZXA10 C220 Logical Device', 'ZTE', 'C220v1.2', NULL),
('Spec04', 'ZTE ZXA10 C300 Logical Device', 'ZTE', 'C300v2.0', NULL),
('Spec05', 'Huawei MA5600T Logical Device', 'HUAWEI', NULL, NULL),
('Spec06', 'Huawei MA5608T Logical Device', 'HUAWEI', NULL, NULL),
('Spec07', 'ZTE ZXA10 C320 Logical Device', 'ZTE', 'C320v1.2', NULL);

--
-- Triggers `specification_olt`
--
DELIMITER $$
CREATE TRIGGER `specotomats` BEFORE INSERT ON `specification_olt` FOR EACH ROW BEGIN
DECLARE s VARCHAR(6);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idSpecOLT,5,6) AS Nomer
FROM specification_olt ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodespecotomatis(i));
 
IF(NEW.idSpecOLT IS NULL OR NEW.idSpecOLT = '')
 THEN SET NEW.idSpecOLT =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE `sto` (
  `idSTO` varchar(5) NOT NULL,
  `kodeSTO` varchar(5) NOT NULL,
  `namaSTO` varchar(30) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `idDatel` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`idSTO`, `kodeSTO`, `namaSTO`, `keterangan`, `idDatel`) VALUES
('S0001', 'ABR', 'Ambarawa', '', 'D0003'),
('S0002', 'BDN', 'Bandungan', '', 'D0003'),
('S0003', 'BMK', 'Semarang Banyumanik', '', 'D0002'),
('S0004', 'BOJ', 'Boja', '', 'D0001'),
('S0005', 'BWE', 'Bawen', '', 'D0003'),
('S0006', 'GNK', 'Semarang Genuk', '', 'D0002'),
('S0007', 'JHR', 'Semarang Johar', '', 'D0002'),
('S0008', 'KDL', 'Kendal', '', 'D0001'),
('S0009', 'MJE', 'Mijen', '', 'D0002'),
('S0010', 'MJP', 'Semarang Majapahit', '', 'D0002'),
('S0011', 'MKG', 'Semarang Mangkang', '', 'D0002'),
('S0012', 'SKR', 'Sukorejo', '', 'D0002'),
('S0013', 'SMC', 'Semarang Candi', '', 'D0002'),
('S0014', 'SMT', 'Semarang Tugu', '', 'D0002'),
('S0015', 'SSL', 'Semarang Simpang Lima', '', 'D0003'),
('S0016', 'UNR', 'Ungaran', '', 'D0003'),
('S0017', 'WLR', 'Weleri', '', 'D0002'),
('S0018', 'WNJ', 'Pringapus', '', 'D0002');

--
-- Triggers `sto`
--
DELIMITER $$
CREATE TRIGGER `stootomatis` BEFORE INSERT ON `sto` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idSTO,2,5) AS Nomer
FROM sto ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodestootomatis(i));
 
IF(NEW.idSTO IS NULL OR NEW.idSTO = '')
 THEN SET NEW.idSTO =s;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `type_olt`
--

CREATE TABLE `type_olt` (
  `idTypeOLT` varchar(6) NOT NULL,
  `typeOLT` varchar(20) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_olt`
--

INSERT INTO `type_olt` (`idTypeOLT`, `typeOLT`, `keterangan`) VALUES
('type1', 'C300', ''),
('type2', 'C300.v.2.0', '');

-- --------------------------------------------------------

--
-- Table structure for table `witel`
--

CREATE TABLE `witel` (
  `idWitel` varchar(5) NOT NULL,
  `namaWitel` varchar(20) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `idRegional` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `witel`
--

INSERT INTO `witel` (`idWitel`, `namaWitel`, `keterangan`, `idRegional`) VALUES
('W0001', 'Semarang', '', 'R0001');

--
-- Triggers `witel`
--
DELIMITER $$
CREATE TRIGGER `witelotomatis` BEFORE INSERT ON `witel` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT SUBSTRING(idWitel,2,5) AS Nomer
FROM witel ORDER BY Nomer DESC LIMIT 1);
 
SET s = (SELECT kodewitelotomatis(i));
 
IF(NEW.idWitel IS NULL OR NEW.idWitel = '')
 THEN SET NEW.idWitel =s;
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datel`
--
ALTER TABLE `datel`
  ADD PRIMARY KEY (`idDatel`),
  ADD KEY `fk_witel` (`idWitel`);

--
-- Indexes for table `merek_olt`
--
ALTER TABLE `merek_olt`
  ADD PRIMARY KEY (`idMerek`),
  ADD UNIQUE KEY `namaMerek` (`namaMerek`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`idRegional`);

--
-- Indexes for table `rekap_data_odp`
--
ALTER TABLE `rekap_data_odp`
  ADD PRIMARY KEY (`idODP`),
  ADD KEY `fk_sto` (`idSTO`);

--
-- Indexes for table `rekap_data_olt`
--
ALTER TABLE `rekap_data_olt`
  ADD PRIMARY KEY (`idOLT`),
  ADD KEY `fk_sto` (`idSTO`) USING BTREE,
  ADD KEY `fk_spek` (`idSpecOLT`);

--
-- Indexes for table `rekap_data_validasi`
--
ALTER TABLE `rekap_data_validasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_olt`
--
ALTER TABLE `specification_olt`
  ADD PRIMARY KEY (`idSpecOLT`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`idSTO`),
  ADD KEY `fk_datel` (`idDatel`) USING BTREE;

--
-- Indexes for table `witel`
--
ALTER TABLE `witel`
  ADD PRIMARY KEY (`idWitel`),
  ADD KEY `fk_regional` (`idRegional`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekap_data_validasi`
--
ALTER TABLE `rekap_data_validasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datel`
--
ALTER TABLE `datel`
  ADD CONSTRAINT `fk_witel` FOREIGN KEY (`idWitel`) REFERENCES `witel` (`idWitel`);

--
-- Constraints for table `rekap_data_odp`
--
ALTER TABLE `rekap_data_odp`
  ADD CONSTRAINT `fk_sto2` FOREIGN KEY (`idSTO`) REFERENCES `sto` (`idSTO`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `rekap_data_olt`
--
ALTER TABLE `rekap_data_olt`
  ADD CONSTRAINT `fk_specOLT` FOREIGN KEY (`idSpecOLT`) REFERENCES `specification_olt` (`idSpecOLT`),
  ADD CONSTRAINT `fk_sto` FOREIGN KEY (`idSTO`) REFERENCES `sto` (`idSTO`);

--
-- Constraints for table `sto`
--
ALTER TABLE `sto`
  ADD CONSTRAINT `fk_datel` FOREIGN KEY (`idDatel`) REFERENCES `datel` (`idDatel`);

--
-- Constraints for table `witel`
--
ALTER TABLE `witel`
  ADD CONSTRAINT `fk_regional` FOREIGN KEY (`idRegional`) REFERENCES `regional` (`idRegional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
