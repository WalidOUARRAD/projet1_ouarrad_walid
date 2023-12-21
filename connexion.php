<?php
$server = 'localhost';
$userName = "root";
$pwd = "";
$db = "ecom1_projet";

$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {
   
    global $conn;
} else {
    echo "Error : Not connected to the $db database";
}
function connexionDb() {
    $conn = mysqli_connect("localhost", "root", "", "ecom1_projet");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $conn;
}
?>
