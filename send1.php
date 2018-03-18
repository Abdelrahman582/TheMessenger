<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo"";
}
else{
	header("Location: login.php");
}
$servername = "localhost";
$username = "id5095700_admin";
$password = "bodbod1997";
$db="id5095700_ntl";
$conn = new mysqli($servername, $username, $password, $db); 
$sql="SELECT id, username FROM users WHERE showing='1' ";
$query = mysqli_query($conn, $sql);
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
	$tou = mysqli_real_escape_string($conn, $_POST['user']);
	$message = mysqli_real_escape_string($conn, $_POST['content']);
	$str = strip_tags($message);
	$check = mysqli_query ($conn, " SELECT * FROM users Where username= '$tou'")or die ( mysqli_error ($conn));
$counter = mysqli_num_rows($check);
if ($counter == 1)
{
    if(!empty($message)){
	$tou = $_POST['user'];
	$message = $_POST['content'];
	$str = strip_tags($message);
	$toid = $_POST['toid'];
	$pid = $_SESSION['uname'];
	$from = $_POST['from'];
	$data = $_POST['data']; 
	$sql1="INSERT INTO `inbox`(`userid`, `username`, `from_id`, `from_username`, `content`,`viewed`,`receive_date`) 
	VALUES ('toid','$tou','$from', '$pid' , '$str','0', '$data')";
	$query = mysqli_query($conn, $sql1) or die ( mysqli_error ($conn));
	header("Location:Message_Center.php");

    }
    else{
        echo"<h3>";
        echo"You Cannot Send Empty Message ";
        echo"</h3>";
    }
    }
else{
    echo"<h3>";
    echo"This Username isn't exist";
    echo"</h3>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Send A Message</title>
<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/messages.png">
</head>
<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat);
body {
	font-family: montserrat, arial;
    background-color: #e8f1f9;
	background-size: cover;
	height: 100%;
}
h2 {
	font-size: 30px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 20px;
}
h3{
	font-size: 30px;
	text-transform: uppercase;
	color: #f44336;
	margin-bottom: 20px;
}
fieldset{
	background: white;
	border: none;
	border-radius: 4px;
	box-shadow: 0 0 14px 2px rgba(0, 0, 0, 0.3);
	padding: 8px 8px;
	box-sizing: border-box;
	width: 30%;
	margin: 7% 35%;
	position: relative;
}
.send{
    text-decoration: none;
	background-color: rgb(244, 67, 54);
    color: white;
	width: 30%;
    padding: 14px 25px;
	margin-left:34%;
    text-align: center;
    display: inline-block;
	cursor:pointer;
}
.send:hover, .send:active {
    background-color: #ff0000;
}
input{
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 11px;
	margin-left:40px;
	width: 80%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 14px;
}
</style>
<body>
</body>
</html>