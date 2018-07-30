/*
* File name: main.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* The main file for the JS-scripts.
*/

import * as dashboard from './dashboard';
import * as customers from './customers';
import * as subscriptions from './subscriptions';

import login from './login';
import * as user from './user';

import jsonRequest  from './jsonRequest';

window.onload = function () {

  // Check wich page that the user stands on and run different functions depending on that.
  switch(window.location.pathname) {
    case '/':
    case '/index.php':
      user.popup();
      dashboard.inventoryChart();
      break;

    case '/customers.php':
      user.popup();
      customers.sendToDetails();
      customers.changeTab();
      break;

    case '/customer.php':
      user.popup();

      subscriptions.populateTires();
      subscriptions.subscriptionBarcode();
      subscriptions.deleteSubscription();

      customers.changeTab();
      customers.openCloseNewSub();
      customers.deleteConfirmation();
      customers.changeCostumer();
      customers.newCustomer();
      break;

    case '/login.php':
      login();
  }
}
