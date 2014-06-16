<?php

echo "You posted :";
echo '<pre>';
echo htmlentities(var_export(array_slice($_POST, 0, 2), true));
echo '</pre>';