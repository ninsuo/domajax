<?php

sleep(1);

$type = array_key_exists('type', $_GET) ? $_GET['type'] : null;

if ($type === 'codes') {
    $isFailure = rand() % 2;
    if ($isFailure) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 This server error is fake', true, 500);
    }
}

if ($type === 'content') {
    $isNotEmpty = rand() % 2;
    if ($isNotEmpty) {
        echo "ok!";
    }
}
