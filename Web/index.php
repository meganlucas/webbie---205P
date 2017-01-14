<?php
//include auth.php file on all secure pages
include("auth.php");

require('db.php');
$username=  $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="home">
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is a secure area.</p>

<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a></br></br>
<?php $sel_query="SELECT username, id, profile_icon from users WHERE username='".$username."'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
  <img height="120" width="120" src="<?php echo $row["profile_icon"];
  ?>"></img>
  <?php
}?>
<br /><p></p>
<br />
</br>
<a href="viewimages.php">View All Images</a>
<form action="uploadimage.php" method="post" enctype="multipart/form-data">
    Select image to upload:
  </br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<br /><br />

</div>
</body>
</html>
