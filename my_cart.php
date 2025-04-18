<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedIn'])) {
    die("You must log in to see this page");
}

require_once "model/database.php";

$userId = $_SESSION['user_id'];

$result = $database->query("SELECT orders.quantity, orders.price, products.name FROM orders
INNER JOIN products ON products.id = orders.product_id
WHERE orders.user_id = $userId");

$orders = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <?php require_once "navigation/navbar.php"; ?>

    <div class="cart-container">
        <h1>My Cart</h1>

        <?php if ($result->num_rows == 0) : ?>
            <h2 class="empty-cart">Your Cart Is Empty</h2>
        <?php else : ?>
            <div class="cart-items">
                <?php foreach ($orders as $order) : ?>
                    <div class="cart-item">
                        <p><strong>Product:</strong> <?= $order['name'] ?></p>
                        <p><strong>Quantity:</strong> <?= $order['quantity'] ?></p>
                        <p><strong>Price:</strong> <?= $order['price'] ?> &euro;</p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
