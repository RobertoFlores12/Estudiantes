-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: estudiantes
-- ------------------------------------------------------
-- Server version	5.7.8-rc-log

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
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carreras` (
  `idcarrera` varchar(3) NOT NULL,
  `carrera` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES ('I01','Ingeniería Industrial'),('I02','Ingeniería Eléctrica'),('I03','Ingeniería en Agronegocios'),('I04','Ingeniería en Sistemas Computacionales');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiantes` (
  `idestudiante` varchar(12) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idcarrera` varchar(3) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idestudiante`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_estudiantes_carreras` (`idcarrera`),
  CONSTRAINT `FK_estudiantes_carreras` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES ('123456','Roberto Antonio','Barrientos','robertoflores20a@gmail.com','I03','gdfgd'),('XD83-C98-b99','Kirk','Turnell','kturnell4@disqus.com','I04','DanaKovacek'),('yd72-T53-c98','Benni','Mawer','bmawer3@nhs.uk','I04','IzolaBoehm');
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_estudiantes`
--

DROP TABLE IF EXISTS `grupo_estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_estudiantes` (
  `idgrupoestudiante` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) NOT NULL,
  `idestudiante` varchar(50) NOT NULL,
  PRIMARY KEY (`idgrupoestudiante`),
  KEY `FK_grupo_estudiantes_grupos` (`idgrupo`,`idestudiante`),
  KEY `FK_grupo_estudiantes_estudiantes` (`idestudiante`),
  CONSTRAINT `FK_grupo_estudiantes_estudiantes` FOREIGN KEY (`idestudiante`) REFERENCES `estudiantes` (`idestudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_grupo_estudiantes_grupos` FOREIGN KEY (`idgrupo`) REFERENCES `grupos` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_estudiantes`
--

LOCK TABLES `grupo_estudiantes` WRITE;
/*!40000 ALTER TABLE `grupo_estudiantes` DISABLE KEYS */;
INSERT INTO `grupo_estudiantes` VALUES (1,235,'123456'),(2,789,'yd72-T53-c98');
/*!40000 ALTER TABLE `grupo_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `num_grupo` varchar(3) NOT NULL,
  `anio` int(11) NOT NULL,
  `ciclo` varchar(2) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `FK_grupos_profesores` (`idprofesor`),
  KEY `FK_grupos_materias` (`idmateria`),
  CONSTRAINT `FK_grupos_materias` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_grupos_profesores` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`idprofesor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=790 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (235,'234',2020,'02',321,1),(789,'236',2021,'02',232,1);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(50) NOT NULL,
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (232,'Mate'),(321,'Fisica I');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profesores` (
  `idprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `genero` char(1) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` VALUES (1,'roberto','flores','2022-11-16','Gerente','M','dfd@gmail.com');
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_login`
--

LOCK TABLES `user_login` WRITE;
/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;
INSERT INTO `user_login` VALUES (1,'Belloso11','robertoflores20a@gmail.com','af24b114c988cd43d4f2099b156d562e38bc2818'),(2,'Belloso113','1234@gmai.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(3,'dsanchez','loddanny9@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(4,'sanchez','sanchez@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),(5,'roberto','roberto20@gmail.com','2636ff5a994d5446ac86560e3b5aa5a2f8d8f4e0'),(6,'admin','roberto201@gmail.com','d033e22ae348aeb5660fc2140aec35850c4da997');
/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-24  9:45:19
