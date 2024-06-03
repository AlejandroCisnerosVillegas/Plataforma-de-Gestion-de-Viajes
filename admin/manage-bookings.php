<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['alogin'])==0)
	{	
		header('location:index.php');
	}
	else{ 
	if(isset($_REQUEST['bkid']))
	{
		$bid=intval($_GET['bkid']);
		$status=2;
		$cancelby='a';
		$sql = "UPDATE project_07_booking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
		$query = $dbh->prepare($sql);
		$query -> bindParam(':status',$status, PDO::PARAM_STR);
		$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
		$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
		$query -> execute();
		$msg="Reservación cancelada con éxito.";
	}
	if(isset($_REQUEST['bckid']))
	{
		$bcid=intval($_GET['bckid']);
		$status=1;
		$cancelby='a';
		$sql = "UPDATE project_07_booking SET status=:status WHERE BookingId=:bcid";
		$query = $dbh->prepare($sql);
		$query -> bindParam(':status',$status, PDO::PARAM_STR);
		$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
		$query -> execute();
		$msg="Reservación confirmada con éxito.";
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
		<script src="js/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/table-style.css" />
		<link rel="stylesheet" type="text/css" href="css/basictable.css" />
		<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			$('#table').basictable();
			$('#table-breakpoint').basictable({
				breakpoint: 768
			});
			$('#table-swap-axis').basictable({
				swapAxis: true
			});
			$('#table-force-off').basictable({
				forceResponsive: false
			});
			$('#table-no-resize').basictable({
				noResize: true
			});
			$('#table-two-axis').basictable();
			$('#table-max-height').basictable({
				tableWrapper: true
			});
			});
		</script>
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
		<div class="page-container">
			<div class="left-content">
				<div class="mother-grid-inner">
					<?php include('includes/header.php');?>
					<div class="clearfix"> </div>	
				</div>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php" style="font-size: 16px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'"><strong>Inicio</strong></a><i class="fa fa-angle-right"></i>Historial de Reservas</li>
				</ol>
				<div class="agile-grids">	
					<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
					else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2>Lista de Reservaciones</h2>
							<table id="table" style="border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: box-shadow 0.3s ease;">
								<thead>
									<tr>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Código</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Nombre</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Teléfono</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Correo Electrónico</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Fecha de Registro</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Periodo</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Comentario</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Estado</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Acción</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$sql = "SELECT project_07_booking.BookingId as bookid,project_07_users.FullName as fname,project_07_users.MobileNumber as mnumber,project_07_users.EmailId as email,project_07_tourpackages.PackageName as pckname,project_07_booking.PackageId as pid,project_07_booking.FromDate as fdate,project_07_booking.ToDate as tdate,project_07_booking.Comment as comment,project_07_booking.status as status,project_07_booking.CancelledBy as cancelby,project_07_booking.UpdationDate as upddate from  project_07_booking
										left join project_07_users  on  project_07_booking.UserEmail=project_07_users.EmailId
										left join project_07_tourpackages on project_07_tourpackages.PackageId=project_07_booking.PackageId";
										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $result)
										{
									?>		
									<tr>
										<td>30280017<?php echo htmlentities($result->bookid);?></td>
										<td><?php echo htmlentities($result->fname);?></td>
										<td><?php echo htmlentities($result->mnumber);?></td>
										<td><?php echo htmlentities($result->email);?></td>
										<td><a href="update-package.php?pid=<?php echo htmlentities($result->pid);?>"><?php echo htmlentities($result->pckname);?></a></td>
										<td><?php echo htmlentities($result->fdate);?> To <?php echo htmlentities($result->tdate);?></td>
										<td><?php echo htmlentities($result->comment);?></td>
										<td><?php if($result->status==0)
											{
											echo "Pendiente";
											}
											if($result->status==1)
											{
											echo "Confirmado";
											}
											if($result->status==2 and  $result->cancelby=='a')
											{
											echo "Cancelado el día " .$result->upddate;
											} 
											if($result->status==2 and $result->cancelby=='u')
											{
											echo "Cancelado por el usuario el día " .$result->upddate;
											}
											?>
										</td>
										<?php if($result->status==2)
										{
											?><td style="color: #0F95C3;"><strong>Cancelado</strong></td>
										<?php } elseif($result->status==1)
										{
											?><td style="color: #0F95C3;"><strong>Confirmado</strong></td>
										<?php }
										else {?>
											<td><a style="color: #DD1E1E;" onmouseover="this.style.color='#ff5959'" onmouseout="this.style.color='#DD1E1E'" href="manage-bookings.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('¿Realmente quieres cancelar la reservación?')" ><strong>Cancelar</strong></a> / <a style="color: #1CBF17;" onmouseover="this.style.color='#2aff24'" onmouseout="this.style.color='#1CBF17'" href="manage-bookings.php?bckid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('La reservación ha sido confirmada.')" ><strong>Confirmar</strong></a></td>
										<?php }?>
									</tr>
									<?php $cnt=$cnt+1;} }?>
								</tbody>
							</table>
						</div>
					</div>
					<script>
						$(document).ready(function() {
							var navoffeset=$(".header-main").offset().top;
							$(window).scroll(function(){
								var scrollpos=$(window).scrollTop(); 
								if(scrollpos >=navoffeset){
									$(".header-main").addClass("fixed");
								}else{
									$(".header-main").removeClass("fixed");
								}
							});
						});
					</script>
					<div class="inner-block">
					</div>
					<?php include('includes/footer.php');?>
				</div>
			</div>
			<?php include('includes/sidebarmenu.php');?>
			<div class="clearfix"></div>		
		</div>
		<script>
			var toggle = true;		
			$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
				$("#menu span").css({"position":"relative"});
				}, 400);
			}			
			toggle = !toggle;
			});
		</script>
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php } ?>