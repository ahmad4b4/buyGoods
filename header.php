<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BuyGoods</title>

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
     

<div id="main_container">







 <div class="container" id="mycaroy">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/fl1.jpg" width="460" height="250">
      </div>

      <div class="item">
        <img src="images/fl.png" width="460" height="250">
      </div>
    
      <div class="item">
        <img src="images/233.jpg" width="460" height="250">
      </div>

   <!--   <div class="item">
        

    <?php
    
	//sliderdata();



?>

      </div>-->
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<br>






<!--

  <div id="header">
    <div id="logo"> <a href="index.php"><img src="images/logo.png" alt="" border="0" width="237" height="100" /></a> </div>
    <div class="oferte_content">
      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
      <div class="oferta">
       



    <?php
    
    //sliderdata();



?>
      </div>





      <div class="top_divider"><img src="images/header_divider.png" alt="" width="1" height="164" /></div>
    </div>
    <!-- end of oferte_content
  </div> -->
  <div>
      <div class="right_menu_corner"></div>
    </div>
  <div class="">
  
  
  <div id="form">
  
  <form method="get" action="results.php" enctype="multipart/form-data">
  
  
    <div class="top_search">
    
           <i> <input type="text" class="search_input" name="user_query" placeholder="&nbsp;Search Your Product "/></i>
      <input type="submit" value="Search" class="search_bt" name="search"/>
    </div>
    
    
    </form>
    
    </div>
    
</div>



<br>
        
