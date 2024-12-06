<?php
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Seller Homepage</title>
</head>
<body>
    <header>
        <h1>Welcome to the Seller Dashboard</h1>
    </header>

    <nav>
        <a href="#">View Products</a>
        <a href="#">Add Product</a>
        <a href="#">Orders</a>
        <a href="#">Account Settings</a>
    </nav>

    <div class="container">
        <div class="section">
            <h3>Recent Orders</h3>
            <ul>
                <li>Order #12345 - Status: Pending</li>
                <li>Order #12344 - Status: Shipped</li>
                <li>Order #12343 - Status: Delivered</li>
            </ul>
        </div>

        <div class="section">
            <h3>Low Stock Products</h3>
            <ul>
                <li>Product A - Only 2 left in stock</li>
                <li>Product B - Only 5 left in stock</li>
                <li>Product C - Out of stock!</li>
            </ul>
        </div>

        <div class="section">
            <h3>Notifications</h3>
            <ul>
                <li>New message from Buyer123</li>
                <li>Your payout of $500 has been processed.</li>
                <li>System update scheduled for tomorrow at 3 PM.</li>
            </ul>
        </div>
    </div>
</body>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        nav {
            text-align: center;
            margin: 20px 0;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
        }
        .section ul {
            list-style: none;
            padding: 0;
        }
        .section ul li {
            background: white;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>

</html>
