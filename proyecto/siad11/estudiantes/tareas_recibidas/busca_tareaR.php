<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT planificacion_tareas.idPlanificacion as id, concat (docentes.NombresDocente,' ' ,docentes.ApellidosDocente) as Docente,  
      asignaturas.NombreAsignatura as Asignatura, planificacion_tareas.Unidad as Unidad, planificacion_tareas.Tarea as Tarea, planificacion_tareas.DescripcionTarea as TareaD, planificacion_tareas.FechaPublicacion as FechaPublicacion, planificacion_tareas.FechaPresentacion as FechaPresentacion, planificacion_tareas.CodigoTarea as CodigoTarea
FROM planificacion_tareas INNER JOIN docentes ON  planificacion_tareas.idDocente =  docentes.idDocente 
INNER JOIN asignaturas ON  planificacion_tareas.idAsignatura =  asignaturas.idAsignatura
where planificacion_tareas.CodigoTarea = '$dato' ORDER BY planificacion_tareas.idPlanificacion ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                        <th width="20%">Docente</th> 
                        <th width="10%">Asignatura</th>
                        <th width="10%">Unidad</th>
                        <th width="10%">Tarea</th>
                        <th width="30%">Descripcion de Tarea</th>  
                        <th width="10%">Fecha Publicacion</th>  
                        <th width="10%">Fecha Presentacion</th>               
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                          <td>'.$registro2['Docente'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Unidad'].'</td> 
                          <td>'.$registro2['Tarea'].'</td> 
                           <td>'.$registro2['TareaD'].'</td>  
                          <td>'.$registro2['FechaPresentacion'].'</td> 
                          <td>'.$registro2['FechaPublicacion'].'</td>                
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="7">No se ha encontrado el archivo</td>
      			</tr>';
      }
      echo '</table>';
?>
