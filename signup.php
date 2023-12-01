<?php 
include('connexion.php');
include('header.php');

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = $_POST['role']; 

    
    $sql = "INSERT INTO user (user_name, email, pwd, role_id) VALUES ('$username', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: orangered;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: wheat;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: purple;
            color: #fff;
            cursor: pointer;
        }
    </style>
    
</head>
<body>

    <h2>Sign Up</h2>

    <form action="signup.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="role">Role:</label>
        <select name="role" required>
            <option value="1">User</option> 
            <option value="2">Admin</option> 
        </select><br>

        <input type="submit" value="Sign Up">
    </form>

    <p><?php echo $message; ?></p>

</body>
</html>
