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
  	$registro = mysqli_query($conexion, "SELECT evaluaciones.Descripcion as Descripcion, asignaturas.NombreAsignatura as Asignatura, evaluaciones.Unidad as Unidad, evaluaciones.Tarea as Tarea,  concat (docentes.NombresDocente, ' ' ,docentes.ApellidosDocente) as Docente, 
evaluaciones.Puntaje as Puntaje,  evaluaciones.FechaEvaluacion as Fecha
FROM evaluaciones INNER JOIN estudiantes ON  evaluaciones.idEstudiante =  estudiantes.idEstudiante 
                  INNER JOIN asignaturas ON  evaluaciones.idAsignatura =  asignaturas.idAsignatura 
          INNER JOIN docentes ON  evaluaciones.idDocente =  docentes.idDocente
where estudiantes.idEstudiante = '$codigo' LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>                                   
                        <th width="20%">Descripcion</th> 
                        <th width="15%">Asignatura</th>
                        <th width="12%">Unidad</th>
                        <th width="12%">Tarea</th> 
                        <th width="15%">Docente</th> 
                        <th width="10%">Puntaje</th>  
                        <th width="16%">Fecha Evaluacion</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                         
                            
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Unidad'].'</td>
                          <td>'.$registro2['Tarea'].'</td>
                          <td>'.$registro2['Docente'].'</td> 
                          <td>'.$registro2['Puntaje'].'</td>
                          <td>'.$registro2['Fecha'].'</td> 
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>