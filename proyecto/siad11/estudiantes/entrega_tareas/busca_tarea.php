<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT entrega_tareas.idEntregaTareas as id, entrega_tareas.CodigoTareaDocente CodigoDocente, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion,  entrega_tareas.CodigoEnvioTarea as CodigoTarea, entrega_tareas.Archivo as Archivo
FROM  entrega_tareas INNER JOIN asignaturas ON  entrega_tareas.idAsignatura =  asignaturas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
where estudiantes.idEstudiante = '$codigo' and entrega_tareas.Descripcion LIKE '%$dato%' ORDER BY entrega_tareas.idEntregaTareas ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                         <th width="15%">Codigo Docente</th> 
                        <th width="15%">Asignatura</th>
                        <th width="20%">Descripcion Tarea</th>
                        <th width="15%">Codigo Tarea Enviada</th> 
                        <th width="20%">Archivo</th>                  
                        <th width="15%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                          <td>'.$registro2['CodigoDocente'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['CodigoTarea'].'</td>
                          <td>'.$registro2['Archivo'].'</td>                 
                           <td> <a href="entrega_tareas/pdf/archivo.php?id='.$registro2['id'].'"> <img src="../docentes/images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="../docentes/images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="6">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
