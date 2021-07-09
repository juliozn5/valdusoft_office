-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2021 a las 19:22:22
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `valdusoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hostings`
--

CREATE TABLE `hostings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hostings`
--

INSERT INTO `hostings` (`id`, `url`, `create_date`, `due_date`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'camilo.com', '2021-07-01', '2021-07-30', '2021-07-01 19:53:00', '2021-07-01 19:53:00', 10),
(2, 'breve.com.co/', '2020-04-26', '2022-04-26', '2021-07-06 21:08:01', '2021-07-06 21:08:01', 22),
(3, 'lisosylisos.co', '2020-10-07', '2021-10-07', '2021-07-06 21:13:03', '2021-07-06 21:13:04', 23),
(4, 'redvida.biz', '2021-03-04', '2022-03-04', '2021-07-06 21:15:50', '2021-07-06 21:15:51', 24),
(5, 'royalgreen.company', '2020-10-01', '2021-10-01', '2021-07-06 21:16:42', '2021-07-06 21:16:43', 16),
(6, 'sellofintrust.co', '2021-06-18', '2022-06-18', '2021-07-06 21:17:33', '2021-07-06 21:17:34', 19),
(7, 'tiendaimpaz.cl', '2021-03-23', '2022-03-23', '2021-07-06 21:19:45', '2021-07-06 21:19:45', 25),
(8, 'transformatepro.com', '2020-01-15', '2022-01-15', '2021-07-06 21:21:59', '2021-07-06 21:21:59', 26);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hostings`
--
ALTER TABLE `hostings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostings_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hostings`
--
ALTER TABLE `hostings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hostings`
--
ALTER TABLE `hostings`
  ADD CONSTRAINT `hostings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
