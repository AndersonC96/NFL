-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2021 às 21:54
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
  `id` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `campeao` varchar(100) NOT NULL,
  `placar` varchar(100) NOT NULL,
  `vice-campeao` varchar(100) NOT NULL,
  `mvp` varchar(100) NOT NULL,
  `estadio` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `publico` varchar(100) NOT NULL,
  `network` varchar(100) NOT NULL,
  `juiz` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sb`
--

INSERT INTO `sb` (`id`, `nome`, `data`, `campeao`, `placar`, `vice-campeao`, `mvp`, `estadio`, `cidade`, `publico`, `network`, `juiz`) VALUES
(33, 'I', '1967-01-15', 'Green Bay Packers', '35–10', 'Kansas City Chiefs', 'Bart Starr', 'Los Angeles Memorial Coliseum', 'Los Angeles, California', '61,946', 'CBS,\nNBC', 'Norm Schachter'),
(34, 'II', '1968-01-14', 'Green Bay Packers', '33–14', 'Oakland Raiders', 'Bart Starr', 'Miami Orange Bowl', 'Miami, Florida', '75,546', 'CBS', 'Jack Vest'),
(35, 'III', '1969-01-12', 'New York Jets', '16–7 ', 'Baltimore Colts', 'Joe Namath', 'Miami Orange Bowl', 'Miami, Florida', '75,389', 'NBC', 'Tom Bell'),
(36, 'IV', '1970-01-11', 'Kansas City Chiefs', '23–7 ', 'Minnesota Vikings', 'Len Dawson', 'Tulane Stadium', 'New Orleans, Louisiana', '80,562', 'CBS', 'John McDonough'),
(37, 'V', '1971-01-17', 'Baltimore Colts', '16–13', 'Dallas Cowboys', 'Chuck Howley', 'Miami Orange Bowl', 'Miami, Florida', '79,204', 'NBC', 'Norm Schachter'),
(38, 'VI', '1972-01-16', 'Dallas Cowboys', '24–3 ', 'Miami Dolphins', 'Roger Staubach', 'Tulane Stadium', 'New Orleans, Louisiana', '81,023', 'CBS', 'Jim Tunney'),
(39, 'VII', '1973-01-14', 'Miami Dolphins', '14–7 ', 'Washington Redskins', 'Jake Scott', 'Los Angeles Memorial Coliseum', 'Los Angeles, California', '90,182', 'NBC', 'Tom Bell'),
(40, 'VIII', '1974-01-13', 'Miami Dolphins', '24–7 ', 'Minnesota Vikings', 'Larry Csonka', 'Rice Stadium', 'Houston, Texas', '71,882', 'CBS', 'Ben Dreith'),
(41, 'IX', '1975-01-12', 'Pittsburgh Steelers', '16–6 ', 'Minnesota Vikings', 'Franco Harris', 'Tulane Stadium', 'New Orleans, Louisiana', '80,997', 'NBC', 'Bernie Ulman'),
(42, 'X', '1976-01-18', 'Pittsburgh Steelers', '21–17', 'Dallas Cowboys', 'Lynn Swann', 'Miami Orange Bowl', 'Miami, Florida', '80,187', 'CBS', 'Norm Schachter'),
(43, 'XI', '1977-01-09', 'Oakland Raiders', '32–14', 'Minnesota Vikings', 'Fred Biletnikoff', 'Rose Bowl', 'Pasadena, California', '103,438', 'NBC', 'Jim Tunney'),
(44, 'XII', '1978-01-15', 'Dallas Cowboys', '27–10', 'Denver Broncos', 'Harvey Martin and Randy White', 'Louisiana Superdome', 'New Orleans, Louisiana', '76,4', 'CBS', 'Jim Tunney'),
(45, 'XIII', '1979-01-21', 'Pittsburgh Steelers', '35–31', 'Dallas Cowboys', 'Terry Bradshaw', 'Miami Orange Bowl', 'Miami, Florida', '79,484', 'NBC', 'Pat Haggerty'),
(46, 'XIV', '1980-01-20', 'Pittsburgh Steelers', '31–19', 'Los Angeles Rams', 'Terry Bradshaw', 'Rose Bowl', 'Pasadena, California', '103,985', 'CBS', 'Fred Silva'),
(47, 'XV', '1981-01-25', 'Oakland Raiders', '27–10', 'Philadelphia Eagles', 'Jim Plunkett', 'Louisiana Superdome', 'New Orleans, Louisiana', '76,135', 'NBC', 'Ben Dreith'),
(48, 'XVI', '1982-01-24', 'San Francisco 49ers', '26–21', 'Cincinnati Bengals', 'Joe Montana', 'Pontiac Silverdome', 'Pontiac, Michigan', '81,27', 'CBS', 'Pat Haggerty'),
(49, 'XVII', '1983-01-30', 'Washington Redskins', '27–17', 'Miami Dolphins', 'John Riggins', 'Rose Bowl', 'Pasadena, California', '103,667', 'NBC', 'Jerry Markbreit'),
(50, 'XVIII', '1984-01-22', 'Los Angeles Raiders', '38–9 ', 'Washington Redskins', 'Marcus Allen', 'Tampa Stadium', 'Tampa, Florida', '72,92', 'CBS', 'Gene Barth'),
(51, 'XIX', '1985-01-20', 'San Francisco 49ers', '38–16', 'Miami Dolphins', 'Joe Montana', 'Stanford Stadium', 'Stanford, California', '84,059', 'ABC', 'Pat Haggerty'),
(52, 'XX', '1986-01-26', 'Chicago Bears', '46–10', 'New England Patriots', 'Richard Dent', 'Louisiana Superdome', 'New Orleans, Louisiana', '73,818', 'NBC', 'Red Cashion'),
(53, 'XXI', '1987-01-25', 'New York Giants', '39–20', 'Denver Broncos', 'Phil Simms', 'Rose Bowl', 'Pasadena, California', '101,063', 'CBS', 'Jerry Markbreit'),
(54, 'XXII', '1988-01-31', 'Washington Redskins', '42–10', 'Denver Broncos', 'Doug Williams', 'San Diego–Jack Murphy Stadium', 'San Diego, California', '73,302', 'ABC', 'Bob McElwee'),
(55, 'XXIII', '1989-01-22', 'San Francisco 49ers', '20–16', 'Cincinnati Bengals', 'Jerry Rice', 'Joe Robbie Stadium', 'Miami, Florida', '75,129', 'NBC', 'Jerry Seeman'),
(56, 'XXIV', '1990-01-28', 'San Francisco 49ers', '55–10', 'Denver Broncos', 'Joe Montana', 'Louisiana Superdome', 'New Orleans, Louisiana', '72,919', 'CBS', 'Dick Jorgensen'),
(57, 'XXV', '1991-01-27', 'New York Giants', '20–19', 'Buffalo Bills', 'Ottis Anderson', 'Tampa Stadium', 'Tampa, Florida', '73,813', 'ABC', 'Jerry Seeman'),
(58, 'XXVI', '1992-01-26', 'Washington Redskins', '37–24', 'Buffalo Bills', 'Mark Rypien', 'Metrodome', 'Minneapolis, Minnesota', '63,13', 'CBS', 'Jerry Markbreit'),
(59, 'XXVII', '1993-01-31', 'Dallas Cowboys', '52–17', 'Buffalo Bills', 'Troy Aikman', 'Rose Bowl', 'Pasadena, California', '98,374', 'NBC', 'Dick Hantak'),
(60, 'XXVIII', '1994-01-30', 'Dallas Cowboys', '30–13', 'Buffalo Bills', 'Emmitt Smith', 'Georgia Dome', 'Atlanta, Georgia', '72,817', 'NBC', 'Bob McElwee'),
(61, 'XXIX', '1995-01-29', 'San Francisco 49ers', '49–26', 'San Diego Chargers', 'Steve Young', 'Joe Robbie Stadium', 'Miami, Florida', '74,107', 'ABC', 'Jerry Markbreit'),
(62, 'XXX', '1996-01-28', 'Dallas Cowboys', '27–17', 'Pittsburgh Steelers', 'Larry Brown', 'Sun Devil Stadium', 'Tempe, Arizona', '76,347', 'NBC', 'Red Cashion'),
(63, 'XXXI', '1997-01-26', 'Green Bay Packers', '35–21', 'New England Patriots', 'Desmond Howard', 'Louisiana Superdome', 'New Orleans, Louisiana', '72,301', 'Fox', 'Gerry Austin'),
(64, 'XXXII', '1998-01-25', 'Denver Broncos', '31–24', 'Green Bay Packers', 'Terrell Davis', 'Qualcomm Stadium', 'San Diego, California', '68,912', 'NBC', 'Ed Hochuli'),
(65, 'XXXIII', '1999-01-31', 'Denver Broncos', '34–19', 'Atlanta Falcons', 'John Elway', 'Pro Player Stadium', 'Miami, Florida', '74,803', 'Fox', 'Bernie Kukar'),
(66, 'XXXIV', '2000-01-30', 'St. Louis Rams', '23–16', 'Tennessee Titans', 'Kurt Warner', 'Georgia Dome', 'Atlanta, Georgia', '72,625', 'ABC', 'Bob McElwee'),
(67, 'XXXV', '2001-01-28', 'Baltimore Ravens', '34–7 ', 'New York Giants', 'Ray Lewis', 'Raymond James Stadium', 'Tampa, Florida', '71,921', 'CBS', 'Gerry Austin'),
(68, 'XXXVI', '2002-02-03', 'New England Patriots', '20–17', 'St. Louis Rams', 'Tom Brady', 'Louisiana Superdome', 'New Orleans, Louisiana', '72,922', 'Fox', 'Bernie Kukar'),
(69, 'XXXVII', '2003-01-26', 'Tampa Bay Buccaneers', '48–21', 'Oakland Raiders', 'Dexter Jackson', 'Qualcomm Stadium', 'San Diego, California', '67,603', 'ABC', 'Bill Carollo'),
(70, 'XXXVIII', '2004-02-01', 'New England Patriots', '32–29', 'Carolina Panthers', 'Tom Brady', 'Reliant Stadium', 'Houston, Texas', '71,525', 'CBS', 'Ed Hochuli'),
(71, 'XXXIX', '2005-02-06', 'New England Patriots', '24–21', 'Philadelphia Eagles', 'Deion Branch', 'Alltel Stadium', 'Jacksonville, Florida', '78,125', 'Fox', 'Terry McAulay'),
(72, 'XL', '2006-02-05', 'Pittsburgh Steelers', '21–10', 'Seattle Seahawks', 'Hines Ward', 'Ford Field', 'Detroit, Michigan', '68,206', 'ABC', 'Bill Leavy'),
(73, 'XLI', '2007-02-04', 'Indianapolis Colts', '29–17', 'Chicago Bears', 'Peyton Manning', 'Dolphin Stadium', 'Miami Gardens, Florida', '74,512', 'CBS', 'Tony Corrente'),
(74, 'XLII', '2008-02-03', 'New York Giants', '17–14', 'New England Patriots', 'Eli Manning', 'University of Phoenix Stadium', 'Glendale, Arizona', '71,101', 'Fox', 'Mike Carey'),
(75, 'XLIII', '2009-02-01', 'Pittsburgh Steelers', '27–23', 'Arizona Cardinals', 'Santonio Holmes', 'Raymond James Stadium', 'Tampa, Florida', '70,774', 'NBC', 'Terry McAulay'),
(76, 'XLIV', '2010-02-07', 'New Orleans Saints', '31–17', 'Indianapolis Colts', 'Drew Brees', 'Sun Life Stadium', 'Miami Gardens, Florida', '74,059', 'CBS', 'Scott Green'),
(77, 'XLV', '2011-02-06', 'Green Bay Packers', '31–25', 'Pittsburgh Steelers', 'Aaron Rodgers', 'Cowboys Stadium', 'Arlington, Texas', '103,219', 'Fox', 'Walt Anderson'),
(78, 'XLVI', '2012-02-05', 'New York Giants', '21–17', 'New England Patriots', 'Eli Manning', 'Lucas Oil Stadium', 'Indianapolis, Indiana', '68,658', 'NBC', 'John Parry'),
(79, 'XLVII', '2013-02-03', 'Baltimore Ravens', '34–31', 'San Francisco 49ers', 'Joe Flacco', 'Mercedes-Benz Superdome', 'New Orleans, Louisiana', '71,024', 'CBS', 'Jerome Boger'),
(80, 'XLVIII', '2014-02-02', 'Seattle Seahawks', '43–8', 'Denver Broncos', 'Malcolm Smith', 'MetLife Stadium', 'East Rutherford, New Jersey', '82,529', 'Fox', 'Terry McAulay'),
(81, 'XLIX', '2015-02-01', 'New England Patriots', '28–24', 'Seattle Seahawks', 'Tom Brady', 'University of Phoenix Stadium', 'Glendale, Arizona', '70,288', 'NBC', 'Bill Vinovich'),
(82, '50', '2016-02-07', 'Denver Broncos', '24–10', 'Carolina Panthers', 'Von Miller', 'Levi\'s Stadium', 'Santa Clara, California', '71,088', 'CBS', 'Clete Blakeman'),
(83, 'LI', '2017-02-05', 'New England Patriots', '34–28 (OT)', 'Atlanta Falcons', 'Tom Brady', 'NRG Stadium', 'Houston, Texas', '70,807', 'Fox', 'Carl Cheffers'),
(84, 'LII', '2018-02-04', 'Philadelphia Eagles', '41–33', 'New England Patriots', 'Nick Foles', 'U.S. Bank Stadium', 'Minneapolis, Minnesota', '67,612', 'NBC,\nUniverso', 'Gene Steratore'),
(85, 'LIII', '2019-02-03', 'New England Patriots', '13–3 ', 'Los Angeles Rams', 'Julian Edelman', 'Mercedes-Benz Stadium', 'Atlanta, Georgia', '70,081', 'CBS,\nESPN Deportes', 'John Parry'),
(86, 'LIV', '2020-02-02', 'Kansas City Chiefs', '31–20 ', 'San Francisco 49ers', 'Patrick Mahomes', 'Hard Rock Stadium', 'Miami Gardens, Florida', '62,417', 'Fox,\nFox Deportes', 'Bill Vinovich'),
(87, 'LV', '2021-02-07', 'Tampa Bay Buccaneers', '31–9', 'Kansas City Chiefs', 'Tom Brady', 'Raymond James Stadium', 'Tampa, Florida', '24,835', 'CBS,\nESPN Deportes', 'Carl Cheffers'),
(88, 'LVI', '2022-02-13', '-', '—', '-', '-', 'SoFi Stadium', 'Inglewood, California', '-', 'NBC,\nTelemundo', '-'),
(89, 'LVII', '2023-02-05', '-', '—', '-', '-', 'State Farm Stadium', 'Glendale, Arizona', '-', 'Fox,\nFox Deportes', '-'),
(90, 'LVIII', '2024-02-11', '-', '—', '-', '-', 'To be determined', 'To be determined', '-', 'CBS,\nUnivision,\nTUDN', '-'),
(91, 'LIX', '2025-02-09', '-', '—', '-', '-', 'Mercedes-Benz Superdome', 'New Orleans, Louisiana', '-', 'Fox', '-');

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `conferencia` varchar(100) NOT NULL,
  `divisao` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estadio` varchar(100) NOT NULL,
  `capacidade` varchar(100) NOT NULL,
  `head-coach` varchar(100) NOT NULL,
  `td` varchar(100) NOT NULL,
  `tc` varchar(100) NOT NULL,
  `nc` varchar(100) NOT NULL,
  `sb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id`, `nome`, `conferencia`, `divisao`, `cidade`, `estadio`, `capacidade`, `head-coach`, `td`, `tc`, `nc`, `sb`) VALUES
