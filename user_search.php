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
    <title>User Search</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once "navigation/navbar.php"; ?>

    <div class="search-container">
        <h2 class="search-title">Find a User</h2>
        <form action="model/searchUser.php" method="get" class="search-form">
            <input type="text" name="email" placeholder="Enter user email" class="search-input" required>
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

</body>

</html>