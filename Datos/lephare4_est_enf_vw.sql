-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-02-2012 a las 07:34:50
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lephare3`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_edad_paciente_nom_mes_visita_enfermedad`
--
CREATE TABLE IF NOT EXISTS `vw_edad_paciente_nom_mes_visita_enfermedad` (
`Enfermedad` varchar(45)
,`Año` int(4)
,`Num_Mes` int(2)
,`Mes` varchar(20)
,`Sexo` char(1)
,`0a1` decimal(23,0)
,`2a4` decimal(23,0)
,`5a14` decimal(23,0)
,`Resto` decimal(23,0)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_edad_paciente_num_mes_visita_enfermedad`
--
CREATE TABLE IF NOT EXISTS `vw_edad_paciente_num_mes_visita_enfermedad` (
`Enfermedad` varchar(45)
,`Anno` int(4)
,`Num_Mes` int(2)
,`Sexo` char(1)
,`0_1` decimal(23,0)
,`2_4` decimal(23,0)
,`5_14` decimal(23,0)
,`Resto` decimal(23,0)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_edad_paciente_visita`
--
CREATE TABLE IF NOT EXISTS `vw_edad_paciente_visita` (
`id_paciente` bigint(20)
,`sexo` char(1)
,`edad` int(9)
,`id_visita` bigint(20)
,`fecha_visita` datetime
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_edad_paciente_visita_enfermedad`
--
CREATE TABLE IF NOT EXISTS `vw_edad_paciente_visita_enfermedad` (
`Sexo` char(1)
,`Edad` int(9)
,`Fecha Visita` datetime
,`Enfermedad` varchar(45)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_edad_paciente_visita_id_enfermedad`
--
CREATE TABLE IF NOT EXISTS `vw_edad_paciente_visita_id_enfermedad` (
`sexo` char(1)
,`edad` int(9)
,`fecha_visita` datetime
,`id_enfermedad` bigint(20)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_lista_annos`
--
CREATE TABLE IF NOT EXISTS `vw_lista_annos` (
`Año` int(4)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_porc_total_consultas_por_edad`
--
CREATE TABLE IF NOT EXISTS `vw_porc_total_consultas_por_edad` (
`Año` int(4)
,`%0a1` decimal(65,4)
,`%2a4` decimal(65,4)
,`%5a14` decimal(65,4)
,`%Resto` decimal(65,4)
,`Total` int(3)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_porc_total_consultas_por_edad_anuales`
--
CREATE TABLE IF NOT EXISTS `vw_porc_total_consultas_por_edad_anuales` (
`Año` int(4)
,`%0a1` decimal(65,4)
,`%2a4` decimal(65,4)
,`%5a14` decimal(65,4)
,`%Resto` decimal(65,4)
,`Total` int(3)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_porc_total_consultas_por_edad_mensuales`
--
CREATE TABLE IF NOT EXISTS `vw_porc_total_consultas_por_edad_mensuales` (
`Año` int(4)
,`Num_Mes` int(2)
,`Mes` varchar(20)
,`%0a1` decimal(65,4)
,`%2a4` decimal(65,4)
,`%5a14` decimal(65,4)
,`%Resto` decimal(65,4)
,`Total` int(3)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_porc_total_consultas_por_enfermedad_y_edad`
--
CREATE TABLE IF NOT EXISTS `vw_porc_total_consultas_por_enfermedad_y_edad` (
`Año` int(4)
,`Num_Mes` int(2)
,`Mes` varchar(20)
,`Enfermedad` varchar(45)
,`Sexo` char(1)
,`%0a1` decimal(52,4)
,`%2a4` decimal(52,4)
,`%5a14` decimal(52,4)
,`%Resto` decimal(52,4)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_total_consultas_por_edad`
--
CREATE TABLE IF NOT EXISTS `vw_total_consultas_por_edad` (
`Año` int(4)
,`Num_Mes` int(2)
,`Mes` varchar(20)
,`0a1` decimal(65,0)
,`2a4` decimal(65,0)
,`5a14` decimal(65,0)
,`Resto` decimal(65,0)
,`Total` decimal(65,0)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_total_consultas_por_enfermedad_y_edad`
--
CREATE TABLE IF NOT EXISTS `vw_total_consultas_por_enfermedad_y_edad` (
`Enfermedad` varchar(45)
,`Año` int(4)
,`Num_Mes` int(2)
,`Mes` varchar(20)
,`Sexo` char(1)
,`0a1` decimal(45,0)
,`2a4` decimal(45,0)
,`5a14` decimal(45,0)
,`Resto` decimal(45,0)
,`Total` decimal(48,0)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vw_edad_paciente_nom_mes_visita_enfermedad`
--
DROP TABLE IF EXISTS `vw_edad_paciente_nom_mes_visita_enfermedad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_edad_paciente_nom_mes_visita_enfermedad` AS select `vw_edad_paciente_num_mes_visita_enfermedad`.`Enfermedad` AS `Enfermedad`,`vw_edad_paciente_num_mes_visita_enfermedad`.`Anno` AS `Año`,`vw_edad_paciente_num_mes_visita_enfermedad`.`Num_Mes` AS `Num_Mes`,`t_meses`.`nom_mes` AS `Mes`,`vw_edad_paciente_num_mes_visita_enfermedad`.`Sexo` AS `Sexo`,`vw_edad_paciente_num_mes_visita_enfermedad`.`0_1` AS `0a1`,`vw_edad_paciente_num_mes_visita_enfermedad`.`2_4` AS `2a4`,`vw_edad_paciente_num_mes_visita_enfermedad`.`5_14` AS `5a14`,`vw_edad_paciente_num_mes_visita_enfermedad`.`Resto` AS `Resto` from (`vw_edad_paciente_num_mes_visita_enfermedad` join `t_meses` on((`vw_edad_paciente_num_mes_visita_enfermedad`.`Num_Mes` = `t_meses`.`id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_edad_paciente_num_mes_visita_enfermedad`
--
DROP TABLE IF EXISTS `vw_edad_paciente_num_mes_visita_enfermedad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_edad_paciente_num_mes_visita_enfermedad` AS select `vw_edad_paciente_visita_enfermedad`.`Enfermedad` AS `Enfermedad`,year(`vw_edad_paciente_visita_enfermedad`.`Fecha Visita`) AS `Anno`,month(`vw_edad_paciente_visita_enfermedad`.`Fecha Visita`) AS `Num_Mes`,`vw_edad_paciente_visita_enfermedad`.`Sexo` AS `Sexo`,sum(if((`vw_edad_paciente_visita_enfermedad`.`Edad` <= 1),1,0)) AS `0_1`,sum(if(((`vw_edad_paciente_visita_enfermedad`.`Edad` > 1) and (`vw_edad_paciente_visita_enfermedad`.`Edad` <= 4)),1,0)) AS `2_4`,sum(if(((`vw_edad_paciente_visita_enfermedad`.`Edad` > 4) and (`vw_edad_paciente_visita_enfermedad`.`Edad` <= 14)),1,0)) AS `5_14`,sum(if((`vw_edad_paciente_visita_enfermedad`.`Edad` > 14),1,0)) AS `Resto` from `vw_edad_paciente_visita_enfermedad` group by `vw_edad_paciente_visita_enfermedad`.`Enfermedad`,`vw_edad_paciente_visita_enfermedad`.`Sexo`,year(`vw_edad_paciente_visita_enfermedad`.`Fecha Visita`),month(`vw_edad_paciente_visita_enfermedad`.`Fecha Visita`) order by year(`vw_edad_paciente_visita_enfermedad`.`Fecha Visita`),month(`vw_edad_paciente_visita_enfermedad`.`Fecha Visita`),`vw_edad_paciente_visita_enfermedad`.`Enfermedad`,`vw_edad_paciente_visita_enfermedad`.`Sexo`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_edad_paciente_visita`
--
DROP TABLE IF EXISTS `vw_edad_paciente_visita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_edad_paciente_visita` AS select `pacientes`.`id` AS `id_paciente`,`pacientes`.`sexo` AS `sexo`,floor(((to_days(`visitas`.`fecha`) - to_days(`pacientes`.`fecha_nacimiento`)) / 365)) AS `edad`,`visitas`.`id` AS `id_visita`,`visitas`.`fecha` AS `fecha_visita` from (`pacientes` join `visitas` on((`pacientes`.`id` = `visitas`.`id_paciente`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_edad_paciente_visita_enfermedad`
--
DROP TABLE IF EXISTS `vw_edad_paciente_visita_enfermedad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_edad_paciente_visita_enfermedad` AS select `vw_2`.`sexo` AS `Sexo`,`vw_2`.`edad` AS `Edad`,`vw_2`.`fecha_visita` AS `Fecha Visita`,`t_enfermedades`.`enfermedad` AS `Enfermedad` from (`vw_edad_paciente_visita_id_enfermedad` `vw_2` join `t_enfermedades` on((`vw_2`.`id_enfermedad` = `t_enfermedades`.`id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_edad_paciente_visita_id_enfermedad`
--
DROP TABLE IF EXISTS `vw_edad_paciente_visita_id_enfermedad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_edad_paciente_visita_id_enfermedad` AS select `vw_1`.`sexo` AS `sexo`,`vw_1`.`edad` AS `edad`,`vw_1`.`fecha_visita` AS `fecha_visita`,`visita_enfermedad`.`id_enfermedad` AS `id_enfermedad` from (`vw_edad_paciente_visita` `vw_1` join `visita_enfermedad` on((`vw_1`.`id_visita` = `visita_enfermedad`.`id_visita`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_lista_annos`
--
DROP TABLE IF EXISTS `vw_lista_annos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lista_annos` AS select distinct `vw_edad_paciente_num_mes_visita_enfermedad`.`Anno` AS `Año` from `vw_edad_paciente_num_mes_visita_enfermedad` where ((`vw_edad_paciente_num_mes_visita_enfermedad`.`Anno` is not null) and (`vw_edad_paciente_num_mes_visita_enfermedad`.`Anno` <> '0')) order by `vw_edad_paciente_num_mes_visita_enfermedad`.`Anno` desc;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_porc_total_consultas_por_edad`
--
DROP TABLE IF EXISTS `vw_porc_total_consultas_por_edad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_porc_total_consultas_por_edad` AS select `vw_total_consultas_por_edad`.`Año` AS `Año`,((`vw_total_consultas_por_edad`.`0a1` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%0a1`,((`vw_total_consultas_por_edad`.`2a4` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%2a4`,((`vw_total_consultas_por_edad`.`5a14` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%5a14`,((`vw_total_consultas_por_edad`.`Resto` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%Resto`,100 AS `Total` from `vw_total_consultas_por_edad` group by `vw_total_consultas_por_edad`.`Año` order by `vw_total_consultas_por_edad`.`Año`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_porc_total_consultas_por_edad_anuales`
--
DROP TABLE IF EXISTS `vw_porc_total_consultas_por_edad_anuales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_porc_total_consultas_por_edad_anuales` AS select `vw_total_consultas_por_edad`.`Año` AS `Año`,((`vw_total_consultas_por_edad`.`0a1` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%0a1`,((`vw_total_consultas_por_edad`.`2a4` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%2a4`,((`vw_total_consultas_por_edad`.`5a14` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%5a14`,((`vw_total_consultas_por_edad`.`Resto` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%Resto`,100 AS `Total` from `vw_total_consultas_por_edad` group by `vw_total_consultas_por_edad`.`Año` order by `vw_total_consultas_por_edad`.`Año`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_porc_total_consultas_por_edad_mensuales`
--
DROP TABLE IF EXISTS `vw_porc_total_consultas_por_edad_mensuales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_porc_total_consultas_por_edad_mensuales` AS select `vw_total_consultas_por_edad`.`Año` AS `Año`,`vw_total_consultas_por_edad`.`Num_Mes` AS `Num_Mes`,`vw_total_consultas_por_edad`.`Mes` AS `Mes`,((`vw_total_consultas_por_edad`.`0a1` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%0a1`,((`vw_total_consultas_por_edad`.`2a4` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%2a4`,((`vw_total_consultas_por_edad`.`5a14` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%5a14`,((`vw_total_consultas_por_edad`.`Resto` * 100) / `vw_total_consultas_por_edad`.`Total`) AS `%Resto`,100 AS `Total` from `vw_total_consultas_por_edad` group by `vw_total_consultas_por_edad`.`Año`,`vw_total_consultas_por_edad`.`Num_Mes` order by `vw_total_consultas_por_edad`.`Año`,`vw_total_consultas_por_edad`.`Num_Mes`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_porc_total_consultas_por_enfermedad_y_edad`
--
DROP TABLE IF EXISTS `vw_porc_total_consultas_por_enfermedad_y_edad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_porc_total_consultas_por_enfermedad_y_edad` AS select `vw_total_consultas_por_enfermedad_y_edad`.`Año` AS `Año`,`vw_total_consultas_por_enfermedad_y_edad`.`Num_Mes` AS `Num_Mes`,`vw_total_consultas_por_enfermedad_y_edad`.`Mes` AS `Mes`,`vw_total_consultas_por_enfermedad_y_edad`.`Enfermedad` AS `Enfermedad`,`vw_total_consultas_por_enfermedad_y_edad`.`Sexo` AS `Sexo`,((`vw_total_consultas_por_enfermedad_y_edad`.`0a1` * 100) / `vw_total_consultas_por_enfermedad_y_edad`.`Total`) AS `%0a1`,((`vw_total_consultas_por_enfermedad_y_edad`.`2a4` * 100) / `vw_total_consultas_por_enfermedad_y_edad`.`Total`) AS `%2a4`,((`vw_total_consultas_por_enfermedad_y_edad`.`5a14` * 100) / `vw_total_consultas_por_enfermedad_y_edad`.`Total`) AS `%5a14`,((`vw_total_consultas_por_enfermedad_y_edad`.`Resto` * 100) / `vw_total_consultas_por_enfermedad_y_edad`.`Total`) AS `%Resto` from `vw_total_consultas_por_enfermedad_y_edad` group by `vw_total_consultas_por_enfermedad_y_edad`.`Enfermedad` order by `vw_total_consultas_por_enfermedad_y_edad`.`Año`,`vw_total_consultas_por_enfermedad_y_edad`.`Num_Mes`,`vw_total_consultas_por_enfermedad_y_edad`.`Enfermedad`,`vw_total_consultas_por_enfermedad_y_edad`.`Sexo`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_total_consultas_por_edad`
--
DROP TABLE IF EXISTS `vw_total_consultas_por_edad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_total_consultas_por_edad` AS select `vw_total_consultas_por_enfermedad_y_edad`.`Año` AS `Año`,`vw_total_consultas_por_enfermedad_y_edad`.`Num_Mes` AS `Num_Mes`,`vw_total_consultas_por_enfermedad_y_edad`.`Mes` AS `Mes`,sum(`vw_total_consultas_por_enfermedad_y_edad`.`0a1`) AS `0a1`,sum(`vw_total_consultas_por_enfermedad_y_edad`.`2a4`) AS `2a4`,sum(`vw_total_consultas_por_enfermedad_y_edad`.`5a14`) AS `5a14`,sum(`vw_total_consultas_por_enfermedad_y_edad`.`Resto`) AS `Resto`,(((sum(`vw_total_consultas_por_enfermedad_y_edad`.`0a1`) + sum(`vw_total_consultas_por_enfermedad_y_edad`.`2a4`)) + sum(`vw_total_consultas_por_enfermedad_y_edad`.`5a14`)) + sum(`vw_total_consultas_por_enfermedad_y_edad`.`Resto`)) AS `Total` from `vw_total_consultas_por_enfermedad_y_edad` group by `vw_total_consultas_por_enfermedad_y_edad`.`Año`,`vw_total_consultas_por_enfermedad_y_edad`.`Num_Mes` order by `vw_total_consultas_por_enfermedad_y_edad`.`Año`,`vw_total_consultas_por_enfermedad_y_edad`.`Num_Mes`,`vw_total_consultas_por_enfermedad_y_edad`.`Sexo`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_total_consultas_por_enfermedad_y_edad`
--
DROP TABLE IF EXISTS `vw_total_consultas_por_enfermedad_y_edad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_total_consultas_por_enfermedad_y_edad` AS select `vw_edad_paciente_nom_mes_visita_enfermedad`.`Enfermedad` AS `Enfermedad`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Año` AS `Año`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Num_Mes` AS `Num_Mes`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Mes` AS `Mes`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Sexo` AS `Sexo`,sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`0a1`) AS `0a1`,sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`2a4`) AS `2a4`,sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`5a14`) AS `5a14`,sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`Resto`) AS `Resto`,(((sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`0a1`) + sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`2a4`)) + sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`5a14`)) + sum(`vw_edad_paciente_nom_mes_visita_enfermedad`.`Resto`)) AS `Total` from `vw_edad_paciente_nom_mes_visita_enfermedad` group by `vw_edad_paciente_nom_mes_visita_enfermedad`.`Enfermedad` order by `vw_edad_paciente_nom_mes_visita_enfermedad`.`Año`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Num_Mes`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Enfermedad`,`vw_edad_paciente_nom_mes_visita_enfermedad`.`Sexo`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
