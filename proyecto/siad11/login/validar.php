<?php
session_start();
include '../admin/conexion.php';

$email = $_POST['usuario'];
$password = $_POST['password'];

// Validar y sanear los datos
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = filter_var($password, FILTER_SANITIZE_STRING);

// Consulta preparada
$query = "SELECT * FROM usuarios WHERE NombreUsuario = ? AND PassUsuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION["NombreUsuario"] = $row['NombreUsuario'];
    $_SESSION["NivelUsuario"] = $row['NivelUsuario'];
    $_SESSION["Codigo"] = $row['idUsuario'];

    if ($_SESSION["NivelUsuario"] == 1) {
        echo '<script> window.location="../admin/admin.php"; </script>';
    } elseif ($_SESSION["NivelUsuario"] == 2) {
        echo '<script> window.location="../docentes/docentes.php"; </script>';
    } else {
        echo '<script> window.location="../estudiantes/estudiantes.php"; </script>';
    }
} else {
    echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
    echo '<script> window.location="../login.php"; </script>';
}
$stmt->close();
$conexion->close();
?>
