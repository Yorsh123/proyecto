<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM inscripciones_asignaturas"));
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
  	$registro = mysqli_query($conexion, "SELECT inscripciones_Asignaturas.idInscripcion as id, inscripciones_Asignaturas.fechaInscripcion as fecha, inscripciones_Asignaturas.observaciones as observaciones, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera, years_academicos.NombreYear as Year,  cuatrimestres.NombreCuatrimestre as Cuatrimestre
FROM             asignaturas INNER JOIN inscripciones_Asignaturas ON  asignaturas.idAsignatura =  inscripciones_Asignaturas.idAsignatura
                             INNER JOIN estudiantes ON  inscripciones_Asignaturas.idEstudiante =  estudiantes.idEstudiante 
               INNER JOIN carreras ON  asignaturas.Idcarrera =  carreras.idCarrera 
               INNER JOIN cuatrimestres ON  asignaturas.Idcuatrimestre =  cuatrimestres.idCuatrimestre 
               INNER JOIN years_academicos ON  asignaturas.Idyear =  years_academicos.idYearAcademico
WHERE estudiantes.idEstudiante = '$codigo' LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                         <th width="15%">Asignatura</th> 
                        <th width="10%">Carrera</th>
                        <th width="15%">Año</th>
                        <th width="15%">Cuatrimestre</th>  
                        <th width="15%">Fecha</th> 
                        <th width="20%">Observaciones</th>                 
                        <th width="10%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                            <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Carrera'].'</td>
                          <td>'.$registro2['Year'].'</td>
                          <td>'.$registro2['Cuatrimestre'].'</td>
                          <td>'.$registro2['fecha'].'</td> 
                          <td>'.$registro2['observaciones'].'</td>              
                           <td>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                                <img src="../admin/images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>