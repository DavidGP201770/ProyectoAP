<?php  include('conexion.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM usuarios WHERE id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['direccion'];
      $pass=$n['password'];
      $user=$n['usuario'];
      $last=$n['last'];
      $email=$n['correo'];
      $tel=$n['telefono'];

		}
	}
?>

    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Mantenimiento </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <link href="adminstyle.css" rel="stylesheet">


</head>

<body>

  <div class="header">
    <img src="pics/f3.jpg" style="width: 100%;height: auto">
    <div class="centered">
        <i id="icon" class="fa fa-home" style="text-shadow: none; font-size: 106px; color: rgb(255, 255, 255); height: 135px; width: 135px; line-height: 135px; border-radius: 9%; text-align: center; background-color: rgb(3, 53, 62);"></i> 
      <h1>DEV TECHNOLOGY</h1>
      <H1></H1>
    </div>
  </div>

  <!--Navbar-->
  <nav class="navbar sticky-top navbar-expand-md navbar-dark " style="background-color:#04060F">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">
      <i id="icon" class="fa fa-home" style="text-shadow: none; font-size: 33px; color: rgb(255, 255, 255); height: 40px; width: 40px; line-height: 40px; border-radius: 8%; text-align: center; background-color: rgb(3, 53, 62);"></i>
    </a>

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="administracionusuarios.php">DEV Technology
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.html">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html">Acerca de Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.html">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminUser.html">Config</a>
      </li>
      
      <!-- Collapsible content -->
  </ul>
  </nav>
  <!--/.Navbar-->

  <!-- BODY -->
  <body>

	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM usuarios WHERE tipo='U'"); ?>

<table>
	<thead>
		<tr>
      <th>Usuario</th>
      <th>Password</th>
			<th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo</th>
			<th>Direccion</th>
      <th>Telefono</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
      <td><?php echo $row['usuario']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['last']; ?></td>
      <td><?php echo $row['correo']; ?></td>
			<td><?php echo $row['direccion']; ?></td>
      <td><?php echo $row['telefono']; ?></td>
			<td>
				<a href="administracionusuarios.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="conexion.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>


	<form  action="conexion.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
      <label>Usuario</label>
      <input type="text" name="user" pattern="[A-Za-z0-9_-]{5,20}" value="<?php echo $user; ?>" required>
    </div>
    <div class="input-group">
      <label>Contraseña</label>
      <input type="password" id="txtPassword" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,300}" onkeyup="checkPass(); return false;"  value="<?php echo $pass; ?>" required>
      <p id="demo"></p>
    </div>
		<div class="input-group">
			<label>Nombre</label>
			<input type="text" name="name" pattern="[A-Za-z]{1,50}.[A-Za-z]{1,50}" value="<?php echo $name; ?>" required>
		</div>
    <div class="input-group">
      <label>Apellido</label>
      <input type="text" name="last" pattern="[A-Za-z]{1,50}.[A-Za-z]{1,50}" value="<?php echo $last; ?>" required>
    </div>
    <div class="input-group">
      <label>Correo</label>
      <input type="text" name="email" value="<?php echo $email; ?>" required>
    </div>
		<div class="input-group">
			<label>Direccion</label>
			<input type="text" name="address" pattern="[A-Za-z0-9]{1,50}.[A-Za-z0-9]{1,50}.[A-Za-z0-9]{1,50}" value="<?php echo $address; ?>" required>
		</div>
    <div class="input-group">
      <label>Telefono</label>
      <input type="text" name="tel" pattern="[0-9]{10,10}" value="<?php echo $tel; ?>" required>
    </div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
				<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>



  <!-- /BODY-->
  <hr>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI="
        crossorigin="anonymous"></script>
    <!--<script src="main.js"></script>-->
    <script>
        
        function checkPass() {
            var pass1 = document.getElementById('txtPassword');

            var goodColor = "#CCFFCC";
            var badColor = "#FFCCCC";

            var lowerCaseLetters = /[a-z]/g;
            var upperCaseLetters = /[A-Z]/g;
            var numbers = /[0-9]/g;
  
 
            if ((pass1.value.match(lowerCaseLetters)) &&  (pass1.value.match(upperCaseLetters)) && (pass1.value.match(numbers)) && (pass1.value.length >= 10)) {
                pass1.style.backgroundColor = goodColor;
                document.getElementById("demo").innerHTML = "";
               
            } else {
                pass1.style.backgroundColor = badColor;
                document.getElementById("demo").innerHTML = "Contraseña necesita Mayusculas, Minusculas, Numeros y Minimo 10 caracteres";
            }
        }
    </script>


</body>
</html>





















