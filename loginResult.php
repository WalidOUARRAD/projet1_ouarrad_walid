<?php
session_start();
require_once('connexion.php');
require_once('fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['pwd'];

    if (loginUser($user_name, $password)) {
        // Successful login
        $_SESSION['user_name'] = $user_name;
        header('Location: index.php'); // Redirect to the index or another page
        exit();
    } else {
        // Failed login
        $_SESSION['login_error'] = 'Invalid username or password';
        header('Location: login.php'); // Redirect back to login page
        exit();
    }
} else {
    header('Location: login.php'); // Redirect back to login page if accessed directly
    exit();
}
