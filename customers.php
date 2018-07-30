<?php
/*
* File name: customers.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* List all the avaliable customers in the system as a list.
* Also shows the total customers and ability to create a new customer.
*
*/

include 'siteHeader.php';
include 'header.php';
include $requestsDir . 'r_newCustomer.php';
$customersData = $customers->load();
?>

<div class="o-content -customers">
   <section class="m-customersOverview -totalCustomers">
    <h4 class="m-customersOverview__item -title">Total customers</h4>
    <p class="m-customersOverview__item -amount">
      <?php echo sizeOf($customersData) ?>
    </p>
  </section>

  <section class="m-customersOverview -newCustomer" id="newCustomer">
    <h4 class="m-customersOverview__item -title">New customer</h4>
    <a href="newCustomer.php" class="m-customersOverview__item -newCustomer">
      <i class="material-icons md-48">person_add</i>
    </a>
  </section>

  <section class="m-customersOverview -customerList">
    <div class="m-customerListTableWrapper">
      <table class="a-customerListTable">
        <thead>
          <tr class="a-customerListTable__row">
            <th class="a-customerListTable__header">First name</th>
            <th class="a-customerListTable__header">Last name</th>
            <th class="a-customerListTable__header">Street</th>
            <th class="a-customerListTable__header">Email</th>
            <th class="a-customerListTable__header">Phone</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach($customersData as $customer) {
            echo '
              <tr class="a-customerListTable__row -dataRow" id="' . $customer->id . '">
                <td class="a-customerListTable__cell">' . $customer->firstName . '</td>
                <td class="a-customerListTable__cell">' . $customer->lastName . '</td>
                <td class="a-customerListTable__cell">' . $customer->street . '</td>
                <td class="a-customerListTable__cell">' . $customer->email . '</td>
                <td class="a-customerListTable__cell">' . $customer->phoneNumber . '</td>
              </tr>
            ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- .o-content -->
</div>
<?php include 'siteFooter.php' ?>
