-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2021 a las 06:06:43
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vetdog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE `business` (
  `id_buss` int(11) NOT NULL,
  `noemp` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ruc` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `direcc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `telef` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `descp` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id_buss`, `noemp`, `ruc`, `direcc`, `correo`, `telef`, `descp`, `foto`, `fecre`) VALUES
(1, 'VET-DOG', '01234567678987', 'Lima,Perú', 'unprogramadormas@gmail.com', '998786765', 'Rubro de Veterinaria', 'lll.png', '2021-12-26 04:20:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `nomcate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_cate`, `nomcate`, `estado`, `fere`) VALUES
(2, 'Collares', '1', '2021-08-05 14:30:32'),
(3, 'Correas', '1', '2021-08-05 14:30:44'),
(4, 'Mochilas', '1', '2021-08-05 14:30:59'),
(5, 'Accesorios', '1', '2021-08-05 14:31:05'),
(6, 'Snack', '1', '2021-08-05 14:31:54'),
(7, 'Antiparasitos', '1', '2021-08-10 04:28:52'),
(8, 'Transporte y viaje', '1', '2021-08-06 14:35:47'),
(9, 'Complementos y Suplementos', '1', '2021-08-05 14:32:30'),
(10, 'Higuiene y limpieza', '1', '2021-08-05 14:33:13'),
(11, 'Jaulassss', '1', '2021-12-23 06:34:32'),
(12, 'Juguetes', '1', '2021-08-05 14:33:45'),
(13, 'Decoración', '1', '2021-08-05 14:34:13'),
(14, 'Comidas', '1', '2021-08-05 14:34:35'),
(15, 'Estanques', '1', '2021-08-05 14:34:41'),
(16, 'Comedores y bebedores', '1', '2021-08-05 14:35:06'),
(17, 'Incubadoras', '1', '2021-08-05 14:35:19'),
(18, 'Calefacción', '1', '2021-08-05 14:35:29'),
(19, 'Humedad', '1', '2021-08-05 14:35:41'),
(20, 'Vallas y cercados', '1', '2021-08-10 20:31:23'),
(24, 'fddfdf', '1', '2021-12-04 02:35:23'),
(25, 'dsewewe', '1', '2021-12-04 02:36:15'),
(26, 'sadsczxcx', '1', '2021-12-04 02:37:33'),
(27, 'dsdxcxc', '1', '2021-12-04 02:43:34'),
(28, 'wqweqwe', '1', '2021-12-04 02:43:59'),
(29, 'dfdssss', '1', '2021-12-04 02:49:35'),
(30, 'fdsfsdf', '1', '2021-12-04 02:49:46'),
(31, 'juas juas', '1', '2021-12-04 10:35:12'),
(32, 'dfsfd', '1', '2021-12-04 10:35:21'),
(33, 'ejemplo de juas juas', '1', '2021-12-04 13:45:33'),
(36, 'saaaa', '1', '2021-12-04 13:51:42'),
(37, 'asdasdasd', '1', '2021-12-04 13:53:38'),
(38, 'xzxczcxc', '1', '2021-12-04 13:54:31'),
(40, 'adasdasdasdasd', '1', '2021-12-04 20:05:41'),
(41, 'ejemplo de catee', '1', '2021-12-26 04:54:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_prove` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tipoc` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tipopa` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `estado`, `id_prove`, `total`, `tipoc`, `tipopa`) VALUES
(1, '2021-12-22', '0', 6, '31.00', 'Ticket', 'Contado'),
(2, '2021-12-22', '1', 3, '75.00', 'Factura', 'Contado'),
(3, '2021-12-10', '1', 2, '195.00', 'Factura', 'Credito'),
(4, '2021-12-06', '1', 1, '31.00', 'Boleta', 'Contado'),
(5, '2021-12-23', '1', 12, '60.00', 'Ticket', 'Credito'),
(6, '2021-12-23', '1', 13, '15.00', 'Boleta', 'Contado'),
(7, '2021-12-24', '1', 13, '382.00', 'Boleta', 'Contado'),
(8, '2021-12-25', '1', 13, '351.00', 'Boleta', 'Contado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historycli`
--

CREATE TABLE `historycli` (
  `id_history` int(11) NOT NULL,
  `codigo` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `id_vet` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `id_due` int(11) NOT NULL,
  `moti` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enfer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anali` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `owner`
--

CREATE TABLE `owner` (
  `id_due` int(11) NOT NULL,
  `dni_due` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `nom_due` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `ape_due` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `fecnaci` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `movil` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `fijo` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `owner`
--

INSERT INTO `owner` (`id_due`, `dni_due`, `nom_due`, `ape_due`, `fecnaci`, `movil`, `fijo`, `correo`, `direc`, `estado`, `usuario`, `contra`, `cargo`, `foto`, `fere`) VALUES
(1, '75563453', 'luis', 'dfsfsdf', 'Thursday 09 December 2021', '975675675', '533333', 'fdfddf@gmail.com', 'el indio piura', '1', 'ddd', 'bcbe3365e6ac95ea2c0343a2395834dd', 2, 'arnol.jpg', '2021-12-04 16:29:30'),
(2, '78848384', 'Maria', 'Lozada', 'Thursday 09 December 2021', '995888585', '466272', 'marialoza@gmail.com', 'salazar bondi', '1', 'mariloza', 'b0baee9d279d34fa1dfd71aadb908c3f', 2, '', '2021-12-04 16:31:33'),
(3, '75584851', 'Melina', 'Urbina', 'Wednesday 08 December 2021', '995040504', '423323', 'meli@gmail.com', 'el indio bondi', '1', 'meliurbina21', 'b0baee9d279d34fa1dfd71aadb908c3f', 2, '', '2021-12-04 16:32:33'),
(4, '74636343', 'Rodrigo', 'Trelles', 'Tuesday 21 December 2021', '984737473', '443523', 'trrellesrodri@gmail.com', 'el indio salazars', '1', 'trrellesro', 'b0baee9d279d34fa1dfd71aadb908c3f', 2, '', '2021-12-04 16:34:13'),
(5, '', 'Luis Francisco', 'Robles Salas', '', '', '', '', '', '', '', '', 0, '', '2021-12-23 22:14:02'),
(6, '74849443', 'Osvaldo Luis', 'Urbina Lozada', '', '990044343', '453232', '', '', '1', 'osval22', 'b0baee9d279d34fa1dfd71aadb908c3f', 2, '', '2021-12-23 23:36:21'),
(7, '', 'Flavia ', 'Laos Lozada', '', '', '', '', '', '1', '', '', 0, '', '2021-12-23 23:58:59'),
(8, '75117484', 'JORDAN JONAYKER', 'ROQUE', '', '', '', '', '', '1', '', '', 0, '', '2021-12-24 18:19:57'),
(9, '75511744', 'WILSER', 'SANCHEZ', '', '', '', '', '', '1', '', '', 0, '', '2021-12-25 00:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `nomas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_tiM` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL,
  `sexo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `edad` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tamano` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `peso` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `id_due` int(11) NOT NULL,
  `obser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id_pet`, `nomas`, `id_tiM`, `id_raza`, `sexo`, `edad`, `tamano`, `peso`, `id_due`, `obser`, `estado`, `fere`) VALUES
(1, 'Violeta', 1, 2, 'Pequeña', '2 años', 'Pequeña', '8Kg', 3, 'esto es otra observacipn', '1', '2021-12-05 01:00:43'),
(2, 'Nerito', 1, 1, 'Macho', '2 años', 'Pequeña', '2Kg', 1, 'esto es una observacion', '1', '2021-12-05 00:47:16'),
(3, 'Peluza', 1, 2, 'Hembra', '4 años', 'Pequeña', '2kg', 3, 'esto es otraobserva', '1', '2021-12-05 00:48:05'),
(4, 'Wuafles', 2, 3, 'Macho', '3 años', 'Pequeña', '2 kg', 3, 'observacion 2\r\n', '1', '2021-12-05 00:48:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet_type`
--

CREATE TABLE `pet_type` (
  `id_tiM` int(11) NOT NULL,
  `noTiM` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pet_type`
--

INSERT INTO `pet_type` (`id_tiM`, `noTiM`, `estado`, `fere`) VALUES
(1, 'Perro', '1', '2021-08-10 02:29:17'),
(2, 'Gatos', '1', '2021-08-06 00:37:11'),
(3, 'Caballos', '1', '2021-08-06 00:37:15'),
(4, 'Cerdos', '1', '2021-12-01 16:52:00'),
(7, 'Conejos', '1', '2021-12-01 16:51:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comprados`
--

CREATE TABLE `productos_comprados` (
  `id_pcomp` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_comprados`
--

INSERT INTO `productos_comprados` (`id_pcomp`, `id_prod`, `canti`, `id_compra`) VALUES
(1, 1, 1, 1),
(2, 5, 3, 2),
(3, 8, 3, 2),
(4, 3, 3, 3),
(5, 1, 1, 4),
(6, 5, 3, 5),
(7, 8, 3, 6),
(8, 1, 4, 7),
(9, 2, 3, 7),
(10, 3, 3, 7),
(11, 1, 3, 8),
(12, 2, 3, 8),
(13, 3, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id_pvendi` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id_pvendi`, `id_prod`, `canti`, `id_venta`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 2),
(3, 8, 3, 2),
(4, 1, 3, 3),
(5, 5, 3, 3),
(6, 2, 3, 4),
(7, 8, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_prod` int(11) NOT NULL,
  `codigo` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `id_cate` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nompro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `peso` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_prove` int(11) NOT NULL,
  `descp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preciC` decimal(10,2) NOT NULL,
  `precV` decimal(10,2) NOT NULL,
  `stock` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_prod`, `codigo`, `id_cate`, `foto`, `nompro`, `peso`, `id_prove`, `descp`, `preciC`, `precV`, `stock`, `estado`, `fere`) VALUES
(1, '00000001', 2, 'collar1.jpeg', 'Julius K9 Collar de Adiestramiento Cordino', '90 GR', 2, 'El collar cordino Julius K9 es la elección perfecta para entrenamientos en lugar de collares. Hecho de cordón textil rígido de 3,5 mm, utilizado frecuentemente por entrenadores de perros para perros agresivos o perros en pánico. Recomendado para usar con ', '31.00', '21.00', '103', '1', '2021-12-26 04:59:43'),
(2, '00000002', 7, 'anti.jpg', 'Specialcan Insecticida Ambiental Perros Y Gatos 250 Ml', '250ml', 1, 'Specialcan Insecticida Ambiental Perros Y Gatos 250 Ml.', '21.00', '35.00', '37', '1', '2021-12-26 05:02:49'),
(3, '00000003', 6, 'snac.jpg', 'Apetitus Galletas Vainilla Biscuits', '500GR', 1, 'Las Galletas Vainilla Biscuits de Apetitus son snacks para perro para dar como premio o recompensa en cualquier momento del día como parte de una dieta equilibrada. Su calidad se obtiene gracias a los ingredientes y al Bakery Selection', '65.00', '35.00', '30', '1', '2021-12-26 04:59:44'),
(5, '00000007', 7, 'anti2.jpg', 'Bayer Advantage Pipeta Gato 0-4 kg.', '80', 3, 'Advantage® Spot-On es una solución de Imidacloprid lista para su aplicación tópica sobre la piel del gato. Mata las pulgas dentro de las 24 horas de aplicado. Previene las re-infestaciones por hasta 1 mes. De muy fácil aplicación es ideal para evitar el e', '20.00', '30.00', '93', '1', '2021-12-26 02:37:00'),
(8, '00000009', 14, 'omidaanimal.jpg', 'COMIDA PARA PERRO POLLO Y VEGETALES', '374 g', 1, 'Hecho con ingredientes de fibras naturales', '5.00', '10.00', '98', '1', '2021-12-26 05:02:50'),
(9, '12959031410057', 3, '', 'Ejemplo de otro producto', '33', 3, 'esto es una descripcion de un producto', '20.00', '5.00', '98', '1', '2021-12-25 05:30:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `id_vet` int(11) NOT NULL,
  `id_tiM` int(11) NOT NULL,
  `id_servi` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nommas` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `dueno` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`id`, `id_vet`, `id_tiM`, `id_servi`, `title`, `nommas`, `dueno`, `color`, `start`, `end`, `estado`, `precio`) VALUES
(1, 1, 2, 1, 'EJEMPLO DE CITA', 'pelusa', 'Sebastian Yatra', '#ff0000', '2021-12-20 13:00:00', '2021-12-20 14:00:00', '1', '120.00'),
(3, 8, 2, 2, 'Ejemplo de cita 222', 'Violeta', 'Luis Sebastian Rumina', '#66ff00', '2021-12-22 15:00:00', '2021-12-22 16:00:00', '1', '80.00'),
(4, 8, 2, 4, 'cita numero 3', 'Linos', 'Mauricio Carbajal', '#66ff00', '2021-12-21 09:00:00', '2021-12-21 10:00:00', '0', '80.00'),
(5, 1, 2, 1, 'cita de ejemploss', 'Pelusa', 'Jose Torres', '#ff0000', '2021-12-27 09:00:00', '2021-12-27 10:00:00', '0', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id_raza` int(11) NOT NULL,
  `nomraza` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_tiM` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id_raza`, `nomraza`, `id_tiM`, `estado`) VALUES
(1, 'Bulldog', 1, '1'),
(2, 'Pastor alemán', 1, '1'),
(3, 'Gato persa', 2, '1'),
(4, 'Gato siamés', 2, '1'),
(5, 'Pura sangre inglés', 3, '1'),
(6, 'Paint horse', 3, '1'),
(8, 'Large white', 3, '1'),
(12, 'ejemplo de raza', 7, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `id_servi` int(11) NOT NULL,
  `nomser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`id_servi`, `nomser`, `estado`, `fere`) VALUES
(1, 'Baño general', '1', '2021-08-06 17:25:24'),
(2, 'Consulta cachorros y gatitos, vacunas y desparasitación de inicio de vida.', '1', '2021-08-06 17:26:49'),
(3, 'Exámenes de laboratorio (Perfil bioquímico, hemograma, orina, citología, entre muchos otros)', '1', '2021-08-06 17:27:12'),
(4, 'Corte de pelos', '1', '2021-08-06 17:27:48'),
(5, 'Vacunas', '1', '2021-08-10 04:21:28'),
(6, 'Corte de uñas', '1', '2021-08-06 17:36:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `id_prove` int(11) NOT NULL,
  `nomprove` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruc` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `direcc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tele` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `corre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id_prove`, `nomprove`, `ruc`, `direcc`, `pais`, `tele`, `corre`, `estado`, `fere`) VALUES
(1, 'Hiper Plaza Vea', '11223232323232', 'Castilla, el indio MZ L3 32', 'Brasil', '977777777', 'hiperplazavea@gmail.com', '1', '2021-12-01 05:19:25'),
(2, 'Pet Shop Patitas Feliz', '12434343434334', 'Castilla Mz D4 LT 26', 'Ecuador', '888888888', 'petshop@gmail.com', '1', '2021-12-01 06:54:26'),
(3, 'Pet Shop Mi Jeffrey', '88888888888888', 'Castilla el Indio Mz c5', 'Argentina', '999999999', 'mijefreypetshop@gmail.com', '1', '2021-08-10 20:37:56'),
(6, 'Empresa de ejemplo', '10039399393933', 'ejemplo de direcion', 'Peru', '959595959', 'empresa@gmail.com', '1', '2021-11-30 21:51:17'),
(7, 'Otra empresa', '10887474747474', 'otra empresa de direccion', 'Mexico', '977777777', 'otraempresa@gmail.com', '1', '2021-12-01 06:17:46'),
(9, 'fdf', '10933333333333', 'sdfsdf', 'sfsf', '976545434', 'dfsfsdf@gmail.com', '1', '2021-12-01 06:25:28'),
(12, 'LECHE GLORIA SOCIEDAD ANONIMA - GLORIA S.A.', '20100190797', 'AV. REPUBLICA DE PANAMA NRO 2461 URB. SANTA CATALINA ', 'LIMA', '948484834', 'leee@gmail.com', '1', '2021-12-24 01:08:27'),
(13, 'HIPERMERCADOS TOTTUS S.A', '20508565934', 'AV. ANGAMOS ESTE NRO 1805 INT. P10 ', 'LIMA', '', '', '1', '2021-12-24 01:26:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `contra`, `cargo`, `estado`, `fecre`) VALUES
(1, 'Jordan Roke Seminario', 'jjroker', 'jjroker@ucv.edu.pe', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, '1', '2021-12-04 00:54:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `numfact` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_due` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tipoc` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tipopa` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `numtarj` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `typetarj` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nomtarj` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `expmon` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `expyear` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `cvc` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `recibir` decimal(10,2) NOT NULL,
  `cambio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `numfact`, `estado`, `id_due`, `total`, `tipoc`, `tipopa`, `numtarj`, `typetarj`, `nomtarj`, `expmon`, `expyear`, `cvc`, `recibir`, `cambio`) VALUES
(1, '2021-12-25 18:11:37', 1, '1', 8, '21.00', 'Boleta', 'efectivo', '', '', '', '', '', '', '100.00', '79.00'),
(2, '2021-12-25 19:55:06', 2, '1', 8, '93.00', 'Boleta', 'efectivo', '', '', '', '', '', '', '100.00', '7.00'),
(3, '2021-12-25 21:36:59', 3, '1', 6, '153.00', 'Boleta', 'efectivo', '', '', '', '', '', '', '200.00', '47.00'),
(4, '2021-12-26 00:02:49', 4, '1', 7, '135.00', 'Boleta', 'efectivo', '3455 656565 65656', 'AMEX', '', '9', '22', '2222', '200.00', '65.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarian`
--

CREATE TABLE `veterinarian` (
  `id_vet` int(11) NOT NULL,
  `dnivet` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `nomvet` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `apevet` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `direcc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fijo` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `movil` char(9) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `veterinarian`
--

INSERT INTO `veterinarian` (`id_vet`, `dnivet`, `nomvet`, `apevet`, `direcc`, `sexo`, `correo`, `foto`, `fijo`, `movil`, `usuario`, `contra`, `cargo`, `estado`, `fere`) VALUES
(1, '76666666', 'Elizabeth', 'Goméz Chunga', 'Ica', 'Femenino', 'elizaGo@gmail.com', 'seven.png', '454322', '998876767', 'eliza21', 'b0baee9d279d34fa1dfd71aadb908c3f', 3, '1', '2021-12-01 14:09:49'),
(8, '74849349', 'Jose Luis', 'Flores Yovera', 'talaarita', 'Masculino', 'jjoseluis@gmail.com', 'profeico.png', '435323', '939838383', 'jooseluis21', 'b0baee9d279d34fa1dfd71aadb908c3f', 3, '1', '2021-12-04 20:03:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id_buss`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `historycli`
--
ALTER TABLE `historycli`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_vet` (`id_vet`),
  ADD KEY `id_pet` (`id_pet`),
  ADD KEY `id_due` (`id_due`);

--
-- Indices de la tabla `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_due`);

--
-- Indices de la tabla `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_tiM` (`id_tiM`),
  ADD KEY `id_raza` (`id_raza`),
  ADD KEY `id_due` (`id_due`);

--
-- Indices de la tabla `pet_type`
--
ALTER TABLE `pet_type`
  ADD PRIMARY KEY (`id_tiM`);

--
-- Indices de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD PRIMARY KEY (`id_pcomp`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id_pvendi`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vet` (`id_vet`),
  ADD KEY `id_tiM` (`id_tiM`),
  ADD KEY `id_servi` (`id_servi`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id_raza`),
  ADD KEY `id_tiM` (`id_tiM`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_servi`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_prove`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_due` (`id_due`);

--
-- Indices de la tabla `veterinarian`
--
ALTER TABLE `veterinarian`
  ADD PRIMARY KEY (`id_vet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `id_buss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `historycli`
--
ALTER TABLE `historycli`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `owner`
--
ALTER TABLE `owner`
  MODIFY `id_due` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pet_type`
--
ALTER TABLE `pet_type`
  MODIFY `id_tiM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  MODIFY `id_pcomp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id_pvendi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id_raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `id_servi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_prove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `veterinarian`
--
ALTER TABLE `veterinarian`
  MODIFY `id_vet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_prove`) REFERENCES `supplier` (`id_prove`);

--
-- Filtros para la tabla `historycli`
--
ALTER TABLE `historycli`
  ADD CONSTRAINT `historycli_ibfk_1` FOREIGN KEY (`id_vet`) REFERENCES `veterinarian` (`id_vet`),
  ADD CONSTRAINT `historycli_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`),
  ADD CONSTRAINT `historycli_ibfk_3` FOREIGN KEY (`id_due`) REFERENCES `owner` (`id_due`);

--
-- Filtros para la tabla `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_tiM`) REFERENCES `pet_type` (`id_tiM`),
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`id_raza`) REFERENCES `raza` (`id_raza`),
  ADD CONSTRAINT `pet_ibfk_3` FOREIGN KEY (`id_due`) REFERENCES `owner` (`id_due`);

--
-- Filtros para la tabla `productos_comprados`
--
ALTER TABLE `productos_comprados`
  ADD CONSTRAINT `productos_comprados_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `products` (`id_prod`),
  ADD CONSTRAINT `productos_comprados_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`);

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `products` (`id_prod`),
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_cate`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_prove`) REFERENCES `supplier` (`id_prove`);

--
-- Filtros para la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`id_vet`) REFERENCES `veterinarian` (`id_vet`),
  ADD CONSTRAINT `quotes_ibfk_2` FOREIGN KEY (`id_tiM`) REFERENCES `pet_type` (`id_tiM`),
  ADD CONSTRAINT `quotes_ibfk_3` FOREIGN KEY (`id_servi`) REFERENCES `service` (`id_servi`);

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`id_tiM`) REFERENCES `pet_type` (`id_tiM`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_due`) REFERENCES `owner` (`id_due`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
