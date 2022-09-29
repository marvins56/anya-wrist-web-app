<?php
session_start();
include 'db.php';


$username= "";
$email= "";
$password = "";


$errors = array();
if(isset($_POST['submit'])){

  // receive all input values from the form to preventig injection
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);


          //errors for the form
          if(empty($username))
          {array_push($errors,"username required or invalid username length");}

          if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))
          {array_push($errors,"email required or invalid email format");}

          if(empty($password))
          {array_push($errors,"password required");}


// checking if user exists
$user_check_query = "SELECT * FROM admin WHERE username='$username' or email='$email' or password = '$password' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

      if ($user) { // if user exists
        if ($user['username'] != $username) {
          array_push($errors, "Username doesnot exists");
        }
        if ($user['email'] != $email) {
          array_push($errors, "email doesnot exists");
        }

      }

  if (count($errors) === 0) {

  $query = "SELECT * FROM admin WHERE username='$username' or email = '$email' or password='$password'";
  $results = mysqli_query($conn, $query);

if (mysqli_num_rows($results) === 1) {

    $row = mysqli_fetch_assoc($results);

    if ($row['username'] === $username && $row['password']
     === $password && $row['email'] === $email) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
     
        header("Location: upload-items.php");
        exit();
    }
        else {
        //if no details in the database this error pops up
        array_push($errors, "Wrong username/password combination");
        }

}

        }
}



 ?>
