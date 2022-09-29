<?php

session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

}
header("location:sign-in.php");
?>
