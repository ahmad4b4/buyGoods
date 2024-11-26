
<?php

include("functions/functions.php");
include("includes/db.php");

session_start();
if(!isset($_SESSION['u_email']) ) {
      header('location: ../login.php');
    
	  }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>My Account</title>

<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

<style>
.list{
	color:#FF0;
	padding-bottom:2px;
	padding-top:15px;
	padding-left:5px;
		}
	#wid{
		width:50%;
		
		}	
  
  </style>
<body>
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
     <div class="navbar-header ">
      <i><a class="navbar-brand" href="../index.php">BuyGoods.pk</a></i>
     </div>
     <ul class="nav navbar-nav">
       <li><a href="../index.php">Home</a></li>
       <li><a href="../allproducts.php">Products</a></li>
       <li><a href="../contact.php">Contact Us</a></li>
 		 <li><a href="../cart.php">Cart</a></li>
       
        </ul>
        
        
      <div class="navbar navbar-right">
      <ul class="nav navbar-nav">
      <?php 
	  if(!isset($_SESSION['u_email']) ) {
      echo "<li><a href='login.php'><span class='glyphicon glyphicon glyphicon-log-in' ></span> Login</a></li>";
       echo "<li><a href='u_register.php'><span class='glyphicon glyphicon glyphicon glyphicon-user'></span> Sign Up</a></li>";
	  }
	  
	  
	  
	  else{
		  
        echo "<li class='list'>".$_SESSION['u_email']."</li>";
		
		
      echo "<li><a href='my_account.php'>My Account</a></li>";
	   echo "<li><a href='../mem_ship.php'>Get Membership</a></li>";
       echo"<li><a href='logout.php'> Logout</a></li>";
     
	  
	  }
	  
	  
       ?>
     </ul>
     </div>
 
  
 
  
</nav>      
    
      <div>
 <h2 align="center"> <div> Manage Your Account Information</div>   </h2>
 <nav class="navbar navbar-inverse" >
   <div class="container-fluid" id="wid">
     
     <ul class="nav navbar-nav">
 
       <li><a href="my_account.php?my_order">Orders</a></li>
       <li><a href="my_account.php?edit_account">Edit Account</a></li>
       <li><a href="my_account.php?change_pass">Change Password</a></li>
 		 <li><a href="my_account.php?delete_account">Delete Account</a></li>
          
        </ul>
   
     

     </div>
 
  
 
  
</nav>     
 
  <div align="left">
     <?php
   if(isset($_GET['my_order'])){
	   
	   include("my_order.php");
	   }
	   if(isset($_GET['edit_account'])){
	   
	   include("edit_account.php");
	   }
	   
	    if(isset($_GET['change_pass'])){
	   
	   include("change_pass.php");
	   }
	   
	    if(isset($_GET['delete_account'])){
	   
	   include("delete_account.php");
	   }
	   
	?> 
     
     </div>
 
  
	 <?php
   getDefault()
	?> 
  
     
     
     
     
     
     
     
     
     
     
     
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php    include('footer.php')     ?>
</body>
</html>
