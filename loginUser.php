<?php
session_start();
include 'classes.php';

if(isset($_POST['UserEmail']) && isset($_POST['UserPassword']))
{
    $user = new User();
    $user->setUserEmail($_POST['UserEmail']);
    $user->setUserPassword(sha1($_POST['UserPassword']));
    if($user->loginUser() == true)
    {
        $_SESSION['UserId'] = $user->getUserId();
        $_SESSION['UserName'] = $user->getUserName();
        $_SESSION['UserEmail'] = $user->getUserEmail();
    }
}
?>