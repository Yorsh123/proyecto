<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM asignaciones"));
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
  	$registro = mysqli_query($conexion, "SELECT entrega_tareas.idEntregaTareas as id, entrega_tareas.CodigoTareaDocente CodigoDocente, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion,  entrega_tareas.CodigoEnvioTarea as CodigoTarea, entrega_tareas.Archivo as Archivo
FROM  entrega_tareas INNER JOIN asignaturas ON  entrega_tareas.idAsignatura =  asignaturas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
where entrega_tareas.CodigoTareaDocente = '$dato' LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        
                       <th width="15%">Codigo Docente</th> 
                        <th width="15%">Asignatura</th>
                        <th width="20%">Descripcion Tarea</th>
                        <th width="15%">Codigo Tarea Enviada</th> 
                        <th width="20%">Archivo</th>                  
                        <th width="15%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                         
                           <td>'.$registro2['CodigoDocente'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['CodigoTarea'].'</td>
                          <td>'.$registro2['Archivo'].'</td>                 
                           <td> <a href="../estudiantes/entrega_tareas/pdf/archivo.php?id='.$registro2['id'].'"> <img src="../docentes/images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>                                       
                             </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>