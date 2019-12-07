<!DOCTYPE html>
<html>
<head>
	<title>Gestor de Carga ~ MatiPenguin.</title>
</head>
<body>


<div class="registrar">
	<form action="" method="post">
		<input type="text" name="nombre" placeholder="NOMBRE" value="" class="texto" required />

		<br />

		<input type="email" name="email" placeholder="Correo" value="" class="texto" required />
		
		<br />

		<input type="password" name="contrasena" placeholder="Contraseña" value="" class="texto" required />

		<br />

		<input type="password" name="repcontrasena" placeholder="Repita la contraseña" value="" class="texto" required />

		<br />

		<input type="checkbox" name="check" class="check" required /><span>Acepto los <a href="javascript:void(0)" id="terminosbtn">Terminos y Condiciones</a></span>.
		<br />
		
		<input type="submit" name="registrar" class="btn" required />
	</form>
	<span><a href="login.php" class="elboton">Ya tengo una cuenta.</a></span>
</div>
<?php 

	if (isset($_POST['registrar'])) {
        $servername = "sql10.freesqldatabase.com";
		$database = "sql10314806";
		$username = "sql10314806";
		$password = "CvV6PBB6xz";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$usuario = $_POST['usuario'];
		$contrasena = md5($_POST['contrasena']);
		$repcontrasena = md5($_POST['repcontrasena']);

		$comprobarusuario = mysqli_num_rows(mysqli_query($conn, "SELECT usuario FROM usuarios WHERE usuario = '$usuario'"));

		$comprobaremail = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM usuarios WHERE email = '$email'"));

		if ($comprobarusuario >= 1) {
			echo "El nombre de usuario esta registrado";
			# code...
		} else{
			if ($comprobaremail >= 1) {
				# code...
				echo "el correo ya esta registrado";
			} else{
				if ($contrasena != $repcontrasena) {
					# code...
					echo "Las contraseñas no coiunciden";
				} else{
					$insertar = mysqli_query($conn, "INSERT INTO usuarios (nombre,email,usuario,contrasena,fecha_reg, avatar) values ('$nombre','$email','$usuario','$contrasena', now(), 'defect.jpg')");
					if ($insertar) {
						# code...
						echo '
							<script>
							var cont = document.getElementById("cont");
							cont.style.display = "none";
							</script>
							';
						echo '<center><img class="verified" src="https://img.icons8.com/dusk/64/000000/verified-account--v2.png"></center>';
					
					} else{
						echo "NOOOO";
					}
				}
			}
		}
				// header("Refresh: 2; url = avasca.html");
				// header("Refresh: 3; url = login.php");
				mysqli_close($conn);

	}

 ?>

</body>
</html>