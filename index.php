<?php
include "bootstrap/init.php";
if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deletedCount = deleteFolder($_GET['delete_folder']);
    echo "$deletedCount Folder SuccessFully Deleted.";
}
#connect to db and get tasks
$tasks = getTasks();
$folders = getFolders();


include "views/index.view.php";