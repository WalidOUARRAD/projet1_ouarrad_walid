<?php
require_once('connexion.php');

function loginUser($user_name, $password)
{
    global $conn;

    
    $hashed_password = hash('sha256', $password); 
    $query = "SELECT * FROM user WHERE user_name = ? AND pwd = ?";
    
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $user_name, $hashed_password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return true; // Login successful
        }
    }

    return false; // Login failed
}

function getUserByName($user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user_name = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);
    }

    return null;
}

function registerUser($user_name, $email, $password)
{
    global $conn;

    // Validate and sanitize input data (you may want to enhance this)
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $email = mysqli_real_escape_string($conn, $email);

    // Check if username is unique
    $existing_user = getUserByName($user_name);
    if ($existing_user) {
        return [
            'success' => false,
            'message' => 'Username already exists'
        ];
    }

    // You need to replace '1' with a valid role_id from your 'role' table
    $role_id = 1;

    // Hash the password
    $hashed_password = hash('sha256', $password); // Use appropriate hashing algorithm

    // Insert user into the database
    $query = "INSERT INTO user (user_name, email, pwd, role_id) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $user_name, $email, $hashed_password, $role_id);
        mysqli_stmt_execute($stmt);
        return ['success' => true];
    } else {
        return [
            'success' => false,
            'message' => 'Registration failed'
        ];
    }
}

function ajouterProduit($data) {
    $conn = connexionDb();

    $Nom = $data['newName'] ?? '';
    $Quantite = $data['newQuantite'] ?? '';
    $Prix = $data['newPrix'] ?? '';
    $Image = $_FILES['newImage']['name'] ?? '';
    $Description = $data['newDescription'] ?? '';

    if (!empty($Nom) && !empty($Quantite) && !empty($Prix) && !empty($Image)) {
        $Date_ajout = date('Y-m-d');

        
        $targetDir = "C:\Users\DELL\Downloads\image"; //a rectifier

       
        $targetFile = $targetDir . basename($Image);

        
        if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFile)) {
           
            $sql = "INSERT INTO product(name, quantity, price, img_url, description) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sdsds", $Nom, $Quantite, $Prix, $Image, $Description);

            
            $resultat = mysqli_stmt_execute($stmt);

            if ($resultat) {
                echo "Ajout réussi";
            } else {
                echo "Une erreur est survenue lors de l'ajout : " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo 'Erreur lors du téléchargement du fichier.';
        }

        mysqli_close($conn);
    } else {
        echo "Remplissez tous les champs s'il vous plaît!";
    }
}

?>
