<?php

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if(!isset($_POST['product_id']) || empty($_POST['product_id']))
{
    die("You must enter product ID");
}

if(!isset($_POST['quantity']) || empty($_POST['quantity']))
{
    die("You must enter product quantity");
}

require_once "model/database.php";

$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];
$userId = $_SESSION['user_id'];

$result = $database->query("SELECT price FROM products WHERE id=$productId");

$row = $result->fetch_assoc();
$price =$row['price'];
$price = $price * $quantity;

$database->query("INSERT INTO orders (product_id, user_id, price, quantity) VALUES ($productId, $userId, $price, $quantity)");

