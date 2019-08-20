-- MySQL dump 10.13  Distrib 5.7.20, for Win64 (x86_64)
--
-- Host: localhost    Database: lsc_voting_system
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `tbl_administrator`
--

DROP TABLE IF EXISTS `tbl_administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_administrator` (
  `Acc_image` varchar(100) NOT NULL,
  `Acc_Type` varchar(20) NOT NULL,
  `Acc_Uname` varchar(10) NOT NULL,
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(30) DEFAULT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(30) DEFAULT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Contact_No` varchar(15) DEFAULT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_administrator`
--

LOCK TABLES `tbl_administrator` WRITE;
/*!40000 ALTER TABLE `tbl_administrator` DISABLE KEYS */;
INSERT INTO `tbl_administrator` VALUES ('admin.png','Election_Chairman','chairman','0e678094b97c081fe87e592f664994ce','John Edgar','Dela Cruz','Francisco','Jr.','Male','1996-05-12',NULL,'What is your Favorite Color?','blue'),('admin.png','Administrator','admin','202cb962ac59075b964b07152d234b70','John Edgar','Dela Cruz','Francisco','Jr.','Male','1996-05-12',NULL,'What is your Favorite Color?','blue'),('hoihoiho hoihoi.jpg','Election_Officer','ihihoi','d31d86d0de8dd34fc535c67e480deaa2','hoihoiho','hkjhiho','hoihoi','Jr.','Male','2005-01-21',NULL,'What is Your Favorite Food?','jhkj');
/*!40000 ALTER TABLE `tbl_administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_candidates`
--

DROP TABLE IF EXISTS `tbl_candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_candidates` (
  `Can_image` varchar(100) NOT NULL,
  `Can_Position` varchar(30) NOT NULL,
  `Can_Partylist` varchar(30) NOT NULL,
  `Can_ID` varchar(15) NOT NULL DEFAULT '',
  `Can_Fname` varchar(30) NOT NULL,
  `Can_Mname` varchar(30) DEFAULT NULL,
  `Can_Lname` varchar(30) NOT NULL,
  `Can_NameExt` varchar(30) DEFAULT NULL,
  `Can_Gender` char(6) NOT NULL,
  `Can_Bdate` date NOT NULL,
  `Can_Contactno` varchar(15) DEFAULT NULL,
  `Can_Ylevel` varchar(8) NOT NULL,
  `Can_Course` varchar(20) NOT NULL,
  `Can_Votes` int(10) unsigned NOT NULL,
  `Can_Motto` varchar(100) NOT NULL,
  PRIMARY KEY (`Can_ID`),
  KEY `Can_Partylist` (`Can_Partylist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_candidates`
--

LOCK TABLES `tbl_candidates` WRITE;
/*!40000 ALTER TABLE `tbl_candidates` DISABLE KEYS */;
INSERT INTO `tbl_candidates` VALUES ('IMG_20170907_110706.jpg','Vice Chairman','none','GC15-687','Sarah Jane','Pacaigue','Tayao','','Female','1997-09-07','09080970970','1st Year','BSIT',0,''),('1506065692.jpg','Chairman','none','GC14-128','ronnel','alfonso','valiente','','Male','1997-12-01','09798798798','3rd Year','BSIT',0,''),('1505726494.jpg','Chairman','none','GC15-118','ma angelica','cabello','martin','','Female','1998-12-16','09897987888','3rd Year','BSIT',1,''),('dgdfsdf iyoiho.jpg','Vice Chairman','binhi','GC21-565','dgdfsdf','jkhjhkj','iyoiho','Iv','Female','1999-08-04','09005676756','1st Year','BSE-English',1,''),('nikko carlos.jpg','Secretary','binhi','SL13-639','nikko','pestano','carlos','','Male','1996-08-12','09946445646','4th Year','BSIT',0,'');
/*!40000 ALTER TABLE `tbl_candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_electionsched`
--

DROP TABLE IF EXISTS `tbl_electionsched`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_electionsched` (
  `type` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_electionsched`
--

LOCK TABLES `tbl_electionsched` WRITE;
/*!40000 ALTER TABLE `tbl_electionsched` DISABLE KEYS */;
INSERT INTO `tbl_electionsched` VALUES ('schedule','2018-01-28','00:00:00','23:58:00');
/*!40000 ALTER TABLE `tbl_electionsched` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery` (
  `gal_photo` varchar(100) NOT NULL,
  `gal_desc` varchar(255) NOT NULL,
  `gal_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery`
--

LOCK TABLES `tbl_gallery` WRITE;
/*!40000 ALTER TABLE `tbl_gallery` DISABLE KEYS */;
INSERT INTO `tbl_gallery` VALUES ('gal100905~10-30-2017.jpg','hello','2017-10-30 22:09:05'),('gal082510~01-19-2018.jpg','TDTYDTRDTRDTDGFDHFHJGJGHGHFHGFHGFHGFHFHFJHGJHGJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJHGUYTUYRYURYRYURIUYOIYOIYOYPOUPOULHJFJHXGCVNHMJH,J.BVGUYFGBVGKBHOUBHGV FGHJKLHBVGFGHJKLNBGVYTHGHJBYHGVUIUBJBONIUBIUGHTDFGVFGUBHGTYFRTXDCTVHUGUYTHFGVU\r','2018-01-19 20:25:10'),('gal034300~04-14-2018.jpg','l;yrtyrytrytrytr','2018-04-14 15:43:00');
/*!40000 ALTER TABLE `tbl_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_partylist`
--

DROP TABLE IF EXISTS `tbl_partylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_partylist` (
  `Plist_Name` varchar(30) NOT NULL,
  `Plist_Desc` varchar(50) NOT NULL,
  PRIMARY KEY (`Plist_Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_partylist`
--

LOCK TABLES `tbl_partylist` WRITE;
/*!40000 ALTER TABLE `tbl_partylist` DISABLE KEYS */;
INSERT INTO `tbl_partylist` VALUES ('binhi','dkfjsldk');
/*!40000 ALTER TABLE `tbl_partylist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_records`
--

DROP TABLE IF EXISTS `tbl_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_records` (
  `His_Image` varchar(100) NOT NULL,
  `His_ID` varchar(15) NOT NULL DEFAULT '',
  `His_fname` varchar(30) NOT NULL,
  `His_Mname` varchar(30) DEFAULT NULL,
  `His_Lname` varchar(30) NOT NULL,
  `His_NameExt` varchar(30) DEFAULT NULL,
  `His_Gender` char(6) NOT NULL,
  `His_Ylevel` varchar(8) NOT NULL,
  `His_Course` varchar(20) NOT NULL,
  `His_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_records`
--

LOCK TABLES `tbl_records` WRITE;
/*!40000 ALTER TABLE `tbl_records` DISABLE KEYS */;
INSERT INTO `tbl_records` VALUES ('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-10-29 22:42:39'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-10-29 22:45:45'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-10-29 22:49:31'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-10-29 22:50:41'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-10-30 22:01:17'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-11-03 07:56:57'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-11-03 11:18:46'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2017-11-03 11:23:54'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-19 18:14:36'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-19 18:22:59'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:21:59'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:25:30'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:30:11'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:36:03'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:40:00'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:43:03'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-22 23:52:42'),('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','BSIT','4th Year','2018-01-28 21:17:16');
/*!40000 ALTER TABLE `tbl_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students` (
  `Acc_image` varchar(100) NOT NULL,
  `Acc_Type` varchar(15) NOT NULL,
  `Acc_ID` varchar(15) NOT NULL DEFAULT '',
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(30) DEFAULT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(30) DEFAULT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Ylevel` varchar(8) NOT NULL,
  `Acc_Course` varchar(20) NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students`
--

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` VALUES ('1506065692.jpg','deactivate','GC14-128','202cb962ac59075b964b07152d234b70','ronnel','alfonso','valiente','','Male','1997-12-01','3rd Year','BSIT','What is Your Favorite Food?','adobo'),('Marc lester Punzalan.jpg','Student','GC14-647','202cb962ac59075b964b07152d234b70','Marc lester','De Jesus','Punzalan','','Male','1996-10-10','4th Year','BSIT','Who is Your Favorite Teacher?','Reniel'),('WIN_20170907_10_45_58_Pro.jpg','Student','GC14-544','202cb962ac59075b964b07152d234b70','Jeferson','Angeles','Garcia','','Male','1998-08-13','4th Year','BSIT','What is Your Favorite Food?','adobo'),('ramon apagan.jpg','Student','GC15-667','202cb962ac59075b964b07152d234b70','ramon','marcos','apagan','Jr.','Male','1990-05-01','3rd Year','BSIT','What is Your Favorite Games?','dota'),('IMG_20170907_110706.jpg','Student','GC15-687','202cb962ac59075b964b07152d234b70','Sarah Jane','Pacaigue','Tayao','','Female','1997-09-07','1st Year','BSIT','Who is Your Favorite Teacher?','joan'),('neil christian deraya.jpg','deactivate','GC14-054','202cb962ac59075b964b07152d234b70','neil christian','rebato','deraya','','Male','1997-08-14','4th Year','BSIT','What is Your Favorite Color?','green'),('WIN_20170915_18_10_44_Pro.jpg','deactivate','GC13-124','202cb962ac59075b964b07152d234b70','wilson','atienza','castro','','Male','1996-04-20','4th Year','BSIT','What is Your Favorite Food?','hipon'),('Renver Alfonso.jpg','deactivate','42014006','202cb962ac59075b964b07152d234b70','Renver','Perez','Alfonso','','Male','1998-04-27','3rd Year','BSIT','What is Your Favorite Color?','red'),('1505713628.jpg','deactivate','GC14-157','202cb962ac59075b964b07152d234b70','rochelle','feliciano','Cipriano','','Female','1994-05-06','4th Year','BSIT','What is Your Favorite Color?','violet'),('1505726494.jpg','Student','GC15-118','202cb962ac59075b964b07152d234b70','ma angelica','cabello','martin','','Female','1998-12-16','3rd Year','BSIT','What is Your Favorite Color?','black'),('P_20161130_120022_BF_p.jpg','Student','GC15-431','202cb962ac59075b964b07152d234b70','gizelle','lazaro','mendoza','','Female','1999-05-11','3rd Year','BSIT','What is Your Favorite Color?','red'),('1505796892.jpg','Student','GC15-960','202cb962ac59075b964b07152d234b70','jaypee','delos santos','cortez','','Male','1997-05-20','4th Year','BSIT','What is Your Favorite Games?','dota 2'),('1505798006.jpg','deactivate','GC14-064','202cb962ac59075b964b07152d234b70','mark joseph','luma','simon','','Male','1996-07-11','3rd Year','BSIT','Who is Your Favorite Teacher?','primo'),('Ronalyn Sebastian.jpg','deactivate','GC14-124','202cb962ac59075b964b07152d234b70','Ronalyn','Bautista','Sebastian','','Female','1997-08-14','3rd Year','BSIT','What is Your Favorite Color?','Blue'),('John Edgar Francisco.jpg','Student','GC15-678','202cb962ac59075b964b07152d234b70','John Edgar','Dela Cruz','Francisco','Jr.','Male','1996-05-12','4th Year','BSIT','What is Your Favorite Color?','yellow'),('nikko carlos.jpg','Student','SL13-639','202cb962ac59075b964b07152d234b70','nikko','pestano','carlos','','Male','1996-08-12','4th Year','BSIT','What is Your Favorite Color?','blue'),('ed df.jpg','deactivate','GC12-345','202cb962ac59075b964b07152d234b70','edf','sbd','dfh','Sr.','Male','1999-05-06','1st Year','BSIT','What is Your Favorite Food?','dfd'),('Mark Johven Sinamban.jpg','Student','GC15-731','3807396b29eb4a8c46d71444bff573c0','Mark Johven','Borja','Sinamban','','Male','1996-12-05','4th Year','BSIT','What is Your Favorite Color?','green'),('joan ducay.jpg','deactivate','GC12-567','202cb962ac59075b964b07152d234b70','joan','bautista','ducay','','Female','1999-06-09','4th Year','BSIT','What is Your Favorite Food?','adobo'),('sfsdf sdfsdf.jpg','Student','GC14-678','202cb962ac59075b964b07152d234b70','sfsdf','dgfdx','sdfsdf','','Male','1996-07-10','1st Year','BSIT','What is Your Favorite Food?','fdgdf'),('dgdfsdf iyoiho.jpg','Student','GC21-565','202cb962ac59075b964b07152d234b70','dgdfsdf','jkhjhkj','iyoiho','Iv','Female','1999-08-04','1st Year','BSE-English','What is Your Favorite Food?','bbq'),('shyra pablo.jpg','deactivate','GC14-366','81dc9bdb52d04dc20036dbd8313ed055','shyra','yacat','pablo','','Female','1997-02-05','4th Year','BSIT','What is Your Favorite Color?','green');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tempstudents`
--

DROP TABLE IF EXISTS `tbl_tempstudents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tempstudents` (
  `Acc_image` varchar(100) NOT NULL,
  `Acc_Type` varchar(15) NOT NULL,
  `Acc_ID` varchar(15) NOT NULL DEFAULT '',
  `Acc_Pword` varchar(100) NOT NULL,
  `Acc_Fname` varchar(25) NOT NULL,
  `Acc_Mname` varchar(30) DEFAULT NULL,
  `Acc_Lname` varchar(25) NOT NULL,
  `Acc_NameExt` varchar(30) DEFAULT NULL,
  `Acc_Gender` char(6) NOT NULL,
  `Acc_Bdate` date NOT NULL,
  `Acc_Ylevel` varchar(8) NOT NULL,
  `Acc_Course` varchar(20) NOT NULL,
  `Acc_Quest` varchar(30) NOT NULL,
  `Acc_Ans` varchar(30) NOT NULL,
  `Acc_Datetime` datetime NOT NULL,
  PRIMARY KEY (`Acc_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tempstudents`
--

LOCK TABLES `tbl_tempstudents` WRITE;
/*!40000 ALTER TABLE `tbl_tempstudents` DISABLE KEYS */;
INSERT INTO `tbl_tempstudents` VALUES ('kjhjhk hkkj.jpg','Student','GC123-ttryfhg','202cb962ac59075b964b07152d234b70','kjhjhk','jhkjh','hkkj','Sr.','Male','2005-01-27','2nd Year','BSE-MAPEH','What is Your Favorite Food?','hkjh','2018-01-27 23:49:42');
/*!40000 ALTER TABLE `tbl_tempstudents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_vote_history`
--

DROP TABLE IF EXISTS `tbl_vote_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_vote_history` (
  `His_Image` varchar(100) NOT NULL,
  `His_ID` varchar(15) NOT NULL DEFAULT '',
  `His_fname` varchar(30) NOT NULL,
  `His_Mname` varchar(30) DEFAULT NULL,
  `His_Lname` varchar(30) NOT NULL,
  `His_NameExt` varchar(30) DEFAULT NULL,
  `His_Gender` char(6) NOT NULL,
  `His_Ylevel` varchar(8) NOT NULL,
  `His_Course` varchar(20) NOT NULL,
  `His_datetime` datetime NOT NULL,
  PRIMARY KEY (`His_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_vote_history`
--

LOCK TABLES `tbl_vote_history` WRITE;
/*!40000 ALTER TABLE `tbl_vote_history` DISABLE KEYS */;
INSERT INTO `tbl_vote_history` VALUES ('John Edgar Francisco.jpg','GC15-678','John Edgar','Dela Cruz','Francisco','Jr.','Male','4th Year','BSIT','2018-01-28 21:17:16');
/*!40000 ALTER TABLE `tbl_vote_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_voting_logs`
--

DROP TABLE IF EXISTS `tbl_voting_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_voting_logs` (
  `L_Id` varchar(15) NOT NULL,
  `L_Chairman_Photo` varchar(100) NOT NULL,
  `L_Chairman` varchar(50) DEFAULT NULL,
  `L_ViceChairman_Photo` varchar(100) NOT NULL,
  `L_ViceChairman` varchar(50) DEFAULT NULL,
  `L_Secretary_Photo` varchar(100) NOT NULL,
  `L_Secretary` varchar(50) DEFAULT NULL,
  `L_Treasurer_Photo` varchar(100) NOT NULL,
  `L_Treasurer` varchar(50) DEFAULT NULL,
  `L_BusinessManager_Photo` varchar(100) NOT NULL,
  `L_BusinessManager` varchar(50) DEFAULT NULL,
  `L_BOT1_Photo` varchar(100) NOT NULL,
  `L_BOT1` varchar(50) DEFAULT NULL,
  `L_BOT2_Photo` varchar(100) NOT NULL,
  `L_BOT2` varchar(50) DEFAULT NULL,
  `L_BOT3_Photo` varchar(100) NOT NULL,
  `L_BOT3` varchar(50) DEFAULT NULL,
  `L_BOT4_Photo` varchar(100) NOT NULL,
  `L_BOT4` varchar(50) DEFAULT NULL,
  `L_Datetime` datetime DEFAULT NULL,
  KEY `L_Id` (`L_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_voting_logs`
--

LOCK TABLES `tbl_voting_logs` WRITE;
/*!40000 ALTER TABLE `tbl_voting_logs` DISABLE KEYS */;
INSERT INTO `tbl_voting_logs` VALUES ('GC15-678','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','','','','','','','','','','','','','','','','','2017-10-29 22:42:39'),('GC15-678','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','','','','','','','','','','','','','','','','','2017-10-29 22:45:45'),('GC15-678','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','','','','','','','','','','','','','','','','','2017-10-29 22:49:31'),('GC15-678','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','','','','','','','','','','','','','','','','','2017-10-29 22:50:41'),('GC15-678','1505798006.jpg','mark joseph luma simon ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','','','','','','','','','','','','','','','2017-10-30 22:01:17'),('GC15-678','dgdfsdf iyoiho.jpg','dgdfsdf jkhjhkj iyoiho Iv','ed df.jpg','edf sbd dfh Sr.','','','','','','','','','','','','','','','2017-11-03 07:56:57'),('GC15-678','dgdfsdf iyoiho.jpg','dgdfsdf jkhjhkj iyoiho Iv','ed df.jpg','edf sbd dfh Sr.','','','','','','','','','','','','','','','2017-11-03 11:18:46'),('GC15-678','dgdfsdf iyoiho.jpg','dgdfsdf jkhjhkj iyoiho Iv','ed df.jpg','edf sbd dfh Sr.','','','','','','','','','','','','','','','2017-11-03 11:23:54'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','','','','','','','','','2018-01-19 18:14:36'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','','','','','','','','','2018-01-19 18:22:59'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','','','','','','','','','2018-01-22 23:22:00'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','Mark Johven Sinamban.jpg','Mark Johven Borja Sinamban ','','','','','','','2018-01-22 23:25:30'),('GC15-678','','','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','Mark Johven Sinamban.jpg','Mark Johven Borja Sinamban ','','','','','','','2018-01-22 23:30:11'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','Mark Johven Sinamban.jpg','Mark Johven Borja Sinamban ','','','','','','','2018-01-22 23:36:03'),('GC15-678','1505726494.jpg','ma angelica cabello martin ','dgdfsdf iyoiho.jpg','dgdfsdf jkhjhkj iyoiho Iv','nikko carlos.jpg','nikko pestano carlos ','','','','','Mark Johven Sinamban.jpg','Mark Johven Borja Sinamban ','','','','','','','2018-01-22 23:40:00'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','','','','','','','','','2018-01-22 23:43:03'),('GC15-678','1506065692.jpg','ronnel alfonso valiente ','IMG_20170907_110706.jpg','Sarah Jane Pacaigue Tayao ','1505798006.jpg','mark joseph luma simon ','','','','','','','','','','','','','2018-01-22 23:52:42'),('GC15-678','1505726494.jpg','ma angelica cabello martin ','dgdfsdf iyoiho.jpg','dgdfsdf jkhjhkj iyoiho Iv','1505798006.jpg','mark joseph luma simon ','','','','','Mark Johven Sinamban.jpg','Mark Johven Borja Sinamban ','','','','','','','2018-01-28 21:17:16');
/*!40000 ALTER TABLE `tbl_voting_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-14 16:19:21
