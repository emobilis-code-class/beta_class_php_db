<?php

session_start();

//destroy - the session

session_unset();
//go the login page
header('location:login.php');
?>