<!DOCTYPE html>
<html>
<head>
	<title>My Shop | Add Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<div class="container">
			<?php 
				include('nav.php');
				require('checkloginstatus.php');

				if ($_SESSION['role']=='customer') {
				# code...
				echo "You are customer cannot access this page";
				header('location:index.php');
				}
			?>
			<div class="row">
				<div class="col-4">
					<img src="https://www.clipartmax.com/png/small/38-383442_shop-printed-revolution-online-and-earn-cash-add-product-icon-free.png" class="img-fluid">
				</div>
				<div class="col-6">
					<form method="POST" action="">
					  <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Name</label>
					    <input type="text" class="form-control" name="product_name">
					
					  </div>

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Description</label>
					    <input type="text" class="form-control" name="product_desc">
					
					  </div>

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Cost</label>
					    <input type="number" class="form-control" name="product_cost">
					
					  </div>
					  
			  
			  <button name="save" type="submit" class="btn btn-primary">SAVE</button>
			</form>
				</div>
				
			</div>

			<?php
			/*
			1.connection to db - php and our db
			2.Capture the data from 
			3.Insert - 
				sql query

			*/

				require('dbconnect.php');

				if (isset($_POST['save'])) {
					# code...
					$productName = $_POST['product_name'];
					$productCost = $_POST['product_cost'];
					$productDesc = $_POST['product_desc'];

					//save above into database shop - tables - product
					//INSERT query Values ???
					$sql = "INSERT INTO product(name,description,cost) VALUES(?,?,?)";

					//prepare statement - check if the above insert is correct or not
					if ($stmt = mysqli_prepare($conn,$sql)) {
						# code...
						//bind the paramers - ? ?? - 
						//- insert data type - varchar -s , int - i double d 
						mysqli_stmt_bind_param($stmt,"ssd",$param_name,$param_desc,$param_cost);

						//bind
						$param_name = $productName;
						$param_cost = $productCost;
						$param_desc = $productDesc;

						//execute the command - sql query - insert into db
						if (mysqli_stmt_execute($stmt)) {
							# code...
							echo "Product added successfull to the database";
							//redirect go to my products
							header("location:showproduct.php");
						}else{
							echo "Something went wrong.Try again.".mysqli_error($conn);
						}
						//close the stm
						mysqli_stmt_close($stmt);

					}else{
						echo "Error in the query";
					}
					//close connection.
					 mysqli_close($conn);


				}

			?>
		
	</div>

</body>
</html>