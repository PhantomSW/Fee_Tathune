-- MariaDB dump 10.19  Distrib 10.5.19-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: FeeTathune
-- ------------------------------------------------------
-- Server version	10.5.19-MariaDB-0+deb11u2

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
-- Table structure for table `AVATAR`
--

DROP TABLE IF EXISTS `AVATAR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AVATAR` (
  `av_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` int(11) DEFAULT 1,
  `hat` int(11) DEFAULT 1,
  `eyes` int(11) DEFAULT 1,
  `nose` int(11) DEFAULT 1,
  `smile` int(11) DEFAULT 1,
  `idCon` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT 1,
  PRIMARY KEY (`av_id`),
  KEY `idCon` (`idCon`),
  KEY `max` (`max`),
  CONSTRAINT `AVATAR_ibfk_1` FOREIGN KEY (`idCon`) REFERENCES `UTILISATEUR` (`user_id`),
  CONSTRAINT `AVATAR_ibfk_2` FOREIGN KEY (`max`) REFERENCES `MAX` (`max_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AVATAR`
--

LOCK TABLES `AVATAR` WRITE;
/*!40000 ALTER TABLE `AVATAR` DISABLE KEYS */;
INSERT INTO `AVATAR` VALUES (1,1,1,1,1,1,NULL,1),(2,3,1,2,2,0,18,1),(3,1,1,1,1,1,19,1),(5,1,1,1,1,1,21,1),(6,1,1,1,1,1,22,1),(7,1,1,1,1,1,NULL,1);
/*!40000 ALTER TABLE `AVATAR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `INTERVENANT`
--

DROP TABLE IF EXISTS `INTERVENANT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `INTERVENANT` (
  `prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `profession` varchar(13) DEFAULT NULL,
  `experience` char(2) DEFAULT NULL,
  `diplome` varchar(15) DEFAULT NULL,
  `note` char(4) DEFAULT NULL,
  `image` varchar(22) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `INTERVENANT`
--

LOCK TABLES `INTERVENANT` WRITE;
/*!40000 ALTER TABLE `INTERVENANT` DISABLE KEYS */;
INSERT INTO `INTERVENANT` VALUES (1,'sitdid@gmail.com',NULL,'Didier','Chong','professeur','12','doctorat','4.5','1.jpg','Un ancien boursier de génie, près à vous donner ses conseils !'),(3,'testtest@gmail.com',NULL,'Tharcos','Elyon','investisseur','3','master','8.7','3.jpg','Toujours disponible, le nez pour les meilleurs placements !'),(4,'prof@gmail;com',NULL,'Milan','Blob','professeur','2','master','9.3','4.jpg','Un maître dès son plus jeune âge dans le monde de la finance'),(6,'sananes@esgi.fr',NULL,'Sananes','Frédéric','professeur','34','ProfWaou','11','6.jpg','Le maître des maîtres en ce qui concerne l\'enseignement !'),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `INTERVENANT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MAX`
--

DROP TABLE IF EXISTS `MAX`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MAX` (
  `max_id` int(11) NOT NULL AUTO_INCREMENT,
  `max_color` int(11) DEFAULT 1,
  `max_hat` int(11) DEFAULT 1,
  `max_eyes` int(11) DEFAULT 1,
  `max_nose` int(11) DEFAULT 1,
  `max_smile` int(11) DEFAULT 1,
  PRIMARY KEY (`max_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MAX`
--

LOCK TABLES `MAX` WRITE;
/*!40000 ALTER TABLE `MAX` DISABLE KEYS */;
INSERT INTO `MAX` VALUES (1,5,3,3,3,3);
/*!40000 ALTER TABLE `MAX` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PORTEFEUILLE`
--

DROP TABLE IF EXISTS `PORTEFEUILLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PORTEFEUILLE` (
  `port_id` int(11) NOT NULL AUTO_INCREMENT,
  `capital` varchar(15) DEFAULT NULL,
  `total` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`port_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PORTEFEUILLE`
--

LOCK TABLES `PORTEFEUILLE` WRITE;
/*!40000 ALTER TABLE `PORTEFEUILLE` DISABLE KEYS */;
/*!40000 ALTER TABLE `PORTEFEUILLE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RDV`
--

DROP TABLE IF EXISTS `RDV`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RDV` (
  `rdv_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(10) DEFAULT NULL,
  `horaire` char(5) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `duree` char(4) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`rdv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RDV`
--

LOCK TABLES `RDV` WRITE;
/*!40000 ALTER TABLE `RDV` DISABLE KEYS */;
/*!40000 ALTER TABLE `RDV` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUBSCRIPTION`
--

DROP TABLE IF EXISTS `SUBSCRIPTION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUBSCRIPTION` (
  `abo_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(10) DEFAULT NULL,
  `abonnement` varchar(30) DEFAULT NULL,
  `reduction` varchar(6) DEFAULT NULL,
  `depense` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`abo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUBSCRIPTION`
--

LOCK TABLES `SUBSCRIPTION` WRITE;
/*!40000 ALTER TABLE `SUBSCRIPTION` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUBSCRIPTION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UTILISATEUR`
--

DROP TABLE IF EXISTS `UTILISATEUR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UTILISATEUR` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `age` char(2) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `ban` char(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UTILISATEUR`
--

LOCK TABLES `UTILISATEUR` WRITE;
/*!40000 ALTER TABLE `UTILISATEUR` DISABLE KEYS */;
INSERT INTO `UTILISATEUR` VALUES (5,'test12@gmail.com','f6cfe289bbfa10e1fa917b9d1a8ef547f3373e0b8e23b16446500d7c157bb0ed','toto',NULL,NULL,NULL,NULL,NULL,NULL,'0'),(11,'woi@gmail.com','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','Wuoi','Lamir','Stophe','64 Avenue fafa','76','8765412398','femme','1'),(13,'test1@gmail.com','f6cfe289bbfa10e1fa917b9d1a8ef547f3373e0b8e23b16446500d7c157bb0ed','Chris','Christopher','Steve','70 Rue de bagnolet','98','0987654321','homme','0'),(15,'test4@gmail.com','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','Boby','H OVdnj','Baba','YFBHEJC','89','9876512345','femme','0'),(16,'test4@gmail.com','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','Boby','IEJD','AZDI','HBNJ','45','1111111111','femme','0'),(18,'test6@gmail.com','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','Test6','test','test','test','12','3333333333','homme','0'),(19,'test90@gmail.com','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','Test90','Test','Test','Test','78','0967349865','femme','0'),(21,'confirm@fee-tathune.fr','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','NAH','nah','nah','IURGFBJND','12','0917283959','femme','0'),(22,'ttoufficothmanschmit@myges.fr','f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9','Testre','test','test','fefe','11','1929292929','femme','0'),(23,NULL,'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0');
/*!40000 ALTER TABLE `UTILISATEUR` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-10 15:18:49
