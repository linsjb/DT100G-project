<?php
/*
* File name: js_inventory.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Get's data from DB for the Admin dashboard chart.
* A json_encode is used to later handle the data with JavaScript.
*/

include '../classes/connection.class.php';

$db = new Connection;

$query = "SELECT COUNT(id) takenSlots FROM subscriptions";

$subsData = $db->select($query);

echo json_encode($subsData);
?>
