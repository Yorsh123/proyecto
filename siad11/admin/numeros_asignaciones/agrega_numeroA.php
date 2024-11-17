
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$numero = $_POST['numero'];
$docente = $_POST['docente'];

switch($proceso){
	case 'Registro': mysqli_query($conexion, "INSERT INTO numeros_asignaciones (numeroAsignado, IdDocente) VALUES('$numero','$docente')");
	break;
	case 'Edicion': mysqli_query($conexion, "UPDATE numeros_asignaciones SET numeroAsignado = '$numero', IdDocente = '$docente' where idNumeroAsignacion = '$id'");
	break;
   }
    $registro = mysqli_query($conexion, "SELECT numeros_asignaciones.idNumeroAsignacion as id, numeros_asignaciones.numeroAsignado as Numero, concat(docentes.NombresDocente, ' ' ,docentes.ApellidosDocente) as Docentes 
FROM numeros_asignaciones INNER JOIN docentes ON numeros_asignaciones.IdDocente=docentes.idDocente ORDER BY numeros_asignaciones.idNumeroAsignacion ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	          <tr>
                        <th width="40%">Numero de Asignacion</th>  
                        <th width="40%">Docente Asignado</th>        
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                         <td>'.$registro2['Numero'].'</td>
                          <td>'.$registro2['Docentes'].'</td>
                          <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                         </td>
                </tr>';
  }
	
   echo '</table>';
?>