<?php
require('db.php');
require('token.php');
include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $name =$_REQUEST['name'];
    $submittedby = $_SESSION["username"];
    $ins_query="insert into new_record
    (`trn_date`,`name`,`submittedby`)values
    ('$trn_date','$name','$submittedby')";
    mysqli_query($con,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
if (isset($_POST['name'], $_POST['token'])) {
	$name = $_POST['name'];

	if(!empty($name)) {
		if(Token::check($_POST['token'])) {
		}
	}
	$token = new Token();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Snippet</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a>
| <a href="view.php">View Snippets</a>
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Snippet</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
<p><input type="text" name="name" placeholder="Enter Snippet" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
