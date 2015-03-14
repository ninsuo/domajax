<?php

/*
 * To update on jquery:
 * - commit/push all updates
 * - increment version (ex: 2.0.5)
 * - git tag 2.0.5
 * - git push origin --tags
 */

$array = array(
        'name' => 'domajax',
        'version' => '2.1.2',
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
        'keywords' => explode(', ', 'ajax, jquery, plugin, dom, html, events'),
        'homepage' => 'http://www.domajax.com',
        'docs' => 'http://www.domajax.com',
        'demo' => 'http://www.domajax.com/#introduction',
        'download' => 'https://github.com/Ninsuo/domajax/tree/2.0/web/js/domajax',
        'bugs' => 'https://github.com/Ninsuo/domajax/issues',
);


header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

header("Content-Disposition: attachment;filename=domajax.jquery.json");
header("Content-Transfer-Encoding: binary");

echo json_encode($array);
