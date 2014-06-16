<?php

$nickname = array_key_exists('nickname', $_POST) ? strtolower(trim($_POST['nickname'])) : null;

$is_taken = in_array($nickname, array('mario', 'luigi', 'peach', 'yoshi', 'toad', 'donkey-kong', 'daisy', 'bowser', 'kamek', 'koopa', 'boo', 'wario'));

if ($is_taken) {
    echo '<i class="icon-ok"></i>';
} else {
    echo '<i class="icon-remove"></i>';
}
