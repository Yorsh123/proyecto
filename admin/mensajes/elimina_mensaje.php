<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion, "DELETE FROM mensajes WHERE idMensaje= '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion, "SELECT * FROM mensajes ORDER BY idMensaje ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                        <th width="20%">Remitente</th>  
                       <th width="20%">Correo</th> 
                       <th width="20%">Mensaje</th>  
                       <th width="20%">Fecha Envio</th>         
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
                              <td>'.$registro2['Remitente'].'</td>
                              <td>'.$registro2['correo'].'</td>
                               <td>'.$registro2['Mensaje'].'</td>
                                <td>'.$registro2['FechaEnvio'].'</td>
                       <td><a href="javascript:eliminarRegistro('.$registro2['idMensaje'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                              </tr>';
	}
echo '</table>';
?>