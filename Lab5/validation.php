<?php
    $errors = [];
    $olddata= [];
    if (empty($_POST["FName"])){
        $errors["FName"]="First Name is required";
    }else{
        $olddata["FName"] = $_POST["FName"];
    }
    if (empty($_POST["LName"])){
        $errors["LName"]="Last Name is required";
    }else{
        $olddata["LName"] = $_POST["LName"];
    }
    if (empty($_POST["Address"])){
        $errors["Address"]="Address is required";
    }else{
        $olddata["Address"] = $_POST["Address"];
    }
    if (empty($_POST["Gender"])){
        $errors["Gender"]="please select your gender ";
    }else{
        $olddata["Gender"] = $_POST["Gender"];
    }
    if (empty($_POST["skills"])){
        $errors["skills"]="select one skill at least";
    }else{
        $olddata["skills"] = $_POST["skills"];
    }
    if (empty($_POST["UName"])){
        $errors["UName"]="username is required";
    }else{
        $olddata["UName"] = $_POST["UName"];
    }
    if (empty($_POST["password"])){
        $errors["password"]="password is required";
    }else{
        $olddata["password"] = $_POST["password"];
    }
    if (empty($_POST["code"])){
        $errors["code"]="code is required";
    }elseif(($_POST["code"]) !== "Sh68c"){
      $errors["code"]="incorrect code!";
    }else{
        $olddata["code"] = $_POST["code"];
    }
   
    


    if (count($errors)> 0){

        $err=json_encode($errors);
        

        if(count($olddata) > 0) {
            $old = json_encode($olddata);
            

            header("Location:form.php?errors={$err}&olddata={$old}");
            
        }else {
            header("Location:form.php?errors={$err}"); 
            
        }
    }else{
      if ( isset( $_POST['submit'] ) ) {
        require "crudClass.php";

        $filename = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];    
        $folder = "image/".$filename;
        $insertUser = new CrudOpertion;
       
        move_uploaded_file($tempname, $folder);
            
     
        $insertUser ->insertUser($_REQUEST ,$filename );
        
        session_start();
                
        header("Location:allUsers.php");

  }

  }
    

    