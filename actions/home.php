<?php
$item_tpl = functions::mdl_load("templates-e/home/item.tpl");

$mdl=str_replace(
  [
    "{c2r-lg-gravatar-title}",
    "{c2r-lg-username-title}",
    "{c2r-lg-email-title}",
    "{c2r-lg-rank-title}",
    "{c2r-lg-status-title}",
    "{c2r-lg-date-title}",
    "{c2r-lg-action-title}",
    "{c2r-home-list}",
    "{c2r-lg-edit}"
  ],
  [
    $mdl_lang["list"]["gravatar-title"],
    $mdl_lang["list"]["username-title"],
    $mdl_lang["list"]["email-title"],
    $mdl_lang["list"]["rank-title"],
    $mdl_lang["list"]["status-title"],
    $mdl_lang["list"]["date-title"],
    $mdl_lang["list"]["action-title"],
    $item_tpl,
    $mdl_lang["list"]["edit"]
  ],
  functions::mdl_load("templates/home.tpl")
);

include "pages/module-core.php";
