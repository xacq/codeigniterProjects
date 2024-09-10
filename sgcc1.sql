-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2022 a las 00:59:46
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'BASE DE DATOS II', '2022-06-19', '2022-06-19', NULL),
(2, 'PROGRAMACION WEB', '2022-06-19', '2022-06-19', NULL),
(3, 'ANALISIS DE SOFTWARE', '2022-06-19', '2022-06-19', NULL),
(4, 'PROGRAMACION MOVIL', '2022-06-19', '2022-06-19', NULL),
(5, 'CISCO PACKET TRACER', '2022-06-19', '2022-06-19', NULL);

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
(2, 1, 'ACTIVO', 'BASE DE DATOS II', '2022-06-20', '20:14:00', '192.168.1.1', '123456', 'ACTIVO', '2022-06-19', '2022-06-19', NULL);

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

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`CALID`, `CALDESCRIPCION`, `CALPUNTAJE`, `CALPUNAPROBACION`, `CALESTADO`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(2, 'PROGRAMADOR WEB', '9.05', '9.05', 'ACTIVO', '2022-06-19', '2022-06-19', NULL);

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
(2, 2, 'BRYAN', '2022-06-20', '2022-06-20', '351.50', 20, 'PRESENCIAL', 'ACTIVO', '2022-06-20', '2022-06-20', NULL);

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
(2, '1750608550', 'JOSE LUIS ', 'PAGINA WEB', '0987676020', 'Joseluis25@gmail.com', 'ACTIVO', '2022-06-20', '2022-06-20', NULL);

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
(2, '1750608539', 'ANDRES', 'QUITO', '0987676020', 'Andres.12@hotmail.com', 'ACTIVO', '2022-06-20', '2022-06-20', NULL);

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
(1, 'AREAS', 'AREAS CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(2, 'AUDITORIAS', 'AUDITORIAS CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(3, 'CALIFICACIONES', 'CALIFICACIONES CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(4, 'CURSOS', 'CURSOS CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(5, 'DOCENTES', 'DOCENTES CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(6, 'ESTUDIANTE', 'ESTUDIANTES CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(7, 'OPCIONES', 'OPCIONES CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(8, 'PERFILES', 'PERFILES CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL),
(9, 'USUARIOS', 'USUARIOS CONTROLLER', 'ACTIVO', '2022-06-20', '2022-06-20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `PAGID` int(11) NOT NULL,
  `MATID` int(11) DEFAULT NULL,
  `PAGFECHA` date DEFAULT NULL,
  `PAGFECREGPAGO` date DEFAULT NULL,
  `PAGESTADO` varchar(30) DEFAULT NULL,
  `CREATED_AT` date DEFAULT NULL,
  `UPDATED_AT` date DEFAULT NULL,
  `DELETED_AT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'DOCENTE', 'ACTIVO', '2022-06-19', '2022-06-19', NULL),
(3, 'ESTUDIANTE', 'ACTIVO', '2022-06-19', '2022-06-19', NULL);

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
(1, 1, 1, 'ACTIVO', NULL, NULL, NULL);

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
(1, 1, 'BRYAN', '123', '123', 'bryanmora12@gmail.com', 'ACTIVO', '2022-06-19', '2022-06-20', NULL),
(2, 2, 'ANDRES', '1234', '1234', 'Andres.12@hotmail.com', 'ACTIVO', '2022-06-19', '2022-06-19', NULL),
(3, 3, 'MIGUEL', '12345', '12345', 'miguel124@hotmail.com', 'ACTIVO', '2022-06-19', '2022-06-19', NULL);

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
  MODIFY `AREID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `ASIID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `AUDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `CALID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificacionesitems`
--
ALTER TABLE `calificacionesitems`
  MODIFY `CITID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `CURID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `DOCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `ESTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `ITEID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `MATID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `OPCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `PAGID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `PERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfilesopciones`
--
ALTER TABLE `perfilesopciones`
  MODIFY `POPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registrocalificaciones`
--
ALTER TABLE `registrocalificaciones`
  MODIFY `RCAID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrocursos`
--
ALTER TABLE `registrocursos`
  MODIFY `RCUID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrodocente`
--
ALTER TABLE `registrodocente`
  MODIFY `RDOID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`MATID`) REFERENCES `matriculas` (`MATID`);

--
-- Filtros para la tabla `perfilesopciones`
--
ALTER TABLE `perfilesopciones`
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`PERID`) REFERENCES `perfiles` (`PERID`),
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`OPCID`) REFERENCES `opciones` (`OPCID`);

--
-- Filtros para la tabla `registrocalificaciones`
--
ALTER TABLE `registrocalificaciones`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`MATID`) REFERENCES `matriculas` (`MATID`),
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`CITID`) REFERENCES `calificacionesitems` (`CITID`);

--
-- Filtros para la tabla `registrocursos`
--
ALTER TABLE `registrocursos`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`CURID`) REFERENCES `cursos` (`CURID`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ESTID`) REFERENCES `estudiantes` (`ESTID`);

--
-- Filtros para la tabla `registrodocente`
--
ALTER TABLE `registrodocente`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`DOCID`) REFERENCES `docentes` (`DOCID`),
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`CURID`) REFERENCES `cursos` (`CURID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`PERID`) REFERENCES `perfiles` (`PERID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
