-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2023 às 18:45
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalhofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `peca` text NOT NULL,
  `tamanho` text NOT NULL,
  `preco` text NOT NULL,
  `estoqueatual` int(11) NOT NULL,
  `estoqueminimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `peca`, `tamanho`, `preco`, `estoqueatual`, `estoqueminimo`) VALUES
(30, 'Vestido longo em jacquard de crepe de chine', 'm', '23.000', 10, 3),
(31, 'Bolsa Prada Galleria pequena em Saffiano EdiÃ§Ã£o Especia azul', '20x20', '45200', 14, 5),
(32, ' Prada Blazer em lÃ£ angorÃ¡ leve abotoamento central 4 Prada Blazer em lÃ£ angorÃ¡ leve abotoamento central 5  Blazer em lÃ£ angorÃ¡ leve abotoamento central R$ 24.000 Cor: Azul', 'g', '45.000', 10, 5),
(33, 'Bolsa Prada Galleria pequena em Saffiano EdiÃ§Ã£o Especial', '20x20', '1000', 30, 5),
(34, 'Bolsa Prada Galleria pequena em Saffiano EdiÃ§Ã£o Especial', '20x20', '2000', 15, 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
