
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
<title>View Products</title>
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
       <li><a href="view_order.php">View Order </a></li>
        <li><a href="payment.php">View Payment</a></li>
                 </ul>
           <div class="navbar navbar-right">
      <ul class="nav navbar-nav">
       <li><a href="logout.php"><span class="glyphicon glyphicon glyphicon-log-in" ></span> Logout</a></li>
    
     </ul>
     </div>
</nav>      
     


<div class="container">
  <h2 align="center">Customers Data </h2>
  
  <table align="center" class="table table-striped table-hover">
    
      <tr align="center">
        <th>Customer ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Country</th>
      <th>City</th>
        <th>Membership</th>
        <th>Delete</th>
        
      </tr>
      <?php
      include("includes/db.php");
	
		$i=0;
	  $get_pro = "select * from u_reg";
	  
	  $run_pro=mysqli_query($con, $get_pro);
	  
	  while($row_pro = mysqli_fetch_array($run_pro)){
		  $u_id = $row_pro ['user_id'];
		  $fname = $row_pro ['u_fname'];
	$lname = $row_pro['u_lname'];
			$email = $row_pro ['u_email'];
			
			   $city = $row_pro ['city'];
			   $country = $row_pro['country'];
			    $membership = $row_pro['mem_type'];
		
		
		 
	  
	  ?>
      
      
      <tr>
      <td><?php echo  $u_id ; ?></td>
        <td><?php echo  $fname ; ?></td>
        <td><?php echo $lname;  ?></td>
        <td><?php echo $email ; ?> </td>
        <td><?php echo   $city ; ?> </td>
        <td><?php echo  $country ; ?> </td>
        <td><?php echo   $membership ; ?> </td>
    
        
       
        <td><a href="delete_customer.php?delete_user=<?php echo $u_id ?>">Delete</a></td>
      
        <td></td>
      </tr>
      <?php  } ?>
      
      
  </table>
 
</div>










</body>
</html>
<?php } ?>