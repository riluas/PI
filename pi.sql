-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2020 a las 09:19:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoxpi`
--

CREATE TABLE `alumnoxpi` (
  `idPI` varchar(50) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `formato` varchar(50) NOT NULL,
  `idPI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pi`
--

CREATE TABLE `pi` (
  `id` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `cursoEscolar` varchar(50) NOT NULL,
  `profesorResponsable` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `idTitulacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pi`
--

INSERT INTO `pi` (`id`, `titulo`, `cursoEscolar`, `profesorResponsable`, `descripcion`, `idTitulacion`) VALUES
('1', 'Hola', '19/20', 'Bernardo', 'Hola que tal os va', '2daw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

CREATE TABLE `titulacion` (
  `id` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `titulacion`
--

INSERT INTO `titulacion` (`id`, `titulo`, `curso`) VALUES
('2daw', 'daw', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `contrasenya` varchar(25) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumnoxpi`
--
ALTER TABLE `alumnoxpi`
  ADD KEY `FK_AlumnoXPi_alumno` (`idAlumno`),
  ADD KEY `FK_AlumnoXPi_pi` (`idPI`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_documento_pi` (`idPI`);

--
-- Indices de la tabla `pi`
--
ALTER TABLE `pi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pi_titulacion` (`idTitulacion`);

--
-- Indices de la tabla `titulacion`
--
ALTER TABLE `titulacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnoxpi`
--
ALTER TABLE `alumnoxpi`
  ADD CONSTRAINT `FK_AlumnoXPi_alumno` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`id`),
  ADD CONSTRAINT `FK_AlumnoXPi_pi` FOREIGN KEY (`idPI`) REFERENCES `pi` (`id`);

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `FK_documento_pi` FOREIGN KEY (`idPI`) REFERENCES `pi` (`id`);

--
-- Filtros para la tabla `pi`
--
ALTER TABLE `pi`
  ADD CONSTRAINT `FK_pi_titulacion` FOREIGN KEY (`idTitulacion`) REFERENCES `titulacion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
