<?php
require_once('connexion.php');

function loginUser($user_name, $password) {
    $conn = connexionDb();
    $sql = "SELECT pwd, role_id FROM user WHERE user_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (isset($row['pwd'])) {
            $stored_password = $row['pwd'];
            $id_role = $row['role_id'];

            if (password_verify($password, $stored_password) || $password === $stored_password) {
                $response['success'] = true;
                $response['message'] = "Connexion réussie";

                
                if ($id_role == 1) { 
                    $response['redirect'] = "index1.php";
                } elseif ($id_role == 2) { 
                    $response['redirect'] = "home.php";
                } else {
                    $response['redirect'] = "index.php";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "Mot de passe incorrect";
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Clé 'pwd' non définie dans le tableau";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Nom d'utilisateur incorrect";
    }

    $stmt->close();
    $conn->close();

    return $response;
}


$user_name = $_POST['user_name'];
$password = $_POST['pwd'];

$result = loginUser($user_name, $password);
if ($result['success']) {
    echo $result['message'];
    header("Location: " . $result['redirect']);
} else {
    echo $result['message'];
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

        
        
           
            $sql = "INSERT INTO product(name, quantity, price, description) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sdss", $Nom, $Quantite, $Prix, $Description);

            
            $resultat = mysqli_stmt_execute($stmt);

            if ($resultat) {
                echo "Ajout réussi";
            } else {
                echo "Une erreur est survenue lors de l'ajout : " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);

        mysqli_close($conn);
    } else {
        echo "Remplissez tous les champs s'il vous plaît!";
    }
}

function obtenirProduitsDeLaBaseDeDonnees() {
    $conn = connexionDb();

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    $conn->close();
    return $products;
}

function modifierProduit($data) {
    $conn = connexionDb();

    $id = $data['id'] ?? '';
    $Nom = $data['newName'] ?? '';
    $Quantite = $data['newQuantite'] ?? '';
    $Prix = $data['newPrix'] ?? '';
    $Description = $data['newDescription'] ?? '';

    if (!empty($id) && !empty($Nom) && !empty($Quantite) && !empty($Prix)) {
        $sql = "UPDATE product SET name=?, quantity=?, price=?, description=? WHERE id=?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sdsds", $Nom, $Quantite, $Prix, $Description, $id);
        $resultat = mysqli_stmt_execute($stmt);

        if ($resultat) {
            echo "Modification réussie";
        } else {
            echo "Une erreur est survenue lors de la modification : " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Remplissez tous les champs s'il vous plaît!";
    }
}

function supprimerProduit($id) {
    $conn = connexionDb();

    if (!empty($id)) {
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Suppression réussie";
        } else {
            echo "Une erreur est survenue lors de la suppression";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "id du produit non spécifié";
    }
}
function obtenirImagesDeLaBaseDeDonnees() {
    $conn = connexionDb();

    $sql = "SELECT img_url FROM product";
    $result = $conn->query($sql);

    $images = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }
    }

    $conn->close();
    return $images;
}



?>
