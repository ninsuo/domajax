<?php

echo '<pre>';

echo "Page called\n";
echo htmlentities($_SERVER['REQUEST_URI']);
echo PHP_EOL . PHP_EOL;

echo '$_GET variable contains:' . PHP_EOL;
echo htmlentities(var_export($_GET, true));
