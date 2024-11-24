-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 15:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fishwork`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `peixes`
--

CREATE TABLE `peixes` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `alimentacao` varchar(50) DEFAULT NULL,
  `tamanho_minimo` decimal(5,2) DEFAULT NULL,
  `localizacao` varchar(200) DEFAULT NULL,
  `informacoes` varchar(255) DEFAULT NULL,
  `tipo` varchar(7) DEFAULT NULL,
  `equipamento` varchar(200) DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `peixes`
--

INSERT INTO `peixes` (`codigo`, `nome`, `alimentacao`, `tamanho_minimo`, `localizacao`, `informacoes`, `tipo`, `equipamento`, `foto`) VALUES
(1, 'pacu', 'tudo', 10.00, 'todo lugar', 'feio', 'Escama', 'qualquer um', '673f4115250565.72274905.jfif'),
(2, 'piranha', 'carne', 5.00, 'lugar qualquer', 'feia', 'Escama', 'anzol', '673f41dfcbd243.23056088.gif'),
(3, 'pintado', 'tudo', 5.00, 'algum lugar', 'estranho', 'Couro', 'vara', '673f427ebebad0.99348968.jfif'),
(4, 'bagre', 'peixes menores', 10.00, 'num sei', 'veio', 'Couro', 'isca', '673f434a9caff6.66264232.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `peixes`
--
ALTER TABLE `peixes`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `peixes`
--
ALTER TABLE `peixes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
