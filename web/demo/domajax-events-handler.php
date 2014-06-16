<?php

sleep(1);

$response = 'Done!';

if (array_key_exists('action', $_REQUEST)) {
    switch ($_REQUEST['action']) {
        case 'success':
            break;
        case 'failure':
            header($_SERVER['SERVER_PROTOCOL'] . " 500 server is thinking about the response, come back within 15M years ", true, 500);
            break;
        case 'empty':
            $response = '';
            break;
        case 'not-empty':
            break;
        default:
            break;
    }
}

echo $response;
