-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 02:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pln`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cari_pemasangan` (IN `tglNya` DATETIME)   BEGIN
     SELECT pemasangan.id_pemasangan, petugas.nama_petugas, pemasangan.id_pelanggan, pemasangan.nama_pelanggan, 			 pemasangan.alamat, pemasangan.no_telp, pemasangan.PKBA, pemasangan.status, pemasangan.tgl_pemasangan
     FROM pemasangan
     JOIN petugas ON petugas.id_petugas=pemasangan.id_petugas
     WHERE pemasangan.tgl_pemasangan LIKE concat('%', tglNya , '%');
     END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cari_pemasangan_id` (IN `idNya` BIGINT(12))   BEGIN
SELECT pemasangan.id_pemasangan, petugas.nama_petugas, pemasangan.id_pelanggan, pemasangan.nama_pelanggan, pemasangan.alamat, pemasangan.no_telp, pemasangan.PKBA, pemasangan.status, pemasangan.tgl_pemasangan from pemasangan JOIN petugas ON pemasangan.id_petugas = petugas.id_petugas WHERE pemasangan.id_pelanggan LIKE concat ('%', idNya, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cari_pemasangan_tgl` (IN `tglNya` VARCHAR(100))   BEGIN
SELECT pemasangan.id_pemasangan, petugas.nama_petugas, pemasangan.id_pelanggan, pemasangan.nama_pelanggan, pemasangan.alamat, pemasangan.no_telp, pemasangan.PKBA, pemasangan.status, pemasangan.tgl_pemasangan from pemasangan JOIN petugas ON pemasangan.id_petugas = petugas.id_petugas WHERE pemasangan.tgl_pemasangan LIKE concat ('%', tglNya, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_create_pemasangan` (IN `idNya` INT(11), IN `petugasNya` CHAR(10), IN `pelangganNya` BIGINT(12), IN `namaNya` VARCHAR(50), IN `alamatNya` TEXT, IN `noNya` VARCHAR(13), IN `PKBA` VARCHAR(100), IN `statusNya` ENUM('Belum Selesai','Selesai','Pending'), IN `tglNya` DATETIME)   BEGIN
    INSERT INTO pemasangan (id_pemasangan, id_petugas, id_pelanggan, nama_pelanggan, alamat, no_telp, PKBA, status, 		tgl_pemasangan) VALUES
    (idNya, petugasNya, pelangganNya, namaNya, alamatNya, noNya, PKBA, statusNya, tglNya);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_create_pending` (IN `pelanggan` BIGINT(12), IN `keterangan` TEXT)   BEGIN
INSERT INTO pemasangan_pending VALUES (NULL, pelanggan, keterangan);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_create_petugas` (IN `idNya` CHAR(10), IN `namaNya` VARCHAR(50), IN `userNya` VARCHAR(50), IN `noNya` VARCHAR(14), IN `timNya` ENUM('Tim1','Tim2','Tim3','Tim4'))   BEGIN
    INSERT INTO petugas
    (id_petugas, nama_petugas, email, no_telepon, tim) VALUES
    (idNya, namaNya, userNya, noNya, timNya);
     END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_pemasangan` (IN `idNya` INT(11))   BEGIN
    DELETE FROM pemasangan WHERE id_pemasangan=idNya;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_petugas` (IN `idNya` CHAR(10))   BEGIN
    DELETE FROM petugas WHERE id_petugas = idNya;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_pemasangan` ()   BEGIN
SELECT CURRENT_DATE(), pemasangan.id_pemasangan, petugas.nama_petugas, petugas.no_telepon, pemasangan.id_pelanggan, pemasangan.nama_pelanggan, pemasangan.alamat, pemasangan.no_telp, pemasangan.PKBA, pemasangan.status, pemasangan.tgl_pemasangan from pemasangan JOIN petugas ON pemasangan.id_petugas = petugas.id_petugas WHERE pemasangan.tgl_pemasangan LIKE CONCAT('%',CURRENT_DATE,'%') ORDER BY pemasangan.tgl_pemasangan DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_pemasangan_pending` ()   BEGIN
SELECT * FROM pemasangan_pending;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_pemasangan_petugas` (IN `nama` VARCHAR(100))   BEGIN
SELECT CURRENT_DATE(), pemasangan.id_pemasangan, petugas.nama_petugas, petugas.no_telepon, pemasangan.id_pelanggan, pemasangan.nama_pelanggan, pemasangan.alamat, pemasangan.no_telp, pemasangan.PKBA, pemasangan.status, pemasangan.tgl_pemasangan from pemasangan JOIN petugas ON pemasangan.id_petugas = petugas.id_petugas WHERE pemasangan.tgl_pemasangan LIKE CONCAT('%',CURRENT_DATE,'%') && petugas.nama_petugas = nama ORDER BY pemasangan.tgl_pemasangan DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_petugas` ()   BEGIN
SELECT petugas.id_petugas, petugas.nama_petugas, petugas.email, petugas.no_telepon, petugas.tim, user.status FROM petugas
JOIN user ON petugas.email=user.email WHERE user.level = 'Petugas';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_pemasangan` (IN `idNya` INT, IN `petugasNya` CHAR(10), IN `pelangganNya` BIGINT(12), IN `namaNya` VARCHAR(50), IN `alamatNya` TEXT, IN `noNya` VARCHAR(13), IN `PKBANya` VARCHAR(100), IN `statusNya` ENUM('Belum Selesai','Selesai','Pending'), IN `tglNya` DATETIME)   BEGIN
	UPDATE pemasangan SET id_petugas=petugasNya, id_pelanggan=pelangganNya, nama_pelanggan=namaNya, alamat=alamatNya, no_telp=noNya,
    PKBA=PKBANya, status=statusNya, tgl_pemasangan=tglNya WHERE id_pemasangan= idNya;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_petugas` (IN `idNya` CHAR(10), IN `namaNya` VARCHAR(50), IN `userNya` VARCHAR(50), IN `noNya` VARCHAR(14), IN `timNya` ENUM('Tim1','Tim2','Tim3','Tim4'))   BEGIN
     UPDATE petugas SET 
     nama_petugas=namaNya, email=userNya, no_telepon=noNya, tim=timNya
     WHERE id_petugas=idNya;
     END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_status_pemasangan` (IN `idNya` INT)   BEGIN
UPDATE pemasangan SET status='Selesai' WHERE id_pemasangan=idNya;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `id_pelanggan` bigint(12) NOT NULL,
  `tgl_notifikasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `pengirim`, `pesan`, `id_pelanggan`, `tgl_notifikasi`) VALUES
(1, 'Mark Lee', 'Selesai', 533211234888, '2023-12-22 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `pemasangan`
--

CREATE TABLE `pemasangan` (
  `id_pemasangan` int(11) NOT NULL,
  `id_petugas` char(10) NOT NULL,
  `id_pelanggan` bigint(12) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `PKBA` varchar(100) NOT NULL,
  `status` enum('Belum Selesai','Selesai','Pending') NOT NULL,
  `tgl_pemasangan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasangan`
--

INSERT INTO `pemasangan` (`id_pemasangan`, `id_petugas`, `id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `PKBA`, `status`, `tgl_pemasangan`) VALUES
(40, '1234567890', 533219991234, 'Riza Aliysa', 'Kuningan', '083832432942', '', 'Selesai', '2024-01-16 09:36:00'),
(41, '1234567899', 533211234567, 'Aisyah', 'Bunigeulis', '081', 'create_pemasangan.png', 'Pending', '2024-01-16 10:25:00'),
(42, '1234567890', 533215556789, 'Nafa', 'Kuningan', '083832432942', '4k.jpg', 'Selesai', '2024-01-16 10:34:00'),
(43, '1234567890', 533218889999, 'Raisa', 'Cigugur', '083', '1225cb1a044934bba05e528f31831f45.png', 'Belum Selesai', '2024-01-16 11:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `pemasangan_pending`
--

CREATE TABLE `pemasangan_pending` (
  `id_pending` int(11) NOT NULL,
  `id_pelanggan` bigint(12) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasangan_pending`
--

INSERT INTO `pemasangan_pending` (`id_pending`, `id_pelanggan`, `keterangan`) VALUES
(12, 533211234567, 'Rusak');

--
-- Triggers `pemasangan_pending`
--
DELIMITER $$
CREATE TRIGGER `edit_status_pending` AFTER INSERT ON `pemasangan_pending` FOR EACH ROW UPDATE pemasangan SET status = "Pending" where id_pelanggan=new.id_pelanggan
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_status_selesai` AFTER DELETE ON `pemasangan_pending` FOR EACH ROW UPDATE pemasangan
SET status = "Selesai"
WHERE id_pelanggan = OLD.id_pelanggan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `tim` enum('Tim1','Tim2','Tim3','Tim4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `email`, `no_telepon`, `tim`) VALUES
('1234567890', 'Fika Cahyati', 'fika@gmail.com', '62895360112218', 'Tim2'),
('1234567899', 'Syahrul', 'syahrul@gmail.com', '6231111', 'Tim1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL,
  `status` enum('Online','Offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `nama`, `password`, `level`, `status`) VALUES
('fika@gmail.com', 'Fika Cahyati', '123', 'Petugas', 'Online'),
('louis@gmail.com', 'Louis', '123', 'Admin', 'Online'),
('michaelkeene@gmail.com', 'Michael Keene', '12345', 'Petugas', 'Online'),
('syahrul@gmail.com', 'Syahrul ', '12345', 'Petugas', 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pemasangan`
--
ALTER TABLE `pemasangan`
  ADD PRIMARY KEY (`id_pemasangan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `pemasangan_pending`
--
ALTER TABLE `pemasangan_pending`
  ADD PRIMARY KEY (`id_pending`),
  ADD KEY `id_pemasangan` (`id_pelanggan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemasangan`
--
ALTER TABLE `pemasangan`
  MODIFY `id_pemasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pemasangan_pending`
--
ALTER TABLE `pemasangan_pending`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemasangan`
--
ALTER TABLE `pemasangan`
  ADD CONSTRAINT `pemasangan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
