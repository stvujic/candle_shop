<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Creating New Product</title>
    </head>
    <body>
        <form action="model/createProduct.php" method="POST">
            <input type="text" name="name" placeholder="Enter product name" required>
            <input type="text" name="description" placeholder="Enter product description" required>
            <input type="text" name="price" placeholder="Enter product price" required>
            <input type="text" name="image" placeholder="Enter product image" required>
            <input type="text" name="quantity" placeholder="Enter quantity of product" required>
            <button>Add Product</button>
        </form>
    </body>
</html>