<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: Message_Center.php");
}
$_SESSION['message'] = '';
$servername = "localhost";
$username = "id5095700_admin";
$password = "bodbod1997";
$db="id5095700_ntl";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass2'])) {
	    $user = mysqli_real_escape_string($conn, $_POST['username']);
	    $email = mysqli_real_escape_string($conn, $_POST['email']);
    	$check = mysqli_query ($conn, " SELECT * FROM users Where username= '$user' OR email= '$email'")or die ( mysqli_error ($conn));
$counter = mysqli_num_rows($check);
if ($counter == 1)
{
	echo "<h3>";
	echo"User Name or Email Already Exists";
	echo"</h3>";
}
else{
	if ($_POST['pass'] == $_POST['pass2']) {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);
		$pass2 = mysqli_real_escape_string($conn, $_POST['pass']);
		$str1 = strip_tags($name);
		$str2 = strip_tags($user);
		$str3 = strip_tags($email);
		$str4 = strip_tags($pass);
		$str5 = strip_tags($pass2);
	    $pattern = '((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,100})';
		if(preg_match($pattern, $pass)){
		$sql = "INSERT INTO users (name,username,email,password) VALUES ('$str1', '$str2','$str3','$str4')";
		if (!mysqli_query($conn,$sql)) {
		die('Error: ' . mysqli_error($conn));
		}
		else{
		header("location: login.php");
	}
		}
		else{echo"Password must contain Uppercase Letters, Lowercase Letters, Numbers and must be more than 8 characters ";}
	}
	else{
		$error = "The Passwords aren't identical";
		echo "<h3>";
		echo "$error" ;
		echo"</h3>";
	}
	}
	
}

else{
		$error = "Please Fill All Fields";
		echo "<h3>";
		echo "$error" ;
		echo"</h3>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Join Us</title>
<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/messages.png">
<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat);
body {
	font-family: montserrat, arial;
    background-color: #e8f1f9;
	background-size: cover;
	height: 100%;
}
h3{
	font-size: 30px;
	text-transform: uppercase;
	color: #f44336;
	margin-bottom: 20px;
}
h2 {
	font-size: 25px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 20px;
}
form {
	width: 395px;
	margin: 50px auto;
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
	margin: 4% 35%;
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
<body>
	<fieldset>
	<form action="register.php" method="post">
    <div class="error" ><?= $_SESSION['message']?></div>
	<h2>Create your account</h2>
    <input type="text" name="name" placeholder="Full Name" autocomplete="off" />
	<input type="text" name="username" placeholder="User Name" autocomplete="off"/>
	<input type="email" name="email" placeholder="E-mail" autocomplete="off"/>
    <input type="password" name="pass" placeholder="Password" autocomplete="off" minlength="8"/>
    <input type="password" name="pass2" placeholder="Confirm Password" autocomplete="off" minlength="8"/>
    <input type="submit" name="button" class="button" value="Register" autocomplete="off"/>
	</form>
	<p id="err"></p>
  </fieldset>
</body>
</html>
