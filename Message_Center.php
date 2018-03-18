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
$user= $_SESSION['uname'];
$pid = 0 ; 
$conn = new mysqli($servername, $username, $password, $db); 
$sql = "SELECT id , username FROM users WHERE username='$user'";
$query = mysqli_query($conn,$sql)or die (mysqli_error());
while ($row = mysqli_fetch_array($query)){
	$pid = $row["id"];
	$user = $row["username"];
}	
mysqli_free_result($query);

$sql = "SELECT COUNT(id) AS numbers FROM inbox WHERE username = '$user' and viewed = '0'";
$query = mysqli_query($conn,$sql)or die (mysqli_error());
$result = mysqli_fetch_assoc($query);
$newM = $result['numbers'];

$sql = "SELECT COUNT(id) AS numbers FROM inbox WHERE username = '$user'";
$query = mysqli_query($conn,$sql)or die (mysqli_error());
$result = mysqli_fetch_assoc($query);
$totalM = $result['numbers']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Message Center</title>
<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/messages.png">
<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat);
body {
	font-family: montserrat, arial;
    background-color: #e8f1f9;
	background-size: cover;
	height: 100%;
}
h1{
	font-size: 35px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 20px;
}
h2 {
	font-size: 25px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 20px;
	margin-left: 10px;
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
.send:link, .send:visited {
    text-decoration: none;
	background-color: rgb(244, 67, 54);
    color: white;
    padding: 14px 25px;
    text-align: center;
    display: inline-block;
}
.send:hover, .send:active {
    background-color: #ff0000;
}
.button{
    font-size: 15px;
	font-family: montserrat;
	border: none;
	text-decoration: none;
	background-color: rgb(244, 67, 54);
    color: white;
	width: 53%;
    padding: 14px 25px;
	margin-left:23.5%;
    text-align: center;
    display: inline-block;
	cursor:pointer;
}
.button:hover, .button:active {
    background-color: #ff0000;
}
table {
    border-collapse: collapse;
    width: 100%;
	text-align:center;
}

th, td {
    padding: 8px;
    text-align: center;
}
tr:nth-child(even){background-color: #f2f2f2;}
tr:hover{
	background-color: #f5f5f5;
}

th {
    background-color: rgb(244, 67, 54);
    color: white;
}
</style>
</head>
<body>
	<fieldset>
		<?php if ($_SESSION['uname']) { ?> 
		<h1> <center>Hello <?php echo $_SESSION['uname'] ;?> </center></h1>
		<br><br>
		<center><a href = "send.php" class="send" >Send New Message</a></center><br>
		<form method="post" action="logout.php">
		<input type="submit" name="button" class="button" value="Logout">
		</form>
		<br>
		<h2>Your Messages</h2>
		<?php 
if ($newM > 0 ) { echo"You have &nbsp;"; print "<b>{ " .$newM. "} </b>"; echo"New Messages &nbsp;"; } else {} ?><?php echo"You have Total &nbsp;"; print $totalM ; echo" &nbsp; Messages"; }?>
		<?php
		$servername = "localhost";
		$username = "id5095700_admin";
        $password = "bodbod1997";
        $db="id5095700_ntl";
		$user= $_SESSION['uname'];
		$conn = new mysqli($servername, $username, $password, $db);
		$sql = "SELECT * FROM inbox WHERE username='$user'  ORDER BY receive_date DESC";
		$query = mysqli_query($conn,$sql)or die (mysqli_error());
		$count  = mysqli_num_rows($query);
	if ($count > 0 ) {
		echo"<table>";
		echo"<tr><th>User Name</th> &nbsp;<th>Content</th></tr> <br>";
		while($row = mysqli_fetch_assoc($query)){
			echo"<tr><td>";
			echo $row['from_username'];
			echo"</td> &nbsp;";
			echo"<td>";
			echo $row['content'];
			echo"</tr></td>";
		}
		echo"</table>";
		$sql = "UPDATE `inbox` SET viewed = '1' WHERE username='$user' ";
		$query = mysqli_query($conn,$sql)or die (mysqli_error());
	}
		?>
	</fieldset>
</body>
</html>