/*
SQLyog Enterprise - MySQL GUI v6.06
Host - 5.6.16 : Database - solostock
*********************************************************************
Server version : 5.6.16
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `solostock`;

USE `solostock`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `IdCliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `codigo` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `precio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

insert  into `producto`(`codigo`,`descripcion`,`cantidad`,`precio`) values (2,'Plantas',65,'1520'),(3,'Ruedas',25,'2500');

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `IdProveedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `proveedor` */

insert  into `proveedor`(`IdProveedor`,`Nombre`,`Descripcion`,`Direccion`,`Pais`) values (1,'Nelson S.A.','Empresa de Transportes','Av. Los Toros 2555','Chile'),(2,'Mercadotecnia Latam','Venta Insumos de Oficina','Los conquistadores 2653','Argentina');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idacceso` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `nomusuario` varchar(50) DEFAULT NULL,
  `pwdusuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idacceso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`idacceso`,`nombre`,`nomusuario`,`pwdusuario`) values (1,'Nelson','nrb','81dc9bdb52d04dc20036dbd8313ed055'),(7,'Enrique','evc','81dc9bdb52d04dc20036dbd8313ed055'),(8,'usuario solo','usu','1c592e3481c4df3b64a4dd38fae38280');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
