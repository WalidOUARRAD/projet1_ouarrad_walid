<?php
function usernameIsValid(string $username): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];

    $userInDB = getUserByName($username);

    if (strlen($username) < 2) {
        $result = [
            'isValid' => false,
            'msg' => 'Le nom utilisé est trop court'
        ];
    } elseif (strlen($username) > 20) {
        $result = [
            'isValid' => false,
            'msg' => 'Le nom utilisé est trop long'
        ];
    } elseif ($userInDB) {
        $result = [
            'isValid' => false,
            'msg' => 'Le nom est déjà utilisé'
        ];
    }

    return $result;
}
?>
