<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit;
}

// Database connection (you need to replace these values)
$servername = "localhost";
$username = "username";
$password = "PasswordHash";
$dbname = "tmk_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];

    // Prepare and execute the update query (you need to sanitize inputs)
    $username = $_SESSION["username"];
    $updateQuery = "UPDATE customers SET FirstName='$firstName', LastName='$lastName', Email='$email', PhoneNumber='$phoneNumber', Address='$address' WHERE Username='$username'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "User information updated successfully";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>