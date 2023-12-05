<?php
function verifyUser($conn, $username, $password) {
    $sql = "SELECT id, pwd FROM user WHERE user_name='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['pwd'])) {
            return true;
        }
    }

    return false;
}
?>
