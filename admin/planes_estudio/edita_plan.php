
<?php
include('../conexion.php');

$id = $_POST['id'];

// Validar y sanitizar el valor del parámetro 'id'
$id = mysqli_real_escape_string($conexion, $id);

$query = "SELECT * FROM plan_estudio WHERE idPlan = '$id'";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $valores2 = mysqli_fetch_array($resultado);
    $datos = array(
        'Descripcion' => $valores2['Descripcion'],
        'idCarrera' => $valores2['idCarrera'],
        'CantidadAsignaturas' => $valores2['CantidadAsignaturas']
    );

    echo json_encode($datos);
} else {
    echo "Error al obtener los datos del plan de estudio.";
}
?>
