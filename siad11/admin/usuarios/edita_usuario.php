<?php
include('../conexion.php');

$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM usuarios WHERE idUsuario = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
    0 => $valores2['NombreUsuario'],
    1 => $valores2['PassUsuario'],
    2 => $valores2['NivelUsuario'],
    3 => $valores2['Codigo'],
); 
echo json_encode($datos);

mysqli_close($conexion);
?>
