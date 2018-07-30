<?php
/*
* File name: r_newCustomer.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Logic for new customer.
* The data is gathered from the form fields and then sent as
* an objeted array to the customers class.
* The data is then pushed to the database.
*
* The page is then redirected to this new customer.
* The URL contains tab=subs so when the page loads the
* tab is the subscription's tab.
*
* The URL also contains "new=true" to open the new subscription
* element directly. So the user dosen't need to manually click
* the "Add subscription" button.
*/

if(isset($_POST['submitNewCustomer'])) {
  $customer = array(
    'firstName'      => $_POST['firstName'],
    'lastName'       => $_POST['lastName'],
    'street'         => $_POST['street'],
    'zipCode'        => $_POST['zipCode'],
    'city'           => $_POST['city'],
    'email'          => $_POST['email'],
    'phoneNumber'    => $_POST['phoneNumber'],
    'customerSince'  => date('Y-m-d')
  );

  $customers->newCustomer($customer);

  header('location: customer.php?id=' . $customers->loadLatestId()[0]->id . '&tab=subs&new=true');
}
?>
