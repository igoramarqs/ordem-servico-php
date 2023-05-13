-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/05/2023 às 00:09
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
-- Banco de dados: `ybinformatica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `email` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `endereco` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `rg` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `cpf` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `cnpj` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `pessoa_tipo` int(1) NOT NULL DEFAULT 0 COMMENT '1 = Pessoa física\r\n2 = Pessoa jurídica',
  `whatsapp` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `data_cadastro` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `refOs` varchar(128) NOT NULL DEFAULT 'YBOS-0',
  `refDataAbertura` int(11) NOT NULL DEFAULT 0,
  `refCliente` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `refContato` varchar(200) NOT NULL DEFAULT 'Nenhum',
  `refDescricaoDefeito` text NOT NULL,
  `refDataConclusao` int(11) NOT NULL DEFAULT 0,
  `refTecnico` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `refObservacoes` text NOT NULL,
  `refItens` text NOT NULL,
  `refServicos` text NOT NULL,
  `refDesconto` int(11) NOT NULL DEFAULT 0,
  `refValorTotal` varchar(128) NOT NULL DEFAULT '0',
  `refFormaPagamento` int(11) NOT NULL DEFAULT 0 COMMENT '0 = PGTO. PENDENTE\r\n1 = PGTO. DINHEIRO\r\n2 = PGTO. CARTÃO DÉBITO\r\n3 = PGTO. CARTÃO CRÉDITO',
  `refParcelas` varchar(128) NOT NULL DEFAULT '0',
  `refStatus` int(1) NOT NULL DEFAULT 0 COMMENT '0 = EM ABERTO\r\n1 = FINALIZADO\r\n2 = CANCELADO',
  `refCriadoEm` int(11) NOT NULL DEFAULT 0,
  `refEditadoEm` int(11) NOT NULL DEFAULT 0,
  `refUltimoEditor` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `valor` varchar(128) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `senha` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `nome_completo` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `email` varchar(128) NOT NULL DEFAULT 'Nenhum',
  `foto_perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `nome_completo`, `email`, `foto_perfil`) VALUES
(1, 'admin', '$2y$11$6uUXDMTdDDqMIodl96JZ.e7cidB2VV2XWmlFGde9e.5eRioWG29Se', 'Administrador', 'administrador@ordemservico.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
