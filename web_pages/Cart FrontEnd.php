<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

        .cart-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
        }

        h2 {
            color: #3498db;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .item-info {
            flex-grow: 1;
            text-align: left;
            margin-right: 50px;
        }

        .item-price,
        .remove-button {
            margin-left: 20px;
        }

        .quantity-select {
            width: 30px;
        }

        .total-container {
            margin-top: 20px;
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

        .checkout-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h2>Your Shopping Cart</h2>
        <ul id="cart-list">
            <!-- Cart items will be dynamically added here -->
        </ul>

        <div class="total-container">
            <p>Total: $<span id="total">0.00</span></p>
            <button class="checkout-button" onclick="proceedToCheckout()">Proceed to Checkout</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cartList = document.getElementById("cart-list");
            const totalSpan = document.getElementById("total");

            // Sample items
            const items = [
                { name: "Product 1", price: 10, quantity: 1 },
                { name: "Product 2", price: 20, quantity: 2 },
                { name: "Product 3", price: 15, quantity: 1 },
            ];

            let cart = [];

            // Render cart items
            function renderCart() {
                cartList.innerHTML = "";
                let total = 0;

                cart.forEach((item, index) => {
                    const listItem = document.createElement("li");
                    listItem.innerHTML = `
                        <div class="item-info">
                            <strong>${item.name}</strong><br>
                            $${item.price.toFixed(2)}
                        </div>
                        <input class="quantity-select" type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
                        <span class="item-price">$${(item.price * item.quantity).toFixed(2)}</span>
                        <button class="remove-button" onclick="removeItem(${index})">Remove</button>
                    `;
                    cartList.appendChild(listItem);

                    total += item.price * item.quantity;
                });

                totalSpan.textContent = total.toFixed(2);
            }

            // Add item to cart
            function addToCart(item) {
                cart.push(item);
                renderCart();
            }

            // Remove item from cart
            function removeItem(index) {
                cart.splice(index, 1);
                renderCart();
            }

            // Update quantity
            function updateQuantity(index, newQuantity) {
                cart[index].quantity = parseInt(newQuantity, 10);
                renderCart();
            }

            // Simulate adding items to the cart
            items.forEach((item) => addToCart(item));
        });

        // Checkout function
        function proceedToCheckout() {
            window.location.href = "checkout.html";
        }
    </script>
</body>
</html>

