<?php
    require_once "model/database.php";
    $result = $database->query("SELECT * FROM products");
    $products = $result->fetch_all(MYSQLI_ASSOC);

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
        <title>Shop</title>

        <!-- FontAwesome za ikone -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
        <!-- Ikonica sveće u title baru -->
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'%3E%3Cpath fill='orange' d='M160 0c17.7 0 32 14.3 32 32 0 14.6-10 27-23.8 31-4.8 1.4-7.3 6.5-5.2 11l15.1 32.3c3.9 8.4 6.1 17.6 6.9 26.8 2.1 22.5-5.5 45.2-16.1 65.3h-36.8c-10.6-20.1-18.2-42.8-16.1-65.3 .8-9.2 3-18.4 6.9-26.8l15.1-32.3c2.1-4.5-.4-9.6-5.2-11C138 59 128 46.6 128 32c0-17.7 14.3-32 32-32zM88 256h144c39.8 0 72 32.2 72 72 0 26.3-14.3 49.2-35.6 62.2 4.9 9.3 8.6 19.8 10.6 30.8 2.4 13.5 3 27.5 2.1 40.5H48.9c-.9-13 0-27 2.1-40.5 2-11 5.7-21.5 10.6-30.8C30.3 377.2 16 354.3 16 328c0-39.8 32.2-72 72-72zm8 144h128c4.4 0 8 3.6 8 8v96c0 4.4-3.6 8-8 8H96c-4.4 0-8-3.6-8-8v-96c0-4.4 3.6-8 8-8z'/%3E%3C/svg%3E">
        
        <link rel="stylesheet" href="css/style.css"> 
    </head>

    <body>
    <nav>
        <div class="logo">LOGO</div>
        <ul class="nav-links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="products.php">Shop</a></li>
            <li><a href="#">Add Product</a></li>
            
            <?php if(isset($_SESSION['loggedIn'])): ?>
                <li><a href="logout.php" class="btn logout-btn">Logout</a></li>
                <li><a href="my_cart.php">Cart</a></li>
            <?php else:  ?>
                <li><a href="login.php" class="btn login-btn">Login</a></li>
                <li><a href="registration.php" class="btn register-btn">Registration</a></li>
            <?php endif;  ?>

        </ul>
    </nav>
        <h1 class="list-caption">LIST OF OUR CANDLES:</h1>
        <?php foreach($products as $product): ?>
            <div class="single-product">
                <h1><?= $product['name'] ?></h1>
                <p><?= $product['description'] ?></p>
                <p>Price:<?= $product['price'] ?> &euro;</p>
                <p>Quantity:<?= $product['quantity'] ?></p>

                <?php if($product['quantity']==0): ?>
                    <p>Out of stock</p>
                <?php endif; ?>

                <a href="product.php?id=<?= $product['id'] ?>">More information</a>
            </div>
        <?php endforeach; ?>
    </body>

</html>