	<?php
    	$server="localhost";
		$user="root";
		$pass="";
		$db="shoeracks";
		$conn=new mysqli($server, $user, $pass, $db);
		if($conn->connect_error){
			echo("connection unsuccessful");
		}
		else{
		}
?>