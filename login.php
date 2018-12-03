<?php
		
		$errores= array();
		$datos=array();
		
			include 'func/connect.php';

			$usuario=mysqli_real_escape_string($con, $_POST['usuario']);
    		$contra=mysqli_real_escape_string($con, $_POST['contra']);

			$sql="SELECT usuario, password, tipo, id FROM usuarios where usuario='".$usuario."'"; //GUARDA LA LINEA DE SQL COMPLETA
			$result=mysqli_query($con,$sql); //GRABA EN RECORDSET MEDIANTE LA LINEA DE SELECT
			$resultcheck=mysqli_num_rows($result);
			
			if($resultcheck>=1) {
				if($row=mysqli_fetch_row($result)){
					$hashedPwdCheck= password_verify($contra, $row[1]);
					if($hashedPwdCheck==true){
						
						if($row[2]=="A"){
						$datos['exito']=true;
       	    			$datos['mensaje']='Bienvenido Administrador';
						}else if($row[2]=="U"){
						$datos['exito2']=true;
       	    			$datos['mensaje2']='Bienvenido';
						}
					}
				}
			}else{
				$errores['PassUsu']= "Contrasena y/o Usuario incorrecto";
				$datos['exito']=false;
        		$datos['errores']=$errores;
			}
				
    
    //Dar respuesta

    echo json_encode($datos);

  ?>