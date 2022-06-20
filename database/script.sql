DROP DATABASE IF EXISTS `gestion-consultas-db`;
CREATE DATABASE `gestion-consultas-db`
/*!40100 DEFAULT CHARACTER SET utf8mb4 */
;
USE `gestion-consultas-db`;
CREATE TABLE `usuario` (
  `legajo` INT PRIMARY KEY,
  `nombre` VARCHAR(255),
  `apellido` VARCHAR(255),
  `email` VARCHAR(255),
  `password` VARCHAR(255)
);
CREATE TABLE `rol` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `descripcion` VARCHAR(255)
);
CREATE TABLE `consulta` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `fecha_hora_inicio` DATETIME,
  `fecha_hora_fin` DATETIME,
  `modalidad` VARCHAR(255),
  `link` VARCHAR(255),
  `profesor_legajo` INT,
  `cupo` INT,
  `materia_id` INT
);
CREATE TABLE `inscripcion` (
  `nro` INT PRIMARY KEY AUTO_INCREMENT,
  `consulta_id` INT,
  `alumno_id` INT,
  `fecha_inscripcion` DATE,
  `estado_id` INT
);
CREATE TABLE `estado` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `descripcion` VARCHAR(255)
);
CREATE TABLE `materia` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nombre` VARCHAR(255)
);
CREATE TABLE `usuario_rol` (
  `usuario_legajo` INT NOT NULL,
  `rol_id` INT NOT NULL,
  PRIMARY KEY (`usuario_legajo`, `rol_id`)
);
ALTER TABLE `usuario_rol`
ADD FOREIGN KEY (`usuario_legajo`) REFERENCES `usuario` (`legajo`);
ALTER TABLE `usuario_rol`
ADD FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);
ALTER TABLE `consulta`
ADD FOREIGN KEY (`profesor_legajo`) REFERENCES `usuario` (`legajo`);
ALTER TABLE `inscripcion`
ADD FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`);
ALTER TABLE `inscripcion`
ADD FOREIGN KEY (`alumno_id`) REFERENCES `usuario` (`legajo`);
ALTER TABLE `inscripcion`
ADD FOREIGN KEY (`nro`) REFERENCES `estado` (`id`);
ALTER TABLE `consulta`
ADD FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`);
LOCK TABLE `materia` WRITE;
INSERT INTO materia (`nombre`)
VALUES ("Fisica 2");
INSERT INTO materia (`nombre`)
VALUES ("Fisica");
INSERT INTO materia (`nombre`)
VALUES ("Analisis Matematico 2");
INSERT INTO materia (`nombre`)
VALUES ("Analisis Matematico");
INSERT INTO materia (`nombre`)
VALUES ("Analisis de sistemas");
INSERT INTO materia (`nombre`)
VALUES ("Diseño de sistemas");
INSERT INTO materia (`nombre`)
VALUES ("Administracion de recursos");
INSERT INTO materia (`nombre`)
VALUES ("Quimica");
INSERT INTO materia (`nombre`)
VALUES ("Algebra y Geometria Analitica");
INSERT INTO materia (`nombre`)
VALUES ("Sistemas Operativos");
INSERT INTO materia (`nombre`)
VALUES ("Matematica Superior");
UNLOCK TABLES;
LOCK TABLE `rol` WRITE;
INSERT INTO rol(`descripcion`)
VALUES ("Admin"),
  ("Alumno"),
  ("Profesor");
UNLOCK TABLES;
LOCK TABLE `estado` WRITE;
INSERT INTO estado (descripcion)
VALUES ("Pendiente"),
  ("Confirmado"),
  ("Cancelado");
UNLOCK TABLES;
LOCK TABLE `usuario` WRITE;
INSERT INTO usuario (
    `legajo`,
    `nombre`,
    `apellido`,
    `email`,
    `password`
  )
VALUES (
    11111,
    "Admin",
    "Admin",
    "admin@gmail.com",
    "admin"
  );
INSERT INTO usuario (
    `legajo`,
    `nombre`,
    `apellido`,
    `email`,
    `password`
  )
VALUES (
    11222,
    "Alumno",
    "Alumno",
    "alumno@gmail.com",
    "alumno"
  );
INSERT INTO usuario (
    `legajo`,
    `nombre`,
    `apellido`,
    `email`,
    `password`
  )
VALUES (
    11333,
    "Profesor",
    "Profesor",
    "profesor@gmail.com",
    "profesor"
  );
UNLOCK TABLES;
LOCK TABLE `usuario_rol` WRITE;
INSERT INTO usuario_rol (`usuario_legajo`, `rol_id`)
VALUES (11111, 1),
  (11222, 2),
  (11333, 3);
UNLOCK TABLES;
LOCK TABLE `consulta` WRITE;
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-07 09:00:00",
    "2022-07-07 09:40:00",
    "Presencial",
    "",
    11333,
    5,
    1
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-07 18:00:00",
    "2022-07-07 19:30:00",
    "Presencial",
    "",
    11333,
    5,
    2
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-08 16:00:00",
    "2022-07-08 16:40:00",
    "Virtual",
    "www.zoom.com",
    11333,
    10,
    3
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-09 10:30:00",
    "2022-07-09 11:40:00",
    "Presencial",
    "",
    11333,
    7,
    4
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-09 13:40:00",
    "2022-07-07 15:00:00",
    "Virtual",
    "www.zoom.com",
    11333,
    10,
    5
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-09 19:00:00",
    "2022-07-09 21:15:00",
    "Virtual",
    "www.zoom.com",
    11333,
    8,
    6
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-11 09:00:00",
    "2022-07-11 10:00:00",
    "Presencial",
    "",
    11333,
    4,
    7
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-15 08:20:00",
    "2022-07-15 09:00:00",
    "Virtual",
    "www.zoom.com",
    11333,
    11,
    8
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-21 17:00:00",
    "2022-07-21 18:40:00",
    "Presencial",
    "",
    11333,
    10,
    9
  );
INSERT INTO consulta (
    `fecha_hora_inicio`,
    `fecha_hora_fin`,
    `modalidad`,
    `link`,
    `profesor_legajo`,
    `cupo`,
    `materia_id`
  )
VALUES (
    "2022-07-21 20:15:00",
    "2022-07-21 22:00:00",
    "Presencial",
    "",
    11333,
    5,
    10
  );
UNLOCK TABLES;