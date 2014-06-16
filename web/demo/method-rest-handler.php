<?php

session_start();

// inputs

$method = @$_SERVER['REQUEST_METHOD'];
//$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1)); // useless in our demo, but may help you in real life.
$body = (in_array($method, array('GET', 'HEAD')) ? @$_SERVER['QUERY_STRING'] : file_get_contents('php://input'));

// storage

if (!array_key_exists('rest_pool', $_SESSION)) {
    $_SESSION['rest_pool'] = array();
}

// shortcuts

$pool = $_SESSION['rest_pool'];
$variable = htmlentities(substr($body, 0, 10));
$response = '';

// business

switch ($method) {
    // add a variable
    case 'PUT':
        if (array_key_exists($variable, $pool)) {
            $response = "Variable {$variable} already exists.";
        } else {
            $pool[$variable] = 0;
            $pool = array_slice($pool, -10);
            $response = "Created the {$variable} variable.";
        }
        break;

    // increment a variable
    case 'POST':
        if (array_key_exists($variable, $pool)) {
            $pool[$variable]++;
        }
        break;

    // returns value of a variable
    case 'GET':
        if (array_key_exists($variable, $pool)) {
            $response = "Variable {$variable} contains {$pool[$variable]}.";
        } else {
            $response = "Variable {$variable} not found!";
        }
        break;

    // decrement a variable
    case 'HEAD':
        if (array_key_exists($variable, $pool)) {
            $pool[$variable]--;
        }
        break;

    // remove one kind of variable
    case 'DELETE':
        if (array_key_exists($variable, $pool)) {
            unset($pool[$variable]);
            $response = "Removed {$variable} variable.";
        } else {
            $response = "Variable {$variable} not found!";
        }
        break;

    // gives status
    case 'OPTIONS':
        if (count($pool) > 0) {
            $response = "All your variables:\n";
            foreach ($pool as $variable => $count) {
                $response .= "{$variable}: {$count}\n";
            }
        } else {
            $response = "Variable {$variable} not found!";
        }
        break;
    default:
        $response = "I don't understand what you want to do.";
        break;
}

// output

$_SESSION['rest_pool'] = $pool;
echo nl2br($response);
