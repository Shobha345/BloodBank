<?php
// TODO deprecated use /index.php?logout=1;
require_once __DIR__ . '/src/autoload.php';

$userUtility = \App\Utility\UserUtility::getInstance();
$userUtility->logout();
header( 'Location: /index.php');
exit();
