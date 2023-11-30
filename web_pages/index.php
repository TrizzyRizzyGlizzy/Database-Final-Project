<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1>Welcome to Your Website</h1>
            <p>Discover amazing features and products.</p>
            <a href="#features" class="btn btn-primary btn-lg">Explore More</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Feature 1</h2>
                    <p>Description of Feature 1.</p>
                </div>
                <div class="col-md-4">
                    <h2>Feature 2</h2>
                    <p>Description of Feature 2.</p>
                </div>
                <div class="col-md-4">
                    <h2>Feature 3</h2>
                    <p>Description of Feature 3.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2023 Your Website. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
