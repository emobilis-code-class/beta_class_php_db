<!DOCTYPE html>
<html>
<head>
	<title>My Purchases</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
		<?php
		include('nav.php');
		include('checkloginstatus.php');

		?>
	<div class="container">

	
		<div class="row">
			<h3 style="color: #2199D5; font-family: monospace;">My Purchases</h3>
			<div class="col-3">
				<img src="https://image.shutterstock.com/image-vector/shopping-bag-purchases-icon-600w-564743893.jpg" class="img-fluid">
			</div>

			<div class="col">
				<!-- select for a given customer -->

				<table class="table">
					
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Cost</th>
						<th>Total</th>
					</tr>

					<!--  -->
					<?php

					//get the customer id
					$customerId = $_SESSION['id'];

					require('dbconnect.php');
					$sql = "SELECT * FROM sales WHERE customer_id = ".$customerId;
					//execute the query and get result

					$results = mysqli_query($conn,$sql);
					if ($results) {
						# code...
						$rows  = mysqli_num_rows($results);
						if ($rows>0) {
							# code...
							while($record = mysqli_fetch_assoc($results)){
						/*echo $record['name'].$record['cost'];
						echo "<br>";*/
						echo "<tr>";
						echo "<td>".$record['product_name']."</td>";
						echo "<td>".$record['quantity']."</td>";
						echo "<td>".$record['cost']."</td>";
						
						$totalCost = $record['quantity']*$record['cost'];

						 echo "<td>".$totalCost."</td>";
						
					}
						}else{
							echo "<h4 style='color:yellow'>No purchases made</h4>";
						}
					}else{
						echo "Something not right";
					}

					?>

				</table>
			</div>
			
		</div>
	</div>

</body>
</html>