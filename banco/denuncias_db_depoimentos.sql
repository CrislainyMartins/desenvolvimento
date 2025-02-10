-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: denuncias_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depoimentos`
--

LOCK TABLES `depoimentos` WRITE;
/*!40000 ALTER TABLE `depoimentos` DISABLE KEYS */;
INSERT INTO `depoimentos` VALUES (1,'ain ze da manga','ew','2024-11-27 19:54:28'),(2,'','Esse site me ajudou muito!','2024-12-02 13:32:41'),(3,'','Site bom','2024-12-02 13:40:28'),(4,'','Site excelente','2024-12-02 13:40:39'),(5,'Maria','site muito bom','2024-12-02 18:22:53'),(6,'','bom','2024-12-02 18:23:39'),(8,'','Esse site salvou a minha vida.','2024-12-02 18:40:51'),(9,'','Aprendi sobre os tipos de violências através desse site.','2024-12-02 19:11:56'),(10,'','Uma ferramenta importante para nós mulheres.','2024-12-02 19:13:13'),(11,'','Site bom para ajudar a população de Caririaçu','2024-12-04 19:31:55'),(12,'','BOM','2024-12-04 19:32:12'),(13,'','Site bom','2024-12-04 19:37:21'),(15,'','excelente','2024-12-04 19:51:25'),(16,'Maria','Bom','2024-12-04 19:51:48'),(17,'','O Consenso de Washington foi um conjunto de diretrizes econômicas formuladas em 1989 por economistas e instituições financeiras internacionais, como o Fundo Monetário Internacional (FMI) e o Banco Mundial. Essas diretrizes foram direcionadas para países em desenvolvimento e buscavam promover reformas estruturais visando a estabilização econômica e o crescimento através de políticas neoliberais.\r\n\r\nEntre as principais recomendações do Consenso de Washington estavam a disciplina fiscal, a reordenação de prioridades nos gastos públicos, a reforma tributária, a liberalização comercial e financeira, a privatização de empresas estatais e a desregulamentação da economia. Essas medidas visavam reduzir o papel do Estado na economia, promover o livre mercado e atra','2024-12-04 19:53:29'),(18,'','ola','2024-12-09 13:28:54');
/*!40000 ALTER TABLE `depoimentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-10  8:00:56
