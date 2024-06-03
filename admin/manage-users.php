
<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');

	if (strlen($_SESSION['alogin']) == 0) {	
		header('location:index.php');
	} 
		else { 
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
	</head> 
	<body>
		<div class="page-container">
			<div class="left-content">
				<div class="mother-grid-inner">
					<?php include('includes/header.php');?>
					<div class="clearfix"> </div>	
				</div>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php" style="font-size: 16px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'"><strong>Inicio</strong></a><i class="fa fa-angle-right"></i>Gestionar Usuarios</li>
				</ol>
				<div class="agile-grids">	
					<div class="agile-tables">
						<div class="w3l-table-info">
							<h2>Administrar Usuarios</h2>
							<table id="table" style="border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: box-shadow 0.3s ease;">
								<thead>
									<tr>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Número</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Nombre</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Número Telefónico</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Correo Electrónico</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Fecha de Registro</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Última Actualización</th>
										<th style="text-align: center; background-color: #87ceeb; color: white; padding: 16px;">Acción</th>
									</tr>
								</thead>
								<tbody>
									<?php $sql = "SELECT * from project_07_users";
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
										<td><?php echo htmlentities($cnt);?></td>
										<td><?php echo htmlentities($result->FullName);?></td>
										<td><?php echo htmlentities($result->MobileNumber);?></td>
										<td><?php echo htmlentities($result->EmailId);?></td>
										<td><?php echo htmlentities($result->RegDate);?></td>
										<td><?php echo htmlentities($result->UpdationDate);?></td><a href="">
										<td><a href="update-user.php?uid=<?php echo htmlentities($result->EmailId);?>&&uname=<?php echo htmlentities($result->FullName);?>" class="btn btn-primary">Registro Usuario</a></td>
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