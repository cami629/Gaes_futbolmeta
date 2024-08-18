-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2024 a las 06:24:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbolmeta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(10) NOT NULL,
  `nom_equipo` text DEFAULT NULL,
  `id_t de usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nom_equipo`, `id_t de usuario`) VALUES
(1, 'los tigres f.c\r\n', 1),
(2, 'halcones de la libertad\r\n', 2),
(3, 'libertadores\r\n', 3),
(4, 'sin limites f.c\r\n', 4),
(5, 'camioneros del llano\r\n', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(10) NOT NULL,
  `nom_grupo` text DEFAULT NULL,
  `id_equipo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nom_grupo`, `id_equipo`) VALUES
(1, 'grupo a', 1),
(2, 'grupob', 2),
(3, 'grupo c', 3),
(4, 'grupo d', 4),
(5, 'grupo e', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `Id_partido` int(5) NOT NULL,
  `Fec_partido` date DEFAULT NULL,
  `campo` text DEFAULT NULL,
  `Id_equipo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`Id_partido`, `Fec_partido`, `campo`, `Id_equipo`) VALUES
(1, '2024-06-07', 'campo santa helena\r\n', 1),
(2, '2024-06-08', 'campo central\r\n', 2),
(3, '2024-06-15', 'campo de las rosas\r\n', 3),
(4, '2024-06-21', 'campo militares\r\n', 4),
(5, '2024-06-22', 'campo baru\r\n', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `id_representante` int(10) NOT NULL,
  `doc_usuario` int(10) DEFAULT NULL,
  `id_equipo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_representante`, `doc_usuario`, `id_equipo`) VALUES
(1, 1039584401, 1),
(2, 1124452860, 2),
(3, 87654321, 3),
(4, 1042367798, 4),
(5, 1034467599, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla de posiciones`
--

CREATE TABLE `tabla de posiciones` (
  `Id_tabla de posiciones` int(20) NOT NULL,
  `puntos` int(10) DEFAULT NULL,
  `Id_grupo` int(20) DEFAULT NULL,
  `Id_equipo` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla de posiciones`
--

INSERT INTO `tabla de posiciones` (`Id_tabla de posiciones`, `puntos`, `Id_grupo`, `Id_equipo`) VALUES
(1, 10, 1, 1),
(2, 8, 2, 2),
(3, 6, 3, 3),
(4, 6, 4, 4),
(5, 4, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `doc_usuario` int(10) DEFAULT NULL,
  `nom_usuario` text DEFAULT NULL,
  `ape_usuario` text DEFAULT NULL,
  `clav_usuario` varchar(10) DEFAULT NULL,
  `tel_usuario` int(10) DEFAULT NULL,
  `direc_usuario` varchar(15) DEFAULT NULL,
  `cor_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `doc_usuario`, `nom_usuario`, `ape_usuario`, `clav_usuario`, `tel_usuario`, `direc_usuario`, `cor_usuario`) VALUES
(1, 1039584401, 'camilo\r\n', 'perez', 'camilo123', 2147483647, 'calle 20', 'camilo2020@gmail.com'),
(2, 1124452860, 'alejandra\r\n', 'rey', '123ale', 312359887, 'carrera 25', 'mariAleja@gmail.com'),
(3, 87654321, 'carlos', 'gonzales', '789cc12c', 314555345, 'calle 12', 'carlitos@gamil.com'),
(4, 1042367798, 'ana', 'ramirez', '321maxana', 316543678, 'avenida liberta', 'anaramirez@gmail.com'),
(5, 1034467599, 'pedro', 'martinez', 'pedromarti', 312554901, 'calle 08', 'pedrito_00@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_t de usuario` (`id_t de usuario`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`Id_partido`),
  ADD KEY `id_equipo` (`Id_equipo`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_representante`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `tabla de posiciones`
--
ALTER TABLE `tabla de posiciones`
  ADD PRIMARY KEY (`Id_tabla de posiciones`),
  ADD KEY `id_equipo` (`Id_equipo`),
  ADD KEY `id_grupo` (`Id_grupo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_t de usuario`) REFERENCES `tipo de usuarios` (`id_t de usuario`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`Id_equipo`) REFERENCES `equipos` (`id_equipo`);

--
-- Filtros para la tabla `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);

--
-- Filtros para la tabla `tabla de posiciones`
--
ALTER TABLE `tabla de posiciones`
  ADD CONSTRAINT `tabla de posiciones_ibfk_1` FOREIGN KEY (`Id_equipo`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `tabla de posiciones_ibfk_2` FOREIGN KEY (`Id_grupo`) REFERENCES `grupos` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
