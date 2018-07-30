<?php
/*
* File name: r_deleteSubscription.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Delete the specific subscription for a customer.
* User then get's redirected to the same page. This to update the page and show the changes.
*/
if(isset($_POST['delSubConfirm'])) {
  $customerId = $_GET['id'];

  var_dump($_POST['subscriptionId']);


  // $dbConnection->update("DELETE FROM subscriptions WHERE id=21");

  // header('location: customer.php?id=' . $customerId . '&tab=subs');
}
?>
