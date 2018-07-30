<?php
/*
* File name: subscriptions.class.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Handle all data manipulation for subscriptions.
*/

class Subscriptions {
  function __construct($databaseConnection) {
    $this->dbConnection = $databaseConnection;
  }

  // Load information from DB depending on query.
  function load($query) {
    return $this->dbConnection->select($query);
  }

  // Create a new subscription
  // Information is given as a kew based array.
  function newSub($data) {
    $query = " INSERT INTO subscriptions (
      subscriptionDate,
      slotPosition,
      slotSize,
      customerId,
      tireId,
      inventorySlotId
    ) VALUES (
        '$data[date]',
        '$data[slotPosition]',
        '$data[slotSize]',
        '$data[customer]',
        '$data[tire]',
        '$data[slot]'
      )";

    $this->dbConnection->update($query);
  }

  private $dbConnection;
}
?>
