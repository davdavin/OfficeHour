-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 11:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officehour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`) VALUES
(1, 'Yohanes');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_tugas_project` int(11) NOT NULL,
  `tanggal_aktivitas` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_akun_admin` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id_akun_admin`, `id_admin`, `username`, `password`) VALUES
(1, 1, 'yoyocar', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_project`
--

CREATE TABLE `anggota_project` (
  `id_anggota_project` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_project`
--

INSERT INTO `anggota_project` (`id_anggota_project`, `id_project`, `id_karyawan`) VALUES
(12, 1, 2),
(13, 1, 3),
(14, 1, 10),
(15, 2, 7),
(16, 2, 2),
(19, 4, 3),
(20, 4, 7),
(21, 5, 2),
(22, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_perusahaan` varchar(25) NOT NULL,
  `nama_client` varchar(50) NOT NULL,
  `password_client` char(255) NOT NULL,
  `email_client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_perusahaan`, `nama_client`, `password_client`, `email_client`) VALUES
(1, 'PRSH5', 'Media Farma', '$2y$10$kpvGd3MaGJHZJcgvFV9SAerDZooLUCtP.VxvmPh8CCAMLIQMLeHUu', 'farmafarma@example.com'),
(2, 'PRSH5', 'Nusantara Project', '$2y$10$Ty8taiLot9aMVY9z807hNeqhCEBjSVTqnx5/e0kqL10hLQ3hcTdKa', 'carcarcar@example.com'),
(3, 'PRSH5', 'Sinar', '$2y$10$DjAARcVe/BXOlLvpqvd6fOlA7KYmfMQaAeBPz4.iXj6K9xbj9TFAy', 'sinsinsin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_perusahaan` varchar(25) NOT NULL,
  `nama_karyawan` text NOT NULL,
  `email_karyawan` text NOT NULL,
  `password_karyawan` char(255) DEFAULT NULL,
  `posisi_karyawan` varchar(25) NOT NULL,
  `status_karyawan` int(11) NOT NULL DEFAULT 0,
  `foto_karyawan` varchar(50) DEFAULT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_perusahaan`, `nama_karyawan`, `email_karyawan`, `password_karyawan`, `posisi_karyawan`, `status_karyawan`, `foto_karyawan`, `token`) VALUES
(1, 'PRSH5', 'Thomas', 'carcartho@example.com', '$2y$10$aeo.Z7W71XrdxTIQ2XSO1.ey2hBQOASA3/MKidsCSUWjYuWyFG1C.', 'Project Manager', 1, '', ''),
(2, 'PRSH5', 'Tomi', 'thomthom@example.com', '$2y$10$SLR4trs14K6jFdqkVFQ/qeM273Dgtaekn2r2Jky256eVb4nU.qd.S', 'Technical Writer', 1, '', ''),
(3, 'PRSH5', 'Christile', 'chris@example.com', '$2y$10$zMN7G6ltrM/YpnE.qmurJeE4lGk91HXXFdraQL3SMew2n0erQvynG', 'QA', 1, '', ''),
(5, 'PRSH4', 'Toni', 'carcar@example.com', '$2y$10$1Gopto66FtDFvUZJ2bFxDO9qOMQx1o296DWM96JNn6EhXDpRvzkZa', 'Project Manager', 1, '', ''),
(6, 'PRSH4', 'Tom', 'carlo@gmail.com', '$2y$10$WzKcde0ecyUQA0hM5/CpJOqUY2JuBRLjPRNpQMlwIKXXcQ2n2w29.', 'QA', 1, '', ''),
(7, 'PRSH5', 'Ton', 'carcarcarcar@example.com', '$2y$10$BnK3.bdATmOeUc7ZpWK1COfRAFWPaRyDcY/tpS.P0qtvvnEpT0/JK', 'Project Manager', 1, '', ''),
(10, 'PRSH5', 'Car', 'carlotoorop@gmail.com', '$2y$10$z9aquoPxQeKxGNEicZLK.O9kO/Dxo6QjYZAFE/5RATx8dz/qvXzyu', 'Project Manager', 1, '', 'f62a89698ec1ced7a6e0f9a057e0b7a91521'),
(61, 'PRSH5', 'Philin', 'phil@gmail.com', NULL, 'Project Manager', 0, NULL, ''),
(62, 'PRSH5', 'Gurna', 'gur@gmail.com', NULL, 'QA', 0, NULL, ''),
(63, 'PRSH5', 'Brother', 'brother@gmail.com', NULL, 'UI/UX Designer', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `maks_orang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `maks_orang`, `harga`, `deskripsi`) VALUES
(1, 'Detik', 50, 5000000, '100k/orang untuk 50 orang/tahun'),
(2, 'Menit', 250, 17500000, '70k/orang untuk 250 orang/tahun'),
(3, 'Jam', 500, 25000000, '50k/orang untuk 500 orang/tahun');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` varchar(25) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `email_perusahaan` text NOT NULL,
  `status_perusahaan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `username`, `password`, `email_perusahaan`, `status_perusahaan`) VALUES
