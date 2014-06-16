<?php

header($_SERVER['SERVER_PROTOCOL'] . ' 403 User should be logged-in', true, 403);

echo "As there is an error, this message will not appear...";