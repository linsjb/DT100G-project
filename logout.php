<?php
/*
* File name: logout.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* When a user is logged out the system send's them to this page.
* Right after the session is destroyed the user will get redirected to the login page.
*/

session_start();
session_destroy();

header("location: login.php");
exit();
?>
