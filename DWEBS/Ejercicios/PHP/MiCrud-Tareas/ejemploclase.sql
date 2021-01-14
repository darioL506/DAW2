-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-11-2020 a las 19:36:40
-- Versión del servidor: 8.0.22-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemploclase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Tfno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`DNI`, `Nombre`, `Clave`, `Tfno`) VALUES
('101A', 'Israel', '1', '3234'),
('101B', 'Alejandro', '2', '999999'),
('1A', 'Nestor', '3', '12'),
('2B', 'Belen', '2', '2'),
('3C', 'Luis', '3', '3'),
('5E', 'Dario', '4', '5'),
('6F', 'Jorge', '4', '6'),
('7G', 'Maria', '5', '7'),
('8H', 'Daniel', '5', '223423'),
('9T', 'Rodrigo', '1', '23534');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int NOT NULL,
  `tarea` varchar(50) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `porcDes` int NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `tarea`, `descripcion`, `porcDes`, `nivel`) VALUES
(1, 'Ejemplo', 'Ejemplo', 2, 'facil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareaUsu`
--

CREATE TABLE `tareaUsu` (
  `idTar` int NOT NULL,
  `usuario` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tareaUsu`
--

INSERT INTO `tareaUsu` (`idTar`, `usuario`) VALUES
(1, '1A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareaUsu`
--
ALTER TABLE `tareaUsu`
  ADD KEY `id-tar` (`idTar`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tareaUsu`
--
ALTER TABLE `tareaUsu`
  ADD CONSTRAINT `id-tar` FOREIGN KEY (`idTar`) REFERENCES `tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `personas` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
