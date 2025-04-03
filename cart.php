<?php

require_once "model/functions.php";

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

validateInput(['product_id', 'quantity'], $_POST);

require_once "model/database.php";

$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];
$userId = $_SESSION['user_id'];

$result = $database->query("SELECT price FROM products WHERE id=$productId");

$row = $result->fetch_assoc();
$price =$row['price'];
$price = $price * $quantity;

$database->query("INSERT INTO orders (product_id, user_id, price, quantity) VALUES ($productId, $userId, $price, $quantity)");

header("Location: my_cart.php");