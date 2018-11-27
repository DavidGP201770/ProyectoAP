<?php  

$valor_estado=$_POST['valor_estado'];
$valor_estado2=$_POST['valor_estado2'];
$valor_estado3=$_POST['valor_estado3'];
$valor_estado4=$_POST['valor_estado4'];
$valor_estado5=$_POST['valor_estado5'];
$valor_estado6=$_POST['valor_estado6'];
$valor_estado7=$_POST['valor_estado7'];

//contador
 
if($valor_estado==1)
{
	exec('sudo python /var/www/pi/apaga.py'):
}else{
	exec('sudo python /var/www/pi/prende.py'):
}

if($valor_estado2==1)
{
	exec('sudo python /var/www/pi/apaga2.py'):
	//do while
}else{
	exec('sudo python /var/www/pi/prende2.py'):
}

if($valor_estado3==1)
{
	exec('sudo python /var/www/pi/apaga3.py'):
}else{
	exec('sudo python /var/www/pi/prende3.py'):
}

if($valor_estado4==1)
{
	exec('sudo python /var/www/pi/apaga4.py'):
}else{
	exec('sudo python /var/www/pi/prende4.py'):
}

if($valor_estado5==1)
{
	exec('sudo python /var/www/pi/apaga5.py'):
}else{
	exec('sudo python /var/www/pi/prende5.py'):
}

if($valor_estado6==1)
{
	exec('sudo python /var/www/pi/apaga6.py'):
}else{
	exec('sudo python /var/www/pi/prende6.py'):
}

if($valor_estado7==1)
{
	exec('sudo python /var/www/pi/apaga7.py'):
}else{
	exec('sudo python /var/www/pi/prende7.py'):
}

?>