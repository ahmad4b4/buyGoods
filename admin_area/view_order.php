
<?php
session_start();
 include("includes/db.php");
if(!isset($_SESSION['aname'])){
	
echo "<script>window.open('login.html','_self')</script>";
	
	
	}


else{
 
 
	  
  
   ?>











<?php
		if(isset($_POST['mark'])){
	
	
	
	$mark_order = "update orders set order_status = 'Recieved'";
	
	$run_delete = mysqli_query($con, $mark_order);
	
	if($run_delete){
		
		echo"<script>alert('Order is recieved sucessfully')</script>";
		echo"<script>window.open('view_order.php','_self')</script>";
		}
	}

	?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View orders</title>


<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</head>
<style>
#table {
	width: 100%;
	
	}
</style>


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
     


<div class="container" id="table">
  <h2 align="center">Customers Order List </h2>
  
  <table align="center" id="table" class="table table-striped table-hover table-responsive tab-content">
    
      <tr align="center">
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Invoice No.</th>
        <th>Due Amount</th>
        <th>Quantity</th>
         <th>Product ID</th>
         <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address</th>
         <th>City</th>
      <th>Order Status</th>
       <th>Mark as recieved</th> 
        <th>Delete</th>
        
      </tr>
      <?php
      include("includes/db.php");
	
				$r = "Select*From orders";
				$sql = mysqli_query($con,$r);
				while ($row=mysqli_fetch_array($sql))
					echo	"<tr>
							<td><center><center><form action='view_order.php' method='post'><input type='text' name='order_id' class='form-control' value='$row[order_id]'></center></td>
							
							<td><center>$row[user_id]</center></td>
							<td><center>$row[f_name]</center></td>
							<td><center>$row[invoice_no]</center></td>											                            <td><center>$row[due_amount]</center></td>
							<td><center>$row[total_products]</center></td>
							<td><center>$row[prd_id]</center></td>
							
							<td><center>$row[address]</center></td>
							<td><center>$row[city]</center></td>
							<td><center>$row[order_status]</center></td>
							
							<td><center><button type='submit' class='btn btn-success' name='mark'><span class='glyphicon glyphicon-ok'></span>&nbsp;Mark Received
        </button></td>
		<td><center><button type='submit' class='btn btn-danger' name='del'><span class='glyphicon glyphicon-ok'></span>&nbsp;Delete
        </button></td>					
						</tr></form>
";					echo "</table>
					</div>";
			?>
	<!--	</tbody></table>-->
	
    <?php
		if(isset($_POST['del'])){
	
	$dels = $_POST['order_id'];
	
	 $del_order = "delete from orders where order_id = '$dels'";
	
	$run_delete = mysqli_query($con, $del_order);
	
	if($run_delete){
		
		echo"<script>alert('Order is deleted sucessfully')</script>";
		echo"<script>window.open('view_order.php','_self')</script>";
		}
	}

	?>
    








</body>
</html>
<?php } ?>