-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2021 a las 10:38:32
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `easylearn`
--
CREATE DATABASE IF NOT EXISTS `easylearn` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `easylearn`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entita`
--

CREATE TABLE `entita` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esperienze`
--

CREATE TABLE `esperienze` (
  `id` int(11) NOT NULL,
  `argomenti` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `annofrequenza` int(11) DEFAULT NULL,
  `votazione` int(11) DEFAULT NULL,
  `idutente` int(11) NOT NULL,
  `identita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `cognome` varchar(50) COLLATE utf8_bin NOT NULL,
  `sesso` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `datanascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `sesso`, `email`, `datanascita`) VALUES
(21, 'andres camilo', 'eraso', 'asdfsd', 'acde100@gmail.com', '2021-10-13'),
(22, 'andres camilo', 'duarte eraso', 'm', 'acde100@gmail.com', '2021-10-12'),
(23, 'andres camilo', 'eraso', 'ffffffffffff', 'acde100@gmail.com', '2021-10-20'),
(24, 'andres camilo', 'eraso', 'asfds', 'acde100@gmail.com', '2021-10-27'),
(25, 'andres camilo', 'eraso', 'adsfads', 'acde100@gmail.com', '2021-10-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entita`
--
ALTER TABLE `entita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `esperienze`
--
ALTER TABLE `esperienze`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entita`
--
ALTER TABLE `entita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `esperienze`
--
ALTER TABLE `esperienze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
