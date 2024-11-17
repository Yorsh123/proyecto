<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT  material_didactico.idMaterialDidactico AS id, material_didactico.idDocente as idDocente, material_didactico.Descripcion AS Descripcion, material_didactico.Archivo as Archivo, material_didactico.CodigoMaterial as Codigo, material_didactico.Fecha_Subida as Fecha, numeros_asignaciones.numeroAsignado as Numero
FROM material_didactico INNER JOIN numeros_asignaciones ON material_didactico.idNumeroAsignacion = numeros_asignaciones.idNumeroAsignacion
where material_didactico.CodigoMaterial = '$dato' ORDER BY material_didactico.idMaterialDidactico ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                        <th width="30%">Descripcion</th> 
                        <th width="30%">Archivo</th>
                        <th width="15%">Fecha de Subida</th>                 
                        <th width="20%">Ver Archivo</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>                 
                           <td> <a href="../docentes/material_didactico/pdf/archivo.php?id='.$registro2['id'].'"> <img src="../docentes/images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>                                       
                             </td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="4">No se ha encontrado el archivo</td>
      			</tr>';
      }
      echo '</table>';
?>
