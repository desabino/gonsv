-- CREATE DATABASE  IF NOT EXISTS `sabino_dev_gonsv` /*!40100 DEFAULT CHARACTER SET utf8 */;
-- USE `sabino_dev_gonsv`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: sabino_dev_gonsv
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.12.04.1

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
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta` (
  `conta_id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`conta_id`),
  KEY `tipo_conta_idx` (`tipo`),
  CONSTRAINT `tipo_conta` FOREIGN KEY (`tipo`) REFERENCES `conta_tipo` (`conta_tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `conta_tipo`
--

DROP TABLE IF EXISTS `conta_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta_tipo` (
  `conta_tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `texto_identificacao` varchar(15) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  PRIMARY KEY (`conta_tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estado_civil`
--

DROP TABLE IF EXISTS `estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_civil` (
  `estado_civil_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_civil_nome` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`estado_civil_id`),
  KEY `estado_civil_nome` (`estado_civil_nome`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ministerios`
--

DROP TABLE IF EXISTS `ministerios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ministerios` (
  `ministerio_id` int(11) NOT NULL AUTO_INCREMENT,
  `ministerio_nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `detalhes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ministerio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `pessoa_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `endereco` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular2` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newsletter` tinyint(4) DEFAULT NULL,
  `paroquia` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `batizado` tinyint(4) DEFAULT NULL,
  `batizado_em_qual_igreja` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catequese` tinyint(4) DEFAULT NULL,
  `crisma` tinyint(4) DEFAULT NULL,
  `estado_civil` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `casado_em_qual_igreja` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `participou_go_rcc` tinyint(4) DEFAULT NULL,
  `quanto_tempo` text COLLATE utf8_unicode_ci,
  `data_cadastro` datetime DEFAULT NULL,
  `observacao` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`pessoa_id`),
  KEY `estado_civil` (`estado_civil`)
) ENGINE=MyISAM AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servo_ministerio`
--

DROP TABLE IF EXISTS `servo_ministerio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servo_ministerio` (
  `servo_id` int(11) NOT NULL,
  `ministerio_id` int(11) NOT NULL,
  `data_inicio` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`servo_id`,`ministerio_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servos`
--

DROP TABLE IF EXISTS `servos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servos` (
  `servo_id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `data_inicio` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`servo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-29 11:35:12
