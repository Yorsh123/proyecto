DROP TABLE IF EXISTS asignaciones;

CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `idAsignacion` int(11) DEFAULT NULL,
  `NumeroAsignacion` varchar(50) DEFAULT NULL,
  `idDocente` int(11) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idTurno` int(11) DEFAULT NULL,
  `idHorario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO asignaciones VALUES("1","","0000-00-00","hola","","","1","4","0","2","4","2");
INSERT INTO asignaciones VALUES("2","","0000-00-00","soldadura","","","1","3","0","2","3","2");
INSERT INTO asignaciones VALUES("3","","0000-00-00","tardes","","","1","1","0","2","3","2");
INSERT INTO asignaciones VALUES("4","","0000-00-00","1","activo","","1","3","0","2","3","3");


DROP TABLE IF EXISTS asignaturas;

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `NombreAsignatura` varchar(100) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL,
  `IdCarrera` int(11) DEFAULT NULL,
  `IdCuatrimestre` int(11) DEFAULT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO asignaturas VALUES("6","Asignatura 1","Descripción 1","Nombre Asignatura 1","","1","1","1");
INSERT INTO asignaturas VALUES("7","Asignatura 2","Descripción 2","Nombre Asignatura 2","","2","2","2");
INSERT INTO asignaturas VALUES("8","Asignatura 3","Descripción 3","Nombre Asignatura 3","","3","3","3");
INSERT INTO asignaturas VALUES("9","Asignatura 4","Descripción 4","Nombre Asignatura 4","","4","4","4");
INSERT INTO asignaturas VALUES("10","Asignatura 5","Descripción 5","Nombre Asignatura 5","","5","5","5");
INSERT INTO asignaturas VALUES("11","Asignatura 6","Descripción 6","Nombre Asignatura 1","","6","6","6");
INSERT INTO asignaturas VALUES("12","Asignatura 7","Descripción 7","Nombre Asignatura 2","","7","7","7");
INSERT INTO asignaturas VALUES("13","Asignatura 8","Descripción 8","Nombre Asignatura 3","","8","8","8");
INSERT INTO asignaturas VALUES("14","Asignatura 9","Descripción 9","Nombre Asignatura 4","","9","9","9");
INSERT INTO asignaturas VALUES("15","Asignatura 10","Descripción 10","Nombre Asignatura 5","","10","10","10");
INSERT INTO asignaturas VALUES("16","Asignatura 6","Descripción 6","Nombre Asignatura 1","","6","6","6");
INSERT INTO asignaturas VALUES("17","Asignatura 7","Descripción 7","Nombre Asignatura 2","","7","7","7");
INSERT INTO asignaturas VALUES("18","Asignatura 8","Descripción 8","Nombre Asignatura 3","","8","8","8");
INSERT INTO asignaturas VALUES("19","Asignatura 9","Descripción 9","Nombre Asignatura 4","","9","9","9");
INSERT INTO asignaturas VALUES("20","Asignatura 10","Descripción 10","Nombre Asignatura 5","","10","10","10");
INSERT INTO asignaturas VALUES("21","","","1","","1","1","2");


DROP TABLE IF EXISTS carreras;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(50) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO carreras VALUES("1","confeccion de calzados");
INSERT INTO carreras VALUES("4","soldadura");
INSERT INTO carreras VALUES("5","programacion");


DROP TABLE IF EXISTS cuatrimestres;

