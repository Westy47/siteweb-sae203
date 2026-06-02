-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: sae203
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `communes`
--

DROP TABLE IF EXISTS `communes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `communes` (
  `code_insee` varchar(5) DEFAULT NULL,
  `nom_standard` varchar(24) DEFAULT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  `dep_code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communes`
--

LOCK TABLES `communes` WRITE;
/*!40000 ALTER TABLE `communes` DISABLE KEYS */;
INSERT INTO `communes` VALUES ('01001','L\'Abergement-Clémenciat','01400','01'),('01002','L\'Abergement-de-Varey','01640','01'),('01004','Ambérieu-en-Bugey','01500','01'),('01005','Ambérieux-en-Dombes','01330','01'),('01006','Ambléon','01300','01'),('01007','Ambronay','01500','01'),('01008','Ambutrix','01500','01'),('01009','Andert-et-Condon','01300','01'),('01010','Anglefort','01350','01'),('01011','Apremont','01100','01'),('01012','Aranc','01110','01'),('01013','Arandas','01230','01'),('01014','Arbent','01100','01'),('01015','Arboys en Bugey','01300','01'),('01016','Arbigny','01190','01'),('01017','Argis','01230','01'),('01019','Armix','01510','01'),('01021','Ars-sur-Formans','01480','01'),('01022','Artemare','01510','01'),('01023','Asnières-sur-Saône','01570','01'),('01024','Attignat','01340','01'),('01025','Bâgé-Dommartin','01380','01'),('01026','Bâgé-le-Châtel','01380','01'),('01027','Balan','01360','01'),('01028','Baneins','01990','01'),('01029','Beaupont','01270','01'),('01030','Beauregard','01480','01'),('01031','Bellignat','01100','01'),('01032','Béligneux','01360','01'),('01033','Valserhône','01200','01'),('01034','Belley','01300','01'),('01035','Belleydoux','01130','01'),('01036','Valromey-sur-Séran','01260','01'),('01037','Bénonces','01470','01'),('01038','Bény','01370','01'),('01040','Béréziat','01340','01'),('01041','Bettant','01500','01'),('01042','Bey','01290','01'),('01043','Beynost','01700','01'),('01044','Billiat','01200','01'),('01045','Birieux','01330','01'),('01046','Biziat','01290','01'),('01047','Blyes','01150','01'),('01049','La Boisse','01120','01'),('01050','Boissey','01380','01'),('01051','Bolozon','01450','01'),('01052','Bouligneux','01330','01'),('01053','Bourg-en-Bresse','01000','01'),('01054','Bourg-Saint-Christophe','01800','01'),('01056','Boyeux-Saint-Jérôme','01640','01'),('01057','Boz','01190','01'),('01058','Brégnier-Cordon','01300','01'),('01060','Brénod','01110','01'),('01061','Brens','01300','01'),('01062','Bressolles','01360','01'),('01063','Brion','01460','01'),('01064','Briord','01470','01'),('01065','Buellas','01310','01'),('01066','La Burbanche','01510','01'),('01067','Ceignes','01430','01'),('01068','Cerdon','01450','01'),('01069','Certines','01240','01'),('01071','Cessy','01170','01'),('01072','Ceyzériat','01250','01'),('01073','Ceyzérieu','01350','01'),('01074','Chalamont','01320','01'),('01075','Chaleins','01480','01'),('01076','Chaley','01230','01'),('01077','Challes-la-Montagne','01450','01'),('01078','Challex','01630','01'),('01079','Champagne-en-Valromey','01260','01'),('01080','Champdor-Corcelles','01110','01'),('01081','Champfromier','01410','01'),('01082','Chanay','01420','01'),('01083','Chaneins','01990','01'),('01084','Chanoz-Châtenay','01400','01'),('01085','La Chapelle-du-Châtelard','01240','01'),('01087','Charix','01130','01'),('01088','Charnoz-sur-Ain','01800','01'),('01089','Château-Gaillard','01500','01'),('01090','Châtenay','01320','01'),('01092','Châtillon-la-Palud','01320','01'),('01093','Châtillon-sur-Chalaronne','01400','01'),('01094','Chavannes-sur-Reyssouze','01190','01'),('01095','Nivigne et Suran','01250','01'),('01096','Chaveyriat','01660','01'),('01098','Chazey-Bons','01300','01'),('01099','Chazey-sur-Ain','01150','01'),('01100','Cheignieu-la-Balme','01510','01'),('01101','Chevillard','01430','01'),('01102','Chevroux','01190','01'),('01103','Chevry','01170','01'),('01104','Chézery-Forens','01410','01'),('01105','Civrieux','01390','01'),('01106','Cize','01250','01'),('01107','Cleyzieu','01230','01'),('01108','Coligny','01270','01'),('01109','Collonges','01550','01'),('01110','Colomieu','01300','01'),('01111','Conand','01230','01'),('01112','Condamine','01430','01'),('01113','Condeissiat','01400','01'),('01114','Confort','01200','01'),('01115','Confrançon','01310','01'),('01116','Contrevoz','01300','01'),('01117','Conzieu','01300','01'),('01118','Corbonod','01420','01'),('01121','Corlier','01110','01'),('01123','Cormoranche-sur-Saône','01290','01'),('01124','Cormoz','01560','01'),('01125','Corveissiat','01250','01'),('01127','Courmangoux','01370','01'),('01128','Courtes','01560','01'),('01129','Crans','01320','01'),('01130','Bresse Vallons','01340','01'),('01133','Cressin-Rochefort','01350','01'),('01134','Crottet','01290','01'),('01135','Crozet','01170','01'),('01136','Cruzilles-lès-Mépillat','01290','01'),('01138','Culoz-Béon','01350','01');
/*!40000 ALTER TABLE `communes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `description` tinytext NOT NULL,
  `file_path` varchar(128) NOT NULL,
  `upload_date` datetime NOT NULL,
  `title` varchar(128) NOT NULL,
  `moyenne` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photos_author` (`author_id`),
  CONSTRAINT `fk_photos_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (28,12,'Un petit chat en exterieur très bg','public/media/images/hugo-chat_roux.jpg','2026-06-01 17:25:40','chat roux',3.50),(29,3,'Un gateau d\'anniversaire avec des bougies ','public/media/images/jacques-anniversaire.jpg','2026-06-02 08:58:52','anniversaire',3.50);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(30) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `commune` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'aline','al@gmail.com','a',''),(2,'aline2','a@a','a',''),(3,'jacques','j@j.com','j',''),(4,'jean','jean@gmail.com','j',''),(5,'p','p@p','p',''),(6,'r','j@j','r',''),(7,'x','x@x','x',''),(12,'Hugo','hugo.geay2@gmail.Com','h','01042');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`,`user_id`),
  KEY `fk_votes_user` (`user_id`),
  CONSTRAINT `fk_votes_photo` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`),
  CONSTRAINT `fk_votes_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (28,1,2),(28,3,5),(29,1,4),(29,12,3);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER table_insert
AFTER INSERT ON votes
FOR EACH ROW
    UPDATE photos 
    SET moyenne= (SELECT AVG(grade) FROM votes WHERE photo_id= NEW.photo_id)
    WHERE id = NEW.photo_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER table_update
AFTER UPDATE ON votes
FOR EACH ROW
    UPDATE photos 
    SET moyenne= (SELECT AVG(grade) FROM votes WHERE photo_id= NEW.photo_id)
    WHERE id = NEW.photo_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER table_delete
AFTER DELETE ON votes
FOR EACH ROW
    UPDATE photos
    SET moyenne= (SELECT AVG(grade) FROM votes WHERE photo_id= OLD.photo_id)
    WHERE id = OLD.photo_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-02 19:52:28
