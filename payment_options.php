<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>payment Options</title>
</head>

<body>

<div class="center_content">
      <div class="center_title_bar">Payment Options</div>
      
      <?php
	  
	include("includes/db.php");

      $ip =  getip();
	  
	  $get_customer = "select *from u_reg where u_ip = '$ip'";
	  
	  $run_cus = mysqli_query($con,$get_customer);
	  $cus = mysqli_fetch_array($run_cus);
	  $cust_id = $cus['user_id'];
	  
	  
	  
	  ?>
      

<div align="center">

<table>
<?php if(!isset($_SESSION['u_email'])){

	echo "<tr><h3> Pay With </h3></tr>
	<tr><a href='login.php'><img src='images/paypal.jpg'></a></tr> <br><h3>Or by</h3>";

		echo "<h3><tr><a href='login.php'>Cash On Delivery</a></tr></h3></table></div>";
		
		}

else{
	echo "<tr><h3> Pay With </h3></tr>
	<tr><a href='online_pay.php?c_id= $cust_id'><img src='images/paypal.jpg'></a></tr> <br><h3>Or by</h3>";

		echo "<h3><tr><a href='order.php?c_id= $cust_id'> Cash On Delivery</a></tr></h3></table></div>";
		
	}


?>



</body>
</html>



