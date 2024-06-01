-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: successinternational
-- ------------------------------------------------------
-- Server version	8.0.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academic_officer`
--

DROP TABLE IF EXISTS `academic_officer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `academic_officer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `status_id` int NOT NULL,
  `academic_officer_image_id` int DEFAULT NULL,
  `dateadded` date DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_academic_officer_status1_idx` (`status_id`),
  KEY `fk_academic_officer_academic_officer_image1_idx` (`academic_officer_image_id`),
  KEY `fk_academic_officer_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_academic_officer_academic_officer_image1` FOREIGN KEY (`academic_officer_image_id`) REFERENCES `academic_officer_image` (`id`),
  CONSTRAINT `fk_academic_officer_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_academic_officer_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_officer`
--

LOCK TABLES `academic_officer` WRITE;
/*!40000 ALTER TABLE `academic_officer` DISABLE KEYS */;
INSERT INTO `academic_officer` VALUES (1,'Samudra','Uduwaka','shyanasamu@gmail.com','0712154714','123','12345678',1,1,'2022-06-16',NULL),(2,NULL,NULL,'anuhasaki@gmail.com',NULL,'62adc8f27788a','62adc8f56a01a',1,NULL,'2022-06-18',NULL);
/*!40000 ALTER TABLE `academic_officer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academic_officer_image`
--

DROP TABLE IF EXISTS `academic_officer_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `academic_officer_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_officer_image`
--

LOCK TABLES `academic_officer_image` WRITE;
/*!40000 ALTER TABLE `academic_officer_image` DISABLE KEYS */;
INSERT INTO `academic_officer_image` VALUES (1,'academicOfficerimgs//62a82ab691f79.jpg');
/*!40000 ALTER TABLE `academic_officer_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `admin_image_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_admin_image1_idx` (`admin_image_id`),
  CONSTRAINT `fk_admin_admin_image1` FOREIGN KEY (`admin_image_id`) REFERENCES `admin_image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'anuhasaki@gmail.com','123',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_image`
--

DROP TABLE IF EXISTS `admin_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_image`
--

LOCK TABLES `admin_image` WRITE;
/*!40000 ALTER TABLE `admin_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignmentpdfs`
--

DROP TABLE IF EXISTS `assignmentpdfs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignmentpdfs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `url` text,
  `description` text,
  `subject_has_class_id` int NOT NULL,
  `plagiarism_status_id` int NOT NULL,
  `dateadded` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignmentpdfs_subject_has_class1_idx` (`subject_has_class_id`),
  KEY `fk_assignmentpdfs_plagiarism_status1_idx` (`plagiarism_status_id`),
  KEY `fk_assignmentpdfs_teacher1_idx` (`teacher_id`),
  CONSTRAINT `fk_assignmentpdfs_plagiarism_status1` FOREIGN KEY (`plagiarism_status_id`) REFERENCES `plagiarism_status` (`id`),
  CONSTRAINT `fk_assignmentpdfs_subject_has_class1` FOREIGN KEY (`subject_has_class_id`) REFERENCES `subject_has_class` (`id`),
  CONSTRAINT `fk_assignmentpdfs_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignmentpdfs`
--

LOCK TABLES `assignmentpdfs` WRITE;
/*!40000 ALTER TABLE `assignmentpdfs` DISABLE KEYS */;
INSERT INTO `assignmentpdfs` VALUES (1,'Combined maths week assignment 1.','Assignments//62a4f4bc81ca9.pdf','Combined maths week assignment 1. total contribution to subject GPA is 50%.',2,2,'2022-06-12','2022-06-30',1),(2,'Mathematics lesson 1','Assignments//62a4f5f10a523.pdf','Mathematics Lesson 1 open book assignment of 1 week',3,1,'2022-06-12','2022-06-22',1),(3,'Calculas 1','Assignments//62a4f66531b3e.pdf','Calculas 1 open theory assignment',2,2,'2022-06-12','2022-06-23',1),(4,'Mathematics Pythagorus theorem','Assignments//62a4f89ae7af1.pdf','Mathematics Pythagorus theorem open book assignment',3,1,'2022-06-12','2022-06-18',1),(5,'Blood Circulatory System','Assignments//62b3039cd1833.pdf','Research assignment for the blood circulatory system of Ordinary Level students.',5,2,'2022-06-22','2022-07-08',1);
/*!40000 ALTER TABLE `assignmentpdfs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `class` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'O/L'),(2,'A/L Physical Science'),(3,'A/L Commerce'),(4,'9'),(5,'A/L Bio Science');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_payment`
--

DROP TABLE IF EXISTS `enrollment_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `time` time DEFAULT NULL,
  `year_study` int DEFAULT NULL,
  `student_id` int NOT NULL,
  `status_id` int NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enrollment_payment_student1_idx` (`student_id`),
  KEY `fk_enrollment_payment_status1_idx` (`status_id`),
  CONSTRAINT `fk_enrollment_payment_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_enrollment_payment_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_payment`
--

LOCK TABLES `enrollment_payment` WRITE;
/*!40000 ALTER TABLE `enrollment_payment` DISABLE KEYS */;
INSERT INTO `enrollment_payment` VALUES (1,10,'10:50:22',1,1,1,'2022-05-12');
/*!40000 ALTER TABLE `enrollment_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_status`
--

DROP TABLE IF EXISTS `exam_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_status`
--

LOCK TABLES `exam_status` WRITE;
/*!40000 ALTER TABLE `exam_status` DISABLE KEYS */;
INSERT INTO `exam_status` VALUES (1,'Pass'),(2,'Repeat');
/*!40000 ALTER TABLE `exam_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (1,'A'),(2,'B'),(3,'C'),(4,'S'),(5,'F');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_notes`
--

DROP TABLE IF EXISTS `lesson_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `url` text,
  `subject_has_class_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `dateadded` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lesson_notes_subject_has_class1_idx` (`subject_has_class_id`),
  KEY `fk_lesson_notes_teacher1_idx` (`teacher_id`),
  CONSTRAINT `fk_lesson_notes_subject_has_class1` FOREIGN KEY (`subject_has_class_id`) REFERENCES `subject_has_class` (`id`),
  CONSTRAINT `fk_lesson_notes_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_notes`
--

LOCK TABLES `lesson_notes` WRITE;
/*!40000 ALTER TABLE `lesson_notes` DISABLE KEYS */;
INSERT INTO `lesson_notes` VALUES (1,'Pythogorus Theorem','theorem based on mathematics','lessonNotes//62a74355497df.pdf',1,1,'2022-06-13'),(2,'Lesson 1 - Circle','A helpful guide to the Ordinary Level Lesson 1 - Circle','lessonNotes//62a74471eab32.pdf',3,1,'2022-06-13');
/*!40000 ALTER TABLE `lesson_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medium`
--

DROP TABLE IF EXISTS `medium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medium` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medium`
--

LOCK TABLES `medium` WRITE;
/*!40000 ALTER TABLE `medium` DISABLE KEYS */;
INSERT INTO `medium` VALUES (1,'English Medium'),(2,'Sinhala Medium');
/*!40000 ALTER TABLE `medium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `dateadded` datetime DEFAULT NULL,
  `news_image_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_news_news_image1_idx` (`news_image_id`),
  CONSTRAINT `fk_news_news_image1` FOREIGN KEY (`news_image_id`) REFERENCES `news_image` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_image`
--

DROP TABLE IF EXISTS `news_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_image`
--

LOCK TABLES `news_image` WRITE;
/*!40000 ALTER TABLE `news_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plagiarism_status`
--

DROP TABLE IF EXISTS `plagiarism_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plagiarism_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plagiarism_status`
--

LOCK TABLES `plagiarism_status` WRITE;
/*!40000 ALTER TABLE `plagiarism_status` DISABLE KEYS */;
INSERT INTO `plagiarism_status` VALUES (1,'Yes'),(2,'No');
/*!40000 ALTER TABLE `plagiarism_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Active'),(2,'Inactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `status_id` int NOT NULL,
  `class_id` int DEFAULT NULL,
  `student_image_id` int DEFAULT NULL,
  `dateadded` date DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_status_idx` (`status_id`),
  KEY `fk_student_class1_idx` (`class_id`),
  KEY `fk_student_student_image1_idx` (`student_image_id`),
  KEY `fk_student_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_student_class1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  CONSTRAINT `fk_student_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_student_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_student_student_image1` FOREIGN KEY (`student_image_id`) REFERENCES `student_image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Samudra','Samadhi','shyanasamu@gmail.com','0776380882','123','12345678',1,1,1,'2022-06-04',2),(6,'Samudra','Samadhi','anuhasaki@gmail.com','0776380882','62b20fe212663','62b20fe417a6a',1,3,NULL,'2022-06-22',2);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_has_assignmentmark`
--

DROP TABLE IF EXISTS `student_has_assignmentmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_has_assignmentmark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `mark` double DEFAULT NULL,
  `comment` text,
  `grade_id` int NOT NULL,
  `exam_status_id` int NOT NULL,
  `dateadded` date DEFAULT NULL,
  `teacher_id` int NOT NULL,
  `status_id` int NOT NULL,
  `assignmentpdfs_id` int NOT NULL,
  `url` text,
  PRIMARY KEY (`id`),
  KEY `fk_student_has_assignmentmark_student1_idx` (`student_id`),
  KEY `fk_student_has_assignmentmark_grade1_idx` (`grade_id`),
  KEY `fk_student_has_assignmentmark_exam_status1_idx` (`exam_status_id`),
  KEY `fk_student_has_assignmentmark_teacher1_idx` (`teacher_id`),
  KEY `fk_student_has_assignmentmark_status1_idx` (`status_id`),
  KEY `fk_student_has_assignmentmark_assignmentpdfs1_idx` (`assignmentpdfs_id`),
  CONSTRAINT `fk_student_has_assignmentmark_assignmentpdfs1` FOREIGN KEY (`assignmentpdfs_id`) REFERENCES `assignmentpdfs` (`id`),
  CONSTRAINT `fk_student_has_assignmentmark_exam_status1` FOREIGN KEY (`exam_status_id`) REFERENCES `exam_status` (`id`),
  CONSTRAINT `fk_student_has_assignmentmark_grade1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `fk_student_has_assignmentmark_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_student_has_assignmentmark_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  CONSTRAINT `fk_student_has_assignmentmark_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_has_assignmentmark`
--

LOCK TABLES `student_has_assignmentmark` WRITE;
/*!40000 ALTER TABLE `student_has_assignmentmark` DISABLE KEYS */;
INSERT INTO `student_has_assignmentmark` VALUES (1,1,90,'Very good. keep trying.',1,1,'2022-06-16',1,2,2,'markedAssignments//62aaf0f12a312.pdf');
/*!40000 ALTER TABLE `student_has_assignmentmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_image`
--

DROP TABLE IF EXISTS `student_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_image`
--

LOCK TABLES `student_image` WRITE;
/*!40000 ALTER TABLE `student_image` DISABLE KEYS */;
INSERT INTO `student_image` VALUES (1,'studentimgs//62b2708adeaba.jpg');
/*!40000 ALTER TABLE `student_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `medium_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_medium1_idx` (`medium_id`),
  CONSTRAINT `fk_subject_medium1` FOREIGN KEY (`medium_id`) REFERENCES `medium` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'Combined Mathematics',2),(2,'Combined Mathematics',1),(3,'Mathematics',2),(4,'Science',1);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_has_class`
--

DROP TABLE IF EXISTS `subject_has_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_has_class` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `class_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_has_class_class1_idx` (`class_id`),
  KEY `fk_subject_has_class_subject1_idx` (`subject_id`),
  CONSTRAINT `fk_subject_has_class_class1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  CONSTRAINT `fk_subject_has_class_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_has_class`
--

LOCK TABLES `subject_has_class` WRITE;
/*!40000 ALTER TABLE `subject_has_class` DISABLE KEYS */;
INSERT INTO `subject_has_class` VALUES (1,1,2),(2,2,2),(3,3,1),(4,3,4),(5,4,1);
/*!40000 ALTER TABLE `subject_has_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submittedassignments`
--

DROP TABLE IF EXISTS `submittedassignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submittedassignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  `student_id` int NOT NULL,
  `assignmentpdfs_id` int NOT NULL,
  `dateadded` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_submittedassignments_student1_idx` (`student_id`),
  KEY `fk_submittedassignments_assignmentpdfs1_idx` (`assignmentpdfs_id`),
  CONSTRAINT `fk_submittedassignments_assignmentpdfs1` FOREIGN KEY (`assignmentpdfs_id`) REFERENCES `assignmentpdfs` (`id`),
  CONSTRAINT `fk_submittedassignments_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submittedassignments`
--

LOCK TABLES `submittedassignments` WRITE;
/*!40000 ALTER TABLE `submittedassignments` DISABLE KEYS */;
INSERT INTO `submittedassignments` VALUES (1,'Assignmentstomark//62b309549ff0b.pdf',1,2,'2022-06-22'),(2,'Assignmentstomark//62b30b2bc4754.pdf',1,5,'2022-06-22');
/*!40000 ALTER TABLE `submittedassignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `status_id` int NOT NULL,
  `teacher_image_id` int DEFAULT NULL,
  `dateadded` date DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_status1_idx` (`status_id`),
  KEY `fk_teacher_teacher_image1_idx` (`teacher_image_id`),
  KEY `fk_teacher_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_teacher_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_teacher_teacher_image1` FOREIGN KEY (`teacher_image_id`) REFERENCES `teacher_image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Samudra','Samadhi','anuhasaki@gmail.com','0712154714','123','12345678',1,1,'2022-06-16',NULL),(2,NULL,NULL,'shyanasamu@gmail.com',NULL,'62adc48a65c3a','62adc48d275fa',1,NULL,'2022-06-18',NULL),(3,NULL,NULL,'samuuduwaka@gmail.com',NULL,'62b368e811968','62b368e981697',1,NULL,'2022-06-23',NULL);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_has_subject`
--

DROP TABLE IF EXISTS `teacher_has_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_has_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_teacher_has_subject_teacher1_idx` (`teacher_id`),
  CONSTRAINT `fk_teacher_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  CONSTRAINT `fk_teacher_has_subject_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_has_subject`
--

LOCK TABLES `teacher_has_subject` WRITE;
/*!40000 ALTER TABLE `teacher_has_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher_has_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_image`
--

DROP TABLE IF EXISTS `teacher_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_image`
--

LOCK TABLES `teacher_image` WRITE;
/*!40000 ALTER TABLE `teacher_image` DISABLE KEYS */;
INSERT INTO `teacher_image` VALUES (1,'teacherimgs//62a940693b46f.jpg');
/*!40000 ALTER TABLE `teacher_image` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-23  2:28:56
