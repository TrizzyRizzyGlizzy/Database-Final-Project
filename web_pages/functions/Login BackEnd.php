<?php
session_start();

// Establish a connection to the database
$servername = "localhost";
$username = "Username";
$password = "PasswordHash";
$dbname = "tmk_store";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

 // Verify the entered password against the hashed password
    if (password_verify($password, $hashed_password)) {
        // Login successful
        if ($admin_access == 1) {
            // User has admin access
            echo "Admin login successful!";
        } else {
            // User does not have admin access
            echo "User login successful!";
        }
    } else {
        // Login failed
        echo "Invalid username or password";
    }
}


$conn->close();
?>
