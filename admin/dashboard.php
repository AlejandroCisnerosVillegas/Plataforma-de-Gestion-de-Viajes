<?php
	session_start();
	include('includes/config.php');
	if(strlen($_SESSION['alogin'])==0)
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
		<link rel="icon" href="../../../assets/img/logo.png">
		<link rel="apple-touch-icon" href="../../../assets/img/logo-grande.png">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/morris.css" type="text/css"/>
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<script src="js/jquery-2.1.4.min.js"></script>
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	</head> 
	<body>
		<div class="page-container">
			<div class="left-content">
				<div class="mother-grid-inner">
					<?php include('includes/header.php');?>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard.php" style="font-size: 16px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'"><strong>Inicio</strong></a> <i class="fa fa-angle-right"></i></li>
					</ol>
					<div class="four-grids">
						<a href="manage-users.php" target="_blank">
							<div class="col-md-4 four-grid">
								<div class="four-agileits">
									<div class="icon">
										<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Administrar Usuarios</h3>
										<?php $sql = "SELECT id from project_07_users";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=$query->rowCount();
										?>
										<h4> <?php echo htmlentities($cnt);?> </h4>
									</div>
								</div>
							</div>
						</a>
						<a href="manageissues.php" target="_blank">
							<div class="col-md-4 four-grid">
								<div class="four-agileits">
									<div class="icon">
										<i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Asesoramiento</h3>
										<?php $sql5 = "SELECT id from project_07_issues";
											$query5= $dbh -> prepare($sql5);
											$query5->execute();
											$results5=$query5->fetchAll(PDO::FETCH_OBJ);
											$cnt5=$query5->rowCount();
										?>
										<h4><?php echo htmlentities($cnt5);?></h4>
									</div>
								</div>
							</div>
						</a>
						<a href="manage-packages.php" target="_blank">
							<div class="col-md-4 four-grid">
								<div class="four-agileits">
									<div class="icon">
										<i class="glyphicon glyphicon-plane" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Paquetes Turísticos</h3>
										<?php $sql3 = "SELECT PackageId from project_07_tourpackages";
											$query3= $dbh -> prepare($sql3);
											$query3->execute();
											$results3=$query3->fetchAll(PDO::FETCH_OBJ);
											$cnt3=$query3->rowCount();
										?>
										<h4><?php echo htmlentities($cnt3);?></h4>
									</div>	
								</div>
							</div>
						</a>
						<div class="clearfix"></div>
					</div>
					<div class="four-grids">
						<a href="manage-enquires.php" target="_blank">
							<div class="col-md-4 four-grid">
								<div class="four-agileits">
									<div class="icon">
										<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Gestionar Consultas</h3>
										<?php $sql2 = "SELECT id from project_07_enquiry";
											$query2= $dbh -> prepare($sql2);
											$query2->execute();
											$results2=$query2->fetchAll(PDO::FETCH_OBJ);
											$cnt2=$query2->rowCount();
										?>
										<h4><?php echo htmlentities($cnt2);?></h4>
									</div>
								</div>
							</div>
						</a>
						<a href="manage-enquires.php" target="_blank">
							<div class="col-md-4 four-grid">
								<div class="four-agileits">
									<div class="icon">
										<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Consultas Pendientes</h3>
										<?php $sql ="SELECT id from project_07_enquiry where (Status is null || Status='')";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$newenq=$query->rowCount();
										?>
										<h4> <?php echo htmlentities($newenq);?></h4>	
									</div>
								</div>
							</div>
						</a>
						<a href="manage-enquires.php" target="_blank">
							<div class="col-md-4 four-grid">
								<div class="four-agileits">
									<div class="icon">
										<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Consultas Asistidas</h3>
										<?php $sql5 ="SELECT id from project_07_enquiry where (Status='1')";
											$query5= $dbh -> prepare($sql5);
											$query5->execute();
											$results5=$query5->fetchAll(PDO::FETCH_OBJ);
											$redenq=$query5->rowCount();
										?>
										<h4><?php echo htmlentities($redenq);?></h4>	
									</div>	
								</div>
							</div>
						</a>
						<div class="clearfix"></div>
					</div>
					<div class="four-grids">
						<a href="manage-bookings.php" target="_blank">
							<div class="col-md-3 four-grid">
								<div class="four-agileinfo">
									<div class="icon">
										<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Reservaciones</h3>
										<?php $sql1 = "SELECT BookingId from project_07_booking";
											$query1 = $dbh -> prepare($sql1);
											$query1->execute();
											$results1=$query1->fetchAll(PDO::FETCH_OBJ);
											$cnt1=$query1->rowCount();
										?>
										<h4><?php echo htmlentities($cnt1);?></h4>
									</div>
								</div>
							</div>
						</a>
						<a href="manage-bookings.php" target="_blank">
							<div class="col-md-3 four-grid">
								<div class="four-agileinfo" style="color:#ffc107 !important">
									<div class="icon">
										<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Reservaciones Nuevas</h3>
										<?php $sql ="SELECT BookingId from project_07_booking where (status is null || status='')";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$newbookings=$query->rowCount();
										?>
										<h4> <?php echo htmlentities($newbookings);?></h4>	
									</div>
								</div>
							</div>
						</a>
						<a href="manage-bookings.php" target="_blank">
							<div class="col-md-3 four-grid">
								<div class="four-agileinfo">
									<div class="icon">
										<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Cancelaciones</h3>
										<?php $sql ="SELECT BookingId from project_07_booking where (status='2')";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cancelbooking=$query->rowCount();
										?>
										<h4> <?php echo htmlentities($cancelbooking);?></h4>	
									</div>
								</div>
							</div>
						</a>
						<a href="manage-bookings.php" target="_blank">
							<div class="col-md-3 four-grid">
								<div class="four-agileinfo">
									<div class="icon">
										<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Confirmaciones</h3>
										<?php $sql ="SELECT BookingId from project_07_booking where (status='1')";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cancelbooking=$query->rowCount();
										?>
										<h4> <?php echo htmlentities($cancelbooking);?> </h4>	
									</div>
								</div>
							</div>
						</a>
						<div class="clearfix"></div>
					</div>
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
		<script src="js/raphael-min.js"></script>
		<script src="js/morris.js"></script>
		<script>
			$(document).ready(function() {
				jQuery('.small-graph-box').hover(function() {
				jQuery(this).find('.box-button').fadeIn('fast');
			}, function() {
				jQuery(this).find('.box-button').fadeOut('fast');
			});
				jQuery('.small-graph-box .box-close').click(function() {
				jQuery(this).closest('.small-graph-box').fadeOut(200);
				return false;
			});
			
			function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
			}
				graphArea2 = Morris.Area({
				element: 'hero-area',
				padding: 10,
				behaveLikeLine: true,
				gridEnabled: false,
				gridLineColor: '#dddddd',
				axes: true,
				resize: true,
				smooth:true,
				pointSize: 0,
				lineWidth: 0,
				fillOpacity:0.85,
				data: [
					{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
					{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
					{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
					{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
					{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
					{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
					{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
					{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
					{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
					{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
				],
				lineColors:['#ff4a43','#a2d200','#22beef'],
				xkey: 'period',
				redraw: true,
				ykeys: ['iphone', 'ipad', 'itouch'],
				labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
				pointSize: 2,
				hideHover: 'auto',
				resize: true
			});
			});
		</script>
	</body>
</html>
<?php } ?>