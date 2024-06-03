<?php
	error_reporting(0);
	if(isset($_POST['submit']))
	{
		$issue=$_POST['issue'];
		$description=$_POST['description'];
		$email=$_SESSION['login'];
		$sql="INSERT INTO  project_07_issues(UserEmail,Issue,Description) VALUES(:email,:issue,:description)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':issue',$issue,PDO::PARAM_STR);
		$query->bindParam(':description',$description,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
			$_SESSION['msg']="Mensaje enviado exitosamente.";
			echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
		}
		else 
		{
			$_SESSION['msg']="Se ha producido un error. Por favor, vuelve a intentarlo.";
			echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
		}
	}
?>	
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: #f1f5f8;">
			<div class="modal-header" style="border-bottom: none;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
			</div>
			<section>
				<form name="help" method="post">
					<div class="modal-body modal-spa">
						<div class="writ" style="background-color: #ffffff; border-radius: 10px; padding: 20px;">
							<h4  style="color: #217FB4; text-align: center;">¿En qué podemos asistirte?</h4>
							<ul>
								<li class="na-me">
									<select id="country" name="issue" class="frm-field required sect" required=""  style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;">
										<option value="">Seleccionar consulta</option> 		
										<option value="Oferta de viaje">Oferta de viaje</option>
										<option value="Paquete vacacional">Paquete vacacional</option>
										<option value="Estado del viaje">Estado del viaje</option>
										<option value="Cancelación de viaje">Cancelación de viaje</option>
										<option value="Otros">Otros</option>														
									</select>
								</li>
								<li class="descrip">
									<input class="special" type="text" placeholder="Describir asunto"  name="description" required=""  style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px; margin-bottom: 10px; color: #333333;">
								</li>
									<div class="clearfix"></div>
							</ul>
							<div class="sub-bn">
								<form>
									<input type="submit" name="submit" value="Enviar Mensaje" 
										style="background-color: #87ceeb; color: #ffffff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;
										transition: background-color 0.3s, color 0.3s;"
										onmouseover="this.style.backgroundColor='#25A0E6'; this.style.color='#ffffff';"
										onmouseout="this.style.backgroundColor='#87ceeb'; this.style.color='#ffffff';"
										onmousedown="this.style.backgroundColor='#1d7cb3';">
								</form>
							</div>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>