<?php
	session_start();
	include('includes/config.php');
	if(isset($_POST['login']))
	{
		$uname=$_POST['username'];
		$password=md5($_POST['password']);
		$sql ="SELECT UserName,Password FROM project_07_admin WHERE UserName=:uname and Password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			$_SESSION['alogin']=$_POST['username'];
			echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
		} else{
			echo "<script>alert('No se encontraron registros con los datos ingresados.');</script>";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Plataforma de Gestión de Viajes</title>
		<link rel="icon" href="../../../assets/img/logo.png">
		<link rel="apple-touch-icon" href="../../../assets/img/logo-grande.png">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/morris.css" type="text/css"/>
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery-ui.css"> 
		<script src="js/jquery-2.1.4.min.js"></script>
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	</head> 
	<body>
		<div class="main-wthree">
			<div class="container">
				<div class="sin-w3-agile">
				<div style="background-color: rgba(248, 249, 250, 0.8); border-radius: 10px; padding: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
						<h2 class="signin-heading" style="color: #333; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Panel de Administración</h2>
						<form class="signin-form" method="post">
							<div class="form-group">
								<label for="username" class="signin-label" style="font-size: 18px; color: #555;">Nombre de Usuario:</label>
								<input type="text" name="username" class="form-control" id="username" placeholder="Ingresar nombre de usuario" style="border-radius: 5px; border: 1px solid #ccc; padding: 12px; width: 100%; background-color: #fff;" required>
							</div>
							<div class="form-group">
								<label for="password" class="signin-label" style="font-size: 18px; color: #555;">Clave de Acceso:</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Ingresar clave de acceso" style="border-radius: 5px; border: 1px solid #ccc; padding: 12px; width: 100%; background-color: #fff;" required>
							</div>
							<div class="form-group">
								<a href="forgot-password.php" class="forgot-link" style="font-size: 16px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'"><strong>Olvide mi Contraseña</strong></a>
							</div>
							<input type="submit" name="login" value="Acceder al Sistema" 
								style="background-color: #87ceeb; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;
								transition: background-color 0.3s, color 0.3s; display: block; margin: 0 auto;"
								onmouseover="this.style.backgroundColor='#25A0E6'; this.style.color='#ffffff'; this.style.display='block'; this.style.margin='0 auto';"
								onmouseout="this.style.backgroundColor='#87ceeb'; this.style.color='#ffffff'; this.style.display='block'; this.style.margin='0 auto';"
								onmousedown="this.style.backgroundColor='#1d7cb3';" >
						</form>
						<div class="back-to-home">
							<a href="../index.php" class="back-link" style="font-size: 18px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'">Regresar al Inicio</a>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</body>
</html>