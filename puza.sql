-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-12-2023 a las 14:36:33
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
-- Base de datos: `puza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDcliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada cliente que se registre en la base de datos',
  `NombreCliente` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del cliente que es registrado en la base de datos',
  `ApellidoP` varchar(60) NOT NULL COMMENT 'Esta variable se encarga de almacenar el apellido paterno del cliente registrado',
  `ApellidoM` varchar(60) NOT NULL COMMENT 'Esta variable se encarga de almacenar el apellido materno del cliente registrado',
  `TelefonoCliente` bigint NOT NULL COMMENT 'Esta variable se encarga de almacenar el telefono de cada cliente que se registra en la base de datos',
  `CorreoCliente` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el correo electrónico de cada cliente que se registra en la base de datos',
  `CalleCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la calle de la dirección física del cliente',
  `ColoniaCliente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la colonia de la dirección fisica del cliente',
  `CodigopostalCliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el codigo postal de la dirección física del cliente',
  `IDestado` int NOT NULL COMMENT 'Esta variable funciona como llave foranea para relacionar con la tabla estados',
  `EstadoCliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el estado del cliente, para poder ocultar o mostrar los resultados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_clientes`
--

CREATE TABLE `compras_clientes` (
  `IDcompracliente` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el ID de la compra de cada cliente',
  `IDcliente` int NOT NULL COMMENT 'Esta variable funciona como llave foránea para representar el ID de cliente',
  `IDproductoterminado` int DEFAULT NULL COMMENT 'Esta variable funciona como llave foránea para representar el ID de producto terminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID_estado` int NOT NULL COMMENT 'Esta variable es el ID de la tabla estados',
  `Estado` text NOT NULL COMMENT 'Esta variable almacena los estados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID_estado`, `Estado`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila'),
