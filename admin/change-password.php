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
			$password=md5($_POST['password']);
			$newpassword=md5($_POST['newpassword']);
			$username=$_SESSION['alogin'];
			$sql ="SELECT Password FROM project_07_admin WHERE UserName=:username and Password=:password";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':username', $username, PDO::PARAM_STR);
			$query-> bindParam(':password', $password, PDO::PARAM_STR);
			$query-> execute();
			$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
			$con="update project_07_admin set Password=:newpassword where UserName=:username";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			$msg="La contraseña se actualizó con éxito.";
		}
		else {
			$error="La contraseña que has introducido es incorrecta.";	
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
		<script type="text/javascript">
			function valid()
			{
				if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
			{
				alert("Las contraseñas ingresadas no son idénticas.");
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
		<div class="page-container">
			<div class="left-content">
				<div class="mother-grid-inner">
					<?php include('includes/header.php');?>		
					<div class="clearfix"> </div>	
				</div>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php" style="font-size: 16px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'"><strong>Inicio</strong></a><i class="fa fa-angle-right"></i>Reconfigurar la Contraseña</li>
				</ol>
				<div class="grid-form">
					<div class="grid-form1">
						<?php if($error){?><div class="errorWrap"><strong>Error del Sistema</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>Registro Completado</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<div class="panel-body">
							<form  name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">
								<div class="form-group">
									<label class="col-md-2 control-label">Clave de Acceso Actual</label>
									<div class="col-md-8">
										<div class="input-group">
											<input style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" type="password" name="password" class="form-control1" id="exampleInputPassword1" placeholder="Clave de acceso actual" required="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Nueva Contraseña</label>
									<div class="col-md-8">
										<div class="input-group">
											<input style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" type="password" class="form-control1" name="newpassword" id="newpassword" placeholder="Nueva contraseña" required="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Confirmar Contraseña</label>
									<div class="col-md-8">
										<div class="input-group">
											<input style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;" type="password" class="form-control1" name="confirmpassword" id="confirmpassword" placeholder="Confirmar contraseña" required="">
										</div>
									</div>
								</div>
								<div class="col-sm-8 col-sm-offset-2">
									<input type="submit" name="submit" value="Actualizar Contraseña" 
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
							</form>
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