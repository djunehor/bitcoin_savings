<?php
$page_name="Password Reset";
require '../includes/config.php';
if (isset($_POST['btnReset']))
{
// check for valid email address
$email = filter_input(INPUT_POST,'uemail',FILTER_SANITIZE_STRING);
// checks if the username is in use
$check = mysqli_num_rows(mysqli_query($con,"SELECT email FROM $user_table WHERE email = '$email'"));
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $err = 'Please enter a valid email address';
}
elseif (mysqli_num_rows(mysqli_query($con,"SELECT email FROM $user_table WHERE email = '$email'"))!=1) {
$err = 'Sorry, account details not found.';
}
// if no errors then carry on
else{
//create a new random password
$reset_code = substr(md5(uniqid(rand(),1)),3,10);
	
	//update database
$sql = mysqli_query($con,"UPDATE $user_table SET reset_code='$reset_code' WHERE email = '$email'")or die ("Update Error: ".mysqli_error($con));
$from = 'noreply'.$_SERVER['SERVER_NAME'];

//SEND Email
//Import PHPMailer classes into the global namespace
require '../includes/phpmail/PHPMailerAutoload.php';
$mail = new PHPMailer(true);
try {
    //Server settings                                // Enable verbose debug output
	$mail->isSendmail();                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($from, $option['website_name']);
   $mail->addAddress($email); 
	  $mail->addReplyTo($from, 'NoReply');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = "<HTML><BODY>
<div style='font-family:arial; border:2px solid #c0c0c0; padding:15px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;'>
<div style='font-size:22px; color:darkblue; font-weight:bold;'>Password Reset</div>
    <br />
<p>You have requested for password. Kindly follow the instructions below to reset your password.</p>
<p><a href=\"https://".$_SERVER['SERVER_NAME']."/member/reset-password?code={$reset_code}\">Click here to reset password</a> or copy and paste the following link : https://".$_SERVER['SERVER_NAME']."/member/reset-password?code={$reset_code}
<br><br>
The Admin Team,<br />{$option['website_name']}</p>
</div></BODY></HTML>";
    $mail->AltBody = "You have requested for password. Kindly follow the instructions below to reset your password. ".$_SERVER['SERVER_NAME']."/member/reset-password?code=".$reset_code;

    $mail->send();
    $result = 'Kindly check your email. ';
} catch (Exception $e) {
    $err = 'Message could not be sent.';
    $err .=  ' Mailer Error: ' . $mail->ErrorInfo;
}
$result .= "Password Reset instructions has been sent!";
}
}

?>