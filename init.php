<?php

require __DIR__ . '/vendor/autoload.php'; // Load Composer's autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbHost = $_ENV['DB_HOST'];
$dbDatabase = $_ENV['DB_DATABASE'];
$dbUsername = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];

// Now you can use these variables to connect to your MySQL database
