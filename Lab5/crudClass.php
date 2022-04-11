<?php

class CrudOpertion
{
  
  // property declaration
  private $dsn = 'mysql:dbname=menofia42;host=127.0.0.1;port=3306;'; 
  private $user = 'os_menfia';
  private $password = 'Iti123456789_';
    // method declaration

   public function connectToDatabase(){
      $db= new PDO($this->dsn, $this->user, $this->password);
      return $db;
  
  }
  public function check_user_exist($user, $pass)
{
    try{
      $db= $this->connectToDatabase();
        if($db){
          $hashed_password = md5($pass);
            $select_query = 'select * from student  where username=:user and password=:pass';
            $select_stmt = $db->prepare($select_query);
            $select_stmt->bindParam(":user",$user,PDO::PARAM_STR );
            $select_stmt->bindParam(":pass",$hashed_password,PDO::PARAM_STR );

            $res=$select_stmt->execute();
            if ($res){
                $users = $select_stmt->fetchAll(PDO::FETCH_OBJ);
                if(count($users)>0){
                    return $users[0];
                }
            }
        }
    return null;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}

    public function allusers() {
      try{

        $db= $this->connectToDatabase();
        if($db){

      $select_query = "select `id`,`FullName`,`gender`,`address`,`skills`,`department` from `student`";
      $stmt = $db->prepare($select_query);
      $res=$stmt->execute();

     $rows=$stmt->fetchAll(PDO::FETCH_OBJ);
     return $rows;
        }
    }catch (Exception $e){
    echo $e->getMessage();
}
}

public function deleteUser(int $user_id ) {
try{

  $db= $this->connectToDatabase();
  if($db){
      $delete_query = 'delete from student where `id` =:stdid';
      $del_stmt = $db->prepare($delete_query);
      $del_stmt->bindParam(":stdid",$user_id );
      $res=$del_stmt->execute();
          header("Location:allUsers.php");

  }

}catch (PDOException $e){
  echo $e->getMessage();
}

}


public function selectUser(int $record_id ){
try{

  $db= $this->connectToDatabase();
  if($db){
$select_query = "select * from `student` where `id`=:id";
   $stmt = $db->prepare($select_query);
   $stmt->bindParam(":id",$record_id ,PDO::PARAM_INT );
   $res=$stmt->execute();
   $row=$stmt->fetchAll(PDO::FETCH_OBJ);

   return $row;

}
}catch (Exception $e){
  echo $e->getMessage();
}
}


public function updateUser($data,int $user_id ,$img){

  try{

    $db= $this->connectToDatabase();
    if($db){
      $full_name =  $data['FullName'];
        $gender =  $data['Gender'];
        $address = $data['Address'];
        $country = $data['country'];
        $full_address = $country ." ". $address;
         $department = $data['department'];
         $skills = $data['skills'];
         $all_skills = '';
         foreach ( $data['skills'] as $val ) {
             $all_skills .= sprintf("%s-", $val );
       }
       if(isset($img)){
        $up_stmt = 'UPDATE `student` SET `FullName`=:fullName , `gender`=:gender,`address`=:fulladdress,`skills`=:skills,`department`=:department,`img`="'.$img.'" WHERE id=:id';

    } else {
      $up_stmt = "UPDATE `student` SET `FullName`=:fullName , `gender`=:gender,`address`=:fulladdress,`skills`=:skills,`department`=:department WHERE id=:id";

    }
      
       $update_stmt = $db->prepare($up_stmt);
       $update_stmt->bindParam(":id",$user_id ,PDO::PARAM_INT );
       $update_stmt->bindParam(":fullName",$full_name ,PDO::PARAM_STR );
       $update_stmt->bindParam(":gender",$gender ,PDO::PARAM_STR );
       $update_stmt->bindParam(":fulladdress",$full_address ,PDO::PARAM_STR );
       $update_stmt->bindParam(":skills",$all_skills ,PDO::PARAM_STR );
       $update_stmt->bindParam(":department",$department ,PDO::PARAM_STR );
       $update_stmt->execute();

       

    }
}catch (Exception $e){
    echo $e->getMessage();
}

}


public function insertUser($data ,$img=""){

 
try{

  $db= $this->connectToDatabase();

    if($db){
      $first_name =  $data['FName'];
       $last_name = $data['LName'];
       $full_name = $first_name . " " . $last_name ;
        $gender =  $data['Gender'];
        $address = $data['Address'];
        $country = $data['country'];
        $full_address = $country ." ". $address;
         $department = $data['department'];
         $skills = $data['skills'];
         $username = $data['UName'];
         $password = $data['password'];
         $hashed_password = md5($password);
        //  $img = $_REQUEST['img'];
         $all_skills = '';
         foreach ( $data['skills'] as $val ) {
             $all_skills .= sprintf("%s-", $val );
       }

       if(isset($img)){
        $insert_query= 'insert into student (`FullName`, `gender`,`address`, `skills`, `department`, `username`, `password`,`img`) 
        values(:fullName,:gender,:address,:skills,:department,:uname,:pass,"'.$img.'")';
    } else {
      $insert_query= "insert into student (`FullName`, `gender`,`address`, `skills`, `department`, `username`, `password`) 
      values(:fullName,:gender,:address,:skills,:department,:uname,:pass)";
    }
   
       $inst_stmt = $db->prepare($insert_query);
       $inst_stmt->bindParam(":fullName", $full_name,PDO::PARAM_STR);
       $inst_stmt->bindParam(":gender", $gender ,PDO::PARAM_STR);
       $inst_stmt->bindParam(":address", $full_address,PDO::PARAM_STR);
       $inst_stmt->bindParam(":skills", $all_skills,PDO::PARAM_STR);
       $inst_stmt->bindParam(":department", $department,PDO::PARAM_STR);
       $inst_stmt->bindParam(":uname", $username,PDO::PARAM_STR);
       $inst_stmt->bindParam(":pass", $hashed_password,PDO::PARAM_STR);
      //  $inst_stmt->bindParam(":img", $img,PDO::PARAM_STR);
       $inst_stmt->execute();
    }


  }catch (Exception $e){
        echo $e->getMessage();
    }
  
}


}

?>