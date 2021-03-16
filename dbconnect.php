<?php
//create a connection between php and mysql database
// function - mysql connect
/*
mysql - u root -p
4-
  username - root
  password
  db name
  server - localhost/127.0.0.1

  mysql_connect - earlier 
  mysqli_connect

*/
 //constant - PI = 3,
  define('username', 'root');
  define('server', 'localhost');
  define('password', '');
  define('database', 'shop');

  $conn = mysqli_connect(server,username,password,database); 
  /*returns true if connection is success - error*/

  if ($conn) {
  	# code...
  	//echo "connection success";
  }else{
  	echo "Failed to estatblish  a connection.".mysqli_connect_error();
  }
  
  
  
  



?>