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
    die("Connection failed" . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
	$user = mysqli_real_escape_string($conn, $_POST["uname"]);  
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]); 
    $str = strip_tags($user);
    $str2 = strip_tags($pass);
    $query = "SELECT * FROM users WHERE username = '$str' AND password = '$str2'";
	$result = mysqli_query($conn, $query);
    $row    = mysqli_fetch_array($result);
    $count  = mysqli_num_rows($result);
	if(!empty($_POST['uname']) && !empty($_POST['pass'])) {
	if ($count == 1 ) {
        $_SESSION['uname'] = $user;
		$_SESSION['loggedin'] = true;
        header("location: Message_Center.php");
    } else {
        $error = "Your username or password is invalid";
		echo "<h3>";
		echo "$error" ;
		echo"</h3>";
    }
}
else{
	$error = "Please enter UserName and Password";
		echo "<h3>";
		echo "$error" ;
		echo"</h3>";
}
}
?>
<HTML>
	<head>
    <meta charset="utf-8">
    <title>Login</title>
	<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/messages.png">
<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat);
body{
	background-color: #e8f1f9;
    background-size: cover;
	font-family: montserrat;	
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
	font-family: montserrat;
}
form {
	width: 395px;
	margin: 20px auto;
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
	margin: 6% 35%;
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
a:link {
    color: green;
    text-decoration: none;
	font-family: montserrat;
}

a:hover {
    font-family: montserrat;
	color: grey;
    pointer:cursor;
}
a:visited {
  font-family: montserrat;
  color: green;
}	
		
		</style>
    </head>
	<body>
		
		  <fieldset>
            <form action="login.php" method="post">
<h2>login</h2>        
        
                <input type="text" name="uname" placeholder="UserName"autocomplete="off">
                
                <input type="Password" name="pass" placeholder="Password"autocomplete="off">
                <input type="Submit" name="button" class="button" value="Login ">
				<br> <br>
                <a href="Forget_Password.php" style="margin-right:120px" color="white" >Forget Password?</a>
				<a href="register.php"  color="white"  >Register</a>
            </form> 
			</fieldset>
		
	</body>
</html>