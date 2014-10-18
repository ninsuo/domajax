<?php

session_start();

if (!array_key_exists('ajax-counter', $_SESSION)) {
    $_SESSION['ajax-counter'] = 0;
}

$_SESSION['ajax-counter']++;

echo "You made this ajax call ", $_SESSION['ajax-counter'], ' times.';
