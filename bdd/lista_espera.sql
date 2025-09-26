-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2025 a las 23:07:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lista_espera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(100) NOT NULL,
  `usuario_apellido` varchar(100) NOT NULL,
  `usuario_correo` varchar(200) NOT NULL,
  `usuario_telefono` varchar(12) NOT NULL,
  `usuario_fecha_cita` datetime NOT NULL,
  `usuario_fecha_atencion` datetime DEFAULT NULL,
  `usuario_fecha_atendido` datetime DEFAULT NULL,
  `usuario_estatus` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_correo`, `usuario_telefono`, `usuario_fecha_cita`, `usuario_fecha_atencion`, `usuario_fecha_atendido`, `usuario_estatus`) VALUES
(1, 'Stefano', 'Casa', 'stefano007casa@gmail.com', '04149664100', '2025-09-26 17:59:00', '2025-09-26 17:02:47', '2025-09-26 17:02:51', '3'),
(2, 'Rino', 'Casa', 'rino@gmail.com', '04146747458', '2025-10-30 00:00:00', NULL, NULL, '1'),
(3, 'Susana', 'Izarra', 'susana@gmail.com', '04146736617', '2025-10-08 15:03:00', '2025-09-26 17:03:10', NULL, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
