-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Servidor: db507181042.db.1and1.com
-- Tiempo de generación: 17-02-2014 a las 09:49:42
-- Versión del servidor: 5.1.73
-- Versión de PHP: 5.3.3-7+squeeze18
-- 
-- Base de datos: `db507181042`
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

-- 
-- Volcar la base de datos para la tabla `agenda`
-- 

INSERT INTO `agenda` VALUES (1, '2014-01-09', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (2, '2014-01-03', '', 2, 5, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (3, '2014-01-04', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (4, '2014-01-16', '', 2, 5, 2, 3, 'Bien', '4', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (5, '2014-01-02', 'otra cosa mas', 2, 17, 2, 1, 'Bien', '1', NULL, NULL, 'algo', '3', NULL, 'Mujer de Flori', NULL, NULL, 'Resfriado', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (6, '2014-01-16', '', 2, 7, 3, 4, 'Bien', '', 'Orina', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (7, '2014-01-10', '', 2, 7, 3, 3, 'Regular', '', '', 'No ha realizado nada', NULL, NULL, 'Lo estipulado para hoy', NULL, 'Números', 'Canción de un elefante se balanceaba', 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (8, '2014-01-11', 'Todo bien', 2, 5, 2, 4, 'Bien', '7', NULL, NULL, 'Dalsi', '3 al día', NULL, 'Antonio el cotorra', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (9, '2014-01-08', 'asdasdas', 2, 5, 2, 3, 'Bien', '7', NULL, NULL, 'aasdasdasd', 'asdasd', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (10, '2014-01-10', 'asdasdas', 2, 5, 2, 4, 'Bien', '', NULL, NULL, 'aasdasdasd', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (11, '2014-01-17', 'No duerme bien', 2, 5, 2, 5, 'Regular', '5', NULL, NULL, 'Dalsi', '4 al dia', NULL, 'Florindo López', NULL, NULL, 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (12, '2014-01-17', '', 2, 7, 3, 3, 'Bien', '', 'Ambos', '', NULL, NULL, 'normal', NULL, 'colores', 'el coro de la patata', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (13, '2014-01-20', '', 3, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (14, '2014-01-03', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (15, '2014-01-20', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, 'Normal', NULL, 'Colores', 'Canción de un elefante se balanceaba', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (16, '2014-01-20', '', 2, 5, 2, 3, 'Regular', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (17, '2014-01-21', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (18, '2014-01-21', '', 3, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (19, '2014-01-15', 'Participa en clase', 2, 7, 3, 5, 'Bien', '15', 'Ambos', 'Normal', NULL, NULL, 'Correcta', NULL, 'Colores', 'Canción de un elefante se balanceaba', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (20, '2014-01-08', 'Participa en clase', 3, 7, 3, 4, 'Bien', '15', 'Ambos', 'Normal', NULL, NULL, 'Correcta', NULL, 'Números', 'Canción de un elefante se balanceaba', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (21, '2014-01-07', '', 2, 17, 2, 3, 'Regular', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (22, '2014-01-02', 'asdasdasd', 2, 7, 3, 1, 'Bien', '1', '', '', 'aasdasd', 'asdasd', 'sadsad', 'asdasdas', 'asdasd', 'asdasd', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (23, '2014-01-29', 'Eso', 2, 5, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (24, '2014-01-18', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (25, '2014-01-22', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (26, '2014-01-01', '', 2, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (27, '2014-01-29', '', 8, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (28, '2014-01-15', '', 8, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (29, '2014-01-14', '', 8, 17, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (30, '2014-01-10', '', 8, 17, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (31, '2014-01-30', '', 2, 7, 3, 3, 'Bien', '', '', '', NULL, NULL, 'asdasda', NULL, 'sadasda', 'asdasdasdas', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (32, '2014-01-30', '', 3, 7, 3, 4, 'Bien', '10', '', 'bien', NULL, NULL, '', NULL, 'abecedario', 'coro de las patatas', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (33, '2014-01-15', '', 8, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (34, '2014-01-30', '', 2, 17, 2, 3, 'Bien', '12', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (35, '2014-01-14', '', 2, 7, 3, 3, 'Bien', '', 'Orina', '3', NULL, NULL, 'asdasdas', NULL, 'asadasdasd', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (36, '2014-01-14', '', 2, 17, 2, 4, 'Bien', '', NULL, NULL, '', '', NULL, 'Mujer de Flori', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (37, '2014-01-06', '', 2, 5, 2, 5, 'Bien', '10', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (38, '2014-01-06', '', 2, 7, 3, 4, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (39, '2014-02-01', '', 5, 14, 2, 4, 'Bien', '', NULL, NULL, 'Dalsy', '2', NULL, 'Jose carlos Mateo', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (40, '2014-02-01', '', 5, 9, 3, 2, 'Regular', '25', 'Orina', '3', NULL, NULL, '', NULL, '', '', 'Fiebre leve', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (41, '2014-02-03', '', 5, 14, 2, 4, 'Bien', '8', NULL, NULL, '', '', NULL, 'Jose carlos Mateo', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (42, '2014-02-04', '', 15, 24, 3, 3, 'Regular', '', 'Orina', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (43, '2014-02-04', '', 15, 27, 2, 5, 'Bien', '10', NULL, NULL, '', '', NULL, 'Marge Simpson', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (44, '2014-01-31', '', 15, 24, 3, 5, 'Bien', '75', 'Ambos', '', NULL, NULL, '', NULL, 'Colores fríos', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (45, '2014-01-31', '', 15, 27, 2, 3, 'Regular', '8', NULL, NULL, '', '', NULL, 'Marge Simpson', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (46, '2014-02-05', '', 15, 24, 3, 3, 'Bien', '80', 'Ambos', '', NULL, NULL, '', NULL, 'Colores cálidos', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (47, '2014-02-06', '', 15, 24, 3, 3, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (48, '2014-02-07', '', 6, 5, 2, 3, 'Bien', '', NULL, NULL, '', '', NULL, 'Florindo López', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (49, '2014-02-11', 'Hola holita!se ha tomado la medicacion en casa, le toca a las 15,gracias.', 21, 28, 2, 1, 'Bien', 'cada 8 horas', NULL, NULL, 'dalsy', '4cm', NULL, 'Nedd Flanders', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (50, '2014-02-06', 'Tiene diarrea', 15, 27, 2, 5, 'Regular', '', NULL, NULL, '2puff de seretide en l desayuno y rescate de ventolin si precisa', '', NULL, 'Marge Simpson', NULL, NULL, 'Resfriado', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (51, '2014-02-14', '', 8, 7, 3, 1, '30', '', NULL, NULL, '', '', 'Poco', 'Florindo López', '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (52, '2014-02-12', '', 21, 25, 3, 4, 'Bien', '60', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (53, '2014-02-12', '', 15, 24, 3, 3, 'Bien', '80', 'Orina', '', NULL, NULL, 'Nada', NULL, 'Colores', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (54, '2014-02-11', '', 15, 24, 3, 5, 'Bien', '90', '', '', NULL, NULL, 'Todo', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (55, '2014-02-12', '', 15, 27, 2, 3, 'Bien', '', NULL, NULL, 'aspirina', '2', NULL, 'Marge Simpson', NULL, NULL, 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (56, '2014-02-12', '', 0, 7, 3, 1, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (57, '2014-02-12', '', 2, 7, 3, 1, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (58, '2014-02-12', '', 3, 7, 3, 1, 'Bien', '', '', '', NULL, NULL, '', NULL, '', '', 'Bien', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `agenda` VALUES (59, '2014-02-14', '', 2, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (60, '2014-02-14', '', 3, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (61, '2014-02-14', '', 11, 7, 3, 1, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (62, '2014-02-14', '', 15, 24, 3, 3, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (63, '2014-02-14', '', 17, 24, 3, 3, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (64, '2014-02-14', '', 18, 24, 3, 3, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');
INSERT INTO `agenda` VALUES (65, '2014-02-14', '', 20, 24, 3, 3, '30', NULL, NULL, NULL, NULL, NULL, 'Poco', NULL, '', '', 'Bien', '1', '1', '1', 'Buena', 'Bien');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `clases`
-- 

INSERT INTO `clases` VALUES (1, '5 años', 'Clases de niños de 5 años', 2);
INSERT INTO `clases` VALUES (2, '4 años', 'Niños de 4 años', 2);
INSERT INTO `clases` VALUES (3, '7 años', 'Una clase entretenida', 2);
INSERT INTO `clases` VALUES (4, 'Familia Real', '', 6);
INSERT INTO `clases` VALUES (5, 'Cuarto Grado B', '', 7);
INSERT INTO `clases` VALUES (6, 'Segundo A', '', 7);

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
-- Volcar la base de datos para la tabla `diseno`
-- 

INSERT INTO `diseno` VALUES ('0', 'logo22.png', 'slider-1.jpg', 'slider-2.jpg', 'slider-3.jpg', NULL);
INSERT INTO `diseno` VALUES ('2', 'logo.png', NULL, NULL, NULL, NULL);
INSERT INTO `diseno` VALUES ('5', 'pan_3.jpg', NULL, NULL, NULL, NULL);
INSERT INTO `diseno` VALUES ('6', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `diseno` VALUES ('7', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `empresas`
-- 

INSERT INTO `empresas` VALUES (2, 'Kidsco', 'Empresa', '41809', 'C/ Sevilla, Albaida del Aljarafe', 2, 41);
INSERT INTO `empresas` VALUES (3, 'Empresa de prueba', 'empresa', '', 'sevilla', NULL, 41);
INSERT INTO `empresas` VALUES (4, 'Prueba fallos', 'fallos', '', 'fallos', NULL, 2);
INSERT INTO `empresas` VALUES (5, 'Prueba catorce', 'catorce', '', 'catorce', 10, 2);
INSERT INTO `empresas` VALUES (6, 'Burns S.L.', 'Central Nuclear', '', 'Castillo Mr. Burns', 22, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `guarderias`
-- 

INSERT INTO `guarderias` VALUES (1, 'ToyStory', 'c/ velarde, nº15 albaida del aljarafe', NULL, 41, NULL);
INSERT INTO `guarderias` VALUES (2, 'Gurdekidsco', '12312312312312', 3, 2, 'guardekidsco');
INSERT INTO `guarderias` VALUES (3, 'Gurdelibre', '12312312312312', NULL, 2, NULL);
INSERT INTO `guarderias` VALUES (4, 'sadasdsadas', '123123123123', NULL, 5, NULL);
INSERT INTO `guarderias` VALUES (5, 'Peter Pan', '', 18, 2, 'PeterPan');
INSERT INTO `guarderias` VALUES (6, 'Mi Guarderia', '', 19, 41, 'MiGuarderia');
INSERT INTO `guarderias` VALUES (7, 'Springfield School', 'Burns', 23, 2, 'SpringfieldSchool');

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
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `ninos`
-- 

INSERT INTO `ninos` VALUES (2, 'Florindito', 'López', NULL, '', 'h', 1);
INSERT INTO `ninos` VALUES (3, 'Maria', 'Franco', NULL, '', 'm', 1);
INSERT INTO `ninos` VALUES (4, 'Carlos', 'Perez Martin', NULL, '', 'm', 1);
INSERT INTO `ninos` VALUES (5, 'Joselito', 'Mateo', NULL, '', 'h', 1);
INSERT INTO `ninos` VALUES (6, 'Nuevo', 'niño', NULL, '', 'h', 1);
INSERT INTO `ninos` VALUES (8, 'niña 4', 'la cuarta', NULL, '', 'm', 1);
INSERT INTO `ninos` VALUES (9, 'otro niño', 'de prueba', NULL, '', 'h', 1);
INSERT INTO `ninos` VALUES (11, 'Martín', 'modesto', '2006-12-01', '', 'h', 1);
INSERT INTO `ninos` VALUES (12, 'joselito', 'caballero', '2008-12-01', '', 'h', 1);
INSERT INTO `ninos` VALUES (13, 'Froilan', 'Marichalar de Borbon', '0000-00-00', 'Froilan.jpg', 'h', 1);
INSERT INTO `ninos` VALUES (14, 'Victoria Federica', 'Marichalar de Borbon', '0000-00-00', 'Victoria_Federica.jpg', 'm', 1);
INSERT INTO `ninos` VALUES (15, 'Bart', 'Simpson', '0000-00-00', 'Bart.jpg', 'h', 1);
INSERT INTO `ninos` VALUES (16, 'Lisa', 'Simpson', '0000-00-00', 'Lisa.png', 'm', 1);
INSERT INTO `ninos` VALUES (17, 'Milhouse', 'Van Houten', '0000-00-00', 'Milhouse_Van_Houten.png', 'h', 1);
INSERT INTO `ninos` VALUES (18, 'Martin Jr', 'Prince', '0000-00-00', 'Martin_Prince.png', 'h', 1);
INSERT INTO `ninos` VALUES (19, 'Ralph', 'Wiggum', '0000-00-00', 'Ralph_Wiggum.png', 'h', 1);
INSERT INTO `ninos` VALUES (20, 'Rodd', 'Flanders', '0000-00-00', 'Rod_Flanders1.png', 'h', 1);
INSERT INTO `ninos` VALUES (21, 'Todd', 'Flanders', '0000-00-00', 'Todd_Flanders.png', 'h', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

-- 
-- Volcar la base de datos para la tabla `notificaciones`
-- 

INSERT INTO `notificaciones` VALUES (1, 17, 5, 8, 1, 1, '2014-01-29 19:01:44', '2014', '01', '15');
INSERT INTO `notificaciones` VALUES (2, 7, 5, 8, 1, 1, '2014-01-29 19:01:44', '2014', '01', '15');
INSERT INTO `notificaciones` VALUES (3, 5, 17, 8, 1, 1, '2014-01-29 19:01:10', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (4, 7, 17, 8, 1, 1, '2014-01-29 19:01:10', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (5, 5, 17, 8, 1, 1, '2014-01-29 19:01:15', '2014', '01', '10');
INSERT INTO `notificaciones` VALUES (6, 7, 17, 8, 1, 1, '2014-01-29 19:01:15', '2014', '01', '10');
INSERT INTO `notificaciones` VALUES (7, 5, 7, 2, 1, 1, '2014-01-30 09:01:34', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (8, 17, 7, 2, 1, 1, '2014-01-30 09:01:34', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (9, 7, 7, 2, 1, 1, '2014-01-30 09:01:34', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (10, 6, 7, 3, 1, 0, '2014-01-30 09:01:28', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (11, 7, 7, 3, 1, 1, '2014-01-30 09:01:28', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (12, 6, 7, 3, 2, 0, '2014-01-30 09:01:39', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (13, 7, 7, 3, 2, 1, '2014-01-30 09:01:39', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (14, 5, 7, 2, 2, 1, '2014-01-30 10:01:09', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (15, 17, 7, 2, 2, 1, '2014-01-30 10:01:09', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (16, 3, 8, 11, 3, 1, '2014-01-30 10:01:11', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (17, 8, 3, 11, 4, 0, '2014-01-30 11:01:01', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (18, 5, 7, 2, 2, 1, '2014-01-30 11:01:42', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (19, 17, 7, 2, 2, 1, '2014-01-30 11:01:42', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (20, 5, 7, 8, 1, 1, '2014-01-30 12:01:14', '2014', '01', '15');
INSERT INTO `notificaciones` VALUES (21, 17, 7, 8, 1, 1, '2014-01-30 12:01:14', '2014', '01', '15');
INSERT INTO `notificaciones` VALUES (22, 5, 17, 2, 1, 1, '2014-01-30 13:08:14', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (23, 7, 17, 2, 1, 1, '2014-01-30 13:08:14', '2014', '01', '30');
INSERT INTO `notificaciones` VALUES (24, 5, 7, 2, 1, 1, '2014-01-30 17:10:27', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (25, 17, 7, 2, 1, 1, '2014-01-30 17:10:27', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (26, 5, 7, 2, 2, 1, '2014-01-30 17:11:16', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (27, 17, 7, 2, 2, 1, '2014-01-30 17:11:16', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (28, 5, 17, 2, 1, 1, '2014-01-30 17:11:44', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (29, 7, 17, 2, 1, 1, '2014-01-30 17:11:44', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (30, 3, 17, 12, 3, 1, '2014-01-30 17:19:57', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (31, 5, 3, 12, 4, 1, '2014-01-30 17:21:02', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (32, 17, 3, 12, 4, 1, '2014-01-30 17:21:02', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (33, 17, 5, 2, 1, 0, '2014-01-30 19:29:05', '2014', '01', '06');
INSERT INTO `notificaciones` VALUES (34, 7, 5, 2, 1, 1, '2014-01-30 19:29:05', '2014', '01', '06');
INSERT INTO `notificaciones` VALUES (35, 5, 7, 2, 1, 1, '2014-01-30 19:29:32', '2014', '01', '06');
INSERT INTO `notificaciones` VALUES (36, 17, 7, 2, 1, 0, '2014-01-30 19:29:32', '2014', '01', '06');
INSERT INTO `notificaciones` VALUES (37, 9, 14, 5, 1, 1, '2014-02-01 21:06:12', '2014', '02', '01');
INSERT INTO `notificaciones` VALUES (38, 14, 9, 5, 1, 1, '2014-02-01 21:12:37', '2014', '02', '01');
INSERT INTO `notificaciones` VALUES (39, 9, 14, 5, 1, 1, '2014-02-01 21:43:55', '2014', '02', '03');
INSERT INTO `notificaciones` VALUES (40, 21, 19, 13, 4, 0, '2014-02-02 10:19:14', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (41, 21, 19, 14, 4, 0, '2014-02-02 10:23:09', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (42, 23, 27, 15, 3, 1, '2014-02-03 21:13:34', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (43, 23, 27, 16, 3, 1, '2014-02-03 21:15:40', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (44, 28, 23, 17, 4, 1, '2014-02-03 21:35:10', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (45, 31, 23, 18, 4, 0, '2014-02-03 21:35:10', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (46, 32, 23, 19, 4, 0, '2014-02-03 21:35:25', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (47, 28, 23, 20, 4, 1, '2014-02-03 21:40:35', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (48, 28, 23, 21, 4, 1, '2014-02-03 21:40:47', NULL, NULL, NULL);
INSERT INTO `notificaciones` VALUES (50, 26, 24, 15, 1, 0, '2014-02-05 15:54:46', '2014', '02', '04');
INSERT INTO `notificaciones` VALUES (51, 27, 24, 15, 1, 1, '2014-02-05 15:54:46', '2014', '02', '04');
INSERT INTO `notificaciones` VALUES (52, 26, 27, 15, 1, 0, '2014-02-05 15:58:59', '2014', '02', '04');
INSERT INTO `notificaciones` VALUES (53, 24, 27, 15, 1, 1, '2014-02-05 15:58:59', '2014', '02', '04');
INSERT INTO `notificaciones` VALUES (54, 26, 24, 15, 1, 0, '2014-02-05 16:35:47', '2014', '01', '31');
INSERT INTO `notificaciones` VALUES (55, 27, 24, 15, 1, 1, '2014-02-05 16:35:47', '2014', '01', '31');
INSERT INTO `notificaciones` VALUES (56, 26, 27, 15, 1, 0, '2014-02-05 16:39:21', '2014', '01', '31');
INSERT INTO `notificaciones` VALUES (57, 24, 27, 15, 1, 1, '2014-02-05 16:39:21', '2014', '01', '31');
INSERT INTO `notificaciones` VALUES (58, 26, 24, 15, 1, 0, '2014-02-05 17:45:42', '2014', '02', '05');
INSERT INTO `notificaciones` VALUES (59, 27, 24, 15, 1, 1, '2014-02-05 17:45:42', '2014', '02', '05');
INSERT INTO `notificaciones` VALUES (60, 17, 5, 2, 2, 0, '2014-02-05 18:18:24', '2014', '01', '29');
INSERT INTO `notificaciones` VALUES (61, 7, 5, 2, 2, 0, '2014-02-05 18:18:24', '2014', '01', '29');
INSERT INTO `notificaciones` VALUES (62, 26, 24, 15, 1, 0, '2014-02-06 14:08:29', '2014', '02', '06');
INSERT INTO `notificaciones` VALUES (63, 27, 24, 15, 1, 1, '2014-02-06 14:08:29', '2014', '02', '06');
INSERT INTO `notificaciones` VALUES (64, 17, 5, 2, 2, 0, '2014-02-06 23:39:06', '2014', '01', '16');
INSERT INTO `notificaciones` VALUES (65, 7, 5, 2, 2, 0, '2014-02-06 23:39:06', '2014', '01', '16');
INSERT INTO `notificaciones` VALUES (66, 17, 5, 2, 2, 0, '2014-02-07 10:05:48', '2014', '01', '16');
INSERT INTO `notificaciones` VALUES (67, 7, 5, 2, 2, 0, '2014-02-07 10:05:48', '2014', '01', '16');
INSERT INTO `notificaciones` VALUES (68, 17, 5, 6, 1, 0, '2014-02-07 23:31:55', '2014', '02', '07');
INSERT INTO `notificaciones` VALUES (69, 15, 5, 6, 1, 0, '2014-02-07 23:31:55', '2014', '02', '07');
INSERT INTO `notificaciones` VALUES (70, 25, 28, 21, 1, 1, '2014-02-11 13:51:34', '2014', '02', '11');
INSERT INTO `notificaciones` VALUES (71, 26, 27, 15, 1, 0, '2014-02-11 13:57:15', '2014', '02', '06');
INSERT INTO `notificaciones` VALUES (72, 24, 27, 15, 1, 1, '2014-02-11 13:57:15', '2014', '02', '06');
INSERT INTO `notificaciones` VALUES (73, 17, 5, 8, 1, 0, '2014-02-11 23:18:12', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (74, 7, 5, 8, 1, 0, '2014-02-11 23:18:12', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (75, 28, 25, 21, 1, 0, '2014-02-12 18:18:28', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (76, 26, 24, 15, 1, 0, '2014-02-12 18:30:34', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (77, 27, 24, 15, 1, 1, '2014-02-12 18:30:34', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (78, 26, 24, 15, 1, 0, '2014-02-12 19:04:58', '2014', '02', '11');
INSERT INTO `notificaciones` VALUES (79, 27, 24, 15, 1, 1, '2014-02-12 19:04:58', '2014', '02', '11');
INSERT INTO `notificaciones` VALUES (80, 26, 27, 15, 1, 0, '2014-02-12 20:23:14', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (81, 24, 27, 15, 1, 1, '2014-02-12 20:23:14', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (82, 5, 7, 2, 1, 0, '2014-02-12 21:59:28', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (83, 17, 7, 2, 1, 0, '2014-02-12 21:59:28', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (84, 6, 7, 3, 1, 0, '2014-02-12 21:59:28', '2014', '02', '12');
INSERT INTO `notificaciones` VALUES (85, 5, 7, 2, 2, 0, '2014-02-12 22:00:45', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (86, 17, 7, 2, 2, 0, '2014-02-12 22:00:45', '2014', '01', '14');
INSERT INTO `notificaciones` VALUES (87, 5, 7, 2, 1, 0, '2014-02-14 08:57:09', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (88, 17, 7, 2, 1, 0, '2014-02-14 08:57:09', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (89, 6, 7, 3, 1, 0, '2014-02-14 08:57:09', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (90, 5, 7, 8, 2, 0, '2014-02-14 08:57:09', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (91, 17, 7, 8, 2, 0, '2014-02-14 08:57:09', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (92, 5, 7, 2, 2, 0, '2014-02-14 09:06:27', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (93, 17, 7, 2, 2, 0, '2014-02-14 09:06:27', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (94, 6, 7, 3, 2, 0, '2014-02-14 09:06:27', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (95, 5, 7, 8, 2, 0, '2014-02-14 09:06:27', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (96, 17, 7, 8, 2, 0, '2014-02-14 09:06:27', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (97, 5, 7, 2, 2, 0, '2014-02-14 09:10:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (98, 17, 7, 2, 2, 0, '2014-02-14 09:10:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (99, 6, 7, 3, 2, 0, '2014-02-14 09:10:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (100, 5, 7, 8, 2, 0, '2014-02-14 09:10:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (101, 17, 7, 8, 2, 0, '2014-02-14 09:10:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (102, 5, 7, 2, 2, 0, '2014-02-14 09:45:38', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (103, 17, 7, 2, 2, 0, '2014-02-14 09:45:38', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (104, 6, 7, 3, 2, 0, '2014-02-14 09:45:38', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (105, 5, 7, 8, 2, 0, '2014-02-14 09:45:38', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (106, 17, 7, 8, 2, 0, '2014-02-14 09:45:38', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (107, 5, 7, 2, 2, 0, '2014-02-14 09:46:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (108, 17, 7, 2, 2, 0, '2014-02-14 09:46:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (109, 6, 7, 3, 2, 0, '2014-02-14 09:46:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (110, 5, 7, 8, 2, 0, '2014-02-14 09:46:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (111, 17, 7, 8, 2, 0, '2014-02-14 09:46:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (112, 8, 7, 11, 1, 0, '2014-02-14 09:46:03', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (113, 5, 7, 2, 2, 0, '2014-02-14 09:48:21', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (114, 17, 7, 2, 2, 0, '2014-02-14 09:48:21', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (115, 6, 7, 3, 2, 0, '2014-02-14 09:48:21', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (116, 5, 7, 8, 2, 0, '2014-02-14 09:48:21', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (117, 17, 7, 8, 2, 0, '2014-02-14 09:48:21', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (118, 5, 7, 2, 2, 0, '2014-02-14 09:51:04', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (119, 17, 7, 2, 2, 0, '2014-02-14 09:51:04', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (120, 6, 7, 3, 2, 0, '2014-02-14 09:51:04', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (121, 5, 7, 8, 2, 0, '2014-02-14 09:51:04', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (122, 17, 7, 8, 2, 0, '2014-02-14 09:51:04', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (123, 5, 7, 2, 2, 0, '2014-02-14 09:51:23', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (124, 17, 7, 2, 2, 0, '2014-02-14 09:51:23', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (125, 5, 7, 2, 2, 0, '2014-02-14 09:52:59', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (126, 17, 7, 2, 2, 0, '2014-02-14 09:52:59', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (127, 6, 7, 3, 2, 0, '2014-02-14 09:52:59', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (128, 5, 7, 8, 2, 0, '2014-02-14 09:52:59', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (129, 17, 7, 8, 2, 0, '2014-02-14 09:52:59', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (130, 5, 7, 2, 2, 0, '2014-02-14 09:53:08', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (131, 17, 7, 2, 2, 0, '2014-02-14 09:53:08', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (132, 6, 7, 3, 2, 0, '2014-02-14 09:53:08', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (133, 5, 7, 8, 2, 0, '2014-02-14 09:53:08', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (134, 17, 7, 8, 2, 0, '2014-02-14 09:53:08', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (135, 6, 7, 3, 2, 0, '2014-02-14 09:53:17', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (136, 5, 7, 8, 2, 0, '2014-02-14 09:53:17', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (137, 17, 7, 8, 2, 0, '2014-02-14 09:53:17', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (138, 8, 7, 11, 1, 0, '2014-02-14 09:53:33', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (139, 5, 7, 8, 2, 0, '2014-02-14 09:54:14', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (140, 17, 7, 8, 2, 0, '2014-02-14 09:54:14', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (141, 8, 7, 11, 2, 0, '2014-02-14 09:54:14', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (142, 6, 7, 3, 2, 0, '2014-02-14 09:54:30', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (143, 5, 7, 8, 2, 0, '2014-02-14 09:54:30', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (144, 17, 7, 8, 2, 0, '2014-02-14 09:54:30', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (145, 8, 7, 11, 2, 0, '2014-02-14 09:54:30', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (146, 5, 7, 2, 2, 0, '2014-02-14 09:54:42', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (147, 17, 7, 2, 2, 0, '2014-02-14 09:54:42', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (148, 6, 7, 3, 2, 0, '2014-02-14 09:54:42', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (149, 5, 7, 8, 2, 0, '2014-02-14 09:54:42', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (150, 17, 7, 8, 2, 0, '2014-02-14 09:54:42', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (151, 8, 7, 11, 2, 0, '2014-02-14 09:54:42', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (152, 26, 24, 15, 1, 0, '2014-02-14 09:57:32', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (153, 27, 24, 15, 1, 1, '2014-02-14 09:57:32', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (154, 28, 24, 17, 1, 1, '2014-02-14 09:57:32', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (155, 31, 24, 18, 1, 0, '2014-02-14 09:57:32', '2014', '02', '14');
INSERT INTO `notificaciones` VALUES (156, 28, 24, 20, 1, 0, '2014-02-14 09:57:32', '2014', '02', '14');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `provincias`
-- 

CREATE TABLE `provincias` (
  `id_provincia` smallint(6) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `provincias`
-- 

INSERT INTO `provincias` VALUES (2, 'Albacete');
INSERT INTO `provincias` VALUES (3, 'Alicante/Alacant');
INSERT INTO `provincias` VALUES (4, 'Almería');
INSERT INTO `provincias` VALUES (1, 'Araba/Álava');
INSERT INTO `provincias` VALUES (33, 'Asturias');
INSERT INTO `provincias` VALUES (5, 'Ávila');
INSERT INTO `provincias` VALUES (6, 'Badajoz');
INSERT INTO `provincias` VALUES (7, 'Balears, Illes');
INSERT INTO `provincias` VALUES (8, 'Barcelona');
INSERT INTO `provincias` VALUES (48, 'Bizkaia');
INSERT INTO `provincias` VALUES (9, 'Burgos');
INSERT INTO `provincias` VALUES (10, 'Cáceres');
INSERT INTO `provincias` VALUES (11, 'Cádiz');
INSERT INTO `provincias` VALUES (39, 'Cantabria');
INSERT INTO `provincias` VALUES (12, 'Castellón/Castelló');
INSERT INTO `provincias` VALUES (51, 'Ceuta');
INSERT INTO `provincias` VALUES (13, 'Ciudad Real');
INSERT INTO `provincias` VALUES (14, 'Córdoba');
INSERT INTO `provincias` VALUES (15, 'Coruña, A');
INSERT INTO `provincias` VALUES (16, 'Cuenca');
INSERT INTO `provincias` VALUES (20, 'Gipuzkoa');
INSERT INTO `provincias` VALUES (17, 'Girona');
INSERT INTO `provincias` VALUES (18, 'Granada');
INSERT INTO `provincias` VALUES (19, 'Guadalajara');
INSERT INTO `provincias` VALUES (21, 'Huelva');
INSERT INTO `provincias` VALUES (22, 'Huesca');
INSERT INTO `provincias` VALUES (23, 'Jaén');
INSERT INTO `provincias` VALUES (24, 'León');
INSERT INTO `provincias` VALUES (27, 'Lugo');
INSERT INTO `provincias` VALUES (25, 'Lleida');
INSERT INTO `provincias` VALUES (28, 'Madrid');
INSERT INTO `provincias` VALUES (29, 'Málaga');
INSERT INTO `provincias` VALUES (52, 'Melilla');
INSERT INTO `provincias` VALUES (30, 'Murcia');
INSERT INTO `provincias` VALUES (31, 'Navarra');
INSERT INTO `provincias` VALUES (32, 'Ourense');
INSERT INTO `provincias` VALUES (34, 'Palencia');
INSERT INTO `provincias` VALUES (35, 'Palmas, Las');
INSERT INTO `provincias` VALUES (36, 'Pontevedra');
INSERT INTO `provincias` VALUES (26, 'Rioja, La');
INSERT INTO `provincias` VALUES (37, 'Salamanca');
INSERT INTO `provincias` VALUES (38, 'Santa Cruz de Tenerife');
INSERT INTO `provincias` VALUES (40, 'Segovia');
INSERT INTO `provincias` VALUES (41, 'Sevilla');
INSERT INTO `provincias` VALUES (42, 'Soria');
INSERT INTO `provincias` VALUES (43, 'Tarragona');
INSERT INTO `provincias` VALUES (44, 'Teruel');
INSERT INTO `provincias` VALUES (45, 'Toledo');
INSERT INTO `provincias` VALUES (46, 'Valencia/València');
INSERT INTO `provincias` VALUES (47, 'Valladolid');
INSERT INTO `provincias` VALUES (49, 'Zamora');
INSERT INTO `provincias` VALUES (50, 'Zaragoza');

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
-- Volcar la base de datos para la tabla `rel_clase_nino`
-- 

INSERT INTO `rel_clase_nino` VALUES (1, 2);
INSERT INTO `rel_clase_nino` VALUES (1, 3);
INSERT INTO `rel_clase_nino` VALUES (1, 8);
INSERT INTO `rel_clase_nino` VALUES (1, 11);
INSERT INTO `rel_clase_nino` VALUES (2, 4);
INSERT INTO `rel_clase_nino` VALUES (2, 5);
INSERT INTO `rel_clase_nino` VALUES (2, 9);
INSERT INTO `rel_clase_nino` VALUES (3, 6);
INSERT INTO `rel_clase_nino` VALUES (3, 12);
INSERT INTO `rel_clase_nino` VALUES (4, 13);
INSERT INTO `rel_clase_nino` VALUES (4, 14);
INSERT INTO `rel_clase_nino` VALUES (5, 15);
INSERT INTO `rel_clase_nino` VALUES (5, 17);
INSERT INTO `rel_clase_nino` VALUES (5, 18);
INSERT INTO `rel_clase_nino` VALUES (5, 20);
INSERT INTO `rel_clase_nino` VALUES (6, 16);
INSERT INTO `rel_clase_nino` VALUES (6, 19);
INSERT INTO `rel_clase_nino` VALUES (6, 21);

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
-- Volcar la base de datos para la tabla `rel_clase_tutor`
-- 

INSERT INTO `rel_clase_tutor` VALUES (1, 7);
INSERT INTO `rel_clase_tutor` VALUES (2, 9);
INSERT INTO `rel_clase_tutor` VALUES (3, 15);
INSERT INTO `rel_clase_tutor` VALUES (4, 20);
INSERT INTO `rel_clase_tutor` VALUES (5, 24);
INSERT INTO `rel_clase_tutor` VALUES (6, 25);

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
-- Volcar la base de datos para la tabla `rel_empresa_guarderia`
-- 

INSERT INTO `rel_empresa_guarderia` VALUES (2, 2);
INSERT INTO `rel_empresa_guarderia` VALUES (2, 4);
INSERT INTO `rel_empresa_guarderia` VALUES (6, 7);

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
-- Volcar la base de datos para la tabla `rel_familiar_nino`
-- 

INSERT INTO `rel_familiar_nino` VALUES (0, 2);
INSERT INTO `rel_familiar_nino` VALUES (5, 2);
INSERT INTO `rel_familiar_nino` VALUES (5, 6);
INSERT INTO `rel_familiar_nino` VALUES (5, 8);
INSERT INTO `rel_familiar_nino` VALUES (5, 12);
INSERT INTO `rel_familiar_nino` VALUES (6, 3);
INSERT INTO `rel_familiar_nino` VALUES (6, 9);
INSERT INTO `rel_familiar_nino` VALUES (8, 4);
INSERT INTO `rel_familiar_nino` VALUES (8, 11);
INSERT INTO `rel_familiar_nino` VALUES (14, 5);
INSERT INTO `rel_familiar_nino` VALUES (17, 2);
INSERT INTO `rel_familiar_nino` VALUES (17, 6);
INSERT INTO `rel_familiar_nino` VALUES (17, 8);
INSERT INTO `rel_familiar_nino` VALUES (17, 12);
INSERT INTO `rel_familiar_nino` VALUES (21, 13);
INSERT INTO `rel_familiar_nino` VALUES (21, 14);
INSERT INTO `rel_familiar_nino` VALUES (26, 15);
INSERT INTO `rel_familiar_nino` VALUES (26, 16);
INSERT INTO `rel_familiar_nino` VALUES (27, 15);
INSERT INTO `rel_familiar_nino` VALUES (27, 16);
INSERT INTO `rel_familiar_nino` VALUES (28, 17);
INSERT INTO `rel_familiar_nino` VALUES (28, 20);
INSERT INTO `rel_familiar_nino` VALUES (28, 21);
INSERT INTO `rel_familiar_nino` VALUES (31, 18);
INSERT INTO `rel_familiar_nino` VALUES (32, 19);

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
-- Volcar la base de datos para la tabla `rel_guarderia_clase`
-- 

INSERT INTO `rel_guarderia_clase` VALUES (2, 1);
INSERT INTO `rel_guarderia_clase` VALUES (2, 2);
INSERT INTO `rel_guarderia_clase` VALUES (6, 4);
INSERT INTO `rel_guarderia_clase` VALUES (7, 5);
INSERT INTO `rel_guarderia_clase` VALUES (7, 6);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rel_guarderia_familiar`
-- 

CREATE TABLE `rel_guarderia_familiar` (
  `idguarderia` int(11) NOT NULL,
  `idfamiliar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `rel_guarderia_familiar`
-- 

INSERT INTO `rel_guarderia_familiar` VALUES (2, 5);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 6);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 8);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 11);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 12);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 13);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 14);
INSERT INTO `rel_guarderia_familiar` VALUES (2, 17);
INSERT INTO `rel_guarderia_familiar` VALUES (6, 21);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 26);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 27);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 28);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 29);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 30);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 31);
INSERT INTO `rel_guarderia_familiar` VALUES (7, 32);

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
-- Volcar la base de datos para la tabla `rel_guarderia_nino`
-- 

INSERT INTO `rel_guarderia_nino` VALUES (2, 2);
INSERT INTO `rel_guarderia_nino` VALUES (2, 3);
INSERT INTO `rel_guarderia_nino` VALUES (2, 4);
INSERT INTO `rel_guarderia_nino` VALUES (2, 5);
INSERT INTO `rel_guarderia_nino` VALUES (2, 6);
INSERT INTO `rel_guarderia_nino` VALUES (2, 8);
INSERT INTO `rel_guarderia_nino` VALUES (2, 9);
INSERT INTO `rel_guarderia_nino` VALUES (2, 11);
INSERT INTO `rel_guarderia_nino` VALUES (2, 12);
INSERT INTO `rel_guarderia_nino` VALUES (6, 13);
INSERT INTO `rel_guarderia_nino` VALUES (6, 14);
INSERT INTO `rel_guarderia_nino` VALUES (7, 15);
INSERT INTO `rel_guarderia_nino` VALUES (7, 16);
INSERT INTO `rel_guarderia_nino` VALUES (7, 17);
INSERT INTO `rel_guarderia_nino` VALUES (7, 18);
INSERT INTO `rel_guarderia_nino` VALUES (7, 19);
INSERT INTO `rel_guarderia_nino` VALUES (7, 20);
INSERT INTO `rel_guarderia_nino` VALUES (7, 21);
INSERT INTO `rel_guarderia_nino` VALUES (7, 22);

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
-- Volcar la base de datos para la tabla `rel_guarderia_tutor`
-- 

INSERT INTO `rel_guarderia_tutor` VALUES (1, 4);
INSERT INTO `rel_guarderia_tutor` VALUES (2, 7);
INSERT INTO `rel_guarderia_tutor` VALUES (2, 9);
INSERT INTO `rel_guarderia_tutor` VALUES (2, 15);
INSERT INTO `rel_guarderia_tutor` VALUES (6, 20);
INSERT INTO `rel_guarderia_tutor` VALUES (7, 24);
INSERT INTO `rel_guarderia_tutor` VALUES (7, 25);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `rol`
-- 

CREATE TABLE `rol` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `rol`
-- 

INSERT INTO `rol` VALUES (1, 'Administrador');
INSERT INTO `rol` VALUES (2, 'Familiar');
INSERT INTO `rol` VALUES (3, 'Tutor');
INSERT INTO `rol` VALUES (4, 'Director');
INSERT INTO `rol` VALUES (5, 'Gerente');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tiponino`
-- 

CREATE TABLE `tiponino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `tiponino`
-- 

INSERT INTO `tiponino` VALUES (1, 'Mañana');
INSERT INTO `tiponino` VALUES (2, 'Mañana y Tarde');
INSERT INTO `tiponino` VALUES (3, 'Mañana y Tarde con comida');
INSERT INTO `tiponino` VALUES (4, 'Tarde');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'administrador', 'pagina', 'admin@admin.es', 'e10adc3949ba59abbe56e057f20f883e', '1978-01-17', '', 'h', 1);
INSERT INTO `usuarios` VALUES (2, 'Gerente', 'primero', 'gerente@gerente.es', 'e10adc3949ba59abbe56e057f20f883e', '1985-06-12', '', 'h', 5);
INSERT INTO `usuarios` VALUES (3, 'Directora', 'segunda', 'director@director.es', 'e10adc3949ba59abbe56e057f20f883e', '1984-11-16', '2013-02-07_12.14_.56_.jpg', 'm', 4);
INSERT INTO `usuarios` VALUES (4, 'tutor 1', 'guarderia1', 'tutor1@tutor1.es', 'e10adc3949ba59abbe56e057f20f883e', '2013-12-05', '', 'h', 3);
INSERT INTO `usuarios` VALUES (5, 'Florindo', 'López', 'flori_89_ld@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1989-07-01', 'nino.png', 'h', 2);
INSERT INTO `usuarios` VALUES (6, 'Antonio', 'Franco', 'cotorra_112@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-12-25', 'Emilio_Rocio.jpg', 'h', 2);
INSERT INTO `usuarios` VALUES (7, 'Charo', 'Molina Medel', 'charo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1989-07-22', '', 'm', 3);
INSERT INTO `usuarios` VALUES (8, 'Andrea', 'Sanchez Martín', 'andrea@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-02-01', '', 'm', 2);
INSERT INTO `usuarios` VALUES (9, 'Tutor', 'de prueba', 'tutor@prueba.es', 'e10adc3949ba59abbe56e057f20f883e', '1987-06-10', '', 'h', 3);
INSERT INTO `usuarios` VALUES (10, 'Gerente', 'catorce', 'catorce@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1987-02-12', '', 'h', 5);
INSERT INTO `usuarios` VALUES (14, 'Jose carlos', 'Mateo', 'mateo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'h', 2);
INSERT INTO `usuarios` VALUES (15, 'Don Manuel', 'Ibañez', 'coco@coco.es', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', 'h', 3);
INSERT INTO `usuarios` VALUES (17, 'Mujer', 'de Flori', 'florindo.lopez@maxline.es', 'e10adc3949ba59abbe56e057f20f883e', '1987-07-01', '', 'm', 2);
INSERT INTO `usuarios` VALUES (18, 'Don Peter', 'Panes', 'director2@director.es', 'e10adc3949ba59abbe56e057f20f883e', '1981-12-01', 'IMAG15985.jpg', 'h', 4);
INSERT INTO `usuarios` VALUES (19, 'Juan Carlos', 'De Borbon', 'juancarlos@miguarderia.es', '03b6c04a53d08b6c4f9b76e814c52137', '0000-00-00', 'Juan_Carlos_de_Borbon.jpg', 'h', 4);
INSERT INTO `usuarios` VALUES (20, 'Sofia', 'De Grcia', 'sofia@miguarderia.es', 'b73c7ff0c2f387e2c8b0f78a29c04fe5', '0000-00-00', 'Sofia_de_grcia.jpg', 'm', 3);
INSERT INTO `usuarios` VALUES (21, 'Elena', 'De Borbon', 'elenaborbon@miguarderia.es', 'f5c90d326bc375e17efee4325dc04b59', '0000-00-00', 'Infanta_Elena.jpg', 'm', 2);
INSERT INTO `usuarios` VALUES (22, 'Montgomery', 'Burns', 'burns@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Mr_Burns.jpg', 'h', 5);
INSERT INTO `usuarios` VALUES (23, 'Seymour', 'Skinner', 'seymour@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Seymour_Skinner.png', 'h', 4);
INSERT INTO `usuarios` VALUES (24, 'Edna', 'Krabappel', 'edna@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Edna_Krabappel.png', 'm', 3);
INSERT INTO `usuarios` VALUES (25, 'Elizabeth', 'Hoover', 'ehoover@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Elizabeth_Hoover.png', 'm', 3);
INSERT INTO `usuarios` VALUES (26, 'Homer', 'Simpson', 'homer@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Homer.jpg', 'h', 2);
INSERT INTO `usuarios` VALUES (27, 'Marge', 'Simpson', 'marge@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Marge.jpg', 'm', 2);
INSERT INTO `usuarios` VALUES (28, 'Nedd', 'Flanders', 'nedflanders@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Ned_Flanders3.png', 'h', 2);
INSERT INTO `usuarios` VALUES (29, 'Maude', 'Flanders', 'mflanders@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Maude_Flanders.png', 'm', 2);
INSERT INTO `usuarios` VALUES (30, 'Kirk', 'Van Houten', 'kvanhouten@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Kirk_Van_Houten.png', 'h', 2);
INSERT INTO `usuarios` VALUES (31, 'Martin Sr', 'Prince', 'mprince@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Mr_Prince.png', 'h', 2);
INSERT INTO `usuarios` VALUES (32, 'Clancy', 'Wiggum', 'cwiggum@simpsons.com', 'cf8d3ee5b1cf3d02bb461d8e0f978a6b', '0000-00-00', 'Clancy_Wiggum.png', 'h', 2);

-- 
-- Filtros para las tablas descargadas (dump)
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
