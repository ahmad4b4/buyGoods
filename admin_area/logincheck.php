<?php
session_start();






 $con = mysqli_connect("localhost","root","","electronix");

 if(mysqli_connect_errno()){
  
  echo"Failed to connect : " . mysqli_connect_error(); 
  
 }

$uid=$_POST["text1"];
$pwd=$_POST["password1"];

$qry="select * from ad_log where aname='$uid' and apwd='$pwd'";

$result=mysqli_query($con,$qry);

$n=mysqli_num_rows($result);
$_SESSION['aname']=$uid;

if($n>0)
{
    header("location:index.php?tn=$uid!you_successfully_login");
    
}

else
{
	echo "<script>alert('Email or password is incorrect!')</script>";
	 echo "<script>window.open('login.html','_self')</script>";
}


?>