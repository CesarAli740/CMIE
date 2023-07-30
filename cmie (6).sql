-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2023 a las 22:46:43
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cmie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones`
--

CREATE TABLE `dimensiones` (
  `id` int(11) NOT NULL,
  `dimension` text DEFAULT NULL,
  `ponderacion` decimal(5,2) DEFAULT NULL,
  `c27` decimal(5,2) DEFAULT NULL,
  `c28` decimal(5,2) DEFAULT NULL,
  `c29` decimal(5,2) DEFAULT NULL,
  `c30` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dimensiones`
--

INSERT INTO `dimensiones` (`id`, `dimension`, `ponderacion`, `c27`, `c28`, `c29`, `c30`) VALUES
(1, 'Comandante', '0.16', NULL, NULL, NULL, NULL),
(2, '2do Comandante', '0.15', NULL, NULL, NULL, NULL),
(3, 'Personal', '0.13', '50.49', '50.00', NULL, '25.00'),
(4, 'Inteligencia', '0.10', NULL, NULL, NULL, NULL),
(5, 'Operaciones', '0.13', '47.50', NULL, NULL, NULL),
(6, 'Logistica', '0.13', NULL, NULL, NULL, NULL),
(7, 'Accion Civica', '0.10', NULL, NULL, NULL, NULL),
(8, 'Derecho Humanos', '0.10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nota` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id`, `nombre`, `nota`) VALUES
(1, 'DIV-1.', NULL),
(10, 'DIV-2.', NULL),
(11, 'DIV-3.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mision`
--

CREATE TABLE `mision` (
  `id` int(11) NOT NULL,
  `misioneunid` text NOT NULL,
  `misionffaa` text NOT NULL,
  `misionejer` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mision`
--

INSERT INTO `mision` (`id`, `misioneunid`, `misionffaa`, `misionejer`, `fecha`) VALUES
(1, ' DEFENDER Y CONSERVAR LA INDEPENDENCIA SEGURIDAD Y ESTABILIDAD DEL ESTADO, SU HONOR Y LA SOBERANIADEL PAIS;ASEGURAR EL IMPERIO DE LA CONSTITUCION . GARANTIZAR LA ESTABILIDAD DEL GOBIERNO LEGALMENTE CONSTITUIDO Y PARTICIPAR EN EL DESARROLLO INTEGRAL DEL PAÍS', ' ', 'DEFENDER Y CONSERVAR LA INDEPENDENCIA SEGURIDAD Y ESTABILIDAD DEL ESTADO, SU HONOR Y LA SOBERANIADEL PAIS;ASEGURAR EL IMPERIO DE LA CONSTITUCION . GARANTIZAR LA ESTABILIDAD DEL GOBIERNO LEGALMENTE CONSTITUIDO Y PARTICIPAR EN EL DESARROLLO INTEGRAL DEL PAÍS', '2023-04-20 19:48:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_factores`
--

CREATE TABLE `notas_factores` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `c27` decimal(5,2) DEFAULT NULL,
  `c28` decimal(5,2) DEFAULT NULL,
  `c29` decimal(5,2) DEFAULT NULL,
  `c30` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notas_factores`
--

INSERT INTO `notas_factores` (`id`, `nombre`, `tipo`, `c27`, `c28`, `c29`, `c30`) VALUES
(28, 'Mantenimiento de los efectivos', 3, '57.50', '75.00', NULL, '25.00'),
(29, 'Administración de personal', 3, '61.11', NULL, NULL, NULL),
(30, 'Mantenimiento de la disciplina ley y orden ', 3, '58.33', NULL, NULL, NULL),
(31, 'Incremento de la moral', 3, '25.00', '25.00', NULL, NULL),
(32, 'Administración del Puesto Comando', 3, NULL, NULL, NULL, NULL),
(33, 'Diversos', 3, NULL, NULL, NULL, NULL),
(34, 'Inteligencia', 4, NULL, NULL, NULL, NULL),
(35, 'Contra inteligencia', 4, NULL, NULL, NULL, NULL),
(36, 'Operaciones psicológicas', 4, NULL, NULL, NULL, NULL),
(37, 'Enemigo / Amenaza', 4, NULL, NULL, NULL, NULL),
(38, 'Terreno', 4, NULL, NULL, NULL, NULL),
(39, 'Condiciones meteorológicas ', 4, NULL, NULL, NULL, NULL),
(40, 'Oficial de seguridad', 4, NULL, NULL, NULL, NULL),
(41, 'Organización', 5, '47.50', NULL, NULL, NULL),
(42, 'Instrucción', 5, NULL, NULL, NULL, NULL),
(43, 'Operación', 5, NULL, NULL, NULL, NULL),
(44, 'Datos', 6, NULL, NULL, NULL, NULL),
(45, 'Evacuación y hospitalización', 6, NULL, NULL, NULL, NULL),
(46, 'Transportes', 6, NULL, NULL, NULL, NULL),
(47, 'Material bélico', 6, NULL, NULL, NULL, NULL),
(48, 'Activos para desastres naturales', 6, NULL, NULL, NULL, NULL),
(49, 'Activos para operaciones militares', 6, NULL, NULL, NULL, NULL),
(50, 'Gobierno militar', 7, NULL, NULL, NULL, NULL),
(51, 'Economía', 7, NULL, NULL, NULL, NULL),
(52, 'Servicios públicos', 7, NULL, NULL, NULL, NULL),
(53, 'Servicios públicos esenciales', 7, NULL, NULL, NULL, NULL),
(54, 'Aspectos de derechos humanos', 8, NULL, NULL, NULL, NULL),
(55, 'Etica', 1, NULL, NULL, NULL, NULL),
(56, 'Liderazgo', 1, NULL, NULL, NULL, NULL),
(57, 'Mando', 1, NULL, NULL, NULL, NULL),
(58, 'Control', 1, NULL, NULL, NULL, NULL),
(59, 'Supervision', 1, NULL, NULL, NULL, NULL),
(60, 'Etica', 2, NULL, NULL, NULL, NULL),
(61, 'Liderazgo', 2, NULL, NULL, NULL, NULL),
(62, 'Mando', 2, NULL, NULL, NULL, NULL),
(63, 'Control', 2, NULL, NULL, NULL, NULL),
(64, 'Supervision', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_finales`
--

CREATE TABLE `notas_finales` (
  `id` int(11) NOT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `division` text DEFAULT NULL,
  `personal` int(11) DEFAULT NULL,
  `inteligencia` int(11) DEFAULT NULL,
  `operaciones` int(11) DEFAULT NULL,
  `logistica` int(11) DEFAULT NULL,
  `accion_civica` int(11) DEFAULT NULL,
  `derechos_humanos` int(11) DEFAULT NULL,
  `nota_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notas_finales`
--

INSERT INTO `notas_finales` (`id`, `id_unidad`, `division`, `personal`, `inteligencia`, `operaciones`, `logistica`, `accion_civica`, `derechos_humanos`, `nota_final`) VALUES
(1, 1, NULL, 33, 25, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, NULL, 50, 43, 58, 63, 19, 100, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 75, 'DIV-8.', 54, 57, 75, 67, 81, 50, 64),
(76, 76, 'DIV-8.', 50, 71, 67, 50, 63, 75, 63),
(77, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 78, 'DIV-8.', 54, 54, 50, 54, 44, 25, 47),
(79, 79, 'DIV-8.', 46, 61, 50, 50, 44, 75, 54),
(80, 80, 'DIV-8.', 100, 100, 100, 100, 100, 100, 100),
(81, 81, 'DIV-8.', 100, 100, 100, 50, 50, 100, 83),
(82, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 128, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 129, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 130, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 134, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 138, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 144, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 148, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, NULL, NULL, 25, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Comandante'),
(3, '2do Comandante'),
(4, 'Evaluador Personal'),
(5, 'Evaluador Inteligencia'),
(6, 'Evaluador Operaciones'),
(7, 'Evaluador Logistica'),
(8, 'Evaluador Accion Civica'),
(9, 'Evaluador Derecho Humanos'),
(10, 'JEMGE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subfactor`
--

CREATE TABLE `subfactor` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `c27` decimal(5,2) DEFAULT NULL,
  `c28` decimal(5,2) DEFAULT NULL,
  `c29` decimal(5,2) DEFAULT NULL,
  `c30` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subfactor`
--

INSERT INTO `subfactor` (`id`, `nombre`, `tipo`, `c27`, `c28`, `c29`, `c30`) VALUES
(3, '¿Cuenta con los efectivos al completo establecidos por el Ministerio de Defensa?', 28, '50.00', '75.00', NULL, '25.00'),
(4, '¿Cuenta con el efectivo de personal de Oficiales al completo, según Orden General de Destinos?', 28, '50.00', NULL, NULL, NULL),
(5, '¿Cuenta con el efectivo de personal de Suboficiales y Sargentos al completo, según Orden General de Destinos?', 28, '50.00', NULL, NULL, NULL),
(6, '¿Cuenta con una Banda de Guerra adecuada para su Unidad?', 28, '75.00', NULL, NULL, NULL),
(7, '¿Cuenta con Personal Civil en su Unidad?', 28, '75.00', NULL, NULL, NULL),
(8, '¿Cuenta con el Cuadro actualizado de la situación del personal?', 28, '0.00', NULL, NULL, NULL),
(9, '¿Cuenta con las RR.NN. actualizadas de todo el personal de su Unidad, Personal Militar, Personal Civil, Personal de Soldados y Pre Militares?', 28, '75.00', NULL, NULL, NULL),
(10, 'Grado de comprensión del Concepto Inicial de su Comandante, según su campo de la conducción.', 28, '100.00', NULL, NULL, NULL),
(11, 'Disponibilidad de personal en la Unidad para hacer frente a la amenaza.', 28, '25.00', NULL, NULL, NULL),
(12, 'Porcentaje de personal empleado en los PP.MM.', 28, '75.00', NULL, NULL, NULL),
(13, 'Grado de la efectividad en la administración de personal.', 29, '50.00', NULL, NULL, NULL),
(14, 'Grado de la efectividad del empleo de personal en los diferentes planes.', 29, '50.00', NULL, NULL, NULL),
(15, 'Porcentaje del personal de cuadros que cuentan con vivienda funcional.', 29, '75.00', NULL, NULL, NULL),
(16, 'Porcentaje del personal de cuadros que NO cuentan con vivienda funcional.', 29, '100.00', NULL, NULL, NULL),
(17, 'Porcentaje del personal que cumple otra función al de su especialidad.', 29, '50.00', NULL, NULL, NULL),
(18, 'Porcentaje del personal que cumple más de dos funciones', 29, '25.00', NULL, NULL, NULL),
(19, '¿Cuenta con el Libro de vida de todo el personal de su Unidad?', 29, '100.00', NULL, NULL, NULL),
(20, '¿Realiza coordinaciones con el Oficial de Operaciones y de Logística para la ejecución de operaciones?', 29, '0.00', NULL, NULL, NULL),
(21, '¿Cuenta con el Registro del estado civil del personal de su Unidad y su situación familiar?', 29, '100.00', NULL, NULL, NULL),
(22, 'Porcentaje del personal sancionado en la Unidad.', 30, '50.00', NULL, NULL, NULL),
(23, 'Nivel de incidentes domésticos o agresiones en las familias.', 30, '50.00', NULL, NULL, NULL),
(24, 'Grado de incidencia de casos de violaciones a las normas civiles por parte del personal militar.', 30, '50.00', NULL, NULL, NULL),
(25, 'Porcentaje del personal militar que se encuentran en procesos civiles o militares.', 30, '75.00', NULL, NULL, NULL),
(26, 'Porcentaje del personal militar que se encuentran o se encontraron con Sumarios Informativos Militares.', 30, '75.00', NULL, NULL, NULL),
(27, '¿Cuenta con el cuaderno de registro del personal que falta a lista, desertores y bajas del personal de Soldados?', 30, '50.00', NULL, NULL, NULL),
(28, '¿Cuenta con un registro del Personal de Cuadros sancionado?', 30, NULL, NULL, NULL, NULL),
(29, '¿Cuenta con un libro de registro de Personal de Soldados y Pre Militares sancionados?', 30, NULL, NULL, NULL, NULL),
(30, '¿Realizó cursos Regimentarios concernientes a las diferentes Leyes del Estado?', 30, NULL, NULL, NULL, NULL),
(31, '¿Cuenta con el registro de felicitaciones y sanciones del personal de cuadros?', 31, '25.00', NULL, NULL, NULL),
(32, '¿Cuenta con el registro de encomiendas recibidas por el personal de Soldados?', 31, '25.00', NULL, NULL, NULL),
(33, '¿Cuenta con el registro de Servicios Especiales? (actividades de recreación).', 31, '25.00', '25.00', NULL, NULL),
(34, '¿Cuenta con el registro del Servicio postal?', 31, '25.00', NULL, NULL, NULL),
(35, '¿Cuenta con el registro del Servicio religioso?', 31, '25.00', NULL, NULL, NULL),
(36, '¿Cuenta con el registro de Ascensos?', 31, '25.00', NULL, NULL, NULL),
(37, '¿Cuenta con el registro de Condecoraciones y Distinciones del personal de cuadros y Soldados?', 31, '25.00', NULL, NULL, NULL),
(38, '¿Realizó Cursos Regimentarios para elevar la moral del personal?', 31, '25.00', NULL, NULL, NULL),
(39, '¿Cuenta con el registro de Permisos Comando otorgados al personal de soldados que no son del lugar?', 31, '25.00', NULL, NULL, NULL),
(40, '¿Cuenta con personal del área de inteligencia dentro su organización?', 34, NULL, NULL, '50.00', NULL),
(41, '¿Organizó su Comunidad de Inteligencia dentro su Área de Influencia?', 34, NULL, NULL, '0.00', NULL),
(42, '¿Estableció claramente sus apreciaciones dentro su campo de la conducción?', 34, NULL, NULL, NULL, NULL),
(43, '¿Organizó sus órganos de búsqueda de información con el personal de la Unidad?', 34, NULL, NULL, NULL, NULL),
(44, '¿Cuenta con Planes y Órdenes de búsqueda de información?', 34, NULL, NULL, NULL, NULL),
(45, '¿Cuenta con el Estudio táctico del enemigo, terreno y CC.MM.?', 34, NULL, NULL, NULL, NULL),
(46, '¿Tiene claramente establecido la Preparación de Inteligencia del Campo de Batalla?  (PICB)', 34, NULL, NULL, NULL, NULL),
(47, '¿Cuenta con las Plantillas Situacionales de las posibles amenazas o riesgos dentro su jurisdicción?', 34, NULL, NULL, NULL, NULL),
(48, '¿Cuenta con las Cartas de Situación y de Incidentes del Enemigo, riesgos o amenazas?', 34, NULL, NULL, NULL, NULL),
(49, '¿Cuenta con su Plan de Actividades?', 35, NULL, NULL, NULL, NULL),
(50, '¿Estableció claramente sus apreciaciones dentro su área de responsabilidad?', 35, NULL, NULL, NULL, NULL),
(51, '¿Estableció claramente las medidas de seguridad para negar información al oponente?', 35, NULL, NULL, NULL, NULL),
(52, '¿Cuenta con Planes y medidas de Contra Inteligencia?', 35, NULL, NULL, NULL, NULL),
(53, '¿Estableció claramente las acciones orientadas a prevenir, detectar y posibilitar la neutralización de actividades de grupos o personas que pongan en riesgo, amenacen o atenten contra la seguridad de la Unidad?', 35, NULL, NULL, NULL, NULL),
(54, 'Porcentaje de avance o cumplimiento de su Plan de Actividades.', 35, NULL, NULL, NULL, NULL),
(55, 'Efectividad de sus medidas de seguridad, para negar la información.', 35, NULL, NULL, NULL, NULL),
(56, 'Grado de efectividad de sus Planes y medidas de Contra Inteligencia.', 35, NULL, NULL, NULL, NULL),
(57, 'Grado de coordinación con la Comunidad de Inteligencia.', 35, NULL, NULL, NULL, NULL),
(58, 'Grado de oportunidad de la información para prever acciones o medidas ante la amenaza.', 35, NULL, NULL, NULL, NULL),
(59, '¿Cuenta con una organización adecuada del personal en relación a la magnitud de su Unidad?', 41, '100.00', NULL, NULL, NULL),
(60, '¿Cuenta con PP.MM., bajo su responsabilidad y jurisdicción?', 41, '50.00', NULL, NULL, NULL),
(61, '¿Cuenta con el Registro del Desempeño profesional de los Instructores?', 41, '50.00', NULL, NULL, NULL),
(62, '¿Se encuentra claramente establecido, el Cuadro de Cursos Regimentarios?', 41, '25.00', NULL, NULL, NULL),
(63, '¿Estableció claramente el Programa de Instrucción y entrenamiento militar de la Soldados?', 41, '0.00', NULL, NULL, NULL),
(64, '¿Estableció claramente el Programa de Instrucción y entrenamiento militar de los Pre Militares?', 41, '25.00', NULL, NULL, NULL),
(65, '¿Estableció claramente sus apreciaciones dentro su campo de la conducción?', 41, '50.00', NULL, NULL, NULL),
(66, '¿Realiza coordinaciones con el Oficial de Personal y de Logística para la ejecución de operaciones?', 41, '50.00', NULL, NULL, NULL),
(67, '¿Realiza inspecciones a sus Unidades dependientes para verificar su eficiencia combativa?', 41, '50.00', NULL, NULL, NULL),
(68, '¿Estableció claramente su organización para el combate?', 41, '75.00', NULL, NULL, NULL),
(69, '¿Cuenta con una organización adecuada del personal en relación a sus Unidades?', 42, NULL, NULL, NULL, NULL),
(70, 'Grado de formación de los Sofs. y Sgtos', 42, NULL, NULL, NULL, NULL),
(71, 'Porcentaje del personal asignado en su Unidad. (Personal Militar, Personal Civil, Personal de Soldados y Personal de Pre Militares.', 42, NULL, NULL, NULL, NULL),
(72, 'Grado de instrucción del personal militar en relación a las amenazas.', 42, NULL, NULL, NULL, NULL),
(73, 'Grado de Instrucción de los Soldados en relación a la amenaza.', 42, NULL, NULL, NULL, NULL),
(74, 'Grado de entrenamiento del personal militar en relación a las amenazas.', 42, NULL, NULL, NULL, NULL),
(75, 'Grado de entrenamiento del personal de Soldados en relación a las amenazas.', 42, NULL, NULL, NULL, NULL),
(76, 'Grado de conocimiento del personal militar de las normas de seguridad en los PP.MM.AA., SS., PP.CC.FF.', 42, NULL, NULL, NULL, NULL),
(77, 'Grado de conocimiento de las vías de comunicación.', 42, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `division` int(11) DEFAULT NULL,
  `nota` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre`, `division`, `nota`) VALUES
(27, 'BAT. C Y S - XI.', 1, '12.74'),
(28, 'Prueba', 1, '6.50'),
(29, 'sad', 10, NULL),
(30, 'peeee', 11, '3.25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadejer`
--

CREATE TABLE `unidadejer` (
  `id_unidad` int(11) NOT NULL,
  `factores` text DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_factores` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `unidadejer`
--

INSERT INTO `unidadejer` (`id_unidad`, `factores`, `nota`, `fecha`, `id_factores`, `tipo`, `rol`) VALUES
(128, 'hola', 0, '2023-05-22 21:55:50', 4, 1, 1),
(129, 'Prueba 1', 0, '2023-05-24 22:31:28', 95, 1, 3),
(130, 'Prueba 2', 100, '2023-05-24 22:31:59', 95, 1, 3),
(131, 'Prueba 3', 100, '2023-05-24 22:31:59', 95, 1, 3),
(132, 'Prueba 4', 0, '2023-05-24 22:31:59', 95, 1, 3),
(133, 'Prueba 5', 100, '2023-05-24 22:31:59', 95, 1, 3),
(134, 'Prueba 1', 25, '2023-05-24 22:31:59', 95, 2, 3),
(135, 'Prueba 2', 50, '2023-05-24 22:31:59', 95, 2, 3),
(136, 'Prueba 3', 75, '2023-05-24 22:31:59', 95, 2, 3),
(137, 'Prueba 4', 100, '2023-05-24 22:31:59', 95, 2, 3),
(139, 'ds', 100, '2023-05-24 23:54:12', 1, 1, 2),
(140, 'ss', 100, '2023-05-24 23:54:14', 1, 1, 2),
(141, 'scs', 50, '2023-05-24 23:54:16', 1, 2, 2),
(142, 'cs', 75, '2023-05-24 23:54:18', 1, 2, 2),
(143, 'dfdf', 100, '2023-05-24 23:54:45', 1, 1, 5),
(144, 'yhh', 0, '2023-05-24 23:54:46', 1, 1, 5),
(145, 'dfg', 100, '2023-05-24 23:54:47', 1, 1, 5),
(146, 'jbk', 75, '2023-05-24 23:54:49', 1, 2, 5),
(147, 'Prueba 2', 25, '2023-05-24 23:54:50', 1, 2, 5),
(148, 'Prueba 3', 100, '2023-05-24 23:54:52', 1, 2, 5),
(151, 's', NULL, '2023-06-27 15:57:02', 0, 1, 1),
(152, 'dd', NULL, '2023-06-27 15:57:05', 0, 1, 1),
(153, 'd', NULL, '2023-06-27 15:58:44', 0, 1, 1),
(154, 'd', NULL, '2023-06-27 15:58:46', 0, 1, 1),
(155, 'd', NULL, '2023-06-27 15:59:09', 0, 1, 1),
(156, 's', NULL, '2023-06-27 15:59:11', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apPAt` varchar(50) NOT NULL,
  `apMAt` varchar(50) NOT NULL,
  `correo` varchar(500) NOT NULL,
  `grado` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL,
  `division` int(11) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apPAt`, `apMAt`, `correo`, `grado`, `telefono`, `password`, `fecha`, `rol`, `division`, `unidad`) VALUES
(1, 'Shaggy', 'uc', 'csc', 'Shaggy@Buu.net', 'General', '54948151', '12345', '2023-06-03 18:25:51', 1, 0, 0),
(32, 'Cesar', 'Ali', 'Nogales', 'cesarali740@gmail.com', 'Teniente', '72502333', '12345', '2023-06-28 15:41:01', 4, 1, 27),
(34, 'Ignacio', 'Cardozo', 'Morales', 'cardi@gmail.com', 'Teniente', '74585888', '12345', '2023-07-29 20:30:47', 2, 1, 27),
(35, 'l', 'l', 'l', 'l@g', 'l', '4', '12345', '2023-06-28 15:29:33', 4, 11, 30),
(36, 'jemge', 'jemge', 'jemge', 'jemge@gmail.com', 'General', '72555555', '12345', '2023-07-30 20:25:38', 10, 1, 27);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dimensiones`
--
ALTER TABLE `dimensiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mision`
--
ALTER TABLE `mision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas_factores`
--
ALTER TABLE `notas_factores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas_finales`
--
ALTER TABLE `notas_finales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subfactor`
--
ALTER TABLE `subfactor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division` (`division`);

--
-- Indices de la tabla `unidadejer`
--
ALTER TABLE `unidadejer`
  ADD PRIMARY KEY (`id_unidad`),
  ADD KEY `id_factores` (`id_factores`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dimensiones`
--
ALTER TABLE `dimensiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `mision`
--
ALTER TABLE `mision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `notas_factores`
--
ALTER TABLE `notas_factores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `notas_finales`
--
ALTER TABLE `notas_finales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subfactor`
--
ALTER TABLE `subfactor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `unidadejer`
--
ALTER TABLE `unidadejer`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `unidad_ibfk_1` FOREIGN KEY (`division`) REFERENCES `division` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
