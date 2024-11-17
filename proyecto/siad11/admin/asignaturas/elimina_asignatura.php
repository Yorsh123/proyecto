<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion, "DELETE FROM asignaturas WHERE idAsignatura = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion, "SELECT asignaturas.idAsignatura as id, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera, grupos.NumeroGrupo as grupo, 
cuatrimestres.NombreCuatrimestre as Cuatrimestre FROM asignaturas 
                                 INNER JOIN carreras ON  asignaturas.Idcarrera =  carreras.idCarrera 

                                 INNER JOIN cuatrimestres ON  asignaturas.Idcuatrimestre =  cuatrimestres.idCuatrimestre 
                                 
                                 INNER JOIN grupos ON  asignaturas.IdGrupo =  grupos.idGrupo
  ORDER BY asignaturas.idAsignatura ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="20%">Asignatura</th>  
                        <th width="20%">Carrera</th> 
                        <th width="20%">Grupo</th>
                        <th width="20%">Semestre</th>       
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                  <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Carrera'].'</td>
                          <td>'.$registro2['grupo'].'</td>
                          <td>'.$registro2['Cuatrimestre'].'</td>
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
			         	</tr>';
	}
echo '</table>';
?>