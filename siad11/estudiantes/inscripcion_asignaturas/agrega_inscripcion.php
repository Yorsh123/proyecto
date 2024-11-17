
<?php

include('../../admin/conexion.php');
  session_start();
  $codigo = $_SESSION["Codigo"];

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$descripcion = $_POST['descripcion'];
$estudiante = $_POST['estudiante'];
$asignatura = $_POST['asignatura'];
$unidad = $_POST['unidad'];
$tarea = $_POST['tarea'];
$puntaje = $_POST['puntaje'];
$fechaEvaluacion = date("Y-m-d");

switch($proceso){
	case 'Registro': mysqli_query("INSERT INTO evaluaciones (Descripcion, idEstudiante, idAsignatura, Unidad, Tarea, idDocente, Puntaje, FechaEvaluacion) VALUES('$descripcion', '$estudiante','$asignatura','$unidad','$tarea','$codigo','$puntaje','$fechaEvaluacion')");
	break;
	case 'Edicion': mysqli_query("UPDATE evaluaciones SET Descripcion = '$descripcion', idEstudiante = '$idEstudiante',idAsignatura = '$asignatura',Unidad = '$unidad',Tarea = '$tarea',Puntaje = '$puntaje',FechaEvaluacion = '$fechaEvaluacion' where idEvaluacion = '$id'");
	break;
   }
    $registro = mysqli_query("SELECT evaluaciones.idEvaluacion as id, evaluaciones.Descripcion as Evaluacion, estudiantes.CarnetEstudiante as carnet, concat (estudiantes.NombresEstudiante,' ', estudiantes.ApellidosEstudiante) as Estudiante,  asignaturas.NombreAsignatura as Asignatura,  
evaluaciones.Unidad as Unidad,  evaluaciones.Tarea as Tarea,  concat (docentes.NombresDocente,' ',docentes.ApellidosDocente) as Docente,  evaluaciones.Puntaje as Puntaje, evaluaciones.FechaEvaluacion as Fecha
FROM docentes INNER JOIN evaluaciones ON  docentes.idDocente =  evaluaciones.idDocente 
              INNER JOIN estudiantes ON  evaluaciones.idEstudiante =  estudiantes.idEstudiante 
        INNER JOIN grupos ON  estudiantes.IdGrupo =  grupos.idGrupo 
        INNER JOIN asignaturas ON  evaluaciones.idAsignatura =  asignaturas.idAsignatura
where  docentes.idDocente = '$codigo' ORDER BY evaluaciones.idEvaluacion ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>    
                        <th width="10%">Evaluacion</th> 
                        <th width="10%">Carnet</th>
                        <th width="15%">Estudiante</th>
                        <th width="15%">Asignatura</th> 
                        <th width="10%">Unidad</th> 
                        <th width="10%">Tarea</th>  
                        <th width="10%">Puntaje</th>
                        <th width="10%">Fecha</th>                  
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                         <td>'.$registro2['Evaluacion'].'</td>
                          <td>'.$registro2['carnet'].'</td>
                          <td>'.$registro2['Estudiante'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Unidad'].'</td> 
                          <td>'.$registro2['Tarea'].'</td>
                          <td>'.$registro2['Puntaje'].'</td>
                          <td>'.$registro2['Fecha'].'</td>               
                           <td>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
                </tr>';
  }
	
   echo '</table>';
?>