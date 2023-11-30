<?php
include ('function/config.php');

// Check if the user is logged in
if (!isLoggedIn()) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit;
}

// Get the user ID
$user_id = getUserId();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard, User <?php echo $user_id; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>
