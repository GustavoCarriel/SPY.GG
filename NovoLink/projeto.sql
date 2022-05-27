-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2022 às 02:55
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
(4, 'James Mibe', 'dtt3.svg'),
(5, 'James Ukezara', 'dtt4.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dialogos`
--

CREATE TABLE `dialogos` (
  `IdDialogo` int(11) NOT NULL,
  `dialogo` text COLLATE utf8_bin NOT NULL,
  `IdPers` int(11) NOT NULL,
  `Tipo` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `dialogos`
--

INSERT INTO `dialogos` (`IdDialogo`, `dialogo`, `IdPers`, `Tipo`) VALUES
(1, 'texto 1', 3, 'Inocente'),
(2, 'A última vez que eu vi $pers3$ ele estava sozinho indo para a ala de internação.\n', 4, 'Inocente'),
(3, 'Fiquei presa no elevador, quando cheguei $pers3$ estava na porta do quarto da $pers2$.', 5, 'Inocente'),
(4, 'Estava procurando $pers6$, quando cheguei e vi o $pers3$, não achei meu celular na bolsa para notificá-los.\n', 2, 'Inocente'),
(5, 'Quando fui ao quarto do $pers5$, não havia ninguém lá, acredito que o crime ainda não tinha acontecido.', 1, 'culpado'),
(6, '$pers5$ estava comigo quando fomos em direção ao botão de incêndio.', 4, 'Inocente'),
(7, ' Não é impossível!! porque eu e a(o) $pers1$ que desligamos o botão.', 2, 'Inocente'),
(8, ' Eu fui para as alas do andar de baixo.\r\n', 4, 'Inocente'),
(9, ' Eu fui à recepção telefonar para o detetive.', 1, 'Culpado'),
(10, ' Se me lembro bem, $pers4$ me disse que $pers3$ estava se recuperando do osso que havia deslocado semanas antes…', 5, 'Culpado'),
(11, ' $pers3$ é sonâmbulo, há umas semanas atrás caiu quando o fui levá-lo a porta do banheiro', 6, 'Inocente'),
(12, 'Eu mesma(o) o enfaixei junto à $pers3$.\n', 5, 'Inocente'),
(13, 'Estranho porque eu vi à(ò) $pers3$ dizer que $pers3$ estava de alta, o mais bizarro é que havia uma carta ao lado de(a) $pers2$ dizendo “Vingança”.', 6, 'Inocente'),
(14, 'texto final', 2, 'Inocente');

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
  `Fotopersonagem` varchar(30) COLLATE utf8_bin NOT NULL,
  `Testemunhas` varchar(50) COLLATE utf8_bin NOT NULL,
  `IdDial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`Idpersonagem`, `Nomeperso`, `Fotopersonagem`, `Testemunhas`, `IdDial`) VALUES
(1, 'Ana', 'Ana.svg', 'Inocente', 6),
(2, 'Meredith', 'Meredith.svg', 'Inocente', 5),
(3, 'Fred', 'Fred.svg', 'Morto', 3),
(4, 'Patricia', 'Patricia.svg', 'Inocente', 4),
(5, 'João', 'Joao.svg', 'Inocente', 2),
(6, 'Joseph', 'Joseph.svg', 'Culpado', 1);

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
(34, 'GabrielYukioVFvs', 'yukio@gmail.com', 'Y66', 1),
(35, 'Gtaud', 'GT@gmail.com', '545', 1),
(36, 'testeXD1fr', 'ff@gmail.com', '1234', 1),
(37, 'hyhy', 'hy@gmail.com', 'iji', 1),
(38, 'testeXDdfgh', 'sdfg@gmail.com', '555', 3),
(39, 'teste9', 'teste9@gmail.com', '456', 1),
(44, 'Gdddswef', 'qqqjkh@gmail.com', 'yyy', 5),
(45, 'Gdddswefdfdf', 'ggggggg@gmail.com', '000', 2),
(47, 'Gdsd', 'gg6g@gmail.com', '888', NULL),
(48, 'teste78', 'e78@gmail.com', '234', NULL),
(49, 'yyy', 'yyy@gmail.com', 'ooo', NULL),
(50, 'hhh', 'hhh@gmail.com', '333', NULL),
(51, 'ednalva buglio', 'bugliomiguelarcanjo1@gmail.com', '070221', 2);

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
  MODIFY `IdDialogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8993;

--
-- AUTO_INCREMENT de tabela `personagens`
--
ALTER TABLE `personagens`
  MODIFY `Idpersonagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
