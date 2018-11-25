<?php

define('DB_SERVER', 'mariadb');
define('DB_USERNAME', 'drupal_lab');
define('DB_PASSWORD', 'drupal_lab');
define('DB_NAME', 'drupal_lab');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>