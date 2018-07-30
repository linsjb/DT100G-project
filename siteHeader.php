<?php
/*
* File name: siteHeader.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* Top of evey page.
* Needed throughout the whole system.
*
*/
require_once "functions.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TireCare</title>
</head>
<body id="<?= $currentElementId ?>">
  <div class="o-container">
