-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jun-2015 às 08:10
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infnetgrid`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE IF NOT EXISTS `administracao` (
  `idAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cargo` char(3) NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `acesso` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`, `acesso`) VALUES
(1, 'teste', '123', '123', 'masculino', 'teste@teste.com', '123', 0),
(12, 'fdafdas', '12183829702', '16/07/1996', 'Masculino', 'teste@cadastro.com', '123', 0),
(13, 'fdafdas', '12183829702', '16/07/1996', 'Masculino', 'aluno@teste.com', '123', 0),
(14, 'Ramon Portela', '12183829702', '16/07/1996', 'Masculino', 'ramon@aluno.com', '1234', 0),
(16, 'teste123', '12183829702', '16/07/1996', 'Masculino', 'value@teste.com', '123', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_programa`
--

CREATE TABLE IF NOT EXISTS `aluno_programa` (
  `alunoMatricula` int(11) NOT NULL,
  `idPrograma` int(11) NOT NULL,
  PRIMARY KEY (`alunoMatricula`,`idPrograma`),
  KEY `idPrograma` (`idPrograma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `nota` decimal(4,2) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`idAvaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `Cep` varchar(10) NOT NULL,
  `tipoLogradouro` varchar(30) NOT NULL,
  `numero` int(11) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(65) NOT NULL,
  `cidade` varchar(65) NOT NULL,
  `estado` char(2) NOT NULL,
  `alunoMatricula` int(11) NOT NULL,
  PRIMARY KEY (`alunoMatricula`),
  KEY `alunoMatricula` (`alunoMatricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`Cep`, `tipoLogradouro`, `numero`, `logradouro`, `complemento`, `bairro`, `cidade`, `estado`, `alunoMatricula`) VALUES
('21211790', 'casa', 42, 'Rua Padre Manuel Viegas', 'o lepo lepo', 'bairrinho', 'cidadela', 'AC', 12),
('21211790', 'casa', 42, 'hahahaha', 'o lepo lepo', 'bairrinho', 'cidadela', 'RJ', 13),
('21211790', 'casa', 42, 'hahahaha', 'o lepo lepo', 'bairrinho', 'cidadela', 'RJ', 14),
('21211790', 'chacara', 7, 'belo monte', '', 'bela vista', 'fdsfdasfs', 'GO', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidade_professor`
--

CREATE TABLE IF NOT EXISTS `habilidade_professor` (
  `idHabilidade` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  PRIMARY KEY (`idHabilidade`,`idProfessor`),
  KEY `idHabilidade` (`idHabilidade`,`idProfessor`),
  KEY `idProfessor` (`idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hablidade`
--

CREATE TABLE IF NOT EXISTS `hablidade` (
  `idHabilidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`idHabilidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `idLaboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `lugares` int(11) NOT NULL,
  `andar` int(11) NOT NULL,
  PRIMARY KEY (`idLaboratorio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`idModulo`, `nome`, `desc`) VALUES
(1, 'html', 'Matéria sobre a disciplina HTML'),
(2, 'Java', 'Matéria sobre a disciplina java'),
(3, 'Algebra', 'Matéria sobre a disciplina álgebra linear');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo_professor`
--

CREATE TABLE IF NOT EXISTS `modulo_professor` (
  `idModulo` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  PRIMARY KEY (`idModulo`,`idProfessor`),
  KEY `idModulo` (`idModulo`,`idProfessor`),
  KEY `idProfessor` (`idProfessor`),
  KEY `idProfessor_2` (`idProfessor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modulo_professor`
--

INSERT INTO `modulo_professor` (`idModulo`, `idProfessor`) VALUES
(1, 1),
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProfessor` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`idProfessor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nomeProfessor`, `cpf`) VALUES
(1, 'teste', ''),
(2, 'prof2', ''),
(3, 'blablabla', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `idPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `nomeCurso` varchar(30) NOT NULL,
  PRIMARY KEY (`idPrograma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa_modulo`
--

CREATE TABLE IF NOT EXISTS `programa_modulo` (
  `idPrograma` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  PRIMARY KEY (`idPrograma`,`idModulo`),
  KEY `idPrograma` (`idPrograma`,`idModulo`),
  KEY `idModulo` (`idModulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `telefone` varchar(9) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `alunoMatricula` int(11) NOT NULL,
  PRIMARY KEY (`alunoMatricula`),
  KEY `alunoMatricula` (`alunoMatricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`telefone`, `celular`, `alunoMatricula`) VALUES
('123', '456', 13),
('12341234', '912341234', 14),
('12341234', '912341234', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(10) NOT NULL,
  `nomeTurma` varchar(50) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `idLaboratorio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTurma`),
  KEY `idModulo` (`idModulo`),
  KEY `idLaboratorio` (`idLaboratorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `turno`, `nomeTurma`, `idModulo`, `idLaboratorio`) VALUES
(1, 'tarde', 'turmar HTML', 1, NULL),
(2, 'tarde', 'turma JAVA', 2, NULL),
(3, 'tarde', 'turma Algebra', 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_aluno`
--

CREATE TABLE IF NOT EXISTS `turma_aluno` (
  `alunoMatricula` int(11) NOT NULL,
  `turmaID` int(11) NOT NULL,
  PRIMARY KEY (`alunoMatricula`,`turmaID`),
  KEY `alunoMatricula` (`alunoMatricula`,`turmaID`),
  KEY `alunoMatricula_2` (`alunoMatricula`),
  KEY `turmaID` (`turmaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_aluno`
--

INSERT INTO `turma_aluno` (`alunoMatricula`, `turmaID`) VALUES
(1, 1),
(1, 2),
(1, 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_programa`
--
ALTER TABLE `aluno_programa`
  ADD CONSTRAINT `aluno_programa_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aluno_programa_ibfk_2` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `habilidade_professor`
--
ALTER TABLE `habilidade_professor`
  ADD CONSTRAINT `habilidade_professor_ibfk_1` FOREIGN KEY (`idHabilidade`) REFERENCES `hablidade` (`idHabilidade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `habilidade_professor_ibfk_2` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `modulo_professor`
--
ALTER TABLE `modulo_professor`
  ADD CONSTRAINT `modulo_professor_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modulo_professor_ibfk_2` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `programa_modulo`
--
ALTER TABLE `programa_modulo`
  ADD CONSTRAINT `programa_modulo_ibfk_1` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `programa_modulo_ibfk_2` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`idLaboratorio`) REFERENCES `laboratorio` (`idLaboratorio`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD CONSTRAINT `turma_aluno_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_aluno_ibfk_2` FOREIGN KEY (`turmaID`) REFERENCES `turma` (`idTurma`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
