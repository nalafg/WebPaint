<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT numUser, correo, contraseña, año FROM usuarios";
$result = $conn->query($sql);
 ?>



<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
	<title>Clase</title>
	<style type="text/css">
		.super_div{
			width: 100%;
			height: 500px;
			background-color: #D5D8DC;
		}
		.mini_div{
			width: 30%;
			margin: 1%;
			border-radius: 5px;
			border-width: 1px;
			border-style: solid;
			border-color: black;
			height: 300px;
			float: left;
		}
		h1{
			text-align: center;
		}
	</style>
</head>
<body>

	<div class="super_div">
		<h1>Aquí no hay nada</h1>
		<center>
			<form id="formulario">
				<fieldset style="width: 40%;">
					<legend>
						Datos del usuario
					</legend>
					<label> email: </label>
					<input type="text" style="width: 100%;height: 40px;" name="email" id="email" value="" placeholder="">

					<label>contraseña</label>

					<input type="text" style="width: 100%;height: 40px;" name="password" id="password" value="" placeholder="">

					<label>año de nacimiento</label>

					<input type="text" style="width: 100%;height: 40px;" name="year" id="year" value="" placeholder="">

					<button type="button" id="guardar_info"> Guardar regisro</button>
				</fieldset>
			</form>



			<form id="formulario">
				<section style="width: 80%; margin-top: 20px">
					<legend>
						Registro de Usuarios
					</legend>

					<table class="egt" style="border: 1px;width: 100%;" border="5px">
						<tr>
							<td>ID</td>
						    <td>Email</td>
						    <th>Pasword</th>
						    <th>Year</th>
						</tr>



						<?php 
						if ($result->num_rows > 0) {
						  // output data of each row
						  while($row = $result->fetch_assoc()) {
						 ?>

						<tr>
							<td><?php echo $row['numUser'] ?></td>
							<td><?php echo $row['correo'] ?></td>
							<td><?php echo $row['contraseña'] ?></td>
							<td><?php echo $row['año'] ?></td>
						</tr>

						<?php 
						  }
						} else {
						  echo "0 results";
						}
						$conn->close();
						?>


					</table>

				</section>
			</form>
		
			
		</center>
		<h1 id="edad_h1">  </h1>
	</div>




			
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	
	  
	$("#guardar_info").click(function(){
	  	console.log("presionaste el boton de guardar");
	  	var email = $("#email").val();
	  	var pass = $("#password").val();
	  	var year = $("#year").val();
	  	var num = 0;
	  	$.ajax({
	  		url:'file.php',
	  		data: {email,pass,year},
	  		type:'POST',
	  		dataType:'text',
	  		success:function(r){
	  			//console.log(r);
	  			//$("read_h1").text(r);


	  		}
	  	})
		    
	  	location.reload();
  	});
	 

</script>
</body>
</html>