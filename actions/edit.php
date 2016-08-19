<?php
$form_tpl = functions::mdl_load("templates-e/edit/form.tpl");

$form = str_replace(
[
  "{c2r-lg-name}",
  "{c2r-lg-email}",
  "{c2r-lg-newpass}",
  "{c2r-lg-confirm}",
  "{c2r-lg-rank}",
  "{c2r-lg-owner}",
  "{c2r-lg-manager}",
  "{c2r-lg-member}",
  "{c2r-lg-code}",
  "{c2r-lg-status}",
  "{c2r-btn-save}",

],
[
  $mdl_lang["edit"]["name"],
  $mdl_lang["edit"]["email"],
  $mdl_lang["edit"]["new_pass"],
  $mdl_lang["edit"]["confirm"],
  $mdl_lang["edit"]["rank"],
  $mdl_lang["edit"]["owner"],
  $mdl_lang["edit"]["manager"],
  $mdl_lang["edit"]["member"],
  $mdl_lang["edit"]["code"],
  $mdl_lang["edit"]["status"],
  $mdl_lang["edit"]["save"],

],
$form_tpl
);

$mdl=str_replace(
  [
    "{c2r-user-id}",
    "{c2r-lg-sure}",
    "{c2r-lg-remove}",
    "{c2r-edituser-form}",
    "{c2r-lg-check-remove}"
  ],
  [
    $id,
    $mdl_lang["edit"]["sure"],
    $mdl_lang["edit"]["remove"],
    $form,
    $mdl_lang["edit"]["sure"]
  ],
  functions::mdl_load("templates/edit.tpl")
);

include "pages/module-core.php";
