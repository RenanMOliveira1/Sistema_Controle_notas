-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2015 às 16:14
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
  `email` varchar(100) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cargo` char(3) NOT NULL,
  PRIMARY KEY (`idAdm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `administracao`
--

INSERT INTO `administracao` (`idAdm`, `nomeFuncionario`, `email`, `senha`, `cpf`, `cargo`) VALUES
(1, 'Administrador', 'admin@admin.com', 'admin', '', 'adm'),
(2, 'Assistente RCA', 'rca@admin.com', '123', '12345678910', 'rca'),
(3, 'assistente pedagógico', 'ped@admin.com', '123', '', 'ped'),
(4, 'assistente da direção', 'ass@admin.com', '123', '', 'ass'),
(5, 'diretor', 'dir@admin.com', '123', '', 'dir');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nomeAluno`, `cpf`, `dataNascimento`, `sexo`, `email`, `senha`, `acesso`) VALUES
(1, 'Ramon Portela', '12183829702', '16/07/1996', 'Masculino', 'ramon@aluno.com', '123', 1),
(2, 'Ramon Portela Santos', '12183829702', '16/07/1996', 'Masculino', 'ramon.santos@aluno.com', '!aluno2015', 0),
(3, 'Ramon Portela Santos', '12183829702', '16/07/1996', 'Masculino', 'ramon.psantos@aluno.com', '!aluno2015', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_programa`
--