(8, 'Colima'),
(9, 'Ciudad de México'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_primas`
--

CREATE TABLE `materias_primas` (
  `IDmateriaprima` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de las distintas materias primas que se registren en la base de datos',
  `NombreMateria` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la materia prima',
  `DescripcionMateria` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar la breve descripción de la materia prima',
  `IDproveedor` int NOT NULL COMMENT 'Esta variable sirve como llave foranea para relacionar cada materia prima con su proveedor',
  `PrecioMateria` float NOT NULL COMMENT 'Esta variable se encarga de almacenar el precio de cada materia prima',
  `ExistenciasMateria` int NOT NULL COMMENT 'Esta variable se encarga de almacenar las existencias de cada materia prima que se ingrese',
  `Fecha_entradaMateria` date NOT NULL COMMENT 'Esta variable se encarga de almacenar la fecha de entrada de cada materia prima',
  `EstadoMateria` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el estado del producto, para poder ocultarlo en caso de que se "elimine"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_terminados`
--

CREATE TABLE `productos_terminados` (
  `IDproductosterminados` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada producto terminado que se registra',
  `NombreProducto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de cada producto terminado que se registra en la base de datos',
  `DescripcionProducto` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar una pequeña descripción de cada producto terminado que se registra en la base de datos',
  `ExistenciasProducto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el numero de existencias de cada producto terminado que se registra en la base de datos',
  `Fecha_fabricacionProducto` date NOT NULL COMMENT 'Esta variable se encarga de almacenar la fecha de fabricación de cada producto terminado que se registra en la base de datos',
  `PrecioProducto` float NOT NULL COMMENT 'Esta variable se encarga de almacenar el precio por unidad de cada producto terminado que se registra en la base de datos',
  `EstadoProducto` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el valor del estado de visualización del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_materiaprima`
--

CREATE TABLE `producto_materiaprima` (
  `IDproducto_materiaprima` int NOT NULL COMMENT 'Esta variable almacena el ID de cada registro de materia prima usada por producto',
  `IDproductoterminado` int NOT NULL COMMENT 'Esta variable funciona como la llave foranea que representa el ID de cada producto terminado',
  `IDmateriaprima` int NOT NULL COMMENT 'Esta variable funciona como la llave foranea que representa el ID de cada materia prima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IDproveedor` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el id de cada proveedor registrado en la base de datos',
  `NombreProveedor` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del proveedor',
  `Nombre_representante` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del representante del proveedor',
  `TelefonoProveedor` bigint NOT NULL COMMENT 'Esta variable se encarga de almacenar el número de telefono del proveedor',
  `CorreoProveedor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el número de teléfono',
  `CalleProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la calle donde se ubica físicamente el proveedor',
  `ColoniaProveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre de la colonia donde se ubica físicamente el proveedor',
  `CodigopostalProveedor` int NOT NULL COMMENT 'Esta variable se encarga de almacenar el código postal de la dirección física donde se ubica el proveedor',
  `IDestado` int NOT NULL COMMENT 'Esta variable funciona como llave foranea para relacionar la tabla estados',
  `estadoProveedor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int NOT NULL COMMENT 'Esta variable es el ID de cada usuario del sistema web',
  `Nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Esta variable se encarga de almacenar el nombre del empleado que ha creado su usuario',
  `Nombre_usuario` varchar(60) NOT NULL COMMENT 'Esta variable se encarga de almacenar el el nombre de usuario que ha elegido el empleado para acceder al sistema',
  `Contraseña` varchar(30) NOT NULL COMMENT 'Esta variable se encarga de almacenar la contraseña que usará el usuario para acceder al sistema web'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDcliente`),
  ADD KEY `fkidestado` (`IDestado`);

--
-- Indices de la tabla `compras_clientes`
--
ALTER TABLE `compras_clientes`
  ADD PRIMARY KEY (`IDcompracliente`),
  ADD KEY `fkidcliente` (`IDcliente`),
  ADD KEY `fkidproductoterminado` (`IDproductoterminado`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID_estado`);

--
-- Indices de la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  ADD PRIMARY KEY (`IDmateriaprima`),
  ADD KEY `fkidproveedor` (`IDproveedor`);

--
-- Indices de la tabla `productos_terminados`
--
ALTER TABLE `productos_terminados`
  ADD PRIMARY KEY (`IDproductosterminados`);

--
-- Indices de la tabla `producto_materiaprima`
--
ALTER TABLE `producto_materiaprima`
  ADD PRIMARY KEY (`IDproducto_materiaprima`),
  ADD KEY `fkidproductoterminado` (`IDproductoterminado`),
  ADD KEY `fkidmateriaprima` (`IDmateriaprima`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IDproveedor`),
  ADD KEY `fkidestado` (`IDestado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDcliente` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada cliente que se registre en la base de datos';

--
-- AUTO_INCREMENT de la tabla `compras_clientes`
--
ALTER TABLE `compras_clientes`
  MODIFY `IDcompracliente` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el ID de la compra de cada cliente';

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_estado` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable es el ID de la tabla estados', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  MODIFY `IDmateriaprima` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de las distintas materias primas que se registren en la base de datos';

--
-- AUTO_INCREMENT de la tabla `productos_terminados`
--
ALTER TABLE `productos_terminados`
  MODIFY `IDproductosterminados` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada producto terminado que se registra';

--
-- AUTO_INCREMENT de la tabla `producto_materiaprima`
--
ALTER TABLE `producto_materiaprima`
  MODIFY `IDproducto_materiaprima` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable almacena el ID de cada registro de materia prima usada por producto';

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IDproveedor` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable se encarga de almacenar el id de cada proveedor registrado en la base de datos';

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int NOT NULL AUTO_INCREMENT COMMENT 'Esta variable es el ID de cada usuario del sistema web';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IDestado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras_clientes`
--
ALTER TABLE `compras_clientes`
  ADD CONSTRAINT `compras_clientes_ibfk_1` FOREIGN KEY (`IDcliente`) REFERENCES `clientes` (`IDcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_clientes_ibfk_2` FOREIGN KEY (`IDproductoterminado`) REFERENCES `productos_terminados` (`IDproductosterminados`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias_primas`
--
ALTER TABLE `materias_primas`
  ADD CONSTRAINT `materias_primas_ibfk_1` FOREIGN KEY (`IDproveedor`) REFERENCES `proveedores` (`IDproveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_materiaprima`
--
ALTER TABLE `producto_materiaprima`
  ADD CONSTRAINT `producto_materiaprima_ibfk_1` FOREIGN KEY (`IDmateriaprima`) REFERENCES `materias_primas` (`IDmateriaprima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_materiaprima_ibfk_2` FOREIGN KEY (`IDproductoterminado`) REFERENCES `productos_terminados` (`IDproductosterminados`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`IDestado`) REFERENCES `estados` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
