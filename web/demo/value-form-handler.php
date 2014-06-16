<?php

date_default_timezone_set('Europe/Paris');

$fruit = array_key_exists('fruit', $_POST) ? htmlentities($_POST['fruit']) : '';
$vegetable = array_key_exists('vegetable', $_POST) ? htmlentities($_POST['vegetable']) : '';
$time = date("H:i:s");

echo "You given fruit {$fruit} and vegetable {$vegetable} ({$time})";