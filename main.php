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
	    <link href="2/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="2/ninja-slider.js" type="text/javascript"></script>
    <style>
        a {color:#1155CC;}
        ul li {padding: 10px 0;}
        header {display:block;padding:60px 0 20px;text-align:center;position:absolute;top:8%;left:8%;z-index:4;}
        header a {
            font-family: sans-serif;
            font-size: 24px;
            line-height: 24px;
            padding: 8px 13px 7px;
            color: #fff;
            text-decoration:none;
            transition: color 0.7s;
        }
        header a.active {
            font-weight:bold;
            width: 24px;
            height: 24px;
            padding: 4px;
            text-align: center;
            display:inline-block;
            border-radius: 50%;
            background: #C00;
            color: #fff;
        }
    </style>
	  <div id="ninja-slider">
        <div class="slider-inner">
            <ul>
                <li>
                    <a class="ns-img" href="img/1.jpg"></a>
                    <div class="caption">RESPONSIVE</div>
                </li>
                <li>
                    <a class="ns-img" href="img/2.jpg"></a>
                    <div class="caption">TOUCH·ENABLED</div>
                </li>
                <li>
                    <a class="ns-img" href="img/3.jpg"></a>
                    <div class="caption">VIDEO·AUDIO</div>
                </li>
            </ul>
            <div class="navsWrapper">
                <div id="ninja-slider-prev"></div>
                <div id="ninja-slider-next"></div>
            </div>
        </div>
    </div>
       <div class="clients text-center">
	       	<div class="container">
			<h2 style="text-align:left;"><?php echo $b['title']; ?></h2>
	       		<?php echo html_entity_decode(htmlspecialchars_decode($b['content'])); ?>
	       	</div>
       </div>
       <!-- clients -->
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

