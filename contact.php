<?php 
include('db.php');

$errors = array();
$success = array();
$email = "";
$username= "";


if(isset($_POST['submit'])){
  $email = $_POST['email'];
  if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email)){
  array_push($errors,"email required or invalid email format");}

$count_error = count($errors);
if($count_error  == 0){
  $query = "INSERT INTO newsletter (email) values ('$email')";
  $results = mysqli_query($conn, $query);
  if($results){
 array_push($success,"succesfully added to list");

  }

}else{
  array_push($errors,"ERROR");
}


  }

 
if(isset($_POST['messages-submit'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $subject = mysqli_real_escape_string($conn, $_POST['subject']);
  $messages = mysqli_real_escape_string($conn, $_POST['messages']);
  if(empty($username))
          {array_push($errors,"username required or invalid username length");}
          if(empty($subject))
          {array_push($errors,"subject required ");}
          if(empty($messages))
          {array_push($errors,"messages required");}

          if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))
          {array_push($errors,"email required or invalid email format");}

          if (count($errors) == 0) {
            $query = "INSERT INTO msg (username,email, subjects,messages)
                  VALUES('$username', '$email','$subject', '$messages'')";
          $res =  mysqli_query($conn, $query);
          if($res){
            echo
            ('sucess');
          // header('location:index.php');
          }else{
            echo
            ('error to database');
          }

          }
}
?>