

<form action="" method="post">


<br><br>
	
<h2 align="center">Change Your Password</h2>
    
    <br><br>
    
    <table width="300" align="center">
    
    <tr>
    <td >Old Password:</td>
    <td> <input type="password" name="old_pass" required /> </td>
    </tr>
    <tr>
    <td>New Password:</td>
     <td> <input type="password" name="new_pass" required/></td>
    </tr>
    <tr>
    <td>New Password Again:</td>
     <td> <input type="password" name="new_pass1" required /></td>
    </tr>
    <tr align="center">
   
     <td  align="center"> <input type="submit" name="change_pass" value="Change Password" /></td>
    </tr>
    
    </table>
    
 
 
 
</form>

<?php
	include("includes/db.php");
		

$c = $_SESSION['u_email'];
if(isset($_POST['change_pass'])){
	
	
	
	
	
	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$new_pass_again = $_POST['new_pass1'];

	
	
	
	
	
	
 $get_real_pass ="select * from u_reg where password = '$old_pass'";
	
	$run_real_pass = mysqli_query($con,$get_real_pass);
	
	if(mysqli_num_rows($run_real_pass)==0){
		
		echo "<script>alert('Your current password is not valid,try again')</script>";
		exit();
		
		}
	
	if($new_pass!=$new_pass_again){
		
		echo "<script>alert('New password did not match,try again')</script>";
		exit();
		
		}
	else{
		$update = "update u_reg set password = '$new_pass' where u_email = '$c'";
		
		
		$run_update = mysqli_query($con,$update);
		echo "<script>alert('Password change successfully')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";

		
		}
	
	}


?>