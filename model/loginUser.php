<?php

if (!isset($_POST['email']) || empty($_POST['email']))
{
    die ("You are missing an email!");
}

if (!isset($_POST['password']) || empty($_POST['password']))
{
    die ("You are missing the password!");
}

require_once "database.php";

$email = $_POST['email'];
$password = $_POST['password'];

$result = $database->query("SELECT * FROM users WHERE email ='$email' ");

if($result->num_rows==1)
{
    $user = $result->fetch_assoc(); //znaci ako user postoji u bazi dace nam num_rows==1, i mi sa fetch_assoc() uzimamo njegove podatke
    $verifiedPassword = password_verify($password, $user['password']);//poredimo sifru unetu u formi sa onom iz baze koje je hasovana

    if($verifiedPassword)
    {
        echo "You have successfuly logged in, welcome back!";
    }
    else
    {
        echo "Password is not correct!";
    }
}
else
{
    echo "This user does not exist!";
}

