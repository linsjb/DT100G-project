/*
* File name: subscriptions.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*/

import jsonRequest  from './jsonRequest';
import jsBarcode from 'jsbarcode';
import _ from 'lodash';

// Populate the tire option dropdowns with data from the database
export function populateTires() {
    populateTireManufacture();
    populateTireModel();
    populatetireDimensions();
}

// Populate the tire manufacture depending on the choosen tire type
function populateTireManufacture() {
  jsonRequest('jr_tires.php', function(payload) {
    let selectElement = document.getElementsByName('tireManufacture')[0];
    let radioButtons = Array.from(document.getElementsByName('tireType'));

    radioButtons.map((radioButton, index) => {
        radioButton.addEventListener('click', function() {
          // reset's the dropdown list
          selectElement.innerHTML = '';

          let manufactures = [];

          for (var i = 0; i < payload.length; i++) {
            if(radioButton.id === payload[i].tireType) {
              manufactures.push(payload[i].tireManufacture);
            }
          }

          // Get all unique manufactures from the payload.
          manufactures = Array.from(new Set(manufactures));

          // Insert manufactures in dropdown
          for (var i = 0; i < manufactures.length; i++) {
            let option = document.createElement('option');

            option.innerHTML = manufactures[i];
            option.value = manufactures[i];
            selectElement.appendChild(option);
          }

        });
    });
  });
}

// Populate the tire model depending on the tire manufacture
function populateTireModel() {
  let manufactureDropdown = document.getElementsByName('tireManufacture')[0];
  let modelDropdown = document.getElementsByName('tireModel')[0];

  manufactureDropdown.addEventListener('click', function() {
    // Empty dropdown
    modelDropdown.innerHTML = '';

    jsonRequest('jr_tires.php', function(payload) {
      let selectedManufacture = manufactureDropdown.options[manufactureDropdown.selectedIndex];
      let models = [];

      for (var i = 0; i < payload.length; i++) {
        if(selectedManufacture.value === payload[i].tireManufacture) {
          models.push(payload[i].tireModel);
        }
      }

      // Get unique models
      models = Array.from(new Set(models));

      // Insert models in dropdown
      for (var j = 0; j < models.length; j++) {
        let option = document.createElement('option');
        option.innerHTML = models[j];
        option.value = models[j];
        modelDropdown.appendChild(option);
      }
    });
  });

}

// Populate the tire dimensions depending on the tire model and manufacture.
function populatetireDimensions() {
  let manufactureDropdown = document.getElementsByName('tireManufacture')[0];
  let modelDropdown = document.getElementsByName('tireModel')[0];
  let dimensionsDropdown = document.getElementsByName('tireDimensions')[0];

  modelDropdown.addEventListener('click', function() {

    // Empty dropdown
    dimensionsDropdown.innerHTML = '';

    jsonRequest('jr_tires.php', function(payload) {
      let selectedModel = modelDropdown.options[modelDropdown.selectedIndex];
      let selectedManufacture = manufactureDropdown.options[manufactureDropdown.selectedIndex];

      let dimensions = [];

      for (var i = 0; i < payload.length; i++) {
        if(selectedModel.value === payload[i].tireModel && selectedManufacture.value === payload[i].tireManufacture) {
          dimensions.push(payload[i].tireDimensions);
        }
      }

        // Get unique dimensions
        dimensions = Array.from(new Set(dimensions));
        console.log(dimensions);

        for (var j = 0; j < dimensions.length; j++) {
          let option = document.createElement('option');
          option.innerHTML = dimensions[j];
          option.value = dimensions[j];
          dimensionsDropdown.appendChild(option);
        }
    });
  });
}

// Generate the barcode for each subscription
export function subscriptionBarcode() {
  jsBarcode(".a-subscription__barcode").init();
}

// Logic and popup to delete a subscription.
export function deleteSubscription() {
  let deleteButtons = Array.from(document.getElementsByClassName('a-subscription__delete'));
  let cancelButton = document.getElementsByName('delSubCancel')[0];

  let popup = document.getElementById('deleteSubscription');

  deleteButtons.map((deleteButton) => {
    deleteButton.addEventListener('click', function() {
      // let subscriptionId =  this.parentNode.id.split('-').pop().trim();
      // let customerId = document.getElementsByClassName('o-content')[0].id.split('-').pop().trim();


      // location.href = `customer.php?id=${customerId}&subId=${subscriptionId}&tab=subs`;

      popup.classList.remove('-hidden');
    });
  });

  cancelButton.addEventListener('click', function() {
    popup.classList.add('-hidden');
  });
}
