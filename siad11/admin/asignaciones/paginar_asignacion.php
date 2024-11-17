<?php
include('../conexion.php');
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
  	$registro = mysqli_query($conexion, "SELECT  asignaciones.idAsignacion AS id, asignaciones.descripcion AS Asignacion,concat(docentes.NombresDocente,' ',docentes.ApellidosDocente) as Docente, 
             asignaturas.NombreAsignatura AS Asignatura, grupos.NumeroGrupo AS Grupo, turnos.NombreTurno AS Turno, horarios.NombreHorario AS Horario, asignaciones.Estado AS Estado, asignaciones.NumeroAsignacion AS NumeroA
        FROM  asignaciones INNER JOIN docentes ON asignaciones.idDocente = docentes.idDocente 
                        INNER JOIN asignaturas ON asignaciones.idAsignatura = asignaturas.idAsignatura 
            INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo 
            INNER JOIN turnos ON asignaciones.idTurno = turnos.idTurno 
            INNER JOIN horarios ON asignaciones.idHorario = horarios.idHorario LIMIT $limit, $nroLotes ");
   
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        <th width="10%">Descripcion</th>  
                        <th width="15%">Docente</th> 
                        <th width="15%">Asignatura</th>
                        <th width="7%">Grupo</th>
                        <th width="8%">Turno</th>        
                        <th width="15%">Horario</th>
                        <th width="10%">Estado</th>
                        <th width="10%">Numero</th>
                        <th width="10%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                          <td>'.$registro2['Asignacion'].'</td>
                          <td>'.$registro2['Docente'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Grupo'].'</td>
                          <td>'.$registro2['Turno'].'</td>
                          <td>'.$registro2['Horario'].'</td>
                           <td>'.$registro2['Estado'].'</td>
                          <td>'.$registro2['NumeroA'].'</td>
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
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