<?php

if (array_key_exists('name', $_REQUEST)) {
    $name = htmlentities(trim($_REQUEST['name']));
    echo "Hello, {$name} !";
}
