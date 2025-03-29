<?php

require_once "functions.php";

validateInput(['email'], $_GET);

require_once "database.php";

$_GET = sanitizeInput($database, $_GET);

searchUser($database, $_GET['email']);
