-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2017 a las 22:27:49
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `forowebphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`Id`, `Nombre`) VALUES
(11, 'Chile'),
(12, 'Peru'),
(13, 'Brasil'),
(14, 'Bolivia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `Id` int(11) NOT NULL COMMENT 'numero unico de publicacion',
  `Fecha` datetime NOT NULL COMMENT 'fecha y hora de la publicacion',
  `Contenido` text NOT NULL COMMENT 'Texto escrito por usuarios',
  `Id_User` int(11) NOT NULL COMMENT 'usuario que genera la publicacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`Id`, `Fecha`, `Contenido`, `Id_User`) VALUES
(1, '2017-06-12 07:14:29', 'este es el primer post ;-;', 2),
(2, '2017-06-14 03:20:18', 'primer post', 1),
(3, '2017-06-14 16:21:40', 'holaaaassssss', 1),
(4, '2017-06-14 16:21:52', 'contesteeeennnnn', 1),
(5, '2017-06-14 16:40:35', 'probando hora', 1),
(6, '2017-06-14 12:41:43', 'probando de nuevo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_User` int(11) NOT NULL COMMENT 'identificador de los usuarios',
  `Usuario` varchar(30) NOT NULL COMMENT 'nombre que se ve en los posteos',
  `Clave` varchar(50) NOT NULL COMMENT 'clave unica del usuario',
  `Nombre` varchar(200) NOT NULL COMMENT 'nombre real del usuario',
  `Apellido` varchar(200) NOT NULL COMMENT 'apellido del usuario',
  `Imagen` varchar(400) NOT NULL COMMENT 'imagen que sera el avatar del usuario',
  `Nacionalidad_user` int(11) NOT NULL,
  `Privilegio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_User`, `Usuario`, `Clave`, `Nombre`, `Apellido`, `Imagen`, `Nacionalidad_user`, `Privilegio`) VALUES
(1, 'carlog', 'carlo123', 'carlos', 'gonzalez', 'carlos.jpg', 11, 1),
(2, 'nibalty', 'nicolcita', 'nicole', 'baltierra', 'nicole.jpg', 11, 0),
(3, 'cochi', 'cochi123', 'carlos', 'balti', 'YOeFoMLO.jpg', 11, 0),
(4, 'prueba', 'prueba1', 'pruebin', 'prueba', 'Logo.png', 12, 0),
(5, 'prueba2', 'prueba12', 'pruebin2', 'prueba2', 'Logo.png', 13, 0),
(6, 'prueba4', 'prueba4', 'prueba4', 'prueba4', 'tarjeta2.png', 14, 0),
(7, 'prueba4', 'prueba4', 'prueba4', 'prueba4', 'tarjeta2.png', 14, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `Nacionalidad_user` (`Nacionalidad_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero unico de publicacion', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de los usuarios', AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `UsuarioPublicacion` FOREIGN KEY (`Id_User`) REFERENCES `usuario` (`Id_User`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Nacionalidad` FOREIGN KEY (`Nacionalidad_user`) REFERENCES `nacionalidad` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
