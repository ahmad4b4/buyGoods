
<?php

  include("includes/db.php");
  if(isset($_GET['edit_pro'])){
	  
	  $pro_id = $_GET['edit_pro'];
	  
	  $get_edit = "select* from products where prd_id = '$pro_id'";
	  
	  $run_edit = mysqli_query($con,$get_edit);
	  $row_edit = mysqli_fetch_array($run_edit);
	  
	  $ptitle = $row_edit['prd_title'];
	  $prdcat = $row_edit['prd_cat'];
	  $prdbrand = $row_edit['prd_brand'];
	  $prdprice = $row_edit['prd_price'];
	  $pdesc = $row_edit['prd_desc'];
	  $pimg = $row_edit['prd_img'];
	  $key = $row_edit['prd_keyword'];
	  $Status = $row_edit['Status'];
	  
	  
	  
	  }
  
  
  
  
  
  
  
  
  
   ?>



<div>

<nav class="navbar navbar-inverse">
   <div class="container-fluid">
     <div class="navbar-header ">
      <i><a class="navbar-brand">BuyGoods</a></i>
     </div>
     <ul class="nav navbar-nav">
       <li><a href="index.php">Add Product</a></li>
       <li><a href="View_product.php">View Products</a></li>

       <li><a href="#">Manage User</a></li>
       <li><a href="#">Confirm Orders</a></li>
                 </ul>
           <div class="navbar navbar-right">
      <ul class="nav navbar-nav">
       <li><a href="#"><span class="glyphicon glyphicon glyphicon-log-in" ></span> Logout</a></li>
    
     </ul>
     </div>
</nav>      
     



<div id="main_container">
  <div id="main_content">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!-- end of menu tab -->
    <!-- end of left content -->
    
   
    
<div class="container">
    <h1 class="well" align="center">Update Or Edit Product</h1>
	<div class="col-lg-12 well">
	<div class="row">
			 <form action="" method="POST" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
                            <label><strong>Product Title:</strong></label>
              <input type="text" class="form-control" name="product_title" value="<?php echo $ptitle; ?>" required />

								
							</div>
							<div class="col-sm-6 form-group">
                            <label><strong>Product Category:</strong></label>
						
							
                                
              
           <select name="product_cat" class="form-control" required>
           
           <option></option>
           
           
           <?php
           
          

	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con,$get_cats);

	while($row_cats=mysqli_fetch_array($run_cats)){

	$cat_tit = $row_cats['cat_title'];
    $cat_id = $row_cats['cat_id'];
    

     echo "<option value=$cat_id>$cat_tit</option>";    
    


     }    
           ?>
           
           </select>
           
                                
							</div>
						</div>					
				
    <div class="col-sm-6 form-group">
								<label>Product Brands</label>
								<select name="product_brand" class="form-control" required>
              
              <option></option>
             <?php
                          
                          
               $get_brands = "select * from brands";
	           $run_brands = mysqli_query($con,$get_brands);

	           while($row_brands=mysqli_fetch_array($run_brands)){

	
               $brand_tit = $row_brands['brand_title'];
               $brand_id = $row_brands['brand_id'];
    

               echo "<option value = $brand_id > $brand_tit </option>";    
    


    
	           }


            ?>
            
            </select>


							</div>
							
    
    <div class="col-sm-4 form-group">
								<label>Product Image</label>
                                <input type="file" class="form-control" name="product_image" required />
								
							</div>
    
    
    
    <div class="col-sm-6 form-group">
								<label><strong>Product Price:</strong></label>
              <input type="text" class="form-control" value="<?php echo   $prdprice; ?>" name="product_price" required /></div>
              
              <div class="col-sm-6 form-group">
								<label><strong> Product description:</strong></label>
                <textarea name="product_desc" class="form-control" cols="20" rows="4" required></textarea>

            
            
							</div>
						</div>	
                        
                        <div class="col-sm-6 form-group">
								<label><strong>Product Keywords:</strong></label>
                           <input type="text" class="form-control" name="product_keywords" required/>
                   
                                
                         </div>
            
							</div>
                            
                            
       
<div class="col-sm-10 form-group">
      <center> 
 
      <input type="submit" class="from-control" value="Update" name="update"/></div>	</center>	
						</div>	
  
              
            </center>  
              
              
              
            
							</div>
						</div>	
    
    
    </form>
    
      <div class="footer">
 
    <div> &nbsp;All Rights Reserved <?php echo date('Y')?><br />
      	
  
  
  </div>
</div>
<!-- end of main_container -->
</div>


<?php


if(isset($_POST['update'])){

    //getting text data
   $product_title = $_POST['product_title'];
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
   $product_desc = $_POST['product_desc'];
   $product_keywords = $_POST['product_keywords'];
   
    //getting image data
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp = $_FILES['product_image']['tmp_name'];
   
   move_uploaded_file($product_image_tmp,"product_images/$product_image");
   
   $insert_product = "insert into products (prd_cat,prd_brand,prd_title,prd_price,prd_desc,prd_img,prd_keyword) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
   
   $run_product = mysqli_query($con,$insert_product);
   
   if($run_product){
   
   echo"<script>alert('Product Has been inserted')</script>";
   echo"<script>window.open('index.php?tn=$r','_self')</script>";
   }


}


?>