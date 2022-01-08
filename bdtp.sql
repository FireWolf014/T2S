-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2022 às 15:40
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteiner`
--

CREATE TABLE `conteiner` (
  `codconteiner` int(11) NOT NULL,
  `cliente` varchar(70) NOT NULL,
  `numero` char(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `statu` int(11) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteiner`
--

INSERT INTO `conteiner` (`codconteiner`, `cliente`, `numero`, `tipo`, `statu`, `categoria`) VALUES
(1, 'abobora', 'TEST1234567', 20, 1, 1),
(2, 'Patricia', 'TEST1234567', 40, 1, 2),
(3, 'Fabio', 'ABCD1597894', 40, 2, 2),
(4, 'Carlos', 'DEFR1597896', 20, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `codmovimentacao` int(11) NOT NULL,
  `codconteiner` int(11) NOT NULL,
  `movimentacao` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`codmovimentacao`, `codconteiner`, `movimentacao`, `inicio`, `fim`) VALUES
(1, 2, 5, '2022-01-07 15:49:00', '2022-01-14 15:49:00'),
(2, 3, 3, '2022-01-07 16:01:00', '2022-01-27 16:01:00'),
(3, 4, 2, '2022-01-08 02:12:00', '2022-01-14 02:12:00'),
(4, 4, 6, '2022-01-05 02:13:00', '2022-01-13 02:13:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conteiner`
--
ALTER TABLE `conteiner`
  ADD PRIMARY KEY (`codconteiner`);

--
-- Índices para tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`codmovimentacao`),
  ADD KEY `fkconteiner` (`codconteiner`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conteiner`
--
ALTER TABLE `conteiner`
  MODIFY `codconteiner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `codmovimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD CONSTRAINT `fkconteiner` FOREIGN KEY (`codconteiner`) REFERENCES `conteiner` (`codconteiner`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
