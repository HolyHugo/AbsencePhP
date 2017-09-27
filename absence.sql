-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BS1
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Absence`
--

DROP TABLE IF EXISTS `Absence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Absence` (
  `refVisiteur` int(11) NOT NULL,
  `dateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nbJours` int(11) DEFAULT NULL,
  `refMotif` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`refVisiteur`,`dateDebut`),
  KEY `refMotif` (`refMotif`),
  CONSTRAINT `Absence_ibfk_1` FOREIGN KEY (`refVisiteur`) REFERENCES `Visiteur` (`idVisiteur`),
  CONSTRAINT `Absence_ibfk_2` FOREIGN KEY (`refMotif`) REFERENCES `Motif` (`idMotif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Absence`
--

LOCK TABLES `Absence` WRITE;
/*!40000 ALTER TABLE `Absence` DISABLE KEYS */;
INSERT INTO `Absence` VALUES (1,'2017-09-20 07:38:13',2,NULL),(1,'2017-09-20 22:00:02',1,'MA'),(1,'2017-09-21 22:00:00',1,'MA'),(2,'2017-09-15 09:02:29',NULL,NULL),(2,'2017-09-15 09:03:19',NULL,NULL),(2,'2017-09-20 12:40:59',NULL,NULL),(2,'2017-09-21 22:00:00',1,'CG'),(3,'2017-09-21 22:00:01',1,'TP'),(3,'2017-09-22 07:15:09',5,'MA');
/*!40000 ALTER TABLE `Absence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Controles`
--

DROP TABLE IF EXISTS `Controles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Controles` (
  `abVisiteur` int(11) NOT NULL,
  `abdateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `justification` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`abVisiteur`,`abdateDebut`,`numero`),
  KEY `numero` (`numero`),
  CONSTRAINT `Controles_ibfk_3` FOREIGN KEY (`abVisiteur`, `abdateDebut`) REFERENCES `Absence` (`refVisiteur`, `dateDebut`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Controles`
--

LOCK TABLES `Controles` WRITE;
/*!40000 ALTER TABLE `Controles` DISABLE KEYS */;
INSERT INTO `Controles` VALUES (1,'2017-09-20 07:38:13',1,0),(1,'2017-09-20 07:38:13',2,0),(1,'2017-09-20 07:38:13',3,0),(1,'2017-09-20 07:38:13',4,0),(1,'2017-09-20 07:38:13',5,0);
/*!40000 ALTER TABLE `Controles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `CumulAbsences`
--

DROP TABLE IF EXISTS `CumulAbsences`;
/*!50001 DROP VIEW IF EXISTS `CumulAbsences`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `CumulAbsences` (
  `refVisiteur` tinyint NOT NULL,
  `NJAV` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Motif`
--

DROP TABLE IF EXISTS `Motif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Motif` (
  `idMotif` varchar(2) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`idMotif`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Motif`
--

LOCK TABLES `Motif` WRITE;
/*!40000 ALTER TABLE `Motif` DISABLE KEYS */;
INSERT INTO `Motif` VALUES ('CG','Congé'),('MA','Maladie'),('TP','Transport');
/*!40000 ALTER TABLE `Motif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visiteur`
--

DROP TABLE IF EXISTS `Visiteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Visiteur` (
  `idVisiteur` int(11) NOT NULL,
  `nomV` varchar(30) DEFAULT NULL,
  `dateEmbauche` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVisiteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visiteur`
--

LOCK TABLES `Visiteur` WRITE;
/*!40000 ALTER TABLE `Visiteur` DISABLE KEYS */;
INSERT INTO `Visiteur` VALUES (0,'Loyal','2017-09-20 13:47:55'),(1,'Marteau','2017-09-14 08:47:12'),(2,'Jambon','2017-09-14 08:47:12'),(3,'Crepe','2017-09-14 08:47:12');
/*!40000 ALTER TABLE `Visiteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `CumulAbsences`
--

/*!50001 DROP TABLE IF EXISTS `CumulAbsences`*/;
/*!50001 DROP VIEW IF EXISTS `CumulAbsences`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `CumulAbsences` AS (select `Absence`.`refVisiteur` AS `refVisiteur`,sum(`Absence`.`nbJours`) AS `NJAV` from `Absence` group by `Absence`.`refVisiteur`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-27 16:53:43
