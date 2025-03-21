<?php

if(!isset($_GET['email']) || empty($_GET['email']))
{
    die("You must enter the email of user!");
}

require_once "database.php";

$email = $_GET['email'];

$result = $database->query("SELECT * FROM users WHERE email LIKE '%$email%'");

if($result->num_rows>=1)
{
    echo "We have found ".$result->num_rows." user/users";
}
else
{
    echo "We haven't found any user under this name";
}