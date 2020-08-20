<?php

session_start();

session_destroy();

echo"<script> alert('Logout Sucessfull!'); location.href='Index.php'; </script>";
// header('location:Index.php');
?>