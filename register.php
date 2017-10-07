<!DOCTYPE html>
  <html lang="en">
  <?php require_once("connection.php"); ?>
  <head>
  <meta charset="UTF-8"> 
 <title> SIGN UP</title>
<link href="css/styles.css" media="screen" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
  </head>
  <body>
<div class="containers mregister">
<div id="login">
 <h1>SIGN UP</h1>
<form id="registerform" method="post" name="registerform">


<input class="input" id="username" name="username"  type="text" value="" placeholder="User name"></p>
 



<input class="input" id="email" name="email"  type="email" value="" placeholder="E-mail"></p>


<input class="input" id="password" name="password"   type="password" value="" placeholder="Password"></p>

<input class="input" id="passwordretype" name="passwordretype"   type="password" value="" placeholder="Retype Password"></p>
<p class="submit">
<button class="button" id="register"  name= "register">SIGN ME UP</button></p>

<div class="error-box"></div>
 </form>
</div>
</div>

</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</html>