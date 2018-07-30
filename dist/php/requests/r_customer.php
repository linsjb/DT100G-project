<?php
/*
* File name: r_customer.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Get's the data for the customer and the customer subscriptions
* through the customer ID.
*
* The ID is received through the page URL.
*
* The data is collected from the database and returned as two arrays.
*/

$customerId = $_GET['id'];

// Load data for customer
$customer = $customers->loadId($customerId)[0];

// The ID get's wrong if we just do SELECT *.
$subscriptionQuery = "SELECT
  sub.id,sub.subscriptionDate,
  sub.slotSize, sub.customerId,
  sub.slotPosition,
  tire.tireManufacture,
  tire.tireModel,
  tire.tireType,
  tire.tireDimensions,
  inv.name
  FROM subscriptions sub, inventorySlots inv, tires tire
  WHERE sub.tireId = tire.id
    AND sub.inventorySlotId = inv.id";


  $subscription = new Subscriptions($dbConnection);
  $subscriptionsData = $subscription->load($subscriptionQuery);
?>
