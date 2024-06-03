<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$newpassword=md5($_POST['newpassword']);
		$sql ="SELECT EmailId FROM project_07_admin WHERE EmailId=:email and MobileNumber=:mobile";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
			$con="update project_07_admin set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			echo "<script>alert('La contraseña se actualizó correctamente.');</script>";
		}
		else {
		echo "<script>alert('El correo electrónico o el número de teléfono no son válidos.');</script>";
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
		<script type="text/javascript">
		function valid()
		{
			if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
			{
				alert("La contraseña y su confirmación no son idénticas.");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
				return true;
		}
		</script>
	</head> 
	<body>
		<div class="main-wthree">
			<div class="container">
				<div class="sin-w3-agile">
					<div style="background-color: rgba(248, 249, 250, 0.8); border-radius: 10px; padding: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
						<h2 style="color: #333; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Recuperar Acceso al Sistema</h2>
						<form  name="chngpwd" method="post" onSubmit="return valid();">
							<div class="username" style="margin-bottom: 20px;">
								<span class="username" style="font-size: 18px; color: #555;">Correo Electrónico:</span>
								<input type="email" name="email" class="name" placeholder="Ingresar Correo Electrónico" style="border-radius: 5px; border: 1px solid #ccc; padding: 12px; width: 100%; background-color: #fff;" required="">
								<div class="clearfix"></div>
							</div>
							<div>
							<div class="username" style="margin-bottom: 20px;">
								<span class="username" style="font-size: 18px; color: #555;">Número Telefónico:</span>
								<input type="text" name="mobile" class="name" placeholder="Ingresar Número Telefónico" style="border-radius: 5px; border: 1px solid #ccc; padding: 12px; width: 100%; background-color: #fff;" required="" maxlength="10">
								<div class="clearfix"></div>
							</div>
							<div class="password-agileits" style="margin-bottom: 20px;">
								<span class="username" style="font-size: 18px; color: #555;">Nueva Contraseña:</span>
								<input type="password" class="password" name="newpassword" id="newpassword" placeholder="Ingresar Contraseña" style="border-radius: 5px; border: 1px solid #ccc; padding: 12px; width: 100%; background-color: #fff;" required="">
								<div class="clearfix"></div>
							</div>
							<div class="password-agileits" style="margin-bottom: 20px;">
								<span class="username" style="font-size: 18px; color: #555;">Confirmar Contraseña:</span>
								<input type="password" name="confirmpassword" id="confirmpassword" class="password" placeholder="Confirma la Contraseña" style="border-radius: 5px; border: 1px solid #ccc; padding: 12px; width: 100%; background-color: #fff;" required="">
								<div class="clearfix"></div>
							</div>
							<div>
								<input type="submit" name="submit" value="Actualizar Contraseña" 
									style="background-color: #87ceeb; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;
									transition: background-color 0.3s, color 0.3s; display: block; margin: 0 auto;"
									onmouseover="this.style.backgroundColor='#25A0E6'; this.style.color='#ffffff'; this.style.display='block'; this.style.margin='0 auto';"
									onmouseout="this.style.backgroundColor='#87ceeb'; this.style.color='#ffffff'; this.style.display='block'; this.style.margin='0 auto';"
									onmousedown="this.style.backgroundColor='#1d7cb3';">
							</div>
							<div class="clearfix"></div>
						</form>
						<div class="back-to-home" style="margin-top: 20px;">
							<a href="index.php" style="font-size: 18px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'">Iniciar Sesión</a>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</body>
</html>