-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 20:29:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comprar`
--
CREATE DATABASE IF NOT EXISTS `comprar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `comprar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `clave` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod`, `nombre`, `apellido`, `direccion`, `tel`, `email`, `clave`) VALUES
(1, 'kiara', 'chunga', 'micasa', '23458907', 'kiarachunga28@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalleventa`
--

DROP TABLE IF EXISTS `tbldetalleventa`;
CREATE TABLE `tbldetalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIOUNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbldetalleventa`
--

INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`) VALUES
(14, 11, 9, '15000.00', 1),
(15, 11, 18, '13000.00', 1),
(16, 12, 9, '15000.00', 1),
(17, 12, 22, '7069.00', 1),
(18, 12, 24, '26999.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

DROP TABLE IF EXISTS `tblproductos`;
CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(9, 'Camara Polaroid', '15000', 'cámara instantánea de color rosa pastel, que utiliza un tipo de película que permite crear un positivo directo, revelándolo \"al momento\", después de hacer la foto.', 'https://www.fotolandia.com.ar/tienda/592-Niara_thickbox/fujifilm-instax-mini-11-instantanea.jpg'),
(18, 'Lampara comun de mesa', '13000', 'La lámpara de sobremesa de color negra ideal para colocar sobre la mesita de noche para crear un ambiente mucho más relajado.', 'https://http2.mlstatic.com/D_NQ_NP_741175-MLA43504935034_092020-O.webp'),
(19, 'Espejo completo', '21400', 'Este espejo trae estilo, luminosidad, perspectiva, amplitud visual y personalidad.', 'https://hannun-variants-images.s3.eu-west-3.amazonaws.com/H4KAT/H4KAT_media_model_1x1.jpg'),
(20, 'Fundas de un solo color ', '3548', 'Fundas de silicona de distintos colores ', 'https://www.qloud.ar/SITES/ryr/fotos/15930-0.jpg'),
(22, 'Botella de agua', '7069', 'Botella de color violeta de gran capacidad', 'https://ar.todomoda.com/media/catalog/product/7/8/78847204_0_1_20230720090244.jpg?quality=75&bg-color=255,255,255&fit=bounds&height=841&width=657&canvas=657:841'),
(23, 'Lentes de sol', '51599', 'Los lentes de sol corresponden a un tipo de anteojos usados para proteger la vista de la luz directa o indirecta que expidan los rayos solares, normalmente no tienen graduación.', 'https://www.masvision.com.ar/cdn/shop/files/BRUKSBLK-POLS10PERFIL_1057x700.jpg?v=1683294062'),
(24, 'Mochila JanSport', '26999', 'Una mochila, morral, macuto o bulto es un recipiente para llevar el equipaje, ', 'https://www.libreriaascorti.com.ar/7705-large_default/mochila-jansport-superbreak-misty-rose.jpg'),
(25, 'Disco duro externo Toshiba Canvio Basics HDTB510XK3AA 1TB negro\r\n', '45999', 'Más velocidad a tu alcance\r\nEste producto transfiere datos a través de un puerto USB 3.0, lo que lo convierte en un dispositivo sumamente veloz. \r\n', 'https://tienda.itarrow.cl/wp-content/uploads/2020/12/toshiba-canvio-basics-4.png\r\n'),
(26, 'Silla de comedor DeSillas Tolix, estructura color negro microtexturado, 4 unidades', '38106', 'Las sillas apilables son garantía de confort. Resultan muy prácticas a la hora de tener reuniones con gran cantidad de gente en casa o bien cuando tenés que ir de un lugar a otro.\r\n', 'https://resources.claroshop.com/medios-plazavip/s2/10205/1244490/5dc1be9f44897-3-1600x1600.jpg\r\n'),
(27, 'Silla gamer', '47200', 'Diseño ergonómico para mayor comodidad en largas jornadas | Tapizado en cuero sintético blanco, fácil de limpiar | Altura y apoyabrazos ajustables ', 'https://http2.mlstatic.com/D_NQ_NP_858728-MLA48636516976_122021-O.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventas`
--

DROP TABLE IF EXISTS `tblventas`;
CREATE TABLE `tblventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblventas`
--

INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) VALUES
(1, '12345678910', '', '2023-11-14 21:50:43', 'kiarachunga28@gmail.com', '6000.00', 'pendiente'),
(2, '12345678910', '', '2023-11-14 21:50:43', 'kiarachunga28@gmail.com', '6000.00', 'pendiente'),
(3, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 18:09:59', 'kiarachunga28@gmail.com', '6000.00', 'pendiente'),
(4, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 18:13:55', 'juancarlos@gmail.com', '6400.00', 'pendiente'),
(5, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 18:44:26', 'hola@gmail.com', '12400.00', 'pendiente'),
(6, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 18:49:11', 'hola@gmail.com', '12400.00', 'pendiente'),
(7, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 20:56:50', 'hola@gmail.com', '12400.00', 'pendiente'),
(8, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 21:15:08', 'hola@gmail.com', '12400.00', 'pendiente'),
(9, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 21:16:16', 'hola@gmail.com', '12400.00', 'pendiente'),
(10, 'd90k23st5uf04mkop6u5nop5d0', '', '2023-11-14 21:37:33', 'hola@gmail.com', '12400.00', 'pendiente'),
(11, '5ru3abnbq6svvigqahmetna0hq', '', '2023-11-15 15:03:08', 'hola@gmail', '28000.00', 'pendiente'),
(12, '5ru3abnbq6svvigqahmetna0hq', '', '2023-11-15 15:41:39', 'hola@gmail', '49068.00', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tblventas`
--
ALTER TABLE `tblventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalleventa`
--
ALTER TABLE `tbldetalleventa`
  ADD CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `tblventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tblproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
