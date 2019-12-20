-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2019 a las 07:43:56
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db5533534_funworld`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales`
--

CREATE TABLE `adicionales` (
  `IDServicio` int(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adicionales`
--

INSERT INTO `adicionales` (`IDServicio`, `descripcion`, `precio`) VALUES
(1, 'Helados: 50 conos de helado', 2500),
(2, 'Helados: 50 conos con confites', 2800),
(3, 'Helados: Canilla libre de conos', 3900),
(4, 'Helados: Canilla libre de conos con confites y salsa', 4400),
(5, 'Helados: 50 copas con salsa y confites', 3500),
(6, 'Helados: Canilla libre de copas', 4900),
(7, 'Pop: 50 conos', 1300),
(8, 'Pop: Canilla libre', 1900),
(9, 'Postres 1', 1800),
(10, 'Postres 2', 2200),
(11, 'Postres 3', 2600),
(12, 'DJ', 2900),
(13, 'Inflable', 800),
(14, 'Sillas vestidas', 32),
(15, 'Torta temática al evento', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales_evento`
--

CREATE TABLE `adicionales_evento` (
  `IDAdicionalEvento` int(255) NOT NULL,
  `nombreAdicional` varchar(255) NOT NULL,
  `IDEvento` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adicionales_evento`
--

INSERT INTO `adicionales_evento` (`IDAdicionalEvento`, `nombreAdicional`, `IDEvento`) VALUES
(17, 'Helados: Canilla libre de conos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `IDBebida` int(255) NOT NULL,
  `DescripcionBebida` varchar(255) NOT NULL,
  `PrecioBebida` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`IDBebida`, `DescripcionBebida`, `PrecioBebida`) VALUES
(1, 'Coca Cola 2L', 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas_evento`
--

CREATE TABLE `bebidas_evento` (
  `IDBebidaEvento` int(255) NOT NULL,
  `IDEvento` int(255) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `IDBebida` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(6) NOT NULL,
  `nombreCategoria` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Niño'),
(2, 'Adulto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCliente` int(5) NOT NULL,
  `contratanteEvento` varchar(255) NOT NULL,
  `direccionContratanteEvento` varchar(255) NOT NULL,
  `telFijoContratanteEvento` int(8) NOT NULL,
  `telMovilContratanteEventoUno` int(9) NOT NULL,
  `telMovilContratanteEventoDos` int(9) DEFAULT NULL,
  `ciContratanteEvento` int(8) NOT NULL,
  `emailContratanteEvento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCliente`, `contratanteEvento`, `direccionContratanteEvento`, `telFijoContratanteEvento`, `telMovilContratanteEventoUno`, `telMovilContratanteEventoDos`, `ciContratanteEvento`, `emailContratanteEvento`) VALUES
(1, 'Nicolass', 'Talcahuanoo', 946994000, 946995000, 0, 476637444, 'nicodbz_8@hotmail.comm'),
(2, 'asdasds', 'Talcahuano', 94699400, 0, 0, 1312312, 'nicodbz_8@hotmail.com'),
(3, 'Roberto', 'Diaz', 12, 94, 0, 678, 'hola@hola'),
(4, 'aadsasadas', 'sadsadas', 321312213, 3213123, 0, 123123, 'adas@sadas'),
(5, 'UnNombre', 'Direccion', 123123, 123321, 321123, 12345678, 'nicodbz_8@hotmail.com'),
(6, 'asdas', 'asdasas', 12312, 12312, 0, 123412, 'asdas@ASa'),
(7, 'asd', 'asdas', 12312, 12312, 0, 2331, 'sdas@dfsdfsada'),
(8, 'sadsa', 'asd', 21312, 3321, 0, 12312, 'asdas@dasds'),
(9, 'sadasdas', 'asdasdas', 21321312, 21312312, 0, 12312312, 'asdasdas@asdasdas'),
(10, 'asd', 'asd', 123, 321, 0, 123, 'asd@asd'),
(11, 'das', 'asd', 123, 321, 0, 456, 'asd@dsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `IDEvento` int(11) NOT NULL,
  `IDVisita` int(5) NOT NULL,
  `IDSalon` int(1) NOT NULL,
  `fechaEvento` date NOT NULL,
  `horaInicio` varchar(5) NOT NULL,
  `horaFin` varchar(5) NOT NULL,
  `señaEvento` int(1) NOT NULL,
  `montoSeña` int(5) NOT NULL,
  `IDCliente` int(5) NOT NULL,
  `tipoEvento` varchar(255) NOT NULL,
  `precioEvento` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`IDEvento`, `IDVisita`, `IDSalon`, `fechaEvento`, `horaInicio`, `horaFin`, `señaEvento`, `montoSeña`, `IDCliente`, `tipoEvento`, `precioEvento`) VALUES
(1, 5, 1, '2019-12-12', '12:00', '16:00', 1, 3000, 1, 'Reunión', 11950),
(2, 6, 1, '2019-12-14', '12:00', '16:00', 0, 0, 2, 'Reunión', 19450),
(3, 9, 2, '2019-12-19', '12:00', '16:00', 1, 3000, 3, 'Despedida', 41905),
(4, 13, 2, '2019-12-20', '12:00', '16:00', 0, 0, 4, 'Despedida', 37210),
(5, 32, 2, '2019-12-10', '15:30', '19:30', 1, 3000, 5, 'Despedida', 0),
(6, 55, 1, '2019-12-21', '12:00', '16:00', 1, 3000, 6, 'Despedida', 51823),
(7, 56, 1, '2019-12-26', '12:00', '16:00', 1, 3000, 7, 'Despedida', 42180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotogastronomia`
--

CREATE TABLE `fotogastronomia` (
  `IDFoto` int(10) NOT NULL,
  `IDMenu` int(10) NOT NULL,
  `NombreFoto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastronomia`
--

CREATE TABLE `gastronomia` (
  `IDMenu` int(255) NOT NULL,
  `NombreMenu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `DescripcionMenu` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `PrecioMenu` int(6) NOT NULL,
  `IDCategoria` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `gastronomia`
--

INSERT INTO `gastronomia` (`IDMenu`, `NombreMenu`, `DescripcionMenu`, `PrecioMenu`, `IDCategoria`) VALUES
(1, 'Menú 1', '• Panchos al pan\n• Snacks\n• Pizzetitas', 88, 1),
(3, 'Menú 2', '• Medialunas de jamón y queso \no \n• Pebetes de jamón y queso\n\n• Snacks\n• Pizzetitas \n• Sandwiches', 125, 1),
(4, 'Menú 3', '• Hamburguesas con papas fritas \r\no \r\n• Panchos al pan con papas fritas\r\no\r\n• Nuggets de pollo con papas fritas \r\n\r\n• Snacks\r\n• Pizzetitas \r\n• Sándwiches', 150, 1),
(5, 'Festival de Pizzetas', 'Gustos de las pizzetas:\r\n• Muzzarella\r\n• Jamón\r\n• Aceitunas\r\n• Pepperoni\r\n• Champignon\r\n• Morrón\r\n• Palmitos\r\n• Figazza\r\n• Lehmeyun', 375, 2),
(6, 'Chivitos', 'Gustos de chivito:\r\n• Muzzarella\r\n• Jamón\r\n• Huevo Duro\r\n• Tomate\r\n• Lechuga\r\n• Cebolla Frita\r\n• Panceta\r\n• Condimentos\r\n• Aceitunas', 415, 2),
(7, 'Pizettas y Calzone', '', 405, 2),
(8, 'Chivitos y Pizzetas', '', 495, 2),
(9, 'Tabla de Fiambres', 'Incluye:\r\n• Jamón cocido\r\n• Salame Milán\r\n• Lomito\r\n• Bondiola\r\n• Queso Colonia\r\n• Queso Dambo\r\n• Aceitunas\r\n• Pancitos saborizados\r\n• Tostaditas\r\n• Queso de untar', 220, 2),
(10, 'Picada de Parrilla', 'Incluye:\r\n• Chorizo\r\n• Morcilla\r\n• Molleja\r\n• Cerdo\r\n• Colita de Cuadril\r\n• Provolone\r\n• Mojo y Salsas\r\n• Pan', 590, 2),
(11, 'Parrilla con Ensaladas', 'Incluye:\r\n• Chorizo\r\n• Morcilla\r\n• Matambrillo de cerdo\r\n• Mollejas\r\n• Colita de cuadril\r\n• Pollo arrollado\r\n• Salsas\r\n• Mojo barrillero\r\n• Pan\r\n• Papas Fritas\r\n• Variedad de ensaladas (rusa, alemana, caprese, antipasto, repollo)', 750, 2),
(12, 'Hamburguesas Completas', 'Incluye:\r\n• Lechuga\r\n• Tomate\r\n• Huevo Duro\r\n• Jamón\r\n• Muzzarella\r\n• Panceta\r\n• Palmitos\r\n• Cebolla\r\n• Choclo\r\n• Hongos y pickles\r\n• Salsas\r\n• Rechaud con papas fritas', 370, 2),
(13, 'Mesa de Tartas', 'Incluye:\r\n• Tarta de jamón y queso\r\n• Tarta de pollo\r\n• Tarta jamón y ananá\r\n• Tarta de zapallito\r\n• Tarta de puerro y panceta\r\n• Tarta de cebolla\r\n• Tarta de palmitos y quesos\r\n• Tarta napolitana\r\n• Pionono olímpico\r\n\r\nSe presenta en mesa de buffet con ensaladas: Lechuga, tomate, zanahoria rallada, caprese, repollo y jamón.', 445, 2),
(14, 'Festival de Pastas', 'Variedad de pastas:\r\n• Ravioles de Ricota\r\n• Raviolones Caprese\r\n• Sorrentino de jamón y queso\r\n• Tallarines\r\n\r\nSe presenta en mesa de buffet con variedad de salsas: Cuatro Quesos, Salsa Rosa, Salsa Caruso, y Salsa Bolognesa\r\n\r\n(Para festival de pastas se necesita un mozo extra)', 535, 2),
(15, 'Mesa Buffete 1', '• Té saborizado\r\n• Café\r\n• Leche\r\n• Chocolate\r\n• Jugo de naranja\r\n• Budín de naranja\r\n• Budín de chocolate\r\n• Budín de vainilla\r\n• Scones\r\n• Sándwiches de pan de nuez\r\n• Canasto de tostadas y mermeladas varias\r\n• Pastafrola de membrillo, dulce de leche o manzana\r\n• Torta marmolada\r\n• Torta ricotta\r\n• Torta naranja\r\n• Sándwiches calientes\r\n• Tablas de fiambres\r\n• Pancitos saborizados\r\n• Sándwiches de pan de ciruela\r\n• Medialunitas', 470, 2),
(16, 'Mesa Buffete 2', '• Té saborizado\r\n• Café\r\n• Leche\r\n• Chocolate\r\n• Jugo de naranja\r\n• Budín de naranja\r\n• Budín de chocolate\r\n• Budín de vainilla\r\n• Pastafrola de membrillo, dulce de leche o manzana\r\n• Scones de queso\r\n• Sándwiches de pan de nuez\r\n• Sándwiches de pan de ciruela\r\n• Medialunitas\r\n• Canasto de tostadas y mermeladas varias', 370, 2),
(17, 'Servicio de Lunch', 'Incluye: 18 bocados\n\n14 fríos:\n• Sándwiches de jamón y queso triples\n• Sándwiches surtidos\n• Sándwiches olímpicos\n• Sándwiches especiales (de nuez, negro con pasas, de palmitos, champignon)\n• Jesuitas de jamón y queso\n• Medialunitas de jamón y queso\n• Saladitos\n\n4 calientes:\n• Arrolladitos Primavera\n• Empanaditas\n• Pizzetitas con muzzarella\n• Brochettes', 475, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastronomia_evento`
--

CREATE TABLE `gastronomia_evento` (
  `IDGastronomiaEvento` int(6) NOT NULL,
  `IDEvento` int(6) NOT NULL,
  `nombreMenu` varchar(255) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `IDCategoria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastronomia_evento`
--

INSERT INTO `gastronomia_evento` (`IDGastronomiaEvento`, `IDEvento`, `nombreMenu`, `cantidad`, `IDCategoria`) VALUES
(111, 1, '', 12, 1),
(112, 1, '', 12, 2),
(259, 6, 'Menú 1', 21, 1),
(260, 6, 'Chivitos', 20, 2),
(261, 6, 'Menú 2', 23, 1),
(262, 6, 'Pizettas y Calzone', 12, 2),
(265, 4, 'Menú 1', 12, 1),
(266, 4, 'Mesa Buffete 2', 13, 2),
(267, 7, 'Menú 1', 12, 1),
(268, 7, 'Festival de Pastas', 12, 2),
(269, 7, 'Menú 2', 32, 1),
(270, 7, 'Mesa Buffete 1', 23, 2),
(273, 3, 'Menú 2', 23, 1),
(274, 3, 'Festival de Pastas', 14, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homenajeados`
--

CREATE TABLE `homenajeados` (
  `IDHomenajeado` int(5) NOT NULL,
  `IDEvento` int(5) NOT NULL,
  `homenajeadoEvento` varchar(255) NOT NULL,
  `colegioHomenajeadoEvento` varchar(255) DEFAULT NULL,
  `edadHomenajeadoEvento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `homenajeados`
--

INSERT INTO `homenajeados` (`IDHomenajeado`, `IDEvento`, `homenajeadoEvento`, `colegioHomenajeadoEvento`, `edadHomenajeadoEvento`) VALUES
(1, 1, 'Juan', 'Algunoo', 44),
(2, 2, 'as', ' uno', 2),
(3, 3, 'Pepe', '', 2),
(4, 4, 'Hola', '', 2),
(5, 5, 'Otro', 'Alguno', 2),
(6, 5, 'Otro', 'Alguno', 2),
(7, 6, 'pruebas', 'asdas', 23),
(8, 7, 'aaaa', 'ss', 2),
(9, 8, 'sdas', 'dasdas', 2),
(10, 9, 'nnicolas', 'asdsas', 2),
(11, 9, 'ddsaaaa', 'asddsa', 3),
(12, 10, 'test', 'as', 2),
(13, 11, 'asd', 'ggd', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorios`
--

CREATE TABLE `recordatorios` (
  `IDRecordatorio` int(6) NOT NULL,
  `fechaRecordatorio` date NOT NULL,
  `descripcionRecordatorio` text NOT NULL,
  `todoElDia` int(1) NOT NULL,
  `horaInicio` varchar(5) DEFAULT NULL,
  `horaFin` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recordatorios`
--

INSERT INTO `recordatorios` (`IDRecordatorio`, `fechaRecordatorio`, `descripcionRecordatorio`, `todoElDia`, `horaInicio`, `horaFin`) VALUES
(0, '2019-12-12', 'asdasdas', 1, '12:00', '16:00'),
(0, '2019-12-18', 'Algo\n', 1, '12:00', '16:00'),
(0, '2019-12-20', 'zasdsa', 0, '12:00', '16:00'),
(0, '2019-12-21', 'sadasd', 0, '12:00', '16:00'),
(0, '2019-12-06', 'sdas', 0, '12:00', '16:00'),
(0, '2019-12-13', 'asdsad', 1, '12:00', '16:00'),
(0, '2019-12-20', 'comprar papel higienico\n', 0, '16:30', '20:30'),
(0, '2019-12-14', 'sadsa', 0, '11:30', '15:30'),
(0, '2019-12-19', 'asddsa', 0, '13:30', '17:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `IDSalon` int(2) NOT NULL,
  `nombreSalon` varchar(255) NOT NULL,
  `precioSemana` int(6) NOT NULL,
  `precioFinDeSemana` int(6) NOT NULL,
  `precioHoraExtraSemana` int(6) NOT NULL,
  `precioHoraExtraFinDeSemana` int(6) NOT NULL,
  `mozos` int(255) NOT NULL,
  `animadores` int(255) NOT NULL,
  `precioMozoExtra` int(255) NOT NULL,
  `precioAnimadorExtra` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`IDSalon`, `nombreSalon`, `precioSemana`, `precioFinDeSemana`, `precioHoraExtraSemana`, `precioHoraExtraFinDeSemana`, `mozos`, `animadores`, `precioMozoExtra`, `precioAnimadorExtra`) VALUES
(1, 'Fantasy', 14950, 17950, 4500, 5600, 1, 2, 1500, 950),
(2, 'Magic', 14950, 17950, 4500, 5600, 1, 2, 1500, 950);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_evento`
--

CREATE TABLE `servicios_evento` (
  `IDServicioEvento` int(6) NOT NULL,
  `IDEvento` int(6) NOT NULL,
  `cantidadNinos` int(4) NOT NULL,
  `cantidadAdultos` int(4) NOT NULL,
  `cantidadMozos` int(3) NOT NULL,
  `cantidadAnimadores` int(3) NOT NULL,
  `cantidadHoraExtra` int(2) NOT NULL,
  `colores` varchar(255) NOT NULL,
  `traenContratantes` text DEFAULT NULL,
  `aclaraciones` text DEFAULT NULL,
  `comentariosServiciosAdicionales` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios_evento`
--

INSERT INTO `servicios_evento` (`IDServicioEvento`, `IDEvento`, `cantidadNinos`, `cantidadAdultos`, `cantidadMozos`, `cantidadAnimadores`, `cantidadHoraExtra`, `colores`, `traenContratantes`, `aclaraciones`, `comentariosServiciosAdicionales`) VALUES
(1, 6, 15, 15, 3, 3, 3, 'Azul', 'asd', 'dsa', 'dsa'),
(27, 1, 12, 12, 1, 2, 0, '', '', '', ''),
(29, 3, 12, 12, 3, 3, 3, 'rosaa', 'nadaa', '', '-'),
(30, 4, 21, 13, 3, 3, 3, 'azul', '', '', ''),
(31, 7, 31, 12, 1, 2, 2, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuario` int(8) NOT NULL,
  `User` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Token` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `User`, `Password`, `Token`) VALUES
(0, 'Admin', 'Admin', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `IDVisita` int(6) NOT NULL,
  `conoceSalon` varchar(2) COLLATE utf32_spanish_ci NOT NULL,
  `tipoEvento` varchar(255) COLLATE utf32_spanish_ci NOT NULL,
  `edadCumpleanos` int(2) DEFAULT NULL,
  `fechaVisita` datetime NOT NULL DEFAULT '2019-11-16 15:17:43'
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`IDVisita`, `conoceSalon`, `tipoEvento`, `edadCumpleanos`, `fechaVisita`) VALUES
(1, '', 'Cumpleanos', 10, '2019-11-16 15:17:43'),
(2, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(3, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(4, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(5, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(6, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(7, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(8, 'no', 'Cumpleanos', 11, '2019-11-16 15:17:43'),
(9, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(10, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(11, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(12, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(13, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(14, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(15, 'no', 'Cumpleanos', 4, '2019-11-16 15:17:43'),
(16, 'no', 'Reunión', 4, '2019-11-16 15:17:43'),
(17, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(18, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(19, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(20, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(21, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(22, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(23, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(24, '', 'Aniversario', 0, '2019-11-16 15:17:43'),
(25, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(26, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(27, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(28, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(29, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(30, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(31, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(32, 'si', 'Despedida', 0, '2019-11-16 15:17:43'),
(33, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(34, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(35, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(36, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(37, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(38, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(39, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(40, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(41, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(42, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(43, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(44, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(45, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(46, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(47, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(48, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(49, 'no', 'Despedida', 0, '2019-11-16 15:17:43'),
(50, '', 'Cumpleanos', 3, '2019-11-16 15:17:43'),
(51, '', 'Aniversario', 0, '2019-11-16 15:17:43'),
(52, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(53, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(54, 'no', 'Aniversario', 0, '2019-11-16 15:17:43'),
(55, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(56, '', 'Despedida', 0, '2019-11-16 15:17:43'),
(57, '', 'Aniversario', 0, '2019-11-16 15:17:43'),
(58, 'no', 'Cumpleanos', 2, '2019-11-16 15:17:43'),
(59, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(60, '', 'Reunión', 0, '2019-11-16 15:17:43'),
(61, 'no', 'Reunión', 0, '2019-11-16 15:17:43'),
(62, 'no', 'Reunión', 0, '2019-11-16 15:17:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  ADD PRIMARY KEY (`IDServicio`);

--
-- Indices de la tabla `adicionales_evento`
--
ALTER TABLE `adicionales_evento`
  ADD PRIMARY KEY (`IDAdicionalEvento`);

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`IDBebida`);

--
-- Indices de la tabla `bebidas_evento`
--
ALTER TABLE `bebidas_evento`
  ADD PRIMARY KEY (`IDBebidaEvento`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`IDEvento`);

--
-- Indices de la tabla `gastronomia`
--
ALTER TABLE `gastronomia`
  ADD PRIMARY KEY (`IDMenu`);

--
-- Indices de la tabla `gastronomia_evento`
--
ALTER TABLE `gastronomia_evento`
  ADD PRIMARY KEY (`IDGastronomiaEvento`);

--
-- Indices de la tabla `homenajeados`
--
ALTER TABLE `homenajeados`
  ADD PRIMARY KEY (`IDHomenajeado`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`IDSalon`);

--
-- Indices de la tabla `servicios_evento`
--
ALTER TABLE `servicios_evento`
  ADD PRIMARY KEY (`IDServicioEvento`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`IDVisita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  MODIFY `IDServicio` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `adicionales_evento`
--
ALTER TABLE `adicionales_evento`
  MODIFY `IDAdicionalEvento` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `IDBebida` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bebidas_evento`
--
ALTER TABLE `bebidas_evento`
  MODIFY `IDBebidaEvento` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `gastronomia_evento`
--
ALTER TABLE `gastronomia_evento`
  MODIFY `IDGastronomiaEvento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT de la tabla `homenajeados`
--
ALTER TABLE `homenajeados`
  MODIFY `IDHomenajeado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `servicios_evento`
--
ALTER TABLE `servicios_evento`
  MODIFY `IDServicioEvento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `IDVisita` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
