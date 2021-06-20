-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 03:41 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikap`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `ac_id` int(11) NOT NULL,
  `ac_desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`ac_id`, `ac_desc`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `pe_id` int(11) NOT NULL,
  `cuti_id` int(11) NOT NULL,
  `saldo` varchar(3) NOT NULL,
  `durasi` smallint(3) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `pe_id`, `cuti_id`, `saldo`, `durasi`, `start`, `end`, `alamat`, `keterangan`) VALUES
(2, 1, 23, '0', 1, '2021-06-19', '2021-06-20', '', ''),
(3, 2, 5, '0', 1, '2021-06-08', '2021-06-09', '', ''),
(4, 1, 2, '0', 1, '2021-06-08', '2021-06-09', '', ''),
(15, 1, 1, '0', 0, '1970-01-01', '1970-01-01', '', ''),
(16, 1, 1, '0', 0, '1970-01-01', '1970-01-01', '', ''),
(17, 1, 1, '0', 0, '1970-01-01', '1970-01-01', '', ''),
(18, 1, 1, '0', 0, '1970-01-01', '1970-01-01', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(11) NOT NULL,
  `pe_id` int(11) NOT NULL,
  `izin_id` int(11) NOT NULL,
  `durasi` smallint(6) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `pe_id`, `izin_id`, `durasi`, `start`, `end`, `keterangan`) VALUES
