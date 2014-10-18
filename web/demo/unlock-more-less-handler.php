<?php

session_start();

if (!array_key_exists('more-less', $_SESSION)) {
    $_SESSION['more-less'] = rand(1, 100);
}

if (array_key_exists('number', $_REQUEST)) {
    $number = intval($_REQUEST['number']);

    if ($number > $_SESSION['more-less']) {
        // that's less => a 500 error
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    } elseif ($number < $_SESSION['more-less']) {
        // an empty response => that's more
        echo '';
    } else {
        // a non-empty response => that's it
        echo "a non-empty response";
        $_SESSION['more-less'] = rand(1, 100);
    }
}
