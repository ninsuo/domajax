<?php

session_start();

if (!array_key_exists('counter', $_SESSION))
{
    $_SESSION['counter'] = 0;
}

echo "Count = ", $_SESSION['counter']++;
