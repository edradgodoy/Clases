-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: iglesia
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `identificador` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombreact` varchar(120) NOT NULL,
  `lugar` text NOT NULL,
  `fecha` date NOT NULL,
  `telefono` varchar(35) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`identificador`),
  UNIQUE KEY `identificador` (`identificador`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES (3,'Campaña Masiva','Marhuanta','2015-09-25','0416089765','07:00am','Campana Masiva'),(14,'Cultos Unidos','23 de enero','2015-12-11','04120917497','10:00pm','Cultos Unidos'),(15,'Cultos Unidos','san cristobal','2015-12-12','04120917497','12:00pm','Cultos Unidos'),(16,'Cultos Unidos','nose','2015-12-10','04120917497','08:50pm','Cultos Unidos'),(17,'Congresos','casanova sur II','2015-11-27','04120917497','08:00pm','Congresos'),(18,'Cultos Unidos','casanova sur II','2016-02-19','04120917497','01:00pm','Cultos Unidos'),(19,'Congresos','casanova norte','2016-02-21','04120917497','02:00pm','Congresos'),(20,'Congresos','casanova sur','2016-02-25','04120917497','07:00pm','Congresos'),(21,'Congresos','sector libertad','2016-02-26','04120917497','09:00pm','Congresos'),(22,'Congresos','marhianta','2016-02-20','04120917497','05:00pm','Congresos'),(23,'CampaÃ±a Masiva','casanova sur','2016-02-28','04120917497','09:00pm','Campana Masiva'),(24,'CampaÃ±a Masiva','maipure I','2016-02-27','04120917497','08:00pm','Campana Masiva'),(25,'CampaÃ±a Masiva','cayaurima','2016-02-12','04120917497','03:00pm','Campana Masiva'),(26,'Aniversario','canova sur II','2016-03-02','04120917497','02:00pm','Aniversario'),(27,'Aniversario','marhuanta','2016-03-03','04120917497','09:00pm','Aniversario'),(28,'Aniversario','24 de julio','2016-03-12','04120917497','12:00pm','Aniversario');
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminuser` (
  `idadminuser` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(70) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `cedula` varchar(60) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idadminuser`),
  UNIQUE KEY `idadminuser` (`idadminuser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminuser`
--

LOCK TABLES `adminuser` WRITE;
/*!40000 ALTER TABLE `adminuser` DISABLE KEYS */;
INSERT INTO `adminuser` VALUES (1,'adriana','marcano','13015061','adriana','7aae50ee6372eaa82aaac438dbfb211e41492465','Administrador','activo','2014-10-14'),(2,'jenny','rodriguez','11111111','jenny','264e436c13092070855b73eb4fbced072c5359e2','Administrador','activo','2015-04-08');
/*!40000 ALTER TABLE `adminuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(87) NOT NULL,
  `nombredfoto` varchar(140) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` VALUES (24,'1','public/fotos/escuela MÂ£sica (3).JPG'),(25,'2','public/fotos/escuela MÂ£sica (8).JPG'),(26,'3','public/fotos/escuela MÂ£sica (10).JPG'),(27,'4','public/fotos/escuela MÂ£sica (14).JPG'),(28,'5','public/fotos/escuela MÂ£sica (18).JPG'),(29,'6','public/fotos/escuela MÂ£sica (19).JPG'),(30,'7','public/fotos/escuela MÂ£sica (22).JPG'),(31,'8','public/fotos/escuela MÂ£sica (23).JPG'),(32,'9','public/fotos/alabanzas a Dios.JPG'),(33,'10','public/fotos/bellisimas.JPG'),(34,'11','public/fotos/gloria a Dios.JPG'),(35,'12','public/fotos/linda.JPG'),(37,'13','public/fotos/lindas.JPG'),(41,'14','public/fotos/igle.JPG');
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_actividad`
--

DROP TABLE IF EXISTS `info_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_actividad` (
  `idifoactividad` int(100) NOT NULL AUTO_INCREMENT,
  `fotos` text NOT NULL,
  `informacion` text NOT NULL,
  `identificador` bigint(20) NOT NULL,
  PRIMARY KEY (`idifoactividad`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_actividad`
--

LOCK TABLES `info_actividad` WRITE;
/*!40000 ALTER TABLE `info_actividad` DISABLE KEYS */;
INSERT INTO `info_actividad` VALUES (104,'fotoactividad/PCaptura de pantalla de 2016-02-03 09:54:33.png','ofojojd ojdojojd<br />\r\nojdojojd ojdojojd<br />\r\n<br />\r\n<br />\r\n3 saltos de lineas',3),(105,'fotoactividad/Captura de pantalla de 2016-02-14 09:35:15.png','ojojod ojdojojd<br />\r\nopdojojojdjo<br />\r\n<br />\r\nojdojojdojjd ojdojojd ojdjojd ojdojojodj ojdojojodj ojdojojdoj ojdjojd ojdojojd ojdj<br />\r\njojdojojd ojdojojd ojdoojd ojdojojd ojdojod ojdojojd ojdojojd ojdojojfoj ojfojojf ojf<br />\r\njojf fifj fidijfdjio fj if ifuiuf iuf iudiouf ifuu u uf ufiuf uugyid iufi fiuguiu duiufiuiugud<br />\r\n<br />\r\n<br />\r\npoliyttf<br />\r\nihfihh<br />\r\nifijijif<br />\r\n<br />\r\nihdiihd ihdsihhid<br />\r\nohdsohods<br />\r\nojdsojojds',15),(106,'fotoactividad/WCaptura de pantalla de 2016-02-14 09:35:15.png','ihcihihhic icijijc ojcojjoojc ojcojjoc',14),(107,'fotoactividad/OCaptura de pantalla de 2016-02-03 09:54:33.png','ojcoo<br />\r\nojcooj+',16);
/*!40000 ALTER TABLE `info_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miembros`
--

DROP TABLE IF EXISTS `miembros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miembros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fechax` date NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` text NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `statu` char(8) NOT NULL,
  `foto` text NOT NULL,
  `ano_servicio` int(2) NOT NULL,
  `estudios` char(2) NOT NULL,
  `ministerios` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miembros`
--

LOCK TABLES `miembros` WRITE;
/*!40000 ALTER TABLE `miembros` DISABLE KEYS */;
INSERT INTO `miembros` VALUES (1,'Jose','Ferrer','9285404','04160840979','1964-04-17',51,'La Sabanita','Pastor','activo','',12,'',''),(2,'Pierina','gomez','20912643','04262963131','1993-02-03',22,'El Peru, Sector 2','miembro','activo','',0,'',''),(3,'maria','Diaz','1234560','04120840979','2007-01-02',8,'Calle Igualdad','Sdff','activo','',0,'',''),(4,'Elena ','cardena','9876543','04120956789','1995-01-11',20,'La sabanita','secretaria','activo','',0,'',''),(5,'Laura','Lujano','13399114','04120840979','1977-12-08',38,'La Sabanita','secretaria','activo','fotomiembro/error_404.png',0,'',''),(11,'pedro','batista','19871554','02851231234','1988-11-27',27,'casanova sur II','tesorero','noactivo','fotomiembro/thumb-350-608833.jpg',0,'si','musica'),(17,'Jfoojnf','Rodriguez','12345678','04120917590','1999-11-30',15,'Lmslmsms','mlmdlm','activo','fotomiembro/Captura de pantalla de 2016-02-14 09:35:15.png',0,'',''),(18,'Jxojoj','Ojcojo','1987654','04120917497','1988-11-27',27,'Ojsojojs Nojsoj','obrero','activo','fotomiembro/Mascara-Anonymous-Vendetta-Original-20141126073238.jpg',0,'',''),(21,'Pedro','Batista','12129999','04120917497','1988-11-27',27,'nose nada','Tesoreros','activo','fotomiembro/12549036_217641248581935_8895888244585981132_n.jpg',4,'Si','Musica'),(22,'pedro','batista','13456543','00000000000','1987-02-22',28,'casanova sur calles las mercedes','copastor','activo','fotomiembro/Captura de pantalla de 2016-02-03 09:54:48.png',7,'si','Danza, Musica, Adoracion');
/*!40000 ALTER TABLE `miembros` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-20  9:53:48
