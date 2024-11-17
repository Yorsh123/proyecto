<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysql_query("DELETE FROM asignaciones WHERE idAsignacion = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysql_query("SELECT  asignaciones.idAsignacion AS id, asignaciones.Descripcion AS Asignacion,concat(docentes.NombresDocente,' ',docentes.ApellidosDocente) as Docente, 
             asignaturas.NombreAsignatura AS Asignatura, grupos.NumeroGrupo AS Grupo, turnos.NombreTurno AS Turno, horarios.NombreHorario AS Horario, asignaciones.Estado AS Estado, asignaciones.NumeroAsignacion AS NumeroA
FROM       asignaciones INNER JOIN docentes ON asignaciones.idDocente = docentes.idDocente 
                        INNER JOIN asignaturas ON asignaciones.idAsignatura = asignaturas.idAsignatura 
            INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo 
            INNER JOIN turnos ON asignaciones.idTurno = turnos.idTurno 
            INNER JOIN horarios ON asignaciones.idHorario = horarios.idHorario ORDER BY asignaciones.idAsignacion ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                          <th width="10%">Descripcion</th>  
                        <th width="15%">Docente</th> 
                        <th width="15%">Asignatura</th>
                        <th width="7%">Grupo</th>
                        <th width="8%">Turno</th>        
                        <th width="15%">Horario</th>
                        <th width="10%">Estado</th>
                        <th width="10%">Numero</th>
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		        echo '<tr>
		                       <td>'.$registro2['Asignacion'].'</td>
                          <td>'.$registro2['Docente'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Grupo'].'</td>
                          <td>'.$registro2['Turno'].'</td>
                          <td>'.$registro2['Horario'].'</td>
                           <td>'.$registro2['Estado'].'</td>
                          <td>'.$registro2['NumeroA'].'</td>
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
			         	</tr>';
	}
echo '</table>';
?>