<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Item</title>
    <style>
        /* Your CSS styling goes here */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        main {
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        .product-details {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            margin-bottom: 20px;
        }

        .purchase-form {
            flex: 1;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .quantity-selector {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .purchase-button {
            width: 100%;
            padding: 15px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Purchase Item</h1>
    </header>

    <main>
        <div class="product-details" id="productDetails">
            <!-- Product details will be dynamically loaded here using AJAX -->
        </div>

        <form class="purchase-form">
            <label for="quantity" class="quantity-selector">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" class="quantity-selector">

            <button type="button" onclick="purchaseItem()" class="purchase-button">Purchase Now</button>
        </form>
    </main>

    <footer>
        &copy;Your TMK E-commerce Store
    </footer>

    <script>
        // Your JavaScript code goes here
        function purchaseItem() {
            // Fetch product details using AJAX
            var productId = 1;  // Replace with the actual product ID

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("productDetails").innerHTML = xhr.responseText;
                }
            };

            xhr.open("GET", "backend.php?id=" + productId, true);
            xhr.send();
        }
    </script>
</body>
</html>
