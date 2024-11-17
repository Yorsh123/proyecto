<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT * FROM docentes WHERE NombresDocente LIKE '%$dato%' ORDER BY idDocente ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="15%">Cedula</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Telefono</th>
                         <th width="20%">Direccion</th>
                         <th width="5%">Estado</th>            
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		  echo '<tr>
      			         <td>'.$registro2['NombresDocente'].'</td>
                                <td>'.$registro2['ApellidosDocente'].'</td>
                                <td>'.$registro2['CedulaDocente'].'</td>
                                 <td>'.$registro2['CorreoDocente'].'</td>
                                <td>'.$registro2['CelularDocente'].'</td>
                                <td>'.$registro2['TelefonoDocente'].'</td>
                                <td>'.$registro2['DireccionDocente'].'</td>
                                <td>'.$registro2['Estado'].'</td>
                               <td> <a href="javascript:editarRegistro('.$registro2['idDocente'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idDocente'].');">
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
