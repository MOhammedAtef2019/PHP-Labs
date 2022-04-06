<?php

$users = file("users.txt");

echo "<table border='2px' style='border: solid; background-color: #f2f2f2; text-align:center'>

        <th style='background:#000;color:white'>Full Name</th>
        <th style='background:#000;color:white'>Gender</th>
         <th style='background:#000;color:white'>Full Address</th>
         <th style='background:#000;color:white'>skills</th>
         <th style='background:#000;color:white'>Department</th>
         <th style='background:#000;color:white'>View</th>
         <th style='background:#000;color:white'>Edit</th>
         <th style='background:#000;color:white'>delete</th>";
foreach ($users as $index=>$l){  # $l --> line ===> is string
    $line = explode(",", $l); # convert the string to array

    echo "<tr>";
    echo "<td>{$line[0]}</td> <td>{$line[1]}</td><td>{$line[2]}</td><td>{$line[3]}</td><td>{$line[4]}</td>
    
    <td><a href='./Crud/view.php?id={$index}'> View</a></td>
    <td><a href='./Crud/Edit.php?id={$index}'> Edit</a></td>
    <td><a href='./Crud/Delete.php?id={$index}'> Delete</a></td>";
        
         echo "</tr>";
}
echo "</table>";






