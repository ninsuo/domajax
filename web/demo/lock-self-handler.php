<?php

date_default_timezone_set('Europe/Paris');

// give you time to see the "readonly" state of the button
sleep(3);

$time = date("H:i:s");
echo "In France, time is {$time}.";
