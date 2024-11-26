<?php
include ("includes/db.php");
if(isset($_GET['delete_user'])){
	
	$user_id =$_GET['delete_user'];
	
	$user_acc = "delete from u_reg where user_id = '$user_id'";
	
	$run_delete = mysqli_query($con, $user_acc);
	
	if($run_delete){
		
		echo"<script>alert('Customer account is deleted sucessfully')</script>";
		echo"<script>window.open('users.php','_self')</script>";
		}
	}


?>