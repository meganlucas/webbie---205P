<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
require("security.php");
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = sanitiseInput($_REQUEST['username']);
	$username = sanitiseQuery($con,$username);
	$email = sanitiseInput($_REQUEST['email']);
	$email = sanitiseQuery($con,$email);
	$password = sanitiseInput($_REQUEST['password']);
	$password = sanitiseQuery($con,$password);
	$error = "";
	if (!$password) {
			 $error .= "Please enter your password";
	 } else {
			 if (strlen($password) < 8) {
					 $error .= "<br />password must be at least 8 characters";
			 }

			 if (!preg_match('`[A-Z]`', $password)) {
					 $error .= "<br />Please include at least one capital letter in your password";
			 }
	 }
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into users (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form7' align='center'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        } else {
        	echo "<div class='form7' align='center'>
<h3>Registration Failed.</h3>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
