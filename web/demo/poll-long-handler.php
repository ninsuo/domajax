<?php

/*
 * We are simulating a chatroom system using the session.
 */

date_default_timezone_set('Europe/Paris');
session_start();

if (!array_key_exists('chat', $_SESSION)) {
    $_SESSION['chat'] = array ();
}

if (array_key_exists('message', $_POST)) {
    // We posted a message in the chatroom
    $_SESSION['chat'] = array_slice($_SESSION['chat'], 0, 15);
    array_unshift($_SESSION['chat'], date("Y-m-d H:i:s") . ' ' . htmlentities(substr($_POST['message'], 0, 80)));
} else {
    // We're inside the long-polling, released after 10 seconds
    // In real life, this "sleep()" is replaced by listeners to send new messages in real-time
    sleep(1);
}

foreach ($_SESSION['chat'] as $message) {
    echo $message, '<br/>';
}
