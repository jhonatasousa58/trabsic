-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Jul-2018 às 03:29
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdnoticias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosdoenca`
--

DROP TABLE IF EXISTS `dadosdoenca`;
CREATE TABLE IF NOT EXISTS `dadosdoenca` (
  `iddadosDoenca` int(11) NOT NULL AUTO_INCREMENT,
  `periodoReferenciaInicio` date DEFAULT NULL,
  `periodoReferenciaFinal` date DEFAULT NULL,
  `dadosQuantitativos` varchar(4) DEFAULT NULL,
  `informacoesQualitativas` text,
  `nCasosSuspeitos` int(11) DEFAULT NULL,
  `nCasosConfirmados` int(11) DEFAULT NULL,
  `nCasosProvaveis` int(11) DEFAULT NULL,
  `nObitos` int(11) DEFAULT NULL,
  `outrosDados` text,
  `noticias_idNoticias` int(11) NOT NULL,
  `doencas_idDoenca` int(11) NOT NULL,
  `nomeD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iddadosDoenca`),
  KEY `fk_dadosDoenca_doencas1_idx` (`doencas_idDoenca`),
  KEY `fk_dadosDoenca_noticias1_idx` (`noticias_idNoticias`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doencas`
--

DROP TABLE IF EXISTS `doencas`;
CREATE TABLE IF NOT EXISTS `doencas` (
  `idDoenca` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDoenca` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idDoenca`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `doencas`
--

INSERT INTO `doencas` (`idDoenca`, `nomeDoenca`) VALUES
(19, 'Dengue'),
(20, 'Zika'),
(21, 'Febre Amarela'),
(22, 'Aedes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localdoencainternacional`
--

DROP TABLE IF EXISTS `localdoencainternacional`;
CREATE TABLE IF NOT EXISTS `localdoencainternacional` (
  `idlocalDoencaInternacional` int(11) NOT NULL AUTO_INCREMENT,
  `continente` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `regiaoPais` varchar(255) DEFAULT NULL,
  `outro` varchar(255) DEFAULT NULL,
  `dadosDoenca_iddadosDoenca` int(11) NOT NULL,
  PRIMARY KEY (`idlocalDoencaInternacional`),
  KEY `fk_localDoencaInternacional_dadosDoenca1_idx` (`dadosDoenca_iddadosDoenca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localdoencanacional`
--

DROP TABLE IF EXISTS `localdoencanacional`;
CREATE TABLE IF NOT EXISTS `localdoencanacional` (
  `idlocalDoenca` int(11) NOT NULL AUTO_INCREMENT,
  `regiao` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `outro` varchar(255) DEFAULT NULL,
  `dadosDoenca_iddadosDoenca` int(11) NOT NULL,
  PRIMARY KEY (`idlocalDoenca`),
  KEY `fk_localDoencaNacional_dadosDoenca1_idx` (`dadosDoenca_iddadosDoenca`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticias` int(11) NOT NULL AUTO_INCREMENT,
  `tituloOriginalNoticia` varchar(255) DEFAULT NULL,
  `tituloNoticiaPortugues` varchar(255) DEFAULT NULL,
  `fonteNoticia` varchar(255) DEFAULT NULL,
  `linkNoticia` varchar(255) DEFAULT NULL,
  `dataPublicacao` date DEFAULT NULL,
  `dataAtualizacao` date DEFAULT NULL,
  `dataBusca` date DEFAULT NULL,
  `quantidadeDoencas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idNoticias`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `loginUsuario` varchar(30) DEFAULT NULL,
  `senhaUsuario` varchar(33) DEFAULT NULL,
  `cargoUsuario` varchar(45) DEFAULT NULL,
  `dataCadastro` timestamp NULL DEFAULT NULL,
  `nivelAcesso` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `loginUsuario`, `senhaUsuario`, `cargoUsuario`, `dataCadastro`, `nivelAcesso`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', '2018-06-25 03:00:00', 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `dadosdoenca`
--
ALTER TABLE `dadosdoenca`
  ADD CONSTRAINT `fk_dadosDoenca_doencas1` FOREIGN KEY (`doencas_idDoenca`) REFERENCES `doencas` (`idDoenca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dadosDoenca_noticias1` FOREIGN KEY (`noticias_idNoticias`) REFERENCES `noticias` (`idNoticias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `localdoencainternacional`
--
ALTER TABLE `localdoencainternacional`
  ADD CONSTRAINT `fk_localDoencaInternacional_dadosDoenca1` FOREIGN KEY (`dadosDoenca_iddadosDoenca`) REFERENCES `dadosdoenca` (`iddadosDoenca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `localdoencanacional`
--
ALTER TABLE `localdoencanacional`
  ADD CONSTRAINT `fk_localDoencaNacional_dadosDoenca1` FOREIGN KEY (`dadosDoenca_iddadosDoenca`) REFERENCES `dadosdoenca` (`iddadosDoenca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
