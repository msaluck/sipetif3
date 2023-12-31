-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2024 at 09:51 AM
-- Server version: 8.0.33
-- PHP Version: 8.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipg4371_sipetif`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(512) NOT NULL,
  `category` varchar(128) NOT NULL,
  `isbn` varchar(32) NOT NULL,
  `authors` varchar(256) NOT NULL,
  `place` varchar(32) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  `year` varchar(4) NOT NULL,
  `is_submitted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `user_id`, `title`, `category`, `isbn`, `authors`, `place`, `publisher`, `year`, `is_submitted`) VALUES
(1, 0, 'Fabrikasi dan Karakterisasi Material', 'buku ajar', '9786234650303', 'Dr.-Ing. R. Wahyu Widanarto, Dr. Kartika Sari ; editor, Wahyu Tri Cahyanto, Ph.D, Aldi Aditya, M.Hum.', 'Purwokerto', 'Universitas Jenderal Soedirman', '2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` tinyint NOT NULL,
  `faculty_id` tinyint NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `faculty_id`, `name`, `description`) VALUES
(1, 4, 'Elektro', 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` tinyint NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `description`) VALUES
(1, 'Pertanian', 'Fakutas Pertanian'),
(2, 'Biologi', 'Fakultas Biologi'),
(3, 'Saryono', 'Ilmu-ilmu Kesehatan'),
(4, 'Teknik', 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `google_scholar`
--

CREATE TABLE `google_scholar` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(512) NOT NULL,
  `abstract` varchar(512) NOT NULL,
  `authors` varchar(256) NOT NULL,
  `journal_name` varchar(128) NOT NULL,
  `publish_year` varchar(4) NOT NULL,
  `citation` int NOT NULL,
  `author` varchar(64) NOT NULL,
  `file` varchar(256) NOT NULL,
  `issn` varchar(10) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `is_submitted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `google_scholar`
--

INSERT INTO `google_scholar` (`id`, `user_id`, `title`, `abstract`, `authors`, `journal_name`, `publish_year`, `citation`, `author`, `file`, `issn`, `url`, `is_submitted`) VALUES
(1, 0, 'Analisis Perbandingan Metode Certainty Factor, Dempster Shafer dan Teorema Bayes dalam Deteksi Dini Gangguan Kesehatan Mental', '-', 'N Veldasari, A Fadli, AW Wardhana, MS Aliim', 'Jurnal Pendidikan dan Teknologi Indonesia 2 (7), 329-339, 2022', '2022', 2, 'MUHAMMAD SYAIFUL ALIIM, S.T, M.T', '-', '-', 'https://scholar.google.com/scholar?q=+intitle:\"Analisis Perbandingan Metode Certainty Factor, Dempster Shafer dan Teorema Bayes dalam Deteksi Dini Gangguan Kesehatan Mental\"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs`
--

CREATE TABLE `iprs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(128) NOT NULL,
  `request_year` varchar(4) NOT NULL,
  `request_number` varchar(32) NOT NULL,
  `inventor` varchar(256) NOT NULL,
  `patent_holder` varchar(32) NOT NULL,
  `publication_date` varchar(10) NOT NULL,
  `is_submitted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `iprs`
--

INSERT INTO `iprs` (`id`, `user_id`, `title`, `category`, `request_year`, `request_number`, `inventor`, `patent_holder`, `publication_date`, `is_submitted`) VALUES
(1, 0, 'METODE PEMBUATAN PENYERAP GELOMBANG MIKRO DARI BAHAN LANTANUM STRONSIUM FERIT', 'paten', '2017', 'P00201709354', 'Mukhtar Effendi,Wahyu Tri Cahyanto,Wahyu Widanarto', 'LPPM Universitas jenderal Soedir', '2018-07-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `nama_route` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `parent_id` bigint DEFAULT NULL,
  `is_aktif` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_assignments`
--

CREATE TABLE `reviewer_assignments` (
  `id` int NOT NULL,
  `submission_id` int NOT NULL,
  `user_id` int NOT NULL,
  `reviewer_order` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewer_assignments`
--

INSERT INTO `reviewer_assignments` (`id`, `submission_id`, `user_id`, `reviewer_order`) VALUES
(1, 49, 2, 1),
(2, 49, 2, 1),
(3, 49, 2, 1),
(4, 49, 2, 1),
(5, 49, 2, 1),
(6, 49, 2, 1),
(7, 49, 2, 1),
(8, 52, 2, 1),
(9, 52, 3, 2),
(10, 58, 2, 1),
(11, 58, 2, 1),
(12, 58, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Full Hak Akses'),
(2, 'Rektor', 'Menyetujui Surat Permohonan'),
(3, 'Ketua Lembaga LPPM', 'Menyetujui Surat Pernyataan'),
(4, 'Dekan', 'Menyetujui Surat Pengantar'),
(5, 'Reviewer', 'Menilai Kelayakan Ajuan Insentif'),
(6, 'Dosen', 'Yang mengajukan insentif');

-- --------------------------------------------------------

--
-- Table structure for table `scopus`
--

CREATE TABLE `scopus` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(512) NOT NULL,
  `publication_name` varchar(256) NOT NULL,
  `quartile` int NOT NULL,
  `issn` varchar(16) NOT NULL,
  `citeby_count` int NOT NULL,
  `creator` varchar(64) NOT NULL,
  `page` int NOT NULL,
  `volume` int NOT NULL,
  `cover_date` varchar(10) NOT NULL,
  `cover_display_date` varchar(32) NOT NULL,
  `doi` varchar(64) NOT NULL,
  `aggregation_type` varchar(64) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `author` varchar(64) NOT NULL,
  `file` varchar(128) NOT NULL,
  `is_submitted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `scopus`
--

INSERT INTO `scopus` (`id`, `user_id`, `title`, `publication_name`, `quartile`, `issn`, `citeby_count`, `creator`, `page`, `volume`, `cover_date`, `cover_display_date`, `doi`, `aggregation_type`, `url`, `author`, `file`, `is_submitted`) VALUES
(1, 0, 'Design a simple Covid-19 detection using corodet: A deep learning-based classification', 'AIP Conference Proceedings', 4, '0094243X', 0, 'Aliim M.S.', 0, 2482, '2023-02-21', '21 February 2023', '10.1063/5.0110764', 'Conference Proceedin', 'https://www.scopus.com/record/display.uri?eid=2-s2.0-85149920003&origin=resultslist&sort=plf-f', 'MUHAMMAD SYAIFUL ALIIM, S.T, M.T', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scopus_documents`
--

CREATE TABLE `scopus_documents` (
  `id` bigint NOT NULL,
  `quartile` varchar(50) DEFAULT NULL,
  `title` text,
  `publication_name` text,
  `creator` text,
  `page` varchar(255) DEFAULT NULL,
  `issn` text,
  `volume` varchar(255) DEFAULT NULL,
  `cover_date` date DEFAULT NULL,
  `cover_display_date` varchar(255) DEFAULT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `citedby_count` int DEFAULT NULL,
  `aggregation_type` varchar(255) DEFAULT NULL,
  `url` text,
  `authors_id` bigint DEFAULT NULL,
  `idsubmission` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `scopus_documents`
--

INSERT INTO `scopus_documents` (`id`, `quartile`, `title`, `publication_name`, `creator`, `page`, `issn`, `volume`, `cover_date`, `cover_display_date`, `doi`, `citedby_count`, `aggregation_type`, `url`, `authors_id`, `idsubmission`) VALUES
(85149920003, '4', 'Design a simple Covid-19 detection using corodet: A deep learning-based classification', 'AIP Conference Proceedings', 'Aliim M.S.', '', '0094243X', '2482', '2023-02-21', '21 February 2023', '10.1063/5.0110764', NULL, 'Conference Proceedin', 'https://www.scopus.com/record/display.uri?eid=2-s2.0-85149920003&origin=resultslist&sort=plf-f', 6696255, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `portfolio_id` bigint NOT NULL,
  `portfolio_database` varchar(16) NOT NULL,
  `submission_status` int NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submissions.backup`
--

CREATE TABLE `submissions.backup` (
  `id` int NOT NULL,
  `submission_type_id` int NOT NULL,
  `submission_status_id` smallint NOT NULL,
  `user_id` int NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions.backup`
--

INSERT INTO `submissions.backup` (`id`, `submission_type_id`, `submission_status_id`, `user_id`, `submission_date`) VALUES
(61, 3, 6, 5, '2023-06-09 18:51:55'),
(62, 2, 6, 6, '2023-06-09 18:51:55'),
(63, 1, 6, 6, '2023-06-09 18:51:55'),
(64, 3, 6, 6, '2023-06-09 18:51:55'),
(65, 2, 6, 7, '2023-06-09 18:51:55'),
(66, 2, 6, 7, '2023-06-09 18:51:55'),
(67, 3, 6, 8, '2023-06-09 18:51:55'),
(68, 2, 6, 9, '2023-06-09 18:51:55'),
(69, 3, 6, 9, '2023-06-09 18:51:55'),
(70, 2, 6, 10, '2023-06-09 18:51:55'),
(71, 3, 6, 11, '2023-06-09 18:51:55'),
(72, 2, 6, 12, '2023-06-09 18:51:55'),
(73, 3, 6, 13, '2023-06-09 18:51:55'),
(74, 2, 6, 13, '2023-06-09 18:51:55'),
(75, 2, 6, 14, '2023-06-09 18:51:55'),
(76, 3, 6, 15, '2023-06-09 18:51:55'),
(77, 3, 6, 16, '2023-06-09 18:51:55'),
(78, 3, 6, 13, '2023-06-09 18:51:55'),
(79, 3, 6, 17, '2023-06-09 18:51:55'),
(80, 3, 6, 17, '2023-06-09 18:51:55'),
(81, 2, 6, 18, '2023-06-09 18:51:55'),
(82, 3, 6, 19, '2023-06-09 18:51:55'),
(83, 2, 6, 19, '2023-06-09 18:51:55'),
(84, 2, 6, 20, '2023-06-09 18:51:55'),
(85, 2, 6, 20, '2023-06-09 18:51:55'),
(86, 3, 6, 21, '2023-06-09 18:51:55'),
(87, 2, 6, 22, '2023-06-09 18:51:55'),
(88, 2, 6, 23, '2023-06-09 18:51:55'),
(89, 2, 6, 24, '2023-06-09 18:51:55'),
(90, 2, 6, 25, '2023-06-09 18:51:55'),
(91, 2, 6, 26, '2023-06-09 18:51:55'),
(92, 2, 6, 27, '2023-06-09 18:51:55'),
(93, 3, 6, 27, '2023-06-09 18:51:55'),
(94, 2, 7, 28, '2023-06-09 18:51:55'),
(95, 5, 7, 28, '2023-06-09 18:51:55'),
(96, 2, 6, 27, '2023-06-09 18:51:55'),
(97, 5, 6, 27, '2023-06-09 18:51:55'),
(98, 2, 6, 29, '2023-06-09 18:51:55'),
(99, 2, 6, 29, '2023-06-09 18:51:55'),
(100, 2, 6, 30, '2023-06-09 18:51:55'),
(101, 3, 6, 31, '2023-06-09 18:51:55'),
(102, 2, 6, 31, '2023-06-09 18:51:55'),
(103, 2, 6, 32, '2023-06-09 18:51:55'),
(104, 2, 6, 33, '2023-06-09 18:51:55'),
(105, 2, 6, 34, '2023-06-09 18:51:55'),
(106, 2, 7, 35, '2023-06-09 18:51:55'),
(107, 3, 6, 36, '2023-06-09 18:51:55'),
(108, 2, 6, 36, '2023-06-09 18:51:55'),
(109, 2, 6, 37, '2023-06-09 18:51:55'),
(110, 3, 6, 38, '2023-06-09 18:51:55'),
(111, 1, 7, 39, '2023-06-09 18:51:55'),
(112, 2, 6, 40, '2023-06-09 18:51:55'),
(113, 2, 6, 41, '2023-06-09 18:51:55'),
(114, 2, 6, 32, '2023-06-09 18:51:55'),
(115, 2, 6, 42, '2023-06-09 18:51:55'),
(116, 2, 6, 43, '2023-06-09 18:51:55'),
(117, 3, 6, 44, '2023-06-09 18:51:55'),
(118, 1, 6, 44, '2023-06-09 18:51:55'),
(119, 4, 6, 44, '2023-06-09 18:51:55'),
(120, 1, 6, 44, '2023-06-09 18:51:55'),
(121, 1, 6, 44, '2023-06-09 18:51:55'),
(122, 2, 7, 45, '2023-06-09 18:51:55'),
(123, 2, 6, 43, '2023-06-09 18:51:55'),
(124, 3, 6, 46, '2023-06-09 18:51:55'),
(125, 2, 6, 47, '2023-06-09 18:51:55'),
(126, 2, 6, 48, '2023-06-09 18:51:55'),
(127, 2, 6, 49, '2023-06-09 18:51:55'),
(128, 4, 6, 50, '2023-06-09 18:51:55'),
(129, 2, 6, 50, '2023-06-09 18:51:55'),
(130, 2, 6, 51, '2023-06-09 18:51:55'),
(131, 2, 6, 52, '2023-06-09 18:51:55'),
(132, 3, 6, 53, '2023-06-09 18:51:55'),
(133, 3, 6, 54, '2023-06-09 18:51:55'),
(134, 2, 6, 55, '2023-06-09 18:51:55'),
(135, 3, 6, 55, '2023-06-09 18:51:55'),
(136, 5, 6, 38, '2023-06-09 18:51:55'),
(137, 3, 6, 56, '2023-06-09 18:51:55'),
(138, 3, 6, 56, '2023-06-09 18:51:55'),
(139, 3, 6, 57, '2023-06-09 18:51:55'),
(140, 2, 6, 58, '2023-06-09 18:51:55'),
(141, 2, 6, 58, '2023-06-09 18:51:55'),
(142, 5, 6, 59, '2023-06-09 18:51:55'),
(143, 3, 6, 60, '2023-06-09 18:51:55'),
(144, 2, 6, 43, '2023-06-09 18:51:55'),
(145, 2, 6, 61, '2023-06-09 18:51:55'),
(146, 2, 6, 62, '2023-06-09 18:51:55'),
(147, 3, 6, 62, '2023-06-09 18:51:55'),
(148, 3, 6, 63, '2023-06-09 18:51:55'),
(149, 1, 6, 64, '2023-06-09 18:51:55'),
(150, 3, 7, 39, '2023-06-09 18:51:55'),
(151, 3, 6, 38, '2023-06-09 18:51:55'),
(152, 2, 6, 65, '2023-06-09 18:51:55'),
(153, 2, 6, 66, '2023-06-09 18:51:55'),
(154, 2, 6, 67, '2023-06-09 18:51:55'),
(155, 2, 6, 68, '2023-06-09 18:51:55'),
(156, 1, 6, 68, '2023-06-09 18:51:55'),
(157, 1, 6, 68, '2023-06-09 18:51:55'),
(158, 2, 6, 69, '2023-06-09 18:51:55'),
(159, 2, 6, 70, '2023-06-09 18:51:55'),
(160, 2, 6, 71, '2023-06-09 18:51:55'),
(161, 3, 6, 71, '2023-06-09 18:51:55'),
(162, 2, 6, 72, '2023-06-09 18:51:55'),
(163, 2, 6, 73, '2023-06-09 18:51:55'),
(164, 3, 6, 73, '2023-06-09 18:51:55'),
(165, 3, 6, 73, '2023-06-09 18:51:55'),
(166, 3, 6, 8, '2023-06-09 18:51:55'),
(167, 3, 6, 74, '2023-06-09 18:51:55'),
(168, 3, 6, 75, '2023-06-09 18:51:55'),
(169, 3, 6, 56, '2023-06-09 18:51:55'),
(170, 2, 6, 76, '2023-06-09 18:51:55'),
(171, 2, 6, 77, '2023-06-09 18:51:55'),
(172, 2, 5, 78, '2022-10-31 17:00:00'),
(173, 1, 1, 1, '0000-00-00 00:00:00'),
(174, 1, 6, 6, '0000-00-00 00:00:00'),
(175, 1, 1, 1, '2023-07-11 03:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `submission_details`
--

CREATE TABLE `submission_details` (
  `id` int NOT NULL,
  `submission_id` int NOT NULL,
  `submission_type_detail_id` int NOT NULL,
  `value` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_details`
--

INSERT INTO `submission_details` (`id`, `submission_id`, `submission_type_detail_id`, `value`) VALUES
(279, 61, 32, 'Please Don\'t Treat Me Like A Servant, I Do Have My Rights : Indonesian Migrant Domestic Workers (IMDWS) Wrote Back in Familiar Strangers (2018)'),
(280, 62, 17, 'Survival and growth rates of mangroves planted in vertical and horizontal aquaponic systems in North Jakarta, Indonesia'),
(281, 63, 2, 'The potential of high tidal flooding disaster in North Jakarta using mapping and mangrove relationship approach'),
(282, 64, 32, 'Empang Parit as Silvofishery Model to Support Conserving Mangrove and Increasing Economic Benefit of Social Community'),
(283, 65, 17, 'High Intensity interval training improves inflamatory mediators in obese women : Bases on the study of the UCP2 Ala55val Gene'),
(284, 66, 17, 'The Effect of UCP2 45 bp Insersi/Delesi Genetic Variation on the Body Comosition of Woman with Obesity in Continous Training and High Intensity Interval Training : A Randomized Controlled Trial Study'),
(285, 67, 32, 'Analisis Penggunaan Bubuk Asap Cair Tempurung Kelapa Sebagai Bahan Pengawet'),
(286, 68, 17, 'Egg Production, Egg Quality, and Fatty Profile of Indonesian Local Duck Fed with Turmeric, Curcuma, and Probiotic Supplementation'),
(287, 69, 32, 'Developing Strategy to Reduce the Mortality of Native Chicken Using Qualitative Modelling'),
(288, 70, 17, 'New H-bridge based multilevel CSI using inductor-cell and current-module methods'),
(289, 71, 32, 'Tingkat Kecemasan Keluarga Komorbid Saat Pandemi COVID-19 di Kelurahan Grendeng Purwokerto Utara'),
(290, 72, 17, 'Integration of Numerical Models and InSAR Techniques to Assess Land Subsidance due to Excessive Groundwater Abstraction in the Coastal and Lowland Regions of Semarang City'),
(291, 73, 32, 'The Problem-Based Learning : How the effect on student critical thinking ability and learning motivation in COVID-19 pandemic'),
(292, 74, 17, 'Traditional Sport-Bases Learning : Innovative Learning Method to Improve Fundamental Movement Skills and Learning Motivation'),
(293, 75, 17, 'Glukose biosensor based on activated carbon - Nife2O4 nanoparticles composite modified carbon paste electrode'),
(294, 76, 32, 'Determinant of The Authority to Adjudicate Child Adoption for Muslims in Indonesia'),
(295, 77, 32, 'Studi Fenomenologi : Pengalaman Caregiver dalam Merawat  Pasien Hemodialisis Rutin'),
(296, 78, 32, 'Improvement Physical Fitness Level on Mountain Climbing Athletes : High-Intensity Interval Training and Oregon Circuit Training Effect'),
(297, 79, 32, 'Design and Simulation of a Multistages Common-Emitter, Common-Collector, AC Voltage Amplifier'),
(298, 80, 32, 'Design and Simulation of Building Blocks of a Low-Dropout Voltage Regulator'),
(299, 81, 17, 'Dutch and Indonesian teachers on teaching medical ethics : what are the learning goals?'),
(300, 82, 32, 'Sistem Monitoring dan Kontrol Iklim Mikro pada Plant-Factory Berbasis Internet fo Things'),
(301, 83, 17, 'Machine Learning Model for Quality Parameters Prediction and Control System Design in the Kecombrang Flower (Etlingera elatior) Extraction Process'),
(302, 84, 17, 'Effect of ethanol concentration and extraction time with microwave asisted extraction on antioxidant activity of temulawak-extract (Curcuma xanthorrhiza.Roxb)'),
(303, 85, 17, 'The effect of basic ingredient form, cold storage and precipitate separation on bioactive components and antioxidant activity of Curcuma xanthorrhiza Roxb'),
(304, 86, 32, 'Enkapsulasi Serbuk Simplisia dan Ekstrak Kulit Jeruk serta Aplikasinya pada Vegetables Jam'),
(305, 87, 17, 'The Effect of adding lysine to sap on chemical characteristics and antioxidant activity of granulated coconut sugar'),
(306, 88, 17, 'Lipase Activity, Hematological and Blood Biochemistry of Osphronemus gouramy Fed with Supplementasion of Spirulina platensis and Chlorella vulgaris'),
(307, 89, 17, 'Morphological and molecular characteristic of mole crab (Genus: Emerita) in the Cilacap coastlines of Indonesia, with particular focus on genetic diversity of Emerita sp.Nov'),
(308, 90, 17, 'Understanding Academic Fraud : The Role of Dark Triad Personality and Situational Factor'),
(309, 91, 17, 'The Indonesian Government Capacity in Responding to the COVID-19 Impacts on the Creative Economy Sector'),
(310, 92, 17, 'Determinant of consumer\'s motivation towards ethnic food : evidence from Indonesia'),
(311, 93, 32, 'Strategi Kerjasama Pengembangan Institusi Halal : Implementasi pada Halal Center'),
(312, 94, 17, 'Developing Student Entrepreneurship Program Model'),
(313, 95, 51, 'Managerial Ability  Berkomitmen pada Efektivitas dalam Pemberian Kredit Guna Mengoptimalkan Liquidity Creation'),
(314, 96, 17, 'Perceived attributes driving the adoption of system of rice intensification : The Indonesian farmers\'view'),
(315, 97, 51, 'SRI (System of Rice Intensification) : dari produsen ke konsumen'),
(316, 98, 17, 'Impact of introduction of managed honey bee coloby on wild bee diversity and abundance in an agroecosystem in Indonesia'),
(317, 99, 17, 'Rediscovery of Bombus ruficeps Lepeletier 1835 (Hynenoptera : Apoidea : Bombidae) on Mount Slamet'),
(318, 100, 17, 'Anatomical and histological Characteristics of Gonad of Tropical ell Anguilla bicolor McClelland in Different Length Body Size'),
(319, 101, 32, 'Protease and Amylase Activies of Javaen barb (Systomus rubripinnis Val.) '),
(320, 102, 17, 'Digestive Enzyme Activities in Barred Loach (Nemacheilus fasciatus Val., 1846) : Effect of pH and Temperature'),
(321, 103, 17, 'Improving cached data offloading optimization bases on enhanced hybrid ant colony genetic algorithm'),
(322, 101, 32, 'Protease and Amylase Activies of Javaen barb (Systomus rubripinnis Val.) '),
(323, 102, 17, 'Digestive Enzyme Activities in Barred Loach (Nemacheilus fasciatus Val., 1846) : Effect of pH and Temperature'),
(324, 103, 17, 'Improving cached data offloading optimization bases on enhanced hybrid ant colony genetic algorithm'),
(325, 104, 17, 'Somatic embryogenesis of the selected intergeneric hybrid between Phalaenopsis 2166 and Vanda \'Saint Valentine\' : Application of NAA and TDZ'),
(326, 105, 17, 'RAPD Profiles of Rhynchostylis gigantea (Lindl.) Ridl. Collected from Puspa Nirmala Orchids Banyumas, Central Java'),
(327, 106, 17, 'Covid-19 Pandemic and It\'s Impact on Household Financial Behaviour in Indonesia'),
(328, 107, 32, 'Sound Productivity of Spiny Lobster Panulirus homarus (Linnaeus, 1758) due to Crade Oil Contamination'),
(329, 108, 17, 'Sound Diversity as Representation to the Behaviour of Spiny Lobster Panulirus homarus (Linnaeus, 1758)'),
(330, 109, 17, 'Educational Interventions to Improve the Emphaty of Pharmacy Students Toward Geriatrics : A Systemic Review'),
(331, 110, 32, 'Struktur Kekar sebagai Pengganggu Stabilitas Bangunan Jembatan di Daerah Plampang-Kokap, Yogyakarta'),
(332, 111, 2, 'Development and Testing of Artificial Neural Network with Backpropagation Algorithm to Predict the Power Ratio of Savonius Wind Turbine'),
(333, 112, 17, 'Flavonoids as Dietary Additives in Laving Hens : A Meta-analysis of Production Performance, Egg Quality, Liver, and Antioxidant Enzyme Profile'),
(334, 113, 17, 'Effect of Protection of Soybean Meal Using Mahogany Leaf Extract in Ruminant Diet on Rumen Fermentation'),
(335, 114, 17, 'LRU-GENACO : A hibryd cached data optimatization based on least used method improved using an ant colony and genetic algorithms'),
(336, 115, 17, 'Revealing University Students\'Attitudes toward English Language Learning in Indonesian Contexts'),
(337, 116, 17, 'Organizational Justice, Job Stress, and Cyberloafing : The Moderating Role of Islamic Workplace Spirituality'),
(338, 117, 32, 'Textile Wastewater Decolorization by Pleurotus ostreatus in Organic Material Board Media'),
(339, 118, 2, 'Decolorization of indigosol blue batik effluent using Lepiota sp. Isolated from Baturraden Botanical Garden'),
(340, 119, 47, 'Aspergillus sclerotiorum strain G.PN : Fungi Unggul Dalam Dekolorisasi Limbah Batik'),
(341, 120, 2, 'Crude Enzyme of Aspergillus sp. Immobilized in Chitosan-Beads to Decolorize Batik Effluent'),
(342, 121, 2, 'Study of N, P, K, and C on Degradation of Indigosol Batik Dye Effluent by Aspergillus sp. BPN'),
(343, 122, 17, 'Agribusiness Based Coastal Tourism Development'),
(344, 123, 17, 'We need to talk about kinship : how kinship weakens turnover intentions among academicians at private higher education institutions in Indonesia'),
(345, 124, 32, 'Nutrient Uptake, Chlorophyll Content, and Yield of Rice (Oryza sativa) under the Application of PGPR Consortinum'),
(346, 125, 17, 'The Influence of Social Demographic Toward Homosexuality from Seven Countries in Southeast Asia'),
(347, 126, 17, 'Exploitation of striped snakehead (Channa striata) in Sempor Reservoir, Central Java, Indonesia : A proposed conservation strategy'),
(348, 127, 17, 'Two Dark Stories from Rural Indonesia : Comparing the Poverly in Turah (2016) and Siti (2014)'),
(349, 128, 47, 'Formula Biobakterisida Bacillus subtilis B315 sebagai Pengendali Ralstonia solanacearum'),
(350, 129, 17, ''),
(351, 130, 17, 'Potential of Bacillus subtilis potato isolate as biocontrol agent of Xanthomonas oryzae pv. Orizae and candidate for nanosuspension formula'),
(352, 131, 17, 'Heading Toward Autonomous and Dynamic Press Freedom In Indonesia'),
(353, 132, 32, 'Media Baru sebagai Sarana Promosi Taman Lazuardi dalam rangka Memperkuat Ketahanan Ekonomi Masyarakat Desa Susukan'),
(354, 133, 32, 'Nurses \'Perspective on Postpartum Education Needs In A Referral Hospital\''),
(355, 134, 17, 'Genetic Parameters, Inter-relationship Among Agronomic Traits and Dehulled Rice Morpho-Biochemical Profile of Promising Black Rice x Mentik Wangi Lines'),
(356, 135, 32, 'Amylose Profile and rice grain morphology of selected F6 lines derived from a crossing of black rice and mentik wangi for the development of waxy pigmented rice'),
(357, 136, 51, 'Sesar Mendatar/Patahan Geser Kanan Kiri'),
(358, 137, 32, 'Investigation on electron contamination of LINAC at different oprating voltages using particle heavy ion transport code system (PHITS)'),
(359, 138, 32, 'Modelling and Analysis of Percentage Depth Dose (PDD) and Dose Profile of X-Ray Beam Produced by Linac Device with Voltage Variation'),
(360, 139, 32, 'The diversity of flora at the Late Pliocene era in the Cisubuh Formation based on palynological data'),
(361, 140, 17, 'Circulation microRNA expression profiles in patients with complete responses to chemoradiotherapy in nasopharyngeal carcinoma'),
(362, 141, 17, 'MicroRNA Gene Signature for predicting Mechanisms in Nasopharyngeal Carcinoma : A Case Study on the Potential Application of Circulating Biomaekers'),
(363, 142, 51, '8 Langkah Belajar Bahasa Inggris untuk Pramuwisata Lokal'),
(364, 143, 32, 'Antibiotic resistance of biofilm-preoducing bacteria from sepsis patients in Prof Dr Margono Soekarjo Hospital, Purwokerto, Central Java'),
(365, 144, 17, 'Workplace deviant behavior among employees of Islamic-based universities in Lampung : the moderating role of Islamic workplace sprituality'),
(366, 145, 17, 'Environmental Constraints in Building Process a Sustainable Geothermal Power Plant on The Slopes of Slamet Mount, Central Java, Indonesia'),
(367, 146, 17, 'Marker validation for salt tolerance in Indica rice'),
(368, 147, 32, 'Microsatellite Markers and Metabolite Profiles of Salt-olerant Rice : Inpari Unsoed 79 Agritan'),
(369, 148, 32, 'Photosynthetic pigment content and growth of chili under low light intensity for agroforestry crop development'),
(370, 149, 2, 'The setting time of portland composite cement mixed with calcium stearate'),
(371, 150, 32, 'Development and Testing a Method for Retrieving Atmospheric Aerosol Optical Thickness based on the Solar Intensity from the Sun-photometer data'),
(372, 151, 32, 'Pola Struktur Geologi Pembentuk Zona Mineralisasi Di Bukit Randu, Kecamatan Selogiri, Kabupaten Wonogiri, Jawa Tengah'),
(373, 152, 17, 'The most suitable topic of Personal Finance Education University Student : Study Case in Indonesia'),
(374, 153, 17, 'Production of Fear : The Visual Analysis of Local Lockdown Warning Sign'),
(375, 154, 17, 'Effectiveness of various feed supplement on villi characteristics, feed digestibility, and liver-kidney function of broiler chickens'),
(376, 155, 17, 'The Effect of Sea Watermersion on Buton Asphalt (As -Buton) Mixture '),
(377, 156, 2, 'Determining of black spot location in Purbalingga Regency using road geometric approach'),
(378, 157, 2, 'Determining the maximumspeed limit based on stopping sight distance (SSD) and riskof family'),
(379, 158, 17, 'Nonlinear 3D Model of Double Shear Lap Tests for the Bond of Near-surface Mounted FRP Rods in Concrete Considering Different Embedment Depth'),
(380, 159, 17, 'Land Cover Changesand Impact of Massive Siltation on the Mangrove Segar Anakan Lagoon Syatem, Cilacap, Indonesia'),
(381, 160, 17, 'Does Exposure to Health-related Information and Peer Effect Affect the Nutritional Status of Adolescents in Urban and Rural Areas'),
(382, 161, 32, 'Stunting Incident in Infant Related to Mother\'s History During Pregnancy'),
(383, 162, 17, 'Maternal Factors to Prevents Obstetric Complication in Banyumas District, Indonesia'),
(384, 163, 17, 'Levels of inflammatory cytokines (IL-6,IL-10, TNF-a, IFN-y) after the inductions of various stress models of sleep deprivation in male wistar rats'),
(385, 164, 32, 'Combination of Vitamin C and E Improves Spermatogenesis of White Male Rat Model of Paradoxical Sleep Deprivation Stress'),
(386, 165, 32, 'Semen Leucocytes Affect Sperm Quality of Infertility Patient'),
(387, 166, 32, 'Rekayasa dan Uji Performansi Kompor LPG Bertekanan dengan Tungku Serbuk Kayu Pada Produksi Gula Kelapa Kristal'),
(388, 167, 32, 'Application Paclobutrazol and duration of Drought Stress Flowering Induction in Chokun Orange'),
(389, 168, 32, 'Immobilization of urase from Phaseolus vulgaris L. seed using calcium alginate as a support matrix'),
(390, 169, 32, 'Simulation of Neutron Contamination from Medical Linac Using Particle and Heavy Ions Transport Code System (PHITS)'),
(391, 170, 17, 'Synthesis and Antimicrobial Activity of Silver N-Methyl Chitosan'),
(392, 171, 17, 'Diversity and Prevalence of Endoparasites in Domestic Chickens across an elevation gradient'),
(393, 172, 17, 'Phytoplankton community in vannamei shrimp (litopenaeus vannamei) cultivation intensive ponds'),
(394, 175, 1, ''),
(395, 175, 2, 'Judul Publikasi'),
(396, 175, 3, 'Nama Proceeding'),
(397, 175, 4, 'Tahun Terbit '),
(398, 175, 10, 'DOI'),
(399, 175, 11, 'ISSN'),
(400, 175, 12, 'Halaman'),
(401, 175, 13, 'Volume Nomor'),
(402, 175, 14, 'Nomor');

-- --------------------------------------------------------

--
-- Table structure for table `submission_documents`
--

CREATE TABLE `submission_documents` (
  `id` int NOT NULL,
  `submission_id` int NOT NULL,
  `submission_type_detail_id` int NOT NULL,
  `file_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `original_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','deleted') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_documents`
--

INSERT INTO `submission_documents` (`id`, `submission_id`, `submission_type_detail_id`, `file_name`, `original_name`, `file_type`, `file_size`, `uploaded_at`, `file_path`, `status`) VALUES
(18, 52, 5, '63d15f4ddb635_52_1_5.pdf', 'Letter of Acceptance.pdf', 'pdf', 33397, '2023-01-25 23:56:45', 'uploads/63d15f4ddb635_52_1_5.pdf', 'deleted'),
(19, 52, 5, '63d16180b29d8_52_1_5.pdf', 'Print-out Hasil Pencarian Database Pengindeks.pdf', 'pdf', 35429, '2023-01-26 00:06:08', 'uploads/63d16180b29d8_52_1_5.pdf', 'deleted'),
(20, 52, 7, '63d1eee503d5b_52_1_7.pdf', 'Print-out Bukti Artikel Prosiding 4 Negara.pdf', 'pdf', 35628, '2023-01-26 10:09:25', 'uploads/63d1eee503d5b_52_1_7.pdf', 'active'),
(21, 52, 5, '63d49da4b2b4c_52_1_5.pdf', 'Surat Permohonan kepada Rektor dengan Surat Pengantar dari Pimpinan Unit Kerja.pdf', 'pdf', 37076, '2023-01-28 10:59:32', 'uploads/63d49da4b2b4c_52_1_5.pdf', 'deleted'),
(22, 52, 7, '63d49f9b3faae_52_1_7.pdf', 'Print-out artikel terpublikasi.pdf', 'pdf', 34210, '2023-01-28 11:07:55', 'uploads/63d49f9b3faae_52_1_7.pdf', 'deleted'),
(23, 53, 5, '63d4a40010a5a_53_1_5.pdf', 'Surat Permohonan kepada Rektor dengan Surat Pengantar dari Pimpinan Unit Kerja.pdf', 'pdf', 37076, '2023-01-28 11:26:40', 'uploads/63d4a40010a5a_53_1_5.pdf', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `submission_statuses`
--

CREATE TABLE `submission_statuses` (
  `id` tinyint NOT NULL,
  `name` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_statuses`
--

INSERT INTO `submission_statuses` (`id`, `name`, `description`) VALUES
(1, 'DRAFT', 'DRAFT'),
(2, 'SUBMIT', 'SUBMIT'),
(3, 'ASSIGN REVIEWER', 'PEMILIHAN REVIEWER'),
(4, 'REVIEW PROCESS', 'PROSES REVIEW'),
(5, 'REVIEWED', 'SELESAI REVIEW'),
(6, 'GRANTED', 'DISETUJUI'),
(7, 'NOT GRANTED', 'TIDAK DISETUJUI');

-- --------------------------------------------------------

--
-- Table structure for table `submission_types`
--

CREATE TABLE `submission_types` (
  `id` tinyint NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_types`
--

INSERT INTO `submission_types` (`id`, `name`, `description`) VALUES
(1, 'Prosiding Terindeks', 'Prosiding Terindeks'),
(2, 'Jurnal Internasional', 'Jurnal Internasional'),
(3, 'Jurnal Nasional', 'Jurnal Nasional'),
(4, 'Kekayaan Intelektual', 'Kekayaan Intelektual'),
(5, 'Buku', 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `submission_type_details`
--

CREATE TABLE `submission_type_details` (
  `id` smallint NOT NULL,
  `submission_type_id` int NOT NULL,
  `name` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_type_details`
--

INSERT INTO `submission_type_details` (`id`, `submission_type_id`, `name`, `type`, `description`) VALUES
(1, 1, 'proposer', 'detail', ''),
(2, 1, 'title', 'detail', 'Proceeding Title'),
(3, 1, 'proceeding', 'detail', ''),
(4, 1, 'publication-year', 'detail', ''),
(5, 1, 'application-letter-to-rector', 'document', 'application-letter-to-rector'),
(6, 1, 'letter-of-acceptance', 'document', ''),
(7, 1, 'manuscript', 'document', ''),
(8, 1, 'search-result-indexer-database', 'document', ''),
(9, 1, 'four-nation-proceeding', 'document', ''),
(10, 1, 'doi', 'detail', ''),
(11, 1, 'issn', 'detail', ''),
(12, 1, 'page', 'detail', ''),
(13, 1, 'volume', 'detail', ''),
(14, 1, 'number', 'detail', ''),
(15, 1, 'issn-online', 'detail', ''),
(16, 2, 'proposer', 'detail', ''),
(17, 2, 'title', 'detail', 'International Journal Title'),
(18, 2, 'proceeding', 'detail', ''),
(19, 2, 'publication-year', 'detail', ''),
(20, 2, 'application-letter-to-rector', 'document', 'application-letter-to-rector'),
(21, 2, 'letter-of-acceptance', 'document', ''),
(22, 2, 'manuscript', 'document', ''),
(23, 2, 'search-result-indexer-database', 'document', ''),
(24, 2, 'four-nation-proceeding', 'document', ''),
(25, 2, 'doi', 'detail', ''),
(26, 2, 'issn', 'detail', ''),
(27, 2, 'page', 'detail', ''),
(28, 2, 'volume', 'detail', ''),
(29, 2, 'number', 'detail', ''),
(30, 2, 'issn-online', 'detail', ''),
(31, 3, 'proposer', 'detail', ''),
(32, 3, 'title', 'detail', 'National Journal Title'),
(33, 3, 'proceeding', 'detail', ''),
(34, 3, 'publication-year', 'detail', ''),
(35, 3, 'application-letter-to-rector', 'document', 'application-letter-to-rector'),
(36, 3, 'letter-of-acceptance', 'document', ''),
(37, 3, 'manuscript', 'document', ''),
(38, 3, 'search-result-indexer-database', 'document', ''),
(39, 3, 'four-nation-proceeding', 'document', ''),
(40, 3, 'doi', 'detail', ''),
(41, 3, 'issn', 'detail', ''),
(42, 3, 'page', 'detail', ''),
(43, 3, 'volume', 'detail', ''),
(44, 3, 'number', 'detail', ''),
(45, 3, 'issn-online', 'detail', ''),
(46, 4, 'number', 'detail', 'intellectual property number'),
(47, 4, 'title', 'detail', 'Intellectual Property Title'),
(48, 4, 'inventor', 'detail', 'intellectual property inventor'),
(49, 4, 'type', 'detail', 'intellectual property type'),
(50, 4, 'date', 'detail', 'intellectual property date'),
(51, 5, 'title', 'detail', 'Book Title');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar_dekan`
--

CREATE TABLE `surat_pengantar_dekan` (
  `id` int NOT NULL,
  `submission_id` int NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `hal` varchar(100) NOT NULL,
  `nama_jurnal` varchar(200) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `acc_dekan` timestamp NULL DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_pengantar_dekan`
--

INSERT INTO `surat_pengantar_dekan` (`id`, `submission_id`, `nomor_surat`, `hal`, `nama_jurnal`, `tanggal_surat`, `acc_dekan`, `createdate`) VALUES
(1, 3, '-', 'Surat Pengantar Permohonan Pengajuan Insentif Karya Ilmiah scopus', 'Design a simple Covid-19 detection using corodet: A deep learning-based classification', '2023-12-28', NULL, '2023-12-28 08:41:36'),
(2, 6, '-', 'Surat Pengantar Permohonan Pengajuan Insentif Karya Ilmiah scopus documents', 'Design a simple Covid-19 detection using corodet: A deep learning-based classification', '2024-01-02', NULL, '2024-01-02 07:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(17) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `iddosen` bigint DEFAULT NULL,
  `faculty_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `idauthors` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `username`, `password`, `nip`, `iddosen`, `faculty_id`, `department_id`, `idauthors`) VALUES
(1, 'muhammad.syaiful.aliim@unsoed.ac.id', 'Administrator', 'admin', '$2y$10$nJz6Qed8oKOKvvh996QuT.fp7QNkFpe1LGKc9tAYgYybKSLPfDXH.', '19900905201903102', 338, 4, 1, 6696255),
(94, 'mohammad.irham@unsoed.ac.id', 'MOHAMMAD IRHAM AKBAR', 'mohammad.irham@unsoed.ac.id', 'ce40235163e622c565a5bd9a54be2fa9', '19940810202203101', 621038231, NULL, NULL, 6816293);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `dtype` int NOT NULL,
  `nidn` int NOT NULL,
  `nip` int NOT NULL,
  `name` int NOT NULL,
  `prefix_degree` int NOT NULL,
  `suffix_degree` int NOT NULL,
  `sex` int NOT NULL,
  `birthplace` int NOT NULL,
  `birthdate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(24, 94, 1),
(26, 1, 1),
(27, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `wos`
--

CREATE TABLE `wos` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `publon_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `wos_id` varchar(16) NOT NULL,
  `doi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(512) NOT NULL,
  `first_author` varchar(256) NOT NULL,
  `last_author` varchar(256) NOT NULL,
  `authors` varchar(256) NOT NULL,
  `publish_date` varchar(10) NOT NULL,
  `journal_name` varchar(128) NOT NULL,
  `citation` int NOT NULL,
  `abstract` varchar(1024) NOT NULL,
  `publish_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `publish_year` varchar(4) NOT NULL,
  `page_begin` int NOT NULL,
  `page_end` int NOT NULL,
  `issn` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `eissn` varchar(16) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `author` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `file` varchar(128) NOT NULL,
  `is_submitted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wos`
--

INSERT INTO `wos` (`id`, `user_id`, `publon_id`, `wos_id`, `doi`, `title`, `first_author`, `last_author`, `authors`, `publish_date`, `journal_name`, `citation`, `abstract`, `publish_type`, `publish_year`, `page_begin`, `page_end`, `issn`, `eissn`, `url`, `author`, `file`, `is_submitted`) VALUES
(1, 0, '', '', '', 'A GasFET for chlorine detection', 'Sulima, T; Knittel, T; Freitag, G;', 'Eisele, I', 'Sulima, T; Knittel, T; Freitag, G; Widanarto, W; Eisele, I;', '2005', '2005 IEEE SENSORS, VOLS 1 AND 2', 1, 'The work function potential shift due to the chemical reaction of gold in a chlorine gas ambient is electrically measured. The sensor principle is based on a hybrid suspended gate field effect transistor. Gas measurements show that at 190 degrees C a reversible chlorine detection without any cross sensitivities to other gas species is possible.', 'Books in series', '2005', 113, 115, '1930-0395', '-', 'https://www.webofscience.com/wos/woscc/full-record/WOS:000237003500028', 'Dr R WAHYU WIDANARTO, S.Si, M.Si', '-', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_scholar`
--
ALTER TABLE `google_scholar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs`
--
ALTER TABLE `iprs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer_assignments`
--
ALTER TABLE `reviewer_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scopus`
--
ALTER TABLE `scopus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scopus_documents`
--
ALTER TABLE `scopus_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions.backup`
--
ALTER TABLE `submissions.backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission_details`
--
ALTER TABLE `submission_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_details_ibfk_1` (`submission_id`);

--
-- Indexes for table `submission_documents`
--
ALTER TABLE `submission_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission_statuses`
--
ALTER TABLE `submission_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission_types`
--
ALTER TABLE `submission_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission_type_details`
--
ALTER TABLE `submission_type_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_pengantar_dekan`
--
ALTER TABLE `surat_pengantar_dekan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wos`
--
ALTER TABLE `wos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `google_scholar`
--
ALTER TABLE `google_scholar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iprs`
--
ALTER TABLE `iprs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer_assignments`
--
ALTER TABLE `reviewer_assignments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scopus`
--
ALTER TABLE `scopus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `submissions.backup`
--
ALTER TABLE `submissions.backup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `submission_details`
--
ALTER TABLE `submission_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `submission_documents`
--
ALTER TABLE `submission_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `submission_statuses`
--
ALTER TABLE `submission_statuses`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submission_types`
--
ALTER TABLE `submission_types`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submission_type_details`
--
ALTER TABLE `submission_type_details`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `surat_pengantar_dekan`
--
ALTER TABLE `surat_pengantar_dekan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wos`
--
ALTER TABLE `wos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `submission_details`
--
ALTER TABLE `submission_details`
  ADD CONSTRAINT `submission_details_ibfk_1` FOREIGN KEY (`submission_id`) REFERENCES `submissions.backup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
