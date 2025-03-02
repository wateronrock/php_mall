<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set("display_errors", 1);

    mysqli_report(MYSQLI_REPORT_OFF);

    $db = mysqli_connect("localhost", "shop0", "1234", "shop0");

    if(!$db) exit("연결에러");
?>