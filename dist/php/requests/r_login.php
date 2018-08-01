<?php
/*
* File name: r_login.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Logic for the login.php page.
* Data is collected from the field's at the login page.
*
* Data is sent to the DB and matched with a correct username
* and password.
*
* If a record that matches the given information a session is started.
* After the sessions is started the page gets redirected to
* index.php (Admin dashboard)
*/

if(isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $userControl = $dbConnection->rowCount("SELECT COUNT(id) FROM users WHERE username='$username' AND password='$password'");
  $userData = $dbConnection->select("SELECT username, firstName, lastName, userRole, email FROM users WHERE username='$username' AND password='$password'");

  // If the user is located start the session to allow access. And then redirect to dashboard.
  if($userControl == "1") {
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['userDetails'] = $userData;
    header('location: index.php');
    exit();
  }
}
?>
