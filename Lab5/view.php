 <?php

 require "crudClass.php";

$record_id = $_GET["id"];


$allUsers = new CrudOpertion;

$row = $allUsers->selectUser($record_id);

    foreach ($row as $r){ 

    echo '<h2>Welcome<h2/>';
    echo  $r->gender === "Male" ? " Mr " . $r->FullName : " mrs " . $r->FullName;
    echo "<br>========================================<br>";
    echo "Please Review your information";
    echo "<br>========================================<br>";
    echo 'Your name : ' . $r->FullName;
    echo "<br>";
    echo 'Gender : ' . $r->gender;
    echo "<br>";
    echo 'Address: ' .$r->address;
    echo "<br>";
    echo 'Skills: ' . $r->skills;
    echo "<br>";
    echo 'Department: ' .$r->department;
    echo "<br>";
    }

   if($r->img !== ""){ 
   echo"<img src='./image/$r->img' width='250' height='250' />";
   }
   echo"<h2><a href = 'logout.php'>Sign Out</a></h2>";
   
   
   ?>
    
  