-- phpMyAdmin SQL Dump
-- version 3.3.7deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Nov 06, 2010 as 09:10 PM
-- Versão do Servidor: 5.1.49
-- Versão do PHP: 5.3.3-1ubuntu9.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `alix`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_banner`,`fk_id_usuario`),
  KEY `fk_banner_usuario1` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id_banner`, `fk_id_usuario`, `titulo`, `texto_texto`, `link`, `arquivo_arquivo`) VALUES
(89, 1, 'Titulo 1 ', 'Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 Titulo 1 ', 'Titulo 1 Titulo 1 ', 'banner1.jpeg'),
(90, 1, 'Titulo 2 ', 'Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 Titulo 2 ', 'Titulo 2 ', 'banner2.jpeg'),
(91, 1, 'Titulo 3 ', 'Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 ', 'Titulo 3 Titulo 3 ', 'banner3.jpeg'),
(92, 1, 'Titulo 4', 'Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 Titulo 3 ', 'Titulo 3 Titulo 3 ', 'header-photo.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `id_cases` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cases`,`fk_id_usuario`),
  KEY `fk_case_usuario1` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `cases`
--

INSERT INTO `cases` (`id_cases`, `fk_id_usuario`, `titulo`, `texto_texto`, `arquivo_arquivo`) VALUES
(1, 1, 'Teste de Casess', 'Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla ', 'parceiro.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_empresa`,`fk_id_usuario`),
  KEY `fk_id_usuario5` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `fk_id_usuario`, `titulo`, `texto_texto`, `arquivo_arquivo`) VALUES
(1, 1, 'NOSSO TIME', 'A ALIX Ã© formada por profissionais com larga experiÃªncia em SeguranÃ§a da InformaÃ§Ã£o, com habilidades para prestar consultoria aos nossos clientes e tambÃ©m ministrar treinamentos e palestras nos mais variados assuntos relacionados a seguranÃ§a da informaÃ§Ã£o.', 'equipe.jpeg'),
(2, 1, 'COMO TRABALHAMOS', 'Sabemos que cada cliente possui uma particularidade, e Ã© desta forma que trabalhamos, entendendoo o segmento de atuaÃ§Ã£o e conhecendo as necessidades para que possamos oferecer as soluÃ§Ãµes mais indicadas.', 'work.jpeg'),
(3, 1, 'NOSSO PARCEIROS', 'Contamos com uma rede de parceiros que nos permite oferecer aos nossos clientes o que hÃ¡ de mais eficiente e atual no segmento de seguranÃ§a da informaÃ§Ã£o, independente do tamanho ou foco de atuaÃ§Ã£o dos nossos clientes.', 'parceiro.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `data_data` varchar(45) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_evento`,`fk_id_usuario`),
  KEY `fk_id_usuario3` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `fk_id_usuario`, `data_data`, `titulo`, `texto_texto`, `arquivo_arquivo`) VALUES
(1, 1, '2010-11-04', 'Teste de Evento', 'Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento Testando texto evento ', 'images.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id_home` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_home`,`fk_id_usuario`),
  KEY `fk_id_usuario4` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `home`
--

INSERT INTO `home` (`id_home`, `fk_id_usuario`, `titulo`, `texto_texto`, `arquivo_arquivo`) VALUES
(1, 1, 'Testando o sistema', 'dfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasddfasdsadasdasda d sa das d sa da sd as d sad asdasdasd', 'bannerlateral.jpeg'),
(2, 1, 'ddddd', 'ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ddddddddd dddddddd ddddddddd ', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_noticia`,`fk_id_usuario`),
  KEY `fk_noticia_usuario1` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `fk_id_usuario`, `titulo`, `texto_texto`, `arquivo_arquivo`) VALUES
(1, 1, 'TÃ­tulo de NotÃ­cias', 'Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia Texto notÃ­cia ', 'images3.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE IF NOT EXISTS `parceiro` (
  `id_parceiro` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `texto_descricao` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `arquivo_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_parceiro`,`fk_id_usuario`),
  KEY `fk_id_usuario2` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parceiro`, `fk_id_usuario`, `nome`, `texto_descricao`, `link`, `arquivo_logo`) VALUES
(2, 1, 'Teste parceiro', 'Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla ', 'www.google.com', 'images2.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto_texto` text NOT NULL,
  `arquivo_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_servico`,`fk_id_usuario`),
  KEY `fk_id_usuario` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `fk_id_usuario`, `titulo`, `texto_texto`, `arquivo_arquivo`) VALUES
(1, 1, 'CONSULTORIA EM SGSI', 'Sabe-se que as informaÃ§Ãµes e os ativos em geral (pessoas, processos, documentos, dispositivos de hardware e software, dentre outros) devem ser confiÃ¡veis, protegidos, Ã­ntegros e disponÃ­veis, pois sÃ£o elementos fundamentais na conduÃ§Ã£o eficiente dos negÃ³cios de uma organizaÃ§Ã£o. \r\nO processo de gestÃ£o da seguranÃ§a da informaÃ§Ã£o tem por objetivo controlar e monitorar a seguranÃ§a da informaÃ§Ã£o, representado pelo Sistema de GestÃ£o de SeguranÃ§a da InformaÃ§Ã£o (SGSI), descrito na norma ISO IEC 27001. Esta norma Ã© responsÃ¡vel em estabelecer, implementar, operar, monitorar, analisar criticamente, manter e melhorar o SGSI de forma que este esteja em concordÃ¢ncia com as necessidades de negÃ³cio.', ''),
(2, 1, 'GESTÃƒO DE  RISCO', 'ÃNALISE DE RISCOS:\r\n\r\nRelacionar e identificar os riscos existentes nos componentes que suportam os processos de negÃ³cio da organizaÃ§Ã£o sejam estes componentes sistemas, bancos de dados, servidores, microcomputadores, equipamentos de conectividade e de telecomunicaÃ§Ãµes, instalaÃ§Ãµes, fÃ­sicas ou pessoas. Ordenar estes riscos em conformidade com a s sua prioridade de tratamento.\r\n\r\nPLANO DE TRATAMENTO DE RISCOS:\r\n\r\nEstabelecer um conjunto de normas e procedimentos com o objetivo de reduzir os riscos com base no critÃ©rio de aceitaÃ§Ã£o de riscos. O plano de tratamento de riscos identifica as medidas adequadas de gestÃ£o, recursos, responsabilidades, prazos e prioridades para a gestÃ£o dos riscos de seguranÃ§a da informaÃ§Ã£o.', ''),
(3, 1, 'PLANO DE CONTINUIDADE', 'A continuidade do negÃ³cio consiste na capacidade estratÃ©gica e tÃ¡tica de uma organizaÃ§Ã£o planejar para responder a incidentes e interrupÃ§Ãµes do negÃ³cio de forma que mantenha a sua capacidade operacional em um nÃ­vel aceitÃ¡vel prÃ©-definido pela organizaÃ§Ã£o. \r\n\r\nA gestÃ£o continuidade do negÃ³cio (GCN) Ã© um processo de gerenciamento que identifica as possÃ­veis ameaÃ§as a uma organizaÃ§Ã£o e os possÃ­veis impactos Ã s operaÃ§Ãµes dos negÃ³cios no caso dessas ameaÃ§as se concretizarem. \r\n\r\nO plano de continuidade de negÃ³cios (PCN) Ã© documento normativo que descreve as capacidades e requisitos tÃ©cnicos que suportarÃ£o as operaÃ§Ãµes de contingÃªncia. SÃ£o definidas as regras, responsabilidades, equipes, e procedimentos relacionados com a recuperaÃ§Ã£o do sistema computacional apÃ³s o desastre. O seu objetivo Ã© estabelecer uma estratÃ©gia com todos os procedimentos necessÃ¡rios na garantia do restabelecimento dos sistemas corporativos no menor espaÃ§o de tempo possÃ­vel (diretrizes que possibilitam recuperar a operaÃ§Ã£o da organizaÃ§Ã£o priorizando os seus sistemas crÃ­ticos). \r\n\r\nO plano de recuperaÃ§Ã£o de desastres (PRD) Ã© documento normativo que tem como objetivo fornecer diretivas para restaurar as operaÃ§Ãµes de TI no caso de eventos que negam o acesso Ã  facilidade (recurso) normal por um perÃ­odo prolongado. Normalmente, o PRD refere-se a um plano de TI com foco projetado para restaurar a operacionalidade do sistema computacional, aplicaÃ§Ã£o ou a instalaÃ§Ã£o de computador em um local alternativo apÃ³s de uma emergÃªncia. O PRD pode seguir algumas estratÃ©gias como: cold site; warm site; hot site, mirrored site e mobile site.', 'images3.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento`
--

CREATE TABLE IF NOT EXISTS `treinamento` (
  `id_treinamento` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `texto_sobre` text NOT NULL,
  `texto_publico_alvo` text NOT NULL,
  `texto_conteudo` text NOT NULL,
  `texto_instrutor` text NOT NULL,
  `numero_vagas` int(11) NOT NULL,
  `texto_locais` text NOT NULL,
  `texto_proximas_turmas` text NOT NULL,
  `texto_incompany` text NOT NULL,
  `texto_informacoes` text NOT NULL,
  PRIMARY KEY (`id_treinamento`,`fk_id_usuario`),
  KEY `fk_id_usuario1` (`fk_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

--
-- Extraindo dados da tabela `treinamento`
--

INSERT INTO `treinamento` (`id_treinamento`, `fk_id_usuario`, `nome`, `texto_sobre`, `texto_publico_alvo`, `texto_conteudo`, `texto_instrutor`, `numero_vagas`, `texto_locais`, `texto_proximas_turmas`, `texto_incompany`, `texto_informacoes`) VALUES
(1, 1, 'Auditoria em SeguranÃ§a da InformaÃ§Ã£o', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 23, 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla ', 'Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla Bla bla bla bla '),
(2, 1, 'Plano de Continuidade de NegÃ³cios', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 33, 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ', 'Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla Bla bla bla bla bla ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_banner_usuario1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `fk_case_usuario1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_id_usuario5` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_id_usuario3` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `fk_id_usuario4` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_usuario1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD CONSTRAINT `fk_id_usuario2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `treinamento`
--
ALTER TABLE `treinamento`
  ADD CONSTRAINT `fk_id_usuario1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
