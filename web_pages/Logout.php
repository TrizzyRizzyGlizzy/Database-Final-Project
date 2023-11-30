<?php
include 'config.php';

// Log out the user
logout();

// Redirect to the login page
header('Location: login.php');
exit;
?>
