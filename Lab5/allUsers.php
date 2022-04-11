<?php

require "crudClass.php";

$allUsers = new CrudOpertion;

$rows = $allUsers->allUsers();


echo "<table border='2px' style='border: solid; background-color: #f2f2f2; text-align:center'>

        <th style='background:#000;color:white'>ID</th>
        <th style='background:#000;color:white'>Full Name</th>
        <th style='background:#000;color:white'>Gender</th>
         <th style='background:#000;color:white'>Full Address</th>
         <th style='background:#000;color:white'>skills</th>
         <th style='background:#000;color:white'>Department</th>
         <th style='background:#000;color:white'>View</th>
         <th style='background:#000;color:white'>Edit</th>
         <th style='background:#000;color:white'>delete</th>";
         foreach ($rows as $r){  
    echo "<tr>";

    echo "<td>{$r->id}</td>
    <td>{$r->FullName}</td> 
    <td>{$r->gender}</td>
    <td>{$r->address}</td>
    <td>{$r->skills}</td>
    <td>{$r->department}</td>
    <td><a href='./view.php?id={$r->id}'> View</a></td>
    <td><a href='./edit.php?id={$r->id}'> Edit</a></td>
    <td><a href='./delete.php?id={$r->id}'> Delete</a></td>";

    echo "</tr>";
}
echo "</table>";






