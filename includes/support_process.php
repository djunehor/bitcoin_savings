<?php
require 'includes/config.php';
$b = mysqli_fetch_assoc(mysqli_query($con,"select * from $con_table where cid=5"));  //update current user time left
$page_name=$b['title'];
if(isset($_POST['btnSup']))
{
	$a = filter_input(INPUT_POST,'Name',FILTER_SANITIZE_STRING);
	$f = filter_input(INPUT_POST,'Message',FILTER_SANITIZE_STRING);
	$e = filter_input(INPUT_POST,'Subject',FILTER_SANITIZE_STRING);
	$g = filter_input(INPUT_POST,'Email',FILTER_SANITIZE_STRING);
	if(empty($a) || empty($f) || empty($g) || empty($e))
	{
		$err = "All fields are required!";
	}
	else if(filter_var($g,FILTER_VALIDATE_EMAIL)===false){
$err = 'Enter a valid Email';
}
	else
	{
	//Import PHPMailer classes into the global namespace
require 'includes/phpmail/PHPMailerAutoload.php';
$h = 'support@'.$_SERVER['SERVER_NAME'];
$mail = new PHPMailer;
try {
    $mail->setFrom($g, $a);
    $mail->addAddress($h, $option['website_name']);     // Add a recipient
    $mail->addReplyTo($g, $a);
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $e;
    $mail->Body    = "<HTML><BODY>
<div style='font-family:arial; border:2px solid #c0c0c0; padding:15px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;'>
<div style='font-size:22px; color:darkblue; font-weight:bold;'>{$e}</div>
    <br />
<p>New Message:
						   <ul>
						   <li>Name: {$a}</li>
						   <li>Email: {$g}</li>
						   <li>Message: {$f}</li>
						   </ul>
</p>
</div></BODY></HTML>";

    $mail->send();
    $result = 'Message has been sent';
} catch (Exception $e) {
    $err = 'Message could not be sent.';
    $err .=  ' Mailer Error: ' . $mail->ErrorInfo;
}
}
}
 ?>