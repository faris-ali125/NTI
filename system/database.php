<?php
session_start();
$users=[
       (object)[
           'mail'=>'faris@yahoo',
           'pass'=>11111,
       ],

       (object)[
           'pass'=>22222,
           'mail'=>'tant@yahoo',
       ],

       (object)[
           'pass'=>33333,
           'mail'=>'bnt@yahoo',
       ],

    ];


// echo ($_SESSION['passs']);

foreach($users as $user){
    if($user->pass==$_SESSION['passs'] && $user->mail==$_SESSION['mails']){
        header("location:home.php");die;
    }else{header("location:login.php");}
}


?>