<?php

if (array_key_exists('name', $_GET)) {
    $name = htmlentities(trim($_GET['name']));
    echo "Your name {$name} comes from the \$_GET variable.";
}
