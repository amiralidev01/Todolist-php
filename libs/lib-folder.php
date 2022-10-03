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

function addFolders($data)
{

}

function deleteFolder($folder_id)
{
    global $pdo;
    $query = "DELETE FROM folders WHERE id = $folder_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
}

