<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT concat(estudiantes.NombresEstudiante,' ',estudiantes.ApellidosEstudiante) as Estudiante, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion, 
entrega_tareas.Archivo as Archivo, entrega_tareas.FechaEntrega as Fecha FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura 
                      INNER JOIN entrega_tareas ON  asignaturas.idAsignatura =  entrega_tareas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
where asignaciones.idDocente = '$codigo' and asignaturas.NombreAsignatura LIKE '%$dato%' or estudiantes.NombresEstudiante LIKE '%$dato%' group by estudiantes.idEstudiante");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr> 
                        <th width="20%">Estudiante</th> 
                        <th width="15%">Asignatura</th>
                        <th width="15%">Tarea M.</th>
                        <th width="15%">Archivo</th> 
                        <th width="15%">Fecha de Entrega</th>                  
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          <td>'.$registro2['Estudiante'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>                 
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
