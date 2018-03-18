<?php
error_reporting(0);
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header("Location: Message_Center.php");

	}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <title>The Messenger</title>
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link rel="icon" href="https://cdn4.iconfinder.com/data/icons/free-colorful-icons/360/messages.png">
	<style>
h1{
	color:#3c1b1b;
	text-shadow: 0 1px 0 #ccc,
				 0 2px 0 #c9c9c9,
				 0 3px 0 #bbb,
				 0 4px 0 #b9b9b9,
				 0 5px 0 #aaa,
				 0 6px 1px rgba(0,0,0,.1),
				 0 0 5px rgba(0,0,0,.1),
				 0 1px 3px rgba(0,0,0,.3),
				 0 3px 5px rgba(0,0,0,.2),
				 0 5px 10px rgba(0,0,0,.25),
				 0 10px 10px rgba(0,0,0,.2),
				 0 20px 20px rgba(0,0,0,.15);
}
body{
	margin: 150px;
    padding: 0;
	background-color: #e8f1f9;
	background-size: auto, cover;
	font-family: Courgette;
}

.container{ 
  font-size: 30px;
  margin:0 auto;
  text-align: center;
}
.button{
	text-decoration: none;
	background-color: rgb(244, 67, 54);
    color: white;
	width: 20%;
    padding: 14px 25px;
	margin: 15px 5px;
    text-align: center;
    display: inline-block;
	cursor: pointer;
	border-radius: 3px;
}
.button:hover, .button:focus , .button:active {
    background-color: #ff0000;
}
	</style>
	</head>
    
    <body>
        
        <div class="container">
            <h1>The Messenger </h1>
            <a href="login.php" class="button">login</a>
        </div>
        <div class="container">
            <a href="register.php" class="button">register</a>
        </div>    
    </body>
</html>    