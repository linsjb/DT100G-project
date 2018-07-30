/*
* File name: dashboard.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*/

import Chart from 'chart.js';
import jsonRequest from './jsonRequest.js';

// Creates chart's for the dashboard
// Data is given from the DB with JSON via js_invenroty.php file.
export function inventoryChart() {
  jsonRequest('jr_inventory.php', function(payload) {
    console.log(payload);

    let totalSlots = 150;
    let takenSlots = payload[0].takenSlots;
    let freeSlots = totalSlots - takenSlots;

    let chartArea = document.getElementById('dashboardInventoryChart');
    let inventoryChart = new Chart(chartArea, {
      type: 'horizontalBar',
      data: {
        labels: ['Free slots', 'Used slots'],
        datasets: [{
          label: 'Overview',
          data: [freeSlots, takenSlots],
          backgroundColor: [
            'rgba(0, 230, 118, 0.7)',
            'rgba(255, 82, 82, 0.7)'
          ]
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  });
}
