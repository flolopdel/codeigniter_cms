-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-01-2014 a las 12:59:28
-- Versión del servidor: 5.5.25
-- Versión de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `guarde`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `informacion` varchar(1024) DEFAULT NULL,
  `nino` int(11) DEFAULT NULL,
  `publicadopor` int(11) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `valoracion` int(2) DEFAULT NULL,
  `descanso` varchar(64) DEFAULT NULL,
  `tiempodescanso` varchar(64) DEFAULT NULL,
  `deposiciones` varchar(64) DEFAULT NULL,
  `deposicionesinfo` varchar(64) DEFAULT NULL,
  `medicacion` varchar(64) DEFAULT NULL,
  `dosis` varchar(64) DEFAULT NULL,
  `alimentacion` varchar(256) DEFAULT NULL,
  `recogida` varchar(256) DEFAULT NULL,
  `lectivo` varchar(256) DEFAULT NULL,
  `ludico` varchar(256) DEFAULT NULL,
  `salud` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `fecha`, `informacion`, `nino`, `publicadopor`, `tipo`, `valoracion`, `descanso`, `tiempodescanso`, `deposiciones`, `deposicionesinfo`, `medicacion`, `dosis`, `alimentacion`, `recogida`, `lectivo`, `ludico`, `salud`) VALUES
