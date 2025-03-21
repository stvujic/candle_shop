<?php
    require_once "model/database.php";
    $result = $database->query("SELECT * FROM products");
    $products = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php foreach($products as $product): ?>
            <div>
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