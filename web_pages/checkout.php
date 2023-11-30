<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .checkout-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
        }

        h2 {
            color: #3498db;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #217dbb;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <form id="checkoutForm" onsubmit="return confirmPurchase()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="creditCard">Credit Card Number:</label>
            <input type="text" id="creditCard" name="creditCard" required>

            <label for="pin">PIN:</label>
            <input type="password" id="pin" name="pin" required>

            <button type="submit">Place Order</button>
        </form>
    </div>

    <script>
        function confirmPurchase() {
            // Display a confirmation prompt
            const isConfirmed = window.confirm("Are you sure you want to proceed with the purchase?");
            
            // If confirmed, submit the form
            return isConfirmed;
        }
    </script>
</body>
</html>
