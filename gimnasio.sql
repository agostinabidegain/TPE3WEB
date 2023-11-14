-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 02:34:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `ejercicio_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `zona` int(11) NOT NULL,
  `requerimientos` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`ejercicio_id`, `nombre`, `zona`, `requerimientos`, `lugar`) VALUES
(1, 'Curl en Polea Baja', 1, 'Polea', 'Gimnasio'),
(2, 'Dominadas Supinas', 1, 'Barra', 'Gimnasio'),
(3, 'Flexiones Diamante', 1, 'Ninguno', 'Gimnasio/Casa'),
(5, 'Fondo de Banco', 2, 'Banco', 'Gimnasio'),
(6, 'Extensiones con Bandas', 2, 'Bandas', 'Gimnasio'),
(7, 'Elevaciones Laterales', 3, 'Mancuernas', 'Gimnasio'),
(8, 'Push Press', 3, 'Pesas', 'Gimnasio'),
(9, 'Flexiones de Hombros', 3, 'Ninguno', 'Gimnasio/Casa'),
(10, 'Puente Isometrico', 4, 'Ninguno', 'Gimnasio/Casa'),
(11, 'Curl Nórdico', 4, 'Ninguno', 'Gimnasio/Casa'),
(12, 'Peso Muerto Rumano', 4, 'Pesa', 'Gimnasio'),
(13, 'Puente de Glúteos', 5, 'Ninguno', 'Gimnasio/Casa'),
(14, 'Patada de Glúteos', 5, 'Ninguno', 'Gimnasio/Casa'),
(15, 'Sentadillas Sumo', 5, 'Ninguno/Algo para dar peso', 'Gimnasio/Casa'),
(16, 'Plancha', 6, 'Ninguno', 'Gimnasio/Casa'),
(17, 'Knee Tuck', 6, 'Ninguno', 'Gimnasio/Casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `zona_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `huesosInvolucrados` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`zona_id`, `nombre`, `ubicacion`, `descripcion`, `huesosInvolucrados`) VALUES
(1, 'Bíceps', 'Brazo', 'Músculo grande y grueso del brazo, formado por dos', 'Húmero'),
(2, 'Tríceps', 'Brazo', 'Músculo de 3 cabezas, a las cuáles se les da el no', 'Húmero'),
(3, 'Hombros', 'Hombro', 'Parte del cuerpo que sirve de nexo entre el brazo ', 'Clavícula, Homóplato y Húmero'),
(4, 'Isquiotibiales', 'Parte posterior del Muslo', 'Grupo de músculos que ayudan a extender la pierna ', 'Isquion'),
(5, 'Glúteos', 'Región glútea', 'Complejo muscular formado por tres vientres muscul', 'Coxal'),
(6, 'Abdominales', 'Abdomen', 'Músculos ubicados en la parte delantera del abdome', 'Costillas inferiores, Vértebras lumbares, y Huesos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`ejercicio_id`),
  ADD KEY `fk_zona_id` (`zona`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`zona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `ejercicio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `zona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`zona`) REFERENCES `zonas` (`zona_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
