-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2024 a las 05:58:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Desayunos', '2024-07-08 02:03:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(9, 'Juan', 16, 'juan@gmail.com', '(712) 164-8597', 'Av Morelos Toluca SN', '2021-05-27', 0, '0000-00-00 00:00:00', '2021-05-27 12:45:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL,
  `id_nombre` text NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_correo` text NOT NULL,
  `id_telefono` text NOT NULL,
  `id_direccion` text NOT NULL,
  `id_fechaRegistro` date NOT NULL,
  `id_compras` int(11) NOT NULL,
  `id_ultima_compra` datetime DEFAULT NULL,
  `tipoDeEvento` text NOT NULL,
  `numeroDeBanquetes` int(11) NOT NULL,
  `selBanquete` text NOT NULL,
  `comentario` text NOT NULL,
  `fechaDelEvento` date NOT NULL,
  `id_fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `id_nombre`, `id_documento`, `id_correo`, `id_telefono`, `id_direccion`, `id_fechaRegistro`, `id_compras`, `id_ultima_compra`, `tipoDeEvento`, `numeroDeBanquetes`, `selBanquete`, `comentario`, `fechaDelEvento`, `id_fecha`) VALUES
(23, 'Jose Mendiola', 326, 'jose@gmail.com', '7121548796', 'Ave Morelos Numero 8 Calle Venustiano Toluca', '2021-05-27', 0, '0000-00-00 00:00:00', 'XV', 4, 'Buffet', 'Urgente para el dia sabado 29', '2021-05-29', '2021-05-27 19:36:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, 'Bandeja Paisa', 'Bandeja con arroz, chorizo, carne molida, huevo, plátano maduro, frijoles y arepa.', 'bandeja_paisa.gif', 50, 20000, 25000, 0, '2024-07-08 02:19:01'),
(2, 1, 'Huevos al gusto', 'Arepa con queso, huevos al gusto, pan y chocolate', 'huevos.jpg', 50, 10000, 15000, 0, '2024-07-08 02:19:05'),
(90, 1, 'Calentado', 'Calentado de frijoles con arroz, arepa con queso y chocolate.', 'calentado.jpeg', 50, 10000, 15000, 0, '2024-07-08 02:21:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id` int(11) NOT NULL,
  `nombreSuscriptor` text NOT NULL,
  `correoSuscriptor` text NOT NULL,
  `fechaSuscripcion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id`, `nombreSuscriptor`, `correoSuscriptor`, `fechaSuscripcion`) VALUES
(25, 'Jose Mendiola', 'jose@gmail.com', '2021-05-27 19:38:37'),
(26, 'fer', 'asdfasfd@asdfas.comn', '2024-07-08 10:44:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/813.jpg', 1, '2021-06-29 11:15:00', '2021-06-29 11:15:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
