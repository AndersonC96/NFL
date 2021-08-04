-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Ago-2021 às 22:32
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nfl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id`, `nome`) VALUES
(2, 'Special Team'),
(3, 'Attack'),
(4, 'Defense');

-- --------------------------------------------------------

--
-- Estrutura da tabela `injurie`
--

CREATE TABLE `injurie` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `local_fratura` varchar(100) NOT NULL,
  `id_jogador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `numero` int(100) NOT NULL,
  `calouro` tinyint(1) NOT NULL,
  `id_posicao` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  `mvp` int(11) NOT NULL,
  `sb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`id`, `nome`, `data`, `numero`, `calouro`, `id_posicao`, `time`, `mvp`, `sb`) VALUES
(5, 'Tom Brady', '1977-08-03', 12, 0, 5, 'Tampa Bay Buccaneers ', 3, 7),
(6, 'Stephon Gilmore', '1990-09-19', 24, 0, 15, 'New England Patriots', 0, 1),
(7, 'Alvin Kamara', '1995-07-25', 41, 0, 6, 'New Orleans Saints', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicao`
--

CREATE TABLE `posicao` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posicao`
--

INSERT INTO `posicao` (`id`, `nome`, `id_classe`) VALUES
(1, 'Center (C)', 3),
(2, 'Offensive guard (OG)', 3),
(3, 'Offensive tackle (OT)', 3),
(4, 'Backs and receivers (R)', 3),
(5, 'Quarterback (QB)', 3),
(6, 'Running back (HB/FB)', 3),
(7, 'Wide receiver (WR)', 3),
(8, 'Tight end (TE)', 3),
(9, 'Defensive tackle (DT)', 4),
(10, 'Defensive end (DE)', 4),
(11, 'Linebackers', 4),
(12, 'Middle linebacker (MLB)', 4),
(13, 'Outside linebacker (OLB)', 4),
(14, 'Defensive backs', 4),
(15, 'Cornerback (CB)', 4),
(16, 'Safety (S)', 4),
(17, 'Kicker (K)', 2),
(18, 'Kickoff specialist (KOS)', 2),
(19, 'Punter (P)', 2),
(20, 'Holder (H)', 2),
(21, 'Long snapper (LS)', 2),
(22, 'Kick returner (KR)', 2),
(23, 'Punt returner (PR)', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sb`
--

CREATE TABLE `sb` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `campeao` varchar(100) NOT NULL,
  `estadio` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `publico` varchar(100) NOT NULL,
  `juiz` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sb`
--

INSERT INTO `sb` (`id`, `nome`, `data`, `campeao`, `estadio`, `cidade`, `publico`, `juiz`) VALUES
(1, 'Super Bowl I', '1967-01-15', 'Green Bay Packers', 'Los Angeles Memorial Coliseum', 'Los Angeles, California', '61,946', 'Norm Schachter'),
(2, 'Super Bowl II', '1968-01-14', 'Green Bay Packers', 'Miami Orange Bowl', 'Miami, Florida', '75,546', 'Jack Vest');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Roger Federer', 'roger.federer@uniqlo.com', '1c60d53118980636c7ed1fa85a78e3a5');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `injurie`
--
ALTER TABLE `injurie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_injurie_jogador` (`id_jogador`);

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogador_posicao` (`id_posicao`);

--
-- Índices para tabela `posicao`
--
ALTER TABLE `posicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posicao_classe` (`id_classe`);

--
-- Índices para tabela `sb`
--
ALTER TABLE `sb`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `injurie`
--
ALTER TABLE `injurie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `posicao`
--
ALTER TABLE `posicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `sb`
--
ALTER TABLE `sb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `injurie`
--
ALTER TABLE `injurie`
  ADD CONSTRAINT `fk_injurie_jogador` FOREIGN KEY (`id_jogador`) REFERENCES `jogador` (`id`);

--
-- Limitadores para a tabela `jogador`
--
ALTER TABLE `jogador`
  ADD CONSTRAINT `fk_jogador_posicao` FOREIGN KEY (`id_posicao`) REFERENCES `posicao` (`id`);

--
-- Limitadores para a tabela `posicao`
--
ALTER TABLE `posicao`
  ADD CONSTRAINT `fk_posicao_classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
