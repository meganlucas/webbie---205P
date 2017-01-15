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
require('token.php');

if (isset($_POST['password'], $_POST['username'], $_POST['email'], $_POST['token'])) {
	$password = $_POST['password'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	if(!empty($password) && !empty($username) && !empty($email)) {
		if(Token::check($_POST['token'])) {
		}
	}
	$token = new Token();
}
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$error = "";
	if (!$password) {
			 $error .= "Please enter your password";
	 } else {
			 if (strlen($password) < 8) {
					 $error .= "<br />Please enter a password";
			 }

			 if (!preg_match('`[A-Z]`', $password)) {
					 $error .= "<br />Please include at least one capital letter in your password";
			 }
	 }
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form7' align='center'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
