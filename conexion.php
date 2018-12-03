<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'proyecto');

	// initialize variables
	$name = "";
	$address = "";
	$user= "";
    $pass="";
    $last="";
    $email="";
    $tel="";
    $tipo="U";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$user= $_POST['user'];
   		$pass= $_POST['pass'];
        $last= $_POST['last'];
        $email= $_POST['email'];
        $tel= $_POST['tel'];

		$hashedpwd= password_hash($pass, PASSWORD_DEFAULT);
       
		mysqli_query($db, "INSERT INTO usuarios (usuario, password, tipo, name, last, correo, direccion, telefono) 
		VALUES ('$user', '$hashedpwd', '$tipo', '$name', '$last', '$email', '$address', '$tel')"); 
		$_SESSION['message'] = "Usuario guardado"; 
		header('location: administracionusuarios.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$user= $_POST['user'];
   		$pass= $_POST['pass'];
        $last= $_POST['last'];
        $email= $_POST['email'];
        $tel= $_POST['tel'];

		$hashedpwd= password_hash($pass, PASSWORD_DEFAULT);
 
		mysqli_query($db, "UPDATE usuarios SET usuario='$user', password='$hashedpwd', name='$name', last='$last', correo='$email', direccion='$address', telefono='$tel' 
		WHERE id=$id");
		$_SESSION['message'] = "Usuario actualizado!"; 
		header('location: administracionusuarios.php');
    }

    if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM usuarios WHERE id=$id");
		$_SESSION['message'] = "Usuario eliminado!"; 
		header('location: administracionusuarios.php');
    }

	?>