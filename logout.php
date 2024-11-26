<?php


include("functions/functions.php");
include("includes/db.php");

cart();
 	 $ip_add = getip();
    		$empty_cart = "delete from cart where ip_add='$ip_add'";
		$run_empty = mysqli_query($con, $empty_cart);


session_start();
session_destroy();
 
 
if($run_empty){

header("location:index.php");

}
?>