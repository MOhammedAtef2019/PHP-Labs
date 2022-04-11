<?php

require "crudClass.php";

$user_id = $_GET["id"];


$allUsers = new CrudOpertion;

$allUsers->deleteUser($user_id);