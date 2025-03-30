<?php

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if(!isset($_SESSION['loggedIn']))
{
    die ("You must log in to see this page");
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
    </head>

    <body>
        <h1>My Cart:</h1>
        <?php if($result->num_rows==0):  ?>
            <h2>Your Cart Is Empty</h2>

        <?php else: ?>
            
            <?php foreach($orders as $order):  ?>
                <div>
                    <p>Product: <?= $order['name'] ?> </p>
                    <p>Quantity: <?= $order['quantity'] ?> </p>
                    <p>Price: <?= $order['price'] ?> &euro;</p>
                </div>
            <?php endforeach;  ?>

        <?php endif; ?>

    </body>
</html>