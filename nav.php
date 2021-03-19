<?php
session_start();
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
  </li>
  

  <?php
  if (isset($_SESSION['name'])) {


      //admin
      if ($_SESSION['role']=='admin') {

        echo '
            <li class="nav-item">
              <a class="nav-link" href="addproduct.php">Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showproduct.php">My Products</a>
          </li>
        ';
        # code...
      }else{
        echo '
            <li class="nav-item">
              <a class="nav-link" href="mypurchases.php">My Purchases</a>
          </li>';
      }
    # code...
      echo '<li class="nav-item">
    
    <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true"> Hi,'.$_SESSION['name'].'</a>
    
  </li>
    <li class="nav-item">
        <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
        
      </li>
  ';
  }else{
    //login
    echo '
       

     <li class="nav-item">
      <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
    </li>
    ';
  }
  ?>
  

  
 
</ul>