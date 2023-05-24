<?php
    date_default_timezone_set('America/Mexico_City');
    error_reporting(E_ALL);
    ini_set('ignore_repeated_errors', TRUE);
    ini_set('display_errors', FALSE);
    ini_set('log_errors', TRUE);
    ini_set("error_log", "C:\laragon\www\/repos\/expense-app\logs\php-error.log");
    error_log("Hello, errors!");
    require_once 'libs/app.php';
?>