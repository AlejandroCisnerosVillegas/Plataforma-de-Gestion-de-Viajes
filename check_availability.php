<?php 
	require_once("includes/config.php");
	if(!empty($_POST["emailid"])) {
		$email= $_POST["emailid"];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
			echo "Error: El correo electrónico ingresado no es válido.";
		}
		else {
			$sql ="SELECT EmailId FROM project_07_users WHERE EmailId=:email";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':email', $email, PDO::PARAM_STR);
			$query-> execute();
			$results = $query -> fetchAll(PDO::FETCH_OBJ);
			$cnt=1;
			if($query -> rowCount() > 0)
			{
				echo "<span style='color:red'>El correo electrónico proporcionado ya está registrado.</span>";
				echo "<script>$('#submit').prop('disabled',true);</script>";
			} else{
				echo "<span style='color:green'>Esta dirección de correo electrónico está disponible para su registro.</span>";
				echo "<script>$('#submit').prop('disabled',false);</script>";
			}
		}
	}
?>