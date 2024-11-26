<form action="" method="post">


<br><br>
	
 
    <h2 align="center">Do you really want to delete your account</h2>
    <br><br>
    <center>
    
   <input type="submit" name="yes" value="I want to Delete my account"/> 
   
    <input type="submit" name="no" value="I Do not want to Delete my account"/>
    </center>
 
 
</form>

<?php
		include("includes/db.php");
		
$c = $_SESSION['u_email'];

if(isset($_POST['yes'])){
	$delete_acc = "delete from u_reg where u_email = '$c'";
	
	$run_delete = mysqli_query($con,$delete_acc);
	
	if($run_delete){
		
		session_destroy();
					echo "<script>alert('Your Account has been deleted!')</script>";
					echo "<script>window.open('../index.php','_self')</script>";
		}
	
	
	}

if(isset($_POST['no'])){
	
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
?>

