<?php

date_default_timezone_set('Europe/Paris');

if (array_key_exists('fruit', $_POST)) {
    echo 'You given the fruit: ', htmlentities($_POST['fruit']), ' (', date("H:i:s"), ')';
}
