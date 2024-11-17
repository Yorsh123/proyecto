<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM docentes WHERE idDocente = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
    0 => $valores2['NombresDocente'],
    1 => $valores2['ApellidosDocente'],
    2 => $valores2['CedulaDocente'],
    3 => $valores2['CorreoDocente'],
    4 => $valores2['CelularDocente'],
    5 => $valores2['TelefonoDocente'],
    6 => $valores2['DireccionDocente'],
    7 => $valores2['Estado'],
);
echo json_encode($datos);
?>
