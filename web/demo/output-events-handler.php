<?php

if (!array_key_exists('action', $_REQUEST)) {
    die();
}

switch ($_REQUEST['action']) {
    case 'success':
        echo 'A success response';
        break;
    case 'failure':
        header($_SERVER['SERVER_PROTOCOL'] . " 500 a fake error occured!", true, 500);
        break;
    case 'empty':
        break;
    case 'not-empty':
        echo 'A non-empty response';
        break;
    default:
        break;
}
