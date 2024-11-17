<?php
include('../../admin/conexion.php');

session_start();
$codigo = $_SESSION["Codigo"];

$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT planificacion_tareas.idPlanificacion as id, numeros_asignaciones.numeroAsignado as Numero, asignaturas.NombreAsignatura as Asignatura, planificacion_tareas.Unidad as Unidad, planificacion_tareas.DescripcionUnidad as UnidadD,  planificacion_tareas.Tarea as Tarea, planificacion_tareas.DescripcionTarea as TareaD, planificacion_tareas.FechaPublicacion as FechaPu, planificacion_tareas.FechaPresentacion as FechaPre,planificacion_tareas.CodigoTarea as Codigo 
from planificacion_tareas inner join numeros_asignaciones on planificacion_tareas.idNumeroAsignacion=numeros_asignaciones.idNumeroAsignacion 
                          inner join asignaturas on planificacion_tareas.idAsignatura = asignaturas.idAsignatura
  WHERE planificacion_tareas.CodigoTarea LIKE '%$dato%' and planificacion_tareas.idDocente = '$codigo' ORDER BY planificacion_tareas.idPlanificacion ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        <th width="10%">Numero Asignado</th>  
                        <th width="15%">Asignatura</th> 
                        <th width="15%">Unidad</th>
                        <th width="7%">Desc. Unidad</th>
                        <th width="8%">Tarea</th>        
                        <th width="15%">Desc. Tarea</th>
                        <th width="10%">Fecha Publicacion</th>
                        <th width="10%">Fecha Presentacion</th>
                        <th width="10%">Codigo</th>
                         <th width="10%">Opciones</th>

            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          <td>'.$registro2['Numero'].'</td>
		                      <td>'.$registro2['Asignatura'].'</td>
		                      <td>'.$registro2['Unidad'].'</td>
		                      <td>'.$registro2['UnidadD'].'</td>
		                      <td>'.$registro2['Tarea'].'</td>
                          <td>'.$registro2['TareaD'].'</td>
                          <td>'.$registro2['FechaPu'].'</td>
                           <td>'.$registro2['FechaPre'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
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
