-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2024 at 01:47 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plorars`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kategori`, `fakultas`, `judul`, `deskripsi`, `gambar`, `link`) VALUES
(1, 'Unit Kegiatan Mahasiswa', 'None', 'HIPMI PT', 'HIPMI PT UNIVERSITAS TELKOM adalah sebuah organisasi yang mewadahi mahasiswa / mahasiswi Telkom University yang berkeinginan untuk menjadi seorang entrepreneur.', 'IMG-665ad02f8341d0.91219442.jpeg', 'https://www.instagram.com/hipmiunivtelkom'),
(2, 'Unit Kegiatan Mahasiswa', 'None', 'SEARCH', 'SEARCH Telkom University (Student Activities for Research and Competition Handling) sesuai namanya merupakan sebuah organisasi riset atau peneitian mahasiswa sekaligus organisasi yang menangani berbagai kompetisi kemahasiswaan di kampus Telkom University. SEARCH sebagai organisasi riset mahasiswa Telkom University didesain sebagai UKM penelitian yang berfungsi mewadahi berbagai kegiatan mahasiswa Telkom University, agar mampu berperan sebagai agent of change melalui karya-karya penelitian yang bersifat inovatif, produktif, berfikir dengan analisis serta berkreatifitas dengan menyikapi setiap fenomena yang terjadi di dunia bisnis global sesuai disiplin ilmu yang berlaku di Telkom University.', 'IMG-665ad061425fe4.67193435.jpeg', 'https://linktr.ee/SEARCHTelkomUniv'),
(3, 'Unit Kegiatan Mahasiswa', 'None', 'Marketing Crew', 'Marketing Crew adalah komunitas mahasiswa yang berada di bawah naungan Direktorat Pemasaran dan Admisi Telkom University. Komunitas ini beranggotakan mahasiswa aktif dari seluruh prodi di Telkom University. Marketing Crew berperan dalam kegiatan pemasaran dan pendaftaran mahasiswa baru Telkom University mulai dari layanan komunikasi, layanan media sosial, dan kegiatan sosialisasi maupun roadshow di daerah-daerah wilayah Indonesia untuk membagikan informasi Telkom University kepada adik-adik SMA/ SMK/ MA. Selain itu, anggota Marketing Crew juga berperan dalam kegiatan pameran edukasi.', 'IMG-665ad0d14408c4.51057213.jpeg', 'https://linktr.ee/marketingcrew.telkomuniversity'),
(5, 'Unit Kegiatan Mahasiswa', 'None', 'CCI', 'Central Computer Improvement (CCI) merupakan Unit Kegiatan Mahasiswa yang bergerak pada bidang penalaran teknologi informasi dan komunikasi dalam lingkup Universitas Telkom.', 'IMG-665ad12237c599.09145860.jpg', 'https://lnk.bio/UKMCCI'),
(6, 'Unit Kegiatan Mahasiswa', 'None', 'Al-Fath', 'Al-Fath adalah sebuah lembaga dakwah kampus Universitas Telkom yang secara resmi berdiri pada 28 November 2013 hasil dari penggabungan 4 LDK. LDK Al – Fath Universitas Telkom dalam operasionalnya menjalankan fungsi pergerakan, pembinaan, pengkajian dan pelayanan.', 'IMG-665ad15b6118f5.53662141.jpeg', 'https://www.instagram.com/alfath_telu'),
(7, 'Unit Kegiatan Mahasiswa', 'None', 'AKSARA', 'Aksara merupakan salah satu Unit Kegiatan Mahasiswa (UKM) penalaran di Telkom University yang menggeluti bidang jurnalistik dan sastra. Pengertian kata “Aksara” adalah suatu sistem simbol visual yang tertera pada kertas, maupun media lainnya untuk mengungkapkan unsur-unsur yang ekspresif dalam suatu Bahasa. Istilah lain untuk menyebut Aksara adalah sistem tulisan.', 'IMG-665ad282717db8.60279015.png', 'https://linkin.bio/aksarapers'),
(8, 'Unit Kegiatan Mahasiswa', 'None', 'Archatel', 'Archatel adalah Unit Kegiatan Mahasiswa (UKM) panahan di Telkom University. Mereka berfokus pada pengembangan dan pembinaan mahasiswa dalam olahraga panahan. Archatel memiliki tujuan untuk meningkatkan keterampilan dan prestasi dalam bidang panahan serta memperluas minat dan kecintaan mahasiswa terhadap olahraga ini. Melalui berbagai kegiatan seperti latihan rutin, kompetisi internal dan eksternal, serta kegiatan sosial, Archatel berusaha menciptakan lingkungan yang kondusif bagi pengembangan atlet panahan yang kompeten dan berprestasi.', 'IMG-665ad31e00c8a7.98512677.png', 'https://archatel2023.my.canva.site'),
(9, 'Unit Kegiatan Mahasiswa', 'None', 'Fotografi Telkom', 'Unit Kegiatan Mahasiswa resmi Telkom University yang bergerak dalam bidang peminatan mahasiswa pada dunia fotografi.', 'IMG-665ad368330067.27145716.jpeg', 'https://linktr.ee/fotografitelkom'),
(10, 'Unit Kegiatan Mahasiswa', 'None', 'Student English Society', 'Student English Society (SES) merupakan organisasi mahasiswa di Telkom University yang berfokus pada pengembangan kemampuan berbahasa Inggris mahasiswa. SES memiliki 6 divisi, yaitu Debat, Pidato, Scrabble, Penceritaan, Siaran Berita, dan Pembuatan Film. SES juga memiliki satu subdivisi, yaitu Hubungan Masyarakat (PR).', 'IMG-665ad93bc02386.04943192.jpeg', 'https://linktr.ee/sestelkomuniversity'),
(11, 'Unit Kegiatan Mahasiswa', 'None', 'Tel-U Esports', 'Tel-U Esports merupakan Unit Kegiatan Mahasiswa (UKM) di Telkom University yang mengumpulkan dan mengembangkan komunitas-komunitas video game di kampus. Sebagai wadah bagi pecinta video game, Tel-U Esports bertujuan untuk memfasilitasi kegiatan-kegiatan berkaitan dengan video game, seperti turnamen, pertemuan, pelatihan, dan diskusi.', 'IMG-665adb13ee6ce2.80133978.png', 'https://linktr.ee/teluesports'),
(12, 'Study Group', 'FIT', 'Metalabs', 'Metalabs adalah sebuah tim yang sangat bersemangat dalam menggunakan bakat kreatif dan teknologi multimedia untuk membuat perbedaan di dunia. Metalabs berfokus pada berbagai kegiatan yang memiliki dampak positif bagi masyarakat. Beberapa di antaranya termasuk mengembangkan konten edukatif, menciptakan kampanye kesadaran untuk isu-isu sosial penting, dan merancang aplikasi yang ramah pengguna bagi penyandang disabilitas. Kami berkomitmen untuk memanfaatkan keterampilan kreatif kami demi kebaikan bersama.', 'IMG-665c4a30842651.34631982.png', 'https://www.instagram.com/metalabs.fit'),
(13, 'Study Group', 'FIT', 'Chevalier Lab', 'Chevalier Lab adalah laboratorium yang berada di bawah naungan Program Studi D3 Rekayasa Perangkat Lunak Aplikasi di Fakultas Ilmu Terapan, Telkom University. Chevalier Lab merupakan wadah bagi para mahasiswa yang memiliki minat dan ketertarikan untuk belajar lebih dalam tentang Teknologi Informasi (IT). Lab ini menyediakan berbagai divisi yang dapat dipilih sesuai dengan minat mahasiswa, yang semuanya dirancang untuk meningkatkan kemampuan teknis dan kreatif mereka.', 'IMG-665c52ca9e1636.03246690.jpg', 'https://chevalierlab.netlify.app');

