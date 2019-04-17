CREATE DATABASE  IF NOT EXISTS `tec_rio` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tec_rio`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: tec_rio
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `alu_alumno`
--

DROP TABLE IF EXISTS `alu_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_alumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `no_control` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ape_pat` varchar(45) NOT NULL,
  `ape_mat` varchar(45) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` varchar(45) NOT NULL,
  `domicilio` varchar(60) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `ID_MUN` varchar(45) NOT NULL,
  `ID_LOC` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `tiempo_residencia` int(10) NOT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_alumno`
--

LOCK TABLES `alu_alumno` WRITE;
/*!40000 ALTER TABLE `alu_alumno` DISABLE KEYS */;
INSERT INTO `alu_alumno` VALUES (1,'12312','JUAN','PEREZ','MARTINEZ','JAMA780812HSPNR0','4878725689','M','escamilla11@hotmail.com','2007-06-05','asd','GAMA','79610','SOLTERO','640','979','CENTRO',2),(2,'','MARIA','MARTINEZ','MARES','MAMR7805113W4','4878725689','F','JOSE@gmail.com','2007-06-05','ADJUNTAS','GAMA # 105','79610','SOLTERO','640','979','CENTRO',1),(3,'','CESAR AUGUSTO','ESCAMILLA','MARTINEZ','EAMC780506HSPNRS00','4878725689','M','escamilla11@hotmail.com','2007-06-05','RIOVERDE','GAMA # 105','79610','CASADO','640','220','CENTRO',0),(5,'','MARIA ENGRACIA','CAMACHO','SOLIS','MAEG25051989MSPNR4','4871259836','F','MARE@GMAIL.COM','2007-06-05','RIOVERDE','ABASOLO # 45','79650','SOLTERO','640','220',' CRUZ VERDE',1),(7,'13220004','EDGAR','FLORES','TORRES','FOTE32349838048','4761284848','M','EDGAR@HOTMAIL.COM','1990-06-13','RIOVERDE','LAURELES','79610','SOLTERO','640','','ALTILLO',4);
/*!40000 ALTER TABLE `alu_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_bachillerato`
--

DROP TABLE IF EXISTS `alu_bachillerato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_bachillerato` (
  `id_bachillerato` int(11) NOT NULL AUTO_INCREMENT,
  `bachillerato` varchar(45) NOT NULL,
  PRIMARY KEY (`id_bachillerato`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_bachillerato`
--

