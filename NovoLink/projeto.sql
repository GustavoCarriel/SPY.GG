-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Maio-2022 às 00:12
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `detetive`
--

CREATE TABLE `detetive` (
  `idDetetive` int(11) NOT NULL,
  `NomeDetetive` varchar(30) COLLATE utf8_bin NOT NULL,
  `FotoDetetive` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `detetive`
--

INSERT INTO `detetive` (`idDetetive`, `NomeDetetive`, `FotoDetetive`) VALUES
(1, 'James Carriel', 'dtt.svg'),
(2, 'James Almeida', 'dtt1.svg'),
(3, 'James Neri', 'dtt2.svg'),
(4, 'James Mibe', 'dtt3.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dialogos`
--

CREATE TABLE `dialogos` (
  `IdDialogo` int(11) NOT NULL,
  `dialogo` text COLLATE utf8_bin NOT NULL,
  `IdPers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `dialogos`
--

INSERT INTO `dialogos` (`IdDialogo`, `dialogo`, `IdPers`) VALUES
(1, 'texto 1', 3),
(2, 'A &uacuteltima vez que eu vi Fred ele estava sozinho indo para a ala de interna&ccedil&atildeo.', 4),
(3, 'Fiquei preso no elevador, quando chequei jo&atildeo estava na porta do quarto.', 1),
(4, 'estava procurando Joseph, quando chequei a ver Fred, estava tentando achar meu celular nos bolsos para notificar voc&ecircs', 5),
(5, 'Quando fui ao quarto de Joseph, n&atildeo havia  ningu&eacutem l&aacute, acredito que o crime ainda n&atildeo havia acontecido.', 2),
(6, 'jo&atildeo estava comigo quando fomos em dire&ccedil&atildeo ao bot&atildeo de inc&ecircndio.', 4),
(7, 'Eu fui para as alas do andar de baixo.', 5),
(8, 'Eu fui a recep&ccedil&atildeo telefonar para o detetive  James.', 1),
(9, 'Se me lembro bem, Meredith me disse que Joseph estava se recuperando do osso que havia deslocado semanas antes...', 4),
(10, 'Joseph &eacute son&acircmbulo h&aacute uma semana atras caiu quando o fui leva-lo at&eacute a porta do banheiro ', 2),
(11, 'Eu mesmo o encaixei junto a Fred', 1),
(12, 'estranho porque ouvi Fred dizer que Joseph estava de alta, o mais bizarro &eacute que havia uma carta do lado de Fred dizendo\" vingan&ccedila \".', 5),
(13, 'n&atildeo $eacute imposs$iacutevel, porque eu e Ana que desligamos o bot&atildeo.', 2),
(14, 'Texto final\r\n', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia`
--

CREATE TABLE `historia` (
  `IdH` int(11) NOT NULL,
  `Historia` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `historia`
--

INSERT INTO `historia` (`IdH`, `Historia`) VALUES
(1, 'Aqui vai ficar a primeira Historia na parte de baixo do usuario ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE `personagens` (
  `Idpersonagem` int(11) NOT NULL,
  `Nomeperso` varchar(30) COLLATE utf8_bin NOT NULL,
  `Fotopersonagem` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`Idpersonagem`, `Nomeperso`, `Fotopersonagem`) VALUES
(1, 'Ana', 'Ana.svg'),
(2, 'Meredith', 'Meredith.svg'),
(3, 'Fred', 'Fred.svg'),
(4, 'Patricia', 'Patricia.svg'),
(5, 'João', 'Joao.svg'),
(6, 'Joseph', 'Joseph.svg'),
(20, 'James', 'James.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(80) COLLATE utf8_bin NOT NULL,
  `senha` varchar(30) COLLATE utf8_bin NOT NULL,
  `detetive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `detetive`) VALUES
(15, 'Gabriel', 'ggg@gmail.com', '123', 1),
(16, 'qqqq', 'qqq@gmail.com', '333', 1),
(17, 'hhhh', 'hhhh@gmail.com', '777', 2),
(19, 'Kkkkk', 'kkk@gmail.com.br', '888', 1),
(27, 'testeXD1', 'cad233@gmail.com', '233', 4),
(29, 'Gdddswefdfdf', 'qq66464q@gmail.com', '345', 1),
(30, 'Gdsd', 'gabcoca@gmail.com', '777', 2),
(31, 'testeDt', 'Dt@gmail.com', '209', 4),
(32, 'Nilson', 'nilsonsaito@scseduca.com.br', 'Alcina123456', 4),
(33, 'testeXD12', '12@gmail.com', '12de', 1),
(34, 'GabrielYukioVFvs', 'yukio@gmail.com', 'Y66', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `detetive`
--
ALTER TABLE `detetive`
  ADD PRIMARY KEY (`idDetetive`);

--
-- Índices para tabela `dialogos`
--
ALTER TABLE `dialogos`
  ADD PRIMARY KEY (`IdDialogo`);

--
-- Índices para tabela `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`Idpersonagem`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dialogos`
--
ALTER TABLE `dialogos`
  MODIFY `IdDialogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8982;

--
-- AUTO_INCREMENT de tabela `personagens`
--
ALTER TABLE `personagens`
  MODIFY `Idpersonagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
