<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow, all"/>
    <meta name="author" content="Alain Tiemblo"/>
    <meta name="description" content="domajax is a free jQuery plugin that gives you tools to add ajax calls within your application, without a piece of javascript."/>
    <meta name="keywords" content="domajax, ajax, jquery, plugin, javascript"/>

    <title>data-confirm - Documentation - domajax - Use Ajax powerfulness without JavaScript</title>

    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/demo.css" rel="stylesheet" media="screen">
</head>
<body>

<p>
    This is a simple table displaying stored information (here, on the current session). <i>data-confirm</i> applies
    when you are inserting
    and deleting data.
</p>

<!-- demo starts here -->

<label for="insert">Enter an element</label>
<input type="text" id="insert" name="insert" value="Some stuff"/>
<br/>
<input
    type="button"
    value="Send"
    class="btn domajax click"
    data-endpoint="confirm-table-handler.php"
    data-input="#insert"
    data-output="#output"
    data-confirm="Insert a new entry in the table ?"
    />

<p>&nbsp;</p>

<?php

// getting table contents
ob_start();
include "confirm-table-handler.php";
$table = ob_get_clean();

?>

<br/>

<div id="output"><?php echo $table; ?></div>

<!-- demo ends here -->

<div class="go-back-home">
    <a href="http://domajax.fuz.org">Back to domajax's home</a>
</div>

<script src="../js/json2.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap/bootstrap.js"></script>
<script src="../js/domajax/jquery.domajax.js"></script>
</body>
</html>
