<?php

if (isset($_GET["id"])) {
    $index = (int) $_GET["id"];
    $all = file_get_contents('../users.txt');
    $users = explode("\n", $all);
    unset($users[$index]);
    $new = implode("\n", $users);
    file_put_contents('../users.txt', $new);

    header("Location: ../allUsers.php");
}