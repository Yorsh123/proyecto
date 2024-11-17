<?php
    // session_start();
    $codigo = $_SESSION["Codigo"];
    include '../admin/conexion.php';

    $inscripciones = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM inscripciones_asignaturas WHERE idEstudiante = $codigo"));
    $tareas = mysqli_num_rows(mysqli_query($conexion, "SELECT entrega_tareas.idEntregaTareas AS id, entrega_tareas.CodigoTareaDocente AS CodigoDocente, asignaturas.NombreAsignatura AS Asignatura, entrega_tareas.Descripcion AS Descripcion, entrega_tareas.CodigoEnvioTarea AS CodigoTarea, entrega_tareas.Archivo AS Archivo
            FROM entrega_tareas
            INNER JOIN asignaturas ON entrega_tareas.idAsignatura = asignaturas.idAsignatura
            INNER JOIN estudiantes ON entrega_tareas.idEstudiante = estudiantes.idEstudiante
            WHERE estudiantes.idEstudiante = '$codigo'"));
?>

<div class="col-md-3">
    <div class="list-group">
        <a class="list-group-item active">Catalogo del Estudiante</a>
        <a href="#" class="list-group-item">
            <i class="glyphicon glyphicon-pencil"></i>
            &nbsp;&nbsp;Asignaturas Inscritas
            <span class="label label-warning pull-right"><?php echo $inscripciones ?></span>
        </a>
        <a href="material_didactico.php" class="list-group-item">
            <i class="glyphicon glyphicon-folder-open"></i>
            &nbsp;&nbsp; Material Didactico
        </a>
        <a href="tareas_recibidas.php" class="list-group-item">
            <i class="glyphicon glyphicon-share"></i>
            &nbsp;&nbsp; Tareas Asignadas
        </a>
        <a href="entrega_tarea.php" class="list-group-item">
            <i class="glyphicon glyphicon-file"></i>
            &nbsp;&nbsp; Entrega Tareas
            <span class="label label-warning pull-right"><?php echo $tareas ?></span>
        </a>
        <a href="mis_calificaciones.php" class="list-group-item">
            <i class="glyphicon glyphicon-list-alt"></i>
            &nbsp;&nbsp; Notas de Clases
        </a>
        <a href="#" class="list-group-item">
            <i class="glyphicon glyphicon-book"></i>
            &nbsp;&nbsp; Mis Estadisticas
        </a>
        <a href="cambiar_foto.php" class="list-group-item">
            <i class="glyphicon glyphicon-user"></i>
            &nbsp;&nbsp; Cambiar Foto
        </a>
        <br>
    </div>
</div>
