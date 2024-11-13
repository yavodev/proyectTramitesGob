-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 19:40:55
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
-- Base de datos: `solicitudes_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `archivo_identidad` varchar(255) DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(255) NOT NULL DEFAULT 'en revisión',
  `archivo_formulario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `nombre_completo`, `correo_electronico`, `numero_documento`, `archivo_identidad`, `fecha_solicitud`, `estado`, `archivo_formulario`) VALUES
(1, 'ANDRES', 'ANDRES@GMAIL.COM', '1090325632', '', '2024-10-17 22:55:08', 'rechazada', NULL),
(2, 'DANIELA LOPEZ', 'DANIELA@GMAIL.COM', '1093744566', '', '2024-10-17 23:03:00', 'rechazada', NULL),
(3, 'DANIELA LOPEZ', 'DANIELA@GMAIL.COM', '1093744566', '', '2024-10-17 23:04:13', 'aprobada', NULL),
(4, 'DANIELA LOPEZ', 'DANIELA@GMAIL.COM', '1093744566', '', '2024-10-17 23:04:16', 'rechazada', NULL),
(5, 'CARLOS VARGAS', 'CARLOS@GMAIL.COM', '20061469', '', '2024-10-17 23:04:58', 'rechazada', NULL),
(6, 'YERSON VARGAS', 'YERSON@GMAIL.COM', '1095888665', '', '2024-10-17 23:06:55', 'rechazada', NULL),
(7, 'YERSON VARGAS', 'YERSON@GMAIL.COM', '1095888665', '', '2024-10-17 23:07:43', 'rechazada', NULL),
(8, 'ANDRES', 'ANDRES@GMAIL.COM', '1090325632', '', '2024-10-17 23:10:03', 'rechazada', NULL),
(9, 'luna vargas', 'luna@gmail.com', '10002556', '', '2024-10-17 23:15:06', 'rechazada', NULL),
(10, 'pablo magnun', 'magnun@gmail.com', '60322254', '', '2024-10-17 23:22:42', 'rechazada', NULL),
(11, 'ximena vargas', 'xime@gmail.com', '1093566244', '', '2024-10-18 15:25:58', 'rechazada', NULL),
(12, 'FELIPE VARGAS', 'PIPE@GMAIL.COM', '10932555444', '', '2024-10-18 15:35:29', 'rechazada', NULL),
(13, 'ANDRES', 'ANDRES@GMAIL.COM', '1090325632', '', '2024-10-18 15:36:52', 'rechazada', NULL),
(14, 'ANDRES', 'ANDRES@GMAIL.COM', '1090325632', '', '2024-10-18 15:48:58', 'rechazada', NULL),
(15, 'JUAN  VELEZ', 'JUAN@GMAIL.COM', '1093655244', '', '2024-10-18 16:12:46', 'rechazada', NULL),
(16, 'JUAN  VELEZ', 'JUAN@GMAIL.COM', '1093655244', '', '2024-10-18 16:15:51', 'rechazada', NULL),
(17, 'JUAN  VELEZ', 'JUAN@GMAIL.COM', '1093655244', '', '2024-10-18 16:16:01', 'rechazada', NULL),
(18, 'JUAN  VELEZ', 'JUAN@GMAIL.COM', '1093655244', '', '2024-10-18 16:26:47', 'rechazada', NULL),
(19, 'CARLOS VARGAS', 'CARLOS@GMAIL.COM', '20061469', '', '2024-10-18 16:27:20', 'rechazada', NULL),
(20, 'FELIPE VARGAS', 'PIPE@GMAIL.COM', '10932555444', '', '2024-10-18 16:29:54', 'aprobada', NULL),
(21, 'KAROL VARGAS', 'KAROL@GMAIL.COM', '1093555777', '', '2024-10-18 16:32:48', 'aprobada', NULL),
(22, 'JORGE MURCIA', 'JORGE@GMAIL.COM', '6055442', '', '2024-10-18 16:43:07', 'aprobada', NULL),
(23, 'angelina murcia', 'ange@gmail.com', '1093444555', 'Coursera ZZB0STB582AZ.pdf', '2024-10-18 17:04:50', 'en revisión', NULL),
(24, 'ENRIQUE SEXTO', 'ENRIQUE@GMAIL.COM', '1098766877', 'Coursera ZZB0STB582AZ.pdf', '2024-10-18 18:15:07', 'en revisión', NULL),
(25, 'ANDRES vargas', 'ANDRES@GMAIL.COM', '60322254', '', '2024-10-18 19:22:40', 'aprobada', NULL),
(26, 'ANDRES vargas', 'ANDRES@GMAIL.COM', '60322254', '', '2024-10-18 19:23:00', 'rechazada', NULL),
(27, 'MARIA BUENA', 'MARIA@GMAIL.COM', '123456789', '2.CEDULAAndres.pdf', '2024-10-18 20:16:45', 'en revisión', NULL),
(28, 'MARIA BUENA', 'MARIA@GMAIL.COM', '123456789', '2.CEDULAAndres.pdf', '2024-10-18 20:17:12', 'aprobada', NULL),
(29, 'LUCHO DIAZ', 'LUCHO@GMAIL.COM', '987654321', '5.certificadoDeSalud.pdf', '2024-10-18 21:14:10', 'en revisión', NULL),
(30, 'MESSI RONALDO', 'MESSI@GMAIL.COM', '1020304050', '5.certificadoDeSalud.pdf', '2024-10-18 21:25:15', 'en revisión', NULL),
(31, 'ROSA GAMBINDO', 'GAMITOXX@GMAIL.COM', '54187/466', 'CUENTO ADAPTACION.docx', '2024-10-18 21:32:36', 'rechazada', NULL),
(32, 'lorenzo vargas lopez', 'lorenzo@gmail.com', '202024', '2.CEDULAAndres.pdf', '2024-10-20 17:36:59', 'aprobada', NULL),
(33, 'ANDRES', 'ANDRES@GMAIL.COM', '1093766734', 'Coursera OKYVN8K71DUP.pdf', '2024-10-20 17:40:59', 'en revisión', NULL),
(34, 'ALEJANDRO MAGNUN', 'MAGNUN@GMAIL.COM', '111222333', 'B16-Ministerio de Transporte (2).xls', '2024-10-20 19:01:53', 'en revisión', NULL),
(35, 'SALOMON SABIO', 'SABIO@GMAIL.COM', '7777777', 'Coursera OKYVN8K71DUP (1).pdf', '2024-10-21 16:28:20', 'aprobada', 'B16-Ministerio de Transporte (2).xls'),
(36, 'SABIO SALOMON', 'SALOMON@GMAIL.COM', '255225', 'Coursera OKYVN8K71DUP (1).pdf', '2024-10-21 16:30:52', 'rechazada', 'B16-Ministerio de Transporte (3).xls'),
(37, 'Marlon Carvajalino', 'marlon@gmail.com', '1093455666', 'Coursera OKYVN8K71DUP (1).pdf', '2024-10-21 19:27:04', 'aprobada', 'B16-Ministerio de Transporte (4).xls'),
(38, 'SANDRA PATRICIA GOMEZ', 'SANDRA@GMAIL.COM', '60385267', 'Coursera OKYVN8K71DUP (1) (1).pdf', '2024-10-21 21:10:09', 'aprobada', 'B16-Ministerio de Transporte (2).xls'),
(39, 'LORENA DURAN', 'LORENA@GMAIL.COM', '37277570', 'SoporteDePago.General.4574357083.072612334775.pdf', '2024-10-22 22:53:21', 'aprobada', 'B16-Ministerio de Transporte (6).xls');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
