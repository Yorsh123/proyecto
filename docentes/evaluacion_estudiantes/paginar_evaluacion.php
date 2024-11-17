<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM asignaciones"));
    $nroLotes = 10;
    $nroPaginas = ceil($numeroRegistros/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';

    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$registro = mysqli_query($conexion, "SELECT evaluaciones.idEvaluacion, evaluaciones.Descripcion as Evaluacion, estudiantes.CarnetEstudiante as carnet, concat (estudiantes.NombresEstudiante,' ', estudiantes.ApellidosEstudiante) as Estudiante,  asignaturas.NombreAsignatura as Asignatura,  
evaluaciones.Unidad as Unidad,  evaluaciones.Tarea as Tarea,  concat (docentes.NombresDocente,' ',docentes.ApellidosDocente) as Docente,  evaluaciones.Puntaje as Puntaje, evaluaciones.FechaEvaluacion as Fecha
FROM docentes INNER JOIN evaluaciones ON  docentes.idDocente =  evaluaciones.idDocente 
              INNER JOIN estudiantes ON  evaluaciones.idEstudiante =  estudiantes.idEstudiante 
        INNER JOIN grupos ON  estudiantes.IdGrupo =  grupos.idGrupo 
        INNER JOIN asignaturas ON  evaluaciones.idAsignatura =  asignaturas.idAsignatura
where  docentes.idDocente = '$codigo' LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        
                         
                        <th width="10%">Evaluacion</th> 
                        <th width="10%">Carnet</th>
                        <th width="10%">Estudiante M.</th>
                        <th width="10%">Asignatura</th> 
                        <th width="10%">Unidad</th> 
                        <th width="10%">Tarea</th> 
                        <th width="10%">Docente</th>  
                        <th width="10%">Puntaje</th>
                        <th width="10%">Fecha</th>                  
                        <th width="10%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                         
                                <td>'.$registro2['Evaluacion'].'</td>
                          <td>'.$registro2['carnet'].'</td>
                          <td>'.$registro2['Estudiante'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Unidad'].'</td> 
                            <td>'.$registro2['Tarea'].'</td>
                          <td>'.$registro2['Docente'].'</td>
                          <td>'.$registro2['Puntaje'].'</td>
                          <td>'.$registro2['Fecha'].'</td>               
                           <td>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>