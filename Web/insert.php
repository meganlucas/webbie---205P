<?php
require('db.php');
require("security.php");
require("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $name = sanitiseInput($_REQUEST['name']);
    $name = sanitiseQuery($con, $name);
    $submittedby = sanitiseInput($_SESSION["username"]);
    $submittedby = sanitiseQuery($con, $submittedby);
    $ins_query= "insert into new_record
    (`trn_date`,`name`,`submittedby`)values
    ('$trn_date','$name','$submittedby')";
    mysqli_query($con,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
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
<p><input type="text" name="name" placeholder="Enter Snippet" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>