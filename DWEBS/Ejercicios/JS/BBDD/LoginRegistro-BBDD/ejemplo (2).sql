-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2020 a las 09:04:43
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `dwc` tinyint(1) NOT NULL,
  `dws` tinyint(1) NOT NULL,
  `di` tinyint(1) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `password`, `edad`, `genero`, `fecha`, `dwc`, `dws`, `di`, `curso`) VALUES
('Nombre', 'Apellido', '1', 0, 'male', '2020-10-13', 1, 0, 0, 'daw'),
('Pepe', 'Pelaez', '1234', 0, 'male', '2020-10-12', 1, 1, 0, 'dam');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