CREATE TABLE IF NOT EXISTS `aluno_programa` (
  `idPrograma` int(11) NOT NULL,
  `alunoMatricula` int(11) NOT NULL,
  PRIMARY KEY (`idPrograma`,`alunoMatricula`),
  KEY `alunoMatricula` (`alunoMatricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_programa`
--

INSERT INTO `aluno_programa` (`idPrograma`, `alunoMatricula`) VALUES
(1, 2),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `alunoMatricula` int(11) NOT NULL,
  `resposta1` int(11) NOT NULL,
  `resposta2` int(11) NOT NULL,
  `resposta3` int(11) NOT NULL,
  `resposta4` int(11) NOT NULL,
  PRIMARY KEY (`idAvaliacao`),
  KEY `idModulo` (`alunoMatricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idAvaliacao`, `alunoMatricula`, `resposta1`, `resposta2`, `resposta3`, `resposta4`) VALUES
(1, 1, 4, 4, 3, 2);

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
('21211790', 'condominio', 97, 'rua bla bla bla', 'apartamento 202', 'qualquer bairro', 'qualquer cidade', 'RJ', 1),
('21211790', 'casa', 97, 'belo monte', 'apt 202', 'bairrinho', 'Vila', 'AC', 2),
('21211790', 'casa', 7, 'belo monte', '', 'bela vista', 'cidadela', 'AC', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidade_modulo`
--

CREATE TABLE IF NOT EXISTS `habilidade_modulo` (
  `idHabilidade` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  PRIMARY KEY (`idHabilidade`,`idModulo`),
  KEY `idHabilidade` (`idHabilidade`,`idModulo`),
  KEY `habilidade_modulo_ibfk_2` (`idModulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `habilidade_modulo`
--

INSERT INTO `habilidade_modulo` (`idHabilidade`, `idModulo`) VALUES
(1, 7),
(2, 7),
(3, 7);

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

--
-- Extraindo dados da tabela `habilidade_professor`
--

INSERT INTO `habilidade_professor` (`idHabilidade`, `idProfessor`) VALUES
(1, 2),
(1, 4),
(2, 4),
(3, 4),
(1, 5),
(2, 5),
(3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hablidade`
--

CREATE TABLE IF NOT EXISTS `hablidade` (
  `idHabilidade` int(11) NOT NULL AUTO_INCREMENT,
  `nomeHab` varchar(30) NOT NULL,
  PRIMARY KEY (`idHabilidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `hablidade`
--

INSERT INTO `hablidade` (`idHabilidade`, `nomeHab`) VALUES
(1, 'cálculo'),
(2, 'java'),
(3, 'php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `idLaboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `numeroLab` int(11) NOT NULL,
  `lugares` int(11) NOT NULL,
  `andar` int(11) NOT NULL,
  PRIMARY KEY (`idLaboratorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `laboratorio`
--

INSERT INTO `laboratorio` (`idLaboratorio`, `numeroLab`, `lugares`, `andar`) VALUES
(1, 213, 20, 2),
(2, 101, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `descr` text NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`idModulo`, `nome`, `descr`) VALUES
(1, 'html', 'Matéria sobre a disciplina HTML'),
(2, 'Java', 'Matéria sobre a disciplina java'),
(3, 'Algebra', 'Matéria sobre a disciplina álgebra linear'),
(4, 'banco de dados', 'matéria sobre banco de dados'),
(5, 'sistemas operacionais', 'matéria sobre sistemas operacionais'),
(6, 'Java II', 'Matéria sobre java mais avançada'),
(7, 'Cálculo II', 'fdsafsdadfsa');

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
(3, 1),
(3, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(3, 5),
(7, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProfessor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`idProfessor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nomeProfessor`, `email`, `senha`, `cpf`) VALUES
(1, 'Professor1', '', '', ''),
(2, 'Professor2', 'prof2@prof.com', 'prof2', ''),
(4, 'Luís Paulo Maia', 'lp@prof.com', '1234', '12345678910'),
(5, 'fdasfdas', 'teste@prof.com', '123', '12183829702');

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `idPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `nomeCurso` varchar(50) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  PRIMARY KEY (`idPrograma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `programa`
--

INSERT INTO `programa` (`idPrograma`, `tipo`, `nomeCurso`, `sigla`) VALUES
(1, 'graduacao', 'Engenharia da Computação', 'GEC'),
(2, 'graduacao', 'Gestão da tecnologia da informação', 'GTI'),
(3, 'pos', 'MIT Big Data', 'MBD');

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

--
-- Extraindo dados da tabela `programa_modulo`
--

INSERT INTO `programa_modulo` (`idPrograma`, `idModulo`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(1, 5),
(2, 5),
(3, 6),
(3, 7);

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
('55551234', '912345555', 1),
('12341234', '', 2),
('', '', 3);

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
  `idPrograma` int(11) NOT NULL,
  `idProfessor` int(11) DEFAULT NULL,
  `liberado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTurma`),
  KEY `idModulo` (`idModulo`),
  KEY `idLaboratorio` (`idLaboratorio`),
  KEY `idPrograma` (`idPrograma`),
  KEY `idProfessor` (`idProfessor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `turno`, `nomeTurma`, `idModulo`, `idLaboratorio`, `idPrograma`, `idProfessor`, `liberado`) VALUES
(1, 'Noite', 'GEC 1 - HTML', 1, 2, 1, 4, 0),
(2, 'Tarde', 'GEC 1 - BANCO DE DADOS', 4, 1, 1, 4, 1),
(3, 'Tarde', 'GEC 1 - ALGEBRA', 3, 1, 1, NULL, 1),
(4, 'Manhã', 'GEC 1 - JAVA', 2, 2, 1, 4, 1),
(5, 'Manhã', 'GEC 1 - SISTEMAS OPERACIONAIS', 5, 1, 1, 4, 0),
(6, 'Manhã', 'MBD 1 - ALGEBRA', 3, 1, 3, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_aluno`
--

CREATE TABLE IF NOT EXISTS `turma_aluno` (
  `alunoMatricula` int(11) NOT NULL,
  `turmaID` int(11) NOT NULL,
  `av1` decimal(4,2) DEFAULT '-1.00',
  `av2` decimal(4,2) DEFAULT '-1.00',
  `av3` decimal(4,2) DEFAULT '-1.00',
  PRIMARY KEY (`alunoMatricula`,`turmaID`),
  KEY `alunoMatricula` (`alunoMatricula`,`turmaID`),
  KEY `alunoMatricula_2` (`alunoMatricula`),
  KEY `turmaID` (`turmaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_aluno`
--

INSERT INTO `turma_aluno` (`alunoMatricula`, `turmaID`, `av1`, `av2`, `av3`) VALUES
(1, 1, '10.00', '8.00', '7.00'),
(1, 2, '-1.00', '-1.00', '-1.00'),
(1, 3, '-1.00', '-1.00', '-1.00'),
(1, 4, '4.00', '3.00', '2.00'),
(1, 5, '-1.00', '5.00', '3.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_avaliacao`
--

CREATE TABLE IF NOT EXISTS `turma_avaliacao` (
  `idTurma` int(11) NOT NULL,
  `idAvaliacao` int(11) NOT NULL,
  `respProf1` int(11) NOT NULL,
  `respProf2` int(11) NOT NULL,
  `respProf3` int(11) NOT NULL,
  `respProf4` int(11) NOT NULL,
  `respProf5` int(11) NOT NULL,
  `respProf6` int(11) NOT NULL,
  `respProf7` int(11) NOT NULL,
  `respProf8` int(11) NOT NULL,
  PRIMARY KEY (`idTurma`,`idAvaliacao`),
  KEY `idAvaliacao` (`idAvaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_avaliacao`
--

INSERT INTO `turma_avaliacao` (`idTurma`, `idAvaliacao`, `respProf1`, `respProf2`, `respProf3`, `respProf4`, `respProf5`, `respProf6`, `respProf7`, `respProf8`) VALUES
(2, 1, 4, 4, 3, 4, 3, 2, 4, 3),
(4, 1, 1, 3, 2, 5, 4, 4, 3, 4);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_programa`
--
ALTER TABLE `aluno_programa`
  ADD CONSTRAINT `aluno_programa_ibfk_1` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aluno_programa_ibfk_2` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `habilidade_modulo`
--
ALTER TABLE `habilidade_modulo`
  ADD CONSTRAINT `habilidade_modulo_ibfk_1` FOREIGN KEY (`idHabilidade`) REFERENCES `hablidade` (`idHabilidade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `habilidade_modulo_ibfk_2` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`idLaboratorio`) REFERENCES `laboratorio` (`idLaboratorio`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_3` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_4` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`idProfessor`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD CONSTRAINT `turma_aluno_ibfk_1` FOREIGN KEY (`alunoMatricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_aluno_ibfk_2` FOREIGN KEY (`turmaID`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma_avaliacao`
--
ALTER TABLE `turma_avaliacao`
  ADD CONSTRAINT `turma_avaliacao_ibfk_1` FOREIGN KEY (`idTurma`) REFERENCES `turma` (`idTurma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_avaliacao_ibfk_2` FOREIGN KEY (`idAvaliacao`) REFERENCES `avaliacao` (`idAvaliacao`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
