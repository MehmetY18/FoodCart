<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'opd');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Bağlantıyı Kontrol Et
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    //echo "Hoş Geldin!";
}