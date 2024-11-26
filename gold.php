
		<?php
		session_start();

  include("includes/db.php");

			if(isset($_GET['user_id'])){
	
					 $u_id = $_GET['user_id'];
					 
					 $gold = 'gold';
					 
					 
					 $rg = "select * from u_reg where mem_type = '$gold' and user_id = '$u_id'";
				$sqlgold = mysqli_query($con, $rg);
if(mysqli_num_rows($sqlgold)> 0 ){
	
	
	
	
    echo "<script>alert('You have membership already')</script>";
	echo "<script>window.open('mem_ship.php','_self')</script>";
 }
			
				
				else{
					
					$update_gold = "update u_reg set mem_type='gold' where user_id = '$u_id' ";
					$sqlgold = mysqli_query($con, $update_gold);
					if($sqlgold){
					echo "<script>alert('You got Gold')</script>";
					echo "<script>window.open('mem_ship.php','_self')</script>";
					 
					
					
					
					
					
					
					
					}
				}
				}
						
				
				
					?>