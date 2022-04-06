<?php

$user=file("../users.txt")[$_GET["id"]];
$userData = explode(",", $user);

  echo '<h2>Welcome<h2/>';
echo  $userData[1] === "Male" ? " Mr " . $userData[0] : " mrs " . $userData[0];
echo "<br>========================================<br>";
echo "Please Review your information";
echo "<br>========================================<br>";
echo 'Your name : ' . $userData[0];
echo "<br>";
echo 'Gender : ' . $userData[1];
echo "<br>";
echo 'Address: ' .$userData[2];
echo "<br>";
echo 'Skills: ' . $userData[3];
echo "<br>";
echo 'Department: ' .$userData[4];

?>