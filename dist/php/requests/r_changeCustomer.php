<?php
/*
* File name: r_changeCustomer.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Get the fields data and update the record in the DB for the
* current user.
*
* The ID is received via the page's current URL.
*
* The user is then redirected to the same customer (page) as before.
* This to display the new information without that the user
* needs to update the page manually.
*
*/

if(isset($_POST['saveCostumerChanges'])) {
  $customerData = array (
    'phoneNumber'   => $_POST['phoneNumber'],
    'email'         => $_POST['email'],
    'street'        => $_POST['street'],
    'zipCode'       => $_POST['zipCode'],
    'city'          => $_POST['city'],
    'id'            => $_GET['id']
  );

  $customers->update($customerData);

  header('location: customer.php?id=' . $customerData['id'] . '&tab=info');
}
?>
