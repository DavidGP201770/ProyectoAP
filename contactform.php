<?php
	
	if(isset($_POST['enviar']))
	{
		$name=$_POST['name'];
		$tele=$_POST['tele'];
		$subject=$_POST['subject'];
		$mailform=$_POST['mail'];
		$message=$_POST['message'];
	}

	$mailTo="davicho201170@gmail.com";
	$headers="De: ".$mailform;
	$txt="Telefono: ".$tele.".\n\n Haz recibido un correo electronico de ".$name.".\n\n".$message;
	mail($mailTo,$subject,$txt,$headers);
	header("Location: contacto.html?mailsent");
?>