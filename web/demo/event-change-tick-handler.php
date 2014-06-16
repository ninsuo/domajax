<?php

date_default_timezone_set('Europe/Paris');

$data = $_POST;

array_walk_recursive($data, function (&$elem) {
    $elem = htmlentities($elem);
});
?>

<p>$_POST contains:</p>
<pre><?php echo htmlentities(var_export($data, true)) ?></pre>
