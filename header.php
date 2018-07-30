<?php
/*
* File name: header.php
* Author: Linus Sjöbro
* E-mail: lisj1502@student.miun.se
*
* Description:
* The page header. Does not need to be included on all pages.
* Only on those pages where the sidebar and page-top is needed.
*/

require_once "sidebar.php";

// Get's the gravatar user email depending on the user email-address.
$userEmail = $_SESSION['userDetails'][0]->email;
$default = $_SERVER['DOCUMENT_ROOT'] . '/images/defaultUserImage';
$size = 40;
$grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($userEmail))) . "?d=mm" . "&s=" . $size;

// The logged in user full name
$userFullName = $_SESSION['userDetails'][0]->firstName . ' ' . $_SESSION['userDetails'][0]->lastName;
?>

<header class="o-header">
  <section class="m-headerUserInfo" id="headerUserInfo">
    <p class="m-headerUserInfo__name"><?php echo $userFullName ?></p>
    <p class="m-headerUserInfo__role">Administrator</p>
    <img src="<?php echo $grav_url ?>" alt="" class="m-headerUserInfo__img">
  </section>
<!-- .o-header -->
</header>

<div class="o-clickBlanket" id="userPopupBlanket"></div>

<nav class="o-userPopup" id="userPopup">
  <div class="m-popupArrow">
  </div>
  <ul class="m-userPopupNavList">
    <li class="m-userPopupNavList__item">
      <a href="" class="a-userPopupNavListBtn">
        <i class="a-userPopupNavListBtn__icon material-icons">settings</i>
        Profile settings
      </a>
    </li>
    <li class="m-userPopupNavList__item">
      <a href="logout.php" class="a-userPopupNavListBtn">
        <i class="a-userPopupNavListBtn__icon material-icons">favorite</i>
        Logout
      </a>
    </li>

  </ul>
  <!-- .o-userPopup -->
</nav>
