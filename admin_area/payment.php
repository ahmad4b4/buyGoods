
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
  <h2 align="center">Customers Payment List </h2>
  
  <table align="center" class="table table-striped table-hover">
    
      <tr align="center">
        <th>Payment ID</th>
        <th>Invoice No.</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Reference No.</th>
      <th>Code OMNI/ UBL</th>
       <th>Payment Date</th>
        
       
        
      </tr>
      <?php
      include("includes/db.php");
	
		
	  $get_pay = "select * from payments ";
	  
	  $run_pay=mysqli_query($con, $get_pay);
	  
	  while($row_pro = mysqli_fetch_array($run_pay)){
		  $p_id = $row_pro ['payment_id'];
		  $invoice = $row_pro ['invoice_no'];
	$amount = $row_pro['amount'];
			$pmode= $row_pro ['payment_mode'];
			 $ref= $row_pro ['ref_no'];
			   $code = $row_pro['code'];
			
			   $date = $row_pro['payment_date'];
			  
		
		
		 
	  
	  ?>
      
      
      <tr>
      <td><?php echo  $p_id; ?></td>
        <td><?php echo   $invoice ; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo  $pmode;  ?> </td>
        
        
        <td><?php
				echo $ref;   		
				?> </td>
    
         <td><?php echo    $code   ; ?> </td>
         <td><?php echo     $date   ; ?> </td>
       
      </tr>
      <?php  } ?>
      
      
  </table>
 
</div>










</body>
</html>
<?php } ?>