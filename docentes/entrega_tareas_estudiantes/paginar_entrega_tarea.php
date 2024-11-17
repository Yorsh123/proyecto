<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT concat(estudiantes.NombresEstudiante,' ',estudiantes.ApellidosEstudiante) as Estudiante, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion, 
entrega_tareas.Archivo as Archivo, entrega_tareas.FechaEntrega as Fecha FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura 
                      INNER JOIN entrega_tareas ON  asignaturas.idAsignatura =  entrega_tareas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
where asignaciones.idDocente = '$codigo' group by estudiantes.idEstudiante"));
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
  	$registro = mysqli_query($conexion, "SELECT concat(estudiantes.NombresEstudiante,' ',estudiantes.ApellidosEstudiante) as Estudiante, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion, 
entrega_tareas.Archivo as Archivo, entrega_tareas.FechaEntrega as Fecha FROM asignaciones INNER JOIN asignaturas ON  asignaciones.idAsignatura =  asignaturas.idAsignatura 
                      INNER JOIN entrega_tareas ON  asignaturas.idAsignatura =  entrega_tareas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
where asignaciones.idDocente = '$codigo' group by estudiantes.idEstudiante LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        
                     <th width="15%">Estudiante</th> 
                        <th width="15%">Asignatura</th>
                        <th width="15%">Tarea M.</th>
                        <th width="15%">Archivo</th> 
                        <th width="15%">Fecha de Entrega</th>  
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                         
                          <td>'.$registro2['Estudiante'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>  
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>