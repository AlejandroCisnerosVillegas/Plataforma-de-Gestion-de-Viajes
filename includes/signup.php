<?php
	error_reporting(0);
	if(isset($_POST['submit']))
	{
		$fname=$_POST['fname'];
		$mnumber=$_POST['mobilenumber'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$sql="INSERT INTO  project_07_users(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname',$fname,PDO::PARAM_STR);
		$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			$_SESSION['msg']="Tu registro se ha completado con éxito. Puedes iniciar sesión ahora.";
			header('location:thankyou.php');
		}
		else 
		{
			$_SESSION['msg']="Ocurrió un problema. Por favor, inténtalo de nuevo.";
			header('location:thankyou.php');
		}
	}
?>
<script>
	function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'emailid='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
		error:function (){}
	});
	}
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info" style="background-color: #f1f5f8;">
            <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                        
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
                        <div class="login-right">
                            <form name="signup" method="post">
                                <h2 style="color: #217FB4; text-align: center;">Activa tu Cuenta</h2>
                                <input type="text" value="" placeholder="Nombre Completo" name="fname" autocomplete="off" required="" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 20px; color: #333333;">   
                                <input type="text" value="" placeholder="Número Telefónico" maxlength="10" name="mobilenumber" autocomplete="off" required="" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 20px; color: #333333;">   
                                <input type="text" value="" placeholder="Corre Electrónico" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 20px; color: #333333;">	
                                <span id="user-availability-status" style="font-size: 12px;"></span> 
                                <input type="password" value="" placeholder="Contraseña" name="password" required="" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 20px; color: #333333;">	
								<input type="submit" name="submit" id="submit" value="Registrarse" 
											style="background-color: #87ceeb; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;
											transition: background-color 0.3s, color 0.3s;"
											onmouseover="this.style.backgroundColor='#25A0E6'; this.style.color='#ffffff';"
											onmouseout="this.style.backgroundColor='#87ceeb'; this.style.color='#ffffff';"
											onmousedown="this.style.backgroundColor='#1d7cb3';">
                            </form>
                        </div>
						<div class="clearfix"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>