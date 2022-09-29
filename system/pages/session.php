<?php
include  ('database.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn,"select username from users where username='$user_check'" );
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: sign-in.php'); // Redirecting To Home Page
}
?>
