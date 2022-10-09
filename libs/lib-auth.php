<?php defined('BASE_PATH') or die("Permission Denied!");

function login($username, $password)
{
    return 1;
}

function register($userData)
{
    global $pdo;

    $query = "INSERT INTO users(name,email,password) values (:name,:email,:password)";
    $stmt = $pdo->prepare($query);
    $passHash = password_hash($userData['password'], PASSWORD_DEFAULT);
    $stmt->execute([':name' => $userData['name'], ':email' => $userData['email'], ':password' => $userData['password']]);
    return $stmt->rowCount();
}

function isLoggedIn()
{
    return false;
}