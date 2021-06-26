-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 11:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdrisecode`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarAluno` (IN `nome2` VARCHAR(255), IN `ra2` VARCHAR(255), IN `foto2` VARCHAR(255), IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `idTurma2` INT)  begin
		DECLARE done INT DEFAULT FALSE;
        DECLARE idJogo2 INT; 
        DEClARE curJogo CURSOR FOR SELECT idJogo FROM tbJogo;
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
		if not exists(select ra from tbAluno where ra like ra2)
        then
			if not exists(select login from tbUsuario where login like login2 and idTipoUsuario = 4)
			then
				if(nome2 <> "" and ra2 <> "" and foto2 <> "" and login2 <> "" and senha2 <> "" and idTurma2 <> 0)
				then
					INSERT INTO tbUsuario (login,senha,idTipoUsuario) values (login2,senha2,4);
                    SELECT last_insert_id()
						INTO @newIdUsuario;

					INSERT INTO tbAluno (nome,ra,foto,idUsuario,idTurma) values (nome2,ra2,foto2,@newIdUsuario,idTurma2);
				
					SELECT last_insert_id()
						INTO @newIdAluno;
				 
					OPEN curJogo;
                    
                    read_loop: LOOP
					  FETCH curJogo INTO idJogo2;
						IF done THEN
						  LEAVE read_loop;
						END IF;

					 INSERT INTO tbAlunoJogo (idAluno,idJogo,pontuacao,avaliacao,progresso) values (@newIdAluno,idJogo2,0,0,0);

					END LOOP;

					CLOSE curJogo;
					
					select "Dados cadastrados com sucesso!";
				else
					select "Existem campos vazios!";
				end if;
			else
				select "Este login já existe!";
			end if;

		else
			select "Este R.A. já existe!";
		end if;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarEscola` (IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `nome2` VARCHAR(255), IN `logradouro2` VARCHAR(222), IN `numero2` VARCHAR(255), IN `bairro2` VARCHAR(255), IN `cidade2` VARCHAR(255), IN `estado2` VARCHAR(255), IN `cep2` VARCHAR(255), IN `telefones` TEXT)  begin
        DECLARE strLen    INT DEFAULT 0;
		DECLARE SubStrLen INT DEFAULT 0;
    
		if not exists(select login from tbUsuario where login like login2 and idTipoUsuario = 2)
        then
    
			if(login2 <> "" and senha2 <> "" and nome2 <> "" and logradouro2 <> "" and numero2 <> "" 
			and bairro2 <> "" and cidade2 <> "" and estado2 <> "" and cep2 <> "")
			then
		
				INSERT INTO tbUsuario (login,senha,idTipoUsuario) values (login2,senha2,2);
			
				SELECT last_insert_id()
					INTO @newIdUsuario;
					
				insert into tbEscola (nome, logradouro, numero, bairro, cidade, estado, cep, idUsuario) VALUES 
				(nome2, logradouro2, numero2, bairro2, cidade2, estado2, cep2, @newIdUsuario);
				
				SELECT last_insert_id()
					INTO @newIdEscola;
					
				do_this:
				  LOOP
					SET strLen = CHAR_LENGTH(telefones);

					INSERT INTO tbTelefoneEscola (idEscola, descricao) VALUES(@newIdEscola,SUBSTRING_INDEX(telefones, ',', 1));

					SET SubStrLen = CHAR_LENGTH(SUBSTRING_INDEX(telefones, ',', 1))+2;
					SET telefones = MID(telefones, SubStrLen, strLen);

					IF telefones = '' THEN
					  LEAVE do_this;
					END IF;
				  END LOOP do_this;

				COMMIT;
				
				select "Dados cadastrados com sucesso!";
			else
				select "Existem campos vazios!";
			end if;
		else
			select "Este login já existe!";
        end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarProfessor` (IN `nome2` VARCHAR(255), IN `rg2` VARCHAR(255), IN `foto2` VARCHAR(255), IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `idTurma2` TEXT)  begin
		DECLARE strLen    INT DEFAULT 0;
		DECLARE SubStrLen INT DEFAULT 0;
    
		if not exists(select rg from tbProfessor where rg like rg2)
        then
			if not exists(select login from tbUsuario where login like login2 and idTipoUsuario = 4)
			then
				if(nome2 <> "" and rg2 <> "" and foto2 <> "" and login2 <> "" and senha2 <> "")
				then
					INSERT INTO tbUsuario (login,senha,idTipoUsuario) values (login2,senha2,3);
                    SELECT last_insert_id()
						INTO @newIdUsuario;

					INSERT INTO tbProfessor (nome,rg,foto,idUsuario) values (nome2,rg2,foto2,@newIdUsuario);
				
					SELECT last_insert_id()
						INTO @newIdProfessor;
                        
					do_this:
					  LOOP
						SET strLen = CHAR_LENGTH(idTurma2);

						INSERT INTO tbTurmaProfessor (idTurma, idProfessor) VALUES(SUBSTRING_INDEX(idTurma2, ',', 1),@newIdProfessor);

						SET SubStrLen = CHAR_LENGTH(SUBSTRING_INDEX(idTurma2, ',', 1))+2;
						SET idTurma2 = MID(idTurma2, SubStrLen, strLen);

						IF idTurma2 = '' THEN
						  LEAVE do_this;
						END IF;
					  END LOOP do_this;

					COMMIT;

					
					select "Dados cadastrados com sucesso!";
				else
					select "Existem campos vazios!";
				end if;
			else
				select "Este login já existe!";
			end if;

		else
			select "Este RG já existe!";
		end if;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarTurma` (IN `descricao2` VARCHAR(255), IN `idEscola2` VARCHAR(255))  begin
    
		if not exists(select descricao from tbTurma where descricao like descricao2)
        then
			if(descricao2 <> "" and idEscola2 <> 0)
			then
				INSERT INTO tbTurma (descricao,idEscola) values (descricao2,idEscola2);
				select "Dados cadastrados com sucesso!";
			else
				select "Existem campos vazios!";
			end if;
		else
			select "Esta turma já existe!";
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAlunoEspecifico` (IN `id` INT)  begin
    
		if exists(select idAluno from tbAluno where idAluno = id)
        then
			SELECT * from tbAluno 
                         inner join tbUsuario on tbAluno.idUsuario = tbUsuario.idUsuario  
                          inner join tbTurma on tbAluno.idTurma = tbTurma.idTurma
                             where idAluno = id and tbAluno.ativo = 1 and tbTurma.ativo = 1;
		else
			select 0;
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAlunos` (IN `nome2` VARCHAR(255), IN `idEscola2` INT(255))  begin
		SELECT * from tbAluno inner join tbTurma on tbAluno.idTurma = tbTurma.idTurma 
        inner join tbUsuario on tbAluno.idUsuario = tbUsuario.idUsuario 
inner join tbEscola on tbTurma.idEscola = tbEscola.idEscola
        where (tbAluno.ativo = 1 and tbTurma.ativo = 1 and tbEscola.idEscola = idEscola2) and (tbAluno.nome like concat('%',nome2,'%') or ra like nome2);  
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEscolaEspecifica` (IN `id` INT)  begin
    
		if exists(select idEscola from tbEscola where idEscola = id)
        then
			SELECT * from tbEscola inner join tbUsuario on tbEscola.idUsuario = tbUsuario.idUsuario 
            where idEscola = id and tbEscola.ativo = 1;
		else
			select 0;
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEscolas` (IN `nome2` VARCHAR(255))  begin
		SELECT * from tbEscola inner join tbUsuario on tbEscola.idUsuario = tbUsuario.idUsuario 
        where nome like concat('%',nome2,'%') and tbEscola.ativo = 1;  
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarProfessores` (IN `nome2` VARCHAR(255), IN `idEscola2` INT)  begin
SELECT * from tbProfessor inner join tbTurmaProfessor on tbProfessor.idProfessor = tbTurmaProfessor.idProfessor
		inner join tbTurma on tbTurmaProfessor.idTurma = tbTurma.idTurma
		inner join tbEscola on tbTurma.idEscola = tbEscola.idEscola
		inner join tbUsuario on tbProfessor.idUsuario = tbUsuario.idUsuario
        where (tbProfessor.nome like concat('%',nome2,'%') or rg like nome2) and (tbProfessor.ativo = 1 and tbEscola.ativo = 1 and tbEscola.idEscola = idEscola2);  
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarProfessorEspecifico` (IN `id` INT)  begin
    
		if exists(select idProfessor from tbProfessor where idProfessor = id)
        then
			SELECT * from tbProfessor inner join tbTurmaProfessor on tbProfessor.idProfessor = tbTurmaProfessor.idProfessor
			inner join tbTurma on tbTurmaProfessor.idTurma = tbTurma.idTurma
			inner join tbEscola on tbTurma.idEscola = tbEscola.idEscola
		inner join tbUsuario on tbProfessor.idUsuario = tbUsuario.idUsuario

			where idProfessor = id and tbProfessor.ativo = 1 and tbEscola.ativo = 1;
		else
			select 0;
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarTelefonesEscola` (IN `idEscola2` INT)  begin
		SELECT * from tbTelefoneEscola where idEscola = idEscola2;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarTurmaEspecifica` (IN `id` INT)  begin
    
		if exists(select idTurma from tbTurma where idTurma = id)
        then
			SELECT * from tbTurma inner join tbEscola on 
            tbTurma.idEscola = tbEscola.idEscola where idTurma = id and tbTurma.ativo = 1 and tbEscola.ativo = 1 and tbTurma.ativo = 1;
		else
			select 0;
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarTurmas` (IN `descricao2` VARCHAR(255), IN `idEscola2` INT(255))  begin
		SELECT * from tbTurma inner join tbEscola on tbTurma.idEscola = tbEscola.idEscola
        where descricao like concat('%',descricao2,'%') and tbTurma.ativo = 1 and tbEscola.ativo = 1 and tbEscola.idEscola = idEscola2;  
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarAluno` (IN `nome2` VARCHAR(255), IN `idTurma2` INT, IN `ra2` VARCHAR(255), IN `idAluno2` INT, IN `foto2` VARCHAR(255), IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `idUsuario2` INT)  begin
		DECLARE qtd INT DEFAULT 0;
    
		SET qtd = (select count(login) from tbUsuario where login like login2 and idUsuario <> idUsuario2);
		if (qtd < 1)
		then
			if( nome2 <> "" and idTurma2 <> 0 and ra2 <> "" and idAluno2 <> 0 and foto2 <> "")
			then
				SET qtd = (select count(ra) from tbAluno where ra like ra2 and idAluno <> idAluno2);
				if (qtd < 1)
				then
					UPDATE tbUsuario set login=login2, senha=senha2 where idUsuario = idUsuario2;
					UPDATE tbAluno SET nome = nome2, ra = ra2, idTurma = idTurma2, foto = foto2 WHERE idAluno = idAluno2;
					select "Dados editados com sucesso!";
				else
					select "Este R.A. já existe!";
				end if;
			else
				select "Existem campos vazios!";
			end if;
		else
			select "Este login já existe!";
        end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarEscola` (IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `nome2` VARCHAR(255), IN `logradouro2` VARCHAR(222), IN `numero2` VARCHAR(255), IN `bairro2` VARCHAR(255), IN `cidade2` VARCHAR(255), IN `estado2` VARCHAR(255), IN `cep2` VARCHAR(255), IN `telefones` TEXT, IN `idUsuario2` INT, IN `idEscola2` INT)  begin
        DECLARE strLen    INT DEFAULT 0;
		DECLARE SubStrLen INT DEFAULT 0;
        DECLARE qtd INT DEFAULT 0;
    
		SET qtd = (select count(login) from tbUsuario where login like login2 and idUsuario <> idUsuario2);
		if (qtd < 1)
		then
    
			if(login2 <> "" and senha2 <> "" and nome2 <> "" and logradouro2 <> "" and numero2 <> "" 
			and bairro2 <> "" and cidade2 <> "" and estado2 <> "" and cep2 <> "" and idEscola2 <> 0 and 
            idUsuario2 <> 0)
			then
		
				UPDATE tbUsuario SET login = login2, senha = senha2 where idUsuario = idUsuario2;
					
				UPDATE tbEscola SET nome = nome2, logradouro = logradouro2, numero = numero2, bairro = bairro2, 
                cidade = cidade2, estado = estado2, cep = cep2, idUsuario = idUsuario2 where idEscola = idEscola2;
					
				DELETE FROM tbTelefoneEscola where idEscola = idEscola2;
                
                do_this:
				  LOOP
					SET strLen = CHAR_LENGTH(telefones);

					INSERT INTO tbTelefoneEscola (idEscola, descricao) VALUES(idEscola2,SUBSTRING_INDEX(telefones, ',', 1));

					SET SubStrLen = CHAR_LENGTH(SUBSTRING_INDEX(telefones, ',', 1))+2;
					SET telefones = MID(telefones, SubStrLen, strLen);

					IF telefones = '' THEN
					  LEAVE do_this;
					END IF;
				  END LOOP do_this;

				COMMIT;
				
				select "Dados editados com sucesso!";
			else
				select "Existem campos vazios!";
			end if;
		else
			select "Este login já existe!";
        end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarProfessor` (IN `nome2` VARCHAR(255), IN `idTurma2` TEXT, IN `rg2` VARCHAR(255), IN `idProfessor2` INT, IN `foto2` VARCHAR(255), IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `idUsuario2` INT)  begin
		DECLARE qtd INT DEFAULT 0;
		DECLARE strLen    INT DEFAULT 0;
		DECLARE SubStrLen INT DEFAULT 0;

    
		SET qtd = (select count(login) from tbUsuario where login like login2 and idUsuario <> idUsuario2);
		if (qtd < 1)
		then
			if( nome2 <> "" and rg2 <> 0 and idProfessor2 <> 0 and foto2 <> "")
			then
				SET qtd = (select count(rg) from tbProfessor where rg like rg2 and idProfessor <> idProfessor2);
				if (qtd < 1)
				then
					UPDATE tbUsuario set login=login2, senha=senha2 where idUsuario = idUsuario2;
					UPDATE tbProfessor SET nome = nome2, rg = rg2 WHERE idProfessor = idProfessor2;
                    DELETE FROM tbTurmaProfessor where idProfessor = idProfessor2;
                    
					do_this:
					  LOOP
						SET strLen = CHAR_LENGTH(idTurma2);

						INSERT INTO tbTurmaProfessor (idTurma, idProfessor) VALUES(SUBSTRING_INDEX(idTurma2, ',', 1),idProfessor2);

						SET SubStrLen = CHAR_LENGTH(SUBSTRING_INDEX(idTurma2, ',', 1))+2;
						SET idTurma2 = MID(idTurma2, SubStrLen, strLen);

						IF idTurma2 = '' THEN
						  LEAVE do_this;
						END IF;
					  END LOOP do_this;

					COMMIT;

                    
					select "Dados editados com sucesso!";
				else
					select "Este RG já existe!";
				end if;
			else
				select "Existem campos vazios!";
			end if;
		else
			select "Este login já existe!";
        end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editarTurma` (IN `descricao2` VARCHAR(255), IN `idTurma2` INT)  begin
    
		if not exists(select descricao from tbTurma where descricao like descricao2)
        then
			if(descricao2 <> "" and idTurma2 <> 0)
			then
				UPDATE tbTurma SET descricao = descricao2 WHERE idTurma = idTurma2;
				select "Dados editados com sucesso!";
			else
				select "Existem campos vazios!";
			end if;
		else
			select "Esta turma já existe!";
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `efetuarLogin` (IN `login2` VARCHAR(255), IN `senha2` VARCHAR(255), IN `idTipoUsuario2` INT)  begin
		DECLARE idUsuario2 INT DEFAULT 0;
        DECLARE idEscola2 INT DEFAULT 0;
        set idUsuario2 = (select idUsuario from tbUsuario where login like login2 and senha like senha2 and idTipoUsuario = idTipoUsuario2);
		if (idUsuario2 <> 0)
        then
			if(idTipoUsuario2 = 1)
			then
				SELECT * FROM tbAdministrador where idUsuario = idUsuario2;
			else if(idTipoUsuario2 = 2)
            then
				SET idEscola2 = (SELECT idEscola FROM tbEscola where idUsuario = idUsuario2);
				SELECT * FROM tbEscola inner join tbTelefoneEscola on tbEscola.idEscola = tbTelefoneEscola.idEscola
                where idUsuario = idUsuario2;
			else if(idTipoUsuario2 = 3)
            then
				SELECT * FROM tbProfessor inner join tbTurmaProfessor on tbProfessor.idProfessor = tbTurmaProfessor.idProfessor 
                inner join tbTurma on tbTurmaProfessor.idTurma = tbTurma.idTurma inner join tbEscola on tbTurma.idEscola = tbEscola.idEscola 
                where tbprofessor.idUsuario = idUsuario2;
            else if(idTipoUsuario2 = 4)
            then
				SELECT * FROM tbAluno inner join tbTurma on tbAluno.idTurma = tbTurma.idTurma inner join tbEscola on tbTurma.idEscola = tbEscola.idEscola where tbaluno.idUsuario = idUsuario2;
			end if;
			end if;
            end if;
			end if;
		else
            select 0;
		end if;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirAluno` (IN `idAluno2` INT)  begin
    
		if exists(select idAluno from tbAluno where idAluno like idAluno2)
        then
			UPDATE tbAluno SET ativo = 0 WHERE idAluno = idAluno2;
			select "Dados excluídos com sucesso!";
		else
			select "Este aluno não existe!";
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirEscola` (IN `idEscola2` INT)  begin
		if exists(select idEscola from tbEscola where idEscola like idEscola2)
        then
			UPDATE tbEscola SET ativo = 0 where idEscola = idEscola2;
			select "Dados excluídos com sucesso!";
		else
			select "Esta escola não existe!";
		end if;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirProfessor` (IN `idProfessor2` INT)  begin
    
		if exists(select idProfessor from tbProfessor where idProfessor like idProfessor2)
        then
			UPDATE tbProfessor SET ativo = 0 WHERE idProfessor = idProfessor2;
			select "Dados excluídos com sucesso!";
		else
			select "Este professor não existe!";
		end if;
        
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `excluirTurma` (IN `idTurma2` INT)  begin
    
		if exists(select idTurma from tbTurma where idTurma like idTurma2)
        then
			UPDATE tbTurma SET ativo = 0 WHERE idTurma = idTurma2;
			select "Dados excluídos com sucesso!";
		else
			select "Esta turma não existe!";
		end if;
        
	end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrador`
