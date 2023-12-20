<?php
session_start();
require_once('connexion.php');
require_once('fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $result = registerUser($user_name, $email, $password);

    if ($result['success']) {
        // Successful registration
        $_SESSION['user_name'] = $user_name;
        header('Location: index.php'); // Redirect to the index or another page
        exit();
    } else {
        // Failed registration
        $_SESSION['signup_error'] = $result['message'];
        header('Location: signup.php'); // Redirect back to signup page
        exit();
    }
} else {
    header('Location: signup.php'); // Redirect back to signup page if accessed directly
    exit();
}
