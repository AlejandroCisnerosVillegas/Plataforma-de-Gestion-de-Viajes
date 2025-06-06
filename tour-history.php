<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['login'])==0)
	{	
		header('location:index.php');
	}
	else{
	if(isset($_REQUEST['bkid']))
	{
		$bid=intval($_GET['bkid']);
		$email=$_SESSION['login'];
		$sql ="SELECT FromDate FROM project_07_booking WHERE UserEmail=:email and BookingId=:bid";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':bid', $bid, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			foreach($results as $result)
			{
				$fdate=$result->FromDate;
				$a=explode("/",$fdate);
				$val=array_reverse($a);
				$mydate =implode("/",$val);
				$cdate=date('Y/m/d');
				$date1=date_create("$cdate");
				$date2=date_create("$fdate");
				$diff=date_diff($date1,$date2);
				echo $df=$diff->format("%a");
				if($df>1)
				{
					$status=2;
					$cancelby='u';
					$sql = "UPDATE project_07_booking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
					$query = $dbh->prepare($sql);
					$query -> bindParam(':status',$status, PDO::PARAM_STR);
					$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
					$query-> bindParam(':email',$email, PDO::PARAM_STR);
					$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
					$query -> execute();
					$msg="Reservación cancelada con éxito.";
				}
				else
				{
					$error="No se podrán efectuar cancelaciones una vez transcurrido el plazo de 24 horas previo a la reservación.";
				}
			}
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
		</style>
	</head>
	<body>
		<div class="top-header">
			<?php include('includes/header.php');?>
			<div class="banner-4">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Transformamos tus sueños en aventuras</h1>
				</div>
			</div>
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Historial de Mis Tours</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();">
						<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<p>
						<table border="1" width="100%" class="table" style="border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: box-shadow 0.3s ease;">
								<tr align="center">
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Número</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Código de Confirmación</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Paquete Turístico</th>    
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Comienzo</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Termino</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Observación</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Estado</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Registro en Sistema</th>
									<th style="text-align: center; background-color: #97B6CC; color: white; padding: 12px;">Acción</th>
								</tr>
								<?php 
									$uemail=$_SESSION['login'];;
									$sql = "SELECT project_07_booking.BookingId as bookid,project_07_booking.PackageId as pkgid,project_07_tourpackages.PackageName as packagename,project_07_booking.FromDate as fromdate,project_07_booking.ToDate as todate,project_07_booking.Comment as comment,project_07_booking.status as status,project_07_booking.RegDate as regdate,project_07_booking.CancelledBy as cancelby,project_07_booking.UpdationDate as upddate from project_07_booking join project_07_tourpackages on project_07_tourpackages.PackageId=project_07_booking.PackageId where UserEmail=:uemail";
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
									<td><?php echo htmlentities($cnt);?></td>
									<td>30280017<?php echo htmlentities($result->bookid);?></td>
									<td><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a></td>
									<td><?php echo htmlentities($result->fromdate);?></td>
									<td><?php echo htmlentities($result->todate);?></td>
									<td><?php echo htmlentities($result->comment);?></td>
									<td><?php if($result->status==0)
										{
											echo "Pendiente";
										}
										if($result->status==1)
										{
											echo "Confirmado";
										}
										if($result->status==2 and  $result->cancelby=='u')
										{
										echo "Cancelación de Usuario: " .$result->upddate;
										} 
										if($result->status==2 and $result->cancelby=='a')
										{
										echo "Cancelación de Administración: " .$result->upddate;

										}
									?></td>
									<td><?php echo htmlentities($result->regdate);?></td>
									<?php if($result->status==2)
									{
									?><td>Cancelar</td>
									<?php } else {?>
									<td><a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('¿Estás seguro de que deseas cancelar la reservación?')" >Cancelar</a></td>
									<?php }?>
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