LOCK TABLES `alu_bachillerato` WRITE;
/*!40000 ALTER TABLE `alu_bachillerato` DISABLE KEYS */;
INSERT INTO `alu_bachillerato` VALUES (1,'Universal'),(5,'MIXTO'),(9,'UNICO'),(10,'QUIMICO-BIOLOGICO'),(11,'FISICO-MATEMATICO'),(12,'ECONOMICO-ADMINISTRATIVO'),(13,'NUEVO');
/*!40000 ALTER TABLE `alu_bachillerato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_documentacion`
--

DROP TABLE IF EXISTS `alu_documentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_documentacion` (
  `id_documentacion` int(11) NOT NULL AUTO_INCREMENT,
  `constancia_estudios` bit(1) DEFAULT NULL,
  `constancia_bachillerato` bit(1) DEFAULT NULL,
  `acta_nacimiento` bit(1) DEFAULT NULL,
  `fotografias` bit(1) DEFAULT NULL,
  `carta_aceptado` bit(1) DEFAULT NULL,
  `curpp` bit(1) DEFAULT NULL,
  `certificado_secundaria` bit(1) DEFAULT NULL,
  `certificado_medico` bit(1) DEFAULT NULL,
  `carta_compromiso` bit(1) DEFAULT NULL,
  `solicitud_inscripcion` bit(1) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_documentacion`),
  KEY `documentacion_alumno_idx` (`curpp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_documentacion`
--

LOCK TABLES `alu_documentacion` WRITE;
/*!40000 ALTER TABLE `alu_documentacion` DISABLE KEYS */;
INSERT INTO `alu_documentacion` VALUES (3,'','','','','','\0','','','','',1),(4,'','','','','','','','','','',2),(7,'','','','','','\0','','','','',3),(9,'','','','','','\0','','','','',5),(10,'','','','','','\0','\0','\0','','\0',7);
/*!40000 ALTER TABLE `alu_documentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_economicos`
--

DROP TABLE IF EXISTS `alu_economicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_economicos` (
  `id_economico` int(11) NOT NULL AUTO_INCREMENT,
  `id_parentesco` int(11) NOT NULL,
  `sueldo_mensual` decimal(10,2) NOT NULL,
  `numero_dependientes` int(11) NOT NULL,
  `empresa_trabajo` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `domicilio` varchar(45) NOT NULL,
  `turno_trabajo` varchar(10) NOT NULL,
  `puesto_trabajo` varchar(30) NOT NULL,
  `antigüedad` varchar(10) NOT NULL,
  `nombre_jefe_inmediato` varchar(25) DEFAULT NULL,
  `turno_escuela` varchar(10) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_economico`),
  KEY `id_alumno_idx` (`id_alumno`),
  KEY `id_parentesco_idx` (`id_parentesco`),
  CONSTRAINT `id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alu_alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_parentesco` FOREIGN KEY (`id_parentesco`) REFERENCES `alu_parentesco` (`id_parentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_economicos`
--

LOCK TABLES `alu_economicos` WRITE;
/*!40000 ALTER TABLE `alu_economicos` DISABLE KEYS */;
INSERT INTO `alu_economicos` VALUES (1,6,123.00,1,'LALA','4878725689','GAMA','VESPERTINO','CHALAN','1','JUAN MANUEL PEREZ','MATUTINO',1),(3,1,0.00,0,'','','','empty','','1','','empty',2),(4,1,12.00,1,'NO','4878725689','GAMA # 105','MATUTINO','NO','1','NO','VESPERTINO',3),(5,1,3000.00,8798,'KSNF','8789','KLN','MATUTINO','OIUIO','89','KLJL','MATUTINO',7);
/*!40000 ALTER TABLE `alu_economicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_escolares`
--

DROP TABLE IF EXISTS `alu_escolares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_escolares` (
  `id_escolar` int(11) NOT NULL AUTO_INCREMENT,
  `promedio` decimal(10,2) NOT NULL,
  `id_bachillerato` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_tipo_bachillerato` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_escolar`),
  KEY `escolares_alumno_idx` (`id_alumno`),
  KEY `escolares_escuela_idx` (`id_escuela`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_escolares`
--

LOCK TABLES `alu_escolares` WRITE;
/*!40000 ALTER TABLE `alu_escolares` DISABLE KEYS */;
INSERT INTO `alu_escolares` VALUES (2,9.20,10,7,1,1,2),(3,6.00,9,1,1,2,3),(4,2.00,1,4,3,4,5),(5,8.00,1,2,1,4,1),(6,8.00,1,1,1,4,1),(7,90.00,9,4,3,2,7);
/*!40000 ALTER TABLE `alu_escolares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_especialidad`
--

DROP TABLE IF EXISTS `alu_especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_especialidad` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(45) NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_especialidad`
--

LOCK TABLES `alu_especialidad` WRITE;
/*!40000 ALTER TABLE `alu_especialidad` DISABLE KEYS */;
INSERT INTO `alu_especialidad` VALUES (1,'TECNICO AGROPECUARIO'),(2,'CAPACITACION INFORMATICA'),(3,'CAPACITACION ADMINISTRATIVA'),(4,'TECNICO EN INFORMATICA'),(5,'NINGUNA'),(6,'TECNICO EN DISEÑO GRAFICO'),(7,'TECNICO ADMINISTRATIVO');
/*!40000 ALTER TABLE `alu_especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_medico`
--

DROP TABLE IF EXISTS `alu_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_medico` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_sangre` varchar(5) DEFAULT NULL,
  `discapacidad` varchar(500) DEFAULT NULL,
  `nss` varchar(15) DEFAULT NULL,
  `esquema_vacunacion` bit(1) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `alergia_medicamento` varchar(500) DEFAULT NULL,
  `enfermedades_importantes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_medico`),
  KEY `medico_alumnos_idx` (`nss`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_medico`
--

LOCK TABLES `alu_medico` WRITE;
/*!40000 ALTER TABLE `alu_medico` DISABLE KEYS */;
INSERT INTO `alu_medico` VALUES (1,'O-','NINGUNA','1','',1,'NINGUNA','NINGUNA'),(2,'OH','NINGUNA','3','',2,'NINGUNA','NINGUNA'),(4,'A','NINGUNA','3',NULL,3,'NINGUNA','NINGUNA'),(5,'A','NINGUNA','6',NULL,5,'NINGUNA','NINGUNA'),(6,'B','CIEGO','7867868','',7,'','');
/*!40000 ALTER TABLE `alu_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_parentesco`
--

DROP TABLE IF EXISTS `alu_parentesco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_parentesco` (
  `id_parentesco` int(11) NOT NULL AUTO_INCREMENT,
  `parentesco` varchar(45) NOT NULL,
  PRIMARY KEY (`id_parentesco`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_parentesco`
--

LOCK TABLES `alu_parentesco` WRITE;
/*!40000 ALTER TABLE `alu_parentesco` DISABLE KEYS */;
INSERT INTO `alu_parentesco` VALUES (1,'MAMA'),(2,'PAPA'),(3,'TIO'),(4,'ABUELA'),(5,'TIO'),(6,'NINGUNO'),(7,'Y'),(8,'PADRINO');
/*!40000 ALTER TABLE `alu_parentesco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_preinscripcion`
--

DROP TABLE IF EXISTS `alu_preinscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_preinscripcion` (
  `id_aspirante` int(11) NOT NULL AUTO_INCREMENT,
  `folio_aspirante` decimal(10,2) NOT NULL,
  `folio_exani` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  PRIMARY KEY (`id_aspirante`),
  KEY `preinscripcion_carrera_idx` (`id_carrera`),
  KEY `preinscripcion_alumno_idx` (`id_alumno`),
  CONSTRAINT `preinscripcion_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alu_alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `preinscripcion_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `bas_carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_preinscripcion`
--

LOCK TABLES `alu_preinscripcion` WRITE;
/*!40000 ALTER TABLE `alu_preinscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `alu_preinscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_tipo_bachillerato`
--

DROP TABLE IF EXISTS `alu_tipo_bachillerato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_tipo_bachillerato` (
  `id_tipo_bachillerato` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_bachillerato` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_bachillerato`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_tipo_bachillerato`
--

LOCK TABLES `alu_tipo_bachillerato` WRITE;
/*!40000 ALTER TABLE `alu_tipo_bachillerato` DISABLE KEYS */;
INSERT INTO `alu_tipo_bachillerato` VALUES (1,'UNIVERSAL'),(2,'UNICO'),(3,'GENERAL');
/*!40000 ALTER TABLE `alu_tipo_bachillerato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alu_tutor`
--

DROP TABLE IF EXISTS `alu_tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alu_tutor` (
  `id_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ape_pat` varchar(45) NOT NULL,
  `ape_mat` varchar(45) NOT NULL,
  `domicilio` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `id_parentesco` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `profesion` varchar(25) NOT NULL,
  `lugar_trabajo` varchar(60) NOT NULL,
  `domicilio_trabajo` varchar(60) NOT NULL,
  `telefono_trabajo` varchar(10) NOT NULL,
  `jefe_inmediato` varchar(60) NOT NULL,
  `telefono_jefe_inmediato` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tutor`),
  KEY `tutor_parentesco_idx` (`id_parentesco`),
  KEY `tutor_alumno_idx` (`id_alumno`),
  CONSTRAINT `tutor_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alu_alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tutor_parentesco` FOREIGN KEY (`id_parentesco`) REFERENCES `alu_parentesco` (`id_parentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alu_tutor`
--

LOCK TABLES `alu_tutor` WRITE;
/*!40000 ALTER TABLE `alu_tutor` DISABLE KEYS */;
INSERT INTO `alu_tutor` VALUES (2,'JORGE','MARTINEZ','HERNANDEZ','MORELOS # 587','487872568',8,3,'TRABAJADOR','TEC RIO','TEC RIO','12','TEC RIO','4'),(5,'MARTHA','REYES ','GUILLEN','MIER Y TERAN ','4878729887',1,5,'','','','','',''),(7,'JUAN','ROBLEDO','PEREZA','AQUIA','1234',3,2,'NO','NO','NO','12','NO','12');
/*!40000 ALTER TABLE `alu_tutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bas_carreras`
--

DROP TABLE IF EXISTS `bas_carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bas_carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nombre_corto` varchar(10) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `id_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_carrera`),
  KEY `carreras_plan_idx` (`id_plan`),
  CONSTRAINT `carreras_plan` FOREIGN KEY (`id_plan`) REFERENCES `bas_plan_estudios` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bas_carreras`
--

LOCK TABLES `bas_carreras` WRITE;
/*!40000 ALTER TABLE `bas_carreras` DISABLE KEYS */;
INSERT INTO `bas_carreras` VALUES (1,'INGENIERIA EN SISTEMAS','INGSIS','2014-12-03','1999-11-30',1),(2,'INGENIERIA EN INFORMATICA','ING INF','2015-01-22','1999-11-30',2);
/*!40000 ALTER TABLE `bas_carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bas_ciclo`
--

DROP TABLE IF EXISTS `bas_ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bas_ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `ciclo` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` bit(1) NOT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bas_ciclo`
--

LOCK TABLES `bas_ciclo` WRITE;
/*!40000 ALTER TABLE `bas_ciclo` DISABLE KEYS */;
INSERT INTO `bas_ciclo` VALUES (1,'2014-2015','2014-12-16','2014-12-27','\0'),(2,'2013-2014','2015-01-27','2015-06-20','\0'),(3,'2015-2016','2015-09-16','2015-09-27','');
/*!40000 ALTER TABLE `bas_ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bas_niveles`
--

DROP TABLE IF EXISTS `bas_niveles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bas_niveles` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `grados` int(11) NOT NULL,
  `grupos` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bas_niveles`
--

LOCK TABLES `bas_niveles` WRITE;
/*!40000 ALTER TABLE `bas_niveles` DISABLE KEYS */;
/*!40000 ALTER TABLE `bas_niveles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bas_periodo`
--

DROP TABLE IF EXISTS `bas_periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bas_periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(40) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bas_periodo`
--

LOCK TABLES `bas_periodo` WRITE;
/*!40000 ALTER TABLE `bas_periodo` DISABLE KEYS */;
INSERT INTO `bas_periodo` VALUES (1,'AGOSTO - DICIEMBRE','2014-12-18','2014-12-28',1),(2,'ENERO - DICIEMBRE','2015-01-01','2015-01-24',1),(3,'AGOSTO - DICIEMBRE','2015-09-02','2015-09-20',3),(4,'ENERO - JULIO','2015-09-03','2015-09-20',3);
/*!40000 ALTER TABLE `bas_periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bas_plan_estudios`
--

DROP TABLE IF EXISTS `bas_plan_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bas_plan_estudios` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `plan_estudios` varchar(45) NOT NULL,
  `doc_autorizacion` varchar(45) NOT NULL,
  `creditos_optativos` int(11) NOT NULL,
  `creditos_totales` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `reticula` varchar(20) NOT NULL,
  `fecha_alta` date NOT NULL,
  `carga_max_creditos` date DEFAULT NULL,
  `carga_min_creditos` date DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bas_plan_estudios`
--

LOCK TABLES `bas_plan_estudios` WRITE;
/*!40000 ALTER TABLE `bas_plan_estudios` DISABLE KEYS */;
INSERT INTO `bas_plan_estudios` VALUES (1,'ISIC-2010-215','245586',56,60,'LIQUIDADO','123456789','2014-12-11','0000-00-00','0000-00-00'),(2,'IINF-2010-220','INF021',50,50,'VIGENTE','123','2015-01-22',NULL,NULL);
/*!40000 ALTER TABLE `bas_plan_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esc_aulas`
--

DROP TABLE IF EXISTS `esc_aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esc_aulas` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `aula` varchar(45) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  PRIMARY KEY (`id_aula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esc_aulas`
--

LOCK TABLES `esc_aulas` WRITE;
/*!40000 ALTER TABLE `esc_aulas` DISABLE KEYS */;
INSERT INTO `esc_aulas` VALUES (1,'AULA 1',1),(2,'AULA 2',1),(3,'AULA 3',1),(4,'AULA 5',2);
/*!40000 ALTER TABLE `esc_aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esc_edificios`
--

DROP TABLE IF EXISTS `esc_edificios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esc_edificios` (
  `id_edificio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  PRIMARY KEY (`id_edificio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esc_edificios`
--

LOCK TABLES `esc_edificios` WRITE;
/*!40000 ALTER TABLE `esc_edificios` DISABLE KEYS */;
INSERT INTO `esc_edificios` VALUES (1,'OFICINAS ADMINISTRATIVAS','EDIFICIO E',1),(2,'CONTROL ESCOLAR','EDIFICIO A',1);
/*!40000 ALTER TABLE `esc_edificios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esc_escuela`
--

DROP TABLE IF EXISTS `esc_escuela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esc_escuela` (
  `id_escuela` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `num` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(70) NOT NULL,
  `ID_MUN` varchar(45) NOT NULL,
  `ID_LOC` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_escuela`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esc_escuela`
--

LOCK TABLES `esc_escuela` WRITE;
/*!40000 ALTER TABLE `esc_escuela` DISABLE KEYS */;
INSERT INTO `esc_escuela` VALUES (1,'CELESTINO SANCHEZ CERVANTES','Pedro Moreno','S/N','4878724838','celestino@gmail.com','640',135),(2,'COBACH 05','BULEVAR KM 4.5','8','4878725689','cobach@gmail.com','330',379),(4,'PREPA RIOVERDE','ESCANDON ','43','4878725689','PREPA@GMAIL.COM','640',392);
/*!40000 ALTER TABLE `esc_escuela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esc_institucion`
--

DROP TABLE IF EXISTS `esc_institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esc_institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `director` varchar(50) NOT NULL,
  `subdirector` varchar(50) NOT NULL,
  `logo_sep` varchar(500) NOT NULL,
  `logo_ins` varchar(500) NOT NULL,
  `CVE_LOC` int(11) NOT NULL,
  `logo_inf1` varchar(500) NOT NULL,
  `logo_inf2` varchar(500) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esc_institucion`
--

LOCK TABLES `esc_institucion` WRITE;
/*!40000 ALTER TABLE `esc_institucion` DISABLE KEYS */;
INSERT INTO `esc_institucion` VALUES (1,'TECNOLOGICO DE RIOVERDE','CARR. RV SAN CIRO','4878716161','4878716161','MA. MAGDALENA GUERREO MARTINEZ','FERNANDO MENDOZA QUINTERO','silueta.gif','AngularJS_Banner.jpg',1,'','');
/*!40000 ALTER TABLE `esc_institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gen_estados`
--

DROP TABLE IF EXISTS `gen_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_estados` (
  `CVE_ENT` varchar(2) NOT NULL,
  `NOM_ENT` varchar(110) NOT NULL,
  `NOM_ABR` varchar(32) NOT NULL,
  PRIMARY KEY (`CVE_ENT`),
  KEY `CVE_ENT` (`CVE_ENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gen_estados`
--

LOCK TABLES `gen_estados` WRITE;
/*!40000 ALTER TABLE `gen_estados` DISABLE KEYS */;
INSERT INTO `gen_estados` VALUES ('01','AGUASCALIENTES','AGS.'),('02','BAJA CALIFORNIA','BC'),('03','BAJA CALIFORNIA SUR','BCS'),('04','CAMPECHE','CAMP.'),('05','COAHUILA DE ZARAGOZA','COAH.'),('06','COLIMA','COL.'),('07','CHIAPAS','CHIS.'),('08','CHIHUAHUA','CHIH.'),('09','DISTRITO FEDERAL','DF'),('10','DURANGO','DGO.'),('11','GUANAJUATO','GTO.'),('12','GUERRERO','GRO.'),('13','HIDALGO','HGO.'),('14','JALISCO','JAL.'),('15','MEXICO','MEX.'),('16','MICHOACAN DE OCAMPO','MICH.'),('17','MORELOS','MOR.'),('18','NAYARIT','NAY.'),('19','NUEVO LEON','NL'),('20','OAXACA','OAX.'),('21','PUEBLA','PUE.'),('22','QUERETARO','QRO.'),('23','QUINTANA ROO','Q. ROO'),('24','SAN LUIS POTOSI','SLP'),('25','SINALOA','SIN.'),('26','SONORA','SON.'),('27','TABASCO','TAB.'),('28','TAMAULIPAS','TAMPS.'),('29','TLAXCALA','TLAX.'),('30','VERACRUZ DE IGNACIO DE LA LLAVE','VER.'),('31','YUCATAN','YUC.'),('32','ZACATECAS','ZAC.');
/*!40000 ALTER TABLE `gen_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gen_localidades`
--

DROP TABLE IF EXISTS `gen_localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_localidades` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CVE_ENT` varchar(2) NOT NULL,
  `CVE_MUN` varchar(3) NOT NULL,
  `CVE_LOC` varchar(4) NOT NULL,
  `NOM_LOC` varchar(110) NOT NULL,
  `AMBITO` varchar(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `CVE_LOC` (`CVE_LOC`),
  KEY `CVE_MUN` (`CVE_MUN`),
  KEY `CVE_ENT` (`CVE_ENT`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gen_localidades`
--

LOCK TABLES `gen_localidades` WRITE;
/*!40000 ALTER TABLE `gen_localidades` DISABLE KEYS */;
INSERT INTO `gen_localidades` VALUES (1,'01','001','0001','AGUASCALIENTES','U'),(2,'01','001','0094','GRANJA ADELITA','R'),(3,'01','001','0096','AGUA AZUL','R'),(4,'01','001','0100','RANCHO ALEGRE','R'),(5,'01','001','0102','LOS ARBOLITOS [RANCHO]','R'),(6,'01','001','0104','ARDILLAS DE ABAJO (LAS ARDILLAS)','R'),(7,'01','001','0106','ARELLANO','R'),(8,'01','001','0112','BAJIO LOS VAZQUEZ','R'),(9,'01','001','0113','BAJIO DE MONTORO','R'),(10,'01','001','0114','RESIDENCIAL SAN NICOLAS [BAÑOS LA CANTERA]','R'),(11,'01','001','0120','BUENAVISTA DE PE¥UELAS','R'),(12,'01','001','0121','CABECITA 3 MARIAS (RANCHO NUEVO)','R'),(13,'01','001','0125','CA¥ADA GRANDE DE COTORINA','R'),(14,'01','001','0126','CA¥ADA HONDA [ESTACION]','R'),(15,'01','001','0127','LOS CA¥OS','R'),(16,'01','001','0128','EL CARI¥AN','R'),(17,'01','001','0129','EL CARMEN [GRANJA]','R'),(18,'01','001','0135','EL CEDAZO (CEDAZO DE SAN ANTONIO)','R'),(19,'01','001','0138','CENTRO DE ARRIBA (EL TARAY)','R'),(20,'01','001','0139','CIENEGUILLA (LA LUMBRERA)','R'),(21,'01','001','0141','COBOS','R'),(22,'01','001','0144','EL COLORADO (EL SOYATAL)','R'),(23,'01','001','0146','EL CONEJAL','R'),(24,'01','001','0157','COTORINA DE ABAJO','R'),(25,'01','001','0162','COYOTES','R'),(26,'01','001','0166','LA HUERTA (LA CRUZ)','R'),(27,'01','001','0170','CUAUHTEMOC (LAS PALOMAS)','R'),(28,'01','001','0171','LOS CUERVOS (LOS OJOS DE AGUA)','R'),(29,'01','001','0172','SAN JOSE [GRANJA]','R'),(30,'01','001','0176','LA CHIRIPA','R'),(31,'01','001','0182','DOLORES','R'),(32,'01','001','0183','LOS DOLORES','R'),(33,'01','001','0190','EL DURAZNILLO','R'),(34,'01','001','0191','LOS DURON','R'),(35,'01','001','0197','LA ESCONDIDA','R'),(36,'01','001','0201','BRANDE VIN [BODEGAS]','R'),(37,'01','001','0207','VALLE REDONDO','R'),(38,'01','001','0209','LA FORTUNA','R'),(39,'01','001','0212','LOMAS DEL GACHUPIN','R'),(40,'01','001','0213','EL CARMEN (GALLINAS GÜERAS) [RANCHO]','R'),(41,'01','001','0216','LA GLORIA','R'),(42,'01','001','0226','HACIENDA NUEVA','R'),(43,'01','001','0227','LA HACIENDITA (LA ESPERANZA)','R'),(44,'01','001','0228','LA HERRADA','R'),(45,'01','001','0230','DON ABRAHAM [RANCHO]','R'),(46,'01','001','0231','PUERTA DE LOS HOYOS','R'),(47,'01','001','0236','LAS JABONERAS','R'),(48,'01','001','0237','JALTOMATE','R'),(49,'01','001','0239','GENERAL JOSE MARIA MORELOS Y PAVON (CA¥ADA HONDA)','U'),(50,'01','001','0253','LOS LIRIOS','R'),(51,'01','001','0256','LA LOMA DE LOS NEGRITOS','R'),(52,'01','001','0265','EL MALACATE','R'),(53,'01','001','0270','LA MASCOTA','R'),(54,'01','001','0272','MATAMOROS','R'),(55,'01','001','0279','EL MIRADOR','R'),(56,'01','001','0280','SAN JOSE','R'),(57,'01','001','0283','EL MOLINO','R'),(58,'01','001','0285','MONTORO','R'),(59,'01','001','0291','LOS NEGRITOS','R'),(60,'01','001','0292','EL NIAGARA','R'),(61,'01','001','0293','NORIAS DE OJOCALIENTE','U'),(62,'01','001','0296','EL OCOTE','R'),(63,'01','001','0297','COMUNIDAD EL ROCIO','R'),(64,'01','001','0309','LAS PALOMAS','R'),(65,'01','001','0315','PE¥UELAS (EL CIENEGAL)','R'),(66,'01','001','0321','PIEDRAS CHINAS','R'),(67,'01','001','0329','PRESA DE GUADALUPE','R'),(68,'01','001','0336','SOLEDAD DE ARRIBA','R'),(69,'01','001','0340','LA PUERTA (GRANJAS CARI¥AN)','R'),(70,'01','001','0345','EL REFUGIO DE PE¥UELAS','R'),(71,'01','001','0347','EL REFUGIO I','R'),(72,'01','001','0353','EL RODEO','R'),(73,'01','001','0355','EL SALTO DE LOS SALADO','R'),(74,'01','001','0357','NORIAS DEL PASO HONDO','U'),(75,'01','001','0358','SAN AGUSTIN','R'),(76,'01','001','0362','GRANJA SAN ANTONIO','R'),(77,'01','001','0363','GRANJA SAN ANTONIO','R'),(78,'01','001','0366','EJIDO SAN ANTONIO DE LOS PEDROZA','R'),(79,'01','001','0367','SAN ANTONIO DE PE¥UELAS','R'),(80,'01','001','0370','SAN FELIPE [VI¥EDOS]','R'),(81,'01','001','0379','SAN IGNACIO','R'),(82,'01','001','0387','GRANJA SAN JOSE','R'),(83,'01','001','0388','SAN JOSE DE LA ESPERANZA','R'),(84,'01','001','0389','SAN JOSE DE LA ORDE¥A','R'),(85,'01','001','0401','GRANJA SAN LUIS','R'),(86,'01','001','0405','SAN MARTIN (LA CANTERA)','R'),(87,'01','001','0406','SAN MIGUEL','R'),(88,'01','001','0407','SAN NICOLAS','R'),(89,'01','001','0408','SAN PASCUAL','R'),(90,'01','001','0410','SAN PEDRO CIENEGUILLA','R'),(91,'01','001','0411','SAN RAFAEL I','R'),(92,'01','001','0421','SANTA CRUZ DE LA PRESA','R'),(93,'01','001','0422','SANTA CRUZ DE LA PRESA (LA TLACUACHA)','R'),(94,'01','001','0426','SANTA GERTRUDIS','R'),(95,'01','001','0429','SANTA MARIA DE GALLARDO','R'),(96,'01','001','0432','SANTA TERESA','R'),(97,'01','001','0437','SOLEDAD DE ABAJO','R'),(98,'01','001','0440','LA SOLEDAD','R'),(99,'01','001','0444','EL TANQUE DE LOS JIMENEZ','R'),(100,'01','001','0456','TRES CRUCES','R'),(101,'01','001','0461','TANQUE EL TRIGO','R'),(102,'01','001','0466','EL TURICATE','R'),(103,'01','001','0476','LA VICTORIA','R'),(104,'01','001','0479','VILLA LICENCIADO JESUS TERAN (CALVILLITO)','U'),(105,'01','001','0480','VI¥EDOS AGUASCALIENTES','R'),(106,'01','001','0481','VI¥EDOS CUAUHTEMOC (CHURUBUSCO)','R'),(107,'01','001','0492','VI¥EDOS SANTA MONICA','R'),(108,'01','001','0497','LAS ANIMAS','R'),(109,'01','001','0506','LA ADEME','R'),(110,'01','001','0509','LA AHUJA (AGUJA)','R'),(111,'01','001','0513','ARROYO HONDO','R'),(112,'01','001','0514','ASTURIAS','R'),(113,'01','001','0519','BARANDALES DE SAN JOSE','R'),(114,'01','001','0526','EL CARDON','R'),(115,'01','001','0531','EL CENTAVITO 2','R'),(116,'01','001','0540','CHOMITE','R'),(117,'01','001','0541','CIUDAD DE LOS NI¥OS','R'),(118,'01','001','0543','SAN JOSE DEL MONTE (LAS PETACAS)','R'),(119,'01','001','0547','LA CONGOJA','R'),(120,'01','001','0548','EL HOTELITO','R'),(121,'01','001','0555','CUERNAVACA','R'),(122,'01','001','0558','LA CUEVA DE LOS PERICOS (CAITAIME)','R'),(123,'01','001','0569','LOS PARGAS [RANCHO]','R'),(124,'01','001','0572','LA ESPERANZA','R'),(125,'01','001','0575','EX-HACIENDA DE AGOSTADERITO','R'),(126,'01','001','0576','EX-HACIENDA DE MONTORO','R'),(127,'01','001','0582','EL FRESNO (LAS NORIAS DE SAN BARTOLO)','R'),(128,'01','001','0583','EL GAVILAN','R'),(129,'01','001','0584','EL GIGANTE (ARELLANO)','R'),(130,'01','001','0587','GRANJA DE JESUS','R'),(131,'01','001','0590','RANCHO GALVAN','R'),(132,'01','001','0593','INTERPEC SAN MARCOS','R'),(133,'01','001','0597','EL GUARDA','R'),(134,'01','001','0602','RANCHO SAN FELIPE','R'),(135,'01','001','0605','EL JAGÜEY','R'),(136,'01','001','0607','LA JOSEFINA','R'),(137,'01','001','0609','LAGUNA VERDE','R'),(138,'01','001','0610','LAGUNAS CUATAS','R'),(139,'01','001','0611','EL BRAMADERO','R'),(140,'01','001','0614','EL LATIFUNDIO','R'),(141,'01','001','0617','LOMA BLANCA','R'),(142,'01','001','0620','EL LUCERO DE LA CRUZ','R'),(143,'01','001','0621','EL LUCERO','R'),(144,'01','001','0631','MARISOL','R'),(145,'01','001','0632','LA MEDIA LUNA','R'),(146,'01','001','0636','RANCHO LEGENDARIO','R'),(147,'01','001','0637','EL MIRADOR','R'),(148,'01','001','0638','EL MIRASOL','R'),(149,'01','001','0639','EL MITOTE','R'),(150,'01','001','0640','EL MOJON','R'),(151,'01','001','0647','LA NORIA (SAN NICOLAS DE ARRIBA)','R'),(152,'01','001','0648','NORIAS DE CEDAZO (CEDAZO NORIAS DE MONTORO)','R'),(153,'01','001','0651','OJO DE AGUA DE PALMITAS','R'),(154,'01','001','0652','PLAYAS DE GUADALUPE','R'),(155,'01','001','0656','PASO HONDO','R'),(156,'01','001','0657','LA PERLA','R'),(157,'01','001','0658','LA PETAQUILLA (EL MILAGRO)','R'),(158,'01','001','0659','LOMAS DEL PICACHO','R'),(159,'01','001','0665','EL POTRERITO','R'),(160,'01','001','0667','EL POTRERO NUEVO','R'),(161,'01','001','0668','SAN JOSE POZO BRAVO HORMIGUERO','R'),(162,'01','001','0682','LAS MERCEDES [RANCHO]','R'),(163,'01','001','0694','EL RUBIO','R'),(164,'01','001','0698','SAL SI PUEDES','R'),(165,'01','001','0701','SAN ANTONIO PRIMERO DE LOS PEDROZA [CONGREGACION]','R'),(166,'01','001','0703','SAN BARTOLO','R'),(167,'01','001','0707','CONDOMINIO SAN GERARDO','R'),(168,'01','001','0716','SAN MIGUELITO DE ABAJO','R'),(169,'01','001','0720','SAN NICOLAS DE ARRIBA','R'),(170,'01','001','0726','SANTA CLARA','R'),(171,'01','001','0732','SANTA TERESA [GRANJA]','R'),(172,'01','001','0735','EL SOCORRO','R'),(173,'01','001','0737','EL TACON','R'),(174,'01','001','0742','TANQUE DE GUADALUPE','R'),(175,'01','001','0747','EL TEPETATE','R'),(176,'01','001','0751','LA TRINIDAD','R'),(177,'01','001','0753','EL TROPEZON','R'),(178,'01','001','0755','ASOCIACION LOCAL GANADERA DE AGUASCALIENTES (CERRO DEL NIAGARA)','R'),(179,'01','001','0759','ESPERANZA [RANCHO]','R'),(180,'01','001','0764','SAN FRANCISCO DEL ARENAL','R'),(181,'01','001','0768','VISTA ALEGRE I (BELLA VISTA)','R'),(182,'01','001','0769','VISTA ALEGRE II','R'),(183,'01','001','0770','VISTA ALEGRE','R'),(184,'01','001','0772','SAN PASCUAL [RANCHO]','R'),(185,'01','001','0782','GRANJA PUENTE','R'),(186,'01','001','0784','GRANJA ELSA','R'),(187,'01','001','0789','LAS VIBORAS','R'),(188,'01','001','0790','CASAS BLANCAS','R'),(189,'01','001','0792','EL CHIFLIDO','R'),(190,'01','001','0793','LOS HERNANDEZ','R'),(191,'01','001','0795','EL RANCHITO (EL MOCHO)','R'),(192,'01','001','0815','LOS BARROSO','R'),(193,'01','001','0816','SAN JOSE DE BUENAVISTA','R'),(194,'01','001','0862','CIENEGUILLA (LA HACIENDA)','R'),(195,'01','001','0863','COTORINA (COYOTES)','R'),(196,'01','001','0864','LA COTORRA','R'),(197,'01','001','0865','LA COYOTERA','R'),(198,'01','001','0866','MONTORO (MESA DEL SALTO)','R'),(199,'01','001','0867','LA NORIA (PUERTA DEL RIO)','R'),(200,'01','001','0870','PUERTO DE NIETO [RANCHO]','R'),(201,'01','001','0874','LAS TINAJAS','R'),(202,'01','001','0876','ACAPULCO','R'),(203,'01','001','0879','LAS AGUILILLAS','R'),(204,'01','001','0880','LAS AGUILILLAS','R'),(205,'01','001','0882','LOS AMARRADEROS','R'),(206,'01','001','0885','INTERPEC SAN MARCOS','R'),(207,'01','001','0886','EL BAMBU','R'),(208,'01','001','0887','EL BECERRO','R'),(209,'01','001','0888','EL BECERRO (LUCIO GUTIERREZ)','R'),(210,'01','001','0889','BELLA VISTA (EL CORONEL)','R'),(211,'01','001','0890','LA BIZNAGA','R'),(212,'01','001','0891','LOS PAVOREALES','R'),(213,'01','001','0892','LAS BUGAMBILIAS','R'),(214,'01','001','0893','LOS CABLES','R'),(215,'01','001','0894','LAS CABRAS','R'),(216,'01','001','0895','LA CACHUCHA (EL SALERO)','R'),(217,'01','001','0900','LA CAMPOSTELA','R'),(218,'01','001','0901','PLAN DE LA CANALEJA','R'),(219,'01','001','0903','EL CAPIROTE','R'),(220,'01','001','0904','EL CARACOL (LA MESA)','R'),(221,'01','001','0905','RANCHO BENJAMIN CHAVEZ RUIZ','R'),(222,'01','001','0906','CASTILLO FONTENAC','R'),(223,'01','001','0907','EL CATORCE','R'),(224,'01','001','0908','NINGUNO [CENTRO DE READAPTACION DE MINIMA SEGURIDAD]','R'),(225,'01','001','0909','NINGUNO [CENTRO DE ESTUDIOS DIFERENCIADOS]','R'),(226,'01','001','0910','SNTSS [CENTRO DEPORTIVO]','R'),(227,'01','001','0912','NINGUNO [CENTRO DE NEUROPSIQUIATRIA]','R'),(228,'01','001','0914','LAS TRES POTENCIAS','R'),(229,'01','001','0915','SIERRA VIEJA [RANCHO]','R'),(230,'01','001','0917','EL COPETE','R'),(231,'01','001','0918','EL COPETILLO','R'),(232,'01','001','0919','COTORINA DE ALTAMIRA','R'),(233,'01','001','0920','OJO DE AGUA DE PALMITAS SEGUNDA SECCION (LAS CRUCITAS)','R'),(234,'01','001','0921','EL CRUCERO','R'),(235,'01','001','0922','EL CRUCERO DE CALVILLITO','R'),(236,'01','001','0925','LA CHIRIPA','R'),(237,'01','001','0935','LA ESPERANZA','R'),(238,'01','001','0936','SAN CARLOS','R'),(239,'01','001','0938','LA ESTANCIA','R'),(240,'01','001','0939','EX-HACIENDA DE BUENAVISTA','R'),(241,'01','001','0942','LA FLORIDA','R'),(242,'01','001','0943','LA FLORIDA','R'),(243,'01','001','0944','LA FORTUNA (LA HERRADURA)','R'),(244,'01','001','0951','LAS DOS PE¥AS MEYERAS','R'),(245,'01','001','0952','FRACCIONAMIENTO LAURELES DEL SUR','R'),(246,'01','001','0957','LA PALOMA','R'),(247,'01','001','0962','EL CHANGAY','R'),(248,'01','001','0964','LA LUZ [GRANJA]','R'),(249,'01','001','0967','LA PROVIDENCIA [GRANJA]','R'),(250,'01','001','0968','LOS LIRIOS [GRANJA]','R'),(251,'01','001','0969','GRANJA MARIA LUISA','R'),(252,'01','001','0970','GRANJA MARICELA','R'),(253,'01','001','0971','GRANJA SAN FRANCISCO','R'),(254,'01','001','0979','EL HUIZACHAL','R'),(255,'01','001','0980','LAS ISABELES','R'),(256,'01','001','0981','EL REFUGIO','R'),(257,'01','001','0982','LA LAGUNA DE LOS ADOBES','R'),(258,'01','001','0985','LOS LIRIOS','R'),(259,'01','001','0987','EL JARDIN','R'),(260,'01','001','0988','LOMAS DE ARELLANO','R'),(261,'01','001','0992','LOTES DE ARELLANO','R'),(262,'01','001','0996','LAS MARIAS (LAS 3 MARIAS)','R'),(263,'01','001','0997','MARLBORITO','R'),(264,'01','001','0999','LOS MEMBRILLOS','R'),(265,'01','001','1000','MESA DEL SALTO (FRACCION DE MONTORO)','R'),(266,'01','001','1002','LA MESA','R'),(267,'01','001','1003','EL MIRADOR','R'),(268,'01','001','1005','EL MISTERIO','R'),(269,'01','001','1007','EL MOLINO','R'),(270,'01','001','1008','MONTE PRIETO','R'),(271,'01','001','1010','NOCHTLI','R'),(272,'01','001','1011','OJO DE AGUA','R'),(273,'01','001','1012','LOS OLIVOS [GRANJA]','R'),(274,'01','001','1013','LOS ORGANOS','R'),(275,'01','001','1019','EL PARAISO [RANCHO]','R'),(276,'01','001','1020','EL PARAISO','R'),(277,'01','001','1021','EL PIRUL','R'),(278,'01','001','1022','EL PIRUL (EL PIRULITO) [RANCHO]','R'),(279,'01','001','1024','EL PLAN DEL HORNO','R'),(280,'01','001','1025','POCITOS','U'),(281,'01','001','1026','EL POZO','R'),(282,'01','001','1027','POTRERO GRANDE','R'),(283,'01','001','1029','PRESA NUEVA','R'),(284,'01','001','1035','LA PROVIDENCIA','R'),(285,'01','001','1037','LA PUERTA DE LAS ALAZANAS','R'),(286,'01','001','1038','PUERTA DE LOS VIEJITOS','R'),(287,'01','001','1039','CASA BLANCA','R'),(288,'01','001','1041','DOS ARBOLITOS [RANCHO]','R'),(289,'01','001','1043','EL CARMEN [RANCHO]','R'),(290,'01','001','1047','EL VENADO [RANCHO]','R'),(291,'01','001','1048','SAN NICOLAS DE ARRIBA','R'),(292,'01','001','1049','RANCHO JOSE MARIA','R'),(293,'01','001','1050','GRANJAS EX-HACIENDA MONTORO','R'),(294,'01','001','1051','LA ESTRELLA [RANCHO]','R'),(295,'01','001','1052','LA LUZ [RANCHO]','R'),(296,'01','001','1053','LA MANGA [RANCHO]','R'),(297,'01','001','1054','LA MESA','R'),(298,'01','001','1055','LA PRIMAVERA','R'),(299,'01','001','1056','LOS BOYUYOS [RANCHO]','R'),(300,'01','001','1058','EL MITAWA [RANCHO]','R'),(301,'01','001','1059','RANCHO NUEVO','R'),(302,'01','001','1062','RANCHO SAN CARLOS','R'),(303,'01','001','1064','RANCHO SAN JACINTO','R'),(304,'01','001','1065','SAN GERONIMO','R'),(305,'01','001','1066','NINGUNO','R'),(306,'01','001','1067','NINGUNO','R'),(307,'01','001','1070','RANCHO TOPOGIGIO','R'),(308,'01','001','1073','EL REFUGIO II','R'),(309,'01','001','1075','EL RELICARIO','R'),(310,'01','001','1077','LA RINCONADA (LA ESCONDIDA)','R'),(311,'01','001','1080','SAN ISIDRO DE LOS ESPARZA','R'),(312,'01','001','1083','SAN ISIDRO [LA ESTACION]','R'),(313,'01','001','1085','SAN CRISTOBAL','R'),(314,'01','001','1086','SAN NICOLAS DE EN MEDIO','R'),(315,'01','001','1092','SAN JOSE DEL CONO','R'),(316,'01','001','1094','SAN ISIDRO','R'),(317,'01','001','1097','HACIENDA SAN MARCOS [FRACCIONAMIENTO]','R'),(318,'01','001','1098','SAN MARTIN','R'),(319,'01','001','1099','SAN ISIDRO (GRANJA SANTA ANITA)','R'),(320,'01','001','1100','OLINDA [FRACCIONAMIENTO]','R'),(321,'01','001','1101','SAN MIGUEL','R'),(322,'01','001','1102','SAN ANDRES','R'),(323,'01','001','1103','VI¥EDOS SAN FELIPE 2DA. SECCION','R'),(324,'01','001','1104','SAN JUDAS','R'),(325,'01','001','1105','SAN NICOLAS DE LA CANTERA','R'),(326,'01','001','1107','SANTA MARIA DE GALLARDO','R'),(327,'01','001','1109','LA SANTA CRUZ','R'),(328,'01','001','1112','SANTA ELENA','R'),(329,'01','001','1113','SANTA ELENA (TRES PELONAS)','R'),(330,'01','001','1114','SANTA INES','R'),(331,'01','001','1115','SANTA TERESA','R'),(332,'01','001','1116','EL CARMEN','R'),(333,'01','001','1118','SAN AGUSTIN','R'),(334,'01','001','1119','EL SABINO (SAN ROMAN)','R'),(335,'01','001','1120','EL SAUZ AMARILLO','R'),(336,'01','001','1123','EL SALERO','R'),(337,'01','001','1127','SANDOVALES DE ABAJO','R'),(338,'01','001','1128','SANDOVALES DE ARRIBA','R'),(339,'01','001','1131','EL GATO','R'),(340,'01','001','1133','TANQUE DE LA CRUZ','R'),(341,'01','001','1136','LA TIJERA','R'),(342,'01','001','1139','LA TORRE','R'),(343,'01','001','1140','SAN JOSE DE LAS LABORCILLAS (LA CASA DE PIEDRA)','R'),(344,'01','001','1142','LAS TROJES','R'),(345,'01','001','1145','EL VARAL','R'),(346,'01','001','1147','EL COLUMPIO','R'),(347,'01','001','1148','DERIVADOS DE FRUTA','R'),(348,'01','001','1150','VILLA-EGUIA [CENTRO DE CONVENCIONES]','R'),(349,'01','001','1151','VI¥EDOS EL TAJO','R'),(350,'01','001','1152','VI¥EDOS SAN FRANCISCO (LAS COCHINERAS)','R'),(351,'01','001','1157','LAS VIOLETAS','R'),(352,'01','001','1158','LAS VIBORAS','R'),(353,'01','001','1159','VILLA SU','R'),(354,'01','001','1160','GRANJA CLAUDIA','R'),(355,'01','001','1161','EL YERBANIZ','R'),(356,'01','001','1165','AZARCO','R'),(357,'01','001','1166','SAN JOSE DE BUENAVISTA','R'),(358,'01','001','1167','LA CA¥ADA DE LAS HABAS','R'),(359,'01','001','1168','EL CARMEN','R'),(360,'01','001','1170','EL CUIJE','R'),(361,'01','001','1172','EX-HACIENDA DE PE¥UELAS','R'),(362,'01','001','1173','FRACCIONAMIENTO LOMAS DEL SUR','R'),(363,'01','001','1178','GRANJAS FATIMA','R'),(364,'01','001','1179','LOS GUERRERO','R'),(365,'01','001','1180','TRES ELENAS','R'),(366,'01','001','1181','LOMAS DEL GUARDA','R'),(367,'01','001','1182','MESA DEL TEPETATE','R'),(368,'01','001','1183','LOMAS DE NUEVA YORK','R'),(369,'01','001','1184','COYOTILLOS','R'),(370,'01','001','1186','SAN FRANCISQUITO (LOS SALAZAR)','R'),(371,'01','001','1187','SAN JUAN DEL RIO','R'),(372,'01','001','1189','EL SUSPIRO','R'),(373,'01','001','1190','SANTA MARIA','R'),(374,'01','001','1198','EL PORVENIR [GRANJA]','R'),(375,'01','001','1199','GRANJAS QUINTA YOLA','R'),(376,'01','001','2001','LA LAGUNITA','R'),(377,'01','001','2003','SAN MARTIN (EL ZORRILLO)','R'),(378,'01','001','2004','LA NUEVA TERESA','R'),(379,'01','001','2008','EL ZANCUDO','R'),(380,'01','001','2010','EL VERGEL (EL PARAISO)','R'),(381,'01','001','2014','EL ALAMO','R'),(382,'01','001','2015','LA ALCAPARRA','R'),(383,'01','001','2016','AMPLIACION DE CALVILLITO (COLONIA LA HERRADA)','R'),(384,'01','001','2017','AMPLIACION DEL CONEJAL','R'),(385,'01','001','2018','BAJIO DE LOS CARREONES','R'),(386,'01','001','2019','LA SOCIEDAD','R'),(387,'01','001','2020','BUENAVISTA','R'),(388,'01','001','2021','LA CABA¥A','R'),(389,'01','001','2022','LA CALANDRIA','R'),(390,'01','001','2023','CA¥ADA DEL DURAZNILLO','R'),(391,'01','001','2024','CA¥ADA GRANDE','R'),(392,'01','001','2025','EL CAPIROTE','R'),(393,'01','001','2026','EL OCAL (EL CAPIROTE)','R'),(394,'01','001','2028','EL 14','R'),(395,'01','001','2030','GRANJA MARGARITA (VI¥EDOS AGUASCALIENTES)','R'),(396,'01','001','2031','CESPED SAN IGNACIO','R'),(397,'01','001','2032','EL CHAMIZAL','R'),(398,'01','001','2033','LA CHAVE¥A (EL POTRERITO)','R'),(399,'01','001','2035','EL CHIFLIDO','R'),(400,'01','001','2036','LA CHIRIPA','R'),(401,'01','001','2037','EL CHORIZO','R'),(402,'01','001','2038','GRANJA LLAMAS','R'),(403,'01','001','2039','PICACHO [CLUB DE GOLF]','R'),(404,'01','001','2040','SANTA MONICA [CLUB HIPICO]','R'),(405,'01','001','2041','EL RELICARIO','R'),(406,'01','001','2043','EL CONO','R'),(407,'01','001','2044','EL COPETILLO','R'),(408,'01','001','2045','EL COPETILLO CHICO (LA MISERIA)','R'),(409,'01','001','2046','LOS CORALES','R'),(410,'01','001','2048','LOS COYOTES','R'),(411,'01','001','2049','LA CRUZ','R'),(412,'01','001','2050','CUMBRES III','R'),(413,'01','001','2051','EL DOMINADO (EL RELICARIO)','R'),(414,'01','001','2053','LOS DURON I','R'),(415,'01','001','2054','EJIDO LOS NEGRITOS','R'),(416,'01','001','2056','EMILIANO ZAPATA','R'),(417,'01','001','2058','LA ESCUADRA','R'),(418,'01','001','2059','EL ESFUERZO','R'),(419,'01','001','2061','VILLA PARAISO','R'),(420,'01','001','2063','EX-HACIENDA DE SAN IGNACIO','R'),(421,'01','001','2064','FRUTAS CONCENTRADAS','R'),(422,'01','001','2065','VALLE DE SAN IGNACIO (EL FILSO)','R'),(423,'01','001','2066','LA FORTUNA','R'),(424,'01','001','2067','RANCHO CAZADORES','R'),(425,'01','001','2068','GRANJA BRENDA','R'),(426,'01','001','2069','GRANJA CHELY','R'),(427,'01','001','2071','GRANJA DUARTE','R'),(428,'01','001','2072','EL CONEJAL [GRANJA]','R'),(429,'01','001','2073','GRANJA GEMELAS','R'),(430,'01','001','2074','GRANJA GUADALUPE','R'),(431,'01','001','2075','LA TRINIDAD (LA LUCITA) [GRANJA]','R'),(432,'01','001','2076','LAS GRANJAS (SANTA ELENA)','R'),(433,'01','001','2077','GRANJA LAURA ANGELICA','R'),(434,'01','001','2078','GRANJA LETY','R'),(435,'01','001','2080','LOS JACALITOS [GRANJA]','R'),(436,'01','001','2081','GRANJA LUPITA','R'),(437,'01','001','2083','GRANJA MARIANA','R'),(438,'01','001','2084','GRANJA PAULA CECILIA','R'),(439,'01','001','2085','GRANJA ROSALES','R'),(440,'01','001','2086','GRANJA SAN ANTONIO','R'),(441,'01','001','2087','GRANJA SAN JOSE','R'),(442,'01','001','2088','GRANJA SANTA ELENA','R'),(443,'01','001','2089','GRANJA TO¥ITA','R'),(444,'01','001','2090','GRANJA VEJARANO','R'),(445,'01','001','2091','HUERTA MARCELA','R'),(446,'01','001','2092','LAS JARILLAS [RANCHO]','R'),(447,'01','001','2093','LOS JAZMINEZ','R'),(448,'01','001','2094','LOS JIMENEZ','R'),(449,'01','001','2095','K-10','R'),(450,'01','001','2096','LA LABORCILLA','R'),(451,'01','001','2097','COLONIA VETERANOS DE LA REVOLUCION','R'),(452,'01','001','2098','LOS LAURELES','R'),(453,'01','001','2099','LOS LAURELES','R'),(454,'01','001','2100','LA LOBERA','R'),(455,'01','001','2101','NINGUNO','R'),(456,'01','001','2103','LA SALADA','R'),(457,'01','001','2104','LA ESPERANZA','R'),(458,'01','001','2105','NINGUNO','R'),(459,'01','001','2106','NINGUNO','R'),(460,'01','001','2107','SAN FRANCISCO DE LA CRUZ','R'),(461,'01','001','2108','NINGUNO','R'),(462,'01','001','2109','NINGUNO','R'),(463,'01','001','2111','NINGUNO','R'),(464,'01','001','2112','MONTE PRIETO','R'),(465,'01','001','2114','LA RINCONADA','R'),(466,'01','001','2115','NINGUNO','R'),(467,'01','001','2117','RANCHO VIEJO','R'),(468,'01','001','2118','NINGUNO','R'),(469,'01','001','2119','NINGUNO','R'),(470,'01','001','2120','NINGUNO','R'),(471,'01','001','2122','NINGUNO','R'),(472,'01','001','2123','REFUGIO DE LAS COTORINAS [RANCHO]','R'),(473,'01','001','2128','EJIDO EL CENTINELA','R'),(474,'01','001','2129','LA DISCORDIA','R'),(475,'01','001','2130','NINGUNO','R'),(476,'01','001','2131','LA LOMA DEL BLANCO','R'),(477,'01','001','2132','COLONIA LA PERLA','R'),(478,'01','001','2133','LOMAS SAN JUDAS TADEO','R'),(479,'01','001','2134','EL MAGUEY (LA CHAVE¥A)','R'),(480,'01','001','2135','EL MAISTRUJENIO','R'),(481,'01','001','2136','LA MANGA DEL TORO','R'),(482,'01','001','2138','LOMA DEL MEZQUITE','R'),(483,'01','001','2139','MINERALES GANADEROS','R'),(484,'01','001','2140','LA MINITA','R'),(485,'01','001','2141','EL MIRADOR','R'),(486,'01','001','2143','LAS MORAS','R'),(487,'01','001','2144','LOS NARANJITOS','R'),(488,'01','001','2145','OJOS DE AGUA LA ESTANCIA','R'),(489,'01','001','2146','LOS PALOMOS','R'),(490,'01','001','2147','EL PLAN DE LAGOS','R'),(491,'01','001','2148','DON MONICO [GRANJA]','R'),(492,'01','001','2150','EL PLAN DEL JARAL','R'),(493,'01','001','2151','PLAYAS DE GUADALUPE','R'),(494,'01','001','2152','POTRERO DEL MOLINO','R'),(495,'01','001','2154','PROHICO','R'),(496,'01','001','2155','LA PROVIDENCIA','R'),(497,'01','001','2156','LA PROVIDENCIA (GRANJA MARY CHUY)','R'),(498,'01','001','2157','LA PURISIMA','R'),(499,'01','001','2159','RANCHO ALEGRE NUMERO QUINCE','R'),(500,'01','001','2160','LA LOMA [RANCHO]','R'),(501,'01','001','2161','FRACCIONAMIENTO LOS ANGELES','R'),(502,'01','001','2162','LAS JABONERAS','R'),(503,'01','001','2163','RANCHO DEL CARMEN','R'),(504,'01','001','2164','DO¥A MARIA [RANCHO]','R'),(505,'01','001','2165','EL CHIFLIDO [RANCHO]','R'),(506,'01','001','2166','EL COYOTE [RANCHO]','R'),(507,'01','001','2167','EL DURAZNILLO [RANCHO]','R'),(508,'01','001','2168','EL GIGANTE [RANCHO]','R'),(509,'01','001','2169','LA RINCONADA (LA ESCONDIDA)','R'),(510,'01','001','2170','EL NIAGARA [RANCHO]','R'),(511,'01','001','2172','EL QUIHUIHUI [RANCHO]','R'),(512,'01','001','2173','EL REFUGIO NUMERO DOS [RANCHO]','R'),(513,'01','001','2174','EL ZAPOTE [RANCHO]','R'),(514,'01','001','2175','LA CHIRIPA [RANCHO]','R'),(515,'01','001','2176','SAN MIGUELITO DE ARRIBA [RANCHO]','R'),(516,'01','001','2177','LA HERRADURA [RANCHO]','R'),(517,'01','001','2178','LA LOMA [RANCHO]','R'),(518,'01','001','2179','LA PALMA [RANCHO]','R'),(519,'01','001','2180','LA SOLEDAD [RANCHO]','R'),(520,'01','001','2181','RANCHO NUEVO 1880','R'),(521,'01','001','2182','PORVENIR [RANCHO]','R'),(522,'01','001','2184','RANCHO SAN MARTIN','R'),(523,'01','001','2185','RANCHO SAN MARTIN','R'),(524,'01','001','2186','RANCHO SANTA TERESA','R'),(525,'01','001','2187','LA LUZ [RANCHO]','R'),(526,'01','001','2189','GRANJA SAN NICOLAS','R'),(527,'01','001','2190','LA LAGUNA DEL PEDERNAL','R'),(528,'01','001','2191','EL REBOZO','R'),(529,'01','001','2193','EL RODEO','R'),(530,'01','001','2194','EL ROSARIO DE MARIA','R'),(531,'01','001','2196','LA SALADA','R'),(532,'01','001','2197','EL SALERO','R'),(533,'01','001','2198','SAN ANTONIO','R'),(534,'01','001','2199','SAN CRISTOBAL','R'),(535,'01','001','2200','SAN FRANCISCO','R'),(536,'01','001','2202','SAN GABRIEL','R'),(537,'01','001','2203','SAN ISIDRO','R'),(538,'01','001','2205','SAN JOSE DEL REFUGIO','R'),(539,'01','001','2206','SAN MIGUELITO','R'),(540,'01','001','2207','SAN MIGUELITO DE ABAJO','R'),(541,'01','001','2208','SANTA ISABEL (EL TAJITO)','R'),(542,'01','001','2209','SANTA RITA','R'),(543,'01','001','2210','SANTA ROSA','R'),(544,'01','001','2211','SANTA TERESA','R'),(545,'01','001','2212','EL PUENTE [GRANJA]','R'),(546,'01','001','2213','EL SAUZ DE LOS GARCIA','R'),(547,'01','001','2214','EL SOCORRO','R'),(548,'01','001','2215','EL TANQUE','R'),(549,'01','001','2217','TANQUE LOS CARRIZOS','R'),(550,'01','001','2218','TARTRATOS MEXICANOS','R'),(551,'01','001','2219','AGUASCALIENTES [TERMO REFRIGERADOS]','R'),(552,'01','001','2220','EL AUSENTE (LA TIGRA)','R'),(553,'01','001','2221','LAS TROJES (LAS JABONERAS)','R'),(554,'01','001','2223','URBACON','R'),(555,'01','001','2225','EL QUELITE [VI¥EDOS]','R'),(556,'01','001','2226','NINGUNO [VIVERO]','R'),(557,'01','001','2227','EL ZANCUDO','R'),(558,'01','001','2228','CA¥ADA DEL TABACO','R'),(559,'01','001','2229','LOMA DEL MEZQUITE','R'),(560,'01','001','2230','MAIZ PRIETO','R'),(561,'01','001','2231','SAN JUANITO (LOS LOPEZ)','R'),(562,'01','001','2232','RANCHO SAN JOSE','R'),(563,'01','001','2234','AMPLIACION DEL EJIDO EL PUERTECITO','R'),(564,'01','001','2236','LOS PAVOS [GRANJA]','R'),(565,'01','001','2237','GRANJA SAN ANTONIO','R'),(566,'01','001','2239','ARIZONA RANCH','R'),(567,'01','001','2243','LICONSA [CENTRO DE RECRIA]','R'),(568,'01','001','2244','EL POTRERO','R'),(569,'01','001','2245','GRANJA MARCELA','R'),(570,'01','001','2246','LOS HALCONES','R'),(571,'01','001','2247','GRANJA ANITA','R'),(572,'01','001','2249','SANTA RITA','R'),(573,'01','001','2251','EL SOCORRO','R'),(574,'01','001','2253','LA PRIMAVERA','R'),(575,'01','001','2255','LOS PAVOREALES','R'),(576,'01','001','2256','LOS PLACERES','R'),(577,'01','001','2257','NINGUNO [PRODUCTORA DE SEMILLAS Y CEREALES]','R'),(578,'01','001','2258','SAN MARTIN','R'),(579,'01','001','2259','VI¥EDOS VALLE REDONDO','R'),(580,'01','001','2260','BELLAVISTA','R'),(581,'01','001','2261','EL CENTINELA','R'),(582,'01','001','2262','CENTRO DE PARGA','R'),(583,'01','001','2263','CERESO (PARA VARONES Y MUJERES)','R'),(584,'01','001','2264','CENTRO DE REEDUCACION PARA MENORES','R'),(585,'01','001','2265','RINCONADA [CLUB]','R'),(586,'01','001','2266','LOS COCUYOS','R'),(587,'01','001','2268','COLONIA SALTO DE MONTORO','R'),(588,'01','001','2269','EL COPETILLO','R'),(589,'01','001','2270','EL COPETILLO CHICO','R'),(590,'01','001','2271','EL FUTURO','R'),(591,'01','001','2272','EJIDO LOS NEGRITOS','R'),(592,'01','001','2273','EJIDO PE¥UELAS','R'),(593,'01','001','2275','ENTRADA A COTORINA','R'),(594,'01','001','2276','FRACCION DE COTORINA','R'),(595,'01','001','2278','LOS GIRASOLES','R'),(596,'01','001','2279','EL HUIZACHE [GRANJA]','R'),(597,'01','001','2280','EL MOLINO [GRANJA]','R'),(598,'01','001','2281','LA PRIMAVERA [GRANJA]','R'),(599,'01','001','2282','LAS PLAYAS [GRANJA]','R'),(600,'01','001','2283','GRANJA LUCY','R'),(601,'01','001','2284','GRANJA SAN NICOLAS','R'),(602,'01','001','2285','COTORINA [GRANJA]','R'),(603,'01','001','2287','NINGUNO','R'),(604,'01','001','2288','NINGUNO','R'),(605,'01','001','2290','NINGUNO','R'),(606,'01','001','2291','NINGUNO','R'),(607,'01','001','2292','NINGUNO','R'),(608,'01','001','2293','NINGUNO','R'),(609,'01','001','2294','EL ARQUITO','R'),(610,'01','001','2295','LOMA EL CASCARON','R'),(611,'01','001','2297','TROJES DE ALONSO','R'),(612,'01','001','2298','SORAYAMA','R'),(613,'01','001','2299','LA CABA¥A','R'),(614,'01','001','2300','EL POZO','R'),(615,'01','001','2301','LOMA ALTA EL PARAISO','R'),(616,'01','001','2302','EL LLANO','R'),(617,'01','001','2303','LA MORADA','R'),(618,'01','001','2304','EL OCAL','R'),(619,'01','001','2305','LA PALMA DOS','R'),(620,'01','001','2306','EL PARAISO','R'),(621,'01','001','2308','EL POLVORIN (MIRADOR TV AZTECA)','R'),(622,'01','001','2309','POZO EL TRIGO','R'),(623,'01','001','2310','LA PRIMAVERA [RANCHO]','R'),(624,'01','001','2311','PROCON','R'),(625,'01','001','2312','LA PUERTA AL PARAISO','R'),(626,'01','001','2313','QUINTA LA LUNA','R'),(627,'01','001','2314','QUINTA ROSALIA','R'),(628,'01','001','2315','QUINTA LA ESPERANZA','R'),(629,'01','001','2316','RANCHO AURORA','R'),(630,'01','001','2317','RANCHO CORONITA','R'),(631,'01','001','2318','CIELO GRANDE','R'),(632,'01','001','2319','RANCHO DE ROGELIO','R'),(633,'01','001','2320','EL PICACHO [RANCHO]','R'),(634,'01','001','2321','LOS CORDOVA [RANCHO]','R'),(635,'01','001','2322','RANCHO MARGARITAS','R'),(636,'01','001','2323','RANCHO SAN JOSE DEL MONTE','R'),(637,'01','001','2324','SANTA FE [RANCHO]','R'),(638,'01','001','2325','EL REFUGIO','R'),(639,'01','001','2326','SAN ANTONIO','R'),(640,'01','001','2328','SAN IGNACIO II Y III','R'),(641,'01','001','2329','SAN JOSE','R'),(642,'01','001','2330','SAN MIGUELITO','R'),(643,'01','001','2331','HARO','R'),(644,'01','001','2332','LOS TRES CUARTOS','R'),(645,'01','001','2333','GRANJA DE LOURDES','R'),(646,'01','001','2334','XAROPA','R'),(647,'01','001','2335','LA CABA¥A ROJA','R'),(648,'01','001','2336','LA CANTERITA','R'),(649,'01','001','2337','GRANJA CHELA','R'),(650,'01','001','2338','GRANJA FRANCIS','R'),(651,'01','001','2339','GRANJA MARISELA (LA CARRETILLA)','R'),(652,'01','001','2341','EL MAGUEY','R'),(653,'01','001','2342','LA GAVIOTA [RANCHO]','R'),(654,'01','001','2343','LA PUERTA NUMERO 5 [RANCHO]','R'),(655,'01','001','2344','LOS ALAMOS [RANCHO]','R'),(656,'01','001','2345','SAN JOSE','R'),(657,'01','001','2346','LOS VALDEZ','R'),(658,'01','001','2349','LOS APALILLOS','R'),(659,'01','001','2350','CA¥ADA DE LOS CABALLOS','R'),(660,'01','001','2351','FLORIDA RANCH','R'),(661,'01','001','2352','EJIDO NORIAS DE PASO HONDO (LA LOMITA)','R'),(662,'01','001','2353','EL RANCHITO','R'),(663,'01','001','2354','NINGUNO','R'),(664,'01','001','2355','EL MIRASOL','R'),(665,'01','001','2356','LOS SANCHEZ','R'),(666,'01','001','2357','LOS TRONCONES','R'),(667,'01','001','2359','GRANJA LUPITA','R'),(668,'01','001','2361','EL RODEO','R'),(669,'01','001','2362','ANEXO AL PALOMINO II','R'),(670,'01','001','2363','ANEXO AL PALOMINO','R'),(671,'01','001','2364','LA SOLEDAD [RANCHO]','R'),(672,'01','001','2365','EL ROCIO','R'),(673,'01','001','2367','VILLAS DEL MEDITERRANEO','R'),(674,'01','001','2368','FRACCIONAMIENTO CAMPESTRE EL POTRERILLO','R'),(675,'01','001','2369','FRACCIONAMIENTO SAN SEBASTIAN','R'),(676,'01','001','2371','FRACCIONAMIENTO CARTAGENA','R'),(677,'01','001','2373','ADAPTACIONES Y PAILERIA CERVANTES','R'),(678,'01','001','2374','EL ARBOL','R'),(679,'01','001','2375','EL CENTINELA','R'),(680,'01','001','2376','COLONIA CHE GUEVARA','R'),(681,'01','001','2377','COSTA CHICA','R'),(682,'01','001','2378','LAS DURAZNERAS','R'),(683,'01','001','2379','EDEN LOS SABINOS','R'),(684,'01','001','2380','EJIDO VENUSTIANO CARRANZA','R'),(685,'01','001','2381','FRACCIONAMIENTO VISTA HERMOSA','R'),(686,'01','001','2382','AMARILLO [GRANJA]','R'),(687,'01','001','2383','LA LAGUNA [GRANJA]','R'),(688,'01','001','2384','LA SALADA [GRANJA]','R'),(689,'01','001','2385','LA TRINIDAD [GRANJA]','R'),(690,'01','001','2386','LAS PALMAS [GRANJA]','R'),(691,'01','001','2387','NINGUNO','R'),(692,'01','001','2388','NINGUNO','R'),(693,'01','001','2389','EL MAGUEY','R'),(694,'01','001','2390','EL PARAISO','R'),(695,'01','001','2391','EL PASTIZAL','R'),(696,'01','001','2393','RANCHO ALEGRE','R'),(697,'01','001','2394','CA¥ADA DE LAS PALMAS [RANCHO]','R'),(698,'01','001','2395','RANCHO DE LA CIUDAD DE LOS NI¥OS','R'),(699,'01','001','2396','EL CIERVO [RANCHO]','R'),(700,'01','001','2397','LA ROCA [RANCHO]','R'),(701,'01','001','2398','LOS BAJIOS DE SAN BARTOLO [RANCHO]','R'),(702,'01','001','2399','PE¥UELAS [RANCHO]','R'),(703,'01','001','2400','SANTA FE (EL ARQUITO) [RANCHO]','R'),(704,'01','001','2401','SAN JOAQUIN','R'),(705,'01','001','2402','SAN MIGUEL','R'),(706,'01','001','2403','LA TACUACHA','R'),(707,'01','001','2404','LAS TRANCAS','R'),(708,'01','001','2405','AGUASCALIENTES [HIPICO]','R'),(709,'01','001','2406','RANCHO SECO','R'),(710,'01','001','2407','PEDREGAL SAN MIGUEL KILOMETRO 2.5','R'),(711,'01','001','2408','CALVILLITO (BARRIO DE LA ESCUELA)','R'),(712,'01','001','2409','CALVILLITO (COLONIA REVOLUCION)','R'),(713,'01','001','2410','NORIAS DE OJOCALIENTE','R'),(714,'01','001','2411','SAN LUIS GONZAGA','R'),(715,'01','001','2412','LAS MAJADAS','R'),(716,'01','001','2413','CONDOMINIO LAS PLAZAS','R'),(717,'01','001','2414','FRACCIONAMIENTO MONTEBELLO DELLA STANZA','R'),(718,'01','001','2415','FRACCIONAMIENTO PASEOS DE SAN ANTONIO','R'),(719,'01','001','2416','FRACCIONAMIENTO CAMPESTRE BOSQUES DE LAS LOMAS','R'),(720,'01','001','2417','LA CA¥ADA','R'),(721,'01','001','2418','LA CURVA','R'),(722,'01','001','2419','FRACCIONAMIENTO CAMPESTRE ECUESTRE REAL CA¥ADA HONDA','R'),(723,'01','001','2420','EJIDO CA¥ADA HONDA (KILOMETRO 13.5)','R'),(724,'01','001','2421','LA ESCONDIDA','R'),(725,'01','001','2422','EL JANO','R'),(726,'01','001','2423','EL MATORRAL','R'),(727,'01','001','2424','LAS PALOMAS','R'),(728,'01','001','2425','POTRERO LA TOMATINA','R'),(729,'01','001','2426','CONDOMINIO Q CAMPESTRE','R'),(730,'01','001','2427','CONDOMINIO RINCONADA DE SAN IGNACIO','R'),(731,'01','001','2428','CONDOMINIO RUSCELLO','R'),(732,'01','001','2429','EL BAJIO [RANCHO]','R'),(733,'01','001','2430','GRANJAS DEL VALLE','R'),(734,'01','001','2431','NINGUNO','R'),(735,'01','001','2432','NORIAS DE OJOCALIENTE (CABALLO BLANCO)','R'),(736,'01','001','2433','PASEOS DE MICHOACAN','R'),(737,'01','001','2434','LA PRESA DE LA AHUJA [RANCHO]','R'),(738,'01','001','2435','LA PROVIDENCIA DE ARRIBA','R'),(739,'01','001','2436','EL REFUGIO DE SANTO TOMAS [RANCHO]','R'),(740,'01','001','2437','EL SOCORRO (JOSE LOPEZ MEDINA)','R'),(741,'01','001','2438','EL SOYATAL','R'),(742,'01','001','2439','EL TORDILLO','R'),(743,'01','001','2440','VILLA ANTIGUA','R'),(744,'01','001','2441','VILLA GUADALUPE','R'),(745,'01','001','2442','NORIAS DEL PASO HONDO','R'),(746,'01','001','2443','ANDARES [CONDOMINIO]','R'),(747,'01','001','2444','MAYORAZGO SAN CRISTOBAL [CONDOMINIO]','R'),(748,'01','001','2445','RESIDENCIAL HACIENDA SAN MARTIN [FRACCIONAMIENTO]','R'),(749,'01','001','2446','DON TO¥O','R'),(750,'01','002','0001','ASIENTOS','U'),(751,'01','002','0002','LAS ADJUNTAS','R'),(752,'01','002','0003','LICENCIADO ADOLFO LOPEZ MATEOS','R'),(753,'01','002','0004','PLUTARCO ELIAS CALLES','R'),(754,'01','002','0005','AMARILLAS DE ESPARZA','R'),(755,'01','002','0006','EL BAJIO DE LOS CAMPOS','R'),(756,'01','002','0007','BIMBALETES AGUASCALIENTES (EL ALAMO)','R'),(757,'01','002','0008','BIMBALETES ATLAS (TANQUE DE LA VIEJA)','R'),(758,'01','002','0009','COLONIA EMANCIPACION (BORUNDA)','R'),(759,'01','002','0010','CALDERA','R'),(760,'01','002','0011','CIENEGA GRANDE','U'),(761,'01','002','0012','CLAVELLINAS','R'),(762,'01','002','0013','COLONIA SAN PEDRO','R'),(763,'01','002','0014','CRISOSTOMOS','R'),(764,'01','002','0015','CHARCO AZUL','R'),(765,'01','002','0016','EL CHONGUILLO [RANCHO]','R'),(766,'01','002','0017','LA DICHOSA','R'),(767,'01','002','0019','LA ESPERANZA','R'),(768,'01','002','0020','EL EPAZOTE','R'),(769,'01','002','0021','LAS FRAGUAS','R'),(770,'01','002','0022','FRANCISCO VILLA','R'),(771,'01','002','0023','LA GLORIA','R'),(772,'01','002','0024','GORRIONES','R'),(773,'01','002','0025','GUADALUPE DE ATLAS','R'),(774,'01','002','0027','JARILLAS','R'),(775,'01','002','0028','JILOTEPEC','R'),(776,'01','002','0029','LAS JOYAS I (LA COLONIA)','R'),(777,'01','002','0030','LAZARO CARDENAS','R'),(778,'01','002','0031','EL LLAVERO','R'),(779,'01','002','0032','MINA JESUS MARIA (MINERVA)','R'),(780,'01','002','0033','MOLINOS','R'),(781,'01','002','0034','LAS NEGRITAS','R'),(782,'01','002','0035','NORIA DEL BORREGO (NORIAS)','R'),(783,'01','002','0036','OJO DE AGUA DE ROSALES','R'),(784,'01','002','0037','OJO DE AGUA DE LOS SAUCES','R'),(785,'01','002','0039','PILOTOS','R'),(786,'01','002','0040','PINO SUAREZ (RANCHO VIEJO)','R'),(787,'01','002','0041','EL POLVO','R'),(788,'01','002','0042','PUENTE [RANCHO]','R'),(789,'01','002','0045','EL SALITRE','R'),(790,'01','002','0046','SAN ANTONIO DE LOS MARTINEZ','R'),(791,'01','002','0047','SAN GIL','R'),(792,'01','002','0048','SAN JOSE DEL RIO','R'),(793,'01','002','0049','RANCHO SAN JOSE ROSAS AZULES (EL SUSPIRO)','R'),(794,'01','002','0051','SAN RAFAEL DE OCAMPO','R'),(795,'01','002','0053','TANQUE DE GUADALUPE','R'),(796,'01','002','0054','TANQUE VIEJO','R'),(797,'01','002','0055','EL TEPETATILLO [RANCHO]','R'),(798,'01','002','0056','LA TINAJUELA','R'),(799,'01','002','0058','EL TULE','R'),(800,'01','002','0059','VILLA JUAREZ','U'),(801,'01','002','0060','VIUDAS DE PONIENTE','R'),(802,'01','002','0061','EL ZORRILLO','R'),(803,'01','002','0062','EL LUCERO [RANCHO]','R'),(804,'01','002','0067','LA CINTA','R'),(805,'01','002','0068','COLONIA GOMEZ PORTUGAL','R'),(806,'01','002','0087','LA JOYA','R'),(807,'01','002','0088','RANCHO CORRALEJO','R'),(808,'01','002','0089','HUEVO FERTIL (SAN ISIDRO)','R'),(809,'01','002','0093','CHARCO PRIETO (EL PALOMAR)','R'),(810,'01','002','0094','LOS ENCINOS','R'),(811,'01','002','0095','LA LAGUNITA','R'),(812,'01','002','0096','MIGUEL MACIAS (EL PLAN COLORADO)','R'),(813,'01','002','0101','LA SOLEDAD','R'),(814,'01','002','0102','MARLEE (RANCHO SAN CARLOS) [AGROPECUARIA]','R'),(815,'01','002','0103','LAS AMAPOLAS [RANCHO]','R'),(816,'01','002','0104','ASIENTOS [AVICOLA]','R'),(817,'01','002','0105','CASA DEL CERRO REDONDO','R'),(818,'01','002','0109','LOS LAURELES (EL ENCUENTRO) [RANCHO]','R'),(819,'01','002','0110','LA LOMA [RANCHO]','R'),(820,'01','002','0111','LOMAS DE VALADEZ','R'),(821,'01','002','0112','SOCIEDAD LA PALMA 2 (GRANJA LA PALOMA)','R'),(822,'01','002','0113','LA PROVIDENCIA (LA COCHINA)','R'),(823,'01','002','0114','EL RANCHITO','R'),(824,'01','002','0117','EL RETIRO','R'),(825,'01','002','0118','EL RETO¥O [RANCHO]','R'),(826,'01','002','0119','CASA BLANCA (ALTO BONITO) [RANCHO]','R'),(827,'01','002','0121','EL SOTELO [RANCHO]','R'),(828,'01','002','0122','NINGUNO','R'),(829,'01','002','0123','RANCHO SAN FELIPE DE JESUS','R'),(830,'01','002','0124','EL ARBOLITO [RANCHO]','R'),(831,'01','002','0128','SAN JOSE DEL TULILLO','R'),(832,'01','002','0129','BUENOS AIRES [RANCHO]','R'),(833,'01','002','0130','EL MUERTO','R'),(834,'01','002','0131','LOS PINOS [RANCHO]','R'),(835,'01','002','0133','EL ARRASTRADERO','R'),(836,'01','002','0136','LA CA¥ADA DE SAN JUAN','R'),(837,'01','002','0137','EL CASCARON (SOLEDAD DE ABAJO)','R'),(838,'01','002','0141','LA FLORIDA','R'),(839,'01','002','0143','LOS GONZALEZ MOTA','R'),(840,'01','002','0145','GRUPO ESQUINA DEL BORREGO','R'),(841,'01','002','0146','GRUPO I SOLIDARIDAD (LA LOMA)','R'),(842,'01','002','0147','GRUPO SOLIDARIO NUMERO 3','R'),(843,'01','002','0151','LAS JOYAS','R'),(844,'01','002','0152','LAS LAGUNITAS','R'),(845,'01','002','0153','EL LIMBO','R'),(846,'01','002','0154','NINGUNO','R'),(847,'01','002','0155','NINGUNO','R'),(848,'01','002','0156','LOS ALEMAN','R'),(849,'01','002','0157','NINGUNO','R'),(850,'01','002','0158','NINGUNO','R'),(851,'01','002','0159','EL GIRASOL [RANCHO]','R'),(852,'01','002','0160','LOS MEDINA [RANCHO]','R'),(853,'01','002','0162','NINGUNO','R'),(854,'01','002','0163','NINGUNO','R'),(855,'01','002','0164','CRUZ DE LOBATO [RANCHO]','R'),(856,'01','002','0165','RANCHO MOCHO','R'),(857,'01','002','0166','EL ROSAL [RANCHO]','R'),(858,'01','002','0167','SAN RAFAEL','R'),(859,'01','002','0168','EL CARMEN [RANCHO]','R'),(860,'01','002','0169','NINGUNO','R'),(861,'01','002','0171','EL VENADITO [RANCHO]','R'),(862,'01','002','0172','NINGUNO','R'),(863,'01','002','0174','LA LEYENDA [RESTAURANTE-BAR]','R'),(864,'01','002','0178','LA PIEDRERA','R'),(865,'01','002','0180','EL PLAN','R'),(866,'01','002','0181','POZO 80','R'),(867,'01','002','0182','POZO 81 BANJIDAL','R'),(868,'01','002','0183','POZO AVE MARIA','R'),(869,'01','002','0184','POZO DE CARLOS ARENAS','R'),(870,'01','002','0185','POZO DE DELFINO VELAZQUEZ','R'),(871,'01','002','0186','POZO FRANCISCO GUEL JIMENEZ [UNIDAD LECHERA]','R'),(872,'01','002','0187','SECTOR POZO LA CONGOJA','R'),(873,'01','002','0188','4 MILPAS [RANCHO]','R'),(874,'01','002','0189','RANCHO ALVARADO','R'),(875,'01','002','0190','PAJARITOS [RANCHO]','R'),(876,'01','002','0191','RANCHO DE FATIMA','R'),(877,'01','002','0192','DON EVERARDO [RANCHO]','R'),(878,'01','002','0193','EL COYONOZTAL [RANCHO]','R'),(879,'01','002','0194','EL CENIZO [RANCHO]','R'),(880,'01','002','0195','EL CHINCHIN [RANCHO]','R'),(881,'01','002','0196','RANCHO CHIQUICHAPE','R'),(882,'01','002','0197','EL ENCINO [RANCHO]','R'),(883,'01','002','0198','EL FRESNO [RANCHO]','R'),(884,'01','002','0200','EL PLAN [RANCHO]','R'),(885,'01','002','0201','LA CORONA [RANCHO]','R'),(886,'01','002','0202','LA CRUZ [RANCHO]','R'),(887,'01','002','0204','LA DIVINA PROVIDENCIA [RANCHO]','R'),(888,'01','002','0205','LA GUADALUPANA [RANCHO]','R'),(889,'01','002','0206','LAGUNA COLORADA [RANCHO]','R'),(890,'01','002','0207','LA LAGUNA DE LAS PADILLAS [RANCHO]','R'),(891,'01','002','0208','LA LAGUNITA [RANCHO]','R'),(892,'01','002','0209','LAS BOVEDAS [RANCHO]','R'),(893,'01','002','0210','LOS PALMARES [RANCHO]','R'),(894,'01','002','0211','LOS MOROS [RANCHO]','R'),(895,'01','002','0212','NUEVO VALLE [RANCHO]','R'),(896,'01','002','0213','EL AGUILA [RANCHO]','R'),(897,'01','002','0214','SOCIEDAD LA CASCARONA [RANCHO]','R'),(898,'01','002','0215','VALLE SAN ANTONIO [RANCHO]','R'),(899,'01','002','0216','EL RIO','R'),(900,'01','002','0217','SANTA RITA','R'),(901,'01','002','0218','SECTOR DE PRODUCCION NUMERO 3','R'),(902,'01','002','0220','SECTOR DE PRODUCCION NUMERO 1','R'),(903,'01','002','0221','SECTOR DE PRODUCCION NUMERO 2','R'),(904,'01','002','0222','SECTOR DE PRODUCCION EL CHAMIZAL','R'),(905,'01','002','0223','RANCHO GUADALUPE ANGELES','R'),(906,'01','002','0225','SECTOR ROSA LUZ ALEGRIA','R'),(907,'01','002','0226','SOCIEDAD 20 DE NOVIEMBRE','R'),(908,'01','002','0227','EL AGUILA (DESHIDRATADORA SANTA ANITA) [GRANJA]','R'),(909,'01','002','0228','SOCIEDAD EL CHAVARASNO','R'),(910,'01','002','0229','SOCIEDAD RIO CASA','R'),(911,'01','002','0230','SOCIEDAD EMPRESA EJIDAL','R'),(912,'01','002','0231','SOCIEDAD LA ESPESURA','R'),(913,'01','002','0232','SOCIEDAD LA PALMA I','R'),(914,'01','002','0233','SOCIEDAD LAS COTORRAS','R'),(915,'01','002','0235','SOCIEDAD LOS POSADA','R'),(916,'01','002','0236','SOCIEDAD MATORRAL DE ABAJO','R'),(917,'01','002','0237','SECTOR DE PRODUCCION FRANCISCO VILLA','R'),(918,'01','002','0238','SOCIEDAD RODRIGUEZ MENESES','R'),(919,'01','002','0239','LA TABLA DEL TESORO','R'),(920,'01','002','0240','TANQUE SAN HILARIO','R'),(921,'01','002','0241','LAS TRES MARIAS','R'),(922,'01','002','0242','VI¥EDOS LA PRIMAVERA','R'),(923,'01','002','0243','SAN VICENTE','R'),(924,'01','002','0244','EL PLAN (CANTARRANAS)','R'),(925,'01','002','0245','LA LOMA (TANQUE DE LAS PALMITAS)','R'),(926,'01','002','0246','EL RASCON (LA LOMA)','R'),(927,'01','002','0248','EL NARANJO','R'),(928,'01','002','0249','EL ENCUENTRO [RANCHO]','R'),(929,'01','002','0250','EL FRESNO [RANCHO]','R'),(930,'01','002','0251','RANCHO SAN ANDRES','R'),(931,'01','002','0253','SANTUARIO DEL TEPOZAN','R'),(932,'01','002','0254','LA CURVA','R'),(933,'01','002','0255','DON JOSE [GRANJA]','R'),(934,'01','002','0256','NINGUNO','R'),(935,'01','002','0257','NINGUNO','R'),(936,'01','002','0258','NINGUNO','R'),(937,'01','002','0259','LICENCIADO ADOLFO LOPEZ MATEOS','R'),(938,'01','002','0260','NINGUNO','R'),(939,'01','002','0261','NINGUNO','R'),(940,'01','002','0262','LOS CUATES','R'),(941,'01','002','0263','EL LLAVERO [RANCHO]','R'),(942,'01','002','0264','EL PINO [RANCHO]','R'),(943,'01','002','0266','RANCHO JR','R'),(944,'01','002','0268','LA CA¥ADITA','R'),(945,'01','002','0269','LA FORTALEZA','R'),(946,'01','002','0270','NINGUNO','R'),(947,'01','002','0271','NINGUNO','R'),(948,'01','002','0272','LA VILLA DE DOS LUCEROS','R'),(949,'01','002','0273','LA LOMA [LADRILLERA]','R'),(950,'01','002','0274','RANCHO SAN RAFAEL','R'),(951,'01','002','0275','SOCIEDAD PALMAS MOCHAS','R'),(952,'01','002','0276','VILLA JUAREZ [DESHUESADERO]','R'),(953,'01','002','0278','SAN JOSE DE LA CRUZ [PANTEON MUNICIPAL]','R'),(954,'01','002','0279','LA SOLEDAD [RANCHO]','R'),(955,'01','002','0280','COPLAMAR','R'),(956,'01','002','0281','CRUCERO EL TULE','R'),(957,'01','002','0282','NINGUNO [DESHIDRATADORA]','R'),(958,'01','002','0283','EJIDO PILOTOS','R'),(959,'01','002','0285','LA LOMITA','R'),(960,'01','002','0286','EL PARAISO [RANCHO]','R'),(961,'01','002','0287','EL MEZQUITAL','R'),(962,'01','002','0288','LAS PALMITAS [RANCHO]','R'),(963,'01','002','0289','VILLA JUAREZ','R'),(964,'01','002','0290','LA PROVIDENCIA','R'),(965,'01','002','0291','VILLA JUAREZ','R'),(966,'01','002','0292','LOS ROSALES [RANCHO]','R'),(967,'01','002','0293','SAN ISIDRO','R'),(968,'01','002','0294','ESTHELA [BOTANERO]','R'),(969,'01','002','0295','PORCINOS CUKA [GRANJA]','R'),(970,'01','002','0296','NINGUNO','R'),(971,'01','002','0297','CAMPOS [RANCHO]','R'),(972,'01','002','0298','RANCHO ELENA','R'),(973,'01','002','0299','LAS TRES MARIAS [RANCHO]','R'),(974,'01','002','0300','SOCIEDAD LA PILETA','R'),(975,'01','002','0302','EL DOMINO [GRANJA]','R'),(976,'01','002','0303','EL SAUZ [GRANJA]','R'),(977,'01','002','0304','EL VENADITO II','R'),(978,'01','002','0305','GRANJA BENY','R'),(979,'01','002','0306','EL CARACOL (CALDERA) [RANCHO]','R'),(980,'01','002','0307','EL CARMEN','R'),(981,'01','002','0308','LA CASA DE CAMPO (CHARCO AZUL)','R'),(982,'01','002','0309','LOS CHARCOS','R'),(983,'01','002','0310','CUATRO CAMINOS [GRANJA]','R'),(984,'01','002','0311','K-AN-TUM-BALAM','R'),(985,'01','002','0312','LA LAGUNITA','R'),(986,'01','002','0313','LOS PEONES','R'),(987,'01','002','0314','RANCHO DE ANTONIO DEL BOSQUE','R'),(988,'01','002','0315','RANCHO SAMAVI','R'),(989,'01','002','0316','SANTIAGO MACIAS (EL INVERNADERO)','R'),(990,'01','002','0317','LA SOLEDAD','R'),(991,'01','002','0318','LA TINAJA','R'),(992,'01','002','0319','EL VARADUZ [RANCHO]','R'),(993,'01','003','0001','CALVILLO','U'),(994,'01','003','0002','LOS ADOBES','R'),(995,'01','003','0003','LOS ALISOS','R'),(996,'01','003','0004','LAS ANIMAS','R'),(997,'01','003','0008','BARRANCA DEL ROBLE','R'),(998,'01','003','0009','BARRANCA DE PORTALES','R'),(999,'01','003','0012','LA CALIXTINA','R'),(1000,'01','003','0013','EL CALVARIO','R');
/*!40000 ALTER TABLE `gen_localidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gen_municipios`
--

DROP TABLE IF EXISTS `gen_municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gen_municipios` (
  `CVE_ENT` varchar(2) NOT NULL,
  `CVE_MUN` varchar(3) NOT NULL,
  `NOM_MUN` varchar(110) NOT NULL,
  `ID_MUN` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_MUN`),
  KEY `CVE_ENT` (`CVE_ENT`),
  KEY `CVE_MUN` (`CVE_MUN`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gen_municipios`
--

LOCK TABLES `gen_municipios` WRITE;
/*!40000 ALTER TABLE `gen_municipios` DISABLE KEYS */;
INSERT INTO `gen_municipios` VALUES ('01','001','AGUASCALIENTES',2),('02','001','ENSENADA',3),('03','001','COMONDU',4),('04','001','CALKINI',5),('05','001','ABASOLO',6),('06','001','ARMERIA',7),('07','001','ACACOYAGUA',8),('08','001','AHUMADA',9),('10','001','CANATLAN',10),('11','001','ABASOLO',11),('12','001','ACAPULCO DE JUAREZ',12),('13','001','ACATLAN',13),('14','001','ACATIC',14),('15','001','ACAMBAY',15),('16','001','ACUITZIO',16),('17','001','AMACUZAC',17),('18','001','ACAPONETA',18),('19','001','ABASOLO',19),('20','001','ABEJONES',20),('21','001','ACAJETE',21),('22','001','AMEALCO DE BONFIL',22),('23','001','COZUMEL',23),('24','001','AHUALULCO',24),('25','001','AHOME',25),('26','001','ACONCHI',26),('27','001','BALANCAN',27),('28','001','ABASOLO',28),('29','001','AMAXAC DE GUERRERO',29),('30','001','ACAJETE',30),('31','001','ABALA',31),('32','001','APOZOL',32),('01','002','ASIENTOS',33),('02','002','MEXICALI',34),('03','002','MULEGE',35),('04','002','CAMPECHE',36),('05','002','ACU¥A',37),('06','002','COLIMA',38),('07','002','ACALA',39),('08','002','ALDAMA',40),('09','002','AZCAPOTZALCO',41),('10','002','CANELAS',42),('11','002','ACAMBARO',43),('12','002','AHUACUOTZINGO',44),('13','002','ACAXOCHITLAN',45),('14','002','ACATLAN DE JUAREZ',46),('15','002','ACOLMAN',47),('16','002','AGUILILLA',48),('17','002','ATLATLAHUCAN',49),('18','002','AHUACATLAN',50),('19','002','AGUALEGUAS',51),('20','002','ACATLAN DE PEREZ FIGUEROA',52),('21','002','ACATENO',53),('22','002','PINAL DE AMOLES',54),('23','002','FELIPE CARRILLO PUERTO',55),('24','002','ALAQUINES',56),('25','002','ANGOSTURA',57),('26','002','AGUA PRIETA',58),('27','002','CARDENAS',59),('28','002','ALDAMA',60),('29','002','APETATITLAN DE ANTONIO CARVAJAL',61),('30','002','ACATLAN',62),('31','002','ACANCEH',63),('32','002','APULCO',64),('01','003','CALVILLO',65),('02','003','TECATE',66),('03','003','LA PAZ',67),('04','003','CARMEN',68),('05','003','ALLENDE',69),('06','003','COMALA',70),('07','003','ACAPETAHUA',71),('08','003','ALLENDE',72),('09','003','COYOACAN',73),('10','003','CONETO DE COMONFORT',74),('11','003','SAN MIGUEL DE ALLENDE',75),('12','003','AJUCHITLAN DEL PROGRESO',76),('13','003','ACTOPAN',77),('14','003','AHUALULCO DE MERCADO',78),('15','003','ACULCO',79),('16','003','ALVARO OBREGON',80),('17','003','AXOCHIAPAN',81),('18','003','AMATLAN DE CA¥AS',82),('19','003','LOS ALDAMAS',83),('20','003','ASUNCION CACALOTEPEC',84),('21','003','ACATLAN',85),('22','003','ARROYO SECO',86),('23','003','ISLA MUJERES',87),('24','003','AQUISMON',88),('25','003','BADIRAGUATO',89),('26','003','ALAMOS',90),('27','003','CENTLA',91),('28','003','ALTAMIRA',92),('29','003','ATLANGATEPEC',93),('30','003','ACAYUCAN',94),('31','003','AKIL',95),('32','003','ATOLINGA',96),('01','004','COSIO',97),('02','004','TIJUANA',98),('04','004','CHAMPOTON',99),('05','004','ARTEAGA',100),('06','004','COQUIMATLAN',101),('07','004','ALTAMIRANO',102),('08','004','AQUILES SERDAN',103),('09','004','CUAJIMALPA DE MORELOS',104),('10','004','CUENCAME',105),('11','004','APASEO EL ALTO',106),('12','004','ALCOZAUCA DE GUERRERO',107),('13','004','AGUA BLANCA DE ITURBIDE',108),('14','004','AMACUECA',109),('15','004','ALMOLOYA DE ALQUISIRAS',110),('16','004','ANGAMACUTIRO',111),('17','004','AYALA',112),('18','004','COMPOSTELA',113),('19','004','ALLENDE',114),('20','004','ASUNCION CUYOTEPEJI',115),('21','004','ACATZINGO',116),('22','004','CADEREYTA DE MONTES',117),('23','004','OTHON P. BLANCO',118),('24','004','ARMADILLO DE LOS INFANTE',119),('25','004','CONCORDIA',120),('26','004','ALTAR',121),('27','004','CENTRO',122),('28','004','ANTIGUO MORELOS',123),('29','004','ATLTZAYANCA',124),('30','004','ACTOPAN',125),('31','004','BACA',126),('32','004','BENITO JUAREZ',127),('01','005','JESUS MARIA',128),('02','005','PLAYAS DE ROSARITO',129),('04','005','HECELCHAKAN',130),('05','005','CANDELA',131),('06','005','CUAUHTEMOC',132),('07','005','AMATAN',133),('08','005','ASCENSION',134),('09','005','GUSTAVO A. MADERO',135),('10','005','DURANGO',136),('11','005','APASEO EL GRANDE',137),('12','005','ALPOYECA',138),('13','005','AJACUBA',139),('14','005','AMATITAN',140),('15','005','ALMOLOYA DE JUAREZ',141),('16','005','ANGANGUEO',142),('17','005','COATLAN DEL RIO',143),('18','005','HUAJICORI',144),('19','005','ANAHUAC',145),('20','005','ASUNCION IXTALTEPEC',146),('21','005','ACTEOPAN',147),('22','005','COLON',148),('23','005','BENITO JUAREZ',149),('24','005','CARDENAS',150),('25','005','COSALA',151),('26','005','ARIVECHI',152),('27','005','COMALCALCO',153),('28','005','BURGOS',154),('29','005','APIZACO',155),('30','005','ACULA',156),('31','005','BOKOBA',157),('32','005','CALERA',158),('01','006','PABELLON DE ARTEAGA',159),('04','006','HOPELCHEN',160),('05','006','CASTA¥OS',161),('06','006','IXTLAHUACAN',162),('07','006','AMATENANGO DE LA FRONTERA',163),('08','006','BACHINIVA',164),('09','006','IZTACALCO',165),('10','006','GENERAL SIMON BOLIVAR',166),('11','006','ATARJEA',167),('12','006','APAXTLA',168),('13','006','ALFAJAYUCAN',169),('14','006','AMECA',170),('15','006','ALMOLOYA DEL RIO',171),('16','006','APATZINGAN',172),('17','006','CUAUTLA',173),('18','006','IXTLAN DEL RIO',174),('19','006','APODACA',175),('20','006','ASUNCION NOCHIXTLAN',176),('21','006','AHUACATLAN',177),('22','006','CORREGIDORA',178),('23','006','JOSE MARIA MORELOS',179),('24','006','CATORCE',180),('25','006','CULIACAN',181),('26','006','ARIZPE',182),('27','006','CUNDUACAN',183),('28','006','BUSTAMANTE',184),('29','006','CALPULALPAN',185),('30','006','ACULTZINGO',186),('31','006','BUCTZOTZ',187),('32','006','CA¥ITAS DE FELIPE PESCADOR',188),('01','007','RINCON DE ROMOS',189),('04','007','PALIZADA',190),('05','007','CUATRO CIENEGAS',191),('06','007','MANZANILLO',192),('07','007','AMATENANGO DEL VALLE',193),('08','007','BALLEZA',194),('09','007','IZTAPALAPA',195),('10','007','GOMEZ PALACIO',196),('11','007','CELAYA',197),('12','007','ARCELIA',198),('13','007','ALMOLOYA',199),('14','007','SAN JUANITO DE ESCOBEDO',200),('15','007','AMANALCO',201),('16','007','APORO',202),('17','007','CUERNAVACA',203),('18','007','JALA',204),('19','007','ARAMBERRI',205),('20','007','ASUNCION OCOTLAN',206),('21','007','AHUATLAN',207),('22','007','EZEQUIEL MONTES',208),('23','007','LAZARO CARDENAS',209),('24','007','CEDRAL',210),('25','007','CHOIX',211),('26','007','ATIL',212),('27','007','EMILIANO ZAPATA',213),('28','007','CAMARGO',214),('29','007','EL CARMEN TEQUEXQUITLA',215),('30','007','CAMARON DE TEJEDA',216),('31','007','CACALCHEN',217),('32','007','CONCEPCION DEL ORO',218),('01','008','SAN JOSE DE GRACIA',219),('03','008','LOS CABOS',220),('04','008','TENABO',221),('05','008','ESCOBEDO',222),('06','008','MINATITLAN',223),('07','008','ANGEL ALBINO CORZO',224),('08','008','BATOPILAS',225),('09','008','LA MAGDALENA CONTRERAS',226),('10','008','GUADALUPE VICTORIA',227),('11','008','MANUEL DOBLADO',228),('12','008','ATENANGO DEL RIO',229),('13','008','APAN',230),('14','008','ARANDAS',231),('15','008','AMATEPEC',232),('16','008','AQUILA',233),('17','008','EMILIANO ZAPATA',234),('18','008','XALISCO',235),('19','008','BUSTAMANTE',236),('20','008','ASUNCION TLACOLULITA',237),('21','008','AHUAZOTEPEC',238),('22','008','HUIMILPAN',239),('23','008','SOLIDARIDAD',240),('24','008','CERRITOS',241),('25','008','ELOTA',242),('26','008','BACADEHUACHI',243),('27','008','HUIMANGUILLO',244),('28','008','CASAS',245),('29','008','CUAPIAXTLA',246),('30','008','ALPATLAHUAC',247),('31','008','CALOTMUL',248),('32','008','CUAUHTEMOC',249),('01','009','TEPEZALA',250),('03','009','LORETO',251),('04','009','ESCARCEGA',252),('05','009','FRANCISCO I. MADERO',253),('06','009','TECOMAN',254),('07','009','ARRIAGA',255),('08','009','BOCOYNA',256),('09','009','MILPA ALTA',257),('10','009','GUANACEVI',258),('11','009','COMONFORT',259),('12','009','ATLAMAJALCINGO DEL MONTE',260),('13','009','EL ARENAL',261),('14','009','EL ARENAL',262),('15','009','AMECAMECA',263),('16','009','ARIO',264),('17','009','HUITZILAC',265),('18','009','DEL NAYAR',266),('19','009','CADEREYTA JIMENEZ',267),('20','009','AYOTZINTEPEC',268),('21','009','AHUEHUETITLA',269),('22','009','JALPAN DE SERRA',270),('23','009','TULUM',271),('24','009','CERRO DE SAN PEDRO',272),('25','009','ESCUINAPA',273),('26','009','BACANORA',274),('27','009','JALAPA',275),('28','009','CIUDAD MADERO',276),('29','009','CUAXOMULCO',277),('30','009','ALTO LUCERO DE GUTIERREZ BARRIOS',278),('31','009','CANSAHCAB',279),('32','009','CHALCHIHUITES',280),('01','010','EL LLANO',281),('04','010','CALAKMUL',282),('05','010','FRONTERA',283),('06','010','VILLA DE ALVAREZ',284),('07','010','BEJUCAL DE OCAMPO',285),('08','010','BUENAVENTURA',286),('09','010','ALVARO OBREGON',287),('10','010','HIDALGO',288),('11','010','CORONEO',289),('12','010','ATLIXTAC',290),('13','010','ATITALAQUIA',291),('14','010','ATEMAJAC DE BRIZUELA',292),('15','010','APAXCO',293),('16','010','ARTEAGA',294),('17','010','JANTETELCO',295),('18','010','ROSAMORADA',296),('19','010','EL CARMEN',297),('20','010','EL BARRIO DE LA SOLEDAD',298),('21','010','AJALPAN',299),('22','010','LANDA DE MATAMOROS',300),('23','010','BACALAR',301),('24','010','CIUDAD DEL MAIZ',302),('25','010','EL FUERTE',303),('26','010','BACERAC',304),('27','010','JALPA DE MENDEZ',305),('28','010','CRUILLAS',306),('29','010','CHIAUTEMPAN',307),('30','010','ALTOTONGA',308),('31','010','CANTAMAYEC',309),('32','010','FRESNILLO',310),('01','011','SAN FRANCISCO DE LOS ROMO',311),('04','011','CANDELARIA',312),('05','011','GENERAL CEPEDA',313),('07','011','BELLA VISTA',314),('08','011','CAMARGO',315),('09','011','TLAHUAC',316),('10','011','INDE',317),('11','011','CORTAZAR',318),('12','011','ATOYAC DE ALVAREZ',319),('13','011','ATLAPEXCO',320),('14','011','ATENGO',321),('15','011','ATENCO',322),('16','011','BRISE¥AS',323),('17','011','JIUTEPEC',324),('18','011','RUIZ',325),('19','011','CERRALVO',326),('20','011','CALIHUALA',327),('21','011','ALBINO ZERTUCHE',328),('22','011','EL MARQUES',329),('24','011','CIUDAD FERNANDEZ',330),('25','011','GUASAVE',331),('26','011','BACOACHI',332),('27','011','JONUTA',333),('28','011','GOMEZ FARIAS',334),('29','011','MU¥OZ DE DOMINGO ARENAS',335),('30','011','ALVARADO',336),('31','011','CELESTUN',337),('32','011','TRINIDAD GARCIA DE LA CADENA',338),('05','012','GUERRERO',339),('07','012','BERRIOZABAL',340),('08','012','CARICHI',341),('09','012','TLALPAN',342),('10','012','LERDO',343),('11','012','CUERAMARO',344),('12','012','AYUTLA DE LOS LIBRES',345),('13','012','ATOTONILCO EL GRANDE',346),('14','012','ATENGUILLO',347),('15','012','ATIZAPAN',348),('16','012','BUENAVISTA',349),('17','012','JOJUTLA',350),('18','012','SAN BLAS',351),('19','012','CIENEGA DE FLORES',352),('20','012','CANDELARIA LOXICHA',353),('21','012','ALJOJUCA',354),('22','012','PEDRO ESCOBEDO',355),('24','012','TANCANHUITZ',356),('25','012','MAZATLAN',357),('26','012','BACUM',358),('27','012','MACUSPANA',359),('28','012','GONZALEZ',360),('29','012','ESPA¥ITA',361),('30','012','AMATITLAN',362),('31','012','CENOTILLO',363),('32','012','GENARO CODINA',364),('05','013','HIDALGO',365),('07','013','BOCHIL',366),('08','013','CASAS GRANDES',367),('09','013','XOCHIMILCO',368),('10','013','MAPIMI',369),('11','013','DOCTOR MORA',370),('12','013','AZOYU',371),('13','013','ATOTONILCO DE TULA',372),('14','013','ATOTONILCO EL ALTO',373),('15','013','ATIZAPAN DE ZARAGOZA',374),('16','013','CARACUARO',375),('17','013','JONACATEPEC',376),('18','013','SAN PEDRO LAGUNILLAS',377),('19','013','CHINA',378),('20','013','CIENEGA DE ZIMATLAN',379),('21','013','ALTEPEXI',380),('22','013','PE¥AMILLER',381),('24','013','CIUDAD VALLES',382),('25','013','MOCORITO',383),('26','013','BANAMICHI',384),('27','013','NACAJUCA',385),('28','013','GÜEMEZ',386),('29','013','HUAMANTLA',387),('30','013','NARANJOS AMATLAN',388),('31','013','CONKAL',389),('32','013','GENERAL ENRIQUE ESTRADA',390),('05','014','JIMENEZ',391),('07','014','EL BOSQUE',392),('08','014','CORONADO',393),('09','014','BENITO JUAREZ',394),('10','014','MEZQUITAL',395),('11','014','DOLORES HIDALGO CUNA DE LA INDEPENDENCIA NACIONAL',396),('12','014','BENITO JUAREZ',397),('13','014','CALNALI',398),('14','014','ATOYAC',399),('15','014','ATLACOMULCO',400),('16','014','COAHUAYANA',401),('17','014','MAZATEPEC',402),('18','014','SANTA MARIA DEL ORO',403),('19','014','DOCTOR ARROYO',404),('20','014','CIUDAD IXTEPEC',405),('21','014','AMIXTLAN',406),('22','014','QUERETARO',407),('24','014','COXCATLAN',408),('25','014','ROSARIO',409),('26','014','BAVIACORA',410),('27','014','PARAISO',411),('28','014','GUERRERO',412),('29','014','HUEYOTLIPAN',413),('30','014','AMATLAN DE LOS REYES',414),('31','014','CUNCUNUL',415),('32','014','GENERAL FRANCISCO R. MURGUIA',416),('05','015','JUAREZ',417),('07','015','CACAHOATAN',418),('08','015','COYAME DEL SOTOL',419),('09','015','CUAUHTEMOC',420),('10','015','NAZAS',421),('11','015','GUANAJUATO',422),('12','015','BUENAVISTA DE CUELLAR',423),('13','015','CARDONAL',424),('14','015','AUTLAN DE NAVARRO',425),('15','015','ATLAUTLA',426),('16','015','COALCOMAN DE VAZQUEZ PALLARES',427),('17','015','MIACATLAN',428),('18','015','SANTIAGO IXCUINTLA',429),('19','015','DOCTOR COSS',430),('20','015','COATECAS ALTAS',431),('21','015','AMOZOC',432),('22','015','SAN JOAQUIN',433),('24','015','CHARCAS',434),('25','015','SALVADOR ALVARADO',435),('26','015','BAVISPE',436),('27','015','TACOTALPA',437),('28','015','GUSTAVO DIAZ ORDAZ',438),('29','015','IXTACUIXTLA DE MARIANO MATAMOROS',439),('30','015','ANGEL R. CABADA',440),('31','015','CUZAMA',441),('32','015','EL PLATEADO DE JOAQUIN AMARO',442),('05','016','LAMADRID',443),('07','016','CATAZAJA',444),('08','016','LA CRUZ',445),('09','016','MIGUEL HIDALGO',446),('10','016','NOMBRE DE DIOS',447),('11','016','HUANIMARO',448),('12','016','COAHUAYUTLA DE JOSE MARIA IZAZAGA',449),('13','016','CUAUTEPEC DE HINOJOSA',450),('14','016','AYOTLAN',451),('15','016','AXAPUSCO',452),('16','016','COENEO',453),('17','016','OCUITUCO',454),('18','016','TECUALA',455),('19','016','DOCTOR GONZALEZ',456),('20','016','COICOYAN DE LAS FLORES',457),('21','016','AQUIXTLA',458),('22','016','SAN JUAN DEL RIO',459),('24','016','EBANO',460),('25','016','SAN IGNACIO',461),('26','016','BENJAMIN HILL',462),('27','016','TEAPA',463),('28','016','HIDALGO',464),('29','016','IXTENCO',465),('30','016','LA ANTIGUA',466),('31','016','CHACSINKIN',467),('32','016','GENERAL PANFILO NATERA',468),('05','017','MATAMOROS',469),('07','017','CINTALAPA',470),('08','017','CUAUHTEMOC',471),('09','017','VENUSTIANO CARRANZA',472),('10','017','OCAMPO',473),('11','017','IRAPUATO',474),('12','017','COCULA',475),('13','017','CHAPANTONGO',476),('14','017','AYUTLA',477),('15','017','AYAPANGO',478),('16','017','CONTEPEC',479),('17','017','PUENTE DE IXTLA',480),('18','017','TEPIC',481),('19','017','GALEANA',482),('20','017','LA COMPA¥IA',483),('21','017','ATEMPAN',484),('22','017','TEQUISQUIAPAN',485),('24','017','GUADALCAZAR',486),('25','017','SINALOA',487),('26','017','CABORCA',488),('27','017','TENOSIQUE',489),('28','017','JAUMAVE',490),('29','017','MAZATECOCHCO DE JOSE MARIA MORELOS',491),('30','017','APAZAPAN',492),('31','017','CHANKOM',493),('32','017','GUADALUPE',494),('05','018','MONCLOVA',495),('07','018','COAPILLA',496),('08','018','CUSIHUIRIACHI',497),('10','018','EL ORO',498),('11','018','JARAL DEL PROGRESO',499),('12','018','COPALA',500),('13','018','CHAPULHUACAN',501),('14','018','LA BARCA',502),('15','018','CALIMAYA',503),('16','018','COPANDARO',504),('17','018','TEMIXCO',505),('18','018','TUXPAN',506),('19','018','GARCIA',507),('20','018','CONCEPCION BUENAVISTA',508),('21','018','ATEXCAL',509),('22','018','TOLIMAN',510),('24','018','HUEHUETLAN',511),('25','018','NAVOLATO',512),('26','018','CAJEME',513),('28','018','JIMENEZ',514),('29','018','CONTLA DE JUAN CUAMATZI',515),('30','018','AQUILA',516),('31','018','CHAPAB',517),('32','018','HUANUSCO',518),('05','019','MORELOS',519),('07','019','COMITAN DE DOMINGUEZ',520),('08','019','CHIHUAHUA',521),('10','019','OTAEZ',522),('11','019','JERECUARO',523),('12','019','COPALILLO',524),('13','019','CHILCUAUTLA',525),('14','019','BOLA¥OS',526),('15','019','CAPULHUAC',527),('16','019','COTIJA',528),('17','019','TEPALCINGO',529),('18','019','LA YESCA',530),('19','019','SAN PEDRO GARZA GARCIA',531),('20','019','CONCEPCION PAPALO',532),('21','019','ATLIXCO',533),('24','019','LAGUNILLAS',534),('26','019','CANANEA',535),('28','019','LLERA',536),('29','019','TEPETITLA DE LARDIZABAL',537),('30','019','ASTACINGA',538),('31','019','CHEMAX',539),('32','019','JALPA',540),('05','020','MUZQUIZ',541),('07','020','LA CONCORDIA',542),('08','020','CHINIPAS',543),('10','020','PANUCO DE CORONADO',544),('11','020','LEON',545),('12','020','COPANATOYAC',546),('13','020','ELOXOCHITLAN',547),('14','020','CABO CORRIENTES',548),('15','020','COACALCO DE BERRIOZABAL',549),('16','020','CUITZEO',550),('17','020','TEPOZTLAN',551),('18','020','BAHIA DE BANDERAS',552),('19','020','GENERAL BRAVO',553),('20','020','CONSTANCIA DEL ROSARIO',554),('21','020','ATOYATEMPAN',555),('24','020','MATEHUALA',556),('26','020','CARBO',557),('28','020','MAINERO',558),('29','020','SANCTORUM DE LAZARO CARDENAS',559),('30','020','ATLAHUILCO',560),('31','020','CHICXULUB PUEBLO',561),('32','020','JEREZ',562),('05','021','NADADORES',563),('07','021','COPAINALA',564),('08','021','DELICIAS',565),('10','021','PE¥ON BLANCO',566),('11','021','MOROLEON',567),('12','021','COYUCA DE BENITEZ',568),('13','021','EMILIANO ZAPATA',569),('14','021','CASIMIRO CASTILLO',570),('15','021','COATEPEC HARINAS',571),('16','021','CHARAPAN',572),('17','021','TETECALA',573),('19','021','GENERAL ESCOBEDO',574),('20','021','COSOLAPA',575),('21','021','ATZALA',576),('24','021','MEXQUITIC DE CARMONA',577),('26','021','LA COLORADA',578),('28','021','EL MANTE',579),('29','021','NANACAMILPA DE MARIANO ARISTA',580),('30','021','ATOYAC',581),('31','021','CHICHIMILA',582),('32','021','JIMENEZ DEL TEUL',583),('05','022','NAVA',584),('07','022','CHALCHIHUITAN',585),('08','022','DR. BELISARIO DOMINGUEZ',586),('10','022','POANAS',587),('11','022','OCAMPO',588),('12','022','COYUCA DE CATALAN',589),('13','022','EPAZOYUCAN',590),('14','022','CIHUATLAN',591),('15','022','COCOTITLAN',592),('16','022','CHARO',593),('17','022','TETELA DEL VOLCAN',594),('19','022','GENERAL TERAN',595),('20','022','COSOLTEPEC',596),('21','022','ATZITZIHUACAN',597),('24','022','MOCTEZUMA',598),('26','022','CUCURPE',599),('28','022','MATAMOROS',600),('29','022','ACUAMANALA DE MIGUEL HIDALGO',601),('30','022','ATZACAN',602),('31','022','CHIKINDZONOT',603),('32','022','JUAN ALDAMA',604),('05','023','OCAMPO',605),('07','023','CHAMULA',606),('08','023','GALEANA',607),('10','023','PUEBLO NUEVO',608),('11','023','PENJAMO',609),('12','023','CUAJINICUILAPA',610),('13','023','FRANCISCO I. MADERO',611),('14','023','ZAPOTLAN EL GRANDE',612),('15','023','COYOTEPEC',613),('16','023','CHAVINDA',614),('17','023','TLALNEPANTLA',615),('19','023','GENERAL TREVI¥O',616),('20','023','CUILAPAM DE GUERRERO',617),('21','023','ATZITZINTLA',618),('24','023','RAYON',619),('26','023','CUMPAS',620),('28','023','MENDEZ',621),('29','023','NATIVITAS',622),('30','023','ATZALAN',623),('31','023','CHOCHOLA',624),('32','023','JUCHIPILA',625),('05','024','PARRAS',626),('07','024','CHANAL',627),('08','024','SANTA ISABEL',628),('10','024','RODEO',629),('11','024','PUEBLO NUEVO',630),('12','024','CUALAC',631),('13','024','HUASCA DE OCAMPO',632),('14','024','COCULA',633),('15','024','CUAUTITLAN',634),('16','024','CHERAN',635),('17','024','TLALTIZAPAN DE ZAPATA',636),('19','024','GENERAL ZARAGOZA',637),('20','024','CUYAMECALCO VILLA DE ZARAGOZA',638),('21','024','AXUTLA',639),('24','024','RIOVERDE',640),('26','024','DIVISADEROS',641),('28','024','MIER',642),('29','024','PANOTLA',643),('30','024','TLALTETELA',644),('31','024','CHUMAYEL',645),('32','024','LORETO',646),('05','025','PIEDRAS NEGRAS',647),('07','025','CHAPULTENANGO',648),('08','025','GOMEZ FARIAS',649),('10','025','SAN BERNARDO',650),('11','025','PURISIMA DEL RINCON',651),('12','025','CUAUTEPEC',652),('13','025','HUAUTLA',653),('14','025','COLOTLAN',654),('15','025','CHALCO',655),('16','025','CHILCHOTA',656),('17','025','TLAQUILTENANGO',657),('19','025','GENERAL ZUAZUA',658),('20','025','CHAHUITES',659),('21','025','AYOTOXCO DE GUERRERO',660),('24','025','SALINAS',661),('26','025','EMPALME',662),('28','025','MIGUEL ALEMAN',663),('29','025','SAN PABLO DEL MONTE',664),('30','025','AYAHUALULCO',665),('31','025','DZAN',666),('32','025','LUIS MOYA',667),('05','026','PROGRESO',668),('07','026','CHENALHO',669),('08','026','GRAN MORELOS',670),('10','026','SAN DIMAS',671),('11','026','ROMITA',672),('12','026','CUETZALA DEL PROGRESO',673),('13','026','HUAZALINGO',674),('14','026','CONCEPCION DE BUENOS AIRES',675),('15','026','CHAPA DE MOTA',676),('16','026','CHINICUILA',677),('17','026','TLAYACAPAN',678),('19','026','GUADALUPE',679),('20','026','CHALCATONGO DE HIDALGO',680),('21','026','CALPAN',681),('24','026','SAN ANTONIO',682),('26','026','ETCHOJOA',683),('28','026','MIQUIHUANA',684),('29','026','SANTA CRUZ TLAXCALA',685),('30','026','BANDERILLA',686),('31','026','DZEMUL',687),('32','026','MAZAPIL',688),('05','027','RAMOS ARIZPE',689),('07','027','CHIAPA DE CORZO',690),('08','027','GUACHOCHI',691),('10','027','SAN JUAN DE GUADALUPE',692),('11','027','SALAMANCA',693),('12','027','CUTZAMALA DE PINZON',694),('13','027','HUEHUETLA',695),('14','027','CUAUTITLAN DE GARCIA BARRAGAN',696),('15','027','CHAPULTEPEC',697),('16','027','CHUCANDIRO',698),('17','027','TOTOLAPAN',699),('19','027','LOS HERRERAS',700),('20','027','CHIQUIHUITLAN DE BENITO JUAREZ',701),('21','027','CALTEPEC',702),('24','027','SAN CIRO DE ACOSTA',703),('26','027','FRONTERAS',704),('28','027','NUEVO LAREDO',705),('29','027','TENANCINGO',706),('30','027','BENITO JUAREZ',707),('31','027','DZIDZANTUN',708),('32','027','MELCHOR OCAMPO',709),('05','028','SABINAS',710),('07','028','CHIAPILLA',711),('08','028','GUADALUPE',712),('10','028','SAN JUAN DEL RIO',713),('11','028','SALVATIERRA',714),('12','028','CHILAPA DE ALVAREZ',715),('13','028','HUEJUTLA DE REYES',716),('14','028','CUAUTLA',717),('15','028','CHIAUTLA',718),('16','028','CHURINTZIO',719),('17','028','XOCHITEPEC',720),('19','028','HIGUERAS',721),('20','028','HEROICA CIUDAD DE EJUTLA DE CRESPO',722),('21','028','CAMOCUAUTLA',723),('24','028','SAN LUIS POTOSI',724),('26','028','GRANADOS',725),('28','028','NUEVO MORELOS',726),('29','028','TEOLOCHOLCO',727),('30','028','BOCA DEL RIO',728),('31','028','DZILAM DE BRAVO',729),('32','028','MEZQUITAL DEL ORO',730),('05','029','SACRAMENTO',731),('07','029','CHICOASEN',732),('08','029','GUADALUPE Y CALVO',733),('10','029','SAN LUIS DEL CORDERO',734),('11','029','SAN DIEGO DE LA UNION',735),('12','029','CHILPANCINGO DE LOS BRAVO',736),('13','029','HUICHAPAN',737),('14','029','CUQUIO',738),('15','029','CHICOLOAPAN',739),('16','029','CHURUMUCO',740),('17','029','YAUTEPEC',741),('19','029','HUALAHUISES',742),('20','029','ELOXOCHITLAN DE FLORES MAGON',743),('21','029','CAXHUACAN',744),('24','029','SAN MARTIN CHALCHICUAUTLA',745),('26','029','GUAYMAS',746),('28','029','OCAMPO',747),('29','029','TEPEYANCO',748),('30','029','CALCAHUALCO',749),('31','029','DZILAM GONZALEZ',750),('32','029','MIGUEL AUZA',751),('05','030','SALTILLO',752),('07','030','CHICOMUSELO',753),('08','030','GUAZAPARES',754),('10','030','SAN PEDRO DEL GALLO',755),('11','030','SAN FELIPE',756),('12','030','FLORENCIO VILLARREAL',757),('13','030','IXMIQUILPAN',758),('14','030','CHAPALA',759),('15','030','CHICONCUAC',760),('16','030','ECUANDUREO',761),('17','030','YECAPIXTLA',762),('19','030','ITURBIDE',763),('20','030','EL ESPINAL',764),('21','030','COATEPEC',765),('24','030','SAN NICOLAS TOLENTINO',766),('26','030','HERMOSILLO',767),('28','030','PADILLA',768),('29','030','TERRENATE',769),('30','030','CAMERINO Z. MENDOZA',770),('31','030','DZITAS',771),('32','030','MOMAX',772),('05','031','SAN BUENAVENTURA',773),('07','031','CHILON',774),('08','031','GUERRERO',775),('10','031','SANTA CLARA',776),('11','031','SAN FRANCISCO DEL RINCON',777),('12','031','GENERAL CANUTO A. NERI',778),('13','031','JACALA DE LEDEZMA',779),('14','031','CHIMALTITAN',780),('15','031','CHIMALHUACAN',781),('16','031','EPITACIO HUERTA',782),('17','031','ZACATEPEC',783),('19','031','JUAREZ',784),('20','031','TAMAZULAPAM DEL ESPIRITU SANTO',785),('21','031','COATZINGO',786),('24','031','SANTA CATARINA',787),('26','031','HUACHINERA',788),('28','031','PALMILLAS',789),('29','031','TETLA DE LA SOLIDARIDAD',790),('30','031','CARRILLO PUERTO',791),('31','031','DZONCAUICH',792),('32','031','MONTE ESCOBEDO',793),('05','032','SAN JUAN DE SABINAS',794),('07','032','ESCUINTLA',795),('08','032','HIDALGO DEL PARRAL',796),('10','032','SANTIAGO PAPASQUIARO',797),('11','032','SAN JOSE ITURBIDE',798),('12','032','GENERAL HELIODORO CASTILLO',799),('13','032','JALTOCAN',800),('14','032','CHIQUILISTLAN',801),('15','032','DONATO GUERRA',802),('16','032','ERONGARICUARO',803),('17','032','ZACUALPAN',804),('19','032','LAMPAZOS DE NARANJO',805),('20','032','FRESNILLO DE TRUJANO',806),('21','032','COHETZALA',807),('24','032','SANTA MARIA DEL RIO',808),('26','032','HUASABAS',809),('28','032','REYNOSA',810),('29','032','TETLATLAHUCA',811),('30','032','CATEMACO',812),('31','032','ESPITA',813),('32','032','MORELOS',814),('05','033','SAN PEDRO',815),('07','033','FRANCISCO LEON',816),('08','033','HUEJOTITAN',817),('10','033','SUCHIL',818),('11','033','SAN LUIS DE LA PAZ',819),('12','033','HUAMUXTITLAN',820),('13','033','JUAREZ HIDALGO',821),('14','033','DEGOLLADO',822),('15','033','ECATEPEC DE MORELOS',823),('16','033','GABRIEL ZAMORA',824),('17','033','TEMOAC',825),('19','033','LINARES',826),('20','033','GUADALUPE ETLA',827),('21','033','COHUECAN',828),('24','033','SANTO DOMINGO',829),('26','033','HUATABAMPO',830),('28','033','RIO BRAVO',831),('29','033','TLAXCALA',832),('30','033','CAZONES DE HERRERA',833),('31','033','HALACHO',834),('32','033','MOYAHUA DE ESTRADA',835),('05','034','SIERRA MOJADA',836),('07','034','FRONTERA COMALAPA',837),('08','034','IGNACIO ZARAGOZA',838),('10','034','TAMAZULA',839),('11','034','SANTA CATARINA',840),('12','034','HUITZUCO DE LOS FIGUEROA',841),('13','034','LOLOTLA',842),('14','034','EJUTLA',843),('15','034','ECATZINGO',844),('16','034','HIDALGO',845),('19','034','MARIN',846),('20','034','GUADALUPE DE RAMIREZ',847),('21','034','CORONANGO',848),('24','034','SAN VICENTE TANCUAYALAB',849),('26','034','HUEPAC',850),('28','034','SAN CARLOS',851),('29','034','TLAXCO',852),('30','034','CERRO AZUL',853),('31','034','HOCABA',854),('32','034','NOCHISTLAN DE MEJIA',855),('05','035','TORREON',856),('07','035','FRONTERA HIDALGO',857),('08','035','JANOS',858),('10','035','TEPEHUANES',859),('11','035','SANTA CRUZ DE JUVENTINO ROSAS',860),('12','035','IGUALA DE LA INDEPENDENCIA',861),('13','035','METEPEC',862),('14','035','ENCARNACION DE DIAZ',863),('15','035','HUEHUETOCA',864),('16','035','LA HUACANA',865),('19','035','MELCHOR OCAMPO',866),('20','035','GUELATAO DE JUAREZ',867),('21','035','COXCATLAN',868),('24','035','SOLEDAD DE GRACIANO SANCHEZ',869),('26','035','IMURIS',870),('28','035','SAN FERNANDO',871),('29','035','TOCATLAN',872),('30','035','CITLALTEPETL',873),('31','035','HOCTUN',874),('32','035','NORIA DE ANGELES',875),('05','036','VIESCA',876),('07','036','LA GRANDEZA',877),('08','036','JIMENEZ',878),('10','036','TLAHUALILO',879),('11','036','SANTIAGO MARAVATIO',880),('12','036','IGUALAPA',881),('13','036','SAN AGUSTIN METZQUITITLAN',882),('14','036','ETZATLAN',883),('15','036','HUEYPOXTLA',884),('16','036','HUANDACAREO',885),('19','036','MIER Y NORIEGA',886),('20','036','GUEVEA DE HUMBOLDT',887),('21','036','COYOMEAPAN',888),('24','036','TAMASOPO',889),('26','036','MAGDALENA',890),('28','036','SAN NICOLAS',891),('29','036','TOTOLAC',892),('30','036','COACOATZINTLA',893),('31','036','HOMUN',894),('32','036','OJOCALIENTE',895),('05','037','VILLA UNION',896),('07','037','HUEHUETAN',897),('08','037','JUAREZ',898),('10','037','TOPIA',899),('11','037','SILAO',900),('12','037','IXCATEOPAN DE CUAUHTEMOC',901),('13','037','METZTITLAN',902),('14','037','EL GRULLO',903),('15','037','HUIXQUILUCAN',904),('16','037','HUANIQUEO',905),('19','037','MINA',906),('20','037','MESONES HIDALGO',907),('21','037','COYOTEPEC',908),('24','037','TAMAZUNCHALE',909),('26','037','MAZATAN',910),('28','037','SOTO LA MARINA',911),('29','037','ZILTLALTEPEC DE TRINIDAD SANCHEZ SANTOS',912),('30','037','COAHUITLAN',913),('31','037','HUHI',914),('32','037','PANUCO',915),('05','038','ZARAGOZA',916),('07','038','HUIXTAN',917),('08','038','JULIMES',918),('10','038','VICENTE GUERRERO',919),('11','038','TARANDACUAO',920),('12','038','ZIHUATANEJO DE AZUETA',921),('13','038','MINERAL DEL CHICO',922),('14','038','GUACHINANGO',923),('15','038','ISIDRO FABELA',924),('16','038','HUETAMO',925),('19','038','MONTEMORELOS',926),('20','038','VILLA HIDALGO',927),('21','038','CUAPIAXTLA DE MADERO',928),('24','038','TAMPACAN',929),('26','038','MOCTEZUMA',930),('28','038','TAMPICO',931),('29','038','TZOMPANTEPEC',932),('30','038','COATEPEC',933),('31','038','HUNUCMA',934),('32','038','PINOS',935),('07','039','HUITIUPAN',936),('08','039','LOPEZ',937),('10','039','NUEVO IDEAL',938),('11','039','TARIMORO',939),('12','039','JUAN R. ESCUDERO',940),('13','039','MINERAL DEL MONTE',941),('14','039','GUADALAJARA',942),('15','039','IXTAPALUCA',943),('16','039','HUIRAMBA',944),('19','039','MONTERREY',945),('20','039','HEROICA CIUDAD DE HUAJUAPAN DE LEON',946),('21','039','CUAUTEMPAN',947),('24','039','TAMPAMOLON CORONA',948),('26','039','NACO',949),('28','039','TULA',950),('29','039','XALOZTOC',951),('30','039','COATZACOALCOS',952),('31','039','IXIL',953),('32','039','RIO GRANDE',954),('07','040','HUIXTLA',955),('08','040','MADERA',956),('11','040','TIERRA BLANCA',957),('12','040','LEONARDO BRAVO',958),('13','040','LA MISION',959),('14','040','HOSTOTIPAQUILLO',960),('15','040','IXTAPAN DE LA SAL',961),('16','040','INDAPARAPEO',962),('19','040','PARAS',963),('20','040','HUAUTEPEC',964),('21','040','CUAUTINCHAN',965),('24','040','TAMUIN',966),('26','040','NACORI CHICO',967),('28','040','VALLE HERMOSO',968),('29','040','XALTOCAN',969),('30','040','COATZINTLA',970),('31','040','IZAMAL',971),('32','040','SAIN ALTO',972),('07','041','LA INDEPENDENCIA',973),('08','041','MAGUARICHI',974),('11','041','URIANGATO',975),('12','041','MALINALTEPEC',976),('13','041','MIXQUIAHUALA DE JUAREZ',977),('14','041','HUEJUCAR',978),('15','041','IXTAPAN DEL ORO',979),('16','041','IRIMBO',980),('19','041','PESQUERIA',981),('20','041','HUAUTLA DE JIMENEZ',982),('21','041','CUAUTLANCINGO',983),('24','041','TANLAJAS',984),('26','041','NACOZARI DE GARCIA',985),('28','041','VICTORIA',986),('29','041','PAPALOTLA DE XICOHTENCATL',987),('30','041','COETZALA',988),('31','041','KANASIN',989),('32','041','EL SALVADOR',990),('07','042','IXHUATAN',991),('08','042','MANUEL BENAVIDES',992),('11','042','VALLE DE SANTIAGO',993),('12','042','MARTIR DE CUILAPAN',994),('13','042','MOLANGO DE ESCAMILLA',995),('14','042','HUEJUQUILLA EL ALTO',996),('15','042','IXTLAHUACA',997),('16','042','IXTLAN',998),('19','042','LOS RAMONES',999),('20','042','IXTLAN DE JUAREZ',1000),('21','042','CUAYUCA DE ANDRADE',1001);
/*!40000 ALTER TABLE `gen_municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gru_detalles_grupos`
--

DROP TABLE IF EXISTS `gru_detalles_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gru_detalles_grupos` (
  `id_detalles_grupos` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_detalles_grupos`),
  KEY `grupos` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gru_detalles_grupos`
--

LOCK TABLES `gru_detalles_grupos` WRITE;
/*!40000 ALTER TABLE `gru_detalles_grupos` DISABLE KEYS */;
INSERT INTO `gru_detalles_grupos` VALUES (61,2,38,'2014-01-01'),(69,5,39,'2015-09-22');
/*!40000 ALTER TABLE `gru_detalles_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gru_examen`
--

DROP TABLE IF EXISTS `gru_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gru_examen` (
  `id_examen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `oportunidad` int(11) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_examen` varchar(15) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  PRIMARY KEY (`id_examen`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gru_examen`
--

LOCK TABLES `gru_examen` WRITE;
/*!40000 ALTER TABLE `gru_examen` DISABLE KEYS */;
INSERT INTO `gru_examen` VALUES (7,'PRIMER EXAMEN',1,'7-9','2014-12-05','EXANI II',1),(8,'EXAMEN DOS',2,'9-11','2015-01-30','EXANI II',1),(9,'TERCER EXAMEN',3,'10-12','2015-10-30','EXANI II',1),(10,'PRIMER',1,'MATUTINO','2016-06-20','ADMISION',3);
/*!40000 ALTER TABLE `gru_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gru_examen_alumno`
--

DROP TABLE IF EXISTS `gru_examen_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gru_examen_alumno` (
  `id_gru_examen_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `folio_ceneval` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_gru_examen_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gru_examen_alumno`
--

LOCK TABLES `gru_examen_alumno` WRITE;
/*!40000 ALTER TABLE `gru_examen_alumno` DISABLE KEYS */;
INSERT INTO `gru_examen_alumno` VALUES (1,123456789,711,2),(2,987654321,712,5),(3,2147483647,2147483647,7);
/*!40000 ALTER TABLE `gru_examen_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gru_grupos`
--

DROP TABLE IF EXISTS `gru_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gru_grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `cupo_max` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `aplicador` varchar(60) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gru_grupos`
--

LOCK TABLES `gru_grupos` WRITE;
/*!40000 ALTER TABLE `gru_grupos` DISABLE KEYS */;
INSERT INTO `gru_grupos` VALUES (38,'GRUPO DE SISTEMA','VESPERTINO',30,7,2,1,'JOSE PEREZ MARTINEZ'),(39,'GRUPO DE INFORMATICA','MATUTINO',2,7,1,2,'JUAN LOPEZ REYES');
/*!40000 ALTER TABLE `gru_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins_inscripcion`
--

DROP TABLE IF EXISTS `ins_inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins_inscripcion` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inscripcion`),
  KEY `alu_alumno-ins_inscripcion_idx` (`id_alumno`),
  KEY `basCiclo-InsInscripcion_idx` (`id_ciclo`),
  CONSTRAINT `basCiclo-InsInscripcion` FOREIGN KEY (`id_ciclo`) REFERENCES `bas_ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins_inscripcion`
--

LOCK TABLES `ins_inscripcion` WRITE;
/*!40000 ALTER TABLE `ins_inscripcion` DISABLE KEYS */;
INSERT INTO `ins_inscripcion` VALUES (0,'2007-06-05','2016-06-08',2,3,2,2,3),(17,'2000-06-01','2016-06-07',1,3,2,2,3),(20,'2007-06-05','2016-06-08',4,3,2,2,3),(21,'2007-06-05','2016-06-08',5,3,2,2,3),(22,'2005-06-07','2016-06-09',6,3,2,1,3),(23,'2016-06-09','2016-12-09',7,3,2,1,3),(24,'2016-06-08','2016-12-09',3,3,2,1,3),(25,'2016-06-07','2017-06-13',8,3,2,2,4),(26,'1999-06-02','2016-06-09',1,3,5,1,3),(27,'2016-05-05','2034-07-06',2,3,5,1,3),(28,'2016-05-30','2016-06-30',3,3,5,2,3),(29,'2016-06-08','2016-06-09',4,3,5,1,3),(30,'2016-06-07','2016-06-30',5,3,5,2,3),(31,'2016-06-04','2017-06-22',1,3,7,2,3);
/*!40000 ALTER TABLE `ins_inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_modulos`
--

DROP TABLE IF EXISTS `sys_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_modulos`
--

LOCK TABLES `sys_modulos` WRITE;
/*!40000 ALTER TABLE `sys_modulos` DISABLE KEYS */;
INSERT INTO `sys_modulos` VALUES (6,'Alumnos'),(7,'Base'),(8,'Configuracion'),(9,'Escuela'),(10,'Examen'),(11,'Reportes');
/*!40000 ALTER TABLE `sys_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_permisos_usuarios`
--

DROP TABLE IF EXISTS `sys_permisos_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_permisos_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_permiso`),
  KEY `permisos_procesos_idx` (`id_proceso`),
  KEY `permisos_usuarios_idx` (`id_usuario`),
  CONSTRAINT `permisos_procesos` FOREIGN KEY (`id_proceso`) REFERENCES `sys_procesos` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `permisos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `sys_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_permisos_usuarios`
--

LOCK TABLES `sys_permisos_usuarios` WRITE;
/*!40000 ALTER TABLE `sys_permisos_usuarios` DISABLE KEYS */;
INSERT INTO `sys_permisos_usuarios` VALUES (1,53,124),(1,54,125),(1,55,126),(1,56,127),(1,57,128),(1,58,129),(1,59,130),(1,60,131),(1,61,132),(1,62,133),(1,63,134),(1,64,135),(1,65,136),(1,66,137),(1,68,139),(1,53,141);
/*!40000 ALTER TABLE `sys_permisos_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_procesos`
--

DROP TABLE IF EXISTS `sys_procesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_procesos` (
  `id_proceso` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `proceso` varchar(120) NOT NULL,
  `etiqueta` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_proceso`),
  KEY `procesos_modulos_idx` (`id_modulo`),
  CONSTRAINT `procesos_modulos` FOREIGN KEY (`id_modulo`) REFERENCES `sys_modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_procesos`
--

LOCK TABLES `sys_procesos` WRITE;
/*!40000 ALTER TABLE `sys_procesos` DISABLE KEYS */;
INSERT INTO `sys_procesos` VALUES (53,'proceso','aluAlumno','Alumnos','index.php?r=aluAlumno/admin',6),(54,'proceso','aluParentesco','Parentesco','index.php?r=aluParentesco/admin',6),(55,'proceso','basPlanEstudios','Plan Estudios','index.php?r=basPlanEstudios/admin',7),(56,'proceso','basCarreras','Carreras','index.php?r=basCarreras/admin',7),(57,'proceso','sysModulos','Modulos','index.php?r=sysModulos/admin',8),(58,'proceso','sysProcesos','Procesos','index.php?r=sysProcesos/admin',8),(59,'proceso','sysPermisos','Permisos','index.php?r=sysPermisos/admin',8),(60,'proceso','Usuarios','Usuarios','index.php?r=usuarios/admin',8),(61,'proceso','BasCiclo','Ciclos','index.php?r=basCiclos/admin',7),(62,'proceso','BasPeriodo','Periodos','index.php?r=basPeriodo/admin',7),(63,'proceso','escAulas','Aulas','index.php?r=escAulas/admin',9),(64,'proceso','escEdificios','Edificios','index.php?r=escEdificios/admin',9),(65,'proceso','escEscuelas','Escuelas','index.php?r=escEscuelas/admin',9),(66,'proceso','escInstitucion','Institucion','index.php?r=escInstitucion/admin',9),(68,'proceso','gruExamen','Examen','index.php?r=gruExamen/admin',10),(69,'Proceso','basNiveles','Niveles','index.php?r=basNiveles/admin',7);
/*!40000 ALTER TABLE `sys_procesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_usuarios`
--

DROP TABLE IF EXISTS `sys_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `roles` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_usuarios`
--

LOCK TABLES `sys_usuarios` WRITE;
/*!40000 ALTER TABLE `sys_usuarios` DISABLE KEYS */;
INSERT INTO `sys_usuarios` VALUES (1,'admin','admin','admin','admin','admin');
/*!40000 ALTER TABLE `sys_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-10 11:02:17
