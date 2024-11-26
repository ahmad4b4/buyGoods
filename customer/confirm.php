<?php

session_start();
include ("includes/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){
	$order_id = $_GET['order_id'];
	
	}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirm Payment</title>


</head>

<body bgcolor="#666666">

<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">

<table align="center" width="500" border="2">
<tr bgcolor="#CCFF99">
<td colspan="5" align="center"> <h2>Please Confirm Your Payment</h2></td>

</tr>

<tr>
<td align="right">Invoice No.</td>
<td><input type="text" name="invoice_no"/></td>
</tr>
<tr>

<tr>
<td align="right">Amount Sent:</td>
<td><input type="text" name="amount"/></td>
</tr>


<td align="right"> Select Payment Method:</td>
<td><select name="pay_method">

	<option>Select Payment</option>
    <option>Bank Transfer</option>
    <option>EasyPaisa/UBL/Omni</option>
    <option>Paypal</option>
    </select>
  
</td>
</tr>
<tr>
<td align="right">Transaction reference ID</td>
<td><input type="text" name="tr"/></td>
</tr>

<tr>
<td align="right">Payment Date:</td>
<td><input type="text" name="date"/></td>
</tr>
<tr>
<td align="right">Easypaisa UBL OMNI Code:</td>
<td colspan="5"><input type="text" name="code"/></td>
</tr>
<tr align="center">

<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"/></td>
</tr>

</table>





</form>






</body>
</html>


<?php
if(isset($_POST['confirm'])){
	
	$invoice = $_POST['invoice_no'];
	$amount = $_POST['amount'];
	$payment_method = $_POST['pay_method'];
	$ref_no = $_POST['tr'];
	$code = $_POST['code'];
	$date = $_POST['date'];
	$com = 'Compeleted';
	
$insert_payment = "insert into payments (invoice_no, amount, payment_mode, ref_no, code, Payment_date) values ('$invoice','$amount','$payment_method','$ref_no','$code','$date')";


		
		$run_payment = mysqli_query($con, $insert_payment);
		
			$update_order = "update orders set order_status = '$com' where order_id = '$order_id'";
			
			$run_order = mysqli_query($con,$update_order);
		$update_pending_order = "update pending_orders set order_status = 'Compelete' where order_id = '$order_id'";
		
		$run_order = mysqli_query($con,$update_pending_order);
		if($run_payment){
			echo"<h2 align='center'>Payment Recieved! Your order will be compeleted within 24 hrs</h2>";
			}

}
?>












