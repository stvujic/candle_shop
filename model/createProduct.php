<?php

require_once "functions.php";

//funkcija za validaciju inputa
validateInput(['name', 'description', 'price', 'image', 'quantity'], $_POST);

require_once "database.php";

// Eskejpovanje podataka
$_POST = sanitizeInput($database, $_POST);

insertProduct($database, $_POST['name'], $_POST['description'], $_POST['price'], $_POST['image'], $_POST['quantity']);
