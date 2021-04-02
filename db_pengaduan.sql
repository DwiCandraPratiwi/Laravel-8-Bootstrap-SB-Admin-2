/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - pengaduan_masyarakat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengaduan_masyarakat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pengaduan_masyarakat`;

/*Table structure for table `masyarakat` */

DROP TABLE IF EXISTS `masyarakat`;

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `masyarakat` */

insert  into `masyarakat`(`id`,`nik`,`nama`,`username`,`password`,`telp`) values 
(1,'001','Dwi Candra Pratiwi','dwicandra','240673','0888761758685'),
(2,'002','Dwi Candra','dwican','240673','0877765463'),
(3,'003','pratiwi','dwi','$2y$12$U2Zj65PUmr1WreT5EQMcV..AehBCiaYc2ZNhGHW8cWPCVRgMoXF0O','0877765463'),
(5,'5102399403','joko','joko','$2y$12$U2Zj65PUmr1WreT5EQMcV..AehBCiaYc2ZNhGHW8cWPCVRgMoXF0O','028382838183');

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`),
  CONSTRAINT `nik` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id`,`tgl_pengaduan`,`nik`,`isi_laporan`,`foto`,`status`) values 
(2,'2021-03-08','001','Contoh penulisan laporan pengaduan masyarakat','IMG-20210226-WA0023.jpg','proses'),
(3,'2021-03-08','002','Laporan kedua','DSC_2433-1.jpg','0'),
(4,'2021-03-09','002','Saya ingin melaporkan sebuah kasus pelanggaran di masyarakat','DSC_2459-1.jpg','0'),
(5,'2021-03-15','003','Banyak masalah terjadi di masyarakat','DSC_2519-1.jpg','0');

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas','','') NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

insert  into `petugas`(`id_petugas`,`nama_petugas`,`username`,`password`,`telp`,`level`) values 
(3,'dwican','asdfghj','$2y$10$0fUQTIrSddrg6ys/q85K3ul4y','5456','petugas'),
(4,'Dwi Candra Pratiwi // ADMIN','admin','13januari','0876534','admin'),
(5,'dwi candra','dwi','12345','081338279995','admin');

/*Table structure for table `tanggapan` */

DROP TABLE IF EXISTS `tanggapan`;

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tanggapan` */

insert  into `tanggapan`(`id_tanggapan`,`id_pengaduan`,`tgl_tanggapan`,`tanggapan`,`id_petugas`) values 
(5,2,'2021-03-15','Ini tanggapan',1),
(7,2,'2021-03-15','Ini dia taggapaa',1);

/* Procedure structure for procedure `deletePetugas` */

/*!50003 DROP PROCEDURE IF EXISTS  `deletePetugas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePetugas`(id INT(11))
BEGIN
		delete from petugas where id_petugas = id;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `editPetugas` */

/*!50003 DROP PROCEDURE IF EXISTS  `editPetugas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `editPetugas`( id INT(11)

)
BEGIN
    SELECT * FROM petugas WHERE id_petugas = id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `insertPetugasNew` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertPetugasNew` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPetugasNew`(
	nama_petugas VARCHAR(35),
	username VARCHAR(25),
	passwords VARCHAR(255),
	telp VARCHAR(13),
	levels varchar (255)
)
BEGIN
    INSERT INTO petugas (nama_petugas, username, password, telp, level)
    VALUES (nama_petugas, username, passwords, telp, levels);

END */$$
DELIMITER ;

/* Procedure structure for procedure `listPetugas` */

/*!50003 DROP PROCEDURE IF EXISTS  `listPetugas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `listPetugas`(
)
BEGIN
    SELECT * 
    FROM petugas;
END */$$
DELIMITER ;

/* Procedure structure for procedure `updatePetugas` */

/*!50003 DROP PROCEDURE IF EXISTS  `updatePetugas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePetugas`(

id INT(11),
nama varchar(32),
username varchar(25),
passwords varchar(25),
telp varchar(13),
levels varchar (10)

)
BEGIN
    update petugas set nama_petugas = nama, username= username, password=passwords, telp=telp, level = levels WHERE id_petugas = id;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
