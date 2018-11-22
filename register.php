<?php
	
$name=$_POST['name'];
$last=$_POST['last'];
$user=$_POST['user'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$address=$_POST['address'];
$tel=$_POST['tel'];

	$db = mysqli_connect('localhost', 'root', '', 'proyecto');

	if (isset($_POST['insert'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$user= $_POST['user'];
   		$pass=$_POST['pass'];
        $last=$_POST['last'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $tipo="U";

		mysqli_query($db, "INSERT INTO usuarios (usuario, password, tipo, name, last, correo, direccion, telefono) VALUES ('$user', '$pass', '$tipo', '$name', '$last', '$email', '$address', '$tel')"); 
		
		header('location: login.html');
	}


?>

