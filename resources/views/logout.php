<?php
//Starts session
session_start();
//Destroys session so user cannot continue to use any features past log in
session_destroy();
//Sends  user back to login page
header('Location: login.php');
exit;
?>