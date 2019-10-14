-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-10-2019 a las 17:41:43
-- Versión del servidor: 5.7.28
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aventura_sustancia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markets`
--

CREATE TABLE `markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mp` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subAdministrativeArea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `markets`
--

INSERT INTO `markets` (`id`, `name`, `state`, `mp`, `descripcion`, `ubicacion`, `latitude`, `longitude`, `locality`, `subAdministrativeArea`, `created_at`, `updated_at`) VALUES
(1, 'Los Filtros', '1', '0', 'Sin Descripción', 'ver mapa', '-34.63820747331568', '-68.37176802231141', 'San Rafael', 'San Rafael', '2019-07-16 09:19:34', '2019-08-10 08:05:35'),
(2, 'Mercadito More', '1', '1', 'Mercadito Azul', 'Deoclesio García 898', '-34.62953756713452', '-68.32345702980717', 'San Rafael', 'San Rafael', '2019-07-16 09:25:34', '2019-08-10 08:05:34'),
(3, 'Pancheria Darth Vader', '1', '0', 'Pancheria', '25 de Mayo, 17', '-34.614759451366226', '-68.33504124965543', 'San Rafael', 'San Rafael', '2019-07-16 09:27:51', '2019-08-10 08:05:34'),
(4, 'Kiosco / Vineria', '1', '0', 'Sin Descripción', 'Montecaseros 858', '-34.61819040256362', '-68.34323453534995', 'San Rafael', 'San Rafael', '2019-07-16 09:30:51', '2019-08-10 08:05:33'),
(6, 'Sin Nombre', '1', '0', 'Sin Descripción', 'Av. Domingo Faustino Sarmiento, Esq. Calle S/nombre', '-34.60957898705123', '-68.38209797954153', 'San Rafael', 'San Rafael', '2019-07-16 10:56:57', '2019-07-16 11:00:13'),
(8, 'Sin Nombre', '1', '0', 'Ojo acá... Atenti!', 'Juan Manuel Ortiz de Rosas 615', '-34.62455348725698', '-68.32441647532426', 'San Rafael', 'San Rafael', '2019-07-16 12:41:06', '2019-07-16 12:41:12'),
(9, 'La vieja de la 3 de Febrero', '1', '0', 'Sin Descripción', '3 de Febrero, 736', '-34.62179359842847', '-68.34116315833256', 'San Rafael', 'San Rafael', '2019-07-18 02:55:54', '2019-08-10 08:06:34'),
(10, 'Sin Nombre', '1', '0', 'Sin Descripción', 'Juan Manuel Ortiz de Rosas 1203', '-34.62745033320853', '-68.31542363526705', 'San Rafael', 'San Rafael', '2019-07-19 05:05:45', '2019-08-10 08:06:34'),
(11, 'Sin Nombre', '1', '0', 'Sin Descripción', 'Pichincha 439', '-34.62695268628678', '-68.31523283414077', 'San Rafael', 'San Rafael', '2019-07-19 05:07:29', '2019-08-10 08:06:34'),
(104, 'El Paso', '1', '0', 'Sin Descripción', 'Av. Rodolfo Iselin 249', '-34.609453127268914', '-68.3411081260744', 'San Rafael', 'San Rafael', '2019-07-25 22:52:08', '2019-08-10 08:06:33'),
(127, 'Minimarkert', '1', '0', 'Sin Descripción', 'Piérola', '-34.97597522729248', '-67.69239427951726', 'General Alvear', 'General Alvear', '2019-08-11 07:38:01', '2019-08-11 07:40:00'),
(128, 'Sin Nombre', '1', '0', 'Abierto las 24 Horas', 'Av. Alvear Oeste 469', '-34.97795651429547', '-67.69563793899584', 'General Alvear', 'General Alvear', '2019-08-11 07:39:52', '2019-08-11 07:40:00'),
(129, 'El que esta al Lado de Grido', '1', '0', 'Sin Descripción', 'Av. Hipólito Yrigoyen 2145', '-34.60746831650885', '-68.35618074997547', 'San Rafael', 'San Rafael', '2019-08-11 07:47:29', '2019-08-11 07:47:39'),
(130, 'La Gordita', '1', '0', 'Sin Descripción', 'Carlos W Lencinas 4022', '-34.637970976201935', '-68.3722483817503', 'San Rafael', 'San Rafael', '2019-08-11 08:08:59', '2019-08-11 08:09:05'),
(132, 'Lo del Fede', '1', '0', 'El comercio tiene cuadraditos de colores', 'Cmte. Torres 150', '-34.62043011570652', '-68.3244373494324', 'San Rafael', 'San Rafael', '2019-09-19 06:30:44', '2019-09-19 06:43:33'),
(133, 'doña mirta', '1', '0', 'ojo', 'n/d', '-40.150035', '-71.313818', 'San Martin de los Andes', 'Lácar', '2019-09-23 06:27:11', '2019-10-14 23:12:11'),
(134, 'La vieja LOBO', '1', '0', 'mal humorada', 'carera pero seguro', '-35.474212', '-69.573687', 'Malargüe', 'Malargüe', '2019-10-06 19:00:53', '2019-10-06 19:04:29'),
(135, 'kiosco', '1', '0', 'Sin Descripción', 'buenas promos', '-35.474767', '-69.588003', 'Malargüe', 'Malargüe', '2019-10-06 19:01:39', '2019-10-06 19:04:29'),
(136, 'casa / kiosco', '1', '0', 'Sin Descripción', 'toca la puerta', '-35.476584', '-69.583734', 'Malargüe', 'Malargüe', '2019-10-06 19:04:10', '2019-10-06 19:04:28'),
(137, 'kisco 24', '1', '0', 'Sin Descripción', 'toca la puerta/Ventana', '-35.471357', '-69.565587', 'Malargüe', 'Malargüe', '2019-10-06 19:12:32', '2019-10-06 19:17:20'),
(138, 'el gendarme', '1', '0', 'el kiosco 24', 'fortin Malargüe al 1100', '-35.478733', '-69.572155', 'Malargüe', 'Malargüe', '2019-10-07 00:28:09', '2019-10-13 07:34:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `markets_latitude_unique` (`latitude`),
  ADD UNIQUE KEY `markets_longitude_unique` (`longitude`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
