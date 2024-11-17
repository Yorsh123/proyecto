<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT  entrega_tareas.idEntregaTareas as id, entrega_tareas.CodigoTareaDocente as CodigoDocente, concat(estudiantes.NombresEstudiante,' ',estudiantes.ApellidosEstudiante) as Estudiante, asignaturas.NombreAsignatura as Asignatura,  entrega_tareas.Descripcion as Descripcion, entrega_tareas.CodigoEnvioTarea as CodigoEnvio, entrega_tareas.Archivo as Archivo
FROM  entrega_tareas INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante 
                     INNER JOIN asignaturas ON  entrega_tareas.idAsignatura =  asignaturas.idAsignatura
where entrega_tareas.CodigoTareaDocente = '$dato' ORDER BY entrega_tareas.idEntregaTareas ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                         <th width="15%">Codigo Docente</th> 
                        <th width="15%">Estudiante</th>
                        <th width="15%">Asignatura</th>
                        <th width="15%">Descripcion Tarea</th>
                        <th width="15%">Codigo Estudiante</th> 
                        <th width="15%">Archivo</th>                  
                        <th width="10%">ver</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                          <td>'.$registro2['CodigoDocente'].'</td>
                          <td>'.$registro2['Estudiante'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['CodigoEnvio'].'</td>
                          <td>'.$registro2['Archivo'].'</td>                 
                           <td> <a href="../estudiantes/entrega_tareas/pdf/archivo.php?id='.$registro2['id'].'"> <img src="../docentes/images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>                                       
                             </td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="6">No existen tareas que mostrar</td>
      			</tr>';
      }
      echo '</table>';
?>
