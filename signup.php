
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
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


</body>
</html>
