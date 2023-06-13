<?php 
session_start();
ob_start();
unset($_SESSION['staff_name']);
header('location:index.php');
?>