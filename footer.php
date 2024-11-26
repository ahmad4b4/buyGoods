<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<style>
/*foooter css*/


.back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
}


footer .list-group-item{
    border:0;
    background:transparent;
    }
    
    div.visible-xs-block
    {
            background:maroon;
            color:white;
            font-family:"Tahoma" serif;
            padding:1em;
        }
        
        footer{
		
          
            color:white;
           height:auto;
            }
			
			.fot{
				width:100%;
				height:350px;
clear:both;
background-color:#000;
				
				
				
				}


</style>
<script>
  $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
</script>
</head>

<body>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

<div class="fot">
<footer>
 
	<div class="hidden-xs">
    	<div class="col-md-4 col-lg-4 col-sm-4 ">
				
				<i><h3>BuyGoods.pk</h3></i>
                  <ul class="list-group ">
					<li class="list-group-item">Email: www.buygoods@gmail.com</li>
					<li class="list-group-item">Address: Gulberg III, Lahore</li>
					<li class="list-group-item">Ph#: +92-333444333, +92-11122233</li>
					
				</ul>
			</div>
			<div class="col-md-4 col-lg-4 col-sm-4 ">
              <h3>Payment</h3>
				<ul class="list-group">
					<li class="list-group-item"><img src="images/VISA.png"></li>
					<li class="list-group-item"><img src="images/paypal.png" width="150px" height="70"> 
			</li>
					<li class="list-group-item"><img src="images/cashondelivery.png"> 
				 </li>
					<li class="list-group-item"><h4><span class="glyphicon glyphicon-copyright-mark"></span> Copyrights <?php echo date('Y');?>: Virtual University</li></h4>
				</ul>
			</div>
		
    		<div class="col-md-4 col-lg-4 col-sm-4">
    		<h3>Join us</h3>
    			<ul class="list-group">
    				<li class="list-group-item"><a href="www.facebook.com">Facebook</a></li>
    				<li class="list-group-item"><a href="#">LinkedIn</a></li>
    				<li class="list-group-item"><a href="www.twitter.com">Twitter</a></li>
                    
                    
    			</ul>
    		</div>
            </div>
            
            
            
        
    		
    			
    				
            
            
            
		</div>
	
	
</footer>



</div>




</body>
</html>