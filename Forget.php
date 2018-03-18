<?php
$email =$_POST['email'];
$str = strip_tags($email);
$servername = "localhost";
$username = "id5095700_admin";
$password = "bodbod1997";
$db="id5095700_ntl";
$conn = new mysqli($servername, $username, $password, $db);
if(isset($_POST) & !empty($_POST))
{
$email = mysqli_real_escape_string($conn, $_POST['email']); 
$str = strip_tags($email);
$check_on_mail = mysqli_query ($conn, " SELECT * FROM users Where email= '$str'")or die ( mysqli_error ($conn));
$counter = mysqli_num_rows($check_on_mail);
if ($counter == 1)
{
	
	$r = mysqli_fetch_assoc($check_on_mail);
	$password = $r['password'];
	$user = $r['name'];
$TO = "$str";
$Subject = "Password Reset";
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: The-Messenger <themessenger2018@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$Message = "Hello, " . $user; 
$Message .= " <br> Hope This Mail finds you Okay,<br>You requested a password reset for your user account. Your password is  " . $password ;
if(mail ($TO,$Subject,$Message,$headers));
    {
    echo"<h2>";    
    echo "Mail Sent With Password To This E-mail &nbsp;";
    echo"$str";
    echo"</h2>";
        
    }
}
 else {
    echo"<h2>"; 
    echo "This email does not exist &nbsp;"; 
    echo"$str";
    echo"<h2>"; 
}
}
?>
<html>
<head>
        <meta charset="utf-8">
        <title>Forget Password</title>
		<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/messages.png">
		<style>
		@import url(https://fonts.googleapis.com/css?family=Montserrat);
		body{
	background-color: #e8f1f9;
    background-size: cover;
	font-family:sans-serif;	
}

h2 {
	font-size: 25px;
	text-transform: uppercase;
	color: #2C3E50;
}
form {
	width: 395px;
	margin: 60px auto;
	text-align: center;
	position: relative;
}
fieldset{
	background: white;
	border: none;
	border-radius: 4px;
	box-shadow: 0 0 14px 2px rgba(0, 0, 0, 0.3);
	padding: 5px 8px 5px 8px;	
	box-sizing: border-box;
	width: 30%;
	margin: 10% 35%;
	position: relative;
}
input{
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 11px;
	width: 80%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 14px;
}
.button {
	text-decoration: none;
	background-color: rgb(244, 67, 54);
    color: white;
	width: 30%;
    padding: 14px 25px;
	margin: 15px 5px;
    text-align: center;
    display: inline-block;
	cursor: pointer;
}
.button:hover, .button:focus , .button:active {
    background-color: #ff0000;
}
		
		
		</style>
    </head>
    </html>