<?php

session_start();

// checking if the request method is a post method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // grab the form data
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirmation = htmlspecialchars($_POST['password_confirmation']);


    // echo $fullName . $password . $email . $password_confirmation;

    // include all necessary files
    include_once 'db.inc.php';
    include_once 'functions.inc.php';

    // make sure the form is not empty
    if (emptyInputField($fullName, $email, $password, $password_confirmation) === true) {
        header("Location: ../registration.php?error=Fill all inputs");
        exit();
    }

    // make sure the fullName is validated
    if (invalidFullName($fullName) === true) {
        header("Location: ../registration.php?error=Fullname must not be less than 5 characters.");
        exit();
    }

    // make sure the email is validated 
    if (invalidEmail($email) === true) {
        header("Location: ../registration.php?error=Email is invalid");
        exit();
    }

    // make sure the password is validated
    if (invalidPassword($password) === true) {
        header("Location: ../registration.php?error=Password must be at least 8 characters long, have a special character and uppercase letter.");
        exit();
    }

    // if passwords do not matche
    if (umatchedPassword($password, $password_confirmation) === true) {
        header("Location: ../registration.php?error=Passwords do not match.");
        exit();
    }

    // check if user exists
    if(userExists($connection, $email) === true) {
       header("Location: ../registration.php?error=User already exits.");
        exit();
    }

    // if all the conditions above were false, register user
    registerUser($connection, $fullName, $email, $password);
} else {
     header("Location: ../registration.php?error=Unauthorized access.");
        exit();
}