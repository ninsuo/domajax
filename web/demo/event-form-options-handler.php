<?php

if (array_key_exists('name', $_REQUEST)) {
    sleep(5);
    $name = htmlentities(trim($_REQUEST['name']));
    echo "Hello, {$name} !";
}
