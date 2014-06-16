<?php

if (array_key_exists('sample', $_REQUEST)) {
    $sample = htmlentities(trim($_REQUEST['sample']));

    $count = null;
    if ($sample === "Click me!") {
        $count = 1;
    } else {
        @sscanf($sample, "Clicked %d time(s)", $count);
        $count++;
    }
    echo "Clicked {$count} time(s)";
}
