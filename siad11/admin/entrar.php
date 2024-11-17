
<?php
		include('conexion.php');
	
			$username=htmlentities(mysqli_real_escape_string($conexion, $_POST['usuario']));
			$password=mysqli_real_escape_string($conexion, $_POST['password']);
			$tipo = $_POST['tipousuario'];
				
				$query = mysqli_query($conexion, "SELECT Nombreusuario,PassUsuario, NivelUsuario FROM usuarios WHERE Nombreusuario = '$username'") or die(mysqli_error($conexion,));
				$data = mysqli_fetch_array($query);
			        if($data['Nombreusuario'] != $username && ['PassUsuario'] != $password)  {
						//echo "No a introducido una contrasenia correcta";
						echo '<script> alert("Datos Incorrectos.");</script>';
						header ("Location: ../login.php");
						exit();
		             }
		             else
		              {
			              	if ($tipo == 1) {
			              		echo '<script> alert("Bienvenido a la Pagina Principal.");</script>';
							    header ("Location: ../index.php");
			              	}
			              	elseif ($tipo == 2) {
			              		echo '<script> alert("Bienvenido a la Pagina de Docentes.");</script>';
							    header ("Location: ../admin/admin.php");
			              	}
			              	else{
			              		echo '<script> alert("Bienvenido a la Pagina de Estudiantes.");</script>';
							    header ("Location: ../admin/estudiantes.php");
			              	}
							//$query = mysqli_query("SELECT username,password,imagen FROM usuarios WHERE username = '$username'") or die(mysqli_error());
							//$row = mysqli_fetch_array($query);
							//$username2 = $row['username'];
							//$_SESSION["s_username"] = $row['username'];
							//$_SESSION["logeado"] = "SI";
							//$_SESSION["s_id"] = $row['ID'];
							//$_SESSION["img"] = $row['imagen'];
                      }
?> 