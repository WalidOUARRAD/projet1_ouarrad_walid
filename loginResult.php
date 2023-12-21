<?php
session_start();
require_once('fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['pwd'];

    $loginResult = loginUser($user_name, $password);

    if ($loginResult['success']) {
        $_SESSION['user_name'] = $user_name;
        
        $role = $loginResult['role'];
        switch ($role) {
            case 'superadmin':
                header('Location: index1.php');
                break;
            case 'admin':
                header('Location: home.php');
                break;
            case 'user':
                header('Location: index.php');
                break;
            default:
                
                header('Location: index.php');
                break;
        }

        exit();
    } else {
        $_SESSION['login_error'] = 'Invalid username or password';
        header('Location: login.php'); 
        exit();
    }
} else {
    header('Location: login.php'); 
    exit();
}