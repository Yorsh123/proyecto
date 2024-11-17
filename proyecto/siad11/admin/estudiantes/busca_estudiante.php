<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE NombresEstudiante LIKE '%$dato%' ORDER BY idEstudiante ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="10%">Carnet</th>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="10%">Cedula</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Telefono</th>
                         <th width="10%">Direccion</th>
                         <th width="5%">Estado</th>
                        <th width="5%">Grupo</th>             
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
				         <td>'.$registro2['CarnetEstudiante'].'</td>
                  <td>'.$registro2['NombresEstudiante'].'</td>
                  <td>'.$registro2['ApellidosEstudiante'].'</td>
                  <td>'.$registro2['CedulaEstudiante'].'</td>
                   <td>'.$registro2['CorreoEstudiante'].'</td>
                  <td>'.$registro2['CelularEstudiante'].'</td>
                  <td>'.$registro2['TelefonoEstudiante'].'</td>
                  <td>'.$registro2['DireccionEstudiante'].'</td>
                  <td>'.$registro2['Estado'].'</td>
                    <td>'.$registro2['IdGrupo'].'</td>
                  <td> <a href="javascript:editarRegistro('.$registro2['idEstudiante'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                  <a href="javascript:eliminarRegistro('.$registro2['idEstudiante'].');">
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
