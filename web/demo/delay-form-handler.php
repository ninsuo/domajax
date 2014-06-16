<?php

$value = '';
if (count($_REQUEST) > 0) {
    $value = htmlentities(trim(reset($_REQUEST)));
}

echo "You typed: ", $value;