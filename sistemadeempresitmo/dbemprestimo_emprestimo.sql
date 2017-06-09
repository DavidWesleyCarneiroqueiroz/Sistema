CREATE DATABASE  IF NOT EXISTS `dbemprestimo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbemprestimo`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: dbemprestimo
-- ------------------------------------------------------
-- Server version	5.7.4-m14

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
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprestimo` (
  `numero_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_emprestimo` int(10) DEFAULT NULL,
  `patrimonio_emprestimo` int(10) DEFAULT NULL,
  `data_emprestimo_saida` datetime DEFAULT NULL,
  `data_emprestimo_entregue` datetime DEFAULT NULL,
  `statos_emprestimo` enum('saida','entregue') DEFAULT NULL,
  PRIMARY KEY (`numero_emprestimo`),
  KEY `matricula_emprestimo` (`matricula_emprestimo`),
  KEY `patrimonio_emprestimo` (`patrimonio_emprestimo`),
  CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`matricula_emprestimo`) REFERENCES `solicitante` (`matricula`),
  CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`patrimonio_emprestimo`) REFERENCES `equipamento` (`patrimonio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
INSERT INTO `emprestimo` VALUES (1,490006,111144,'2016-10-07 12:36:56','2016-10-07 12:40:59','entregue'),(2,20309303,111292,'2016-10-07 12:37:32','2016-10-07 12:40:17','entregue'),(3,20309303,111144,'2016-10-07 12:39:22','2016-10-07 12:40:59','entregue'),(4,490006,111292,'2016-10-07 12:39:31','2016-10-07 12:40:17','entregue');
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-10 13:11:28
