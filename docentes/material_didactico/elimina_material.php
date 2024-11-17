<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$id = $_POST['id'];

mysqli_query($conexion, "DELETE FROM material_didactico WHERE idMaterialDidactico = '$id'");

$registro = mysqli_query($coenexion, "SELECT  material_didactico.idMaterialDidactico AS id, material_didactico.idDocente as idDocente, material_didactico.Descripcion AS Descripcion, material_didactico.Archivo as Archivo, material_didactico.CodigoMaterial as Codigo, material_didactico.Fecha_Subida as Fecha, numeros_asignaciones.numeroAsignado as Numero
FROM material_didactico INNER JOIN numeros_asignaciones ON material_didactico.idNumeroAsignacion = numeros_asignaciones.idNumeroAsignacion
where material_didactico.idDocente = '$codigo' ORDER BY material_didactico.idMaterialDidactico ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                   
                        <th width="15%">Descripcion</th> 
                        <th width="15%">Archivo</th>
                        <th width="15%">Codigo M.</th>
                        <th width="15%">Fecha</th> 
                        <th width="15%">Asignacion</th>                  
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                     
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>
                          <td>'.$registro2['Numero'].'</td>                 
                           <td> <a href="material_didactico/pdf/archivo.php?id='.$registro2['id'].'"> <img src="images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
			         	</tr>';
	}
echo '</table>';
?>