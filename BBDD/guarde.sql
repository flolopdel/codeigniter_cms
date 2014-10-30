-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-12-2013 a las 13:28:39
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
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `guarderia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guarderia` (`guarderia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `nombre`, `descripcion`, `guarderia`) VALUES
(1, '5 años', 'Clases de niños de 5 años', 2),
(2, '4 años', 'Niños de 4 años', 2);

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
  PRIMARY KEY (`id`),
  KEY `director` (`director`),
  KEY `provincia` (`provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `guarderias`
--

INSERT INTO `guarderias` (`id`, `nombre`, `contacto`, `director`, `provincia`) VALUES
(1, 'ToyStory', 'c/ velarde, nº15 albaida del aljarafe', NULL, 41),
(2, 'Gurdekidsco', '12312312312312', 3, 2),
(3, 'Gurdelibre', '12312312312312', NULL, 2),
(4, 'sadasdsadas', '123123123123', NULL, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id`, `nombre`, `apellidos`, `fechanacimiento`, `imagen`, `sexo`) VALUES
(2, 'Florindito', 'López', NULL, '', 'h'),
(3, 'Maria', 'Franco', NULL, '', 'm'),
(4, 'Carlos', 'Perez Martin', NULL, '', 'm');

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
(1, 3);

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
(1, 7);

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
(5, 2),
(6, 3),
(8, 4);

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
(2, 1);

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
(2, 13);

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
(2, 4);

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
(2, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `pass`, `fechanacimiento`, `imagen`, `sexo`, `rol`) VALUES
(1, 'administrador', 'pagina', 'admin@admin.es', 'e10adc3949ba59abbe56e057f20f883e', '1978-01-17', '', 'h', 1),
(2, 'Gerente', 'primero', 'gerente@gerente.es', 'e10adc3949ba59abbe56e057f20f883e', '1985-06-12', '', 'h', 5),
(3, 'Directora', 'segunda', 'director@director.es', 'e10adc3949ba59abbe56e057f20f883e', '1984-11-16', '2013-02-07_12.14_.56_.jpg', 'm', 4),
(4, 'tutor 1', 'guarderia1', 'tutor1@tutor1.es', 'e10adc3949ba59abbe56e057f20f883e', '2013-12-05', '', 'h', 3),
(5, 'Florindo', 'López', 'flori_89_ld@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1989-07-01', 'nino.png', 'h', 2),
(6, 'Antonio', 'Franco', 'cotorra_112@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-12-25', '', 'h', 2),
(7, 'Charo', 'Molina Medel', 'charo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1989-07-22', '', 'm', 3),
(8, 'Andrea', 'Sanchez Martín', 'andrea@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-02-01', '', 'm', 2),
(9, 'Tutor', 'de prueba', 'tutor@prueba.es', 'e10adc3949ba59abbe56e057f20f883e', '1987-06-10', '', 'h', 3),
(10, 'Gerente', 'catorce', 'catorce@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-02-12', '', 'h', 5),
(13, 'Florindo', 'López Delgado', 'flori_89_ld@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'h', 2);

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
