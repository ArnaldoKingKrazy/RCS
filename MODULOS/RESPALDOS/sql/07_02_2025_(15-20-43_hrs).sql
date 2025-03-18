SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS rcs;

USE rcs;

DROP TABLE IF EXISTS equipos_en_general;

CREATE TABLE `equipos_en_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `serial` text COLLATE utf8_spanish_ci NOT NULL,
  `modelo` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO equipos_en_general VALUES("1","10","Desmalezadora","002A55B7","M-2","ninguna");



DROP TABLE IF EXISTS estatus_de_la_siembra;

CREATE TABLE `estatus_de_la_siembra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO estatus_de_la_siembra VALUES("1","Actividad");
INSERT INTO estatus_de_la_siembra VALUES("2","Cosechada");
INSERT INTO estatus_de_la_siembra VALUES("3","Enferma");
INSERT INTO estatus_de_la_siembra VALUES("4","Abortada");



DROP TABLE IF EXISTS hijos_empleados;

CREATE TABLE `hijos_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `nombre_hijo` text COLLATE utf8_spanish_ci NOT NULL,
  `edad` text COLLATE utf8_spanish_ci NOT NULL,
  `cedula_hijo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS prestaciones;

CREATE TABLE `prestaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `dotacion` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS productos_agricolas;

CREATE TABLE `productos_agricolas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre_cientifico` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_de_uso` text COLLATE utf8_spanish_ci NOT NULL,
  `presentacion` text COLLATE utf8_spanish_ci NOT NULL,
  `laboratorio` text COLLATE utf8_spanish_ci NOT NULL,
  `posologia` text COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_de_cultivo` int(11) NOT NULL,
  `restricciones` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO productos_agricolas VALUES("2","10","Maiz","maiceu","descricion de uso del maiz","semilla","seminaca","posologia del maiz","1","restringido","no tiene");



DROP TABLE IF EXISTS proveedores;

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `rif` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion_fisica` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `direcion_fiscal` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `contacto` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_contacto` text COLLATE utf8_spanish_ci NOT NULL,
  `correo_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `correo_contacto` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO proveedores VALUES("10","Systems Ruiz","21311195-A","Tucupido Calle madariaga","Activo","casa SN","04243015112","Arnaldo Ruiz","04243015112","aerchd@gmail.com","arnaldoruiz@gmail.com");



DROP TABLE IF EXISTS tipo_de_siembra;

CREATE TABLE `tipo_de_siembra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_de_siembra` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tipo_de_siembra VALUES("3","Semilleros");
INSERT INTO tipo_de_siembra VALUES("5","Línea o Hileras");
INSERT INTO tipo_de_siembra VALUES("6","Voleo");
INSERT INTO tipo_de_siembra VALUES("7","Tresbolillo");
INSERT INTO tipo_de_siembra VALUES("8","Hoyos o a Chorrillo");



DROP TABLE IF EXISTS tipo_de_usuario;

CREATE TABLE `tipo_de_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tipo_de_usuario VALUES("1","Administrador");
INSERT INTO tipo_de_usuario VALUES("2","Representante");
INSERT INTO tipo_de_usuario VALUES("3","Contador");
INSERT INTO tipo_de_usuario VALUES("4","Agrónomo");
INSERT INTO tipo_de_usuario VALUES("5","Capataz");
INSERT INTO tipo_de_usuario VALUES("6","Trabajador");



DROP TABLE IF EXISTS tipos_de_cultivos;

CREATE TABLE `tipos_de_cultivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_de_cultivo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tipos_de_cultivos VALUES("1","Cerelaes");
INSERT INTO tipos_de_cultivos VALUES("2","Leguminosas");
INSERT INTO tipos_de_cultivos VALUES("3","Oleaginosas");
INSERT INTO tipos_de_cultivos VALUES("4","Hortalizas");
INSERT INTO tipos_de_cultivos VALUES("5","Frutales");
INSERT INTO tipos_de_cultivos VALUES("6","Ornamentales");
INSERT INTO tipos_de_cultivos VALUES("7","Raíces y tubérculos");
INSERT INTO tipos_de_cultivos VALUES("8","Para Bebidas Medicinales y Aromáticas");
INSERT INTO tipos_de_cultivos VALUES("9","Cultivos Comerciales");
INSERT INTO tipos_de_cultivos VALUES("10","Pastos");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `cedula` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `tiene_hijos` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `tiene_contrato` text COLLATE utf8_spanish_ci NOT NULL,
  `sueldo` float NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

INSERT INTO usuarios VALUES("1","admin","admin","Administrador","General","00000000","Administrador","2025-01-14","NO","Administrador","2025-01-14","SI","700","1");



SET FOREIGN_KEY_CHECKS=1;