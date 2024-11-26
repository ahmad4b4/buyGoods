<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style>
.wid{
	width:70%;
	

}
</style>

<?php



include("includes/db.php");

$c = $_SESSION['u_email'];

		$get_c = "select * from u_reg where u_email = '$c'";
		
		$run_c = mysqli_query($con,$get_c);
		
		 $row_c = mysqli_fetch_array($run_c);
	
		$customer_id = $row_c['user_id'];
		
		
		



?>
<div class="wid">


<table class="table table-condensed table-bordered table-responsive"  align="center" bgcolor="#CCFFCC">
<tr bgcolor="#CCFFCC" align="center">

					<th>Order No.</th>
        			<th>Due Amount</th>
            		<th>Invoice No.</th>
                	<th>Total Products</th>	
                    <th>Product ID</th>	
                    <th>Order Date</th>
                   	<th>Status</th>
                    	



</tr>

<?php

		$get_order = "select *from orders where user_id = $customer_id";

			$run_order = mysqli_query($con, $get_order);
		
			 while ($row_orders=mysqli_fetch_array($run_order)){
				 $order_id = $row_orders['order_id'];
				 $deu_amount = $row_orders['due_amount'];
				 $Invoice = $row_orders['invoice_no'];
				 $total_pro= $row_orders['total_products'];
				  $order_date = $row_orders['order_date'];
				   $status = $row_orders['order_status'];
				   $prd_id = $row_orders['prd_id'];
		
			
			
			
			
			
			
				
				 echo"
				 <tr align='center'>
				 <td> $order_id</td>
				 <td>$deu_amount</td>
				 <td>$Invoice</td>
				 <td>$total_pro</td>
				 <td>$prd_id</td>
				 <td>$order_date</td>
				 <td>$status</td>
				
				 
				 
				 
				 
				 </tr>
				 
				 
				 
				 
				 ";
				 
				 }
?>


</table>
</div>