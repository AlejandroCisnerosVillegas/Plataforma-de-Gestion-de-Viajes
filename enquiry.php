<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(isset($_POST['submit1']))
	{
		$fname=$_POST['fname'];
		$email=$_POST['email'];	
		$mobile=$_POST['mobileno'];
		$subject=$_POST['subject'];	
		$description=$_POST['description'];
		$sql="INSERT INTO  project_07_enquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname',$fname,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
		$query->bindParam(':subject',$subject,PDO::PARAM_STR);
		$query->bindParam(':description',$description,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			$msg="Tu consulta se ha enviado correctamente.";
		}
		else 
		{
			$error="Se ha producido un error. Por favor, vuelve a intentarlo.";
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
			<div class="banner-3">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Transformamos tus sueños en aventuras</h1>
				</div>
			</div>
			<div class="privacy" style="display: flex; justify-content: center;  align-items: center;">
				<div class="container" style="text-align: center;">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="margin-bottom: 20px; visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">¿Algo no está claro? Envíanos un mensaje y te ayudaremos.</h3>
					<form name="enquiry" method="post" style="max-width: 400px; margin: auto; text-align: left;">
						<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<p style="width: 400px;">
							<b>Nombre Completo</b>  <input type="text" name="fname" class="form-control" id="fname" placeholder="Ingresar nombre completo" required="">
						</p> 
						<p style="width: 400px;">
							<b>Correo Electrónico</b>  <input type="email" name="email" class="form-control" id="email" placeholder="Ingresar correo electrónico" required="">
						</p> 
						<p style="width: 400px;">
							<b>Número Telefónico</b>  <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="Ingresar número telefónico" required="">
						</p> 
						<p style="width: 400px;">
							<b>Motivo del Mensaje</b>  <input type="text" name="subject" class="form-control" id="subject"  placeholder="Introduce el motivo del mensaje" required="">
						</p> 
						<p style="width: 400px;">
							<b>Descripción del Mensaje</b>  <textarea name="description" class="form-control" rows="6" cols="50" id="description"  placeholder="Descripción del mensaje" required=""></textarea> 
						</p> 
						<p style="width: 400px;">
							<button type="submit" name="submit1" class="btn-custom">Enviar Mensaje</button>
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