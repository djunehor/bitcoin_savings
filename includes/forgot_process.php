<?php
require_once '../includes/config.php';
$page_name = "Recover Password";
$err = $_GET['err'] ? $_GET['err']: null;
if(isset($_POST['btnforgot']))
{ 
$uemail = filter_input(INPUT_POST,'user_email',FILTER_SANITIZE_EMAIL);
$username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);

 //If Email and Password is Given then Continue
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM $user_table WHERE email='$uemail'"))==1)
 { //Checking Email from the Database
$p = rand(111111111,999999999);
     $pword = md5($p);
 $t = mysqli_query($con,"update $user_table set password='$pword' where email='$uemail'"); 
//SEND Email
//Import PHPMailer classes into the global namespace
require '../phpmail/PHPMailerAutoload.php';
$from = 'noreply@'.$_SERVER['SERVER_NAME'];
$mail = new PHPMailer(true);
try {
    //Server settings                                // Enable verbose debug output
	$mail->isSendmail();                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($from, $website_name);
    $mail->addAddress($uemail, $username);     // Add a recipient
    $mail->addReplyTo($from, 'NoReply');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = "<HTML><BODY>
<div style='font-family:arial; border:2px solid #c0c0c0; padding:15px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;'>
<div style='font-size:22px; color:darkblue; font-weight:bold;'>New Login Details</div>
    <br />
<p>Find your account details below:
						   <ul>
						   <li>Email: {$uemail}</li>
						   <li>Password: {$p}</li>
						   </ul>
						   Login and rest your password immediately.
<br><br><br>The Admin Team,<br />{$website_name}</p>
</div></BODY></HTML>";

    $mail->send();
    $result = 'Reset successful. Login Details has been Sent.'; 
}
catch (Exception $e) {
    $err = 'Message could not be sent.';
    $err .=  ' Mailer Error: ' . $mail->ErrorInfo;
}
 }
 else
 {
	 $err = "Account details does not match!";
 }
}
?>