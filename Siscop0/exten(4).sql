-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2013 a las 19:41:58
-- Versión del servidor: 5.5.16-log
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `exten`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aactivos`
--

CREATE TABLE IF NOT EXISTS `aactivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `navance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `aactivos`
--

INSERT INTO `aactivos` (`id`, `nsocio`, `navance`) VALUES
(1, 1, 1),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ainactivos`
--

CREATE TABLE IF NOT EXISTS `ainactivos` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `navance` int(11) NOT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `ainactivos`
--

INSERT INTO `ainactivos` (`id_a`, `nsocio`, `navance`) VALUES
(4, 2, 2),
(6, 3, 2),
(8, 4, 2),
(16, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `ip` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `evento` varchar(100) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=303 ;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `fecha`, `ip`, `usuario`, `evento`, `detalle`) VALUES
(11, '2012-11-17 06:11:24', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(12, '2012-11-17 07:11:17', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 4'),
(67, '2012-11-18 12:11:49', '127.0.0.1', '5', 'lostro', 'EliminÃ³ el Socio N: 2'),
(68, '2012-11-18 12:11:06', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 3'),
(69, '2012-11-18 12:11:41', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 1'),
(70, '2012-11-18 12:11:59', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 2'),
(71, '2012-11-18 12:11:21', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 3'),
(72, '2012-11-19 06:11:49', '127.0.0.1', 'alemax', '1', 'Autenticacion Fallida'),
(73, '2012-11-19 06:11:26', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(74, '2012-11-19 06:11:25', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 3'),
(75, '2012-11-21 04:11:49', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(76, '2012-11-21 04:11:10', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 3'),
(77, '2012-11-25 05:11:04', '192.168.1.103', 'lostro', '2', 'Autenticacion Correcta'),
(78, '2012-11-25 06:11:47', '192.168.1.103', 'lostro', '5', 'EliminÃ³ el Socio N: '),
(79, '2012-11-25 07:11:58', '192.168.1.103', 'lostro', '7', 'Registro de Avance N: 1'),
(80, '2012-11-25 08:11:14', '127.0.0.1', 'lostro', '8', 'Registro de pago Socio N: 0'),
(81, '2012-11-25 08:11:12', '127.0.0.1', 'lostro', '8', 'Registro de pago Socio N: 0'),
(82, '2012-11-28 01:11:49', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(83, '2012-11-28 02:11:26', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 4'),
(84, '2012-11-28 02:11:24', '127.0.0.1', 'lostro', '5', 'Registro de Socio N: 5'),
(85, '2013-01-12 06:01:48', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(86, '2013-01-13 04:01:46', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(87, '2013-01-13 07:01:27', '127.0.0.1', 'lostro', '7', 'Registro de PFR Socio N: 1, Placa Carro: 08AA3DD'),
(88, '2013-01-13 07:01:55', '127.0.0.1', 'lostro', '8', 'Registro de pago Socio N: 2'),
(89, '2013-01-13 07:01:41', '127.0.0.1', 'lostro', '8', 'Registro de pago Socio N: 1'),
(90, '2013-01-13 08:01:58', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: 2'),
(91, '2013-01-14 03:01:58', '127.0.0.1', '', '7', 'Registro de Multa Socio N: '),
(92, '2013-01-14 03:01:44', '127.0.0.1', '', '7', 'Registro de Multa Socio N: 4'),
(93, '2013-01-14 03:01:11', '127.0.0.1', 'lostro', '7', 'Registro de Multa Socio N: 4'),
(94, '2013-01-14 03:01:58', '127.0.0.1', 'lostro', '7', 'Registro de Multa Socio N: 3'),
(125, '2013-01-16 06:01:36', '127.0.0.1', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(126, '2013-01-16 07:01:50', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(127, '2013-01-16 07:01:40', '127.0.0.1', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(128, '2013-01-17 06:01:14', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(129, '2013-01-17 06:01:38', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(130, '2013-01-19 11:01:44', '192.168.1.104', 'lostro', '2', 'Autenticacion Correcta'),
(131, '2013-01-19 11:01:35', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(132, '2013-01-19 11:01:10', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: '),
(133, '2013-01-19 11:01:29', '192.168.1.104', 'lostro', '8', 'Registro de Prestamo Socio N: 1'),
(134, '2013-01-19 11:01:47', '192.168.1.104', 'lostro', '8', 'Registro de Prestamo Socio N: 2'),
(135, '2013-01-19 11:01:19', '192.168.1.104', 'lostro', '8', 'Registro de Prestamo Socio N: 1'),
(136, '2013-01-19 12:01:20', '192.168.1.104', 'lostro', '8', 'Registro de Prestamo Socio N: 1'),
(137, '2013-01-19 12:01:11', '192.168.1.104', 'lostro', '8', 'Registro de Prestamo Socio N: 1'),
(138, '2013-01-19 12:01:41', '192.168.1.104', 'lostro', '8', 'Registro de Prestamo Socio N: 4'),
(139, '2013-01-19 12:01:25', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(140, '2013-01-23 05:01:32', '127.0.0.1', 'jefryd', '2', 'Autenticacion Correcta'),
(141, '2013-01-23 05:01:52', '127.0.0.1', 'jefryd', '1.1', 'Actualizo Socio N: 3'),
(142, '2013-01-23 05:01:19', '127.0.0.1', 'jefryd', '1.1', 'Actualizo Socio N: 1'),
(143, '2013-01-23 05:01:07', '127.0.0.1', 'jefryd', '3.1', 'Actualizo Vehiculo de socio N: '),
(144, '2013-01-23 06:01:30', '127.0.0.1', 'jefryd', '4', 'Registro de PFR Socio N: 0, Placa Carro: '),
(145, '2013-01-23 06:01:53', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(146, '2013-01-23 07:01:48', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 0, Placa Carro: '),
(147, '2013-01-23 07:01:25', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: '),
(148, '2013-01-23 07:01:06', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 0, Placa Carro: '),
(149, '2013-01-23 07:01:18', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 3, Placa Carro: 2626265'),
(150, '2013-01-23 07:01:45', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: '),
(151, '2013-01-23 07:01:57', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 0, Placa Carro: '),
(152, '2013-01-23 07:01:21', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: '),
(153, '2013-01-23 08:01:07', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 0, Placa Carro: '),
(154, '2013-01-23 08:01:19', '127.0.0.1', 'lostro', '1.1', 'Actualizo permiso del Socio N: '),
(155, '2013-01-23 08:01:59', '127.0.0.1', 'lostro', '1.1', 'Actualizo permiso del Socio N: '),
(156, '2013-01-23 08:01:28', '127.0.0.1', 'lostro', '1.1', 'Actualizo permiso del Socio N: '),
(157, '2013-01-23 08:01:20', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 0, Placa Carro: '),
(158, '2013-01-23 08:01:56', '127.0.0.1', 'lostro', '1.1', 'Actualizo permiso del Socio N: '),
(159, '2013-01-23 08:01:47', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: 0'),
(160, '2013-01-27 06:01:02', '127.0.0.1', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(161, '2013-01-27 06:01:42', '127.0.0.1', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(162, '2013-01-27 06:01:49', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(163, '2013-01-28 10:01:40', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(164, '2013-01-28 12:01:08', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 2'),
(165, '2013-01-28 02:01:43', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(166, '2013-01-28 02:01:13', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 2'),
(167, '2013-01-28 06:01:29', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(168, '2013-01-28 06:01:57', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: Seleccione'),
(169, '2013-01-28 06:01:37', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(170, '2013-01-28 07:01:38', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(171, '2013-01-28 08:01:59', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(172, '2013-01-28 08:01:01', '127.0.0.1', 'lostro', '0.1', 'Actualizo usuario: lostro'),
(173, '2013-01-28 08:01:19', '127.0.0.1', 'lostro', '0.1', 'Actualizo usuario: lostro'),
(174, '2013-01-28 08:01:28', '127.0.0.1', 'lostro', '0.1', 'Actualizo usuario: lostro'),
(175, '2013-01-28 08:01:26', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(176, '2013-01-28 10:01:19', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(177, '2013-01-29 08:01:42', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(178, '2013-01-29 09:01:17', '127.0.0.1', 'lostro', '0.1', 'Actualizo usuario: lostro'),
(179, '2013-01-29 09:01:48', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(180, '2013-01-29 10:01:30', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 6'),
(181, '2013-01-29 10:01:17', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 6'),
(182, '2013-01-29 10:01:45', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(183, '2013-01-29 10:01:28', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 5'),
(184, '2013-01-29 10:01:27', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 3'),
(185, '2013-01-29 11:01:13', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: '),
(186, '2013-01-29 11:01:45', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 3'),
(187, '2013-01-29 11:01:25', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: '),
(188, '2013-01-29 11:01:17', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 2'),
(189, '2013-01-29 11:01:08', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(190, '2013-01-29 12:01:04', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 4'),
(191, '2013-01-29 12:01:39', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 3'),
(192, '2013-01-29 12:01:04', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(193, '2013-01-29 12:01:12', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 2'),
(194, '2013-01-29 12:01:45', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(195, '0000-00-00 00:00:00', '', '', '', ''),
(196, '2013-01-29 01:01:51', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 2'),
(197, '2013-01-29 01:01:17', '190.169.175.9', 'lostro', '2', 'Autenticacion Correcta'),
(198, '2013-01-29 02:01:32', '127.0.0.1', 'asdas', '1', 'Autenticacion Fallida'),
(199, '2013-01-29 02:01:03', '127.0.0.1', 'asdas', '1', 'Autenticacion Fallida'),
(200, '2013-01-29 02:01:13', '127.0.0.1', 'asdas', '1', 'Autenticacion Fallida'),
(201, '2013-01-29 02:01:06', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(202, '2013-01-29 03:01:32', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(203, '2013-01-29 03:01:39', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(204, '2013-01-29 03:01:43', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(205, '2013-01-29 03:01:37', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(206, '2013-01-29 03:01:48', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(207, '2013-01-29 03:01:45', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(208, '2013-01-29 03:01:39', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 1, Placa Carro: MAE94A'),
(209, '2013-01-29 03:01:38', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 1, Placa Carro: MAE94A'),
(210, '2013-01-29 03:01:54', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 1, Placa Carro: MAE94A'),
(211, '2013-01-29 05:01:33', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(212, '2013-01-29 06:01:51', '127.0.0.1', 'lostro', '1.1', 'Actualizo Socio N: 1'),
(213, '2013-01-29 06:01:16', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(214, '2013-01-29 06:01:08', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: 1'),
(215, '2013-01-30 09:01:16', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el Socio N: undefined'),
(216, '2013-01-30 10:01:06', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(217, '2013-01-30 10:01:59', '127.0.0.1', 'lostro', '3', 'Registro de Vehiculo Socio N: 3, Placa Carro: AAD54456'),
(218, '2013-01-30 10:01:02', '127.0.0.1', 'lostro', '4', 'Registro de PFR Socio N: 1, Placa Carro: MAE94A'),
(219, '2013-01-30 10:01:26', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: 1'),
(220, '2013-01-30 12:01:50', '190.169.175.3', 'lostro', '2', 'Autenticacion Correcta'),
(221, '2013-01-30 12:01:16', '190.169.175.3', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(222, '2013-01-30 12:01:42', '190.169.175.3', 'lostro', '1', 'Autenticacion Fallida'),
(223, '2013-01-30 12:01:02', '190.169.175.3', 'lostro', '2', 'Autenticacion Correcta'),
(224, '2013-01-30 12:01:54', '190.169.175.3', 'alemax', '2', 'Autenticacion Correcta'),
(225, '2013-01-30 01:01:44', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(226, '2013-01-30 01:01:17', '190.169.175.3', 'lostro', '2', 'Autenticacion Correcta'),
(227, '2013-01-30 01:01:03', '190.169.175.3', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(228, '2013-01-30 01:01:22', '190.169.175.3', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(229, '2013-01-30 01:01:25', '127.0.0.1', 'lostro', '10', 'Cierre de mes por Usuario: lostro'),
(230, '2013-01-28 01:01:26', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 1'),
(231, '2013-01-28 01:01:44', '127.0.0.1', 'lostro', '1', 'Registro de Socio N: 1'),
(232, '2013-01-30 01:01:13', '127.0.0.1', 'lostro', '6', 'Registro de pago Socio N: 1'),
(233, '2013-01-30 01:01:29', '127.0.0.1', 'lostro', '6', 'Registro de pago Socio N: 1 Avance  N: '),
(234, '2013-01-30 01:01:00', '127.0.0.1', 'lostro', '6', 'Registro de pago Socio N: 1 Avance  N: '),
(235, '2013-01-30 02:01:59', '190.169.175.3', 'alemax', '1', 'Autenticacion Fallida'),
(236, '2013-01-30 02:01:19', '190.169.175.3', 'alemax', '2', 'Autenticacion Correcta'),
(237, '2013-01-30 02:01:09', '190.169.175.3', 'c', '5', 'EliminÃ³ el Socio N: undefined'),
(238, '2013-01-30 02:01:32', '127.0.0.1', 'lostro', '7', 'Registro de Multa Socio N: 1'),
(239, '2013-01-30 02:01:48', '190.169.175.3', 'lostro', '2', 'Autenticacion Correcta'),
(240, '2013-01-30 02:01:18', '190.169.175.3', 'lostro', '1', 'Autenticacion Fallida'),
(241, '2013-01-30 02:01:33', '190.169.175.3', 'alemax', '2', 'Autenticacion Correcta'),
(242, '2013-01-30 02:01:48', '127.0.0.1', 'lostro', '7', 'Registro de Multa Socio N: 1'),
(243, '2013-01-30 03:01:39', '127.0.0.1', '', '7', 'Registro pago de multa socio N: '),
(244, '2013-01-30 03:01:58', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(245, '2013-01-30 03:01:34', '127.0.0.1', 'lostro', '7', 'Registro pago de multa socio N: 2'),
(246, '2013-01-30 03:01:30', '127.0.0.1', 'lostro', '7', 'Registro pago de multa socio N: 2'),
(247, '2013-01-30 07:01:34', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(248, '2013-02-03 11:02:35', '127.0.0.1', 'lostro', '2', 'Registro de Avance N: 10 de Socio N: 2'),
(249, '2013-02-03 11:02:59', '127.0.0.1', 'lostro', '2', 'Registro de Avance N: 1 de Socio N: 2'),
(250, '2013-02-03 12:02:51', '127.0.0.1', 'lostro', '2.1', 'Actualizo Avance N: 2 de Socio N:1'),
(252, '2013-02-03 01:02:08', '127.0.0.1', 'lostro', '6', 'EliminÃ³ el Avance N: 2 de socio N: 1 '),
(254, '2013-02-03 03:02:51', '127.0.0.1', 'lostro', '3.1', 'Actualizo Vehiculo de socio N: 1'),
(255, '2013-02-03 03:02:22', '127.0.0.1', 'lostro', '3.1', 'Actualizo Vehiculo de socio N: 3'),
(257, '2013-02-03 03:02:14', '127.0.0.1', 'lostro', '3.1', 'Actualizo Vehiculo de socio N: 1'),
(258, '2013-02-03 03:02:41', '127.0.0.1', 'lostro', '3.1', 'Actualizo Vehiculo de socio N: 1'),
(259, '2013-02-03 03:02:04', '127.0.0.1', 'lostro', '3.1', 'Actualizo Vehiculo de socio N: 1'),
(260, '2013-02-03 04:02:17', '127.0.0.1', 'lostro', '3.1', 'Actualizo Vehiculo de socio N: 1'),
(261, '2013-02-03 05:02:23', '127.0.0.1', 'lostro', '4.2', 'EliminÃ³ el Vehiculo Socio N: 3  Placa N:AAD54456'),
(267, '2013-02-03 05:02:26', '127.0.0.1', 'lostro', '1.1', 'Actualizo permiso del Socio N: 3'),
(269, '2013-02-03 05:02:36', '127.0.0.1', 'lostro', '5', 'EliminÃ³ el permiso del Socio N: 1'),
(270, '2013-02-03 07:02:22', '127.0.0.1', 'lostro', '7', 'Registro pago de multa socio N: 1'),
(271, '2013-02-03 07:02:17', '127.0.0.1', 'lostro', '7', 'Registro pago de multa socio N: 2'),
(272, '2013-02-03 07:02:19', '127.0.0.1', 'lostro', '7', 'Registro pago de multa socio N: 3'),
(273, '2013-02-03 08:02:50', '127.0.0.1', 'lostro', '8', 'Registro de Prestamo Socio N: 1'),
(274, '2013-02-03 09:02:21', '127.0.0.1', 'lostro', '8.1', 'Registro de pago prestamo Socio N: 1'),
(275, '2013-02-03 09:02:56', '127.0.0.1', 'lostro', '8', 'Registro de Prestamo Socio N: 2'),
(276, '2013-02-03 09:02:48', '127.0.0.1', 'lostro', '8.1', 'Registro de pago prestamo Socio N: 2'),
(277, '2013-02-03 09:02:49', '127.0.0.1', 'lostro', '8.1', 'Registro de pago prestamo Socio N: 2'),
(278, '2013-02-03 09:02:32', '127.0.0.1', 'lostro', '8.1', 'Registro de pago prestamo Socio N: 1'),
(279, '2013-02-03 09:02:04', '127.0.0.1', 'lostro', '8', 'Registro de Prestamo Socio N: 1'),
(280, '2013-02-03 09:02:35', '127.0.0.1', 'lostro', '8', 'Registro de Prestamo Socio N: 3, exp N='),
(281, '2013-02-03 10:02:51', '127.0.0.1', 'lostro', '8', 'Registro de Prestamo Socio N: 2, exp N=0417'),
(282, '2013-02-03 10:02:49', '127.0.0.1', 'lostro', '8.2', 'EliminÃ³ el permiso del Socio N: 2 '),
(283, '2013-02-03 10:02:59', '127.0.0.1', 'lostro', '2.1', 'Actualizo Avance N: 1 de Socio N:2'),
(284, '2013-02-03 11:02:20', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: 2'),
(285, '2013-02-03 11:02:13', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: S1'),
(286, '2013-02-03 11:02:15', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: S1A1'),
(287, '2013-02-03 11:02:15', '127.0.0.1', 'lostro', '8.2', 'EliminÃ³ el permiso del Socio N: S1A1 '),
(288, '2013-02-03 11:02:52', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: S1'),
(289, '2013-02-03 11:02:32', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: S1'),
(290, '2013-02-03 11:02:03', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: S2A1'),
(291, '2013-02-03 11:02:25', '127.0.0.1', 'lostro', '8.2', 'EliminÃ³ el pago del Socio N: S2A1 '),
(292, '2013-02-03 11:02:45', '127.0.0.1', 'lostro', '7', 'Registro pago de multa socio N: 2'),
(293, '2013-02-04 12:02:36', '127.0.0.1', 'lostro', '5', 'Registro de pago Socio N: S2A1'),
(294, '2013-02-04 08:02:46', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(295, '2013-02-04 08:02:36', '190.169.175.9', 'lostro', '2', 'Autenticacion Correcta'),
(296, '2013-02-04 08:02:28', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(297, '2013-02-04 09:02:41', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(298, '2013-02-04 09:02:52', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(299, '2013-02-04 10:02:27', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(300, '2013-02-04 11:02:32', '190.169.175.9', 'lostro', '2', 'Autenticacion Correcta'),
(301, '2013-02-04 11:02:24', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta'),
(302, '2013-02-04 02:02:31', '127.0.0.1', 'lostro', '2', 'Autenticacion Correcta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avances`
--

CREATE TABLE IF NOT EXISTS `avances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navance` int(11) NOT NULL,
  `nsocio` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `venci` varchar(100) NOT NULL,
  `ingreso` varchar(100) NOT NULL,
  `tlf` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `edocivil` varchar(100) NOT NULL,
  `cargafam` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `historia` varchar(150) NOT NULL,
  `contrato` varchar(150) NOT NULL,
  `beneficiario` varchar(100) NOT NULL,
  `nlic` varchar(255) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `vence` date NOT NULL,
  `cuenta` varchar(255) NOT NULL,
  `certmed` varchar(255) NOT NULL,
  `certmedven` date NOT NULL,
  `gruposang` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `avances`
--

INSERT INTO `avances` (`id`, `navance`, `nsocio`, `nombre`, `apellido`, `cedula`, `venci`, `ingreso`, `tlf`, `celular`, `nacimiento`, `nacionalidad`, `sexo`, `edocivil`, `cargafam`, `direccion`, `historia`, `contrato`, `beneficiario`, `nlic`, `grado`, `vence`, `cuenta`, `certmed`, `certmedven`, `gruposang`, `correo`) VALUES
(12, 1, '1', 'Carlos', 'Perez', '18270061', '2012/07/06', '08/10/2000', '0212988626', '0412-657-8329', '0000-00-00', 'V', 'Femenino', 'Casado', '2', 'aaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbb', '0001', 'Nuevo', '3', '3', '0000-00-00', '4565465454', '456', '0000-00-00', 'rh', 'otro@prueba.com'),
(15, 1, '2', 'Williams', 'Gonzalez', '14587856', '2013-02-17', '2013-02-24', '0212-645-2587', '0424-569-8745', '1988-12-11', 'V', 'Masculino', 'Soltero', '3', 'Av Prueba', 'N/A', '0015', 'Hijos', '654564', '2', '2013-02-09', '56464654645', '75646', '2013-02-10', 'O+', 'juan.diaz@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE IF NOT EXISTS `gastos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `socioavance` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `expediente`, `fecha`, `monto`, `referencia`, `socioavance`) VALUES
(3, 11, '2013-01-10', '2500', 'Prestamo Rines', '2'),
(4, 217, '2013-02-05', '1500', 'Prestamo Rines', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hmultas`
--

CREATE TABLE IF NOT EXISTS `hmultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(50) NOT NULL,
  `pago` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `hmultas`
--

INSERT INTO `hmultas` (`id`, `nsocio`, `expediente`, `fecha`, `monto`, `pago`) VALUES
(1, 2, 8, '2013-01-10', '3000', '3000'),
(2, 1, 9, '2013-01-10', '2000', ''),
(3, 2, 10, '2013-02-13', '2500', '3'),
(4, 3, 12, '2013-02-05', '3500', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hsociosavances`
--

CREATE TABLE IF NOT EXISTS `hsociosavances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navance` varchar(15) NOT NULL,
  `nsocio` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `venci` varchar(100) NOT NULL,
  `ingreso` varchar(100) NOT NULL,
  `tlf` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `edocivil` varchar(100) NOT NULL,
  `cargafam` varchar(100) NOT NULL,
  `contrato` varchar(150) NOT NULL,
  `ruta` varchar(150) NOT NULL,
  `beneficiario` varchar(100) NOT NULL,
  `nlic` varchar(255) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `vence` date NOT NULL,
  `cuenta` varchar(255) NOT NULL,
  `certmed` varchar(255) NOT NULL,
  `certmedven` date NOT NULL,
  `gruposang` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `historia` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE IF NOT EXISTS `ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(100) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `socioavance` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `expediente`, `fecha`, `monto`, `referencia`, `socioavance`) VALUES
(19, 219, '2013-02-03', '190.80', 'Finanza', 'S2A1'),
(22, 110, '2013-02-03', '5100', 'Finan', 'S1'),
(25, 225, '2013-02-03', '2500', 'Pago multa socio N:2, Exp :011', '2'),
(26, 211, '2013-02-04', '190.80', 'otro', 'S2A1'),
(27, 227, '2013-01-03', '1500', 'Pago multa socio N:2, Exp :011', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mpagos`
--

CREATE TABLE IF NOT EXISTS `mpagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montoc` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `mpagos`
--

INSERT INTO `mpagos` (`id`, `montoc`, `fecha`) VALUES
(14, '5100', '2013-01-00'),
(15, '2500', '2013-02-00'),
(16, '4200', '2013-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mpagosa`
--

CREATE TABLE IF NOT EXISTS `mpagosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mpagosa`
--

INSERT INTO `mpagosa` (`id`, `monto`, `mes`, `ano`) VALUES
(2, 250, 7, 2013);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mprestamos`
--

CREATE TABLE IF NOT EXISTS `mprestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `montomi` int(11) NOT NULL,
  `montoma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `mprestamos`
--

INSERT INTO `mprestamos` (`id`, `id_tp`, `montomi`, `montoma`) VALUES
(1, 1, 600, 25000),
(2, 2, 500, 20000),
(3, 3, 10000, 30000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE IF NOT EXISTS `multas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` varchar(100) NOT NULL,
  `nsocio` varchar(15) NOT NULL,
  `nombresocio` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechap` date NOT NULL,
  `monto` varchar(100) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`id`, `expediente`, `nsocio`, `nombresocio`, `fecha`, `fechap`, `monto`, `observacion`, `estado`) VALUES
(11, '011', '2', 'Luis', '2013-02-20', '2013-02-03', '2500', 'por no cumplir ruta', 'Pagado'),
(13, '013', '2', 'Pedro', '2013-02-20', '0000-00-00', '2500', 'por no cumplir ruta', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoavances`
--

CREATE TABLE IF NOT EXISTS `pagoavances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navance` varchar(15) NOT NULL,
  `nombres` text NOT NULL,
  `apellido` text NOT NULL,
  `cedula` int(11) NOT NULL,
  `deposito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `banco` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `concepto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pagoavances`
--

INSERT INTO `pagoavances` (`id`, `navance`, `nombres`, `apellido`, `cedula`, `deposito`, `fecha`, `banco`, `monto`, `concepto`) VALUES
(1, 'S2A1', 'Williams', 'Gonzalez', 14587856, 11112222, '2013-02-03', 'Mercantil', '190.80', 'Finanza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosocios`
--

CREATE TABLE IF NOT EXISTS `pagosocios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente` int(11) NOT NULL,
  `nsocio` varchar(15) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `cedula` int(11) NOT NULL,
  `deposito` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `banco` text NOT NULL,
  `monto` varchar(100) NOT NULL,
  `concepto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `pagosocios`
--

INSERT INTO `pagosocios` (`id`, `expediente`, `nsocio`, `nombres`, `apellidos`, `cedula`, `deposito`, `fecha`, `banco`, `monto`, `concepto`) VALUES
(10, 110, 'S2', 'Alemaxxx', 'Cordova', 18270061, 1254587, '2013-01-13', 'c_mercantil', '390', 'Fina'),
(16, 116, 'S1', 'Carlos', 'Castillo', 18270061, 1254785, '2013-02-03', 'c_mercantil', '5100', 'Prueba'),
(21, 211, 'S2A1', 'Williams', 'Gonzalez', 14587856, 1254785, '2013-02-04', 'Mercantil', '190.80', 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` varchar(15) NOT NULL,
  `nombresocio` varchar(100) NOT NULL,
  `cedulasocio` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `avance1` varchar(100) NOT NULL,
  `nombreavanp` varchar(100) NOT NULL,
  `cedulaavanp` varchar(100) NOT NULL,
  `avance2` varchar(100) NOT NULL,
  `nombreavans` varchar(100) NOT NULL,
  `cedulaavans` varchar(100) NOT NULL,
  `dirige` varchar(150) NOT NULL,
  `placa` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ano` date NOT NULL,
  `cantidadptos` varchar(100) NOT NULL,
  `linea` text NOT NULL,
  `motor` varchar(100) NOT NULL,
  `chasis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nsocio`, `nombresocio`, `cedulasocio`, `fecha`, `fechaini`, `fechafin`, `avance1`, `nombreavanp`, `cedulaavanp`, `avance2`, `nombreavans`, `cedulaavans`, `dirige`, `placa`, `marca`, `modelo`, `color`, `ano`, `cantidadptos`, `linea`, `motor`, `chasis`) VALUES
(9, '3', 'jefryd', '1111', '2013-02-03', '2013-02-17', '2013-02-14', '12', 'jef', '18994002', '', '', '', 'Las Rocas', '2626265', 'ENCAVA', 'ENT-615', 'ROJO', '0000-00-00', '32', '', '45646848484', '8XL6GC11DAE005036'),
(25, '1', 'Luis', '18270061', '2013-01-30', '2013-01-25', '2013-01-16', '2', 'Angel', '15236541', '', '', '', 'Los roques', 'MAE94A', 'ENCAVA', 'ENT-610  ', 'BLANCO', '2013-01-03', '32', '', '439184         ', '8XL6GC11DAE005036     ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` varchar(15) NOT NULL,
  `expediente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `fechap` date NOT NULL,
  `monto` varchar(100) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `nsocio`, `expediente`, `nombre`, `apellido`, `cedula`, `fecha`, `fechap`, `monto`, `concepto`, `estado`) VALUES
(2, '1', 42, 'Carlos', 'Perez', '18270061', '2012-01-01', '0000-00-00', '61000', 'Por cauchos', 'Pendiente'),
(3, '1', 43, 'Carlos', 'Perez', '18270061', '2012-01-10', '2013-02-03', '1256', 'Por motor', 'Pagado'),
(4, '2', 44, 'Alemaxxx', 'Cordova', '18270061', '2013-01-01', '0000-00-00', '8000', 'Por Caja mala', 'Pendiente'),
(5, '1', 45, 'Carlos', 'Perez', '18270061', '2012-02-10', '0000-00-00', '1000', 'Por motor', 'Pendiente'),
(6, '1', 46, 'Carlos', 'Perez', '18270061', '2012-02-10', '0000-00-00', '1200', 'Por motor', 'Pendiente'),
(7, '1', 47, 'Carlos', 'Perez', '18270061', '2012-02-16', '0000-00-00', '1300', 'arreglo de caja', 'Pendiente'),
(13, '1', 413, 'Carlos', 'Castillo', '18270061', '2013-02-15', '0000-00-00', '15000', 'Caja', 'Pendiente'),
(16, '3', 0, 'Luis', 'Alvarez', '11589975', '2013-02-23', '0000-00-00', '2580', 'cauchos', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sactivos`
--

CREATE TABLE IF NOT EXISTS `sactivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(11) NOT NULL,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sactivos`
--

INSERT INTO `sactivos` (`id`, `nsocio`, `nombre`) VALUES
(2, 2, 'Alexander'),
(3, 3, 'Alexander'),
(4, 1, 'Alexander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sinactivos`
--

CREATE TABLE IF NOT EXISTS `sinactivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Volcado de datos para la tabla `sinactivos`
--

INSERT INTO `sinactivos` (`id`, `nsocio`, `nombre`) VALUES
(5, 7, ''),
(6, 8, ''),
(7, 9, ''),
(9, 11, ''),
(10, 12, ''),
(11, 13, ''),
(12, 14, ''),
(13, 15, ''),
(14, 16, ''),
(15, 17, ''),
(16, 18, ''),
(17, 19, ''),
(18, 20, ''),
(19, 21, ''),
(20, 22, ''),
(21, 23, ''),
(22, 24, ''),
(23, 25, ''),
(24, 26, ''),
(25, 27, ''),
(26, 28, ''),
(27, 28, ''),
(28, 29, ''),
(29, 30, ''),
(30, 31, ''),
(31, 32, ''),
(32, 33, ''),
(33, 34, ''),
(34, 35, ''),
(35, 36, ''),
(36, 37, ''),
(37, 38, ''),
(38, 39, ''),
(39, 40, ''),
(40, 41, ''),
(41, 42, ''),
(42, 43, ''),
(43, 44, ''),
(44, 45, ''),
(45, 46, ''),
(46, 47, ''),
(47, 48, ''),
(48, 49, ''),
(49, 50, ''),
(50, 51, ''),
(51, 52, ''),
(52, 53, ''),
(53, 54, ''),
(54, 55, ''),
(55, 56, ''),
(56, 57, ''),
(57, 58, ''),
(58, 59, ''),
(59, 60, ''),
(60, 61, ''),
(61, 62, ''),
(62, 63, ''),
(63, 64, ''),
(64, 65, ''),
(65, 66, ''),
(66, 67, ''),
(67, 68, ''),
(68, 69, ''),
(69, 70, ''),
(70, 71, ''),
(71, 72, ''),
(72, 73, ''),
(73, 74, ''),
(74, 75, ''),
(75, 76, ''),
(76, 77, ''),
(77, 78, ''),
(78, 79, ''),
(79, 80, ''),
(80, 81, ''),
(81, 82, ''),
(82, 83, ''),
(83, 84, ''),
(84, 85, ''),
(85, 86, ''),
(86, 87, ''),
(87, 88, ''),
(88, 89, ''),
(89, 90, ''),
(90, 91, ''),
(91, 92, ''),
(92, 93, ''),
(93, 94, ''),
(94, 95, ''),
(95, 96, ''),
(96, 97, ''),
(97, 98, ''),
(98, 99, ''),
(106, 10, ''),
(107, 100, ''),
(108, 101, ''),
(109, 6, 'Juan'),
(111, 5, 'Carlos'),
(116, 4, ''),
(125, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE IF NOT EXISTS `socios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nsocio` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `venci` date NOT NULL,
  `ingreso` date NOT NULL,
  `tlf` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `edocivil` varchar(100) NOT NULL,
  `cargafam` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `historia` varchar(150) NOT NULL,
  `contrato` varchar(150) NOT NULL,
  `beneficiario` varchar(100) NOT NULL,
  `nlic` varchar(100) NOT NULL,
  `grado` varchar(100) NOT NULL,
  `vence` date NOT NULL,
  `cuenta` varchar(100) NOT NULL,
  `certmed` varchar(100) NOT NULL,
  `certmedven` date NOT NULL,
  `gruposang` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nsocio`, `nombre`, `apellido`, `cedula`, `venci`, `ingreso`, `tlf`, `celular`, `nacimiento`, `nacionalidad`, `sexo`, `edocivil`, `cargafam`, `direccion`, `historia`, `contrato`, `beneficiario`, `nlic`, `grado`, `vence`, `cuenta`, `certmed`, `certmedven`, `gruposang`, `correo`) VALUES
(1, '1', 'Carlos', 'Castillo', '18270061', '2013-01-09', '2013-01-10', '54654654', '4565464', '2013-01-10', 'V', 'Masculino', 'Casado', '5', 'Edif. Biblioteca Central piso 5', 'N/A', '001', 'Hijos', '46545646', '3', '2013-01-09', '401011800998', '55as56as', '2013-01-17', 'O+', 'ccastilloucv@gmail.com'),
(2, '2', 'Alexander', 'Canizalez', '11589975', '2013-01-02', '2013-01-17', '02126547896', '04265897589', '2013-01-10', 'V', 'Masculino', 'Soltero', '5', 'UCV', 'anterior s51', '0054', 'Hijos', '45656', '5', '2013-01-02', '402050300000', '56456456', '2013-01-02', 'O+', 'calexander74@hotmail.com'),
(3, '3', 'Luis', 'Alvarez', '11589975', '2013-01-02', '2013-01-17', '02126547896', '04265897589', '2013-01-10', 'V', 'Masculino', 'Soltero', '5', 'UCV', 'anterior s51', '0054', 'Hijos', '45656', '5', '2013-01-02', '402050300000', '56456456', '2013-01-02', 'O+', 'calexander74@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprestamo`
--

CREATE TABLE IF NOT EXISTS `tprestamo` (
  `id_tp` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tprestamo`
--

INSERT INTO `tprestamo` (`id_tp`, `nombre`) VALUES
(1, 'Motor-Gasoil'),
(2, 'Motor-Gasolina'),
(3, 'Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE latin1_general_ci,
  `apellido` text COLLATE latin1_general_ci,
  `login` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `privilegio` enum('ADMINISTRADOR','CARGADOR') COLLATE latin1_general_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=73 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `login`, `password`, `email`, `privilegio`) VALUES
(72, 'carlos', 'castillo', 'lostro', 'f55ab0ca399e1356a65a23458291d27e', 'ccastillo@gmail.com', 'ADMINISTRADOR'),
(69, 'jefryd', 'rojas', 'jefryd', 'e10adc3949ba59abbe56e057f20f883e', 'rojaslion31@hotmail.com', 'ADMINISTRADOR'),
(71, 'alejandro', 'maltin', 'alemax', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', 'CARGADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `nsocio` varchar(15) NOT NULL,
  `placa` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `ano` date NOT NULL,
  `cantptos` varchar(100) NOT NULL,
  `nmotor` varchar(100) NOT NULL,
  `chasis` varchar(100) NOT NULL,
  `combustible` varchar(100) NOT NULL,
  `ruta` int(11) NOT NULL,
  `cobdesde` date NOT NULL,
  `cobhasta` date NOT NULL,
  `compaseg` varchar(100) NOT NULL,
  `tseguro` varchar(50) NOT NULL,
  `obs` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `nombre`, `apellido`, `cedula`, `nsocio`, `placa`, `marca`, `modelo`, `color`, `ano`, `cantptos`, `nmotor`, `chasis`, `combustible`, `ruta`, `cobdesde`, `cobhasta`, `compaseg`, `tseguro`, `obs`, `estado`) VALUES
(3, 'Carlos', 'Cordova', '18270061', '1', 'MAE94A', 'ENCAVA', 'ENT-610  ', 'BLANCO', '2013-01-03', '32', '439184         ', '8XL6GC11DAE005036     ', 'Gasoil', 1, '2013-01-01', '2013-01-31', 'Qualitas', 'Casco', 'ninguna', 'Servicio'),
(6, 'Carlos', 'Cordova', '18270061', '2', 'AAU78AS', 'CHEVROLET', 'ENT-610  ', 'BLANCO', '2013-01-03', '32', '439184         ', '8XL6GC11DAE005036     ', 'Gasoil', 3, '2013-01-01', '2013-01-31', 'Multinacional', 'TodoRiesgo', 'ninguna', 'Inactivo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
