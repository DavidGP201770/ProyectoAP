<?php

    $errores= array();
    $datos=array();
    include ('func/connect.php');

    $usuario=mysqli_real_escape_string($con, $_POST['usuario']);
    $correo=mysqli_real_escape_string($con, $_POST['correo']);
    $contra=mysqli_real_escape_string($con, $_POST['contra']);
    $contraConf=mysqli_real_escape_string($con, $_POST['contraConf']);
    $nombre=mysqli_real_escape_string($con, $_POST['nombre']);
    $last=mysqli_real_escape_string($con, $_POST['last']);
    $direccion=mysqli_real_escape_string($con, $_POST['direccion']);
    $telefono=mysqli_real_escape_string($con, $_POST['telefono']);

  
    //Usuario existe?
    
    $result=mysqli_query($con, "SELECT * FROM usuarios WHERE usuario = '".$usuario."'");

    if(mysqli_num_rows($result)>0)
    {
        $band=1;
    }else
    {
        $band=0;
    }
//Validamos los parametros;
    if($band==1){
        $errores['usuExiste'] = 'Usuario ya existe';
    }
    if($contra!=$contraConf){
        $errores['confpass'] =  'Las contrasenas no son iguales';
    }
    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $errores['emailInvalido']='Ingresa un correo valido Ej. ex@gmail.com';
    }
   
          
        

    /*if(empty($_POST['usuario'])){
        $errores['usuario'] =  'Se requiere especificar nombre de usuario';
    }
    else 
    {
        $usuario=$_POST['usuario'];
    }

    if(empty($_POST['contra'])){
        $errores['contra'] =  'Se requiere especificar una contrasena';
    }
    else 
    {
        $contra=$_POST['contra'];
    }*/

    //Generando nuestra respuesta: 

    if(empty($errores))
    {
        $tipo="U";
        $hashedpwd= password_hash($contra, PASSWORD_DEFAULT);
        mysqli_query($con, "INSERT INTO usuarios (usuario, password, tipo, name, last, correo, direccion, telefono) 
        VALUES('".$usuario."','".$hashedpwd."','".$tipo."','".$nombre."','".$last."','".$correo."','".$direccion."','".$telefono."')");

        $datos['exito']=true;
        $datos['mensaje']='El registro se ha realizado correctamente';

        //mysqli_close($con);
    }
    else
    {
        $datos['exito']=false;
        $datos['errores']=$errores;

    }
    
    //Dar respuesta

    echo json_encode($datos);


    
?>