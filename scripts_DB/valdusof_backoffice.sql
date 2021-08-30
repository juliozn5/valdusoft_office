-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2021 a las 20:54:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `payed_at` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Pendiente, 1 - Pagada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('C','E','H') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'C - Cliente, E - Empleado, H - Hosting',
  `hosting_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `abbreviation`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'EU', NULL, NULL),
(2, 'Canada', NULL, NULL, NULL),
(3, 'Afghanistan', NULL, NULL, NULL),
(4, 'Albania', NULL, NULL, NULL),
(5, 'Algeria', NULL, NULL, NULL),
(6, 'American Samoa', NULL, NULL, NULL),
(7, 'Andorra', NULL, NULL, NULL),
(8, 'Angola', NULL, NULL, NULL),
(9, 'Anguilla', NULL, NULL, NULL),
(10, 'Antartica', NULL, NULL, NULL),
(11, 'Antigua and/or Barbuda', NULL, NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', NULL, NULL, NULL),
(14, 'Aruba', NULL, NULL, NULL),
(15, 'Australia', NULL, NULL, NULL),
(16, 'Austria', NULL, NULL, NULL),
(17, 'Azerbaijan', NULL, NULL, NULL),
(18, 'Bahamas', NULL, NULL, NULL),
(19, 'Bahrain', NULL, NULL, NULL),
(20, 'Bangladesh', NULL, NULL, NULL),
(21, 'Barbados', NULL, NULL, NULL),
(22, 'Belarus', NULL, NULL, NULL),
(23, 'Belgium', NULL, NULL, NULL),
(24, 'Belize', NULL, NULL, NULL),
(25, 'Benin', NULL, NULL, NULL),
(26, 'Bermuda', NULL, NULL, NULL),
(27, 'Bhutan', NULL, NULL, NULL),
(28, 'Bolivia', NULL, NULL, NULL),
(29, 'Bosnia and Herzegovina', NULL, NULL, NULL),
(30, 'Botswana', NULL, NULL, NULL),
(31, 'Bouvet Island', NULL, NULL, NULL),
(32, 'Brazil', NULL, NULL, NULL),
(34, 'Brunei Darussalam', NULL, NULL, NULL),
(35, 'Bulgaria', NULL, NULL, NULL),
(36, 'Burkina Faso', NULL, NULL, NULL),
(37, 'Burundi', NULL, NULL, NULL),
(38, 'Cambodia', NULL, NULL, NULL),
(39, 'Cameroon', NULL, NULL, NULL),
(40, 'Cape Verde', NULL, NULL, NULL),
(41, 'Cayman Islands', NULL, NULL, NULL),
(42, 'Central African Republic', NULL, NULL, NULL),
(43, 'Chad', NULL, NULL, NULL),
(44, 'Chile', 'CH', NULL, NULL),
(45, 'China', NULL, NULL, NULL),
(46, 'Christmas Island', NULL, NULL, NULL),
(47, 'Cocos (Keeling) Islands', NULL, NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', NULL, NULL, NULL),
(50, 'Congo', NULL, NULL, NULL),
(51, 'Cook Islands', NULL, NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', NULL, NULL, NULL),
(54, 'Cuba', NULL, NULL, NULL),
(55, 'Cyprus', NULL, NULL, NULL),
(56, 'Czech Republic', NULL, NULL, NULL),
(57, 'Denmark', NULL, NULL, NULL),
(58, 'Djibouti', NULL, NULL, NULL),
(59, 'Dominica', NULL, NULL, NULL),
(60, 'Dominican Republic', NULL, NULL, NULL),
(61, 'East Timor', NULL, NULL, NULL),
(62, 'Ecuador', 'EC', NULL, NULL),
(63, 'Egypt', NULL, NULL, NULL),
(64, 'El Salvador', NULL, NULL, NULL),
(65, 'Equatorial Guinea', NULL, NULL, NULL),
(66, 'Eritrea', NULL, NULL, NULL),
(67, 'Estonia', NULL, NULL, NULL),
(68, 'Ethiopia', NULL, NULL, NULL),
(69, 'Falkland Islands (Malvinas)', NULL, NULL, NULL),
(70, 'Faroe Islands', NULL, NULL, NULL),
(71, 'Fiji', NULL, NULL, NULL),
(72, 'Finland', NULL, NULL, NULL),
(73, 'France', NULL, NULL, NULL),
(74, 'France, Metropolitan', NULL, NULL, NULL),
(75, 'French Guiana', NULL, NULL, NULL),
(76, 'French Polynesia', NULL, NULL, NULL),
(77, 'French Southern Territories', NULL, NULL, NULL),
(78, 'Gabon', NULL, NULL, NULL),
(79, 'Gambia', NULL, NULL, NULL),
(80, 'Georgia', NULL, NULL, NULL),
(81, 'Germany', NULL, NULL, NULL),
(82, 'Ghana', NULL, NULL, NULL),
(83, 'Gibraltar', NULL, NULL, NULL),
(84, 'Greece', NULL, NULL, NULL),
(85, 'Greenland', NULL, NULL, NULL),
(86, 'Grenada', NULL, NULL, NULL),
(87, 'Guadeloupe', NULL, NULL, NULL),
(88, 'Guam', NULL, NULL, NULL),
(89, 'Guatemala', NULL, NULL, NULL),
(90, 'Guinea', NULL, NULL, NULL),
(91, 'Guinea-Bissau', NULL, NULL, NULL),
(92, 'Guyana', NULL, NULL, NULL),
(93, 'Haiti', NULL, NULL, NULL),
(94, 'Heard and Mc Donald Islands', NULL, NULL, NULL),
(95, 'Honduras', NULL, NULL, NULL),
(96, 'Hong Kong', NULL, NULL, NULL),
(97, 'Hungary', NULL, NULL, NULL),
(98, 'Iceland', NULL, NULL, NULL),
(99, 'India', NULL, NULL, NULL),
(100, 'Indonesia', NULL, NULL, NULL),
(101, 'Iran (Islamic Republic of)', NULL, NULL, NULL),
(102, 'Iraq', NULL, NULL, NULL),
(103, 'Ireland', NULL, NULL, NULL),
(104, 'Israel', NULL, NULL, NULL),
(105, 'Italy', NULL, NULL, NULL),
(106, 'Ivory Coast', NULL, NULL, NULL),
(107, 'Jamaica', NULL, NULL, NULL),
(108, 'Japan', NULL, NULL, NULL),
(109, 'Jordan', NULL, NULL, NULL),
(110, 'Kazakhstan', NULL, NULL, NULL),
(111, 'Kenya', NULL, NULL, NULL),
(112, 'Kiribati', NULL, NULL, NULL),
(113, 'Korea, Democratic People\'s Republic of', NULL, NULL, NULL),
(114, 'Korea, Republic of', NULL, NULL, NULL),
(115, 'Kosovo', NULL, NULL, NULL),
(116, 'Kuwait', NULL, NULL, NULL),
(117, 'Kyrgyzstan', NULL, NULL, NULL),
(118, 'Lao People\'s Democratic Republic', NULL, NULL, NULL),
(119, 'Latvia', NULL, NULL, NULL),
(120, 'Lebanon', NULL, NULL, NULL),
(121, 'Lesotho', NULL, NULL, NULL),
(122, 'Liberia', NULL, NULL, NULL),
(123, 'Libyan Arab Jamahiriya', NULL, NULL, NULL),
(124, 'Liechtenstein', NULL, NULL, NULL),
(125, 'Lithuania', NULL, NULL, NULL),
(126, 'Luxembourg', NULL, NULL, NULL),
(127, 'Macau', NULL, NULL, NULL),
(128, 'Macedonia', NULL, NULL, NULL),
(129, 'Madagascar', NULL, NULL, NULL),
(130, 'Malawi', NULL, NULL, NULL),
(131, 'Malaysia', NULL, NULL, NULL),
(132, 'Maldives', NULL, NULL, NULL),
(133, 'Mali', NULL, NULL, NULL),
(134, 'Malta', NULL, NULL, NULL),
(135, 'Marshall Islands', NULL, NULL, NULL),
(136, 'Martinique', NULL, NULL, NULL),
(137, 'Mauritania', NULL, NULL, NULL),
(138, 'Mauritius', NULL, NULL, NULL),
(139, 'Mayotte', NULL, NULL, NULL),
(140, 'México', 'MEX', NULL, NULL),
(141, 'Micronesia, Federated States of', NULL, NULL, NULL),
(142, 'Moldova, Republic of', NULL, NULL, NULL),
(143, 'Monaco', NULL, NULL, NULL),
(144, 'Mongolia', NULL, NULL, NULL),
(145, 'Montenegro', NULL, NULL, NULL),
(146, 'Montserrat', NULL, NULL, NULL),
(147, 'Morocco', NULL, NULL, NULL),
(148, 'Mozambique', NULL, NULL, NULL),
(149, 'Myanmar', NULL, NULL, NULL),
(150, 'Namibia', NULL, NULL, NULL),
(151, 'Nauru', NULL, NULL, NULL),
(152, 'Nepal', NULL, NULL, NULL),
(153, 'Netherlands', NULL, NULL, NULL),
(154, 'Netherlands Antilles', NULL, NULL, NULL),
(155, 'New Caledonia', NULL, NULL, NULL),
(156, 'New Zealand', NULL, NULL, NULL),
(157, 'Nicaragua', NULL, NULL, NULL),
(158, 'Niger', NULL, NULL, NULL),
(159, 'Nigeria', NULL, NULL, NULL),
(160, 'Niue', NULL, NULL, NULL),
(161, 'Norfork Island', NULL, NULL, NULL),
(162, 'Northern Mariana Islands', NULL, NULL, NULL),
(163, 'Norway', NULL, NULL, NULL),
(164, 'Oman', NULL, NULL, NULL),
(165, 'Pakistan', NULL, NULL, NULL),
(166, 'Palau', NULL, NULL, NULL),
(167, 'Panama', 'PA', NULL, NULL),
(168, 'Papua New Guinea', NULL, NULL, NULL),
(169, 'Paraguay', NULL, NULL, NULL),
(170, 'Peru', 'PE', NULL, NULL),
(171, 'Philippines', NULL, NULL, NULL),
(172, 'Pitcairn', NULL, NULL, NULL),
(173, 'Poland', NULL, NULL, NULL),
(174, 'Portugal', NULL, NULL, NULL),
(175, 'Puerto Rico', NULL, NULL, NULL),
(176, 'Qatar', NULL, NULL, NULL),
(177, 'Reunion', NULL, NULL, NULL),
(178, 'Romania', NULL, NULL, NULL),
(179, 'Russian Federation', NULL, NULL, NULL),
(180, 'Rwanda', NULL, NULL, NULL),
(181, 'Saint Kitts and Nevis', NULL, NULL, NULL),
(182, 'Saint Lucia', NULL, NULL, NULL),
(183, 'Saint Vincent and the Grenadines', NULL, NULL, NULL),
(184, 'Samoa', NULL, NULL, NULL),
(185, 'San Marino', NULL, NULL, NULL),
(186, 'Sao Tome and Principe', NULL, NULL, NULL),
(187, 'Saudi Arabia', NULL, NULL, NULL),
(188, 'Senegal', NULL, NULL, NULL),
(189, 'Serbia', NULL, NULL, NULL),
(190, 'Seychelles', NULL, NULL, NULL),
(191, 'Sierra Leone', NULL, NULL, NULL),
(192, 'Singapore', NULL, NULL, NULL),
(193, 'Slovakia', NULL, NULL, NULL),
(194, 'Slovenia', NULL, NULL, NULL),
(195, 'Solomon Islands', NULL, NULL, NULL),
(196, 'Somalia', NULL, NULL, NULL),
(197, 'South Africa', NULL, NULL, NULL),
(198, 'South Georgia South Sandwich Islands', NULL, NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', NULL, NULL, NULL),
(201, 'St. Helena', NULL, NULL, NULL),
(202, 'St. Pierre and Miquelon', NULL, NULL, NULL),
(203, 'Sudan', NULL, NULL, NULL),
(204, 'Suriname', NULL, NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', NULL, NULL, NULL),
(206, 'Swaziland', NULL, NULL, NULL),
(207, 'Sweden', NULL, NULL, NULL),
(208, 'Switzerland', NULL, NULL, NULL),
(209, 'Syrian Arab Republic', NULL, NULL, NULL),
(210, 'Taiwan', NULL, NULL, NULL),
(211, 'Tajikistan', NULL, NULL, NULL),
(212, 'Tanzania, United Republic of', NULL, NULL, NULL),
(213, 'Thailand', NULL, NULL, NULL),
(214, 'Togo', NULL, NULL, NULL),
(215, 'Tokelau', NULL, NULL, NULL),
(216, 'Tonga', NULL, NULL, NULL),
(217, 'Trinidad and Tobago', NULL, NULL, NULL),
(218, 'Tunisia', NULL, NULL, NULL),
(219, 'Turkey', NULL, NULL, NULL),
(220, 'Turkmenistan', NULL, NULL, NULL),
(221, 'Turks and Caicos Islands', NULL, NULL, NULL),
(222, 'Tuvalu', NULL, NULL, NULL),
(223, 'Uganda', NULL, NULL, NULL),
(224, 'Ukraine', NULL, NULL, NULL),
(225, 'United Arab Emirates', NULL, NULL, NULL),
(226, 'United Kingdom', NULL, NULL, NULL),
(227, 'United States minor outlying islands', NULL, NULL, NULL),
(228, 'Uruguay', NULL, NULL, NULL),
(229, 'Uzbekistan', NULL, NULL, NULL),
(230, 'Vanuatu', NULL, NULL, NULL),
(231, 'Vatican City State', NULL, NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', NULL, NULL, NULL),
(238, 'Yemen', NULL, NULL, NULL),
(239, 'Yugoslavia', NULL, NULL, NULL),
(240, 'Zaire', NULL, NULL, NULL),
(241, 'Zambia', NULL, NULL, NULL),
(242, 'Zimbawe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financing`
--

