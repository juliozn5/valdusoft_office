-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-09-2021 a las 16:04:20
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
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `slug`, `description`, `link`, `start_date`, `ending_date`, `logo`, `country_id`, `type`, `status`, `visible_landing`, `created_at`, `updated_at`) VALUES
(10, 1, 'Efranet', 'efranet', 'Desarrollo en Wordpress, Agencia de hosting y Almacenamiento', 'https://www.efranet.net/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-03-09 19:53:13', '2021-03-09 19:53:13'),
(11, 1, 'Ccyt', 'ccyt', 'Web Informativa realizada en Wordpress para centro de educacion', 'https://www.behance.net/gallery/31621473/Arreglos-a-pagina-web-de-ccyt', NULL, NULL, '11.webp', NULL, NULL, '0', '0', NULL, NULL),
(12, 1, 'Only kite surf', 'only-kite-surf', 'Desarrollo Web a medida en HTML5, CSS3, JS, Jquery y bootstrap 3, basada en la tecnica pixel perfect', 'http://www.onlykiteschool.com.ar/', NULL, NULL, '12.webp', NULL, NULL, '0', '0', NULL, NULL),
(13, 1, 'Profesores extranjeros', 'profesores-extranjeros', 'Rediseño de web informativa en Drupal con técnicas UI/UX', 'https://profesoresextranjeros.com/', NULL, NULL, '13.webp', NULL, NULL, '0', '0', NULL, NULL),
(14, 1, 'Preansa', 'preansa', 'Web Corporativa realizada en Wordpress', 'http://www.preansa.com.co/', NULL, NULL, '14.webp', NULL, NULL, '0', '0', NULL, NULL),
(15, 1, 'MBA', 'mba', 'Desarrollo web en laravel y VueJs, con sistema de streaming', 'https://mybusinessacademypro.com/academia', NULL, NULL, '15.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:17:52'),
(16, 1, 'Fxecrypto', 'fxecrypto', 'Desarrollo con laravel y 3web.js integración a blochain', 'https://www.ecryptosmart.com/', NULL, NULL, '16.webp', NULL, NULL, '0', '0', NULL, NULL),
(17, 1, 'Transformate', 'transformate', 'Plataforma E-Learning con Laravel y Uikit CSS', 'https://transformatepro.com/', NULL, NULL, '17.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:23:08'),
(18, 1, 'Levelup', 'levelup', 'Sotfware Multinivel Con Laravel', 'https://comunidadlevelup.com/', NULL, NULL, '18.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:23:35'),
(19, 1, 'Cruzatel', 'cruzatel', 'Software Multinivel con Laravel e Integración a Coinpayments', 'https://www.cruzatel.com/', NULL, NULL, '19.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:24:30'),
(20, 1, 'Breve', 'breve', 'Software para Deliverys, Laravel', 'https://breve.com.co/programardomicilio', NULL, NULL, '20.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:24:59'),
(21, 1, 'Bananalegal', 'bananalegal', 'Software para administración y firma de documentos por medio de blockchain', 'https://legalbananas.com/', NULL, NULL, '21.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:25:27'),
(22, 7, 'Brainbow', 'brainbow', 'Software Multinivel con Laravel e integración a Coinpayments', 'https://brainbow.capital/', NULL, NULL, '22.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:26:05'),
(23, 1, 'Universal Profits', 'universal-profits', 'Software Multinivel con Laravel e integración a Coinpayments, control de inversiones', 'https://universal-profits.com/mioficina/login', NULL, NULL, '23.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:27:18'),
(24, 1, 'Unión Capital', 'union-capital', 'Software Multinivel con Laravel e integración a Coinpayments,', 'https://mioficina.unioncapital.eu/', NULL, NULL, '24.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:27:47'),
(25, 1, 'Royal green', 'royal-green', 'Software Multinivel con Laravel e integración a Coinpayments', 'https://royalgreen.company/mioficina/login', NULL, NULL, '25.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:28:17'),
(26, 1, 'Viral media', 'viral-media', 'Software Multinivel con Laravel e integración a Coinpayments', 'https://viralmediapanel.com/', NULL, NULL, '26.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:28:56'),
(27, 1, 'Emedusc', 'emedusc', 'LMS en Wordpress y Woocommerce', 'https://emeduc.org/sobre-nosotros/', NULL, NULL, '27.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:29:36'),
(28, 1, 'Calzado Garvi', 'calzado-garvi', 'Ecommerce de Zapatería realizado en Magento', 'https://www.behance.net/gallery/40896299/Garvi', NULL, NULL, '28.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:30:13'),
(29, 1, 'Instituto Especial Colón', 'instituto-especial-colon', 'Web informativa para instituto Especial', 'https://www.behance.net/gallery/31965983/Instituto-Especial-colon', NULL, NULL, '29.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:30:44'),
(30, 1, 'Enterprise', 'enterprise', 'Sistema de Tranking en PHP', 'https://www.behance.net/gallery/36368447/Diseno-web-y-Sistema-php-para-Enterprice Xkd', NULL, NULL, '30.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:31:08'),
(31, 1, 'XKD', 'xkd', 'Ecommerce con customizador de camisetas Wordpress', 'https://www.behance.net/gallery/37734099/Diseno-web-Xkd', NULL, NULL, '31.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:31:42'),
(32, 7, 'Alimac', 'alimac', 'Tienda de videojuegos en Prestashop', 'https://www.behance.net/gallery/38189091/Alimac', NULL, NULL, '32.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:32:06'),
(33, 1, 'Magic travel', 'magic-travel', 'Web Informativa realizada en Wordpress', 'https://www.behance.net/gallery/109277841/Magic-Travel', NULL, NULL, '33.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:32:32'),
(34, 1, 'Tinytu', 'tinytu', 'Ecommerce de títeres en Prestashop', 'https://www.behance.net/gallery/40897253/Tinytu', NULL, NULL, '34.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:32:56'),
(35, 1, 'Fittech', 'fittech', 'App Móvil de entrenamiento y nutrición', 'https://valdusoft.com/', NULL, NULL, '35.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:19:06'),
(36, 1, 'Liso y liso', 'liso-y-liso', 'Web Informativa realizada en Wordpress', 'https://lisosylisos.co', NULL, NULL, '36.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:19:48'),
(37, 1, 'Hs stone', 'hs-stone', 'Catálogo realizado en Wordpress', 'https://www.hsstonegallery.com/', NULL, NULL, '37.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:20:20'),
(38, 1, 'Recomiendo', 'recomiendo', 'App Movil de sitios y comidas', 'https://valdusoft.com/', NULL, NULL, '38.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:20:53'),
(39, 1, 'Bastian', 'bastian', 'App Móvil de Captación', 'https://valdusoft.com/', NULL, NULL, '39.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:21:30'),
(40, 1, 'Dore The Golden Cake', 'dore-the-golden-cake', 'Web Informativa realizada en Wordpress', 'https://dorethegoldencake.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:49:00', '2021-03-09 20:16:21'),
(41, 1, 'Lavanderia Universal', 'lavanderia-universal', 'Web Informativa realizada en Wordpress', 'http://lavanderiauniversal.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-03-09 20:16:38'),
(42, 1, 'Sello de confianza', 'sello-de-confianza', 'Formulario y backoffice', 'https://valdusoft.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:49:00', '2021-02-18 23:49:00'),
(43, 1, 'Dimelo', 'dimelo', 'Web de captación realizada en React.js', 'https://dimelo.vip/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:49:00', '2021-02-18 23:49:00'),
(44, 1, 'GoldenBIT', 'goldenbit', 'Software Multinivel con Laravel e integración a Coinpayments', 'http://goldenbit.company/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:49:00', '2021-03-09 20:34:19'),
(45, 1, 'Trasendence', 'trasendence', 'Landing de captación con embudo de venta', 'https://eventos.universal-profits.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:49:00', '2021-03-09 20:34:40'),
(46, 1, 'Wealht ocean', 'wealth-ocean', 'Landing web informativa y backoffice', 'https://valdusoft.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(47, 1, 'FTX Live', 'ftx-live', 'Dsearrollo web en laravel y VueJs, con sistema de streaming', 'http://ftxlive.com/office', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(48, 1, 'Vitawel', 'vitawel', 'Dsearrollo web en laravel y Angular', 'https://valdusoft.com/', NULL, NULL, '48.webp', NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(49, 1, 'Tienda Impaz', 'tienda-impaz', 'Ecommerce con Wordpress', 'https://valdusoft.com', NULL, NULL, '49.webp', NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(50, 1, 'Merciad', 'merciad', 'Desarrollo web en laravel', 'https://valdusoft.com/', NULL, NULL, '50.webp', NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(51, 1, 'TecnoBox Store', 'tecnobox-store', 'Ecommerce con Wordpress', 'https://valdusoft.com', NULL, NULL, '51.webp', NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(52, 1, 'Tecno Pug', 'tecno-pug', 'Ecommerce con Wordpress', 'https://valdusoft.com', NULL, NULL, '52.webp', NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(53, 1, 'Alma Coach', 'alma-coach', 'Web de membresías en Wordpress', 'https://amacoach.com/', NULL, NULL, '53.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:09:45'),
(54, 1, 'America del Sur', 'america-del-sur', 'Ecommerce con Magento de moda', 'https://amacoach.com/', NULL, NULL, '54.webp', NULL, NULL, '0', '0', NULL, NULL),
(55, 1, 'Chineko', 'chineko', 'Ecommerce de cholas con Wordpress', 'https://chineko.com.ar/', NULL, NULL, '55.webp', NULL, NULL, '0', '0', NULL, NULL),
(56, 1, 'Dino Butelli', 'dino-butelli', 'Ecommerce de calzado con Wordpress', 'https://dinobutelli.com.ar/', NULL, NULL, '56.webp', NULL, NULL, '0', '0', NULL, NULL),
(57, 1, 'Zumik', 'zumik', 'Catalogo realizada en Wordpress', 'https://pintureriaszumik.com.ar/', NULL, NULL, '57.webp', NULL, NULL, '0', '0', NULL, '2021-03-09 20:12:56'),
(58, 1, 'Zetla', 'zetla', 'Desarrollo landing pixel perfect', 'https://zetla.com.ar/', NULL, NULL, '58.webp', NULL, NULL, '0', '0', NULL, NULL),
(59, 1, 'Fullpowermoto', 'fullpowermoto', 'Ecommerce con Wordpress', 'https://fullpowermoto.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:49:00', '2021-02-18 23:49:00'),
(60, 1, 'Zona Inmobiliaria', 'zona-inmobiliaria', 'Venta de inmuebles en wordpres', 'https://valdusoft.com', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-18 23:54:15', '2021-02-18 23:54:15'),
(61, 1, 'Pawsitivebox', 'pawsitivebox', 'Ecommerce con Wordpress', 'http://pawsitivebox.com/', NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-03-09 16:38:02', '2021-03-09 20:32:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
