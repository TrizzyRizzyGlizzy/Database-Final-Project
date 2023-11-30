<?php
include('functions/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password']; // You should hash and validate the password securely in a real-world application

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO users (Username, PasswordHash) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    
    if ($stmt->execute()) {
        // Registration successful
        $user_id = $stmt->insert_id;

        // Log in the user
        login($user_id);

        // Redirect to the dashboard or home page
        header('Location: index.php');
        exit;
    } else {
        // Registration failed
        $error_message = "Registration failed. Please try again.";
    }

    // Close the prepared statement
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <section class="registration-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">Registration</h2>
                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php endif; ?>
                            <!-- Your registration form goes here -->
                            <form action="register.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                        <a href="login.php" class="btn btn-secondary">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
