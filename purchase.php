<!DOCTYPE html>
<html>
<head>
	<title>Purchase</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<?php
		include('nav.php');
		include('checkloginstatus.php');


			$productId = $_GET['id'];
			//echo "$productId";

			//select
			$sql = "SELECT * FROM product WHERE id=$productId";
			//connection
			require('dbconnect.php');

			//execute
			$result = mysqli_query($conn,$sql);
			if ($result) {
				# code...
				$productRecord = mysqli_fetch_assoc($result);
				//echo "".$productRecord['name'];
			}else{
				echo "Something went wrong";
			}
	?>

	<div class="container-fluid">

		<div class="row">
			<div class="col-3">
				<img src="https://cdn4.iconfinder.com/data/icons/ios7-active-2/512/Basket.png" class="img-fluid">
			</div>
			<div class="col-6">
				<form method="POST" action="">
					  <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Name</label>
					    <input type="text"  class="form-control" name="product_name"  value="<?php echo "".$productRecord['name'];?>">
					
					  </div>

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Description</label>
					    <input type="text" class="form-control"  name="product_desc" value="<?php echo($productRecord['description']);?>">
					
					  </div>
					
					  <input type="hidden" name="productId" value=<?php echo($productRecord['id']);?>>

					   <div class="mb-3">
					    <label for="exampleInputEmail1"  class="form-label">Product Cost</label>
					    <input type="number" class="form-control"  name="product_cost" value=<?php echo($productRecord['cost']);?>>
					
					  </div>

					    <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
					    <input type="number" class="form-control" name="product_quantity" value="1" >
					
					  </div>
					  
			  
			  <button name="buy" type="submit" class="btn btn-primary">BUY</button>
			</form>

			<?php

			if (isset($_POST['buy'])) {
				# code...
				//capture the values from the form
				$productName = $_POST['product_name'];
				$productQuantity = $_POST['product_quantity'];
				$productId = $_POST['productId'];
				$productCost = $_POST['product_cost'];
				$customerName = $_SESSION['name'];
				$customerId = $_SESSION['id'];

				$sql = "INSERT INTO `sales`(`product_name`, `product_id`, `quantity`, `cost`, `customer_id`, `customer_name`) VALUES (?,?,?,?,?,?)";

				//prepare
				if ($stmt = mysqli_prepare($conn,$sql)) {
					# code...
					//bind
					mysqli_stmt_bind_param($stmt,"siidis",$param_product_name,$param_product_id,$param_quantity,$param_cost,$param_customer_id,$param_customer_name);
					$param_product_name = $productName;
					$param_product_id = $productId;
					$param_quantity = $productQuantity;
					$param_cost = $productCost;
					$param_customer_name = $customerName;
					$param_customer_id = $customerId;

					//execute
					if (mysqli_stmt_execute($stmt)) {
							# code...
							echo "Purchase Made successfully ";
							//redirect go to my products
							header("location:mypurchases.php");
						}else{
							echo "Something went wrong.Try again.".mysqli_error($conn);
						}
				}else{
					echo "Something went wrong.";
				}

			}

			?>
			</div>
			
		</div>
		
	</div>

</body>
</html>