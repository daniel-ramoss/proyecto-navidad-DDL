-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2021 a las 12:52:36
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aerolinea`
--

CREATE DATABASE IF NOT EXISTS `Aerolinea` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `Aerolinea`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajeros`
--

CREATE TABLE `pasajeros` (
  `idPasajero` int(11) NOT NULL,
  `idVuelo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `numeroAsiento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pasajeros`
--

INSERT INTO `pasajeros` (`idPasajero`, `idVuelo`, `idUsuario`, `numeroAsiento`) VALUES
(1, 2, 1, 25),
(2, 3, 2, 68),
(3, 1, 3, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `identificador` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenna` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `codigoCookie` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `identificador`, `contrasenna`, `codigoCookie`, `tipoUsuario`, `nombre`, `apellidos`) VALUES
(0, 'admin', 'admin', NULL, 1, 'Admin', 'Admin'),
(1, 'jlopez', 'j', NULL, 0, 'José', 'López'),
(2, 'mgarcia', 'm', NULL, 0, 'María', 'García'),
(3, 'fpi', 'f', NULL, 0, 'Felipe', 'Pi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `fechaIda` datetime NOT NULL,
  `fechaVuelta` datetime NOT NULL,
  `asientosTotal` int(10) NOT NULL,
  `asientosLibres` int(10) NOT NULL,
  `asientosComprados` int(10) NOT NULL,
  `inicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `destino` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `fechaIda`, `fechaVuelta`, `asientosTotal`, `asientosLibres`, `asientosComprados`, `inicio`, `destino`, `precio`) VALUES
(1, '2020-02-03 10:30:00', '2020-02-03 12:30:00', 100, 60, 40, 'Madrid', 'Londres', 0),
(2, '2020-02-04 11:15:00', '2020-02-03 13:30:00', 100, 40, 60, 'Madrid', 'París', 0),
(3, '2020-02-06 17:00:00', '2020-02-03 19:00:00', 100, 70, 30, 'Madrid', 'Roma', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD PRIMARY KEY (`idPasajero`),
  ADD KEY `fk_idUsuariox` (`idUsuario`),
  ADD KEY `fk_idVuelox` (`idVuelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  MODIFY `idPasajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
