<?php

$value = '';
if (count($_REQUEST) > 0) {
    $value = htmlentities(trim(reset($_REQUEST)));
}

date_default_timezone_set('Europe/Paris');
$time = date("H:i:s");

echo "You typed: ", $value, ' ( ajax call time: ', $time, ' )';