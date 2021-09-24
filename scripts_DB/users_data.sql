-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-09-2021 a las 15:57:32
-- Versión del servidor: 5.7.35
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `valdusof_backoffice`
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
  `profile_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 - Nuevo, 1 - Administrador, 2 - Cliente, 3 - Trabajador',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `curriculum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_hour` double DEFAULT NULL,
  `uphold_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tron_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Logo en caso de que sea un Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `slug`, `email`, `phone`, `birthdate`, `admission_date`, `email_verified_at`, `password`, `position`, `profile_id`, `remember_token`, `created_at`, `updated_at`, `curriculum`, `price_per_hour`, `uphold_account`, `photo`, `tron_wallet`, `logo`) VALUES
(1, 'admin', 'master', 'admin-master', 'admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$yfar1ISof2qxLW7nZe6LzuzPyrU/9N9oyHZQqbMSxJQrdIQhj024W', '1', 1, NULL, '2021-09-13 22:03:40', '2021-09-13 22:03:40', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Freddy', 'Millán', 'freddy-jose-millan-salazar', 'freddymillan@valdusoft.com', '+584120924853', '1993-02-04', '2018-04-15', NULL, '$2y$10$RbdmW9SfbajO.7Xej4Ag7OzTT49nsQ1OWlvoN2q5n3G9zKLxOvnDa', '0', 3, NULL, '2021-09-13 23:37:18', '2021-09-13 23:37:18', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Carlos', 'González', 'carlos-gonzalez', 'carlosgonzalez@valdusoft.com', '+584123597875', NULL, NULL, NULL, '$2y$10$HsFeyFg/lamDsIcUTgGCGO2d0X4wMoFyT6Aj5.WYMIc44xHGCZRrC', '0', 3, NULL, '2021-09-13 23:52:44', '2021-09-13 23:52:44', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Luisanaelena', 'Marín', 'luisanaelena-marin', 'luisanamarin@valdusoft.com', '+584120924871', '1992-12-29', '2019-10-01', NULL, '$2y$10$P1AOuCDOWSfydm60yqQIzePhJ5ObmZneH93wt2jxomBcQ52F7du0i', '0', 3, NULL, '2021-09-13 23:57:27', '2021-09-13 23:57:27', NULL, 2.2, NULL, NULL, NULL, NULL),
(5, 'Luis', 'Briceño', 'luis-briceno', 'luisbriceno@valdusoft.com', NULL, NULL, NULL, NULL, '$2y$10$6ztZgF63u2Ag6oQs2heOPuNlGBLYL8s00Qpv1HXFV2XZP2guRaN6K', '0', 3, NULL, '2021-09-14 00:00:12', '2021-09-14 00:00:12', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Camilo', 'Vergara', 'camilo-vergara', 'camilovergara@gmail.com', '+584269315724', NULL, NULL, NULL, '$2y$10$xJR4EC4/OCiFH92XkYsjfuLBWmK.9pTOar1A4vWPz4fR1fcmoAR/K', NULL, 2, NULL, '2021-09-14 01:12:23', '2021-09-14 01:12:23', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Lester', 'Morales', 'lester-morales', 'lester@gmail.com', '+584269315724', NULL, NULL, NULL, '$2y$10$DAm5LEETPzMnITqGWn5GOOlutJej5aVZ7RVAur6dZEbYYsoWQuJqC', NULL, 2, NULL, '2021-09-14 01:13:06', '2021-09-14 01:13:06', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Esthepany', 'Rojas', 'esthepany-rojas', 'sthepanyrojas@gmail.com', '+573002797377', NULL, NULL, NULL, '$2y$10$mO40v17sxBnKtJqLQxFFwO.aqEV/iv3Qn30a5aIeCgrMxutxIrrK6', NULL, 2, NULL, '2021-09-14 01:14:10', '2021-09-14 01:14:10', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Luis', 'Rivillas', 'luis-rivillas', 'rivillas88ls@gmail.com', '+573007340423', NULL, NULL, NULL, '$2y$10$2RniUr/5dJeQ6h6J4wnDy.eKGBe4ZrYHc/.fqixb2HzNcRYnRmCXa', NULL, 2, NULL, '2021-09-14 01:15:07', '2021-09-14 01:15:07', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'David', 'Mazo', 'david-mazo', 'czmazo@gmail.com', '+573186614461', NULL, NULL, NULL, '$2y$10$adTomVNDlNlvkEK3ZrLr1.NUYwc8JFkyW1kvqogxJh81i2yRtyOyu', NULL, 2, NULL, '2021-09-14 01:15:46', '2021-09-14 01:15:46', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Richard', 'Webb', 'richard-webb', 'richard@scale4media.com', '+1 (801) 473-3200', NULL, NULL, NULL, '$2y$10$3nnl0XUXSQYp2KPZq419tuyuXal4RB.s.zUG2afqOJldWhdr.IyGu', NULL, 2, NULL, '2021-09-14 01:16:17', '2021-09-14 01:16:17', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'David', 'Hurtado', 'david-hurtado', 'davidhurtado@gmail.com', '+57 300 4721707', NULL, NULL, NULL, '$2y$10$plSzzkN2qgZLHdCjnKuIseLuUkC7yiygQrwA/r3Pf/51b/eW7/OAm', NULL, 2, NULL, '2021-09-14 01:16:49', '2021-09-14 01:16:49', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Elias', 'Elias', 'elias-elias', 'elias@hotmail.com', '+57 300 4837962', NULL, NULL, NULL, '$2y$10$SSfqFFmzMszMLJfQAgjQw.ACw5nM2sry7c0pctBmFegi14rpz0cZa', NULL, 2, NULL, '2021-09-14 01:17:28', '2021-09-14 01:17:28', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Javier', 'Requena', 'javier-requena', 'javier@hotmail.com', '+54 9 11 3320-2749', NULL, NULL, NULL, '$2y$10$JHA4YljOxnpVnt5zNoYmDurYOkQFv8bRYe.sPzqt/QXCcuesOZnzO', NULL, 2, NULL, '2021-09-14 01:18:33', '2021-09-14 01:18:33', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'José', 'Reyes', 'jose-reyes', 'josel@hotmail.com', '+507 6673-3214', NULL, NULL, NULL, '$2y$10$yKO4Xx4d1xMEgYju0xPYoO66n19tFUVv2HkLQaxd6Wx5nR7/MbtvO', NULL, 2, NULL, '2021-09-14 01:19:07', '2021-09-14 01:19:07', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Felipe', 'Echeverry', 'felipe-echeverry', 'felipe@hotmail.com', '+57 350 8663333', NULL, NULL, NULL, '$2y$10$Uv8iR5OEjVQBveL4FTNohOLqJBZjyKPgi/u9ftrLw5Z5lRJL.DZZy', NULL, 2, NULL, '2021-09-14 01:19:37', '2021-09-14 01:19:37', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Mauricio', 'Rojas', 'mauricio-rojas', 'info@smartbunny.co', '+57 316 8713822', NULL, NULL, NULL, '$2y$10$KW/hHtmRKzPyB9xdx.WrP.SQBRPhAoXj8ullcL.iCsrDFtABIQmBO', NULL, 2, NULL, '2021-09-14 01:20:13', '2021-09-14 01:20:13', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Silvio', 'Redvida', 'silvio-redvida', 'siredvida@gmail.com', '+591 75309222', NULL, NULL, NULL, '$2y$10$X.OWs.wVV5Q4letk7Ye9z.fVpM5r0yogoAa8NBF7k9c6piV4Po53W', NULL, 2, NULL, '2021-09-14 01:20:56', '2021-09-14 01:20:56', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Marcel', 'Valencia', 'marcel-valencia', 'ventas@tiendaimpaz.cl', '+56 9 4583 0887', NULL, NULL, NULL, '$2y$10$lnLB9mmn2xjSkuocjX2yuuAbbooD6e3Kf4tQGyMEFbob3mAwmy3Hy', NULL, 2, NULL, '2021-09-14 01:21:27', '2021-09-14 01:21:27', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Stybaliz', 'Castellano', 'stybaliz-castellano', 'stybalizc@hotmail.com', '+57 301 6088008', NULL, NULL, NULL, '$2y$10$OJnvN96xC13bSL/7nL.sCu10SxKbXFaApSS8f1QhlyqE2fKLLo6Z2', NULL, 2, NULL, '2021-09-14 01:23:01', '2021-09-14 01:23:01', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Roberto', 'Carlos', 'roberto-carlos', 'roberton56@tafmail.com', NULL, NULL, NULL, NULL, '$2y$10$xyCR4cY2QCm1KjLKtL8SK.EB8/N0JNn6LXEp2JlKlRAKb4027f8F2', NULL, 2, NULL, '2021-09-14 01:24:04', '2021-09-14 01:24:04', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Pavel', 'Pavel', 'pavel-pavel', 'pavel@yopmail.com', NULL, NULL, NULL, NULL, '$2y$10$OFpQKzA.NqNgVflV3o6xmuduq3hbIns67liGq5I13TSDKhdhGWRA.', NULL, 2, NULL, '2021-09-14 01:24:24', '2021-09-14 01:24:24', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Joel Andrés', 'Goyo', 'joel-andres-goyo', 'joel@hotmail.com', NULL, NULL, NULL, NULL, '$2y$10$I12tiKDx60e3tdfjQ8JpNOETclGKERVZdECSd8grk8cxBAqlp1nXG', '0', 3, NULL, '2021-09-14 01:25:45', '2021-09-14 01:25:45', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Leonardo', 'Guilarte', 'leonardo-guilarte', 'leonardoguilarte@valdusoft.com', NULL, NULL, NULL, NULL, '$2y$10$U0B.DKeWT.sgh8NrRcXdK.pCNcHG3z8M60I.PjCQ0jd53Ux.VVmtq', '0', 3, NULL, '2021-09-14 01:31:30', '2021-09-14 01:31:30', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'William', 'Ache', 'william-ache', 'williamache@valdusoft.com', '+584121305420', '2000-06-28', NULL, NULL, '$2y$10$s1aNrOqseCr6W4NmUeP0eebBE716Kw6TYjKgv3kiELEBqShsKZCAu', '0', 3, NULL, '2021-09-14 01:33:13', '2021-09-14 01:33:13', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Abraham', 'Moreno', 'abraham-moreno', 'abrahammoreno@valdusoft.com', NULL, NULL, NULL, NULL, '$2y$10$xViUWD7v4ge0ZqNWvPA0i.9E6LHHtxQcNxBeaIn2wZDU2Hs8zWXF2', '0', 3, NULL, '2021-09-14 01:34:18', '2021-09-14 01:34:18', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Julio', 'Jimenez', 'julio-jimenez', 'juliozn5dev@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$M3pmKrzOyUGv0PmJVoJuL.if2r6UWdWVXVtEhWp.jTNBbBgHB6SLK', '0', 3, NULL, '2021-09-14 01:35:18', '2021-09-14 01:35:18', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Eulin', 'Palma', 'eulin-palma', 'eulinpr@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$UUOGkkmfUCeJDVzvoKlWVu9KaZOi/RspB2DedBqsdTCW/Hjy5Idsa', '0', 3, NULL, '2021-09-14 01:35:48', '2021-09-14 01:35:48', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Cesar', 'Montevideo', 'cesar-montevideo', 'cesarmontevideo@valdusoft.com', '+584243561272', '1999-05-20', NULL, NULL, '$2y$10$0A/jyzwOA2phRXk4CZb6Yuc.YJ.Qd/uHub/1U2gSdrxOPkylEJnaW', '0', 3, NULL, '2021-09-14 01:36:47', '2021-09-14 01:36:47', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'María', 'Valera', 'maria-valera', 'mariavalera@valdusoft.com', NULL, NULL, NULL, NULL, '$2y$10$ZkC52Nam6tCljal7to41OeOjhWTFB8mIWUwljuxCbNypzGDcXURQy', '0', 3, NULL, '2021-09-14 01:37:37', '2021-09-14 01:37:37', NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
