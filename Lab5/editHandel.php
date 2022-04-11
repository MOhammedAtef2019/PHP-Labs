<?php


require "crudClass.php";

$record_id = $_GET["id"];

$updateUser = new CrudOpertion;


if ( isset( $_POST['submit'] ) ) {

  $filename = $_FILES["img"]["name"];
  $tempname = $_FILES["img"]["tmp_name"];    
  $folder = "image/".$filename;
  $insertUser = new CrudOpertion;
 
  move_uploaded_file($tempname, $folder);

var_dump($filename);


$updateUser->updateUser($_REQUEST,$record_id,$filename);

header("Location:allUsers.php");

}

