<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>CinemaShop</title>
<link href="styles.css" type="text/css" rel="stylesheet" />
<!-- Aidan ODonnell and Taylor McLaughlin-->
</head>
<body>
<?php
    session_start();
?>
<h3>Register</h3>
<form action="controller.php" method="post">
<div class="loginContainer">
<div class="labels">Username&nbsp;</div>
<div class="fields">
<input type="text" id="username" name="username" required>
</div>
<div class="labels">Password&nbsp;</div>
<div class="fields">
<input type="password" id="password" name="password" required>
</div>
<div class="fields">
<input type="submit" name="register" value="Register"><br>
<?php
    if(isset($_SESSION ['registrationError']) {
        echo $_SESSION ['registrationError'];
        unset($_SESSION ['registrationError']);
}
?>