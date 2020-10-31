-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 31-Out-2020 às 03:51
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sosmedicamentos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `username` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `adm_desde` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`username`, `email`, `senha`, `nome`, `sobrenome`, `adm_desde`) VALUES
('criscris', 'cc@itau.com', 'counterstrike2', 'Cris', 'Meusobrenome', '2020-10-30 00:07:12'),
('mtakushi', 'mh@itau.com', 'counterstrike1', 'Mitsu', 'Hashioka', '2020-10-30 00:07:12'),
('wroger', 'wr@itau.com', 'counterstrike3', 'Willi', 'Roger', '2020-10-30 00:07:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

CREATE TABLE `denuncia` (
  `id` int(11) NOT NULL,
  `ubs_id` int(11) DEFAULT NULL,
  `medicamento_id` int(11) DEFAULT NULL,
  `comentario` varchar(1000) DEFAULT NULL,
  `data_denuncia` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `denuncia`
--

INSERT INTO `denuncia` (`id`, `ubs_id`, `medicamento_id`, `comentario`, `data_denuncia`) VALUES
(1, 2, 1, 'ingratos', '2020-10-30 00:07:13'),
(2, 2, 2, 'nao gostei', '2020-10-30 00:07:13'),
(3, 3, 3, 'eu pago meus impostos', '2020-10-30 00:07:13'),
(5, 2, 2, 'teste', '2020-05-05 00:00:00'),
(6, 2, 1, 'Testando', '2020-06-20 00:00:00'),
(7, 1, 2, 'TESTEANDO COM DEV', '2020-10-28 00:00:00'),
(8, 1, 1, 'Testando o CAdastrar', '2020-10-20 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

CREATE TABLE `fale_conosco` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fale_conosco`
--

INSERT INTO `fale_conosco` (`id`, `nome`, `msg`, `data`) VALUES
(1, 'Nayara Suelen Fernandes Lopes', 'Testando', '2020-10-30'),
(9, 'Nayara Suelen Fernandes Lopes', 'Testando', '2020-10-30'),
(10, 'Cris', 'Olá', '2020-10-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `classificacao` varchar(100) DEFAULT NULL,
  `cadastrado_por_id` varchar(20) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id`, `nome`, `classificacao`, `cadastrado_por_id`, `data_cadastro`) VALUES
(1, 'Dipirona', 'Analgesico', 'mtakushi', '2020-10-30 00:07:12'),
(2, 'Gardenal', 'Tarja preta', 'criscris', '2020-10-30 00:07:12'),
(3, 'Ritalina', 'Tarja preta', 'wroger', '2020-10-30 00:07:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ubs`
--

CREATE TABLE `ubs` (
  `id` int(11) NOT NULL,
  `nomeUbs` varchar(100) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `dias_atendimento` varchar(100) DEFAULT NULL,
  `horario_atendimento` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `cadastrado_por_id` varchar(20) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ubs`
--

INSERT INTO `ubs` (`id`, `nomeUbs`, `descricao`, `dias_atendimento`, `horario_atendimento`, `endereco`, `bairro`, `zona`, `cidade`, `uf`, `cep`, `latitude`, `longitude`, `cadastrado_por_id`, `data_cadastro`) VALUES
(1, 'Sao Bento', NULL, NULL, NULL, NULL, NULL, NULL, 'Sao Paulo', 'SP', NULL, NULL, NULL, 'mtakushi', '2020-10-30 00:07:12'),
(2, 'Maria Aparecida', NULL, NULL, NULL, NULL, NULL, NULL, 'Sao Paulo', 'SP', NULL, NULL, NULL, 'criscris', '2020-10-30 00:07:12'),
(3, 'Santa Maria', NULL, NULL, NULL, NULL, NULL, NULL, 'Sao Paulo', 'SP', NULL, NULL, NULL, 'wroger', '2020-10-30 00:07:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ubs_ex_den` (`ubs_id`);

--
-- Índices para tabela `fale_conosco`
--
ALTER TABLE `fale_conosco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ex_med` (`cadastrado_por_id`);

--
-- Índices para tabela `ubs`
--
ALTER TABLE `ubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ex_ubs` (`cadastrado_por_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fale_conosco`
--
ALTER TABLE `fale_conosco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ubs`
--
ALTER TABLE `ubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `ubs_ex_den` FOREIGN KEY (`ubs_id`) REFERENCES `ubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `user_ex_med` FOREIGN KEY (`cadastrado_por_id`) REFERENCES `administrador` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ubs`
--
ALTER TABLE `ubs`
  ADD CONSTRAINT `user_ex_ubs` FOREIGN KEY (`cadastrado_por_id`) REFERENCES `administrador` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
