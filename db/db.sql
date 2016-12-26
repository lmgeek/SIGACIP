-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-07-2014 a las 21:19:06
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `idalumno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido_paterno` varchar(45) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo`) VALUES
(5, 'Desarrollos', 'PHP', 'Free', 'info@desarrollosphp.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `costo_curso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `nombre`, `descripcion`, `costo_curso`) VALUES
(2, 'Programacion', 'PHP, VB.NET', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE IF NOT EXISTS `datos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`Id`, `nombre`, `apellidos`, `usuario`, `password`) VALUES
(1, 'Manuel', 'CORTES CRISANTO', 'manu', '123'),
(2, 'MANUEL', 'CORTES CRISANTO', 'manu', '123'),
(3, 'Juan', 'perez', 'juan', '123'),
(4, 'jh', 'jha', '1', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_alumno_curso`
--

CREATE TABLE IF NOT EXISTS `rel_alumno_curso` (
  `idcurso` int(10) unsigned DEFAULT NULL,
  `idalumno` int(10) unsigned DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  KEY `FK_rel_alumno_curso_1` (`idalumno`),
  KEY `FK_rel_alumno_curso_2` (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_alumno_curso`
--

INSERT INTO `rel_alumno_curso` (`idcurso`, `idalumno`, `fecha_inicio`, `fecha_fin`) VALUES
(2, 5, '2014-07-01', '2014-07-09');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rel_alumno_curso`
--
ALTER TABLE `rel_alumno_curso`
  ADD CONSTRAINT `FK_rel_alumno_curso_1` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`),
  ADD CONSTRAINT `FK_rel_alumno_curso_2` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
