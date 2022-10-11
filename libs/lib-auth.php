<?php defined('BASE_PATH') or die("Permission Denied!");

/**
 * @param $email
 * @return mixed
 */
function getUserByEmail($email): mixed
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email =:email ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;

}

/**
 * @param $email
 * @param $password
 * @return bool
 */
function login($email, $password): bool
{
    $user = getUserByEmail($email);
    if (is_null($user)) {
        return false;
    }
    #check passwords
    if ($password == $user->password) {
        $_SESSION['login'] = $user;
        return true;
    } else {
        echo "Password or email is wrong!";
    }
    return false;
}

/**
 * @param $userData
 * @return int
 */
function register($userData): int
{
    global $pdo;
    $query = "INSERT INTO users(name,email,password) values (:name,:email,:password)";
    $stmt = $pdo->prepare($query);
    $passHash = password_hash($userData['password'], PASSWORD_DEFAULT);
    $stmt->execute([':name' => $userData['name'], ':email' => $userData['email'], ':password' => $userData['password']]);
    return $stmt->rowCount();
}

/**
 * @return mixed
 */
function getCurrentUserId(): mixed
{
    return getLoggedIndUser()->id;
}

/**
 * @return void
 */
function logout(): void
{
    unset($_SESSION['login']);
}

/**
 * @return bool
 */
function isLoggedIn(): bool
{
    return isset($_SESSION['login']) ? true : false;
}

/**
 * @return mixed
 */
function getLoggedIndUser(): mixed
{
    return $_SESSION['login'] ?? null;
}