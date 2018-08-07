<?php
//***************************************************
//		File: dbc.php
//		Connect Read-only to MYSQL database via PHP
//***************************************************

		$host = "localhost";
		$userName = "mtorres2_410rdo";
		$passWord = "dbzfan22";
		$dataBase = "mtorres2_gameSite";
		
		$con = mysqli_connect($host, $userName, $passWord, $dataBase);
		
		$connection_error = mysqli_connect_error();
		if($connection_error != null){
			echo"<p>Error connecting to database: $connection_error </p>";
		}else{
			//echo"Connected to Read-Only MYSQL<br />";
		}
?>