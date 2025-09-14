<?php

require('config.php');
$base = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($base, "utf8");
if (!$base) {
    echo "Ошибка подключения к БД. Код ошибки: " . mysqli_connect_error();
    exit();
}