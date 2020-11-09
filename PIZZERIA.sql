-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-03-2019 a las 21:58:10
-- Versión del servidor: 5.7.23-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PIZZERIA`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMANDA`
--

CREATE TABLE `COMANDA` (
  `ID` int(10) NOT NULL,
  `DATA` datetime NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `LLINATGES` varchar(100) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PIZZA` varchar(3) NOT NULL COMMENT 'MAR=Margarita,EST=4 Estacions, NAP=Napolitana, QUE=4 formatges',
  `MIDA` enum('M','L','XL','XXL') NOT NULL,
  `PREU` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `COMANDA`
--

INSERT INTO `COMANDA` (`ID`, `DATA`, `NOM`, `LLINATGES`, `DNI`, `EMAIL`, `PIZZA`, `MIDA`, `PREU`) VALUES
(1, '2018-04-01 06:11:34', 'Ricardo', 'Ramos', '43569875P', 'ricardo@yahoo.com', 'MAR', 'M', 8),
(2, '2018-04-10 20:35:04', 'Eneko', 'Garcio Rodriguez', '43539845O', 'eneko@gmail.com', 'NAP', 'M', 10.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INGREDIENT`
--

CREATE TABLE `INGREDIENT` (
  `CODI` varchar(5) NOT NULL,
  `NOM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `INGREDIENT`
--

INSERT INTO `INGREDIENT` (`CODI`, `NOM`) VALUES
('1', 'Formatge'),
('2', 'Bacon, Pepperoni');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INGREDIENTS_COMANDA`
--

CREATE TABLE `INGREDIENTS_COMANDA` (
  `ID_COMANDA` int(100) NOT NULL,
  `CODI_INGREDIENT` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `INGREDIENTS_COMANDA`
--

INSERT INTO `INGREDIENTS_COMANDA` (`ID_COMANDA`, `CODI_INGREDIENT`) VALUES
(1, '1'),
(2, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `COMANDA`
--
ALTER TABLE `COMANDA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `INGREDIENT`
--
ALTER TABLE `INGREDIENT`
  ADD PRIMARY KEY (`CODI`);

--
-- Indices de la tabla `INGREDIENTS_COMANDA`
--
ALTER TABLE `INGREDIENTS_COMANDA`
  ADD PRIMARY KEY (`ID_COMANDA`,`CODI_INGREDIENT`),
  ADD KEY `CODI_INGREDIENT` (`CODI_INGREDIENT`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `COMANDA`
--
ALTER TABLE `COMANDA`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
