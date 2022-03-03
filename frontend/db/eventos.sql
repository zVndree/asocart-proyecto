-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2022 a las 00:29:54
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
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `titulo_evento` text NOT NULL,
  `dia` DATE NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_fin` TIME NOT NULL,
  `tipo` text NOT NULL,
  `icono` text NOT NULL,
  `autor` text NOT NULL,
  `restrincion` text NOT NULL,
  `lugar` text NOT NULL,
  `tope` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descripcion`, `titulo_evento`, `dia`, `hora_inicio`, `hora_fin`, `tipo`, `icono`, `autor`, `restrincion`, `lugar`, `tope`, `ruta`, `fecha_creacion`) VALUES
(1, '¡Bienvenido a la Sesión de Eventos!', 'Tenemos variedad de encuentros a los que puedes participar junto con familiares y amigos. Puedes encontrar desde conferencias, talleres, seminarios y muchas mas actividades a elegir, ven y participa con nosotros. ¡TE ESPERAMOS!.', 'costura a mano', '2022-02-28', '14:00:00', '16:00:00', 'taller', 'views/img/plantilla/talleres.png', 'Ilustre Jairo Quinta y Mateo Ceballos', 'asociación de artesanos', 'coliseo Pepe Zabala', 1000, '#taller', '2022-02-27 23:06:58'),
(2, '', '', 'la importancia de las artesanias', '2022-02-28','18:00:00','20:00:00', 'conferencia', 'views/img/plantilla/conferencia.png', 'Profesor Manuel Elkin Patarroyo', 'mayores de edad', 'Colegio Atanasio Girardot', 100, '#conferencia', '2022-02-27 23:07:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
