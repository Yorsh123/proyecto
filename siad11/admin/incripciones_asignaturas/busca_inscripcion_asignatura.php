<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT inscripciones_asignaturas.idInscripcion as Codigo, carreras.NombreCarrera as Carrera, asignaturas.NombreAsignatura as Asignatura, concat(estudiantes.NombresEstudiante, ' ' ,estudiantes.ApellidosEstudiante) as Estudiantes,
inscripciones_asignaturas.fechaInscripcion as fecha, inscripciones_asignaturas.observaciones as observaciones 
FROM inscripciones_asignaturas INNER JOIN carreras ON inscripciones_asignaturas.idCarrera=carreras.idCarrera 
INNER JOIN asignaturas ON inscripciones_asignaturas.idAsignatura=asignaturas.idasignatura 
INNER JOIN estudiantes ON inscripciones_asignaturas.idEstudiante=estudiantes.idestudiante
WHERE estudiantes.NombresEstudiante = 'Elier' ORDER BY inscripciones_asignaturas.idInscripcion ASC
  WHERE estudiantes.NombresEstudiante LIKE '%$dato%' ORDER BY inscripciones_asignaturas.idInscripcion ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                      <th width="20%">Codigo</th>  
                        <th width="20%">Carrera</th>        
                        <th width="20%">Asignatura</th>
                        <th width="20%">Estudiantes</th>  
                        <th width="20%">Fecha</th>        
                        <th width="20%">Observaciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                              <td>'.$registro2['Codigo'].'</td>
		                          <td>'.$registro2['Carrera'].'</td>
                              <td>'.$registro2['Asignatura'].'</td>
                              <td>'.$registro2['Estudiantes'].'</td>
                              <td>'.$registro2['fecha'].'</td>
                              <td>'.$registro2['observaciones'].'</td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
