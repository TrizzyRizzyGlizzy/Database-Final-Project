<?php
include ('functions\\config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user inputs
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Prepare and execute the SQL query using prepared statements
    $stmt = $conn->prepare("SELECT UserID, PasswordHash FROM users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Login successful
            login($user_id);

            // Redirect to the dashboard or home page
            header('Location: index.php');
            exit;
        } else {
            // Invalid password
            $error_message = "Invalid username or password";
        }
    } else {
        // User not found
        $error_message = "Invalid username or password";
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
    <title>Login Page</title>
</head>
<body>
    <section class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">Login</h2>
                            <!-- Your login form goes here -->
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                        <a href="register.php" class="btn btn-secondary">Don't have an account? Register!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
