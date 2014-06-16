<?php
sleep(3);
?>
<p>$_POST contains:</p>
<pre><?php echo htmlentities(var_export($_POST, true)); ?></pre>