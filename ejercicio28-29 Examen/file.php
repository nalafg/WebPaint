<?php 

$conexion = mysqli_connect("localhost","root","","test");

$correo = $_POST['email'];
$contraseña = $_POST['pass'];
$año = $_POST['year'];

if ($correo!=null&&$contraseña!=null&&$año>1900) {
	$sql="INSERT into usuarios (correo,contraseña,año)
	VALUES ('$correo','$contraseña','$año')";
}


echo mysqli_query($conexion,$sql);

?>