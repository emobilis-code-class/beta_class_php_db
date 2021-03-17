<!DOCTYPE html>
<html>
<head>
	<title>My Shop | My Products</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<?php include('nav.php')?>
		<h3 style="color: #2199D5; font-family: monospace;">My Products</h3>

		<div class="col-8">
			
		

		<table class="table">
			
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Cost</th>
			</tr>

		<?php

		/*Retrieving fetching items /records
	1.Establish connection from php and the db.
	2.Have query 
	SELECT * FROM table 
	3.Go ahead display - manipulate*/

	//connection
	//include 
	require('dbconnect.php');

	$sql = "SELECT * FROM product";

	//execute 
	//use the function  mysqli_query
	/*
		conn-
		query
	*/
		$result = mysqli_query($conn,$sql);
		if ($result) {
			# code...
			//check if the resullts
			//mysqli_num_rows($result)
			//
			$rows = mysqli_num_rows($result);//returns the rows 
			if ($rows>0) {
				# code...
				//echo "$rows";
				//we can go ahead get the records
				//if we get them associate array id - 1
				
				while($record = mysqli_fetch_assoc($result)){
						/*echo $record['name'].$record['cost'];
						echo "<br>";*/
						echo "<tr>";
						echo "<td>".$record['name']."</td>";
						echo "<td>".$record['description']."</td>";
						echo "<td>".$record['cost']."</td>";
						echo "<td>
							<a href='editProduct.php?id=".$record['id']."' class='btn btn-primary'>Edit Product</a>

							<form method='POST' action=''>
							<input type='hidden' value='".$record['id']."'name='productId'>
							<button type='submit' name='delete' class='btn btn-danger' >Delete This</button>
							</form>
						</td>";
						echo "</tr>";
				}

			}else{
				echo "<h4>No products available</h4>";
			}
		}else{
			echo "Something went wrong.Try again ".mysqli_error($conn);
		}


		?>

		<?php
		//delete
		if (isset($_POST['delete'])) {
			$productId = $_POST['productId'];

			require_once('dbconnect.php');

			//
			$sql = "DELETE FROM product WHERE id = ".$productId;

			$result = mysqli_query($conn,$sql);
			if ($result) {
				# code...
				echo '<div class="alert alert-success" role="alert">
					  Product Deleted Successfully
						</div>	';
			}else{
				echo '<div class="alert alert-danger" role="alert">
					  Something went wrong.
						</div>	';
			}

			# code...
		}

		?>

	</table>

	</div>
		
	</div>

</body>
</html>