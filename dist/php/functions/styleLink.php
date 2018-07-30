<?php
/*
* File name:  styleLink.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Function the easily add new css-files fo the system.
* Each call of the function give's a new link.
*
* Function-call is used in the functions.php file.
*/
function styleLink($href) {
  echo '<link rel="stylesheet" href="' . $href . '">';
}
?>
