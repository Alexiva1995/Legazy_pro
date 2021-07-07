-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-06-2021 a las 14:41:28
-- Versión del servidor: 5.7.34
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
-- Base de datos: `valdusof_hdlr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_comisions`
--

CREATE TABLE `cierre_comisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `s_inicial` double NOT NULL COMMENT 'saldo inicial',
  `s_ingreso` double NOT NULL COMMENT 'saldo ingreso',
  `s_final` double NOT NULL COMMENT 'saldo final',
  `cierre` date NOT NULL COMMENT 'fecha del cierre',
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 - desactivado, 1 - activado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `img`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Prueba 1', 'groups/1jskMwj3IssqPXV0ForNdqnCOk8h5f2SUDzx2xR8.png', NULL, '1', '2021-05-22 23:02:33', '2021-05-22 23:41:29'),
(2, 'Prueba 2', 'groups/hrj4PR8JXz9ogJPv3ZAiWp8HHsdf1B1gexhnprls.jpg', NULL, '1', '2021-05-22 23:05:06', '2021-05-22 23:41:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inversions`
--

CREATE TABLE `inversions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `orden_id` bigint(20) UNSIGNED NOT NULL,
  `invertido` double NOT NULL,
  `ganacia` double NOT NULL,
  `retiro` double NOT NULL,
  `capital` double NOT NULL,
  `pogreso` double NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - activo , 2 - culminada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidactions`
--

CREATE TABLE `liquidactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `monto_bruto` double NOT NULL,
  `feed` double NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_used` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_liquidations`
--

CREATE TABLE `log_liquidations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idliquidation` bigint(20) UNSIGNED NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2020_10_05_165857_create_groups_table', 2),
(11, '2020_10_06_043331_create_packages_table', 2),
(12, '2020_10_19_160343_create_liquidactions_table', 2),
(16, '2020_11_05_181015_create_orden_purchases_table', 3),
(17, '2020_11_13_210917_create_wallets_table', 3),
(18, '2021_03_19_211758_create_log_liquidations_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_purchases`
--

