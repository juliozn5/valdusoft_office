-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-09-2021 a las 16:36:15
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

--
-- Volcado de datos para la tabla `hostings`
--

INSERT INTO `hostings` (`id`, `user_id`, `url`, `create_date`, `due_date`, `price`, `renewal_price`, `years`, `renewal_hosting`, `created_at`, `updated_at`) VALUES
(17, 31, 'camilo.com', '2021-07-01', '2022-07-01', NULL, NULL, 1, NULL, '2021-09-22 02:28:23', '2021-09-22 02:28:23'),
(18, 31, 'breve.com.co', '2020-04-26', '2022-04-26', NULL, NULL, 2, NULL, '2021-09-22 02:29:28', '2021-09-22 02:29:28'),
(19, 31, 'lisosylisos.co', '2020-10-07', '2021-10-07', NULL, NULL, 1, NULL, '2021-09-22 02:30:02', '2021-09-22 02:30:02'),
(20, 31, 'redvida.biz', '2021-03-04', '2022-03-04', NULL, NULL, 1, NULL, '2021-09-22 02:30:35', '2021-09-22 02:30:35'),
(21, 31, 'royalgreen.company', '2020-10-01', '2021-10-01', NULL, NULL, 1, NULL, '2021-09-22 02:31:11', '2021-09-22 02:31:11'),
(22, 31, 'sellofintrust.co', '2021-06-18', '2022-06-18', NULL, NULL, 1, NULL, '2021-09-22 02:31:53', '2021-09-22 02:31:53'),
(23, 31, 'tiendaimpaz.cl', '2021-03-23', '2022-03-23', NULL, NULL, 1, NULL, '2021-09-22 02:32:26', '2021-09-22 02:32:26'),
(24, 20, 'transformatepro.com', '2020-01-15', '2022-01-15', NULL, NULL, 2, NULL, '2021-09-22 02:33:02', '2021-09-22 02:33:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
