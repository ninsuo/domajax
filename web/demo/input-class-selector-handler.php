<?php

if ((array_key_exists('param1', $_REQUEST)) && (array_key_exists('param2', $_REQUEST))) {
    $param1 = htmlentities(trim($_REQUEST['param1']));
    $param2 = htmlentities(trim($_REQUEST['param2']));
    echo "param 1 = {$param1}, param 2 = {$param2}.";
}
