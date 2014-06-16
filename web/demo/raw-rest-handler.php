<?php

/*
 * This demo simulates a REST service that stores and retrieve data from some databases (here, user session).
 */

session_start();
if (!array_key_exists('rest', $_SESSION)) {
    $_SESSION['rest'] = array('banana', 'cherry', 'apple', 'orange', 'mango');
}
$rest = $_SESSION['rest'];

// request (string starting by / after .php, for example, /hello/world in service.php/hello/world)
$request = explode("/", substr(array_key_exists('PATH_INFO', $_SERVER) ? $_SERVER['PATH_INFO'] : '', 1));

// http method (will determine if we add or remove data in our storage)
$method = $_SERVER['REQUEST_METHOD'];

// raw http body, given using data-raw
$rawBody = file_get_contents('php://input');

$demoBody = substr($rawBody, 0, 100);

switch ($method) {
    case 'PUT':
        $rest[] = $demoBody;
        $rest = array_slice($rest, 0, 15);
        break;
    case 'DELETE':
        if (in_array($demoBody, $rest)) {
            unset($rest[array_search($demoBody, $rest)]);
        }
        break;
    default:
        break;
}

$_SESSION['rest'] = $rest;

?>

<!-- Displaying storage contents -->

<table class="table">
    <thead>
    <tr>
        <th>Element</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($rest as $key => $elem): ?>
        <tr>
            <td id="demo-<?php echo $key; ?>"><?php echo htmlentities($elem); ?></td>
            <td>
                <a
                    href="#"
                    class="domajax click"
                    data-endpoint="raw-rest-handler.php"
                    data-method="delete"
                    data-raw="#demo-<?php echo $key; ?>"
                    data-output="#contents"
                    >Delete</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
