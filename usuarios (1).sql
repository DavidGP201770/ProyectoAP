-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2018 a las 10:23:47
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `tipo`, `name`, `last`, `correo`, `direccion`, `telefono`) VALUES
(24, 'Admin1234', '$2y$10$uHnRTCFikSO9W6hPeY6Rku9P.eIp3vbfc8G8xyDlAYsc0gv5JOelm', 'A', 'Veronica', 'Carrasco', 'carrasco.555@live.com', 'Calle Alamo', '5513966397'),
(25, 'Veronica12', '$2y$10$X5tYZz/6ArOrYYiRbeI9yej4CZKgrvijP21dDHkZI78Jf524qeCuO', 'U', 'Veronica', 'Carrasco', 'carrasco.555@live.com', 'Calle Huatzin', '5513966397'),
(32, 'Frank123', '$2y$10$UTQvoAQJRslVQtbABYem2.WfvGO6w6Ty1T/KhQNeaFbJr0KdQbrYe', 'U', 'Frank', 'Carrasco', 'franco@live.com', 'huatzin', '5513966397');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