(1, '2014-01-09', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve'),
(2, '2014-01-03', '', 2, 5, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve'),
(3, '2014-01-04', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve'),
(4, '2014-01-16', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve'),
(5, '2014-01-02', 'otra cosa mas', 2, 17, 2, 1, 'Bien', '1', NULL, NULL, 'algo', '3', NULL, 'Mujer de Flori', NULL, NULL, 'Resfriado'),
(6, '2014-01-16', '', 2, 7, 3, 4, 'Bien', '', 'Orina', '', NULL, NULL, '', NULL, '', '', 'Bien'),
(7, '2014-01-10', '', 2, 7, 3, 3, 'Regular', '', '', 'No ha realizado nada', NULL, NULL, 'Lo estipulado para hoy', NULL, 'Números', 'Canción de un elefante se balanceaba', 'Fiebre leve'),
(8, '2014-01-11', 'Todo bien', 2, 5, 2, 4, 'Bien', '7', NULL, NULL, 'Dalsi', '3 al día', NULL, 'Antonio el cotorra', NULL, NULL, 'Fiebre leve'),
(9, '2014-01-08', 'asdasdas', 2, 5, 2, 3, 'Bien', '7', NULL, NULL, 'aasdasdasd', 'asdasd', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(10, '2014-01-10', 'asdasdas', 2, 5, 2, 4, 'Bien', '', NULL, NULL, 'aasdasdasd', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(11, '2014-01-17', 'No duerme bien', 2, 5, 2, 5, 'Regular', '5', NULL, NULL, 'Dalsi', '4 al dia', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve'),
(12, '2014-01-17', '', 2, 7, 3, 3, 'Bien', '', 'Ambos', '', NULL, NULL, 'normal', NULL, 'colores', 'el coro de la patata', 'Bien'),
(13, '2014-01-20', '', 3, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien'),
(14, '2014-01-03', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien'),
(15, '2014-01-20', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, 'Normal', NULL, 'Colores', 'Canción de un elefante se balanceaba', 'Bien'),
(16, '2014-01-20', '', 2, 5, 2, 3, 'Regular', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(17, '2014-01-21', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien'),
(18, '2014-01-21', '', 3, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien'),
(19, '2014-01-15', 'Participa en clase', 2, 7, 3, 5, 'Bien', '15', 'Ambos', 'Normal', NULL, NULL, 'Correcta', NULL, 'Colores', 'Canción de un elefante se balanceaba', 'Bien'),
(20, '2014-01-08', 'Participa en clase', 3, 7, 3, 4, 'Bien', '15', 'Ambos', 'Normal', NULL, NULL, 'Correcta', NULL, 'Números', 'Canción de un elefante se balanceaba', 'Bien'),
(21, '2014-01-07', '', 2, 17, 2, 3, 'Regular', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien'),
(22, '2014-01-02', 'asdasdasd', 2, 7, 3, 1, 'Bien', '1', '', '', 'aasdasd', 'asdasd', 'sadsad', 'asdasdas', 'asdasd', 'asdasd', 'Bien'),
(23, '2014-01-29', '', 2, 5, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(24, '2014-01-18', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(25, '2014-01-22', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(26, '2014-01-01', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(27, '2014-01-29', '', 8, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(28, '2014-01-15', '', 8, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(29, '2014-01-14', '', 8, 17, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien'),
(30, '2014-01-10', '', 8, 17, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien'),
(31, '2014-01-30', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, 'asdasda', NULL, 'sadasda', 'asdasdasdas', 'Bien'),
(32, '2014-01-30', '', 3, 7, 3, 4, 'Bien', '10', '', 'bien', NULL, NULL, '', NULL, 'abecedario', 'coro de las patatas', 'Bien'),
(33, '2014-01-15', '', 8, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien'),
(34, '2014-01-30', '', 2, 17, 2, 3, 'Bien', '12', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien'),
(35, '2014-01-14', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, 'asdasdas', NULL, 'asadasdasd', '', 'Bien'),
(36, '2014-01-14', '', 2, 17, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien'),
(37, '2014-01-06', '', 2, 5, 2, 5, 'Bien', '10', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien'),
(38, '2014-01-06', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `guarderia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guarderia` (`guarderia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`, `descripcion`, `guarderia`) VALUES
(1, '5 años', 'Clases de niños de 5 años', 2),
(2, '4 años', 'Niños de 4 años', 2),
(3, '7 años', 'Una clase entretenida', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseno`
--

CREATE TABLE `diseno` (
  `idguarderia` varchar(12) NOT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `imagen1` varchar(256) DEFAULT NULL,
  `imagen2` varchar(256) DEFAULT NULL,
  `imagen3` varchar(256) DEFAULT NULL,
  `imagen4` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diseno`
--

INSERT INTO `diseno` (`idguarderia`, `logo`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUES
('0', 'logo22.png', 'slider-1.jpg', 'slider-2.jpg', 'slider-3.jpg', NULL),
('2', 'logo.png', NULL, NULL, NULL, NULL),
('5', 'pan_3.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) DEFAULT NULL,
  `razonsocial` varchar(256) DEFAULT NULL,
  `cif` varchar(20) DEFAULT NULL,
  `contacto` varchar(256) DEFAULT NULL,
  `gerente` int(11) DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gerente` (`gerente`),
  KEY `provincia` (`provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `razonsocial`, `cif`, `contacto`, `gerente`, `provincia`) VALUES
(2, 'Kidsco', 'Empresa', '41809', 'C/ Sevilla, Albaida del Aljarafe', 2, 41),
(3, 'Empresa de prueba', 'empresa', '', 'sevilla', NULL, 41),
(4, 'Prueba fallos', 'fallos', '', 'fallos', NULL, 2),
(5, 'Prueba catorce', 'catorce', '', 'catorce', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guarderias`
--

CREATE TABLE `guarderias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) DEFAULT NULL,
  `contacto` varchar(256) DEFAULT NULL,
  `director` int(11) DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `director` (`director`),
  KEY `provincia` (`provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `guarderias`
--

INSERT INTO `guarderias` (`id`, `nombre`, `contacto`, `director`, `provincia`, `url`) VALUES
(1, 'ToyStory', 'c/ velarde, nº15 albaida del aljarafe', NULL, 41, NULL),
(2, 'Gurdekidsco', '12312312312312', 3, 2, 'guardekidsco'),
(3, 'Gurdelibre', '12312312312312', NULL, 2, NULL),
(4, 'sadasdsadas', '123123123123', NULL, 5, NULL),
(5, 'Peter Pan', '', 18, 2, 'PeterPan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

CREATE TABLE `ninos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `imagen` varchar(256) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id`, `nombre`, `apellidos`, `fechanacimiento`, `imagen`, `sexo`) VALUES
(2, 'Florindito', 'López', NULL, '', 'h'),
(3, 'Maria', 'Franco', NULL, '', 'm'),
(4, 'Carlos', 'Perez Martin', NULL, '', 'm'),
(5, 'Joselito', 'Mateo', NULL, '', 'h'),
(6, 'Nuevo', 'niño', NULL, '', 'h'),
(8, 'niña 4', 'la cuarta', NULL, '', 'm'),
(9, 'otro niño', 'de prueba', NULL, '', 'h'),
(11, 'Martín', 'modesto', '2006-12-01', '', 'h'),
(12, 'joselito', 'caballero', '2008-12-01', '', 'h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destino_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `objetivo_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `year` varchar(256) DEFAULT NULL,
  `mon` varchar(256) DEFAULT NULL,
  `day` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `destino_id`, `autor_id`, `objetivo_id`, `tipo`, `vista`, `fecha`, `year`, `mon`, `day`) VALUES
(1, 17, 5, 8, 1, 1, '2014-01-29 19:01:44', '2014', '01', '15'),
(2, 7, 5, 8, 1, 1, '2014-01-29 19:01:44', '2014', '01', '15'),
(3, 5, 17, 8, 1, 1, '2014-01-29 19:01:10', '2014', '01', '14'),
(4, 7, 17, 8, 1, 1, '2014-01-29 19:01:10', '2014', '01', '14'),
(5, 5, 17, 8, 1, 1, '2014-01-29 19:01:15', '2014', '01', '10'),
(6, 7, 17, 8, 1, 1, '2014-01-29 19:01:15', '2014', '01', '10'),
(7, 5, 7, 2, 1, 1, '2014-01-30 09:01:34', '2014', '01', '30'),
(8, 17, 7, 2, 1, 1, '2014-01-30 09:01:34', '2014', '01', '30'),
(9, 7, 7, 2, 1, 1, '2014-01-30 09:01:34', '2014', '01', '30'),
(10, 6, 7, 3, 1, 0, '2014-01-30 09:01:28', '2014', '01', '30'),
(11, 7, 7, 3, 1, 1, '2014-01-30 09:01:28', '2014', '01', '30'),
(12, 6, 7, 3, 2, 0, '2014-01-30 09:01:39', '2014', '01', '30'),
(13, 7, 7, 3, 2, 1, '2014-01-30 09:01:39', '2014', '01', '30'),
(14, 5, 7, 2, 2, 1, '2014-01-30 10:01:09', '2014', '01', '30'),
(15, 17, 7, 2, 2, 1, '2014-01-30 10:01:09', '2014', '01', '30'),
(16, 3, 8, 11, 3, 1, '2014-01-30 10:01:11', NULL, NULL, NULL),
(17, 8, 3, 11, 4, 0, '2014-01-30 11:01:01', NULL, NULL, NULL),
(18, 5, 7, 2, 2, 1, '2014-01-30 11:01:42', '2014', '01', '30'),
(19, 17, 7, 2, 2, 1, '2014-01-30 11:01:42', '2014', '01', '30'),
(20, 5, 7, 8, 1, 1, '2014-01-30 12:01:14', '2014', '01', '15'),
(21, 17, 7, 8, 1, 1, '2014-01-30 12:01:14', '2014', '01', '15'),
(22, 5, 17, 2, 1, 1, '2014-01-30 13:08:14', '2014', '01', '30'),
(23, 7, 17, 2, 1, 1, '2014-01-30 13:08:14', '2014', '01', '30'),
(24, 5, 7, 2, 1, 1, '2014-01-30 17:10:27', '2014', '01', '14'),
(25, 17, 7, 2, 1, 1, '2014-01-30 17:10:27', '2014', '01', '14'),
(26, 5, 7, 2, 2, 1, '2014-01-30 17:11:16', '2014', '01', '14'),
(27, 17, 7, 2, 2, 1, '2014-01-30 17:11:16', '2014', '01', '14'),
(28, 5, 17, 2, 1, 1, '2014-01-30 17:11:44', '2014', '01', '14'),
(29, 7, 17, 2, 1, 1, '2014-01-30 17:11:44', '2014', '01', '14'),
(30, 3, 17, 12, 3, 1, '2014-01-30 17:19:57', NULL, NULL, NULL),
(31, 5, 3, 12, 4, 1, '2014-01-30 17:21:02', NULL, NULL, NULL),
(32, 17, 3, 12, 4, 1, '2014-01-30 17:21:02', NULL, NULL, NULL),
(33, 17, 5, 2, 1, 0, '2014-01-30 19:29:05', '2014', '01', '06'),
(34, 7, 5, 2, 1, 1, '2014-01-30 19:29:05', '2014', '01', '06'),
(35, 5, 7, 2, 1, 1, '2014-01-30 19:29:32', '2014', '01', '06'),
(36, 17, 7, 2, 1, 0, '2014-01-30 19:29:32', '2014', '01', '06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` smallint(6) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `provincia`) VALUES
(2, 'Albacete'),
(3, 'Alicante/Alacant'),
(4, 'Almería'),
(1, 'Araba/Álava'),
(33, 'Asturias'),
(5, 'Ávila'),
(6, 'Badajoz'),
(7, 'Balears, Illes'),
(8, 'Barcelona'),
(48, 'Bizkaia'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(39, 'Cantabria'),
(12, 'Castellón/Castelló'),
(51, 'Ceuta'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'Coruña, A'),
(16, 'Cuenca'),
(20, 'Gipuzkoa'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(27, 'Lugo'),
(25, 'Lleida'),
(28, 'Madrid'),
(29, 'Málaga'),
(52, 'Melilla'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(34, 'Palencia'),
(35, 'Palmas, Las'),
(36, 'Pontevedra'),
(26, 'Rioja, La'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia/València'),
(47, 'Valladolid'),
(49, 'Zamora'),
(50, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_clase_nino`
--

CREATE TABLE `rel_clase_nino` (
  `idclase` int(11) NOT NULL,
  `idnino` int(11) NOT NULL,
  PRIMARY KEY (`idclase`,`idnino`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_clase_nino`
--

INSERT INTO `rel_clase_nino` (`idclase`, `idnino`) VALUES
(1, 2),
(1, 3),
(1, 8),
(1, 11),
(2, 4),
(2, 5),
(2, 9),
(3, 6),
(3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_clase_tutor`
--

CREATE TABLE `rel_clase_tutor` (
  `idclase` int(11) NOT NULL,
  `idtutor` int(11) NOT NULL,
  PRIMARY KEY (`idclase`,`idtutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_clase_tutor`
--

INSERT INTO `rel_clase_tutor` (`idclase`, `idtutor`) VALUES
(1, 7),
(2, 9),
(3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_empresa_guarderia`
--

CREATE TABLE `rel_empresa_guarderia` (
  `idempresa` int(11) NOT NULL,
  `idguarderia` int(11) NOT NULL,
  PRIMARY KEY (`idempresa`,`idguarderia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_empresa_guarderia`
--

INSERT INTO `rel_empresa_guarderia` (`idempresa`, `idguarderia`) VALUES
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_familiar_nino`
--

CREATE TABLE `rel_familiar_nino` (
  `idfamiliar` int(11) NOT NULL,
  `idnino` int(11) NOT NULL,
  PRIMARY KEY (`idfamiliar`,`idnino`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_familiar_nino`
--

INSERT INTO `rel_familiar_nino` (`idfamiliar`, `idnino`) VALUES
(0, 2),
(5, 2),
(5, 6),
(5, 8),
(5, 12),
(6, 3),
(6, 9),
(8, 4),
(8, 11),
(14, 5),
(17, 2),
(17, 6),
(17, 8),
(17, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_guarderia_clase`
--

CREATE TABLE `rel_guarderia_clase` (
  `idguarderia` int(11) NOT NULL,
  `idclase` int(11) NOT NULL,
  PRIMARY KEY (`idguarderia`,`idclase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_guarderia_clase`
--

INSERT INTO `rel_guarderia_clase` (`idguarderia`, `idclase`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_guarderia_familiar`
--

CREATE TABLE `rel_guarderia_familiar` (
  `idguarderia` int(11) NOT NULL,
  `idfamiliar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_guarderia_familiar`
--

INSERT INTO `rel_guarderia_familiar` (`idguarderia`, `idfamiliar`) VALUES
(2, 5),
(2, 6),
(2, 8),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_guarderia_nino`
--

CREATE TABLE `rel_guarderia_nino` (
  `idguarderia` int(11) NOT NULL,
  `idnino` int(11) NOT NULL,
  PRIMARY KEY (`idguarderia`,`idnino`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_guarderia_nino`
--

INSERT INTO `rel_guarderia_nino` (`idguarderia`, `idnino`) VALUES
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 8),
(2, 9),
(2, 11),
(2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_guarderia_tutor`
--

CREATE TABLE `rel_guarderia_tutor` (
  `idguarderia` int(11) NOT NULL,
  `idtutor` int(11) NOT NULL,
  PRIMARY KEY (`idguarderia`,`idtutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_guarderia_tutor`
--

INSERT INTO `rel_guarderia_tutor` (`idguarderia`, `idtutor`) VALUES
(1, 4),
(2, 7),
(2, 9),
(2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Familiar'),
(3, 'Tutor'),
(4, 'Director'),
(5, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `pass`, `fechanacimiento`, `imagen`, `sexo`, `rol`) VALUES
(1, 'administrador', 'pagina', 'admin@admin.es', 'e10adc3949ba59abbe56e057f20f883e', '1978-01-17', '', 'h', 1),
(2, 'Gerente', 'primero', 'gerente@gerente.es', 'e10adc3949ba59abbe56e057f20f883e', '1985-06-12', '', 'h', 5),
(3, 'Directora', 'segunda', 'director@director.es', 'e10adc3949ba59abbe56e057f20f883e', '1984-11-16', '2013-02-07_12.14_.56_.jpg', 'm', 4),
(4, 'tutor 1', 'guarderia1', 'tutor1@tutor1.es', 'e10adc3949ba59abbe56e057f20f883e', '2013-12-05', '', 'h', 3),
(5, 'Florindo', 'López', 'flori_89_ld@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1989-07-01', 'nino.png', 'h', 2),
(6, 'Antonio', 'Franco', 'cotorra_112@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-12-25', 'Emilio_Rocio.jpg', 'h', 2),
(7, 'Charo', 'Molina Medel', 'charo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1989-07-22', '', 'm', 3),
(8, 'Andrea', 'Sanchez Martín', 'andrea@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-02-01', '', 'm', 2),
(9, 'Tutor', 'de prueba', 'tutor@prueba.es', 'e10adc3949ba59abbe56e057f20f883e', '1987-06-10', '', 'h', 3),
(10, 'Gerente', 'catorce', 'catorce@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-02-12', '', 'h', 5),
(14, 'Jose carlos', 'Mateo', 'mateo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'h', 2),
(15, 'Don Manuel', 'Ibañez', 'coco@coco.es', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'h', 3),
(17, 'Mujer', 'de Flori', 'florindo.lopez@maxline.es', 'e10adc3949ba59abbe56e057f20f883e', '1987-07-01', '', 'm', 2),
(18, 'Don Peter', 'Panes', 'director2@director.es', 'e10adc3949ba59abbe56e057f20f883e', '1981-12-01', 'IMAG15985.jpg', 'h', 4);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`guarderia`) REFERENCES `guarderias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`gerente`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `guarderias`
--
ALTER TABLE `guarderias`
  ADD CONSTRAINT `guarderias_ibfk_1` FOREIGN KEY (`director`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
