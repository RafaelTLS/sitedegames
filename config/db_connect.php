<?php
	//conecting database
	$conn = mysqli_connect('localhost', 'admin', 'admin', 'games');

	//check connection
	if(!$conn) {
		echo 'connection error: ' . mysqli_connect_error();
	}
?>