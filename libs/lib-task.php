<?php defined('BASE_PATH') or die("Permission Denied!");



function getTasks(): bool|array
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $query = "SELECT * FROM tasks WHERE user_id = {$current_user_id}";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}