<?php
session_start();
$codigo = $_SESSION["Codigo"];

include('../../admin/conexion.php');
if (isset($_POST['carrera'])) {
    $carrera = $_POST['carrera'];
} else {
    $carrera = null;
}
if (isset($_POST['grupo'])) {
    $grupo = $_POST['grupo'];
} else {
    $grupo = null;
}

if (isset($_POST['asignatura'])) {
    $asignatura = $_POST['asignatura'];
} else {
    $asignatura = null;
}

if (isset($_POST['observaciones'])) {
    $observaciones = $_POST['observaciones'];
} else {
    $observaciones = null;
}

if (isset($_POST['estudiante'])) {
    $estudiante = $_POST['estudiante'];
} else {
    $estudiante = null;
}

$fecha = date("Y-m-d");

$stmt = mysqli_prepare($conexion, "INSERT INTO inscripciones_asignaturas (idCarrera, idAsignatura, idEstudiante, fechaInscripcion, observaciones) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iiiss", $carrera, $grupo, $asignatura, $estudiante, $fecha);
$resultado = mysqli_stmt_execute($stmt);

if ($resultado) {
    echo '<script> alert("Inscripcion Realizada Correctamente.");</script>';
    echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
} else {
    echo '<script> alert("Error al Inscribir la asignatura. Intente de Nuevo.");</script>';
    echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
