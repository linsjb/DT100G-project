<?php
/*
* File name: customer.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* List details for a customer.
* Element's and controls to create a new subscription and delete these
* plus the customer itself is also included in this file.
*
* All requests is seperated into different files depending on their task and behaviour.
* They are then included.
*
*/
include 'siteHeader.php';
include 'header.php';

include $requestsDir . 'r_customer.php';

include $requestsDir . 'r_newSubscription.php';

include $requestsDir . 'r_deleteCustomer.php';
include $requestsDir . 'r_changeCustomer.php';
?>

<div class="o-content -customer" id="customer-<?= $customerId ?>">
  <h1 class="o-content__title"><?= $customer->firstName ?> <?= $customer->lastName ?></h1>

  <!-- Customer navigation -->
  <nav class="m-customerNav">
    <ul class="a-customerNavList">
      <li class="a-customerNavList__item -current">Information</li>
      <li class="a-customerNavList__item">subscriptions</li>
    </ul>
  </nav>

  <!-- Customer details tab -->
  <section class="m-customer -information" id="customerDetails">
    <h3 class="m-customerInfo__title">Customer information</h3>

    <h4 class="m-customerInfo__label">Customer ID</h4>
    <p class="m-customerInfo__info"><?= $customer->id ?></p>

    <h4 class="m-customerInfo__label">First name</h4>
    <p class="m-customerInfo__info"><?= $customer->firstName ?></p>

    <h4 class="m-customerInfo__label">Last name</h4>
    <p class="m-customerInfo__info"><?= $customer->lastName ?></p>

    <h4 class="m-customerInfo__label">Phone number</h4>
    <p class="m-customerInfo__info"><?= $customer->phoneNumber ?></p>

    <h4 class="m-customerInfo__label">E-mail</h4>
    <p class="m-customerInfo__info"><?= $customer->email ?></p>

    <h4 class="m-customerInfo__label">Street</h4>
    <p class="m-customerInfo__info"><?= $customer->street ?></p>

    <h4 class="m-customerInfo__label">Zip-code</h4>
    <p class="m-customerInfo__info"><?= $customer->zipCode ?></p>

    <h4 class="m-customerInfo__label">City</h4>
    <p class="m-customerInfo__info"><?= $customer->city ?></p>
  </section>

  <!-- Change costumer -->
  <form class="m-customer -information -hidden" id="changeCustomerDetails" method="post">
    <h3 class="m-customerInfo__title">Customer information</h3>

    <h4 class="m-customerInfo__label">Customer ID</h4>
    <p class="m-customerInfo__info"><?= $customer->id ?></p>

    <h4 class="m-customerInfo__label">First name</h4>
    <p class="m-customerInfo__info"><?= $customer->firstName ?></p>

    <h4 class="m-customerInfo__label">Last name</h4>
    <p class="m-customerInfo__info"><?= $customer->lastName ?></p>

    <h4 class="m-customerInfo__label">Phone number</h4>
    <input class="-input" type="tel" name="phoneNumber" value="<?= $customer->phoneNumber ?>">

    <h4 class="m-customerInfo__label">E-mail</h4>
    <input class="-input" type="email" name="email" value="<?= $customer->email ?>">

    <h4 class="m-customerInfo__label">Street</h4>
    <input class="-input" type="text" name="street" value="<?= $customer->street ?>">

    <h4 class="m-customerInfo__label">Zip-code</h4>
    <input class="-input" type="text" name="zipCode" value="<?= $customer->zipCode ?>">

    <h4 class="m-customerInfo__label">City</h4>
    <input class="-input" type="text" name="city" value="<?= $customer->city ?>">
  </form>

  <!-- Subscriptions -->
  <section class="m-customer -subscriptions -hidden" id="customerSubscriptions">

    <!-- New subscription button -->
    <div class="a-newSubscription" id="newSubscription">
      <h2>New subscription</h2>
    </div>

    <!-- New subscription fields -->
    <form class="a-newSubscriptionForm -hidden" method="post">
      <h3 class="a-newSubsciptionForm__title">New subscription</h3>

      <h4 class="a-newSubsciptionForm__subTitle">General information</h4>

      <label class="a-newSubscriptionForm__label">Number of item's</label>
      <div>
        <label for="subSize">2</label>
        <input type="radio" name="subSize" value="2" checked>
        <label for="subSize">4</label>
        <input type="radio" name="subSize" value="4">
      </div>

      <h4 class="a-newSubsciptionForm__subTitle">Inventory slot</h4>

      <label class="a-newSubscriptionForm__label">Tire shelf</label>
      <div class="">
        <label class="a-newSubscriptionForm__label" for="tireShelf">A</label>
        <input type="radio" name="tireShelf" value="1">

        <label class="a-newSubscriptionForm__label" for="tireShelf">B</label>
        <input type="radio" name="tireShelf" value="2">

        <label class="a-newSubscriptionForm__label" for="tireShelf">C</label>
        <input type="radio" name="tireShelf" value="3">
      </div>

      <label class="a-newSubscriptionForm__label" for="">Level</label>
      <div>
        <label class="a-newSubscriptionForm__label" for="tireShelfLevel">1</label>
        <input type="radio" name="tireShelfLevel" value="1">

        <label class="a-newSubscriptionForm__label" for="tireShelfLevel">2</label>
        <input type="radio" name="tireShelfLevel" value="2">

        <label class="a-newSubscriptionForm__label" for="tireShelfLevel">3</label>
        <input type="radio" name="tireShelfLevel" value="3">

        <label class="a-newSubscriptionForm__label" for="tireShelfLevel">4</label>
        <input type="radio" name="tireShelfLevel" value="4">

        <label class="a-newSubscriptionForm__label" for="tireShelfLevel">5</label>
        <input type="radio" name="tireShelfLevel" value="5">

      </div>

      <h4 class="a-newSubsciptionForm__subTitle">Tire information</h4>

      <!-- Type of tires -->
      <label class="a-newSubscriptionForm__label" for="">Tire type</label>
      <div class="">
        <label class="a-newSubscriptionForm__label" for="">Summer</label>
        <input type="radio" name="tireType" value="summer" id="summer">

        <label class="a-newSubscriptionForm__label" for="">Winter</label>
        <input type="radio" name="tireType" value="winter" id="winter">

        <label class="a-newSubscriptionForm__label" for="">Allround tyres</label>
        <input type="radio" name="tireType" value="allround" id="allround">
      </div>

      <!-- Tire manufacture -->
      <label class="a-newSubscriptionForm__label" for="">Manufacture</label>
      <select class="-select -halfWidth" name="tireManufacture">
        <option value="noData">---Select tire type---</option>
      </select>

      <!-- Tire model -->
      <label class="a-newSubscriptionForm__label" for="">Model</label>
      <select class="-select -halfWidth" name="tireModel">
        <option value="noData">---Select tire manufacture---</option>
      </select>

      <!-- Tire dimensions -->
      <label class="a-newSubscriptionForm__label" for="">Dimensions</label>
      <select class="-select -halfWidth" name="tireDimensions">
        <option value="noData">---Select tire model---</option>
      </select>

      <div class="a-newSubscriptionButtons">
        <input class="-btn -btnGrey" type="reset" name="resetSubscription" value="Cancel">
        <input class="-btn -btnBlue" type="submit" name="submitSubscription" value="Submit">
      </div>
    </form>

    <!-- Element's for user subsciptions -->
    <?php
    foreach($subscriptionsData as $subscriptionData) {
      echo '
      <div class="a-subscription" id="subscription-' . $subscriptionData->id . '">
        <div class="a-subscriptionContent">
        <h4 class="a-subscription__title">Subscription information</h4>

        <h5 class="a-subscription__subTitle">Start hire date</h5>
        <p class="a-subscription__info">' . $subscriptionData->subscriptionDate . '</p>

        <h5 class="a-subscription__subTitle">Items</h5>
        <p class="a-subscription__info">' . $subscriptionData->slotSize . '</p>

        <h4 class="a-subscription__title">Inventory information</h4>

        <h5 class="a-subscription__subTitle">Tire shelf</h5>
        <p class="a-subscription__info">' . $subscriptionData->name . '</p>

        <h5 class="a-subscription__subTitle">Self position</h5>
        <p class="a-subscription__info">' . $subscriptionData->slotPosition . '</p>

        <h4 class="a-subscription__title">tires information</h4>

        <h5 class="a-subscription__subTitle">Type of tires</h5>
        <p class="a-subscription__info">' . $subscriptionData->tireType . '</p>

        <h5 class="a-subscription__subTitle">Tire manufacture</h5>
        <p class="a-subscription__info">' . $subscriptionData->tireManufacture . '</p>

        <h5 class="a-subscription__subTitle">Tire model</h5>
        <p class="a-subscription__info">' . $subscriptionData->tireModel . '</p>

        <h5 class="a-subscription__subTitle">Tire dimensions</h5>
        <p class="a-subscription__info">' . $subscriptionData->tireDimensions . '</p>
      </div>

      <svg
        class="a-subscription__barcode"
        jsbarcode-height=40
        jsbarcode-value="' . $subscriptionData->customerId . $subscriptionData->id . '"
        jsbarcode-font="proxima_novaregular"
        jsbarcode-fontSize=16
      ></svg>
      </div>
      ';
    }
    ?>
  </section>

  <!-- Sidebar -->
  <section class="m-customer -sidebar -customer">

    <!-- Sidebar content -->
    <div class="a-customerSidebarContent">
      <h5 class="a-customerSidebarContent__title">Customer</h5>
      <p class="a-customerSidebarContent__info"><i class="material-icons">event</i>Customer since: <?= $customer->customerSince ?></p>
      <p class="a-customerSidebarContent__info"><i class="material-icons">subscriptions</i>Subscriptions: <?= sizeOf($subscriptionsData)?></p>
    </div>

    <!-- Sidebar buttons (delete/change costumer) -->
    <div class="a-customerSidebarBottomContent" id="customerSidebarChangeBtns">
      <input class="a-customerSidebarBottomContent__btn -btn -btnRed" type="button" name="deleteCustomer" value="Delete">
      <input class="a-customerSidebarBottomContent__btn -btn -btnBlue" type="button" name="changeCostumer" value="Change">
    </div>

    <!-- Sidebar buttons (cancel/save changes) -->
    <div class="a-customerSidebarBottomContent -hidden" id="customerSidebarSaveBtns" method="post">
      <input class="a-customerSidebarBottomContent__btn -btn -btnGrey" type="button" name="cancelChanges" value="Cancel">
      <input class="a-customerSidebarBottomContent__btn -btn -btnBlue" type="submit" name="saveCostumerChanges" value="Save" form="changeCustomerDetails">
    </div>
  </section>

  <!-- .o-content -->
</div>

<!-- Delete customer confirmation popup -->
<div class="o-popup -hidden" id="deleteConfirmation">
  <div class="m-deleteConfirmation">
    <h3 class="m-deleteConfirmation__title">Delete confirmation</h3>

    <p class="m-deleteConfirmation__info">
      Do you really want to delete the costumer?
      </br>
      This can't be undone!
    </p>

    <form class="a-deleteConfirmButtons" method="post">
      <input class="a-deleteConfirmButtons__btn -btn -btnGrey" type="button" name="confirmCancel" value="Cancel">
      <input class="a-deleteConfirmButtons__btn -btn -btnRed" type="submit" name="confirmDelete" value="Delete">
    </form>
  </div>
</div>

<?php
include 'siteFooter.php';
?>
