-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2020 às 17:19
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fk_situacao` int(1) NOT NULL,
  `fk_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id`, `nome`, `cpf`, `email`, `fk_situacao`, `fk_status`) VALUES
(7, 'Exemplo1', '000.111.222-33', 'Exmplo1@gmail.com', 2, 1),
(8, 'Exemplo2', '000.111.111-33', 'exemplo2@gmail.com', 1, 1),
(9, 'Exemplo3', '000.111.111-33', 'exemplo2@gmail.com', 2, 1),
(10, 'Exemplo2', '000.111.111-33', 'exemplo2@gmail.com', 1, 1),
(11, 'Exemplo2', '000.111.111-33', 'exemplo2@gmail.com', 2, 1),
(12, 'Exemplo4', '000.111.111-33', 'exemplo4@gmail.com', 2, 1),
(13, 'Exemplo5', '000.111.111-33', 'exemplo5@gmail.com', 1, 1),
(14, 'Exemplo6', '000.111.111-33', 'exemplo6@gmail.com', 2, 1),
(15, 'Exemplo7', '000.111.111-33', 'exemplo7@gmail.com', 1, 2),
(16, 'Exemplo8', '000.111.111-33', 'exemplo8@gmail.com', 2, 1),
(17, 'Exemplo9', '000.111.111-33', 'exemplo9@gmail.com', 2, 1),
(18, 'Exemplo10', '000.111.111-33', 'exemplo10@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(11) NOT NULL,
  `situacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `situacao`) VALUES
(1, 'Livre'),
(2, 'Em Curso'),
(3, 'Retornando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stts`
--

CREATE TABLE `stts` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `stts`
--

INSERT INTO `stts` (`id`, `status`) VALUES
(1, 'Ativo'),
(2, 'Desligado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_motSituacao` (`fk_situacao`),
  ADD KEY `fk_motStatus` (`fk_status`);

--
-- Índices para tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `stts`
--
ALTER TABLE `stts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `stts`
--
ALTER TABLE `stts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `motorista`
--
ALTER TABLE `motorista`
  ADD CONSTRAINT `fk_motSituacao` FOREIGN KEY (`fk_situacao`) REFERENCES `situacao` (`id`),
  ADD CONSTRAINT `fk_motStatus` FOREIGN KEY (`fk_status`) REFERENCES `stts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
