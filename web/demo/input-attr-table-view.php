<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow, all"/>
    <meta name="author" content="Alain Tiemblo"/>
    <meta name="description" content="domajax is a free jQuery plugin that gives you tools to add ajax calls within your application, without a piece of javascript."/>
    <meta name="keywords" content="domajax, ajax, jquery, plugin, javascript"/>

    <title>data-input-attr - Documentation - domajax - Use Ajax powerfulness without JavaScript</title>

    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/demo.css" rel="stylesheet" media="screen">
</head>
<body>

<p>
    This example shows you the most common usage of <i>input-attr</i> option.<br/>
    Here, we use <i>input-attr</i> on <b>delete</b> links as each link is attached to
    one entry identified by an id. You can see the html code by looking at the PHP handler.
</p>

<!-- demo starts here -->

<label for="insert">Enter an element</label>
<input type="text" id="insert" name="insert" value="some stuff"/>
<br/>
<input
    type="button"
    value="Send"
    class="btn domajax click"
    data-endpoint="input-attr-table-handler.php"
    data-input="#insert"
    data-output="#output"
    />

<p>&nbsp;</p>

<!-- Displays the data table -->
<div id="output">
    <?php include "input-attr-table-handler.php"; ?>
</div>

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
