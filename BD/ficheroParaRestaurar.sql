-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2016 a las 04:00:44
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
USE `ejemplo`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `idalumno` int(10) unsigned NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `pasaporte` int(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `segundo_nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(45) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  `etnia` varchar(20) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `fecha_nac` date NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `parroquia` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `telef_habitacion` varchar(12) NOT NULL,
  `telef_oficina` varchar(12) NOT NULL,
  `especialidad` varchar(10) NOT NULL,
  `fecha _inscripcion` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `universidad` varchar(100) NOT NULL,
  `trabajo` varchar(100) NOT NULL,
  `ano_servicio` varchar(3) NOT NULL,
  `tipo_org` varchar(10) NOT NULL,
  `observacion` varchar(1000) NOT NULL,
  `nro_deposito` int(11) NOT NULL,
  `fecha_deposito` date NOT NULL,
  `monto_deposito` decimal(11,0) NOT NULL,
  `nro_deposito2` int(11) NOT NULL,
  `fecha_deposito2` varchar(10) NOT NULL,
  `monto_deposito2` decimal(11,0) NOT NULL,
  `modo_ingreso` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `capital` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cohortes`
--

CREATE TABLE IF NOT EXISTS `cohortes` (
  `id` int(50) NOT NULL,
  `cohorte` varchar(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(10) unsigned NOT NULL,
  `especialidad` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `uc` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE IF NOT EXISTS `datos` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `cedula` varchar(10) NOT NULL,
  `tipo_documento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `cod_especialidad` varchar(10) NOT NULL,
  `especialidad` varchar(300) NOT NULL,
  `uc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `iso_3166-2` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id_municipio` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `municipio` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=463 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `idpago` int(100) NOT NULL,
  `nro_deposito` int(11) NOT NULL,
  `monto_deposito` decimal(6,0) NOT NULL,
  `fecha_deposito` date NOT NULL,
  `idalumno` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL,
  `cohorte` varchar(7) NOT NULL,
  `monto_total` decimal(11,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `Codigo` varchar(2) NOT NULL,
  `Pais` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
  `id_parroquia` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `parroquia` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1139 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_alumno_curso`
--

CREATE TABLE IF NOT EXISTS `rel_alumno_curso` (
  `idcurso` int(10) unsigned DEFAULT NULL,
  `cod_especialidad` varchar(10) NOT NULL,
  `idalumno` int(10) unsigned DEFAULT NULL,
  `cohorte` varchar(6) NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_tributaria`
--

CREATE TABLE IF NOT EXISTS `unidad_tributaria` (
  `id` int(1) NOT NULL,
  `ut` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`), ADD KEY `municipio` (`municipio`), ADD KEY `parroquia` (`parroquia`), ADD KEY `estado` (`estado`), ADD KEY `especialidad` (`especialidad`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`), ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `cohortes`
--
ALTER TABLE `cohortes`
  ADD PRIMARY KEY (`cohorte`), ADD KEY `id` (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`), ADD KEY `especialidad` (`especialidad`), ADD KEY `especialidad_2` (`especialidad`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`cod_especialidad`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`), ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpago`), ADD UNIQUE KEY `nro_deposito` (`nro_deposito`), ADD KEY `idalumno` (`idalumno`), ADD KEY `idcurso` (`idcurso`), ADD KEY `idalumno_2` (`idalumno`), ADD KEY `idcurso_2` (`idcurso`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`id_parroquia`), ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `rel_alumno_curso`
--
ALTER TABLE `rel_alumno_curso`
  ADD KEY `FK_rel_alumno_curso_1` (`idalumno`), ADD KEY `FK_rel_alumno_curso_2` (`idcurso`), ADD KEY `cod_especialidad` (`cod_especialidad`), ADD KEY `idcurso` (`idcurso`), ADD KEY `idalumno` (`idalumno`), ADD KEY `cohorte` (`cohorte`), ADD KEY `cod_especialidad_2` (`cod_especialidad`);

--
-- Indices de la tabla `unidad_tributaria`
--
ALTER TABLE `unidad_tributaria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=523;
--
-- AUTO_INCREMENT de la tabla `cohortes`
--
ALTER TABLE `cohortes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=463;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpago` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `id_parroquia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1139;
--
-- AUTO_INCREMENT de la tabla `unidad_tributaria`
--
ALTER TABLE `unidad_tributaria`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`cod_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parroquias`
--
ALTER TABLE `parroquias`
ADD CONSTRAINT `parroquias_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_alumno_curso`
--
ALTER TABLE `rel_alumno_curso`
ADD CONSTRAINT `FK_rel_alumno_curso_1` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`),
ADD CONSTRAINT `FK_rel_alumno_curso_2` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`),
ADD CONSTRAINT `rel_alumno_curso_ibfk_1` FOREIGN KEY (`cod_especialidad`) REFERENCES `especialidad` (`cod_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rel_alumno_curso_ibfk_2` FOREIGN KEY (`cohorte`) REFERENCES `cohortes` (`cohorte`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
