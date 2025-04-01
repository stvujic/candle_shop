<?php

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("You are missing ID of the product!");
}

require_once "model/database.php";

$productId = $_GET['id'];

$result = $database->query("SELECT * FROM products WHERE id = $productId");

if ($result->num_rows == 0) {
    die("This product doesn't exist");
}

$product = $result->fetch_assoc();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
        <div class="logo">LOGO</div>
        <ul class="nav-links">
            <li><a href="index.php#about">About Us</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a href="products.php">Shop</a></li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"): ?>
                <li><a href="new_product.php">Add Product</a></li>
                <li><a href="user_search.php">User Search</a></li>     
            <?php endif; ?> 
            
            
            <?php if(isset($_SESSION['loggedIn'])): ?>
                <li><a href="logout.php" class="btn logout-btn">Logout</a></li>
                <li><a href="my_cart.php">Cart</a></li>
            <?php else:  ?>
                <li><a href="login.php" class="btn login-btn">Login</a></li>
                <li><a href="registration.php" class="btn register-btn">Registration</a></li>
            <?php endif;  ?>

        </ul>
    </nav>
    
    <div class="product-container">
        <h1 class="product-title"><?= $product['name'] ?></h1>
        <p class="product-description"><?= $product['description'] ?></p>
        <p class="product-price"><strong>Price:</strong> <?= $product['price'] ?> &euro;</p>
        <p class="product-quantity"><strong>Quantity:</strong> <?= $product['quantity'] ?></p>

        <?php if ($product['quantity'] == 0) : ?>
            <p class="out-of-stock">Out of stock</p>
        <?php endif; ?>

        <?php if (isset($_SESSION['loggedIn'])) : ?>
            <form action="cart.php" method="POST" class="add-to-cart-form">
                <input type="number" name="quantity" placeholder="Enter product quantity" min="1" max="<?= $product['quantity'] ?>">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button class="add-to-cart-button">Add To Cart</button>
            </form>
        <?php else : ?>
            <a href="login.php" class="login-link">Log in if you want to add to cart</a>
        <?php endif; ?>
    </div>
</body>

</html>
