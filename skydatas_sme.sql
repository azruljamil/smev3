-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2015 at 10:33 AM
-- Server version: 5.5.46-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skydatas_sme`
--

-- --------------------------------------------------------

--
-- Table structure for table `entpbiz_profile`
--

CREATE TABLE IF NOT EXISTS `entpbiz_profile` (
  `entpbiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_type` int(11) DEFAULT NULL,
  `biz_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL,
  `district` int(5) DEFAULT NULL,
  `state` int(5) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `fax` int(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `web` varchar(150) DEFAULT NULL,
  `links` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `profile_entp_entp_id` int(11) NOT NULL,
  PRIMARY KEY (`entpbiz_id`,`profile_entp_entp_id`),
  UNIQUE KEY `profile_entp_entp_id` (`profile_entp_entp_id`),
  KEY `fk_entpbiz_profile_profile_entp1_idx` (`profile_entp_entp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneur`
--

CREATE TABLE IF NOT EXISTS `entrepreneur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plkn` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrepreneur_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `entrepreneur`
--

INSERT INTO `entrepreneur` (`id`, `user_id`, `plkn`) VALUES
(12, 30, 1),
(13, 31, 4),
(14, 32, 8),
(15, 33, 3),
(16, 34, 5),
(17, 35, 3),
(18, 36, 3),
(19, 37, 4),
(20, 38, 3),
(21, 39, 3),
(22, 40, 2),
(23, 41, 4),
(24, 42, 6),
(25, 43, 6),
(26, 44, 6),
(27, 45, 4),
(28, 46, 6),
(29, 47, 4),
(30, 48, 4),
(31, 49, 4),
(32, 50, 4),
(33, 51, 4),
(34, 52, 4),
(35, 53, 4),
(36, 54, 4),
(37, 55, 4),
(38, 56, 4),
(39, 57, 4),
(40, 58, 4),
(41, 59, 4),
(42, 60, 4),
(43, 61, 4),
(44, 62, 4),
(45, 63, 4),
(46, 64, 2),
(47, 65, 2),
(48, 66, 4),
(49, 67, 4),
(50, 68, 2),
(51, 69, 4),
(52, 70, 2),
(53, 71, 2),
(54, 72, 2),
(55, 73, 2),
(56, 74, 2),
(57, 75, 4),
(58, 76, 4),
(59, 77, 2),
(60, 78, 2),
(61, 79, 9),
(62, 80, 9),
(63, 81, 9),
(64, 82, 9),
(65, 83, 9),
(66, 84, 9),
(67, 85, 9),
(68, 86, 9),
(69, 87, 9),
(70, 88, 9),
(71, 89, 9),
(72, 90, 9),
(73, 91, 9),
(74, 92, 9),
(75, 93, 9),
(76, 94, 9),
(77, 95, 9),
(78, 96, 9),
(79, 97, 3),
(80, 98, 3),
(81, 99, 3),
(82, 100, 3),
(83, 101, 3),
(84, 102, 3),
(85, 103, 3),
(86, 104, 3),
(87, 105, 3),
(88, 106, 9),
(89, 107, 3),
(90, 108, 3),
(91, 109, 3),
(92, 110, 3),
(93, 111, 8),
(94, 112, 3),
(95, 113, 3),
(96, 114, 3),
(97, 115, 3),
(98, 116, 3),
(99, 117, 3),
(100, 118, 3),
(101, 119, 3),
(102, 120, 3),
(103, 121, 3),
(104, 122, 3),
(105, 123, 8),
(106, 124, 3),
(107, 125, 8),
(108, 126, 3),
(109, 127, 3),
(110, 128, 3),
(111, 129, 8);

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE IF NOT EXISTS `lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(4, 'ACTIVE', 1, 'Status-Package', 1),
(5, 'INACTIVE', 0, 'Status-Package', 2),
(6, 'ACTIVE', 1, 'Contest', 1),
(7, 'INACTIVE', 0, 'Contest', 2),
(8, 'Free Customisation', 1, 'Item-Offer', 1),
(9, '24 Hour Support', 2, 'Item-Offer', 2),
(10, '10GB Disk Space', 3, 'Item-Offer', 3),
(11, 'Cloud Storage', 4, 'Item-Offer', 4),
(12, 'Online Protection', 5, 'Item-Offer', 5),
(13, 'fa-gift', 1, 'Icon-Offer', 1),
(14, 'fa-inbox', 2, 'Icon-Offer', 2),
(15, 'fa-globe', 3, 'Icon-Offer', 3),
(16, 'fa-cloud-upload', 4, 'Icon-Offer', 4),
(17, 'fa-umbrella', 5, 'Icon-Offer', 5),
(20, 'Percentage', 7, 'Tax-Rate', 1),
(21, 'Fixed Amount', 8, 'Tax-Rate', 2),
(22, 'Shipping Address', 1, 'Tax-Rules', 1),
(23, 'Payment Address', 2, 'Tax-Rules', 2),
(24, 'Store Address', 3, 'Tax-Rules', 3),
(25, 'Pemilikan Tunggal', 1, 'company-type', 1),
(26, 'Perkongsian', 2, 'company-type', 2),
(27, 'Perkongsian Liabiliti Terhad', 3, 'company-type', 3),
(28, 'Syarikat Sdn Bhd', 4, 'company-type', 4),
(29, 'ACTIVE', 10, 'User-Status', 1),
(30, 'INACTIVE', 9, 'User-Status', 2),
(31, 'DELETE', 0, 'User-Status', 3),
(32, 'Kem PLKN Dusun Resort Kuala Nerang (Kedah/Perlis)', 1, 'Plkn-Name', 1),
(33, 'Kem PLKN Desa Rimba Kuala Kangsar (Perak)', 2, 'Plkn-Name', 2),
(34, 'Kem PLKN Seri Perkasa Mantin (N.Sembilan)', 3, 'Plkn-Name', 3),
(35, 'Kem PLKN Air Keroh (Melaka)', 4, 'Plkn-Name', 4),
(36, 'Kem PLKN Cancun Park Pasir Mas (Kelantan)', 5, 'Plkn-Name', 5),
(37, 'Kem PLKN Padang Kacong Marang (Terengganu)', 6, 'Plkn-Name', 6),
(38, 'Kem PLKN Kg. Hijrah Penor (Pahang)', 7, 'Plkn-Name', 7),
(39, 'Kem PLKN Sri Ledang Tangkak (Johor)', 8, 'Plkn-Name', 8),
(40, 'Kem PLKN Wawasan Papar (Sabah) ', 9, 'Plkn-Name', 9),
(41, 'Kem PLKN Putra Sentosa Sematan (Sarawak)', 10, 'Plkn-Name', 10),
(42, 'Perlis', 1, 'State-Name', 1),
(43, 'Kedah', 2, 'State-Name', 2),
(44, 'Pulau Pinang', 3, 'State-Name', 3),
(45, 'Perak', 4, 'State-Name', 4),
(46, 'Selangor', 5, 'State-Name', 5),
(47, 'Wilayah Persekutuan Kuala lumpur', 6, 'State-Name', 6),
(48, 'Melaka', 7, 'State-Name', 7),
(49, 'Negeri Sembilan', 8, 'State-Name', 8),
(50, 'Johor', 9, 'State-Name', 9),
(51, 'Pahang', 10, 'State-Name', 10),
(52, 'Terengganu', 11, 'State-Name', 11),
(53, 'Kelantan', 12, 'State-Name', 12),
(54, 'Sabah', 13, 'State-Name', 13),
(55, 'Sarawak', 14, 'State-Name', 14),
(56, 'Wilayah Persekutuan Labuan', 15, 'State-Name', 15),
(57, 'Wilayah Persekutuan Putrajaya', 16, 'State-Name', 16);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `mentor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Mentor_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mentorbiz_profile`
--

CREATE TABLE IF NOT EXISTS `mentorbiz_profile` (
  `biz_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_type` int(11) NOT NULL,
  `biz_type` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postcode` int(6) NOT NULL,
  `district` int(5) NOT NULL,
  `state` int(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `web` varchar(150) NOT NULL,
  `links` varchar(150) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `profile_mentor_mentor_id` int(11) NOT NULL,
  PRIMARY KEY (`biz_id`,`profile_mentor_mentor_id`),
  KEY `fk_mentorbiz_profile_profile_mentor1_idx` (`profile_mentor_mentor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_entrepreneur`
--

CREATE TABLE IF NOT EXISTS `mentor_entrepreneur` (
  `mentor_id` int(11) NOT NULL,
  `entrepreneur_id` int(11) NOT NULL,
  PRIMARY KEY (`mentor_id`,`entrepreneur_id`),
  KEY `fk_mentor_entrepreneur_mentor1_idx` (`mentor_id`),
  KEY `fk_mentor_entrepreneur_entrepreneur1_idx` (`entrepreneur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1445847450),
('m130524_201442_init', 1445847455);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `image` text,
  `first_name` varchar(81) DEFAULT '',
  `last_name` varchar(81) DEFAULT '',
  `ic` varchar(15) NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL,
  `district` varchar(81) DEFAULT NULL,
  `state` int(5) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(81) NOT NULL DEFAULT '',
  `business_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_profile_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`image`, `first_name`, `last_name`, `ic`, `dob`, `address`, `address2`, `postcode`, `district`, `state`, `mobile`, `created_at`, `updated_at`, `user_id`, `name`, `business_type`) VALUES
(NULL, NULL, NULL, '111111-11-1111', NULL, '', '', NULL, '', 1, '', 1447420674, 1447420674, 30, 'Rizal Hassim', NULL),
(NULL, NULL, NULL, '111111-11-1111', NULL, '', '', NULL, '', 1, '', 1447425163, 1447425163, 31, 'Noor Fahmy bin Noormal', NULL),
(NULL, NULL, NULL, '222222-22-2222', NULL, '', '', NULL, '', 4, '', 1447425506, 1447425506, 32, 'azrul jamil', NULL),
(NULL, NULL, NULL, '888888-88-8888', NULL, 'Rumah', 'saya', 43300, 'KL', 5, '0173365821', 1447426805, 1447426805, 33, 'Hana Halim', NULL),
(NULL, NULL, NULL, '740213-10-5265', NULL, 'No 16 Lorong Melati 3/ 10 Bandar Malawati', '4500 Kuala Selangor', 45000, 'Selangor', 5, '012 7761998', 1447428404, 1447428404, 34, 'Nor Akmal Ibos', NULL),
(NULL, NULL, NULL, '820319-03-5250', NULL, '59, Jln Mulia 1/2, Taman Bukit Mulia', 'Bukit Antarabangsa', 68000, 'Ampang', 5, '0129402552', 1447428731, 1447428731, 35, 'Fazzreena Khalid', NULL),
(NULL, NULL, NULL, '820319-03-5250', NULL, '59, Jln Mulia 1/2, Taman Bukit Mulia', 'Bukit Antarabangsa', 68000, 'Ampang', NULL, '0129402552', 1447429144, 1447429144, 36, 'Fazzreena Khalid', NULL),
(NULL, NULL, NULL, '820329-11-5502', NULL, 'Inspirasi Fesyen Enterprise,No.793 jln 1/3 medan nusari', 'Bandar Sri Sendayan', 71900, 'Labu', 8, '0189500944', 1447429216, 1447429216, 37, 'Inspirasi Fesyen', NULL),
(NULL, NULL, NULL, '820319-03-5250', NULL, '59, Jln Mulia 1/2, Taman Bukit Mulia', 'Bukit Antarabangsa', 68000, 'Ampang', NULL, '0129402552', 1447429224, 1447429224, 38, 'Fazzreena Khalid', NULL),
(NULL, NULL, NULL, '760627-04-5395', NULL, '22 & 22A, Jalan USJ 21/4,', 'USJ City Centre 1,', 47630, 'UEP Subang Jaya', 5, '0176265818', 1447438777, 1447438777, 39, 'Mohd Rizal Bin Hassim', NULL),
(NULL, NULL, NULL, '831019-08-6869', NULL, 'Lot 74 kawasan istana kuning', 'Bukit chandan', 33000, 'Kuala kangsar', 4, '010 5642434', 1447440036, 1447440036, 40, 'Firdaua bin mohamad yusja', NULL),
(NULL, NULL, NULL, '761217-04-5418', NULL, 'No. 11 Jalan TU41 Taman Tasik Utama', '', 75450, 'Ayer Keroh', 7, '0122122044', 1447440542, 1447440542, 41, 'Azfalina Akmar Ab Khalid', NULL),
(NULL, NULL, NULL, '870224-11-5827', NULL, '1991 desa gemia', 'Jalan panji alam', 21100, 'Kuala terengganu', 11, '0103660345', 1447492284, 1447492284, 42, 'Amir bin long', NULL),
(NULL, NULL, NULL, '850214-11-5737', NULL, '10828 Banggol Tok Jiring', 'Kuala Terengganu', 21060, 'Kuala Terengganu', 11, '+60133886630', 1447492385, 1447492385, 43, 'Nor Ismahadi Ismail', NULL),
(NULL, NULL, NULL, '840525-11-5276', NULL, 'no 32 taman putri payong', 'binjai bongkok', 21400, 'marang terengganu', 11, '0139155288', 1447492452, 1447492452, 44, 'norazlina binti lat @ su', NULL),
(NULL, NULL, NULL, '921102-01-6385', NULL, 'PBD 234, Parit Bulat Darat,', '84160 Parit Jawa Muar', 84160, 'Muar', 9, '0147207923', 1447492501, 1447492501, 45, 'Muhammad Afiq Bin Zulku', NULL),
(NULL, NULL, NULL, '841207-11-5021', NULL, 'Lot 1800 lorong huda ', 'Kampung gong kepas dalam', 22200, 'Besut terengganu', 11, '0139221607', 1447492526, 1447492526, 46, 'Mohd kamal ariffuddin bin mohamed', NULL),
(NULL, NULL, NULL, '920514-04-5372', NULL, 'Jb 5557', 'Taman Muhibbah Fasa 6', 77300, 'Merlimau', 7, '0136051599', 1447492576, 1447492576, 47, 'Nurul Atiqah Binti Mohd Daud', NULL),
(NULL, NULL, NULL, '890213-08-5763', NULL, 'No51 Lorong Batu Muda Tambahan 7', 'Kampung Batu Muda Tambahan', 51100, 'WPKL', 6, '0193355185', 1447492577, 1447492577, 48, 'Syaizul Abdullah Syamil Bin Zulkaffly', NULL),
(NULL, NULL, NULL, '911009-04-5270', NULL, 'km13.5,kampujg berangan enam,', 'umbai', 77300, 'merlimau', 7, '0137385249', 1447492582, 1447492582, 49, 'aziah rosli', NULL),
(NULL, NULL, NULL, '850116-04-5448', NULL, 'Jalan Anggerik', 'Kampung Tambak paya', 75460, 'Melaka', 7, '018 7775448', 1447492587, 1447492587, 50, 'Jamaliah binti Abd kadir', NULL),
(NULL, NULL, NULL, '920827-10-5011', NULL, '16058 taman alam shah', '', 41000, 'klang', 5, '01127016709', 1447492595, 1447492595, 51, 'asyraf firdaus bin shaiful bahari', NULL),
(NULL, NULL, NULL, '841006-08-5153', NULL, 'no.27a tingkat 1 blok 4', 'pusat perniagaan worldwide', 40675, 'shah alam', 5, '0128673153', 1447492599, 1447492599, 52, 'sahrul nizam bin mohd dalail', NULL),
(NULL, NULL, NULL, '880311-56-5358', NULL, 'Blok C -13-4  PPR Laksamana', 'Jalan Peel', 55100, 'Pudu, Cheras', 6, '010 3046 404', 1447492615, 1447492615, 53, 'Siti Nur ''Amirah Ishak', NULL),
(NULL, NULL, NULL, '911005-14-6496', NULL, 'No. 35 & 37, Jalan Resak,', 'Taman Impian Ehsan, Balakong', 43300, 'Seri Kembangan', 5, '0139451257', 1447492630, 1447492630, 54, 'Siti Zaharah Binti Mohd Tumari', NULL),
(NULL, NULL, NULL, '900822-14-5844', NULL, 'No 27,Jalan Pjs 1/21A, Taman petaling utama, ', '46150 Petaling Jaya', 461500, 'Petaling Jaya', 5, '01128003566', 1447492648, 1447492648, 55, 'NUR AZIE SHAKINAH BT ABD RAHIM', NULL),
(NULL, NULL, NULL, '900728-14-5696', NULL, '127 persiaran zaaba taman tun dr. ismail', '', 60000, 'kuala lumpur', 6, '60176298966', 1447492698, 1447492698, 56, 'anith amira kamalludin', NULL),
(NULL, NULL, NULL, '900831065571', NULL, 'D-240 Felda Melati Jengka 11,', '', 26400, 'Bandar Jengka', 10, '0139018915', 1447492704, 1447492704, 57, 'Amirul Fahmi bin Alias', NULL),
(NULL, NULL, NULL, '821028-05-5328', NULL, '173 R.R. Sikamat 2', 'Batu 3 Jalan Jelebu', 70400, 'Seremban', 8, '0129419040', 1447492724, 1447492724, 58, 'Noraida Baharom', NULL),
(NULL, NULL, NULL, '850131145658', NULL, 'No.26,jln pj 9,', 'Taman pengkalan jaya', 75460, 'Melaka', 7, '0189891133', 1447492767, 1447492767, 59, 'Nor Shazana binti Zakaria', NULL),
(NULL, NULL, NULL, '881110-01-5645', NULL, '9431 jalan melaka taman alor alor gajah melaka', '', 78000, 'Alor gajah', 7, '0176879202', 1447492776, 1447492776, 60, 'Ahmad firdaus bin rosli', NULL),
(NULL, NULL, NULL, '911005-04-5628', NULL, 'No 72 Lot 537 Solok Bukit Gedung ', 'Tanjung Kling', 76400, 'Melaka', 7, '012-3984672', 1447492781, 1447492781, 61, 'Zaidura Binti Zainuddin', NULL),
(NULL, NULL, NULL, '750124-14-5571', NULL, 'b3-3-3 apartment tainia', 'jln kenyalang 11/3 ', 47810, 'kota damansara', 5, '0193472500', 1447492840, 1447492840, 62, 'zulkarnain rizal b salleh', NULL),
(NULL, NULL, NULL, '750124-14-5571', NULL, 'b3-3-3 apartment tainia', 'jln kenyalang 11/3 ', 47810, 'kota damansara', 5, '0193472500', 1447493027, 1447493027, 63, 'zulkarnain rizal b salleh', NULL),
(NULL, NULL, NULL, '750106-02-5015', NULL, 'Lot 4903 RPT Sentang', 'Jalan Tanjung Tualang', 31000, 'Batu Gajah', 4, '01113073858', 1447493192, 1447493192, 64, 'Norazhari Bin Nordin', NULL),
(NULL, NULL, NULL, '841209-08-5866', NULL, 'lot 1009 jalan lama sg.limau', 'sg.besar', 45300, '', 5, '0123684673', 1447493216, 1447493216, 65, 'norazura binti sapiai', NULL),
(NULL, NULL, NULL, '780528-08-6253', NULL, 'Blok C-12-20', 'PPR Batu Muda, Off Jln Ipoh, Batu 4 1/2', 52100, 'Kuala Lumpur', 6, '+6017-3122075', 1447493222, 1447493222, 66, 'Mohd Niza Bin Abd Aziz', NULL),
(NULL, NULL, NULL, '820325-08-6484', NULL, 'NO.52-1 JALAN TU23', 'TAMAN TASIK UTAMA, AYER KEROH,', 75450, 'MELAKA', 7, '0138498572', 1447493259, 1447493259, 67, 'SURAYA AL HUSNA BT.AHMAD TAJUDDIN', NULL),
(NULL, NULL, NULL, '880519-02-5115', NULL, 'No 7, Jalan Bola Sepak Lapan', '13/11 H Seksyen 13', 40100, 'Shah Alam', 4, '0132606275', 1447493321, 1447493321, 68, 'MOHD HAZWAN OTHMAN', NULL),
(NULL, NULL, NULL, '911009-04-5270', NULL, 'km13.5,kampung berangan enam,umbai', '', 77300, 'Merlimau', 7, '0137385249', 1447493347, 1447493347, 69, 'aziah rosli', NULL),
(NULL, NULL, NULL, '850801-10-5884', NULL, 'A1 1-2 apartment air putih', 'jalan sg air putih 2/3', 11010, '', 3, '0135915558', 1447493732, 1447493732, 70, 'Naszreenna Bibi Nabi Sarvar', NULL),
(NULL, NULL, NULL, '880418-08-6269', NULL, 'Lot 22, Jalan Che Itam Dam, Pokok Assam', '34000, Taiping, Perak', 34000, 'Taiping', 4, '0175125123', 1447493843, 1447493843, 71, 'Abdul Hafiz Bin Sukarman', NULL),
(NULL, NULL, NULL, '850807-10-5884', NULL, 'A1 1-2 apartment air putih', 'jalan sg air putih 2/3', 11010, 'Pulau pinang', 3, '0135915558', 1447493897, 1447493897, 72, 'Naszreenna Bibi Nabi Sarvar', NULL),
(NULL, NULL, NULL, '820114-08-6281', NULL, '4349 kg tersusun seri jaya2', 'Jalan gopeng', 31000, 'Batu gajah', 4, '0173539436', 1447494454, 1447494454, 73, 'Fareed awang', NULL),
(NULL, NULL, NULL, '840118085081', NULL, 'no 39, laluan chemor permai 7', 'desa chemor permai', 31200, 'chemor', 4, '01895093474', 1447494646, 1447494646, 74, 'muhammad nazriq bin hussin', NULL),
(NULL, NULL, NULL, '910207-06-5155', NULL, 'B-8-11,NO 3, TAMAN LTAT, JLN BUKIY JALIL INDAH 1,', '57000 KUALA LUMPUR', 57000, 'KUALA LUMPUR', 6, '0132059953', 1447494714, 1447494714, 75, 'SAIFUL ZAHRIN BIN AZMUDDIN', NULL),
(NULL, NULL, NULL, '760225086389', NULL, 'Tmn Melati', '', 53100, 'Gombak', 6, '017-3725716', 1447494985, 1447494985, 76, 'Abdul Mutalib', NULL),
(NULL, NULL, NULL, '871230-08-6043', NULL, '31,Jalan zamrud, Manjoi Baru Tambahan, ', 'Batu 2 3/4 Jalan Jelapang,', 30020, 'Ipoh', 4, '018-9510302', 1447494994, 1447494994, 77, 'Mohamad Rayhan Bin Ramzan', NULL),
(NULL, NULL, NULL, '800922-08-5799', NULL, '62, Batu 11 Jalan Taiping,', '', 34300, 'Bagan Serai', 4, '013-5125996', 1447495262, 1447495262, 78, 'Mohd Fuad bin hamzah', NULL),
(NULL, NULL, NULL, '900502-12-6126', NULL, 'Kg sabdi peti surat 356', '', 91308, '', 13, '0195860149', 1447558065, 1447558065, 79, 'RAMLAH BINTI ROSLAN', NULL),
(NULL, NULL, NULL, '880713-12-6171', NULL, 'PETI SURAT 90', 'PEJABAT POS MINI INDAH PERMAI', 88450, 'KOTA KINABALU', 13, '0168331307', 1447558084, 1447558084, 80, 'SAIFUL BAHARI BIN JATLEE', NULL),
(NULL, NULL, NULL, '900614-12-5013', NULL, 'Shoplot no.02, Gerai Sidi Lohan, Ranau', '', 89308, 'Ranau', 13, '0168885297', 1447558118, 1447558118, 81, 'Jerren Deff Juas', NULL),
(NULL, NULL, NULL, '850712-12-5452', NULL, 'LOT 11, BLOCK B, FIRST FLOOR', 'APOLLO ATRIUM', 89000, 'KENINGAU', 13, '0178311243', 1447558185, 1447558185, 82, 'NATRA BINTI MICHAEL', NULL),
(NULL, NULL, NULL, '890208-12-5476', NULL, 'Kg timbang dayang jln port usukan', '89158', 89158, 'Kota belud', 13, '0198093624', 1447558199, 1447558199, 83, 'Madzlinda binti abdullah', NULL),
(NULL, NULL, NULL, '800922-12-5682', NULL, 'Lot 7, Blok G,', 'Pekan Kecil Sook', 89008, 'Keningau', 13, '010-2322579', 1447558201, 1447558201, 84, 'norhani binti nurung', NULL),
(NULL, NULL, NULL, '860704-49-6068', NULL, 'Desa Seri Taman', 'Laya-Laya', 89208, 'Tuaran', 13, '01116007089', 1447558247, 1447558247, 85, 'Arzeanti Jafar', NULL),
(NULL, NULL, NULL, '910803-10-6515', NULL, 'no 159, jalan tukas 18/34, seksyen 18 shah alam', 'NO 18, PEKELILING ISKANDAR 6, SEKSYEN 5, 32600 SERI ISKANDAR ,PERAK DARUL RIDZUAN', 40200, 'daerah petaling', 5, '012-5600078', 1447558264, 1447558264, 86, 'MUHAMMAD ZULKARNAIN BIN ABD KADIR', NULL),
(NULL, NULL, NULL, '860814-38-6302', NULL, 'Blok Bb-4-3 RKAT taman fulliwa', 'Jalan rancha-jalan rancha', 87000, 'W.P labuan', 15, '0133995825', 1447558334, 1447558334, 87, 'HAIRUNEYSALWA BINTI MOHD YAHAYA', NULL),
(NULL, NULL, NULL, '931121-12-6693', NULL, 'Taman Sri Titingan, Blok E1 - 4 - 2 Jalan Tawau Lama', '91000 Tawau,SABAH.', 91000, 'Tawau Sabah', 13, '0142812161', 1447558338, 1447558338, 88, 'ADZMIR BIN GAIBIL', NULL),
(NULL, NULL, NULL, '910915-12-5374', NULL, 'LOT 114 KAMPUNG SRI PANDAN JALAN BUKIT VOR PUTATAN', '', 88200, 'KOTA KINABALU', 13, '0168186884', 1447558360, 1447558360, 89, 'NURUL IZZATI BINTI ABD RAHIM', NULL),
(NULL, NULL, NULL, '901020-12-5918', NULL, 'KAMPUNG JAYA BARU, WDT 290, KOTA KINABATANGAN', '', 90200, 'SANDAKAN', 13, '014 3536235', 1447558516, 1447558516, 90, 'SITTI ROZANAH BINTI ABDUL', NULL),
(NULL, NULL, NULL, '890711-12-5473', NULL, 'C-10-04, apartment desa pasifik perumahan ATM, Jalan Ampang Kiri, 55000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia.', 'Indah Alam Condominium, Batu Tiga, Seksyen 22 Shah Alam, Selangor', 55000, 'Ampang', 6, '0129240970', 1447558521, 1447558521, 91, 'Ali Khairul Redzuan Abdul Marif', NULL),
(NULL, NULL, NULL, '850712-12-5452', NULL, 'no 117, Lorong Tropicana 2', 'taman tropicana', 89007, 'keningau', 13, '0178311243', 1447558553, 1447558553, 92, 'natra michael', NULL),
(NULL, NULL, NULL, '931007-12-5662', NULL, 'NO. RH 003 BLOK 01 FELDA SAHABAT 05', 'P/S 78, 91150 POS CENDRAWARSIH ,LAHAD DATU, SABAH.', 91150, 'LAHAD DATU ', 13, '0195312464', 1447558682, 1447558682, 93, 'NORARFA RIZAN BINTI MAWAR', NULL),
(NULL, NULL, NULL, '851022-12-5732', NULL, 'SIMPANG TAKUKUR, BUKIT KALAM,', 'WP LABUAN', 87008, 'LABUAN', 15, '0143320977', 1447558699, 1447558699, 94, 'SULIZAH PAIMAN', NULL),
(NULL, NULL, NULL, '900422-12-5115', NULL, 'Kg. Sinalapak W. D. T 46, 89257 Tamparuli Sabah', '', 89257, 'Tamparuli', 13, '0145565489', 1447558807, 1447558807, 95, 'VILLIAN BIN KUNI', NULL),
(NULL, NULL, NULL, '930408-12-6506', NULL, 'Kampung Iran,Peti surat 31,90107,Beluran,Sabah', '', 90107, 'Beluran', 13, '0198422831', 1447558926, 1447558926, 96, 'Farah Dee Oleviah Azinen', NULL),
(NULL, NULL, NULL, '911209-01-6570', NULL, 'No. 136 Lorong Haji Abdul Ghani', 'Jalan Jaafar, ', 82200, 'Pontian', 9, '0197870121', 1447560470, 1447560470, 97, 'Haleda Aqila Binti Nasis', NULL),
(NULL, NULL, NULL, '790626-08-6037', NULL, 'No. 4 Lorong Dua', 'Taman Teratai Behor Lateh', 1000, 'Kangar, Perlis', 1, '01132639126', 1447560545, 1447560545, 98, 'Mustafizar Bin Abd Manaf', NULL),
(NULL, NULL, NULL, '880613-10-5330', NULL, 'no 38 jln berkat', 'kg bkt cherakah', 41050, 'klang', 5, '0182337635', 1447560609, 1447560609, 99, 'norfaiezah binti nordin', NULL),
(NULL, NULL, NULL, '870612-01-5545', NULL, 'C-4-01 BLOK C JALAN PINGGIRAN DELIMA 2/1', 'TAMAN PINGGIRAN DELIMA', 43100, 'HULU LANGAT', 5, '+6013-3422774', 1447560611, 1447560611, 100, 'MOHD FAREEZ BIN ABD.RAHMAN', NULL),
(NULL, NULL, NULL, '780529-08-6845', NULL, 'no 12 Jln Elektron', 'Denai Alam', 40160, 'Shah Alam', 5, '0165315654', 1447560612, 1447560612, 101, 'Muhammad Faisal Bin Shaarani', NULL),
(NULL, NULL, NULL, '800731-05-5343', NULL, 'No 3A, Jalan Sutera 3/4', 'Taman Sutera', 43000, 'Kajang', 5, '019-3433253', 1447560628, 1447560628, 102, 'Mohd Faiz bin Malik', NULL),
(NULL, NULL, NULL, '900926-10-5740', NULL, 'No. 5, Lorong Cempaka 3,', 'Bangi Golf Resort', 43650, 'Bandar Baru Bangi', 5, '0137567539', 1447560628, 1447560628, 103, 'Nurul Athirah Binti Mohd Zein', NULL),
(NULL, NULL, NULL, '920915-02-5081', NULL, 'No 57-B, Kg Beka, Merbau Pulas', '09300 Kuala Ketil, Kedah', 93000, 'Kulim', 2, '018-473 5310', 1447560628, 1447560628, 104, 'Syed Syed bin Syed Sulaiman', NULL),
(NULL, NULL, NULL, '860621-05-5179', NULL, 'LOT 312 JALAN MAWAR KAMPUNG PASIR BARU KM 23 47100 PUCHONG SELANGOR', '', 47100, 'PUCHONG', 5, '013-2695244', 1447560674, 1447560674, 105, 'ABDUL RAZAK BIN KAMARULZAMAN', NULL),
(NULL, NULL, NULL, '930818-12-6138', NULL, 'NO RH 07 BLOK 01 FELDA SAHABAT 05', 'DESA KENCANA', 91150, 'LAHAD DATU', 13, '019-8434375', 1447560677, 1447560677, 106, 'SITI MARHATIKA BINTI OMAR', NULL),
(NULL, NULL, NULL, '790523-08-6085', NULL, 'FAKULTI UNDANG-UNDANG CEMPAKA 2', 'UiTM SHAH ALAM', 40450, 'SHAH ALAM', 5, '017-2340327', 1447560681, 1447560681, 107, 'Haslan Mohd Ramli', NULL),
(NULL, NULL, NULL, '840204086304', NULL, 'no 23 jln sayang 5', 'tmn rasa sayang', 43200, 'cheras', 5, '0162200936', 1447560682, 1447560682, 108, 'nor zahidah zamri', NULL),
(NULL, NULL, NULL, '780904-03-5485', NULL, 'Bangunan Mara Sg Besar', 'Jalan Menteri', 53000, 'Sabak Bernam', 5, '0193990020', 1447560738, 1447560738, 109, 'Johari Muhammad Zuhaini', NULL),
(NULL, NULL, NULL, '911028-10-5929', NULL, 'Block L, UPM-MTDC Technology Center, Universiti Putra Malaysia, Lebuh Silikon, 43400, Serdang Selangor', '', 43400, 'Serdang', 5, '013-29748076', 1447560739, 1447560739, 110, 'Muhammad Hafifi Bin Misroh', NULL),
(NULL, NULL, NULL, '751217-11-5069', NULL, 'B-02-01, Koi Tropika,', '', 47100, '', 5, '+60182973727', 1447560739, 1447560739, 111, 'Mohd Sufian Ahmad', NULL),
(NULL, NULL, NULL, '881010-43-6178', NULL, 'No 1', 'USJ 6/6P', 47610, 'Subang Jaya', 5, '019.3933.064', 1447560835, 1447560835, 112, 'Au-Diya Abdul', NULL),
(NULL, NULL, NULL, '900503-03-6421', NULL, 'no 21 jln puncat 1/5 taman puncat utama', '', 43000, 'kajang', 5, '0192319284', 1447560854, 1447560854, 113, 'ku muhammad hilmie bin ku din', NULL),
(NULL, NULL, NULL, '800127-11-5282', NULL, 'No 60, Jalan Kasturi 2B', 'Bandar Bukit Beruntung', 48300, 'Rawang, Selangor', 5, '0122266450', 1447560859, 1447560859, 114, 'ZAHIRA MOHAMAD', NULL),
(NULL, NULL, NULL, '920915-02-5081', NULL, 'No 57-B, Kg Beka, Merbau Pulas', 'Kuala Ketil, Kedah', 93000, 'Kulim', 2, '018-473 5310', 1447560903, 1447560903, 115, 'Syed Salleh bin Syed Sulaiman', NULL),
(NULL, NULL, NULL, '900926-10-5740', NULL, 'No. 5,Lorong Cempaka 3,', 'Bangi Golf Resort,', 43650, 'Bandar Baru Bangi', 5, '0137567539', 1447560949, 1447560949, 116, 'Nurul Athirah Binti Mohd Zein', NULL),
(NULL, NULL, NULL, '840125-10-6039', NULL, 'B01-01-12, Blok 1, Pangsapuri seri baiduri, ', 'Jalan setia gemilang u13/47, seksyen u13', 40170, 'shah alam', 5, '0122664008', 1447561029, 1447561029, 117, 'hidir rahim', NULL),
(NULL, NULL, NULL, '900307-05-5318', NULL, 'no 173, taman desa melang fasa 2', '', 72000, 'kuala pilah', 8, '012-6036507', 1447561041, 1447561041, 118, 'raihan binti ahmad hussaini basha', NULL),
(NULL, NULL, NULL, '921115-_1-0544', NULL, 'No 4 KPLB Jln Pantai', ' Kg Batu 23 Sg Nibung ', 45400, 'SeKinchan', 5, '+6010-8617845', 1447561118, 1447561118, 119, 'Nur An Nasuha Binti Salim', NULL),
(NULL, NULL, NULL, '900208-14-6337', NULL, 'No16 jalan p/21, selaman light industrial park', 'bandar baru bangi', 43650, 'seksyen 10', 5, '0122112154', 1447561234, 1447561234, 120, 'Hairul Aizad bin Abdul', NULL),
(NULL, NULL, NULL, '911209-01-6570', NULL, 'No. 136 Lorong Haji Abdul Ghani', 'Jalan Jaafar, ', 82200, 'Pontian', 9, '0197870121', 1447561244, 1447561244, 121, 'Haleda Aqila Binti Nasis', NULL),
(NULL, NULL, NULL, '941112-08-5155', NULL, 'no 12 Hala Pegoh 11, RPT Pengkalan Pegoh Seberang', '', 31500, 'Lahat', 4, '0135962779', 1447561254, 1447561254, 122, 'Mohammad Fakhrullah Bin Rosnan', NULL),
(NULL, NULL, NULL, '870501-23-5131', NULL, 'NO 17 jalan tok tenang,pekan air panas', '', 85300, 'Labis', 9, '0111-9330293', 1447561264, 1447561264, 123, 'Mohd Khalis bin Mohd Sharif', NULL),
(NULL, NULL, NULL, '890313-59-5285', NULL, 'no7, jln 3/9, tmn dahlia, bandar baru salak tinggi', '', 43900, 'sepang', 5, '0133605808', 1447561291, 1447561291, 124, 'muhammad rijaluddin bin bakri', NULL),
(NULL, NULL, NULL, '810713016446', NULL, 'No 40 Jalan Badik 29', 'Taman Puteri Wangsa', 81800, 'Ulu Tiram', 9, '0127266542', 1447561475, 1447561475, 125, 'hurun ain hasan', NULL),
(NULL, NULL, NULL, '920407-10-5050', NULL, 'NO. 27 JALAN 7 TAMAN TENAGA,', 'BATU 9 PUCHONG,', 47100, 'PUCHONG', 5, '0172805466', 1447561506, 1447561506, 126, 'ATIQAH NABILA BINTI ABU HANIPAH', NULL),
(NULL, NULL, NULL, '940809-10-5561', NULL, 'No 4 jln jelawat 9 tmn sri putra ', 'Selangor', 42700, 'Banting', 5, '0193483497', 1447561582, 1447561582, 127, 'Muhammad amiruddin bin ibrahim', NULL),
(NULL, NULL, NULL, '750414-08-5749', NULL, 'No.4-1,1st Floor, Jalan PUJ 3/2, Taman Puncak Jalil', 'Bandar Putra Permai', 43300, 'Seri Kembangan', 5, '0192374935', 1447561705, 1447561705, 128, 'Zulkiflee bin Ibrahim', NULL),
(NULL, NULL, NULL, '850907-01-6037', NULL, 'No. 92,Batu 2', 'Jalan Parit Ibrahim,Benut,Johor', 82200, 'Pontian', 9, '0193758571', 1447561953, 1447561953, 129, 'Mohd Adha Shah Bin Mohd Basir', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_cust`
--

CREATE TABLE IF NOT EXISTS `profile_cust` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `ic` int(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postcode` int(6) NOT NULL,
  `district` int(5) NOT NULL,
  `state` int(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `fax` varchar(12) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `social_link` varchar(150) NOT NULL,
  `web` varchar(150) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_entp`
--

CREATE TABLE IF NOT EXISTS `profile_entp` (
  `entp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ic` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL,
  `district` int(5) DEFAULT NULL,
  `state` int(5) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `plkn_name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`entp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_exec`
--

CREATE TABLE IF NOT EXISTS `profile_exec` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `position` varchar(150) NOT NULL,
  `ic` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postcode` int(7) NOT NULL,
  `district` int(5) NOT NULL,
  `state` int(5) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_mentor`
--

CREATE TABLE IF NOT EXISTS `profile_mentor` (
  `mentor_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` int(15) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postcode` int(6) NOT NULL,
  `district` int(5) NOT NULL,
  `state` int(5) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`mentor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_prod_serv`
--

CREATE TABLE IF NOT EXISTS `profile_prod_serv` (
  `pro_serv_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `pricing` float NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`pro_serv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile_supplier`
--

CREATE TABLE IF NOT EXISTS `profile_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `postcode` int(6) NOT NULL,
  `district` int(5) NOT NULL,
  `state` int(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `fax` varchar(12) NOT NULL,
  `acc_no` int(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `social_link` varchar(150) NOT NULL,
  `web` varchar(150) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '9',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=130 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(30, '', 'tTk4RvdkV3THy3eMe4udCWqYF0LF5TnG', '$2y$13$mIKRZnDQcOVizWRJceerweRMBlE64utUb7P18h09kHtEdq7zip.U.', NULL, 'mrizal.hassim@gmail.com', 9, 1447420674, 1447420674),
(31, '', 'CnAPEqBmIfXeCajAWDKJnCkvGKJ7En9J', '$2y$13$houyaZLFkYU94IHpsstEbuOmZJZBDrjAUi1UfEnYyxb2c1QkRHHiu', NULL, 'noorfahmy.noormal@gmail.com', 9, 1447425163, 1447425163),
(32, '', 'o_8jYpyUuLzVC4BpHIotMf6bIhp2PNTw', '$2y$13$ktsNhcmoQBmKwd8mO9CK9e.soE2wDTWJsc7WRqrQue/oJC4rlGu1S', NULL, 'sayaazruljamil@gmail.com', 9, 1447425506, 1447425506),
(33, '', '49AbgfPlD-QvxxZGvC7C0_rBSNIrJg6X', '$2y$13$MRQBuiWeA4r1TSdbIR5NQewk4Kv5AjKtmTCcuRP6Vlkj3xUEput8C', NULL, 'hanahalim@live.com', 9, 1447426805, 1447426805),
(34, '', '_CEkWlb-8Z2A6Y0CtkGVXxhulHEFgIY-', '$2y$13$qZbT8Wb6.62iRB0isvE4yOMjq5eKOlNNQwsBECvhZW1dIqPD3Ne6u', NULL, 'norakmalibos@gmail.com', 9, 1447428404, 1447428404),
(35, '', 'O9RYeBAHA32cuKbemRpy1IxUJmHqCmoI', '$2y$13$p2L2MjyWt1AHUwdAprkaK.yYGMDgVzPqZW0Ms9wuv5Urc3yh3U4/e', NULL, 'fazzreena@myauracrystal.com', 9, 1447428731, 1447428731),
(36, '', 'poLWcMnWGZ7uOiKUxsjDb-6n7f8t_Rd_', '$2y$13$uSPk0IzOQUXRAKk9uwVZ9.wz1.5Q60kDPqd3tAoQjJLkQvp.oyxgq', NULL, 'fazzreena@myauracrystal.com.my', 9, 1447429143, 1447429143),
(37, '', 'aPqkHv1HGp5OjlZjmIiCku1XUVBchtvc', '$2y$13$uuDhhkrFL3KHgABq4H.Wc.bHMu3CaMdaj/4WztpCGTR0sBuiBqh4u', NULL, 'Inspirasifesyen@gmail.com', 9, 1447429216, 1447429216),
(38, '', 'MHYgMYEjoTj3UdO4V-HnraZF7TglpdBj', '$2y$13$uUeXj13IZjjoVfc9Z0oKBOf4ZARO36k7R6UqVNZ3DGy2OvY1LBqUS', NULL, 'fazzreena.khalid@gmail.com', 9, 1447429224, 1447429224),
(39, '', 'QGFfBG2lRIrhLLnFZxMsOyFiZ8TJE2tR', '$2y$13$/8ja1ZoRpmDs2puE2h6Jceb.PTUXCrQtqpbpGj6aKwL2F52z0rMES', NULL, 'mrizal@myonecorp.com', 9, 1447438777, 1447438777),
(40, '', 'SXYZoV0-iJYaU39z07YONB_5q_vGARRE', '$2y$13$QJVOb2fVVYmDwPZPaKe0Jet/0unicnqUB2LHIXVdMF3ILv8Ey9BRW', NULL, 'firdausyusza831@gmail.com', 9, 1447440035, 1447440035),
(41, '', 'f96CLNWalJGDjK9Ab78uHpoleMHAFH0m', '$2y$13$rB8QYxrG8im8XIaIW7oDp.VlEdQdta7Sj8myfoxzWgt1ql4lRBLyW', NULL, 'penaakmar@gmail.com', 9, 1447440542, 1447440542),
(42, '', '0sKK4pIe9bifQ3jIsGfKQKdIopX9xcQ-', '$2y$13$w9CCfENvG6QgZVmKZBTExe9uBkU5U2BEmgRAFPkPsLoYcrDi2x3Py', NULL, 'amirbinlong@gmail.com', 9, 1447492284, 1447492284),
(43, '', 'f7tIZpIzn2-PEgyKFWGV64WABgGNkb2R', '$2y$13$Al9pa4hoW8C0wD8BajxgIOfawtH6CzabtSSZ7m0X59v2LGQPHWoz.', NULL, 'ismashadi@gmail.com', 9, 1447492385, 1447492385),
(44, '', 'HMB9qJdSBal5uBvDaF0Immad52zktLYX', '$2y$13$3bZyv2Dcpzle7ovv5uBUBeDrqgN0qsH.CN3o8LG8wQXNg.u0MnGOi', NULL, 'eiynanorazlina25584@gmail.com', 9, 1447492452, 1447492452),
(45, '', '-SZnzMulLfbgDbZQ2vA2cU3J8PVZkrEG', '$2y$13$7Osf2oVg.ySdh68HCproPuiMIWNqmlgaRRlyI/osGJgghaQBCJEiy', NULL, 'amierSM@gmail.com', 9, 1447492501, 1447492501),
(46, '', 'JnTApOWKPmdk2bpSe58tqEJjs8t_yVJf', '$2y$13$Ee4uyZkkoiDZpPstKXYILOr2I0TDnwJWMVhXY/pBXgetNK7Eb/Gzy', NULL, 'arifdin84@gmail.com', 9, 1447492526, 1447492526),
(47, '', 'bVVDhCm5cxaj4I0wceAFdnhO0rJdytoa', '$2y$13$V4EaU24UkRkknyTF.h/xQuTwQHPrSgBqKHlbiVP2BLQdpOBCRLzzK', NULL, 'atiqahdaud145@gmail.com', 9, 1447492576, 1447492576),
(48, '', 'lI8Dg9CxmcSkb9ZteiGn_W0EIIZTDA6a', '$2y$13$NWzu9H9jwOOEdarHPcSltuTVgvjljBSKBMsrCrdOtWvgmR/twfy2G', NULL, 'sasghn@gmail.com', 9, 1447492577, 1447492577),
(49, '', 'F0bGd2HrBYV0ici1otvArnGUPaREFRei', '$2y$13$I3pDve2ZZobq.f8SSO9WI.rWchpnL0d4cGuIc0dWUKYsUIwwwJKpG', NULL, 'aziahros91@gmail.com', 9, 1447492582, 1447492582),
(50, '', '1g1Ek0cTx3gSaYufxY6Hx-zXg_nTHZAJ', '$2y$13$3Tv5vcbT/RPBNPjyCQuyEu3xJ5dYsGdmhUMPp66z.pbfJRJH7TCEC', NULL, 'liya.kadir@yahoo.com', 9, 1447492587, 1447492587),
(51, '', 'YTZUvD8ESk99i_fi4KYOXZm27PxzvTXY', '$2y$13$bfpPWB6.mo27InMSiEwbjuEsXUa3hEQMXxzT3WgjfHTht2AtOCnM2', NULL, 'asyrafirdaus@gmail.com', 9, 1447492595, 1447492595),
(52, '', 'cN7g3QeM1RH1SjM1CF0p66Z3gpaU6SSX', '$2y$13$3gDs0CtBrWFS5PmSnS7uPuIRwpzcoG5M77t0k5me.Oaix7Dl7ms3u', NULL, 'snmd610@gmail.com', 9, 1447492599, 1447492599),
(53, '', 'frTtOL596XeU3eYGKj28XEr_oF3nLBNl', '$2y$13$L7DFl.j/KMOL4jUZCiXCaejuXuItsO1afjoR7oYyTogu1eLhRV/YC', NULL, 'sitinuramirahishak@yahoo.com.my', 9, 1447492615, 1447492615),
(54, '', 'ChKzLBUbU1hK3iam3rsknSliKMmv8W2l', '$2y$13$6ysCrWIly8goO47TkCr4W.6kyE8Hg6Awxgn9ejPI30aMU/LrOv/7i', NULL, 'ctzara91@gmail.com', 9, 1447492630, 1447492630),
(55, '', 'L5KgJQZ3FZM9zF-XAJumG57IC53q8sYp', '$2y$13$dBdidIoE0zAxAONtbKxr1e0LP4qLB2bbdlN4kUioQ2.ZU.4Se9PkC', NULL, 'nurazieshakinah@gmail.com', 9, 1447492648, 1447492648),
(56, '', 'yQBJiXQQDstGZ-OzlOX0-u35RnoIrQfP', '$2y$13$/sqiJN5fF2cquQDCedaWgeoIFRb9XHZJzE7Mhr1TUvSQtuwUtvl3e', NULL, 'amira.anith@gmail.com', 9, 1447492698, 1447492698),
(57, '', 't2Og_nAoyqbM6xjoqm-YzKA9N8FWR2In', '$2y$13$mUPC4.K2bpH8cWW7hLfAsuOi4li62.NjbLcyhypB/Hj0mGoQ83Q0C', NULL, 'amirulalias11@yahoo.com', 9, 1447492704, 1447492704),
(58, '', '2ejAW8HRgHGUrdHhILPk01GKhO7JKfTK', '$2y$13$O1uMx4m.jebwC5Z/mBQ8beBIylnsIsOiGTm1BvP5sYbv8dkUX.tZy', NULL, 'aida_5328@yahoo.com', 9, 1447492724, 1447492724),
(59, '', 'TzrXpjzYxG3qwgMwSX7DIR_cUE-svkOo', '$2y$13$ULmFJS7ZkyPfpznRosLtcOR4MM6S6fbtAXQzHWHCRaIx2R7dGHhuG', NULL, 'melakaaqil@gmail.com', 9, 1447492767, 1447492767),
(60, '', 'QC-gZDFWtG8zqUmfkjpvvpaN7_E1breA', '$2y$13$tqgfeQELjErVzlQvQi2UUuOuG8a/msbyVMJd1wS6VpubY9FDItw6K', NULL, 'Star_trek1001@yahoo.com', 9, 1447492776, 1447492776),
(61, '', '5yLNra7n_AO3n9xQk3LPkO9zZxDKjX1R', '$2y$13$..gI/50F0VoEd18tGFKcduJC3TByWTxpw7go.wf7jYUel9OY4e/Su', NULL, 'zaidurazainuddin@yahoo.com', 9, 1447492781, 1447492781),
(62, '', 'cMFle9jWE4V-lyEkKRMeU0D28kqPX8yS', '$2y$13$GJ6GeCBrswmTvin2feQ6gO.Q/cXb/73UmbX0sBuixeif/aTElun/6', NULL, 'zulrizal@gmail.com', 9, 1447492840, 1447492840),
(63, '', 'ZD82v_IVNhFcc2R_gsEkQxfJ9i1LWaSO', '$2y$13$MOVohHbFKJHGeOMRvmC/cOJlELRi3gHUR8y3khtHQT6R43BlF3Jme', NULL, 'zulrizalsalleh@gmail.com', 9, 1447493027, 1447493027),
(64, '', '1aOE4O-F7Rc4LNQC4xPvBfOPCTxWRvF-', '$2y$13$2X6yXJI0ObHdEkeyWNE8A./lfCdCEAMpoIlNZX.7iL26btbKoDctK', NULL, 'dcne6786@gmail.com', 9, 1447493192, 1447493192),
(65, '', 'ExrnS92H-BY78OFlpSBRHl9ZFa_gvy4M', '$2y$13$isXoTqA/k01XiViWC4Dk5O.l.hdaB7sUshIVqZcmgDzG1/F7OzvXu', NULL, 'ellysyahani1@gmail.com', 9, 1447493216, 1447493216),
(66, '', '2U2urpFR4WmO-WFYxVbT5JFfgIJv32Zf', '$2y$13$ckcJ.Ilg8WnyZxYuom.FXOvHw4r6Q/fWpMIbX/43nKaOIt9kuoBr2', NULL, 'mohdniza@hotmail.com', 9, 1447493222, 1447493222),
(67, '', 'aRvS_wuICGuQsPIByuNuBE77HgRYkfXG', '$2y$13$cUJSlUvMlG8ivvxFUz.1W.Ewgw/ukcPLSpcI.yi.qFe4dJbe0wLdO', NULL, 'suetherapist@yahoo.com', 9, 1447493259, 1447493259),
(68, '', 'FXcCRh2mVOpG0XBv5eSe-SWSACz7qr_p', '$2y$13$.u0h5J9mXaqu/FicoJw2q.MkpCg37aPo2/kE8fSdozUrG6/PYEJ2q', NULL, 'hazz_myself@yahoo.com.my', 9, 1447493321, 1447493321),
(69, '', '2yhWZHFdpBCjRwC-VLwt4siDOlyjB8yg', '$2y$13$6tkx5K7daBwJdnYteU.dO.PaX.ol3RFfMoObN0vxTgd/4/K7NL4Pq', NULL, 'aziahrosli91@gmail.com', 9, 1447493347, 1447493347),
(70, '', 'CRICDcUIDdPtHiVQ-ttARh0QTR7dd9QL', '$2y$13$MbffKbhi3bmg0.6m.Y/DvODMCr/Ut1uu/kggiMeOz2i97qweLuGX2', NULL, 'naszreenna78@gmail.com', 9, 1447493732, 1447493732),
(71, '', 'wnudiqcFFGsXDHEzpzMH4d7q1VFifpdN', '$2y$13$dJ2UDTpGkfYdFIGB07.fBOqlpz1HoSvveLlL44Ck8JnajOoFkaZny', NULL, 'abdulhafizsukarman@yahoo.com', 9, 1447493843, 1447493843),
(72, '', 'g1Vjqy1IGBAlErXRlRGeDO5VsSftuUxx', '$2y$13$DAX95SYiRd8fUzhjq4w10OnKNuBHmYYfEF8lg.kdi1TNAtXsStsNG', NULL, 'reennanasz@gmail.com', 9, 1447493897, 1447493897),
(73, '', 'gVyXwM6LiMpuCtF5ImguxbJ-dkVumZpu', '$2y$13$X7F4R94eg8t86fa2NUI9UevLFpcbx5YJAnuzehjbK0jQYlbHsijtS', NULL, 'mr_reed36@yahoo.com', 9, 1447494454, 1447494454),
(74, '', 'wJff94BHiH2nLhB1Fv_CIEDJtuxEZfGs', '$2y$13$e0nOu7j02iMgWKLEHmRcEeMi.6ul9KTVhCD8APZV6yrjQnfJ.Kk5a', NULL, 'nazsbest@gmail.com', 9, 1447494646, 1447494646),
(75, '', 'BdJg_AV12X2Tlzw3w6vIURbgLT0v_cbv', '$2y$13$yFaQgK.twz1RBgtV4MnfquPUyu/VWd.6DNgIjjB4Vl26yNGY49b4O', NULL, 'zahrin.azam@gmail.com', 9, 1447494714, 1447494714),
(76, '', 'lBox9Tg_pfcOzkozPSEGjcQQ-yioezkn', '$2y$13$gBsuOrspBZE17ZCBdQvrWeP/vkzwLDtGFVBmLHfDJOfHig0mM90hu', NULL, 'ambsworkz@yahoo.com', 9, 1447494985, 1447494985),
(77, '', 'meSlVxPkPJEY_WUKH93uz427bd4dKXwy', '$2y$13$dtqqqx1MgTVg0tvKeCicoe2fa8ufDjSBVGV2ia0D6UpYh.YMh733u', NULL, 'rayhanramzan87@gmail.com', 9, 1447494994, 1447494994),
(78, '', 'iXsay4Dcrrku70Je3S9IPHOFDOe_H9w8', '$2y$13$yUDSWE.Tk8YEtBj/pBsjNeg9tBpUCyRvWIQIjKF1mMpijsMxbuOlK', NULL, 'Att5966@gmail.com', 9, 1447495262, 1447495262),
(79, '', 'rmlF7mSs1CaP--Up2-nKpABUCA6Kqon2', '$2y$13$y3YLUHxf9MYTWpdoaUw84u1oqQnqXnvtSuAJXCQNtonF13f8fCyqu', NULL, 'ramlahroslan@yahoo.com', 9, 1447558065, 1447558065),
(80, '', 'wS1eXJs2tKn98alTZVOrvVh-gGp-FZ_R', '$2y$13$2xBO5HkLMBO641GfDA5czOccW.DVdrtAxpvtO.8TRsAIo7BhA/MCi', NULL, 'sai_arikdrm@yahoo.com.my', 9, 1447558084, 1447558084),
(81, '', 'XOqtm8ObuzasKlxjupLeGd9yRxAkVJ7s', '$2y$13$wn4btCBH6gyw15rLVwEqMOU1AN8iHbHERM25roNxp1zUQtetTLI4e', NULL, 'kiranetwork@gmail.com', 9, 1447558118, 1447558118),
(82, '', 'ejeyjVkOs5PTJRxoeYM1q1rPh-SAe1nL', '$2y$13$N611uPXAvzIWB2FZkxJNRuJ3JVPMHgxMe/TWLg/k4sklS9gyOKZmK', NULL, 'nathraamichael@gmail.com', 9, 1447558185, 1447558185),
(83, '', '39bge4Yb-ndv_elidNwOYSy0LDlWQ8Ih', '$2y$13$lcNIgkk40vEAiaiskOa4UefiFts/4pfPHVAGhfv48xjD5OdmIOTLu', NULL, 'madzlinda_kimo@yahoo.com.my', 9, 1447558199, 1447558199),
(84, '', '5ZgJ5C6ydyQsjyMaTuavTBgIPfIK4j5A', '$2y$13$2Ql2ND60YF/PxN82iy.s7eC9zqnfYq5/.x8jl8XMJo7eTRNIKX6Si', NULL, 'norhani5682@gmail.com', 9, 1447558201, 1447558201),
(85, '', 'aHsbiRe55KPP0_y_i96r3eusQTHxhsPa', '$2y$13$CeCsYM6VkvFERSB6OqEVy.cylBlF3VwZ3kZEgDqINDv7JWwdjXwXS', NULL, 'jarzeanti@gmail.com', 9, 1447558247, 1447558247),
(86, '', 'xbyFmgCMHKEWkYz-cPcxzKnkrc6SVsp0', '$2y$13$pKMVv36as/f8wCAQDqTxB.Gkr5zdiA18QcpzePgIfL5QWxDckDp2e', NULL, 'zulkarnainabdkadir@gmail.com', 9, 1447558264, 1447558264),
(87, '', 'DrsONTc1ti0RyCp9cZZoGmmhc8nxsQyA', '$2y$13$Wv1RrZt/7V6A0PS3gnhJJ.DBTNhTQGWq6NfA35mUFw.weXIbGvsV.', NULL, 'hairuneysalwa_86@yahoo.com', 9, 1447558334, 1447558334),
(88, '', 'M2qMaLgCUQMSxvnHpObolHG-JjdMNIUB', '$2y$13$Dq32YOPBT2ymJXKcLjiNtOKMxFwQ8uwF4vUgkh.SGEswoN45DbUfq', NULL, 'adzmirgaibiel@gmail.com', 9, 1447558338, 1447558338),
(89, '', '2Bto1-JmETbGyFiYHW3XedHgV8qLgVHT', '$2y$13$7AwNYUsRlqR0LNquRm3G9e9LqiK4KuK3DmA.gueWzntIWukY7WaoO', NULL, 'nrl_izzati_ar@ymail.com', 9, 1447558360, 1447558360),
(90, '', 'N68ms66TRg-jhpkSjtIz9-x7axw1aYAL', '$2y$13$u/sQMsvOqXkbWnZxMIUUJ.YBXCwCPhHoBGi6OFyTrwO6QwgdOAGQK', NULL, 'sittirozanah@yahoo.co.uk', 9, 1447558516, 1447558516),
(91, '', '0Nq0L-LqeC3GKqAKnTDy8var5D6IQJzn', '$2y$13$O74zG/c4oo4DOIT5oM5gL.yub8X2myOMQctgekTmA3KU91A3gNgna', NULL, 'khairulredhuan@gmail.com', 9, 1447558521, 1447558521),
(92, '', 'EmDJc5zO3LKFgbxWVxzqjMHezGlzeyRQ', '$2y$13$O/WdQczvXgsAihoNx.fe9eHWV3oAfuYkEmAzszh1qD8aEmFA7ZBMO', NULL, 'nathraamichaelco@gmail.com', 9, 1447558553, 1447558553),
(93, '', 'k8ps2-eWw-M5jZaYAO_HffMoavoGehCy', '$2y$13$c.5t86rOOtLIm4axtl5ZsecFwevQQeUJ8ZtHy0oDk1GbwYl4qZ1gS', NULL, 'NORARFARIZAN93EMON@YAHOO.COM', 9, 1447558682, 1447558682),
(94, '', 'w3ue34Pda-5bsf5niR0Kkp3SBr1A0wOU', '$2y$13$oOE1vz7jo1e2gxwwe3AHnuN4wXP/7GgKV9KgX8gwZbeQpp8e.1Lcm', NULL, 'sul_izah85@yahoo.com', 9, 1447558699, 1447558699),
(95, '', '4mOm6LKaWDTMXo5fsPFZmdaWDKoXFAMW', '$2y$13$IJvmA3xuFDseWZ6KwyCPKObXhhuMFlZ/7S8y4Q1RQW0o2FyXLB9wG', NULL, 'villiankuni@rocketmail.com', 9, 1447558806, 1447558806),
(96, '', 'lSuKZEAdJsH7ye9QEnhBOyLIVCaWqhw_', '$2y$13$qypEbTOf5rxHKvsgK2eeK.484hicvecLeWmB9bQ/r8OsJ0K1sO5kO', NULL, 'evesunshine@ymail.com', 9, 1447558926, 1447558926),
(97, '', 'wMtYjxl2rXEEtWY6R1s2i3l_hdgKObYC', '$2y$13$QBz6Q8O6okgEtw2oIuVfu.aGdCwpv9nMOt25uLhq6pMg5JF1lhvuy', NULL, 'haledaaqila@gmail.com', 9, 1447560470, 1447560470),
(98, '', '5TFvvY0QrUB_gFomSQDwEHJ5VBlc5ej9', '$2y$13$imGI7be./E3DRmJxxcY/cuQknpEdM8Tr0Iuqlke9azMw1XgAHryE2', NULL, 'mustafizar.regaliasg@gmail.com', 9, 1447560545, 1447560545),
(99, '', 'L6xb36Xkj_hFFnHuk12cPDfc0aX748Af', '$2y$13$JY30rnqCcQXmZBmKQOrrgOJcey/C7kaqRVQOl2N230MbsfcO8jKWi', NULL, 'norfaiezahnordin@gmail.com', 9, 1447560609, 1447560609),
(100, '', 'U2KbUlSQbppeC8WY6K5Hjgnw4ehrTSRg', '$2y$13$PBk02lZY8K/lGrtZFBCt0.VbxicXuqPGSYI0Ixy9QYAiaVw9ifQOe', NULL, 'm.fareezar@gmail.com', 9, 1447560611, 1447560611),
(101, '', 'Cx2VKQ9Md1QloJ8fNDTzYlDoRWqKkQyr', '$2y$13$1Drbb4Vmu4XzAAmHneO0nezFX8xAkc4KvSbW8BNP9sCjrFslqjHR2', NULL, 'mfaissha@gmail.com', 9, 1447560612, 1447560612),
(102, '', 'PKeOytlpDMgRe55lG05nuR19DOjlMVuJ', '$2y$13$24BWpnWJrmym0kVUlKsIh.v7/zCZvPBufyH2C4JQraCF4qUqIq0oe', NULL, 'rayyanzahra69@gmail.com', 9, 1447560628, 1447560628),
(103, '', 'R-9J-0-wK-Dj_z99oVXi3Iq0aAFpgDLF', '$2y$13$MKHKz7.l6cdQndZYFq89Aeo.F3MnwC9WTF49wC83lYDQpdlbJ6KIm', NULL, 'athirah.zein@gmail.com', 9, 1447560628, 1447560628),
(104, '', '2_dVi0wFhWOqCSyjvtn4LahDV15Pi6ky', '$2y$13$Wy63.FYBFzkpulfroeS.luhP2P07D3vuoX2/E4hmyVCCVfsPrCXnC', NULL, 'muhamad1888@gmail.com', 9, 1447560628, 1447560628),
(105, '', 'zlAOiyOX73DGuWUwqUARSXAYC5nc3WJI', '$2y$13$iIYgogeLn/QFbdAWZVCizOziM3W4KYjlt03bmcB74GoV6iLKX0Vgq', NULL, 'gldmedic@gmail.com', 9, 1447560674, 1447560674),
(106, '', 'YJIuIH9zFhmCnGh3GUQefDQCwVOJE__6', '$2y$13$OGQVe5plyrTqCDptc6ful.uRah03WQVqgfUQWF13MhmGzGLgTb1z6', NULL, 'sitimarhatika93@yahoo.com', 9, 1447560677, 1447560677),
(107, '', '3Baa4xXA5ZpRqNpv5KUIUXeaVRMypHUd', '$2y$13$E2FJXLce2NgiTlhDKuGNcuyA4PjJutk6QEhUIhrHI8SqQQMuavPNC', NULL, 'creat2u@yahoo.com', 9, 1447560681, 1447560681),
(108, '', 'EDbf7qJry3HTlSbaDv_9RRC_lBiV6Q5I', '$2y$13$l8LMwK0M2VuxZhFtyYq6Yuzv5KB9Ths.qjsop58sesJSBILIwuezS', NULL, 'ibu.ratu@yahoo.com', 9, 1447560682, 1447560682),
(109, '', '7PzqRRcZBPDK4sgpVeMlJXpR2DzQJwN2', '$2y$13$Lgyux.NO7kAqx7YTna5wC.w.euiNzAdMPxRhXZhmmEXotJE0bAcMy', NULL, 'muhammad_zuhaini@yahoo.com', 9, 1447560738, 1447560738),
(110, '', 'Qw4QIuBv0l2mZZwF2lPD1vCD4P3vAHYL', '$2y$13$f7DO0czbec/1SYb8k9bjQ.2pMsNoLXWeCeGY0lK8/I.othsMz5srC', NULL, 'hangroupmarketing@gmail.com', 9, 1447560739, 1447560739),
(111, '', 'v6kVMFzvKIx79BX9_uhpYb1_XLQjEw98', '$2y$13$pQ8316waJf0XhwEIJh2uXOecUUhiGmN0yTsa3eEL4sLhR5Ghj/G3a', NULL, 'naiffusdamha@gmail.com', 9, 1447560739, 1447560739),
(112, '', 'oFDwpIFvt8hJIAQk_hUHCg_BYva5xhZR', '$2y$13$GyGWxC4gqXgB0lGepKMTG.wTVSrxiq8gT9uSXtV2Kr9Ccc6OeODMG', NULL, 'audiya.abdul@gmail.com', 9, 1447560835, 1447560835),
(113, '', 'KWJrHO3l_PzXuAgPO2N4JNYlzH5drKtM', '$2y$13$mnAJC8J9Q87FAxWzivqLGuNY/ykQXnfainTbm1LhNpiuJiAx50TDm', NULL, 'kumuhammadhilmiekudin@rocketmail.com', 9, 1447560854, 1447560854),
(114, '', 'swnJ000t5_KuDwOpo46cOSWt26fEcHl0', '$2y$13$VfqW6blwFo53fcebNqfXSOY.h9ZXnrEyVm3B4s6dQysWneDzSWstK', NULL, 'arihaz27@gmail.com', 9, 1447560859, 1447560859),
(115, '', '63mTVvDgoNoThw6vqobZdraL6I6r4MUu', '$2y$13$YgqnrX5fm8Nuzyvhn6nQTuSwKPUI5BN8XkQpo4Si.T49QLvnXewca', NULL, 'sulaimanplantation@gmail.com', 9, 1447560903, 1447560903),
(116, '', 'mss9sFZDX9jAeBqZ3SlngDjcHKCaEK0O', '$2y$13$Bl2Mp1WPTVoa8o03mCwK4Ovwmds6cdnJA6u/eo/ypUW95rwBR7gAu', NULL, 'athirah.zein@yahoo.com', 9, 1447560949, 1447560949),
(117, '', 'W1g1kfcTOIxEh7LPRiU3bS3WRVSD-UBM', '$2y$13$FVUsloV0Gqf8KikLz4PiEOsdyuzmJlUYotKntHTz7AZcWdBWhQQXW', NULL, 'ide.rahim@gmail.com', 9, 1447561029, 1447561029),
(118, '', '5OJZLzaGdZFZnMCvVLqQ9eJfKLPWvh7r', '$2y$13$i/GAEDvDCM7oMzW.s8Jz8eI4n3CCFx7525KmXF.KuZwGmpqr7xphC', NULL, 'raihanahb7390@gmail.com', 9, 1447561041, 1447561041),
(119, '', 'UYk35gerRMKy0E5RQdc8P9y-jCehGcsg', '$2y$13$aEl9dg/oFCyLXDF01Il.VuhfVzIH/X/SXjKWwSEwXwM0YxeuZWgSi', NULL, 'inquiry.anatjglobal@gmail.com', 9, 1447561118, 1447561118),
(120, '', 'IZa0B1Pr9BqWhydvGW4WVaTH9YPJLZmo', '$2y$13$5rZApj0bLNlxsKqMbMI4DOryh0nrBaInZc3hkaoNCzRjFbQdp45k.', NULL, 'hairul.aizad@yahoo.com', 9, 1447561234, 1447561234),
(121, '', 'hwBiwhWYXQeemX48T7crIiiZHlBNOFVY', '$2y$13$AHAhDmUHGvp3mnKjnah05.MT9/nPWqH4jaSJwSdaHST4nsSY5mNjC', NULL, 'batikalafbaru@ymail.com', 9, 1447561244, 1447561244),
(122, '', 'oZDp-6AivRM_d5k4wL1JUE9KrGdAyO2A', '$2y$13$z44Nr00xH50Cq32uqyATa.oKhlCMetrdjiDK.yW5EcCK6JoiTwzS6', NULL, 'fakhrul9413@yahoo.com', 9, 1447561254, 1447561254),
(123, '', 'iCq16sDX6c2GLx0p_fYPdgoF2oi_VTUl', '$2y$13$O8gT.JuyywLA6zIWsExAle2.Un6YnnaewDFQGnL6qgY7h3zaOyyCm', NULL, 'Khaliswawe@gmail.com', 9, 1447561264, 1447561264),
(124, '', 'lyaO-vi15HhfHSynPp3lkHjdsJypgA_8', '$2y$13$wXPMgpp/Be7EYPTf6WVo4eEi9JEjQahKA.RBfQuw/CVVuFfL7Bq6y', NULL, 'e_jal13@yahoo.com', 9, 1447561291, 1447561291),
(125, '', '9Xz1kpAozH5OiWIqpocZm49eNoOnePMX', '$2y$13$v4wknsloBZW9Svt37UqfneDsx1Ov8cCbUZezJc2wELKhZ6SaNi84W', NULL, 'hurunainhasan@gmail.com', 9, 1447561475, 1447561475),
(126, '', 'Oi4R3YCT_G9hoZU7tId3_eeT4kQOPvgc', '$2y$13$HpF76BPr9kNVBiiGP.wWP.a6mtoE2dEJfKwAqtPvsivp0wVrvYmca', NULL, 'nabilahaniff12@gmail.com', 9, 1447561506, 1447561506),
(127, '', 'NV4U1pX_zVOx1_qn32B_uy7eH-MHk6r8', '$2y$13$rc8aciBKtnUndjZYqLtfM.r6LXCyKHLavO6RT0ZfhNyVVkNJVyxO.', NULL, 'mrbeee94@gmail.com', 9, 1447561582, 1447561582),
(128, '', 'hriJ5JDlfMwP6OGK1TIkvAXHu36aVyTZ', '$2y$13$0e7ZW/BugyrDjiY9zfapLuJTavjMlH2.gx141pHhRB651tTbV.b0e', NULL, 'zulkiflee.zesb@gmail.com', 9, 1447561705, 1447561705),
(129, '', 'HfmH_2bBiiI78b6ioCYaGSYRy4W0rWs0', '$2y$13$ln4Ue0h80xNCYUx4GYmI7uado9c45TOJpAEECjAm30Va4DR9Hyvy2', NULL, 'adha.basir@gmail.com', 9, 1447561953, 1447561953);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entpbiz_profile`
--
ALTER TABLE `entpbiz_profile`
  ADD CONSTRAINT `fk_entpbiz_profile_profile_entp1` FOREIGN KEY (`profile_entp_entp_id`) REFERENCES `profile_entp` (`entp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entrepreneur`
--
ALTER TABLE `entrepreneur`
  ADD CONSTRAINT `fk_entrepreneur_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mentor`
--
ALTER TABLE `mentor`
  ADD CONSTRAINT `fk_Mentor_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mentorbiz_profile`
--
ALTER TABLE `mentorbiz_profile`
  ADD CONSTRAINT `fk_mentorbiz_profile_profile_mentor1` FOREIGN KEY (`profile_mentor_mentor_id`) REFERENCES `profile_mentor` (`mentor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mentor_entrepreneur`
--
ALTER TABLE `mentor_entrepreneur`
  ADD CONSTRAINT `fk_mentor_entrepreneur_entrepreneur1` FOREIGN KEY (`entrepreneur_id`) REFERENCES `entrepreneur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mentor_entrepreneur_mentor1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
