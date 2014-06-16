<?php

if (array_key_exists('my_div', $_REQUEST)) {
    $div_contents = htmlentities(trim($_REQUEST['my_div']));
    echo "Div contents = {$div_contents}";
}
