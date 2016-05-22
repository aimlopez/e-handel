-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: chas
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `Product_instance`
--

DROP TABLE IF EXISTS `Product_instance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_instance` (
  `inst_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_id` int(10) unsigned NOT NULL,
  `ov_id` int(10) unsigned NOT NULL,
  `pi_image` varchar(255) NOT NULL,
  PRIMARY KEY (`inst_id`),
  KEY `fk_prodId_idx` (`prod_id`),
  KEY `fk_ovID_idx` (`ov_id`),
  CONSTRAINT `fk_ovID` FOREIGN KEY (`ov_id`) REFERENCES `optionsValues` (`ov_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_prodID2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_instance`
--

LOCK TABLES `Product_instance` WRITE;
/*!40000 ALTER TABLE `Product_instance` DISABLE KEYS */;
INSERT INTO `Product_instance` VALUES (1,1,3,'images/PUMA T-shrit-blue-puma_blue.jpeg'),(2,1,7,'images/PUMA T-shrit-black-puma_black.jpeg'),(3,1,8,'images/PUMA T-shrit-green-puma_green.jpeg'),(4,2,5,''),(5,2,11,''),(6,2,12,''),(7,5,13,''),(8,5,7,''),(9,5,3,'');
/*!40000 ALTER TABLE `Product_instance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `opt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opt_name` varchar(45) NOT NULL,
  PRIMARY KEY (`opt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (1,'color'),(2,'sizes'),(3,'materials');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `optionsValues`
--

DROP TABLE IF EXISTS `optionsValues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `optionsValues` (
  `ov_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ov_name` varchar(45) NOT NULL,
  `opt_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ov_id`),
  KEY `fk_opt_id_idx` (`opt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `optionsValues`
--

LOCK TABLES `optionsValues` WRITE;
/*!40000 ALTER TABLE `optionsValues` DISABLE KEYS */;
INSERT INTO `optionsValues` VALUES (3,'blue',1),(4,'red',1),(5,'white',1),(6,'lila',1),(7,'black',1),(8,'green',1),(9,'grey',1),(10,'dark red',1),(11,'light blue',1),(12,'light pink',1),(13,'black-white',1),(14,'dark green',1),(15,'orange',1);
/*!40000 ALTER TABLE `optionsValues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `serienumber` int(20) NOT NULL,
  `prod_descript` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`prod_id`),
  UNIQUE KEY `serie_number_UNIQUE` (`serienumber`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'PUMA T-shrit',12345,' a beautiful t-shirt','images/PUMA T-shrit-blue-puma_blue.jpeg',120),(2,'Polo Ralph Lauren',45678,'HARPER - Skjorta ','images/Polo Ralph Lauren-pink.jpeg',90),(5,'Zalando Essential pennkjol',76543,'2-pack pennkjol','images/Zalando Essential pennkjol-blue-2pack pennkjol.jpg',12),(6,'Zalando Essential Maxikjol',56789,' maxikjol','images/Zalando Essential Maxikjol-dark red-ZA821B008-G11@11.jpg',30),(8,'test2',98765,' tetstetetetete','images/test2-grey-puma_red.jpeg',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-06 19:12:25
