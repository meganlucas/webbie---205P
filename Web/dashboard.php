<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form" align="center">
<p>Welcome to the Dashboard</p>
<p><a href="index.php">Home</a><p>
<p><a href="insert.php">Insert Snippet</a></p>
<p><a href="view.php">View Snippets</a><p>
<p><a href="profile.php">Edit Profile</a><p>
<p><a href="logout.php">Logout</a></p>
<p><a href="seticonurl.php">Set Profile Icon URL</a></p>
<p><a href="uploadimages.php">Upload Images</a></p>
<?php
$username=  $_SESSION['username'];
$sel_query="SELECT admin, username, id from users WHERE username='$username'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
  print $row["admin"];
  if($row["admin"] = 1){ ?>
<p><a href="admindashboard.php"></a></p>
<?php  }
}
?>
</div>
</body>
</html>
