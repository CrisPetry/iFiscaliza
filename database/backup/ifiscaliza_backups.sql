-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Set-2022 às 05:29
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ifiscaliza`
--
CREATE DATABASE IF NOT EXISTS `ifiscaliza` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ifiscaliza`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `cidades`:
--

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `descricao`) VALUES
(1, 'Passo Fundo'),
(2, 'Chapecó'),
(3, 'Bonito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `local` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(3500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_fotos` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infracao_id` bigint(20) UNSIGNED NOT NULL,
  `cidade_id` bigint(20) UNSIGNED NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `denuncias`:
--   `cidade_id`
--       `cidades` -> `id`
--   `estado_id`
--       `estados` -> `id`
--

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`id`, `data`, `local`, `descricao`, `path_fotos`, `infracao_id`, `cidade_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, '2022-09-26 00:26:07', 'Em frente a Uniserv na Bento', 'Corsa preto parado sobre a faixa de pedestre da sinaleira', 'C:/Documentos/Storage/foto_1', 1, 1, 1, '2022-09-26 06:22:28', '2022-09-26 06:22:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `estados`:
--

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `descricao`) VALUES
(1, 'Rio Grande do Sul'),
(2, 'Santa Catarina'),
(3, 'Mato Grosso do Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `infracoes`
--

CREATE TABLE `infracoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `infracoes`:
--

--
-- Extraindo dados da tabela `infracoes`
--

INSERT INTO `infracoes` (`id`, `descricao`) VALUES
(1, 'Parado em cima da faixa de pedestre'),
(2, 'Parado com o pisca alerta ligado em local proibido'),
(3, 'Estacionado em local proibido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `migrations`:
--

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_09_26_014924_create_tipo_usuarios_table', 1),
(5, '2022_09_26_015121_create_usuarios_table', 1),
(6, '2022_09_26_015320_create_infracoes_table', 1),
(7, '2022_09_26_015348_create_cidades_table', 1),
(8, '2022_09_26_015404_create_estados_table', 1),
(9, '2022_09_26_015419_create_denuncias_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `tipo_usuarios`:
--

--
-- Extraindo dados da tabela `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Denunciante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELACIONAMENTOS PARA TABELAS `usuarios`:
--   `tipo_usuario_id`
--       `tipo_usuarios` -> `id`
--

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nome`, `senha`, `cpf`, `telefone`, `tipo_usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'cristianpetry11@hotmail.com', 'Cristian Guilherme Petry', '2004123K', '060.917.670-62', '(54) 99919-2931', 1, '2022-09-26 05:59:52', '2022-09-26 05:59:52'),
(2, 'corteze@outlook.com', 'Cristian Corteze', '6494DOW', '527.200.519-85', '(49) 99582-8131', 2, '2022-09-26 06:03:26', '2022-09-26 06:03:26'),
(3, 'benicio@bol.com', 'Benício Vicente Melo', '66987423', '074.160.621-60', '(67) 98816-3149', 2, '2022-09-26 06:06:45', '2022-09-26 06:06:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `denuncias_cidade_id_foreign` (`cidade_id`),
  ADD KEY `denuncias_estado_id_foreign` (`estado_id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `infracoes`
--
ALTER TABLE `infracoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`),
  ADD UNIQUE KEY `usuarios_cpf_unique` (`cpf`),
  ADD KEY `usuarios_tipo_usuario_id_foreign` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `infracoes`
--
ALTER TABLE `infracoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD CONSTRAINT `denuncias_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`),
  ADD CONSTRAINT `denuncias_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_tipo_usuario_id_foreign` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
