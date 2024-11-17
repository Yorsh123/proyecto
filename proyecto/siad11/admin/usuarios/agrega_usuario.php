<?php
include('../conexion.php');

// Captura de los datos del formulario
$id = isset($_POST['id-registro']) ? $_POST['id-registro'] : '';
$proceso = isset($_POST['pro']) ? $_POST['pro'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';

// Verifica que todos los campos requeridos estén completos
if ($id !== '' && $proceso !== '' && $nombre !== '' && $pass !== '' && $nivel !== '' && $codigo !== '') {
    // Encriptación de la contraseña
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES (?, ?, ?, ?, 'images/fotos_perfil/perfil.jpg')");
    $stmt->bind_param("ssii", $nombre, $hashed_pass, $nivel, $codigo);

    // Ejecutar y verificar si la inserción fue exitosa
    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Mostrar registros existentes
$registro = $conexion->query("SELECT * FROM usuarios ORDER BY idUsuario ASC");

echo '<table class="table table-striped table-condensed table-hover">
        <tr>
            <th width="20%">Nombre Usuario</th>
            <th width="20%">Contraseña</th>
            <th width="20%">Nivel usuario</th>
            <th width="20%">Codigo</th>
            <th width="20%">Opciones</th>
        </tr>';

// Mostrar cada registro
while ($registro2 = $registro->fetch_assoc()) {
    echo '<tr>
              <td>'.$registro2['NombreUsuario'].'</td>
              <td>'.$registro2['PassUsuario'].'</td>
              <td>'.$registro2['NivelUsuario'].'</td>
              <td>'.$registro2['Codigo'].'</td>
              <td>
                <a href="javascript:editarRegistro('.$registro2['idUsuario'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="Editar" title="Editar" />
                </a>
                <a href="javascript:eliminarRegistro('.$registro2['idUsuario'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="Eliminar" title="Eliminar" />
                </a>
              </td>
          </tr>';
}

echo '</table>';

// Cerrar la conexión
$conexion->close();
?>
