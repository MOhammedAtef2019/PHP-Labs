

<?php
require "crudClass.php";

   
    $checkuser = new CrudOpertion;

    if(isset($_POST['submit'])){
        
        $u = $_POST['username'];
        $p = $_POST['password'];


        if(isset($u) && isset($p)){
            $user = $checkuser->check_user_exist($u, $p);
            if($user){
                
                session_start();
                
                header("Location:allUsers.php");
                exit();
            }else{
              $error = "Your User Name or Password is invalid";
            }
        }
    }
?>











<html>

<head>
  <meta charset="utf-8" />
  <title>Stackfindover: Sign in</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9">
    <div class="formbg-outer">
      <div class="formbg">
        <div class="formbg-inner padding-horizontal--48">
          <span class="padding-bottom--15">Sign in to your account</span>
          <form id="stripe-login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          
           
          
            
            <div class="field padding-bottom--24">
              <label for="UName">User Name</label>
              <input type="text" name="username" placeholder="username" />
              
            </div>
            <div class="field padding-bottom--24">
                <label for="password">Password</label>
              <input type="password" name="password" placeholder="password"  />
              <?php
              if(isset($error)){
               echo" <p style='color: red'>  $error </p>";
              }
                ?>
            </div>
           
            <div class="field padding-bottom--24" style="display: flex;">
              <input type="submit" name="submit" value="Login" />
              
            </div>
            <div class="field padding-bottom--24" style="display: flex;">

              <a href='./form.php'>Don't have an account?Get Started</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>