CREATE TABLE `cuatrimestres` (
  `idCuatrimestre` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCuatrimestre` varchar(50) NOT NULL,
  PRIMARY KEY (`idCuatrimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO cuatrimestres VALUES("1","primero");
INSERT INTO cuatrimestres VALUES("3","segundo");


DROP TABLE IF EXISTS docentes;

CREATE TABLE `docentes` (
  `idDocente` int(11) NOT NULL AUTO_INCREMENT,
  `NombresDocente` varchar(50) NOT NULL,
  `ApellidosDocente` varchar(50) NOT NULL,
  `CedulaDocente` varchar(16) NOT NULL,
  `CorreoDocente` varchar(50) NOT NULL,
  `CelularDocente` varchar(8) NOT NULL,
  `TelefonoDocente` varchar(8) NOT NULL,
  `DireccionDocente` varchar(250) NOT NULL,
  `Estado` int(1) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO docentes VALUES("1","John","Doe","1234567890","johndoe@example.com","12345678","98765432","123 Main St","1","foto_docente.jpg");
INSERT INTO docentes VALUES("3","julissa melannie","chaves","1234","julissamelannie@gmail.com","98542015","5147882","AV.BOLF","1","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("5","soledad","mamani quispe","1234","jua@gmail.com","98542015","5147882","av, gl","1","images/fotos_perfil/perfil.jpg");


DROP TABLE IF EXISTS entrega_tareas;

CREATE TABLE `entrega_tareas` (
  `idEntregaTareas` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoTareaDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `CodigoEnvioTarea` int(11) NOT NULL,
  `Archivo` varchar(200) NOT NULL,
  `FechaEntrega` date DEFAULT NULL,
  PRIMARY KEY (`idEntregaTareas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS estudiantes;

CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `CarnetEstudiante` varchar(10) NOT NULL,
  `NombresEstudiante` varchar(50) NOT NULL,
  `ApellidosEstudiante` varchar(50) NOT NULL,
  `CedulaEstudiante` varchar(16) NOT NULL,
  `CorreoEstudiante` varchar(50) NOT NULL,
  `CelularEstudiante` varchar(8) NOT NULL,
  `TelefonoEstudiante` varchar(8) NOT NULL,
  `DireccionEstudiante` varchar(250) NOT NULL,
  `Estado` int(10) NOT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `IdGrupo` (`IdGrupo`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO estudiantes VALUES("2","1396980","juan","chaves","1234","julissamelannie@gmail.com","98542015","5147882","av bolognesi","1","2","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("3","1296980","pepit","oamr","4321","jua@gmail.com","92342015","53133182","avloso.olicoos","1","2","images/fotos_perfil/perfil.jpg");


DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO grupos VALUES("2","1","armonia 10");
INSERT INTO grupos VALUES("3","2","las mariposas");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreHorario` varchar(50) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO horarios VALUES("2","tardes");
INSERT INTO horarios VALUES("3","mañana");
INSERT INTO horarios VALUES("4","noche");


DROP TABLE IF EXISTS inscripciones_asignaturas;

CREATE TABLE `inscripciones_asignaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEstudiante` int(11) DEFAULT NULL,
  `asignatura` varchar(100) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `idInscripcion` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO inscripciones_asignaturas VALUES("1","1396980","","2023-05-31","","todas","1","0");
INSERT INTO inscripciones_asignaturas VALUES("2","1396980","","2023-05-31","","todas","1","0");


DROP TABLE IF EXISTS material_didactico;

CREATE TABLE `material_didactico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `idDocente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idDocente` (`idDocente`),
  CONSTRAINT `material_didactico_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS mensajes;

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remitente` varchar(50) NOT NULL,
  `destinatario` varchar(50) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_envio` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS niveles;

CREATE TABLE `niveles` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `NombreNivel` varchar(50) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO niveles VALUES("1","Administrador");
INSERT INTO niveles VALUES("2","Docente");
INSERT INTO niveles VALUES("3","estudiante");


DROP TABLE IF EXISTS numeros_asignaciones;

CREATE TABLE `numeros_asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_asignacion` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `descripcion` text DEFAULT NULL,
  `idNumeroAsignacion` int(11) DEFAULT NULL,
  `numeroAsignado` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO numeros_asignaciones VALUES("1","","0000-00-00","","","1","3");


DROP TABLE IF EXISTS plan_estudio;

CREATE TABLE `plan_estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `idPlan` int(11) DEFAULT NULL,
  `CantidadAsignaturas` int(11) DEFAULT NULL,
  `idcarrera` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO plan_estudio VALUES("1","","mates","0000-00-00","0","","1","4","");
INSERT INTO plan_estudio VALUES("2","","soldadura","0000-00-00","0","","2","1","");


DROP TABLE IF EXISTS turnos;

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTurno` varchar(50) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO turnos VALUES("3","tardes");
INSERT INTO turnos VALUES("4","mañana");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `idUsuario` smallint(6) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) NOT NULL,
  `PassUsuario` varchar(150) NOT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `NivelUsuario` (`NivelUsuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`NivelUsuario`) REFERENCES `niveles` (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuarios VALUES("3","nombre_admin","contraseña_admin","1","123456","");
INSERT INTO usuarios VALUES("4","admin","contraseña","1","1234","images/fotos_perfil/admin.jpg");
INSERT INTO usuarios VALUES("5","docente","contraseñaDocente","2","123456","");
INSERT INTO usuarios VALUES("6","estudiante","contraseñaEstudiante","3","12345","");
INSERT INTO usuarios VALUES("7","julissamelannie@gmail.com","1234","2","2","");
INSERT INTO usuarios VALUES("8","julissamelannie@gmail.com","1234","2","3","");
INSERT INTO usuarios VALUES("9","julissamelannie@gmail.com","1234","2","4","");
INSERT INTO usuarios VALUES("10","julissamelannie@gmail.com","1234","3","1","");
INSERT INTO usuarios VALUES("11","julissamelannie@gmail.com","1234","3","2","");
INSERT INTO usuarios VALUES("12","jua@gmail.com","4321","3","3","");
INSERT INTO usuarios VALUES("13","jua@gmail.com","1234","2","5","");


DROP TABLE IF EXISTS years_academicos;

CREATE TABLE `years_academicos` (
  `idYearAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreYear` varchar(50) NOT NULL,
  PRIMARY KEY (`idYearAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO years_academicos VALUES("2","2023_20");
INSERT INTO years_academicos VALUES("3","2023_10");
INSERT INTO years_academicos VALUES("4","2024_1");


