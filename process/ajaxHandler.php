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
        echo addFolders($_POST['FolderName']);
        break;
    case 'addTask':
        break;
    default:
        diePage("Invalid Action!");
}