<?php
session_start();
if (isset($_SESSION['id'])) {
  session_unset();
  header("location:login.php");
  $_SESSION['msg']="<div class='text-success'>u have successfully loged out</div>";
}
else {
  header("location:login.php");
  $_SESSION['msg']="Login please";
} ?>
