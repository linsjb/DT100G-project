<?php
/*
* File name: pageCheck.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Handles the ID of the body element.
* this ID is changed depending on the page because the
* ability to change the left-sidebar (navigation) current
* item without JavaScript.
*/

switch($_SERVER['PHP_SELF']) {
  case '/login.php':
    $currentElementId = 'login';
    break;

  case '/index.php':
    $currentElementId = 'dashboard';
    break;

  case '/customers.php':
  case '/customer.php':
  case '/newCustomer.php':
    $currentElementId = 'customers';
    break;

  case '/inventory.php':
    $currentElementId = 'inventory';
    break;
}
?>
