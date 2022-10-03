<?php


include "libs/helpers.php";
include "constants.php";
include "config.php";

try {
    $pdo = new PDO("mysql:host={$dbConfig->host};dbname={$dbConfig->dbname}", $dbConfig->user, $dbConfig->pass);
} catch (PDOException $e) {
    diePage("cloud not connect. error : " . $e->getMessage());
}
include "libs/lib-folder.php";
include "libs/lib-task.php";
include "libs/lib-auth.php";
