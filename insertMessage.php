<?php

session_start();
include 'classes.php';
if(isset($_POST['chatText']))
{
    $message = new chat();
    $message->setchatUserId($_SESSION['UserId']);
    $message->setchatText($_POST['chatText']);

    $message->insertChatMessage();
}

?>