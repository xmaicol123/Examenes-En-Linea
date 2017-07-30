-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-06-2017 a las 14:53:50
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) UNSIGNED ZEROFILL NOT NULL,
  `usuario_admin` varchar(30) DEFAULT NULL,
  `password_admin` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `usuario_admin`, `password_admin`) VALUES
(01, 'root', '63a9f0ea7bb98050796b649e85481845');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `cod_carrera` int(3) UNSIGNED ZEROFILL NOT NULL,
  `sigla_carrera` varchar(20) DEFAULT NULL,
  `nombre_carrera` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`cod_carrera`, `sigla_carrera`, `nombre_carrera`) VALUES
(001, '187-4', 'INGENIERIA EN SISTEMAS'),
(002, '187-3', 'INGENIERIA INFORMATICA'),
(003, '187-5', 'INGENIERIA EN REDES Y TELECOMUNICACIONES'),
(004, '180-1', 'ADMINISTRACION DE EMPRESAS'),
(005, '180-2', 'CIENCIAS DE LA EDUCACION'),
(006, '180-3', 'ENFERMERIA'),
(007, '180-4', 'AGROPECUARIA'),
(008, '187-10', 'MEDICINA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_materia`
--

CREATE TABLE `carrera_materia` (
  `cod_carrera_materia` int(8) UNSIGNED ZEROFILL NOT NULL,
  `cod_carrera_1122` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_materia_1122` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `semestre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera_materia`
--

INSERT INTO `carrera_materia` (`cod_carrera_materia`, `cod_carrera_1122`, `cod_materia_1122`, `semestre`) VALUES
(00000001, 001, 0002, 'Semestre 1-2017'),
(00000002, 001, 0021, 'Semestre 1-2017'),
(00000003, 001, 0022, 'Semestre 1-2017'),
(00000004, 001, 0011, 'Semestre 1-2017'),
(00000005, 001, 0001, 'Semestre 1-2017'),
(00000006, 001, 0003, 'Semestre 1-2017'),
(00000007, 001, 0004, 'Semestre 1-2017'),
(00000008, 001, 0005, 'Semestre 1-2017'),
(00000009, 001, 0006, 'Semestre 1-2017'),
(00000010, 001, 0007, 'Semestre 1-2017'),
(00000011, 001, 0008, 'Semestre 1-2017'),
(00000012, 001, 0009, 'Semestre 1-2017'),
(00000013, 001, 0012, 'Semestre 1-2017'),
(00000014, 001, 0013, 'Semestre 1-2017'),
(00000015, 001, 0014, 'Semestre 1-2017'),
(00000016, 001, 0015, 'Semestre 1-2017'),
(00000017, 001, 0016, 'Semestre 1-2017'),
(00000018, 001, 0017, 'Semestre 1-2017'),
(00000019, 001, 0002, 'Semestre 2-2017'),
(00000020, 001, 0021, 'Semestre 2-2017'),
(00000021, 001, 0022, 'Semestre 2-2017'),
(00000024, 002, 0002, 'Semestre 1-2017'),
(00000025, 003, 0002, 'Semestre 1-2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `cod_estudiante` int(6) UNSIGNED ZEROFILL NOT NULL,
  `nick_estudiante` varchar(30) DEFAULT NULL,
  `password_estudiante` text,
  `nombre_estudiante` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cod_estudiante`, `nick_estudiante`, `password_estudiante`, `nombre_estudiante`, `email`, `celular`, `fecha_nacimiento`, `direccion`) VALUES
(000001, 'estudiante1', '202cb962ac59075b964b07152d234b70', 'ANZALDO ANZALDO DAVID', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000002, 'estudiante2', '202cb962ac59075b964b07152d234b70', 'AOIZ CARBALLO ELIO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000003, 'estudiante3', '202cb962ac59075b964b07152d234b70', 'ARCE MENDUINA EDITH SONIA', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000004, 'estudiante4', '202cb962ac59075b964b07152d234b70', 'BARBA DIAZ JOSE MILTON', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000005, 'estudiante5', '202cb962ac59075b964b07152d234b70', 'BONILLA MORON GERARDO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000006, 'estudiante6', '202cb962ac59075b964b07152d234b70', 'FORONDA CASTRO JOSE', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000007, 'estudiante7', '202cb962ac59075b964b07152d234b70', 'MEDINA COCA ULISES ELMER', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000008, 'estudiante8', '202cb962ac59075b964b07152d234b70', 'MICHAGA SOLIZ MARTIN', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000009, 'estudiante9', '202cb962ac59075b964b07152d234b70', 'MIRANDA PENA CARLOS', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000010, 'estudiante10', '202cb962ac59075b964b07152d234b70', 'MOLINA AVILA RIDHER', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000011, 'estudiante11', '202cb962ac59075b964b07152d234b70', 'MOSCOSO ZENTENO JOSE MANUEL', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000012, 'estudiante12', '202cb962ac59075b964b07152d234b70', 'ROBLES CATARI IVETH BESCIE', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000013, 'estudiante13', '202cb962ac59075b964b07152d234b70', 'RODRIGUEZ MARTINEZ OSCAR', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000014, 'estudiante14', '202cb962ac59075b964b07152d234b70', 'SAAVEDRA AREVALO JOSE LUIS', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000015, 'estudiante15', '202cb962ac59075b964b07152d234b70', 'USTAREZ MEDINA WILMAN', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000016, 'estudiante16', '202cb962ac59075b964b07152d234b70', 'USTAREZ MEDINA MARIO WEIMAR', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000017, 'estudiante17', '202cb962ac59075b964b07152d234b70', 'VARGAS ROSADO LAZARO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000018, 'estudiante18', '202cb962ac59075b964b07152d234b70', 'VARGAS VARGAS LUIS ALBERTO', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000019, 'estudiante19', '202cb962ac59075b964b07152d234b70', 'ANIVARRO ALDUNATE SARA', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000020, 'estudiante20', '202cb962ac59075b964b07152d234b70', 'BARRERO DE MORALES GIOVANNA', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000021, 'estudiante21', '202cb962ac59075b964b07152d234b70', 'BECERRA CACERES DE ROSADO LOURDES', 'user@hotmail.com', '75391781', '2017-05-05', 'B/CARMEN'),
(000022, 'xmaicol123', 'db0e056f1f7b017af8120087b8f5a702', 'ELVIS MENDOZA IBARRA', 'yhonny_mendoza@hotmail.com', '75391781', '1994-01-23', 'B/EL CARMEN'),
(000026, 'aldair', '202cb962ac59075b964b07152d234b70', 'ALDAIR MENDOZA IBARRA', 'ELVIS@GMAIL.COM', '75391781', '2017-05-05', 'B/EL CARMEN'),
(000027, 'grover', '23d3fd70670ef68be4dabab84ff59f8a', 'GROVER NINA', 'calle@hotmail.com', '78598745', '1992-01-16', 'B/EL CARMEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_examen`
--

CREATE TABLE `estudiante_examen` (
  `cod_estudiante_716` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cod_examen_716` int(2) UNSIGNED ZEROFILL NOT NULL,
  `asignado` enum('Asignado','Sin asignar') DEFAULT NULL,
  `estado` enum('Contestado','Sin Contestar') DEFAULT NULL,
  `nota_examen` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_examen`
--

INSERT INTO `estudiante_examen` (`cod_estudiante_716`, `cod_examen_716`, `asignado`, `estado`, `nota_examen`) VALUES
(000001, 01, 'Asignado', 'Sin Contestar', 0),
(000001, 08, 'Asignado', 'Sin Contestar', 0),
(000002, 01, 'Asignado', 'Sin Contestar', 0),
(000003, 01, 'Asignado', 'Sin Contestar', 0),
(000006, 01, 'Asignado', 'Sin Contestar', 0),
(000007, 01, 'Asignado', 'Sin Contestar', 0),
(000009, 01, 'Asignado', 'Sin Contestar', 0),
(000022, 01, 'Asignado', 'Sin Contestar', 0),
(000022, 08, 'Asignado', 'Sin Contestar', 0),
(000027, 01, 'Asignado', 'Sin Contestar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_grupo`
--

CREATE TABLE `estudiante_grupo` (
  `cod_estudiante_grupo` int(9) UNSIGNED ZEROFILL NOT NULL,
  `cod_estudiante_546` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_grupo_546` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `fecha_inscripcion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_grupo`
--

INSERT INTO `estudiante_grupo` (`cod_estudiante_grupo`, `cod_estudiante_546`, `cod_grupo_546`, `fecha_inscripcion`) VALUES
(000000001, 000022, 0000001, '2017-06-08'),
(000000002, 000001, 0000001, '2017-06-08'),
(000000003, 000002, 0000001, '2017-06-08'),
(000000004, 000003, 0000001, '2017-06-08'),
(000000005, 000006, 0000001, '2017-06-08'),
(000000006, 000007, 0000001, '2017-06-08'),
(000000007, 000022, 0000003, '2017-06-08'),
(000000008, 000001, 0000003, '2017-06-08'),
(000000009, 000002, 0000003, '2017-06-08'),
(000000010, 000004, 0000003, '2017-06-08'),
(000000011, 000022, 0000005, '2017-06-08'),
(000000012, 000009, 0000005, '2017-06-08'),
(000000013, 000021, 0000005, '2017-06-08'),
(000000014, 000020, 0000005, '2017-06-08'),
(000000015, 000019, 0000005, '2017-06-08'),
(000000017, 000017, 0000003, '2017-06-14'),
(000000018, 000027, 0000001, '2017-06-14'),
(000000019, 000009, 0000001, '2017-06-14'),
(000000020, 000022, 0000006, '2017-06-08'),
(000000021, 000001, 0000006, '2017-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_respuesta`
--

CREATE TABLE `estudiante_respuesta` (
  `cod_estudiante_917` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cod_examen_917` int(2) UNSIGNED ZEROFILL NOT NULL,
  `cod_pregunta_917` int(3) UNSIGNED ZEROFILL NOT NULL,
  `estado` enum('Correcta','Incorrecta') DEFAULT NULL,
  `estudiante_respuesta` text,
  `nota_pregunta` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `cod_examen` int(2) UNSIGNED ZEROFILL NOT NULL,
  `cod_grupo_225` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_tipo_examen_225` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `nombre_examen` text,
  `descripcion_examen` varchar(50) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  `estado_examen` enum('Enviado','Sin Enviar','Terminado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`cod_examen`, `cod_grupo_225`, `cod_tipo_examen_225`, `nombre_examen`, `descripcion_examen`, `fecha_inicio`, `fecha_final`, `duracion`, `estado_examen`) VALUES
(01, 0000001, 001, 'Examen De Html,Css,Javascript', 'Examen Teorico', '2017-06-14', '2017-06-15', 30, 'Sin Enviar'),
(02, 0000001, 002, 'Examen De Php', 'Examen Teorico', '2017-06-08', '2017-06-17', 120, 'Sin Enviar'),
(08, 0000006, 001, 'Introduccion a Redes', 'Redes Tecnologia', '2017-05-05', '2017-06-05', 20, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `cod_grupo` int(7) UNSIGNED ZEROFILL NOT NULL,
  `cod_carrera_materia_99` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `cod_profesor_99` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `nombre_grupo` varchar(30) DEFAULT NULL,
  `aula` varchar(10) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL,
  `hora_inicio` varchar(10) DEFAULT NULL,
  `hora_salida` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`cod_grupo`, `cod_carrera_materia_99`, `cod_profesor_99`, `nombre_grupo`, `aula`, `dia`, `hora_inicio`, `hora_salida`) VALUES
(0000001, 00000001, 00001, 'GRUPO 1-2017', 'AULA-02', 'Miercoles', '06:15', '10:15'),
(0000003, 00000002, 00001, 'GRUPO 1-2017', 'AULA-1', 'Jueves', '06:15', '10:15'),
(0000005, 00000003, 00001, 'GRUPO 1-2017', 'AULA-02', 'Sabado', '06:15', '10:15'),
(0000006, 00000010, 00009, 'GRUPO 1-2017', 'AULA-02', 'Jueves', '06:15', '10:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `cod_materia` int(4) UNSIGNED ZEROFILL NOT NULL,
  `sigla_materia` varchar(10) DEFAULT NULL,
  `nombre_materia` varchar(50) DEFAULT NULL,
  `creditos` int(11) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`cod_materia`, `sigla_materia`, `nombre_materia`, `creditos`, `descripcion`) VALUES
(0001, 'INF511', 'TALLER DE GRADO I', 5, ''),
(0002, 'INF513', 'TECNOLOGIA WEB', 5, ''),
(0003, 'INF512', 'INGENIERIA DE SOFTWARE II', 5, ''),
(0004, 'INF 552', 'ARQUITECTURA DEL SOFTWARE', 5, ''),
(0005, 'INF462', 'AUDITORIA INFORMATICA', 5, ''),
(0006, 'INF442', 'SISTEMAS DE INFORMACION GEOGRAFICA', 5, ''),
(0007, 'INF423', 'REDES II', 5, ''),
(0008, 'INF422', 'INGENIERIA DE SOFTWARE I', 5, ''),
(0009, 'ECO449', 'PREPARACION Y EVALUACION DE PROYECTOS', 5, ''),
(0011, 'FIS100-PY', 'FISICA I ', 5, ''),
(0012, 'INF110-IY', 'INTRODUCCION A LA INFORMATICA', 5, ''),
(0013, 'INF119-IY', 'ESTRUCTURAS DISCRETAS', 5, ''),
(0014, 'LIN100-IY', 'INGLES TECNICO I', 5, ''),
(0015, 'MAT101-PY', 'CALCULO I ', 5, ''),
(0016, 'FIS102-PY', 'FISICA II', 5, ''),
(0017, 'INF120-IY', 'PROGRAMACION I ', 1, ''),
(0018, 'MAT102-PY', 'CALCULO II', 5, ''),
(0019, 'LIN101-IY', 'INGLES TECNICO II ', 5, ''),
(0020, 'MAT103-PY', 'ALGEBRA LINEAL ', 5, ''),
(0021, 'INF312-IY', 'BASES DE DATOS I ', 5, ''),
(0022, 'INF322-IY', 'BASES DE DATOS II', 5, ''),
(0023, 'SIGLA-PRUE', 'MATERIA DE PRUEBA', 3, 'DESCRIPCION DE PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `cod_pregunta` int(3) UNSIGNED ZEROFILL NOT NULL,
  `cod_examen_753` int(2) UNSIGNED ZEROFILL NOT NULL,
  `cod_tipo_pregunta_753` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `pregunta` varchar(500) DEFAULT NULL,
  `opcion1` varchar(100) DEFAULT NULL,
  `opcion2` varchar(100) DEFAULT NULL,
  `opcion3` varchar(100) DEFAULT NULL,
  `opcion4` varchar(100) DEFAULT NULL,
  `correcta` enum('opcion1','opcion2','opcion3','opcion4') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`cod_pregunta`, `cod_examen_753`, `cod_tipo_pregunta_753`, `pregunta`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `correcta`) VALUES
(011, 01, 0001, 'Que propiedad no existe en CSS', 'font-face ', 'font-size ', 'font-style', 'font-variant', 'opcion1'),
(012, 01, 0001, 'En CSS, ¿que propiedad se emplea para controlar lo que ocurre cuando el contenido de un elemento no cabe en el espacio asignado al elemento?', 'content ', 'display ', 'float', 'Las anteriores respuestas no son correctas', 'opcion4'),
(017, 01, 0001, '¿Cual es el lenguaje estandar especifico para aplicar estilos de presentacon a nuestras paginas Web?', 'Javascript', 'Flash', 'Php', 'Css', 'opcion4'),
(018, 01, 0001, '¿Que es XHTML?', 'La Adaptacion del estandar HTML segun las reglas XML', 'Es el HTML Dinamico', 'Es La como se conoce a la familia generica de las distintas versiones de HTML', 'Nimguna de las anteriores', 'opcion1'),
(019, 01, 0001, '¿Que funcion tiene el elemento DIV?', 'es un elemento divisor, y hace que el navegador muestre una linea horizontal de separacion (por ejem', 'es un contenedor, crea bloques por ejemplo para diferenciar distintas secciones de una pagina (Cabez', 'Permite realizar una operacion aritmetica de division en los valores numericos de una tabla', 'Nimguna de las anteriores', 'opcion2'),
(020, 08, 0001, 'Compartir hardware en una red significa que:', 'cada ordenator tenga conectada una impresora', 'con un solo router todos los ordenadores pueden conectarse a internet', 'cada ordenador disponga de sus propias conexion a internet', 'nimguna de las anteriores', 'opcion2'),
(021, 08, 0001, 'Los ordenadores que forman una red de area metropolitana estan situadas en', 'un mismo edificio', 'una misma ciudad', 'dos o mas paises deiferentes', 'nimguna de las anteriores', 'opcion2'),
(022, 08, 0001, 'Senala cual es el nombre del estandar con el que cumplen las tarjetas de red:', 'internet', 'intranet', 'ethernet', 'nimguna de las anteriores', 'opcion3'),
(023, 08, 0001, 'Que tipo de conexiones se suelen utilizar para crear redes MAN?', 'fibra optica y enlaces de microondas', 'enlaces de laser', 'conductores de cobre', 'nimguna de las anteriores', 'opcion1'),
(024, 08, 0002, 'Una red de computadores es una interconexion de equipos', 'Falso', 'Verdadero', '', '', 'opcion2'),
(025, 08, 0002, 'Una red de computadores permite realizar llamada a larga distancia', 'Falso', 'Verdadero', '', '', 'opcion1'),
(026, 08, 0001, 'Red de redes a escala mundial, que permite la conexion y comunicacion de millones de computadoras compartiendo todo el tipo y gran cantidad de informacion', 'Tecnologia digital', 'Internet', 'Tecnologia Inalambrica', 'Nimguna de las anteriores', 'opcion2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `cod_profesor` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nick_profesor` varchar(30) DEFAULT NULL,
  `password_profesor` text,
  `nombre_profesor` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cod_profesor`, `nick_profesor`, `password_profesor`, `nombre_profesor`, `direccion`, `email`, `celular`) VALUES
(00001, 'profesor1', '202cb962ac59075b964b07152d234b70', 'EDWIN CALLE', 'B/ELL CARMEN', 'calle@hotmail.com', '78598745'),
(00002, 'profesor2', '202cb962ac59075b964b07152d234b70', 'EDWIN CALLIZAYA', 'B/ELL CARMEN', 'callizaya@hotmail.com', '78598745'),
(00003, 'profesor3', '202cb962ac59075b964b07152d234b70', 'DAVID INOCENTE', 'B/ELL CARMEN', 'inocente@hotmail.com', '78598745'),
(00004, 'profesor4', '202cb962ac59075b964b07152d234b70', 'JUAN ALVAREZ', 'B/ELL CARMEN', 'alvarez@hotmail.com', '78598745'),
(00005, 'profesor5', '202cb962ac59075b964b07152d234b70', 'NOLBERTO ZABALA', 'B/ELL CARMEN', 'zabala@hotmail.com', '78598745'),
(00006, 'profesor6', '202cb962ac59075b964b07152d234b70', 'LUIS FERNANDO VILLAROEL', 'B/ELL CARMEN', 'villaroel@hotmail.com', '78598745'),
(00008, 'prueba', 'c893bad68927b457dbed39460e6afd62', 'DOCENTE PRUEBA', 'dsfdfg', 'asas@hotmail.com', 'asdasdasd'),
(00009, 'aldair', '348850349e1c6e5ffcf71cb812125ab0', 'ALDAIR MENDOZA IBARRA', 'B/EL CARMEN', 'aldair@hotmail.com', '71568966');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_examen`
--

CREATE TABLE `tipo_examen` (
  `cod_tipo_examen` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nombre_tipo_examen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_examen`
--

INSERT INTO `tipo_examen` (`cod_tipo_examen`, `nombre_tipo_examen`) VALUES
(001, '1 Primer Examen'),
(002, '2 Primer Examen'),
(003, '3 Primer Examen'),
(004, '1 Repechaje'),
(005, '2 Repechaje'),
(006, 'Repaso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE `tipo_pregunta` (
  `cod_tipo_pregunta` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nombre_tipo_pregunta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`cod_tipo_pregunta`, `nombre_tipo_pregunta`) VALUES
(0001, 'Opcion Multiple'),
(0002, 'Falso y Verdadero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`cod_carrera`);

--
-- Indices de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD PRIMARY KEY (`cod_carrera_materia`),
  ADD KEY `cod_carrera_1122` (`cod_carrera_1122`),
  ADD KEY `cod_materia_1122` (`cod_materia_1122`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cod_estudiante`);

--
-- Indices de la tabla `estudiante_examen`
--
ALTER TABLE `estudiante_examen`
  ADD PRIMARY KEY (`cod_estudiante_716`,`cod_examen_716`),
  ADD KEY `cod_examen_716` (`cod_examen_716`);

--
-- Indices de la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  ADD PRIMARY KEY (`cod_estudiante_grupo`),
  ADD KEY `cod_estudiante_546` (`cod_estudiante_546`),
  ADD KEY `cod_grupo_546` (`cod_grupo_546`);

--
-- Indices de la tabla `estudiante_respuesta`
--
ALTER TABLE `estudiante_respuesta`
  ADD PRIMARY KEY (`cod_estudiante_917`,`cod_examen_917`,`cod_pregunta_917`),
  ADD KEY `cod_examen_917` (`cod_examen_917`),
  ADD KEY `cod_pregunta_917` (`cod_pregunta_917`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`cod_examen`),
  ADD KEY `cod_grupo_225` (`cod_grupo_225`),
  ADD KEY `cod_tipo_examen_225` (`cod_tipo_examen_225`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`cod_grupo`),
  ADD KEY `cod_carrera_materia_99` (`cod_carrera_materia_99`),
  ADD KEY `cod_profesor_99` (`cod_profesor_99`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`cod_materia`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`cod_pregunta`,`cod_examen_753`),
  ADD KEY `cod_examen_753` (`cod_examen_753`),
  ADD KEY `cod_tipo_pregunta_753` (`cod_tipo_pregunta_753`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`cod_profesor`);

--
-- Indices de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  ADD PRIMARY KEY (`cod_tipo_examen`);

--
-- Indices de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  ADD PRIMARY KEY (`cod_tipo_pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `cod_carrera` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  MODIFY `cod_carrera_materia` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `cod_estudiante` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  MODIFY `cod_estudiante_grupo` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `cod_examen` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `cod_grupo` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `cod_materia` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `cod_pregunta` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `cod_profesor` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  MODIFY `cod_tipo_examen` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  MODIFY `cod_tipo_pregunta` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD CONSTRAINT `carrera_materia_ibfk_1` FOREIGN KEY (`cod_carrera_1122`) REFERENCES `carrera` (`cod_carrera`),
  ADD CONSTRAINT `carrera_materia_ibfk_2` FOREIGN KEY (`cod_materia_1122`) REFERENCES `materia` (`cod_materia`);

--
-- Filtros para la tabla `estudiante_examen`
--
ALTER TABLE `estudiante_examen`
  ADD CONSTRAINT `estudiante_examen_ibfk_1` FOREIGN KEY (`cod_estudiante_716`) REFERENCES `estudiante` (`cod_estudiante`),
  ADD CONSTRAINT `estudiante_examen_ibfk_2` FOREIGN KEY (`cod_examen_716`) REFERENCES `examen` (`cod_examen`);

--
-- Filtros para la tabla `estudiante_grupo`
--
ALTER TABLE `estudiante_grupo`
  ADD CONSTRAINT `estudiante_grupo_ibfk_1` FOREIGN KEY (`cod_estudiante_546`) REFERENCES `estudiante` (`cod_estudiante`),
  ADD CONSTRAINT `estudiante_grupo_ibfk_2` FOREIGN KEY (`cod_grupo_546`) REFERENCES `grupo` (`cod_grupo`);

--
-- Filtros para la tabla `estudiante_respuesta`
--
ALTER TABLE `estudiante_respuesta`
  ADD CONSTRAINT `estudiante_respuesta_ibfk_1` FOREIGN KEY (`cod_estudiante_917`) REFERENCES `estudiante` (`cod_estudiante`),
  ADD CONSTRAINT `estudiante_respuesta_ibfk_2` FOREIGN KEY (`cod_examen_917`) REFERENCES `pregunta` (`cod_examen_753`),
  ADD CONSTRAINT `estudiante_respuesta_ibfk_3` FOREIGN KEY (`cod_pregunta_917`) REFERENCES `pregunta` (`cod_pregunta`);

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`cod_grupo_225`) REFERENCES `grupo` (`cod_grupo`),
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`cod_tipo_examen_225`) REFERENCES `tipo_examen` (`cod_tipo_examen`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`cod_carrera_materia_99`) REFERENCES `carrera_materia` (`cod_carrera_materia`),
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`cod_profesor_99`) REFERENCES `profesor` (`cod_profesor`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`cod_examen_753`) REFERENCES `examen` (`cod_examen`),
  ADD CONSTRAINT `pregunta_ibfk_2` FOREIGN KEY (`cod_tipo_pregunta_753`) REFERENCES `tipo_pregunta` (`cod_tipo_pregunta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
