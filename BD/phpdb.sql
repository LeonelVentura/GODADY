-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2024 a las 05:40:14
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
-- Base de datos: `phpdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Cod_Coments` int(25) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `comentarios` varchar(3000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `respuesta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Cod_Coments`, `nombre`, `comentarios`, `fecha`, `respuesta`) VALUES
(82, 'victor santamaria', 'd', '2024-07-05 01:53:10', '0'),
(83, '', 'ds', '2024-07-05 01:53:14', '0'),
(85, 'victor santamaria', 'dasd', '2024-07-05 01:57:44', '0'),
(86, 'victor santamaria', 'gaa\r\n', '2024-07-05 01:57:55', '0'),
(87, 'victor santamaria', 'das', '2024-07-05 02:01:16', '0'),
(88, 'victor santamaria', 'gaa', '2024-07-05 02:06:14', '0'),
(89, 'victor santamaria', ' hola\r\n', '2024-07-05 02:06:50', '0'),
(90, 'victor santamaria', 'das', '2024-07-05 02:09:38', '0'),
(91, 'victor santamaria', 'buen dia', '2024-07-05 02:12:22', '0'),
(92, 'victor santamaria', 'das', '2024-07-05 02:21:12', '0'),
(93, 'victor santamaria', 'holaaa\r\n', '2024-07-05 02:21:26', '0'),
(94, 'victor santamaria', 'da', '2024-07-05 02:21:58', '0'),
(95, 'victor santamaria', '', '2024-07-05 02:26:30', '0'),
(96, 'victor santamaria', 'interesante', '2024-07-05 02:31:02', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicaciones` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` longblob NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicaciones`, `titulo`, `descripcion`, `imagen`, `fecha_publicacion`) VALUES
(4, 'Responsabilidad Social en Barranco', 'dasdfas', 0x727574612f646f6e64652f677561726461722f696d6167656e65732f32313865326639383339643734396432623835366537333062366138626337392e706e67, '2024-07-12 01:42:51'),
(5, 'Responsabilidad inter', 'dasdfas', 0x727574612f646f6e64652f677561726461722f696d6167656e65732f32313865326639383339643734396432623835366537333062366138626337392e706e67, '2024-07-12 01:43:03'),
(6, 'Responsabilidad inter', 'dasdfas', 0x727574612f646f6e64652f677561726461722f696d6167656e65732f576861747341707020496d61676520323032342d30362d33302061742031322e30392e313520504d2e6a706567, '2024-07-12 01:45:42'),
(7, 'Responsabilidad inter', 'dasdfas', 0x727574612f646f6e64652f677561726461722f696d6167656e65732f576861747341707020496d61676520323032342d30362d33302061742031322e30392e313520504d2e6a706567, '2024-07-12 01:46:21'),
(8, 'Responsabilidad internal', 'gaa', 0x75706c6f6164732f576861747341707020496d61676520323032342d30362d33302061742031312e30302e343820414d2e6a706567, '2024-07-12 01:53:28'),
(9, 'dasda', 'fasda', 0x75706c6f6164732f576861747341707020496d61676520323032342d30362d323520617420372e34372e333820504d202831292e6a706567, '2024-07-12 01:57:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `Nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cod_Usuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `facultad` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cod_Usuario`, `nombres`, `apellidos`, `facultad`, `usuario`, `clave`, `correo`, `created_at`, `updated_at`, `token`, `confirmado`) VALUES
(1, 'gael', 'casdasd', 'Mecatronica', 'gaelx', 'valorant2003', '2021017323@unfv.edu.pe', '2024-07-03 19:31:10', '2024-07-03 19:31:10', NULL, 0),
(2, 'victor', 'santamaria', '', 'CrewHH', 'valorant20030921', '2021017321@unfv.edu.pe', '2024-06-23 19:35:39', '2024-06-23 19:35:39', NULL, 0),
(3, 'leonel', 'lopez', 'Informatica', 'lexinFIEI', 'dasdasds', '2020183381@unfv.edu.pe', '2024-06-24 03:20:15', '2024-06-24 03:20:15', NULL, 0),
(4, 'Gerardo', 'Machaca', 'Informatica', 'Volk', 'ben123', '2021017348@unfv.edu.pe', '2024-07-03 14:06:53', '2024-07-03 14:06:53', NULL, 0),
(5, 'harold ', 'ortiz', 'Electronica', 'daisuke', '0000', '2021017312@unfv.edu.pe', '2024-07-03 21:54:24', '2024-07-03 21:54:24', NULL, 0),
(6, 'Gerardo', 'dasda', 'Informatica', 'valentina', 'valentina', '2020512381@unfv.edu.pe', '2024-07-10 19:27:37', '2024-07-10 19:27:37', NULL, 0),
(7, 'Gerardo', 'dasda', 'Informatica', 'valentina', 'valentina', '2020512381@unfv.edu.pe', '2024-07-10 19:28:16', '2024-07-10 19:28:16', NULL, 0),
(8, 'valeria', 'perez', 'Electronica', 'valery', '0000', '2021017321@unfv.edu.pe', '2024-07-10 19:28:50', '2024-07-10 19:28:50', NULL, 0),
(9, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:25', '2024-07-11 22:39:25', 'e405b0ee01339c0ba294efc94da29b8fada4c51c09ed3687abace25c75fed103d86bc5c1f42bd3f46e72f44d86a57c735242', 0),
(10, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:28', '2024-07-11 22:39:28', '7614cca61b09424f257df5ab271512ef68935ed823cb6a3ee14a568f9a85f0a9a395bdf4b000618e7329e0ed4ec4260f9014', 0),
(11, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:30', '2024-07-11 22:39:30', 'd62dd60d77d508c795e06a3b2e091d150afa970456d0969c513d567c59eabb980ca910e8421bc6a971f9005f80eab10d27e0', 0),
(12, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:32', '2024-07-11 22:39:32', '082e4c715dc737578ec04c396e55bd93f9667043ff31a85ab64235fb0c933b90f7df203b14f73dbf528a90318ec908e0c975', 0),
(13, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:34', '2024-07-11 22:39:34', '5f6a51ae92de66e47b63d0eb4f39f5fe9645990679809744f6749eb980ac0208e4810a96dd373f117a0219a59d266bb67fdd', 0),
(14, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:37', '2024-07-11 22:39:37', 'a5e91bf829955dc654d6a61044b9af57db371245af40b967fe44046332424e3869eebb99e8a84d9255df6b1c6e3de991e9a7', 0),
(15, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:39', '2024-07-11 22:39:39', '10cb5700003cdf89bc9a43ce5ffa9ccc9911d0c047fdd4e3e70b98c87d0f1458b289802e3dec323ea60bc507386d79971ef3', 0),
(16, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:41', '2024-07-11 22:39:41', '5a7f0460c779f062c698c096648d62ac56d21d890bf76b3df59460e6383d430f31a85ed7c8352431046d1ae8333ef15ce916', 0),
(17, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 22:39:43', '2024-07-11 22:39:43', '8c3e444f26aab684025b324979a58cba5a7e01da18464a486acae303d68372f132499b1293ab2629ac109233b5c63dbfe698', 0),
(18, 'lalo', 'tarrasca', 'Mecatronica', 'power', '0000', '2021017321@unfv.edu.pe', '2024-07-11 23:07:23', '2024-07-11 23:07:23', 'f8d0537f4e7dbac6b4ea1ae84c66d76d', 0),
(19, 'asdas', 'dasdqe', 'Electronica', 'powder', '1111', '2021017321@unfv.edu.pe', '2024-07-11 23:07:44', '2024-07-11 23:07:44', '29153c019bc70b8e6411e21da0df9190', 0),
(20, 'asdas', 'dasdqe', 'Electronica', 'powder', '1111', '2021017321@unfv.edu.pe', '2024-07-11 23:09:10', '2024-07-11 23:09:10', '3a55342f80f60637a8870ea4748a2d4a', 0),
(21, 'gabo', 'enrique', 'Telecomunicaciones', 'yes', 'tiktok', '2021017321@unfv.edu.pe', '2024-07-11 23:38:03', '2024-07-11 23:38:03', '30b51f72c093237a16123b4b2cbda8f4', 0),
(22, 'alanis', 'espinoza', 'Mecatronica', 'ally', '9999', '2021017321@unfv.edu.pe', '2024-07-11 23:47:31', '2024-07-11 23:47:31', '31a3cb73a98a5d838b1cab6ff2fddd6d', 0),
(23, 'brenda', 'perez', 'Informatica', 'Marisol', '2222', '2021017321@unfv.edu.pe', '2024-07-11 23:54:56', '2024-07-11 23:57:24', 'd951a9a1ccf7ef6b4dbb965afd5a1823', 1),
(24, 'brisa ', 'arias', 'Mecatronica', 'bri_arias', '1802', '2021017321@unfv.edu.pe', '2024-07-12 00:16:28', '2024-07-12 00:17:11', 'f3fa6533dff88804bd1ab27367e563e8', 1),
(25, 'paolo', 'guerrero', 'Telecomunicaciones', 'max', '0000', '2021017321@unfv.edu.pe', '2024-07-12 02:03:28', '2024-07-12 02:05:23', '8bfb9e107e80854943473487a2de9682', 1),
(26, 'paolo', 'ventura', 'Mecatronica', 'criugg', '0000', '2021017321@unfv.edu.pe', '2024-07-12 02:55:20', '2024-07-12 02:56:33', '96bc727bdd4e3f3d2c2bb1a180972791', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Cod_Coments`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicaciones`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cod_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Cod_Coments` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Cod_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