CREATE TABLE `financing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` double NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Activo, 1 - Pagago, 2 - Cancelado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `financing_payments`
--

CREATE TABLE `financing_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `financing_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hostings`
--

CREATE TABLE `hostings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `price` double NOT NULL,
  `renewal_price` double NOT NULL,
  `years` double NOT NULL,
  `renewal_hosting` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hostings`
--

INSERT INTO `hostings` (`id`, `url`, `create_date`, `due_date`, `price`, `renewal_price`, `years`, `renewal_hosting`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'camilo.com', '2021-07-01', '2021-07-30', 0, 0, 0, 0, '2021-07-01 19:53:00', '2021-07-01 19:53:00', 10),
(2, 'breve.com.co/', '2020-04-26', '2022-04-26', 0, 0, 0, 0, '2021-07-06 21:08:01', '2021-07-06 21:08:01', 22),
(3, 'lisosylisos.co', '2020-10-07', '2021-10-07', 0, 0, 0, 0, '2021-07-06 21:13:03', '2021-07-06 21:13:04', 23),
(4, 'redvida.biz', '2021-03-04', '2022-03-04', 0, 0, 0, 0, '2021-07-06 21:15:50', '2021-07-06 21:15:51', 24),
(5, 'royalgreen.company', '2020-10-01', '2021-10-01', 0, 0, 0, 0, '2021-07-06 21:16:42', '2021-07-06 21:16:43', 16),
(6, 'sellofintrust.co', '2021-06-18', '2022-06-18', 0, 0, 0, 0, '2021-07-06 21:17:33', '2021-07-06 21:17:34', 19),
(7, 'tiendaimpaz.cl', '2021-03-23', '2022-03-23', 0, 0, 0, 0, '2021-07-06 21:19:45', '2021-07-06 21:19:45', 25),
(8, 'transformatepro.com', '2020-01-15', '2022-01-15', 0, 0, 0, 0, '2021-07-06 21:21:59', '2021-07-06 21:21:59', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_01_07_165343_create_profiles_table', 1),
(4, '2021_01_08_000000_create_users_table', 1),
(5, '2021_03_29_184112_create_hostings_table', 1),
(6, '2021_03_30_195040_create_projects_table', 1),
(7, '2021_03_31_101515_create_clients_table', 1),
(8, '2021_05_07_185833_update_users_table', 1),
(9, '2021_05_17_183958_create_skills_table', 1),
(10, '2021_05_17_184513_create_skills_users_table', 1),
(11, '2021_05_18_181108_create_projects_users_table', 1),
(12, '2021_06_18_221653_update_hostings_table', 1),
(13, '2021_06_18_223225_update_projects_table', 1),
(14, '2021_06_21_135739_create_bills_table', 1),
(15, '2021_06_22_143433_create_countries_table', 1),
(16, '2021_06_22_152213_update_projects_table2', 1),
(17, '2021_06_22_163649_create_technologies_table', 1),
(18, '2021_06_22_163724_create_projects_technologies_table', 1),
(19, '2021_06_23_144134_update_projects_table3', 1),
(20, '2021_06_23_160330_create_project_attachments_table', 1),
(21, '2021_06_23_195623_create_project_accounting_transactions_table', 2),
(22, '2021_06_24_193424_update_users_table2', 3),
(23, '2021_06_28_150008_create_chat_table', 3),
(24, '2021_06_28_193725_create_payments_table', 3),
(25, '2021_06_29_133255_update_table_payments', 4),
(26, '2021_06_29_151810_create_payrolls_table', 4),
(27, '2021_06_30_174526_update_bill_table', 5),
(28, '2021_07_05_174407_create_payrolls_employee_table', 5),
(29, '2021_07_05_174805_create_financing_table', 5),
(30, '2021_07_05_175047_create_financing_payments_table', 5),
(31, '2021_07_07_125951_add_price_renewal_price_to_hostings', 5),
(32, '2021_07_07_184636_add_years_to_hostings', 5),
(33, '2021_07_12_124633_update_hosting_add_table_renewall', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joel@hotmail.com', '$2y$10$pXHOh20oDL9yyasQ3C8sKOXF54JMEJyK7jnESAYkV4BIK/VS5vLKe', '2021-06-28 18:27:25'),
('joelgoyosaez@gmail.com', '$2y$10$owUJ30jV3v9dSytCPmsMAuc9ggBRaBEKKqurIDxChltdZwXFTrzNW', '2021-06-28 20:50:21'),
('joel@hotmail.com', '$2y$10$pXHOh20oDL9yyasQ3C8sKOXF54JMEJyK7jnESAYkV4BIK/VS5vLKe', '2021-06-28 18:27:25'),
('joelgoyosaez@gmail.com', '$2y$10$owUJ30jV3v9dSytCPmsMAuc9ggBRaBEKKqurIDxChltdZwXFTrzNW', '2021-06-28 20:50:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `fee` double NOT NULL DEFAULT 0,
  `total` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Pendiente, 1 - Completado, 2 - Rechazado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Pendiente, 1 - Completada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payrolls_employee`
