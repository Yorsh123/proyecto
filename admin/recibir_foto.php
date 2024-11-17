<?php
include ('conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];

$rutaservidor = 'images/fotos_perfil';
$rutatemporal = $_FILES['foto']['tmp_name'];
$nombrefoto = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];
$rutadestino = $rutaservidor . '/' . $nombrefoto;
move_uploaded_file($rutatemporal, $rutadestino);

if (($tipo == "image/jpeg") || ($tipo == "image/png") || ($tipo == "image/jpg")) {
    $sql = "UPDATE usuarios SET Foto = '$rutadestino' WHERE Codigo = '$codigo'";
    $res = mysqli_query($conexion, $sql);
    if ($res) {
        echo '<script> alert("Se ha actualizado su Foto.");</script>';
        echo '<script> window.location="cambiar_foto.php"; </script>';
    } else {
        echo '<script> alert("Error al actualizar su Foto.");</script>';
        echo '<script> window.location="cambiar_foto.php"; </script>';
    }
} else {
    echo '<script> alert("Solo se permiten imágenes de tipo PNG y JPG.");</script>';
    echo '<script> window.location="cambiar_foto.php"; </script>';
}
?>
