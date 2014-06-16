<?php

if ((array_key_exists('firstname', $_REQUEST))
    && (array_key_exists('lastname', $_REQUEST))
) {
    $firstname = htmlentities(trim($_REQUEST['firstname']));
    $lastname = htmlentities(trim($_REQUEST['lastname']));
    echo "Hello, {$firstname} {$lastname} !";
}
