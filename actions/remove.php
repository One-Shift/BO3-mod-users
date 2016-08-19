<?php
$user=new user();
if($_POST["inputRemove"]==1)
{
    if($user->delete($id))
    {
        echo "<script>alert('".$id."')</script>";
        $remove_message=$mdl_lang["remove"]["message-success"];
        $success=1;
    }

    else
    {
        $remove_message=$mdl_lang["remove"]["message-insuccess"];
        $success=0;
    }

    $mdl=  str_replace(
    [
      "{c2r-removed-message}"
    ],
    [
        $remove_message
    ],
    functions::mdl_load("templates/remove.tpl")
    );

    if($success==1)
    {
        header( "refresh:3;url=http://ms.critec.pt/0/en/users/" );
    }

    else
    {
        echo "<script>alert('nope')</script>";
    }
}

include "pages/module-core.php";
