/*
* File name: user.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*/

// Script for the user popup that appears when the user-image is clicked.
export function popup() {
  let headerUserInfoElem = document.getElementById('headerUserInfo');
  let headerUserInfoPopup = document.getElementById('userPopup');
  let userPopupBlanket = document.getElementById('userPopupBlanket');

  headerUserInfoElem.addEventListener('click', function() {
    headerUserInfoPopup.style.visibility = 'visible';
    userPopupBlanket.style.visibility = 'visible';
  });

  userPopupBlanket.addEventListener('click', function() {
    headerUserInfoPopup.style.visibility = 'hidden';
    userPopupBlanket.style.visibility = 'hidden';
  });
}
