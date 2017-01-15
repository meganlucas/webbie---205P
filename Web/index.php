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
<p align="center">Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is a secure area.</p>

<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a></br></br></br>This is your profile icon:</P></br>
<?php $sel_query="SELECT username, id, profile_icon from users WHERE username='".$username."'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
  <img align="center" height="120" width="120" src="<?php echo $row["profile_icon"];
  ?>"></img>
  <?php
}?>
<div id="table" align="center">
<table class="table2" width="30%" border="0" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Username</strong></th>
<th><strong>Snippet</strong></th>
<th><strong>See more:</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT submittedby, id, name FROM new_record WHERE id IN (SELECT MAX(id) FROM new_record GROUP BY submittedby)";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
	$id = $row["submittedby"];
	?>
<tr text-align="center"><td align="center"><?php echo $row["submittedby"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo "<a href='user.php?user=$id'>View all of ". $id ."'s Snippets</a><br>"?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<?php ?>
<br /><p></p>
<br />
</br>
<a href="viewimages.php">View All Images</a>
<br /><br />

</div>
</body>
</html>