CREATE TABLE `orden_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `idtransacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ID de la transacion',
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - En Espera, 1 - Completada, 2 - Rechazada, 3 - Cancelada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden_purchases`
--

INSERT INTO `orden_purchases` (`id`, `iduser`, `group_id`, `package_id`, `cantidad`, `total`, `idtransacion`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 1, 206.00, NULL, '0', NULL, NULL),
(4, 1, 1, 1, 1, 206.00, NULL, '0', NULL, NULL),
(5, 1, 1, 1, 1, 206.00, NULL, '0', NULL, NULL),
(6, 1, 1, 1, 1, 206.00, NULL, '0', NULL, NULL),
(7, 1, 1, 1, 1, 206.00, NULL, '0', NULL, NULL),
(8, 1, 1, 1, 1, 206.00, NULL, '0', NULL, NULL),
(9, 1, 1, 1, 1, 206.00, '5789462488', '1', NULL, '2021-05-28 02:26:56'),
(10, 1, 1, 2, 1, 206.00, NULL, '1', NULL, NULL),
(14, 8, 1, 1, 1, 206.00, '4399440545', '1', '2021-06-14 20:17:49', '2021-06-14 20:17:51'),
(15, 8, 1, 1, 1, 206.00, '5820396196', '1', '2021-06-14 20:17:53', '2021-06-14 20:17:53'),
(16, 8, 1, 2, 1, 206.00, '5779243390', '1', '2021-06-14 20:18:13', '2021-06-14 20:18:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `minimum_deposit` double NOT NULL DEFAULT '0' COMMENT 'deposito minimo',
  `expired` date DEFAULT NULL COMMENT 'Fecha de vencimiento del paquete',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 - desactivado, 1 - activado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `packages`
--

INSERT INTO `packages` (`id`, `name`, `group_id`, `price`, `minimum_deposit`, `expired`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paquete 1', 1, 200, 20, '2022-12-07', NULL, '1', '2021-05-23 00:12:06', '2021-05-23 00:18:38'),
(2, 'Paquete 1', 1, 200, 20, '2022-12-12', NULL, '1', '2021-05-23 00:12:39', '2021-05-23 00:12:39'),
(3, 'Paquete 3', 2, 200, 50, '2021-07-22', NULL, '1', '2021-05-23 19:50:18', '2021-05-23 19:50:18'),
(4, 'prueba 4', 2, 300, 100, '2021-07-23', NULL, '0', '2021-05-23 19:53:17', '2021-05-23 19:53:17');

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
('prueba1@gmail.com', '$2y$10$ASuU7sTBZgzB1HDCG14PGuRfXkCTPJYmwvZkyKnrK6aaOaRaJ1P9S', '2021-06-09 21:25:28'),
('cgonzalez.byob@gmail.com', '$2y$10$WlSuJJmyq7zSTvnOovjaYuRSVDCwGf0.zlUs6LYuw4c9HhdIu2kkK', '2021-06-09 22:32:42'),
('alexisjoseva95@gmail.com', '$2y$10$0ZZxxc3FbH8Gk4SNmR2li.KYdSn7Wpc0OFb3rN4H8I9jLAXJQLc1S', '2021-06-14 20:34:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` double NOT NULL DEFAULT '0',
  `referred_id` bigint(20) NOT NULL DEFAULT '1' COMMENT 'ID del usuario patrocinador',
  `binary_id` bigint(20) NOT NULL DEFAULT '1' COMMENT 'ID del usuario binario',
  `binary_side` enum('I','D') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Permite saber si esta en la derecha o izquierda en el binario',
  `binary_side_register` enum('I','D') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'I' COMMENT 'Permite saber porque lado va a registrar a un nuevo usuario',
  `admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'permite saber si un usuario es admin o no',
  `status` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - inactivo, 1 - activo, 2 - suspendido, 3 - bloqueado, 4 - caducado, 5 - eliminado',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dni` longtext COLLATE utf8mb4_unicode_ci,
  `wallet_address` longtext COLLATE utf8mb4_unicode_ci,
  `photoDB` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `fullname`, `email`, `email_verified_at`, `whatsapp`, `password`, `address`, `wallet`, `referred_id`, `binary_id`, `binary_side`, `binary_side_register`, `admin`, `status`, `remember_token`, `created_at`, `updated_at`, `dni`, `wallet_address`, `photoDB`) VALUES
