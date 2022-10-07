<?php defined('BASE_PATH') or die("Permission Denied!");


/**
 * @return bool|array
 */
function getTasks(): bool|array
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    if (isset($folder) && is_numeric($folder)) {
        $folderCondition = "and folder_id = {$folder}";
    }
    $current_user_id = getCurrentUserId();
    /** @var TYPE_NAME $folderCondition */
    $query = "SELECT * FROM tasks WHERE user_id = {$current_user_id} {$folderCondition} ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

/**
 * @param $task_id
 * @return int
 */

function deleteTask($task_id): int
{
    global $pdo;
    $query = "DELETE FROM tasks WHERE id = $task_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
//    var_dump($task_id);
}