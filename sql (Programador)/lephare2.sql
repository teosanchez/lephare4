-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2012 a las 09:31:18
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lephare2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) NOT NULL,
  `id_medico` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `comentarios` varchar(140) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Citas_Pacientes` (`id_paciente`),
  KEY `fk_Citas_Medicos1` (`id_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `id_paciente`, `id_medico`, `fecha`, `hora`, `comentarios`) VALUES
(1, 4, 3, '2011-11-10', '00:00:12', '2222'),
(2, 3, 3, '2011-12-10', '00:00:12', '2222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `apellidos`, `telefono`) VALUES
(3, 'Médico1', 'gomez garcia', '009-009'),
(4, 'Juan', 'Madrid Montero', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_padre` bigint(20) DEFAULT NULL,
  `enlace` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `texto` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `id_padre`, `enlace`, `texto`) VALUES
(1, 0, 'index.php?cuerpo=rejilla_citas.php', 'citas'),
(2, 0, 'index.php?cuerpo=rejilla_medicos.php', 'medicos'),
(3, 0, 'index.php?cuerpo=rejilla_menu.php', 'menu'),
(4, 0, 'index.php?cuerpo=rejilla_pacientes.php', 'pacientes'),
(5, 0, 'index.php?cuerpo=rejilla_t_enfermedades.php', 'enfermedades'),
(6, 0, 'index.php?cuerpo=rejilla_visita_enfermedad.php', 'visita_enfermedad'),
(7, 0, 'index.php?cuerpo=rejilla_visitas.php', 'visitas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_carnet` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_madre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `barrio` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `distancia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellidos`, `numero_carnet`, `fecha_nacimiento`, `sexo`, `nombre_madre`, `telefono`, `barrio`, `distancia`) VALUES
(2, 'Don Manolo', 'Apellidos', '123455', '2002-01-01', 'M', 'zsfdzsdf', '1234', '4444', 49999090),
(3, 'Sevilla', 'lopez perez', '', '2000-09-09', '', '', '', '', 0),
(4, 'Nombre', 'Madrid Montero', '', '0000-00-00', '', 'zsfdzsdf lo', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_enfermedades`
--

DROP TABLE IF EXISTS `t_enfermedades`;
CREATE TABLE IF NOT EXISTS `t_enfermedades` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `enfermedad` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `t_enfermedades`
--

INSERT INTO `t_enfermedades` (`id`, `enfermedad`) VALUES
(2, 'Gripe Sola'),
(3, 'asefasfe'),
(4, 'sergsvsdg'),
(5, 'sredgaert'),
(7, 'gripe'),
(8, 'gripe'),
(9, 'gripe'),
(11, 'gripe'),
(12, 'gripe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

DROP TABLE IF EXISTS `visitas`;
CREATE TABLE IF NOT EXISTS `visitas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_paciente` bigint(20) NOT NULL,
  `id_medico` bigint(20) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `tarifa_consulta` float DEFAULT NULL,
  `tarifa_diabetes` float DEFAULT NULL,
  `tarifa_medicamentos` float DEFAULT NULL,
  `diagnostico` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `medicamentos` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Visitas_Pacientes1` (`id_paciente`),
  KEY `fk_Visitas_Medicos1` (`id_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `id_paciente`, `id_medico`, `fecha`, `tarifa_consulta`, `tarifa_diabetes`, `tarifa_medicamentos`, `diagnostico`, `medicamentos`) VALUES
(1, 4, 3, '2011-01-09 00:00:00', 1, 12, 123, '1234', '12345'),
(2, 2, 3, '2011-12-10 00:00:00', 1, 1, 1, '2121212', '2121212'),
(3, 3, 4, '2008-12-12 00:00:00', 1, 2, 22, 'kokokok', 'huhuh'),
(4, 4, 4, '2011-12-10 00:00:00', 3001, 2001, 22001, 'kokokok', 'huhuh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_enfermedad`
--

DROP TABLE IF EXISTS `visita_enfermedad`;
CREATE TABLE IF NOT EXISTS `visita_enfermedad` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_visita` bigint(20) NOT NULL,
  `id_enfermedad` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Visita_Enfermedad_Visitas1` (`id_visita`),
  KEY `fk_Visita_Enfermedad_t_Enfermedades1` (`id_enfermedad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `visita_enfermedad`
--

INSERT INTO `visita_enfermedad` (`id`, `id_visita`, `id_enfermedad`) VALUES
(6, 1, 3),
(7, 1, 4),
(18, 2, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_citas_medico`
--
DROP VIEW IF EXISTS `vw_citas_medico`;
CREATE TABLE IF NOT EXISTS `vw_citas_medico` (
`id_medico` bigint(20)
,`fecha` date
,`visitas` bigint(21)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_referencias_tabla`
--
DROP VIEW IF EXISTS `vw_referencias_tabla`;
CREATE TABLE IF NOT EXISTS `vw_referencias_tabla` (
`tabla` varchar(64)
,`nombre_fk` varchar(64)
,`columna` varchar(64)
,`tabla_referenciada` varchar(64)
,`CONSTRAINT_TYPE` varchar(64)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_rejilla_citas`
--
DROP VIEW IF EXISTS `vw_rejilla_citas`;
CREATE TABLE IF NOT EXISTS `vw_rejilla_citas` (
`id` bigint(20)
,`Fecha` date
,`Hora` time
,`Comentarios` varchar(140)
,`Medico` varchar(148)
,`Paciente` varchar(148)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_rejilla_visitas`
--
DROP VIEW IF EXISTS `vw_rejilla_visitas`;
CREATE TABLE IF NOT EXISTS `vw_rejilla_visitas` (
`id` bigint(20)
,`Medico` varchar(148)
,`Paciente` varchar(148)
,`Fecha` datetime
,`tarifa_consulta` float
,`tarifa_diabetes` float
,`tarifa_medicamentos` float
,`Diagnostico` varchar(150)
,`Medicamentos` varchar(150)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_visita_enfermedades`
--
DROP VIEW IF EXISTS `vw_visita_enfermedades`;
CREATE TABLE IF NOT EXISTS `vw_visita_enfermedades` (
`id_visita` bigint(20)
,`id` bigint(20)
,`enfermedad` varchar(45)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vw_citas_medico`
--
DROP TABLE IF EXISTS `vw_citas_medico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_citas_medico` AS select `citas`.`id_medico` AS `id_medico`,`citas`.`fecha` AS `fecha`,count(0) AS `visitas` from `citas` group by `citas`.`id_medico`,`citas`.`fecha`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_referencias_tabla`
--
DROP TABLE IF EXISTS `vw_referencias_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_referencias_tabla` AS select distinct `tc`.`TABLE_NAME` AS `tabla`,`kcu`.`CONSTRAINT_NAME` AS `nombre_fk`,`kcu`.`COLUMN_NAME` AS `columna`,`kcu`.`REFERENCED_TABLE_NAME` AS `tabla_referenciada`,`tc`.`CONSTRAINT_TYPE` AS `CONSTRAINT_TYPE` from (`information_schema`.`key_column_usage` `kcu` join `information_schema`.`table_constraints` `tc` on((`kcu`.`TABLE_NAME` = `tc`.`TABLE_NAME`))) where ((`kcu`.`CONSTRAINT_SCHEMA` = 'lephare') and (`tc`.`CONSTRAINT_TYPE` = 'FOREIGN KEY') and (`kcu`.`REFERENCED_TABLE_NAME` is not null));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_rejilla_citas`
--
DROP TABLE IF EXISTS `vw_rejilla_citas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rejilla_citas` AS select `citas`.`id` AS `id`,`citas`.`fecha` AS `Fecha`,`citas`.`hora` AS `Hora`,`citas`.`comentarios` AS `Comentarios`,concat(`medicos`.`apellidos`,',  ',`medicos`.`nombre`) AS `Medico`,concat(`pacientes`.`apellidos`,',  ',`pacientes`.`nombre`) AS `Paciente` from ((`citas` join `pacientes` on((`citas`.`id_paciente` = `pacientes`.`id`))) join `medicos` on((`citas`.`id_medico` = `medicos`.`id`))) order by `citas`.`fecha`,`citas`.`hora`,concat(`medicos`.`apellidos`,',  ',`medicos`.`nombre`),concat(`pacientes`.`apellidos`,',  ',`pacientes`.`nombre`);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_rejilla_visitas`
--
DROP TABLE IF EXISTS `vw_rejilla_visitas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rejilla_visitas` AS select `visitas`.`id` AS `id`,concat(`medicos`.`apellidos`,',  ',`medicos`.`nombre`) AS `Medico`,concat(`pacientes`.`apellidos`,',  ',`pacientes`.`nombre`) AS `Paciente`,`visitas`.`fecha` AS `Fecha`,`visitas`.`tarifa_consulta` AS `tarifa_consulta`,`visitas`.`tarifa_diabetes` AS `tarifa_diabetes`,`visitas`.`tarifa_medicamentos` AS `tarifa_medicamentos`,`visitas`.`diagnostico` AS `Diagnostico`,`visitas`.`medicamentos` AS `Medicamentos` from ((`visitas` join `pacientes` on((`visitas`.`id_paciente` = `pacientes`.`id`))) join `medicos` on((`visitas`.`id_medico` = `medicos`.`id`))) order by `visitas`.`fecha`,concat(`medicos`.`apellidos`,',  ',`medicos`.`nombre`),concat(`pacientes`.`apellidos`,',  ',`pacientes`.`nombre`);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_visita_enfermedades`
--
DROP TABLE IF EXISTS `vw_visita_enfermedades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_visita_enfermedades` AS select `visita_enfermedad`.`id_visita` AS `id_visita`,`t_enfermedades`.`id` AS `id`,`t_enfermedades`.`enfermedad` AS `enfermedad` from (`t_enfermedades` left join `visita_enfermedad` on((`visita_enfermedad`.`id_enfermedad` = `t_enfermedades`.`id`)));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_Citas_Medicos1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Citas_Pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `fk_Visitas_Medicos1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Visitas_Pacientes1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `visita_enfermedad`
--
ALTER TABLE `visita_enfermedad`
  ADD CONSTRAINT `fk_Visita_Enfermedad_t_Enfermedades1` FOREIGN KEY (`id_enfermedad`) REFERENCES `t_enfermedades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Visita_Enfermedad_Visitas1` FOREIGN KEY (`id_visita`) REFERENCES `visitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
