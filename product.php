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
        
    </body>
</html>