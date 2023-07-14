-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-07-2023 a las 22:25:02
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `courier`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int UNSIGNED NOT NULL,
  `idEmpresa` int NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ruc` int NOT NULL,
  `telefono` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idEmpresa`, `nombre`, `direccion`, `email`, `password`, `ruc`, `telefono`) VALUES
(1, 1, 'Jahir', 'huanuco', 'jahir@', '123456789', 2355, 981328727),
(2, 2, 'Eloy', 'Oxapampa', 'eloy@', '1234', 222, 4343434),
(3, 3, 'Gustavo', 'LM', 'dsd@', '2323423', 4343, 43434);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int NOT NULL,
  `idEmpresa` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `tipo_transporte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `idEmpresa`, `nombre`, `dni`, `telefono`, `tipo_transporte`) VALUES
(1, 1, 'Gustavo', '43434', '43434', 'Moto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombre`, `direccion`) VALUES
(1, 'sistemas', 'huanuco'),
(2, 'ecomerce', 'oxapampa'),
(3, 'tia venomancer', 'huanuco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int NOT NULL,
  `idCliente` int NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `idEmpleado` int DEFAULT NULL,
  `tipopaquete` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `fecha_entrega`, `estado`, `fecha_creacion`, `tipo`, `direccion`, `idEmpleado`, `tipopaquete`) VALUES
(1, 1, NULL, 'Enviado', '2023-06-12', 'A moto', 'jr. buenos aires 209', 1, 'Sobre'),
(2, 2, NULL, 'Pedido creado', '2023-06-28', 'A pie', 'ddddd', 1, ''),
(19, 1, NULL, NULL, '2023-07-04', 'a moto', 'Paquete S', NULL, ''),
(20, 1, NULL, NULL, '2023-07-04', 'a moto', 'Paquete S', NULL, ''),
(21, 3, NULL, NULL, '2023-07-13', 'a moto', 'Paquete M', NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `Fk_cliente_empresa_idx` (`idEmpresa`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_empleado_empresa_idx` (`idEmpresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedido_cliente_idx` (`idCliente`),
  ADD KEY `fk_pedido_empleado_idx` (`idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `Fk_cliente_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idEmpresa`),
  ADD CONSTRAINT `fk_pedido_empleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
