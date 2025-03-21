<?php

if(!isset($_POST['name']) || empty($_POST['name']))
{
    die ("You didn't enter the name");
}

if(!isset($_POST['description']) || empty($_POST['description']))
{
    die("You didn't enter a description");
}

if(!isset($_POST['price']) || empty($_POST['price']))
{
    die("You didn't enter the price");
}

if(!isset($_POST['image']) || empty($_POST['image']))
{
    die("You didn't add a product image!");
}

if(!isset($_POST['quantity']) || empty($_POST['quantity']))
{
    die("You didn't enter the product quantity");
}

require_once "database.php";

$name = mysqli_real_escape_string($database, $_POST['name']);
$description = mysqli_real_escape_string($database, $_POST['description']);
$price = mysqli_real_escape_string($database, $_POST['price']);
$image = mysqli_real_escape_string($database, $_POST['image']);
$quantity = mysqli_real_escape_string($database, $_POST['quantity']);

$q = "INSERT INTO products (name,description,price,image,quantity) VALUES ('$name','$description',$price,'$image', $quantity)"; 

$database->query($q);

echo "You have sucessfuly added a new product to the list";