<?php  

$valor_estado=$_POST['estado'];
$valor_estado2=$_POST['estado2'];
$valor_estado3=$_POST['estado3'];
$valor_estado4=$_POST['estado4'];
$valor_estado5=$_POST['estado5'];
$valor_estado6=$_POST['estado6'];
$valor_estado7=$_POST['estado7'];

if($valor_estado=="2")
{
	exec('sudo python /var/www/pi/prende.py');
	
}else{

	exec('sudo python /var/www/pi/apaga.py');
}

if($valor_estado2=="2")
{
	
	exec('sudo python /var/www/pi/prende.py');
	
}else{

	
	exec('sudo python /var/www/pi/apaga.py');
}

if($valor_estado3=="2")
{
	
	exec('sudo python /var/www/pi/prende.py');
	
}else{

	
	exec('sudo python /var/www/pi/apaga.py');
}

if($valor_estado4=="2")
{
	exec('sudo python /var/www/pi/prende.py');
	
}else{

	
	exec('sudo python /var/www/pi/apaga.py');
}

if($valor_estado5=="2")
{
	
	exec('sudo python /var/www/pi/prende.py');
	
}else{


	exec('sudo python /var/www/pi/apaga.py');
}

if($valor_estado6=="2")
{
	
	exec('sudo python /var/www/pi/prende.py');
	
}else{

	
	exec('sudo python /var/www/pi/apaga.py');
}

if($valor_estado7=="2")
{
	
	exec('sudo python /var/www/pi/prende.py');
	
}else{

	
	exec('sudo python /var/www/pi/apaga.py');
}

