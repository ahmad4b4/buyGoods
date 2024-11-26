
<?php
session_start();
 include("includes/db.php");
if(!isset($_SESSION['aname'])){
	
echo "<script>window.open('login.html','_self')</script>";
	
	
	}


else{
 
 
	  
  
   ?>
















<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>All Customers</title>
<script type="text/javascript" src="js/boxOver.js"></script>

<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</head>

<body>


<nav class="navbar navbar-inverse">
   <div class="container-fluid">
     <div class="navbar-header ">
      <i><a class="navbar-brand">BuyGoods</a></i>
     </div>
     <ul class="nav navbar-nav">
       <li><a href="index.php">Add Product</a></li>
       <li><a href="View_product.php">View Products</a></li>

       <li><a href="users.php">Manage User</a></li>
       <li><a href="#">View Order </a></li>
        <li><a href="payment.php">View Payment</a></li>
                 </ul>
           <div class="navbar navbar-right">
      <ul class="nav navbar-nav">
       <li><a href="logout.php"><span class="glyphicon glyphicon glyphicon-log-in" ></span> Logout</a></li>
    
     </ul>
     </div>
</nav>      
     


<div class="container">
  <h2 align="center">All Products </h2>
  
  <table align="center" class="table table-hover">
    
      <tr align="center">
        <th>Product No.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
       
      
        <th>Edit</th>
        <th>Delete</th>
        
      </tr>
      <?php
      include("includes/db.php");
	
		$i=0;
	  $get_pro = "select * from products";
	  
	  $run_pro=mysqli_query($con, $get_pro);
	  
	  while($row_pro = mysqli_fetch_array($run_pro)){
		  $prd_id = $row_pro ['prd_id'];
		  $p_title = $row_pro ['prd_title'];
	$p_img = $row_pro['prd_img'];
			$p_price = $row_pro ['prd_price'];
			
			
		$i++;
		
		 
	  
	  ?>
      
      
      <tr>
      <td><?php echo  $i; ?></td>
        <td><?php echo  $p_title; ?></td>
        <td><img src="product_images/<?php echo $p_img; ?>" width="50" height="50" ></td>
        <td><?php echo  $p_price ; ?> </td>
        
      
        
        <td><a href="index.php?edit_pro=<?php echo $prd_id ?>">Edit</a></td>
        <td><a href="del_pro.php?delete_pro=<?php echo $prd_id ?>">Delete</a></td>
      
        
      </tr>
      <?php  } ?>
      
      
  </table>
 
</div>










</body>
</html>
<?php } ?>