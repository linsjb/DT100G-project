<?php
/*
* File name: session.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Start a session if the page is NOT login.php
* If a session isn't started the page is redirected to login.php
*/

if($_SERVER['PHP_SELF'] != '/login.php') {
  session_start();
  $_SESSION['userData'] = 1;

  if(!isset($_SESSION['loggedIn'])) {
    header('location: login.php');
    exit();
  }
}
?>
