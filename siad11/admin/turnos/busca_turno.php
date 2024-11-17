<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT * FROM turnos WHERE NombreTurno LIKE '%$dato%' ORDER BY idTurno ASC");
echo '<table class="table table-striped table-condensed table-hover table-responsive">
    <tr>
        <th width="80%">Nombre del Turno</th>           
        <th width="20%">Opciones</th>
    </tr>';
if (mysqli_num_rows($registro) > 0) {
    while ($registro2 = mysqli_fetch_array($registro)) {
        echo '<tr>
            <td>'.$registro2['NombreTurno'].'</td>
            <td>
                <a href="javascript:editarRegistro('.$registro2['idTurno'].');">
                    <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" />
                </a>
                <a href="javascript:eliminarRegistro('.$registro2['idTurno'].');">
                    <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" />
                </a>
            </td>
        </tr>';
    }
} else {
    echo '<tr>
        <td colspan="2">No se encontraron resultados</td>
    </tr>';
}
echo '</table>';
?>
