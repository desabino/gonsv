CREATE DATABASE  IF NOT EXISTS `sabino_dev_gonsv` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sabino_dev_gonsv`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta_tipo`
--

LOCK TABLES `conta_tipo` WRITE;
/*!40000 ALTER TABLE `conta_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta_tipo` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `estado_civil`
--

LOCK TABLES `estado_civil` WRITE;
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` VALUES (1,'solteiro(a)'),(2,'casado(a)'),(3,'viuvo(a)'),(4,'separado(a)'),(5,'divorciado(a)'),(6,'união estável');
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `ministerios`
--

LOCK TABLES `ministerios` WRITE;
/*!40000 ALTER TABLE `ministerios` DISABLE KEYS */;
INSERT INTO `ministerios` VALUES (1,'Oração por Cura e Libertação',NULL),(2,'Intercessão',NULL),(3,'Música e Artes',NULL),(4,'Acolhida',NULL),(5,'Crianças',NULL),(6,'Comunicação',NULL),(7,'Coordenação',NULL),(8,'Jovem',NULL),(9,'Pregação',NULL);
/*!40000 ALTER TABLE `ministerios` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (68,'Abraão Francisco da Costa',NULL,'Rua São Caetano,151 Jd. Esperança',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S. Joao Batista',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,'Ademir Vilacio Pinto','2013-12-01','R. José Fiariolini,755',NULL,NULL,NULL,NULL,NULL,'02078020',NULL,NULL,'11974692507',NULL,'ademirtele@hotmail.com',1,'Igreja da Boa Morte (SÈ)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,'Adriana Andrade de Santana','2013-06-08','Rua Indio Peri,1036',NULL,NULL,'Jd. Peri',NULL,NULL,NULL,'1122570676',NULL,'11998355917',NULL,'adri.as2010@gmail.com',1,'Comunidade São Marcos',1,'N. Sra da Penha',1,1,'1','Casou-se na Comunidade São Marcos',1,NULL,NULL,NULL),(71,'Andressa Cristina dos Santos','1989-11-29','Rua Lauro de Freitas, 90',NULL,'Bl. D ap.54 conj A17',NULL,NULL,NULL,NULL,'1122144668',NULL,NULL,NULL,NULL,NULL,'Comunidade Católica Eucaristós',1,NULL,1,1,'2',NULL,1,'7 anos',NULL,NULL),(72,'Andreza Rodrigues','1982-02-09','Rua Constancio Teani, 116',NULL,NULL,'V. Aurora',NULL,NULL,NULL,NULL,NULL,'11965113880',NULL,NULL,NULL,'São Domingos Sávio',1,'S. Domingos Sávio',1,1,'1',NULL,1,NULL,NULL,NULL),(73,'Ariovaldo Aparecido Cruz','2013-09-05','Av. Cesario Lange, 315',NULL,NULL,NULL,NULL,NULL,'07143350','1122233702',NULL,NULL,NULL,'acruz.cnsp@infraero.gov.br',1,'N. Sra da Boa Morte (SÈ)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,'Brunna Loiola Paixão','2002-05-19','R. Chemin Del Prá, 98',NULL,NULL,'Santana','SP',NULL,'02016060','1129596725',NULL,NULL,NULL,NULL,NULL,'Santana',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(75,'Camila Braconaro Tenreiro','1981-11-06','Rua Bartolomeu Dizniz, 73',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11986113018',NULL,NULL,NULL,'Santo Antonio do Lauzane',1,NULL,1,1,'1',NULL,NULL,NULL,NULL,NULL),(76,'Carmen B. Silva','2013-11-21','R. dos Coqueiros, 312',NULL,NULL,NULL,NULL,NULL,'02312010','1122043864',NULL,NULL,NULL,NULL,NULL,'Sto. Antonio Vila Mazzei',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,'Conceição Vasconcelos Batista Vilero','2013-09-17','R. Vicente Dione, 42',NULL,NULL,NULL,NULL,NULL,NULL,'1122399441',NULL,NULL,NULL,NULL,NULL,'N. Sra de Fátima - Imirim',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,'Cristiane Oliveira','2013-08-27','Alameda Afonso Schimidh, 170',NULL,NULL,NULL,NULL,NULL,'02450000','1123669980',NULL,NULL,NULL,'chrisstar@ig.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(79,'Damião Dantas dos Santos','2013-10-15','R. Benedito Egídio Barbosa, 247',NULL,NULL,NULL,NULL,NULL,'02846200','1139213943',NULL,NULL,NULL,'damiao_dantas@ig.com.br',1,'Com. N. Sra de Lourdes/ Parq. Sta Terezinha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(80,'Derci Souza Goes','2013-02-22','R. Antonio de Oliveira',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11998624448',NULL,NULL,NULL,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(190,'Ana Lúcia A Nascimento',NULL,'Rua Cirene Oliveira Laet, 27',NULL,'casa 1',NULL,NULL,NULL,NULL,'1122411074',NULL,'11986377270',NULL,NULL,NULL,'São Benedito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,'Diego Ribeiro da Costa','2013-01-15','R. São Cirilo de Jerusalem, 31',NULL,NULL,NULL,NULL,NULL,'02362125','1129955422',NULL,'11970126364',NULL,NULL,NULL,'Natividade do Senhor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(83,'Diva Miranda Teixeira','1966-08-24','Praça Hilário da Conceição, 369 ',NULL,'ap.36 ','Imirim',NULL,NULL,NULL,NULL,NULL,'11992640445',NULL,NULL,NULL,NULL,1,NULL,1,1,'2','PUC Perdizes',1,NULL,NULL,NULL),(84,'Edivania Vieira da Silva','2013-10-12','Rua Cruz de Malta, 177 Parada Inglesa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Santa Luzia',1,'na Bahia Comunidade são João Batista',1,1,'1',NULL,1,NULL,NULL,NULL),(85,'Eduardo José Brussi','2013-01-31','Av. Agua Fria, 516 ap 63 Agua Fria',NULL,NULL,NULL,NULL,NULL,'02332000','1135788139',NULL,NULL,NULL,'edubrussi@globo.com',1,'N. Sra da Salette',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,'Elaine Cristina Pirola','2013-08-04','Av. Agua Fria, 516 ap 63 Agua Fria',NULL,NULL,NULL,NULL,NULL,'02332000','1135788139',NULL,NULL,NULL,'elainepirola@globo.com',1,'N. Sra da Salette',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(87,'Elaine Cristine Pinheiro Silva','1972-06-02','Rua Vitalina Moura 180',NULL,'Bl I ap.061',NULL,NULL,NULL,NULL,NULL,NULL,'11986974077',NULL,NULL,NULL,'N. Sra. das Dores',1,NULL,1,1,'1',NULL,1,'5 anos',NULL,NULL),(88,'Elisa Cristina Iório','2013-03-11','R. Manoel de Oliveira Pessoa Jr, 138',NULL,NULL,NULL,NULL,NULL,'02471200','1138589543',NULL,'11987017574',NULL,'ec.iorio@gmail.com',1,'Santana',1,'N. Sra de Fátima Imirim',1,1,'1',NULL,1,'10 anos',NULL,NULL),(89,'Fabiana Cristina Cruz Santos',NULL,'Rua Ada Bentelli Frasson,66',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11959996633',NULL,'fabianacruzcruz@yahoo.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(90,'Fatima Rosana Santos da Silva','1964-05-12','Rua Epaminondas Melo do Amaral, 854',NULL,'casa 3',NULL,NULL,NULL,NULL,'1122387379',NULL,NULL,NULL,NULL,NULL,'Santana',1,'N. Sra de Fátima Imirim',1,1,'1',NULL,1,'2 anos',NULL,NULL),(91,'Francisca Martins Fernandes','2013-03-10','Av. Dep. Cantídio Sampaio, 4822',NULL,NULL,NULL,NULL,NULL,NULL,'1139794998',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(92,'Gladys Zunilda Bazan de Noieder','1964-02-01','R. Domingues Guedes de Cabral, 213',NULL,'ap 05',NULL,NULL,NULL,'02422190','1122322851',NULL,'11970294096',NULL,'gladysnb1964@hotmail.com',1,'Sto. Antonio dos Bancários',1,NULL,1,1,'2','Nossa Senhora do Paraiso',0,NULL,NULL,'gladysnoieder@gmail.com'),(93,'Hiney de Oliveira Gomes',NULL,'Rua Tatanio Pacheco, 51 Lauzane Paulista',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11983105101',NULL,'oliveiray@yahoo.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'oliveirahy@yahoo.com.br'),(94,'Hana Bazan Noieder','2013-05-06','R. Domingues Guedes de Cabral, 213',NULL,'ap 05',NULL,NULL,NULL,'02422190','1122322851',NULL,'11970294096',NULL,'hanassad.1@hotmail.com',1,'Sto. Antonio dos Bancários',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,'Izilda Martins Nwryes','2013-01-28','R. Salete, 222 ap 5 B',NULL,NULL,NULL,NULL,NULL,'02016000',NULL,NULL,'11963524631',NULL,NULL,NULL,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(96,'Jeniffer Aparecida Silva','1997-06-10','Rua Constancio Teani, 116 ',NULL,NULL,'V. Aurora',NULL,NULL,NULL,NULL,NULL,'11989918090',NULL,NULL,NULL,'São Domingos Sávio',1,'S. Domingos Sávio',1,1,'1',NULL,1,NULL,NULL,NULL),(97,'João Batista dos Santos Filho',NULL,'Rua Domingos Villea,205',NULL,NULL,NULL,NULL,NULL,NULL,'1139812513',NULL,NULL,NULL,NULL,NULL,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(98,'João Paulo Pasquim Fernandes','2013-11-15','R. Mar do Labrador,120 - Jd. Ninho Verde',NULL,NULL,NULL,NULL,NULL,'05215026',NULL,NULL,'11973766890',NULL,'jp_pf@hotmail.com',1,'São Luiz Maria Monfort',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,'Jucilene Gomes da Silva Aguiar',NULL,'Rua Engenheiro Botelho Egas, 25',NULL,NULL,NULL,NULL,NULL,NULL,'1127379561',NULL,'78258546',NULL,'gomesjuci@hotmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(100,'Karen Cristina','2013-06-27','R. dos Coqueiros, 312',NULL,NULL,NULL,NULL,NULL,'02312010',NULL,NULL,'11977104091',NULL,'karenrara@gmail.com',1,'Sto. Antonio Vila Mazzei',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(101,'Katia Cristina Martins da Eira','1991-06-23','R. Henrique de Brita, 136',NULL,NULL,NULL,NULL,NULL,'02610030',NULL,NULL,'11970112211',NULL,NULL,NULL,'N. Sra das Graças',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(102,'Katia Madureira','2013-06-17','R. Julio Dantas, 126',NULL,NULL,NULL,NULL,NULL,'02671070',NULL,NULL,'11991218182',NULL,'ksmadureira@uol.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(103,'Ketelyn Carolin R. Soares','1999-10-03','Rua Constancio Teani, 116',NULL,NULL,'V. Aurora',NULL,NULL,NULL,NULL,NULL,'11966902093',NULL,NULL,NULL,'São Domingos Sávio',1,'S. Domingos Sávio',1,1,'1',NULL,1,NULL,NULL,NULL),(104,'Lourdes Pereira da Silva','2013-06-06','R. José Gomes de Gouveia,78',NULL,NULL,NULL,NULL,NULL,'02180120','1122416800',NULL,NULL,NULL,'lourdespsilva@hotmail.com',1,'São Luiz Gonzaga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,'Marcela da Silva','1980-08-20','Rua Charles Cameron, 11A',NULL,'VL 88',NULL,NULL,NULL,NULL,NULL,NULL,'11957505225',NULL,NULL,NULL,NULL,1,NULL,1,1,'1',NULL,1,'2 anos',NULL,NULL),(106,'Maria Angelina Nobrega Teixeira','2013-02-18','R. Adulai Estavonson, 77',NULL,NULL,NULL,NULL,NULL,NULL,'1122565576',NULL,NULL,NULL,NULL,NULL,'N. Sra. de Fatima do Imirim',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(107,'Maria Aparecida Paixão','2013-05-18','R. Chemin Del Prá, 98',NULL,NULL,NULL,NULL,NULL,'02016060','1129596725',NULL,NULL,NULL,NULL,NULL,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(108,'Maria Chs de Mello',NULL,'R. Condessa Matarazzo, 43  casa 3 -Jd. Peri',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11985909843',NULL,NULL,NULL,'N. Sra da Penha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(109,'Maria de Fatima de M.','2013-06-02','R. Marechal Hermes da Fonseca, 91A ap 82',NULL,NULL,NULL,NULL,NULL,'02020000','1129732431',NULL,NULL,NULL,NULL,NULL,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(110,'Maria de Fátima L. Roza Silva','2013-03-10','R. Dr. João Batista Soares Faria,89 ap.132',NULL,NULL,NULL,NULL,NULL,'02403050','1125929974',NULL,NULL,NULL,'fatimalima.rs@hotmail.com',1,'Santana/ Sta. Terezinha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(111,'Maria Gomes de Sena Mota',NULL,'Rua Padre xxxxxxxxxx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11980898310',NULL,NULL,NULL,'Mandaqui',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(112,'Maria Glorinha  Paula de Jesus','1965-03-21','R. Benetto Bonfigli, 398',NULL,NULL,NULL,NULL,NULL,'02564040',NULL,NULL,'11994915011',NULL,NULL,NULL,'Santis1a Trindade',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,'Maria Rita Mentes Rodrigues','1960-03-21','R. Domingos da Costa Mota, 484',NULL,NULL,'Jardiom do Colégio',NULL,NULL,'02405100','1122831861',NULL,'11987756398',NULL,NULL,NULL,'Santana',1,NULL,1,1,'2','Santa Terezinha',1,'6 anos',NULL,NULL),(114,'Martha Maria Profili','2013-01-18','R. Padre Paulo Ravier, 54',NULL,NULL,NULL,NULL,NULL,'02408060','1127375867',NULL,NULL,NULL,'martha.profili@terra.com.br',1,'Santana / Sta. Luzia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(115,'Michell Vasilios Musadis','2013-08-07','R. Eduardo Nobre, 34',NULL,NULL,NULL,NULL,NULL,'02315110','1126677386',NULL,'11960965083',NULL,'michell.musadis@gmail.com',1,'Nossa Senhora',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,'Moisés Monteiro de Lima Amaral','1993-04-17','Rua Conselheiro Moreira de Barros,864',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(117,'Nelson Borges Souza','2013-02-16','R. Duarte de Azevedo, 599',NULL,NULL,NULL,NULL,NULL,'02036022',NULL,NULL,'11964584354',NULL,'didito_38@hotmail.com',NULL,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,'Paola Batista da Silva','1992-08-14','Rua Charles Cameron, 94',NULL,NULL,NULL,NULL,NULL,NULL,'1125017972',NULL,'11967256058',NULL,NULL,NULL,'Santana',1,'São José',1,1,'1',NULL,1,NULL,NULL,NULL),(119,'Paulo Ferreira dos Santos','2013-07-28','Al. Dos Eucalíptos, 251 Jd. Joana D´Ark',NULL,NULL,NULL,NULL,NULL,NULL,'1129956146',NULL,NULL,NULL,'paulo.pfg01@gmail.com',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(120,'Rachel Mari Magalhães','2013-09-27','R. José de Albuquerque Medeiros, 344',NULL,NULL,NULL,NULL,NULL,'02336000','1129522178',NULL,NULL,NULL,'rachel_mmagalhães@hotmail.com',NULL,'N. Sra da Salette',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,'Rafaela Silva Pereira Monteiro Ferrari','2013-11-04','R. Santo Egídio, 105',NULL,'ap 42',NULL,NULL,NULL,'02461010','1129787410',NULL,NULL,NULL,'rafaelamferrari@gmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(122,'Roberto M.Ferrari','2013-05-19','R.Santo Egídio 105, ap 42',NULL,NULL,NULL,NULL,NULL,'02461010',NULL,NULL,'11966443212',NULL,'robertomferrari@gmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(123,'Samiller Albuquerque de Menezes','1987-12-31','Rua Américo Pardini, 90',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11998080094',NULL,NULL,NULL,'São Gabriel',1,'N. Sra da Anunciação',1,1,'1',NULL,1,'algumas vezes',NULL,NULL),(124,'Sandra Cristina da Silva e Silva','2013-11-03','R. Maestro Baaissi',NULL,NULL,NULL,NULL,NULL,'02410145','1122031008',NULL,'11967256058','11948819090','sandra.cris2@bol.com.br',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,'Silene L. Miranda','1981-02-02','Rua Vasco Cinquini, 70',NULL,NULL,NULL,NULL,NULL,NULL,'1125891653',NULL,NULL,NULL,NULL,NULL,'Santana',1,'católica',1,1,NULL,NULL,1,'14 anos',NULL,NULL),(126,'Sol Mesquita Lourenço',NULL,'Rua Antonio Quintiliano, 99 ap.36 Bl 12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11968122219',NULL,'japa.mesquita@gmail.com',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,'Sonia Rosey T. C.','1960-12-10','Rua  Prof. Anesia Limeira, 135',NULL,NULL,'Lauzane Pta.',NULL,NULL,NULL,NULL,NULL,'11980233169',NULL,NULL,NULL,'N. Sra. Aparecida e São Mathias',1,'na Bahia',1,1,'2','Santana',1,NULL,NULL,NULL),(128,'Talita Aparecida Martins Silva','1991-10-08','Rua Francisco Alves,76',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11976270056',NULL,NULL,NULL,'nenhuma',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(129,'Talitta Nascimento Silva Sabino','1986-11-26','Rua Alto de Montalegre, 280',NULL,NULL,'Lauzane Paulista','São Paulo','SP','02443050',NULL,NULL,'11941663116',NULL,'talitta_nasc@yahoo.com.br',1,'Sant´Ana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-06 13:23:33',NULL),(130,'Valeria Falcão Lima','2013-09-05','R. Alberto Lonhoff -  Lauzane Pta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11960910845',NULL,'vallimabs@hotmail.com',1,'N. Sra Aparecida e São Mathias',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(131,'Valeria S. Fuentis Lira','2013-05-13','R. Moreira de Vasconcelos, 184',NULL,NULL,NULL,NULL,NULL,'02131090',NULL,NULL,'11983820842',NULL,'valeriafuentislima@hotmail.com',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,'Victor Eduardo Sayeg','1996-07-17','Rua Pena Dourada, 60',NULL,NULL,'Jd. Donária',NULL,NULL,NULL,'1139495870',NULL,'11954493098',NULL,NULL,NULL,'S. Luiz Maria G. de Monfort',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(133,'Waldemir Aparecido Rodrigues','1960-09-08','R. Domingos da Costa Mota, 484',NULL,NULL,'Jardim do Colégio',NULL,NULL,'02405100','1122831861',NULL,'11987756398',NULL,NULL,NULL,'Santana',1,'Nossa Senhora Aparecida',1,1,'2','Santa Terezinha',1,'6 anos',NULL,NULL),(134,'André dos Santos Sabino','1984-01-30','Rua Alto de Montalegre, 280',NULL,NULL,'Lauzane Paulista','São Paulo','SP','02443050','1131889618',NULL,'11941663154',NULL,'de_ssabino@yahoo.com.br',1,'Santana',1,'São José do Mandaqui',1,1,'2','Santa Inês',1,'10 anos','2013-12-06 13:25:39',NULL),(135,'Andrea Cristine Barbieri Ferreira','2013-07-10','Av. João Pessoa, 363',NULL,NULL,'Lauzane Paulista','São Paulo','SP','22327359',NULL,NULL,NULL,NULL,'galganiac@hotmail.com',1,'Santana',1,NULL,1,1,'1',NULL,1,'23 anos','2013-12-06 13:25:39',NULL),(163,'Marco Antonio Gomes de Toledo',NULL,'Rua Voluntários da Pátria, 4212',NULL,'Ap 114','Mandaqui','São Paulo','SP',NULL,NULL,'1122336148','11986117523',NULL,'toledo@feinkost.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Espírita, não frequenta o centro, 1º casamento na igreja, foi batizado e crismado. Separou e viveu um segundo casamento e teve 1ª filha. Hoje está vivendo sozinho'),(164,'Henrique Rodrigo Bacellar da Silva',NULL,'Rua das Margaridas, 361',NULL,NULL,NULL,NULL,NULL,NULL,'1122615420','1129915953','11982754964',NULL,'blodigo26@gmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(165,'Luciene Solera Augusto','1981-12-22','Rua Voluntários da Pátria, 2153',NULL,NULL,'Santana','São Paulo','SP',NULL,'1129501953',NULL,'11981724173',NULL,'lucienesolera@yahoo.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(166,'Edgar Augusto dos Santos','1981-03-18','Rua Genebra, 50',NULL,'Bloco 01 apto 21',NULL,NULL,NULL,NULL,NULL,NULL,'11987909838',NULL,'edgaraugusto18@yahoo.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(167,'Carlos Eduardo de Almeida Alves',NULL,'Rua Alfredo Pujol, 266',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11991015820',NULL,'paipuc@yahoo.com.br',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(168,'Karla Aparecida de Oliveira',NULL,'Rua Laura Jaques Garcia, 112',NULL,NULL,NULL,NULL,NULL,NULL,'1124512880',NULL,'11989915853',NULL,'karla_oliveira22@yahoo.com.br',1,'Santa Rita de Cassia – Jd. Palmeira – Guarulhos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,'Maria do Carmo Teixeira',NULL,'Rua Guilherme Bude, 109',NULL,'2',NULL,NULL,NULL,NULL,'1129961180',NULL,'11993569367',NULL,NULL,NULL,'Nossa Senhora do Carmo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,'Angela dos Santos',NULL,'Rua D. Mariana Caligiori Ronchetti, 1141',NULL,NULL,NULL,NULL,NULL,NULL,'1122325138',NULL,'11995902560',NULL,'angela_baile@live.com',1,'Nossa Senhora da Penha – Lauzane',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,'Padre antonio Laureano',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'antoniolaureano@hotmail.com',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,'Elisabethe da Paixão Faria Santos',NULL,'Rua Porto Seguro, 19',NULL,NULL,'Vila Rica',NULL,NULL,NULL,NULL,NULL,'11982112951',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,'Regina Lucia Sampaio Guglulmi',NULL,'Avenida Dr Arthur de Andrade Filho, 870',NULL,NULL,NULL,NULL,NULL,NULL,'1144850278',NULL,'11996268986',NULL,'relusampaio@hotmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(174,'Deiana Bazan Noieder','2013-11-25','Rua Camarajé, 109',NULL,'Apto 74',NULL,NULL,NULL,NULL,'1129967642',NULL,'11968320242',NULL,'dbnoieder@aatbrasil.com.br',1,'Santa Luzia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(175,'Marcelina',NULL,'Rua Viela Vigario Marcos Mendes\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11987371778','11971665903','marcelina08@hotmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,'Leiziene Pinto da Silva','1985-05-09','Rua Olavo Egidio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11986334651',NULL,NULL,NULL,'Nossa Senhora da Paz',1,NULL,1,1,'1',NULL,1,'3 anos',NULL,NULL),(177,'Bruno Conceição da Silva','1989-10-18','Rua Flavio Dohobcki, 524',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'11962317038',NULL,NULL,NULL,'Santana',1,NULL,1,1,'1',NULL,1,'8 meses',NULL,NULL),(178,'Ataniel Manoel Siqueira','1972-11-23','Rua das Margaridas, 361',NULL,NULL,'Jardim Bela Vista – Terra Preta','Mairiporã','SP',NULL,'1122615420',NULL,'77627917',NULL,NULL,NULL,NULL,1,NULL,1,1,'6',NULL,1,NULL,NULL,NULL),(179,'Aline Neves','1990-05-26','Estrada São Francisco, 1592',NULL,'Apto 93 bloco 1',NULL,NULL,NULL,NULL,'1147016960',NULL,NULL,NULL,'alinedfn@hotmail.com',1,'Santíssimo Sacramento – Diocese de Campo Limpo',1,'Igreja católica',1,1,'1',NULL,1,NULL,NULL,NULL),(180,'Andreza de Oliveira Mendes','1986-09-03','Rua Projetada, 32',NULL,NULL,'Vila Nova Galvão',NULL,NULL,NULL,'1122672271',NULL,NULL,NULL,'andreza@lufan.com.br',1,'São José Operário',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(181,'Maria da Guia dos Santos Torres','1965-04-15','Rua Conselheiro Moreira de Barros, 1052',NULL,NULL,'Santa Terezinha','São Paulo','SP',NULL,'1129595813',NULL,'67494218',NULL,NULL,NULL,'Santa Terezinha',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(182,'Elaine Costa Goulart','1985-11-12','Rua Melanda, 128',NULL,NULL,'Jaçanã','São Paulo','SP','02318380',NULL,NULL,'11964865212',NULL,'elaine_goulart@globo.com',1,'Nossa Senhora do Carmo',1,NULL,1,1,'1',NULL,1,'por pouco tempo',NULL,NULL),(183,'Anaides Dias da Trindade','1961-05-03','Rua Olavo Egidio',NULL,NULL,'Santana','São Paulo','SP',NULL,'1141001199',NULL,'11979641411',NULL,NULL,NULL,NULL,1,NULL,1,1,'2','Nossa Senhora da Paz',1,'25 anos',NULL,NULL),(184,'Jaime Andrade Campos','1959-12-12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(185,'Thainá Renata de Deus Catvalho','1997-07-15','Rua Dr Cantansio Teani',NULL,NULL,NULL,NULL,NULL,NULL,'1134764916',NULL,NULL,NULL,NULL,NULL,'Santana',1,'Nossa Senhora Salette',1,1,'1',NULL,1,NULL,NULL,NULL),(186,'Juana Fernandes','1956-03-15','Rua São Joaquim, 592',NULL,'Apto 22',NULL,NULL,NULL,NULL,'1133412408',NULL,NULL,NULL,NULL,NULL,'Nossa Senhora do Líbano',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(187,'Hercilia Ludigard Santos das Neves','1976-04-14','Rua Alvirá, 151',NULL,NULL,NULL,NULL,NULL,NULL,'1122394885',NULL,NULL,NULL,NULL,NULL,'Santana',1,'Trindade',1,1,'1',NULL,1,NULL,NULL,NULL),(188,'Camila Lucas Marques','1990-02-22','Rua Ouro Grosso, 428',NULL,NULL,'Casa Verde','São Paulo','SP',NULL,'1139650425',NULL,NULL,NULL,NULL,NULL,'São João Evangelista',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(189,'José Carlos da Silva','1959-09-05','Travesa Maestro Baccusi, 5',NULL,NULL,NULL,NULL,NULL,NULL,'1122031008',NULL,NULL,NULL,NULL,NULL,'Santana',1,'Joana D\'arc',1,1,'2','São José',1,NULL,NULL,NULL),(191,'Carolina Dantas',NULL,'Rua Floriano de Freitas, 12',NULL,NULL,NULL,NULL,NULL,NULL,'1129953562',NULL,'11985629048',NULL,'carolzinha2015@hotmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(192,'Ana Lúcia A Nascimento',NULL,'Rua Cirene Oliveira Laet, 27',NULL,'casa 1',NULL,NULL,NULL,NULL,'1122411074',NULL,'11986377270',NULL,NULL,NULL,'São Benedito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(193,'Carolina Dantas',NULL,'Rua Floriano de Freitas, 12',NULL,NULL,NULL,NULL,NULL,NULL,'1129953562',NULL,'11985629048',NULL,'carolzinha2015@hotmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(194,'Edvaldo de Moraes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(195,'Francisca Batista Bastos',NULL,'Rua Monforte, 36',NULL,NULL,'Vila Albertina',NULL,NULL,NULL,'1129963784',NULL,'11999464427',NULL,'ffbbastos@uol.com.br',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(196,'Francisca Graeiano Lacerda','1969-04-19','Avenida Braz Leme, 2393',NULL,'apto 76','Santana',NULL,NULL,'02022010','1133264061',NULL,'11998400000',NULL,NULL,NULL,'São José Operário - Santana',1,NULL,1,1,'1',NULL,1,NULL,NULL,NULL),(197,'Gabriela Antunes Luz','1984-10-29','Rua Paulino José de Souza, 84',NULL,NULL,'Jardim das Pedras',NULL,NULL,'02367030','1129927839',NULL,'11980970806',NULL,NULL,NULL,NULL,1,NULL,0,0,'1',NULL,0,NULL,NULL,NULL),(198,'Lourdes Dias de Souza','1956-01-21','Rua Major Turibio Moraes, 30',NULL,'apto 42 A','Tucuruvi',NULL,NULL,NULL,'1129367191',NULL,'11992989742',NULL,'lourdessouza2@hotmail.com',1,'Santo Expedito - Jaçanã',1,'Menino Jesus - Tucuruvi',1,1,'1','Sagrado Coração de Jesus',1,'Desde 1998',NULL,'Já foi casada: casou-se na igreja Sagrado Coração de Jesus'),(199,'Maria Dilma Rodriguês dos Santos',NULL,'Avenida Deputado Cantídio Sampaio, 2023',NULL,'Terminal Cachoeirinha','Vila Souza',NULL,NULL,NULL,'1139848087',NULL,'11948283236',NULL,'m.dilma2010@hotmail.com',1,'Santana',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(200,'Marizilda Resende','1955-01-12','Rua Antonio Sebastião Sobrinho, 611',NULL,NULL,'Jardim Panamericano - Jaraguá','São Paulo','SP',NULL,'1139433382',NULL,NULL,NULL,NULL,NULL,'Nossa Senhora da Conceição',1,'São João Batista - Vila Ipojuca',1,1,NULL,NULL,0,NULL,NULL,NULL),(201,'Rita de Cassia Nannini',NULL,'Rua Ovídio Cavalleiro 129',NULL,'apto 302',NULL,NULL,NULL,NULL,'0212487419',NULL,'02199952059',NULL,'nanninirc@hotmail.com',1,'Nossa Senhora Aparecida (Rio de Janeiro)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(202,'Marizilda Resende','1955-01-12','Rua Antonio Sebastião Sobrinho, 611',NULL,NULL,'Jardim Panamericano - Jaraguá','São Paulo','SP',NULL,'1139433382',NULL,NULL,NULL,NULL,NULL,'Nossa Senhora da Conceição',1,'São João Batista - Vila Ipojuca',1,1,NULL,NULL,0,NULL,NULL,NULL),(203,'Rita de Cassia Nannini',NULL,'Rua Ovídio Cavalleiro 129',NULL,'apto 302',NULL,NULL,NULL,NULL,'1124874191',NULL,'11999520593',NULL,'nanninirc@hotmail.com',1,'Nossa Senhora Aparecida (Rio de Janeiro)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(204,'Andréia Ribeiro Santos','1973-08-26','Rua José Ferreira de Castro 259',NULL,'apto 624',NULL,NULL,NULL,NULL,NULL,NULL,'11994703599',NULL,NULL,NULL,NULL,1,NULL,1,NULL,'2',NULL,NULL,NULL,NULL,NULL),(205,'Gisele Florêncio Silva','1984-01-06','Avenida Raimundo Pereira de Magalhães, 12011',NULL,'Apto 23 Bl 1','Parada de Taipas','São Paulo','SP',NULL,NULL,NULL,'11987002868',NULL,'giseleflorencio.fisioterapeuta@gmail.com',1,'Comunidade São Francisco de Assis / Paróquia São Luis Monfor',1,'São Francisco de Assis',1,1,'2',NULL,1,'3 meses','2014-02-04 00:00:00','Casada apenas no civil'),(206,'Paula Cristina Bragato da Silva','1988-05-16','Rua Maria Rosa de Siqueira, 92',NULL,NULL,'Santana',NULL,NULL,NULL,NULL,NULL,'11987106251',NULL,NULL,NULL,'Sant\'Ana',1,'São Francisco de Assis (Serra Negra/SP)',1,1,'1',NULL,0,NULL,NULL,NULL),(207,'Maria da Guia dos Santos Torres','1965-04-15','Rua Conselheiro Moreira de Barros, 1502',NULL,NULL,'Santa Terezinha','São Paulo','SP',NULL,'1129595813','1129733067','11967494218',NULL,NULL,NULL,NULL,1,NULL,NULL,0,'1',NULL,NULL,NULL,NULL,NULL),(208,'Analia Estela de Oliveira Foresto','1950-08-16','Rua Ezequiel Freire, 663',NULL,'Apto 81','Santana','São Paulo','SP',NULL,'1129778132',NULL,'11971401008',NULL,'analiastela@yahoo.com.br',1,'Sant\'Ana',1,'Nossa Senhora Mãe dos Homens',NULL,1,'2','Sant\'Ana',NULL,NULL,'2014-02-05 00:00:00',NULL);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `servo_ministerio`
--

LOCK TABLES `servo_ministerio` WRITE;
/*!40000 ALTER TABLE `servo_ministerio` DISABLE KEYS */;
INSERT INTO `servo_ministerio` VALUES (1,7,NULL,1),(1,9,NULL,1),(1,3,NULL,1),(2,3,NULL,1),(2,9,NULL,1),(3,3,NULL,1),(3,2,NULL,1),(4,2,NULL,1),(4,4,NULL,1),(5,2,NULL,1),(5,4,NULL,1),(6,2,NULL,1),(6,4,NULL,1),(7,6,'2014-10-09 15:43:59',0);
/*!40000 ALTER TABLE `servo_ministerio` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping data for table `servos`
--

LOCK TABLES `servos` WRITE;
/*!40000 ALTER TABLE `servos` DISABLE KEYS */;
INSERT INTO `servos` VALUES (1,135,'2011-10-26 02:00:00',1),(2,134,'2011-10-26 02:00:00',1),(3,129,'2011-10-26 02:00:00',1),(4,124,NULL,1),(5,100,NULL,1),(6,76,NULL,1),(7,88,NULL,0);
/*!40000 ALTER TABLE `servos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-27 22:12:17