('PRSH1', 'Pt. Test', 'testtest', '12345', 'yoyoyoyo@gmail.com', 1),
('PRSH2', 'Pt. Test2', 'testt', '12345', 'testtest@example.com', 1),
('PRSH3', 'Pt. Sampoerna', 'sempurna', '123455', 'yoyoyoyo@gmail.com', 1),
('PRSH4', 'Pt. Jaya Bersama', 'jayajayajaya', '$2y$10$QB80y9rEn/otmM74sndPjevpKb5QetQfFW/Zn0K8/YZheobluprCi', 'yoyoyoyo@gmail.com', 1),
('PRSH5', 'Pt Nam Jon', 'companyy', '$2y$10$GZeZrXNQpam3e7HgDEnNwuSs1xI.8kGCAqUAbU7gpAiMEW5HzqQa.', 'sipsip@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `id_perusahaan` varchar(25) NOT NULL,
  `id_client` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `nama_project` text NOT NULL,
  `deskripsi_project` text NOT NULL,
  `tanggal_mulai_project` date NOT NULL,
  `tanggal_selesai_project` date NOT NULL,
  `status_project` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_perusahaan`, `id_client`, `project_manager`, `nama_project`, `deskripsi_project`, `tanggal_mulai_project`, `tanggal_selesai_project`, `status_project`) VALUES
(1, 'PRSH5', 3, 7, 'Birthday Website', 'Sa', '2022-03-19', '2022-03-25', 'SEDANG BERJALAN'),
(2, 'PRSH5', 3, 10, 'E-commerce', 'Sasasasa', '2022-04-02', '2022-06-16', 'SEDANG BERJALAN'),
(4, 'PRSH5', 1, 1, 'test', 'test', '2022-03-10', '2022-04-09', 'SEDANG BERJALAN'),
(5, 'PRSH5', 3, 7, 'Webinar', 'Test', '2022-03-17', '2022-03-19', 'SEDANG BERJALAN');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id_subscribe` int(11) NOT NULL,
  `id_perusahaan` varchar(25) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `status_subscribe` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id_subscribe`, `id_perusahaan`, `id_paket`, `tanggal_bayar`, `status_bayar`, `status_subscribe`) VALUES
(1, 'PRSH1', 1, '2022-01-30', 'Sudah Bayar', 'Sedang Progress'),
(2, 'PRSH2', 2, '2022-02-09', 'Sudah Bayar', 'Sedang Progress'),
(3, 'PRSH3', 2, '2022-01-18', 'Sudah Bayar', 'Sedang Progress'),
(4, 'PRSH4', 1, '2022-02-08', 'Sudah Bayar', 'Sedang Progress'),
(5, 'PRSH5', 1, '2022-02-08', 'Sudah Bayar', 'Sedang Progress');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_project`
--

CREATE TABLE `tugas_project` (
  `id_tugas_project` int(11) NOT NULL,
  `id_anggota_project` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `batas_waktu` date NOT NULL,
  `status_tugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_project`
--

INSERT INTO `tugas_project` (`id_tugas_project`, `id_anggota_project`, `nama_tugas`, `batas_waktu`, `status_tugas`) VALUES
(17, 14, 'Memantau', '2022-03-09', 'SEDANG BERJALAN'),
(18, 12, 'Testing', '2022-03-09', 'SEDANG BERJALAN'),
(19, 13, 'QA', '2022-03-09', 'SEDANG BERJALAN'),
(20, 15, 'Applying', '2022-03-09', 'SEDANG BERJALAN'),
(21, 16, 'Finishing dan Negosiasi', '2022-03-09', 'SEDANG BERJALAN'),
(24, 19, 'Memantau', '2022-03-24', 'SEDANG BERJALAN'),
(25, 20, 'Testing', '2022-04-01', 'SEDANG BERJALAN'),
(26, 21, 'QA', '2022-03-11', 'SEDANG BERJALAN'),
(27, 22, 'Persiapan', '2022-04-09', 'SEDANG BERJALAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_akun_admin`);

--
-- Indexes for table `anggota_project`
--
ALTER TABLE `anggota_project`
  ADD PRIMARY KEY (`id_anggota_project`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `FK_ID_Karyawan` (`project_manager`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id_subscribe`);

--
-- Indexes for table `tugas_project`
--
ALTER TABLE `tugas_project`
  ADD PRIMARY KEY (`id_tugas_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_akun_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota_project`
--
ALTER TABLE `anggota_project`
  MODIFY `id_anggota_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id_subscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas_project`
--
ALTER TABLE `tugas_project`
  MODIFY `id_tugas_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_ID_Karyawan` FOREIGN KEY (`project_manager`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
