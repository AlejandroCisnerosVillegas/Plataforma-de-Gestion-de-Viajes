<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['login'])==0)
		{	
	header('location:index.php');
	}
	else{
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
		</style>
	</head>
	<body>
		<div class="top-header">
			<?php include('includes/header.php');?>
			<div class="banner-9">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Transformamos tus sueños en aventuras</h1>
				</div>
			</div>
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Registro de Asesoramiento</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();">
						<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<p>
							<table border="1" width="100%" class="table" style="border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: box-shadow 0.3s ease;">
								<tr align="center">
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Número</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Código de Asesoramiento</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Temática a Tratar</th>    
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Asunto</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Observación del Administrador</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Registro en Sistema</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Fecha de Registro</th>
								</tr>
								<?php 
									$uemail=$_SESSION['login'];;
									$sql = "SELECT * from project_07_issues where UserEmail=:uemail";
									$query = $dbh->prepare($sql);
									$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $result)
									{	
								?>
								<tr align="center">
									<td ><?php echo htmlentities($cnt);?></td>
									<td width="100">50720014<?php echo htmlentities($result->id);?></td>
									<td><?php echo htmlentities($result->Issue);?></td>
									<td width="300"><?php echo htmlentities($result->Description);?></td>
									<td><?php echo htmlentities($result->AdminRemark);?></td>
									<td width="100"><?php echo htmlentities($result->PostingDate);?></td>
									<td width="100"><?php echo htmlentities($result->AdminremarkDate);?></td>
								</tr>
								<?php $cnt=$cnt+1; }} ?>
							</table>
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