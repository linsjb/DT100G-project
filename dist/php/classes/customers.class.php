<?php
/*
* File name: customers.class.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Class to handle the datamanipulation of a customer.
* To avoid repeat of queries.
*
*/
class Customers {
  function __construct($databaseConnection) {
    $this->dbConnection = $databaseConnection;
  }

  // Load all customers
  function load() {
    return $this->dbConnection->select('SELECT * FROM customers');
  }

  // Load the latest customer ID
  function loadLatestId() {
    return $this->dbConnection->select('SELECT MAX(id) AS id FROM customers');
  }

  // Load the data for a given ID
  function loadId($id) {
    return $this->dbConnection->select('SELECT * FROM customers WHERE id=' . $id);
  }

  // New customer. Information is given with a key based Array.
  function newCustomer($customerData) {
    $this->dbConnection->update("INSERT INTO customers (
      firstName,
      lastName,
      street,
      zipCode,
      city,
      email,
      phoneNumber,
      customerSince
    ) VALUES (
      '$customerData[firstName]',
      '$customerData[lastName]',
      '$customerData[street]',
      '$customerData[zipCode]',
      '$customerData[city]',
      '$customerData[email]',
      '$customerData[phoneNumber]',
      '$customerData[customerSince]'
    )");
  }

  // Update the information for a given ID
  function update($data) {
    $query = "UPDATE customers
      SET
        street      = '$data[street]',
        email       = '$data[email]',
        phoneNumber = '$data[phoneNumber]',
        zipCode     = '$data[zipCode]',
        city        = '$data[city]'
      WHERE ID = '$data[id]'
    ";

    $this->dbConnection->update($query);
  }

  private $dbConnection;
}
?>
