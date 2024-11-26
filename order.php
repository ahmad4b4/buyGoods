<?php

include("functions/functions.php");
include("includes/db.php");

if(isset($_GET['c_id'])){
	
	 $customer_id = $_GET['c_id'];
	 
	$get_c = "select * from u_reg where user_id = ' $customer_id'";
	
	$run_c = mysqli_query($con,$get_c);
	
	 $row = mysqli_fetch_array($run_c);
	
			
	
	 $fname1 = $row['u_fname'];
	
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



 
      
  //get qty
  
  $get_cart = "select * from cart";
  
  $run_cart = mysqli_query($con,$get_cart);
  
  	 $get_qty = mysqli_fetch_array($run_cart);
  
   $qty = $get_qty['qty'];
  
  if($qty == 0){
	  
	 $qty=1;
	 $sub_total = $total;
	  
	  }    

	else{
		$qty=$qty;
		
	$sub_total = $total*$qty;
		
		
		}

       if(isset($_SESSION['u_email']))   {
	
	
	
	
$get_pro = "select * from members where mem_type='gold' and cust_id='$customer_id'";
	  
	  $run_pro=mysqli_query($con, $get_pro);
	  
	  
	  if($run_pro){
	  	$value = '0.1';
		$total1 = $sub_total * $value;
		$sub_total = $sub_total - $total1;
	  }

	  

           }
      
      
     


   





		







		$insert_order = "insert into orders (user_id,f_name, due_amount, invoice_no, total_products,prd_id,address,city,order_date, order_status) values ('$customer_id','$fname1','$sub_total','$invoice','$count_pro','$pro_id','$address','$city1',NOW(),'$status')";
		$run_order = mysqli_query($con, $insert_order);
		
		echo "<script>alert('Order sucessfully submitted')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
		
		$pending_order = "insert into pending_orders (user_id, invoice_no, prd_id,qty, order_status) values ('$customer_id','$invoice','$pro_id','$qty','$status')";
		$insert_pend = mysqli_query($con, $pending_order);
		
		
		$empty_cart = "delete from cart where ip_add='$ip_add'";
		$run_empty = mysqli_query($con, $empty_cart);
		
		
		
		
?>