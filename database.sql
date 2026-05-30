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
  PRIMARY KEY (`id`),
  KEY `fk_photos_author` (`author_id`),
  CONSTRAINT `fk_photos_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,1,'Beautiful','public/media/images/aline_nature.jpg','2023-05-23 09:26:07','nature'),(2,1,'Superbe','public/media/images/aline_fantasy.jpg','2023-05-23 09:27:01','fantasy'),(3,1,'Chouette!','public/media/images/aline_chouette.jpg','2023-05-23 09:28:37','chouette'),(4,4,'Que de fleurs','public/media/images/jean_fleurs.jpg','2023-05-27 15:51:33','fleurs'),(5,3,'Une route','public/media/images/jacques_route.jpg','2023-05-27 19:34:59','route'),(6,4,'Photo de Man Ray','public/media/images/jean_Larmes.jpg','2023-05-27 21:07:19','Larmes'),(7,5,'pomme sur fond noir','public/media/images/p_pomme.jpg','2024-03-23 19:51:17','pomme'),(18,12,'jldksjfkds','public/media/images/Goat.jpg','2026-05-22 13:18:02','Goat'),(19,7,'Un cochon souriant','public/media/images/John.jpg','2026-05-26 17:35:44','John'),(20,1,'','public/media/images/pochettes.jpg','2026-05-26 17:50:11','pochettes');
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
INSERT INTO `votes` VALUES (1,1,3),(1,7,5),(1,12,3),(2,1,1),(2,12,5),(3,7,5),(3,12,5),(4,1,3),(4,7,2),(4,12,1),(5,1,5),(5,7,5),(5,12,1),(6,1,4),(6,7,2),(6,12,1),(7,7,1),(7,12,2),(18,1,4),(18,7,5);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-30 12:43:53
