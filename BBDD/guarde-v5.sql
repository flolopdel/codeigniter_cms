-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-02-2014 a las 10:44:34
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
  `pipi` varchar(128) DEFAULT NULL,
  `caca` varchar(128) DEFAULT NULL,
  `panales` varchar(128) DEFAULT NULL,
  `actitud` varchar(128) DEFAULT NULL,
  `relaciones` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `fecha`, `informacion`, `nino`, `publicadopor`, `tipo`, `valoracion`, `descanso`, `tiempodescanso`, `deposiciones`, `deposicionesinfo`, `medicacion`, `dosis`, `alimentacion`, `recogida`, `lectivo`, `ludico`, `salud`, `pipi`, `caca`, `panales`, `actitud`, `relaciones`) VALUES
(1, '2014-01-09', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(2, '2014-01-03', '', 2, 5, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(3, '2014-01-04', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(4, '2014-01-16', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(5, '2014-01-02', 'otra cosa mas', 2, 17, 2, 1, 'Bien', '1', NULL, NULL, 'algo', '3', NULL, 'Mujer de Flori', NULL, NULL, 'Resfriado', NULL, NULL, NULL, NULL, NULL),
(6, '2014-01-16', '', 2, 7, 3, 4, 'Bien', '', 'Orina', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(7, '2014-01-10', '', 2, 7, 3, 3, 'Regular', '', '', 'No ha realizado nada', NULL, NULL, 'Lo estipulado para hoy', NULL, 'Números', 'Canción de un elefante se balanceaba', 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(8, '2014-01-11', 'Todo bien', 2, 5, 2, 4, 'Bien', '7', NULL, NULL, 'Dalsi', '3 al día', NULL, 'Antonio el cotorra', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(9, '2014-01-08', 'asdasdas', 2, 5, 2, 3, 'Bien', '7', NULL, NULL, 'aasdasdasd', 'asdasd', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(10, '2014-01-10', 'asdasdas', 2, 5, 2, 4, 'Bien', '', NULL, NULL, 'aasdasdasd', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(11, '2014-01-17', 'No duerme bien', 2, 5, 2, 5, 'Regular', '5', NULL, NULL, 'Dalsi', '4 al dia', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(12, '2014-01-17', '', 2, 7, 3, 3, 'Bien', '', 'Ambos', '', NULL, NULL, 'normal', NULL, 'colores', 'el coro de la patata', 'Bien', NULL, NULL, NULL, NULL, NULL),
(13, '2014-01-20', '', 3, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(14, '2014-01-03', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(15, '2014-01-20', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, 'Normal', NULL, 'Colores', 'Canción de un elefante se balanceaba', 'Bien', NULL, NULL, NULL, NULL, NULL),
(16, '2014-01-20', '', 2, 5, 2, 3, 'Regular', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(17, '2014-01-21', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(18, '2014-01-21', '', 3, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(19, '2014-01-15', 'Participa en clase', 2, 7, 3, 5, 'Bien', '15', 'Ambos', 'Normal', NULL, NULL, 'Correcta', NULL, 'Colores', 'Canción de un elefante se balanceaba', 'Bien', NULL, NULL, NULL, NULL, NULL),
(20, '2014-01-08', 'Participa en clase', 3, 7, 3, 4, 'Bien', '15', 'Ambos', 'Normal', NULL, NULL, 'Correcta', NULL, 'Números', 'Canción de un elefante se balanceaba', 'Bien', NULL, NULL, NULL, NULL, NULL),
(21, '2014-01-07', '', 2, 17, 2, 3, 'Regular', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(22, '2014-01-02', 'asdasdasd', 2, 7, 3, 1, 'Bien', '1', '', '', 'aasdasd', 'asdasd', 'sadsad', 'asdasdas', 'asdasd', 'asdasd', 'Bien', NULL, NULL, NULL, NULL, NULL),
(23, '2014-01-29', '', 2, 5, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(24, '2014-01-18', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(25, '2014-01-22', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(26, '2014-01-01', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(27, '2014-01-29', '', 8, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(28, '2014-01-15', '', 8, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(29, '2014-01-14', '', 8, 17, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(30, '2014-01-10', '', 8, 17, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(31, '2014-01-30', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, 'asdasda', NULL, 'sadasda', 'asdasdasdas', 'Bien', NULL, NULL, NULL, NULL, NULL),
(32, '2014-01-30', '', 3, 7, 3, 4, 'Bien', '10', '', 'bien', NULL, NULL, '', NULL, 'abecedario', 'coro de las patatas', 'Bien', NULL, NULL, NULL, NULL, NULL),
(33, '2014-01-15', '', 8, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(34, '2014-01-30', '', 2, 17, 2, 3, 'Bien', '12', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(35, '2014-01-14', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, 'asdasdas', NULL, 'asadasdasd', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(36, '2014-01-14', '', 2, 17, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(37, '2014-01-06', '', 2, 5, 2, 5, 'Bien', '10', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(38, '2014-01-06', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(39, '2014-02-04', '', 2, 7, 3, 3, 'Bien', '', 'Orina', 'demasiado', NULL, NULL, '', NULL, 'ahi va', 'alome', 'Bien', NULL, NULL, NULL, NULL, NULL),
(40, '2014-02-04', 'otros datos más', 2, 5, 2, 4, 'Mal', '2', NULL, NULL, 'Dalsi', '3 al día', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(41, '2014-02-05', '', 2, 5, 2, 1, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL),
(42, '2014-02-05', '', 2, 7, 3, 4, 'Bien', '', 'Heces', 'asdasd', NULL, NULL, 'asdasd', NULL, '', 'SASADAS', 'Bien', NULL, NULL, NULL, NULL, NULL),
(45, '2014-02-12', '', 2, 7, 3, 1, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(46, '2014-02-12', '', 3, 7, 3, 1, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(47, '2014-02-12', '', 11, 7, 3, 1, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(48, '2014-02-13', '', 2, 7, 3, 1, '30', NULL, 'Heces', '3 veces', NULL, NULL, 'Poco', NULL, '', 'Caballitos', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(49, '2014-02-13', '', 3, 7, 3, 4, '30', '', 'Heces', '3 veces', NULL, NULL, 'Poco', NULL, 'Colores', '', 'Bien', '4', '4', '4', 'Buena', 'Bien'),
(50, '2014-02-13', '', 8, 7, 3, 4, '30', '', 'Heces', '3 veces', NULL, NULL, 'Poco', NULL, 'Colores', '', 'Bien', '4', '4', '4', 'Buena', 'Bien'),
(51, '2014-02-13', '', 11, 7, 3, 2, '30', '', 'Heces', '3 veces', NULL, NULL, 'Poco', NULL, 'Colores', '', 'Bien', '4', '4', '4', 'Buena', 'Bien'),
(56, '2014-02-13', '', 6, 15, 3, 5, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(57, '2014-02-13', '', 12, 15, 3, 5, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL),
(58, '2014-02-01', '', 2, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '2', '2', '2', 'Buena', 'Bien'),
(59, '2014-02-14', '', 2, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(60, '2014-02-14', '', 3, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(61, '2014-02-14', '', 8, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(62, '2014-02-14', '', 11, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(63, '2014-02-01', '', 2, 5, 2, 4, 'Bien', NULL, NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL),
(64, '2014-02-19', '', 2, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(65, '2014-02-19', '', 3, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(66, '2014-02-19', '', 8, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(67, '2014-02-19', '', 11, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(68, '2014-02-19', '', 6, 15, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(69, '2014-02-19', '', 12, 15, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien'),
(70, '2014-02-20', '', 6, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '1', '1', '1', 'Buena', 'Bien'),
(71, '2014-02-20', '', 12, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '1', '1', '1', 'Buena', 'Bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendamasiva`
--

CREATE TABLE `agendamasiva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclase` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idclase` (`idclase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `agendamasiva`
--

INSERT INTO `agendamasiva` (`id`, `idclase`, `fecha`) VALUES
(1, 1, '2014-02-12'),
(3, 3, '2014-02-13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`, `descripcion`, `guarderia`) VALUES
(1, '5 años', 'Clases de niños de 5 años', 2),
(2, '4 años', 'Niños de 4 años', 2),
(3, '7 años', 'Una clase entretenida', 2),
(4, 'Cuatro años', '', 7);

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
('5', 'pan_3.jpg', NULL, NULL, NULL, NULL),
('6', NULL, NULL, NULL, NULL, NULL),
('7', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `razonsocial`, `cif`, `contacto`, `gerente`, `provincia`) VALUES
(2, 'Kidsco', 'Empresa', '41809', 'C/ Sevilla, Albaida del Aljarafe', 2, 41),
(3, 'Empresa de prueba', 'empresa', '', 'sevilla', NULL, 41),
(4, 'Prueba fallos', 'fallos', '', 'fallos', NULL, 2),
(5, 'Prueba catorce', 'catorce', '', 'catorce', 10, 2),
(6, 'Empresa desde movil', 'empresa movil', '12331231', 'calle movil', 19, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios`
--

CREATE TABLE `formularios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclase` int(11) NOT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `alimentacion` int(1) DEFAULT NULL,
  `salud` int(1) DEFAULT NULL,
  `pipi` int(1) DEFAULT NULL,
  `caca` int(1) DEFAULT NULL,
  `panales` int(1) DEFAULT NULL,
  `actitud` int(1) DEFAULT NULL,
  `ludico` int(1) DEFAULT NULL,
  `lectivo` int(1) DEFAULT NULL,
  `relaciones` int(1) DEFAULT NULL,
  `descanso` int(1) DEFAULT NULL,
  `informacion` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `formularios`
--

INSERT INTO `formularios` (`id`, `idclase`, `valoracion`, `alimentacion`, `salud`, `pipi`, `caca`, `panales`, `actitud`, `ludico`, `lectivo`, `relaciones`, `descanso`, `informacion`) VALUES
(2, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1),
(3, 3, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `guarderias`
--

INSERT INTO `guarderias` (`id`, `nombre`, `contacto`, `director`, `provincia`, `url`) VALUES
(1, 'ToyStory', 'c/ velarde, nº15 albaida del aljarafe', NULL, 41, NULL),
(2, 'Gurdekidsco', '12312312312312', 3, 2, 'guardekidsco'),
(3, 'Gurdelibre', '12312312312312', NULL, 2, NULL),
(4, 'sadasdsadas', '123123123123', NULL, 5, NULL),
(5, 'Peter Pan', '', 18, 2, 'PeterPan'),
(6, 'Guarde desde el movil', '', NULL, 2, 'Guardedesdeelmovil'),
(7, 'empresa2 movil', '', 20, 2, 'empresa2movil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp`
--

CREATE TABLE `mp` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `emisor` varchar(30) NOT NULL,
  `receptor` varchar(30) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `leido` mediumint(2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `ip` varchar(10) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `tipo` varchar(56) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `mp`
--

INSERT INTO `mp` (`id`, `emisor`, `receptor`, `mensaje`, `leido`, `fecha`, `hora`, `ip`, `padre`, `tipo`) VALUES
(1, '7', '5', 'Hola flori', 1, '2014-02-17', '12:15:00', NULL, 0, '1'),
(2, '5', '7', 'asdasadsadasd', 1, '2014-02-17', '12:19:00', NULL, 0, '1'),
(3, '5', '7', 'Hola tuuuu', 1, '2014-02-17', '12:20:00', NULL, 0, '1'),
(5, '7', '5', 'Hola', 1, '2014-02-17', '11:16:00', NULL, 0, '1'),
(6, '7', '5', 'Que tal?', 1, '2014-02-17', '11:25:00', NULL, 0, '1'),
(7, '7', '5', 'Ya ves', 1, '2014-02-10', '11:25:00', NULL, 0, '1'),
(8, '5', '7', 'adios', 1, '2014-02-10', '11:05:00', NULL, 0, '1'),
(9, '5', '7', 'eyyy\n', 1, '2014-02-10', '01:15:00', NULL, 0, '1'),
(10, '5', '7', 'ajaaa', 1, '2014-02-17', '11:15:00', NULL, 0, '1'),
(11, '7', '5', 'hola', 1, '2014-02-17', '13:05:10', NULL, 0, '1'),
(12, '7', '5', 'hola', 1, '2014-02-17', '11:10:00', NULL, 0, '1'),
(13, '7', '5', 'hola', 1, '2014-02-17', '11:15:30', NULL, 0, '1'),
(14, '7', '5', 'adiós', 1, '2014-02-17', '21:45:00', NULL, 0, '1'),
(15, '5', '7', 'hola tu', 1, '2014-02-17', '21:46:00', NULL, 0, '1'),
(16, '7', '6', 'Que pasa coto??', 1, '2014-02-18', '10:44:24', NULL, 0, '1'),
(17, '6', '7', 'Ya ves charito', 1, '2014-02-18', '10:45:30', NULL, 0, '1'),
(18, '7', '5', 'Hola', 1, '2014-02-18', '11:08:35', NULL, 0, '1'),
(19, '7', '8', 'Hola Andrea', 1, '2014-02-18', '11:19:17', NULL, 0, '1'),
(21, '8', '7', 'Hola Charooooo', 1, '2014-02-18', '11:43:03', NULL, 0, '1'),
(22, '8', '5', 'Hola flori', 1, '2014-02-18', '11:44:08', NULL, 0, '1'),
(23, '5', '7', 'Que tal', 1, '2014-02-18', '12:07:23', NULL, 0, '1'),
(24, '5', '7', 'eoooo', 1, '2014-02-18', '13:08:04', NULL, 0, '1'),
(25, '5', '7', 'Hola', 1, '2014-02-18', '17:36:07', NULL, 0, '1'),
(26, '5', '7', 'que tal?', 1, '2014-02-18', '18:30:35', NULL, 0, '1'),
(27, '5', '7', 'ese pucheeeee', 1, '2014-02-18', '18:30:55', NULL, 0, '1'),
(28, '7', '6', 'hola', 1, '2014-02-19', '08:45:09', NULL, 0, '1'),
(29, '5', '7', 'Holaaaa', 1, '2014-02-19', '09:19:30', NULL, 0, '1'),
(30, '15', '7', 'hola charo', 1, '2014-02-19', '09:43:17', NULL, 0, '1'),
(31, '7', '5', 'charooo', 1, '2014-02-19', '11:15:41', NULL, 0, '1'),
(32, '5', '7', 'Que tal??', 1, '2014-02-19', '11:16:48', NULL, 0, '1'),
(33, '7', '15', 'que tal?', 1, '2014-02-19', '11:23:32', NULL, 0, '1'),
(34, '7', '5', 'hola', 1, '2014-02-19', '11:58:25', NULL, 0, '1'),
(35, '5', '7', 'Ahí va', 1, '2014-02-19', '12:08:23', NULL, 0, '1'),
(36, '7', '5', 'Hola flori', 1, '2014-02-19', '17:09:16', NULL, 0, '1');

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
  `tipo` int(11) NOT NULL DEFAULT '1',
  `tipo2` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`),
  KEY `tipo2` (`tipo2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id`, `nombre`, `apellidos`, `fechanacimiento`, `imagen`, `sexo`, `tipo`, `tipo2`) VALUES
(2, 'Florindo', 'López', '0000-00-00', '', 'h', 1, 0),
(3, 'Maria', 'Franco', '0000-00-00', '', 'm', 3, 0),
(4, 'Carlos', 'Perez Martin', NULL, '', 'm', 2, 0),
(5, 'Joselito', 'Mateo', NULL, '', 'h', 2, 0),
(6, 'Nuevo', 'niño', NULL, '', 'h', 2, 0),
(8, 'niña 4', 'la cuarta', '0000-00-00', '', 'm', 4, 0),
(9, 'otro niño', 'de prueba', NULL, '', 'h', 4, 0),
(11, 'Martín', 'modesto', '2006-12-01', '', 'h', 2, 0),
(12, 'joselito', 'caballero', '2008-12-01', '', 'h', 3, 0),
(13, 'nino', 'movil', '0000-00-00', '', 'h', 3, 0),
(14, 'otro', 'movil', '0000-00-00', '', 'h', 3, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `destino_id`, `autor_id`, `objetivo_id`, `tipo`, `vista`, `fecha`, `year`, `mon`, `day`) VALUES
(1, 6, 7, 28, 6, 0, '2014-02-19 08:45:09', '2014', '02', '19'),
(2, 5, 7, 2, 1, 1, '2014-02-19 08:45:40', '2014', '02', '19'),
(3, 17, 7, 2, 1, 0, '2014-02-19 08:45:40', '2014', '02', '19'),
(4, 6, 7, 3, 1, 0, '2014-02-19 08:45:40', '2014', '02', '19'),
(5, 5, 7, 8, 1, 1, '2014-02-19 08:45:40', '2014', '02', '19'),
(6, 17, 7, 8, 1, 0, '2014-02-19 08:45:40', '2014', '02', '19'),
(7, 8, 7, 11, 1, 0, '2014-02-19 08:45:40', '2014', '02', '19'),
(8, 7, 5, 29, 6, 0, '2014-02-19 09:19:30', '2014', '02', '19'),
(9, 7, 15, 30, 6, 0, '2014-02-19 09:43:17', '2014', '02', '19'),
(10, 5, 15, 6, 1, 1, '2014-02-19 11:31:34', '2014', '02', '19'),
(11, 17, 15, 6, 1, 0, '2014-02-19 11:31:34', '2014', '02', '19'),
(12, 5, 15, 12, 1, 1, '2014-02-19 11:31:34', '2014', '02', '19'),
(13, 17, 15, 12, 1, 0, '2014-02-19 11:31:34', '2014', '02', '19'),
(14, 5, 7, 2, 2, 0, '2014-02-19 19:02:40', '2014', '02', '19'),
(15, 17, 7, 2, 2, 0, '2014-02-19 19:02:40', '2014', '02', '19'),
(16, 6, 7, 3, 2, 0, '2014-02-19 19:02:40', '2014', '02', '19'),
(17, 5, 7, 8, 2, 0, '2014-02-19 19:02:40', '2014', '02', '19'),
(18, 17, 7, 8, 2, 0, '2014-02-19 19:02:40', '2014', '02', '19'),
(19, 8, 7, 11, 2, 0, '2014-02-19 19:02:40', '2014', '02', '19'),
(20, 5, 7, 2, 2, 0, '2014-02-19 19:04:43', '2014', '02', '19'),
(21, 17, 7, 2, 2, 0, '2014-02-19 19:04:43', '2014', '02', '19'),
(22, 6, 7, 3, 2, 0, '2014-02-19 19:04:43', '2014', '02', '19'),
(23, 5, 7, 8, 2, 0, '2014-02-19 19:04:43', '2014', '02', '19'),
(24, 17, 7, 8, 2, 0, '2014-02-19 19:04:43', '2014', '02', '19'),
(25, 8, 7, 11, 2, 0, '2014-02-19 19:04:43', '2014', '02', '19'),
(26, 5, 7, 2, 2, 0, '2014-02-19 19:06:19', '2014', '02', '19'),
(27, 17, 7, 2, 2, 0, '2014-02-19 19:06:19', '2014', '02', '19'),
(28, 6, 7, 3, 2, 0, '2014-02-19 19:06:19', '2014', '02', '19'),
(29, 5, 7, 8, 2, 0, '2014-02-19 19:06:19', '2014', '02', '19'),
(30, 17, 7, 8, 2, 0, '2014-02-19 19:06:19', '2014', '02', '19'),
(31, 8, 7, 11, 2, 0, '2014-02-19 19:06:19', '2014', '02', '19'),
(32, 5, 7, 2, 2, 0, '2014-02-19 19:07:07', '2014', '02', '19'),
(33, 17, 7, 2, 2, 0, '2014-02-19 19:07:07', '2014', '02', '19'),
(34, 6, 7, 3, 2, 0, '2014-02-19 19:07:07', '2014', '02', '19'),
(35, 5, 7, 8, 2, 0, '2014-02-19 19:07:07', '2014', '02', '19'),
(36, 17, 7, 8, 2, 0, '2014-02-19 19:07:07', '2014', '02', '19'),
(37, 8, 7, 11, 2, 0, '2014-02-19 19:07:07', '2014', '02', '19'),
(38, 5, 7, 2, 2, 0, '2014-02-19 19:08:06', '2014', '02', '19'),
(39, 17, 7, 2, 2, 0, '2014-02-19 19:08:06', '2014', '02', '19'),
(40, 6, 7, 3, 2, 0, '2014-02-19 19:08:06', '2014', '02', '19'),
(41, 5, 7, 8, 2, 0, '2014-02-19 19:08:06', '2014', '02', '19'),
(42, 17, 7, 8, 2, 0, '2014-02-19 19:08:06', '2014', '02', '19'),
(43, 8, 7, 11, 2, 0, '2014-02-19 19:08:06', '2014', '02', '19'),
(44, 5, 7, 2, 2, 0, '2014-02-19 19:10:49', '2014', '02', '19'),
(45, 17, 7, 2, 2, 0, '2014-02-19 19:10:49', '2014', '02', '19'),
(46, 6, 7, 3, 2, 0, '2014-02-19 19:10:50', '2014', '02', '19'),
(47, 5, 7, 8, 2, 0, '2014-02-19 19:10:50', '2014', '02', '19'),
(48, 17, 7, 8, 2, 0, '2014-02-19 19:10:50', '2014', '02', '19'),
(49, 8, 7, 11, 2, 0, '2014-02-19 19:10:50', '2014', '02', '19'),
(50, 5, 15, 6, 1, 0, '2014-02-20 10:42:54', '2014', '02', '20'),
(51, 17, 15, 6, 1, 0, '2014-02-20 10:42:54', '2014', '02', '20'),
(52, 5, 15, 12, 1, 0, '2014-02-20 10:42:54', '2014', '02', '20'),
(53, 17, 15, 12, 1, 0, '2014-02-20 10:42:54', '2014', '02', '20');

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
(3, 15),
(4, 22);

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
(2, 4),
(6, 7);

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
(17, 12),
(21, 13),
(21, 14);

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
(2, 2),
(7, 4);

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
(2, 17),
(7, 21);

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
(2, 12),
(7, 13),
(7, 14);

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
(2, 15),
(7, 22);

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
-- Estructura de tabla para la tabla `tiponino`
--

CREATE TABLE `tiponino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tiponino`
--

INSERT INTO `tiponino` (`id`, `descripcion`) VALUES
(1, 'Mañana'),
(2, 'Mañana y Tarde'),
(3, 'Mañana y Tarde con comida'),
(4, 'Tarde');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(18, 'Don Peter', 'Panes', 'director2@director.es', 'e10adc3949ba59abbe56e057f20f883e', '1981-12-01', 'IMAG15985.jpg', 'h', 4),
(19, 'Gerente ', 'desde movil', 'gmovil@gmovil.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'm', 5),
(20, 'director', 'movil', 'dmovil@dmovil.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'm', 4),
(21, 'Familiar', 'Guarde', 'fmovil@fmovil.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'm', 2),
(22, 'Tutor', 'Movil', 'tmovil@tmovil.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'h', 3);

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
-- Filtros para la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD CONSTRAINT `ninos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tiponino` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
