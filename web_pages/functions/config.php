<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tmk_estore');

// Create a connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // Start the session

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to get the user ID if logged in
function getUserId() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

// Function to log in a user
function login($user_id) {
    $_SESSION['user_id'] = $user_id;
}

// Function to log out a user
function logout() {
    session_unset();
    session_destroy();
}

function getUsername($user_id) {
    global $conn;

    $sql = "SELECT Username FROM users WHERE UserID = '$user_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Username'];
    }

    return null;
}
?>
