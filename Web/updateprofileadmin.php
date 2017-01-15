<?php
require('db.php');
require("auth.php");
require("security.php");

if (isset($_POST['submit']) && $_POST['submit'] == 'Change') {

    $query = "UPDATE `register`.`users` SET ";

    $name = sanitiseInput($_GET['name']);
    $icon = sanitiseInput($_POST['icon']);
    $password = md5(sanitiseInput($_POST['password']);
    $username = sanitiseInput($_POST['username']);

    if ($icon != "") {
        $query = $query."`profile_icon`='". $icon."',";
    }



    // may need to variables
    // $query = "UPDATE `hello`.`users` SET `email`='". mysqli_real_escape_string($conn, $_POST['email']) ."', `username`='". mysqli_real_escape_string($conn, $_POST['username']) . "', `password`='". md5($_POST['password']) . "' WHERE `email`='hello@gmail.com';";
    // $query = "UPDATE `register`.`Users` SET `email`='". $email."', `profile_icon`='". $icon."', `homepage`='". $home."', `password`='". $password . "' WHERE `username`='". $_SESSION['username']."';";
     $query = "UPDATE `register`.`users` SET username=IF(LENGTH('$username')=0, username, '$username'), profile_icon=IF(LENGTH('$icon')=0, profile_icon, '$icon'), password=IF(LENGTH('$password')=0, password, '$password') WHERE username='$name';";

    //echo $query;

    $retval = mysqli_query($con, $query);


    if (!$retval) {
        echo "Failed to update.";
    } else {
        echo "successful change. <br> redirecting to admin dashboard...";
        //$_SESSION['id'] = mysqli_insert_id($conn);

        // Send user to landing page
        header("Location: admindashboard.php");
        exit;
    }



}

?>

<link rel="stylesheet" href="css/style.css" />

<form class="form4" method="post">
    <input type="username" name="username" id="username" placeholder="new username"/>
    <input type="password" name="password" id="password" placeholder="new password"/>
    <input type="text" name="icon" id="icon" placeholder="URL of profile image"/>
    <input type="submit" name="submit" value="Change">
</form>
