<?php
include "bootstrap/init.php";
#connect to db and get tasks
$tasks = getTasks();

include "views/index.view.php";