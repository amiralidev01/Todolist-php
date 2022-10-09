<?php
include "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action!");
}

switch ($_POST['action']) {
    case 'addFolder':
        if (!isset($_POST['FolderName']) || strlen($_POST['FolderName']) < 3) {
            echo "نام فولدر باید بزرگ تر از دو حرف باشد";
            die();
        }
        echo addFolder($_POST['FolderName']);
        break;
    case 'addTask':
        $folderId = $_POST['FolderId'];
        $taskTitle = $_POST['TaskTitle'];
        if (!isset($folderId) || empty($folderId)) {
            echo "فولدر را انتخاب کنید";
        }
        if (!isset($taskTitle) || strlen($taskTitle) < 3) {
            echo "نام تسک باید بزرگ تر از دو حرف باشد";
        }
//        var_dump("New Task Added:", $_POST);
        echo addTask($taskTitle, $folderId);
        break;


    case 'doneSwitch':
        var_dump($_POST);
        $taskID = $_POST['taskId'];
//        if (!isset($taskID) || is_numeric($taskID)) {
//            echo "آیدی تسک معتبر نیست!";
//            die;
//        }
        echo doneSwitch($taskID);
        break;

    default:
        diePage("Invalid Action!");
}