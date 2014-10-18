<?php

if (!isset($argv[1]))
{
    die("{$argv[0]} <option name>\n");
}

$demos = "../../../web/demo";

$opt = $argv[1];

$html = <<< EOT
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="robots" content="index, follow, all"/>
        <meta name="author" content="Alain Tiemblo"/>
        <meta name="description" content="domajax is a free jQuery plugin that gives you tools to add ajax calls within your application, without a piece of javascript."/>
        <meta name="keywords" content="domajax, ajax, jquery, plugin, javascript"/>

        <title>{$opt} - Documentation - domajax - Use Ajax powerfulness without JavaScript</title>

        <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="../css/demo.css" rel="stylesheet" media="screen">
    </head>
    <body>

        <!-- demo starts here -->

        <div id="inputs">
            <label for="name">Enter your name</label>
            <input type="text" id="name" name="name" />
            <br/>
            <input
                type="button"
                value="Send"
                class="btn domajax click"
                data-endpoint="{$opt}-handler.php"
                data-input="#inputs"
                data-output="#output"
             />
        </div>

        <div id="output"></div>

        <!-- demo ends here -->

        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap/bootstrap.js"></script>
        <script src="../js/domajax/jquery.domajax.js"></script>
    </body>
</html>

EOT;

file_put_contents("{$demos}/{$opt}-view.html", $html);

$handler = <<< EOT
<?php

date_default_timezone_set('Europe/Paris');

if (array_key_exists('name', \$_REQUEST))
{
    \$name = htmlentities(trim(\$_REQUEST['name']));
    \$time = date("H:i:s");
    echo "Hello {\$name}, in France, time is {\$time}.";
}

EOT;

file_put_contents("{$demos}/{$opt}-handler.php", $handler);

echo "Ok! Use {{ macros.demo_tabs('{$opt}', true) }} where you want.\n";