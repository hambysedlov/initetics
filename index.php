<!DOCTYPE html>
	<html lang="en">
	<?php require_once("connection.php"); ?>
	<head>
<meta charset="utf-8">
<title>SIGN IN</title>
<link href="css/styles.css" media="screen" rel="stylesheet">
<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 
<body>
<div class="containers mlogin">
<div id="login">
<h1>SIGN IN</h1>
<form action="index.php" id="loginform" method="post" name="loginform">
<input class="input" id="email" name="email" type="text" placeholder="Email Addres"></label></p>
 <input class="input" id="password" name="password" type="password" value="Password"></label></p> 
 <p class="submit">
<button class="button" id="register" name= "register">Login</button></p>
	
   </form>
 </div>

  </div>
  <div class="containerm">
  <p class="regtext">Dont have an account? <a href= "register.php">Signup</a></p>
</div>

<?php
	session_start();
?>
	<?php
	
	if(isset($_SESSION["session_email"])){
	// вывод "Session is set"; // в целях проверки
	header("Location:page.php");
	}

	if(isset($_POST["email"])){

	if(!empty($_POST['email']) && !empty($_POST['password'])) {
	$email=htmlspecialchars($_POST['email']);
	$query =mysql_query("SELECT username, password, email FROM usertbl WHERE email='".$email."'");
	$data = mysql_fetch_assoc($query);
	if($data!=0)
 {
	 if($data['password'] === md5(md5($_POST['password'])) && $data['email'] == $_POST['email']){   
	           
	$dbemail=$data['email'];
  $dbuser=$data['username'];
	// старое место расположения
	  //session_start();
 /* Перенаправление браузера */
   header("Location:page.php");
    $_SESSION['session_email']=$email;	 
	 $_SESSION['name']=$dbuser;
	}
	else {
	//  $message = "Invalid username or password!";
	
	$message = "Invalid username or password!"; }
	 }
	 else{
	 	$message = "Invalid username or password!";
	 }
	}
	 else {
    $message = "All fields are required!";
	}
	}
?>
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>







</body>
</html>