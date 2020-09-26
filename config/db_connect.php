<?php
	//conecting database
	$conn = mysqli_connect('games_gamer_br', 'rafatls', 'rafaelthiago18', 'games');

	//check connection
	if(!$conn) {
		echo 'connection error: ' . mysqli_connect_error();
	}
?>