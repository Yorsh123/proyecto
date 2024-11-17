<?php
include('../conexion.php');

$id = isset($_POST['id-registro']) ? $_POST['id-registro'] : '';
$proceso = isset($_POST['pro']) ? $_POST['pro'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : '';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';

if ($id !== '' && $proceso !== '' && $nombre !== '' && $pass !== '' && $nivel !== '' && $codigo !== '') {
    $stmt = $conexion->prepare("INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES (?, ?, ?, ?, 'images/fotos_perfil/perfil.jpg')");
    $stmt->bind_param("ssii", $nombre, $pass, $nivel, $codigo);
    $stmt->execute();
    $stmt->close();
}

$registro = $conexion->query("SELECT * FROM usuarios ORDER BY idUsuario ASC");

echo '<table class="table table-striped table-condensed table-hover">
        <tr>
            <th width="20%">Nombre Usuario</th>
            <th width="20%">Contraseña</th>
            <th width="20%">Nivel usuario</th>
            <th width="20%">Codigo</th>
            <th width="20%">Opciones</th>
        </tr>';

while ($registro2 = $registro->fetch_assoc()) {
    echo '<tr>
              <td>'.$registro2['NombreUsuario'].'</td>
              <td>'.$registro2['PassUsuario'].'</td>
              <td>'.$registro2['NivelUsuario'].'</td>
              <td>'.$registro2['Codigo'].'</td>
              <td>
                <a href="javascript:editarRegistro('.$registro2['idUsuario'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" />
                </a>
                <a href="javascript:eliminarRegistro('.$registro2['idUsuario'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" />
                </a>
              </td>
          </tr>';
}

echo '</table>';

$conexion->close();
?>
