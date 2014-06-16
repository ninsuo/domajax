<?php

sleep(1);

$page = htmlentities(trim(array_key_exists('page', $_REQUEST) ? $_REQUEST['page'] : ''));

switch ($page) {
    case 'weather':
        $weathers = array('rainy', 'cloudy', 'sunny');
        echo "Weather will be: " . $weathers[rand() % 2];
        break;

    case 'temperature':
        echo "Temperature will be: " . (30 + rand() % 10);
        break;

    default:
        break;
}
