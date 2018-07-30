/*
* File name: jsonREquest.js
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*/

/*
* Function to fetch data via a JSON_request from a given PHP file.
* The callback (data) is returned
*/
export default function jsonRequest(file, callback) {
  var request = new XMLHttpRequest();
  request.open("get", "./dist/php/jsonRequests/" + file, true);

  request.onreadystatechange = function() {
    if(request.readyState == 4 && request.status == 200) {
      callback(JSON.parse(request.responseText));
    }
  };

  request.send();
}
