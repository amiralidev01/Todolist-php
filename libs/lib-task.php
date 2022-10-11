<?php defined('BASE_PATH') or die("Permission Denied!");


/**
 * @return bool|array
 */
function getTasks(): bool|array
{
    global $pdo;
    $folder = $_GET['folder_id'] ?? null;
    $folderCondition = "";
    if (isset($folder) && is_numeric($folder)) {
        $folderCondition = "and folder_id = {$folder}";
    }
    $current_user_id = getCurrentUserId();
    $query = "SELECT * FROM tasks WHERE user_id = {$current_user_id} {$folderCondition} ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

/**
 * @param $taskTitle
 * @param $folderId
 * @return int
 */
function addTask($taskTitle, $folderId): int
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $query = "INSERT INTO tasks (title,folder_id,user_id) values (:title,:folder_id,:user_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':title' => $taskTitle, ':folder_id' => $folderId, ':user_id' => $current_user_id]);
    return $stmt->rowCount();
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

/**
 * @param $taskId
 * @return int
 */
function doneSwitch($taskId): int
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $query = "UPDATE tasks set is_done = 1 - is_done where user_id = :userID and id = :taskID";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':taskID' => $taskId, ':userID' => $current_user_id]);
    return $stmt->rowCount();

}