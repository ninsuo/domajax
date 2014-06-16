<?php

$test = array_key_exists('test', $_GET) ? $_GET['test'] : null;

if ($test === 'blue') {
    echo "I am highlighting in blue.";
}

if ($test === 'nohighlight') {
    echo "I am highlighting by default.";
}

if ($test === 'nonempty') {
    echo "But unfortunately, response is not empty :-)";
}

