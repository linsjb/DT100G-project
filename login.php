<?php
/*
* File name: login.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* System login page
*/

require_once "functions.php";
include $requestsDir . 'r_login.php';

include "siteHeader.php";
?>
<div class="o-login">
  <form method="post" class="m-loginWindow" name="login">

    <div class="a-loginFormGroup">
      <label class="a-loginFormGroup__label">Username</label>
      <input type="text" class="a-loginFormGroup__input" name="username">
    </div>

    <div class="a-loginFormGroup">
      <label class="a-loginFormGroup__label">Password</label>
      <input type="password" class="a-loginFormGroup__input" name="password">
    </div>

    <input type="submit" class="a-loginFormGroup__btn" value="Login" name="login">
  </form>
</div>
<?php
include "siteFooter.php";
?>
