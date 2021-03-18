<!DOCTYPE html>
<html>
<head>
	<title>My Shop | Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<div class="container">

	<div class="alert alert-primary">
		
		<center><h1>Welcome to My Shop</h1>
			Register
		</center>

	</div>

		<div class="row">
			<div class="col-4">
					<img src="https://cdn.shopify.com/s/files/1/0322/5894/9164/files/My_Shop_Logo_Transparent.png?height=628&pad_color=fff&v=1581933721&width=1200" class="img-fluid">
			</div>
			<div class="col">

					<form method="POST" action="">
					  <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Full Name</label>
					    <input type="text" class="form-control" name="full_name" required>
					
					  </div>

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Email</label>
					    <input type="email" class="form-control" name="email" required>
					
					  </div>

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Phone</label>
					    <input type="number" class="form-control" name="phone" required>
					
					  </div>

					    <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Password</label>
					    <input type="password" class="form-control" name="password" required>
					
					  </div>
					  
			  
			  <button name="register" type="submit" class="btn btn-primary">Register</button>
			</form>

				<?php

				
				//capture
				//
				if (isset($_POST['register'])) {
					//capture the form
					# code...
					$fullName = $_POST['full_name'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];
					$password = $_POST['password'];

					//hash the password
					/*password_hash()
						password to be encrypt
						-alorigy
						PASSWORD_DEFAULT
						- hashed
					*/
					//
					$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

					insertDataToTable($fullName,$email,$phone,$encryptedPassword);

				}

				function insertDataToTable($fullName,$email,$phone,$password){
					//connection with the db
					require('dbconnect.php');
					$sql = "INSERT INTO `customer`(`full_name`, `email`, `phone`, `password`) VALUES (?,?,?,?)";

					//prepare the query
					if($stmt = mysqli_prepare($conn,$sql)){
						//bind values
						mysqli_stmt_bind_param($stmt,"ssss",$param_fullname,$param_email,$param_phone,$param_password);
						//param variables bind them

						$param_fullname = $fullName;
						$param_email = $email;
						$param_phone = $phone;
						$param_password = $password;

						//execute the query
						if (mysqli_stmt_execute($stmt)) {
							# code...
							echo "Registered Successfully";
							header('location:login.php');
						}else{
							echo "<h4 style='color:red'>Something went wrong</h4>";
						}


					}else{
						echo "Something went wrong";
					}

					//close
					mysqli_close($conn);

				}

				?>
				
			</div>
		</div>
		
	</div>
</body>


</html>