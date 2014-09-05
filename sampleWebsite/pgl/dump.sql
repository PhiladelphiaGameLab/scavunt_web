-- MySQL dump 10.13  Distrib 5.6.20, for osx10.9 (x86_64)
--
-- Host: localhost    Database: pgl
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `a` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(99) DEFAULT NULL,
  `field_value` longtext,
  PRIMARY KEY (`a`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'home_header','Philadelphia Game Lab'),(5,'home_intro','Welcome to the <strong>Philadelphia Game Lab</strong>, a game studio and non-profit technology research organization located in Philadelphia, Pennsylvania.'),(6,'project_header','Projects'),(7,'project_intro','Our current roster of games and software tools under development.'),(8,'about_header','About'),(9,'about_intro','Philadelphia Game Lab is a non-profit organization dedicated to the growth of small team game development in the Philadelphia region. Our efforts grow from a belief that this is an optimal environment to launch creative technical businesses, and that game development is well-suited to leveraging its strengths.'),(10,'about_main_sectionOne_title','Risks and Benefits'),(11,'about_main_sectionOne_body','Its important to recognize that game development at almost any level is a craft-driven endeavor. There is a very different sort of risk involved in investment in games than in tech startups. The risk in games is that the creative vision will be bad or that as software it will not be functional within the scope of viability. However, if a team manages to produce more than two title, and to retain more than two members, it is actually likely to provide its members with a living revenue.'),(12,'about_main_sectionTwo_title','Strengths of Game Creation'),(13,'about_main_sectionTwo_body','As an artisanal form, games are inherently oriented toward collaborative learning. In small-team game creation, smart and talented people come together to build something that will be the optimal output of their personal abilities.'),(14,'about_main_sectionThree_title','Philadelphia'),(15,'about_main_sectionThree_body','In Philadelphia, we do not have the career opportunities that have allowed young people to remain here. Its very important to keep in mind that these are people thinking that they would like to stay in Philadelphia, but may have to go to the West Coast for work. It would not take so much to get these people to stay, but it certainly would take more career opportunity than is currently offered to them. It is our core mission to work toward enabling this option.'),(16,'about_main_footer','click to exit'),(17,'pgs_header','Pennsylvania Game Studio'),(18,'pgs_intro','The Pennsylvania Game Studio is a funded initiative of the Philadelphia Game Lab. Its mandate is to create notable works in games and game technology. We exclusively hire students and recent graduates of Pennsylvania universities'),(19,'pgs_main_sectionOne_title','Overview'),(20,'pgs_main_sectionOne_body','The outcomes we seek are broad recognition of resources and ability in the region, as well as the formation of new businesses in games. Hence, the metric of notability is perhaps the most important thing to keep in mind regarding everything we seek to do.'),(21,'pgs_main_sectionTwo_title','Notable Work'),(22,'pgs_main_sectionTwo_body','Ideally all works will achieve notability in both creative and technical achievement, although on occasion it will certainly skew toward one or the other. In order to focus our efforts toward ensuring value, we have defined our works in several categories, each of which will include ongoing technical explorations and learning.'),(23,'pgs_main_sectionThree_title','Business Creation'),(24,'pgw_main_sectionThree_body','There are several methods we employ toward facilitating creation of new businesses, but we emphasize that all are as effective in creating a robust and collaborative ecosystem for game creation, as in creating businesses. We do see opportunities in forming new game businesses, though, and some will be formed by developers working in the Studio.'),(25,'pgs_main_footer','click to exit'),(26,'dept_header','Departments'),(27,'dept_intro','We focus projects and research among the following areas.'),(28,'dept_sectionOne','Deep Graphics'),(29,'dept_sectionTwo','Immersive'),(30,'dept_sectionThree','Audio Play'),(31,'dept_sectionFour','Collaboration Data'),(32,'dept_sectionOne_main_title','Deep Graphics'),(33,'dept_sectionOne_main_body','Visual games and research in new techniques'),(34,'dept_sectionOne_main_footer','click to exit'),(35,'dept_sectionTwo_main_title','Immersive'),(36,'dept_sectionTwo_main_body','Exploring new technologies and creating new experiences.'),(37,'dept_sectionTwo_main_footer','click to exit'),(38,'dept_sectionThree_main_title','Audio Play'),(39,'dept_sectionThree_main_body','Bringing audio to a whole new dimension.'),(40,'dept_sectionThree_main_footer','click to exit'),(41,'dept_sectionFour_main_title','Collaboration Data'),(42,'dept_sectionFour_main_body','Data solutions for everyone.'),(43,'dept_sectionFour_main_footer','click to exit'),(44,'community_header','Community'),(45,'community_intro','Being an independent game studio and non-profit research group, community is an integral part of our ecosystem.'),(46,'community_main_title','Friends of PGL'),(47,'community_main_footer','click to exit');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `a` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(99) DEFAULT NULL,
  `project_tagline` varchar(99) DEFAULT NULL,
  `project_body` longtext,
  `project_link` varchar(99) DEFAULT NULL,
  `project_footer` varchar(99) DEFAULT NULL,
  `img` longblob,
  PRIMARY KEY (`a`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Lux','Making multiplayer easy','A client-server architecture for collaboration.','lux.philadelphiagamelab.org','click to exit',NULL),(2,'Sonic','A whole new audio dimension','An open toolset for creation of audio gameplay','sonic.philadelphiagamelab.org','click to exit',NULL),(3,'Spectrum','A story of light and mystery','A visual journey through fire and ice','spectrum.philadelphiagamelab.org','click to exit',NULL),(4,'Virulence','A virus like no other','A procedurally generated shmup of pixels and amazement','virulence.philadelphiagamelab.org','click to exit',NULL),(5,'Scavenger Hunt','A platform for custom discovery','Create custom mysteries in the comfort of your backyard','scavhunt.philadelphiagamelab.org','click to exit',NULL),(6,'Third Eye','A fully interactive meditative experience','An immersive and interactive experience like nothing ever before','thirdeye.philadelphiagamelab.org','click to exit',NULL),(7,'Kiwi Tactics','Fog of war meets chess','A completely new tactical game based on strategy and surprise','kiwi.philadelphiagamelab.org','click to exit',NULL),(8,'Lux Analytics','Data solutions for the people','A custom data analytics platform to answer the questions people dont ask','luxanalytics.philadelphiagamelab.org','click to exit',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-03 11:09:40
