-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2022 a las 00:07:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `id_categoria`, `nombre`, `ruta`, `fecha`) VALUES
(1, 1, 'Alcancia Pequeña', 'alcancia-pequena', '0000-00-00 00:00:00'),
(2, 1, 'Juguete para Niño', 'juguete-para-nino', '0000-00-00 00:00:00'),
(3, 1, 'Decoración Habitación', 'decoracion-habitacion', '0000-00-00 00:00:00'),
(4, 1, 'Accesorios para Dama', 'accesorios-para-dama', '0000-00-00 00:00:00'),
(5, 2, 'Jarrón Decoración', 'jarron-decoracion', '0000-00-00 00:00:00'),
(6, 2, 'Vasija para Cocina', 'vasija-para-cocina', '0000-00-00 00:00:00'),
(7, 2, 'Decoración Sala', 'decoracion-sala', '0000-00-00 00:00:00'),
(8, 2, 'Taza para Sopa', 'taza-para-sopa', '0000-00-00 00:00:00'),
(9, 3, 'Arete para Dama', 'arete-para-dama', '0000-00-00 00:00:00'),
(10, 3, 'Anillo para Hombre', 'anillo-para-hombre', '0000-00-00 00:00:00'),
(11, 3, 'Collar para Mujer', 'collar-para-mujer', '0000-00-00 00:00:00'),
(12, 3, 'Decoración Cuadro', 'decoracion-cuadro', '0000-00-00 00:00:00'),
(13, 4, 'Cuadro Habitación', 'cuadro-habitacion', '0000-00-00 00:00:00'),
(14, 4, 'Nombre en Madera', 'nombre-en-madera', '0000-00-00 00:00:00'),
(15, 4, 'Decoración en Madera', 'decoracion-en-madera', '0000-00-00 00:00:00'),
(16, 4, 'Recordatorio en Madera', 'recordatorio-en-madera', '0000-00-00 00:00:00'),
(17, 5, 'Bolso para Dama', 'bolso-para-dama', '0000-00-00 00:00:00'),
(18, 5, 'Sombrero para Hombre', 'sombrero-para-hombre', '0000-00-00 00:00:00'),
(19, 5, 'Sombrero para Dama', 'sombrero-para-dama', '0000-00-00 00:00:00'),
(20, 5, 'Muñeca Decoración', 'muneca-decoracion', '0000-00-00 00:00:00'),
(21, 6, 'Auto decoración', 'auto-decoracion', '0000-00-00 00:00:00'),
(22, 6, 'Base para Matera', 'base-para-matera', '0000-00-00 00:00:00'),
(23, 6, 'Jaula', 'Jaula', '0000-00-00 00:00:00'),
(24, 6, 'Base para Cuadro', 'base-para-cuadro', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
