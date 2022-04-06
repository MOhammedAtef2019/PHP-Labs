<?php
    var_dump($_POST);
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
            var_dump($olddata);
            $old = json_encode($olddata);
            

            header("Location:form.php?errors={$err}&olddata={$old}");
            
        }else {
            header("Location:form.php?errors={$err}"); 
            
        }
    }else{
      if ( isset( $_POST['submit'] ) ) {
        $values = '';
    
             $values .= sprintf("%s  %s,", $_POST['FName'],$_POST['LName'] );
             $values .= sprintf("%s,", $_POST['Gender'] );
             $values .= sprintf("%s-%s,", $_POST['country'],$_POST['Address']);
         foreach ( $_POST['skills'] as $idx => $val ) {
             $values .= sprintf("%s-", $val );
        }
     
            $values .= sprintf(",%s", $_POST['department'] );
      
    
    try{
        $userfile =fopen("users.txt", "a");
        fwrite($userfile, $values.PHP_EOL);
    
        fclose($userfile);
    
    }catch (Exception $e){
        echo $e->getMessage();
    }
    header("Location:allUsers.php");
  }
    }

    