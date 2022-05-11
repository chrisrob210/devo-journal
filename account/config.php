<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Vapeit_316');
define('DB_NAME', 'accounts');

/* Attempt to connect to MySQL database */
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Check if DB exists
$dbExists = mysqli_select_db($link, DB_NAME);

// If DB doesn't exist
if (!$dbExists) {
    //Create it.
    $query = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
    $link->query($query);

    //connect to the DB
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //Table doesn't exist either so create that too.
    $query = "CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $link->query($query);
}


function connect()
{
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    return $link;
}
