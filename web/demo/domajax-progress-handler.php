<?php

/*
 * We are simulating progression information using the session.
 */

session_start();

if (!array_key_exists('progress', $_SESSION)) {
    $_SESSION['progress'] = 0;
}

if ($_SESSION['progress'] == 100) {
    unset($_SESSION['progress']);
    die();
}

$_SESSION['progress'] += 5;

echo $_SESSION['progress'];