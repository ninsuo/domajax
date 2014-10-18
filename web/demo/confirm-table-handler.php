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
$exists = false;
if (array_key_exists('insert', $_REQUEST)) {
    $data = htmlentities(substr(trim($_REQUEST['insert']), 0, 10));
    foreach ($db as $elem) {
        if ($elem['elem'] === $_REQUEST['insert']) {
            $exists = true;
        }
    }
    if (!$exists) {
        $db[] = array(
            'date' => date("d/m/Y H:i:s"),
            'elem' => $data,
        );
    }
}

// Handler when user clicks on delete
if (array_key_exists('delete', $_REQUEST)) {
    $data = htmlentities(substr(trim($_REQUEST['delete']), 0, 10));
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
                    data-endpoint="confirm-table-handler.php"
                    data-input-attr="delete"
                    data-delete="<?php echo $id; ?>"
                    data-output="#output"
                    data-confirm="Do you really want to delete entry <?php echo $id; ?> ?"
                    >Delete</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
