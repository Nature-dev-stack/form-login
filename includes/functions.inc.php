<?php

session_start();

// check for empty fields
function emptyInputField($fullName, $email, $password, $password_confirmation)
{
    if (empty($fullName) || empty($email) || empty($password) || empty($password_confirmation)) {
        return true;
    } else {
        return false;
    }
}

// && || true && false = false - true || false = true // false || false || false || false = false

// validating full name
function invalidFullName($fullName)
{
    if (strlen($fullName) <  5) {
        return true;
    } else {
        return false;
    }
}

// validates email 
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// validate password
function invalidPassword($password)
{
    if (strlen($password) < 8) {
        return true;
    }

    if (!preg_match('/[A-Z]/', $password)) {
        return true;
    }

    if (!preg_match('/[a-z]/', $password)) {
        return true;
    }

    if (!preg_match('/[0-9]/', $password)) {
        return true;
    }

    if (!preg_match('/[\W]/', $password)) {
        return true;
    }

    return false;
}

function umatchedPassword($password, $password_confirmation)
{
    if ($password !== $password_confirmation) {
        return true;
    } else {
        return false;
    }
}

function userExists($conn, $email)
{
    // sql command/code to search for email
    $sql = "SELECT * FROM users WHERE email = ?";

    // initialize the prepared statement
    $statement = mysqli_stmt_init($conn);

    // if the statement was not prepared
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header('Location: ../registration.php?error=Failed!!!');
        exit();
    }

    // bind the parameters/data
    mysqli_stmt_bind_param($statement, 's', $email);

    // execute the code
    mysqli_stmt_execute($statement);

    // get the result of the statement
    $result = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($result)) {
        return true;
    } else {
        return false;
    }
}

// REGISTER USER
function registerUser($conn, $fullName, $email, $password)
{
    // sql command that stores data into the database.
    $sql = "INSERT INTO users(fullName, email, password) VALUES (?,?,?)";

    // initialize the prepared statement
    $statement = mysqli_stmt_init($conn);

    // if the statement was not prepared
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header('Location: ../registration.php?error=Failed!!!');
        exit();
    }

    // hashing passwotd
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // bind the parameters/data
    mysqli_stmt_bind_param($statement, 'sss', $fullName, $email,  $hashedPassword);

    // execute the code
    if (mysqli_stmt_execute($statement)) {
        header("Location: ../login.php?success=You have been registered successfully!!");
        exit();
    } else {
        header("Location: ../registration.php?error=Oops!! something went wrong");
        exit();
    }
}

// emptylogin fields

function emptyLoginFields($email, $password)
{
    return empty($email) || empty($password);
}


// login user
function loginUser($connection, $email, $password)
{
    // if($email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    // }

    // intialize statement
    $statement = mysqli_stmt_init($connection);

    // if it was not prepared
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header('Location: ../login.php?error=Failed!!!');
        exit();
    }

    // bind the statement
    mysqli_stmt_bind_param($statement, 's', $email);

    //execute code
    mysqli_stmt_execute($statement);

    // grab result
    $result = mysqli_stmt_get_result($statement);

    // fetching the user data
    if ($row = mysqli_fetch_assoc($result)) {
        $fetchedPassword = $row['password'];

        $validatedPassword = password_verify($password, $fetchedPassword);

        if ($validatedPassword) {
            // storing user data in the a session
            $_SESSION['id'] = $row['id'];
            $_SESSION["fullName"] = $row["fullname"];
            $_SESSION['email'] = $row['email'];
            $_SESSION["created_at"] = $row["created_at"];

            header("Location: ../dashboard.php");
            exit();
        } else {
            header("Location: ../login.php?error=Invalid Email or Password");
            exit();
        }
    } else {
        header("Location: ../login.php?error=Unauthorized access");
        exit();
    }
}

// login out user
function logoutUser()
{
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../login.php?success=logged out successfully!!");
    exit();
};
