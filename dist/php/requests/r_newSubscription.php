<?php
/*
* File name: r_newSubscription.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Logic for a new subscription.
*
* The data is collected from the form field's.
* First the tires data is collacted and a query is made for this.
* Then the array for the subscription data is created.
* The data is then sent to the newSub method in the
* subscriptions class.
*
* After the data is treated the page is redirected to the same page.
* To simulate a page refresh. So the new subscription is visible
* without a manual refresh of the page.
*/

if(isset($_POST['submitSubscription'])) {
  $tireData = array(
    'manufacture'       => $_POST['tireManufacture'],
    'model'             => $_POST['tireModel'],
    'type'              => $_POST['tireType'],
    'dimensions'        => $_POST['tireDimensions']
  );

  $tireQuery = "SELECT id FROM tires WHERE
    tireManufacture LIKE '$tireData[manufacture]'
    AND tireModel LIKE '$tireData[model]'
    AND tireType LIKE '$tireData[type]'
    AND tireDimensions LIKE '$tireData[dimensions]'
  ";

  $subscriptionData = array(
    'date'             => date('Y-m-d'),
    'slotPosition'     => $_POST['tireShelfLevel'],
    'slotSize'         => $_POST['subSize'],
    'tire'             => $dbConnection->select($tireQuery)[0]->id,
    'slot'             => $_POST['tireShelf'],
    'customer'         => $_GET['id']
  );

  $newSub = new Subscriptions($dbConnection);
  $newSub->newSub($subscriptionData);
  header('location: customer.php?id=' . $_GET['id'] . '&tab=subs');
}

?>
