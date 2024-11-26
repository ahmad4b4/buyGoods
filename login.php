<?php

  include("includes/db.php");

session_start();


?>







<!DOCTYPE html>
<html>
<title>Login</title>
<style>
form {
	
    border: 5px solid #999;
	width:50%;
	
}

input[type=text], input[type=password] {
    width: 125%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
	border-top-left-radius:5px;
	border-top-right-radius:5px;
}

button {
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
	height:50px;
    width: 20%;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
	border-top-left-radius:5px;
	border-top-right-radius:5px;

}

button:hover {
    opacity: 0.6;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
	border-top-left-radius:5px;
	border-top-right-radius:5px;

}


.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

.header{
	height:60px;
	background-color:black;
	color:white;
		width:15%;


	}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>


<center>
<div class="header"> <h1><i>BuyGoods.pk</i></h1></div><br><br><br>

<form action="login.php" method="post">

  <div class="container">
  <h2>Login</h2>
	<table>
    <tr><td>
    <label><b>Email:</b></label>
    </td>
    <td>
    <input type="text" placeholder="Enter Username" name="uname" required><br>
</td>
</tr>
<tr><td>
    <label><b>Password:</b></label></td>
    <td>
    <input type="password" placeholder="Enter Password" name="pass" required><br></td></tr>
      </table>  
    <button type="submit" name="Submit">Login</button>
    
    <button type="reset" class="cancelbtn">Reset</button>
       <span class="psw">Forgot <a href="#">password?</a></span>
  
  </div>

 </form>


<footer>

<h3><a href="index.php">BuyGoods.pk</a></h3>

<h4>Copyright: <?php  echo date('Y');?></h4>

</footer>
</center>
</body>
</html>
<?php

if(isset($_POST["Submit"])){
			$uid=$_POST["uname"];
			$pwd=$_POST["pass"];
			
		
			
			$qry="select * from u_reg where u_email='$uid' and password='$pwd'";

$result=mysqli_query($con,$qry);

if(mysqli_num_rows($result)> 0 ){
	
	
	$_SESSION['u_email'] = $uid;
	
    
	    echo "<script>window.open('index.php','_self')</script>";
 }
			
else
{
	echo "<script>alert('Email or password is incorrect!')</script>";
	echo "<script>window.open('login.php','_self')</script>";
	
}

}
?>