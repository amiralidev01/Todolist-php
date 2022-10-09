<?php
include "bootstrap/init.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'register') {
        register($params);
    }
}

include "views/register.view.php";
