-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: des_loja
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (4,'Coleção Livros do Harry Potter','É uma coleção muito legal',300,NULL),(36,'ffff','fff',22,NULL),(37,'quadro','quadro1',10,'images/HSOCIPTDAX.png'),(38,'Coala','Coala Filhote',1000,'images/DMQYAXFCZU.jpg'),(39,'Trento Speciale Avelã','realmente é muito bom!!',4,'images/GYHPQKEUMI.png'),(40,'1','1',1,'images/GCTFORQAPL.gif');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (5,'vanessaaa.fn@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','Vanessa','2005-12-01','2022-10-05 19:51:45','2022-10-05 19:51:45'),(6,'vanessa@ksks.com','123','vanesaaaa','2003-12-12','2022-10-05 20:27:13','2022-10-05 20:27:13'),(7,'vanessa@ksks.comdd','1234','vanesaaaaddd','2003-12-12','2022-10-05 20:27:53','2022-10-05 20:27:53'),(8,'vanessa@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Vanessa','2005-12-01','2022-10-13 18:54:40','2022-10-13 18:54:40'),(9,'vanessa.gmail.comm','d9b1d7db4cd6e70935368a1efb10e377','Vanessa lindaa','2001-01-01','2022-10-19 16:48:50','2022-10-19 17:53:36'),(10,'luisfeio.com','d9b1d7db4cd6e70935368a1efb10e377','luis feio','2001-01-01','2022-10-19 17:55:15','2022-10-19 17:56:04'),(12,'vanessalinda.com','202cb962ac59075b964b07152d234b70','vanesaaa linda','2001-01-01','2022-10-19 17:59:42','2022-10-19 18:02:40');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-26 16:47:42
