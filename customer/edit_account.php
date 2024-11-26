<?php
@session_start();
  include("includes/db.php");



if(isset($_GET['edit_account'])){

	 $c = $_SESSION['u_email'];
	$get_c = "select * from u_reg where u_email = '$c'";
	
	$run_c = mysqli_query($con,$get_c);
	
	 $row = mysqli_fetch_array($run_c);
	
			
	$id1 = $row['user_id'];
	 $fname1 = $row['u_fname'];
	 $lname1 = $row['u_lname'];
	 $add11 = $row['address'];
	$city1= $row['city'];
	
		 $country1 = $row["country"];
		  $zipcode1 = $row["zip"];
		 $phone1	=	$row["phno"];
		 $email1 = $row["u_email"];
		
	
	
	
	
	
	
	}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Account</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


<style>
@import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";
/* Space out content a bit */
body {
  
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

/* Main marketing message and sign up button 
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
  
  /* Remove the bottom border on the jumbotron for visual effect */
  .jumbotron {
    border-bottom: 0;
  }
}


#wid{
	
	height:20%;
	width:40%;}
</style>

</head>

<body>



<div class="container" id="wid">
    <h1 class="well" align="center" >Update Account Information</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="" method="post"  >
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" name="fname" value="<?php echo $fname1; ?>" class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="lname" value ="<?php echo $lname1; ?>" class="form-control" required>
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="address" value="<?php echo $add11; ?>" rows="3" class="form-control" required></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" name="city" value="<?php echo $city1; ?>" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Country</label>
								<input type="text"  name="country" value="<?php echo $country1; ?>" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="zip" value="<?php echo $zipcode1; ?>" class="form-control" required>
							</div>		
						</div>
											
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phno"  value="<?php echo $phone1; ?>" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" value="<?php echo $email1; ?>" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Password</label>
						<input name="pass1" type="password" placeholder="Enter Password" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Re-enter Password</label>
						<input type="password" name="pass2" placeholder="Re-enter password" class="form-control" required>
					</div>
                    
					<center><button type="submit" name="update"class="btn btn-lg btn-info">Update</button>	</center>				
					</div>
				</form> 
				</div>
	</div>
	</div>





</body>
</html>

<?php
		if(isset($_POST["update"])){
			$update_id = $id1;
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
	
	$email= filter_var($email,FILTER_SANITIZE_EMAIL);
	
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)=== false){
			
		
			}
			
	else{
			echo"<script>alert('Email is not valid')</script>";
		}	

		
		if($pass1 !== $pass2){
			
			echo"<script>alert('Password is not matched')</script>";
			
			
			}
			
			
		else{	
	
		
		
		$insert_data = "update u_reg set  u_fname = '$fname',u_lname='$lname',address='$address',city='$city',country='$country',zip='$zipcode',phno='$phone',u_email='$email',password='pass1',date=NOW()";
   
   $run_data = mysqli_query($con,$insert_data);
   
   if($run_data){
   
   echo"<script>alert('You are account is updated successfully')</script>";
   echo"<script>window.open('my_account.php','_self')</script>";
   }


}


		
		
		}
			

			
			
			
					
			
			
			
			
			
			
		





?>









