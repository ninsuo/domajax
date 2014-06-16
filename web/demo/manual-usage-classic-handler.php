<?php

date_default_timezone_set('Europe/Paris');

if (array_key_exists('name', $_REQUEST)) {

    sleep(1);

    $name = htmlentities(trim($_REQUEST['name']));
    $time = date("H:i:s");
    echo "Hello {$name}, in France, time is {$time}.";
}
