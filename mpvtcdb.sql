-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2023 a las 17:37:20
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--Veramatus
-- Base de datos: `mpvtcdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta_usuario`
--

CREATE TABLE `alerta_usuario` (
  `Id_Alerta` int(5) NOT NULL,
  `Id_Usuario_Alerta` int(5) NOT NULL,
  `Id_Tipo_Alerta` int(1) NOT NULL,
  `Id_Donde_Alerta` int(1) DEFAULT NULL,
  `Id_Cuando_Alerta` int(1) DEFAULT NULL,
  `Id_A_Quien_Alerta` int(1) DEFAULT NULL,
  `Longitud` char(25) NOT NULL,
  `Latitud` char(25) NOT NULL,
  `Estado_Alerta` int(1) NOT NULL,
  `Descripcion_Alerta` varchar(500) DEFAULT NULL,
  `Fecha_Alerta` char(10) NOT NULL,
  `Hora_Alerta` char(15) DEFAULT NULL,
  `Hora_Atencion` varchar(16) DEFAULT NULL,
  `fotografia_alerta` varchar(200) NOT NULL,
  `fecha_reporte` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE `correlativo` (
  `id` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`id`, `Anio`, `Numero`, `created_at`, `updated_at`) VALUES
(1, 2020, 2, '2020-06-30 15:41:22', '2020-06-30 15:41:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `Anio` varchar(4) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Asunto` text NOT NULL,
  `TipoPersona` varchar(50) NOT NULL,
  `NumDocumento` varchar(11) NOT NULL,
  `Remitente` varchar(200) NOT NULL,
  `Archivo` varchar(150) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `NroExpediente` int(11) NOT NULL,
  `NroExpedientetxt` varchar(30) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Observaciones` text NOT NULL,
  `Folios` int(11) NOT NULL,
  `CodSeguridad` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `Anio`, `Fecha`, `Hora`, `Tipo`, `Asunto`, `TipoPersona`, `NumDocumento`, `Remitente`, `Archivo`, `Correo`, `Telefono`, `NroExpediente`, `NroExpedientetxt`, `Estado`, `Observaciones`, `Folios`, `CodSeguridad`, `created_at`, `updated_at`) VALUES
(12, '2023', '2023-03-13', '14:40:50', 'CARTA', 'carta', 'Natural', '43344443', 'INTEC', 'REG000002.pdf', 'raulbriss980@gmail.com', '656565656', 2, '000002', 'Denegado', '', 2, '6126', '2023-03-13 19:40:50', '2023-03-13 23:19:33'),
(13, '2023', '2023-03-13', '19:34:43', 'Oficio', 'invitacion especial', 'Natural', '123456', 'TEC', 'REG000003.pdf', 'raulbriss980@gmail.com', '77877878', 3, '000003', 'Atendido', '', 3, '6165', '2023-03-14 00:34:43', '2023-11-04 21:41:01'),
(16, '2023', '2023-11-06', '08:54:24', 'Solicitud', 'Solicito permiso para construcción', 'Natural', '46102424', 'ELIZ MARRUFO MERINO', 'REG000004.pdf', 'vianvezo@hotmail.com', '953936058', 4, '000004', 'En Tramite', '', 3, '6204', '2023-11-06 13:54:25', '2023-11-06 14:19:32'),
(17, '2023', '2023-11-06', '09:42:49', 'Oficio', 'Oficio a Muni de Bagua', 'Natural', '46102424', 'TERESA FERRE', 'REG000005.pdf', 'vianvezo@hotmail.com', '930623569', 5, '000005', 'Atendido', '', 20, '6243', '2023-11-06 14:42:49', '2023-11-07 14:02:45'),
(18, '2023', '2023-11-07', '08:58:24', 'Oficio', 'Solicitud de Expendiente VarCore', 'Natural', '46102424', 'CORI ALVARES', 'REG000006.pdf', 'vianvezo@hotmail.com', '951753258', 6, '000006', 'En Tramite', '', 10, '6282', '2023-11-07 13:58:24', '2023-11-07 14:00:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `HoraInicio` time NOT NULL,
  `HoraFin` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `Descripcion`, `HoraInicio`, `HoraFin`, `created_at`, `updated_at`) VALUES
(1, 'Horario A', '00:00:00', '23:59:00', '2019-06-28 01:09:05', '2022-03-10 15:36:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `IdUsuario` bigint(20) NOT NULL,
  `Vista_Modulo` varchar(50) NOT NULL,
  `Crear` int(11) NOT NULL,
  `Leer` int(11) NOT NULL,
  `Actualizar` int(11) NOT NULL,
  `Eliminar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `Descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Aministrador', '2019-06-13 09:00:00', '2019-06-13 09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `id` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Expediente` int(11) NOT NULL,
  `Comentario` text NOT NULL,
  `Adjunto` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`id`, `Anio`, `Expediente`, `Comentario`, `Adjunto`, `Fecha`, `Usuario`, `Estado`, `created_at`, `updated_at`) VALUES
(10, 2023, 12, 'estamos avanzando', 'Adjto20230313181324.pdf', '2023-03-13', 'Mesa de Partes', 'Atendido', '2023-03-13 23:13:24', '2023-03-13 23:13:24'),
(11, 2023, 12, 'por favor revisa y corregir los problemas', 'Adjto20230313181932.pdf', '2023-03-13', 'Mesa de Partes', 'Denegado', '2023-03-13 23:19:32', '2023-03-13 23:19:32'),
(12, 2023, 12, 'tu solicitud ha sido rechazada, vuelve a solicitar por favor', 'Adjto20230313182117.pdf', '2023-03-13', 'Mesa de Partes', 'Denegado', '2023-03-13 23:21:17', '2023-03-13 23:21:17'),
(13, 2023, 14, 'su documento ha sido derivado al area de marketing', 'Ninguna', '2023-03-14', 'luis', 'En Tramite', '2023-03-14 15:35:35', '2023-03-14 15:35:35'),
(14, 2023, 14, 'le estamos enviando  su documento en respuesta a su trámite', 'Adjto20230314103813.pdf', '2023-03-14', 'luis', 'Atendido', '2023-03-14 15:38:13', '2023-03-14 15:38:13'),
(15, 2023, 15, 'su documento ha sido derivado al area de marketing', 'Ninguna', '2023-03-14', 'Mesa de Partes', 'En Tramite', '2023-03-14 16:22:36', '2023-03-14 16:22:36'),
(16, 2023, 15, 'te estamos tu documento en respuesta a tu trámite', 'Adjto20230314112606.pdf', '2023-03-14', 'luis', 'Atendido', '2023-03-14 16:26:06', '2023-03-14 16:26:06'),
(17, 2023, 13, 'En tramite al Area de Ventas', 'Ninguna', '2023-11-04', 'Mesa de Partes', 'En Tramite', '2023-11-04 20:48:16', '2023-11-04 20:48:16'),
(18, 2023, 13, 'denegado', 'Ninguna', '2023-11-04', 'Mesa de Partes', 'Atendido', '2023-11-04 21:41:01', '2023-11-04 21:41:01'),
(19, 2023, 16, 'En atencion de Doc', 'Ninguna', '2023-11-06', 'Mesa de Partes', 'En Tramite', '2023-11-06 14:19:32', '2023-11-06 14:19:32'),
(20, 2023, 17, 'se recibió el documento', 'Ninguna', '2023-11-06', 'Mesa de Partes', 'En Tramite', '2023-11-06 14:48:56', '2023-11-06 14:48:56'),
(21, 2023, 18, 'En proceso de verificacion de la informacion', 'Ninguna', '2023-11-07', 'Mesa de Partes', 'En Tramite', '2023-11-07 14:00:13', '2023-11-07 14:00:13'),
(22, 2023, 17, 'Revisar el abjunto', 'Ninguna', '2023-11-07', 'Mesa de Partes', 'Atendido', '2023-11-07 14:02:45', '2023-11-07 14:02:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Dni` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombres` varchar(191) CHARACTER SET utf8 NOT NULL,
  `Genero` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8 NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `IdHorario` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `Rol`, `Dni`, `Nombres`, `Genero`, `email`, `email_verified_at`, `password`, `remember_token`, `IdHorario`, `Estado`, `created_at`, `updated_at`, `session_id`) VALUES
(1, 1, '20222022', 'Mesa de Partes', 'M', 'admin@gmail.com', NULL, '$2y$10$zJy20Tckhduanx6bkkgouOvr19pyDQ8KZuPZ47ChHXjXjW/inGCyS', NULL, 1, 1, '2019-06-13 09:00:00', '2023-11-08 14:44:18', 'fX46oxGlArGNAg52SF81sYQtfNnjrLa5fd7CTsRT'),
(9, 1, '46102424', 'Victor Andres Veramatus Soriano', 'M', 'vianvezo@gmail.com', NULL, '$2y$10$12xeu1LbB7Q7ZsixTup1iusH1yQ468MPap0IqgQhyXRuYKpDuqPIi', NULL, 1, 1, '2023-11-04 20:46:58', '2023-11-08 01:52:09', 'eVDynrEwJNrhtFtxPGeFhiLDq0RQJcAbaDVu78g4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `Rol` (`Rol`),
  ADD KEY `IdHorario` (`IdHorario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`IdHorario`) REFERENCES `horario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
