SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



CREATE DATABASE IF NOT EXISTS `GSTRDB` DEFAULT CHARACTER SET utf16 COLLATE utf16_spanish2_ci;
USE `GSTRDB`;

GRANT USAGE ON *.* TO 'AdminGSTR'@'localhost' IDENTIFIED BY PASSWORD '*E7AF0B3ED69A0E3C7E24AF8AF559A9DF40A7FFA9';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON `GSTRDB`.* TO 'AdminGSTR'@'localhost';

GRANT ALL PRIVILEGES ON `gstrdb`.* TO 'AdminGSTR'@'localhost' WITH GRANT OPTION;

DROP TABLE IF EXISTS `Funcionalidad`;
CREATE TABLE IF NOT EXISTS `Funcionalidad` (
`fun_id` int(11) NOT NULL,
  `fun_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `fun_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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

DROP TABLE IF EXISTS `Pag_Fun`;
CREATE TABLE IF NOT EXISTS `Pag_Fun` (
  `pag_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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

DROP TABLE IF EXISTS `Pagina`;
CREATE TABLE IF NOT EXISTS `Pagina` (
`pag_id` int(11) NOT NULL,
  `pag_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `pag_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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

DROP TABLE IF EXISTS `Rol`;
CREATE TABLE IF NOT EXISTS `Rol` (
`rol_id` int(11) NOT NULL,
  `rol_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `rol_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `Rol` (`rol_id`, `rol_name`, `rol_desc`) VALUES
(13, 'Administrador_WPA', 'administrador de WPA'),
(12, 'Usuario_normal', 'usuario '),
(14, 'Administrador_CER', 'administrador de cancerbero');

DROP TABLE IF EXISTS `Rol_Fun`;
CREATE TABLE IF NOT EXISTS `Rol_Fun` (
  `rol_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `Rol_Fun` (`rol_id`, `fun_id`) VALUES
(12, 22),
(12, 24),
(12, 25),
(13, 23),
(13, 24),
(14, 18);

DROP TABLE IF EXISTS `User_Fun`;
CREATE TABLE IF NOT EXISTS `User_Fun` (
  `user_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

DROP TABLE IF EXISTS `User_Pag`;
CREATE TABLE IF NOT EXISTS `User_Pag` (
  `user_id` int(11) NOT NULL,
  `pag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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

DROP TABLE IF EXISTS `User_Rol`;
CREATE TABLE IF NOT EXISTS `User_Rol` (
  `user_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `User_Rol` (`user_id`, `rol_id`) VALUES
(10, 12),
(21, 13),
(21, 14);

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_pass` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_desc` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `user_email` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de usuarios';

INSERT INTO `Usuario` (`user_id`, `user_name`, `user_pass`, `user_desc`, `user_email`) VALUES
(21, 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrador general', 'admin@admin.com'),
(10, 'pepe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'usuario sin permisos administrativos', 'pepe@wpawpa.com');


ALTER TABLE `Funcionalidad`
 ADD PRIMARY KEY (`fun_id`);

ALTER TABLE `Pag_Fun`
 ADD PRIMARY KEY (`pag_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

ALTER TABLE `Pagina`
 ADD PRIMARY KEY (`pag_id`);

ALTER TABLE `Rol`
 ADD PRIMARY KEY (`rol_id`);

ALTER TABLE `Rol_Fun`
 ADD PRIMARY KEY (`rol_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

ALTER TABLE `User_Fun`
 ADD PRIMARY KEY (`user_id`,`fun_id`), ADD KEY `fun_id` (`fun_id`);

ALTER TABLE `User_Pag`
 ADD PRIMARY KEY (`user_id`,`pag_id`), ADD KEY `pag_id` (`pag_id`);

ALTER TABLE `User_Rol`
 ADD PRIMARY KEY (`user_id`,`rol_id`), ADD KEY `rol_id` (`rol_id`);

ALTER TABLE `Usuario`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`);


ALTER TABLE `Funcionalidad`
MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
ALTER TABLE `Pagina`
MODIFY `pag_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
ALTER TABLE `Rol`
MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
ALTER TABLE `Usuario`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