-- --------------------------------------------------------

--
-- Table structure for table `mbti_info`
--

CREATE TABLE `mbti_info` (
  `mbti_type` varchar(4) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `nama_mbti` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mbti_info`
--

INSERT INTO `mbti_info` (`mbti_type`, `image_path`, `nama_mbti`, `deskripsi`) VALUES
('ENFJ', 'enfj.png', 'The Teacher', 'ENFJs are charismatic, empathetic, and excellent at managing people. They are altruistic but may struggle with making tough decisions and can be overly sensitive to criticism.'),
('ENFP', 'enfp.png', 'The Champion', 'ENFPs are enthusiastic, creative, and enjoy exploring possibilities. They are good at motivating others but may struggle with follow-through and can be overly emotional.'),
('ENTJ', 'entj.png', 'The Commander', 'ENTJs are natural leaders, strategic, and efficient. They enjoy long-term planning and achieving goals. They can be seen as intimidating and may struggle with emotions.'),
('ENTP', 'entp.png', 'The Visionary', 'ENTPs are innovative, enthusiastic, and enjoy debating ideas. They are quick thinkers but may struggle with follow-through and can be seen as argumentative.'),
('ESFJ', 'esfj.png', 'The Provider', 'ESFJs are warm-hearted and cooperative. They value harmony and are attentive to others’ needs. They are excellent team players but can be overly concerned with others’ opinions.'),
('ESFP', 'esfp.png', 'The Performer', 'ESFPs are outgoing, friendly, and enjoy being the center of attention. They are practical and spontaneous but may struggle with organization and long-term planning.'),
('ESTJ', 'estj.png', 'The Supervisor', 'ESTJs are reliable, organized, and practical. They excel in managing people and projects. They are decisive and enjoy creating order and efficiency. However, they can be seen as rigid and may struggle with emotions.'),
('ESTP', 'estp.png', 'The Dynamo', 'ESTPs are energetic, resourceful, and enjoy living in the moment. They are good at solving immediate problems but can be impulsive and struggle with long-term planning.'),
('INFJ', 'infj.png', 'The Counselor', 'INFJs are insightful, empathetic, and driven by their values. They are good at understanding others but may struggle with practical matters and be overly idealistic.'),
('INFP', 'infp.png', 'The Healer', 'INFPs are idealistic, empathetic, and driven by their values. They are creative and loyal but may struggle with practical matters and be overly perfectionistic.'),
('INTJ', 'intj.png', 'The Mastermind', 'INTJs are strategic, independent, and enjoy complex problem-solving. They are confident and analytical but may struggle with emotions and be seen as arrogant.'),
('INTP', 'intp.png', 'The Architect', 'INTPs are logical, independent, and enjoy theoretical and abstract thinking. They are innovative but may struggle with follow-through and emotional expression.'),
('ISFJ', 'isfj.png', 'The Protector', 'ISFJs are kind, conscientious, and reliable. They have a strong sense of duty and are good at remembering details about people. They may take criticism personally and can be resistant to change.'),
('ISFP', 'isfp.png', 'The Composer', 'ISFPs are sensitive, kind, and enjoy living in the moment. They are artistic and value personal expression. They may struggle with assertiveness and long-term planning.'),
('ISTJ', 'istj.png', 'The Inspector', 'ISTJs are serious, responsible, and detail-oriented. They value tradition and order. They are dependable but may struggle with flexibility and emotional expression.'),
('ISTP', 'istp.png', 'The Craftsman', 'ISTPs are analytical, practical, and enjoy understanding how things work. They are resourceful in solving problems but may struggle with emotions and long-term commitments.');

-- --------------------------------------------------------

--
-- Table structure for table `mbti_results`
--

CREATE TABLE `mbti_results` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `mbti_type` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mbti_results`
--

INSERT INTO `mbti_results` (`id`, `user_id`, `mbti_type`, `created_at`) VALUES
(1, 6, 'ISFJ', '2024-06-07 08:55:08'),
(2, 6, 'ISTP', '2024-06-08 02:10:47'),
(3, 11, 'ESTJ', '2024-06-08 03:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `minat_bakat_results`
--

CREATE TABLE `minat_bakat_results` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `result1` varchar(255) NOT NULL,
  `result2` varchar(255) NOT NULL,
  `result3` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `minat_bakat_results`
--

INSERT INTO `minat_bakat_results` (`id`, `user_id`, `result1`, `result2`, `result3`, `created_at`) VALUES
(1, 6, 'Realistic', 'Conventional', 'Social', '2024-06-07 07:29:24'),
(5, 6, 'Realistic', 'Investigative', 'Social', '2024-06-07 07:53:51'),
(6, 11, 'Enterprising', 'Investigative', 'Social', '2024-06-08 03:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pfp` varchar(255) DEFAULT 'profile_icon.png',
  `remember_token` varchar(255) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `pfp`, `remember_token`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(6, 'plorars.id@gmail.com', 'Plorars', '$2y$10$9NkpEqEWQDNFLYYNOqQuEOT0BTvCjpsWNT5SBHsAyrdOwjmB2byRm', 'Plorars_1717845721.png', 'rMPbsFK8ARZsEfCnfIvZ3MuPOgE1/uZHfOmFvjcx0SU=', NULL, NULL),
(8, 'dzikri@gmail.com', 'dzikri', '$2y$10$NvreUAQ/G9waVhnBBNGbnO8RxW03PWeN.DnHDIHhPDkSe79voPyly', 'profile_icon.png', NULL, NULL, NULL),
(9, 'dhafin.razaqa12@gmail.com', 'dhaifn', '$2y$10$AYbCrNBcRpNSQvfdp4a1BO/o2I1JWPQqzHZEQxQfthia9D63w6d6G', 'profile_icon.png', NULL, NULL, NULL),
(10, 'rakha.razaqa@gmail.com', 'bismillah', '$2y$10$7IKGiszO2tBIcZ3auAWieObCdu.aa7fjK2WJyR.sUIslvt4aYSfWm', 'profile_icon.png', 'CttMlNhBAoUDxfrCKw3hWXe2/lJMuO4qBjldTDe+3OU=', NULL, NULL),
(11, 'user@gmail.com', 'user', '$2y$10$4TXMbZ75BuWDYCS3qng84OApH840JPcFk25skv0KurjRo6S3TBUJ.', 'profile_icon.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mbti_info`
--
ALTER TABLE `mbti_info`
  ADD PRIMARY KEY (`mbti_type`);

--
-- Indexes for table `mbti_results`
--
ALTER TABLE `mbti_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minat_bakat_results`
--
ALTER TABLE `minat_bakat_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mbti_results`
--
ALTER TABLE `mbti_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `minat_bakat_results`
--
ALTER TABLE `minat_bakat_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
