-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Jun-2018 às 03:06
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dadosdoenca`
--

INSERT INTO `dadosdoenca` (`iddadosDoenca`, `periodoReferenciaInicio`, `periodoReferenciaFinal`, `dadosQuantitativos`, `informacoesQualitativas`, `nCasosSuspeitos`, `nCasosConfirmados`, `nCasosProvaveis`, `nObitos`, `outrosDados`, `noticias_idNoticias`, `doencas_idDoenca`, `nomeD`) VALUES
(26, '2018-06-13', '2018-06-27', 'sim', 'aasdasd', 1231, 12312, 3123123, 0, '123123', 42, 7, 'Aasdas'),
(27, '2018-06-20', '2018-06-28', 'sim', 'Notica', 123, 123, 123, 0, '123', 49, 7, 'Aasdas'),
(28, '2018-06-21', '2018-06-20', 'sim', '1231', 123, 123, 123, 0, '123', 49, 7, 'Aasdas'),
(29, '2018-06-22', '2018-06-20', 'sim', 'adwawda', 12312, 12312, 3123, 123123, '123', 49, 9, 'Aedes'),
(30, '2018-06-21', '2018-06-27', 'nao', '', 0, 0, 0, 0, '', 52, 7, 'Aasdas'),
(31, '2018-06-21', '2018-06-27', 'nao', '', 0, 0, 0, 0, '', 52, 7, 'Aasdas'),
(32, '2018-06-28', '2018-06-28', 'nao', '', 0, 0, 0, 0, '', 52, 7, 'Aasdas'),
(33, '2018-06-27', '2018-06-22', 'nao', '', 0, 0, 0, 0, '', 52, 11, 'Febre Amarela'),
(34, '2018-06-27', '2018-06-27', 'nao', '', 0, 0, 0, 0, '', 52, 7, 'Aasdas'),
(35, '2018-06-28', '2018-06-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 52, 7, 'Aasdas'),
(36, '2018-06-28', '2018-06-28', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 52, 6, 'Zika'),
(37, '2018-06-28', '2018-06-21', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 54, 7, 'Zika'),
(38, '2018-06-29', '2018-06-28', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 54, 4, 'Dengue'),
(39, '2018-06-21', '2018-06-14', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 55, 9, ''),
(40, '2018-06-28', '2018-06-28', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 55, 11, 'Febre Amarela'),
(41, '2018-06-19', '2018-06-21', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 56, 7, 'Aasdas'),
(42, '2018-06-14', '2018-06-20', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 56, 6, 'Zika'),
(43, '2018-06-08', '2018-06-07', 'nao', NULL, NULL, NULL, NULL, NULL, NULL, 56, 9, 'Aedes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doencas`
--

