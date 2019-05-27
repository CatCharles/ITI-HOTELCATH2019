-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2019 a las 06:46:54
-- Versión del servidor: 5.7.26-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ap_paterno` varchar(50) NOT NULL,
  `ap_materno` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `contrasena` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre`, `ap_paterno`, `ap_materno`, `email`, `contrasena`) VALUES
(1, 'Catherine', 'Torres', 'Charles', '1630060@upv.edu.mx', 'torres825');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ap_paterno` varchar(40) NOT NULL,
  `ap_materno` varchar(40) NOT NULL,
  `id_tipo_cliente` int(11) NOT NULL,
  `telefono` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `ap_paterno`, `ap_materno`, `id_tipo_cliente`, `telefono`) VALUES
(1, 'CATHERINE ALESSANDRA', 'TORRES', 'CHARLES', 1, '12865844'),
(2, 'GENARO JUAN', 'SANCHEZ', 'GALLEGOS', 2, '834121517'),
(3, 'MIRNA ANTONIA', 'CHARLES', 'PEREZ', 1, '8341562824');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL,
  `id_tipos_hab` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `ocupada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `id_tipos_hab`, `imagen`, `ocupada`) VALUES
(5, 2, 'View/Modules/images/doble.jpg', 0),
(6, 3, 'View/Modules/images/matrimonial.jpg', 1),
(7, 1, 'View/Modules/images/simple.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reservacion` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `finalizadas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `id_habitacion`, `id_cliente`, `fecha_entrada`, `fecha_salida`, `finalizadas`) VALUES
(1, 7, 1, '2019-04-09', '2019-05-29', 1),
(5, 5, 1, '2019-05-08', '2019-05-30', 1),
(6, 6, 2, '2019-05-15', '2019-05-22', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_cliente`
--

CREATE TABLE `tipos_cliente` (
  `id_tipo_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_cliente`
--

INSERT INTO `tipos_cliente` (`id_tipo_cliente`, `nombre`) VALUES
(1, 'Habituales'),
(2, 'Esporadicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_hab`
--

CREATE TABLE `tipos_hab` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `tamano` varchar(5) NOT NULL,
  `cantcamas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_hab`
--

INSERT INTO `tipos_hab` (`id`, `id_tipo`, `nombre`, `precio`, `tamano`, `cantcamas`) VALUES
(1, 0, 'Simple', '500', '5x4m', 1),
(2, 0, 'Doble', '1000', '7x5m', 2),
(3, 0, 'Matrimonial', '1500', '10x5m', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_t_cliente` (`id_tipo_cliente`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `id_t_hab` (`id_tipos_hab`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `id_hab` (`id_habitacion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tipos_cliente`
--
ALTER TABLE `tipos_cliente`
  ADD PRIMARY KEY (`id_tipo_cliente`);

--
-- Indices de la tabla `tipos_hab`
--
ALTER TABLE `tipos_hab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id_reservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipos_cliente`
--
ALTER TABLE `tipos_cliente`
  MODIFY `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_hab`
--
ALTER TABLE `tipos_hab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_tc` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `tipos_cliente` (`id_tipo_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `fk_habb_tiph` FOREIGN KEY (`id_tipos_hab`) REFERENCES `tipos_hab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `fk_res_client` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_res_hab` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id_habitacion`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
