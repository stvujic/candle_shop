<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

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
        <?php else: ?>
            <li><a href="login.php" class="btn login-btn">Login</a></li>
            <li><a href="registration.php" class="btn register-btn">Registration</a></li>
        <?php endif; ?>
    </ul>
</nav>
