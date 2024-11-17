<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT numeros_asignaciones.idNumeroAsignacion as id, numeros_asignaciones.numeroAsignado as Numero, concat(docentes.NombresDocente, ' ' ,docentes.ApellidosDocente) as Docentes 
FROM numeros_asignaciones INNER JOIN docentes ON numeros_asignaciones.IdDocente=docentes.idDocente
  WHERE docentes.NombresDocente LIKE '%$dato%' ORDER BY numeros_asignaciones.idNumeroAsignacion ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                      <th width="40%">Numero de Asignacion</th>  
                        <th width="40%">Docente Asignado</th>        
                        <th width="20%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                              <td>'.$registro2['Numero'].'</td>
		                      <td>'.$registro2['Docentes'].'</td>
		                       <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
		                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
		                          <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
