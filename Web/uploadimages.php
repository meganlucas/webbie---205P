<?php
require('token.php');

if (isset($_POST['fileToUpload'], $_POST['token'])) {
	$password = $_POST['fileToUpload'];

	if(!empty($fileToUpload)) {
		if(Token::check($_POST['token'])) {
		}
	}
	$token = new Token();
}
?>

<html>
<head>
<meta charset="utf-8">
<title>Upload Images</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<br />
</br>
<body>
  <div class="ting" align="center">
<p>You can upload images here!</p>
<a href="viewimages.php">View All Images</a>
</br>
</br>
<form action="uploadimage.php" method="post" enctype="multipart/form-data">
    Select image to upload:
  </br></br>
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload Image" name="submit">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
</form>
<br /><br />
</div>>
</body>
</html>
