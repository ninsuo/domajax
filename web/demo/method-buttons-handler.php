<?php

date_default_timezone_set('Europe/Paris');

echo date('H:i:s'), ' You are using the ', htmlentities($_SERVER['REQUEST_METHOD']), ' method.';
