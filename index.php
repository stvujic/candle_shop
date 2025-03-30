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
    <title>Candle Shop</title>
    
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
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact</a></li>
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

    <div class="about-section" id="about">
        <img src="images/img_about_us.jpg" alt="About Us Image">
        <div class="about-text">
            <h2>About Candle Shop</h2>
            <p>Welcome to Candle Shop – your destination for handcrafted, aromatic candles.  
            Our journey began with a passion for creating unique, eco-friendly candles that fill your home with warmth and serenity.  
            Each candle is made with love, using only the finest natural ingredients and carefully selected fragrances.  
            Whether you're looking for a calming lavender scent or a rich vanilla aroma, we have something special for you.  
            Experience the magic of Candle Shop and bring light into your life.</p>
        </div>
    </div>

    <!-- Candle Display Section -->
    <div class="candle-display">
        <div class="candle-img">
            <img src="images/img_1.jpg" alt="Candle 1">
        </div>
        <div class="candle-img">
            <img src="images/img_2.jpg" alt="Candle 2">
        </div>
        <div class="candle-img">
            <img src="images/img_3.jpg" alt="Candle 3">
        </div>
        <div class="candle-img">
            <img src="images/img_4.jpg" alt="Candle 4">
        </div>
    </div>
    
    <!-- Contact Form Section -->
    <div class="contact-form" id="contact">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

    <h1 class="map-caption">How to find us?</h1>
    <div class="map-container">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2808.540028869967!2d19.83164637596348!3d45.25709334723381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b1044e406fcbf%3A0x28145a6de9aec9e0!2z0JHRg9C70LXQstCw0YAg0L7RgdC70L7QsdC-0ZLQtdGa0LAgNTQsINCd0L7QstC4INCh0LDQtCAyMTEwMg!5e0!3m2!1ssr!2srs!4v1742911591444!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <footer>
        <p>&copy; 2025 All Rights Reserved | Created by Stefan Vujic</p>
    </footer>

</body>
</html>