--

CREATE TABLE `tbadministrador` (
  `idAdministrador` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbadministrador`
--

INSERT INTO `tbadministrador` (`idAdministrador`, `nome`, `idUsuario`, `foto`) VALUES
(1, 'Administrador', 1, 'nophoto.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbaluno`
--

CREATE TABLE `tbaluno` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `ra` varchar(255) DEFAULT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbaluno`
--

INSERT INTO `tbaluno` (`idAluno`, `nome`, `foto`, `idUsuario`, `ra`, `idTurma`, `ativo`) VALUES
(11, 'Erika de Almeida Ramos', '1f9f77b486086f6a0f87504d0b4b598b.jpg', 4, '2920481911019', 2, 0),
(12, 'Bruna Nunes', 'ec5e228e766e26ef2a2ea2c7352855cd.gif', 15, '2920481911007', 3, 0),
(13, 'erika 2', '3bdb45e62b8c0dc555e2db4671707754.jpg', 16, '2456456', 2, 0),
(14, 'Erika 12', 'f0119da796e7ecb1ec7f4ceed0ef4c6f.jpg', 17, '4566', 1, 0),
(15, 'Erika', 'nophoto.png', 18, '1234566798', 1, 1),
(16, 'teste 2', '9bcb4a0c4d7332bfa46981d87ec6e746.jpg', 19, '78499445', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbalunojogo`
--

CREATE TABLE `tbalunojogo` (
  `idAlunoJogo` int(11) NOT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `idJogo` int(11) DEFAULT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `progresso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbescola`
--

CREATE TABLE `tbescola` (
  `idEscola` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbescola`
--

INSERT INTO `tbescola` (`idEscola`, `nome`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `idUsuario`, `ativo`) VALUES
(1, 'Escola', 'rua dos pinheiros', '58', 'vila Yolanda II', 'são paulo', 'sp', '08473520', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbjogo`
--

CREATE TABLE `tbjogo` (
  `idJogo` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `dificuldade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbprofessor`
--

CREATE TABLE `tbprofessor` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbprofessor`
--

INSERT INTO `tbprofessor` (`idProfessor`, `nome`, `foto`, `rg`, `idUsuario`, `ativo`) VALUES
(1, 'Prof', 'nophoto.png', '123', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbtelefoneescola`
--

CREATE TABLE `tbtelefoneescola` (
  `idTelefoneEscola` int(11) NOT NULL,
  `idEscola` int(11) DEFAULT NULL,
  `descricao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtelefoneescola`
--

INSERT INTO `tbtelefoneescola` (`idTelefoneEscola`, `idEscola`, `descricao`) VALUES
(1, 1, '949639959'),
(2, 1, '25552879');

-- --------------------------------------------------------

--
-- Table structure for table `tbtipousuario`
--

CREATE TABLE `tbtipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtipousuario`
--

INSERT INTO `tbtipousuario` (`idTipoUsuario`, `descricao`, `nivel`) VALUES
(1, 'Administrador', 1),
(2, 'Escola', 2),
(3, 'Professor', 3),
(4, 'Aluno', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbturma`
--

CREATE TABLE `tbturma` (
  `idTurma` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `idEscola` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbturma`
--

INSERT INTO `tbturma` (`idTurma`, `descricao`, `idEscola`, `ativo`) VALUES
(1, '1º série', 1, 1),
(2, '2º Série', 1, 1),
(3, '3º Série', 1, 1),
(12, '4º série b', 1, 0),
(13, '8º ', 1, 0),
(14, '4 Série', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbturmaprofessor`
--

CREATE TABLE `tbturmaprofessor` (
  `idTurmaProfessor` int(11) NOT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `idProfessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbturmaprofessor`
--

INSERT INTO `tbturmaprofessor` (`idTurmaProfessor`, `idTurma`, `idProfessor`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `idTipoUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `login`, `senha`, `idTipoUsuario`) VALUES
(1, 'adm', 'adm', 1),
(2, 'escola', 'escola', 2),
(3, 'prof1', 'prof1', 3),
(4, 'erika', 'erika', 4),
(15, 'brubs', 'brubs', 4),
(16, 'erikinha', 'erikinha', 4),
(17, 'erika12', 'erika12', 4),
(18, 'erika_aluno', 'erika', 4),
(19, 'teste_aluno', 'teste', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idAdministrador`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTurma` (`idTurma`);

--
-- Indexes for table `tbalunojogo`
--
ALTER TABLE `tbalunojogo`
  ADD PRIMARY KEY (`idAlunoJogo`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idJogo` (`idJogo`);

--
-- Indexes for table `tbescola`
--
ALTER TABLE `tbescola`
  ADD PRIMARY KEY (`idEscola`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tbjogo`
--
ALTER TABLE `tbjogo`
  ADD PRIMARY KEY (`idJogo`);

--
-- Indexes for table `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD PRIMARY KEY (`idProfessor`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tbtelefoneescola`
--
ALTER TABLE `tbtelefoneescola`
  ADD PRIMARY KEY (`idTelefoneEscola`),
  ADD KEY `idEscola` (`idEscola`);

--
-- Indexes for table `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indexes for table `tbturma`
--
ALTER TABLE `tbturma`
  ADD PRIMARY KEY (`idTurma`),
  ADD KEY `idEscola` (`idEscola`);

--
-- Indexes for table `tbturmaprofessor`
--
ALTER TABLE `tbturmaprofessor`
  ADD PRIMARY KEY (`idTurmaProfessor`),
  ADD KEY `idTurma` (`idTurma`),
  ADD KEY `idProfessor` (`idProfessor`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadministrador`
--
ALTER TABLE `tbadministrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbalunojogo`
--
ALTER TABLE `tbalunojogo`
  MODIFY `idAlunoJogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbescola`
--
ALTER TABLE `tbescola`
  MODIFY `idEscola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbjogo`
--
ALTER TABLE `tbjogo`
  MODIFY `idJogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbprofessor`
--
ALTER TABLE `tbprofessor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbtelefoneescola`
--
ALTER TABLE `tbtelefoneescola`
  MODIFY `idTelefoneEscola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbturma`
--
ALTER TABLE `tbturma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbturmaprofessor`
--
ALTER TABLE `tbturmaprofessor`
  MODIFY `idTurmaProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD CONSTRAINT `tbadministrador_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Constraints for table `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD CONSTRAINT `tbaluno_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbaluno_ibfk_2` FOREIGN KEY (`idTurma`) REFERENCES `tbturma` (`idTurma`);

--
-- Constraints for table `tbalunojogo`
--
ALTER TABLE `tbalunojogo`
  ADD CONSTRAINT `tbalunojogo_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `tbaluno` (`idAluno`),
  ADD CONSTRAINT `tbalunojogo_ibfk_2` FOREIGN KEY (`idJogo`) REFERENCES `tbjogo` (`idJogo`);

--
-- Constraints for table `tbescola`
--
ALTER TABLE `tbescola`
  ADD CONSTRAINT `tbescola_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Constraints for table `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD CONSTRAINT `tbprofessor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Constraints for table `tbtelefoneescola`
--
ALTER TABLE `tbtelefoneescola`
  ADD CONSTRAINT `tbtelefoneescola_ibfk_1` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbturma`
--
ALTER TABLE `tbturma`
  ADD CONSTRAINT `tbturma_ibfk_1` FOREIGN KEY (`idEscola`) REFERENCES `tbescola` (`idEscola`);

--
-- Constraints for table `tbturmaprofessor`
--
ALTER TABLE `tbturmaprofessor`
  ADD CONSTRAINT `tbturmaprofessor_ibfk_1` FOREIGN KEY (`idTurma`) REFERENCES `tbturma` (`idTurma`),
  ADD CONSTRAINT `tbturmaprofessor_ibfk_2` FOREIGN KEY (`idProfessor`) REFERENCES `tbprofessor` (`idProfessor`);

--
-- Constraints for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `tbusuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbtipousuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
