-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2018 a las 22:29:35
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_area` (IN `_area_nombre` VARCHAR(100), IN `_id_area` INT, IN `_sub_area` VARCHAR(50), IN `_empresa` VARCHAR(50), IN `_consulta` INT, IN `_id` INT)  BEGIN
IF _consulta = 1 THEN
UPDATE area 
SET nombre = _area_nombre WHERE id_area = _id;
elseif _consulta = 2 THEN
UPDATE sub_area 
SET id_area_fk = _id_area , nombre = _sub_area WHERE id_sub = _id;
ELSEIF _consulta = 3 THEN
UPDATE tipo_trabajo 
SET nombre = _empresa WHERE id_tipo_trabajo = _id;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_postulacion` (IN `_idarea` INT, IN `_id_sub_area` INT, IN `_id_usuario` INT, IN `_salario` INT, IN `_estado` VARCHAR(50), IN `_id` INT)  BEGIN
UPDATE postulaciones a 
SET a.id_area_p = _idarea , a.id_sub_area = _id_sub_area , a.id_usuario_P = _id_usuario , a.salario = _salario , a.estado = _estado WHERE a.id_postulacion = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_solicitud` (IN `_email` VARCHAR(100), IN `_nombre` VARCHAR(100), IN `_estado` INT, IN `_pregunta` TEXT, IN `_id` INT)  BEGIN
UPDATE solicitud_info 
SET email = _email , nombre = _nombre , pregunta = _pregunta , estado = _estado WHERE id = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_trabajo` (IN `_id_area` INT, IN `_id_sub_area` INT, IN `_id_provincia` INT, IN `_descripcion` TEXT, IN `_id_tipo_trabajo` INT, IN `_salario` INT, IN `_nivel_laboral` VARCHAR(100), IN `_tipo_empleo` VARCHAR(100), IN `_id` INT)  BEGIN
UPDATE trabajo a
SET a.id_area = _id_area , a.id_sub_are=_id_sub_area , a.id_provincia = _id_provincia , a.salario = _salario , 
a.id_tipo_tra = _id_tipo_trabajo , a.nivel_laboral = _nivel_laboral, a.tipo_empleo = _tipo_empleo, a.descripcion = _descripcion  WHERE a.id_trabajo = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminacion` (IN `_id` INT, IN `consulta` INT)  BEGIN
IF consulta = 1 THEN
DELETE FROM area WHERE id_area = _id;
ELSEIF consulta = 2 THEN 
DELETE FROM sub_area  WHERE id_sub = _id;
ELSEIF consulta = 3 THEN 
DELETE FROM tipo_trabajo WHERE id_tipo_trabajo = _id;
ELSEIF consulta = 4 THEN 
DELETE FROM trabajo  WHERE id_trabajo = _id;
ELSEIF consulta = 5 THEN 
DELETE FROM solicitud_info WHERE id = _id;
ELSEIF consulta = 6 THEN 
DELETE FROM postulaciones WHERE id_postulacion= _id;
ELSEIF consulta = 7 THEN 
DELETE FROM usuario  WHERE id = _id;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingresar` (IN `email` VARCHAR(100), IN `pass` VARCHAR(100))  BEGIN
SELECT * FROM usuario a where a.correo = email and a.password = pass and a.activo = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar` (IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `correo` VARCHAR(100), IN `pass` VARCHAR(100), IN `puesto` VARCHAR(100), IN `pro` INT, IN `sexo` INT)  BEGIN
INSERT INTO usuario(nombre,apellido,correo,puesto,provincia,sexo,password) VALUE
(nombre,apellido,correo,puesto,pro,sexo,pass);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_area` (IN `nombre` VARCHAR(100))  BEGIN
INSERT INTO area(nombre) VALUE
(nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_informacion` (IN `email` VARCHAR(100), IN `nombre` VARCHAR(100), IN `pregunta` VARCHAR(100))  BEGIN
INSERT INTO solicitud_info(email,nombre,pregunta) VALUE
(email,nombre,pregunta);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_sub` (IN `nombre` VARCHAR(100), IN `id_area` INT)  BEGIN
INSERT INTO sub_area(id_area_fk,nombre) VALUE
(id_area,nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_tipo` (IN `nombre` VARCHAR(100))  BEGIN
INSERT INTO tipo_trabajo (nombre) VALUE(nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_trabajo` (IN `id_area` INT, IN `id_sub_area` INT, IN `id_provincia` INT, IN `salario` DOUBLE, IN `descripcion` TEXT, IN `id_tipo_trabajo` INT, IN `nivel_laboral` VARCHAR(100), IN `tipo_empleo` VARCHAR(100))  BEGIN
INSERT INTO trabajo (id_area,id_sub_are,id_provincia,salario,descripcion,id_tipo_tra,nivel_laboral,tipo_empleo) 
VALUE(id_area,id_sub_area,id_provincia,salario,descripcion,id_tipo_trabajo,nivel_laboral,tipo_empleo);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_postulacion` (IN `_consulta` INT, IN `_id_area` INT, IN `_id_usuario` INT, IN `_id_sub` INT, IN `_salario` DOUBLE, IN `_id` INT)  BEGIN
IF _consulta = 1 then
select a.estado,a.id_postulacion,a.salario,a.fecha_post,b.nombre as area,c.nombre as subarea, d.nombre as usuario from postulaciones a 
inner join area b on a.id_area_p = b.id_area
inner join sub_area c on a.id_sub_area = c.id_sub inner join usuario d on a.id_usuario_P = d.id
order by a.fecha_post desc limit 3;

elseif _consulta = 2 then
select a.estado,a.id_postulacion,a.salario,a.fecha_post,b.nombre as area,c.nombre as subarea, d.nombre as usuario from postulaciones a 
inner join area b on a.id_area_p = b.id_area
inner join sub_area c on a.id_sub_area = c.id_sub inner join usuario d on a.id_usuario_P = d.id
order by fecha_post; 
elseif _consulta = 3 then
INSERT INTO postulaciones (id_area_p,id_sub_area,id_usuario_P,salario) value(_id_area,_id_usuario,_id_sub,_salario);
elseif _consulta = 4 then
select a.estado,a.id_postulacion,a.salario,a.fecha_post,b.nombre as area,c.nombre as subarea, d.nombre as usuario, a.id_sub_area,a.id_usuario_P,a.id_area_p from postulaciones a 
inner join area b on a.id_area_p = b.id_area
inner join sub_area c on a.id_sub_area = c.id_sub inner join usuario d on a.id_usuario_P = d.id where a.id_postulacion = _id;
end if; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_provincia` ()  BEGIN
SELECT * FROM provincia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sexo` ()  BEGIN
SELECT * FROM sexo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_solicitud` ()  BEGIN
SELECT * FROM solicitud_info order by fecha desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_solicitud_limit` ()  BEGIN
SELECT * FROM  solicitud_info ORDER BY email DESC LIMIT 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tipo_usuario` ()  BEGIN
select * from tipo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_area` ()  BEGIN
select * from area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_empresa` ()  BEGIN
SELECT * FROM tipo_trabajo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_sub` ()  BEGIN
select a.id_sub,a.nombre as subarea,b.nombre as area from sub_area as a inner join area as b on a.id_area_fk = b.id_area;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_trabajo` ()  BEGIN
select t.id_trabajo, a.nombre as area, b.nombre as subarea,c.nombre as provincia ,d.nombre as empresa ,t.salario,t.descripcion,t.nivel_laboral,t.tipo_empleo,t.publicado
from trabajo t inner join area a on t.id_area = a.id_area 
inner join sub_area b on t.id_sub_are = b.id_sub 
inner join provincia c on t.id_provincia = c.id
inner join tipo_trabajo d on d.id_tipo_trabajo = t.id_tipo_tra order by t.publicado desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_una_info` (IN `id` INT)  BEGIN
select * from solicitud_info a where a.id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_un_registro` (IN `id` INT, IN `_consulta` INT)  BEGIN
IF _consulta = 1
THEN
 select * from area a where a.id_area = id;
 
 ELSEIF _consulta =2
 THEN
 select * from tipo_trabajo a where a.id_tipo_trabajo = id;
 ELSEIF _consulta = 3
 THEN 
 select b.nombre as area , b.id_area ,a.nombre as sub , a.id_sub from sub_area a inner join  area b on a.id_area_fk = b.id_area where a.id_sub = id;
 END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_un_trabajo` (IN `id` INT)  BEGIN
select t.id_trabajo, a.nombre as area,a.id_area, b.nombre as subarea,b.id_sub,c.nombre as provincia, c.id as id_prov ,d.nombre as empresa,d.id_tipo_trabajo ,t.salario,t.descripcion,t.nivel_laboral,t.tipo_empleo,t.publicado
from trabajo t inner join area a on t.id_area = a.id_area 
inner join sub_area b on t.id_sub_are = b.id_sub 
inner join provincia c on t.id_provincia = c.id
inner join tipo_trabajo d on d.id_tipo_trabajo = t.id_tipo_tra where  t.id_trabajo = id  order by t.publicado desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_un_usuario` (IN `id` INT)  BEGIN
select a.id , a.nombre,a.apellido,a.correo,a.puesto,a.activo,p.nombre as provincia,p.id id_pro,s.nombre as sexo,s.id as id_s,t.nombre as usuario , t.id_tipo as tipo from usuario as a 
inner join provincia as p on a.provincia = p.id inner join sexo as s on a.sexo = s.id
inner join tipo_usuario as t on t.id_tipo = a.tipo where a.id = id order by a.id desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_traer_usuarios` ()  BEGIN
select a.id , a.nombre,a.apellido,a.correo,a.puesto,a.activo,p.nombre as provincia,p.id id_pro,s.nombre as sexo,t.nombre as usuario from usuario as a 
inner join provincia as p on a.provincia = p.id inner join sexo as s on a.sexo = s.id
inner join tipo_usuario as t on t.id_tipo = a.tipo order by a.id desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_usuario` (IN `_nombre` VARCHAR(100), IN `_apellido` VARCHAR(100), IN `_email` VARCHAR(100), IN `_puesto` VARCHAR(100), IN `_provincia` INT, IN `_sexo` INT, IN `_tipo_usuario` INT, IN `_estado` INT, IN `_id` INT)  BEGIN
UPDATE usuario
SET nombre = _nombre, apellido = _apellido ,  correo = _email,  puesto = _puesto , provincia = _provincia, sexo = _sexo ,  tipo = _tipo_usuario ,  activo = _estado WHERE id= _id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre`) VALUES
(15, 'Administración'),
(16, 'Call center'),
(17, 'Comercio exterior'),
(18, 'Comunicación'),
(19, 'Construcción'),
(20, 'Diseño'),
(21, 'Educación'),
(22, 'Marketing'),
(23, 'Recursos humanos'),
(24, 'Tecnología'),
(25, 'Producción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `id_postulacion` int(11) NOT NULL,
  `id_area_p` int(11) DEFAULT NULL,
  `id_sub_area` int(11) DEFAULT NULL,
  `id_usuario_P` int(11) DEFAULT NULL,
  `salario` double DEFAULT NULL,
  `fecha_post` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(50) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`id_postulacion`, `id_area_p`, `id_sub_area`, `id_usuario_P`, `salario`, `fecha_post`, `estado`) VALUES
(41, 20, 18, 25, 1000, '2018-12-05 21:10:06', 'Pendiente'),
(42, 17, 7, 25, 1000, '2018-12-05 21:14:48', 'Pendiente'),
(43, 24, 15, 25, 1000, '2018-12-05 21:15:52', 'Pendiente'),
(44, 20, 18, 25, 52200, '2018-12-05 21:16:06', 'Pendiente'),
(45, 24, 15, 25, 1000, '2018-12-05 21:16:41', 'Pendiente'),
(46, 20, 18, 25, 2000, '2018-12-05 21:16:56', 'Pendiente'),
(47, 15, 7, 25, 30000, '2018-12-05 21:17:06', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(2) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`) VALUES
(1, 'Pamaná'),
(2, 'Bocas Del Toro'),
(3, 'Cocle'),
(4, 'Colón'),
(5, 'Chiriquí'),
(6, 'Herrera'),
(7, 'Darien'),
(8, 'Panamá Oeste'),
(9, 'Veraguas'),
(10, 'Los santos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_info`
--

CREATE TABLE `solicitud_info` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT '0',
  `nombre` varchar(50) DEFAULT '0',
  `pregunta` text,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud_info`
--

INSERT INTO `solicitud_info` (`id`, `email`, `nombre`, `pregunta`, `fecha`, `estado`) VALUES
(17, 'tonyjoe1110@hotmail.com', 'joel jimenez', ' Como postularme facil mente\r\n', '2018-12-05 17:22:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_area`
--

CREATE TABLE `sub_area` (
  `id_sub` int(11) NOT NULL,
  `id_area_fk` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_area`
--

INSERT INTO `sub_area` (`id_sub`, `id_area_fk`, `nombre`) VALUES
(7, 25, 'Jefe De Producción'),
(8, 25, 'Supervisora De Calidad'),
(9, 25, 'MECÁNICO INDUSTRIAL ÁREA OESTE'),
(10, 25, ' AYUDANTE DE PRODUCCIÓN- JUAN DIAZ'),
(11, 25, 'Tecnico Electronico'),
(12, 25, 'MECANICO DE EQUIPO PESADO'),
(13, 24, 'Front End Software Engineer (USD30k/Yr) - Remote Wo'),
(14, 24, 'ANFITRIONAS MEDIO TIEMPO'),
(15, 24, 'C++ Software Architect (USD60K/Yr) - Remote Work'),
(16, 24, 'Analista de Redes e Implementación de Servicios'),
(17, 15, 'Contador'),
(18, 15, 'Gerente Financiero (Colón)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_trabajo`
--

CREATE TABLE `tipo_trabajo` (
  `id_tipo_trabajo` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_trabajo`
--

INSERT INTO `tipo_trabajo` (`id_tipo_trabajo`, `nombre`) VALUES
(11, 'BioSoftware'),
(12, 'Banco General'),
(13, 'Banistmo'),
(14, 'First Data'),
(15, 'CrossOver'),
(16, 'Talered'),
(17, 'Confidencial'),
(18, 'ALONZOYA'),
(19, 'Grupo Melo'),
(20, 'Producto la doña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nombre`) VALUES
(1, 'administrador'),
(2, 'regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` int(2) NOT NULL,
  `id_area` int(2) DEFAULT NULL,
  `id_sub_are` int(2) DEFAULT NULL,
  `id_provincia` int(2) DEFAULT NULL,
  `salario` double DEFAULT NULL,
  `descripcion` text,
  `id_tipo_tra` int(2) DEFAULT NULL,
  `nivel_laboral` varchar(100) DEFAULT NULL,
  `tipo_empleo` varchar(100) DEFAULT NULL,
  `publicado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_trabajo`, `id_area`, `id_sub_are`, `id_provincia`, `salario`, `descripcion`, `id_tipo_tra`, `nivel_laboral`, `tipo_empleo`, `publicado`) VALUES
(22, 15, 7, 1, 5000, 'Se busca con experiencia de dos años minimo.', 17, 'Jefe / Supervisor', 'Full - Time', '2018-12-05 17:15:55'),
(23, 24, 15, 1, 900, 'se busca programador con experiencia en c++', 12, 'Seni/ Semi Senio', 'Full - Time', '2018-12-05 17:21:21'),
(24, 16, 8, 3, 2500, 'con experiencia', 11, 'Seni/ Semi Senio', 'Full - Time', '2018-12-05 17:52:12'),
(25, 23, 17, 2, 520, 'se busca contador con experienciaa', 13, 'Gerencia', 'Temporario', '2018-12-05 17:53:15'),
(26, 22, 10, 1, 2000, 'If you want to change the size of a single column, you can use one of the following classes:', 17, 'Seni/ Semi Senio', 'Full - Time', '2018-12-05 17:54:01'),
(27, 17, 7, 2, 1200, 'Se busca funcionario, ingles.', 13, 'Gerencia', 'Full - Time', '2018-12-05 18:49:44'),
(28, 20, 18, 4, 1200, 'Toma órdenes de pedidos de los clientes,\r\nRealiza cobros a los clientes con prontitud y honradez,\r\nPrepara y mantiene la calidad  de las bebidas de acuerdo con las recetas y estándares de presentación dados por la empresa.\r\nSigue las reglas  de seguridad y sanidad para todos los productos\r\nBrinda un servicio personalizado.\r\nCuida del orden y la limpieza en el área de trabajo.\r\nCumple con los procedimientos operativos, incluyendo  el manejo de  los cobros y políticas de   seguridad establecidos por la empresa.', 16, 'Jefe / Supervisor', 'Part - Time', '2018-12-05 19:03:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `nombre` varchar(100) DEFAULT '0',
  `apellido` varchar(100) DEFAULT '0',
  `correo` varchar(100) DEFAULT '0',
  `puesto` varchar(100) DEFAULT '0',
  `provincia` int(2) DEFAULT '0',
  `sexo` int(2) DEFAULT '0',
  `password` varchar(100) DEFAULT NULL,
  `tipo` int(2) DEFAULT '2',
  `activo` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `puesto`, `provincia`, `sexo`, `password`, `tipo`, `activo`) VALUES
(25, 'Abi_Doco', 'Arias', 'admin@admin', 'programador', 1, 1, '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD PRIMARY KEY (`id_postulacion`),
  ADD KEY `id_area_p` (`id_area_p`),
  ADD KEY `id_usuario_P` (`id_usuario_P`),
  ADD KEY `id_sub_area` (`id_sub_area`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_info`
--
ALTER TABLE `solicitud_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_area`
--
ALTER TABLE `sub_area`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_area_fk` (`id_area_fk`);

--
-- Indices de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  ADD PRIMARY KEY (`id_tipo_trabajo`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_sub_are` (`id_sub_are`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_tipo_tra` (`id_tipo_tra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincia` (`provincia`),
  ADD KEY `sexo` (`sexo`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  MODIFY `id_postulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud_info`
--
ALTER TABLE `solicitud_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  MODIFY `id_tipo_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD CONSTRAINT `id_area_p` FOREIGN KEY (`id_area_p`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `id_sub_area` FOREIGN KEY (`id_sub_area`) REFERENCES `sub_area` (`id_sub`),
  ADD CONSTRAINT `id_usuario_P` FOREIGN KEY (`id_usuario_P`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `sub_area`
--
ALTER TABLE `sub_area`
  ADD CONSTRAINT `id_area_fk` FOREIGN KEY (`id_area_fk`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_sub_are` FOREIGN KEY (`id_sub_are`) REFERENCES `sub_area` (`id_sub`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_tipo_tra` FOREIGN KEY (`id_tipo_tra`) REFERENCES `tipo_trabajo` (`id_tipo_trabajo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `provincia` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sexo` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
