<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$numero = $_POST['numero'];
$nombre = $_POST['nombre'];

switch($proceso) {
    case 'Registro':
        mysqli_query($conexion, "INSERT INTO grupos (NumeroGrupo, NombreGrupo) VALUES ('$numero', '$nombre')");
        break;
    case 'Edicion':
        mysqli_query($conexion, "UPDATE grupos SET NumeroGrupo = '$numero', NombreGrupo = '$nombre' WHERE idGrupo = '$id'");
        break;
}

$registro = mysqli_query($conexion, "SELECT * FROM grupos ORDER BY idGrupo ASC");

echo '<table class="table table-striped table-condensed table-hover">
    <tr>
        <th width="40%">Numero de Grupo</th>
        <th width="40%">Nombre de Grupo</th>            
        <th width="20%">Opciones</th>
    </tr>';

while ($registro2 = mysqli_fetch_array($registro)) {
    echo '<tr>
        <td>'.$registro2['NumeroGrupo'].'</td>
        <td>'.$registro2['NombreGrupo'].'</td>
        <td>
            <a href="javascript:editarRegistro('.$registro2['idGrupo'].');">
                <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" />
            </a>
            <a href="javascript:eliminarRegistro('.$registro2['idGrupo'].');">
                <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" />
            </a>
        </td>
    </tr>';
}

echo '</table>';
?>
