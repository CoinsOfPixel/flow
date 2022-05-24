-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 24/05/2022 às 00:28
-- Versão do servidor: 8.0.29-0ubuntu0.20.04.3
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `flow`
--

CREATE TABLE `flow` (
  `id` int NOT NULL,
  `date` text NOT NULL,
  `store_name` text NOT NULL,
  `order_id` text NOT NULL,
  `amount_brl` text NOT NULL,
  `swap_order_id` text NOT NULL,
  `amount_swap` text NOT NULL,
  `pair_swap` text NOT NULL,
  `payment_address` text NOT NULL,
  `payment_hash` text NOT NULL,
  `br_ex_cript_dep_id` text NOT NULL,
  `amount_brex` text NOT NULL,
  `dep_brex_in` text NOT NULL,
  `brl_withdraw_id` text NOT NULL,
  `brl_withdraw_amount` text NOT NULL,
  `bank_dep_id` text NOT NULL,
  `pix_id` text NOT NULL,
  `amount_sent_pix` text NOT NULL,
  `date_pix` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `flow`
--
ALTER TABLE `flow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `flow`
--
ALTER TABLE `flow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
