DROP DATABASE IF EXISTS `gestionConsultasDB`;

CREATE DATABASE `gestionConsultasDB`;

USE `gestionConsultasDB`;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
	`legajo` INT NOT NULL,
	`nombre` VARCHAR(255) NULL DEFAULT NULL,
	`apellido` VARCHAR(255) NULL DEFAULT NULL,
	`email` VARCHAR(255) NULL DEFAULT NULL,
	`password` VARCHAR(255) NULL DEFAULT NULL,
    PRIMARY KEY (`legajo`)
);

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE `consulta` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`fecha_hora_inicio` DATETIME NULL DEFAULT NULL,
    `fecha_hora_fin` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    `modalidad` VARCHAR(255) NULL DEFAULT NULL,
    `link` VARCHAR(255) NULL DEFAULT NULL,
    `profesor_legajo` INT NULL DEFAULT NULL,
    `cupo` INT NULL DEFAULT NULL,
    `materia_id` INT NULL DEFAULT NULL,
    `estado` TINYINT(1) NULL DEFAULT '1',
    `motivo_bloqueo` VARCHAR(100) NULL DEFAULT NULL,
    `fecha_hora_reprogramada` DATETIME NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`profesor_legajo`) REFERENCES `usuario` (`legajo`),
    CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`)
);

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE `inscripcion` (
    `nro` INT NOT NULL AUTO_INCREMENT,
    `consulta_id` INT NULL DEFAULT NULL,
    `alumno_id` INT NULL DEFAULT NULL,
    `fecha_inscripcion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    `estado_id` TINYINT(1) NULL DEFAULT '0',
    PRIMARY KEY (`nro`),
    CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
    CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `usuario` (`legajo`)
);

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(255) NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE `usuario_rol` (
    `usuario_legajo` INT NOT NULL,
    `rol_id` INT NOT NULL,
    PRIMARY KEY (`usuario_legajo`, `rol_id`),
    CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`usuario_legajo`)
    REFERENCES `usuario` (`legajo`), 
    CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
);

INSERT INTO materia (`nombre`) VALUES ("Fisica 2");
INSERT INTO materia (`nombre`) VALUES ("Fisica");
INSERT INTO materia (`nombre`) VALUES ("Analisis Matematico 2");
INSERT INTO materia (`nombre`) VALUES ("Analisis Matematico");
INSERT INTO materia (`nombre`) VALUES ("Analisis de sistemas");
INSERT INTO materia (`nombre`) VALUES ("Diseño de sistemas");
INSERT INTO materia (`nombre`) VALUES ("Administracion de recursos");
INSERT INTO materia (`nombre`) VALUES ("Quimica");
INSERT INTO materia (`nombre`) VALUES ("Algebra y Geometria Analitica");
INSERT INTO materia (`nombre`) VALUES ("Sistemas Operativos");
INSERT INTO materia (`nombre`) VALUES ("Matematica Superior");

INSERT INTO rol(`descripcion`) VALUES ("Admin"), ("Alumno"), ("Profesor");

INSERT INTO usuario (`legajo`, `nombre`, `apellido`, `email`, `password`) VALUES (11111, "Admin", "Admin", "admin@gmail.com", "21232f297a57a5a743894a0e4a801fc3" ); 
INSERT INTO usuario (`legajo`, `nombre`, `apellido`, `email`, `password`) VALUES (11222, "Alumno", "Alumno", "alumno@gmail.com", "c6865cf98b133f1f3de596a4a2894630");
INSERT INTO usuario (`legajo`, `nombre`, `apellido`, `email`, `password`) VALUES (11331, "Profesor", "Profesor", "profesor@gmail.com", "793741d54b00253006453742ad4ed534");
INSERT INTO usuario (`legajo`, `nombre`, `apellido`, `email`, `password`) VALUES (11332, "Profesor2", "Profesor2", "profesor2@gmail.com", "793741d54b00253006453742ad4ed534");

INSERT INTO usuario_rol (`usuario_legajo`, `rol_id`) VALUES (11111, 1), (11222, 2), (11331, 3), (11332, 3);
