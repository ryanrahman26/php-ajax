-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for crud_ajax
CREATE DATABASE IF NOT EXISTS `crud_ajax` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crud_ajax`;

-- Dumping structure for table crud_ajax.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table crud_ajax.siswa: ~2 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `telp`, `alamat`, `foto`) VALUES
	('09876544321', 'Ryan Rahman', 'Laki-laki', '332 332 112', 'Tanjung Pinang', '30042017203144user2-160x160.jpg'),
	('1234567890', 'Ryan', 'Laki-laki', '123 123 123', 'Tanjung pinang', '30042017203120user1-128x128.jpg');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
