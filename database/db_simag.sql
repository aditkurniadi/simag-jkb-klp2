-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2026 at 03:25 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simag`
--

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `perusahaan` varchar(150) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `sistem_kerja` enum('wfo','hybrid','wfh') NOT NULL,
  `kategori` enum('software','jaringan','desain','database') NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `batas_daftar` varchar(50) NOT NULL,
  `status` enum('Buka','Segera Tutup','Tutup') NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_logo` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `posisi`, `perusahaan`, `lokasi`, `sistem_kerja`, `kategori`, `durasi`, `batas_daftar`, `status`, `deskripsi`, `kode_logo`, `created_at`) VALUES
(1, 'Fullstack Web Developer Intern', 'PT Solusi Teknologi Terpadu', 'Cilacap, Jawa Tengah', 'hybrid', 'software', '6 Bulan (Semester Gasal)', '15 Oktober 2026', 'Buka', 'Mahasiswa akan berkolaborasi dengan tim software engineering dalam mengembangkan modul sistem informasi, membuat REST API, integrasi frontend-backend, dan optimasi query database MySQL.', '</>', '2026-09-29 13:13:24'),
(2, 'Network & System Administrator Intern', 'Dinas Komunikasi dan Informatika', 'Cilacap, Jawa Tengah', 'wfo', 'jaringan', '6 Bulan', '20 Oktober 2026', 'Buka', 'Mendukung tim IT infrastructure dalam perawatan kabel jaringan LAN, konfigurasi routing MikroTik/Cisco, maintenance server Debian/Ubuntu, dan troubleshooting kendala jaringan operasional.', '>_', '2026-09-29 13:13:24'),
(3, 'UI/UX Designer & Frontend Support', 'Studio Kreasi Digital', 'Bekasi, Jawa Barat', 'wfh', 'desain', '3 Bulan', '30 September 2026', 'Segera Tutup', 'Fokus membuat wireframing, prototype high-fidelity pada Figma, user testing, serta berkoordinasi langsung dengan developer untuk proses slicing ke HTML/CSS dasar.', 'UX', '2026-09-29 13:13:24'),
(4, 'Database Staff Intern', 'BPR Syariah Mitra Mandiri', 'Purwokerto, Jawa Tengah', 'wfo', 'database', '6 Bulan', '10 September 2026', 'Tutup', 'Membantu staf data center dalam pemantauan backup berkala database nasabah, verifikasi integritas data transaksi, serta membantu optimasi stored procedure MySQL.', 'QL', '2026-09-29 13:13:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
