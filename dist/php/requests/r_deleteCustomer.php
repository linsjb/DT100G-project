<?php
/*
* File name: r_deleteCustomer.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Delete the records for a customer.
* the page is then redirected to the customer's list.
*
*/
if(isset($_POST['confirmDelete'])) {
  $customerId = $_GET['id'];

  $dbConnection->update("DELETE FROM subscriptions WHERE customerId='$customerId'");
  $dbConnection->update("DELETE FROM customers WHERE id='$customerId'");

   header('location: customers.php');
}
?>