(33, 'Buffalo Bills', 'AFC', 'AFC East', 'Orchard Park, New York', 'Highmark Stadium', '71,608', 'Sean McDermott', '8', '4', '2', '0'),
(34, 'Miami Dolphins', 'AFC', 'AFC East', 'Miami Gardens, Florida', 'Hard Rock Stadium', '64,767', 'Brian Flores', '13', '5', '0', '2'),
(35, 'New England Patriots', 'AFC', 'AFC East', 'Foxborough, Massachusetts', 'Gillette Stadium', '65,878', 'Bill Belichick', '22', '11', '0', '6'),
(36, 'New York Jets', 'AFC', 'AFC East', 'East Rutherford, New Jersey', 'MetLife Stadium[C]', '82,500', 'Robert Saleh', '4', '0', '1', '1'),
(37, 'Baltimore Ravens', 'AFC', 'AFC North', 'Baltimore, Maryland', 'M&T Bank Stadium', '71,008', 'John Harbaugh', '6', '2', '0', '2'),
(38, 'Cincinnati Bengals', 'AFC', 'AFC North', 'Cincinnati, Ohio', 'Paul Brown Stadium', '65,515', 'Zac Taylor', '9', '2', '0', '0'),
(39, 'Cleveland Browns', 'AFC', 'AFC North', 'Cleveland, Ohio', 'FirstEnergy Stadium', '67,895', 'Kevin Stefanski', '12', '11', '8', '0'),
(40, 'Pittsburgh Steelers', 'AFC', 'AFC North', 'Pittsburgh, Pennsylvania', 'Heinz Field', '68,400', 'Mike Tomlin', '24', '8', '0', '6'),
(41, 'Houston Texans', 'AFC', 'AFC South', 'Houston, Texas', 'NRG Stadium', '71,995', 'David Culley', '6', '0', '0', '0'),
(42, 'Indianapolis Colts', 'AFC', 'AFC South', 'Indianapolis, Indiana', 'Lucas Oil Stadium', '67,000', 'Frank Reich', '16', '7', '3', '2'),
(43, 'Jacksonville Jaguars', 'AFC', 'AFC South', 'Jacksonville, Florida', 'TIAA Bank Field[E]', '67,814', 'Urban Meyer', '3', '0', '0', '0'),
(44, 'Tennessee Titans', 'AFC', 'AFC South', 'Nashville, Tennessee', 'Nissan Stadium', '69,143', 'Mike Vrabel', '10', '1', '2', '0'),
(45, 'Denver Broncos', 'AFC', 'AFC West', 'Denver, Colorado', 'Empower Field at Mile High', '76,125', 'Vic Fangio', '15', '8', '0', '3'),
(46, 'Kansas City Chiefs', 'AFC', 'AFC West', 'Kansas City, Missouri', 'Arrowhead Stadium', '76,416', 'Andy Reid', '13', '2', '3', '2'),
(47, 'Las Vegas Raiders', 'AFC', 'AFC West', 'Paradise, Nevada', 'Allegiant Stadium', '65,000', 'Jon Gruden', '15', '4', '1', '3'),
(48, 'Los Angeles Chargers', 'AFC', 'AFC West', 'Inglewood, California', 'SoFi Stadium[F]', '70,240', 'Brandon Staley', '15', '1', '1', '0'),
(49, 'Dallas Cowboys', 'NFC', 'NFC East', 'Arlington, Texas', 'AT&T Stadium', '80,000', 'Mike McCarthy', '23', '10', '0', '5'),
(50, 'New York Giants', 'NFC', 'NFC East', 'East Rutherford, New Jersey', 'MetLife Stadium[C]', '82,500', 'Joe Judge', '16', '11', '4', '4'),
(51, 'Philadelphia Eagles', 'NFC', 'NFC East', 'Philadelphia, Pennsylvania', 'Lincoln Financial Field', '69,176', 'Nick Sirianni', '14', '4', '3', '1'),
(52, 'Washington Football Team', 'NFC', 'NFC East', 'Landover, Maryland', 'FedExField', '82,000', 'Ron Rivera', '15', '5', '3', '2'),
(53, 'Chicago Bears', 'NFC', 'NFC North', 'Chicago, Illinois', 'Soldier Field', '61,500', 'Matt Nagy', '19', '4', '8', '1'),
(54, 'Detroit Lions', 'NFC', 'NFC North', 'Detroit, Michigan', 'Ford Field', '65,000', 'Dan Campbell', '4', '4', '4', '0'),
(55, 'Green Bay Packers', 'NFC', 'NFC North', 'Green Bay, Wisconsin', 'Lambeau Field', '81,441', 'Matt LaFleur', '20', '9', '11', '4'),
(56, 'Minnesota Vikings', 'NFC', 'NFC North', 'Minneapolis, Minnesota', 'U.S. Bank Stadium', '66,860', 'Mike Zimmer', '20', '4', '1', '0'),
(57, 'Atlanta Falcons', 'NFC', 'NFC South', 'Atlanta, Georgia', 'Mercedes-Benz Stadium', '71,000', 'Arthur Smith', '6', '2', '0', '0'),
(58, 'Carolina Panthers', 'NFC', 'NFC South', 'Charlotte, North Carolina', 'Bank of America Stadium', '75,523', 'Matt Rhule', '6', '2', '0', '0'),
(59, 'New Orleans Saints', 'NFC', 'NFC South', 'New Orleans, Louisiana', 'Caesars Superdome', '73,208', 'Sean Payton', '9', '1', '0', '1'),
(60, 'Tampa Bay Buccaneers', 'NFC', 'NFC South', 'Tampa, Florida', 'Raymond James Stadium', '65,618', 'Bruce Arians', '6', '2', '0', '2'),
(61, 'Arizona Cardinals', 'NFC', 'NFC West', 'Glendale, Arizona', 'State Farm Stadium', '63,400', 'Kliff Kingsbury', '7', '1', '2', '0'),
(62, 'Los Angeles Rams', 'NFC', 'NFC West', 'Inglewood, California', 'SoFi Stadium[F]', '70,240', 'Sean McVay', '17', '7', '2', '1'),
(63, 'San Francisco 49ers', 'NFC', 'NFC West', 'Santa Clara, California', 'Levi\'s Stadium', '68,500', 'Kyle Shanahan', '20', '7', '0', '5'),
(64, 'Seattle Seahawks', 'NFC', 'NFC West', 'Seattle, Washington', 'Lumen Field', '69,000', 'Pete Carroll', '11', '3', '0', '1');

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
-- Índices para tabela `time`
--
ALTER TABLE `time`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
