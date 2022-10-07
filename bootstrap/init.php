<?php 

include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "libs/helpers.php";
try {
    $pdo = new PDO("mysql:host={$dbConfig->host};dbname={$dbConfig->dbname}", $dbConfig->user, $dbConfig->pass);
} catch (PDOException $e) {
    diePage("cloud not connect. error : " . $e->getMessage());
}
include BASE_PATH . "libs/lib-folder.php";
include BASE_PATH . "libs/lib-task.php";
include BASE_PATH . "libs/lib-auth.php";
