<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <?php require_once "navigation/navbar.php"; ?>

    <div class="registration-container">
        <form action="model/registrationUser.php" method="POST" class="registration-form">
            <h2>Register</h2>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>
