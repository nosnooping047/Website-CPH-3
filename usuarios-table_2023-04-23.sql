-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Abr-2023 às 15:59
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id20646749_registros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`) VALUES
(1, 'lucas', '1234', 'lucasdamaceno047@gmail.com'),
(4, 'drgdg', '1234', 'dgdrgd@fasf.com'),
(5, 'drgdgf', '1234', 'dgdrffd@fasf.com'),
(6, 'drgdsgf', '1234', 'dgsdrffd@fasf.com'),
(7, 'drssgdsgf', '1234', 'dgsdrffssd@fasf.com'),
(8, 'lucaslucas', '1234', 'lucaslucas@fasf.com'),
(9, 'lucaslucaswww', '1234', 'lucaslucaswww@fasf.com'),
(10, 'lucaslucaswwwwwwh', '$argon2id$v=19$m=1048576,t=4,p=2$WE9vS2JYdzFHeDNOZ0xIVQ$Z5ClkLTvUp8a2cd1atx8/3WgLwOjnunX5YRFtk4H7wI', 'lucaslucaswwwwwwh@fasf.com'),
(12, 'lucaslucaswwwwwwhwh', '$argon2id$v=19$m=1048576,t=4,p=2$TVc1YnpwNEtvdWM0SEZIQQ$maChPc1++MGBB9z+abQS+cVaG880JozE5Dgu12lESYE', 'lucaslucaswwwwwhwh@fasf.com'),
(13, 'lucao', '$argon2id$v=19$m=1048576,t=4,p=2$UmpvVzVxNDNjL2hTcWpVNg$DXYmbodkfp/EbzCLC86M9ruODQWBQl1s5kqnkNpcIHU', 'lucao@gmail.com'),
(15, 'lucaoas', '$argon2id$v=19$m=1048576,t=4,p=2$ZWVLSXl5RWdLLkdpVmY0eg$GvJ01t39HooM1AUnkoK/szn6YdU9N/fNZhYE/ERzLPo', 'lucaoash@fasf.com'),
(16, 'asd', '$argon2id$v=19$m=1048576,t=4,p=2$ZkNyZE1KcFNqWDRTVlJ6Wg$3cuucRz3IBv6wDH+z03UJbizweBmkDiUEwv8W/WdNN0', 'asd@a.com'),
(17, 'asddd', '$argon2id$v=19$m=1048576,t=4,p=2$YUp5dTkzRGY5eTlNdjJwcA$C+hGiRUKS9UYfUuycHI96Fazj2O0WcbXbBQTsn4QYvM', 'asdddh@fasf.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