--

CREATE TABLE `payrolls_employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price_by_hour` double NOT NULL,
  `total_hours` double NOT NULL,
  `total_amount` double NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Pendiente, 1 - Completada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `profile`, `created_at`, `updated_at`) VALUES
(0, 'Nuevo', '2021-05-07 21:08:03', '2021-05-07 21:08:03'),
(1, 'Administrador', '2021-05-07 21:08:21', '2021-05-07 21:08:21'),
(2, 'Cliente', '2021-05-07 21:08:21', '2021-05-07 21:08:21'),
(3, 'Empleado\r\n', '2021-05-07 21:08:21', '2021-05-07 21:08:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - No atendido, 1 - En proceso, 2 - Testiando, 3 - Completado, 4 - Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `start_date`, `created_at`, `updated_at`, `user_id`, `slug`, `ending_date`, `logo`, `country_id`, `type`, `status`) VALUES
(1, 'a', '2021-06-23', '2021-06-24 00:04:26', '2021-06-24 00:04:26', 7, 'a', '2021-06-27', NULL, 2, 'Fijo', '0'),
(2, 'awsd a sd asasa', '2021-06-23', '2021-06-24 00:22:00', '2021-06-24 00:22:00', 6, 'awsd-a-sd-asasa', '2021-06-27', NULL, 1, 'Fijo', '0'),
(3, 'AKR', '2021-07-05', '2021-07-12 23:22:14', '2021-07-12 23:22:28', 13, 'akr', '2021-10-08', NULL, NULL, 'Entrega', '3'),
(4, 'Binary Target', '2021-06-24', '2021-07-12 23:30:17', '2021-07-12 23:30:17', 12, 'binary-target', '2021-08-05', NULL, NULL, 'Entrega', '0'),
(5, 'HDLR', '2021-05-13', '2021-07-12 23:40:48', '2021-07-12 23:40:48', 14, 'hdlr', '2021-06-28', '5.png', NULL, 'Entrega', '0'),
(6, 'Bfx', '2021-06-07', '2021-07-12 23:42:22', '2021-07-12 23:42:22', 14, 'bfx', '2021-07-21', NULL, NULL, 'Entrega', '0'),
(7, 'Inspire Heading', '2021-04-19', '2021-07-12 23:45:01', '2021-07-12 23:45:01', 15, 'inspire-heading', '2021-06-21', '7.png', NULL, 'Entrega', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_technologies`
--

CREATE TABLE `projects_technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `technology_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects_technologies`
--

INSERT INTO `projects_technologies` (`id`, `project_id`, `technology_id`, `created_at`, `updated_at`) VALUES
(1, 1, 14, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 2, 14, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 2, 10, NULL, NULL),
(6, 2, 9, '2021-06-24 20:49:40', '2021-06-24 20:49:40'),
(7, 3, 2, NULL, NULL),
(8, 3, 3, NULL, NULL),
(9, 3, 9, NULL, NULL),
(10, 4, 6, NULL, NULL),
(11, 4, 2, NULL, NULL),
(12, 4, 3, NULL, NULL),
(13, 4, 9, NULL, NULL),
(14, 5, 6, NULL, NULL),
(15, 5, 2, NULL, NULL),
(16, 5, 9, NULL, NULL),
(17, 6, 6, NULL, NULL),
(18, 6, 2, NULL, NULL),
(19, 6, 3, NULL, NULL),
(20, 6, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_users`
--

CREATE TABLE `projects_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects_users`
--

INSERT INTO `projects_users` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 8, '2021-06-25 02:28:04', '2021-06-25 02:28:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_accounting_transactions`
--

CREATE TABLE `project_accounting_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('+','-') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '+ - Ingreso, - Egreso',
  `amount` double NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Pendiente, 1 - Completada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_attachments`
--

CREATE TABLE `project_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills_users`
--

CREATE TABLE `skills_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `technologies`
--

INSERT INTO `technologies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wordpress', '2021-03-09 10:30:40', '2021-03-09 10:30:46'),
(2, 'CSS3', '2021-03-09 10:30:49', '2021-03-09 10:30:51'),
(3, 'HTML5', '2021-03-09 10:30:40', '2021-03-09 10:30:46'),
(4, 'Javascript', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(5, 'JQuery', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(6, 'Bootstrap', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(7, 'Drupal', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(8, 'VueJS', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(9, 'Laravel', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(10, 'Uikit', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(11, 'Magento', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(12, 'Prestashop', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(13, 'Ionic', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(14, 'Angular', '2021-03-09 10:31:14', '2021-03-09 10:31:14'),
(15, 'ReactJS', '2021-03-09 10:31:14', '2021-03-09 10:31:14');

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
(5, 'joel', 'andres', 'joel', 'joel@hotmail.com', '555555555555', '2021-06-25', '2021-06-26', '2021-06-27 13:44:57', '$2y$10$ko6hbqyQZsVJYvQYZJ4b8OLnTfzXd0LROhrI.CCbS/FdCXMiZO47q', '1', 1, 'aBtwT4jVOsPLC0TkjTYgKnuOdglUhWb1tnoQjCSWzShUYu7klZwbE7LfWMvf', '2021-06-24 00:02:18', '2021-06-24 00:02:18', '10', NULL, 4, 'a', NULL, NULL),
(6, 'Freddy', 'Millan', '', 'freddymillan@valdusoft.com', '+584120924853', '2021-06-23', '2021-06-23', '2021-06-23 20:03:12', '12345678', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Carlos', 'Gonzalez', '', 'carlosgonzalez@valdusoft.com', '+584123597875', '2021-06-23', '2021-06-23', '2021-06-23 20:03:12', '12345678', NULL, 3, NULL, NULL, '2021-07-06 20:03:41', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Luisana', 'Marin', '', 'luisanamarin@valdusoft.com', '+584120924871', NULL, NULL, NULL, '$2y$10$yfar1ISof2qxLW7nZe6LzuzPyrU/9N9oyHZQqbMSxJQrdIQhj024W', NULL, 3, NULL, '2021-06-24 18:41:19', '2021-06-24 18:41:19', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Luis', 'Briceno', '', 'luisbriceno@valdusoft.com', NULL, NULL, NULL, NULL, '$2y$10$9lTjXzVWycwiDNDPZ4iPbuLi4jaR0hg9ae8Zuk6TJdYQozAKJr966', NULL, 3, NULL, '2021-06-28 18:50:57', '2021-06-28 18:50:57', NULL, NULL, NULL, NULL, NULL, NULL),
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
(26, 'Stybaliz', 'Castellano', 'stybaliz-castellano', 'Stybalizc@hotmail.com', '+57 301 6088008', NULL, NULL, NULL, '$2y$10$6yZI5hOofg7VtIvs4rj.Guql2GI16yf851vEnmj.f2RJH1TZsPAdi', NULL, 2, NULL, '2021-07-06 21:21:19', '2021-07-06 21:21:19', NULL, NULL, NULL, NULL, '26.jpg', NULL),
(28, 'Freddy', 'Millan', '', 'freddymillan2@valdusoft.com', '+584120924853', '2021-06-23', '2021-06-23', '2021-06-23 20:03:12', '12345678', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Freddy', 'Millan', '', 'freddymillan3@valdusoft.com', '+584120924853', '2021-06-23', '2021-06-23', '2021-06-23 20:03:12', '12345678', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`),
  ADD KEY `bills_hosting_id_foreign` (`hosting_id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_project_id_foreign` (`project_id`),
  ADD KEY `chat_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `financing`
--
ALTER TABLE `financing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financing_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `financing_payments`
--
ALTER TABLE `financing_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financing_payments_financing_id_foreign` (`financing_id`);

--
-- Indices de la tabla `hostings`
--
ALTER TABLE `hostings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostings_user_id_foreign` (`user_id`);

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
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_bill_id_foreign` (`bill_id`);

--
-- Indices de la tabla `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payrolls_employee`
--
ALTER TABLE `payrolls_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_employee_payroll_id_foreign` (`payroll_id`),
  ADD KEY `payrolls_employee_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`),
  ADD KEY `projects_country_id_foreign` (`country_id`);

--
-- Indices de la tabla `projects_technologies`
--
ALTER TABLE `projects_technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_technologies_project_id_foreign` (`project_id`),
  ADD KEY `projects_technologies_technology_id_foreign` (`technology_id`);

--
-- Indices de la tabla `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_users_project_id_foreign` (`project_id`),
  ADD KEY `projects_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `project_accounting_transactions`
--
ALTER TABLE `project_accounting_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_accounting_transactions_project_id_foreign` (`project_id`);

--
-- Indices de la tabla `project_attachments`
--
ALTER TABLE `project_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_attachments_project_id_foreign` (`project_id`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `skills_users`
--
ALTER TABLE `skills_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_users_skill_id_foreign` (`skill_id`),
  ADD KEY `skills_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `financing`
--
ALTER TABLE `financing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `financing_payments`
--
ALTER TABLE `financing_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hostings`
--
ALTER TABLE `hostings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payrolls_employee`
--
ALTER TABLE `payrolls_employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `projects_technologies`
--
ALTER TABLE `projects_technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `projects_users`
--
ALTER TABLE `projects_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_accounting_transactions`
--
ALTER TABLE `project_accounting_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project_attachments`
--
ALTER TABLE `project_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `skills_users`
--
ALTER TABLE `skills_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_hosting_id_foreign` FOREIGN KEY (`hosting_id`) REFERENCES `hostings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `chat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `financing`
--
ALTER TABLE `financing`
  ADD CONSTRAINT `financing_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `financing_payments`
--
ALTER TABLE `financing_payments`
  ADD CONSTRAINT `financing_payments_financing_id_foreign` FOREIGN KEY (`financing_id`) REFERENCES `financing` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `hostings`
--
ALTER TABLE `hostings`
  ADD CONSTRAINT `hostings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `payrolls_employee`
--
ALTER TABLE `payrolls_employee`
  ADD CONSTRAINT `payrolls_employee_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payrolls_employee_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `projects_technologies`
--
ALTER TABLE `projects_technologies`
  ADD CONSTRAINT `projects_technologies_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `projects_technologies_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`);

--
-- Filtros para la tabla `projects_users`
--
ALTER TABLE `projects_users`
  ADD CONSTRAINT `projects_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `projects_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `project_accounting_transactions`
--
ALTER TABLE `project_accounting_transactions`
  ADD CONSTRAINT `project_accounting_transactions_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Filtros para la tabla `project_attachments`
--
ALTER TABLE `project_attachments`
  ADD CONSTRAINT `project_attachments_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Filtros para la tabla `skills_users`
--
ALTER TABLE `skills_users`
  ADD CONSTRAINT `skills_users_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `skills_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
