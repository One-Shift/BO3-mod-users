<?php
$form_tpl = functions::mdl_load("templates-e/edit/form.tpl");
$message_tpl = functions::mdl_load("templates-e/message.tpl");
$user = new user();

$returnMessage = null;

$checked = null;
$ownerSelected = null;
$managerSelected = null;
$memberSelected = null;

/*FILLS USER INFO ON THE LEFT SIDE MENU - BEGINS*/
$user->setId($id);

$userData = $user->returnOneUser();

$user_mail_md5 = md5($userData["email"]);
$userName = $userData["username"];
$userMail = $userData["email"];
$userRank = $userData["rank"];
$userCode = $userData["code"];
$userStatus = $userData["status"];
$userKey = $userData["user_key"];
$userDate = $userData["date"];
$userPassword = $userData["password"];



//echo "<script>alert('".$userRank."')</script>";

if ($userRank == "owner") {
    $rank = "Owner";
    $ownerSelected = "selected";
} else if ($userRank == "manager") {
    $rank = "Manager";
    $managerSelected = "selected";
} else {
    $rank = "Member";
    $memberSelected = "selected";
}

/*FILLS USER INFO ON THE LEFT SIDE MENU - ENDS*/

/*USER CHANGES - BEGINS*/

if (isset($_POST["save"]))/*Verifies if "save" button was clicked*/ {

    if ($_POST["inputName"] != null || $_POST["inputEmail"] != null || $_POST["inputNewpass"] != null || $_POST["inputCode"] != null)//verifies if user has filled at least one of the fields
    {
        if(!isset($_POST["inputStatus"]) || empty($_POST["inputStatus"]))
        {
            $_POST["inputStatus"]="0";
        }

        $user->setUsername($_POST["inputName"]);
        $user->setEmail($_POST["inputEmail"]);
        $user->setRank(strtolower($_POST['inputRank']));
        $user->setCode($_POST["inputCode"]);
        $user->setStatus($_POST["inputStatus"]);
        $user->setUserKey($userKey);
        $user->setDate($userDate);
        $user->setDateUpdate();
        $user->setOldPassword($userData["password"]);

        if ($user->update()) {
            $userMail = $_POST["inputEmail"];
            $userName = $_POST["inputName"];
            $userCode = $_POST["inputCode"];
            $userRank = $_POST["inputRank"];
            $userStatus = $_POST["inputStatus"];

            $returnMessage = str_replace(
                [
                    "{c2r-message-type}",
                    "{c2r-lg-message}",
                ],
                [
                    "success",
                    $mdl_lang["edit"]["success"],
                ],
                $message_tpl
            );
        } else {
            $returnMessage = str_replace(
                [
                    "{c2r-message-type}",
                    "{c2r-lg-message}",
                ],
                [
                    "danger",
                    $mdl_lang["edit"]["fail"],
                ],
                $message_tpl
            );
        }
    } //verifies if user has filled at least one of the fields - end

    else//verifies if user hasn't filled at least one of the fields
    {

    }

/*PASSWORD*/

    if(isset($_POST["inputNewpass"]) && !empty($_POST["inputNewpass"]))
    {
        if (isset($_POST["inputConfirm"]) && !empty($_POST["inputConfirm"])&& $_POST["inputConfirm"]==$_POST["inputNewpass"])
        {
            $user->setPassword($_POST["inputNewpass"]);
        }
        else
        {
            $returnMessage = str_replace(
                [
                    "{c2r-message-type}",
                    "{c2r-lg-message}",
                ],
                [
                    "danger",
                    $mdl_lang["edit"]["no-match"],
                ],
                $message_tpl
            );
        }
    }



}/*Verifies if "save" button was clicked - end*/

if ($userStatus == "1") {
    $checked = "checked";
}

/*USER CHANGES - ENDS*/
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

        "{c2r-owner-selected}",
        "{c2r-manager-selected}",
        "{c2r-member-selected}",

        /*FORM VALUES*/
        "{c2r-username}",
        "{c2r-email}",
        "{c2r-code}",
        "{c2r-status-checked}"
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


        $ownerSelected,
        $managerSelected,
        $memberSelected,

        /*FORM VALUES*/
        $userName,
        $userMail,
        $userCode,
        $checked
    ],
    $form_tpl
);

$mdl = str_replace(
    [
        "{c2r-return-message}",
        "{c2r-user-id}",
        "{c2r-lg-sure}",
        "{c2r-lg-remove}",
        "{c2r-edituser-form}",
        "{c2r-lg-check-remove}",

        "{c2r-md5-mail}",
        "{c2r-username}",
        "{c2r-email}",
        "{c2r-rank}",
        "{c2r-code}"
    ],
    [
        $returnMessage,
        $id,
        $mdl_lang["edit"]["sure"],
        $mdl_lang["edit"]["remove"],
        $form,
        $mdl_lang["edit"]["sure"],


        $user_mail_md5,
        $userName,
        $userMail,
        $userRank,
        $userCode
    ],
    functions::mdl_load("templates/edit.tpl")
);

include "pages/module-core.php";
