<?php

// Connect to the database MySQL
define('DB_HOST','');
define('DB_USER','');
define('DB_PASS','');
define('DB_NAME','');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
mysqli_query($conn, 'SET NAMES "utf-8"');
mysqli_query($conn, 'set character utf8');
mysqli_set_charset($conn, "utf8");
require_once "Function.php";

// Connect to the database PostgreSQL
/*
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
$conn = pg_connect("host=DB_HOST port=5432 dbname=DB_NAME user=DB_USER password=DB_PASS");
require_once "Function.php";
*/