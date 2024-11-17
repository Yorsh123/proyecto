<?php
include('conexion.php');

// Crear una instancia de conexión MySQLi
$conexion = new mysqli("localhost", "root", "", "siad");

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar el número de registros en cada tabla
$TotalEstudiantes = $conexion->query("SELECT * FROM estudiantes")->num_rows;
$TotalDocentes = $conexion->query("SELECT * FROM docentes")->num_rows;
$TotalAsignaturas = $conexion->query("SELECT * FROM asignaturas")->num_rows;
$TotalCarreras = $conexion->query("SELECT * FROM carreras")->num_rows;
$TotalCuatrimestre = $conexion->query("SELECT * FROM cuatrimestres")->num_rows;
$TotalGrupos = $conexion->query("SELECT * FROM grupos")->num_rows;
$TotalHorarios = $conexion->query("SELECT * FROM horarios")->num_rows;
$TotalTurnos = $conexion->query("SELECT * FROM turnos")->num_rows;
$TotalUsuarios = $conexion->query("SELECT * FROM usuarios")->num_rows;
$TotalYearsAcademicos = $conexion->query("SELECT * FROM years_academicos")->num_rows;
$TotalPlanesEstudio = $conexion->query("SELECT * FROM plan_estudio")->num_rows;
$TotalNumeroAsignaciones = $conexion->query("SELECT * FROM numeros_asignaciones")->num_rows;
$TotalUsuarios = $conexion->query("SELECT * FROM usuarios")->num_rows;
$TotalAsignaciones = $conexion->query("SELECT * FROM asignaciones")->num_rows;
$TotalInscripciones = $conexion->query("SELECT * FROM inscripciones_asignaturas")->num_rows;
$TotalMensajes = $conexion->query("SELECT * FROM mensajes")->num_rows;

// Cerrar la conexión
$conexion->close();
?>

         <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-child fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Estudiantes</h4>
                         <p>Total de Estudiantes: <span class="label label-danger pull-right"><?php echo $TotalEstudiantes ?></span></p>
                         <a href="estudiantes.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-sign-in fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Asignaciones</h4>
                       <p>Total de Asignaciones: <span class="label label-danger pull-right"><?php echo $TotalAsignaciones ?></span></p>
                      <a href="asignaciones.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Planes de Estudio</h4>
                         <p>Planes de Estudio: <span class="label label-danger pull-right"><?php echo $TotalPlanesEstudio ?></span></p>
                       <a href="planes_estudio.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-sort-numeric-asc fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Numeros Asignaciones</h4>
                         <p>Total de Asignaciones: <span class="label label-danger pull-right"><?php echo $TotalNumeroAsignaciones ?></span></p>
                       <a href="numero_asignaciones.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-lg-12">
            </div>
                        <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-clipboard fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Incripciones Asignaturas</h4>
                        <p>Total de Inscripciones: <span class="label label-danger pull-right"><?php echo $TotalInscripciones ?></span></p>
                        <a href="inscripcion_Asignaturas.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                       <h4 class="media-heading">Asignaturas</h4>
                       <p>Total de Asignaturas: <span class="label label-danger pull-right"><?php echo $TotalAsignaturas ?></span></p>
                       <a href="asignaturas.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Año Academico</h4>
                       <p>Años Academicos: <span class="label label-danger pull-right"><?php echo $TotalYearsAcademicos ?></span></p>
                        <a href="anios_academicos.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-graduation-cap fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Carreras</h4>
                     <p>Total de Estudiantes: <span class="label label-danger pull-right"><?php echo $TotalCarreras ?></span></p>
                      <a href="carreras.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-th fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                          <h4 class="media-heading">Semestre</h4>
                      <p>Total de Semestres: <span class="label label-danger pull-right"><?php echo $TotalCuatrimestre ?></span></p>
                      <a href="cuatrimestre.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-list-ol fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Grupos</h4>
                      <p>Total de Grupos: <span class="label label-danger pull-right"><?php echo $TotalGrupos ?></span></p>
                      <a href="grupos.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-sort-amount-desc fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Turnos</h4>
                        <p>Total de Turnos: <span class="label label-danger pull-right"><?php echo $TotalTurnos ?></span></p>
                        <a href="turnos.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                            <h4 class="media-heading">Horarios</h4>
                        <p>Total de Horarios: <span class="label label-danger pull-right"><?php echo $TotalHorarios ?></span></p>
                      <a href="horarios.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>


         <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-group fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Docentes</h4>
                       <p>Total de Docentes: <span class="label label-danger pull-right"><?php echo $TotalDocentes ?></span></p>
                       <a href="docentes.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Backups</h4>
                      <p>Copias y Restauracion de BD <span class="label label-danger pull-right"></span></p>
                      <a href="copias_seguridad2.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Usuarios</h4>
                        <p>Total de Usuarios: <span class="label label-danger pull-right"><?php echo $TotalUsuarios ?></span></p>
                        <a href="usuarios.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Mensajes</h4>
                        <p>Total de Usuarios: <span class="label label-danger pull-right"><?php echo $TotalMensajes ?></span></p>
                        <a href="mensajes.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                            <h4 class="media-heading">Configuraciones</h4>
                        <p>Configuracion de Cuenta<span class="label label-danger pull-right"></span></p>
                      <a href="cambiar_foto.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>