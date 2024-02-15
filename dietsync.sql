-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/02/2024 às 18:34
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dietsync`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contem`
--

CREATE TABLE `contem` (
  `FK_receita_id_receitas` bigint(20) UNSIGNED DEFAULT NULL,
  `FK_dieta_id_dieta` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dietas`
--

CREATE TABLE `dietas` (
  `id_dieta` bigint(20) UNSIGNED NOT NULL,
  `nome_dieta` varchar(255) NOT NULL,
  `tipo_dieta` varchar(255) NOT NULL,
  `calorias` double(8,2) NOT NULL,
  `proteinas` double(8,2) NOT NULL,
  `carboidratos` double(8,2) NOT NULL,
  `gorduras` double(8,2) NOT NULL,
  `data_dieta` date NOT NULL,
  `refeicao` varchar(255) NOT NULL,
  `alimentos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`alimentos`)),
  `quantidade` int(11) NOT NULL,
  `observacoes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fk_id_usuario_dieta` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `dietas`
--

INSERT INTO `dietas` (`id_dieta`, `nome_dieta`, `tipo_dieta`, `calorias`, `proteinas`, `carboidratos`, `gorduras`, `data_dieta`, `refeicao`, `alimentos`, `quantidade`, `observacoes`, `created_at`, `updated_at`, `fk_id_usuario_dieta`) VALUES
(6, 'Bater 100kg', 'Ganho de massa', 1000.00, 1000.00, 100.00, 100.00, '2024-02-05', 'Almoço', '[\"Arroz\",\"feijao\",\"carne de boi\",\" salada\"]', 1, 'carne sem gordura e salada a vontade', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `evolucaos`
--

CREATE TABLE `evolucaos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `peso` double(8,2) NOT NULL,
  `altura` double(8,2) NOT NULL,
  `cintura` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fk_id_evolucaos` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `evolucaos`
--

INSERT INTO `evolucaos` (`id`, `data`, `peso`, `altura`, `cintura`, `created_at`, `updated_at`, `fk_id_evolucaos`) VALUES
(9, '2024-02-05', 55.00, 155.00, 60.00, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_12_10_011752_create_dieta_table', 1),
(5, '2023_12_10_011752_create_receita_table', 1),
(6, '2023_12_10_011752_create_treino_table', 1),
(7, '2023_12_10_011753_create_contem_table', 1),
(8, '2023_12_19_234257_create_evolucoes_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita`
--

CREATE TABLE `receita` (
  `id_receitas` bigint(20) UNSIGNED NOT NULL,
  `nome_receita` varchar(255) NOT NULL,
  `ingredientes` text NOT NULL,
  `modo_preparo` longtext NOT NULL,
  `calorias` double(8,2) NOT NULL,
  `proteinas` double(8,2) NOT NULL,
  `carboidratos` double(8,2) NOT NULL,
  `gordura` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `receita`
--

INSERT INTO `receita` (`id_receitas`, `nome_receita`, `ingredientes`, `modo_preparo`, `calorias`, `proteinas`, `carboidratos`, `gordura`, `created_at`, `updated_at`) VALUES
(1, 'receita', '[\"farinha 150g\",\" 3 ovos\",\" 1\\/4 de chicara oleo\",\" sal a gosto\"]', 'joga tudo e mexe bem ate ficar uniforme', 150.00, 50.00, 79.00, 2.00, '2023-12-21 02:24:55', '2023-12-21 02:24:55'),
(3, 'Bolo de Cenoura', '[\"3 cenouras m\\u00e9dias descascadas e picadas\",\"\\r\\n3 ovos\",\"\\r\\n1 x\\u00edcara de \\u00f3leo vegetal\",\"\\r\\n2 x\\u00edcaras de a\\u00e7\\u00facar\",\"\\r\\n2 x\\u00edcaras de farinha de trigo\",\"\\r\\n1 colher de sopa de fermento em p\\u00f3\",\"\\r\\n1\\/2 x\\u00edcara de chocolate em p\\u00f3\",\"\\r\\n1\\/4 x\\u00edcara de a\\u00e7\\u00facar\",\"\\r\\n1 colher de sopa de manteiga\",\"\\r\\n1\\/4 x\\u00edcara de leite\"]', 'Pré-aqueça o forno a 180°C. Unte e enfarinhe uma forma média para bolo.\r\nNo liquidificador, bata as cenouras, os ovos e o óleo até obter uma mistura homogênea.\r\nEm uma tigela grande, misture o açúcar e a farinha de trigo. Adicione a mistura do liquidificador e mexa bem.\r\nAcrescente o fermento em pó e misture novamente.\r\nDespeje a massa na forma preparada e leve ao forno por aproximadamente 40-45 minutos, ou até que um palito inserido no centro saia limpo.\r\nEnquanto o bolo está assando, prepare a cobertura: em uma panela, misture o chocolate em pó, o açúcar, a manteiga e o leite. Leve ao fogo baixo, mexendo sempre, até obter uma consistência cremosa.\r\nApós assar o bolo, espere esfriar um pouco antes de desenformar.\r\nCubra o bolo com a cobertura de chocolate ainda quente.\r\nSirva e aproveite!', 250.00, 3.00, 30.00, 14.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `treino`
--

CREATE TABLE `treino` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `exercicios` text NOT NULL,
  `repeticoes` int(11) NOT NULL,
  `series` int(11) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `duracao` varchar(255) NOT NULL,
  `frequencia` varchar(255) NOT NULL,
  `nome_treino` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fk_id_usuario_treino` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `treino`
--

INSERT INTO `treino` (`id`, `data`, `tipo`, `exercicios`, `repeticoes`, `series`, `objetivo`, `duracao`, `frequencia`, `nome_treino`, `created_at`, `updated_at`, `fk_id_usuario_treino`) VALUES
(2, '2024-02-05', 'musculacao', '[\"Barra fixa (pull-ups)\",\"Remada com barra T\",\" Puxada na polia alta (pegada supinada)\",\" Rosca direta com barra\",\" Rosca martelo\"]', 15, 3, 'Ficar largo atras', '60', '2', 'Ficar largo atras', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `sexo` char(3) NOT NULL,
  `data_nasc` date NOT NULL,
  `peso` double(8,2) NOT NULL,
  `altura` double(8,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `meta`, `sexo`, `data_nasc`, `peso`, `altura`, `email`, `password`, `created_at`, `updated_at`) VALUES
(5, 'Gabriel Vaz Scremim', 'Ficas Gostoso', 'Mas', '2002-12-03', 62.00, 180.00, 'gabrielscremim@dietsync.com', '$2y$10$1TtZDH.4SFou9tOf.bBNLuLxZRTT9/cVJUYkQbLATFpyU5g.YVUii', NULL, NULL),
(8, 'Admin123', 'Admin gostoso', 'Fem', '2000-01-31', 62.00, 171.00, 'admin@dietsync.com', '$2y$10$8seyuzYxj0tMDQDZQtbGfu/mqu/t9eOO3swAqsukb.4UOKN8knIfi', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contem`
--
ALTER TABLE `contem`
  ADD KEY `contem_fk_receita_id_receitas_foreign` (`FK_receita_id_receitas`),
  ADD KEY `contem_fk_dieta_id_dieta_foreign` (`FK_dieta_id_dieta`);

--
-- Índices de tabela `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`id_dieta`),
  ADD KEY `fk_id_usuario_dieta` (`fk_id_usuario_dieta`) USING BTREE;

--
-- Índices de tabela `evolucaos`
--
ALTER TABLE `evolucaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_evolucaos` (`fk_id_evolucaos`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_receitas`);

--
-- Índices de tabela `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario_treino` (`fk_id_usuario_treino`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dietas`
--
ALTER TABLE `dietas`
  MODIFY `id_dieta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `evolucaos`
--
ALTER TABLE `evolucaos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `id_receitas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `treino`
--
ALTER TABLE `treino`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contem`
--
ALTER TABLE `contem`
  ADD CONSTRAINT `contem_fk_dieta_id_dieta_foreign` FOREIGN KEY (`FK_dieta_id_dieta`) REFERENCES `dietas` (`id_dieta`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `contem_fk_receita_id_receitas_foreign` FOREIGN KEY (`FK_receita_id_receitas`) REFERENCES `receita` (`id_receitas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `dietas`
--
ALTER TABLE `dietas`
  ADD CONSTRAINT `dietas_ibfk_1` FOREIGN KEY (`fk_id_usuario_dieta`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `evolucaos`
--
ALTER TABLE `evolucaos`
  ADD CONSTRAINT `fk_id_evolucaos` FOREIGN KEY (`fk_id_evolucaos`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `treino`
--
ALTER TABLE `treino`
  ADD CONSTRAINT `treino_ibfk_1` FOREIGN KEY (`fk_id_usuario_treino`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
