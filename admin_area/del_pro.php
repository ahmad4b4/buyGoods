<?php

include("includes/db.php");

		if(isset($_GET['delete_pro'])){
			
			
			$delete_id= $_GET['delete_pro'];
			
			$delete_pro = "delete from products where prd_id = '$delete_id'";
			$run_delete = mysqli_query($con,$delete_pro);
			
			if($run_delete){
			
						echo "<script>alert('One Product Has been removed!')</script>";
						echo "<script>window.open('index.php?View_product.php','_self')</script>";
				
			}
				
			}
			
				
			
			










?>