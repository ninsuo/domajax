<?php

$rawBody = file_get_contents('php://input');
echo "Raw body is: " . htmlentities($rawBody);