-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2023 a las 17:53:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL,
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
  `idHorario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id`, `nombre`, `fecha_creacion`, `descripcion`, `estado`, `idAsignacion`, `NumeroAsignacion`, `idDocente`, `idAsignatura`, `idGrupo`, `idTurno`, `idHorario`) VALUES
(1, '', '0000-00-00', 'hola', '', NULL, '1', 4, 0, 2, 4, 2),
(2, '', '0000-00-00', 'soldadura', '', NULL, '1', 3, 0, 2, 3, 2),
(3, '', '0000-00-00', 'tardes', '', NULL, '1', 1, 0, 2, 3, 2),
(4, '', '0000-00-00', '1', 'activo', NULL, '1', 3, 0, 2, 3, 3),
(5, '', '0000-00-00', 'armonia 10', 'activo', NULL, '5', 1, 0, 3, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `NombreAsignatura` varchar(100) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL,
  `IdCarrera` int(11) DEFAULT NULL,
  `IdCuatrimestre` int(11) DEFAULT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  `Idyear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombre`, `descripcion`, `NombreAsignatura`, `idAsignatura`, `IdCarrera`, `IdCuatrimestre`, `IdGrupo`, `Idyear`) VALUES
(6, 'Asignatura 1', 'Descripción 1', 'Nombre Asignatura 1', NULL, 1, 1, 1, NULL),
(7, 'Asignatura 2', 'Descripción 2', 'Nombre Asignatura 2', NULL, 2, 2, 2, NULL),
(8, 'Asignatura 3', 'Descripción 3', 'Nombre Asignatura 3', NULL, 3, 3, 3, NULL),
(9, 'Asignatura 4', 'Descripción 4', 'Nombre Asignatura 4', NULL, 4, 4, 4, NULL),
(10, 'Asignatura 5', 'Descripción 5', 'Nombre Asignatura 5', NULL, 5, 5, 5, NULL),
(11, 'Asignatura 6', 'Descripción 6', 'Nombre Asignatura 1', NULL, 6, 6, 6, NULL),
(12, 'Asignatura 7', 'Descripción 7', 'Nombre Asignatura 2', NULL, 7, 7, 7, NULL),
(13, 'Asignatura 8', 'Descripción 8', 'Nombre Asignatura 3', NULL, 8, 8, 8, NULL),
(14, 'Asignatura 9', 'Descripción 9', 'Nombre Asignatura 4', NULL, 9, 9, 9, NULL),
(15, 'Asignatura 10', 'Descripción 10', 'Nombre Asignatura 5', NULL, 10, 10, 10, NULL),
(16, 'Asignatura 6', 'Descripción 6', 'Nombre Asignatura 1', NULL, 6, 6, 6, NULL),
(17, 'Asignatura 7', 'Descripción 7', 'Nombre Asignatura 2', NULL, 7, 7, 7, NULL),
(18, 'Asignatura 8', 'Descripción 8', 'Nombre Asignatura 3', NULL, 8, 8, 8, NULL),
(19, 'Asignatura 9', 'Descripción 9', 'Nombre Asignatura 4', NULL, 9, 9, 9, NULL),
(20, 'Asignatura 10', 'Descripción 10', 'Nombre Asignatura 5', NULL, 10, 10, 10, NULL),
(21, NULL, NULL, '1', NULL, 1, 1, 2, NULL),
(22, NULL, NULL, 'matematicas', NULL, 5, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL,
  `NombreCarrera` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`idCarrera`, `NombreCarrera`) VALUES
