<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow, all"/>
    <meta name="author" content="Alain Tiemblo"/>
    <meta name="description" content="domajax is a free jQuery plugin that gives you tools to add ajax calls within your application, without a piece of javascript."/>
    <meta name="keywords" content="domajax, ajax, jquery, plugin, javascript"/>

    <title>data-raw - Documentation - domajax - Use Ajax powerfulness without JavaScript</title>

    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/demo.css" rel="stylesheet" media="screen">
</head>
<body>

<p>
    This sample simulates REST web services, by using exotic HTTP methods and by writing raw data in the HTTP request
    body.
    If you have a debugger such as Firebug or Chrome's inspector, that's time to open it to see what's going on here.
</p>

<!-- demo starts here -->

<label for="insert">Enter an element</label>
<input type="text" id="insert" name="insert"/>
<br/>
<input
    type="button"
    value="Store"
    class="btn domajax click"
    data-endpoint="raw-rest-handler.php"
    data-method="put"
    data-raw="#insert"
    data-output="#contents"
    />

<br/><br/>

<div id="contents">
    <?php include "raw-rest-handler.php"; ?>
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
