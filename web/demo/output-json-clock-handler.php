<?php

date_default_timezone_set('Europe/Paris');

$obj = new stdClass();
$obj->year = date('Y');
$obj->month = date('m');
$obj->day = date('d');
$obj->hour = date("H");
$obj->min = date("i");
$obj->sec = date("s");
echo json_encode($obj);
