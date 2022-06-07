-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2022 a las 07:58:13
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finanzas`
--
CREATE DATABASE IF NOT EXISTS `finanzas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `finanzas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroentradas`
--

CREATE TABLE `registroentradas` (
  `id_entrada` int(11) NOT NULL,
  `tipoEntrada` text NOT NULL,
  `monto` float NOT NULL,
  `fechaEntrada` date NOT NULL,
  `facturaImg` text NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosalidas`
--

CREATE TABLE `registrosalidas` (
  `id_salida` int(11) NOT NULL,
  `tipoSalida` text NOT NULL,
  `monto` float NOT NULL,
  `fechaSalida` date NOT NULL,
  `facturaImg` text NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `usuario`, `pwd`) VALUES
(1, 'Administrador', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registroentradas`
--
ALTER TABLE `registroentradas`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `registrosalidas`
--
ALTER TABLE `registrosalidas`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`),
  ADD KEY `idusuario_2` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registroentradas`
--
ALTER TABLE `registroentradas`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrosalidas`
--
ALTER TABLE `registrosalidas`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registroentradas`
--
ALTER TABLE `registroentradas`
  ADD CONSTRAINT `registroentradas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `registrosalidas`
--
ALTER TABLE `registrosalidas`
  ADD CONSTRAINT `registrosalidas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
