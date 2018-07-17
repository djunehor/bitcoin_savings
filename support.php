<?php
include 'includes/support_process.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $page_name." | ".$option['website_name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!-- webfonts -->
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<!-- webfonts -->
<!----font-Awesome----->
<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>

<div class="header">
          <!-- container -->
         <!-- top-nav -->
      <div class="container">	 			
		<div class="logo">
		  <a href="index"><img src="images/logo.png" alt=""/></a>
		</div>	
		<div class="header_bottom_right">			
	        <div class="h_menu4"><!-- start h_menu4 -->
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li class="active"><a href="index">Home</a></li>
				    <li><a href="about-us">About Us</a>
					</li>
					<li><a href="member/signin">Login</a>
					</li>
					<li><a href="member/signup">Register</a></li>
					<li><a href="support">Support</a></li>
				</ul>
				<script type="text/javascript" src="js/nav.js"></script>
	          </div><!-- end h_menu4 -->
              <div class="clearfix"> </div>
       			<!-- top-nav -->
       		</div>
       		<!-- header -->
         </div>
      </div> 
       <div class="clients text-center">
	       	<div class="container">
        	<?php echo $b['taskname']; ?></h3>
	       		<?php echo html_entity_decode(htmlspecialchars_decode($b['content'])); ?> 
			 <div class="contact_top">
	      		
	      		<div class="col-md-9">
	      			<div class="contact-form">
					  <?php if(isset($result)) { echo '<div class="alert alert-success">'.$result.'</div>'; }
				elseif(isset($err)) { echo '<div class="alert alert-danger">'.$err.'</div>'; } ?>
					   <form method="post" action="">
						  <input type="text" class="textbox" name="Name" placeholder="Name">
						  <input type="text" class="textbox" name="Email" placeholder="Email">
						  <input type="text" class="textbox" name="Subject" placeholder="Subject">
						  <textarea name="Message" placeholder="Message"></textarea>
						  <input type="submit" name="btnSup" value="Submit">
					   </form>
					</div>
	      		</div>
	      		<div class="clearfix"> </div>
      	     </div>
		   </div>
        </div>
       <!-- footer -->
        <div class="footer">
       		<div class="container">
       		<!-- footer-grids -->
       		<div class="footer-grids">
	       		 <div class="col-md-3 footer-grid">
	       			<h3><a href="about-us">About Us</a></h3>
	       			
	       		</div>
	       		<div class="col-md-3 footer-grid">
	       			<h3><a href="terms">Terms and Conditions</a></h3>
	       			
	       		</div>
	       		<div class="col-md-3 footer-grid">
	       			<h3><a href="faq">Frequently Asked Questions</a></h3>
	       			
	       		</div>
	       		<div class="col-md-3 footer-grid">
	       			<h3><a href="support">Support</h3>
	       			
	       		</div>
	       		<div class="clearfix"> </div>
       		</div>
       		<div class="copy">
	       			Copyright &copy <?php echo $option['website_name']; ?> 2017. 
	       		</div>
       		<!-- footer-grids -->
       		</div>
       </div>
       <!-- footer -->
      <!-- container -->
</body>
</html>

