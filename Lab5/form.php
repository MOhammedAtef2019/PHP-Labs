<?php
    if (isset($_GET["errors"])){
        $errors = json_decode($_GET["errors"]);
    }
    if (isset($_GET["olddata"])){
        $olddata = json_decode($_GET["olddata"]);
    }
 
?>
<html>

<head>
  <meta charset="utf-8" />
  <title>Stackfindover: Update data</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9">
    <div class="formbg-outer">
      <div class="formbg">
        <div class="formbg-inner padding-horizontal--48">
          <span class="padding-bottom--15">Sign in to your account</span>
          <form id="stripe-login" action="validation.php" method="post" enctype="multipart/form-data">
            <div class="field padding-bottom--24">
              <label for="FName">FirstName</label>
              <input type="text" name="FName" value="<?php if(isset($olddata->FName)) {echo $olddata->FName;} ?>" />
               <?php
                        if(isset($errors->FName)){
                            echo "<p style='color: red'> $errors->FName</p>";
                        }
                    ?>
            </div>
            <div class="field padding-bottom--24">
              <label for="LName">LastName</label>
              <input type="text" name="LName" value="<?php if(isset($olddata->LName)) {echo $olddata->LName;} ?>" />
              <?php
                        if(isset($errors->LName)){
                            echo "<p style='color: red'> $errors->LName</p>";
                        }
                    ?>
            </div>
            <div class="field padding-bottom--24">
              <label for="Address">Address</label>
              <textarea name="Address" rows="5" cols="55" value="<?php if(isset($olddata->Address)) {echo $olddata->Address;} ?>"></textarea>
              <?php
                        if(isset($errors->Address)){
                            echo "<p style='color: red'> $errors->Address</p>";
                        }
                    ?>
            </div>
            <div class="field padding-bottom--24">
              <div class="grid--50-50">
                <label for="country">Country</label>
                <select name="country" id="country">
                  <option value="Egypt">Egypt</option>
                  <option value="Alex">Alex</option>
                  <option value="Aswan">Aswan</option>
                  <option value="Sharm">Sharm</option>
                  <option value="USA">USA</option>
                </select>
              </div>
            </div>
            <div style="display: flex" >
              <p style="padding-right: 50px">Gender</p>
                <input type="radio" id="Male" name="Gender" value="Male" />  
              <label for="Male">Male</label><br />
               
              <input type="radio" id="Female" name="Gender" value="Female" />
                <label for="css">Female</label><br />
              
              </div>
              
              <?php
                        if(isset($errors->Gender)){
                            echo "<p style='color: red;margin-bottom: 20px;
                            margin-top: -25px';> $errors->Gender</p>";
                        }
                    ?>
                    
            <div style="display: flex; justify-content: space-between;">
              <label for="skills">Skills</label>
              <br>
              <input type="checkbox" value="PHP" name="skills[]" id="php">
              <label for="php">PHP</label>
              <input type="checkbox" value="J2SE" name="skills[]" id="j2se">
              <label for="j2se">J2SE</label>
              <br>
              <input type="checkbox" value="MySQL" name="skills[]" id="mysql">
              <label for="mysql">MySQL</label>
              <input type="checkbox" value="PostgreeSQL" name="skills[]" id="PostgreeSQL">
              <label for="PostgreeSQL">PostgreeSQL</label>
              </div>
              <?php
                        if(isset($errors->skills)){
                            echo "<p style='color: red;margin-bottom: 20px;
                            margin-top: -10px';> $errors->skills</p>";
                        }
                    ?>
            <div class="field padding-bottom--24">
              <label for="UName">User Name</label>
              <input type="text" name="UName" value="<?php if(isset($olddata->UName)) {echo $olddata->UName;} ?>" />
              <?php
                        if(isset($errors->UName)){
                            echo "<p style='color: red'> $errors->UName</p>";
                        }
                    ?>
            </div>
            <div class="field padding-bottom--24">
                <label for="password">Password</label>
              <input type="password" name="password" value="<?php if(isset($olddata->password)) {echo $olddata->password;} ?>"  />
              <?php
                        if(isset($errors->password)){
                            echo "<p style='color: red'> $errors->password</p>";
                        }
                    ?>
            </div>
            <div class="field padding-bottom--24">
              <label for="department">Department</label>
              </br>
              <input name="department" id="department" readonly value="Open Source">
            </div>
            <div class="field padding-bottom--24">
            <label for="f1">image</label>
            <input type="file" name="img" value="<?php if(isset($olddata->f1)) {echo $olddata->f1;} ?>" />
            </div>
            <div class="field padding-bottom--24">
              <text>Sh68c</text>
              <p>Please enter the code above</p>
              <input type="text" name="code" value="<?php if(isset($olddata->code)) {echo $olddata->code;} ?>" >
              <?php
                        if(isset($errors->code)){
                            echo "<p style='color: red'> $errors->code</p>";
                        }
                    ?>
            </div>
            <div class="field padding-bottom--24" style="display: flex;">
              <input type="submit" name="submit" value="SignUp" />
              <input type="reset" name="reset" value="Reset" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>