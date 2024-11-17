<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$foto = "images/fotos_perfil/perfil.jpg";

switch ($proceso) {
    case 'Registro':
        mysqli_query($conexion, "INSERT INTO docentes (NombresDocente, ApellidosDocente, CedulaDocente, CorreoDocente, CelularDocente, TelefonoDocente, DireccionDocente, Estado, Foto) VALUES('$nombre','$apellido','$cedula','$correo','$celular','$telefono','$direccion','$estado','$foto')");

        $consulta = mysqli_query($conexion, "SELECT idDocente FROM docentes WHERE CedulaDocente = '$cedula' AND CorreoDocente = '$correo'");
        while ($filas = mysqli_fetch_array($consulta)) {
            $codigo_docente = $filas['idDocente'];
        }
        mysqli_query($conexion, "INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo) VALUES('$correo','$cedula','2','$codigo_docente')");

        break;
    case 'Edicion':
        mysqli_query($conexion, "UPDATE docentes SET NombresDocente = '$nombre', ApellidosDocente = '$apellido', CedulaDocente = '$cedula', CorreoDocente = '$correo', CelularDocente = '$celular', TelefonoDocente = '$telefono', DireccionDocente = '$direccion', Estado = '$estado' WHERE idDocente = '$id'");

        mysqli_query($conexion, "UPDATE usuarios SET NombreUsuario = '$correo', PassUsuario = '$cedula' WHERE Codigo = '$id'");

        break;
}

$registro = mysqli_query($conexion, "SELECT * FROM docentes ORDER BY idDocente ASC");

echo '<table class="table table-striped table-condensed table-hover">
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

while ($registro2 = mysqli_fetch_array($registro)) {
    echo '<tr>
            <td>'.$registro2['NombresDocente'].'</td>
            <td>'.$registro2['ApellidosDocente'].'</td>
            <td>'.$registro2['CedulaDocente'].'</td>
            <td>'.$registro2['CorreoDocente'].'</td>
            <td>'.$registro2['CelularDocente'].'</td>
            <td>'.$registro2['TelefonoDocente'].'</td>
            <td>'.$registro2['DireccionDocente'].'</td>
            <td>'.$registro2['Estado'].'</td>
            <td>
                <a href="javascript:editarRegistro('.$registro2['idDocente'].');">
                    <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" />
                </a>
                <a href="javascript:eliminarRegistro('.$registro2['idDocente'].');">
                    <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" />
                </a>
            </td>
        </tr>';
}

echo '</table>';
?>
