
<?php
session_start();

  include("includes/db.php");

include("functions/functions.php");

	  
if(!isset($_SESSION['u_email'])){
	header('location: index.php');
	
	}
else{
	
	
	$get_c = "select * from u_reg ";
	
	$run_c = mysqli_query($con,$get_c);
	
	 $row = mysqli_fetch_array($run_c);
	
			
	$user = $row['user_id'];

	
	 if(isset($_POST['submit'])){
		 
		 $mem = $_POST['mem'];
		 
		 
			$insert_mem = "insert into members (cus_id, mem_type) values ('$user','$mem') "; 
			
			$run = mysqli_query($con,$insert_mem); 
			if($run){
				
				echo"<script>window.open('index.php','_self')</script>";
				}
			
		 }
	  
	}






?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Membership</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

     <style>
	 #mycaroy{
		 width: 100%;
	 }
	 
	 
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
	  max-height:250px;
      width: 100%;
      margin: auto;
	
  }
  /*.............*/
  
  .vertical-menu {
    width: 200px; /* Set a width if you like */
}

.vertical-menu a {
    background-color: #eee; /* Grey background color */
    color: black; /* Black text color */
    display: block; /* Make the links appear below each other */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
    background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
    background-color: black; /* Add a green color to the "active/current" link */
    color: white;
}
/*foooter css*/
footer .list-group-item{
    border:0;
    background:transparent;
    }
    
    div.visible-xs-block
    {
            background:maroon;
            color:white;
            font-family:"Tahoma" serif;
            padding:1em;
        }
        
        footer{
            background: #CCC;
            color:black;
           height:auto;
            }
        /*..... bacck to top....*/
		
		
		.back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
}
.list{
	color:#FF0;
	padding-bottom:2px;
	padding-top:15px;
	padding-left:5px;
		}
		
  
  </style>

  <link  rel="icon" type="image/png" href="images/iconn.png"/ >
  
</head>

<body>

<br>
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
     <div class="navbar-header ">
      <i><a class="navbar-brand" href="index.php">BuyGoods.pk</a></i>
     </div>
     <ul class="nav navbar-nav">
       <li><a href="index.php">Home</a></li>
       <li><a href="allproducts.php">Products</a></li>
       <li><a href="contact.php">Contact Us</a></li>
 		 <li><a href="cart.php">Cart</a></li>
       
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
		
		
      echo "<li><a href='customer/my_account.php'>My Account</a></li>";
	   echo "<li><a href='mem_ship.php'>Get Membership</a></li>";
       echo"<li><a href='logout.php'> Logout</a></li>";
     
	  
	  }
	  
	  
       ?>
     </ul>
     </div>
 
  
 
  
</nav>      
     
<div>
<table align="center" class="table">
    
      <tr align="justify">
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/gold.jpg"/></th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/silver.jpg" /></th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/broze.jpg" /></th>
        
        
      </tr>
      
 
      
      
 <tr align="center">
 
        <td><h4>10% Discount</h4> </td>
          
          
       <td><h4>7% Discount</h4> </td>
        <td><h4>5% Discount</h4> </td>   
      </tr>

</div>

</table>
<div align="center">
		<table>
	<form action="mem_ship.php" method="post">
   
    <tr>
    	<div class="form-group">	
    	<td><label>Select Membership:</label></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
        <select class="form-control" name="mem">
        	<option>Select Membership</option>
            <option value="gold">Gold</option>
            <option value="silver">Silver</option>
            <option value="bronze">Bronze</option>
        </select><br  />
        </td>
        </div>
    </tr>
    
     
    <tr> 
    	
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
    	<td><button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok"></span>&nbsp;Get Membership
        </button> &nbsp;<button type="reset" class="btn btn-danger"> <span class="glyphicon glyphicon-refresh"></span>&nbsp;Reset</button>
        <br /></td>
    </tr>

    </form>
</table></br>
</div>
</div>
</body>
</html>

