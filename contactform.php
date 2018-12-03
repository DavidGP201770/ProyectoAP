<?php
	
	if(isset($_POST['enviar']))
	
	{
		$mailform=$_POST['mail'];
		
		if(filter_var($mailform, FILTER_VALIDATE_EMAIL)){
        //$errores['emailInvalido']='Ingresa un correo valido Ej. ex@gmail.com';
    
		$name=$_POST['name'];
		$tele=$_POST['tele'];
		$subject=$_POST['subject'];
		
		$message=$_POST['message'];
		
		$mailTo="devtecnology2018@outlook.com";
		$headers="De: ".$mailform;
		$txt="Telefono: ".$tele.".\n\n Haz recibido un correo electronico de ".$name.".\n\n".$message;
		mail($mailTo,$subject,$txt,$headers);
		header("Location: contacto.html?mailsent");
			}
		
	}
	else{
			header("Location: contacto.html?mailerror");
		}

	
?>