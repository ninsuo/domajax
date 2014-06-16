<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow, all"/>
    <meta name="author" content="Alain Tiemblo"/>
    <meta name="description" content="domajax is a free jQuery plugin that gives you tools to add ajax calls within your application, without a piece of javascript."/>
    <meta name="keywords" content="domajax, ajax, jquery, plugin, javascript"/>

    <title>data-output-json - Documentation - domajax - Use Ajax powerfulness without JavaScript</title>

    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/demo.css" rel="stylesheet" media="screen">
</head>
<body>

<p>
    A common ajax response contains a message and a result, two distinct
    information that must be displayed in different containers. <i>data-output-json</i>
    is made for this case: list your json attributes inside dom <i>data-output-json</i>,
    and for each one, add a corresponding <i>data-&lt;json key&gt;</i> whose values
    are jquery containers. For more details, watch out the Complete HTML and the PHP
    Handler tabs.
</p>

<!-- demo starts here -->

<label for="insert">Enter an element</label>
<input type="text" id="insert" name="insert" value="Some stuff"/>
<br/>
<input
    type="button"
    value="Send"
    class="btn domajax click"
    data-endpoint="output-json-message-handler.php"
    data-input="#insert"
    data-output-json="error confirm table"
    data-json-error="#errors"
    data-json-confirm=".confirmations"
    data-json-table="#contents"
    />

<p>&nbsp;</p>

<?php

// output is a json string
ob_start();
include "output-json-message-handler.php";
$json = ob_get_clean();
$obj = json_decode($json);

?>

<div id="messages">
    <div id="errors" style="color:red;"><?php echo $obj->error; ?></div>
    <div class="confirmations" style="color:green;"><?php echo $obj->confirm; ?></div>
</div>

<br/>

<div id="contents"><?php echo $obj->table; ?></div>

<!-- demo ends here -->

<div class="go-back-home">
    <a href="http://www.domajax.com">Back to domajax's home</a>
</div>

<script src="../js/json2.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap/bootstrap.js"></script>
<script src="../js/domajax/jquery.domajax.js"></script>
</body>
</html>
