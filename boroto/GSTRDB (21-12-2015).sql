-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-12-2015 a las 12:31:16
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `GSTRDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administra`
--

CREATE TABLE IF NOT EXISTS `Administra` (
  `user_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Apunte`
--

CREATE TABLE IF NOT EXISTS `Apunte` (
`apunte_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL,
  `anho_academico` int(4) NOT NULL,
  `apunte_name` varchar(24) COLLATE utf16_spanish2_ci NOT NULL,
  `ruta` varchar(32) COLLATE utf16_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comparte_Nota`
--

CREATE TABLE IF NOT EXISTS `Comparte_Nota` (
  `nota_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Funcionalidad`
--

CREATE TABLE IF NOT EXISTS `Funcionalidad` (
`fun_id` int(11) NOT NULL,
  `fun_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `fun_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Funcionalidad`
--

INSERT INTO `Funcionalidad` (`fun_id`, `fun_name`, `fun_desc`) VALUES
(15, 'CER_Crear', 'crear entidades en cancerbero'),
(16, 'CER_Gestion', 'Gestionar en cancerbero'),
(17, 'CER_Modificar', 'modificar entidades en cancerbero'),
(18, 'CER_Administrar', 'Administrador total de cancerbero'),
(19, 'WPA_alta', 'alta de entidades en la aplicacion integrada'),
(20, 'WPA_baja', 'baja de entidades en la aplicacion integrada'),
(21, 'WPA_modificar', 'modificar entidades en la aplicacion integrada'),
(22, 'WPA_consulta', 'consulta de entidades en la aplicacion integrada'),
(23, 'WPA_administrar', 'accesso total a la aplicacion integrada'),
(24, 'modificarPass', 'modificar la pass de un usuario'),
(25, 'WPA_usuario', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia`
--

CREATE TABLE IF NOT EXISTS `Materia` (
`mat_id` int(11) NOT NULL,
  `mat_name` varchar(18) COLLATE utf16_spanish2_ci NOT NULL,
  `tit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia_Usuario`
--

CREATE TABLE IF NOT EXISTS `Materia_Usuario` (
  `mat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Nota`
--

CREATE TABLE IF NOT EXISTS `Nota` (
`nota_id` int(11) NOT NULL,
  `nota_name` varchar(18) COLLATE utf16_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(1500) COLLATE utf16_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notificacion`
--

CREATE TABLE IF NOT EXISTS `Notificacion` (
`notificacion_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(40) COLLATE utf16_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pagina`
--

CREATE TABLE IF NOT EXISTS `Pagina` (
`pag_id` int(11) NOT NULL,
  `pag_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `pag_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Pagina`
--

INSERT INTO `Pagina` (`pag_id`, `pag_name`, `pag_desc`) VALUES
(23, 'WPAaltaApuesta', 'pagina aplicacion integrada'),
(2, 'CER_GestionFuncionalidades', 'CERBERUS GestiÃ³n de Funcionalidades (NO BORRAR)'),
(3, 'CER_CrearFuncionalidad', 'CERBERUS CreaciÃ³n de Funcionalidades (NO BORRAR)'),
(4, 'CER_ModificarFuncionalidad', 'CERBERUS ModificaciÃ³n de Funcionalidades (NO BORRAR)'),
(5, 'CER_CrearPagina', 'CERBERUS CreaciÃ³n de PÃ¡ginas (NO BORRAR)'),
(6, 'CER_GestionPaginas', 'CERBERUS GestiÃ³n de PÃ¡ginas (NO BORRAR)'),
(7, 'CER_ModificarPagina', 'CERBERUS ModificaciÃ³n de PÃ¡ginas'),
(8, 'CER_CrearRol', 'CERBERUS CreaciÃ³n de Roles'),
(9, 'CER_GestionRoles', 'CERBERUS GestiÃ³n de Roles (NO BORRAR)'),
(10, 'CER_ModificarRol', 'CERBERUS ModificaciÃ³n de Roles (NO BORRAR)'),
(11, 'CER_CrearUsuario', 'CERBERUS CreaciÃ³n de Usuarios (NO BORRAR)'),
(12, 'CER_GestionUsuarios', 'CERBERUS GestiÃ³n de Usuarios (NO BORRAR)'),
(13, 'CER_ModificarPass', 'CERBERUS ModificaciÃ³n de ContraseÃ±as'),
(14, 'CER_ModificarUsuario', 'CERBERUS ModificaciÃ³n de Usuarios'),
(15, 'CER_Menu', 'CERBERUS Acceso al MenÃº Principal'),
(16, 'WPAmenu', 'MenÃº de IUET12015'),
(24, 'WPAaltaSocios', 'pagina alta socios integrada'),
(25, 'WPAbajaApuestas', 'baja apuestas integrada'),
(26, 'WPAbajaSocios', 'baja socios integrada'),
(27, 'WPAconsultaApuestas', 'consulta apuestas'),
(28, 'WPAconsultaSocios', 'consulta socios integrada'),
(29, 'WPAjornadasAlta', 'alta jornadas integrada'),
(30, 'WPAjornadasBaja', 'baja jornadas integrada'),
(31, 'WPAjornadasModificar', 'jornadas modificar integrada'),
(32, 'WPAjornadasConsultar', 'consultar jornadas integrada'),
(33, 'WPApremiosAlta', 'alta premios integrada'),
(34, 'WPApremiosBaja', 'baja de premios integrada'),
(35, 'WPApremiosModificar', 'modificar premios integrada'),
(36, 'WPApremiosConsultar', 'consulta premios integrada'),
(37, 'WPAmodificacionApuestas', 'modificacion apuestas integrada'),
(38, 'WPAmodificacionSocios', 'modificacion socios integrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pag_Fun`
--

CREATE TABLE IF NOT EXISTS `Pag_Fun` (
  `pag_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Pag_Fun`
--

INSERT INTO `Pag_Fun` (`pag_id`, `fun_id`) VALUES
(2, 16),
(2, 18),
(3, 15),
(3, 18),
(4, 17),
(4, 18),
(5, 15),
(5, 18),
(6, 16),
(6, 18),
(7, 17),
(7, 18),
(8, 15),
(8, 18),
(9, 16),
(9, 18),
(10, 17),
(10, 18),
(11, 15),
(11, 18),
(12, 16),
(12, 18),
(13, 18),
(13, 24),
(14, 17),
(14, 18),
(15, 18),
(16, 23),
(16, 25),
(23, 19),
(23, 23),
(23, 25),
(24, 19),
(24, 23),
(25, 20),
(25, 23),
(25, 25),
(26, 20),
(26, 23),
(27, 22),
(27, 23),
(27, 25),
(28, 22),
(28, 23),
(29, 19),
(29, 23),
(30, 20),
(30, 23),
(31, 21),
(31, 23),
(32, 22),
(32, 23),
(32, 25),
(33, 19),
(33, 23),
(34, 20),
(34, 23),
(35, 21),
(35, 23),
(36, 22),
(36, 23),
(36, 25),
(37, 21),
(37, 23),
(37, 25),
(38, 21),
(38, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE IF NOT EXISTS `Rol` (
`rol_id` int(11) NOT NULL,
  `rol_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `rol_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`rol_id`, `rol_name`, `rol_desc`) VALUES
(13, 'Administrador_WPA', 'administrador de WPA'),
(12, 'Usuario_normal', 'usuario '),
(14, 'Administrador_CER', 'administrador de cancerbero'),
(15, 'AdminApuntorium', 'Administrador de Apuntorium a efectos totales'),
(16, 'UsuarioApuntorium', 'Usuario genÃ©rico para apuntorium en su registro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol_Fun`
--

CREATE TABLE IF NOT EXISTS `Rol_Fun` (
  `rol_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Rol_Fun`
--

INSERT INTO `Rol_Fun` (`rol_id`, `fun_id`) VALUES
(12, 22),
(12, 24),
(12, 25),
(13, 23),
(13, 24),
(14, 18),
(16, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Titulacion`
--

CREATE TABLE IF NOT EXISTS `Titulacion` (
`tit_id` int(11) NOT NULL,
  `tit_name` varchar(18) COLLATE utf16_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Titulacion_Usuario`
--

CREATE TABLE IF NOT EXISTS `Titulacion_Usuario` (
  `tit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Fun`
--

CREATE TABLE IF NOT EXISTS `User_Fun` (
  `user_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Pag`
--

CREATE TABLE IF NOT EXISTS `User_Pag` (
  `user_id` int(11) NOT NULL,
  `pag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `User_Pag`
--

INSERT INTO `User_Pag` (`user_id`, `pag_id`) VALUES
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Rol`
--

CREATE TABLE IF NOT EXISTS `User_Rol` (
  `user_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `User_Rol`
--

INSERT INTO `User_Rol` (`user_id`, `rol_id`) VALUES
(10, 12),
(21, 13),
(21, 14),
(21, 15),
(22, 16),
(23, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_pass` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_email` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de usuarios';

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`user_id`, `user_name`, `user_pass`, `user_desc`, `user_email`) VALUES
(21, 'Admin', 'admin', 'administrador general', 'admin@admin.com'),
(10, 'pepe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'usuario sin permisos administrativos', 'pepe@wpawpa.com'),
(22, 'UsuarioTest', 'test', '', 'test@test.test'),
(23, 'user2', 'user', '', 'user@user.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `U_Tiene_A`
--

CREATE TABLE IF NOT EXISTS `U_Tiene_A` (
  `apunte_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administra`
--
ALTER TABLE `Administra`
 ADD PRIMARY KEY (`user_id`,`mat_id`);

--
-- Indices de la tabla `Apunte`
--
ALTER TABLE `Apunte`
 ADD PRIMARY KEY (`apunte_id`);

--
-- Indices de la tabla `Comparte_Nota`
--
ALTER TABLE `Comparte_Nota`
 ADD PRIMARY KEY (`nota_id`,`user_id`);

--
-- Indices de la tabla `Funcionalidad`
--
ALTER TABLE `Funcionalidad`
 ADD PRIMARY KEY (`fun_id`);

--
-- Indices de la tabla `Materia`
--
ALTER TABLE `Materia`
 ADD PRIMARY KEY (`mat_id`);

--
-- Indices de la tabla `Materia_Usuario`
--
ALTER TABLE `Materia_Usuario`
 ADD PRIMARY KEY (`mat_id`,`user_id`);

--
-- Indices de la tabla `Nota`
--
ALTER TABLE `Nota`
 ADD PRIMARY KEY (`nota_id`), ADD KEY `nota_id` (`nota_id`);

--
-- Indices de la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
 ADD PRIMARY KEY (`notificacion_id`);

--
-- Indices de la tabla `Pagina`
--
ALTER TABLE `Pagina`
 ADD PRIMARY KEY (`pag_id`);

--
-- Indices de la tabla `Pag_Fun`
--
ALTER TABLE `Pag_Fun`
 ADD PRIMARY KEY (`pag_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
 ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `Rol_Fun`
--
ALTER TABLE `Rol_Fun`
 ADD PRIMARY KEY (`rol_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

--
-- Indices de la tabla `Titulacion`
--
ALTER TABLE `Titulacion`
 ADD PRIMARY KEY (`tit_id`);

--
-- Indices de la tabla `Titulacion_Usuario`
--
ALTER TABLE `Titulacion_Usuario`
 ADD PRIMARY KEY (`tit_id`,`user_id`);

--
-- Indices de la tabla `User_Fun`
--
ALTER TABLE `User_Fun`
 ADD PRIMARY KEY (`user_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

--
-- Indices de la tabla `User_Pag`
--
ALTER TABLE `User_Pag`
 ADD PRIMARY KEY (`user_id`,`pag_id`), ADD KEY `pag_id` (`pag_id`);

--
-- Indices de la tabla `User_Rol`
--
ALTER TABLE `User_Rol`
 ADD PRIMARY KEY (`user_id`,`rol_id`), ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indices de la tabla `U_Tiene_A`
--
ALTER TABLE `U_Tiene_A`
 ADD PRIMARY KEY (`apunte_id`,`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Apunte`
--
ALTER TABLE `Apunte`
MODIFY `apunte_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Funcionalidad`
--
ALTER TABLE `Funcionalidad`
MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `Materia`
--
ALTER TABLE `Materia`
MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Nota`
--
ALTER TABLE `Nota`
MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
MODIFY `notificacion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pagina`
--
ALTER TABLE `Pagina`
MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `Titulacion`
--
ALTER TABLE `Titulacion`
MODIFY `tit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
