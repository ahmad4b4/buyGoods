
<?php

include("functions/functions.php");
include("includes/db.php");

cart();
 	
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

include("header.php");

?>


    <!-- end of menu tab -->
 
    

    <?php
    
    if(isset($_GET['cat'])){
    
    $get_id = $_GET['cat'];
    
    $query = "select cat_title from categories where cat_id='$get_id'";
    $run_query = mysqli_query($con,$query);
    
    $row = mysqli_fetch_array($run_query);
    
    $cat = $row['cat_title'];
    
    echo"<span class=current>>$cat</span>";
    
    }
    
    ?>


 </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        
 <?php 
     getcats(); 
     

 ?>
        
      </ul>
     
<div class="title_box">Brands</div>
      <ul class="left_menu">
        

    <?php  getbrands();  ?>


 
</ul>
 <br>
 <br>

     
      <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>
      
           <br>
 <br>
 <br>
     
 
        <?php

         special();

        ?>

    </div>
    <!-- end of left content -->
    <div class="center_content">
      <div class="center_title_bar">Products in shopping Cart</div>
  
 <form action="" enctype="multipart/form-data" method="post">
 
 <table align="center" width="500" border="0">
 
 

<tr align="center">
  <th>Update Cart</th>
  <th>Product(s)</th>
  <th>Quantity</th>
  <th>Price</th>
</tr>
 
 <?php
 
         $total = 0;
 

   $ip = getip();

   $price = "select * from cart where ip_add = '$ip'";

   $run_price = mysqli_query($con,$price) ;

   while($pprice = mysqli_fetch_array($run_price)){

      $pro_id = $pprice['p_id'];
      
      $prod_price = "select * from products where prd_id = '$pro_id'";

      $run_pro_price = mysqli_query($con,$prod_price);


      while($ppprice = mysqli_fetch_array($run_pro_price)){

         $product_price = array($ppprice['prd_price']);
         $product_title = $ppprice['prd_title'];
         $product_image = $ppprice['prd_img'];
         $single_price = $ppprice['prd_price'];
         

         $price_sum = array_sum($product_price);

         $total +=$price_sum;

         //echo  $product_price;
         




     
      
      

   

      

 
 
 
 ?>
 
 <tr align="center">
   
   <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;  ?>"></td>
   <td><?php echo $product_title; ?>
    <br>
    <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"></td>
   <td>
   
   <input type="text" size="4" name="qty">
   
   
   </td>
   <td>
   <?php echo "Rs".$single_price;  ?>
   </td>
  
   <td></td>  
   
 
 </tr>
 
 
 <?php
 
 }
   }
 ?>
 <?php
    $ip = getip();
   
   if(isset($_POST['update_cart'])){
	   
	   $qty = $_POST['qty'];
	   $insert_qty = "update cart set qty='$qty' where ip_add='$ip'";
	   $run_qty = mysqli_query($con,$insert_qty);
	   
	   $total = $total* $qty;
	
	
	if(isset($_SESSION['u_email']))   {
	$i = getip();
	$gold = 'gold';
$get_pro = "select * from u_reg where mem_type='$gold' and u_ip='$i'";
	  
	  $run_pro=mysqli_query($con, $get_pro);
	  
	  while($row_pro = mysqli_fetch_array($run_pro)){
		  $u_id = $row_pro ['user_id'];
		  $mem_type = $row_pro['mem_type'];
	  }
	  if($run_pro){
	  	$value = '0.1';
		$total = $total * $value;
	  }
	   }
   }
   
   ?>
  <tr align="right">
   <td colspan="4"><b>Total Amount:</b></td>
   <td><?php echo"Rs&nbsp;".$total;   ?></td>
   
   </tr>
   
   
   <tr align="center">
   
   <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
   
   
   

   <td><input type="submit" name="continue" value="Continue Shopping"></td>
   
   
 
   
     <td><input type="submit" name="Pay" value="Check Out"></td>
   


 <!--<td> <button><a href="checkout.php" style="text-decoration:none;color:black;">Pay it</a></button> </td>
   -->
   </tr>

 </table>
 
 
 
 </form>
 
 <?php
 
 function updatecart(){
 
 global $con;
  
 if(isset($_POST['update_cart'])){
 
   foreach($_POST['remove'] as $remove){
   
       $delete_product = "delete from cart where p_id='$remove'";
       $run_delete = mysqli_query($con, $delete_product);
      
       if($run_delete){
       
         echo "<script>window.open('cart.php','_self')</script>"    ;  
       
       }
   
   }
  
 }
 }
	echo @$updatecart = updatecart();

 ?>
 <?php 
 if(isset($_POST['continue'])){
		
		  echo "<script>window.open('index.php','_self')</script>"   ;  
		
 }
 ?>
 <?php 
 if(isset($_POST['Pay'])){
	 
	


 $ip = getip();
 
 $sel_cart = "select * from cart where ip_add = '$ip' ";
 
 $run_cart = mysqli_query ($con,$sel_cart);
 
 $check_cart = mysqli_num_rows($run_cart);
 
 
	 
 if($check_cart==0){
	 
	 
	 echo "<script>window.alert('Please Add products in cart')</script>";
	 echo "<script>window.open('index.php','_self')</script>";
	 

	 }
	 else{
		  
		  echo "<script>window.open('checkout.php','_self')</script>";
		 }
	 


 }




?>
		 

 </div>
    <!-- end of center content -->
<div class="right_content">
      <div class="shopping_cart">
      <?php
	   if(!isset($_SESSION['u_email'])){
		   echo"<div class='cart_title'><i>Welcome Guest!</i><br>Shopping cart</div>";
		   }
      else{
        echo "<div class='cart_title'><i>Welcome Customer!</i><br>Your Shopping cart</div>";
		}
		
		?>
        <div class="cart_details"><font color="blue"><?php total_items(); ?></font>&nbsp;items <br />
          <span class="border_cart"></span> Total:<span class="price"><?php total_price(); ?> </span> </div>
        <div class="cart_icon"><a href="cart.php" title="header=[Checkout] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
      </div>
      
       
       <br>
     
            <?php
 
            special();

           ?> 

        <br>
     
 
        <?php

         special();

        ?>
        
             <br>
     
 
        <?php

         special();

        ?>
     <br>
     
 
        <?php

         special();

        ?>


      
        <!-- end of right content -->
</div>
  <!-- end of main content -->
  
</div>
<!-- end of main_container -->
<?php    include('footer.php')     ?>
</body>
</html>
