
<?php

include("functions/functions.php");
include("includes/db.php");

cart();

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

include("header.php");

?>
  
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
     
<div class="title_box">Manufacturers</div>
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
    <?php
    
		include('payment_options.php');
	
	?>


 <div class="center_title_bar">Recommended Products</div>
  
  
 <?php  getpro3(); ?>


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
        
        
        <div class="cart_details"><font color="blue"><?php total_items(); ?></font>&nbsp;item(s) <br />
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
<br>

<?php 
	include ('footer.php');
 ?>
</body>
</html>
