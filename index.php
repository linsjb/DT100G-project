
<?php
/*
* File name: index.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* The admin dashboard page.
* Show a general and quick overview of the system.
*/

include 'siteHeader.php';
include 'header.php';

$customersData = $customers->load();
$subscriptions = $dbConnection->select("SELECT COUNT(id) id FROM subscriptions")[0]->id;
?>

<div class="o-content -dashboard">
  <!-- Inventory overview -->
  <section class="m-dashboardSection -inventoryOverview">
    <i class="m-dashboardSection__icon material-icons md-30">visibility</i>
    <h2 class="m-dashboardSection__title">Inventory overview</h2>
    <canvas class="a-dashboardSectionContent" id="dashboardInventoryChart" height="auto"></canvas>
  </section>

  <!-- Customers overview -->
  <section class="m-dashboardSection -customersOverview">
    <i class="m-dashboardSection__icon material-icons md-30">account_circle</i>
    <h2 class="m-dashboardSection__title">Customers overview</h2>

    <div class="a-dashboardSectionContent">
      <h2 class="a-dashboardSectionContent__header">Total customers</h2>
      <h2 class="a-dashboardSectionContent__header">Total subs</h2>

      <i class="a-dashboardSectionContent__icon -light material-icons md-48">face</i>
      <i class="a-dashboardSectionContent__icon -light material-icons md-48">favorite</i>

      <p class="a-dashboardSectionContent__number"><?= sizeOf($customersData) ?></p>
      <p class="a-dashboardSectionContent__number"><?= $subscriptions ?></p>
    </div>
  </section>

  <!-- .o-content -->
</div>

<?php include 'siteFooter.php' ?>
