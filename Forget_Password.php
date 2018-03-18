<HTML>
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
	<body>
		
		  <fieldset>
                      <form action="Forget.php" method="post">
<h2>Forget Password</h2>        
                <INPUT type="email" name="email" size="40" placeholder="E-mail Address" autocomplete="off"><BR />
                <input style="margin-left:200px" type="Submit" name="button" class="button" value="Submit ">
				<br>
                      </form> 
	         </fieldset>
		
	</body>
</html>