-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2025 a las 17:38:10
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
CREATE DATABASE IF NOT EXISTS `solicitudes_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `solicitudes_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_recibos`
--

CREATE TABLE `pagos_recibos` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `numero_documento` bigint(20) NOT NULL,
  `recibo_pago` varchar(255) DEFAULT NULL,
  `certificados_enviados` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `numero_radicado` varchar(255) DEFAULT NULL,
  `correo_enviado` tinyint(1) DEFAULT 0,
  `certificado_enviado` tinyint(4) DEFAULT 0,
  `comentarios` text DEFAULT NULL,
  `solicitud_id` int(11) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT 'pendiente',
  `documento` varchar(255) DEFAULT NULL,
  `asunto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos_recibos`
--

INSERT INTO `pagos_recibos` (`id`, `nombre_completo`, `numero_documento`, `recibo_pago`, `certificados_enviados`, `fecha_solicitud`, `numero_radicado`, `correo_enviado`, `certificado_enviado`, `comentarios`, `solicitud_id`, `correo`, `estado`, `documento`, `asunto`) VALUES
(1, 'vicente fernandez', 13705111, '1737603780_recibo pago.pdf', NULL, '2025-01-23 03:43:00', '20250122003', 1, NULL, 'pago aprobado', NULL, 'robert1uno@hotmail.com', 'aprobado', NULL, 'Levantamiento de limitacion o gravamen a un vehiculo automotor'),
(2, 'noveno intento', 1092363153, '1737686745_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 02:45:45', '20250123009', 1, NULL, 'aprobado', NULL, 'est_an_riano@fesc.edu.co', 'aprobado', NULL, 'Levantamiento de limitacion o gravamen a un vehiculo automotor'),
(3, 'intento decimo tercero', 0, '1737688067_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 03:07:47', '20250123013	', 1, NULL, 'intento # 13 recibo de pago', NULL, 'robert1uno@hotmail.com', 'aprobado', NULL, NULL),
(4, 'intento doce', 1092363153, '1737688199_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 03:09:59', '20250123012', 1, NULL, 'intento 12', NULL, 'est_an_riano@fesc.edu.co', 'aprobado', NULL, 'Levantamiento de limitacion o gravamen a un vehiculo automotor'),
(5, 'christian rabelo', 88246870, '1737689713_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 03:35:13', '20250123014', 1, NULL, '12345', NULL, 'robert1uno@hotmail.com', 'aprobado', NULL, 'Duplicado de placas de un vehiculo automotor'),
(8, 'robert rojas', 0, '1737723819_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 13:03:39', '12345', 0, NULL, NULL, NULL, NULL, 'en revision', NULL, NULL),
(9, 'robert rojas', 111111, '1737727424_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 14:03:44', '20250124001', 1, NULL, 'prueba de pago rechazado', NULL, 'robert1uno@hotmail.com', 'rechazado', NULL, 'Traspaso de propiedad de un vehiculo automotor'),
(10, 'angel guzman', 0, '1737727976_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 14:12:56', '20250124002.', 0, NULL, NULL, NULL, NULL, 'en revision', NULL, NULL),
(11, 'angel rojas', 1092363153, '1737728291_identidad_identidad_identidad_1737603780_recibo pago.pdf', 'certificados_enviados/poder_prueba.pdf', '2025-01-24 14:18:11', '20250124003', 1, 1, 'yes', NULL, 'est_an_riano@fesc.edu.co', 'aprobado', NULL, 'Certificado de libertad y tradicion de un vehiculo automotor'),
(12, 'Angel riano', 0, '1737733420_identidad_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 15:43:40', '20250124004.', 0, NULL, NULL, NULL, NULL, 'en revision', NULL, NULL),
(13, 'Angel riano', 456789, '1737733690_identidad_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-24 15:48:10', '20250124005', 1, NULL, 'aprobado', NULL, 'angelriadev@gmail.com', 'aprobado', NULL, 'Levantamiento de limitacion o gravamen a un vehiculo automotor'),
(14, 'silvestre dangon', 1234567, '1737992419_identidad_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-27 15:40:19', '20250127001', 1, NULL, 'yes', NULL, 'est_an_riano@fesc.edu.co', 'en revision', NULL, 'Certificado de libertad y tradicion de un vehiculo automotor'),
(15, 'Carlos orozco', 88002105, '1738010020_identidad_identidad_identidad_identidad_identidad_1737603780_recibo pago.pdf', NULL, '2025-01-27 20:33:40', '20250127002', 1, NULL, 'pago efectivo', NULL, 'abacoservice1@gmail.com', 'aprobado', NULL, 'Certificado de libertad y tradicion de un vehiculo automotor'),
(17, 'laura pausini', 1092363153, '1738330007_poder_prueba.pdf', NULL, '2025-01-31 13:26:47', '20250131004', 1, NULL, 'pago verificado', NULL, 'est_an_riano@fesc.edu.co', 'en revision', NULL, 'Certificado de Libertad y Tradicion de un vehiculo automotor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `archivo_identidad` varchar(255) DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(255) NOT NULL DEFAULT 'en revisión',
  `asunto` varchar(255) NOT NULL,
  `archivo_formulario` varchar(255) DEFAULT NULL,
  `poder` varchar(255) NOT NULL,
  `tarjeta_propiedad` varchar(255) NOT NULL,
  `usuarios_documento` int(11) NOT NULL,
  `ReciboPago` varchar(255) NOT NULL,
  `fecha_respuesta` timestamp NOT NULL DEFAULT current_timestamp(),
  `radicado` varchar(30) NOT NULL,
  `correo_enviado` tinyint(1) DEFAULT 0,
  `comentarios` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `usuario_id`, `nombre_completo`, `correo_electronico`, `archivo_identidad`, `fecha_solicitud`, `estado`, `asunto`, `archivo_formulario`, `poder`, `tarjeta_propiedad`, `usuarios_documento`, `ReciboPago`, `fecha_respuesta`, `radicado`, `correo_enviado`, `comentarios`) VALUES
(1, 1, 'Angel Nicolas', 'pedro@gmail.com', '', '2025-01-30 23:01:42', 'en revisión', 'Traspaso de propiedad de un vehiculo automotor', '', '', '', 1092363153, '', '2025-01-30 23:01:42', '20250130001', 0, NULL),
(2, 1, 'perro con papitas', 'nicolas12rg@gmail.com', 'identidad/1738010020_identidad_identidad_identidad_identidad_identidad_1737603780_recibo pago.pdf', '2025-01-30 23:02:35', 'en revisión', 'Traspaso de propiedad de un vehiculo automotor', '', '', 'tarjeta/1738010020_identidad_identidad_identidad_identidad_identidad_1737603780_recibo pago.pdf', 1092363153, '', '2025-01-30 23:02:35', '20250130002', 0, NULL),
(4, 1, 'chavelo', 'nicolas12rg@gmail.com', 'identidad/prueba.pdf', '2025-01-31 12:35:49', 'en revisión', 'Duplicado de placas de un vehículo automotor', 'formulario/tarjeta_B16-Ministerio de Transporte (5).xls', 'poder/prueba.pdf', 'tarjeta/prueba.pdf', 1092363153, '', '2025-01-31 12:35:49', '20250131001', 0, NULL),
(5, 1, 'prueba 1', 'nicolas12rg@gmail.com', 'identidad/prueba.pdf', '2025-01-31 12:39:04', 'en revisión', 'Levantamiento de limitacion o gravamen a un vehiculo automotor', NULL, 'poder/prueba.pdf', 'tarjeta/prueba.pdf', 1092363153, '', '2025-01-31 12:39:04', '20250131002', 0, NULL),
(6, 1, 'prueba 2', 'nicolas12rg@gmail.com', 'identidad/prueba.pdf', '2025-01-31 12:40:05', 'aceptada', 'Renovacion de la licencia de conduccion', 'formulario/prueba.pdf', 'poder/poder_prueba.pdf', '', 1092363153, '', '2025-01-31 12:40:05', '20250131003', 0, NULL),
(7, 1, 'laura pausini', 'est_an_riano@fesc.edu.co', 'identidad/prueba.pdf', '2025-01-31 13:25:35', 'aceptada', 'Certificado de Libertad y Tradicion de un vehiculo automotor', 'formulario/tarjeta_B16-Ministerio de Transporte (5).xls', 'poder/poder_prueba.pdf', 'tarjeta/prueba.pdf', 1092363153, 'recibo_pago/prueba.pdf', '2025-01-31 13:25:54', '20250131004', 1, 'aceptado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `tipo_documento` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `documento` int(11) NOT NULL,
  `roles_id` int(11) DEFAULT 2
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `tipo_documento`, `password`, `email`, `documento`, `roles_id`) VALUES
(1, 'Angel', 'riaño', 'Cédula', '$2y$10$WrdX6PeZWa8GZwVjeymPxeCG5topg8zDsaOvknYymOS3OkJlO49TC', 'nicolas12rg@gmail.com', 1092363153, 2),
(2, 'robert', 'rojas', 'Cédula', '$2y$10$msR81AU3jacCBjNQ4LSjHuxyuVe1TCSIV1Qi/NWo9c8Q9K0wZFdFu', 'rober@gmail.com', 88246870, 1),
(3, 'christian', 'saravia', 'Cédula', '$2y$10$N2CBGgGwGr3SS0Xh0G2JYuCsxoZx.rI/QVRTiG1cbKh2u17weMiIC', 'est_an_riano@fesc.edu.co', 1090382080, 2),
(4, 'LEONARDO FABIO', 'MENESES', 'Cédula', '$2y$10$eFJw361Fj1rZ5tkNIz4BA.aGeiCBTgFS0vMQhD8HRV9V70ugbiinm', 'robert1uno@hotmail.com', 14222333, 2),
(5, 'emilio Antonio', 'Sanchez pacheco', 'Selecciona...', '$2y$10$b1vv0Ygf94aAQi0AOdzy0uDXsNs1lHfCG5nfRpMzi6fk65Z.p99Lm', 'emilio.antonio.sanchez@gmail.com', 88200012, 2),
(6, 'diego', 'mesa', 'Cédula', '$2y$10$9B.Jcxo2XBgbWoweAwTvk.myRdx.c0rOYqfSs/HIRJEdVz0Iv/y7W', 'doc_da_mesa@fesc.edu.co', 852147, 2),
(7, 'sonia', 'arango medina', 'Cédula', '$2y$10$kGFf6tUSjfnU05h/237oz.CZDj3hsZvZ/PhYVVIrXrnJeRm5mEqiu', 'soniaarangomedina@hotmail.com', 987654, 2),
(9, 'carlos', 'orozco', 'Cédula', '$2y$10$F1a0IAIKx1hjnAnPIrkHFOJGDODl5VTmkb6DTmPECbPBHCcZvfRNW', 'abacoservice1@gmail.com', 88002105, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_temp`
--

CREATE TABLE `usuarios_temp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `tipo_documento` varchar(200) NOT NULL,
  `documento` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `codigo_verificacion` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_temp`
--

INSERT INTO `usuarios_temp` (`id`, `nombre`, `apellidos`, `tipo_documento`, `documento`, `email`, `roles_id`, `password`, `codigo_verificacion`) VALUES
(1, 'angel riaño', 'guzman', 'Cédula', 666666, 'angelriadev@gmail.com', 2, '$2y$10$6lt2NytzXiPhRTNTISy8KumMR0jRjga6nPbC2ClMrk3FJgSMYll9G', 671237);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagos_recibos`
--
ALTER TABLE `pagos_recibos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitudes_usuarios_idx` (`usuarios_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_temp`
--
ALTER TABLE `usuarios_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos_recibos`
--
ALTER TABLE `pagos_recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios_temp`
--
ALTER TABLE `usuarios_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;