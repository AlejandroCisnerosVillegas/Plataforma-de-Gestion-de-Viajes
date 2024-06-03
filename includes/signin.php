<?php
	session_start();
	if(isset($_POST['signin']))
	{
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$sql ="SELECT EmailId,Password FROM project_07_users WHERE EmailId=:email and Password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			$_SESSION['login']=$_POST['email'];
			echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
		} else{
					
				echo "<script>alert('Los datos proporcionados no están registrados en nuestro sistema');</script>";
			}
	}
?>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info" style="background-color: #f1f5f8;">
            <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>                        
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
                        <div class="login-right">
                            <form method="post">
                                <h2 style="color: #217FB4; text-align: center;">Accede a tu cuenta</h2>
                                <input type="text" name="email" id="email" placeholder="Correo Electrónico"  required="" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;">   
                                <input type="password" name="password" id="password" placeholder="Contraseña" value="" required="" style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;">   
                                <h4><a href="forgot-password.php" style="font-size: 18px; color: #25A0E6;" onmouseover="this.style.color='#87ceeb'" onmouseout="this.style.color='#25A0E6'">Olvide mi Contraseña</a></h4>
								<input type="submit" name="signin" value="Iniciar Sesión" 
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