-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Maio-2018 às 03:07
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nomecategoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nomecategoria`) VALUES
(1, 'Rações Secas'),
(3, 'Rações Umidas'),
(4, 'Farmácia'),
(5, 'Acessórios'),
(6, 'Casinhas'),
(7, 'Brinquedos'),
(8, 'Higiene e Beleza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL,
  `idfornecedor` int(11) NOT NULL,
  `dataregistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`idcompra`, `idfornecedor`, `dataregistro`) VALUES
(18, 1, '0000-00-00'),
(19, 1, '0000-00-00'),
(20, 2, '0000-00-00'),
(21, 1, '0000-00-00'),
(22, 2, '0000-00-00'),
(23, 2, '0000-00-00'),
(24, 1, '0000-00-00'),
(25, 1, '2018-05-26'),
(26, 2, '2018-05-26'),
(27, 1, '2018-05-26'),
(28, 1, '2018-05-26'),
(29, 2, '2018-05-26'),
(30, 2, '2018-05-26'),
(31, 1, '2018-05-26'),
(32, 1, '2018-05-26'),
(33, 1, '2018-05-26'),
(34, 1, '2018-05-26'),
(35, 1, '2018-05-26'),
(36, 1, '2018-05-26'),
(37, 1, '2018-05-26'),
(38, 1, '2018-05-26'),
(39, 2, '2018-05-26'),
(40, 2, '2018-05-27'),
(41, 1, '2018-05-27'),
(42, 3, '2018-05-27'),
(43, 1, '2018-05-28'),
(44, 3, '2018-05-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_produto`
--

CREATE TABLE `compra_produto` (
  `idcompra` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `custo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compra_produto`
--

INSERT INTO `compra_produto` (`idcompra`, `idproduto`, `qtd`, `custo`) VALUES
(12, 1, 1, 13.5),
(18, 1, 1, 13.5),
(19, 1, 1, 13.5),
(20, 1, 2, 27),
(20, 2, 1, 14.8),
(21, 1, 1, 13.5),
(21, 2, 1, 14.8),
(22, 1, 1, 13.5),
(22, 2, 1, 14.8),
(23, 1, 1, 13.5),
(23, 1, 1, 13.5),
(24, 1, 1, 13.5),
(25, 1, 1, 13.5),
(26, 1, 2, 27),
(26, 2, 1, 14.8),
(26, 1, 2, 27),
(34, 1, 1, 13.5),
(37, 1, 1, 13.5),
(37, 2, 1, 14.8),
(39, 1, 2, 13.5),
(40, 1, 20, 270),
(41, 2, 2, 14.8),
(42, 1, 21, 13.5),
(43, 2, 7, 74),
(44, 5, 10, 19.9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idproduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idproduto`, `qtd`) VALUES
(1, 21),
(2, 7),
(5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idfornecedor` int(11) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `nomefornecedor` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idfornecedor`, `cnpj`, `nomefornecedor`, `endereco`, `telefone`) VALUES
(1, '342432543533346', 'LABORATÓRIO IBASA LTDA ', 'Rua das Flores, 45', '33333333'),
(2, '984114981319198', 'ALISUL ALIMENTOS S.A', 'Av João Carlo Silva, 549', '323232323'),
(3, '24902385480943', 'DISTRIBUIDORA ANIMAL LTDA', 'tretretret', '6546546546');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nomemarca` varchar(255) NOT NULL,
  `idfornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idmarca`, `nomemarca`, `idfornecedor`) VALUES
(1, 'Supra', 2),
(2, 'Birbo', 2),
(3, 'Pedigree', 2),
(5, 'Wiscas', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `preco` float NOT NULL,
  `qtdminima` int(11) DEFAULT NULL,
  `idcategoria` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL,
  `idtipopet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `nome`, `descricao`, `preco`, `qtdminima`, `idcategoria`, `idmarca`, `idtipopet`) VALUES
(1, 'Ração para gatos', 'miaw miaw miaw', 13.5, 4, 1, 1, 1),
(2, 'Ração para cães', 'au auau', 14.8, 4, 1, 2, 2),
(3, 'Shampoo para Banho de Cães', 'Shampoo para Banho de Cães', 8.7, 2, 8, 1, 2),
(5, 'Produto teste 1', 'Produto teste 1', 1.99, 2, 11, 1, 2),
(6, 'Produto teste 2', 'Produto teste 2', 2.99, 5, 5, 4, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopet`
--

CREATE TABLE `tipopet` (
  `idtipopet` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipopet`
--

INSERT INTO `tipopet` (`idtipopet`, `nome`, `descricao`) VALUES
(1, 'Gatos', 'Felino'),
(2, 'Cachorros', 'Canino'),
(4, 'Peixes', 'Animais que vivem na água'),
(5, 'Roedores', 'Animais como ratos, hamisters, Porquinho da India, etc '),
(6, 'Aves', 'Animais que voam');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nomeusuario` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `emailusuario` varchar(255) NOT NULL,
  `senhausuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nomeusuario`, `cpf`, `cargo`, `emailusuario`, `senhausuario`) VALUES
(3, 'Usuario de teste', '5345435345', 'Estagiário', 'teste@gmail.com', '@123$'),
(4, 'Usuario de teste 2', '01774696096', 'Estagiário', 'tecnico.bob@gmail.com', 'wqewqewe'),
(5, 'Guilherme Rosa', '017.746.960-96', 'Web Developer', 'gr@gmail.com', 'teste@123'),
(6, 'Administrador', '0', 'Administrador', 'admin', 'admin'),
(11, 'Usuario de teste 5', '017.746.960-96', 'Estagiário', 'tecnico.bob@gmail.com', 'teste1234'),
(12, 'Usuario de teste 6', '5345435345', 'Gerente', 'jose@outlook.com.br', NULL),
(13, 'Adão da silva', '01774696096', 'Gerente', 'adao1234@gmail.com', NULL),
(14, 'Usuario de teste 7', '01774696096', 'Gerente', 'jose@outlook.com.br', 'erewrew'),
(16, 'Usuario de teste 9', '5345435345', 'Gerente', 'tecnico.bob@gmail.com', '1234'),
(18, 'Camila da Silca', '5345435345', 'Secretaria', 'camila@petshop.com.br', 'teste@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idfornecedor`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`);

--
-- Indexes for table `tipopet`
--
ALTER TABLE `tipopet`
  ADD PRIMARY KEY (`idtipopet`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tipopet`
--
ALTER TABLE `tipopet`
  MODIFY `idtipopet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
