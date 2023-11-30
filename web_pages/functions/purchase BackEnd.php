<?php
$servername = "localhost";
$username = "username";
$password = "PassworHash";
$dbname = "tmk_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productId = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $productId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<img class="product-image" src="' . $row["image_path"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h2>' . $row["product_name"] . '</h2>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<p>Price: $' . $row["price"] . '</p>';
        echo '<p>Available Quantity: ' . $row["quantity"] . '</p>';
        echo '</div>';
    }
} else {
    echo "Product not found.";
}

$conn->close();
?>