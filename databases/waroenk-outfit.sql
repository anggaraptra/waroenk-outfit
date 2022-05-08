/*
SQLyog Community v13.1.8 (64 bit)
MySQL - 10.4.21-MariaDB : Database - waroenk_outfit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`waroenk_outfit` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `waroenk_outfit`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`kode_barang`,`nama_barang`,`kategori`,`stok`,`harga`,`gambar`) values 
(1,2001,'Vans Old Skool Sneakers','aksesoris',10,500000,'62773c820f344.jpg'),
(2,2002,'Varsity Jacket','pakaian',8,350000,'62773c9c25eb5.jpg'),
(3,2003,'Oversized T-Shirt','pakaian',15,75000,'62773ce388ba2.jpg'),
(4,2004,'Fossil Men Watch','aksesoris',3,1750000,'62773d07a4242.jpg'),
(5,2005,'Classic Ship Bracelet','aksesoris',6,100000,'62773d2b3fa62.jpg'),
(6,2006,'Tree Necklace','aksesoris',5,150000,'62773ee381178.jpg'),
(7,2007,'Men Suit','pakaian',4,400000,'62773f083dfab.jpg'),
(8,2008,'Nike Running Soes','aksesoris',3,1800000,'62773f3f9111c.jpg'),
(9,2009,'Bucket Hat','aksesoris',6,95000,'6277411e7fa06.jpg'),
(10,2010,'Sunglasses','aksesoris',8,85000,'6277413e19fba.jpg');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `total_pesanan` int(255) NOT NULL,
  `status` enum('batal','proses','selesai','') NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesanan` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `menyuplai` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama`,`menyuplai`,`no_hp`,`alamat`) values 
(1,'Anton','baju','098789678512','Jln Mawar'),
(2,'Martina Stuart','celana','1-323-372-6101','Ap #578-2580 Imperdiet Road'),
(3,'Doris Holmes','sepatu','1-269-879-9478','Ap #505-6338 Elit. St.'),
(4,'Lani Rosales','jam tangan','(542) 152-7163','P.O. Box 311, 935 Duis St.'),
(5,'Britanney Clements','sandal','(101) 370-4537','767-2411 Lectus, Road'),
(6,'Megan O\'donnell','topi','(238) 343-8965','327-7751 Nunc Road');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('administrator','user') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`email`,`no_hp`,`password`,`level`) values 
(1,'admin','','','$2y$10$I8ZiMSo7HzqaXTuGOuI3yOfBriAZ/GueitvW3L5Hw1Rt5K.ZpXwaC','administrator'),
(2,'antoni','antoni@testing.com','081231231311231','$2y$10$BW8FpXKmqqAfBrzcBD85/.LfwtI85j5cp9O4beMrEnzkNx78Buad2','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
