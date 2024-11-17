<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion, "DELETE FROM plan_estudio WHERE idPlan = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion, "SELECT plan_estudio.idPlan as id, plan_estudio.Descripcion as Plan1, carreras.NombreCarrera as Carrera, CantidadAsignaturas FROM plan_estudio INNER JOIN carreras ON  plan_estudio.idcarrera =  carreras.idCarrera ORDER BY plan_estudio.idPlan ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="20%">Descripcion</th>  
                        <th width="20%">Carrera</th> 
                        <th width="20%"># Asignaturas</th>        
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                     <td>'.$registro2['Plan1'].'</td>
                          <td>'.$registro2['Carrera'].'</td>
                          <td>'.$registro2['CantidadAsignaturas'].'</td>
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
			         	</tr>';
	}
echo '</table>';
?>