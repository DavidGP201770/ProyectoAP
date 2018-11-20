<?php
		
		
$usr=$_POST['usr'];
$psw=$_POST['psw'];


	function validacion($fusr,$fpsw){

			$nombrebd="id7336924_proyecto";
			$servidor="localhost";
			$usuario="id7336924_proyecto";
			$contrasena="Admin1234";
			$tipA="a";
			$tipU="u";
			$n=0;
			$encontrado=0;

			
						$conexion=mysqli_connect($servidor,$usuario,$contrasena,$nombrebd) or die("<h2> No se encuentra el servidor</h2>");

						$consultabd="select * from $nombrebd.usuarios"; //GUARDA LA LINEA DE SQL COMPLETA
						$resultados=mysqli_query($conexion,$consultabd); //GRABA EN RECORDSET MEDIANTE LA LINEA DE SELECT
						while($fila=mysqli_fetch_row($resultados)){ //ESTA GENERA LA CONSULTA REALMENTE PERO NO DE LA BD SI NO DEL RECORDSET

							/*echo "$fila[0]";
							echo "$fila[1]";
							echo "$fila[2]";*/

							if ($fusr==$fila[1] && $fpsw==$fila[2]) {
							$encontrado=1;
								break;
							}
						}
								if ($encontrado==1) {
							
										if ($tipA==$fila[3]){
											include "administracionusuarios.html";
										}
										if ($tipU==$fila[3]) {
											include "inicio.html";
										}
								}
							if($fusr!=$fila[1] && $fpsw!=$fila[2]){
					echo "Acceso Denegado tu usuario y/o contrasena es incorrecta";
							}

			return $conexion;
	}

			validacion($usr,$psw);


  ?>