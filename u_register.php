<?php

  include("includes/db.php");

include("functions/functions.php");

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SignUp</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


<style>
@import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";
/* Space out content a bit */
body {
  padding-top: 20px;
  padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
  padding-right: 15px;
  padding-left: 15px;
}

/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

/* Custom page footer */
.footer {
  padding-top: 19px;
  color: #777;
  border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}
.header{
	height:60px;
	background-color:black;
	color:white;
		width:19%;


	}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
  /* Remove the padding we set earlier */
  .header,
  .marketing,
  .footer {
    padding-right: 0;
    padding-left: 0;
  }
  /* Space out the masthead */
  .header {
    margin-bottom: 0px;
  }
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}
</style>

</head>

<body>

<center>
<div class="header"> <h1><i>BuyGoods.pk</i></h1></div><br><br><br>
</center>


<div class="container">
    <h1 class="well" align="center" >Sign Up</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="u_register.php" method="post"  >
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" name="fname" placeholder="Enter First Name Here.." class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="lname" placeholder="Enter Last Name Here.." class="form-control" required>
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" placeholder="Enter Address Here.." rows="3" class="form-control" required></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" name="city" placeholder="Enter City Name Here.." class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Country</label>
								<input type="text"  name="country" placeholder="Country" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="zip" placeholder="Enter Zip Code Here.." class="form-control" required>
							</div>		
						</div>
											
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phno"  placeholder="Enter Phone Number Here.." class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Password</label>
						<input name="pass1" type="password" placeholder="Enter Password" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Re-enter Password</label>
						<input type="password" name="pass2" placeholder="Re-enter password" class="form-control" required>
					</div>
                    
					<center><button type="submit" name="Submit"class="btn btn-lg btn-info">Sign Up</button>	</center>				
					</div>
				</form> 
				</div>
	</div>
	</div>





</body>
</html>

<?php
		if(isset($_POST["Submit"])){
			
		$fname = $_POST["fname"];
		 $lname = $_POST["lname"];
		 $address = $_POST["address"];	
		  $city	= $_POST["city"];
	
		 $country = $_POST["country"];
		  $zipcode = $_POST["zip"];
		 $phone	=	$_POST["phno"];
		 $email = $_POST["email"];
		 $pass1 = $_POST["pass1"];
		$pass2 =	$_POST["pass2"];
		$mem	= 'No Membership';
		
		$customer_ip = getip();
	
	$email= filter_var($email,FILTER_SANITIZE_EMAIL);
	
	
	if(filter_var($email,FILTER_VALIDATE_EMAIL)=== false){
			
		echo"<script>alert('Email is not valid')</script>";
		
		exit();
			}
			
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)=== false){
			
		$query = "SELECT * from u_reg WHERE u_email='$email'";
			$result = mysqli_query($con,$query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				echo"<script>alert('Provided Email is already in use')</script>";
				exit();
				
				 
			}

		
		if($pass1 !== $pass2){
			
			echo"<script>alert('Password is not matched')</script>";
			
			}
			
			
		else{	
	
		
		
		$insert_data = "insert into u_reg (u_fname,u_lname,address,city,country,zip,phno,u_email,password,date,u_ip,mem_type) values ('$fname','$lname','$address','$city','$country','$zipcode','$phone','$email','$pass1',now(),'$customer_ip','$mem')";
   
   $run_data = mysqli_query($con,$insert_data);
   
   if($run_data){
   
   echo"<script>alert('You are registered successfully')</script>";
   echo"<script>window.open('login.php','_self')</script>";
   }


}


		
		
	}
		}

			
			
			
					
			
			
			
			
			
			
		





?>