(1, 'Admin', 'HDLR', 'Admin HDLR', 'admin@hdlr.com', NULL, '23423423423432', '$2y$10$fSMKs8GzLPzcKMMKRDOW9uNRPZYbEdGEkl.a0KepsnZAHzkSu9nfC', NULL, 0, 0, 0, NULL, 'D', '1', '1', NULL, '2021-05-22 18:58:01', '2021-05-22 18:58:01', NULL, NULL, NULL),
(2, 'caslo', '1', 'caslo 1', 'caslo@prueba.com', NULL, '-', '$2y$10$nUt1hswYJzokIRuRf4p.ee8N4Ss1.QPzVAFm.LAH9gTtcRf63EVOC', NULL, 0, 1, 1, 'I', 'I', '0', '4', NULL, '2021-05-22 21:00:51', '2021-06-11 18:26:14', NULL, NULL, NULL),
(3, 'caslo', '2', 'caslo 2', 'caslo2@prueba.com', NULL, '-', '$2y$10$nPRS1lMtP.dtk2.L3/LsWudWJhhcHah2P5Aq9ELpuB7P.adbt/BQC', NULL, 0, 2, 2, 'I', 'I', '0', '4', NULL, '2021-05-22 21:02:48', '2021-06-11 18:26:14', NULL, NULL, NULL),
(4, 'caslo', '3', 'caslo 3', 'caslo3@prueba.com', NULL, '-', '$2y$10$wzU6RXka4D6XxvekHrE4W.pxozHNinf78GWL3o/28c34GvGMbu3uO', NULL, 0, 2, 2, 'D', 'I', '0', '4', NULL, '2021-05-22 21:04:11', '2021-06-11 18:26:14', NULL, NULL, NULL),
(5, 'caslo', '4', 'caslo 4', 'caslo4@prueba.com', NULL, '-', '$2y$10$T8roMi/oV4Vob8Ds3FTUDeSNI4YVrboDI/2o7qnFcB9UY57fBpFqG', NULL, 0, 2, 4, 'D', 'I', '0', '4', NULL, '2021-05-22 21:06:02', '2021-06-11 18:26:14', NULL, NULL, NULL),
(6, 'caslo', '5', 'caslo 5', 'caslo5@prueba.com', NULL, '-', '$2y$10$Tq6r3jVFQhvbMRhiJkSIKON6fpJW2TY9SQ1pVNWNDilDoHRnEJAEO', NULL, 0, 2, 3, 'I', 'I', '0', '4', NULL, '2021-05-22 21:07:38', '2021-06-11 18:26:14', NULL, NULL, NULL),
(7, 'william', 'ache', 'william ache', 'william28ache@gmail.com', NULL, '-', '$2y$10$4StDqIOEvh8zukgmJHx01OSBjcOsoTaREz1DpJtV5nafJRrNh9JS2', NULL, 0, 1, 6, 'I', 'I', '0', '1', NULL, '2021-06-02 23:05:36', '2021-06-11 18:26:14', NULL, NULL, NULL),
(8, 'prueba1', '', 'prueba1', 'alexisjoseva95@gmail.com', NULL, '-', '$2y$10$uIS53SkE49fuUoyLQoDX3uMTDzlXK/lAJNu4Ii3zR7BTlWYZWMFOK', NULL, 0, 1, 7, 'I', 'D', '0', '0', NULL, '2021-06-03 20:27:40', '2021-06-15 20:41:44', '8_Isotipo Favicon.png', '1283938292', NULL),
(9, 'dos', '', 'dos', 'dos@gmail.com', NULL, '-', '$2y$10$knfUajWGScwuiMtZfbfSNeAA3yEem3kZJBN3Leodosvhl5xFpAXri', NULL, 0, 8, 8, 'D', 'I', '0', '4', NULL, '2021-06-03 20:29:51', '2021-06-11 18:26:14', NULL, NULL, NULL),
(10, 'tres', '', 'tres', 'tres@gmail.com', NULL, '-', '$2y$10$WNsU7AO.GtciTKafR0BH1e8XI19DAPVvZ.LncVO.ebODQd5IXx9Ve', NULL, 0, 8, 9, 'D', 'I', '0', '4', NULL, '2021-06-03 20:30:28', '2021-06-11 18:26:14', NULL, NULL, NULL),
(11, 'Erika', 'González', 'Erika González', 'lindanatera2013@gmail.com', NULL, '-----', '$2y$10$cFRDHNCikqQhutsydXI4bOir6SUGFPx/IU3KJSP0ea.knMRd/MBVa', NULL, 0, 1, 8, 'I', 'I', '0', '4', NULL, '2021-06-09 03:21:14', '2021-06-11 18:26:14', NULL, NULL, NULL),
(12, 'prueba1', '', 'prueba1', 'prueba1@gmail.com', NULL, '-----', '$2y$10$2eIj33J5wx8GroihBNnpSuLgjNoUHBTigNuTnofp39wmEpNNzbKAa', NULL, 0, 1, 1, 'D', 'I', '0', '4', NULL, '2021-06-09 21:21:48', '2021-06-11 18:26:14', NULL, NULL, NULL),
(13, 'caslo', 'g', 'caslo g', 'cgonzalez.byob@gmail.com', NULL, '-----', '$2y$10$oJ6DaMVMsRo3/Ox5RNFYAeiAdvs2y.2pK8v8kiIuvTfDilvIuEIfq', NULL, 0, 1, 12, 'D', 'I', '0', '4', NULL, '2021-06-09 22:10:34', '2021-06-11 18:26:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `referred_id` bigint(20) UNSIGNED DEFAULT NULL,
  `orden_purchase_id` bigint(20) UNSIGNED DEFAULT NULL,
  `liquidation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `debito` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'entrada de cash',
  `credito` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'salida de cash',
  `balance` decimal(8,2) DEFAULT NULL COMMENT 'balance del cash',
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - En espera, 1 - Pagado (liquidado), 2 - Cancelado',
  `tipo_transaction` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - comision, 1 - retiro',
  `liquidado` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - sin liquidar, 1 - liquidado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wallets`
--

INSERT INTO `wallets` (`id`, `iduser`, `referred_id`, `orden_purchase_id`, `liquidation_id`, `debito`, `credito`, `balance`, `descripcion`, `status`, `tipo_transaction`, `liquidado`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 8, NULL, 100.00, 0.00, NULL, '', 0, 1, 0, '2021-06-11 00:07:44', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cierre_comisions`
--
ALTER TABLE `cierre_comisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cierre_comisions_group_id_foreign` (`group_id`),
  ADD KEY `cierre_comisions_package_id_foreign` (`package_id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indices de la tabla `inversions`
--
ALTER TABLE `inversions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inversions_iduser_foreign` (`iduser`),
  ADD KEY `inversions_package_id_foreign` (`package_id`),
  ADD KEY `inversions_orden_id_foreign` (`orden_id`);

--
-- Indices de la tabla `liquidactions`
--
ALTER TABLE `liquidactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liquidactions_iduser_foreign` (`iduser`);

--
-- Indices de la tabla `log_liquidations`
--
ALTER TABLE `log_liquidations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_liquidations_idliquidation_foreign` (`idliquidation`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_purchases`
--
ALTER TABLE `orden_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_purchases_iduser_foreign` (`iduser`),
  ADD KEY `orden_purchases_group_id_foreign` (`group_id`),
  ADD KEY `orden_purchases_package_id_foreign` (`package_id`);

--
-- Indices de la tabla `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_group_id_foreign` (`group_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_iduser_foreign` (`iduser`),
  ADD KEY `wallets_referred_id_foreign` (`referred_id`),
  ADD KEY `wallets_orden_purchase_id_foreign` (`orden_purchase_id`),
  ADD KEY `wallets_liquidation_id_foreign` (`liquidation_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cierre_comisions`
--
ALTER TABLE `cierre_comisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inversions`
--
ALTER TABLE `inversions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidactions`
--
ALTER TABLE `liquidactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_liquidations`
--
ALTER TABLE `log_liquidations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `orden_purchases`
--
ALTER TABLE `orden_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cierre_comisions`
--
ALTER TABLE `cierre_comisions`
  ADD CONSTRAINT `cierre_comisions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `cierre_comisions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Filtros para la tabla `inversions`
--
ALTER TABLE `inversions`
  ADD CONSTRAINT `inversions_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `inversions_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `orden_purchases` (`id`),
  ADD CONSTRAINT `inversions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Filtros para la tabla `liquidactions`
--
ALTER TABLE `liquidactions`
  ADD CONSTRAINT `liquidactions_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `log_liquidations`
--
ALTER TABLE `log_liquidations`
  ADD CONSTRAINT `log_liquidations_idliquidation_foreign` FOREIGN KEY (`idliquidation`) REFERENCES `liquidactions` (`id`);

--
-- Filtros para la tabla `orden_purchases`
--
ALTER TABLE `orden_purchases`
  ADD CONSTRAINT `orden_purchases_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `orden_purchases_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orden_purchases_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Filtros para la tabla `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Filtros para la tabla `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wallets_liquidation_id_foreign` FOREIGN KEY (`liquidation_id`) REFERENCES `liquidactions` (`id`),
  ADD CONSTRAINT `wallets_orden_purchase_id_foreign` FOREIGN KEY (`orden_purchase_id`) REFERENCES `orden_purchases` (`id`),
  ADD CONSTRAINT `wallets_referred_id_foreign` FOREIGN KEY (`referred_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
