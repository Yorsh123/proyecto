<?php
$conexion = mysqli_connect("localhost", "root", "", "siad1");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
