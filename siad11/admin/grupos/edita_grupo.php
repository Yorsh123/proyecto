<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM grupos WHERE idGrupo = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
    0 => $valores2['NumeroGrupo'],
    1 => $valores2['NombreGrupo'],
);
echo json_encode($datos);
?>
