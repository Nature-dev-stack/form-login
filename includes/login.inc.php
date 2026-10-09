<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // grabbing the input values
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // include all necessary files
    include_once 'db.inc.php';
    include_once 'functions.inc.php';

    if (emptyLoginFields($email, $password) === true) {
        header("Location: ../login.php?error=fill in all fields");
        exit();
    }

    // check if the email is valid
    $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    // login user
    if ($isEmail) {
        loginUser($connection, $email, $password);
    } else {
        header("Location: ../login.php?error=Invalid email");
        exit();
    }
} else {
    header("Location: ../login.php?error=Unauthorized Access");
    exit();
}
