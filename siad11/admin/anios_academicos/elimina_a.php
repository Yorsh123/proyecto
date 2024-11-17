<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion, "DELETE FROM years_academicos WHERE idYearAcademico = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque está siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion, "SELECT * FROM years_academicos ORDER BY idYearAcademico ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
         <tr>
            <th width="80%">Año Academico</th>           
            <th width="20%">Opciones</th>
         </tr>';

while($registro2 = mysqli_fetch_array($registro)){
    echo '<tr>
              <td>'.$registro2['NombreYear'].'</td>
              <td>
                  <a href="javascript:editarRegistro('.$registro2['idYearAcademico'].');">
                      <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" />
                  </a>
                  <a href="javascript:eliminarRegistro('.$registro2['idYearAcademico'].');">
                      <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" />
                  </a>
              </td>
          </tr>';
}

echo '</table>';
?>
