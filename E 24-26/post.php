
<?php 

	if (isset($_POST['year']) && $_POST['year']!="") {
		$edad = 2020 - $_POST['year'];
		echo $edad;
	}

?>
	
 