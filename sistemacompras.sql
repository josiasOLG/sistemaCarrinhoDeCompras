-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 09/03/2019 às 19:17
-- Versão do servidor: 5.7.25-0ubuntu0.16.04.2
-- Versão do PHP: 7.0.33-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemacompras`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `caracteristica`
--

CREATE TABLE `caracteristica` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `caracteristica`
--

INSERT INTO `caracteristica` (`id`, `nome`) VALUES
(1, 'Azul'),
(2, 'Verde');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4444', NULL, '2019-03-07 20:05:13', '2019-03-07 20:05:13'),
(2, '5555', '2019-03-07 20:03:03', '2019-03-07 20:05:11', '2019-03-07 20:05:11'),
(3, 'Calça', '2019-03-07 20:05:17', '2019-03-07 20:05:17', NULL),
(4, 'Sapato', '2019-03-07 20:05:21', '2019-03-07 20:05:21', NULL),
(5, 'Tenis', '2019-03-07 20:05:24', '2019-03-07 20:05:24', NULL),
(6, 'Camisa', '2019-03-08 20:03:15', '2019-03-08 20:03:15', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `finalizar`
--

CREATE TABLE `finalizar` (
  `id` int(11) NOT NULL,
  `primeironome` varchar(120) NOT NULL,
  `segundonome` varchar(120) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `total` float NOT NULL,
  `data` datetime NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `finalizar`
--

INSERT INTO `finalizar` (`id`, `primeironome`, `segundonome`, `endereco`, `cidade`, `uf`, `cep`, `email`, `telefone`, `total`, `data`, `idusuario`) VALUES
(10, '55', '55', '55', '55', '55', '55', '55@gmail.com', '333', 10, '2019-09-03 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `finalizar_produto`
--

CREATE TABLE `finalizar_produto` (
  `id` int(11) NOT NULL,
  `finalizar` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `finalizar_produto`
--

INSERT INTO `finalizar_produto` (`id`, `finalizar`, `produto`, `idusuario`) VALUES
(6, 10, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_07_010225_create_produtos_table', 2),
(4, '2019_03_07_163809_categoria', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id`, `titulo`, `descricao`, `imagem`, `created_at`, `updated_at`, `deleted_at`, `preco`) VALUES
(12, 'Calça De Moleton Masculina E Feminino Saruel Skinny Sport  53 opiniões', '\nPara finalizar a COMPRA, clique em cima do CARRINHO DE COMPRA ao lado do CONTATO (PC) ou barra do menu ao lado pesquisar (Smartphone).', '/tmp/phpt8q83R.jpeg', '2019-03-08 19:55:30', '2019-03-08 19:55:30', NULL, 10),
(13, 'Kit 2 Sapato Social Masculino Thor Confort Venetto', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '/tmp/phpfa7cVm.jpeg', '2019-03-08 19:57:54', '2019-03-08 19:57:54', NULL, 10),
(14, 'Tênis Fila Retrô Runner Cinza', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '/tmp/phppLTgtG.jpeg', '2019-03-08 19:58:26', '2019-03-08 19:58:26', NULL, 20),
(15, 'Kit 10 Camisa Camiseta Masculina Marca Estampada Top', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '/tmp/php9MNvn9.jpeg', '2019-03-08 20:03:32', '2019-03-08 20:03:32', NULL, 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_caracteristica`
--

CREATE TABLE `produtos_caracteristica` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `caracteristica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos_caracteristica`
--

INSERT INTO `produtos_caracteristica` (`id`, `produto`, `caracteristica`) VALUES
(1, 11, 2),
(2, 12, 1),
(3, 13, 1),
(4, 14, 2),
(5, 15, 1),
(6, 15, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_categorias`
--

CREATE TABLE `produtos_categorias` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos_categorias`
--

INSERT INTO `produtos_categorias` (`id`, `produto`, `categoria`) VALUES
(1, 9, 3),
(2, 9, 4),
(3, 10, 3),
(4, 10, 4),
(5, 11, 4),
(6, 12, 3),
(7, 13, 4),
(8, 14, 4),
(9, 15, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'a', 'aa@gmail.com', '$2y$10$RJMILSP5YQva.Qcz3Qt5mO4LWlDdiFvA/aeOZ3oZ47b6dRoBBlmZ.', 'lP6yT7Ji3iuw3Hwyfw0vbDGMAGgeYipDdNJzMT8GFfmHephXX0PkTRGFqYwv', '2019-01-29 15:45:43', '2019-01-29 15:45:43'),
(2, 'aaaa', 'aaaa@gmail.com', '$2y$10$wF33revvuSDAOefeXii9Yuvi/l/rIu94gnZqO.uLYIxw/t0fK6dtG', 'cMx3sMTajhnjM4MVliwj6bsIELw8GCIJj3unBfHqEjJTrBvabDZKjbOocUt8', '2019-03-07 02:04:11', '2019-03-07 02:04:11'),
(3, 'admin', 'admin@gmail.com', '$2y$10$WvtIfVgOC0TAnwRndfuZpe.6UX3Fb19OGrIRxkFzX/FctpxlHLBL.', 'LfcdJaoZ5S6a17j4yGOLhaoVzj4XatzABCC1imP5jKAKG9F2Fs80Az8UrVfL', '2019-03-10 00:42:18', '2019-03-10 00:42:18');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `finalizar`
--
ALTER TABLE `finalizar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `finalizar_produto`
--
ALTER TABLE `finalizar_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos_caracteristica`
--
ALTER TABLE `produtos_caracteristica`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `finalizar`
--
ALTER TABLE `finalizar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `finalizar_produto`
--
ALTER TABLE `finalizar_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de tabela `produtos_caracteristica`
--
ALTER TABLE `produtos_caracteristica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `produtos_categorias`
--
ALTER TABLE `produtos_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
