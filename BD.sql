-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2024 a las 05:10:39
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Cod_Coments` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_publicaciones` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `comentarios` varchar(255) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_respuestas` int(11) NOT NULL,
  `respuestas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `evento` varchar(25) DEFAULT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_fin` datetime DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `id_usuario`, `evento`, `hora_inicio`, `hora_fin`, `fecha`) VALUES
(1, 0, 'responsabilidad', '2024-08-30 08:29:00', '2024-08-30 23:34:00', '2024-08-30'),
(27, 0, 'hola', '2024-08-31 09:53:00', '2024-08-31 16:56:00', '2024-08-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id_form` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) NOT NULL,
  `codigo_de_estudiante` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `actividad` varchar(25) NOT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id_form`, `nombre`, `apellidos`, `codigo_de_estudiante`, `email`, `telefono`, `actividad`, `id_evento`, `mensaje`, `fecha`, `estado`) VALUES
(5, 'Rodrigamer', 'S', 2021017321, '2022015197@unfv.edu.pe', 947681666, '27', NULL, 'eaesd', '2024-08-26', 'rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicaciones` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicaciones`, `id_usuario`, `titulo`, `descripcion`, `imagen`, `fecha_publicacion`) VALUES
(5, NULL, 'a', 'da', 0x75706c6f6164732f696d616765732e6a666966, '2024-08-25 04:14:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cod_usuario` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `facultad` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_rol` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `confirmado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cod_usuario`, `nombres`, `apellidos`, `facultad`, `usuario`, `clave`, `correo`, `created_at`, `updated_at`, `id_rol`, `token`, `confirmado`) VALUES
(11, 'victor', 'santamaria', 'Informatica', 'criugg', 'valorant', '2021017321@unfv.edu.pe', '2024-08-26 00:54:38', '2024-08-26 00:54:38', 1, '14b03b7efe718f2d967a56b877ef7ae0', NULL),
(12, 'delia', 'machaca', 'Informatica', 'power', 'queso', '2021017321@unfv.edu.pe', '2024-08-25 03:54:09', '2024-08-25 03:54:09', NULL, '08f97b3677d30105ede2ed6192c91c35', NULL),
(13, 'delia', 'machaca', 'Informatica', 'power', 'queso', '2021017321@unfv.edu.pe', '2024-08-25 03:54:20', '2024-08-25 03:54:20', NULL, '0528c1971ca708374f862518e949b14a', NULL),
(14, 'delia', 'machaca', 'Informatica', 'power', 'queso', '2021017321@unfv.edu.pe', '2024-08-25 03:54:31', '2024-08-25 03:54:31', NULL, 'acf5bb2c8066a41af091329b2d41f43e', NULL),
(15, 'delia', 'machaca', 'Informatica', 'power', 'queso', '2021017321@unfv.edu.pe', '2024-08-25 03:54:41', '2024-08-25 03:54:41', NULL, '38c912741fdab517480babddd75b3538', NULL),
(16, 'leonel', 'ventura', 'Informatica', 'lexinFIEI', 'va', '2021017321@unfv.edu.pe', '2024-08-25 04:06:23', '2024-08-25 04:06:23', 1, '4638d1a84e0c13e5f7a81491c0499213', NULL),
(17, 'jacinto', 'pepito', 'Mecatronica', 'harold', '123', '2021017321@unfv.edu.pe', '2024-08-26 00:56:19', '2024-08-26 00:56:19', NULL, 'e7e1ed29312937a6a910dc831bee7c67', NULL),
(18, 'jacinto', 'pepito', 'Mecatronica', 'harold', '123', '2021017321@unfv.edu.pe', '2024-08-26 00:56:29', '2024-08-26 00:56:29', NULL, '2e9a378e56116f17522a4776e19e8b0b', NULL),
(19, 'favio', 'dasda', 'Electronica', 'ASDA', '31201', '2021017321@unfv.edu.pe', '2024-08-26 01:05:47', '2024-08-26 01:05:47', NULL, '28b11e2031bcda91e83eb06c961c175f', NULL),
(20, 'favio', 'dasda', 'Electronica', 'ASDA', '31201', '2021017321@unfv.edu.pe', '2024-08-26 01:06:58', '2024-08-26 01:06:58', NULL, '011fa37d770fff7b32efc0b1a490bf3a', NULL),
(21, 'favio', 'dasda', 'Electronica', 'ASDA', '31201', '2021017321@unfv.edu.pe', '2024-08-26 01:14:07', '2024-08-26 01:14:07', NULL, '4d125a8b945cc0a49ebe85ff4c5002c0', NULL),
(22, 'dasasdasd', 'd', 'Mecatronica', 'ley', '234', '2021017321@unfv.edu.pe', '2024-08-26 01:15:12', '2024-08-26 01:15:12', NULL, 'b9bd6415daa04d14d0dab9bda9827720', NULL),
(23, 'leonel', 'ventura', 'Informatica', 'lexin', 'fiei', '2021017321@unfv.edu.pe', '2024-08-26 01:20:39', '2024-08-26 01:20:39', 2, '037601b8b7e6135e277f11cc9b520d2b', NULL),
(24, 'choro', '3000', 'Electronica', 'manco', '123', '2022015197@unfv.edu.pe', '2024-08-26 01:23:11', '2024-08-26 01:23:11', 2, 'f5f1508c3ab7904196ca8ac9356ac53e', NULL),
(25, 'lalo', 'd', 'Mecatronica', 'dasdafa', '123', '2021017321@unfv.edu.pe', '2024-08-26 01:24:49', '2024-08-26 01:24:49', 2, 'c9b51ad9ea471cf88d23b5466bcd385a', NULL),
(26, 'leonel', 'd', 'Telecomunicaciones', 'pan', 'conpolo', '2022015197@unfv.edu.pe', '2024-08-26 01:26:44', '2024-08-26 01:26:44', 2, '88b318a24be0c6ea4f50cb47de18456b', NULL),
(27, 'mano', 'mana', 'Telecomunicaciones', 'd', '432', '2022015197@unfv.edu.pe', '2024-08-26 01:29:40', '2024-08-26 01:29:40', 2, '783a802adaaa71b27a32578c2a270024', NULL),
(28, 'dasasdasd', 'dasdas', 'Informatica', 'vendaval', '123', '2021017321@unfv.edu.pe', '2024-08-26 01:32:13', '2024-08-26 01:32:13', 2, '092abdcc2906ead6f7e4b157e84b2f36', NULL),
(29, 'dasasdasd', 'dasdas', 'Informatica', 'vendaval', '123', '2021017321@unfv.edu.pe', '2024-08-26 01:35:12', '2024-08-26 01:35:12', 2, '38ef7c22eec3d0c6a889f248a27fb348', NULL),
(30, 'dasasdasd', 'dasdas', 'Informatica', 'vendaval', '123', '2021017321@unfv.edu.pe', '2024-08-26 01:37:18', '2024-08-26 01:37:18', 2, '60592a207e6a4274ee0f890785b0035c', NULL),
(31, 'dasasdasd', 'dasdas', 'Informatica', 'vendaval', '123', '2021017321@unfv.edu.pe', '2024-08-26 01:38:05', '2024-08-26 01:38:05', 2, 'fc1aef97946bd2fc3e40e90c942e115c', NULL),
(32, 'leo', 'pan', 'Electronica', 'wexin', 'lol', '2022015197@unfv.edu.pe', '2024-08-26 01:43:26', '2024-08-26 01:43:26', 2, '7a49a7974256d5ecffce39129079b2a8', NULL),
(33, 'leo', 'pan', 'Electronica', 'wexin', 'lol', '2022015197@unfv.edu.pe', '2024-08-26 01:45:32', '2024-08-26 01:45:32', 2, '09ccdf9929206d9e89c84b7755ccc970', NULL),
(34, 'leonel', 'ventura', 'Mecatronica', 'estate', '1234', '2021017321@unfv.edu.pe', '2024-08-26 01:52:54', '2024-08-26 01:52:54', 2, 'afadf79519bb7952f6528b31b738de94', NULL),
(35, 'sergio', 'vidal', 'Informatica', 'volk', '1234', '2022015197@unfv.edu.pe', '2024-08-26 01:54:38', '2024-08-26 01:54:38', 2, '0ddcdf3e379792876f75eb9f05de72e5', NULL),
(36, 'leonel', 'ventura', 'Mecatronica', '321314', '213123', '2022015197@unfv.edu.pe', '2024-08-26 02:02:15', '2024-08-26 02:02:15', 2, '4744ce249a686b876c0eb3adb1dbfe07', NULL),
(37, 'leonel', 'santamaria', 'Informatica', 'paco', 'merte', '2022015197@unfv.edu.pe', '2024-08-26 02:08:13', '2024-08-26 02:08:13', 2, '89e90fb96e8ce97671b9277de521594f', NULL),
(38, 'leonel', 'lopez', 'Mecatronica', 'estrañorte', 'atata', '2021017321@unfv.edu.pe', '2024-08-26 02:08:43', '2024-08-26 02:08:43', 2, '4cc510f60a57e92bed2b68bcfb25925b', NULL),
(39, 'leonel', 'falopa', 'Informatica', 'lexinFIEI', '4123', '2021017321@unfv.edu.pe', '2024-08-26 02:40:45', '2024-08-26 02:40:45', 1, '9e1d2deb868a952edf1aa5210538f3ea', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Cod_Coments`),
  ADD KEY `id_publicaciones` (`id_publicaciones`),
  ADD KEY `id_respuestas` (`id_respuestas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`codigo_de_estudiante`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicaciones`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cod_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Cod_Coments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`Cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_publicaciones`) REFERENCES `publicaciones` (`id_publicaciones`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_respuestas`) REFERENCES `respuestas` (`id_respuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`Cod_usuario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`Cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
