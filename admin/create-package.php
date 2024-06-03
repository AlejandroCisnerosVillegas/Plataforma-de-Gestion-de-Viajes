<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['alogin'])==0)
	{	
		header('location:index.php');
	}
	else{
	if(isset($_POST['submit']))
	{
		$pname=$_POST['packagename'];
		$ptype=$_POST['packagetype'];	
		$plocation=$_POST['packagelocation'];
		$pprice=$_POST['packageprice'];	
		$pfeatures=$_POST['packagefeatures'];
		$pdetails=$_POST['packagedetails'];	
		$pimage=$_FILES["packageimage"]["name"];
		move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
		$sql="INSERT INTO project_07_tourpackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage) VALUES(:pname,:ptype,:plocation,:pprice,:pfeatures,:pdetails,:pimage)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':pname',$pname,PDO::PARAM_STR);
		$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
		$query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
		$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
		$query->bindParam(':pfeatures',$pfeatures,PDO::PARAM_STR);
		$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
		$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			$msg="Paquete Turístico creado satisfactoriamente.";
		}
		else 
		{
			$error="Ocurrió un error. Por favor, inténtalo nuevamente.";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
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
		<div class="page-container">
			<div class="left-content">
				<div class="mother-grid-inner">
					<?php include('includes/header.php');?>	
					<div class="clearfix"> </div>	
				</div>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php" style="font-size: 16px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'"><strong>Inicio</strong></a><i class="fa fa-angle-right"></i>Elaborar Paquete Turístico</li>
				</ol>
				<div class="grid-form">
					<div class="grid-form1">
						<h3>Crear Paquete Turístico</h3>
						<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<div class="tab-content">
							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Oferta de Viaje:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Ingresar oferta de viaje" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" required>
										</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Modelo:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder="Ingresar modelo de paquete vacacional" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" required>
										</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Destino Turístico:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packagelocation" id="packagelocation" placeholder="Ingresar destino turístico" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" required>
										</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Precio Global:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder="Ingresa el costo en peso mexicano" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" required>
										</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Beneficios:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="Ingresar los beneficios del paquete" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" required>
										</div>
									</div>		
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Contenido:</label>
										<div class="col-sm-8">
											<textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Describe el contenido del paquete turístico" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" required></textarea> 
										</div>
									</div>															
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Imagen del Sitio Turístico:</label>
										<div class="col-sm-8">
											<input type="file" name="packageimage" id="packageimage" required style="background-color: #cce6ff; border: 1px solid #99ccff; padding: 8px; border-radius: 5px; color: #333;">
										</div>
									</div>	
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" name="submit" value="Generar Oferta Turística" 
												style="background-color: #87ceeb; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;
												transition: background-color 0.3s, color 0.3s;"
												onmouseover="this.style.backgroundColor='#25A0E6'; this.style.color='#ffffff';"
												onmouseout="this.style.backgroundColor='#87ceeb'; this.style.color='#ffffff';"
												onmousedown="this.style.backgroundColor='#1d7cb3';">
											<input type="reset" name="reset" value="Reiniciar Formulario" 
												style="background-color: #5f626d; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;
												transition: background-color 0.3s, color 0.3s;"
												onmouseover="this.style.backgroundColor='#97B6CC'; this.style.color='#ffffff';"
												onmouseout="this.style.backgroundColor='#5f626d'; this.style.color='#ffffff';"
												onmousedown="this.style.backgroundColor='#1d7cb3';">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="panel-footer">
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