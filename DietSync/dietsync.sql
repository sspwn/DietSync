-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/02/2024 às 18:39
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
(6, 'Bater 100kg', 'Ganho de massa', 1000.00, 1000.00, 100.00, 100.00, '2024-02-05', 'Almoço', '[\"Arroz\",\"feijao\",\"carne de boi\",\" salada\"]', 1, 'carne sem gordura e salada a vontade', NULL, NULL, NULL),
(7, 'teste dieta', 'teste dieta', 1.00, 1.00, 1.00, 1.00, '2024-02-19', 'teste dieta', '[\"teste dieta\",\"teste dieta\",\"teste dieta\",\"teste dieta\",\"teste dieta\",\"teste dieta\",\"teste dieta\",\"teste dieta\",\"teste dieta\"]', 1, 'teste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dietateste dieta', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `nutricionista`
--

CREATE TABLE `nutricionista` (
  `idnutricionista` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `nutricionista`
--

INSERT INTO `nutricionista` (`idnutricionista`, `name`, `email`, `password`) VALUES
(1, 'Gabrielly', 'gabrielly@nutri.com', '$2y$10$JRJQbrZi/5.LdgOvbxaoOOG5D5JSfy5ll4W1RwDx14lAlGlKc6cuO'),
(2, 'nutri', 'nutri@nutri.com', '$2y$10$9MjPItKOC/CmPLXIou9SAe8.E3Ly1ZoMJ6PYio1GCRTmbR8sX/PaC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nutricionista_has_usuario`
--

CREATE TABLE `nutricionista_has_usuario` (
  `nutricionista_idnutricionista` int(11) NOT NULL,
  `usuario_idusuario` bigint(20) UNSIGNED NOT NULL,
  `dieta_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal`
--

CREATE TABLE `personal` (
  `idPersonal` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `personal`
--

INSERT INTO `personal` (`idPersonal`, `name`, `email`, `password`) VALUES
(1, 'Luizão', 'luizao@personal.com', '$2y$10$cFY0XVLTOPUAcTksbOdIdeId1Q9.Gc3LQmKSowbPuNpAfsdf8BB.i');

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_has_usuario`
--

CREATE TABLE `personal_has_usuario` (
  `Personal_idPersonal` int(11) NOT NULL,
  `usuario_idusuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome_de_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD KEY `dietas_ibfk_1` (`fk_id_usuario_dieta`);

--
-- Índices de tabela `evolucaos`
--
ALTER TABLE `evolucaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_evolucaos` (`fk_id_evolucaos`);

--
-- Índices de tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD PRIMARY KEY (`idnutricionista`);

--
-- Índices de tabela `nutricionista_has_usuario`
--
ALTER TABLE `nutricionista_has_usuario`
  ADD PRIMARY KEY (`nutricionista_idnutricionista`,`usuario_idusuario`),
  ADD KEY `fk_id_user` (`usuario_idusuario`);

--
-- Índices de tabela `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idPersonal`);

--
-- Índices de tabela `personal_has_usuario`
--
ALTER TABLE `personal_has_usuario`
  ADD PRIMARY KEY (`Personal_idPersonal`,`usuario_idusuario`),
  ADD KEY `fk_id_usuer` (`usuario_idusuario`);

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
  ADD PRIMARY KEY (`id`,`nome_de_usuario`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dietas`
--
ALTER TABLE `dietas`
  MODIFY `id_dieta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `evolucaos`
--
ALTER TABLE `evolucaos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  MODIFY `idnutricionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `personal`
--
ALTER TABLE `personal`
  MODIFY `idPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Restrições para tabelas `nutricionista_has_usuario`
--
ALTER TABLE `nutricionista_has_usuario`
  ADD CONSTRAINT `fk_dieta_id` FOREIGN KEY (`dieta_id`) REFERENCES `dietas` (`id_dieta`),
  ADD CONSTRAINT `fk_id_nutricionista` FOREIGN KEY (`nutricionista_idnutricionista`) REFERENCES `nutricionista` (`idnutricionista`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`usuario_idusuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `personal_has_usuario`
--
ALTER TABLE `personal_has_usuario`
  ADD CONSTRAINT `fk_id_personal` FOREIGN KEY (`Personal_idPersonal`) REFERENCES `personal` (`idPersonal`),
  ADD CONSTRAINT `fk_id_usuer` FOREIGN KEY (`usuario_idusuario`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `treino`
--
ALTER TABLE `treino`
  ADD CONSTRAINT `treino_ibfk_1` FOREIGN KEY (`fk_id_usuario_treino`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
