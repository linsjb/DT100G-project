/*
* File name: customers.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*/

/*
* Get the ID for the current customer.
* The ID is taken fomr the content element that has the customer ID as the element ID.
*/
function getCustomerId() {
   // we get the ID this way bacause it's easy. Might not be the sexiest way. But it works.
  return document.getElementsByClassName('o-content')[0].id.split('-').pop().trim();
}

/*
* When click on a row in the customers table the user is sent to the customer.php page
* with the correct customer ID.
* the customer ID is hold as an element ID in the table row.
*/

export function sendToDetails() {
  let dataRows = Array.from(document.getElementsByClassName('-dataRow'));

    dataRows.map((row) => {
      row.addEventListener('click', function() {
        window.location.href = '/customer.php?id=' + this.id;
    });
  });
}

// Change tab in customer details depending on the URL
export function changeTab() {
  let customerDetails = document.getElementById('customerDetails');
  let customerSubscriptions = document.getElementById('customerSubscriptions');
  let navigations = Array.from(document.getElementsByClassName('a-customerNavList__item'));

  // Listen for button clicks and change the URL depending of wich button that's pressed.
  navigations.map((navigation, index) => {
    navigation.addEventListener('click', function() {
      switch(index) {
        case 0:
          location.href =`customer.php?id=${getCustomerId()}&tab=info`;
          break;

        case 1:
        location.href =`customer.php?id=${getCustomerId()}&tab=subs`;
          break;
      }
    });
  });

  // Change visibility of element's depending of the URL
  if(location.href.search('info') > 0) {
    customerDetails.classList.remove('-hidden');
    customerSubscriptions.classList.add('-hidden');
    navigations[0].classList.add('-current');
    navigations[1].classList.remove('-current');

  } else if(location.href.search('subs') > 0){
    customerDetails.classList.add('-hidden');
    customerSubscriptions.classList.remove('-hidden');
    navigations[0].classList.remove('-current');
    navigations[1].classList.add('-current');
  }
}

// Open and close new subscription
export function openCloseNewSub() {
  let button = document.getElementById('newSubscription');
  let resetButton = document.getElementsByName('resetSubscription')[0];
  let submitButton = document.getElementsByName('submitSubscription')[0];
  let newSubscription = document.getElementsByClassName('a-newSubscriptionForm')[0];

  button.addEventListener('click', function() {
    newSubscription.classList.remove('-hidden');
    button.classList.add('-hidden');
  });

  resetButton.addEventListener('click', function() {
    newSubscription.classList.add('-hidden');
    button.classList.remove('-hidden');
  });

  submitButton.addEventListener('click', function() {
    newSubscription.classList.add('-hidden');
    button.classList.remove('-hidden');
  });
}

// Popup for delete confirmation when deleting a customer
export function deleteConfirmation() {
  let deleteButton = document.getElementsByName('deleteCustomer')[0];
  let cancelButton = document.getElementsByName('confirmCancel')[0];
  let confirmationPopup = document.getElementById('deleteConfirmation');

  deleteButton.addEventListener('click', function() {
    confirmationPopup.classList.remove('-hidden');

    cancelButton.addEventListener('click', function() {
      confirmationPopup.classList.add('-hidden');
    });
  });
}

// Modify a customers details.
export function changeCostumer() {
  let changeCostumerButtons = document.getElementById('customerSidebarChangeBtns');
  let saveChanges = document.getElementById('customerSidebarSaveBtns');
  let changeCustomerButton = document.getElementsByName('changeCostumer')[0];
  let cancelChanges = document.getElementsByName('cancelChanges')[0];

  let customerDetails = document.getElementById('customerDetails');
  let changeCustomerDetails = document.getElementById('changeCustomerDetails');

  changeCustomerButton.addEventListener('click', function() {
    location.href =`customer.php?id=${getCustomerId()}&tab=info&modify=true`;
  });

  cancelChanges.addEventListener('click', function() {
    location.href =`customer.php?id=${getCustomerId()}&tab=info`;
  });

  if(location.href.search('modify=true') > 0) {
    changeCostumerButtons.classList.add('-hidden');
    saveChanges.classList.remove('-hidden');
    customerDetails.classList.add('-hidden');
    changeCustomerDetails.classList.remove('-hidden');
  }
}

// When a new user is registred the url will contain new=true.
// This open's the new subscription element.
// In other words. When the user get redirected to to the created user. The "new subscription" button dosen't need to be clicked.
export function newCustomer() {
  if(location.href.search('new=true') > 0) {
    console.log('hej');
    let button = document.getElementById('newSubscription');
    let newSubscription = document.getElementsByClassName('a-newSubscriptionForm')[0];

    button.classList.add('-hidden');
    newSubscription.classList.remove('-hidden');
  }
}
