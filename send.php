<?php
error_reporting(0);
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
<fieldset>
<h2><center>Send A Message</center></h2>
<form action="send1.php" method="post">
<input type="text" name="user" Placeholder="To 'User Name'" autocomplete="off"><br><br> 
<input type="text" class="con" name="content" Placeholder="Message Content" style="height:100px;" autocomplete="off"><br><br>
<input type="submit" name="submit" class="send" value="Send" onclick="msg()" height="180">
<input type="hidden" name="toid" id="toid" value="<?php print $toid; ?>" />
<input type="hidden" name="pid" id="pid" value="<?php print $pid; ?>" />
<input type="hidden" name="from" id="from" value="<?php print $uname; ?>" />
<input type="hidden" name="data" id="data" value="<?php echo date("Y-m-d h:i:sa"); ?>" />
<?php
if($_POST['submit']){
	$tou = $_POST['user'];
	$_SESSION['touser'] = $tou;
	$message = $_POST['content'];
	$toid = $_POST['toid'];
	$_SESSION['toid'] = $toid;
	$pid = $_POST['pid'];
	$from = $_POST['from'];
	$_SESSION['from'] = $from;
	$data = $_POST['data'];
	$servername = "localhost";
	$username = "id5095700_admin";
    $password = "bodbod1997";
    $db="id5095700_ntl";
	$conn = new mysqli($servername, $username, $password, $db); 
}
?>
</form>
<form method="post" action="logout.php">
		<input type="submit" name="send" class="send" value="Logout" >
		</form>
</fieldset>
</body>
</html>