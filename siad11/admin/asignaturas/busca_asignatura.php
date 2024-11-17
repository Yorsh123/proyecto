<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT asignaturas.idAsignatura as id, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera, grupos.NumeroGrupo as grupo, 
cuatrimestres.NombreCuatrimestre as Cuatrimestre FROM asignaturas 
                                 INNER JOIN carreras ON  asignaturas.Idcarrera =  carreras.idCarrera 

                                 INNER JOIN cuatrimestres ON  asignaturas.Idcuatrimestre =  cuatrimestres.idCuatrimestre 
                                 
                                 INNER JOIN grupos ON  asignaturas.IdGrupo =  grupos.idGrupo
 
  WHERE asignaturas.NombreAsignatura LIKE '%$dato%' ORDER BY asignaturas.idAsignatura ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                      <th width="40%">Asignatura</th>  
                        <th width="20%">Carrera</th> 
                        <th width="20%">Semestre</th>       
                        <th width="20%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
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
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
