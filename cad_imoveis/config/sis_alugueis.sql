-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 14-Fev-2019 às 23:53
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_alugueis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_imovel`
--

DROP TABLE IF EXISTS `cad_imovel`;
CREATE TABLE IF NOT EXISTS `cad_imovel` (
  `cod_imo` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_imo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_imovel`
--

INSERT INTO `cad_imovel` (`cod_imo`, `descr`) VALUES
(1, 'Apartamento 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_locacao`
--

DROP TABLE IF EXISTS `cad_locacao`;
CREATE TABLE IF NOT EXISTS `cad_locacao` (
  `cod_loca` int(10) NOT NULL AUTO_INCREMENT,
  `codimo_loca` int(10) NOT NULL,
  `codloc_loca` int(10) NOT NULL,
  `valor` float DEFAULT NULL,
  `valor_ext` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `dt_loca` date DEFAULT NULL,
  `situacao` varchar(20) CHARACTER SET utf16 DEFAULT NULL,
  PRIMARY KEY (`cod_loca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_locador`
--

DROP TABLE IF EXISTS `cad_locador`;
CREATE TABLE IF NOT EXISTS `cad_locador` (
  `codloc` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `preferencia` text,
  `fone` varchar(20) DEFAULT NULL,
  `cel` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `data_cont` date DEFAULT NULL,
  PRIMARY KEY (`codloc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_locador`
--

INSERT INTO `cad_locador` (`codloc`, `nome`, `preferencia`, `fone`, `cel`, `rg`, `cpf`, `data_cont`) VALUES
(1, 'Victor', 'Apartamento', '999', '999', '999', '999', '2010-10-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_pgto`
--

DROP TABLE IF EXISTS `cad_pgto`;
CREATE TABLE IF NOT EXISTS `cad_pgto` (
  `codpg` int(10) NOT NULL AUTO_INCREMENT,
  `codloca` int(10) NOT NULL,
  `data_pg` date DEFAULT NULL,
  `num_rec` int(10) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_vence` date DEFAULT NULL,
  PRIMARY KEY (`codpg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ult_pg`
--

DROP TABLE IF EXISTS `ult_pg`;
CREATE TABLE IF NOT EXISTS `ult_pg` (
  `id_ultpg` int(10) NOT NULL AUTO_INCREMENT,
  `codloca_pg` int(10) NOT NULL,
  `dtvenc_ultpg` date DEFAULT NULL,
  PRIMARY KEY (`id_ultpg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
