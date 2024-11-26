<?php

include("functions/functions.php");
include("includes/db.php");

if(isset($_GET['c_id'])){
	
	 $customer_id = $_GET['c_id'];
	 
	$get_c = "select * from u_reg where user_id = ' $customer_id'";
	
	$run_c = mysqli_query($con,$get_c);
	
	 $row = mysqli_fetch_array($run_c);
	
			
	
	 $fname1 = $row['u_fname'];
	 $lname = $row['u_lname'];
	
	 $address = $row['address'];
	$city1= $row['city'];
	
		 $country1 = $row["country"];
		  
		 $phone1	=	$row["phno"];
		 $email1 = $row["u_email"];

		   
	
	
}

	
  
	 
   $ip_add = getip();
 
   
      $total = 0;
   $price = "select * from cart where ip_add = '$ip_add '";
   
  
   $run_price = mysqli_query($con,$price) ;
 

	 $status= 'Pending';
	
   
  $invoice = mt_rand();
  $count_pro = mysqli_num_rows($run_price);

   while($pprice = mysqli_fetch_array($run_price)){

     $pro_id = $pprice['p_id'];
      
      $prod_price = "select * from products where prd_id = '$pro_id'";

      $run_pro_price = mysqli_query($con,$prod_price);


      while($ppprice = mysqli_fetch_array($run_pro_price)){

         $product_price = array($ppprice['prd_price']);

         $price_sum = array_sum($product_price);

   $total +=$price_sum;

       
         
	  }
   }



 
       if(isset($_SESSION['u_email']))   {
	
	
	
	
echo $get_pro = "select * from members where mem_type='gold' and cust_id='$customer_id'";
	  
	  $run_pro=mysqli_query($con, $get_pro);
	  
	  if($run_pro){
	  	$value = '0.1';
		$total1 = $total * $value;
		$total = $total - $total1;
		 "Rs.".$total;
		
	  }
	  
	  

	  

           }
      
      if(isset($_POST['submit'])){
		  
		  $cvv = $_POST['cvv'];
		  $name = $_POST['card-holder-nam'];
		  $cardno = $_POST['card-number'];
		  $month = $_POST['expiry-month'];
		  $year = $_POST['expiry-year'];
     


   




	$online = "Paid Online";

		
		$insert_order = "insert into orders (user_id,f_name, due_amount, invoice_no, total_products,prd_id,address,city,order_date,payment_by,order_status) values ('$customer_id','$fname1','$sub_total','$invoice','$count_pro','$pro_id','$address','$city1',NOW(),$online,'$status')";
		$run_order = mysqli_query($con, $insert_order);
		
	echo "<script>alert('Order sucessfully submitted')</script>";
	echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
		
		$payment_online = "insert into payments (cus_id,name, invoice_no, amount,cvvcode, card_no,ex_date,year,payment_mode,payment_date) values ('$customer_id','$fname1 $lname','$invoice','$total','$cvv','$cardno','$month',$year,)";
		$insert_pay = mysqli_query($con, $payment_online);
		
		
		$empty_cart = "delete from cart where ip_add='$ip_add'";
	$run_empty = mysqli_query($con, $empty_cart);
		
	  }
		
		
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Payment</title>
</head>
<script type="text/javascript" src="js/boxOver.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


<body>


<center> <img src="images/paypal.jpg" width="300" height="87" /></center>

 <div class="container">
  <h2>Order Details</h2>
            
  <table class="table table-hover">
    <tbody class="text-success text-left">
    
      <tr>
        <td>Name</td>
        <td><?php echo  $fname1." ". $lname ; ?></td>
        
      </tr>
      <tr>
        <td>Invoice No.</td>
        <td><?php echo  $invoice; ?></td>
     
      </tr>
      <tr>
        <td>Total Amount</td>
        <td><?php echo "Rs" .$total; ?></td>
        
      </tr>
    </tbody>
  </table>
</div>


<div  align="center"class="container" class="jumbotron">
  <form class="form-horizontal" role="form" action="online_pay.php" method="post">
    <fieldset>
      <legend>Payment</legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                <option>Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiry-year">
                <option value="17">2017</option>
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="button" name="submit" class="btn btn-success" >Pay Now</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>

</body>
</html>