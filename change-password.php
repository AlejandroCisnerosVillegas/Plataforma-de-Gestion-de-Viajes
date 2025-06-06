<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['login'])==0)
	{	
		header('location:index.php');
	}
	else{
	if(isset($_POST['submit5']))
	{
		$password=md5($_POST['password']);
		$newpassword=md5($_POST['newpassword']);
		$email=$_SESSION['login'];
		$sql ="SELECT Password FROM project_07_users WHERE EmailId=:email and Password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
			$con="update project_07_users set Password=:newpassword where EmailId=:email";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			$msg="La contraseña se ha cambiado con éxito.";
		}
		else {
			$error="La contraseña ingresada no es correcta.";	
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Plataforma de Gestión de Viajes</title>
		<link rel="icon" href="../../assets/img/logo.png">
		<link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
		<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href="css/font-awesome.css" rel="stylesheet">
		<script src="js/jquery-1.12.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<script type="text/javascript">
			function valid()
			{
				if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
				{
					alert("Las contraseñas proporcionadas no son iguales en ambos campos.");
					document.chngpwd.confirmpassword.focus();
					return false;
				}
				return true;
			}
		</script>
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
				box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			}
			.succWrap{
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
				box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			}
			.btn-custom {
				background-color: #87ceeb;
				color: #ffffff;
				border: none;
				border-radius: 5px;
				padding: 10px 20px;
				cursor: pointer;
			}
			.btn-custom:hover {
				background-color: #25A0E6;
				color: #ffffff;
			}
		</style>
	</head>
	<body>
		<div class="top-header">
			<?php include('includes/header.php');?>
			<div class="banner-10">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Transformamos tus sueños en aventuras</h1>
				</div>
			</div>
			<div class="privacy" style="display: flex; justify-content: center;  align-items: center;">
				<div class="container" style="text-align: center;">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-bottom: 20px; visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Cambiar la Clave de Acceso</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();" style="max-width: 400px; margin: auto; text-align: left;">
						<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<p style="width: 400px;">
							<b>Contraseña Actual</b>	
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa la contraseña actual" required="">
						</p> 
						<p style="width: 400px;">
							<b>Nueva Contraseña</b>
							<input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Ingresa nueva contraseña" required="">
						</p>
						<p style="width: 400px;">
							<b>Confirmar Contraseña</b>
							<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirma la contraseña" required="">
						</p>
						<p style="width: 400px;">
							<button type="submit" name="submit5" class="btn-custom">Actualizar la Contraseña</button>
						</p>
					</form>	
				</div>
			</div>
			<?php include('includes/footer.php');?>
			<?php include('includes/signup.php');?>			
			<?php include('includes/signin.php');?>			
			<?php include('includes/write-us.php');?>
	</body>
</html>
<?php } ?>