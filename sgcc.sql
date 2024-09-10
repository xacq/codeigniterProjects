-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2024 a las 15:49:24
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgcc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `AREID` int(11) NOT NULL,
  `ARENOMBRE` varchar(128) NOT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`AREID`, `ARENOMBRE`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'BASE DE DATOS II', '2024-06-30', '2024-06-30', NULL),
(2, 'PROGRAMACION MOVIL', '2024-06-30', '2024-06-30', NULL),
(3, 'CISCO PACKET  TRACER', '2024-06-30', '2024-06-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `ASIID` int(11) NOT NULL,
  `MATID` int(11) DEFAULT NULL,
  `ASIFECHA` date DEFAULT NULL,
  `ASIESTADO` varchar(2) DEFAULT NULL,
  `ASIOBSERVACION` text DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias`
--

CREATE TABLE `auditorias` (
  `AUDID` int(11) NOT NULL,
  `USUID` int(11) DEFAULT NULL,
  `AUDACCION` varchar(128) DEFAULT NULL,
  `AUDTABLA` varchar(128) DEFAULT NULL,
  `AUDFECHA` date DEFAULT NULL,
  `AUDHORA` time DEFAULT NULL,
  `AUDIP` varchar(64) DEFAULT NULL,
  `AUDHOST` varchar(128) DEFAULT NULL,
  `AUDSENTENCIA` text DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auditorias`
--

INSERT INTO `auditorias` (`AUDID`, `USUID`, `AUDACCION`, `AUDTABLA`, `AUDFECHA`, `AUDHORA`, `AUDIP`, `AUDHOST`, `AUDSENTENCIA`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 'INSERT', '`areas`', '2024-06-30', '08:34:38', '::1', '::1', 'INSERT INTO `areas` (`ARENOMBRE`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'BASE DE DATOS II\', \'2024-06-30 08:34:38\', \'2024-06-30 08:34:38\')', '2024-06-30', '2024-06-30', NULL),
(2, 1, 'INSERT', '`areas`', '2024-06-30', '08:34:56', '::1', '::1', 'INSERT INTO `areas` (`ARENOMBRE`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'PROGRAMACION MOVIL\', \'2024-06-30 08:34:56\', \'2024-06-30 08:34:56\')', '2024-06-30', '2024-06-30', NULL),
(3, 1, 'INSERT', '`areas`', '2024-06-30', '08:35:28', '::1', '::1', 'INSERT INTO `areas` (`ARENOMBRE`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'CISCO PACKET  TRACER\', \'2024-06-30 08:35:28\', \'2024-06-30 08:35:28\')', '2024-06-30', '2024-06-30', NULL),
(4, 1, 'INSERT', '`cursos`', '2024-06-30', '08:36:37', '::1', '::1', 'INSERT INTO `cursos` (`AREID`, `CURNOMBRE`, `CURFECINICIO`, `CURFECFINAL`, `CURPRECIO`, `CURNUMESTUDIANTES`, `CURMODALIDAD`, `CURESTADO`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'1\', \'BASE DE DATOS II\', \'2024-06-27\', \'2024-07-30\', \'\', \'10\', \'PRESENCIAL\', \'ACTIVO\', \'2024-06-30 08:36:37\', \'2024-06-30 08:36:37\')', '2024-06-30', '2024-06-30', NULL),
(5, 1, 'INSERT', '`docentes`', '2024-06-30', '08:38:12', '::1', '::1', 'INSERT INTO `docentes` (`DOCCEDULA`, `DOCNOMBRE`, `DOCTITULO`, `DOCTELEFONO`, `DOCCORREO`, `DOCESTADO`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'0501487523\', \'ING. OSCAR NARANJO\', \'Ingenieria en Sistema\', \'0987676012\', \'Oscar_naranjo@gmail.com\', \'ACTIVO\', \'2024-06-30 08:38:12\', \'2024-06-30 08:38:12\')', '2024-06-30', '2024-06-30', NULL),
(6, 1, 'INSERT', '`usuarios`', '2024-06-30', '08:38:12', '::1', '::1', 'INSERT INTO `usuarios` (`PERID`, `USUNOMBRE`, `USUCEDULA`, `USUCLAVE`, `USUCORREO`, `USUESTADO`, `CREATED_AT`, `UPDATED_AT`) VALUES (3, \'ING. OSCAR NARANJO\', \'0501487523\', \'0501487523\', \'Oscar_naranjo@gmail.com\', \'ACTIVO\', \'2024-06-30 08:38:12\', \'2024-06-30 08:38:12\')', '2024-06-30', '2024-06-30', NULL),
(7, NULL, 'INSERT', '`estudiantes`', '2024-06-30', '08:39:06', 'localhost', 'localhost', 'INSERT INTO `estudiantes` (`ESTCEDULA`, `ESTNOMBRE`, `ESTDIRECCION`, `ESTTELEFONO`, `ESTCORREO`, `ESTESTADO`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'1720245218\', \'JOSE\', \'Guamaní\', \'0968521477\', \'Jose2424@gmail.com\', \'ACTIVO\', \'2024-06-30 08:39:06\', \'2024-06-30 08:39:06\')', '2024-06-30', '2024-06-30', NULL),
(8, NULL, 'INSERT', '`usuarios`', '2024-06-30', '08:39:06', 'localhost', 'localhost', 'INSERT INTO `usuarios` (`PERID`, `USUNOMBRE`, `USUCEDULA`, `USUCLAVE`, `USUCORREO`, `USUESTADO`, `CREATED_AT`, `UPDATED_AT`) VALUES (2, \'JOSE\', \'1720245218\', \'1720245218\', \'Jose2424@gmail.com\', \'ACTIVO\', \'2024-06-30 08:39:06\', \'2024-06-30 08:39:06\')', '2024-06-30', '2024-06-30', NULL),
(9, 3, 'INSERT', '`registrocursos`', '2024-06-30', '08:39:14', '::1', '::1', 'INSERT INTO `registrocursos` (`CURID`, `ESTID`, `RCUFECHA`, `RCUESTADO`, `CREATED_AT`, `UPDATED_AT`) VALUES (\'1\', \'1\', \'2024-06-30\', \'ACTIVO\', \'2024-06-30 08:39:14\', \'2024-06-30 08:39:14\')', '2024-06-30', '2024-06-30', NULL),
(10, 1, 'UPDATE', '`registrocursos`', '2024-06-30', '08:39:34', '::1', '::1', 'UPDATE `registrocursos` SET `RCUESTADO` = \'INACTIVO\', `UPDATED_AT` = \'2024-06-30 08:39:34\'\nWHERE `registrocursos`.`RCUID` IN (\'1\')', '2024-06-30', '2024-06-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `CALID` int(11) NOT NULL,
  `CALDESCRIPCION` varchar(256) DEFAULT NULL,
  `CALPUNTAJE` decimal(10,2) DEFAULT NULL,
  `CALPUNAPROBACION` decimal(10,2) DEFAULT NULL,
  `CALESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacionesitems`
--

CREATE TABLE `calificacionesitems` (
  `CITID` int(11) NOT NULL,
  `CALID` int(11) DEFAULT NULL,
  `ITEID` int(11) DEFAULT NULL,
  `CITPONDERACION` decimal(10,2) DEFAULT NULL,
  `CITTIPO` varchar(30) DEFAULT NULL,
  `CITESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `CURID` int(11) NOT NULL,
  `AREID` int(11) DEFAULT NULL,
  `CURNOMBRE` varchar(256) NOT NULL,
  `CURFECINICIO` date DEFAULT NULL,
  `CURFECFINAL` date DEFAULT NULL,
  `CURPRECIO` decimal(10,2) DEFAULT NULL,
  `CURNUMESTUDIANTES` int(11) DEFAULT NULL,
  `CURMODALIDAD` varchar(128) DEFAULT NULL,
  `CURESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`CURID`, `AREID`, `CURNOMBRE`, `CURFECINICIO`, `CURFECFINAL`, `CURPRECIO`, `CURNUMESTUDIANTES`, `CURMODALIDAD`, `CURESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 'BASE DE DATOS II', '2024-06-27', '2024-07-30', '0.00', 10, 'PRESENCIAL', 'ACTIVO', '2024-06-30', '2024-06-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `DOCID` int(11) NOT NULL,
  `DOCCEDULA` varchar(30) NOT NULL,
  `DOCNOMBRE` varchar(256) DEFAULT NULL,
  `DOCTITULO` varchar(128) DEFAULT NULL,
  `DOCTELEFONO` varchar(30) DEFAULT NULL,
  `DOCCORREO` varchar(128) DEFAULT NULL,
  `DOCESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`DOCID`, `DOCCEDULA`, `DOCNOMBRE`, `DOCTITULO`, `DOCTELEFONO`, `DOCCORREO`, `DOCESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, '0501487523', 'ING. OSCAR NARANJO', 'Ingenieria en Sistema', '0987676012', 'Oscar_naranjo@gmail.com', 'ACTIVO', '2024-06-30', '2024-06-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ESTID` int(11) NOT NULL,
  `ESTCEDULA` varchar(30) DEFAULT NULL,
  `ESTNOMBRE` varchar(256) DEFAULT NULL,
  `ESTDIRECCION` varchar(256) DEFAULT NULL,
  `ESTTELEFONO` varchar(256) DEFAULT NULL,
  `ESTCORREO` varchar(128) DEFAULT NULL,
  `ESTESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ESTID`, `ESTCEDULA`, `ESTNOMBRE`, `ESTDIRECCION`, `ESTTELEFONO`, `ESTCORREO`, `ESTESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, '1720245218', 'JOSE', 'Guamaní', '0968521477', 'Jose2424@gmail.com', 'ACTIVO', '2024-06-30', '2024-06-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `ITEID` int(11) NOT NULL,
  `ITENOMBRE` varchar(128) DEFAULT NULL,
  `ITEOBSERVACION` text DEFAULT NULL,
  `ITEESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `MATID` int(11) NOT NULL,
  `RCUID` int(11) DEFAULT NULL,
  `MATTIPPAGO` varchar(128) DEFAULT NULL,
  `MATCUOTAS` int(11) DEFAULT NULL,
  `MATFECHA` date DEFAULT NULL,
  `MATESTPAGO` varchar(30) DEFAULT NULL,
  `MATESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`MATID`, `RCUID`, `MATTIPPAGO`, `MATCUOTAS`, `MATFECHA`, `MATESTPAGO`, `MATESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 'CREDITO', 3, NULL, NULL, 'ACTIVO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `OPCID` int(11) NOT NULL,
  `OPCNOMBRE` varchar(128) DEFAULT NULL,
  `OPCRUTA` varchar(256) DEFAULT NULL,
  `OPCESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`OPCID`, `OPCNOMBRE`, `OPCRUTA`, `OPCESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'Areas', 'AreasController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(2, 'Asistencias', 'AsistenciasController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(3, 'Auditorias', 'AuditoriasController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(4, 'Calificaciones', 'CalificacionesController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(5, 'Cursos', 'CursosController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(6, 'Docentes', 'DocentesController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(7, 'Estudiantes', 'EstudianteController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(8, 'Matriculas', 'MatriculasController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(9, 'Opciones', 'OpcionesController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(10, 'Pagos', 'PagosController/indexPagoPendiente', 'Activo', '2024-03-09', '2024-03-09', NULL),
(11, 'Perfiles', 'PerfilesController', 'Activo', '2024-03-09', '2024-03-09', NULL),
(12, 'Usuarios', 'UsuariosController', 'Activo', '2024-03-09', '2024-03-09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `PAGID` int(11) NOT NULL,
  `MATID` int(11) DEFAULT NULL,
  `PAGFECHA` date DEFAULT NULL,
  `PAGFECREGPAGO` date DEFAULT NULL,
  `PAGNUMCUOTA` int(100) NOT NULL,
  `PAGCUOTA` decimal(10,2) NOT NULL,
  `PAGESTADO` varchar(30) DEFAULT NULL,
  `PAGFORMAPAGO` varchar(100) NOT NULL,
  `PAGNUMDOCPAGO` varchar(100) NOT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`PAGID`, `MATID`, `PAGFECHA`, `PAGFECREGPAGO`, `PAGNUMCUOTA`, `PAGCUOTA`, `PAGESTADO`, `PAGFORMAPAGO`, `PAGNUMDOCPAGO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, NULL, '2024-07-30', 1, '0.00', 'PENDIENTE', '', '', NULL, NULL, NULL),
(2, 1, NULL, '2024-08-30', 2, '0.00', 'PENDIENTE', '', '', NULL, NULL, NULL),
(3, 1, NULL, '2024-09-30', 3, '0.00', 'PENDIENTE', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `PERID` int(11) NOT NULL,
  `PERNOMBRE` varchar(128) DEFAULT NULL,
  `PERESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`PERID`, `PERNOMBRE`, `PERESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'ADMINISTRADOR', 'ACTIVO', '2022-06-19', '2022-06-21', NULL),
(2, 'ESTUDIANTE', 'ACTIVO', '2022-06-19', '2022-06-19', NULL),
(3, 'DOCENTE', 'ACTIVO', '2022-06-19', '2022-06-19', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilesopciones`
--

CREATE TABLE `perfilesopciones` (
  `POPID` int(11) NOT NULL,
  `PERID` int(11) DEFAULT NULL,
  `OPCID` int(11) DEFAULT NULL,
  `POPESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfilesopciones`
--

INSERT INTO `perfilesopciones` (`POPID`, `PERID`, `OPCID`, `POPESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 1, 'Activo', '2024-03-09', '2024-03-09', NULL),
(2, 1, 2, 'Activo', '2024-03-09', '2024-03-09', NULL),
(3, 1, 3, 'Activo', '2024-03-09', '2024-03-09', NULL),
(4, 1, 4, 'Activo', '2024-03-09', '2024-03-09', NULL),
(5, 1, 5, 'Activo', '2024-03-09', '2024-03-09', NULL),
(6, 1, 6, 'Activo', '2024-03-09', '2024-03-09', NULL),
(7, 1, 7, 'Activo', '2024-03-09', '2024-03-09', NULL),
(8, 1, 8, 'Activo', '2024-03-09', '2024-03-09', NULL),
(9, 1, 9, 'Activo', '2024-03-09', '2024-03-09', NULL),
(10, 1, 10, 'Activo', '2024-03-09', '2024-03-09', NULL),
(11, 1, 11, 'Activo', '2024-03-09', '2024-03-09', NULL),
(12, 1, 12, NULL, '2024-03-09', '2024-03-09', NULL),
(13, 3, 5, 'ACTIVO', '2024-05-10', '2024-05-10', NULL),
(14, 3, 4, 'ACTIVO', '2024-05-10', '2024-05-10', NULL),
(15, 3, 2, 'ACTIVO', '2024-05-10', '2024-05-10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocalificaciones`
--

CREATE TABLE `registrocalificaciones` (
  `RCAID` int(11) NOT NULL,
  `MATID` int(11) DEFAULT NULL,
  `CITID` int(11) DEFAULT NULL,
  `RCAFECHA` date DEFAULT NULL,
  `RCANOTA` decimal(10,2) DEFAULT NULL,
  `RCAEQUIVALENTE` decimal(10,2) DEFAULT NULL,
  `RCAOBSERVACION` text DEFAULT NULL,
  `RCAESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocursos`
--

CREATE TABLE `registrocursos` (
  `RCUID` int(11) NOT NULL,
  `CURID` int(11) DEFAULT NULL,
  `ESTID` int(11) DEFAULT NULL,
  `RCUFECHA` date DEFAULT NULL,
  `RCUESTADO` varchar(30) DEFAULT NULL,
  `RCUOBSERVACION` text DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrocursos`
--

INSERT INTO `registrocursos` (`RCUID`, `CURID`, `ESTID`, `RCUFECHA`, `RCUESTADO`, `RCUOBSERVACION`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 1, '2024-06-30', 'INACTIVO', NULL, '2024-06-30', '2024-06-30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodocente`
--

CREATE TABLE `registrodocente` (
  `RDOID` int(11) NOT NULL,
  `DOCID` int(11) DEFAULT NULL,
  `CURID` int(11) DEFAULT NULL,
  `RDOFECHA` date NOT NULL,
  `RDOESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrodocente`
--

INSERT INTO `registrodocente` (`RDOID`, `DOCID`, `CURID`, `RDOFECHA`, `RDOESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 1, '2024-06-30', 'ACTIVO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `USUID` int(11) NOT NULL,
  `PERID` int(11) DEFAULT NULL,
  `USUNOMBRE` varchar(128) DEFAULT NULL,
  `USUCEDULA` varchar(30) DEFAULT NULL,
  `USUCLAVE` varchar(30) DEFAULT NULL,
  `USUCORREO` varchar(128) DEFAULT NULL,
  `USUESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USUID`, `PERID`, `USUNOMBRE`, `USUCEDULA`, `USUCLAVE`, `USUCORREO`, `USUESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 1, 'BRYAN MORA', '1750608539', '1750608539', 'bryan.mora@instvidanueva.edu.ec', 'ACTIVO', '2024-06-21', NULL, NULL),
(2, 3, 'ING. OSCAR NARANJO', '0501487523', '0501487523', 'Oscar_naranjo@gmail.com', 'ACTIVO', '2024-06-30', '2024-06-30', NULL),
(3, 2, 'JOSE', '1720245218', '1720245218', 'Jose2424@gmail.com', 'ACTIVO', '2024-06-30', '2024-06-30', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`AREID`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`ASIID`),
  ADD KEY `FK_REFERENCE_8` (`MATID`);

--
-- Indices de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  ADD PRIMARY KEY (`AUDID`),
  ADD KEY `FK_REFERENCE_16` (`USUID`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`CALID`);

--
-- Indices de la tabla `calificacionesitems`
--
ALTER TABLE `calificacionesitems`
  ADD PRIMARY KEY (`CITID`),
  ADD KEY `FK_REFERENCE_10` (`ITEID`),
  ADD KEY `FK_REFERENCE_9` (`CALID`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`CURID`),
  ADD KEY `FK_REFERENCE_3` (`AREID`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`DOCID`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ESTID`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ITEID`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`MATID`),
  ADD KEY `FK_REFERENCE_6` (`RCUID`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`OPCID`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`PAGID`),
  ADD KEY `FK_REFERENCE_7` (`MATID`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`PERID`);

--
-- Indices de la tabla `perfilesopciones`
--
ALTER TABLE `perfilesopciones`
  ADD PRIMARY KEY (`POPID`),
  ADD KEY `FK_REFERENCE_13` (`PERID`),
  ADD KEY `FK_REFERENCE_14` (`OPCID`);

--
-- Indices de la tabla `registrocalificaciones`
--
ALTER TABLE `registrocalificaciones`
  ADD PRIMARY KEY (`RCAID`),
  ADD KEY `FK_REFERENCE_11` (`MATID`),
  ADD KEY `FK_REFERENCE_12` (`CITID`);

--
-- Indices de la tabla `registrocursos`
--
ALTER TABLE `registrocursos`
  ADD PRIMARY KEY (`RCUID`),
  ADD KEY `FK_REFERENCE_4` (`CURID`),
  ADD KEY `FK_REFERENCE_5` (`ESTID`);

--
-- Indices de la tabla `registrodocente`
--
ALTER TABLE `registrodocente`
  ADD PRIMARY KEY (`RDOID`),
  ADD KEY `FK_REFERENCE_1` (`DOCID`),
  ADD KEY `FK_REFERENCE_2` (`CURID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUID`),
  ADD KEY `FK_REFERENCE_15` (`PERID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `AREID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `ASIID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `AUDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `CALID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificacionesitems`
--
ALTER TABLE `calificacionesitems`
  MODIFY `CITID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `CURID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `DOCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `ESTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `ITEID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `MATID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `OPCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `PAGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `PERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfilesopciones`
--
ALTER TABLE `perfilesopciones`
  MODIFY `POPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `registrocalificaciones`
--
ALTER TABLE `registrocalificaciones`
  MODIFY `RCAID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrocursos`
--
ALTER TABLE `registrocursos`
  MODIFY `RCUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registrodocente`
--
ALTER TABLE `registrodocente`
  MODIFY `RDOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`MATID`) REFERENCES `matriculas` (`MATID`);

--
-- Filtros para la tabla `auditorias`
--
ALTER TABLE `auditorias`
  ADD CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`USUID`) REFERENCES `usuarios` (`USUID`);

--
-- Filtros para la tabla `calificacionesitems`
--
ALTER TABLE `calificacionesitems`
  ADD CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ITEID`) REFERENCES `items` (`ITEID`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`CALID`) REFERENCES `calificaciones` (`CALID`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`AREID`) REFERENCES `areas` (`AREID`);

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`RCUID`) REFERENCES `registrocursos` (`RCUID`);

--
-- Filtros para la tabla `perfilesopciones`
--
ALTER TABLE `perfilesopciones`
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`PERID`) REFERENCES `perfiles` (`PERID`),
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`OPCID`) REFERENCES `opciones` (`OPCID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
