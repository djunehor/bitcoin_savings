<?php 
$page_name = 'Registration';
require '../includes/config.php';
if(isset($_POST['btnSignup']))
{
$email = filter_input(INPUT_POST,'uemail',FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,'upass',FILTER_SANITIZE_STRING);
$confirmpassword = filter_input(INPUT_POST,'cpass',FILTER_SANITIZE_STRING);
if(empty($password) || empty($confirmpassword))
{
$err = 'All fields are required!';
}
else if(empty($email) ||filter_var($email,FILTER_VALIDATE_EMAIL)===false){
$err = 'Enter a valid Email';
}
else if(empty($password) ||strlen($password)<9){
$err = 'Password must be greater than 8 Characters';
}
else if($password!=$confirmpassword){
$err = 'Passwords do not match!';
}
else if(mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"))>0){
$err = 'Email Already Exist';
}
if(!isset($err))
{
$email_code=md5(time());
$pword = md5($password);
$reg_time = time();
$insert = mysqli_query($con,"INSERT INTO users (email,password,reg_time,email_code) VALUES ('$email','$pword','$reg_time','$email_code')") or die('Insert Error: '.mysqli_error($con));
$k = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM $user_table WHERE user_id=(SELECT MAX(user_id) FROM $user_table)")) or die('Cannot select current user');
$result = "Registration Successful. ";
require '../includes/phpmail/PHPMailerAutoload.php';
$from = 'noreply@'.$_SERVER['SERVER_NAME'];
$mail = new PHPMailer;
try {
$mail->setFrom($from,$option['website_name']);
$mail->addAddress($email);
$mail->addReplyTo($from,'NoReply');
$mail->isHTML(true);
$mail->Subject = 'Activation Link';
$mail->Body    = "<HTML><BODY>
<div style='font-family:arial; border:2px solid #c0c0c0; padding:15px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;'>
<div style='font-size:22px; color:darkblue; font-weight:bold;'>Welcome to {$option['website_name']}</div>
    <br />
<p>Find your account details below:
						   <ul>
						   <li>Email: {$email}</li>
						   <li>Password: {$password}</li>
						   </ul>
<a href=\"https://".$_SERVER['SERVER_NAME']."/member/verify-email?a={$k['user_id']}&b={$email_code}\">Click here to activate account</a> or copy the following link : https://".$_SERVER['SERVER_NAME']."/member/verify-email?a={$k['user_id']}&b={$email_code}
<br><br><br>The Admin Team,<br />{$option['website_name']}</p>
</div></BODY></HTML>";
$mail->AltBody = 'Click this link https://'.$_SERVER['SERVER_NAME'].'/member/verify-email?a='.$k['user_id'].'&b='.$email_code.' to activate your account';
$mail->send();
$result .= 'Activation Email Sent.';
}catch (Exception $e) {
$err = 'Message could not be sent.';
$err .=  ' Mailer Error: '.$mail->ErrorInfo;
}
}
}; ?>