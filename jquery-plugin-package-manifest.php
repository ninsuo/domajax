<?php

$array = array(
        'name' => 'domajax',
        'version' => '2.0.0',
        'title' => 'domajax.com - use Ajax without JavaScript',
        'author' => array(
                'name' => 'Alain Tiemblo',
                'email' => 'ninsuo@gmail.com',
                'url' => 'http://www.ninsuo.com',
        ),
        'licenses' => array(
                array(
                        'type' => 'MIT',
                        'url' => 'http://opensource.org/licenses/MIT',
                ),
        ),
        'dependencies' => array(
                'jquery' => '~1.7.2',
                'jquery-ui' => '~1.8.17',
        ),
        'description' => "Domajax is a free jQuery plugin that give you tools to add ajax calls within your application, without a piece of javascript. It uses HTML5's data- attribute, and jQuery's .on() method to handle your ajax interactions. ",
        'keywords' => explode(', ', 'domajax, ajax, jquery, plugin, javascript, dom, html, symfony2'),
        'homepage' => 'http://www.domajax.com',
        'docs' => 'http://www.domajax.com',
        'demo' => 'http://www.domajax.com',
        'download' => 'https://github.com/Ninsuo/domajax/tree/2.0/web/js/domajax',
        'bugs' => 'https://groups.google.com/d/forum/domajax',
);


header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

header("Content-Disposition: attachment;filename=domajax.jquery.json");
header("Content-Transfer-Encoding: binary");

echo json_encode($array);
