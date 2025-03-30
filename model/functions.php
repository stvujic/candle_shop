<?php
require_once "database.php";

/**
 * Provera da li su uneti svi neophodni podaci:
 * $fields je spisak obaveznih polja.
 * $source (ovde $_POST) je niz koji sadrži stvarne podatke koje korisnik unosi.
 */
function validateInput($fields, $source) {
    foreach ($fields as $field) {
        if (!isset($source[$field]) || empty(trim($source[$field]))) {
            die("You must enter " . $field . "!");
        }
    }
}

/**
 * Sanitizacija korisničkih podataka pre unosa u bazu
 */
function sanitizeInput($database, $data) {
    $cleanData = [];
    foreach ($data as $key => $value) {
        $cleanData[$key] = mysqli_real_escape_string($database, trim($value));
    }
    return $cleanData;
}

/**
 * Ubacivanje proizvoda u bazu
 */
function insertProduct($database, $name, $description, $price, $image, $quantity) {
    $query = "INSERT INTO products (name, description, price, image, quantity) 
              VALUES ('$name', '$description', $price, '$image', $quantity)";
    
    if ($database->query($query)) {
        echo "You have successfully added a new product to the list.";
    } else {
        echo "Error: " . $database->error;
    }
}

/**
 * Provera korisničkih podataka prilikom logina
 */
function loginUser($database, $email, $password) {
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $database->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['loggedIn'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: ../index.php");
            exit();
        } else {
            echo "Password is not correct!";
        }
    } else {
        echo "This user does not exist!";
    }
}

/**
 * Registracija korisnika
 */
function registerUser($database, $email, $password) {
    // Provera da li korisnik već postoji
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $database->query($query);

    if ($result->num_rows >= 1) {
        die("User with this email already exists! Register with another email!");
    }

    // Hash password-a
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Ubacivanje korisnika u bazu
    $query = "INSERT INTO users(email, password) VALUES ('$email', '$hashedPassword')";
    if ($database->query($query)) {
        echo "You are successfully registered!";
    } else {
        echo "Error: " . $database->error;
    }
}

/**
 * Pretraga korisnika po emailu
 */
function searchUser($database, $email) {
    $query = "SELECT * FROM users WHERE email LIKE '%$email%'";
    $result = $database->query($query);

    if ($result->num_rows >= 1) {
        echo "We have found " . $result->num_rows . " user/users";
    } else {
        echo "We haven't found any user under this name";
    }
}
