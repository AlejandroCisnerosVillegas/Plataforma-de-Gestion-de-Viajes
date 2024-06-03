<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(isset($_POST['submit2']))
	{
		$pid=intval($_GET['pkgid']);
		$useremail=$_SESSION['login'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$comment=$_POST['comment'];
		$status=0;
		$sql="INSERT INTO project_07_booking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':pid',$pid,PDO::PARAM_STR);
		$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
		$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
		$query->bindParam(':todate',$todate,PDO::PARAM_STR);
		$query->bindParam(':comment',$comment,PDO::PARAM_STR);
		$query->bindParam(':status',$status,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			$msg="Tu reservación se ha realizado con éxito.";
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
		<link rel="stylesheet" href="css/jquery-ui.css" />
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
		<?php include('includes/header.php');?>
		<div class="banner-7">
			<div class="container">
				<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Transformamos tus sueños en aventuras</h1>
			</div>
		</div>
		<div class="selectroom">
			<div class="container">	
				<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<?php 
					$pid=intval($_GET['pkgid']);
					$sql = "SELECT * from project_07_tourpackages where PackageId=:pid";
					$query = $dbh->prepare($sql);
					$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
						foreach($results as $result)
					{	
				?>
				<form name="book" method="post">
					<div class="selectroom_top">
						<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
							<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
							<h2><?php echo htmlentities($result->PackageName);?></h2><br>
							<p><b>Modelo de Paquete Vacacional: </b> <?php echo htmlentities($result->PackageType);?></p>
							<p><b>Destino Turístico: </b> <?php echo htmlentities($result->PackageLocation);?></p>
							<p><b>Beneficios del Paquete: </b> <?php echo htmlentities($result->PackageFetures);?></p>
							<div class="ban-bottom">
								<div class="bnr-right">
									<label class="inputLabel">Fecha de Inicio</label>
									<input class="form-control" type="date" name="fromdate" required="">
								</div>
								<div class="bnr-right">
									<label class="inputLabel">Fecha de Termino</label>
									<input class="form-control" type="date" name="todate" required="">
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="grand">
								<br><p><strong>Precio Global del Paquete Turístico</strong></p>
								<h3>$<?php echo htmlentities($result->PackagePrice);?> MXN.</h3>
							</div>
						</div>
						<h3>Contenido del Paquete Turístico</h3>
						<p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p>	
						<div class="clearfix"></div>
					</div>
					<div class="selectroom_top">
						<h2>Travesía Turística</h2>
						<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
							<ul>
								<li class="spe">
									<label class="inputLabel">Consultas o comentarios sobre el Tour</label>
									<input class="form-control" type="text" name="comment" required="">
								</li>
								<?php if($_SESSION['login'])
								{?>
									<li class="spe" align="center">
										<button type="submit" name="submit2" class="btn-custom">Reservar Paquete</button>
									</li>
								<?php } else {?>
									<li class="sigi" align="center" style="margin-top: 1%">
										<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-custom">Reservar Paquete</a>
									</li>
								<?php } ?>
								<div class="clearfix"></div>
							</ul>
						</div>
					</div>
				</form>
				<?php }} ?>
			</div>
		</div>
		<?php include('includes/footer.php');?>
		<?php include('includes/signup.php');?>			
		<?php include('includes/signin.php');?>			
		<?php include('includes/write-us.php');?>
	</body>
</html>