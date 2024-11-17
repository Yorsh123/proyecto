<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT * FROM cuatrimestres WHERE NombreCuatrimestre LIKE '%$dato%' ORDER BY idCuatrimestre ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
         <tr>
            <th width="80%">Nombre de Cuatrimestre</th>           
            <th width="20%">Opciones</th>
         </tr>';

if(mysqli_num_rows($registro) > 0){
    while($registro2 = mysqli_fetch_array($registro)){
        echo '<tr>
                  <td>'.$registro2['NombreCuatrimestre'].'</td>
                  <td>
                      <a href="javascript:editarRegistro('.$registro2['idCuatrimestre'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" />
                      </a>
                      <a href="javascript:eliminarRegistro('.$registro2['idCuatrimestre'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" />
                      </a>
                  </td>
              </tr>';
    }
} else {
    echo '<tr>
              <td colspan="10">No se encontraron resultados</td>
          </tr>';
}

echo '</table>';
?>
