-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2024 às 19:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `denuncias_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text NOT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `contato` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `denuncias`
--

INSERT INTO `denuncias` (`id`, `nome`, `descricao`, `localizacao`, `contato`, `arquivo`, `data_envio`, `status`) VALUES
(2, 'Maria', 'Agressão', 'rua da saudade', '123456789', '1732650087_Documentação do protótipo do site.pdf', '2024-11-26 19:41:27', 'pendente'),
(3, 'Maria', 'Agressão', 'rua da saudade', '123456789', '1732650102_Documentação do protótipo do site.pdf', '2024-11-26 19:41:42', 'pendente'),
(4, 'Maria das Dores', 'levei uma pisa', 'jua', '123123123', '1732735018_imag.pdf', '2024-11-27 19:16:58', 'pendente'),
(5, 'ain ze da manga', 'rfsdfsdf', 'dasdas', 'dada', '1733162352_imag.pdf', '2024-12-02 17:59:12', 'pendente'),
(6, '', 'AJUDA', 'palestina', '', NULL, '2024-12-03 10:39:26', 'Pendente'),
(9, '', 'salve-me', 'Centro', '', NULL, '2024-12-09 14:02:29', 'Resolvido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `nome`, `mensagem`, `data_envio`) VALUES
(1, 'ain ze da manga', 'ew', '2024-11-27 19:54:28'),
(2, '', 'Esse site me ajudou muito!', '2024-12-02 13:32:41'),
(3, '', 'Site bom', '2024-12-02 13:40:28'),
(4, '', 'Site excelente', '2024-12-02 13:40:39'),
(5, 'Maria', 'site muito bom', '2024-12-02 18:22:53'),
(6, '', 'bom', '2024-12-02 18:23:39'),
(8, '', 'Esse site salvou a minha vida.', '2024-12-02 18:40:51'),
(9, '', 'Aprendi sobre os tipos de violências através desse site.', '2024-12-02 19:11:56'),
(10, '', 'Uma ferramenta importante para nós mulheres.', '2024-12-02 19:13:13'),
(11, '', 'Site bom para ajudar a população de Caririaçu', '2024-12-04 19:31:55'),
(12, '', 'BOM', '2024-12-04 19:32:12'),
(13, '', 'Site bom', '2024-12-04 19:37:21'),
(15, '', 'excelente', '2024-12-04 19:51:25'),
(16, 'Maria', 'Bom', '2024-12-04 19:51:48'),
(17, '', 'O Consenso de Washington foi um conjunto de diretrizes econômicas formuladas em 1989 por economistas e instituições financeiras internacionais, como o Fundo Monetário Internacional (FMI) e o Banco Mundial. Essas diretrizes foram direcionadas para países em desenvolvimento e buscavam promover reformas estruturais visando a estabilização econômica e o crescimento através de políticas neoliberais.\r\n\r\nEntre as principais recomendações do Consenso de Washington estavam a disciplina fiscal, a reordenação de prioridades nos gastos públicos, a reforma tributária, a liberalização comercial e financeira, a privatização de empresas estatais e a desregulamentação da economia. Essas medidas visavam reduzir o papel do Estado na economia, promover o livre mercado e atra', '2024-12-04 19:53:29'),
(18, '', 'ola', '2024-12-09 13:28:54');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
