-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2022 a las 14:28:33
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `importadora_medicamentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `im_lineas`
--

CREATE TABLE `im_lineas` (
  `id_linea` int(11) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `descripción` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `im_lineas`
--

INSERT INTO `im_lineas` (`id_linea`, `empresa`, `descripción`) VALUES
(1, 'Aisa', 'AISA Somos una empresa jovial, dinámica y responsable especializada en la importación de productos de farmacia producto de muchos años de experiencia en este rubro . Nuestro personal de visita médica y comercialización se encuentra apto para atender todas sus consultas basados en la experiencia y capacitación permanente que hacemos de nuestra gente.'),
(2, 'Zambon', 'ZAMBON siempre ha destacado en el ámbito científico y de la investigación farmacéutica, desarrollando importantes moléculas nuevas que se han convertido en un elemento esencial para el tratamiento de varias enfermedades comunes: bronquitis aguda y crónica, fibrosis idiopática pulmonar, infecciones del tracto urinario no complicadas, dolores leves a moderados y otitis.'),
(3, 'Aisa', 'AISA Somos una empresa jovial, dinámica y responsable especializada en la importación de productos de farmacia producto de muchos años de experiencia en este rubro . Nuestro personal de visita médica y comercialización se encuentra apto para atender todas sus consultas basados en la experiencia y capacitación permanente que hacemos de nuestra gente.'),
(4, 'Zambon', 'ZAMBON siempre ha destacado en el ámbito científico y de la investigación farmacéutica, desarrollando importantes moléculas nuevas que se han convertido en un elemento esencial para el tratamiento de varias enfermedades comunes: bronquitis aguda y crónica, fibrosis idiopática pulmonar, infecciones del tracto urinario no complicadas, dolores leves a moderados y otitis.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `im_productos`
--

CREATE TABLE `im_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `accion_terapeutica` varchar(200) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `im_productos`
--

INSERT INTO `im_productos` (`id`, `nombre`, `accion_terapeutica`, `ubicacion`, `id_linea`, `estado`) VALUES
(1, 'Ibunastizol', 'Analgésicos - Antiinflamatorios - Antiartrósicos', 'img/productos/ibunastizol.png', 1, 1),
(2, 'Actual', 'Venta Libre - Antiácidos', 'img/productos/actual.png', 1, 1),
(3, 'Actual Panto 24', 'Venta Libre - Antiácidos', 'img/productos/actual_panto.png', 1, 1),
(4, 'Afebril Forte', 'Analgésicos - Antiinflamatorios - Antiartrósicos', 'img/productos/afebril_forte.png', 2, 1),
(5, 'Actinerval', 'Actinerval', 'img/productos/actinerval.png', 2, 1),
(6, 'Amitax', 'Neurología', 'img/productos/amitax.jpg', 3, 1),
(7, 'Bacticel comprimidos', 'Antibióticos', 'img/productos/bacticel_comprimidos.png', 3, 1),
(8, 'Bacticel suspensión', 'Antibióticos', 'img/productos/bacticel_suspension.jpg', 3, 1),
(9, 'Bagó B1 B6 B12 5.000 comprimidos', 'Complementos Vitamínicos', 'img/productos/bago_b1b6b12.png', 1, 1),
(10, 'Cardiorex', 'Cardiología', 'img/productos/cardiorex.png', 2, 1),
(11, 'Carvedil D', 'Cardiología', 'img/productos/carvedil_d.png', 3, 1),
(12, 'Dioxaflex Gesic', 'Analgésicos - Antiinflamatorios - Antiartrósicos', 'img/productos/dioxaflex_gesic.jpg', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `im_lineas`
--
ALTER TABLE `im_lineas`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `im_productos`
--
ALTER TABLE `im_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `im_lineas`
--
ALTER TABLE `im_lineas`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `im_productos`
--
ALTER TABLE `im_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
