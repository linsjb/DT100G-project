<?php
/*
* File name: newCustomer.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Page for creating a new customer.
*
*/

include 'siteHeader.php';
include $requestsDir . 'r_newCustomer.php';
include 'header.php';
?>

<form class="o-content -newCustomer" method="post">
  <h1 class="o-content__title -newCustomer">New customer</h1>

  <!-- new customer details -->
  <section class="m-customer -content -newCustomer">

    <!-- Customer general information -->
    <div class="a-newCustomerContent">
      <h3 class="a-NewCustomerContent__title">General information</h3>

      <label class="a-newCustomer__label">First name</label>
      <input type="text" class="a-newCustomer__input" name="firstName">

      <label class="a-newCustomer__label">Last name</label>
      <input type="text" class="a-newCustomer__input" name="lastName">

      <label class="a-newCustomer__label">Phone number</label>
      <input type="tel" class="a-newCustomer__input" name="phoneNumber">

      <label class="a-newCustomer__label">E-mail</label>
      <input type="email" class="a-newCustomer__input" name="email">
    </div>

    <!-- Customer address information -->
    <div class="a-newCustomerContent">
      <h3 class="a-NewCustomerContent__title">Address information</h3>

      <label class="a-newCustomer__label">Street</label>
      <input type="text" class="a-newCustomer__input" name="street">

      <label class="a-newCustomer__label">Zip-code</label>
      <input type="text" class="a-newCustomer__input" name="zipCode">

      <label class="a-newCustomer__label">City</label>
      <input type="text" class="a-newCustomer__input" name="city">
    </div>

  </section>

  <!-- Submit new customer box -->
  <section class="m-customer -sidebar -newCust">
    <div class="a-customerSidebarContent">
      <h5>Save customer</h5>

      <input class="a-customerSidebarContent__btn -btn -btnBlue" type="submit" name="submitNewCustomer" value="Save customer">
    </div>
  </section>
</form>

<?php include 'siteFooter.php' ?>
