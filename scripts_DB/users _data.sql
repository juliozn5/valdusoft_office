-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2021 a las 19:22:29
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 - Desarrollador, 1 - Diseñador, 2 - Project-Manager, 3 - Financiero',
  `profile_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 - Nuevo, 1 - Administrador, 2 - Cliente, 3 - Trabajador',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curriculum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_hour` double DEFAULT NULL,
  `uphold_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tron_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `slug`, `email`, `phone`, `birthdate`, `admission_date`, `email_verified_at`, `password`, `position`, `profile_id`, `remember_token`, `created_at`, `updated_at`, `skills`, `curriculum`, `price_per_hour`, `uphold_account`, `photo`, `tron_wallet`) VALUES
(5, 'joel', 'andres', 'joel', 'joel@hotmail.com', '555555555555', '2021-06-25', '2021-06-26', '2021-06-27 13:44:57', '$2y$10$ko6hbqyQZsVJYvQYZJ4b8OLnTfzXd0LROhrI.CCbS/FdCXMiZO47q', '1', 1, 'fSsfnrjBOefV72wzro1x0ulJX6x6pgOPcZF3Lpqv0LRsItLZ4hxYO2PQrelD', '2021-06-24 00:02:18', '2021-06-24 00:02:18', '10', NULL, 4, 'a', NULL, NULL),
(6, 'jose', 'daniel', '', 'jose@hotmail.com', NULL, '2021-06-23', '2021-06-23', '2021-06-23 20:03:12', '12345678', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'jose', 'daniel2', '', 'jose2@hotmail.com', NULL, '2021-06-23', '2021-06-23', '2021-06-23 20:03:12', '12345678', NULL, 0, NULL, NULL, '2021-07-06 20:03:41', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'jose', NULL, 'jose', 'josed@hotmail.com', NULL, NULL, NULL, NULL, '$2y$10$4NOMGOX/cB.e.AhOGKeAcu9bdwOpj/2rsRmKxcpZ0c17vvt25N5E2', NULL, 3, NULL, '2021-06-24 18:41:19', '2021-06-24 18:41:19', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'joel', NULL, 'joel', 'joelgoyosaez@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$9lTjXzVWycwiDNDPZ4iPbuLi4jaR0hg9ae8Zuk6TJdYQozAKJr966', NULL, 1, NULL, '2021-06-28 18:50:57', '2021-06-28 18:50:57', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Camilo', 'Vergara', 'camilo-vergara', 'camilovergara@gmail.com', '+584269315724', NULL, NULL, NULL, '$2y$10$WkPjgGXp3VAVZE/cy7Zcf.ShIjrVtvNzOfbnXoy.Q5w5cjelDjK2S', NULL, 0, NULL, '2021-07-01 19:51:46', '2021-07-06 20:03:38', NULL, NULL, NULL, NULL, '10.png', NULL),
(11, 'Lester', 'Morales', 'lester-morales', 'lester@gmail.com', '+584269315724', NULL, NULL, NULL, '$2y$10$DC6Wt5PwzpZBg/qfukwFHOUl7XZXDibbeJ1asCk3yqso85Tu5i3QS', NULL, 0, NULL, '2021-07-06 20:03:32', '2021-07-06 20:03:44', NULL, NULL, NULL, NULL, '11.jpeg', NULL),
(12, 'Sthepahany', 'Rojas', 'sthepahany-rojas', 'sthepanyrojas@gmail.com', '+57 300 2797377', NULL, NULL, NULL, '$2y$10$unlI0rmFPuukildPYtPPguN8CgXynEXlkduE9617icAq8YNgFeZHS', NULL, 2, NULL, '2021-07-06 20:09:23', '2021-07-06 20:09:23', NULL, NULL, NULL, NULL, '12.jpg', NULL),
(13, 'Luis', 'Rivillas', 'luis-rivillas', 'Rivillas88ls@gmail.com', '+57 300 7340423', NULL, NULL, NULL, '$2y$10$GphC3h05Cj1I2J70mex1BOgzxpgXRqo1Xmky2G0vVpVrNtj7s1m1S', NULL, 2, NULL, '2021-07-06 20:11:23', '2021-07-06 20:11:23', NULL, NULL, NULL, NULL, '13.jpg', NULL),
(14, 'David', 'Mazo', 'david-mazo', 'czmazo@gmail.com', '+57 318 6614461', NULL, NULL, NULL, '$2y$10$w2zKhTxu8pcKDBkirIw1NOlZBvbIbbXDDgIv/9UBR4pZZZoHVt0vi', NULL, 2, NULL, '2021-07-06 20:12:43', '2021-07-06 20:12:44', NULL, NULL, NULL, NULL, '14.jpg', NULL),
(15, 'Richard', 'Webb', 'richard-webb', 'richard@scale4media.com', '+1 (801) 473-3200', NULL, NULL, NULL, '$2y$10$DzlHBSgpiKBm/y83Ewg6hOaZGNkWhkALFWWgUNvw6zXtNDv0hwwPm', NULL, 2, NULL, '2021-07-06 20:14:12', '2021-07-06 20:14:13', NULL, NULL, NULL, NULL, '15.jpg', NULL),
(16, 'David', 'Hurtado', 'david-hurtado', 'davidhurtado@gmail.com', '+57 300 4721707', NULL, NULL, NULL, '$2y$10$7EETVzdsVtpuDYDjOGtV8uvseDsW3PdoxFoOx7WsYClhRwEIbk/xG', NULL, 2, NULL, '2021-07-06 20:54:51', '2021-07-06 20:54:51', NULL, NULL, NULL, NULL, '16.jpg', NULL),
(17, 'Elias', 'Elias', 'elias-elias', 'elias@hotmail.com', '+57 300 4837962', NULL, NULL, NULL, '$2y$10$CDO70FT5A87v2nmPnG5hgO0MkXxPaG86rpBWNzQTC/vc.pG/D3Rse', NULL, 2, NULL, '2021-07-06 20:55:58', '2021-07-06 20:55:58', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Lester', 'Morales', 'lester-morales', 'lester@hotmail.com', '+57 321 3912535', NULL, NULL, NULL, '$2y$10$.QRwCy/.wQ3E6KAQBCVIjOcwGho6nHe8mmU8zIyEj9.6ql.DdkVEu', NULL, 2, NULL, '2021-07-06 20:57:41', '2021-07-06 20:57:41', NULL, NULL, NULL, NULL, '18.jpg', NULL),
(19, 'Camilo', 'Vergara', 'camilo-vergara', 'camilo@hotmail.com', '+57 300 7004741', NULL, NULL, NULL, '$2y$10$6jrqDxTYagu1Hm7GlVG2TukMLolu3YXXjbvgYtb7tUcq0gw/crNd2', NULL, 2, NULL, '2021-07-06 20:59:33', '2021-07-06 20:59:33', NULL, NULL, NULL, NULL, '19.jpg', NULL),
(20, 'Javier', 'Requena', 'javier-requena', 'javier@hotmail.com', '+54 9 11 3320-2749', NULL, NULL, NULL, '$2y$10$GRio7miN3K3TEWcObOKzQOAkPxe06dsv0z/oA85v6y//c36IGDCCi', NULL, 2, NULL, '2021-07-06 21:00:49', '2021-07-06 21:00:49', NULL, NULL, NULL, NULL, '20.jpg', NULL),
(21, 'Jose', 'Reyes', 'jose-reyes', 'josel@hotmail.com', '+507 6673-3214', NULL, NULL, NULL, '$2y$10$3GWM931PlOQeM8CBCgwB2eu0lH12yqXFMEHi5iTRFpjt5RXbyRYeO', NULL, 2, NULL, '2021-07-06 21:01:43', '2021-07-06 21:01:43', NULL, NULL, NULL, NULL, '21.jpg', NULL),
(22, 'Felipe', 'Echeverry', 'felipe-echeverry', 'felipe@hotmail.com', '+57 350 8663333', NULL, NULL, NULL, '$2y$10$qTUx09KMDCabitJQVQ5WEe7VrdSdEwc.cFgThvK07Uj2wtABZGyXW', NULL, 2, NULL, '2021-07-06 21:05:54', '2021-07-06 21:05:54', NULL, NULL, NULL, NULL, '22.jpg', NULL),
(23, 'Mauricio', 'Rojas', 'mauricio-rojas', 'info@smartbunny.co', '+57 316 8713822', NULL, NULL, NULL, '$2y$10$.I9XGhJXNQee8SgXDAxfWOcVMRlQGfkzhkfIbs8gY8y76bPDJ.hDC', NULL, 2, NULL, '2021-07-06 21:11:40', '2021-07-06 21:11:40', NULL, NULL, NULL, NULL, '23.jpg', NULL),
(24, 'Silvio', '+591 75309222', 'silvio-591-75309222', 'siredvida@gmail.com', '+591 75309222', NULL, NULL, NULL, '$2y$10$Dg9XyEsC8s032OSC.Z/leeaUk9Bq4ntKQQ0U7CwHXOvNnfFwUwHKy', NULL, 2, NULL, '2021-07-06 21:14:44', '2021-07-06 21:14:44', NULL, NULL, NULL, NULL, '24.jpg', NULL),
(25, 'Marcel', 'Valencia', 'marcel-valencia', 'ventas@tiendaimpaz.cl', '+56 9 4583 0887', NULL, NULL, NULL, '$2y$10$TE7QmogHWljF8JffxwBQuex4PX1UPXpp78A3.UXmyRn2l4q41VVd6', NULL, 2, NULL, '2021-07-06 21:19:04', '2021-07-06 21:19:04', NULL, NULL, NULL, NULL, '25.jpg', NULL),
(26, 'Stybaliz', 'Castellano', 'stybaliz-castellano', 'Stybalizc@hotmail.com', '+57 301 6088008', NULL, NULL, NULL, '$2y$10$6yZI5hOofg7VtIvs4rj.Guql2GI16yf851vEnmj.f2RJH1TZsPAdi', NULL, 2, NULL, '2021-07-06 21:21:19', '2021-07-06 21:21:19', NULL, NULL, NULL, NULL, '26.jpg', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_profile_id_foreign` (`profile_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
