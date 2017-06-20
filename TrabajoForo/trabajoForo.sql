-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2017 a las 21:35:46
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
CREATE DATABASE IF NOT EXISTS `forowebphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `forowebphp`;

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
(67, '2017-06-19 17:50:42', 'Escribe una publicacion carlog .. . .', 1),
(71, '2017-06-19 21:14:13', 'probando denuevo', 1),
(72, '2017-06-19 21:17:05', 'hola soy nuevo', 55),
(73, '2017-06-19 21:33:07', 'muy bien', 8);

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
(1, 'carlog', 'carlo123', 'carlos', 'gonzalez', 'user.png', 11, 1),
(8, 'Admin', 'admin ', 'administrador', 'capooo', 'admin.png', 11, 1),
(9, 'indu', 'asp ', 'apu', '.net', 'asp.png', 12, 0),
(10, 'tal', 'ivan', 'talivan', 'talivan', 'taliban.png', 14, 0),
(22, 'pedrito', 'pedrito1', 'pedro', 'perez', 'asp.png', 11, 0),
(24, 'juan', 'juan1', 'juan', 'juanez', 'admin.png', 12, 0),
(25, 'pedritox', 'pedrito1', 'carlos', 'balti', 'admin.png', 11, 0),
(55, 'prueba10', 'prueba1', 'userprueba', 'prueba', 'photo.jpg', 11, 0);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero unico de publicacion', AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de los usuarios', AUTO_INCREMENT=56;
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
