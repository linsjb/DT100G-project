/*
* File name: login.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*/

// Add interaction to the login form.
export default function login() {
  let inputs = Array.from(document.getElementsByClassName('a-loginFormGroup__input'));
  let labels = Array.from(document.getElementsByClassName('a-loginFormGroup__label'));

  inputs.map((input, index) => {
    input.addEventListener('focus', function() {
      labels[index].classList.add('focused');
    });

    input.addEventListener('blur', function() {
      if(!this.value) {
        labels[index].classList.remove('focused');
      }
    });
  });
}
