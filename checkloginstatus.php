<?php
		//retrict this page to only a person loginned.

		//decision if you logined - you access
		//check if session isset
		if (!isset($_SESSION['name'])) {
			# code...
			//when not set 
			//we take to the login
			header('location:login.php');
		}
		//else tell no access - take


?>