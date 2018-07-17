<?php
require 'includes/config.php'; 
  //update current user time left
$page_name="Page Not Found";
$b['content'] = '<div class="error-404 text-center">
			<h1>404</h1>
			<p>The Page you\'re looking for does not exist</p>
			<a class="b-home" href="index">Back to Home</a>
		</div>';
require 'main.php';
?>