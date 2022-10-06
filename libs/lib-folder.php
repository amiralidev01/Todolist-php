<?php

function getFolders()
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $query = "SELECT * FROM folders WHERE user_id={$current_user_id}";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getCurrentUserId()
{
    return 1;
}

function addFolders($folder_name)
{
    global $pdo;
    $current_user_id = getCurrentUserId();
    $query = "INSERT INTO folders (name,user_id) values (:folder_name,:user_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':folder_name' => $folder_name, ':user_id' => $current_user_id]);
    return $stmt->rowCount();
}

function deleteFolder($folder_id)
{
    global $pdo;
    $query = "DELETE FROM folders WHERE id = $folder_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
}

