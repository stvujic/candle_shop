<?php
    require_once "model/functions.php";

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
    <title>Creating New Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php require_once "navigation/navbar.php"; ?>

    <div class="form-container">
        <h2 class="form-title">Create New Product</h2>
        <form action="model/createProduct.php" method="POST" class="product-form">
            <input type="text" name="name" placeholder="Enter product name" class="form-input">
            <input type="text" name="description" placeholder="Enter product description" class="form-input">
            <input type="text" name="price" placeholder="Enter product price" class="form-input">
            <input type="text" name="image" placeholder="Enter product image URL" class="form-input">
            <input type="text" name="quantity" placeholder="Enter quantity of product" class="form-input">
            <button class="form-button">Add Product</button>
        </form>
    </div>

</body>
</html>
