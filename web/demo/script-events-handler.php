<?php

if (!array_key_exists('action', $_REQUEST)) {
    die();
}

switch ($_REQUEST['action']) {
    case 'success':
        break;
    case 'failure':
        header($_SERVER['SERVER_PROTOCOL'] . " 500 server went to bed, please come back later", true, 500);
        break;
    case 'empty':
        break;
    case 'not-empty':
        echo 'This is a response';
        break;
    default:
        break;
}
