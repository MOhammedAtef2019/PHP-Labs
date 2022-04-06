<?php

    $index=$_GET['id'];

    $user=file("../users.txt");

    $line=explode(",",$user[$index]);

    

    function setoldData($data){
        if(isset($data)){
            echo "{$data}";
        }
    }

  if(isset($_POST) && count($_POST) > 0 ){
      try {
          $users=file("../users.txt");


          $newData=implode(",",$_POST);

          $users[$index]=$newData.PHP_EOL;

          $new_users=implode("",$users);

          $userFile=fopen("../users.txt",'w');


          fwrite($userFile,$new_users);

          fclose($userFile);

          header("Location:../allUsers.php");

      }catch (Exception $ex){
          $ex->getMessage();
      }

  }


?>


    <html>

<head>
  <meta charset="utf-8" />
  <title>Udate your information</title>
  <link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
  <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9">
    <div class="formbg-outer">
      <div class="formbg">
        <div class="formbg-inner padding-horizontal--48">
          <form id="stripe-login" action="#" method="post">

            <div class="field padding-bottom--24">
              <label for="Full Name">FullName</label>
              <input type="text" name="Full Name" value="<?php setoldData($line[0]) ?>"/>
            </div>
            <div style="display: flex" >
              <p style="padding-right: 50px">Gender</p>
                <input type="radio" id="Male" name="Gender" value="Male" />  
              <label for="Male">Male</label><br />
               
              <input type="radio" id="Female" name="Gender" value="Female" />
                <label for="css">Female</label><br />
              
              </div>

            <div class="field padding-bottom--24">
              <label for="Address">Address</label>
              <input type="text" name="Address" value="<?php setoldData($line[2]) ?>"/> 
            </div>

            <div class="field padding-bottom--24">
              <label for="Skills">Skills</label>
              <input type="text" name="Skills" value="<?php setoldData($line[3]) ?>"/>
            </div>
            
          
            <div class="field padding-bottom--24">
              <label for="department">Department</label>
              </br>
              <input name="department" id="department" value="<?php setoldData($line[4]) ?>">
            </div>

            
            <div class="field padding-bottom--24" style="display: flex;">
              <input type="submit" name="submit" value="Update" />
            </div>

          </form>
        </div>
      </div>
    </div>
    </div>

</body>

</html>


