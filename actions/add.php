<?php
$form_tpl = functions::mdl_load("templates-e/add/form.tpl");
$message_tpl = functions::mdl_load("templates-e/message.tpl");

$returnMessage=null;
$mail_exists=FALSE;
$user_exists=FALSE;

if (isset($_POST["save"]))
{
  $returnMessage=null;

  $user = new user();
/*----------------------------VERIFICATIONS BEGINS----------------------------*/
  /*----------Username----------*/
  if (isset($_POST["inputName"]) && !empty($_POST["inputName"]))
  {
    $user->setUsername($_POST["inputName"]);
    $username_success = true;

    /*Verifies if this username doesn't exist*/

    if($user->existUserByName()!=0)
    {
        $returnMessage = str_replace
        (
          "{c2r-lg-message}",
          $mdl_lang["username"]["exists"],
          $message_tpl
        );
        $user_exists=TRUE;
    }
  }

  /*----------Email----------*/
  if (isset($_POST["inputEmail"]) && !empty($_POST["inputEmail"]))
  {
    $user->setEmail($_POST["inputEmail"]);
    $email_success = true;

    /*Verifies if this email doesn't exist*/
    if($user->existUserByEmail()!=0)
    {
        $returnMessage = str_replace
        (
          "{c2r-lg-message}",
          $mdl_lang["mail"]["exists"],
          $message_tpl
        );
        $mail_exists=TRUE;
    }
  }

  /*----------Password----------*/
  if (isset($_POST["inputPass"]) && !empty($_POST["inputPass"]))
  {
    if ($_POST["inputPass"] == $_POST["inputConfirm"])
    {
      $user->setPassword($_POST["inputPass"]);
      $password_success = true;
    }
    else
    {
      $returnMessage .= str_replace(
                "{c2r-lg-message}",
                $mdl_lang["pass"]["check_failure"],
                $message_tpl
            );
    }
  }

  /*Fields that don't require verification - Rank, Code, Status, Date and Date Update*/
  if(isset($password_success) && isset($email_success) && isset($username_success) && $mail_exists==FALSE && $user_exists==FALSE)
  {
    $user->setRank($_POST["inputRank"]);
    $user->setCode($_POST["inputCode"]);
    $user->setStatus($_POST["inputStatus"]);
    $user->setDate();
    $user->setDateUpdate();
    $user->setUserKey();

  /*----------------------------VERIFICATIONS ENDS----------------------------*/

  /*----------------------------INSERT BEGINS----------------------------*/

      if($user->insert())
      {
          $returnMessage = str_replace (
            [
                "{c2r-message-type}",
                "{c2r-lg-message}"
            ],
            [
                "success",
                $mdl_lang["adduser"]["success"]
            ],
            $message_tpl
        );
      }

      else
      {
          print_r($_POST);
        $returnMessage = str_replace (
            [
                "{c2r-message-type}",
                "{c2r-lg-message}"
            ],
            [
                "danger",
                $mdl_lang["adduser"]["failure"]
            ],
            $message_tpl
        );
    }

  }
}

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
  "{c2r-btn-save}",
  "{c2r-lg-owner-value}",
  "{c2r-lg-manager-value}",
  "{c2r-lg-member-value}"
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
  $mdl_lang["add"]["owner-value"],
  $mdl_lang["add"]["manager-value"],
  $mdl_lang["add"]["member-value"],
],
$form_tpl
);

$mdl=str_replace(
  [
      "{c2r-return-message}",
      "{c2r-adduser-form}"
  ],
  [
      $returnMessage,
      $form
  ],
  functions::mdl_load("templates/add.tpl")
);

include "pages/module-core.php";