(1, 'confeccion de calzados'),
(5, 'programacion'),
(6, 'soldadura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuatrimestres`
--

CREATE TABLE `cuatrimestres` (
  `idCuatrimestre` int(11) NOT NULL,
  `NombreCuatrimestre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuatrimestres`
--

INSERT INTO `cuatrimestres` (`idCuatrimestre`, `NombreCuatrimestre`) VALUES
(1, 'primero'),
(3, 'segundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `idDocente` int(11) NOT NULL,
  `NombresDocente` varchar(50) NOT NULL,
  `ApellidosDocente` varchar(50) NOT NULL,
  `CedulaDocente` varchar(16) NOT NULL,
  `CorreoDocente` varchar(50) NOT NULL,
  `CelularDocente` varchar(8) NOT NULL,
  `TelefonoDocente` varchar(8) NOT NULL,
  `DireccionDocente` varchar(250) NOT NULL,
  `Estado` int(1) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`idDocente`, `NombresDocente`, `ApellidosDocente`, `CedulaDocente`, `CorreoDocente`, `CelularDocente`, `TelefonoDocente`, `DireccionDocente`, `Estado`, `Foto`) VALUES
(1, 'John', 'Doe', '1234567890', 'johndoe@example.com', '12345678', '98765432', '123 Main St', 1, 'foto_docente.jpg'),
(3, 'julissa melannie', 'chaves', '1234', 'julissamelannie@gmail.com', '98542015', '5147882', 'AV.BOLF', 1, 'images/fotos_perfil/perfil.jpg'),
(5, 'soledad', 'mamani quispe', '1234', 'jua@gmail.com', '98542015', '5147882', 'av, gl', 1, 'images/fotos_perfil/perfil.jpg'),
(6, 'alex', 'ccondori', '12345', 'jua@gmail.com', '98542015', '5147882', 'f', 1, 'images/fotos_perfil/perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_tareas`
--

CREATE TABLE `entrega_tareas` (
  `idEntregaTareas` int(11) NOT NULL,
  `CodigoTareaDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `CodigoEnvioTarea` int(11) NOT NULL,
  `Archivo` varchar(200) NOT NULL,
  `FechaEntrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL,
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
  `Foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiante`, `CarnetEstudiante`, `NombresEstudiante`, `ApellidosEstudiante`, `CedulaEstudiante`, `CorreoEstudiante`, `CelularEstudiante`, `TelefonoEstudiante`, `DireccionEstudiante`, `Estado`, `IdGrupo`, `Foto`) VALUES
(2, '1396980', 'juan', 'chaves', '1234', 'julissamelannie@gmail.com', '98542015', '5147882', 'av bolognesi', 1, 2, 'images/fotos_perfil/perfil.jpg'),
(3, '1296980', 'pepit', 'oamr', '4321', 'jua@gmail.com', '92342015', '53133182', 'avloso.olicoos', 1, 2, 'images/fotos_perfil/perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `descripcionEvaluacion` text DEFAULT NULL,
  `idDocente` int(11) DEFAULT NULL,
  `idEvaluacion` int(11) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Unidad` varchar(255) DEFAULT NULL,
  `Tarea` varchar(255) DEFAULT NULL,
  `Puntaje` float DEFAULT NULL,
  `FechaEvaluacion` date DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `NumeroGrupo`, `NombreGrupo`) VALUES
(2, '1', 'armonia 10'),
(3, '2', 'las mariposas'),
(4, '5', 'quinto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL,
  `NombreHorario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idHorario`, `NombreHorario`) VALUES
(2, 'tardes'),
(3, 'mañana'),
(4, 'noche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_asignaturas`
--

CREATE TABLE `inscripciones_asignaturas` (
  `id` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `asignatura` varchar(100) DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `idInscripcion` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones_asignaturas`
--

INSERT INTO `inscripciones_asignaturas` (`id`, `idEstudiante`, `asignatura`, `fechaInscripcion`, `idInscripcion`, `observaciones`, `idCarrera`, `idAsignatura`) VALUES
(1, 1396980, NULL, '2023-05-31', NULL, 'todas', 1, 0),
(2, 1396980, NULL, '2023-05-31', NULL, 'todas', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_didactico`
--

CREATE TABLE `material_didactico` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `idDocente` int(11) DEFAULT NULL,
  `Archivo` varchar(255) DEFAULT NULL,
  `CodigoMaterial` varchar(255) DEFAULT NULL,
  `Fecha_subida` date DEFAULT NULL,
  `idNumeroAsignacion` int(11) DEFAULT NULL,
  `idMaterialDidactico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material_didactico`
--

INSERT INTO `material_didactico` (`id`, `titulo`, `descripcion`, `fecha_publicacion`, `idDocente`, `Archivo`, `CodigoMaterial`, `Fecha_subida`, `idNumeroAsignacion`, `idMaterialDidactico`) VALUES
(9, NULL, '1', NULL, 1, 'cuaderno de informe semana 3.pdf', '1', '2023-06-01', 0, NULL),
(11, NULL, 'juan', NULL, 5, 'cuaderno de informe semana 3.pdf', '5', '2023-06-01', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `remitente` varchar(50) NOT NULL,
  `destinatario` varchar(50) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_envio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idNivel` int(11) NOT NULL,
  `NombreNivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idNivel`, `NombreNivel`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros_asignaciones`
--

CREATE TABLE `numeros_asignaciones` (
  `id` int(11) NOT NULL,
  `numero_asignacion` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `descripcion` text DEFAULT NULL,
  `idNumeroAsignacion` int(11) DEFAULT NULL,
  `numeroAsignado` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numeros_asignaciones`
--

INSERT INTO `numeros_asignaciones` (`id`, `numero_asignacion`, `fecha_creacion`, `descripcion`, `idNumeroAsignacion`, `numeroAsignado`, `IdDocente`) VALUES
(1, '', '0000-00-00', NULL, NULL, 1, 3),
(2, '', '0000-00-00', NULL, NULL, 3, 3),
(3, '', '0000-00-00', NULL, NULL, 2, 5),
(4, '', '0000-00-00', NULL, NULL, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_tareas`
--

CREATE TABLE `planificacion_tareas` (
  `idPlanificacion` int(11) NOT NULL,
  `Unidad` varchar(255) DEFAULT NULL,
  `DescripcionUnidad` varchar(255) DEFAULT NULL,
  `idDocente` int(11) DEFAULT NULL,
  `Tarea` varchar(255) DEFAULT NULL,
  `DescripcionTarea` varchar(255) DEFAULT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  `FechaPresentacion` date DEFAULT NULL,
  `CodigoTarea` varchar(50) DEFAULT NULL,
  `idNumeroAsignacion` int(11) DEFAULT NULL,
  `idAsignatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudio`
--

CREATE TABLE `plan_estudio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `idPlan` int(11) DEFAULT NULL,
  `CantidadAsignaturas` int(11) DEFAULT NULL,
  `idcarrera` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan_estudio`
--

INSERT INTO `plan_estudio` (`id`, `nombre`, `descripcion`, `fecha_creacion`, `activo`, `idPlan`, `CantidadAsignaturas`, `idcarrera`, `IdDocente`) VALUES
(1, '', 'mates', '0000-00-00', 0, NULL, 1, 4, NULL),
(2, '', 'soldadura', '0000-00-00', 0, NULL, 2, 1, NULL),
(3, '', 'armonia 10', '0000-00-00', 0, NULL, 3, 6, NULL),
(4, '', 'julissa melannie', '0000-00-00', 0, NULL, 4, 5, NULL),
(5, '', 'soldadura', '0000-00-00', 0, NULL, 1, 1, NULL),
(6, '', 'tarde', '0000-00-00', 0, NULL, 45, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL,
  `NombreTurno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`idTurno`, `NombreTurno`) VALUES
(3, 'tardes'),
(4, 'mañana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` smallint(6) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `PassUsuario` varchar(150) NOT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `NombreUsuario`, `PassUsuario`, `NivelUsuario`, `Codigo`, `Foto`) VALUES
(3, 'nombre_admin', 'contraseña_admin', 1, 123456, NULL),
(4, 'admin', 'contraseña', 1, 1234, 'images/fotos_perfil/admin.jpg'),
(5, 'docente', 'contraseñaDocente', 2, 123456, NULL),
(6, 'estudiante', 'contraseñaEstudiante', 3, 12345, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `years_academicos`
--

CREATE TABLE `years_academicos` (
  `idYearAcademico` int(11) NOT NULL,
  `NombreYear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `years_academicos`
--

INSERT INTO `years_academicos` (`idYearAcademico`, `NombreYear`) VALUES
(2, '2023_20'),
(3, '2023_10'),
(4, '2024_1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `cuatrimestres`
--
ALTER TABLE `cuatrimestres`
  ADD PRIMARY KEY (`idCuatrimestre`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indices de la tabla `entrega_tareas`
--
ALTER TABLE `entrega_tareas`
  ADD PRIMARY KEY (`idEntregaTareas`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `IdGrupo` (`IdGrupo`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`idEvaluacion`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `inscripciones_asignaturas`
--
ALTER TABLE `inscripciones_asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material_didactico`
--
ALTER TABLE `material_didactico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_material_didactico_docentes` (`idDocente`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `numeros_asignaciones`
--
ALTER TABLE `numeros_asignaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planificacion_tareas`
--
ALTER TABLE `planificacion_tareas`
  ADD PRIMARY KEY (`idPlanificacion`);

--
-- Indices de la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`idTurno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `NivelUsuario` (`NivelUsuario`);

--
-- Indices de la tabla `years_academicos`
--
ALTER TABLE `years_academicos`
  ADD PRIMARY KEY (`idYearAcademico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cuatrimestres`
--
ALTER TABLE `cuatrimestres`
  MODIFY `idCuatrimestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entrega_tareas`
--
ALTER TABLE `entrega_tareas`
  MODIFY `idEntregaTareas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripciones_asignaturas`
--
ALTER TABLE `inscripciones_asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_didactico`
--
ALTER TABLE `material_didactico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `numeros_asignaciones`
--
ALTER TABLE `numeros_asignaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `planificacion_tareas`
--
ALTER TABLE `planificacion_tareas`
  MODIFY `idPlanificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `idTurno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `years_academicos`
--
ALTER TABLE `years_academicos`
  MODIFY `idYearAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`idGrupo`);

--
-- Filtros para la tabla `material_didactico`
--
ALTER TABLE `material_didactico`
  ADD CONSTRAINT `fk_material_didactico_docentes` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  ADD CONSTRAINT `material_didactico_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`NivelUsuario`) REFERENCES `niveles` (`idNivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
