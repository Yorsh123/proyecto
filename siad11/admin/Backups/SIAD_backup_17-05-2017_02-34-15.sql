DROP TABLE IF EXISTS asignaciones;

CREATE TABLE `asignaciones` (
  `idAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idTurno` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `NumeroAsignacion` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idAsignatura` (`idAsignatura`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idTurno` (`idTurno`),
  KEY `idHorario` (`idHorario`),
  CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`),
  CONSTRAINT `asignaciones_ibfk_4` FOREIGN KEY (`idTurno`) REFERENCES `turnos` (`idTurno`),
  CONSTRAINT `asignaciones_ibfk_5` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO asignaciones VALUES("1","Segunda Asignacion","1","1","1","1","1","1","54321");
INSERT INTO asignaciones VALUES("4","Asignacion III","2","1","1","1","1","1","54321");
INSERT INTO asignaciones VALUES("5","Asignacion IV","2","3","2","1","1","1","123456");


DROP TABLE IF EXISTS asignaturas;

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAsignatura` varchar(50) NOT NULL,
  `Idcarrera` int(11) NOT NULL,
  `Idyear` int(11) NOT NULL,
  `Idcuatrimestre` int(11) NOT NULL,
  PRIMARY KEY (`idAsignatura`),
  KEY `Idcarrera` (`Idcarrera`),
  KEY `Idyear` (`Idyear`),
  KEY `Idcuatrimestre` (`Idcuatrimestre`),
  CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`Idcarrera`) REFERENCES `carreras` (`idCarrera`),
  CONSTRAINT `asignaturas_ibfk_2` FOREIGN KEY (`Idyear`) REFERENCES `years_academicos` (`idYearAcademico`),
  CONSTRAINT `asignaturas_ibfk_3` FOREIGN KEY (`Idcuatrimestre`) REFERENCES `cuatrimestres` (`idCuatrimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO asignaturas VALUES("1","Ingeniera de Software II","2","3","1");
INSERT INTO asignaturas VALUES("2","Base de Datos I","2","2","2");
INSERT INTO asignaturas VALUES("3","Produccion 2","1","1","1");


DROP TABLE IF EXISTS carreras;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(50) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO carreras VALUES("1","Ingenieria de Sistemas");
INSERT INTO carreras VALUES("2","Lic. en Computacion");
INSERT INTO carreras VALUES("3","Administracion de Empresas");


DROP TABLE IF EXISTS cuatrimestres;

CREATE TABLE `cuatrimestres` (
  `idCuatrimestre` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCuatrimestre` varchar(50) NOT NULL,
  PRIMARY KEY (`idCuatrimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO cuatrimestres VALUES("1","Cuatrimestre I");
INSERT INTO cuatrimestres VALUES("2","Cuatrimestre II");
INSERT INTO cuatrimestres VALUES("3","Cuatrimestre III");


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO docentes VALUES("1","Juan Jose","Perez Borge","326-040489-0000W","juan@gmail.com","388484","38485","Camoapa","0","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("2","Carlos Antonio","Roa Menez","363-0404089-000w","carlos@gmail.com","458585","3848585","Del Parque 2C. al Norte del Parque de Camoapa","1","images/fotos_perfil/eli.jpg");
INSERT INTO docentes VALUES("3","Julio","Gomez","125-040489-000D","julio@gmail.com","34566","495969","Managua","1","images/fotos_perfil/perfil.jpg");


DROP TABLE IF EXISTS entrega_tareas;

CREATE TABLE `entrega_tareas` (
  `idEntregaTareas` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoTareaDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `CodigoEnvioTarea` int(11) NOT NULL,
  `Archivo` varchar(200) NOT NULL,
  PRIMARY KEY (`idEntregaTareas`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `entrega_tareas_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`),
  CONSTRAINT `entrega_tareas_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO entrega_tareas VALUES("2","28283","2","2","Nada","96978","test.pdf");
INSERT INTO entrega_tareas VALUES("3","8585","1","1","Probando entrega tarea","49596","6 Inventarios.pdf");
INSERT INTO entrega_tareas VALUES("4","49595","1","2","fjfjf","42","Capítulo 10.pdf");
INSERT INTO entrega_tareas VALUES("5","4949","1","1","rkr","44836","Capitulo2conceptito.pdf");
INSERT INTO entrega_tareas VALUES("6","49595","1","1","ririt","73185","Capitulo3conceptito.pdf");
INSERT INTO entrega_tareas VALUES("7","2345","1","1","eirit","740210","Capitulo3conceptito.pdf");
INSERT INTO entrega_tareas VALUES("8","4959","1","1","dkfkgk","963903","Capitulo3conceptito.pdf");
INSERT INTO entrega_tareas VALUES("9","33","1","1","rrr","9172","Capitulo2conceptito.pdf");
INSERT INTO entrega_tareas VALUES("11","2345","1","3","Probando entrega tarea","8485","Capitulo3conceptito.pdf");
INSERT INTO entrega_tareas VALUES("12","123","1","1","prueba 2","32538","08_1421_IN.pdf");
INSERT INTO entrega_tareas VALUES("13","3485","1","1","djfjf","70597","Capitulo2conceptito.pdf");
INSERT INTO entrega_tareas VALUES("14","39495","1","1","eirir","569587","08_1421_IN.pdf");
INSERT INTO entrega_tareas VALUES("16","3566","1","1","probando limpiar acentos","68782","Dosificacion Mercadotecnia - I Semestre 2017.pdf");
INSERT INTO entrega_tareas VALUES("17","39449","1","1","prueba 2 de limpiada de acentos","762488","Dosificacion Mercadotecnia - I Semestre 2017.pdf");
INSERT INTO entrega_tareas VALUES("18","233949","1","1","prueba 3 de limpiada de acentos","833340","Dosificacion Mercadotecnia - I Semestre 2017.pdf");
INSERT INTO entrega_tareas VALUES("19","123","2","1","Prueba word","307021","Backup y restauracion de BD mysql con php.doc");


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
  `Estado` int(1) NOT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `IdGrupo` (`IdGrupo`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO estudiantes VALUES("1","2012-0003j","Juan Pablo","Corea Martinez","362-040489-0000w","elier.aries@gmail.com","23455","11111111","Managua","0","2","images/fotos_perfil/foto_juan.png");
INSERT INTO estudiantes VALUES("2","2014-0304K","Carlos Jose","Roa Gomez","126-03949-000J","carlos@gmail.com","4567","56789","Camoapa","1","1","images/fotos_perfil/dragon-azul-fondos-pantalla-abstractos_328569.jpg");
INSERT INTO estudiantes VALUES("3","2015-009L","Joel Antonio","Perez","365-039495-004","joel@yahoo.es","57889","34566","Juigalpa","1","2","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("4","2012-345J","Jose","Gomez","363-0305678-000t","jose@gmail.com","4585","49596","Juigalapa","1","1","");
INSERT INTO estudiantes VALUES("5","2012-345J","Pedro","Gomez","363-0305678-000t","Pedro@yahoo.es","39459","59596","Juigalapa","1","1","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("6","2012-345J","Margarita","Perez","128-040489-000L","margarita@gmail.com","45996","495969","Managua","1","1","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("7","2012-345J","Javier Antonio","Rocha Garcia","128-040489-000K","antonio@gmail.com","38485","34495","Managua","1","1","images/fotos_perfil/material-didactico.png");


DROP TABLE IF EXISTS evaluaciones;

CREATE TABLE `evaluaciones` (
  `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `Puntaje` int(11) NOT NULL,
  `FechaEvaluacion` date NOT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `evaluaciones_ibfk_2` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`),
  CONSTRAINT `evaluaciones_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO evaluaciones VALUES("1","Evaluacion I","1","2","Unidad I","Tarea I","1","23","2017-05-04");
INSERT INTO evaluaciones VALUES("2","Evaluacion II","1","1","Unidad II","Tarea III","2","12","2017-04-02");
INSERT INTO evaluaciones VALUES("3","Evaluacion a Carlos","2","2","Unidad II","Tarea del Sabado","2","23","2017-04-26");
INSERT INTO evaluaciones VALUES("6","eirir","1","1","U34","ejeir","2","89","2017-04-29");


DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO grupos VALUES("1","001","Grupo I");
INSERT INTO grupos VALUES("2","002","Grupo II");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreHorario` varchar(50) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO horarios VALUES("1","7:00 AM - 08:45 AM");
INSERT INTO horarios VALUES("2","08:45 AM - 09:30 AM");
INSERT INTO horarios VALUES("3","9:45 AM - 10:35 AM");
INSERT INTO horarios VALUES("4","8:00 - 9:45 AM");


DROP TABLE IF EXISTS inscripciones_asignaturas;

CREATE TABLE `inscripciones_asignaturas` (
  `idInscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idAsignatura` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `fechaInscripcion` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idInscripcion`),
  KEY `idAsignatura` (`idAsignatura`),
  KEY `idEstudiante` (`idEstudiante`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_1` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_2` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO inscripciones_asignaturas VALUES("1","1","1","2017-04-05","Ninguna");
INSERT INTO inscripciones_asignaturas VALUES("2","2","2","2017-05-08","Ninguna");
INSERT INTO inscripciones_asignaturas VALUES("3","1","1","2017-04-27","");
INSERT INTO inscripciones_asignaturas VALUES("4","3","1","2017-04-28","Esto es una Observacion");
INSERT INTO inscripciones_asignaturas VALUES("5","3","1","2017-04-28","Esto es una Observacion");
INSERT INTO inscripciones_asignaturas VALUES("6","3","1","2017-04-28","Esto es una Observacion");
INSERT INTO inscripciones_asignaturas VALUES("7","3","1","2017-04-28","Esto es una Observacion");
INSERT INTO inscripciones_asignaturas VALUES("9","3","1","2017-04-28","Esto es una Observacion");
INSERT INTO inscripciones_asignaturas VALUES("10","3","2","2017-05-08","Esto es una Observacion");


DROP TABLE IF EXISTS material_didactico;

CREATE TABLE `material_didactico` (
  `idMaterialDidactico` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  `Archivo` varchar(200) NOT NULL,
  `CodigoMaterial` int(11) NOT NULL,
  `Fecha_subida` date DEFAULT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  PRIMARY KEY (`idMaterialDidactico`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idDocente` (`idDocente`),
  CONSTRAINT `material_didactico_ibfk_1` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`),
  CONSTRAINT `material_didactico_ibfk_2` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO material_didactico VALUES("2","prueba 4","Introd_MODELOS DE INVENTARIO_2004.pdf","48585","2017-04-20","1","2");
INSERT INTO material_didactico VALUES("3","Archivo docente 1","control.pdf","3455","2017-04-20","1","2");
INSERT INTO material_didactico VALUES("4","docente2","Capitulo3conceptito.pdf","38485","2017-04-20","1","2");
INSERT INTO material_didactico VALUES("5","38485","Introd_MODELOS DE INVENTARIO_2004.pdf","38485","2017-04-20","1","2");
INSERT INTO material_didactico VALUES("6","Tarea de clases","Tema- 09 OEI Gestion de inventarios-deterministicos grafica.pdf","49595","2017-04-20","1","1");
INSERT INTO material_didactico VALUES("7","alertas","08_1421_IN.pdf","238384","2017-04-25","1","2");
INSERT INTO material_didactico VALUES("8","ddff","Backup y restauracion de BD mysql con php.doc","455","2017-05-08","1","2");
INSERT INTO material_didactico VALUES("9","fjggj","Manual de Usuario de Mamografia.docx","485856","2017-05-08","1","2");


DROP TABLE IF EXISTS mensajes;

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `Remitente` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Mensaje` varchar(500) NOT NULL,
  `FechaEnvio` date NOT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO mensajes VALUES("1","Elier Rocha","elier.aries@gmail.com","Hola. estoy probando la aplicacion web","2017-05-07");
INSERT INTO mensajes VALUES("2","Juan Jose","eeee@dfgg","sdfgg","2017-05-07");


DROP TABLE IF EXISTS niveles;

CREATE TABLE `niveles` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `NombreNivel` varchar(50) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO niveles VALUES("1","Administrador");
INSERT INTO niveles VALUES("2","Docente");
INSERT INTO niveles VALUES("3","Estudiante");


DROP TABLE IF EXISTS numeros_asignaciones;

CREATE TABLE `numeros_asignaciones` (
  `idNumeroAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `numeroAsignado` int(11) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  PRIMARY KEY (`idNumeroAsignacion`),
  KEY `IdDocente` (`IdDocente`),
  CONSTRAINT `numeros_asignaciones_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO numeros_asignaciones VALUES("1","34556123","1");
INSERT INTO numeros_asignaciones VALUES("2","4566123","2");
INSERT INTO numeros_asignaciones VALUES("3","34566","2");
INSERT INTO numeros_asignaciones VALUES("4","123123","2");
INSERT INTO numeros_asignaciones VALUES("5","123456","1");
INSERT INTO numeros_asignaciones VALUES("6","987654","2");


DROP TABLE IF EXISTS plan_estudio;

CREATE TABLE `plan_estudio` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idYear` int(11) NOT NULL,
  `idCuatrimestre` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `idCarrera` (`idCarrera`),
  KEY `idYear` (`idYear`),
  KEY `idCuatrimestre` (`idCuatrimestre`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`),
  CONSTRAINT `plan_estudio_ibfk_2` FOREIGN KEY (`idYear`) REFERENCES `years_academicos` (`idYearAcademico`),
  CONSTRAINT `plan_estudio_ibfk_3` FOREIGN KEY (`idCuatrimestre`) REFERENCES `cuatrimestres` (`idCuatrimestre`),
  CONSTRAINT `plan_estudio_ibfk_4` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO plan_estudio VALUES("1","plan 1","1","2","2","1");


DROP TABLE IF EXISTS planificacion_tareas;

CREATE TABLE `planificacion_tareas` (
  `idPlanificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `DescripcionUnidad` varchar(200) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `DescripcionTarea` varchar(200) NOT NULL,
  `FechaPublicacion` date NOT NULL,
  `FechaPresentacion` date NOT NULL,
  `CodigoTarea` int(11) NOT NULL,
  PRIMARY KEY (`idPlanificacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `planificacion_tareas_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `planificacion_tareas_ibfk_2` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`),
  CONSTRAINT `planificacion_tareas_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO planificacion_tareas VALUES("1","1","2","2","I","Buena Unidad","Tarea I","Buena Tarea","2017-04-09","2017-04-10","123");
INSERT INTO planificacion_tareas VALUES("2","1","1","1","Unidad I","djdjfjf","tarea 2","eiriti","2017-04-20","2017-04-20","234");
INSERT INTO planificacion_tareas VALUES("3","2","4","3","Unidad V","Cambiando registro","cambio registro","cambio registro","2017-04-29","2017-04-29","23");


DROP TABLE IF EXISTS turnos;

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTurno` varchar(50) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO turnos VALUES("1","Sabatino");
INSERT INTO turnos VALUES("2","Diurno");
INSERT INTO turnos VALUES("3","Nocturno");


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("1","elier","elier123","1","777","images/fotos_perfil/eli.jpg");
INSERT INTO usuarios VALUES("2","docente","docente123","2","2","");
INSERT INTO usuarios VALUES("3","juan@gmail.com","326-040489-0000W","2","1","");
INSERT INTO usuarios VALUES("5","juan@gmail.com","326-040489-0000W","3","1","");
INSERT INTO usuarios VALUES("6","estudiante2","estudiante2","3","2","");
INSERT INTO usuarios VALUES("7","antonio@gmail.com","128-040489-000K","3","7","");
INSERT INTO usuarios VALUES("9","juan@gmail.com","326-040489-0000W","1","1","");
INSERT INTO usuarios VALUES("10","Jose","jose123","1","23","images/fotos_perfil/perfil.jpg");


DROP TABLE IF EXISTS years_academicos;

CREATE TABLE `years_academicos` (
  `idYearAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreYear` varchar(50) NOT NULL,
  PRIMARY KEY (`idYearAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO years_academicos VALUES("1","1ro");
INSERT INTO years_academicos VALUES("2","2do");
INSERT INTO years_academicos VALUES("3","3ro");


