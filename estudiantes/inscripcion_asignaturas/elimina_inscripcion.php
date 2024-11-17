<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$id = $_POST['id'];

mysql_query("DELETE FROM inscripciones_asignaturas WHERE idInscripcion = '$id'");

$registro = mysql_query("SELECT inscripciones_asignaturas.idInscripcion as id, inscripciones_asignaturas.fechaInscripcion as fecha, inscripciones_asignaturas.observaciones as observaciones, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera, years_academicos.NombreYear as Year,  cuatrimestres.NombreCuatrimestre as Cuatrimestre
FROM             asignaturas INNER JOIN inscripciones_asignaturas ON  asignaturas.idAsignatura =  inscripciones_asignaturas.idAsignatura
                             INNER JOIN estudiantes ON  inscripciones_asignaturas.idEstudiante =  estudiantes.idEstudiante 
               INNER JOIN carreras ON  asignaturas.Idcarrera =  carreras.idCarrera 
               INNER JOIN cuatrimestres ON  asignaturas.Idcuatrimestre =  cuatrimestres.idCuatrimestre 
               INNER JOIN years_academicos ON  asignaturas.Idyear =  years_academicos.idYearAcademico
WHERE estudiantes.idEstudiante = '$codigo' and asignaturas.NombreAsignatura ORDER BY inscripciones_asignaturas.idInscripcion ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                        <th width="15%">Asignatura</th> 
                        <th width="10%">Carrera</th>
                        <th width="15%">Año</th>
                        <th width="15%">Cuatrimestre</th>  
                        <th width="15%">Fecha</th> 
                        <th width="20%">Observaciones</th>                 
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		        echo '<tr>
		                     
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
echo '</table>';
?>