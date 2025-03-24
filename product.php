<?php

if (!isset($_GET['id']) || empty($_GET['id']))
{
    die ("You are missing ID of the product!");
}

require_once "model/database.php";

$productId = $_GET['id'];

$result = $database->query("SELECT * FROM products WHERE id = $productId");

if($result->num_rows == 0 )
{
    die("This product doesn't exist");
}

$product = $result ->fetch_assoc();

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1><?= $product['name'] ?></h1>
        <p><?= $product['description'] ?></p>
        <p>Price:<?= $product['price'] ?></p>
        <p>Quantity:<?= $product['quantity'] ?></p>

        <?php if($product['quantity']==0): ?>
            <p>Out of stock</p>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['loggedIn'])): ?>
            <form action="cart.php" method="POST">
                <input type="number" name="quantity" placeholder="Enter product quantity">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button>Add To Cart</button>
            </form>
        <?php else: ?>
            <a href="login.php">Log in</a>
        <?php endif; ?>

    </body>
</html>