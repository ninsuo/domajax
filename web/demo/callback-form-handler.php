<?php

if (array_key_exists('number', $_REQUEST)) {
    $number = trim($_REQUEST['number']);
    if (!is_numeric($number)) {
        echo "Well, JavaScript form validation is not enough but I took care of it! And you?";
    } else {
        echo "You entered number {$number}";
    }
}
