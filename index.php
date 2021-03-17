<!DOCTYPE html>
<html>
<head>
	<title>My Shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<?php include('nav.php')?>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<img src="https://cdn.shopify.com/s/files/1/0322/5894/9164/files/My_Shop_Logo_Transparent.png?height=628&pad_color=fff&v=1581933721&width=1200" class="img-fluid">
			</div>

			<div class="col-8">
				
				<div class="row">
					
				
				<?php

				//connecttion
				require('dbconnect.php');

				//select query
				$sql = "SELECT * FROM product";

				//execute query
				$results = mysqli_query($conn,$sql);
				//check if query is query
				if ($results) {
					# code...

					//check if the rows exist
					//myqli_num_rows
					if (mysqli_num_rows($results)>0) {
						# code...

						//for every record with - create associate
						//loop
						while ($record = mysqli_fetch_assoc($results)) {
							# code...
							//get individual record field as an associative
							//key - value
							//column name
							echo '
								<div class="card col-4" style="">
								  <div class="card-body">
								    <h5 class="card-title">'.$record['name'].'</h5>
								    <p class="card-text">'.$record['description'].'.</p>
								    <h4 style="color:#E53206;">Ksh'.$record['cost'].'</h4>
								  </div>
								</div>

							';
						}

					}else{
						echo "<h4>No Products available</h4>";
						echo "<a class='btn btn-primary' href='addproduct.php'>Add Product</a>";
					}
				}else{
					echo "Something went wrong!!";
				}

				?>

				</div>
			</div>
		</div>
		<div>
			
		</div>
	</div>

</body>
</html>