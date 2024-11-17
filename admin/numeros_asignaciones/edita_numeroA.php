<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM numeros_asignaciones WHERE idNumeroAsignacion = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
    0 => $valores2['numeroAsignado'], 
    1 => $valores2['IdDocente'], 
); 

echo json_encode($datos);
?>
