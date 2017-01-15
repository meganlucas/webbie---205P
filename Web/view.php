<?php
require('db.php');
include("auth.php");
$username=  $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="view">
  <div id="table3" align="center"></br></br>
<p><a href="index.php">Home</a>
| <a href="insert.php">Insert New Snippet</a>
| <a href="logout.php">Logout</a></p></br>
<p align="center" class="viewsnip"><strong>View All of Your Snippets:</strong></p>
<table align="center" class="table2" width="25%" border="0" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Username</strong></th>
<th><strong>Snippet</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT submittedby, name, id from new_record WHERE submittedby='".$username."'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo sanitiseInput($row["submittedby"]); ?></td>
<td align="center"><?php echo sanitiseInput($row["name"]); ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</div>
</body>
</html>
