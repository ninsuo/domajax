<?php

if ((array_key_exists('want_error', $_POST)) && ($_POST['want_error'] === 'yes')) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 This server error is fake', true, 500);
} else {
    // default 200 OK: success
}