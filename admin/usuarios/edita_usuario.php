<?php
include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica si se envían todos los datos necesarios, incluyendo el `id`
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['nivel']) && isset($_POST['codigo'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
        $nivel = $_POST['nivel'];
        $codigo = $_POST['codigo'];

        // Encriptar la contraseña solo si se proporciona una nueva
        if (!empty($pass)) {
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
            $query = "UPDATE usuarios SET NombreUsuario = ?, PassUsuario = ?, NivelUsuario = ?, Codigo = ? WHERE idUsuario = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("ssiii", $nombre, $hashed_pass, $nivel, $codigo, $id);
        } else {
            // Si no se proporciona una nueva contraseña, no actualizar ese campo
            $query = "UPDATE usuarios SET NombreUsuario = ?, NivelUsuario = ?, Codigo = ? WHERE idUsuario = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("siii", $nombre, $nivel, $codigo, $id);
        }

        // Ejecutar la consulta y verificar si la actualización fue exitosa
        if ($stmt->execute()) {
            echo "Usuario editado exitosamente.";
        } else {
            echo "Error al editar el usuario: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: No se proporcionaron los datos completos para la edición.";
    }
}

// Cerrar la conexión
$conexion->close();
?>

