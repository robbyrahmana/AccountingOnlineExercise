-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 04:39 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_ujian`
--

CREATE TABLE `tbl_kategori_ujian` (
  `id` int(11) NOT NULL,
  `kategori_ujian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_ujian`
--

INSERT INTO `tbl_kategori_ujian` (`id`, `kategori_ujian`) VALUES
(1, 'Ujian Berbasis Komputer'),
(2, 'Uji Kompetensi'),
(3, 'Ujian Komprehensif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelola_soal`
--

CREATE TABLE `tbl_kelola_soal` (
  `id` int(11) NOT NULL,
  `mata_kuliah_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelola_soal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelola_soal_jawaban`
--

CREATE TABLE `tbl_kelola_soal_jawaban` (
  `id` int(11) NOT NULL,
  `kelola_soal_id` int(11) NOT NULL,
  `kelola_soal_mahasiswa_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelola_soal_jawaban`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelola_soal_mahasiswa`
--

CREATE TABLE `tbl_kelola_soal_mahasiswa` (
  `id` int(11) NOT NULL,
  `kelola_soal_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelola_soal_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelola_soal_soal`
--

CREATE TABLE `tbl_kelola_soal_soal` (
  `id` int(11) NOT NULL,
  `kelola_soal_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelola_soal_soal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_sks` varchar(10) NOT NULL,
  `ipk` varchar(10) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mata_kuliah`
--

CREATE TABLE `tbl_mata_kuliah` (
  `id` int(11) NOT NULL,
  `mata_kuliah_cd` varchar(10) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `kategori_ujian_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mata_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL,
  `soal_jawaban_id` int(11) NOT NULL,
  `tipe_soal` int(11) NOT NULL,
  `bobot_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal_jawaban`
--

CREATE TABLE `tbl_soal_jawaban` (
  `id` int(11) NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_e` text NOT NULL,
  `jawaban_essai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal_jawaban`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori_ujian`
--
ALTER TABLE `tbl_kategori_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelola_soal`
--
ALTER TABLE `tbl_kelola_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_makata_kuliah` (`mata_kuliah_id`);

--
-- Indexes for table `tbl_kelola_soal_jawaban`
--
ALTER TABLE `tbl_kelola_soal_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelola_soal_mahasiswa`
--
ALTER TABLE `tbl_kelola_soal_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelola_soal_soal`
--
ALTER TABLE `tbl_kelola_soal_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kelola_soal` (`kelola_soal_id`),
  ADD KEY `fk_soal` (`soal_id`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mata_kuliah`
--
ALTER TABLE `tbl_mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dosen` (`dosen_id`),
  ADD KEY `fk_kategori` (`kategori_ujian_id`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soal_jawaban` (`soal_jawaban_id`);

--
-- Indexes for table `tbl_soal_jawaban`
--
ALTER TABLE `tbl_soal_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_kategori_ujian`
--
ALTER TABLE `tbl_kategori_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_kelola_soal`
--
ALTER TABLE `tbl_kelola_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_kelola_soal_jawaban`
--
ALTER TABLE `tbl_kelola_soal_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_kelola_soal_mahasiswa`
--
ALTER TABLE `tbl_kelola_soal_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_kelola_soal_soal`
--
ALTER TABLE `tbl_kelola_soal_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_mata_kuliah`
--
ALTER TABLE `tbl_mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_soal_jawaban`
--
ALTER TABLE `tbl_soal_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
