<?php
function get_db_connection(): mysqli
{
    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: '';
    $database = getenv('DB_NAME') ?: 'edupress_db';

    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    return $conn;
}

