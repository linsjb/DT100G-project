<?php
/*
* File name: js_tires.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Collect data form tires table.
* The data is then used with JavaScript. 
*
*/
include '../classes/connection.class.php';

$db = new Connection;

$query = "SELECT * from tires";

$tireData = $db->select($query);

echo json_encode($tireData);
?>
