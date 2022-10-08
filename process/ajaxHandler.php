<?php
include "../bootstrap/init.php";

if (!isAjaxRequest()) {
    diePage("Invalid Request!");
}

if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action!");
}

switch ($_POST['action']) {
    case 'doneSwitch':
        $taskID = $_POST['TaskID'];
        if (!isset($taskID) || is_numeric($taskID)) {
            echo "آیدی تسک معتبر نیست!";die;
        }
        doneSwitch($taskID);
        break;
    case 'addFolder':
        if (!isset($_POST['FolderName']) || strlen($_POST['FolderName']) < 3) {
            echo "نام فولدر باید بزرگ تر از دو حرف باشد";
            die();
        }
        echo addFolder($_POST['FolderName']);
        break;
    case 'addTask':
        var_dump($_POST);
        die;
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
    default:
        diePage("Invalid Action!");
}