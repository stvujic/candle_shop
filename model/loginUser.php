<?php

require_once "functions.php";

validateInput(['email', 'password'], $_POST);

require_once "database.php";

$_POST = sanitizeInput($database, $_POST);

loginUser($database, $_POST['email'], $_POST['password']);
