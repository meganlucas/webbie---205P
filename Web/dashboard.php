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
</br>
<div class="form" align="center">
<p><strong>Welcome to the Dashboard</strong></p></br>
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
$row2 = mysqli_fetch_assoc($result);
if($row2["admin"] == 1){ ?>
<p><a href="admindashboard.php">Admin Dashboard</a></p>
<?php  }
?>
</div>
</body>
</html>
