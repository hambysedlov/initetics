<?php require_once("connection.php"); ?>

<?php
	if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordretype'])) {
  $username= htmlspecialchars($_POST['username']);
	$email=htmlspecialchars($_POST['email']);
 $password=htmlspecialchars($_POST['password']);
 $passwordretype=htmlspecialchars($_POST['passwordretype']);
  $query1=mysql_query("SELECT * FROM usertbl WHERE email='".$email."'");
 $query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
  $numrows=mysql_num_rows($query);
  $numrowsemail=mysql_num_rows($query1);
  if($numrowsemail==0){
if($numrows==0)
   {
 $password = md5(md5(trim($_POST['password'])));

	$sql="INSERT INTO usertbl
  (email,username,password)
	VALUES('$email','$username', '$password')";
  $result=mysql_query($sql);

 if($result){
 	echo 1;
 	session_start();
 	$_SESSION['session_email']=$email;	 
 	$_SESSION['name']=$username;
	
} else {
 echo "Failed to insert data information!";
  }
	} else {
	echo "That username already exists! Please try another one!";
   }
}
else{
		echo  "That email already exists! Please try another one!";
}
	} 
	
	?>
