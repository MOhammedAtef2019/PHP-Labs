<?php

require "crudClass.php";

$record_id = $_GET["id"];


$selectUser = new CrudOpertion;

$row = $selectUser->selectUser($record_id);



echo "<html>

<head>
  <meta charset='utf-8' />
  <title>Stackfindover: Sign Up</title>
  <link rel='stylesheet' type='text/css' href='style.css' />
</head>
<body>
  <div class='box-root padding-top--24 flex-flex flex-direction--column' style='flex-grow: 1; z-index: 9'>
    <div class='formbg-outer'>
      <div class='formbg'>
        <div class='formbg-inner padding-horizontal--48'>
          <span class='padding-bottom--15'>Update  your Information</span>
          <form id='stripe-login' action='editHandel.php?id={$record_id}' method='post' enctype='multipart/form-data'>
            <div class='field padding-bottom--24'>
              <label for='FullName'>FullName</label>";
              foreach ($row as $r){  
                if($r->address){
                  $part = explode(" ", $r->address);
                }
              echo "<input type='text' name='FullName' value='{$r->FullName}' />";
              
                        if(isset($errors->FullName)){
                            echo "<p style='color: red'> $errors->FullName</p>";
                        }
                    
            echo"</div>
            <div class='field padding-bottom--24'>
              <label for='Address'>Address</label>
              <input name='Address' rows='5' cols='55' value='{$part[1]}'></input>";
              
                        if(isset($errors->address)){
                            echo "<p style='color: red'> $errors->address</p>";
                        }
                      }  
            echo"</div>
            <div class='field padding-bottom--24'>
              <div class='grid--50-50'>
                <label for='country'>Country</label>
                <select name='country' id='country'>
                  <option value='Egypt'>Egypt</option>
                  <option value='Alex'>Alex</option>
                  <option value='Aswan'>Aswan</option>
                  <option value='Sharm'>Sharm</option>
                  <option value='USA'>USA</option>
                </select>
              </div>
            </div>
            <div style='display: flex' >
              <p style='padding-right: 50px'>Gender</p>
                <input type='radio' id='Male' name='Gender' value='Male' />  
              <label for='Male'>Male</label><br />
               
              <input type='radio' id='Female' name='Gender' value='Female' />
                <label for='css'>Female</label><br />
              
              </div>";
              
         
                        if(isset($errors->Gender)){
                            echo "<p style='color: red;margin-bottom: 20px;
                            margin-top: -25px';> $errors->Gender</p>";
                        }
                    
                    
            echo"<div style='display: flex; justify-content: space-between;'>
              <label for='skills'>Skills</label>
              <br>
              <input type='checkbox' value='PHP' name='skills[]' id='php'>
              <label for='php'>PHP</label>
              <input type='checkbox' value='J2SE' name='skills[]' id='j2se'>
              <label for='j2se'>J2SE</label>
              <br>
              <input type='checkbox' value='MySQL' name='skills[]' id='mysql'>
              <label for='mysql'>MySQL</label>
              <input type='checkbox' value='PostgreeSQL' name='skills[]' id='PostgreeSQL'>
              <label for='PostgreeSQL'>PostgreeSQL</label>
              </div>";
             
                        if(isset($errors->skills)){
                            echo "<p style='color: red;margin-bottom: 20px;
                            margin-top: -10px';> $errors->skills</p>";
                        }
                    
           
            
            echo"<div class='field padding-bottom--24'>
              <label for='department'>Department</label>
              </br>
              <input name='department' id='department' readonly value='Open Source'>
            </div>
            <div class='field padding-bottom--24'>
            <label for='f1'>image</label>
            <input type='file' name='img'/>
            </div>
            <div class='field padding-bottom--24' style='display: flex;'>
              <input type='submit' name='submit' value='update' />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>";

