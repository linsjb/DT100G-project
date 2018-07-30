<?php
/*
* File name: functions.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Serve all the functions for the page.
*/

$classesDir = $_SERVER['DOCUMENT_ROOT'] . '/dist/php/classes/';
$functionsDir = $_SERVER['DOCUMENT_ROOT'] . '/dist/php/functions/';
$requestsDir = $_SERVER['DOCUMENT_ROOT'] . '/dist/php/requests/';
$plainIncludesDir = $_SERVER['DOCUMENT_ROOT'] . '/dist/php/planIncludes/';

// Includes
require_once $classesDir . 'connection.class.php';
require_once $classesDir . 'customers.class.php';
require_once $classesDir . 'subscriptions.class.php';
require_once $functionsDir . 'styleLink.php';
require_once $plainIncludesDir . 'session.php';
require_once $plainIncludesDir . 'pageCheck.php';

// Style loading
styleLink('dist/css/style.css');
styleLink('node_modules/material-icons/iconfont/material-icons.css');
styleLink('dist/fonts/proximanova_regular_macroman/stylesheet.css');
styleLink('node_modules/animate.css/animate.min.css');

$dbConnection = new Connection;
$customers = new Customers($dbConnection);
?>
