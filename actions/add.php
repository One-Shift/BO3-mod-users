<?php
$form_tpl = functions::mdl_load("templates-e/add/form.tpl");

$form = str_replace(
[
  "{c2r-lg-name}",
  "{c2r-lg-email}",
  "{c2r-lg-pass}",
  "{c2r-lg-confirm}",
  "{c2r-lg-rank}",
  "{c2r-lg-owner}",
  "{c2r-lg-manager}",
  "{c2r-lg-member}",
  "{c2r-lg-code}",
  "{c2r-lg-status}",
  "{c2r-btn-save}"
],
[
  $mdl_lang["add"]["name"],
  $mdl_lang["add"]["email"],
  $mdl_lang["add"]["pass"],
  $mdl_lang["add"]["confirm"],
  $mdl_lang["add"]["rank"],
  $mdl_lang["add"]["owner"],
  $mdl_lang["add"]["manager"],
  $mdl_lang["add"]["member"],
  $mdl_lang["add"]["code"],
  $mdl_lang["add"]["status"],
  $mdl_lang["add"]["save"],
],
$form_tpl
);

$mdl=str_replace(
  [
    "{c2r-adduser-form}"
  ],
  [
    $form
  ],
  functions::mdl_load("templates/add.tpl")
);


include "pages/module-core.php";
