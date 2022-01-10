-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-01-2022 a las 11:37:06
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--
CREATE DATABASE IF NOT EXISTS `gdlwebcamp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gdlwebcamp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime DEFAULT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(1, 'admin', 'John Doe', '$2y$12$Lg9S5Qd40QKSXFYSEbSzZ.kK6p8wI6z0hi3Y6U9AqIQRd/X8TAhfS', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fas fa-university', NULL),
(2, 'Conferencias', 'fas fa-comment', NULL),
(3, 'Talleres', 'fas fa-code', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(2, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', NULL),
(3, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', NULL),
(4, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', NULL),
(5, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', NULL),
(6, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', NULL),
(7, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', NULL),
(8, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', NULL),
(9, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', NULL),
(10, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', NULL),
(11, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06', NULL),
(12, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', NULL),
(13, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', NULL),
(14, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', NULL),
(15, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', NULL),
(16, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', NULL),
(17, 'Como crear una tienda online que venda millones', '2016-12-10', '10:00:00', 2, 6, 'conf_04', NULL),
(18, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', NULL),
(19, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', NULL),
(21, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03', NULL),
(22, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12', NULL),
(23, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_13', NULL),
(24, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14', NULL),
(25, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15', NULL),
(26, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16', NULL),
(27, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07', NULL),
(28, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08', NULL),
(29, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09', NULL),
(30, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', NULL),
(31, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Sed sagittis hendrerit gravida. Phasellus felis ante, sagittis a pretium nec, malesuada sed augue. Nulla in erat ac augue luctus eleifend. Ut viverra enim lorem, sed imperdiet magna bibendum ut. Proin tincidunt pulvinar orci, ac dignissim nibh semper at. Suspendisse sed varius leo. Aenean vitae dui vestibulum, venenatis tellus vel, malesuada nunc. In vitae odio ligula.', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Aliquam et posuere ipsum. Curabitur feugiat tellus at purus aliquam tincidunt. Fusce eget hendrerit ex. Maecenas eu nibh id lectus scelerisque dignissim ac nec dui. Morbi malesuada scelerisque purus convallis mollis. Praesent vehicula fringilla nulla eget ultrices. Morbi consectetur arcu eu massa finibus commodo. Pellentesque feugiat vitae lectus at maximus. Etiam volutpat massa at quam tincidunt sodales.', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Morbi malesuada scelerisque purus convallis mollis. Praesent vehicula fringilla nulla eget ultrices. Morbi consectetur arcu eu massa finibus commodo. Pellentesque feugiat vitae lectus at maximus. Etiam volutpat massa at quam tincidunt sodales.', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'Maecenas fringilla pretium ultricies. Aliquam ante dui, sollicitudin elementum rutrum ut, lacinia ut est. Morbi suscipit tincidunt nibh eget pretium. Nam facilisis rutrum nulla, nec elementum velit viverra id. Praesent facilisis ante ligula, eu convallis ex faucibus vitae. Nullam erat libero, gravida sit amet sollicitudin eu, sodales eu enim. Nam luctus vitae quam eu convallis. ', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Praesent facilisis ante ligula, eu convallis ex faucibus vitae. Nullam erat libero, gravida sit amet sollicitudin eu, sodales eu enim. Nam luctus vitae quam eu convallis. Morbi consectetur arcu eu massa finibus commodo. Pellentesque feugiat vitae lectus at maximus. Etiam volutpat massa at quam tincidunt sodales.', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', 'Morbi consequat sodales nisl sed elementum. Sed luctus elit et tortor lobortis consequat. Nullam ullamcorper eros quis commodo congue. Phasellus venenatis enim orci, quis laoreet orci cursus a. Maecenas ac sem at justo ultricies maximus id id sapien. Nulla non dolor nisl.', 'invitado6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id_registrado` int(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id_registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`) VALUES
(1, 'Allan Atzin', 'Flores', 'De la Serna', '2022-01-04 14:21:02', '{\"pase_completo\":1,\"etiquetas\":1}', '{\"evento\":[\"sem_01\",\"conf_02\",\"taller_01\",\"conf_05\",\"taller_08\",\"conf_07\",\"taller_14\"]}', 2, '52.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id_registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id_registrado` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
