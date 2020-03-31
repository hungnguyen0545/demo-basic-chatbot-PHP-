<?php

include 'classes.php';
$user = new User();

if(isset($_POST['UserName']) && isset($_POST['UserEmail']) && isset($_POST['UserPassword']))
{
    $user->setUserName($_POST['UserName']);
    $user->setUserEmail($_POST['UserEmail']);
    $user->setUserPassword(sha1($_POST['UserPassword']));

    $user->insertUsers();
    header("Location:index.php?success=1");
}
?>