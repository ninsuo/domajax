<?php

date_default_timezone_set('Europe/Paris');

// We simulate a database in the session
session_start();
if (!array_key_exists('db', $_SESSION)) {
    $_SESSION['db'] = array(
            array('date' => '10/07/1984 06:37:00', 'elem' => 'Some nerd born'),
            array('date' => date("d/m/Y H:i:s"), 'elem' => 'You opened that page'),
    );
}
$db = $_SESSION['db'];

// Handler when the insertion form is fullfilled
if (array_key_exists('insert', $_REQUEST)) {
    $db[] = array(
        'date' => date("d/m/Y H:i:s"),
        'elem' => htmlentities(substr(trim($_REQUEST['insert']), 0, 10)),
    );
}

// Handler when user clicks on delete
if (array_key_exists('delete', $_REQUEST)) {
    if (array_key_exists($_REQUEST['delete'], $db)) {
        unset($db[$_REQUEST['delete']]);
    }
}

// Limit the stored database to 10 elements for this demo
$_SESSION['db'] = array_slice($db, (count($db) - 10) > 0 ?: 0, 10);

?>

<!-- Displaying the database -->

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Element</th>
        <th>Date</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($db as $id => $elem): ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $elem['elem']; ?></td>
            <td><?php echo $elem['date']; ?></td>
            <td>
                <a
                    href="#"
                    class="domajax click"
                    data-endpoint="input-attr-table-handler.php"
                    data-output="#output"
                    data-input-attr="delete"
                    data-delete="<?php echo $id; ?>"
                    >Delete</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
