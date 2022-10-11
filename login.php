<?php
include "bootstrap/init.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;
    if ($action == 'login') {
        $result = login($params['email'], $params['password']);
        if ($result) {
            header(header: "Location: /index.php");
        }
    }
}

include "views/login.view.php";