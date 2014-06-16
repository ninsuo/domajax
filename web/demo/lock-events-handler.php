<?php

if (!array_key_exists('action', $_REQUEST)) {
    die();
}

sleep(3);

switch ($_REQUEST['action']) {
    case 'success':
        break;
    case 'failure':
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 This server error is a test', true, 500);
        break;
    case 'empty':
        break;
    case 'not-empty':
        echo 'This is a response';
        break;
    default:
        break;
}