DROP TABLE IF EXISTS `doencas`;
CREATE TABLE IF NOT EXISTS `doencas` (
  `idDoenca` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDoenca` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idDoenca`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `doencas`
--

INSERT INTO `doencas` (`idDoenca`, `nomeDoenca`) VALUES
(4, 'Dengue'),
(6, 'Zika'),
(7, 'Aasdas'),
(9, 'Aedes'),
(11, 'Febre Amarela');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `localdoencainternacional`
--

INSERT INTO `localdoencainternacional` (`idlocalDoencaInternacional`, `continente`, `pais`, `regiaoPais`, `outro`, `dadosDoenca_iddadosDoenca`) VALUES
(9, 'Ásia', 'asdasd', 'asdasd', 'asdasd', 38);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `localdoencanacional`
--

INSERT INTO `localdoencanacional` (`idlocalDoenca`, `regiao`, `estado`, `municipio`, `outro`, `dadosDoenca_iddadosDoenca`) VALUES
(11, 'Norte', 'Pernambuco', 'asdasdasd', 'asdasd', 37),
(12, 'Norte', 'Paraná', 'Brasilia', 'awdawd', 39),
(13, 'Centro-Oeste', 'Rondônia', 'asdas', 'dasdasd', 40),
(14, 'Norte', 'Paraná', 'awdsad', 'asdasd', 41),
(15, 'Norte', 'Piauí', 'Brasilia', 'awdawd', 42),
(16, 'Sudeste', 'Piauí', 'Brasilia', '13123', 43);

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`idNoticias`, `tituloOriginalNoticia`, `tituloNoticiaPortugues`, `fonteNoticia`, `linkNoticia`, `dataPublicacao`, `dataAtualizacao`, `dataBusca`, `quantidadeDoencas`) VALUES
(39, 'asdasd', 'tituloOriginal', 'Google', 'www.google.com', '2018-06-27', '2018-06-27', '2018-06-27', NULL),
(42, 'awdawda', 'Teste RepetiÃ§Ã£o', 'Teste RepetiÃ§Ã£o', 'www.google.com', '2018-06-27', '2018-06-19', '2018-06-14', NULL),
(44, 'Teste RepetiÃ§Ã£o', 'Noticia 1', 'Teste RepetiÃ§Ã£o', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-18', NULL),
(45, 'Teste RepetiÃ§Ã£o', 'Noticia 1', 'Teste RepetiÃ§Ã£o', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-18', NULL),
(46, '1231231', 'Teste RepetiÃ§Ã£o', 'Teste RepetiÃ§Ã£o', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-27', NULL),
(47, '1231231', 'Teste RepetiÃ§Ã£o', 'Teste RepetiÃ§Ã£o123', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-27', NULL),
(48, 'asdasd', 'tituloOriginal', 'Teste RepetiÃ§Ã£o123', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-21', NULL),
(49, 'asdasd', 'Teste RepetiÃ§Ã£o', 'Teste RepetiÃ§Ã£o', 'www.google.com', '2018-06-27', '2018-06-27', '2018-06-27', NULL),
(50, 'asdasdasdas', 'dasdasd', 'asdasdasdas', 'dasdasasdas', '2018-06-28', '2018-06-21', '2018-06-28', NULL),
(51, 'Teste RepetiÃ§Ã£o', 'tituloOriginal', 'asdasdasdas', 'www.google.com', '2018-06-27', '2018-06-27', '2018-06-20', NULL),
(52, 'Teste', '', '', '', '2018-06-27', '2018-06-28', '2018-06-28', NULL),
(53, 'NaÃ§Ã£o', 'NaÃ§Ã£o', 'Google', 'www.google.com', '2018-06-27', '2018-06-27', '2018-06-27', NULL),
(54, 'Nação', 'Nação', 'Teste Repetição', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-27', NULL),
(55, 'Teste Repetição', 'tituloOriginal', 'Teste Repetição123', 'dasdasasdas', '2018-06-27', '2018-06-28', '2018-06-29', NULL),
(56, 'Teste Busca', 'Noticia 1', 'Teste Repetição123', 'www.google.com', '2018-06-27', '2018-06-28', '2018-06-29', NULL),
(57, 'Pesquisadores da USP coletam amostras de macacos para estudo de doenças', 'Pesquisadores da USP coletam amostras de macacos para estudo de doenças', 'G1', 'https://g1.globo.com/sp/sao-jose-do-rio-preto-aracatuba/noticia/pesquisadores-da-usp-coletam-amostras-de-macacos-para-estudo-de-doencas.ghtml', '2018-06-13', '2018-06-13', '2018-06-27', NULL),
(59, 'Pesquisadores da USP coletam amostras de macacos para estudo de doenças', 'Pesquisadores da USP coletam amostras de macacos para estudo de doenças', 'G1', 'https://g1.globo.com/sp/sao-jose-do-rio-preto-aracatuba/noticia/pesquisadores-da-usp-coletam-amostras-de-macacos-para-estudo-de-doencas.ghtml', '2018-06-13', '2018-06-13', '2018-06-27', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `loginUsuario`, `senhaUsuario`, `cargoUsuario`, `dataCadastro`, `nivelAcesso`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', '2018-06-25 03:00:00', 2),
(2, 'Admin', 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', '2018-06-27 01:23:35', 1),
(3, 'Jhonata Sousa', 'Jhonata Sousa', 'd1657f91f0aa11579f7e4662f4745ca8', 'Jhonata Sousa', '2018-06-27 01:24:17', 1),
(4, 'Jhonata Sousa', 'asdasasd', 'e10adc3949ba59abbe56e057f20f883e', 'Administrador', '2018-06-27 01:24:55', 2),
(5, 'ADELSON JHONATA SILVA DE SOUSA', 'asdmin', 'e10adc3949ba59abbe56e057f20f883e', 'estagiario', '2018-06-27 01:25:32', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `dadosdoenca`
--
ALTER TABLE `dadosdoenca`
  ADD CONSTRAINT `fk_dadosDoenca_doencas1` FOREIGN KEY (`doencas_idDoenca`) REFERENCES `doencas` (`idDoenca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dadosDoenca_noticias1` FOREIGN KEY (`noticias_idNoticias`) REFERENCES `noticias` (`idNoticias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `localdoencainternacional`
--
ALTER TABLE `localdoencainternacional`
  ADD CONSTRAINT `fk_localDoencaInternacional_dadosDoenca1` FOREIGN KEY (`dadosDoenca_iddadosDoenca`) REFERENCES `dadosdoenca` (`iddadosDoenca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `localdoencanacional`
--
ALTER TABLE `localdoencanacional`
  ADD CONSTRAINT `fk_localDoencaNacional_dadosDoenca1` FOREIGN KEY (`dadosDoenca_iddadosDoenca`) REFERENCES `dadosdoenca` (`iddadosDoenca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
