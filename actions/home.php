<?php
$item_tpl = functions::mdl_load("templates-e/home/item.tpl");
$list=null;
/*----------------------------------------------------- FETCHING USER DATA FROM DATABASE - BEGINS -----------------------------------------------------*/

$user = new user();

$user_list=$user->returnAllUsers();
if (count($user_list) != 0)
{
    foreach ($user_list as $user)
    {
        $user_mail=md5($user->email);

        $list.=str_replace(
            [
                "{c2r-user-id}",
                "{c2r-md5-mail}",
                "{c2r-username}",
                "{c2r-email}",
                "{c2r-rank}",
                "{c2r-status}",
                "{c2r-date}"
            ],
            [
                $user->id,
                $user_mail,
                $user->username,
                $user->email,
                $user->rank,
                $user->status,
                $user->date
            ],
            $item_tpl
        );
    }
}

/*----------------------------------------------------- FETCHING USER DATA FROM DATABASE - ENDS   -----------------------------------------------------*/

$mdl=str_replace(
  [
      "{c2r-lg-add-btn}",
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
      $mdl_lang["list"]["add-btn"],
      $mdl_lang["list"]["gravatar-title"],
      $mdl_lang["list"]["username-title"],
      $mdl_lang["list"]["email-title"],
      $mdl_lang["list"]["rank-title"],
      $mdl_lang["list"]["status-title"],
      $mdl_lang["list"]["date-title"],
      $mdl_lang["list"]["action-title"],
      $list,
      $mdl_lang["list"]["edit"]
  ],
  functions::mdl_load("templates/home.tpl")
);

include "pages/module-core.php";
