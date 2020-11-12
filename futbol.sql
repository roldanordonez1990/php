-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2020 a las 09:07:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `dorsal` int(2) NOT NULL,
  `posicion` set('portero','defensa','centrocampista','delantero') NOT NULL,
  `equipo` varchar(50) NOT NULL,
  `goles` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`nombre`, `dni`, `dorsal`, `posicion`, `equipo`, `goles`) VALUES
('Miguelito', '50417392G', 5, 'portero,centrocampista', 'Malaga', '2'),
('ADAN', '50417392L', 7, 'centrocampista,delantero', 'Rutecalidad', '9'),
('Francisco', '50617392G', 8, 'centrocampista,delantero', 'Rutecalidad', '99'),
('Arturito', '51112392G', 5, 'defensa,delantero', 'Cordoba', '3'),
('Ana', '60986122H', 5, 'defensa', 'Cuevas', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
