-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2019 às 22:48
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `tel_cliente` varchar(15) NOT NULL,
  `cel_cliente` varchar(14) NOT NULL,
  `obs_cliente` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome_cliente`, `email_cliente`, `tel_cliente`, `cel_cliente`, `obs_cliente`) VALUES
(35, 'Charles Roberto Sampaio', 'ccharlesroberto@gmail.com', '31993835272', '3135646335', NULL),
(36, 'Casa', 'ccharlesroberto@gmail.com', '31993835272', '31', NULL),
(41, 'Casa', 'ccharlesroberto@gmail.com', '31993835272', '31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_entregador` int(11) DEFAULT NULL,
  `cep_endereco` varchar(10) NOT NULL,
  `rua_endereco` varchar(100) NOT NULL,
  `numero_endereco` varchar(20) DEFAULT NULL,
  `complemento_endereco` varchar(50) DEFAULT NULL,
  `bairro_endereco` varchar(100) NOT NULL,
  `cidade_endereco` varchar(100) NOT NULL,
  `uf_endereco` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `id_cliente`, `id_entregador`, `cep_endereco`, `rua_endereco`, `numero_endereco`, `complemento_endereco`, `bairro_endereco`, `cidade_endereco`, `uf_endereco`) VALUES
(39, NULL, 8, '31270080', 'Rua Barra Grande', '33', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(40, 35, NULL, '31270080', 'Rua Barra Grande', '234', NULL, 'Indaiá', 'Belo Horizonte', 'MG'),
(41, 36, NULL, '31270080', 'Rua Barra Grande', '234', NULL, 'Indaiá', 'Belo Horizonte', 'MG'),
(46, 41, NULL, '31270080', 'Rua Barra Grande', '234', 'x', 'Indaiá', 'Belo Horizonte', 'MG'),
(59, NULL, 9, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(60, NULL, 10, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(61, NULL, 11, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(62, NULL, 12, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(63, NULL, 13, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(64, NULL, 14, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG'),
(68, NULL, 18, '31270080', 'Rua Barra Grande', '2', 'Casa', 'Indaiá', 'Belo Horizonte', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregadors`
--

CREATE TABLE `entregadors` (
  `id` int(11) NOT NULL,
  `nome_entregador` varchar(50) NOT NULL,
  `cpf_entregador` varchar(13) NOT NULL,
  `celular_entregador` varchar(14) NOT NULL,
  `telefone_entregador` varchar(14) NOT NULL,
  `identidade_entregador` varchar(15) NOT NULL,
  `veiculo_entregador` varchar(50) NOT NULL,
  `placa_veiculo_entregador` varchar(10) NOT NULL,
  `email_entregador` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entregadors`
--

INSERT INTO `entregadors` (`id`, `nome_entregador`, `cpf_entregador`, `celular_entregador`, `telefone_entregador`, `identidade_entregador`, `veiculo_entregador`, `placa_veiculo_entregador`, `email_entregador`) VALUES
(8, 'Antorio Carlos', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'Moto Titan - Preta', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(9, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(10, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(11, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(12, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(13, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(14, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com'),
(18, 'Casa', '09738235693', '31993221199', '31993835272', 'MG 16345999', 'ccharlesroberto@gmai', 'PWH-8890', 'ccharlesroberto@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `codigo_entrega` varchar(20) NOT NULL,
  `total_entrega` varchar(6) NOT NULL,
  `produto_entrega` varchar(100) NOT NULL,
  `obs_entrega` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_entregador` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entregas`
--

INSERT INTO `entregas` (`id`, `codigo_entrega`, `total_entrega`, `produto_entrega`, `obs_entrega`, `id_cliente`, `id_entregador`, `id_status`) VALUES
(12, '31270080', '1', 'X_tudo', NULL, 35, 13, 2),
(13, '31270080', '33', 'Hambuguer', NULL, 35, 8, 1),
(14, '31270-080', '2', 'X_tudo', NULL, 35, 13, 1),
(15, 'BH-0012', '3', 'Xbacon', NULL, 36, 13, 1),
(16, '31270080', '23', 'X_tudo', NULL, 35, 8, 1),
(17, '31270080', '45', 'Hambuguer', NULL, 35, 8, 1),
(18, '31270080', '2', 'X_tudo', NULL, 35, 8, 1),
(19, '31270-080', '34', 'X_tudo', NULL, 35, 9, 1),
(20, '31270-080', '22', 'Hambuguer', NULL, 36, 8, 1),
(21, 'BH00021', '2', '0', NULL, 35, 8, 1),
(22, 'BH00022', '9,60', '26', NULL, 35, 18, 1),
(23, 'BH00023', '67,32', '28', NULL, 35, 8, 1),
(24, 'BH00024', '67,32', '28', NULL, 35, 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao_produto` varchar(100) NOT NULL,
  `valor_produto` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao_produto`, `valor_produto`) VALUES
(10, 'X_tudo ', '0'),
(11, 'Hambuguer ', '0'),
(12, 'Hambuguer ', '0'),
(13, 'Hambuguer ', '0'),
(14, 'Hambuguer ', '0'),
(15, 'Hambuguer ', '0'),
(16, 'Hambuguer ', '0'),
(17, 'Hotdog', '0'),
(18, 'Xbacon', '0'),
(19, 'teste', '59'),
(20, 'teste', '23'),
(21, 'teste', '13'),
(22, 'Xx', '13'),
(23, 'teste', '50'),
(24, 'zzz', '36,30'),
(25, 'teste', '3,62'),
(26, 'xxxxxxxxx', '5.60'),
(27, 'teste13', '13,30'),
(28, 'REsolvido', '63.32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `descricao_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `statuses`
--

INSERT INTO `statuses` (`id`, `descricao_status`) VALUES
(1, 'Aberta'),
(2, 'Em andamento'),
(3, 'Concluída'),
(4, 'Cancelada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com.br', NULL, '$2y$10$k.aSyl3X2bleVr84QBmmaeIL./oGogs1/ERKM/09y7WzoxZba2Mbm', 'oKogWe7hhVyLCRDHcdZ9zUbpNiC18ZY67BzndVkauLmBtJRYbckSax0zJzQu', '2019-11-03 02:54:17', '2019-11-09 00:11:56'),
(2, 'Admin', 'ccharlesroberto@gmail.com', NULL, '$2y$10$f3wt3SJuxC8xtmTK9gc.aer7VY.hUVOhdw673pjvdgUDX804BMYSS', 'OggjIXzQOnMFnUBRzjiFT7Y4uvoDU8qoFX3Gs5A7oII831Mxs3Za3kSO0yNX', '2019-11-04 00:09:46', '2019-11-10 15:44:00'),
(3, 'Arif legaozao', 'abcdefg@gmail.com', NULL, '$2y$10$V2bj6pexKTTX/04Abgpwfuz6ODThLxBTHOIrtQjo138u8UJIedDme', NULL, '2019-11-04 02:28:14', '2019-11-04 02:28:14'),
(4, 'Charles', 'admin@ade.com', NULL, '$2y$10$NKlxlKUTS43AaxfAkLhQg.3W8x8xfGKdogwIlI7iBZXaGwYqB71lS', NULL, '2019-11-04 04:55:06', '2019-11-04 04:55:06'),
(5, 'Kely', 'Kely@gmail.com', NULL, '$2y$10$OC1WljOGj7IOtyerqNNRE.9ue5MIeQZ4pEtfcP5HjN2xwTtteFMBa', NULL, '2019-11-04 04:58:46', '2019-11-04 04:58:46'),
(6, 'Kely', 'Kelwwy@gmail.com', NULL, '$2y$10$ctee2YzsMSfD/ZQ669fXhuc0MUhFU.avaJjYVdrMIsX1g9nRtuB8G', NULL, '2019-11-04 04:59:40', '2019-11-04 04:59:40'),
(7, 'X', 'Kely--@gmail.com', NULL, 'Crs@001486', NULL, '2019-11-04 05:01:04', '2019-11-06 02:36:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_endereco_id_cliente_cliente` (`id_cliente`),
  ADD KEY `fk_endereco_id_entregador_entregador` (`id_entregador`);

--
-- Indexes for table `entregadors`
--
ALTER TABLE `entregadors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_entrega` (`id_cliente`),
  ADD KEY `fk_entregador_entrega` (`id_entregador`),
  ADD KEY `fk_status_entrega` (`id_status`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `entregadors`
--
ALTER TABLE `entregadors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_endereco_id_cliente_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_endereco_id_entregador_entregador` FOREIGN KEY (`id_entregador`) REFERENCES `entregadors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `fk_cliente_entrega` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_entregador_entrega` FOREIGN KEY (`id_entregador`) REFERENCES `entregadors` (`id`),
  ADD CONSTRAINT `fk_status_entrega` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
