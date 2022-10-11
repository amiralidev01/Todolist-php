<?php
include "bootstrap/init.php";


if (isset($_GET['logout'])) {
    logout();
}

if (!isLoggedIn()) {
    //redirect to auth form
    header("Location: login.php");
}


if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deletedCount = deleteFolder($_GET['delete_folder']);
//    echo "$deletedCount Folder SuccessFully Deleted.";
}


if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
    $deletedCount = deleteTask($_GET['delete_task']);
    var_dump($_GET['delete_task']);
//    echo "$deletedCount Task SuccessFully Deleted.";
}

#connect to db and get data from database
$tasks = getTasks();
$folders = getFolder();


include "views/index.view.php";