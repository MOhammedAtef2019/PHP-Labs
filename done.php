<?php
// Check if the form is submitted
if ( isset( $_POST['submit'] ) ) {


if ( filter_has_var( INPUT_POST, 'submit' ) ) {

  // echo '<h2>Your Input:</h2>';
  $firstname = $_POST['FName'];
  $lastname = $_POST['LName'];
  $address = $_POST['Address'];
  $country = $_POST['country'];
  $gender =   $_POST['Gender'];
  $skills = $_POST['skills'];
  $department = $_POST['department'];
  
  // display the results
  echo '<h2>Welcome<h2/>';
echo  $gender === "Male" ? " Mr " . $firstname . " " . $lastname : " mrs " . $firstname . " " . $lastname;
echo "<br>========================================<br>";
echo "Please Review your information";
echo "<br>========================================<br>";
echo 'Your name : ' . $firstname .' ' . $lastname;
echo "<br>";
echo "Address: ";
echo $country."-".$address;
echo "<br>";
if (empty($skills)) {
    echo ("You didn't select any thing fag.");
} else {
    $N = count($skills);
    echo ("You selected $N skill(s): ");
    for ($i = 0; $i < $N; $i++) {
        echo ($skills[$i] . " - ");
    }
}
echo "<br>";
echo "Department: ";
echo $department;

}
exit;
}
?>