(3, 1, 23, 5, '2021-06-07', '2021-06-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id` int(11) NOT NULL,
  `cuti_val` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id`, `cuti_val`) VALUES
(1, 'Cuti Tahunan'),
(2, 'Cuti Sakit'),
(3, 'Cuti Besar'),
(4, 'Cuti Bersalin'),
(5, 'Cuti Alasan Penting'),
(6, 'Cuti Diluar Tanggungan'),
(23, 'Cuti Dalam Tanggungan'),
(24, 'Cuti Bulanan'),
(25, 'Cuti Harian'),
(26, 'Cuti Lebaran');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_izin`
--

CREATE TABLE `jenis_izin` (
  `id` int(11) NOT NULL,
  `izin_val` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_izin`
--

INSERT INTO `jenis_izin` (`id`, `izin_val`) VALUES
(1, 'Liburan'),
(20, 'Kedukaan'),
(23, 'Keluar Kota'),
(24, 'Dalam Kota'),
(28, 'Izin Mengurus Dokumen');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `pe_id` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`pe_id`, `tanggal`, `jam_masuk`, `jam_keluar`, `keterangan`, `id`) VALUES
(1, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 1),
(2, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 2),
(3, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 3),
(4, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 4),
(5, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 5),
(1, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 6),
(2, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 7),
(3, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 8),
(4, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 9),
(5, '2021-06-07', '07:30:00', '16:00:00', 'Hadir', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pe_id` int(11) NOT NULL,
  `pe_nama` varchar(255) NOT NULL,
  `pe_nip` varchar(30) NOT NULL,
  `pa_id` int(11) NOT NULL,
  `pe_tempat_lahir` varchar(100) NOT NULL,
  `pe_tanggal_lahir` date NOT NULL,
  `pe_jenis_kelamin` varchar(20) NOT NULL,
  `ag_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `pe_no_hp` varchar(15) NOT NULL,
  `pe_email` varchar(100) NOT NULL,
  `pe_no_bpjs` varchar(30) NOT NULL,
  `pr_id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kb_id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kc_id` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kl_id` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pe_alamat` varchar(255) NOT NULL,
  `pe_hobi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pe_id`, `pe_nama`, `pe_nip`, `pa_id`, `pe_tempat_lahir`, `pe_tanggal_lahir`, `pe_jenis_kelamin`, `ag_id`, `st_id`, `pe_no_hp`, `pe_email`, `pe_no_bpjs`, `pr_id`, `kb_id`, `kc_id`, `kl_id`, `pe_alamat`, `pe_hobi`) VALUES
(1, 'Agung Bahtiar, S.H., M.H.', '2101234567890000001', 8, 'Jakarta', '1980-07-10', 'Laki-laki', 1, 1, '081234567001', 'agungbahtiar@gmail.com', '2021000100010001', '31', '3174', '3174020', '3174020007', 'Jl Kedoya No.101', 'Membaca'),
(2, 'Drs. Puji Hananto,  M.Pd.', '2101234567890000002', 8, 'Bandung', '1975-12-20', 'Laki-laki', 1, 1, '081234567002', 'pujihananto@gmail.com', '2021000100010002', '32', '3273', '3273141', '3273141002', 'RT 001 / RW 002, Perum Bakti Putra No.22', 'Bermain musik'),
(3, 'Diana Purbasari, S.E., M.Si.', '2101234567890000003', 7, 'Depok', '1985-06-19', 'Perempuan', 1, 1, '081234567003', 'dianapurbasari@gmail.com', '2021000100010003', '31', '3171', '3171080', '3171080001', 'Jl Kalibata No.88', 'Yoga'),
(4, 'Budi Ardiyanto, S.H., M.H.', '2101234567890000004', 7, 'Jakarta', '1979-03-13', 'Laki-laki', 1, 1, '081234567004', 'budiardiyanto@gmail.com', '2021000100010004', '31', '3172', '3172050', '3172050006', 'Perum Mekarsari No.65', 'Fotografi'),
(5, 'Kurnia Ekawati, S.E., M.Si.', '2101234567890000005', 7, 'Jakarta Selatan', '1985-08-11', 'Perempuan', 2, 2, '081234567005', 'kurniaekawati@gmail.com', '2021000100010005', '31', '3171', '3171060', '3171060010', 'RT 007 / RW 007, Perum Senayan No.90', 'Berenang'),
(6, 'Suryadi Kencana, S.H., M.M.', '2101234567890000006', 6, 'Jakarta Barat', '1983-04-02', 'Laki-laki', 1, 1, '081234567006', 'suryadikencana@gmail.com', '2021000100010006', '31', '3174', '3174050', '3174050007', 'Jl Muara Angke VII No.132', 'Menulis'),
(7, 'Fahmi Akbar, S.IP., M.Si.', '2101234567890000007', 6, 'Jakarta Utara', '1984-11-26', 'Laki-laki', 5, 2, '081234567007', 'fahmiakbar@gmail.com', '2021000100010007', '31', '3175', '3175050', '3175050002', 'Perum Adikarya No.55', 'Traveling'),
(8, 'Aryani Dwi, S.E., M.Si.', '2101234567890000008', 6, 'Yogyakarta', '1988-10-13', 'Perempuan', 2, 1, '081234567008', 'aryanidwi@gmail.com', '2021000100010008', '31', '3173', '3173040', '3173040002', 'RT 005 / RW 002, Jl. Kampung Rawa No.10', 'Memasak'),
(9, 'Aruni Setyowati, S.E., M.Si.', '2101234567890000009', 6, 'Surabaya', '1989-02-07', 'Perempuan', 1, 2, '081234567009', 'arunisetyowati@gmail.com', '2021000100010009', '31', '3171', '3171010', '3171010005', 'Perum Asana Mulia No.09', 'Merajut'),
(10, 'Ahmad Barudin, S.Sos.', '2101234567890000010', 5, 'Magelang', '2021-06-13', 'Laki-laki', 1, 2, '081234567010', 'ahmadbarudin@gmail.com', '2021000100010010', '31', '3101', '3101020', '3101020001', 'Jl Merbabu III No.37', 'Bermain musik'),
(11, 'Kariadi Putra, S.Sos, M.Si.', '2101234567890000011', 5, 'Semarang', '1987-11-30', 'Laki-laki', 2, 2, '081234567011', 'kariadiputra@gmail.com', '2021000100010011', '31', '3172', '3172030', '3172030001', 'RT 009 / RW 001, Jl Surya Kencana IV', 'Fotografi'),
(12, 'Putri Sekar, S.IP, M.Si.', '2101234567890000012', 5, 'Sragen', '1989-01-02', 'Perempuan', 2, 2, '081234567012', 'putrisekar@gmail.com', '2021000100010012', '31', '3173', '3173060', '3173060002', 'Jl Permata Hati No.12', 'Melukis'),
(13, 'Laila Salbiyanti, S.H., M.Si.', '2101234567890000013', 5, 'Solo', '1986-09-15', 'Perempuan', 1, 1, '081234567013', 'lailasalbiyanti@gmail.com', '2021000100010013', '31', '3101', '3101010', '3101010001', 'RT 013 / RW 001, Jl Mataram II', 'Memasak'),
(14, 'Nurhayati, S.Sos.', '2101234567890000014', 5, 'Malang', '1983-03-26', 'Perempuan', 1, 1, '081234567014', 'nurhayati@gmail.com', '2021000100010014', '31', '3175', '3175040', '3175040004', 'Jl Sumber Abadi VII No.99', 'Membaca'),
(15, 'Ilham Iswandi, S.IP.', '2101234567890000015', 4, 'Klaten', '1987-10-04', 'Laki-laki', 3, 2, '081234567015', 'ilhamirwandi@gmail.com', '2021000100010015', '31', '3173', '3173020', '3173020003', 'Jl Bumi Permai No.02', 'Fotografi'),
(16, 'Rosilawati, S.Sos.', '2101234567890000016', 4, 'Surabaya', '1985-07-31', 'Perempuan', 1, 1, '081234567016', 'rosilawati@gmail.com', '2021000100010016', '31', '3174', '3174070', '3174070006', 'Perum Bale Hinggil No.77', 'Merajut'),
(17, 'Eko Putra, S.H.', '2101234567890000017', 4, 'Malang', '1986-09-10', 'Laki-laki', 1, 1, '081234567017', 'ekoputra@gmail.com', '2021000100010017', '31', '3174', '3174080', '3174080003', 'RT 001 / RW 017, Perum Permai Mulia No.01', 'Mendaki'),
(18, 'Nurhatin, S.E.', '2101234567890000018', 4, 'Solo', '1988-05-22', 'Perempuan', 2, 1, '081234567018', 'nurhatin@gmail.com', '2021000100010018', '31', '3171', '3171100', '3171100005', 'Jl Kapuas I No.31', 'Bermain musik'),
(19, 'Najib Waskito, S.E.', '2101234567890000019', 3, 'Jakarta', '1990-01-01', 'Laki-laki', 1, 2, '081234567019', 'najibwaskito@gmail.com', '2021000100010019', '31', '3175', '3175030', '3175030001', 'Jl Merapi I No.05', 'Membaca'),
(20, 'Endang Maryati, S.E.', '2101234567890000020', 3, 'Jakarta', '1990-02-13', 'Perempuan', 3, 2, '081234567020', 'endangmaryati@gmail.com', '2021000100010020', '31', '3173', '3173030', '3173030003', 'Jl Kalibaru No.10', 'Yoga'),
(21, 'Iwan Gunawan, S.Si.', '2101234567890000021', 3, 'Bandung', '1989-08-31', 'Laki-laki', 5, 2, '081234567021', 'iwangunawan@gmail.com', '2021000100010021', '31', '3173', '3173010', '3173010001', 'Perum Laksana Utama No.48', 'Fotografi'),
(22, 'Vera Yuniarita, S.Sos.', '2101234567890000022', 3, 'Bandung', '1989-10-10', 'Perempuan', 2, 2, '081234567022', 'verayuniarita@gmail.com', '2021000100010022', '31', '3171', '3171040', '3171040001', 'RT 011 / RW 006, Perum Mulia Bakti No.77', 'Memasak'),
(23, 'Redy Kaswara, S.Kom.', '2101234567890000023', 2, 'Yogyakarta', '1990-05-07', 'Laki-laki', 1, 2, '081234567023', 'redykaswara@gmail.com', '2021000100010023', '31', '3171', '3171050', '3171050001', 'Jl Kapuas III No.25', 'Membaca'),
(24, 'Pramono, S.T.', '2101234567890000024', 2, 'Jakarta', '1990-04-30', 'Laki-laki', 1, 2, '081234567024', 'pramono@gmail.com', '2021000100010024', '31', '3174', '3174020', '3174020004', 'Perum Sari Raya No.81', 'Bermain musik'),
(26, 'Yudi Setiadi, S.T.', '2101234567890000025', 1, 'Yogyakarta', '1990-10-16', 'Laki-laki', 1, 2, '081234567025', 'yudisetiadi@gmail.com', '2021000100010025', '31', '3171', '3171080', '3171080006', 'Jl Basuki III No.69', 'Membaca');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `us_username` varchar(30) NOT NULL,
  `us_password` varchar(100) NOT NULL,
  `us_photo` varchar(100) NOT NULL,
  `us_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_id`, `ac_id`, `us_username`, `us_password`, `us_photo`, `us_email`) VALUES
(1, 1, 'admin', 'admin', 'admin.png', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-cuti-jeniscuti` (`cuti_id`) USING BTREE,
  ADD KEY `fk-cuti-pegawai` (`pe_id`) USING BTREE;

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-izin-pegawai` (`pe_id`) USING BTREE,
  ADD KEY `fk-izin-jenisizin` (`izin_id`) USING BTREE;

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_izin`
--
ALTER TABLE `jenis_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk-kehadiran-pegawai` (`pe_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pe_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `ac_id` (`ac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jenis_izin`
--
ALTER TABLE `jenis_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_control`
--
ALTER TABLE `access_control`
  ADD CONSTRAINT `fk-access-user` FOREIGN KEY (`ac_id`) REFERENCES `user` (`us_id`);

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `fk-cuti-jeniscuti` FOREIGN KEY (`cuti_id`) REFERENCES `jenis_cuti` (`id`),
  ADD CONSTRAINT `fk-cuti-pegawai` FOREIGN KEY (`pe_id`) REFERENCES `pegawai` (`pe_id`);

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `fk-izin-jenisizin` FOREIGN KEY (`izin_id`) REFERENCES `jenis_izin` (`id`),
  ADD CONSTRAINT `fk-izin-pegawai` FOREIGN KEY (`pe_id`) REFERENCES `pegawai` (`pe_id`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `fk-kehadiran-pegawai` FOREIGN KEY (`pe_id`) REFERENCES `pegawai` (`pe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
