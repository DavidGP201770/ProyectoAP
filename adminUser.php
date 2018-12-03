<?php
		
		$errores= array();
		$datos=array();
		
			include 'func/connect.php';

			$pass=mysqli_real_escape_string($con, $_POST['pass']);
            $nuevapass=mysqli_real_escape_string($con, $_POST['nuevapass']);
            $confnuevapass=mysqli_real_escape_string($con, $_POST['confnuevapass']);

			$sql="SELECT id, password FROM usuarios WHERE tipo='A'"; //GUARDA LA LINEA DE SQL COMPLETA
			$result=mysqli_query($con,$sql); //GRABA EN RECORDSET MEDIANTE LA LINEA DE SELECT
			$resultcheck=mysqli_num_rows($result);
			
			if($resultcheck>=1) {
				if($row=mysqli_fetch_row($result)){
					$hashedPwdCheck= password_verify($pass, $row[1]);
					if($hashedPwdCheck==true){
                        $id=$row[0];
                        $hashedpwd= password_hash($nuevapass, PASSWORD_DEFAULT);
						mysqli_query($con, "UPDATE usuarios SET password='".$hashedpwd."' WHERE id='".$id."'");
						$datos['exito']=true;
       	    			$datos['mensaje']='Contraseña cambiada';
						
					}
				}
			}else{
				$errores['Pass']= "Contraseña incorrecta";
				$datos['exito']=false;
        		$datos['errores']=$errores;
			}
				
    
    //Dar respuesta

    echo json_encode($datos);

  ?>