<?php
// TODO Autoloader like composer might be nice
require_once __DIR__ . '/Utility/Singleton.php';
require_once __DIR__ . '/Utility/DatabaseUtility.php';
require_once __DIR__ . '/Utility/UserUtility.php';

// adding default timezone due to deployment server zones issue
date_default_timezone_set('Asia/Kolkata');

// Initialize Database
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'bloodbank';

$database = \App\Utility\DatabaseUtility::getInstance();
$database->connect('mysql', $db_host, $db_username, $db_password, $db_name);

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize user (Login & Logout)
$userUtility = \App\Utility\UserUtility::getInstance();
